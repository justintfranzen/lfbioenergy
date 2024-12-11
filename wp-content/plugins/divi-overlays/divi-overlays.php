<?php
/*
Plugin Name: Divi Overlays
Plugin URL: https://divilife.com/
Description: Create unlimited popup overlays using the Divi Builder.
Version: 2.9.7.6
Author: Divi Life — Tim Strifler
Author URI: https://divilife.com

// This file includes code from Main WordPress Formatting API, licensed GPLv2 - https://wordpress.org/about/gpl/
*/

$all_plugins = apply_filters( 'active_plugins', get_option( 'active_plugins' ) );

$current_theme = wp_get_theme();

if ( ( $current_theme->get( 'Name' ) !== 'Divi' && $current_theme->get( 'Template' ) !== 'Divi' ) 
	&& ( $current_theme->get( 'Name' ) !== 'Extra' && $current_theme->get( 'Template' ) !== 'Extra' )
	&& apply_filters( 'divi_ghoster_ghosted_theme', get_option( 'agsdg_ghosted_theme' ) ) !== 'Divi' ) {
	
	if ( stripos( implode( $all_plugins ), 'divi-builder.php' ) === false ) {
		
		function dov_divibuilder_required() {
			
			$class = 'notice notice-error';
			$message = __( 'Divi Overlays requires plugin: Divi Builder', 'DiviOverlays' );
			
			printf( '<div class="%1$s"><p>%2$s</p></div>', esc_attr( $class ), esc_html( $message ) );
		}
		add_action( 'admin_notices', 'dov_divibuilder_required' );
		
		return;
	}
}

define( 'DOV_VERSION', '2.9.7.6');
define( 'DOV_SERVER_TIMEZONE', 'UTC');
define( 'DOV_SCHEDULING_DATETIME_FORMAT', 'm\/d\/Y g:i A');
define( 'DOV_PLUGIN_BASENAME', plugin_basename( __FILE__ ) );
define( 'DOV_PLUGIN_URL', plugin_dir_url( __FILE__ ));
define( 'DOV_PLUGIN_DIR', plugin_dir_path( __FILE__ ) );

register_deactivation_hook( __FILE__, 'flush_rewrite_rules' );
register_activation_hook( __FILE__, 'divi_overlay_flush_rewrites' );
function divi_overlay_flush_rewrites() {
	
	DiviOverlays::register_cpt();
	flush_rewrite_rules();
}

require_once( DOV_PLUGIN_DIR . '/class.divi-overlays.core.php' );
add_action( 'init', array( 'DiviOverlays', 'init' ) );

if ( is_admin() ) {
	
	require_once( DOV_PLUGIN_DIR . '/class.divi-overlays-admin.core.php' );
	add_action( 'init', array( 'DiviOverlaysAdmin', 'init' ) );

	$edd_updater = DOV_PLUGIN_DIR . 'updater.php';
	$edd_updater_admin = DOV_PLUGIN_DIR . 'updater-admin.php';

	if ( file_exists( $edd_updater ) && file_exists( $edd_updater_admin ) ) {

		// Load the API Key library if it is not already loaded
		if ( ! class_exists( 'edd_divioverlays' ) ) {
			
			require_once( $edd_updater );
			require_once( $edd_updater_admin );
		}
		
		define( 'DOV_UPDATER', TRUE );
	}
	else {
		
		define( 'DOV_UPDATER', FALSE );
	}
}

/* Add custom column in post type */
add_filter( 'manage_edit-divi_overlay_columns', 'my_edit_divi_overlay_columns' ) ;

function my_edit_divi_overlay_columns( $columns ) {

	$columns = array(
		'cb' => '<input type="checkbox" />',
		'title' => __( 'Title' ),
		'unique_class' => __( 'CSS Class' ),
		'unique_indentifier' => __( 'CSS ID' ),
		'unique_menu_id' => __( 'Menu ID' ),
		'author' => __( 'Author' ),
		'date' => __( 'Date' )
	);

	return $columns;
}

add_action( 'manage_divi_overlay_posts_custom_column', 'my_manage_divi_overlay_columns', 10, 2 );

function my_manage_divi_overlay_columns( $column, $post_id ) {
	global $post;

	switch( $column ) {
		
		/* If displaying the 'unique_class' column. */
		case 'unique_class' :

			/* Get the post meta. */
			$post_slug = "divioverlay-$post->ID";

			print et_core_esc_previously( $post_slug );

			break;

		/* If displaying the 'unique-indentifier' column. */
		case 'unique_indentifier' :

			/* Get the post meta. */
			$post_slug = "overlay_unique_id_$post->ID";

			print et_core_esc_previously( $post_slug );

			break;

		case 'unique_menu_id' :

			/* Get the post meta. */
			$post_slug = "unique_overlay_menu_id_$post->ID";

			print et_core_esc_previously( $post_slug );

			break;
			
		default :
			break;
	}
}
/* Custom column End here */


// Meta boxes for Divi Overlay //
function et_add_divi_overlay_meta_box() {
	
	$screen = get_current_screen();
	
	if ( $screen->post_type == 'divi_overlay' ) {
		
		if ( 'add' != $screen->action ) {
			add_meta_box( 'do_manualtriggers', esc_html__( 'Manual Triggers', 'DiviOverlays' ), 'do_manualtriggers_callback', 'divi_overlay', 'side', 'high' );
		}
		
		$status = get_option( 'divilife_edd_divioverlays_license_status' );
		$last_check = get_option( 'divilife_edd_divioverlays_license_lastcheck', false, false );
		$now = time();
		
		if ( $last_check === false ) {
			
			update_option( 'divilife_edd_divioverlays_license_lastcheck', $now );
			$last_check = $now;
		}
		
		$since_last_check = $now - $last_check;
		
		// An hour passed? check for license status
		if ( $since_last_check > 3599 ) {
			
			update_option( 'divilife_edd_divioverlays_license_lastcheck', $now );
			
			$check_license = divilife_edd_divioverlays_check_license( TRUE );
			if ( ( isset( $check_license->license ) && $check_license->license !== 'valid' && 'add' === $screen->action ) 
				|| ( isset( $check_license->license ) && isset( $_GET['action'] ) && $check_license->license !== 'valid' && 'edit' === $_GET['action'] ) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				|| ( $status === false && 'add' === $screen->action ) 
				|| ( $status === false && isset( $_GET['action'] ) && 'edit' === $_GET['action'] ) // phpcs:ignore WordPress.Security.NonceVerification.Recommended
				) {
				
				$message = '';
				$base_url = admin_url( 'edit.php?post_type=divi_overlay&page=dovs-settings' );
				$redirect = add_query_arg( array( 'message' => rawurlencode( $message ), 'divilife' => 'divioverlays' ), $base_url );
				
				wp_safe_redirect( $redirect );
				exit();
			}
		}
		
		add_meta_box( 'do_displaylocations_meta_box1', esc_html__( 'Display Locations', 'DiviOverlays' ), 'do_displaylocations_callback', 'divi_overlay', 'side' );
		add_meta_box( 'do_overlay_color_picker2', esc_html__( 'Overlay Background', 'DiviOverlays' ), 'overlay_color_box_callback', 'divi_overlay');
		add_meta_box( 'do_animation_meta_box3', esc_html__( 'Divi Overlay Animation', 'DiviOverlays' ), 'do_single_animation_meta_box', 'divi_overlay', 'side', 'high' );
		add_meta_box( 'do_moresettings_meta_box4', esc_html__( 'Additional Overlay Settings', 'DiviOverlays' ), 'do_moresettings_callback', 'divi_overlay', 'side' );
		add_meta_box( 'do_closecustoms_meta_box5', esc_html__( 'Close Button Customizations', 'DiviOverlays' ), 'do_closecustoms_callback', 'divi_overlay', 'side' );
		add_meta_box( 'do_automatictriggers6', esc_html__( 'Automatic Triggers', 'DiviOverlays' ), 'do_automatictriggers_callback', 'divi_overlay', 'side' );
	}
}
add_action( 'add_meta_boxes', 'et_add_divi_overlay_meta_box' );

function removefields_from_customfieldsmetabox( $protected, $meta_key ) {
	
	if ( function_exists( 'get_current_screen' ) ) {
		
		$screen = get_current_screen();
		
		$remove = $protected;
		
		if ( $screen !== null && $screen->post_type != 'divi_overlay' ) {
		
			if ( $meta_key == 'overlay_automatictrigger'
				|| $meta_key == 'overlay_automatictrigger_disablemobile'
				|| $meta_key == 'overlay_automatictrigger_disabletablet'
				|| $meta_key == 'overlay_automatictrigger_disabledesktop'
				|| $meta_key == 'overlay_automatictrigger_onceperload' 
				|| $meta_key == 'overlay_automatictrigger_scroll_from_value'
				|| $meta_key == 'overlay_automatictrigger_scroll_to_value'
				|| $meta_key == 'do_enable_scheduling' 
				|| $meta_key == 'do_at_pages' 
				|| $meta_key == 'do_at_pages_selected' 
				|| $meta_key == 'do_at_pagesexception_selected' 
				|| $meta_key == 'post_do_customizeclosebtn' 
				|| $meta_key == 'post_do_hideclosebtn' 
				|| $meta_key == 'post_do_preventscroll' 
				|| $meta_key == 'post_enableurltrigger' 
				|| $meta_key == 'css_selector_at_pages'
				|| $meta_key == 'css_selector_at_pages_selected'
				|| $meta_key == 'do_date_start'
				|| $meta_key == 'do_date_end'
				|| $meta_key == 'dov_closebtn_cookie'
				|| $meta_key == 'do_enableajax'
				|| $meta_key == 'et_pb_divioverlay_effect_entrance'
				|| $meta_key == 'et_pb_divioverlay_effect_exit'
				|| $meta_key == 'dov_effect_entrance_speed'
				|| $meta_key == 'do_showguests'
				|| $meta_key == 'do_showusers'
				|| $meta_key == 'post_do_closebtnclickingoutside'
				|| $meta_key == 'do_enableesckey'
				) {
					
				$remove = true;
			}
		}
		
		return $remove;
	}
}


function do_get_wp_posts() {
	
	check_ajax_referer( 'divilife_divioverlays', 'nonce' );
			
	if ( isset( $_POST['q'] ) ) {
	
		$q = sanitize_text_field( wp_unslash( $_POST['q'] ) );
	
	} else {
		
		return;
	}
	
	
	if ( isset( $_POST['page'] ) ) {
		
		$page = (int) $_POST['page'];
		
	} else {
		
		$page = 1;
	}
	
	
	if ( isset( $_POST['json'] ) ) {
		
		$json = (int) $_POST['json'];
		
	} else {
		
		$json = 0;
	}
	
	$total_count = 0;
	$data = null;
	
	if ( ! function_exists( 'et_get_registered_post_type_options' ) ) {
		
		$data = wp_json_encode(
		
			array(
				'total_count' => 1,
				'items' => array( 0 => (object) array( 'id' => 0, 'post_title' => 'This functionality requires Divi.' ) )
			)
		);
		
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		die( $data );
	}
	
	$post_types = et_get_registered_post_type_options();
	
	$excluded_post_types = array( 'attachment', 'revision', 'nav_menu_item', 'custom_css', 'et_pb_layout', 'divi_bars', 'divi_overlay', 'divi_mega_pro', 'customize_changeset' );
	
	$post_types = array_diff( array_keys( $post_types ), $excluded_post_types );
	
	$args = array(
		'do_by_title_like' => $q,
		'post_type' => $post_types,
		'cache_results'  => false,
		'posts_per_page' => 7,
		'paged' => $page,
		'orderby' => 'id',
		'order' => 'DESC'
	);
	
	add_filter( 'posts_where', 'do276_title_filter', 10, 2 );
	$query = new WP_Query( $args );
	remove_filter( 'posts_where', 'do276_title_filter', 10, 2 );
	
	$total_count = (int) $query->found_posts;
	
	$posts = array();
	
	if ( $query->have_posts() ) {
		
		while ( $query->have_posts() ) {
			
			$query->the_post();
			
			$post_filtered = array();
			
			$post_filtered[ 'id' ] = get_the_ID();
			$post_filtered[ 'post_title' ] = get_the_title();
			
			$posts[] = $post_filtered;
			
		}
	}
	
	wp_reset_postdata();
	
	if ( $json ) {
		
		header( 'Content-type: application/json' );
		$data = wp_json_encode(
		
			array(
				'total_count' => $total_count,
				'items' => $posts
			)
		);
		
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		die( $data );
	}
	
	return $posts;
}
add_action( 'wp_ajax_nopriv_ajax_do_listposts', 'do_get_wp_posts' );
add_action( 'wp_ajax_ajax_do_listposts', 'do_get_wp_posts' );


function do276_title_filter( $where, $wp_query )
{
    global $wpdb;
	
    if ( $search_term = $wp_query->get( 'do_by_title_like' ) ) {
        $where .= ' AND ' . $wpdb->posts . '.post_title LIKE \'%' . $wpdb->esc_like( $search_term ) . '%\'';
    }
	
    return $where;
}


function do_get_wp_categories() {
	
	check_ajax_referer( 'divilife_divioverlays', 'nonce' );
	
	if ( isset( $_POST['q'] ) ) {
	
		$q = sanitize_text_field( wp_unslash( $_POST['q'] ) );
	
	} else {
		
		return;
	}
	
	
	if ( isset( $_POST['page'] ) ) {
		
		$page = (int) $_POST['page'];
		
	} else {
		
		$page = 1;
	}
	
	
	if ( isset( $_POST['json'] ) ) {
		
		$json = (int) $_POST['json'];
		
	} else {
		
		$json = 0;
	}
	
	$data = null;
	
	$limit = 7;
	$offset = ( $page - 1 ) * $limit;
	
	$args = array(
		'taxonomy'               => array( 'category', 'project_category', 'product_cat' ),
		'name__like'             => $q,
		'number'                 => $limit,
		'offset'                 => $offset,
		'fields'                 => 'id=>name',
		'hide_empty'             => false,
		'get'                    => 'all',
		'orderby'				 => 'name',
		'order'					 => 'ASC'
	);
	
	$term_query = new WP_Term_Query( $args );
	
	// Get all categories found
	$args['number'] = '';
	$totalterm_query = new WP_Term_Query( $args );
	
	$json_posts = array();
	if ( ! empty( $term_query ) && ! is_wp_error( $term_query ) ) {
		
		$categories = $term_query->get_terms();
		
		$total_count = (int) count( $totalterm_query->get_terms() );
		
		$pop_categories = array();
		foreach( $categories as $term_id => $term_name ) {
			$pop_categories[ 'id' ] = $term_id;
			$pop_categories[ 'name' ] = $term_name;
			$json_posts[] = $pop_categories;
		}
		
	} else {
		
		
	}
	
	if ( $json ) {
		
		header( 'Content-type: application/json' );
		$data = wp_json_encode(
		
			array(
				'total_count' => $total_count,
				'items' => $json_posts
			)
		);
		
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		die( $data );
	}
}
add_action( 'wp_ajax_nopriv_ajax_do_listcategories', 'do_get_wp_categories' );
add_action( 'wp_ajax_ajax_do_listcategories', 'do_get_wp_categories' );


function do_get_wp_tags() {
	
	check_ajax_referer( 'divilife_divioverlays', 'nonce' );
	
	if ( isset( $_POST['q'] ) ) {
	
		$q = sanitize_text_field( wp_unslash( $_POST['q'] ) );
	
	} else {
		
		return;
	}
	
	
	if ( isset( $_POST['page'] ) ) {
		
		$page = (int) $_POST['page'];
		
	} else {
		
		$page = 1;
	}
	
	
	if ( isset( $_POST['json'] ) ) {
		
		$json = (int) $_POST['json'];
		
	} else {
		
		$json = 0;
	}
	
	$data = null;
	
	$limit = 7;
	$offset = ( $page - 1 ) * $limit;
	
	$args = array(
		'taxonomy'               => array( 'post_tag' ),
		'name__like'             => $q,
		'number'                 => $limit,
		'offset'                 => $offset,
		'fields'                 => 'id=>name',
		'hide_empty'             => false,
		'get'                    => 'all',
		'orderby'				 => 'name',
		'order'					 => 'ASC'
	);
	
	$term_query = new WP_Term_Query( $args );
	
	// Get all tags found
	$args['number'] = '';
	$totalterm_query = new WP_Term_Query( $args );
	
	$json_posts = array();
	if ( ! empty( $term_query ) && ! is_wp_error( $term_query ) ) {
		
		$tags = $term_query->get_terms();
		
		$total_count = (int) count( $totalterm_query->get_terms() );
		
		$pop_tags = array();
		foreach( $tags as $term_id => $term_name ) {
			$pop_tags[ 'id' ] = $term_id;
			$pop_tags[ 'name' ] = $term_name;
			$json_posts[] = $pop_tags;
		}
		
	} else {
		
		
	}
	
	if ( $json ) {
		
		header( 'Content-type: application/json' );
		$data = wp_json_encode(
		
			array(
				'total_count' => $total_count,
				'items' => $json_posts
			)
		);
		
		// phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
		die( $data );
	}
}
add_action( 'wp_ajax_nopriv_ajax_do_listtags', 'do_get_wp_tags' );
add_action( 'wp_ajax_ajax_do_listtags', 'do_get_wp_tags' );


