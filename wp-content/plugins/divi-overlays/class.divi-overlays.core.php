<?php

	class DiviOverlays {
		
		/**
		 * Divi Overlays post type.
		 *
		 * @var string
		 */
		protected static $post_type = 'divi_overlay';
		
		private static $initiated = false;
		
		public static function init() {
			
			if ( ! self::$initiated ) {
				
				self::init_hooks();
				
				// Register the Custom Divi Overlays Post Type
				self::register_cpt();
			}
		}
		
		/**
		 * @var \WP_Filesystem_Base|null
		 */
		public static $wpfs;
		
		/**
		 * @var ET_Core_Data_Utils
		 */
		public static $data_utils;
		
		
		/**
		 * Initializes WordPress hooks
		 */
		protected static function init_hooks() {
			
			self::$initiated = true;
			
			global $wp_filesystem;
			self::$wpfs = $wp_filesystem;
			
			if ( !class_exists( 'ET_Core_Data_Utils' ) ) {
				
				return;
			}
			
			self::$data_utils = new ET_Core_Data_Utils();
			
			add_action( 'switch_theme', array( 'DiviOverlays', 'super_clear_cache') );
			add_action( 'activated_plugin', array( 'DiviOverlays', 'super_clear_cache'), 10, 0 );
			add_action( 'deactivated_plugin', array( 'DiviOverlays', 'super_clear_cache'), 10, 0 );
			add_action( 'et_core_page_resource_auto_clear', array( 'DiviOverlays', 'super_clear_cache') );
			add_action( 'wp_ajax_et_core_page_resource_clear', array( 'DiviOverlays', 'super_clear_cache') );
			add_action( 'et_epanel_changing_options', array( 'DiviOverlays', 'super_clear_cache') );
		}
		
		public static function super_clear_cache() {
			
			self::do_remove_static_resources();
			
			if ( function_exists( 'et_theme_builder_clear_wp_cache' ) ) {
				
				et_theme_builder_clear_wp_cache( 'all' );
			}
			
			if ( class_exists( 'ET_Core_Cache_File' ) ) {
				
				// Always reset the cached templates on last request after data stored into database.
				ET_Core_Cache_File::set( 'et_theme_builder_templates', array() );
			}
			
			if ( class_exists( 'ET_Core_Cache_File' ) ) {
				
				// Remove static resources on save. It's necessary because how we are generating the dynamic assets for the TB.
				ET_Core_PageResource::remove_static_resources( 'all', 'all', false, 'dynamic' );
			}
		}
		
		public static function register_cpt() {
			
			$labels = array(
				'name' => _x( 'Divi Overlays', 'divi_overlay' ),
				'singular_name' => _x( 'Divi Overlay', 'divi_overlay' ),
				'add_new' => _x( 'Add New', 'divi_overlay' ),
				'add_new_item' => _x( 'Add New Divi Overlay', 'divi_overlay' ),
				'edit_item' => _x( 'Edit Divi Overlay', 'divi_overlay' ),
				'new_item' => _x( 'New Divi Overlay', 'divi_overlay' ),
				'view_item' => _x( 'View Divi Overlay', 'divi_overlay' ),
				'search_items' => _x( 'Search Divi Overlay', 'divi_overlay' ),
				'not_found' => _x( 'No Divi Overlays found', 'divi_overlay' ),
				'not_found_in_trash' => _x( 'No overlays found in Trash', 'divi_overlay' ),
				'parent_item_colon' => _x( 'Parent Divi Overlay:', 'divi_overlay' ),
				'menu_name' => _x( 'Divi Overlays', 'divi_overlay' ),
			);
			
			$args = array(
				'labels' => $labels,
				'hierarchical' => true,
				'supports' => array( 'title', 'editor', 'author', 'revisions' ),
				'public' => true,
				'show_ui' => true,
				'show_in_menu' => true,
				'menu_position' => 5,
				'show_in_nav_menus' => true,
				'exclude_from_search' => true,
				'has_archive' => true,
				'query_var' => true,
				'can_export' => true,
				'rewrite' => array(
					'slug' => self::$post_type,
					'with_front' => false,
					'pages' => true,
					'feeds' => true,
					'ep_mask' => EP_PERMALINK,
				),
				'capability_type' => 'post'
			);

			register_post_type( self::$post_type, $args );
		}
		
		
		/**
		 * Remove static resources action.
		 *
		 * @param string $post_id id of post.
		 * @param string $owner owner of file.
		 * @param bool   $force remove all resources.
		 * @param string $slug file slug.
		 */
		public static function do_remove_static_resources() {

			$_post_id = '*';
			$_owner   = '*';
			$_slug    = '*';

			$cache_dir = self::$data_utils->normalize_path( ET_Core_PageResource::get_cache_directory() );

			$files = array_merge(
				// Remove any CSS files missing a parent folder.
				(array) glob( "{$cache_dir}/et-{$_owner}-*" ),
				// Remove CSS files for individual posts or all posts if $post_id set to 'all'.
				(array) glob( "{$cache_dir}/{$_post_id}/et-{$_owner}-{$_slug}*" ),
				// Remove CSS files that contain theme builder template CSS.
				// Multiple directories need to be searched through since * doesn't match / in the glob pattern.
				(array) glob( "{$cache_dir}/*/et-{$_owner}-{$_slug}-*tb-{$_post_id}*" ),
				(array) glob( "{$cache_dir}/*/*/et-{$_owner}-{$_slug}-*tb-{$_post_id}*" ),
				(array) glob( "{$cache_dir}/*/*/*/et-{$_owner}-{$_slug}-*tb-{$_post_id}*" ),
				(array) glob( "{$cache_dir}/*/et-{$_owner}-{$_slug}-*tb-for-{$_post_id}*" ),
				(array) glob( "{$cache_dir}/*/*/et-{$_owner}-{$_slug}-*tb-for-{$_post_id}*" ),
				(array) glob( "{$cache_dir}/*/*/*/et-{$_owner}-{$_slug}-*tb-for-{$_post_id}*" ),
				// Remove Dynamic CSS files for categories, tags, authors, archives, homepage post feed and search results.
				(array) glob( "{$cache_dir}/taxonomy/*/*/et-{$_owner}-dynamic*" ),
				(array) glob( "{$cache_dir}/author/*/et-{$_owner}-dynamic*" ),
				(array) glob( "{$cache_dir}/archive/et-{$_owner}-dynamic*" ),
				(array) glob( "{$cache_dir}/search/et-{$_owner}-dynamic*" ),
				(array) glob( "{$cache_dir}/notfound/et-{$_owner}-dynamic*" ),
				(array) glob( "{$cache_dir}/home/et-{$_owner}-dynamic*" ),
				// WP Templates and Template Parts.
				(array) glob( "{$cache_dir}/*/et-{$_owner}-{$_slug}-*wpe-{$_post_id}*" ),
				(array) glob( "{$cache_dir}/*/*/et-{$_owner}-{$_slug}-*wpe-{$_post_id}*" ),
				(array) glob( "{$cache_dir}/*/*/*/et-{$_owner}-{$_slug}-*wpe-{$_post_id}*" )
			);

			self::_remove_files_in_directory( $files, $cache_dir );

			// Remove empty directories.
			self::$data_utils->remove_empty_directories( $cache_dir );

			// Clear cache managed by 3rd-party cache plugins.
			$post_id = ! empty( $post_id ) && absint( $post_id ) > 0 ? $post_id : '';

			et_core_clear_wp_cache( $post_id );

			// Purge the module features cache.
			if ( class_exists( 'ET_Builder_Module_Features' ) ) {
				if ( ! empty( $post_id ) ) {
					ET_Builder_Module_Features::purge_cache( $post_id );
				} else {
					ET_Builder_Module_Features::purge_cache();
				}
			}

			// Purge the google fonts cache.
			if ( empty( $post_id ) && class_exists( 'ET_Builder_Google_Fonts_Feature' ) ) {
				ET_Builder_Google_Fonts_Feature::purge_cache();
			}

			// Purge the dynamic assets cache.
			if ( empty( $post_id ) && class_exists( 'ET_Builder_Dynamic_Assets_Feature' ) ) {
				ET_Builder_Dynamic_Assets_Feature::purge_cache();
			}

			$post_meta_caches = array(
				'et_enqueued_post_fonts',
				'_et_dynamic_cached_shortcodes',
				'_et_dynamic_cached_attributes',
				'_et_builder_module_features_cache',
			);

			// Clear post meta caches.
			foreach ( $post_meta_caches as $post_meta_cache ) {
				if ( ! empty( $post_id ) ) {
					delete_post_meta( $post_id, $post_meta_cache );
				} else {
					delete_post_meta_by_key( $post_meta_cache );
				}
			}

			// Set our DONOTCACHEPAGE file for the next request.
			self::$data_utils->ensure_directory_exists( $cache_dir );
			self::$wpfs->put_contents( $cache_dir . '/DONOTCACHEPAGE', '' );
		}
		
		/**
		 * Removes a list of files from the designated directory.
		 *
		 * @param array[] $files     List of patterns to match.
		 * @param string  $cache_dir Cache directory.
		 */
		protected static function _remove_files_in_directory( $files, $cache_dir ) {
			foreach ( $files as $file ) {
				$file = self::$data_utils->normalize_path( $file );

				if ( ! et_()->starts_with( $file, $cache_dir ) ) {
					// File is not located inside cache directory so skip it.
					continue;
				}

				if ( is_file( $file ) ) {
					self::$wpfs->delete( $file );
				}
			}
		}
		
		
		/**
		 * Log debugging information to the error log.
		 *
		 * @param string $e The Exception object
		 */
		public static function log( $e = FALSE ) {
			
			$data_log = $e;
			
			if ( is_object( $e ) ) {
				
				$data_log = sprintf( "Exception: \n %s \n", $e->getMessage() . "\r\n\r\n" . $e->getFile() . "\r\n" . 'Line:' . $e->getLine() );
			}
			
			if ( apply_filters( 'divioverlays_log', defined( 'WP_DEBUG' ) && WP_DEBUG && defined( 'WP_DEBUG_LOG' ) && WP_DEBUG_LOG ) ) {
				
				// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_print_r
				$log = print_r( compact( 'data_log' ), true );
				
				// phpcs:ignore WordPress.PHP.DevelopmentFunctions.error_log_error_log
				error_log( $log );
			}
		}
	}
	