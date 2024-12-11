<?php

	class DiviOverlaysAdmin {
		
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
				
				self::enable_divicpt_option();
			}
		}
		
		
		/**
		 * Initializes WordPress hooks
		 */
		protected static function init_hooks() {
			
			self::$initiated = true;
			
			// Add Divi Theme Builder
			add_filter( 'et_builder_post_type_blacklist', array( 'DiviOverlaysAdmin', 'filter_post_type_blacklist') );
			add_filter( 'et_builder_third_party_post_types', array( 'DiviOverlaysAdmin', 'filter_third_party_post_types') );
			add_filter( 'et_builder_post_types', array( 'DiviOverlaysAdmin', 'filter_builder_post_types') );
			add_filter( 'et_fb_post_types', array( 'DiviOverlaysAdmin', 'filter_builder_post_types') );
			add_filter( 'et_builder_fb_enabled_for_post', array( 'DiviOverlaysAdmin', 'filter_fb_enabled_for_post'), 10, 2 );
		}
		
		
		public static function enable_divicpt_option() {
			
			if ( !function_exists('et_get_option') ) {
				
				return;
			}
			
			$divi_post_types = et_get_option( 'et_pb_post_type_integration', array() );
			
			if ( !isset( $divi_post_types['divi_overlay'] )
				|| ( isset( $divi_post_types['divi_overlay'] ) && $divi_post_types['divi_overlay'] == 'off' ) ) {
				
				$divi_post_types['divi_overlay'] = 'on';
				
				et_update_option( 'et_pb_post_type_integration', $divi_post_types, false, '', '' );
			}
		}
		
		
		/**
		 * Filter the post type blacklist if the post type is not supported.
		 *
		 * @since 3.10
		 *
		 * @param string[] $post_types
		 *
		 * @return string[]
		 */
		public static function filter_post_type_blacklist( $post_types ) {
			
			$post_types[] = self::$post_type;

			return $post_types;
		}

		/**
		 * Filter the supported post type whitelist if the post type is supported.
		 *
		 * @since 3.10
		 *
		 * @param string[] $post_types
		 *
		 * @return string[]
		 */
		public static function filter_third_party_post_types( $post_types ) {
			
			$post_types[] = self::$post_type;

			return $post_types;
		}

		/**
		 * Filter the enabled post type list if the post type has been enabled but the content
		 * filter has been changed back to the unsupported one.
		 *
		 * @since 3.10
		 *
		 * @param string[] $post_types
		 *
		 * @return string[]
		 */
		public static function filter_builder_post_types( $post_types ) {
			
			$post_types[] = self::$post_type;
			
			return $post_types;
		}

		/**
		 * Disable the FB for a given post if the builder was enabled but the
		 * content filter was switched after that.
		 *
		 * @since 3.10
		 *
		 * @param boolean $enabled
		 * @param integer $post_id
		 *
		 * @return boolean
		 */
		public static function filter_fb_enabled_for_post( $enabled, $post_id ) {
			
			$enabled = true;

			return $enabled;
		}
	}
	