if ( ! function_exists( 'do_displaylocations_callback' ) ) :

	function do_displaylocations_callback( $post ) {
			
		wp_nonce_field( 'divioverlays_displaylocations', 'divioverlays_displaylocations_nonce' );
		
		$at_pages = get_post_meta( $post->ID, 'do_at_pages', true );
		$selectedpages = get_post_meta( $post->ID, 'do_at_pages_selected' );
		$selectedexceptpages = get_post_meta( $post->ID, 'do_at_pagesexception_selected' );
	
		$at_categories = get_post_meta( $post->ID, 'category_at_categories', true );
		$selectedcategories = get_post_meta( $post->ID, 'category_at_categories_selected' );
		$selectedexceptcategories = get_post_meta( $post->ID, 'category_at_exceptioncategories_selected' );
		
		$at_tags = get_post_meta( $post->ID, 'tag_at_tags', true );
		$selectedtags = get_post_meta( $post->ID, 'tag_at_tags_selected' );
		$selectedexcepttags = get_post_meta( $post->ID, 'tag_at_exceptiontags_selected' );
		
		if( $at_pages == '' ) {
			
			$at_pages = 'all';
		}
		
		if( $at_categories == '' ) {
			
			$at_categories = 'all';
		}
		
		if( $at_tags == '' ) {
			
			$at_tags = 'all';
		}
		
		$do_displaylocations_archive = get_post_meta( $post->ID, 'do_displaylocations_archive' );
		
		if( !isset( $do_displaylocations_archive[0] ) ) {
			
			$do_displaylocations_archive[0] = '1';
		}
		
		$do_displaylocations_author = get_post_meta( $post->ID, 'do_displaylocations_author' );
		
		if( !isset( $do_displaylocations_author[0] ) ) {
			
			$do_displaylocations_author[0] = '1';
		}
		
		$do_forcerender = get_post_meta( $post->ID, 'do_forcerender' );
		
		if( !isset( $do_forcerender[0] ) ) {
			
			$do_forcerender[0] = '0';
		}
		
		?>
		<script type="text/javascript">
		var divilife_divioverlays = "<?php print wp_create_nonce( 'divilife_divioverlays' ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>";
		</script>
		<div class="divilife_meta_box">
			<div class="at_pages">
				<select name="post_at_pages" class="at_pages chosen do-filter-by-pages" data-dropdownshowhideblock="1">
					<option value="all"<?php if ( $at_pages == 'all' ) { ?> selected="selected"<?php } ?> data-showhideblock=".do-list-exceptionpages-container"><?php esc_html_e( 'All posts and pages', 'DiviOverlays' ); ?></option>
					<option value="posts"<?php if ( $at_pages == 'posts' ) { ?> selected="selected"<?php } ?> data-showhideblock=""><?php esc_html_e( 'All posts', 'DiviOverlays' ); ?></option>
					<option value="pages"<?php if ( $at_pages == 'pages' ) { ?> selected="selected"<?php } ?> data-showhideblock=""><?php esc_html_e( 'All pages', 'DiviOverlays' ); ?></option>
					<option value="specific"<?php if ( $at_pages == 'specific' ) { ?> selected="selected"<?php } ?> data-showhideblock=".do-list-pages-container"><?php esc_html_e( 'Only specific pages', 'DiviOverlays' ); ?></option>
				</select>
				<div class="do-list-pages-container<?php if ( $at_pages == 'specific' ) { ?> do-show<?php } ?>">
					<select name="post_at_pages_selected[]" class="do-list-pages" data-placeholder="Choose posts or pages..." multiple tabindex="3">
					<?php
						if ( isset( $selectedpages[0] ) && is_array( $selectedpages[0] ) ) {
							
							foreach( $selectedpages[0] as $selectedidx => $selectedvalue ) {
								
								$post_title = get_the_title( $selectedvalue );
								
								print '<option value="' . esc_attr( $selectedvalue ) . '" selected="selected">' . esc_attr( $post_title ) . '</option>';
							}
						}
					?>
					</select>
				</div>
				<div class="do-list-exceptionpages-container<?php if ( $at_pages == 'all' ) { ?> do-show<?php } ?>">
					<h4 class="do-exceptedpages"><?php esc_html_e( 'Add Exceptions', 'DiviOverlays' ); ?>:</h4>
					<select name="post_at_exceptionpages_selected[]" class="do-list-pages" data-placeholder="Choose posts or pages..." multiple tabindex="3">
					<?php
						if ( isset( $selectedexceptpages[0] ) && is_array( $selectedexceptpages[0] ) ) {
							
							foreach( $selectedexceptpages[0] as $selectedidx => $selectedvalue ) {
								
								$post_title = get_the_title( $selectedvalue );
								
								print '<option value="' . esc_attr( $selectedvalue ) . '" selected="selected">' . esc_attr( $post_title ) . '</option>';
							}
						}
					?>
					</select>
				</div>
			</div>
			<div class="at_categories">
				<select name="category_at_categories" class="at_categories chosen do-filter-by-categories" data-dropdownshowhideblock="1">
					<option value="all"<?php if ( $at_categories == 'all' ) { ?> selected="selected"<?php } ?> data-showhideblock=".do-list-exceptioncategories-container"><?php esc_html_e( 'All categories', 'DiviOverlays' ); ?></option>
					<option value="specific"<?php if ( $at_categories == 'specific' ) { ?> selected="selected"<?php } ?> data-showhideblock=".do-list-categories-container"><?php esc_html_e( 'Only specific categories', 'DiviOverlays' ); ?></option>
				</select>
				<div class="do-list-categories-container<?php if ( $at_categories == 'specific' ) { ?> do-show<?php } ?>">
					<select name="category_at_categories_selected[]" class="do-list-categories" data-placeholder="<?php esc_html_e( 'Choose categories', 'DiviOverlays' ); ?>..." multiple tabindex="3">
					<?php
						if ( isset( $selectedcategories[0] ) && is_array( $selectedcategories[0] ) ) {
							
							foreach( $selectedcategories[0] as $selectedidx => $selectedvalue ) {
								
								$cat_name = get_cat_name( $selectedvalue );
								
								print '<option value="' . esc_attr( $selectedvalue ) . '" selected="selected">' . esc_attr( $cat_name ) . '</option>';
							}
						}
					?>
					</select>
				</div>
				<div class="do-list-exceptioncategories-container<?php if ( $at_categories == 'all' ) { ?> do-show<?php } ?>">
					<h4 class="do-exceptedcategories"><?php esc_html_e( 'Add Exceptions', 'DiviOverlays' ); ?>:</h4>
					<select name="category_at_exceptioncategories_selected[]" class="do-list-categories" data-placeholder="<?php esc_html_e( 'Choose categories', 'DiviOverlays' ); ?>..." multiple tabindex="3">
					<?php
						if ( isset( $selectedexceptcategories[0] ) && is_array( $selectedexceptcategories[0] ) ) {
							
							foreach( $selectedexceptcategories[0] as $selectedidx => $selectedvalue ) {
								
								$cat_name = get_cat_name( $selectedvalue );
								
								print '<option value="' . esc_attr( $selectedvalue ) . '" selected="selected">' . esc_attr( $cat_name ) . '</option>';
							}
						}
					?>
					</select>
				</div>
			</div>
			<div class="at_tags">
				<select name="tag_at_tags" class="at_tags chosen do-filter-by-tags" data-dropdownshowhideblock="1">
					<option value="all"<?php if ( $at_tags == 'all' ) { ?> selected="selected"<?php } ?> data-showhideblock=".do-list-exceptiontags-container"><?php esc_html_e( 'All tags', 'DiviOverlays' ); ?></option>
					<option value="specific"<?php if ( $at_tags == 'specific' ) { ?> selected="selected"<?php } ?> data-showhideblock=".do-list-tags-container"><?php esc_html_e( 'Only specific tags', 'DiviOverlays' ); ?></option>
				</select>
				<div class="do-list-tags-container<?php if ( $at_tags == 'specific' ) { ?> do-show<?php } ?>">
					<select name="tag_at_tags_selected[]" class="do-list-tags" data-placeholder="<?php esc_html_e( 'Choose tags', 'DiviOverlays' ); ?>..." multiple tabindex="3">
					<?php
						if ( isset( $selectedtags[0] ) && is_array( $selectedtags[0] ) ) {
							
							foreach( $selectedtags[0] as $selectedidx => $selectedvalue ) {
								
								$term_name = get_term( $selectedvalue );
								
								print '<option value="' . esc_attr( $selectedvalue ) . '" selected="selected">' . esc_attr( $term_name->name ) . '</option>';
							}
						}
					?>
					</select>
				</div>
				<div class="do-list-exceptiontags-container<?php if ( $at_tags == 'all' ) { ?> do-show<?php } ?>">
					<h4 class="do-exceptedtags"><?php esc_html_e( 'Add Exceptions', 'DiviOverlays' ); ?>:</h4>
					<select name="tag_at_exceptiontags_selected[]" class="do-list-tags" data-placeholder="<?php esc_html_e( 'Choose tags', 'DiviOverlays' ); ?>..." multiple tabindex="3">
					<?php
						if ( isset( $selectedexcepttags[0] ) && is_array( $selectedexcepttags[0] ) ) {
							
							foreach( $selectedexcepttags[0] as $selectedidx => $selectedvalue ) {
								
								$term_name = get_term( $selectedvalue );
								
								print '<option value="' . esc_attr( $selectedvalue ) . '" selected="selected">' . esc_attr( $term_name->name ) . '</option>';
							}
						}
					?>
					</select>
				</div>
			</div>
			<div class="divilife_meta_box">
				<p>
					<input name="do_displaylocations_archive" type="checkbox" id="do_displaylocations_archive" value="1" <?php checked( $do_displaylocations_archive[0], 1 ); ?> /> <?php esc_html_e( 'Archive', 'DiviOverlays' ); ?>
				</p>
			</div>
			<div class="divilife_meta_box">
				<p>
					<input name="do_displaylocations_author" type="checkbox" id="do_displaylocations_author" value="1" <?php checked( $do_displaylocations_author[0], 1 ); ?> /> <?php esc_html_e( 'Author', 'DiviOverlays' ); ?>
				</p>
			</div>
			<div class="divilife_meta_box">
				<p>
					<input name="do_forcerender" type="checkbox" id="do_forcerender" value="1" <?php checked( $do_forcerender[0], 1 ); ?> /> <?php esc_html_e( 'Force render', 'DiviOverlays' ); ?>
				</p>
			</div>
		</div>
		<?php
	}
	
endif;


if ( ! function_exists( 'do_manualtriggers_callback' ) ) :

	function do_manualtriggers_callback( $post ) {
		?>
		<div class="divilife_meta_box">
			<p>
				<label class="label-color-field"><p><?php esc_html_e( 'CSS Class', 'DiviOverlays' ); ?>:</label>
				divioverlay-<?php print et_core_esc_previously( $post->ID ) ?></p>
			</p>
			<div class="clear"></div> 
		</div> 
		<div class="divilife_meta_box">
			<p>
				<label class="label-color-field"><p><?php esc_html_e( 'CSS ID', 'DiviOverlays' ); ?>:</label>
				overlay_unique_id_<?php print et_core_esc_previously( $post->ID ) ?></p>
			</p>
			<div class="clear"></div> 
		</div> 
		<div class="divilife_meta_box">
			<p>
				<label class="label-color-field"><p><?php esc_html_e( 'Menu ID', 'DiviOverlays' ); ?>:</label>
				unique_overlay_menu_id_<?php print et_core_esc_previously( $post->ID ) ?></p>
			</p>
			<div class="clear"></div> 
		</div>
		<?php
	}
	
endif;


