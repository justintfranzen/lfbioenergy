<?php

class Dp_Divi_FilterGrid {

	public function __construct() {
		$this->load_dependencies();
		add_action( 'plugins_loaded', [ $this, 'set_locale' ] );
		$this->define_admin_hooks();
		$this->define_public_hooks();
	}

	private function load_dependencies() {
		require_once DPDFG_DIR . 'includes/class-dp-page.php';
		require_once DPDFG_DIR . 'includes/class-dp-dfg-updater.php';
		require_once DPDFG_DIR . 'includes/class-dp-dfg-license.php';
		require_once DPDFG_DIR . 'includes/class-dp-dfg-utils.php';
	}

	function set_locale() {
		load_plugin_textdomain( 'dpdfg-dp-divi-filtergrid', false, basename( DPDFG_DIR ) . '/languages/' );
	}

	private function define_admin_hooks() {
		$dp_page = new DiviPlugins_Menu_Page();
		add_action( 'admin_menu', [ $dp_page, 'add_dp_page' ] );
		add_filter( 'plugin_row_meta', [ $this, 'add_plugin_row_meta' ], 10, 2 );
		add_action( 'divi_extensions_init', [ $this, 'initialize_extension' ] );
		$license = new Dp_Dfg_License();
		add_action( 'init', [ $license, 'init_plugin_updater' ], 0 );
		add_action( 'diviplugins_page_add_license', [ $license, 'license_html' ] );
		add_action( 'admin_init', [ $license, 'register_license_option' ] );
		add_action( 'admin_init', [ $license, 'activate_license' ] );
		add_action( 'admin_init', [ $license, 'deactivate_license' ] );
		add_action( 'admin_notices', [ $license, 'notice_license_activation_result' ] );
		if ( get_option( 'dpdfg_license_status' ) !== 'valid' ) {
			add_action( 'admin_notices', [ $license, 'notice_activation_license_require' ] );
		}
		$plugin_util = new Dp_Dfg_Utils();
		add_action( 'wp_ajax_dpdfg_get_posts_data_action', [ $plugin_util, 'ajax_get_posts_data' ] );
		add_action( 'wp_ajax_nopriv_dpdfg_get_posts_data_action', [ $plugin_util, 'ajax_get_posts_data' ] );
		add_action( 'wp_ajax_dpdfg_get_cpt_action', [ $plugin_util, 'ajax_get_cpt' ] );
		add_action( 'wp_ajax_dpdfg_get_taxonomies_action', [ $plugin_util, 'ajax_get_taxonomies' ] );
		add_action( 'wp_ajax_dpdfg_get_taxonomies_terms_action', [ $plugin_util, 'ajax_get_taxonomies_terms' ] );
		add_action( 'wp_ajax_dpdfg_get_custom_fields_action', [ $plugin_util, 'ajax_get_custom_fields' ] );
		add_action( 'wp_ajax_dpdfg_get_multilevel_tax_action', [ $plugin_util, 'ajax_get_multilevel_tax' ] );
		add_action( 'wp_ajax_dpdfg_get_layouts_action', [ $plugin_util, 'ajax_get_library_items' ] );
		add_filter( 'et_builder_load_actions', [ $plugin_util, 'add_our_custom_action' ] );
	}

	private function define_public_hooks() {
		add_filter( 'template_include', [ $this, 'popup_page_template' ], 99 );
		add_action( 'wp_enqueue_scripts', [ $this, 'enqueue_scripts' ], 20 );
		$plugin_util = new Dp_Dfg_Utils();
		add_action( 'wp_ajax_dpdfg_add_to_cart_action', [ $plugin_util, 'ajax_add_to_cart' ] );
		add_action( 'wp_ajax_nopriv_dpdfg_add_to_cart_action', [ $plugin_util, 'ajax_add_to_cart' ] );
	}

	public function popup_page_template( $template ) {
		if ( isset( $_GET['_wpnonce'] ) && wp_verify_nonce( sanitize_key( $_GET['_wpnonce'] ), 'dfg_popup_fetch' ) ) {
			if ( is_singular() && isset( $_GET['dp_action'] ) && 'dfg_popup_fetch' === $_GET['dp_action'] ) {
				if ( isset( $_GET['popup_template'] ) && 'default' === $_GET['popup_template'] ) {
					if ( glob( get_stylesheet_directory() . '/dp-divi-filtergrid/dp-dfg-popup-template.php' ) ) {
						$template = get_stylesheet_directory() . '/dp-divi-filtergrid/dp-dfg-popup-template.php';
					} else {
						$template = DPDFG_DIR . 'templates/dp-dfg-popup-template.php';
					}
				} else {
					$template = DPDFG_DIR . 'templates/dp-dfg-popup-template.php';
				}
			}
		}

		return $template;
	}

	public function enqueue_scripts() {
		if ( defined( 'ET_BUILDER_URI' ) ) {
			wp_register_script( 'fitvids', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/jquery.fitvids.js', array( 'jquery' ), ET_CORE_VERSION, true );
			wp_register_script( 'magnific-popup', ET_BUILDER_URI . '/feature/dynamic-assets/assets/js/magnific-popup.js', array( 'jquery' ), ET_CORE_VERSION, true );
		}
	}

	public function initialize_extension() {
		require_once DPDFG_DIR . 'includes/DpDiviFilterGrid.php';
	}

	public function add_plugin_row_meta( $links, $file ) {
		if ( plugin_basename( 'dp-divi-filtergrid/dp-divi-filtergrid.php' ) === $file ) {
			$links['license'] = sprintf( '<a href="%s">%s</a>', admin_url( 'plugins.php?page=dp_divi_plugins_menu' ), __( 'License', 'dpdfg-dp-divi-filtergrid' ) );
			$links['support'] = sprintf( '<a href="%s" target="_blank">%s</a>', 'https://diviplugins.com/documentation/divi-filtergrid/', __( 'Get support', 'dpdfg-dp-divi-filtergrid' ) );
		}

		return $links;
	}

}
