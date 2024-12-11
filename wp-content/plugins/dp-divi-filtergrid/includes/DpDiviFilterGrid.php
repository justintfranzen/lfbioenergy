<?php

class DpDFG_DpDiviFilterGrid extends DiviExtension {

	public $gettext_domain = 'dpdfg-dp-divi-filtergrid';
	public $name = 'dp-divi-filtergrid';
	public $version = DPDFG_VERSION;

	public function __construct( $name = 'dp-divi-filtergrid', $args = array() ) {
		$this->plugin_dir       = plugin_dir_path( __FILE__ );
		$this->plugin_dir_url   = plugin_dir_url( $this->plugin_dir );
		$this->_builder_js_data = array(
			'ajaxurl'       => admin_url( 'admin-ajax.php' ),
			'nonce_layouts' => wp_create_nonce( 'dpdfg_get_layouts_action' ),
			'nonce_cpt'     => wp_create_nonce( 'dpdfg_get_cpt_action' ),
			'nonce_tax'     => wp_create_nonce( 'dpdfg_get_taxonomies_action' ),
			'nonce_terms'   => wp_create_nonce( 'dpdfg_get_taxonomies_terms_action' ),
			'nonce_cf'      => wp_create_nonce( 'dpdfg_get_custom_fields_action' ),
			'nonce_ml_tax'  => wp_create_nonce( 'dpdfg_get_multilevel_tax_action' ),
			'cache'         => array(
				'cpt_list'     => array(),
				'tax_list'     => array(),
				'terms_list'   => array(),
				'layouts_list' => array(),
				'cf_list'      => array(),
				'sizes_list'   => array()
			),
			'i18n'          => array(
				'clear_cache' => __( 'Refresh List', 'dpdfg-dp-divi-filtergrid' ),
				'add_option'  => __( 'Add', 'dpdfg-dp-divi-filtergrid' ),
			)
		);
		parent::__construct( $name, $args );
	}

	protected function _enqueue_bundles() {
		// Frontend Bundle
		$bundle_url = "{$this->plugin_dir_url}scripts/frontend-bundle.min.js";
		if ( et_core_is_fb_enabled() ) {
			wp_enqueue_script( "{$this->name}-frontend-bundle", $bundle_url, $this->_bundle_dependencies['frontend'], $this->version, true );
			// Builder Bundle
			$bundle_url = "{$this->plugin_dir_url}scripts/builder-bundle.min.js";
			wp_enqueue_script( "{$this->name}-builder-bundle", $bundle_url, $this->_bundle_dependencies['builder'], $this->version, true );
		} else {
			wp_register_script( "{$this->name}-frontend-bundle", $bundle_url, $this->_bundle_dependencies['frontend'], $this->version, true );
		}
	}
}

new DPDFG_DpDiviFilterGrid();