if ( ! function_exists( 'do_closecustoms_callback' ) ) :

	function do_closecustoms_callback( $post ) {
		
		wp_nonce_field( 'do_closecustoms', 'do_closecustoms_nonce' );
		
		$textcolor = get_post_meta( $post->ID, 'post_doclosebtn_text_color', true );
		$bgcolor = get_post_meta( $post->ID, 'post_doclosebtn_bg_color', true );
		$fontsize = get_post_meta( $post->ID, 'post_doclosebtn_fontsize', true );
		$borderradius = get_post_meta( $post->ID, 'post_doclosebtn_borderradius', true );
		$padding = get_post_meta( $post->ID, 'post_doclosebtn_padding', true );
		$close_cookie = get_post_meta( $post->ID, 'dov_closebtn_cookie', true );
		
		if( !isset( $fontsize ) ) {
			
			$fontsize = 25;
		}
		
		$closebtnclickingoutside = get_post_meta( $post->ID, 'post_do_closebtnclickingoutside' );
		if( !isset( $closebtnclickingoutside[0] ) ) {
			
			$closebtnclickingoutside[0] = '0';
		}
		
		$hideclosebtn = get_post_meta( $post->ID, 'post_do_hideclosebtn' );
		if( !isset( $hideclosebtn[0] ) ) {
			
			$hideclosebtn[0] = '0';
		}
		
		$customizeclosebtn = get_post_meta( $post->ID, 'post_do_customizeclosebtn' );
		if( !isset( $customizeclosebtn[0] ) ) {
			
			$customizeclosebtn[0] = '0';
		}
		
		if( $close_cookie == '' ) {
			
			$close_cookie = 0;
		}
		
		?>
		<div class="divilife_meta_box">
			<p>
				<label><?php esc_html_e( 'Close Button Cookie', 'DiviOverlays' ); ?>:</label>
				<input class="dov_closebtn_cookie" type="text" name="dov_closebtn_cookie" value="<?php echo esc_attr( $close_cookie ); ?>" readonly="readonly"> <?php esc_html_e( 'days', 'DiviOverlays' ); ?>
			</p>
			<div id="slider-doclosebtn-cookie" class="slider-bar"></div>
		</div>
		
		<div class="divilife_meta_box">
			<p>
				<input name="post_do_closebtnclickingoutside" type="checkbox" id="post_do_closebtnclickingoutside" value="1" <?php checked( $closebtnclickingoutside[0], 1 ); ?> /> <?php esc_html_e( ' Close Clicking outside the content', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box">
			<p>
				<input name="post_do_hideclosebtn" type="checkbox" id="post_do_hideclosebtn" value="1" <?php checked( $hideclosebtn[0], 1 ); ?> /> <?php esc_html_e( 'Hide Main Close Button', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box">
			<p>
				<input name="post_do_customizeclosebtn" type="checkbox" id="post_do_customizeclosebtn" value="1" class="enable_custombtn" <?php checked( $customizeclosebtn[0], 1 ); ?> /> <?php esc_html_e( 'Customize Close Button', 'DiviOverlays' ); ?>
			</p>
			<div class="enable_customizations<?php if ( $customizeclosebtn[0] == 1 ) { ?> do-show<?php } ?>">
				<div class="divilife_meta_box">
					<p>
						<label class="label-color-field"><?php esc_html_e( 'Text color', 'DiviOverlays' ); ?>:</label>
					</p>
					<p>
						<input class="doclosebtn-text-color" type="text" name="post_doclosebtn_text_color" value="<?php echo esc_attr( $textcolor ); ?>"/>
					</p>
					<div class="clear"></div> 
				</div> 
				<div class="divilife_meta_box">
					<p>
						<label class="label-color-field"><?php esc_html_e( 'Background color', 'DiviOverlays' ); ?>:</label>
					</p>
					<p>
						<input class="doclosebtn-bg-color" type="text" name="post_doclosebtn_bg_color" value="<?php echo esc_attr( $bgcolor ); ?>"/>
					</p>
					<div class="clear"></div> 
				</div>
				<div class="divilife_meta_box">
					<p>
						<label><?php esc_html_e( 'Font size', 'DiviOverlays' ); ?>:</label>
						<input class="post_doclosebtn_fontsize" type="text" name="post_doclosebtn_fontsize" value="<?php echo esc_attr( $fontsize ); ?>" readonly="readonly" > px
					</p>
					<div id="slider-doclosebtn-fontsize" class="slider-bar"></div>
				</div>
				<div class="divilife_meta_box">
					<p>
						<label><?php esc_html_e( 'Border radius', 'DiviOverlays' ); ?>:</label>
						<input class="post_doclosebtn_borderradius" type="text" name="post_doclosebtn_borderradius" value="<?php echo esc_attr( $borderradius ); ?>" readonly="readonly" > %
					</p>
					<div id="slider-doclosebtn-borderradius" class="slider-bar"></div>
				</div>
				<div class="divilife_meta_box">
					<p>
						<label><?php esc_html_e( 'Padding', 'DiviOverlays' ); ?>:</label>
						<input class="post_doclosebtn_padding" type="text" name="post_doclosebtn_padding" value="<?php echo esc_attr( $padding ); ?>" readonly="readonly" > px
					</p>
					<div id="slider-doclosebtn-padding" class="slider-bar"></div>
				</div>
				<div class="divilife_meta_box">
					<p>
						<label><?php esc_html_e( 'Preview', 'DiviOverlays' ); ?>:</label>
					</p>
					<button type="button" class="overlay-customclose-btn"><span>&times;</span></button>
				</div>
			</div>
			<div class="clear"></div> 
		</div>
		<?php
	}
	
endif;		


if ( ! function_exists( 'do_moresettings_callback' ) ) :

	function do_moresettings_callback( $post ) {
	
		wp_nonce_field( 'do_mainpage_preventscroll', 'do_mainpage_preventscroll_nonce' );
		
		$preventscroll = get_post_meta( $post->ID, 'post_do_preventscroll' );
		
		$css_selector = get_post_meta( $post->ID, 'post_css_selector', true );
		
		$enableurltrigger = get_post_meta( $post->ID, 'post_enableurltrigger' );
		
		$do_enableajax = get_post_meta( $post->ID, 'do_enableajax' );
		
		$do_showguests = get_post_meta( $post->ID, 'do_showguests' );
		
		$do_showusers = get_post_meta( $post->ID, 'do_showusers' );
		
		$do_enableesckey = get_post_meta( $post->ID, 'do_enableesckey' );
		
		
		if( !isset( $preventscroll[0] ) ) {
			
			$preventscroll[0] = '0';
		}
		
		if( !isset( $enableurltrigger[0] ) ) {
			
			$enableurltrigger[0] = '0';
		}
		
		if( !isset( $do_enableajax[0] ) ) {
			
			$do_enableajax[0] = '0';
		}
		
		if( !isset( $do_showguests[0] ) ) {
			
			$do_showguests[0] = '0';
		}
		
		if( !isset( $do_showusers[0] ) ) {
			
			$do_showusers[0] = '0';
		}
		
		if( !isset( $do_enableesckey[0] ) ) {
			
			$do_enableesckey[0] = '1';
		}
		?>
		<div class="divilife_meta_box">
			<p>
				<label>CSS <?php esc_html_e( 'Selector Trigger', 'DiviOverlays' ); ?>:</label>
				<input class="css_selector" type="text" name="post_css_selector" value="<?php echo esc_attr( $css_selector ); ?>"/>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box">
			<p>
				<label for="do_enableesckey"></label>
				<input name="do_enableesckey" type="checkbox" class="do_enableesckey" value="1" <?php checked( $do_enableesckey[0], 1 ); ?> /> <?php esc_html_e( 'Enable ESC Key (Closes the overlay when escape key is pressed)', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box">
			<p>
				<label for="post_enableurltrigger"></label>
				<input name="post_enableurltrigger" type="checkbox" class="enableurltrigger" value="1" <?php checked( $enableurltrigger[0], 1 ); ?> /> <?php esc_html_e( 'Enable URL Trigger', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box">
			<p>
				<label for="cache_results"></label>
				<input name="do_enableajax" type="checkbox" class="do_enableajax" value="1" <?php checked( $do_enableajax[0], 1 ); ?> /> <?php esc_html_e( 'Enable AJAX (Load content on call)', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box">
			<p>
				<input name="post_do_preventscroll" type="checkbox" id="post_do_preventscroll" value="1" <?php checked( $preventscroll[0], 1 ); ?> /> <?php esc_html_e( 'Prevent main page scrolling', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box">
			<p>
				<input name="do_showguests" type="checkbox" class="do_showguests" value="1" <?php checked( $do_showguests[0], 1 ); ?> /> <?php esc_html_e( 'Show for Guests only', 'DiviOverlays' ); ?>
			</p>
		</div>
		
		<div class="divilife_meta_box">
			<p>
				<input name="do_showusers" type="checkbox" class="do_showusers" value="1" <?php checked( $do_showusers[0], 1 ); ?> /> <?php esc_html_e( 'Show for Registered Users only', 'DiviOverlays' ); ?>
			</p>
		</div>
		<?php
	}
	
endif;


if ( ! function_exists( 'do_automatictriggers_callback' ) ) :

	function do_automatictriggers_callback( $post ) {
		
		$post_id = get_the_ID();
		$disablemobile = get_post_meta( $post_id, 'overlay_automatictrigger_disablemobile' );
		$disabletablet = get_post_meta( $post_id, 'overlay_automatictrigger_disabletablet' );
		$disabledesktop = get_post_meta( $post_id, 'overlay_automatictrigger_disabledesktop' );
		
		$onceperload = get_post_meta( $post_id, 'overlay_automatictrigger_onceperload' );
		
		$enable_scheduling = get_post_meta( $post_id, 'do_enable_scheduling' );
		$date_start = get_post_meta( $post->ID, 'do_date_start', true );
		$date_end = get_post_meta( $post->ID, 'do_date_end', true );
		$date_start = doConvertDateToUserTimezone( $date_start );
		$date_end = doConvertDateToUserTimezone( $date_end );
		
		$time_start = get_post_meta( $post->ID, 'do_time_start', true );
		$time_end = get_post_meta( $post->ID, 'do_time_end', true );
		
		$overlay_at_selected = get_post_meta( $post_id, 'overlay_automatictrigger', true );
		$overlay_ats = array(
			''   => esc_html__( 'None', 'Divi' ),
			'overlay-timed'   => esc_html__( 'Timed Delay', 'Divi' ),
			'overlay-scroll'    => esc_html__( 'Scroll Percentage', 'Divi' ),
			'overlay-exit' => esc_html__( 'Exit Intent', 'Divi' ),
		);
		
		for( $a = 1; $a <= 7; $a++ ) {
			
			$daysofweek[$a] = get_post_meta( $post_id, 'divioverlays_scheduling_daysofweek_' . $a );
			
			if ( !isset( $daysofweek[$a][0] ) ) {
				
				$daysofweek[$a][0] = '0';
			}
			else {
				
				$daysofweek[$a] = $daysofweek[$a][0];
			}
		}
		
		if( !isset( $disablemobile[0] ) ) {
			
			$disablemobile[0] = '1';
		}
		
		if( !isset( $disabletablet[0] ) ) {
			
			$disabletablet[0] = '0';
		}
		
		if( !isset( $disabledesktop[0] ) ) {
			
			$disabledesktop[0] = '0';
		}
		
		if( !isset( $onceperload[0] ) ) {
			
			$onceperload[0] = '1';
		}
		
		if( !isset( $enable_scheduling[0] ) ) {
			
			$enable_scheduling[0] = 0;
		}
		?>
		<p class="divi_automatictrigger_settings et_pb_single_title">
			<label for="post_overlay_automatictrigger"></label>
			<select id="post_overlay_automatictrigger" name="post_overlay_automatictrigger" class="post_overlay_automatictrigger chosen">
			<?php
			foreach ( $overlay_ats as $at_value => $at_name ) {
				printf( '<option value="%2$s"%3$s>%1$s</option>',
					esc_html( $at_name ),
					esc_attr( $at_value ),
					selected( $at_value, $overlay_at_selected, false )
				);
			} ?>
			</select>
		</p>
		
		<?php
		
			$at_timed = get_post_meta( $post->ID, 'overlay_automatictrigger_timed_value', true );
			$at_scroll_from = get_post_meta( $post->ID, 'overlay_automatictrigger_scroll_from_value', true );
			$at_scroll_to = get_post_meta( $post->ID, 'overlay_automatictrigger_scroll_to_value', true );
		?>
		<div class="divi_automatictrigger_timed<?php if ( $overlay_at_selected == 'overlay-timed' ) { ?> do-show<?php } ?>">
			<p>
				<label><?php esc_html_e( 'Specify timed delay (in seconds)', 'DiviOverlays' ); ?>:</label>
				<input class="post_at_timed" type="text" name="post_at_timed" value="<?php echo esc_attr( $at_timed ); ?>"/>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divi_automatictrigger_scroll<?php if ( $overlay_at_selected == 'overlay-scroll' ) { ?> do-show<?php } ?>">
			<p><?php esc_html_e( 'Specify in pixels or percentage', 'DiviOverlays' ); ?>:</p>
			<div class="at-scroll-settings">
				<label for="post_at_scroll_from"><?php esc_html_e( 'From', 'DiviOverlays' ); ?>:</label>
				<input class="post_at_scroll" type="text" name="post_at_scroll_from" value="<?php echo esc_attr( $at_scroll_from ); ?>"/>
				<label for="post_at_scroll_to"><?php esc_html_e( 'to', 'DiviOverlays' ); ?>:</label>
				<input class="post_at_scroll" type="text" name="post_at_scroll_to" value="<?php echo esc_attr( $at_scroll_to ); ?>"/>
			</div> 
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box do-at-devices<?php if ( strlen( $overlay_at_selected ) > 1 ) { ?> do-show<?php } ?>">
			<p>
				<input name="post_at_disablemobile" type="checkbox" id="post_at_disablemobile" value="1" <?php checked( $disablemobile[0], 1 ); ?> /> <?php esc_html_e( 'Disable On Mobile', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
			<p>
				<input name="post_at_disabletablet" type="checkbox" id="post_at_disabletablet" value="1" <?php checked( $disabletablet[0], 1 ); ?> /> <?php esc_html_e( 'Disable On Tablet', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
			<p>
				<input name="post_at_disabledesktop" type="checkbox" id="post_at_disabledesktop" value="1" <?php checked( $disabledesktop[0], 1 ); ?> /> <?php esc_html_e( 'Disable On Desktop', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box do-at-onceperload<?php if ( strlen( $overlay_at_selected ) > 1 ) { ?> do-show<?php } ?>">
			<p>
				<input name="post_at_onceperload" type="checkbox" id="post_at_onceperload" value="1" <?php checked( $onceperload[0], 1 ); ?> />
				 <?php esc_html_e( 'Display once per page load', 'DiviOverlays' ); ?>
			</p>
			<div class="clear"></div> 
		</div>
		
		<div class="divilife_meta_box do-at-scheduling<?php if ( strlen( $overlay_at_selected ) > 1 ) { ?> do-show<?php } ?>">
			<div class="divilife_meta_box">
				<p class="divioverlay_placement et_pb_single_title">
					<label for="do_enable_scheduling"><?php esc_html_e( 'Set Scheduling', 'DiviOverlays' ); ?>:</label>
					<select name="do_enable_scheduling" class="chosen divioverlay-enable-scheduling" data-dropdownshowhideblock="1">
						<option value="0"<?php if ( $enable_scheduling[0] == 0 ) { ?> selected="selected"<?php } ?>><?php esc_html_e( 'Disabled', 'DiviOverlays' ); ?></option>
						<option value="1"<?php if ( $enable_scheduling[0] == 1 ) { ?> selected="selected"<?php } ?> data-showhideblock=".do-onetime">
						<?php print esc_html__( 'Start &amp; End Time', 'DiviOverlays' ) ?>
						</option>
						<option value="2"<?php if ( $enable_scheduling[0] == 2 ) { ?> selected="selected"<?php } ?> data-showhideblock=".do-recurring">
						<?php print esc_html__( 'Recurring Scheduling', 'DiviOverlays' ) ?>
						</option>
					</select>
				</p>
			</div>
			
			<div class="row do-onetime<?php if ( $enable_scheduling[0] == 1 ) { ?> do-show<?php } ?>">
				<div class="col-xs-12">
					<label>
						<?php esc_html_e( 'Start date', 'DiviOverlays' ); ?> <br/>
						<input type="text" name="do_date_start" value="<?php print esc_attr( $date_start ) ?>" class="form-control">
					</label>
				</div>
				<div class="col-xs-12">
					<label>
						<?php esc_html_e( 'End date', 'DiviOverlays' ); ?> <br/>
						<input type="text" name="do_date_end" value="<?php print esc_attr( $date_end ) ?>" class="form-control">
					</label>
				</div>
			</div>
			
			<div class="row do-recurring<?php if ( $enable_scheduling[0] == 2 ) { ?> do-show<?php } ?>">
				<div class="col-xs-12">
					<p><input name="divioverlays_scheduling_daysofweek[]" type="checkbox" id="divioverlays_scheduling_daysofweek" value="1" <?php checked( $daysofweek[1][0], 1 ); ?> /> <?php esc_html_e( 'Monday', 'DiviOverlays' ); ?></p>
					<p><input name="divioverlays_scheduling_daysofweek[]" type="checkbox" id="divioverlays_scheduling_daysofweek" value="2" <?php checked( $daysofweek[2][0], 1 ); ?> /> <?php esc_html_e( 'Tuesday', 'DiviOverlays' ); ?></p>
					<p><input name="divioverlays_scheduling_daysofweek[]" type="checkbox" id="divioverlays_scheduling_daysofweek" value="3" <?php checked( $daysofweek[3][0], 1 ); ?> /> <?php esc_html_e( 'Wednesday', 'DiviOverlays' ); ?></p>
					<p><input name="divioverlays_scheduling_daysofweek[]" type="checkbox" id="divioverlays_scheduling_daysofweek" value="4" <?php checked( $daysofweek[4][0], 1 ); ?> /> <?php esc_html_e( 'Thursday', 'DiviOverlays' ); ?></p>
					<p><input name="divioverlays_scheduling_daysofweek[]" type="checkbox" id="divioverlays_scheduling_daysofweek" value="5" <?php checked( $daysofweek[5][0], 1 ); ?> /> <?php esc_html_e( 'Friday', 'DiviOverlays' ); ?></p>
					<p><input name="divioverlays_scheduling_daysofweek[]" type="checkbox" id="divioverlays_scheduling_daysofweek" value="6" <?php checked( $daysofweek[6][0], 1 ); ?> /> <?php esc_html_e( 'Saturday', 'DiviOverlays' ); ?></p>
					<p><input name="divioverlays_scheduling_daysofweek[]" type="checkbox" id="divioverlays_scheduling_daysofweek" value="7" <?php checked( $daysofweek[7][0], 1 ); ?> /> <?php esc_html_e( 'Sunday', 'DiviOverlays' ); ?></p>
				</div>
				<div class="col-sm-6">
					<label>
						<?php esc_html_e( 'Start Time', 'DiviOverlays' ); ?> <br/>
						<input type="text" name="do_time_start" value="<?php print esc_attr( $time_start ) ?>" class="form-control">
					</label>
					<div id="datetimepicker11"></div>
				</div>
				<div class="col-sm-6">
					<label>
						<?php esc_html_e( 'End Time', 'DiviOverlays' ); ?> <br/>
						<input type="text" name="do_time_end" value="<?php print esc_attr( $time_end ) ?>" class="form-control">
					</label>
				</div>
			</div>
			
			<div class="row">
				<div class="col-xs-12">
					<div class="do-recurring-user-msg alert alert-danger">
						
					</div>
				</div>
			</div>
			
			<div class="clear"></div> 
		</div>
		
		<?php
	}
	
endif;


if ( ! function_exists( 'do_single_animation_meta_box' ) ) :

	function do_single_animation_meta_box($post) {
		
		$post_id = get_the_ID();
		
		$et_pb_divioverlay_effect_entrance = get_post_meta( $post_id, 'et_pb_divioverlay_effect_entrance', true );
		$et_pb_divioverlay_effect_exit = get_post_meta( $post_id, 'et_pb_divioverlay_effect_exit', true );
		
		$overlay_effects_entrance = array(
		
			'Back entrances' => array(
			
				'backInDown' => esc_html__( 'Back Down', 'DiviOverlays' ), 
				'backInLeft' => esc_html__( 'Back Left', 'DiviOverlays' ),
				'backInRight' => esc_html__( 'Back Right', 'DiviOverlays' ), 
				'backInUp' => esc_html__( 'Back Up', 'DiviOverlays')
			),
			'Bouncing entrances' => array(
			
				'bounceIn' => esc_html__( 'Bounce', 'DiviOverlays' ), 
				'bounceInDown' => esc_html__( 'Bounce Down', 'DiviOverlays' ), 
				'bounceInLeft' => esc_html__( 'Bounce Left', 'DiviOverlays' ), 
				'bounceInRight' => esc_html__( 'Bounce Right', 'DiviOverlays' ), 
				'bounceInUp' => esc_html__( 'Bounce Up', 'DiviOverlays' )
			),
			'Fading entrances' => array(
			
				'fadeIn' => esc_html__( 'Fade', 'DiviOverlays' ), 
				'fadeInDown' => esc_html__( 'Fade Down', 'DiviOverlays' ), 
				'fadeInDownBig' => esc_html__( 'Fade Down Big', 'DiviOverlays' ), 
				'fadeInLeft' => esc_html__( 'Fade Left', 'DiviOverlays' ), 
				'fadeInLeftBig' => esc_html__( 'Fade Left Big', 'DiviOverlays' ), 
				'fadeInRight' => esc_html__( 'Fade Right', 'DiviOverlays' ), 
				'fadeInRightBig' => esc_html__( 'Fade Right Big', 'DiviOverlays' ), 
				'fadeInUp' => esc_html__( 'Fade Up', 'DiviOverlays' ), 
				'fadeInUpBig' => esc_html__( 'Fade Up Big', 'DiviOverlays' ), 
				'fadeInTopLeft' => esc_html__( 'Fade Top Left', 'DiviOverlays' ), 
				'fadeInTopRight' => esc_html__( 'Fade Top Right', 'DiviOverlays' ), 
				'fadeInBottomLeft' => esc_html__( 'Fade Bottom Left', 'DiviOverlays' ), 
				'fadeInBottomRight' => esc_html__( 'Fade Bottom Right', 'DiviOverlays' )
			),
			'Flippers entrances' => array(
			
				'flipInX' => esc_html__( 'Flip Vertically', 'DiviOverlays' ), 
				'flipInY' => esc_html__( 'Flip Horizontally', 'DiviOverlays' )
			),
			'Lightspeed entrances' => array(
			
				'lightSpeedInRight' => esc_html__( 'LightSpeed Right to Left', 'DiviOverlays' ), 
				'lightSpeedInLeft' => esc_html__( 'LightSpeed Left to Right', 'DiviOverlays' )
			),
			'Rotating entrances' => array(
			
				'rotateIn' => esc_html__( 'Rotate', 'DiviOverlays' ), 
				'rotateInDownLeft' => esc_html__( 'Rotate Down Left', 'DiviOverlays' ), 
				'rotateInDownRight' => esc_html__( 'Rotate Down Right', 'DiviOverlays' ), 
				'rotateInUpLeft' => esc_html__( 'Rotate Up Left', 'DiviOverlays' ), 
				'rotateInUpRight' => esc_html__( 'Rotate Up Right', 'DiviOverlays' )
			),
			'Specials entrances' => array(
			
				'hinge' => esc_html__( 'Hinge', 'DiviOverlays' ), 
				'jackInTheBox' => esc_html__( 'Jack In The Box', 'DiviOverlays' ), 
				'rollIn' => esc_html__( 'Roll', 'DiviOverlays' ), 
				'doorOpen' => esc_html__( 'Door Close', 'DiviOverlays' ), 
				'swashIn' => esc_html__( 'Swash', 'DiviOverlays' ),
				'foolishIn' => esc_html__( 'Foolish', 'DiviOverlays' ),
				'puffIn' => esc_html__( 'Puff', 'DiviOverlays' ),
				'vanishIn' => esc_html__( 'Vanish', 'DiviOverlays' )
			),
			'Zooming entrances' => array(
			
				'zoomIn' => esc_html__( 'Zoom', 'DiviOverlays' ), 
				'zoomInDown' => esc_html__( 'Zoom Down', 'DiviOverlays' ), 
				'zoomInLeft' => esc_html__( 'Zoom Left', 'DiviOverlays' ), 
				'zoomInRight' => esc_html__( 'Zoom Right', 'DiviOverlays' ), 
				'zoomInUp' => esc_html__( 'Zoom Up', 'DiviOverlays' )
			),
			'Sliding entrances' => array(
			
				'slideInDown' => esc_html__( 'Slide Down', 'DiviOverlays' ),
				'slideInLeft' => esc_html__( 'Slide Left', 'DiviOverlays' ),
				'slideInRight' => esc_html__( 'Slide Right', 'DiviOverlays' ),
				'slideInUp' => esc_html__( 'Slide Up', 'DiviOverlays' )
			)
		);
		
		$overlay_effects_exits = array(
		
			'Back exits' => array(
			
				'backOutDown' => esc_html__( 'Back Down', 'DiviOverlays' ), 
				'backOutLeft' => esc_html__( 'Back Left', 'DiviOverlays' ), 
				'backOutRight' => esc_html__( 'Back Right', 'DiviOverlays' ), 
				'backOutUp' => esc_html__( 'Back Up', 'DiviOverlays' )
			),
			'Bouncing exits' => array(
			
				'bounceOut' => esc_html__( 'Bounce', 'DiviOverlays' ), 
				'bounceOutDown' => esc_html__( 'Bounce Down', 'DiviOverlays' ), 
				'bounceOutLeft' => esc_html__( 'Bounce Left', 'DiviOverlays' ), 
				'bounceOutRight' => esc_html__( 'Bounce Right', 'DiviOverlays' ), 
				'bounceOutUp' => esc_html__( 'Bounce Up', 'DiviOverlays' )
			),
			'Fading exits' => array(
			
				'fadeOut' => esc_html__( 'Fade', 'DiviOverlays' ), 
				'fadeOutDown' => esc_html__( 'Fade Down', 'DiviOverlays' ), 
				'fadeOutDownBig' => esc_html__( 'Fade Down Big', 'DiviOverlays' ), 
				'fadeOutLeft' => esc_html__( 'Fade Left', 'DiviOverlays' ), 
				'fadeOutLeftBig' => esc_html__( 'Fade Left Big', 'DiviOverlays' ), 
				'fadeOutRight' => esc_html__( 'Fade Right', 'DiviOverlays' ), 
				'fadeOutRightBig' => esc_html__( 'Fade Right Big', 'DiviOverlays' ), 
				'fadeOutUp' => esc_html__( 'Fade Up', 'DiviOverlays' ), 
				'fadeOutUpBig' => esc_html__( 'Fade Up Big', 'DiviOverlays' ), 
				'fadeOutTopLeft' => esc_html__( 'Fade Top Left', 'DiviOverlays' ), 
				'fadeOutTopRight' => esc_html__( 'Fade Top Right', 'DiviOverlays' ), 
				'fadeOutBottomRight' => esc_html__( 'Fade Bottom Right', 'DiviOverlays' ), 
				'fadeOutBottomLeft' => esc_html__( 'Fade Bottom Left', 'DiviOverlays' )
			),
			'Rotating exits' => array(
			
				'rotateOut' => esc_html__( 'Rotate', 'DiviOverlays' ), 
				'rotateOutDownLeft' => esc_html__( 'Rotate Down Left', 'DiviOverlays' ), 
				'rotateOutDownRight' => esc_html__( 'Rotate Down Right', 'DiviOverlays' ), 
				'rotateOutUpLeft' => esc_html__( 'Rotate Up Left', 'DiviOverlays' ), 
				'rotateOutUpRight' => esc_html__( 'Rotate Up Right', 'DiviOverlays' )
			),
			'Flippers exits' => array(
			
				'flipOutX' => esc_html__( 'Flip Vertically', 'DiviOverlays' ), 
				'flipOutY' => esc_html__( 'Flip Horizontally', 'DiviOverlays' )
			),
			'Lightspeed exits' => array(
			
				'lightSpeedOutRight' => esc_html__( 'LightSpeed Right', 'DiviOverlays' ), 
				'lightSpeedOutLeft' => esc_html__( 'LightSpeed Left', 'DiviOverlays' )
			),
			'Specials exits' => array(
				'rollOut' => esc_html__( 'Roll Out', 'DiviOverlays' ),
				'doorClose' => esc_html__( 'Door Open', 'DiviOverlays' ),
				'swashOut' => esc_html__( 'Swash', 'DiviOverlays' ),
				'foolishOut' => esc_html__( 'Foolish', 'DiviOverlays' ),
				'holeOut' => esc_html__( 'To the space', 'DiviOverlays' ),
				'puffOut' => esc_html__( 'Puff', 'DiviOverlays' ),
				'vanishOut' => esc_html__( 'Vanish', 'DiviOverlays' )
			),
			'Zooming exits' => array(
			
				'zoomOut' => esc_html__( 'Zoom', 'DiviOverlays' ),
				'zoomOutDown' => esc_html__( 'Zoom Down', 'DiviOverlays' ),
				'zoomOutLeft' => esc_html__( 'Zoom Left', 'DiviOverlays' ),
				'zoomOutRight' => esc_html__( 'Zoom Right', 'DiviOverlays' ),
				'zoomOutUp' => esc_html__( 'Zoom Up', 'DiviOverlays' )
			),
			'Sliding exits' => array(
			
				'slideOutDown' => esc_html__( 'Slide Down', 'DiviOverlays' ),
				'slideOutLeft' => esc_html__( 'Slide Left', 'DiviOverlays' ),
				'slideOutRight' => esc_html__( 'Slide Right', 'DiviOverlays' ),
				'slideOutUp' => esc_html__( 'Slide Up', 'DiviOverlays' )
			)
		);
		
		?>
		<p class="et_pb_page_settings et_pb_single_title">
			<label for="et_pb_divioverlay_effect_entrance_hidden" style="display: block; font-weight: bold; margin-bottom: 5px;"><?php esc_html_e( 'Select Animation Entrance', 'DiviOverlays' ); ?>: </label>
			<select id="et_pb_divioverlay_effect_entrance_hidden" name="et_pb_divioverlay_effect_entrance_hidden" class="do-hide">
			<?php
			
			foreach ( $overlay_effects_entrance as $overlay_effects_title => $overlay_effects_animations ) {
				
				print '<optgroup label="' . esc_html( $overlay_effects_title ) . '">';
				
				foreach ( $overlay_effects_animations as $overlay_value => $overlay_name ) {
					
					printf( '<option value="%2$s"%3$s>%1$s</option>',
						esc_html( $overlay_name ),
						esc_attr( $overlay_value ),
						selected( $overlay_value, $et_pb_divioverlay_effect_entrance, false )
					);
				}
				
				print '</optgroup>';
			}
			
			$dov_effect_entrance_speed = get_post_meta( $post_id, 'dov_effect_entrance_speed', true );
			
			if ( $dov_effect_entrance_speed === '' ) {
				
				$dov_effect_entrance_speed = 1;
			}
			
			?>
			</select>
			<select id="et_pb_divioverlay_effect_entrance" name="et_pb_divioverlay_effect_entrance" class="overlay-animations"></select>
			<div class="divilife_meta_box">
				<div class="slider-bar-customhandle-label inline-block">
					<label for="dov_effect_entrance_speed"><?php esc_html_e( 'Speed', 'DiviOverlays' ); ?>:</label>
				</div>
				<div id="slider-animationentrance" class="slider-bar-customhandle inline-block" data-slidebar="#et_pb_divioverlay_effect_entrance" data-demobox=".divioverlay-demo-box-entrance">
					<input class="dov_effect_entrance_speed ui-slider-field hidden" type="text" name="dov_effect_entrance_speed" value="<?php echo esc_attr( $dov_effect_entrance_speed ); ?>" readonly="readonly">
					<div class="ui-slider-handle"></div>
				</div>
			</div>
			<div class="divioverlay-demo-container">
				<div class="divioverlay-demo-bg"></div>
				<div class="divioverlay-demo-box divioverlay-demo-box-entrance animate__animated">
					<div class="divi-life-logo-container">
						<img class="divi-life-logo-icon" src="<?php print et_core_intentionally_unescaped( plugins_url( '/', __FILE__ ) . 'assets/img/divi-life-logo-icon.svg', 'fixed_string' ) ?>" alt="Divi Life" width="36" height="36">
					</div>
				</div>
			</div>
		</p>
		<p class="et_pb_page_settings et_pb_single_title">
			<label for="et_pb_divioverlay_effect_exit_hidden"><?php esc_html_e( 'Select Animation Exit', 'DiviOverlays' ); ?>: </label>
			<select id="et_pb_divioverlay_effect_exit_hidden" name="et_pb_divioverlay_effect_exit_hidden" class="do-hide">
			<?php
			
			foreach ( $overlay_effects_exits as $overlay_effects_title => $overlay_effects_animations ) {
				
				print '<optgroup label="' . esc_html( $overlay_effects_title ) . '">';
				
				foreach ( $overlay_effects_animations as $overlay_value => $overlay_name ) {
					
					printf( '<option value="%2$s"%3$s>%1$s</option>',
						esc_html( $overlay_name ),
						esc_attr( $overlay_value ),
						selected( $overlay_value, $et_pb_divioverlay_effect_exit, false )
					);
				}
				
				print '</optgroup>';
			}
			
			$dov_effect_exit_speed = get_post_meta( $post_id, 'dov_effect_exit_speed', true );
			if ( $dov_effect_exit_speed === '' ) {
				
				$dov_effect_exit_speed = 1;
			}
			
			?>
			</select>
			<select id="et_pb_divioverlay_effect_exit" name="et_pb_divioverlay_effect_exit" class="overlay-animations"></select>
			<div class="divilife_meta_box">
				<div class="slider-bar-customhandle-label inline-block">
					<label for="dov_effect_exit_speed"><?php esc_html_e( 'Speed', 'DiviOverlays' ); ?>:</label>
				</div>
				<div id="slider-animationexit" class="slider-bar-customhandle inline-block" data-slidebar="#et_pb_divioverlay_effect_exit" data-demobox=".divioverlay-demo-box-exit">
					<input class="dov_effect_exit_speed ui-slider-field hidden" type="text" name="dov_effect_exit_speed" value="<?php echo esc_attr( $dov_effect_exit_speed ); ?>" readonly="readonly">
					<div class="ui-slider-handle"></div>
				</div>
			</div>
			<div class="divioverlay-demo-container">
				<div class="divioverlay-demo-bg"></div>
				<div class="divioverlay-demo-box divioverlay-demo-box-exit animate__animated">
					<div class="divi-life-logo-container">
						<img class="divi-life-logo-icon" src="<?php print et_core_intentionally_unescaped( plugins_url( '/', __FILE__ ) . 'assets/img/divi-life-logo-icon.svg', 'fixed_string' ) ?>" alt="Divi Life" width="36" height="36">
					</div>
				</div>
			</div>
		</p>
		
	<?php }
	
endif;


// Save Meta Box Value //
/*========================= Color Picker ============================*/
function overlay_color_box_callback( $post ) {	
	wp_nonce_field( 'overlay_color_box', 'overlay_color_box_nonce' );
	$color = get_post_meta( $post->ID, 'post_overlay_bg_color', true );
	
	$do_enablebgblur = get_post_meta( $post->ID, 'do_enablebgblur' );
	if( !isset( $do_enablebgblur[0] ) ) {
		
		$do_enablebgblur[0] = '0';
	}
	?>
	<div class="divilife_meta_box">
		<p>
			<label class="label-color-field"><?php esc_html_e( 'Select Overlay Background Color', 'DiviOverlays' ); ?>: </label>
			<input class="cs-wp-color-picker" type="text" name="post_bg" value="<?php echo esc_attr( $color ) ?>"/>
		</p>
	</div>
	<div class="divilife_meta_box">
		<input name="do_enablebgblur" type="checkbox" id="do_enablebgblur" value="1" <?php checked( $do_enablebgblur[0], 1 ); ?> /> <?php esc_html_e( 'Enable Background Blur', 'DiviOverlays' ); ?>
	</div> 
	<script type="text/javascript">
		(function( $ ) {
			// Add Color Picker to all inputs that have 'color-field' class
			$(function() { $('.color-field').wpColorPicker(); });
		})( jQuery );
	</script>
	<?php
}

function divi_overlay_config( $hook ) {
	
	// enqueue style
	wp_register_style( 'divi-overlays-wp-color-picker', DOV_PLUGIN_URL . 'assets/css/admin/cs-wp-color-picker.min.css', array( 'wp-color-picker' ), '1.0.0', 'all' );
	wp_register_script( 'divi-overlays-wp-color-picker', DOV_PLUGIN_URL . 'assets/js/admin/cs-wp-color-picker.min.js', array( 'wp-color-picker' ), '1.0.0', true );
	
	wp_register_style( 'divi-overlays-select2', DOV_PLUGIN_URL . 'assets/css/admin/select2.4.0.9.min.css', array(), '4.0.9', 'all' );
	wp_register_script( 'divi-overlays-select2', DOV_PLUGIN_URL . 'assets/js/admin/select2.4.0.9.min.js', array('jquery'), '4.0.9', true );
	wp_register_style( 'divi-overlays-select2-bootstrap', DOV_PLUGIN_URL . 'assets/css/admin/select2-bootstrap.min.css', array('divi-overlays-admin-bootstrap'), '1.0.0', 'all' );
	
	
	/* Scheduling requirements */
	wp_register_script( 'divi-overlays-datetime-moment', '//cdn.jsdelivr.net/momentjs/latest/moment.min.js', array('jquery'), '1.0.0', true );
	wp_register_script( 'divi-overlays-datetime-moment-timezone', '//cdn.jsdelivr.net/npm/moment-timezone@0.5.13/builds/moment-timezone-with-data.min.js', array('jquery'), '1.0.0', true );
	wp_register_style( 'divi-overlays-admin-bootstrap', DOV_PLUGIN_URL . 'assets/css/admin/bootstrap.css', array(), '1.0.0', 'all' );
	wp_register_script( 'divi-overlays-datetime-bootstrap', '//maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js', array('jquery'), '1.0.0', true );
	wp_register_script( 'divi-overlays-datetime-bootstrap-select', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/js/bootstrap-select.min.js', array('jquery'), '1.0.0', true );
	wp_register_style( 'divi-overlays-admin-bootstrap-select', '//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.1/css/bootstrap-select.min.css', array(), '1.0.0', 'all' );
	
	/* Include Date Range Picker */
	wp_register_style( 'divi-overlays-datetime-corecss', DOV_PLUGIN_URL . 'assets/css/admin/bootstrap-datetimepicker.min.css', array( 'divi-overlays-admin-bootstrap' ), '1.0.0', 'all' );
	wp_register_script( 'divi-overlays-datetime-corejs', DOV_PLUGIN_URL . 'assets/js/admin/bootstrap-datetimepicker.min.js', array( 'jquery', 'divi-overlays-datetime-bootstrap' ), '1.0.0', true );
	
	// Force jQuery UI because Divi won't include it when Builder is not enabled/active
	wp_register_style( 'jquery_ui_css', DOV_PLUGIN_URL . 'assets/css/admin/jquery-ui-1.12.1.custom.css', array(), '1.12.1', 'all' );
	
	wp_register_style( 'divi-overlays-animate-style', '//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', array(), '1.0.0', 'all' );
	wp_register_style( 'divi-overlays-customanimations', DOV_PLUGIN_URL . 'assets/css/custom_animations.css', array(), '1.0.0', 'all' );
	
	wp_register_style( 'divi-overlays-admin', DOV_PLUGIN_URL . 'assets/css/admin/admin.css', array(), '1.0.0', 'all' );
	wp_register_script( 'divi-overlays-admin-functions', DOV_PLUGIN_URL . 'assets/js/admin/admin-functions.js', array( 'jquery', 'jquery-ui-core', 'jquery-ui-slider', 'divi-overlays-select2' ), '1.0.0', true );
	
	add_filter('is_protected_meta', 'removefields_from_customfieldsmetabox', 10, 2);
}
add_action('admin_init', 'divi_overlay_config');


function divi_overlay_high_priority_includes( $hook ) {
	
	if ( !dov_is_divi_builder_enabled() ) {
	
		$screen = get_current_screen();
		
		if ( $screen->post_type != 'divi_overlay' ) {
			return;
		}
		
		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_style( 'divi-overlays-wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'divi-overlays-wp-color-picker' );
		
		wp_enqueue_script( 'divi-overlays-datetime-moment' );
		wp_enqueue_script( 'divi-overlays-datetime-moment-timezone' );
		wp_enqueue_style( 'divi-overlays-admin-bootstrap' );
		wp_enqueue_script( 'divi-overlays-datetime-bootstrap' );
		wp_enqueue_script( 'divi-overlays-datetime-bootstrap-select' );
		wp_enqueue_style( 'divi-overlays-admin-bootstrap-select' );
		
		wp_enqueue_style( 'divi-overlays-select2' );
		wp_enqueue_style( 'divi-overlays-select2-bootstrap' );
		wp_enqueue_script( 'divi-overlays-select2' );
		
		wp_enqueue_style( 'divi-overlays-datetime-corecss' );
		wp_enqueue_script( 'divi-overlays-datetime-corejs' );
		
		// Force jQuery UI because Divi won't include it when Builder is not enabled/active
		wp_enqueue_style( 'jquery_ui_css' );
		
		wp_enqueue_style('divi-overlays-animate-style');
		wp_enqueue_style('divi-overlays-customanimations');
		
		wp_enqueue_style( 'divi-overlays-admin' );
		wp_enqueue_script( 'divi-overlays-admin-functions' );
	}
}
add_action('admin_enqueue_scripts', 'divi_overlay_high_priority_includes', '999');


/*===================================================================*/

// Save Meta Box Value //
function et_divi_overlay_settings_save_details( $post_id, $post ) {
	
	global $pagenow;
	
	// Only set for post_type = divi_overlay
	if ( 'divi_overlay' !== $post->post_type ) {
		return;
	}

	if ( 'post.php' !== $pagenow ) return $post_id;

	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;

	$post_type = get_post_type_object( $post->post_type );
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;
	
	if ( !isset( $_POST['divioverlays_displaylocations_nonce'] ) ) {
		
		return;
	}
	
	$nonce = sanitize_text_field( wp_unslash( $_POST['divioverlays_displaylocations_nonce'] ) );
	if ( ! wp_verify_nonce( $nonce, 'divioverlays_displaylocations' ) ) {
		
		 die();
	}
	
	
	$post_value = '';
	if ( isset( $_POST['et_pb_divioverlay_effect_entrance'] ) ) {
		
		$post_value = sanitize_option( 'et_pb_divioverlay_effect_entrance', wp_unslash( $_POST['et_pb_divioverlay_effect_entrance'] ) );
		update_post_meta( $post_id, 'et_pb_divioverlay_effect_entrance', $post_value );
		
	} else {
		
		update_post_meta( $post_id, 'et_pb_divioverlay_effect_entrance', '' );
	}
	
	$post_value = '';
	if ( isset( $_POST['et_pb_divioverlay_effect_exit'] ) ) {
		
		$post_value = sanitize_option( 'et_pb_divioverlay_effect_exit', wp_unslash( $_POST['et_pb_divioverlay_effect_exit'] ) );
		update_post_meta( $post_id, 'et_pb_divioverlay_effect_exit', $post_value );
		
	} else {
		
		update_post_meta( $post_id, 'et_pb_divioverlay_effect_exit', '' );
	}
	
	if ( isset( $_POST['dov_effect_entrance_speed'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['dov_effect_entrance_speed'] ) );
		update_post_meta( $post_id, 'dov_effect_entrance_speed', $post_value );
	}
	
	if ( isset( $_POST['dov_effect_exit_speed'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['dov_effect_exit_speed'] ) );
		update_post_meta( $post_id, 'dov_effect_exit_speed', $post_value );
	}
	
	if ( isset( $_POST['post_bg'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['post_bg'] ) );
		update_post_meta( $post_id, 'post_overlay_bg_color', $post_value );
	}
	
	if ( isset( $_POST['do_enablebgblur'] ) ) {
		
		$do_enablebgblur = 1;
		
	} else {
		
		$do_enablebgblur = 0;
	}
	update_post_meta( $post_id, 'do_enablebgblur', $do_enablebgblur );
	
	if ( isset( $_POST['post_do_preventscroll'] ) ) {
		
		$post_do_preventscroll = 1;
		
	} else {
		
		$post_do_preventscroll = 0;
	}
	update_post_meta( $post_id, 'post_do_preventscroll', $post_do_preventscroll );
	
	
	/* Display Locations */
	
	/* By Posts */
	if ( isset( $_POST['post_at_pages'] ) ) {
		
		$post_value = sanitize_option( 'post_at_pages', wp_unslash( $_POST['post_at_pages'] ) );
		update_post_meta( $post_id, 'do_at_pages', $post_value );
	}
	
	if ( $post_value == 'specific' ) {
		
		if ( isset( $_POST['post_at_pages_selected'] ) ) {
			
			$post_value = sanitize_option( 'post_at_pages_selected', wp_unslash( $_POST['post_at_pages_selected'] ) );
			update_post_meta( $post_id, 'do_at_pages_selected', $post_value );
		}
		else {
			
			update_post_meta( $post_id, 'do_at_pages_selected', '' );
		}
	}
	else {
		
		update_post_meta( $post_id, 'do_at_pages_selected', '' );
	}
		
	if ( isset( $_POST['post_at_exceptionpages_selected'] ) ) {
	
		$post_value = sanitize_option( 'post_at_exceptionpages_selected', wp_unslash( $_POST['post_at_exceptionpages_selected'] ) );
		update_post_meta( $post_id, 'do_at_pagesexception_selected', $post_value );
	}
	else {
		
		update_post_meta( $post_id, 'do_at_pagesexception_selected', '' );
	}
		
	/* By Categories */
	$category_at_categories = '';
	if ( isset( $_POST['category_at_categories'] ) ) {
		
		$category_at_categories = sanitize_option( 'category_at_categories', wp_unslash( $_POST['category_at_categories'] ) );
		update_post_meta( $post_id, 'category_at_categories', $category_at_categories );
	}
	
	if ( $category_at_categories == 'specific' ) {
		
		if ( isset( $_POST['category_at_categories_selected'] ) ) {
			
			$post_value = sanitize_option( 'category_at_categories_selected', wp_unslash( $_POST['category_at_categories_selected'] ) );
			update_post_meta( $post_id, 'category_at_categories_selected', $post_value );
		}
	}
	else {
		
		update_post_meta( $post_id, 'category_at_categories_selected', '' );
	}
	
	if ( isset( $_POST['category_at_exceptioncategories_selected'] ) ) {
	
		$post_value = sanitize_option( 'category_at_exceptioncategories_selected', wp_unslash( $_POST['category_at_exceptioncategories_selected'] ) );
		update_post_meta( $post_id, 'category_at_exceptioncategories_selected', $post_value );
	}
	else {
		
		update_post_meta( $post_id, 'category_at_exceptioncategories_selected', '' );
	}
	
	/* By Tags */
	$tag_at_tags = '';
	if ( isset( $_POST['tag_at_tags'] ) ) {
		
		$tag_at_tags = sanitize_option( 'tag_at_tags', wp_unslash( $_POST['tag_at_tags'] ) );
		update_post_meta( $post_id, 'tag_at_tags', $tag_at_tags );
	}
	
	if ( $tag_at_tags == 'specific' ) {
		
		if ( isset( $_POST['tag_at_tags_selected'] ) ) {
			
			$post_value = sanitize_option( 'tag_at_tags_selected', wp_unslash( $_POST['tag_at_tags_selected'] ) );
			update_post_meta( $post_id, 'tag_at_tags_selected', $post_value );
		}
	}
	else {
		
		update_post_meta( $post_id, 'tag_at_tags_selected', '' );
	}
	
	if ( isset( $_POST['tag_at_exceptiontags_selected'] ) ) {
	
		$post_value = sanitize_option( 'tag_at_exceptiontags_selected', wp_unslash( $_POST['tag_at_exceptiontags_selected'] ) );
		update_post_meta( $post_id, 'tag_at_exceptiontags_selected', $post_value );
	}
	else {
		
		update_post_meta( $post_id, 'tag_at_exceptiontags_selected', '' );
	}
	
	/* By Archive */
	if ( isset( $_POST['do_displaylocations_archive'] ) ) {
		
		$do_displaylocations_archive = 1;
		
	} else {
		
		$do_displaylocations_archive = 0;
	}
	update_post_meta( $post_id, 'do_displaylocations_archive', $do_displaylocations_archive );
	
	/* By Author */
	if ( isset( $_POST['do_displaylocations_author'] ) ) {
		
		$do_displaylocations_author = 1;
		
	} else {
		
		$do_displaylocations_author = 0;
	}
	update_post_meta( $post_id, 'do_displaylocations_author', $do_displaylocations_author );
	
	/* By Force render */
	if ( isset( $_POST['do_forcerender'] ) ) {
		
		$do_forcerender = 1;
		
	} else {
		
		$do_forcerender = 0;
	}
	update_post_meta( $post_id, 'do_forcerender', $do_forcerender );
	
	
	/* Additional Settings */
	if ( isset( $_POST['post_css_selector'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['post_css_selector'] ) );
		update_post_meta( $post_id, 'post_css_selector', $post_value );
	}
	
	if ( isset( $_POST['css_selector_at_pages'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['css_selector_at_pages'] ) );
		update_post_meta( $post_id, 'css_selector_at_pages', $post_value );
	}
	
	if ( $post_value == 'specific' ) {
		
		if ( isset( $_POST['css_selector_at_pages_selected'] ) ) {
			
			$post_value = sanitize_text_field( wp_unslash( $_POST['css_selector_at_pages_selected'] ) );
			update_post_meta( $post_id, 'css_selector_at_pages_selected', $post_value );
		}
	}
	else {
		
		update_post_meta( $post_id, 'css_selector_at_pages_selected', '' );
	}
	
	if ( isset( $_POST['post_enableurltrigger'] ) ) {
		
		$post_enableurltrigger = 1;
		
	} else {
		
		$post_enableurltrigger = 0;
	}
	update_post_meta( $post_id, 'post_enableurltrigger', $post_enableurltrigger );
	
	
	if ( isset( $_POST['do_enableajax'] ) ) {
		
		$do_enableajax = 1;
		
	} else {
		
		$do_enableajax = 0;
	}
	update_post_meta( $post_id, 'do_enableajax', $do_enableajax );
	
	
	if ( isset( $_POST['do_showguests'] ) ) {
		
		$do_showguests = 1;
		
	} else {
		
		$do_showguests = 0;
	}
	update_post_meta( $post_id, 'do_showguests', $do_showguests );
	
	
	if ( isset( $_POST['do_showusers'] ) ) {
		
		$do_showusers = 1;
		
	} else {
		
		$do_showusers = 0;
	}
	update_post_meta( $post_id, 'do_showusers', $do_showusers );
	
	
	if ( isset( $_POST['do_enableesckey'] ) ) {
		
		$do_enableesckey = 1;
		
	} else {
		
		$do_enableesckey = 0;
	}
	update_post_meta( $post_id, 'do_enableesckey', $do_enableesckey );
	
	
	// Automatic Triggers
	if ( isset( $_POST['post_overlay_automatictrigger'] ) && $_POST['post_overlay_automatictrigger'] != '' ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['post_overlay_automatictrigger'] ) );
		update_post_meta( $post_id, 'overlay_automatictrigger', $post_value );
	
		if ( isset( $_POST['post_at_timed'] ) ) {
			
			$post_value = sanitize_text_field( wp_unslash( $_POST['post_at_timed'] ) );
			update_post_meta( $post_id, 'overlay_automatictrigger_timed_value', $post_value );
		}
		
		if ( isset( $_POST['post_at_scroll_from'] ) || isset( $_POST['post_at_scroll_to'] ) ) {
			
			$post_value = sanitize_text_field( wp_unslash( $_POST['post_at_scroll_from'] ) );
			update_post_meta( $post_id, 'overlay_automatictrigger_scroll_from_value', $post_value );
			
			$post_value = sanitize_text_field( wp_unslash( $_POST['post_at_scroll_to'] ) );
			update_post_meta( $post_id, 'overlay_automatictrigger_scroll_to_value', $post_value );
		}
		
		if ( isset( $_POST['post_at_disablemobile'] ) ) {
			
			$post_at_disablemobile = 1;
			
		} else {
			
			$post_at_disablemobile = 0;
		}
		
		if ( isset( $_POST['post_at_disabletablet'] ) ) {
			
			$post_at_disabletablet = 1;
			
		} else {
			
			$post_at_disabletablet = 0;
		}
		
		if ( isset( $_POST['post_at_disabledesktop'] ) ) {
			
			$post_at_disabledesktop = 1;
			
		} else {
			
			$post_at_disabledesktop = 0;
		}
		
		
		if ( isset( $_POST['post_at_onceperload'] ) ) {
			
			$post_at_onceperload = 1;
			
		} else {
			
			$post_at_onceperload = 0;
		}
		
		update_post_meta( $post_id, 'overlay_automatictrigger_onceperload', $post_at_onceperload );
		
		
	} else {
		
		update_post_meta( $post_id, 'overlay_automatictrigger', 0 );
		update_post_meta( $post_id, 'overlay_automatictrigger_onceperload', 0 );
		$post_at_disablemobile = 0;
		$post_at_disabletablet = 0;
		$post_at_disabledesktop = 0;
	}
	update_post_meta( $post_id, 'overlay_automatictrigger_disablemobile', $post_at_disablemobile );
	update_post_meta( $post_id, 'overlay_automatictrigger_disabletablet', $post_at_disabletablet );
	update_post_meta( $post_id, 'overlay_automatictrigger_disabledesktop', $post_at_disabledesktop );
	
	
	/* Close Button Customizations */
	if ( isset( $_POST['dov_closebtn_cookie'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['dov_closebtn_cookie'] ) );
		update_post_meta( $post_id, 'dov_closebtn_cookie', $post_value );
	}
	
	
	if ( isset( $_POST['post_do_closebtnclickingoutside'] ) ) {
		
		$post_do_closebtnclickingoutside = 1;
		
	} else {
		
		$post_do_closebtnclickingoutside = 0;
	}
	update_post_meta( $post_id, 'post_do_closebtnclickingoutside', $post_do_closebtnclickingoutside );
	
	
	if ( isset( $_POST['post_do_hideclosebtn'] ) ) {
		
		$post_do_hideclosebtn = 1;
		
	} else {
		
		$post_do_hideclosebtn = 0;
	}
	update_post_meta( $post_id, 'post_do_hideclosebtn', $post_do_hideclosebtn );
	
	if ( isset( $_POST['post_do_customizeclosebtn'] ) ) {
		
		$post_do_customizeclosebtn = 1;
		
	} else {
		
		$post_do_customizeclosebtn = 0;
	}
	update_post_meta( $post_id, 'post_do_customizeclosebtn', $post_do_customizeclosebtn );
	
	if ( isset( $_POST['post_doclosebtn_text_color'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['post_doclosebtn_text_color'] ) );
		update_post_meta( $post_id, 'post_doclosebtn_text_color', $post_value );
	}
	
	if ( isset( $_POST['post_doclosebtn_bg_color'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['post_doclosebtn_bg_color'] ) );
		update_post_meta( $post_id, 'post_doclosebtn_bg_color', $post_value );
	}
	
	if ( isset( $_POST['post_doclosebtn_fontsize'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['post_doclosebtn_fontsize'] ) );
		update_post_meta( $post_id, 'post_doclosebtn_fontsize', $post_value );
	}
	
	if ( isset( $_POST['post_doclosebtn_borderradius'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['post_doclosebtn_borderradius'] ) );
		update_post_meta( $post_id, 'post_doclosebtn_borderradius', $post_value );
	}
	
	if ( isset( $_POST['post_doclosebtn_padding'] ) ) {
		
		$post_value = sanitize_text_field( wp_unslash( $_POST['post_doclosebtn_padding'] ) );
		update_post_meta( $post_id, 'post_doclosebtn_padding', $post_value );
	}
	
	
	/* Save Scheduling */
	if ( isset( $_POST['do_enable_scheduling'] ) ) {
		
		$enable_scheduling = (int) $_POST['do_enable_scheduling'];
		
	} else {
		
		$enable_scheduling = 0;
	}
	update_post_meta( $post_id, 'do_enable_scheduling', $enable_scheduling );
	
	/* Save Scheduling */
	if ( $enable_scheduling ) {
		
		$timezone = DOV_SERVER_TIMEZONE;
		
		$wp_timezone = wp_timezone();
		
		if ( $wp_timezone !== false ) {
			
			$timezone = $wp_timezone;
		}
		
		if ( $enable_scheduling == 1 ) {
			
			if ( isset( $_POST['do_date_start'] ) ) {
				
				$post_value = sanitize_text_field( wp_unslash( $_POST['do_date_start'] ) );
				$date_string = doConvertDateToUTC( $post_value, $timezone );
				update_post_meta( $post_id, 'do_date_start', $date_string );
			}
			
			if ( isset( $_POST['do_date_end'] ) ) {
				
				$post_value = sanitize_text_field( wp_unslash( $_POST['do_date_end'] ) );
				$date_string = doConvertDateToUTC( $post_value, $timezone );
				update_post_meta( $post_id, 'do_date_end', $date_string );
			}
		}
		
		if ( $enable_scheduling == 2 ) {
			
			if ( isset( $_POST['do_time_start'] ) ) {
				
				$date_string = sanitize_text_field( wp_unslash( $_POST['do_time_start'] ) );
				update_post_meta( $post_id, 'do_time_start', $date_string );
			}
			
			if ( isset( $_POST['do_time_end'] ) ) {
				
				$date_string = sanitize_text_field( wp_unslash( $_POST['do_time_end'] ) );
				update_post_meta( $post_id, 'do_time_end', $date_string );
			}
			
			if ( isset( $_POST['divioverlays_scheduling_daysofweek'] ) ) {
			
				$daysofweek = array_map( 'sanitize_text_field', wp_unslash( $_POST['divioverlays_scheduling_daysofweek'] ) );
				
				// Reset all daysofweek values
				for( $a = 1; $a <= 7; $a++ ) {
					update_post_meta( $post_id, 'divioverlays_scheduling_daysofweek_' . $a, 0 );
				}
				
				foreach( $daysofweek as $day ) {
					update_post_meta( $post_id, 'divioverlays_scheduling_daysofweek_' . $day, 1);
				}
			}
		}
	}
	
	// Clear all Divi cache
	DiviOverlays::super_clear_cache();
	
	return $post_id;
}
add_action( 'save_post_divi_overlay', 'et_divi_overlay_settings_save_details', 10, 2 );

function et_save_post_not_divi_overlay( $post_id, $post ) {
	
	global $pagenow;
	
	if ( 'post.php' !== $pagenow ) return $post_id;
	
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE )
		return $post_id;
	
	$post_type = get_post_type_object( $post->post_type );
	if ( ! current_user_can( $post_type->cap->edit_post, $post_id ) )
		return $post_id;
	
	// Clear all Divi cache
	DiviOverlays::super_clear_cache();
}

function doConvertDateToUTC( $date = null, $timezone = DOV_SERVER_TIMEZONE, $format = DOV_SCHEDULING_DATETIME_FORMAT ) {
			
	if ( $date === null ) {
		
		return;
	}
	
	if ( !doValidateDate( $date, $format ) ) {
		
		return;
	}
	
	$timezone = wp_timezone();
	
	$date = new DateTime( $date, $timezone );
	$str_server_now = $date->format( $format );
	
	return $str_server_now;
}


function doConvertDateToUserTimezone( $date = null, $format = DOV_SCHEDULING_DATETIME_FORMAT ) {
			
	if ( $date === null ) {
		
		return;
	}
	
	if ( !doValidateDate( $date, $format ) ) {
		
		return;
	}
	
	$timezone = wp_timezone();
	
	$date = new DateTime( $date, $timezone );
	$str_server_now = $date->format( $format );
	
	return $str_server_now;
}

function doValidateDate( $dateStr, $format ) {
			
	$date = DateTime::createFromFormat($format, $dateStr);
	return $date && ($date->format($format) === $dateStr);
}


function dov_is_divi_builder_enabled() {
	
	// phpcs:ignore WordPress.Security.NonceVerification.Recommended
	if ( isset( $_GET['et_fb'] ) ) {
		
		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$divi_builder_enabled = sanitize_text_field( wp_unslash( $_GET['et_fb'] ) );
		
		// is divi theme builder ?
		if ( $divi_builder_enabled === '1' ) {
			
			return TRUE;
		}
	}
	
	return FALSE;
}

function showOverlay( $overlay_id = NULL ) {
	
	if ( dov_is_divi_builder_enabled() ) { return; }
	
	ob_start();
	
	global $wp_embed;
	
    if ( !is_numeric( $overlay_id ) )
        return NULL;
	
	$overlay_id = (int) $overlay_id;
    
	$post_data = get_post( $overlay_id );
	
	$post_content = $post_data->post_content;
	
	$at_type = get_post_meta( $overlay_id, 'overlay_automatictrigger', true );
	
	/* Scheduling */
	if ( $at_type !== '' && $at_type !== '0' ) {
			
		$enable_scheduling = get_post_meta( $post_data->ID, 'do_enable_scheduling' );
		
		if( !isset( $enable_scheduling[0] ) ) {
			
			$enable_scheduling[0] = 0;
		}
		
		$enable_scheduling = (int) $enable_scheduling[0];
		
		if ( $enable_scheduling ) {
			
			$timezone = DOV_SERVER_TIMEZONE;
			
			$timezone = new DateTimeZone( $timezone );
			
			$wp_timezone = wp_timezone();
			
			if ( $wp_timezone !== false ) {
				
				$timezone = $wp_timezone;
			}
			
			$date_now = current_datetime();
			
			// Start & End Time
			if ( $enable_scheduling == 1 ) {
				
				$date_start = get_post_meta( $post_data->ID, 'do_date_start', true );
				$date_end = get_post_meta( $post_data->ID, 'do_date_end', true );
				
				$date_start = doConvertDateToUserTimezone( $date_start );
				$date_start = new DateTimeImmutable( $date_start, $timezone );
				
				if ( $date_start >= $date_now ) {
					
					return;
				}
				
				if ( $date_end != '' ) {
				
					$date_end = doConvertDateToUserTimezone( $date_end );
					$date_end = new DateTimeImmutable( $date_end, $timezone );
					
					if ( $date_end <= $date_now ) {
						
						return;
					}
				}
			}
			
			
			// Recurring Scheduling
			if ( $enable_scheduling == 2 ) {
				
				$wNum = $date_now->format( 'N' );
				
				$is_today = get_post_meta( $post_data->ID, 'divioverlays_scheduling_daysofweek_' . $wNum );
				
				if ( isset( $is_today[0] ) && $is_today[0] == 1 ) {
					
					$is_today = $is_today[0];
					
					$time_start = get_post_meta( $post_data->ID, 'do_time_start', true );
					$time_end = get_post_meta( $post_data->ID, 'do_time_end', true );
					$schedule_start = null;
					$schedule_end = null;
					
					if ( $time_start != '' ) {
						
						$time_start_24 = gmdate( 'H:i', strtotime( $time_start ) );
						$time_start_24 = explode( ':', $time_start_24 );
						$time_start_now = new DateTimeImmutable( 'now', $timezone );
						$schedule_start = $time_start_now->setTime( $time_start_24[0], $time_start_24[1], 0 );
					}
					
					if ( $time_end != '' ) {
						
						$time_end_24 = gmdate( 'H:i', strtotime( $time_end ) );
						$time_end_24 = explode( ':', $time_end_24 );
						$time_end_now = new DateTimeImmutable( 'now', $timezone );
						$schedule_end = $time_end_now->setTime( $time_end_24[0], $time_end_24[1], 0 );
					}
					
					if ( ( $time_start != '' && $time_end != '' && $schedule_start >= $date_now && $schedule_end > $date_now )
						|| ( $time_start != '' && $time_end != '' && $schedule_start <= $date_now && $schedule_end < $date_now )
						|| ( $time_start != '' && $time_end == '' && $schedule_start <= $date_now )
						|| ( $time_start == '' && $time_end != '' && $schedule_end < $date_now )
						) {
						
						return;
					}
				} else {
					
					return;
				}
			}
		}
	}
	/* End Scheduling */
	
	$et_pb_divioverlay_effect_entrance = get_post_meta( $post_data->ID, 'et_pb_divioverlay_effect_entrance', true );
	$et_pb_divioverlay_effect_exit = get_post_meta( $post_data->ID, 'et_pb_divioverlay_effect_exit', true );
	$dov_effect_entrance_speed = get_post_meta( $post_data->ID, 'dov_effect_entrance_speed', true );
	$dov_effect_exit_speed = get_post_meta( $post_data->ID, 'dov_effect_exit_speed', true );
	
	$bgcolor = get_post_meta( $post_data->ID, 'post_overlay_bg_color', true );
	
	$do_enablebgblur = get_post_meta( $post_data->ID, 'do_enablebgblur' );
	if ( isset( $do_enablebgblur[0] ) ) {
		
		$do_enablebgblur = $do_enablebgblur[0];
		
	} else {
		
		$do_enablebgblur = 0;
	}
	
	$preventscroll = get_post_meta( $post_data->ID, 'post_do_preventscroll' );
	if ( isset( $preventscroll[0] ) ) {
		
		$preventscroll = $preventscroll[0];
		
	} else {
		
		$preventscroll = 0;
	}
	
	
	$enableesckey = get_post_meta( $post_data->ID, 'do_enableesckey' );
	if ( isset( $enableesckey[0] ) ) {
		
		$enableesckey = $enableesckey[0];
		
	} else {
		
		$enableesckey = 1;
	}
	
	
	$closebtnclickingoutside = get_post_meta( $post_data->ID, 'post_do_closebtnclickingoutside' );
	if ( isset( $closebtnclickingoutside[0] ) ) {
		
		$closebtnclickingoutside = $closebtnclickingoutside[0];
		
	} else {
		
		$closebtnclickingoutside = 0;
	}
	
	$hideclosebtn = get_post_meta( $post_data->ID, 'post_do_hideclosebtn' );
	if ( isset( $hideclosebtn[0] ) ) {
		
		$hideclosebtn = $hideclosebtn[0];
		
	} else {
		
		$hideclosebtn = 0;
	}
	
		$customizeclosebtn = get_post_meta( $post_data->ID, 'post_do_customizeclosebtn' );
		if( !isset( $customizeclosebtn[0] ) ) {
			
			$customizeclosebtn[0] = '0';
		}
		
		$close_cookie = get_post_meta( $post_data->ID, 'dov_closebtn_cookie', true );
		if( !isset( $close_cookie ) ) {
			
			$close_cookie = 1;
		}
		
		$enableajax = (int) get_post_meta( $post_data->ID, 'do_enableajax', true );
		if( !isset( $enableajax ) ) {
			
			$enableajax = 0;
		}
		
		if ( $enableajax === 1 ) {
			
			$output = '';
			
		} else {
			
			$DiviOverlaysCore = new DiviOverlaysCore( $post_data->ID );
			
			$DiviOverlaysCore->start_module_index_override();
			
			// Override global post to allow third-party Dynamic Content in render
			// in our Divi post
			global $post;
			$post = $post_data;
			setup_postdata( $post_data );
			
			$wp_embed->post_ID = $post_data->ID;
			
			// Process the [embed] shortcodes
			$wp_embed->run_shortcode( $post_content );
			
			// Passes any unlinked URLs that are on their own line
			$wp_embed->autoembed( $post_content );
			
			// Search content for shortcodes and filter shortcodes through their hooks
			$output = do_shortcode( $post_content );
			
			// Reset global post data
			wp_reset_postdata();
			
			// Divi builder layout is rendered only on singular template
			// Force render singular template
			// phpcs:ignore WordPress.Security.NonceVerification.Recommended
			$is_bfb_new_page = isset( $_GET['is_new_page'] ) && '1' === $_GET['is_new_page'];
			
			$output = et_builder_get_layout_opening_wrapper() . $output . et_builder_get_layout_closing_wrapper();
			$output = et_builder_get_builder_content_opening_wrapper() . $output . et_builder_get_builder_content_closing_wrapper();
			
			// Builder automatically adds `#et-boc` on selector on non official post type
			// Avoid having 2 elements with the same id in the same page
			// $output = str_replace( 'id="et-boc"', '', $output );
			
			// Monarch fix: Remove Divi Builder main section class and add it later with JS
			$output = str_replace( 'et_pb_section ', 'dov_dv_section ', $output );
			
			$DiviOverlaysCore->end_module_index_override();
		}
		
	?>
	<div id="divi-overlay-container-<?php print et_core_esc_previously( $overlay_id ) ?>" class="overlay-container">
	<div class="divioverlay-bg animate__animated"></div>
		<div id="overlay-<?php print et_core_esc_previously( $post_data->ID ) ?>" class="divioverlay" style="display:none;"
		data-bgcolor="<?php print et_core_esc_previously( $bgcolor ) ?>" data-enablebgblur="<?php print et_core_esc_previously( $do_enablebgblur ) ?>" data-preventscroll="<?php print et_core_esc_previously( $preventscroll ) ?>"
 data-enableesckey="<?php print et_core_esc_previously( $enableesckey ) ?>"		
		data-scrolltop="" data-cookie="<?php print et_core_esc_previously( $close_cookie ) ?>" data-enableajax="<?php print et_core_esc_previously( $enableajax ) ?>" data-contentloaded="0" data-animationin="<?php print et_core_esc_previously( $et_pb_divioverlay_effect_entrance ) ?>" data-animationout="<?php print et_core_esc_previously( $et_pb_divioverlay_effect_exit ) ?>" data-animationspeedin="<?php print et_core_esc_previously( $dov_effect_entrance_speed ) ?>" data-animationspeedout="<?php print et_core_esc_previously( $dov_effect_exit_speed ) ?>" data-closeclickingoutside="<?php print et_core_esc_previously( $closebtnclickingoutside ) ?>">
			
			<?php if ( $hideclosebtn == 0 ) { ?>
			<a href="javascript:;" class="overlay-close overlay-customclose-btn-<?php print et_core_esc_previously( $overlay_id ) ?>"><span class="<?php if ( $customizeclosebtn[0] == 1 ) { ?>custom_btn<?php } ?>">&times;</span></a>
			<?php } ?>
			
			<div class="animate__animated entry-content">
			<?php 
				
				print et_core_esc_previously( $output );
				
			?>
			</div>
			
		</div>
	</div>
	<?php 
		
	return ob_get_clean();
}


function setHeightWidthSrc($s, $width, $height)
{
  return preg_replace(
    '@^<iframe\s*title="(.*)"\s*width="(.*)"\s*height="(.*)"\s*src="(.*?)"\s*(.*?)</iframe>$@s',
    '<iframe title="\1" width="' . $width . '" height="' . $height . '" src="\4?wmode=transparent" \5</iframe>',
    $s
  );
}

class DiviOverlaysCore {
	
	/**
	 * @var \WP_Filesystem_Base|null
	 */
	public static $wpfs;
	
	/**
	 * @var ET_Core_Data_Utils
	 */
	public static $data_utils;
	
	private static $slug = 'divioverlays-divi-custom-styles';
	
	private static $post_id;
	
	private static $ID = 0;
	
	private static $module_index = - 1;
	
	private static $filename;
	
	private static $file_extension;
	
	private static $cache_dir;
	
	public function __construct( $post_id = 0 ) {
		
		self::$ID = $post_id;
	}
	
	
	public static function start_module_index_override() {
		if ( ! class_exists( 'ET_Builder_Element' ) ) {
			return;
		}
		
		ET_Builder_Element::begin_theme_builder_layout( self::$ID );

		add_filter(
			'et_pb_module_shortcode_attributes',
			array( 'DiviOverlaysCore', 'do_module_index_override' )
		);
	}
	
	public static function end_module_index_override() {
		if ( ! class_exists( 'ET_Builder_Element' ) ) {
			return;
		}
		
		ET_Builder_Element::end_theme_builder_layout();

		global $et_pb_predefined_module_index;

		unset( $et_pb_predefined_module_index );
	}
	
	public static function do_module_index_override( $value = '' ) {
		global $et_pb_predefined_module_index;

		self::$module_index ++;
		$et_pb_predefined_module_index = sprintf(
			'dov_%1$s_%2$s',
			self::$ID,
			self::$module_index
		);

		return $value;
	}
	
	public static function init( $post_id = 0 ) {
		
		if ( $post_id != 0 ) {
			
			global $wp_filesystem;
			self::$wpfs = $wp_filesystem;
			
			self::$data_utils = new ET_Core_Data_Utils();
			
			$custom_divi_css = '';
			
			self::$post_id = $post_id;
			
			$custom_divi_css = ET_Builder_Element::get_style();
			
			// Builder automatically adds `#et-boc` on selectors for non-legacy post types
			$custom_divi_css = str_replace( '#et-boc ', '', $custom_divi_css );
			
			// Remove #page-container from Divi Cached Inline Styles tag and cloning it to prevent issues
			$custom_divi_css = str_replace( '#page-container ', '', $custom_divi_css );
			
			// Remove .et_pb_extra_column_main from Divi Styles prevent cascade issues with Divi Overlays
			$custom_divi_css = str_replace( '.et_pb_extra_column_main', ' ', $custom_divi_css );
			
			self::$filename = 'et-custom-divioverlays-' . self::$post_id;
			self::$file_extension = '.min.css';
			self::$cache_dir = ET_Core_PageResource::get_cache_directory();
			
			$url = self::createResourceFile( $custom_divi_css );
			
			$id_ref = 'dov-custom-' . et_core_esc_previously( self::$post_id );
			
			wp_register_style( $id_ref, esc_url( set_url_scheme( $url ) ), array(), DOV_VERSION, 'all' );
			wp_enqueue_style( $id_ref );
		}
	}
	

	private static function createResourceFile( $data, $check_cache_only = false ) {
		
		// Static resource file doesn't exist
		$time = (string) microtime( true );
		$time = str_replace( '.', '', $time );
		
		$relative_path = '/' . self::$post_id . '/' . self::$filename . '-' . $time . self::$file_extension;
		
		$files = glob( self::$cache_dir . '/' . self::$post_id . '/' . 'et-custom-divioverlays-' . self::$post_id . '-[0-9]*' . self::$file_extension );
		
		$create_resource = true;
		
		if ( $files ) {
			
			$the_files = $files;
			$file = array_pop( $the_files );
			
			$now = time();
			$cache_content_date = filemtime( $file );
			
			$cache_since = $now - $cache_content_date;
			
			// A day passed? refresh cache
			if ( $cache_since > 86400 ) {
				
				// There may be multiple files for this resource. Let's delete the extras.
				foreach ( $files as $extra_file ) {
					
					self::$wpfs->delete( $extra_file );
				}
				
				$create_resource = true;
		
			} else {
				
				$url = et_core_cache_dir()->url;
				$path = self::$data_utils->normalize_path( $file );
				$relative_path = et_()->path( $url, self::$post_id, basename( $path ) );
			
				$create_resource = false;
			}
		}
			
		if ( $create_resource === true && $check_cache_only === true ) {
			
			return false;
		}
		
		if ( $create_resource === true ) {
			
			if ( $data === '' ) {
				
				return 'no data';
			}
			
			$file = self::$cache_dir . $relative_path;
			
			$directoryName = self::$cache_dir . '/' . self::$post_id;
			
			// Check if the directory already exists.
			if ( !is_dir( $directoryName ) ) {
				
				// Directory does not exist, so lets create it.
				mkdir( $directoryName, 0755 );
			}
			
			if ( is_writable( self::$cache_dir ) ) {
				
				self::$wpfs->put_contents( $file, $data, 0644 );
			}
			
			$relative_divi_path  = self::$cache_dir;
			$relative_divi_path .= $relative_path;
			
			$start = strpos( $relative_divi_path, 'et-cache' );
			$parse = substr( $relative_divi_path, $start );
			
			$relative_path = content_url( $parse );
		}
		
		return $relative_path;
	}
	
	
	public static function getDiviStylesManager() {
	
		if ( wp_doing_ajax() || wp_doing_cron() || ( is_admin() && ! is_customize_preview() ) ) {
			return;
		}
		
		/** @see ET_Core_SupportCenter::toggle_safe_mode */
		if ( et_core_is_safe_mode_active() ) {
			return;
		}
		
		$all_resources = ET_Core_PageResource::get_resources();
		
		$enqueued_resources = array();
		
		foreach( $all_resources as $resource ) {
			
			if ( $resource->enqueued === true ) {
				
				$enqueued_resources[] = $resource;
			}
		}
		
		return $enqueued_resources;
	}
	
	
	public static function getRender( $post_id = NULL, $avoidRenderTags = 0, $divilifepost = false ) {
		
		try {
			
			if ( !is_numeric( $post_id ) ) {
				
				throw new InvalidArgumentException( 'DiviOverlaysCore::getRender > $post_id is not numeric');
			}
			
		} catch (Exception $e) {
		
			DiviOverlays::log( $e );
		}
		
		$post_data = get_post( $post_id );
		
		$content = $post_data->post_content;
		
		$render['post_data'] = $post_data;
		$render['output'] = $content;
		
		return $render;
	}
}


$on_license_page = false;
// Check if this was called from License page
if ( isset( $_SERVER['HTTP_REFERER'] ) ) {
	
	$referer = sanitize_text_field( wp_unslash( $_SERVER['HTTP_REFERER'] ) );
	
	$on_license_page = strpos( $referer, 'page=dovs-settings' );
}

// This is not required on post edit or license page
if ( !is_admin() && !dov_is_divi_builder_enabled() && $on_license_page === false ) {
	
	// phpcs:ignore WordPress.Security.NonceVerification
	if ( !isset( $_GET['divioverlays_id'] ) && !isset( $_GET['action'] ) ) {
		
		// Add WooCommerce class names on Divi Overlays posts which uses WooCommerce modules
		add_action( 'wp_head', 'checkAllDiviOverlays', 7 );
	}
	
	add_action( 'wp_footer', 'getAllDiviOverlays', 8 );
}


function checkAllDiviOverlays() {
	
	if ( class_exists( 'WooCommerce' ) ) {
		
		$classes = get_body_class();
		
		if ( !in_array( 'woocommerce', $classes ) 
			&& !in_array( 'woocommerce-page', $classes ) 
			&& function_exists( 'et_builder_has_woocommerce_module' ) ) {
			
			$overlays_in_current = getAllDiviOverlays( false );
			
			if ( is_array( $overlays_in_current ) && count( $overlays_in_current ) > 0 ) {
				
				foreach( $overlays_in_current as $overlay_id ) {
				
					$overlay_id = (int) $overlay_id;
					
					$post = get_post( $overlay_id );
					
					$has_wc_module = et_builder_has_woocommerce_module( $post->post_content );
					
					if ( $has_wc_module === true ) {
						
						add_filter( 'body_class', function( $classes ) {
							
							$classes[] = 'woocommerce';
							$classes[] = 'woocommerce-page';
							
							return $classes;
						} );
						
						// Load WooCommerce related scripts
						divi_overlays_load_wc_scripts();
						
						return;
					}
				}
			}
		}
	}
	
	// Support Slider Revolution by ThemePunch
	// Reset global vars to prevent any conflicts
	global $rs_material_icons_css, $rs_material_icons_css_parsed;
	
	$rs_material_icons_css = false;
	$rs_material_icons_css_parsed = false;
	
	
	// Support Gravity Forms Styles Pro
	// Restore dequeue Gravity Forms styles
	wp_enqueue_style( 'gforms_css' );
	wp_enqueue_style( 'gforms_reset_css' );
	wp_enqueue_style( 'gforms_formsmain_css' );
	wp_enqueue_style( 'gforms_ready_class_css' );
	wp_enqueue_style( 'gforms_browsers_css' );
	
	
	// Support Caldera Forms
	if ( class_exists( 'Caldera_Forms_Render_Assets' ) ) {
		
		Caldera_Forms_Render_Assets::register();
		
		wp_enqueue_script( 'cf-baldrick' );
		wp_enqueue_script( 'cf-ajax' );
	}
	
	add_filter( 'et_pb_set_style_selector', 'divi_overlays_et_pb_set_style_selector', 10, 2 );
}

function divi_overlays_et_pb_set_style_selector( $selector, $function_name ) {
	
	// Extra theme support
	if ( function_exists( 'extra_layout_used' ) ) {
	
		// List of module slugs that need to be prefixed
		$prefixed_modules = apply_filters( 'extra_layout_prefixed_selectors', array(
			'et_pb_section',
			'et_pb_row',
			'et_pb_row_inner',
			'et_pb_column',
		));
						
		// Prefixing selectors in Extra layout
		if ( extra_layout_used() || ( is_et_pb_preview() && isset( $_GET['is_extra_layout'] ) ) && in_array( $function_name, $prefixed_modules ) ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
			if ( 'default' === ET_Builder_Element::get_theme_builder_layout_type() ) {
				
				$extra_extra_db = '.et_extra_layout .et_pb_extra_column_main .et-db ';
				$extra_extra_without_db = '.et_extra_layout .et_pb_extra_column_main '; 
				
				if ( $extra_extra_db === substr( $selector, 0, 49 ) ) {
					
					$selector = str_replace( $extra_extra_db, $extra_extra_without_db, $selector );
				}
				
				$extra_extra_bodydb = '.et_extra_layout .et_pb_extra_column_main body.et-db ';
				$extra_extra_without_bodydb = '.et_extra_layout ';
				
				if ( $extra_extra_bodydb === substr( $selector, 0, 53 ) ) {
					
					$selector = str_replace( $extra_extra_bodydb, $extra_extra_without_bodydb, $selector );
				}
			}
		}
	}
	
	return $selector;
}
		

function divi_overlays_load_wc_scripts() {
	
	if ( ! class_exists( 'WC_Frontend_Scripts' ) && function_exists( 'et_core_is_fb_enabled' ) && ! et_core_is_fb_enabled() ) {
		return;
	}

	// Simply enqueue the scripts; All of them have been registered
	if ( 'yes' === get_option( 'woocommerce_enable_ajax_add_to_cart' ) ) {
		wp_enqueue_script( 'wc-add-to-cart' );
	}

	if ( current_theme_supports( 'wc-product-gallery-zoom' ) ) {
		wp_enqueue_script( 'zoom' );
	}
	if ( current_theme_supports( 'wc-product-gallery-slider' ) ) {
		wp_enqueue_script( 'flexslider' );
	}
	if ( current_theme_supports( 'wc-product-gallery-lightbox' ) ) {
		wp_enqueue_script( 'photoswipe-ui-default' );
		wp_enqueue_style( 'photoswipe-default-skin' );

		add_action( 'wp_footer', 'woocommerce_photoswipe' );
	}
	wp_enqueue_script( 'wc-single-product' );

	if ( 'geolocation_ajax' === get_option( 'woocommerce_default_customer_address' ) ) {
		$ua = strtolower( wc_get_user_agent() ); // Exclude common bots from geolocation by user agent.

		if ( ! strstr( $ua, 'bot' ) && ! strstr( $ua, 'spider' ) && ! strstr( $ua, 'crawl' ) ) {
			wp_enqueue_script( 'wc-geolocation' );
		}
	}

	wp_enqueue_script( 'woocommerce' );
	wp_enqueue_script( 'wc-cart-fragments' );

	// Enqueue style
	$wc_styles = WC_Frontend_Scripts::get_styles();

	foreach ( $wc_styles as $style_handle => $wc_style ) {
		if ( ! isset( $wc_style['has_rtl'] ) ) {
			$wc_style['has_rtl'] = false;
		}

		wp_enqueue_style( $style_handle, $wc_style['src'], $wc_style['deps'], $wc_style['version'], $wc_style['media'], $wc_style['has_rtl'] );
	}
}


function _do_avoidRenderTags( $content = NULL, $restore = false ) {
	
	if ( !$content ) {
		
		return '';
	}
	
	try {
		
		if ( !$restore ) {
			
			$content = str_replace( '[et_pb_video', '[et_pb_video_divioverlaystemp', $content );
			$content = str_replace( '[/et_pb_video]', '[/et_pb_video_divioverlaystemp]', $content );
			
			$content = str_replace( '[et_pb_contact_form', '[et_pb_contact_form_divioverlaystemp', $content );
			$content = str_replace( '[/et_pb_contact_form]', '[/et_pb_contact_form_divioverlaystemp]', $content );
			
			$content = str_replace( '[woocommerce_checkout]', '[woocommerce_checkout_divioverlaystemp]', $content );
			$content = str_replace( '[et_pb_wc_add_to_cart', '[et_pb_wc_add_to_cart_divioverlaystemp]', $content );
			
			$content = str_replace( '[ultimatemember', '[ultimatemember_divioverlaystemp]', $content );
		
		} else {
			
			$content = str_replace( '[et_pb_video_divioverlaystemp', '[et_pb_video', $content );
			$content = str_replace( '[/et_pb_video_divioverlaystemp]', '[/et_pb_video]', $content );
			
			$content = str_replace( '[et_pb_contact_form_divioverlaystemp', '[et_pb_contact_form', $content );
			$content = str_replace( '[/et_pb_contact_form_divioverlaystemp]', '[/et_pb_contact_form]', $content );
			
			$content = str_replace( '[woocommerce_checkout_divioverlaystemp]', '[woocommerce_checkout]', $content );
			$content = str_replace( '[et_pb_wc_add_to_cart_divioverlaystemp', '[et_pb_wc_add_to_cart]', $content );
			
			$content = str_replace( '[ultimatemember_divioverlaystemp', '[ultimatemember]', $content );
		}
	
	} catch ( Exception $e ) {
	
		DiviOverlays::log( $e );
	}
	
	return $content;
}


function searchForDiviOverlays( $content = NULL ) {
	
	$divioverlays_in_content = array();
		
	if ( !$content ) {
		
		return $divioverlays_in_content;
	}
	
	// Old patterns
	$matches = array();
	$pattern = '/id="(.*?overlay_[0-9]+)"/';
	preg_match_all($pattern, $content, $matches);
	
	$overlays_overlay_ = $matches[1];
	
	$matches = array();
	$pattern = '/id="(.*?overlay_unique_id_[0-9]+)"/';
	preg_match_all($pattern, $content, $matches);
	
	$overlays_overlay_unique_id_ = $matches[1];
	
	$matches = array();
	$pattern = '/class="(.*?divioverlay\-[0-9]+)"/';
	preg_match_all($pattern, $content, $matches);
	
	$overlays_class_overlay = $matches[1];
	
	// New patterns
	$matches = array();
	$pattern = '/.*class\s*=\s*["\'].*divioverlay\-[0-9]+/';
	preg_match_all($pattern, $content, $matches);
	
	$found_overlays_byclass_2 = $matches[0];
	
	$matches = array();
	$pattern = '/href="\#(.*?overlay\-[0-9]+)"/';
	preg_match_all($pattern, $content, $matches);
	
	$found_overlays_byhrefhash = $matches[1];
	
	$matches = array();
	$pattern = '/url="#(.*?overlay\-[0-9]+)"/';
	preg_match_all($pattern, $content, $matches);
	
	$found_overlays_byurlhash = $matches[1];
	
	$matches = array();
	$pattern = '/(?=<[^>]+(?=[\s+\"\']overlay\-[0-9]+[\s+\"\']).+)([^>]+>)/';
	preg_match_all($pattern, $content, $matches);
	
	$found_overlays_onanyattr = $matches[0];
	
	$matches = array();
	$pattern = '/module_id="(.*?overlay_unique_id_[0-9]+)"/';
	preg_match_all($pattern, $content, $matches);
	
	$found_overlays_divimoduleid = $matches[1];
	
	$matches = array();
	$pattern = '/.*module_class\s*=\s*["\'].*divioverlay\-[0-9]+/';
	preg_match_all($pattern, $content, $matches);
	
	$found_overlays_divimoduleclass = $matches[0];
	
	$divioverlays_found = array_merge( $overlays_overlay_, $overlays_overlay_unique_id_, $overlays_class_overlay, $found_overlays_byclass_2, $found_overlays_byhrefhash, $found_overlays_byurlhash, $found_overlays_onanyattr, $found_overlays_divimoduleid, $found_overlays_divimoduleclass);
	
	if ( is_array( $divioverlays_found ) && count( $divioverlays_found ) > 0 ) {
		
		$divioverlays_in_content = array_flip( array_filter( array_map( 'prepareOverlays', $divioverlays_found ) ) );
	}
		
	return $divioverlays_in_content;
}


function getAllDiviOverlays( $render = true ) {
	
	if ( !class_exists( 'DiviExtension' ) ) {
		
		return;
	}
	
	$render = ( $render === '' ) ? true : false;
	
	/* Search Divi Overlay in current post */
	global $post;
	
	$overlays_in_post = array();
	
	if ( is_object( $post ) ) {
		
		try {
			
			if ( !$post ) {
				
				throw new InvalidArgumentException( 'getAllDiviOverlays() > Required var $post');
			}
			
			if ( ! isset( $post->ID ) ) {
				
				throw new InvalidArgumentException( 'getAllDiviOverlays() > Couldn\'t find property $post->ID');
			}
			
			$avoidRenderTags = 1;
			
			if ( $render === false ) {
				
				$avoidRenderTags = 0;
			}
			
			$content = DiviOverlaysCore::getRender( $post->ID, $avoidRenderTags );
			
			$content = $content['output'];
		
		} catch (Exception $e) {
		
			DiviOverlays::log( $e );
			
			$content = '';
		}
		
		$overlays_in_post = searchForDiviOverlays( $content );
	}
	
	
	/* Search Divi Overlay in active menus */
	$theme_locations = get_nav_menu_locations();
	
	$overlays_in_menus = array();
	
	if ( is_array( $theme_locations ) && count( $theme_locations ) > 0 ) {
		
		foreach( $theme_locations as $theme_location => $theme_location_value ) {
			
			$menu = get_term( $theme_locations[$theme_location], 'nav_menu' );
			
			// menu exists?
			if( !is_wp_error($menu) && NULL !== $menu ) {
				
				$menu_term_id = $menu->term_id;
				
				// Support WPML for menus
				if ( function_exists( 'icl_object_id' ) ) {
					$menu_term_id = icl_object_id( $menu_term_id, 'nav_menu' );
				}
				
				$menu_items = wp_get_nav_menu_items( $menu_term_id );
				
				foreach ( (array) $menu_items as $key => $menu_item ) {
					
					$url = $menu_item->url;
					
					$extract_id = prepareOverlays( $url );
					
					if ( $extract_id ) {
						
						$overlays_in_menus[ $extract_id ] = 1;
					}
					
					/* Search Divi Overlay in menu classes */
					if ( isset( $menu_item->classes[0] ) && $menu_item->classes[0] != '' && count( $menu_item->classes ) > 0 ) {
						
						foreach ( $menu_item->classes as $key => $class ) {
							
							if ( $class != '' ) {
								
								$extract_id = prepareOverlays( $class );
								
								if ( $extract_id ) {
								
									$overlays_in_menus[ $extract_id ] = 1;
								}
							}
						}
					}
					
					/* Search Divi Overlay in Link Relationship (XFN) */
					if ( !empty( $menu_item->xfn ) ) {
						
						$extract_id = prepareOverlays( $menu_item->xfn );
						
						if ( $extract_id ) {
						
							$overlays_in_menus[ $extract_id ] = 1;
						}
					}
				}
			}
		}
	}
	
	$overlays_in_menus = array_filter( $overlays_in_menus );
	
	
	/* Search CSS Triggers in all Divi Overlays */
	$args = array(
		'meta_key'   => 'post_css_selector',
		'meta_value' => '',
		'meta_compare' => '!=',
		'post_type' => 'divi_overlay',
		'cache_results'  => false,
		'posts_per_page' => -1
	);
	
	$posts = get_posts( $args );
	
	$overlays_with_css_trigger = array();
	
	if ( isset( $posts[0] ) ) {
		
		if ( $render ) {
		
			print '<script type="text/javascript">var overlays_with_css_trigger = {';
		}
		
		foreach( $posts as $dv_post ) {
			
			$post_id = $dv_post->ID;
			
			$get_css_selector = get_post_meta( $post_id, 'post_css_selector' );
				
			$css_selector = $get_css_selector[0];
			
			if ( $css_selector != '' ) {
				
				if ( $render ) {
					
					print '\'' . et_core_esc_previously( $post_id ) . '\': \'' . et_core_esc_previously( $css_selector ) . '\',';
				}
				
				$overlays_with_css_trigger[ $post_id ] = $css_selector;
			}
		}
		
		if ( $render ) {
			
			print '};</script>';
		}
	}
	wp_reset_postdata();
	
	/* Search URL Triggers in all Divi Overlays */
	$args = array(
		'meta_key'   => 'post_enableurltrigger',
		'meta_value' => '1',
		'meta_compare' => '=',
		'post_type' => 'divi_overlay',
		'cache_results'  => false,
		'posts_per_page' => -1
	);
	
	$posts = get_posts( $args );
	
	$overlays_with_url_trigger = array();
	
	if ( isset( $posts[0] ) ) {
		
		$display_in_current = false;
		
		foreach( $posts as $dv_post ) {
			
			$post_id = $dv_post->ID;
			
			$overlays_with_url_trigger[ $post_id ] = 1;
		}
	}
	wp_reset_postdata();
	$overlays_with_url_trigger = array_filter( $overlays_with_url_trigger );
	
	
	/* Add Overlays with Display Locations: Force render */
	$args = array(
		'meta_key'   => 'do_forcerender',
		'meta_value' => '1',
		'meta_compare' => '=',
		'post_type' => 'divi_overlay',
		'cache_results'  => false,
		'posts_per_page' => -1
	);
	$posts = get_posts( $args );
	
	$overlays_forcerender = array();
	
	if ( isset( $posts[0] ) ) {
		
		$display_in_current = false;
		
		foreach( $posts as $dv_post ) {
			
			$post_id = $dv_post->ID;
			
			$overlays_forcerender[ $post_id ] = 1;
		}
	}
	wp_reset_postdata();
	$overlays_forcerender = array_filter( $overlays_forcerender );
	
	
	/* Search Automatic Triggers in all Divi Overlays */
	
	// Server-Side Device Detection with Browscap
	require_once( plugin_dir_path( __FILE__ ) . 'php-libraries/Browscap/Browscap.php' );
	$browscap = new Browscap( plugin_dir_path( __FILE__ ) . '/php-libraries/Browscap/Cache/' );
	$browscap->doAutoUpdate = false;
	$current_browser = $browscap->getBrowser();
	
	$isMobileDevice = $current_browser->isMobileDevice;
	$isTabletDevice = $current_browser->isTablet;
	
	$overlays_with_automatic_trigger = array();
	
	$args = array(
		'meta_key'   => 'overlay_automatictrigger',
		'meta_value' => '',
		'meta_compare' => '!=',
		'post_type' => 'divi_overlay',
		'cache_results'  => false,
		'posts_per_page' => -1
	);
	$posts = get_posts( $args );
	
	if ( isset( $posts[0] ) ) {
		
		if ( $render ) {
			
			print '<script type="text/javascript">var overlays_with_automatic_trigger = {';
		}
		
		foreach( $posts as $dv_post ) {
			
			$post_id = $dv_post->ID;
			
			$at_disablemobile = get_post_meta( $post_id, 'overlay_automatictrigger_disablemobile' );
			$at_disabletablet = get_post_meta( $post_id, 'overlay_automatictrigger_disabletablet' );
			$at_disabledesktop = get_post_meta( $post_id, 'overlay_automatictrigger_disabledesktop' );
			$onceperload = get_post_meta( $post_id, 'overlay_automatictrigger_onceperload', true );
			
			if ( isset( $onceperload[0] ) ) {
				
				$onceperload = $onceperload[0];
				
			} else {
				
				$onceperload = 1;
			}
			
			if ( isset( $at_disablemobile[0] ) ) {
				
				$at_disablemobile = $at_disablemobile[0];
				
			} else {
				
				$at_disablemobile = 1;
			}
			
			if ( isset( $at_disabletablet[0] ) ) {
				
				$at_disabletablet = $at_disabletablet[0];
				
			} else {
				
				$at_disabletablet = 0;
			}
			
			if ( isset( $at_disabledesktop[0] ) ) {
				
				$at_disabledesktop = $at_disabledesktop[0];
				
			} else {
				
				$at_disabledesktop = 0;
			}
			
			$printSettings = 1;
			if ( $at_disablemobile && $isMobileDevice ) {
				
				$printSettings = 0;
			}
			
			if ( $at_disablemobile && $isMobileDevice && $isTabletDevice ) {
				
				$printSettings = 1;
			}
			
			if ( $at_disabletablet && $isTabletDevice ) {
				
				$printSettings = 0;
			}
			
			if ( $at_disabledesktop && !$isMobileDevice && !$isTabletDevice ) {
				
				$printSettings = 0;
			}
			
			if ( $printSettings ) {
				
				$at_type = get_post_meta( $post_id, 'overlay_automatictrigger', true );
				$at_timed = get_post_meta( $post_id, 'overlay_automatictrigger_timed_value', true );
				$at_scroll_from = get_post_meta( $post_id, 'overlay_automatictrigger_scroll_from_value', true );
				$at_scroll_to = get_post_meta( $post_id, 'overlay_automatictrigger_scroll_to_value', true );
				
				if ( $at_type != '' ) {
					
					switch ( $at_type ) {
						
						case 'overlay-timed':
							$at_value = $at_timed;
						break;
						
						case 'overlay-scroll':
							$at_value = $at_scroll_from . ':' . $at_scroll_to;
						break;
						
						default:
							$at_value = $at_type;
					}
					
					$at_settings = wp_json_encode( array( 'at_type' => $at_type, 'at_value' => $at_value, 'at_onceperload' => $onceperload ) );
					
					if ( $render ) {
						
						print '\'' . et_core_esc_previously( $post_id ) . '\': \'' . et_core_esc_previously( $at_settings ) . '\',';
					}
					
					$overlays_with_automatic_trigger[ $post_id ] = $at_type;
				}
			}
		}
		
		if ( $render ) {
			
			print '};</script>';
		}
	}
	wp_reset_postdata();
	$overlays_with_automatic_trigger = array_filter( $overlays_with_automatic_trigger );
	
	
	/* Search Divi Overlays with Custom Close Buttons */
	$args = array(
		'meta_key'   => 'post_do_customizeclosebtn',
		'meta_value' => '',
		'meta_compare' => '!=',
		'post_type' => 'divi_overlay',
		'cache_results'  => false,
		'posts_per_page' => -1
	);
	$posts = get_posts( $args );
	
	if ( isset( $posts[0] ) ) {
		
		if ( $render ) {
			
			print '<style>';
		}
		
		foreach( $posts as $dv_post ) {
			
			$post_id = $dv_post->ID;
			
			$cbc_textcolor = get_post_meta( $post_id, 'post_doclosebtn_text_color', true );
			$cbc_bgcolor = get_post_meta( $post_id, 'post_doclosebtn_bg_color', true );
			$cbc_fontsize = get_post_meta( $post_id, 'post_doclosebtn_fontsize', true );
			$cbc_borderradius = get_post_meta( $post_id, 'post_doclosebtn_borderradius', true );
			$cbc_padding = get_post_meta( $post_id, 'post_doclosebtn_padding', true );
			
			$customizeclosebtn = get_post_meta( $post_id, 'post_do_customizeclosebtn' );
			if ( isset( $customizeclosebtn[0] ) ) {
				
				$customizeclosebtn = $customizeclosebtn[0];
				
			} else {
				
				continue;
			}
			
			if ( $customizeclosebtn ) {
				
				if ( $render ) {
					
					print '
					.overlay-customclose-btn-' . et_core_esc_previously( $post_id ) . ' {
						color:' . esc_attr( $cbc_textcolor ) . ' !important;
						background-color:' . esc_attr( $cbc_bgcolor ) . ' !important;
						font-size:' . esc_attr( $cbc_fontsize ) . 'px !important;
						padding:' . esc_attr( $cbc_padding ) . 'px !important;
						-moz-border-radius:' . esc_attr( $cbc_borderradius ) . '% !important;
						-webkit-border-radius:' . esc_attr( $cbc_borderradius ) . '% !important;
						-khtml-border-radius:' . esc_attr( $cbc_borderradius ) . '% !important;
						border-radius:' . esc_attr( $cbc_borderradius ) . '% !important;
					}
					';
				}
			}
		}
		
		if ( $render ) {
			
			print '</style>';
		}
	}
	wp_reset_postdata();
	
	/* Search in all Divi Layouts */
	$divioverlays_in_layouts = array();
	
	if ( function_exists( 'et_theme_builder_frontend_render_layout' ) ) {
		
		$layouts = et_theme_builder_get_template_layouts();
		
		$layout = '';
		
		$content = '';
		
		if ( is_array( $layouts ) && array_filter( $layouts ) ) {
			
			foreach( $layouts as $layout_type => $layout_ ) {
				
				if ( isset( $layout_['id'] ) && $layout_['enabled'] === true && $layout_['id'] !== 0 ) {
					
					$layout_id = $layout_['id'];
			
					$layout = get_post( $layout_id );
					
					if ( null !== $layout || $layout->post_type === $layout_type ) {
						
						$layout = _do_avoidRenderTags( $layout->post_content );
						
						$content .= $layout;
					}
				}
			}
			
			$content = stripStr( $content, '<iframe', '</iframe>' );
			$content = stripStr( $content, '<script', '</script>' );
			$content = stripStr( $content, '<style', '</style>' );
			
			$divioverlays_in_layouts = searchForDiviOverlays( $content );
		}
	}
	
	
	/* Ignore repeated ids and print overlays */
	$overlays = $overlays_in_post + $overlays_in_menus + $overlays_with_css_trigger + $overlays_with_url_trigger + $overlays_with_automatic_trigger + $divioverlays_in_layouts + $overlays_forcerender;
	
	// Do not render others overlays when current post is an overlay
	if ( is_object( $post ) && $post->post_type === 'divi_overlay' ) {
		
		$overlays = [ $post->ID ];
	}
	
	$total_overlays = count( $overlays );
	
	if ( $render && $total_overlays > 0 ) {
		
		print '<style id="divioverlay-styles"></style>';
		print '<div id="divioverlay-links"></div>';
		print '<div id="sidebar-overlay" class="hiddenMainContainer">';
	}
	
	$overlays_in_current = renderDiviOverlays( $overlays, $render );
	
	if ( $render && $total_overlays > 0 ) {
		
		print '</div>';
	}
	
	if ( $render && $total_overlays > 0 ) {
			
		?>
		<script type="text/javascript">
		var divioverlays_ajaxurl = "<?php print esc_url( home_url( '/' ) ); ?>"
		, divioverlays_us = "<?php print wp_create_nonce( 'divilife_divioverlays' ) // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>"
		, divioverlays_loadingimg = "<?php print et_core_intentionally_unescaped( plugins_url( '/', __FILE__ ) . 'assets/img/divilife-loader.svg', 'fixed_string' ) ?>";
		</script>
		<?php
		
		$dov_url_animate = DOV_PLUGIN_URL . 'assets/css/animate.min.css';
		
		wp_register_style( 'divi-overlays-animate-style', $dov_url_animate, array(), '4.1.1', 'all' );
		wp_enqueue_style('divi-overlays-animate-style');
		
		wp_register_style( 'divi-overlays-customanimations', DOV_PLUGIN_URL . 'assets/css/custom_animations.css', array(), DOV_VERSION, 'all' );
		wp_enqueue_style('divi-overlays-customanimations');
		
		wp_register_style('divi-overlays-custom_style_css', DOV_PLUGIN_URL . 'assets/css/style.css', array(), DOV_VERSION, 'all' );
		wp_enqueue_style('divi-overlays-custom_style_css');
		
		wp_register_script('divi-overlays-exit-intent', DOV_PLUGIN_URL . 'assets/js/jquery.exitintent.js', array("jquery"), DOV_VERSION );
		wp_enqueue_script('divi-overlays-exit-intent');
		
		wp_register_script('divi-overlays-custom-js', DOV_PLUGIN_URL . 'assets/js/custom.js', array("jquery"), DOV_VERSION, true);
		wp_enqueue_script('divi-overlays-custom-js');
	}
	else {
		
		return $overlays_in_current;
	}
}


function stripStr($str, $start, $end) {
	
	if ( function_exists( 'mb_stripos' ) ) {
		
		while( ( $pos = mb_stripos( $str, $start ) ) !== false ) {
			
			$aux = mb_substr($str, $pos + mb_strlen( $start ) );
			$str = mb_substr($str, 0, $pos).mb_substr( $aux, mb_stripos( $aux, $end ) + mb_strlen( $end ) );
		}
	}
	else {
		
		while( ( $pos = stripos( $str, $start ) ) !== false ) {
			
			$aux = substr( $str, $pos + strlen( $start ) );
			$str = substr( $str, 0, $pos ).substr( $aux, stripos( $aux, $end ) + strlen( $end ) );
		}
	}

    return $str;
}


function renderDiviOverlays( $overlays, $render ) {
	
	$overlays_in_current = array();
	
	if ( is_array( $overlays ) && count( $overlays ) > 0 ) {
		
		global $post;
		
		$ref_id = 0;
		
		if ( function_exists( 'get_queried_object_id' ) && get_queried_object_id() > 0 ) {
			
			$current_post_id = get_queried_object_id();
		
		} else {
			
			$current_post_id = 0;
		
			$current_home_post_id = (int) get_option( 'page_on_front' );
			
			$is_home = is_home();
			
			if ( $current_home_post_id == 0 && !$is_home ) {
				
				$current_post_id = get_the_ID();
			}
		}
		
		if ( is_category() ) {
			
			$current_category_id = (int) get_queried_object_id();
		}
		else {
			
			$current_category_id = 0;
		}
		
		if ( is_tag() ) {
			
			$current_tag_id = (int) get_queried_object_id();
		}
		else {
			
			$current_tag_id = 0;
		}
		
		
		$post_id = $current_post_id;
		$is_preview          = is_preview() || is_et_pb_preview();
		$forced_in_footer    = $post_id && et_builder_setting_is_on( 'et_pb_css_in_footer', $post_id );
		$forced_inline       = ! $post_id || $is_preview || $forced_in_footer || et_builder_setting_is_off( 'et_pb_static_css_file', $post_id ) || et_core_is_safe_mode_active() || ET_GB_Block_Layout::is_layout_block_preview();
		
		if ( isset( $_GET['action'] ) && $_GET['action'] == 'divioverlays_getcontent' ) { // phpcs:ignore WordPress.Security.NonceVerification.Recommended
		
			$forced_in_footer = $forced_inline = false;
		}
		
		// Get reference for overlay Divi styles
		if ( $current_post_id > 0 ) {
			
			$ref_id = $current_post_id;
		}
		else if ( $current_category_id > 0 ) {
			
			$ref_id = $current_category_id;
		}
		else if ( $current_tag_id > 0 ) {
			
			$ref_id = $current_tag_id;
		}
		
		
		foreach( $overlays as $overlay_id => $idx ) {
			
			if ( get_post_status ( $overlay_id ) == 'publish' && is_numeric( $overlay_id ) ) {
				
				$display_in_current = false;
				
				$forcerender = get_post_meta( $overlay_id, 'do_forcerender' );
				
				if ( isset( $forcerender[0] ) && $forcerender[0] == '1' ) {
					
					$forcerender = true;
					
				} else {
					
					$forcerender = false;
				}
				
				$do_showguests = get_post_meta( $overlay_id, 'do_showguests', true );
				
				if ( isset( $do_showguests[0] ) ) {
					
					$do_showguests = (int) $do_showguests[0];
					
				} else {
					
					$do_showguests = 0;
				}
				
				$do_showusers = get_post_meta( $overlay_id, 'do_showusers', true );
				
				if ( isset( $do_showusers[0] ) ) {
					
					$do_showusers = (int) $do_showusers[0];
					
				} else {
					
					$do_showusers = 0;
				}
				
				if ( $do_showguests === 1 && is_user_logged_in() === true && $do_showusers === 0 ) {
					
					continue;
				}
				
				if ( $do_showusers === 1 && is_user_logged_in() === false && $do_showguests === 0 ) {
					
					continue;
				}
				
				
				$display_on_archive = get_post_meta( $overlay_id, 'do_displaylocations_archive', true );
				
				if ( isset( $display_on_archive[0] ) ) {
					
					$display_on_archive = (int) $display_on_archive[0];
					
				} else {
					
					$display_on_archive = 1;
				}
				
				
				$display_on_author = get_post_meta( $overlay_id, 'do_displaylocations_author', true );
				
				if ( isset( $display_on_author[0] ) ) {
					
					$display_on_author = (int) $display_on_author[0];
					
				} else {
					
					$display_on_author = 1;
				}
				
			
				// Display By Post
				
				// Check for WooCommerce page
				$is_woocommerce = false;
				if ( function_exists( 'wc_get_page_id' ) && function_exists( 'is_woocommerce' ) ) {
					
					if ( ! is_front_page() && is_woocommerce() ) {
						
						$is_woocommerce = true;
						
						$shop_page_id = wc_get_page_id( 'shop' );
						
						if ( is_shop() && ! ( is_post_type_archive() && intval( get_option( 'page_on_front' ) ) === $shop_page_id ) ) {
							
							$current_post_id = $shop_page_id;
						}
					}
				}
				
				$at_pages = get_post_meta( $overlay_id, 'do_at_pages' );
				$display_in_posts = ( !isset( $at_pages[0] ) ) ? 'all' : $at_pages[0];
				
				if ( ( is_home() || is_page() || is_single() ) 
					|| ( $is_woocommerce && $current_post_id > 0 ) ) {
				
					$at_pages = get_post_meta( $overlay_id, 'do_at_pages' );
					
					if ( $display_in_posts == 'specific' ) {
						
						$display_in_current = false;
						
						$pages_selected = get_post_meta( $overlay_id, 'do_at_pages_selected' );
						
						if ( is_array( $pages_selected ) ) {
							
							$in_posts = array_filter( $pages_selected );
							
							if ( isset ( $in_posts[0] ) && $in_posts[0] != '' ) {
								
								foreach( $in_posts[0] as $in_post => $the_id ) {
									
									if ( $the_id == $current_post_id ) {
										
										$display_in_current = true;
										
										break;
									}
								}
							}
						}
					}
					
					if ( $display_in_posts == 'all' ) {
						
						$display_in_current = true;
						
						$pagesexception_selected = get_post_meta( $overlay_id, 'do_at_pagesexception_selected' );
						
						if ( is_array( $pagesexception_selected ) ) {
							
							$except_in_posts = array_filter( $pagesexception_selected );
							
							if ( isset ( $except_in_posts[0] ) && $except_in_posts[0] != '' ) {
								
								foreach( $except_in_posts[0] as $in_post => $the_id ) {
									
									if ( $the_id == $current_post_id ) {
										
										$display_in_current = false;
										
										break;
									}
								}
							}
						}
					}
				}
			
				// Display By Category
				if ( is_category() ) {
					
					$category_at_categories = get_post_meta( $overlay_id, 'category_at_categories' );
					
					$display_in_categories = ( !isset( $category_at_categories[0] ) ) ? 'all' : $category_at_categories[0];
					
					if ( $display_in_categories == 'specific' ) {
						
						$display_in_current = false;
						
						$in_categories = get_post_meta( $overlay_id, 'category_at_categories_selected' );
						
						if ( isset ( $in_categories[0] ) && $in_categories[0] != '' ) {
							
							foreach( $in_categories[0] as $in_category => $the_id ) {
								
								if ( $the_id == $current_category_id ) {
									
									$display_in_current = true;
									
									break;
								}
							}
						}
					}
					
					if ( $display_in_categories == 'all' ) {
						
						$display_in_current = true;
						
						$except_in_categories = get_post_meta( $overlay_id, 'category_at_exceptioncategories_selected' );
						
						if ( isset ( $except_in_categories[0] ) && $except_in_categories[0] != '' ) {
							
							foreach( $except_in_categories[0] as $in_category => $the_id ) {
								
								if ( $the_id == $current_category_id ) {
									
									$display_in_current = false;
									
									break;
								}
							}
						}
					}
				}
				
				// Display By Tag
				if ( is_tag() ) {
					
					$tag_at_tags = get_post_meta( $overlay_id, 'tag_at_tags' );
					
					$display_in_tags = ( !isset( $tag_at_tags[0] ) ) ? 'all' : $tag_at_tags[0];
					
					if ( $display_in_tags == 'specific' ) {
						
						$display_in_current = false;
						
						$in_tags = get_post_meta( $overlay_id, 'tag_at_tags_selected' );
						
						if ( isset ( $in_tags[0] ) && $in_tags[0] != '' ) {
							
							foreach( $in_tags[0] as $in_tag => $the_id ) {
								
								if ( $the_id == $current_tag_id ) {
									
									$display_in_current = true;
									
									break;
								}
							}
						}
					}
					
					if ( $display_in_tags == 'all' ) {
						
						$display_in_current = true;
						
						$except_in_tags = get_post_meta( $overlay_id, 'tag_at_exceptiontags_selected' );
						
						if ( isset ( $except_in_tags[0] ) && $except_in_tags[0] != '' ) {
							
							foreach( $except_in_tags[0] as $in_tag => $the_id ) {
								
								if ( $the_id == $current_tag_id ) {
									
									$display_in_current = false;
									
									break;
								}
							}
						}
					}
				}
				
				if ( is_archive() && $display_on_archive ) {
					
					$display_in_current = true;
				}
				
				if ( ( is_404() || is_search() ) && $display_in_posts === 'all' ) {
					
					$display_in_current = true;
				}
				
				if ( is_author() && $display_on_author ) {
					
					$display_in_current = true;
				}
				
				if ( is_page() && $display_in_posts === 'pages' ) {
					
					$display_in_current = true;
				}
				
				if ( is_single() && $display_in_posts === 'posts' ) {
					
					$display_in_current = true;
				}
				
				if ( $forcerender === true ) {
					
					$display_in_current = true;
				}
				
				if ( $display_in_current ) {
					
					$overlays_in_current[ $overlay_id ] = $overlay_id;
					
					if ( $render ) {
						
						print et_core_esc_previously( showOverlay( $overlay_id ) );
						
						// Avoid output static CSS file when WP Rocket is enabled
						$wp_rocket_enabled = false;
						if ( function_exists( 'rocket_clean_post' ) ) {
							
							$wp_rocket_enabled = true;
						}
						
						if ( !$forced_in_footer && !$forced_inline
							&& ( $wp_rocket_enabled === false ) ) {
							
							DiviOverlaysCore::init( $overlay_id . '-' . $ref_id );
						}
					}
				}
			}
		}
	}
	
	return $overlays_in_current;
}


add_action( 'wp_head', 'divioverlays_getcontent', 0 );
function divioverlays_getcontent() {
	
	if ( isset( $_GET['divioverlays_id'] ) && isset( $_GET['action'] ) && $_GET['action'] == 'divioverlays_getcontent' ) {
		
		global $wp_embed;
		
		check_ajax_referer( 'divilife_divioverlays', 'security' );
		
		$overlay_id = intval( sanitize_text_field( wp_unslash( $_GET['divioverlays_id'] ) ) );
		
		$DiviOverlaysCore = new DiviOverlaysCore( $overlay_id );
		
		$DiviOverlaysCore->start_module_index_override();
		
		$post_data = get_post( $overlay_id );
		
		$post_content = $post_data->post_content;
		
		$wp_embed->post_ID = $post_data->ID;
		
		// Process the [embed] shortcodes
		$wp_embed->run_shortcode( $post_content );
		
		// Passes any unlinked URLs that are on their own line
		$wp_embed->autoembed( $post_content );
		
		// Search content for shortcodes and filter shortcodes through their hooks
		$output = do_shortcode( $post_content );
		
		// Builder automatically adds `#et-boc` on selector on non official post type
		// Avoid having 2 elements with the same id in the same page
		$output = str_replace( 'id="et-boc"', '', $output );
		
		// Monarch fix: Remove Divi Builder main section class and add it later with JS
		$output = str_replace( 'et_pb_section ', 'dov_dv_section ', $output );
		
		$styles =  ET_Builder_Element::get_style();
		
		// Builder automatically adds `#et-boc` on selectors for non-legacy post types
		$styles = str_replace( '#et-boc ', '', $styles );
		
		// Remove #page-container from Divi Cached Inline Styles tag and cloning it to prevent issues
		$styles = str_replace( '#page-container ', '', $styles );
		
		// Remove .et_pb_extra_column_main from Divi Styles prevent cascade issues with Divi Overlays
		$styles = str_replace( '.et_pb_extra_column_main', ' ', $styles );
		
		$DiviOverlaysCore->end_module_index_override();
		
		print '<div id="divioverlay-content-ajax">' . et_core_esc_previously( $output ) . '</div>';
		
		print '<div id="divioverlay-css-ajax">' . et_core_esc_previously( $styles ) . '</div>';
	}
}


function get_all_wordpress_menus(){
    return get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
}


function prepareOverlays( $key = NULL )
{
    if ( !$key ) {
        return NULL;
	}
	
    if ( is_array( $key ) ) {
        return NULL;
	}
	
	$overlay_id = '';
	
	// it is an url with hash overlay?
	if ( strpos( $key, "#overlay-" ) !== false ) {
		
		$exploded_url = explode( "#", $key );
		
		if ( isset( $exploded_url[1] ) ) {
			
			$key = str_replace( 'overlay-', '', $exploded_url[1] );
			
			$overlay_id = $key;
		}
	}
	
	if ( $overlay_id === '' || $overlay_id === null ) {
		
		$pos = 0;
		$pos1 = strpos( $key, 'unique_overlay_menu_id_' );
		$pos2 = strpos( $key, 'overlay_' );
		$pos3 = strpos( $key, 'unique_id_' );
		$pos4 = strpos( $key, 'divioverlay-' );
		$pos5 = strpos( $key, 'overlay_unique_id_' );
		
		if ( $pos1 !== false || $pos2 !== false || $pos3 !== false || $pos4 !== false || $pos5 !== false ) {
			
			if ( $pos1 > 0 ) {
				
				$pos = $pos1;
			}
			
			if ( $pos2 > 0 ) {
				
				$pos = $pos2;
			}
			
			if ( $pos3 > 0 ) {
				
				$pos = $pos3;
			}
			
			if ( $pos4 > 0 ) {
				
				$pos = $pos4;
			}
			
			if ( $pos5 > 0 ) {
				
				$pos = $pos5;
			}
			
			$key = substr( $key, $pos );
			$overlay_id = preg_replace( '/[^0-9.]/', '', $key );
		}
		else {
			
			return NULL;
		}
	}
	
    if ( $overlay_id === '' ) {
		
        return NULL;
	}
	
	if ( !overlayIsPublished( $overlay_id ) ) {
		
		return NULL;
	}
	
	return $overlay_id;
}

function overlayIsPublished( $key ) {
	
	$post = get_post_status( $key );
	
	if ( $post !== 'publish' ) {
		
		return FALSE;
	}
	
	return TRUE;
}

function OnceMigrateCbcValues() {
	
    if ( get_option( 'OnceMigrateCbcValues', '0' ) == '1' ) {
        return;
    }
	
	/* Search Divi Overlays with Custom Close Buttons */
	$args = array(
		'meta_key'   => 'post_do_customizeclosebtn',
		'meta_value' => '',
		'meta_compare' => '!=',
		'post_type' => 'divi_overlay',
		'cache_results'  => false,
		'posts_per_page' => -1
	);
	$query = new WP_Query( $args );
	
	$posts = $query->get_posts();
	
	if ( isset( $posts[0] ) ) {
		
		migrateCbcValues( $posts );
	}

    // Add or update the wp_option
    update_option( 'OnceMigrateCbcValues', '1' );
}
add_action( 'init', 'OnceMigrateCbcValues' );

function migrateCbcValues( $posts = null ){
	
	if ( is_array( $posts ) ) {
	
		foreach( $posts as $dv_post ) {
			
			$post_id = $dv_post->ID;
			
			updateCbcValues( $post_id );
		}
	}
}

function updateCbcValues( $post_id = null ) {
	
	if ( $post_id ) {
	
		$old_cbc_textcolor = get_post_meta( $post_id, 'post_closebtn_text_color', true );
		$old_cbc_bgcolor = get_post_meta( $post_id, 'post_closebtn_bg_color', true );
		$old_cbc_fontsize = get_post_meta( $post_id, 'post_closebtn_fontsize', true );
		$old_cbc_borderradius = get_post_meta( $post_id, 'post_closebtn_borderradius', true );
		$old_cbc_padding = get_post_meta( $post_id, 'post_closebtn_padding', true );
		
		if ( $old_cbc_textcolor != '' ) {
			update_post_meta( $post_id, 'post_doclosebtn_text_color', sanitize_text_field( $old_cbc_textcolor ) );
		}
		
		if ( $old_cbc_bgcolor != '' ) {
			update_post_meta( $post_id, 'post_doclosebtn_bg_color', sanitize_text_field( $old_cbc_bgcolor ) );
		}
		
		if ( $old_cbc_fontsize != '' ) {
			update_post_meta( $post_id, 'post_doclosebtn_fontsize', sanitize_text_field( $old_cbc_fontsize ) );
		}
		
		if ( $old_cbc_borderradius != '' ) {
			update_post_meta( $post_id, 'post_doclosebtn_borderradius', sanitize_text_field( $old_cbc_borderradius ) );
		}
		
		if ( $old_cbc_padding != '' ) {
			update_post_meta( $post_id, 'post_doclosebtn_padding', sanitize_text_field( $old_cbc_padding ) );
		}
		
		// Reset old values
		update_post_meta( $post_id, 'post_closebtn_text_color', '' );
		update_post_meta( $post_id, 'post_closebtn_bg_color', '' );
		update_post_meta( $post_id, 'post_closebtn_fontsize', '' );
		update_post_meta( $post_id, 'post_closebtn_borderradius', '' );
		update_post_meta( $post_id, 'post_closebtn_padding', '' );
	}
}


function OnceMigrateURLTriggerByLocationValues() {
	
    // Add or update the wp_option
    update_option( 'OnceMigrateUTValues', '1' );
	
    if ( get_option( 'OnceMigrateUTValues', '0' ) === '1' ) {
        return;
    }
	
	/* Search Divi Overlays with Custom Close Buttons */
	$args = array(
		'meta_key'   => 'post_enableurltrigger_pages',
		'meta_value' => '',
		'meta_compare' => '!=',
		'post_type' => 'divi_overlay',
		'cache_results'  => false,
		'posts_per_page' => -1
	);
	$query = new WP_Query( $args );
	
	$posts = $query->get_posts();
	
	if ( isset( $posts[0] ) ) {
		
		migrateUTValues( $posts );
	}

    // Add or update the wp_option
    update_option( 'OnceMigrateUTValues', '1' );
}
add_action( 'init', 'OnceMigrateURLTriggerByLocationValues' );

function migrateUTValues( $posts = null ){
	
	if ( is_array( $posts ) ) {
		
		foreach( $posts as $dv_post ) {
			
			$post_id = $dv_post->ID;
			
			updateUTValues( $post_id );
		}
	}
}

function updateUTValues( $post_id = null ) {
	
	if ( $post_id !== '' ) {
	
		$old_ut_post_enableurltrigger_pages = get_post_meta( $post_id, 'post_enableurltrigger_pages', true );
		$old_ut_post_dolistpages = get_post_meta( $post_id, 'post_dolistpages', true );
		
		$post_at_pages = get_post_meta( $post_id, 'do_at_pages', true );
		$post_at_pages_selected = get_post_meta( $post_id, 'do_at_pages_selected', true );
		
		if ( $post_at_pages === '' && $old_ut_post_enableurltrigger_pages !== '' ) {
			
			update_post_meta( $post_id, 'do_at_pages', $old_ut_post_enableurltrigger_pages );
		}
		
		if ( $post_at_pages_selected === '' && $old_ut_post_dolistpages !== '' ) {
			
			update_post_meta( $post_id, 'do_at_pages_selected', $old_ut_post_dolistpages );
		}
	}
}



function OnceMigrateSingleAnimationToEntranceExitAnimation() {
	
    // Add or update the wp_option
    if ( get_option( 'OnceMigrateSAValues', '0' ) === '1' ) {
        return;
    }
	
	/* Search Divi Overlays with Custom Close Buttons */
	$args = array(
		'meta_key'   => '_et_pb_overlay_effect',
		'meta_value' => '',
		'meta_compare' => '!=',
		'post_type' => 'divi_overlay',
		'cache_results'  => false,
		'posts_per_page' => -1
	);
	$query = new WP_Query( $args );
	
	$posts = $query->get_posts();
	
	if ( isset( $posts[0] ) ) {
		
		migrateSAValues( $posts );
	}
	
    // Add or update the wp_option
    update_option( 'OnceMigrateSAValues', '1' );
}
add_action( 'init', 'OnceMigrateSingleAnimationToEntranceExitAnimation' );

function migrateSAValues( $posts = null ){
	
	if ( is_array( $posts ) ) {
		
		foreach( $posts as $dv_post ) {
			
			$post_id = $dv_post->ID;
			
			updateSAValues( $post_id );
		}
	}
}

function updateSAValues( $post_id = null ) {
	
	if ( $post_id !== '' ) {
	
		$old_overlay_effect = get_post_meta( $post_id, '_et_pb_overlay_effect', true );
		
		$et_pb_divioverlay_effect_entrance = get_post_meta( $post_id, 'et_pb_divioverlay_effect_entrance', true );
		$et_pb_divioverlay_effect_exit = get_post_meta( $post_id, 'et_pb_divioverlay_effect_exit', true );
		
		$default_effect_in = 'fadeIn';
		$default_effect_out = 'fadeOut';
		
		$effect_in = '';
		$effect_out = '';
		
		$old_effects = array(
			'overlay-hugeinc'   => array( 'fadeInDown', 'fadeOutUp' ),
			'overlay-corner'    => array( 'fadeInBottomRight', 'fadeOutBottomRight' ),
			'overlay-slidedown' => array( 'slideInDown', 'slideOutUp' ),
			'overlay-scale' => array( 'zoomIn', 'zoomOut' ),
			'overlay-door' => array( 'doorOpen', 'doorClose' ),
			'overlay-contentpush' => array( 'fadeIn', 'fadeOut' ),
			'overlay-contentscale' => array( 'vanishIn', 'vanishOut' ),
			'overlay-cornershape' => array( 'fadeInDown', 'fadeOutUp' ),
			'overlay-boxes' => array( 'foolishIn', 'foolishOut' ),
			'overlay-simplegenie' => array( 'zoomInUp', 'zoomOutDown' ),
			'overlay-genie' => array( 'fadeIn', 'fadeOut' )
		);
		
		if ( isset( $old_effects[ $old_overlay_effect ] ) ) {
			
			$effect_in = $old_effects[ $old_overlay_effect ][0];
			$effect_out = $old_effects[ $old_overlay_effect ][1];
		}
		else {
			
			$effect_in = $default_effect_in;
			$effect_out = $default_effect_out;
		}
		
		if ( $et_pb_divioverlay_effect_entrance === '' ) {
			
			update_post_meta( $post_id, 'et_pb_divioverlay_effect_entrance', $effect_in );
		}
		
		if ( $et_pb_divioverlay_effect_exit === '' ) {
			
			update_post_meta( $post_id, 'et_pb_divioverlay_effect_exit', $effect_out );
		}
	}
}
