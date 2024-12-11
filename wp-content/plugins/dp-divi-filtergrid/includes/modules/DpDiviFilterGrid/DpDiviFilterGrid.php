<?php

class DpDiviFilterGrid extends ET_Builder_Module {

	public $slug = 'dpdfg_filtergrid';
	public $vb_support = 'on';
	public $icon_path = DPDFG_DIR . 'divi-filtergrid.svg';
	public $fields_defaults = array(
		'items_width_last_edited'      => array(
			'on|desktop',
			'add_default_setting',
		),
		'items_width_phone'            => array( '40%', 'add_default_setting' ),
		'items_width_tablet'           => array( '30%', 'add_default_setting' ),
		'items_width_flex_last_edited' => array(
			'on|desktop',
			'add_default_setting',
		),
		'items_width_flex_phone'       => array( '48%', 'add_default_setting' ),
		'items_width_flex_tablet'      => array( '31.5%', 'add_default_setting' ),
		'row_gutter_flex_last_edited'  => array(
			'on|desktop',
			'add_default_setting',
		),
		'row_gutter_flex_phone'        => array( '4%', 'add_default_setting' ),
		'row_gutter_flex_tablet'       => array( '2.75%', 'add_default_setting' ),
		'grid_font_size_last_edited'   => array(
			'on|desktop',
			'add_default_setting',
		),
		'grid_font_size_phone'         => array( '10px', 'add_default_setting' ),
		'grid_font_size_tablet'        => array( '10px', 'add_default_setting' ),
		'thumb_min_width_last_edited'  => array(
			'on|desktop',
			'add_default_setting',
		),
		'thumb_min_width_tablet'       => array( '300px', 'add_default_setting' ),
		'thumb_width_last_edited'      => array(
			'on|desktop',
			'add_default_setting',
		),
		'thumb_width_tablet'           => array( '33%', 'add_default_setting' ),
		'filters_width_last_edited'    => array(
			'on|desktop',
			'add_default_setting',
		),
		'filters_width_phone'          => array( '2', 'add_default_setting' ),
		'filters_width_tablet'         => array( '3', 'add_default_setting' ),
	);
	protected $module_credits = array(
		'module_uri' => 'https://diviplugins.com/downloads/divi-filtergrid/',
		'author'     => 'DiviPlugins',
		'author_uri' => 'https://diviplugins.com',
	);

	public function init() {
		$this->name             = __( 'Divi FilterGrid', 'dpdfg-dp-divi-filtergrid' );
		$this->main_css_element = '%%order_class%%';
		// $this->folder_name      = 'divi_plugins_com';
		$this->help_videos = array(
			array(
				'id'   => __( 'XlEr9Qn-H5Y', 'dpdfg-dp-divi-filtergrid' ),
				'name' => __( 'Divi FilterGrid', 'dpdfg-dp-divi-filtergrid' ),
			),
		);
	}

	public function get_settings_modal_toggles() {
		$toggles = array(
			'general'  => array(
				'toggles' => array(
					'query_options'      => array(
						'title'    => __( 'Query', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 1,
					),
					'elements_options'   => array(
						'title'    => __( 'Posts Elements', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 20,
					),
					'tax_filter'         => array(
						'title'    => __( 'Taxonomy Filters', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 30,
					),
					'df_options'         => array(
						'title'    => __( 'Date Filters', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 31,
					),
					'filter_options'     => array(
						'title'    => __( 'Filter Options', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 32,
					),
					'sort_options'       => array(
						'title'    => __( 'Sorting', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 35,
					),
					'pagination_options' => array(
						'title'    => __( 'Pagination', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 40,
					),
					'search_options'     => array(
						'title'    => __( 'Search', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 50,
					),
					'video_options'      => array(
						'title'    => __( 'Video', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 60,
					),
					'advanced_options'   => array(
						'title'    => __( 'Advanced', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 65,
					),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout_options'      => array(
						'title'    => __( 'Layout', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 1,
					),
					'popup_options'       => array(
						'title'    => __( 'Popup', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 2,
					),
					'overlay_options'     => array(
						'title'    => __( 'Overlay', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 3,
					),
					'loader_options'      => array(
						'title'    => __( 'Loader', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 4,
					),
					'image'               => array(
						'title'    => __( 'Thumbnail Image', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 5,
					),
					'background'          => array(
						'title'    => __( 'Background Colors', 'dpdfg-dp-divi-filtergrid' ),
						'priority' => 6,
					),
					'dfg_text'            => array(
						'title'             => __( 'Text', 'dpdfg-dp-divi-filtergrid' ),
						'priority'          => 10,
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => false,
						'sub_toggles'       => array(
							'title'          => array(
								'name' => __( 'Title', 'dpdfg-dp-divi-filtergrid' ),
							),
							'meta'           => array(
								'name' => __( 'Meta', 'dpdfg-dp-divi-filtergrid' ),
							),
							'content'        => array(
								'name' => __( 'Content/Excerpt', 'dpdfg-dp-divi-filtergrid' ),
							),
							'cf_label'       => array(
								'name' => __( 'Custom Fields Labels', 'dpdfg-dp-divi-filtergrid' ),
							),
							'cf_value'       => array(
								'name' => __( 'Custom Fields Values', 'dpdfg-dp-divi-filtergrid' ),
							),
							'custom_content' => array(
								'name' => __( 'Custom Content', 'dpdfg-dp-divi-filtergrid' ),
							),
						),
					),
					'dfg_filter_text'     => array(
						'title'             => __( 'Filters Text', 'dpdfg-dp-divi-filtergrid' ),
						'priority'          => 20,
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => false,
						'sub_toggles'       => array(
							'filters'              => array(
								'name' => __( 'Default', 'dpdfg-dp-divi-filtergrid' ),
							),
							'filters_active'       => array(
								'name' => __( 'Active', 'dpdfg-dp-divi-filtergrid' ),
							),
							'levels'               => array(
								'name' => __( 'Levels Labels', 'dpdfg-dp-divi-filtergrid' ),
							),
							'dropdown_placeholder' => array(
								'name' => __( 'Dropdown Placeholder', 'dpdfg-dp-divi-filtergrid' ),
							),
							'dropdown_tags'        => array(
								'name' => __( 'Dropdown Tags', 'dpdfg-dp-divi-filtergrid' ),
							),
						),
					),
					'dfg_sort_text'       => array(
						'title'             => __( 'Sort Text', 'dpdfg-dp-divi-filtergrid' ),
						'priority'          => 20,
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => false,
						'sub_toggles'       => array(
							'sorting'              => array(
								'name' => __( 'Default', 'dpdfg-dp-divi-filtergrid' ),
							),
							'sorting_active'       => array(
								'name' => __( 'Active', 'dpdfg-dp-divi-filtergrid' ),
							),
							'dropdown_placeholder' => array(
								'name' => __( 'Dropdown & Icon', 'dpdfg-dp-divi-filtergrid' ),
							),
						),
					),
					'dfg_search_text'     => array(
						'title'             => __( 'Search Text', 'dpdfg-dp-divi-filtergrid' ),
						'priority'          => 30,
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => false,
						'sub_toggles'       => array(
							'search' => array(
								'name' => __( 'Default', 'dpdfg-dp-divi-filtergrid' ),
							),
						),
					),
					'dfg_pagination_text' => array(
						'title'             => __( 'Pagination Text', 'dpdfg-dp-divi-filtergrid' ),
						'priority'          => 40,
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => false,
						'sub_toggles'       => array(
							'pagination'        => array(
								'name' => __( 'Default', 'dpdfg-dp-divi-filtergrid' ),
							),
							'pagination_active' => array(
								'name' => __( 'Active', 'dpdfg-dp-divi-filtergrid' ),
							),
						),
					),
				),
			),
		);

		return apply_filters( 'dpdfg_ext_get_settings_modal_toggles', $toggles );
	}

	public function get_advanced_fields_config() {
		$advanced_fields = array(
			'fonts'      => array(
				'dpdfg_entry_title'       => array(
					'label'        => __( 'Title', 'dpdfg-dp-divi-filtergrid' ),
					'css'          => array(
						'main'      => "$this->main_css_element .entry-title, $this->main_css_element .entry-title a",
						'important' => 'all',
					),
					'line_height'  => array( 'default' => '1em' ),
					'font_size'    => array( 'default' => '18px' ),
					'header_level' => true,
					'toggle_slug'  => 'dfg_text',
					'sub_toggle'   => 'title',
				),
				'dpdfg_entry_meta'        => array(
					'label'       => __( 'Meta', 'dpdfg-dp-divi-filtergrid' ),
					'css'         => array(
						'main'        => "$this->main_css_element .entry-meta span, $this->main_css_element .entry-meta span a",
						'text_align'  => "$this->main_css_element .entry-meta",
						'line_height' => "$this->main_css_element .entry-meta",
						'important'   => 'all',
					),
					'line_height' => array( 'default' => '1.7em' ),
					'font_size'   => array( 'default' => '14px' ),
					'toggle_slug' => 'dfg_text',
					'sub_toggle'  => 'meta',
				),
				'dpdfg_entry_summary'     => array(
					'label'       => __( 'Content/Excerpt', 'dpdfg-dp-divi-filtergrid' ),
					'css'         => array(
						'main'      => "$this->main_css_element .entry-summary",
						'important' => 'all',
					),
					'line_height' => array( 'default' => '1.7em' ),
					'font_size'   => array( 'default' => '14px' ),
					'toggle_slug' => 'dfg_text',
					'sub_toggle'  => 'content',
				),
				'dpdfg_entry_cf_label'    => array(
					'label'           => __( 'Custom Field Label', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-custom-field-label",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1.7em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_text',
					'sub_toggle'      => 'cf_label',
				),
				'dpdfg_entry_cf_value'    => array(
					'label'           => __( 'Custom Field Value', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-custom-field-value",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1.7em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_text',
					'sub_toggle'      => 'cf_value',
				),
				'dpdfg_entry_custom'      => array(
					'label'       => __( 'Custom Content', 'dpdfg-dp-divi-filtergrid' ),
					'css'         => array(
						'main'      => "$this->main_css_element .dp-dfg-custom-content",
						'important' => 'all',
					),
					'line_height' => array( 'default' => '1.7em' ),
					'font_size'   => array( 'default' => '14px' ),
					'toggle_slug' => 'dfg_text',
					'sub_toggle'  => 'custom_content',
				),
				'dpdfg_search'            => array(
					'label'           => __( 'Search Input', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-search-input",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_search_text',
					'sub_toggle'      => 'search',
				),
				'dpdfg_filters'           => array(
					'label'           => __( 'Button/Select Filters', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-filter .dp-dfg-filter-link",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1.9em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_filter_text',
					'sub_toggle'      => 'filters',
				),
				'dpdfg_filters_active'    => array(
					'label'           => __( 'Button/Select Active Filter', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-filter .dp-dfg-filter-link.active",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1.9em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_filter_text',
					'sub_toggle'      => 'filters_active',
				),
				'dpdfg_levels_labels'     => array(
					'label'       => __( 'Levels Label', 'dpdfg-dp-divi-filtergrid' ),
					'css'         => array(
						'main'      => "$this->main_css_element .dp-dfg-taxonomy-label",
						'important' => 'all',
					),
					'line_height' => array( 'default' => '1em' ),
					'font_size'   => array( 'default' => '20px' ),
					'toggle_slug' => 'dfg_filter_text',
					'sub_toggle'  => 'levels',
				),
				'dpdfg_dropdown_labels'   => array(
					'label'           => __( 'Select Placeholder', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-dropdown-label",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '2em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_filter_text',
					'sub_toggle'      => 'dropdown_placeholder',
				),
				'dpdfg_dropdown_tags'     => array(
					'label'           => __( 'Select Placeholder Active', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-dropdown-tag",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_filter_text',
					'sub_toggle'      => 'dropdown_tags',
				),
				'dpdfg_sort'              => array(
					'label'           => __( 'Options', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-sort-option",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1.9em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_sort_text',
					'sub_toggle'      => 'sorting',
				),
				'dpdfg_sort_active'       => array(
					'label'           => __( 'Active Option', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-sort-option.active",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1.9em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_sort_text',
					'sub_toggle'      => 'sorting_active',
				),
				'dpdfg_sort_labels'       => array(
					'label'           => __( 'Placeholder', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-dropdown-label, $this->main_css_element .dp-dfg-sort-order span:after",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '2em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_sort_text',
					'sub_toggle'      => 'dropdown_placeholder',
				),
				'dpdfg_pagination'        => array(
					'label'           => __( 'Pagination', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-pagination ul.pagination li a",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1.9em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_pagination_text',
					'sub_toggle'      => 'pagination',
				),
				'dpdfg_pagination_active' => array(
					'label'           => __( 'Pagination Active', 'dpdfg-dp-divi-filtergrid' ),
					'css'             => array(
						'main'      => "$this->main_css_element .dp-dfg-pagination ul.pagination li.pagination-item.active a",
						'important' => 'all',
					),
					'hide_text_align' => true,
					'line_height'     => array( 'default' => '1.9em' ),
					'font_size'       => array( 'default' => '14px' ),
					'toggle_slug'     => 'dfg_pagination_text',
					'sub_toggle'      => 'pagination_active',
				),
			),
			'button'     => array(
				'read_more_button'     => array(
					'label'         => __( 'Read More Button', 'dpdfg-dp-divi-filtergrid' ),
					'use_alignment' => true,
					'box_shadow'    => false,
					'css'           => array(
						'main'        => "$this->main_css_element .et_pb_button.dp-dfg-more-button",
						'plugin_main' => "$this->main_css_element .et_pb_button.dp-dfg-more-button",
						'alignment'   => "$this->main_css_element .dp-dfg-item .et_pb_button_wrapper.read-more-wrapper",
					),
				),
				'action_button'        => array(
					'label'         => __( 'Click Action Button', 'dpdfg-dp-divi-filtergrid' ),
					'use_alignment' => true,
					'box_shadow'    => false,
					'css'           => array(
						'main'        => "$this->main_css_element .et_pb_button.dp-dfg-action-button",
						'plugin_main' => "$this->main_css_element .et_pb_button.dp-dfg-action-button",
						'alignment'   => "$this->main_css_element .dp-dfg-item .et_pb_button_wrapper.action-button-wrapper",
					),
				),
				'load_more_button'     => array(
					'label'         => __( 'Load More Button', 'dpdfg-dp-divi-filtergrid' ),
					'use_alignment' => true,
					'box_shadow'    => false,
					'css'           => array(
						'main'        => "$this->main_css_element .et_pb_button.dp-dfg-load-more-button",
						'plugin_main' => "$this->main_css_element .et_pb_button.dp-dfg-load-more-button",
						'alignment'   => "$this->main_css_element .dp-dfg-pagination .et_pb_button_wrapper",
					),
				),
				'filter_now_button'    => array(
					'label'         => __( 'Trigger Filters Button', 'dpdfg-dp-divi-filtergrid' ),
					'use_alignment' => false,
					'box_shadow'    => false,
					'no_rel_attr'   => true,
					'css'           => array(
						'main'        => "$this->main_css_element .et_pb_button.dp-dfg-filter-trigger-button",
						'plugin_main' => "$this->main_css_element .et_pb_button.dp-dfg-filter-trigger-button",
					),
				),
				'clear_filters_button' => array(
					'label'         => __( 'Clear Filters Button', 'dpdfg-dp-divi-filtergrid' ),
					'use_alignment' => false,
					'box_shadow'    => false,
					'no_rel_attr'   => true,
					'css'           => array(
						'main'        => "$this->main_css_element .et_pb_button.dp-dfg-clear-filters-button",
						'plugin_main' => "$this->main_css_element .et_pb_button.dp-dfg-clear-filters-button",
					),
				),
			),
			'borders'    => array(
				'default' => array(
					'css'      => array(
						'main' => array(
							'border_radii'        => "$this->main_css_element .dp-dfg-container .dp-dfg-items .dp-dfg-item",
							'border_styles'       => "$this->main_css_element .dp-dfg-container .dp-dfg-items .dp-dfg-item",
							'border_styles_hover' => "$this->main_css_element .dp-dfg-container .dp-dfg-items .dp-dfg-item:hover",
						),
					),
					'defaults' => array(
						'border_radii'  => 'on||||',
						'border_styles' => array(
							'width' => '1px',
							'color' => '#d8d8d8',
							'style' => 'solid',
						),
					),
				),
				'popup'   => array(
					'css'         => array(
						'main' => array(
							'border_radii'        => "$this->main_css_element-popup.dp-dfg-popup #dp-dfg-popup-modal-iframe, $this->main_css_element-popup.dp-dfg-popup .dp-dfg-popup-modal-inline",
							'border_styles'       => "$this->main_css_element-popup.dp-dfg-popup #dp-dfg-popup-modal-iframe,  $this->main_css_element-popup.dp-dfg-popup .dp-dfg-popup-modal-inline",
							'border_styles_hover' => "$this->main_css_element-popup.dp-dfg-popup #dp-dfg-popup-modal-iframe:hover,  $this->main_css_element-popup.dp-dfg-popup .dp-dfg-popup-modal-inline:hover",
						),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'popup_options',
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => "$this->main_css_element .dp-dfg-container .dp-dfg-items .dp-dfg-item",
					),
				),
				'popup'   => array(
					'css'         => array(
						'main' => "$this->main_css_element-popup.dp-dfg-popup #dp-dfg-popup-modal-iframe,  $this->main_css_element-popup.dp-dfg-popup .dp-dfg-popup-modal-inline",
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'popup_options',
				),
			),
			'text'       => false,
			'filters'    => array(
				'css'                  => array(
					'main' => "%%order_class%%",
				),
				'child_filters_target' => array(
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'image',
				),
			),
			'image'      => array(
				'css' => array(
					'main'  => "%%order_class%% .dp-dfg-image img",
					'hover' => "%%order_class%% .dp-dfg-image:hover img",
				),
			),
		);

		return apply_filters( 'dpdfg_ext_get_advanced_fields_config', $advanced_fields, $this->main_css_element );
	}

	public function get_custom_css_fields_config() {
		$custom_css = array(
			'dp-dfg-container'              => array(
				'label'    => __( 'Grid Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-container",
			),
			'dp-dfg-search'                 => array(
				'label'    => __( 'Search Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-search",
			),
			'dp-dfg-search-input'           => array(
				'label'    => __( 'Search Input', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-search-input",
			),
			'dp-dfg-search-icon'            => array(
				'label'    => __( 'Search Icon', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-search-icon",
			),
			'dp-dfg-filters'                => array(
				'label'    => __( 'Filters Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-filters",
			),
			'dp-dfg-levels'                 => array(
				'label'    => __( 'Levels Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element ul.dp-dfg-level",
			),
			'dp-dfg-dropdown-labels'        => array(
				'label'    => __( 'Level Dropdown Label', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-dropdown-label",
			),
			'dp-dfg-dropdown-tags'          => array(
				'label'    => __( 'Level Dropdown Tag', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-dropdown-tag",
			),
			'dp-dfg-filter'                 => array(
				'label'    => __( 'Filters', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-skin-default .dp-dfg-filter a.dp-dfg-filter-link",
			),
			'dp-dfg-filter_active'          => array(
				'label'    => __( 'Active Filter', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-skin-default .dp-dfg-filter a.dp-dfg-filter-link.active",
			),
			'dp-dfg-sorting'                => array(
				'label'    => __( 'Sorting Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-sorting",
			),
			'dp-dfg-sorder'                 => array(
				'label'    => __( 'Sort Order Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-sort-order",
			),
			'dp-dfg-sorderby'               => array(
				'label'    => __( 'Sort OrderBy Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-sort-orderby",
			),
			'dp-dfg-sopt'                   => array(
				'label'    => __( 'Sort OrderBy Options', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-sort-option",
			),
			'dp-dfg-items'                  => array(
				'label'    => __( 'Posts Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-items",
			),
			'dp-dfg-masonry-item'           => array(
				'label'    => __( 'Standard Masonry Item Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-masonry-item",
			),
			'dp-dfg-item'                   => array(
				'label'    => __( 'Post Item Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-item",
			),
			'entry-thumb-container'         => array(
				'label'    => __( 'Post Thumbnail Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-image",
			),
			'entry-thumb'                   => array(
				'label'    => __( 'Thumbnail', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-image img",
			),
			'entry-overlay'                 => array(
				'label'    => __( 'Overlay', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-overlay",
			),
			'entry-header'                  => array(
				'label'    => __( 'Post Title Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-header",
			),
			'entry-meta'                    => array(
				'label'    => __( 'Post Meta Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-meta",
			),
			'entry-summary'                 => array(
				'label'    => __( 'Post Content Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-content",
			),
			'entry-cf'                      => array(
				'label'    => __( 'Custom Field Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-custom-field",
			),
			'entry-cf-label'                => array(
				'label'    => __( 'Custom Field Label', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-custom-field-label",
			),
			'entry-cf-value'                => array(
				'label'    => __( 'Custom Field Value', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-custom-field-value",
			),
			'entry-button'                  => array(
				'label'    => __( 'Read More Button Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .et_pb_button_wrapper",
			),
			'entry-custom-content'          => array(
				'label'    => __( 'Custom Content Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-custom-content",
			),
			'dp-dfg-pagination'             => array(
				'label'    => __( 'Pagination Container', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-pagination",
			),
			'dp-dfg-pagination-link'        => array(
				'label'    => __( 'Pagination Item', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-skin-default .dp-dfg-pagination ul.pagination li.pagination-item",
			),
			'dp-dfg-pagination-link_active' => array(
				'label'    => __( 'Pagination Item Active', 'dpdfg-dp-divi-filtergrid' ),
				'selector' => "$this->main_css_element .dp-dfg-skin-default .dp-dfg-pagination ul.pagination li.pagination-item.active",
			),
		);

		return apply_filters( 'dpdfg_ext_get_custom_css_fields_config', $custom_css, $this->main_css_element );
	}

	public function get_fields() {
		$query_fields          = array(
			'custom_query'                => array(
				'label'           => __( 'Query Type', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'basic'       => __( 'Basic (posts only)', 'dpdfg-dp-divi-filtergrid' ),
					'advanced'    => __( 'Advanced (any custom post type)', 'dpdfg-dp-divi-filtergrid' ),
					'archive'     => __( 'Archive Page (category, search, etc.)', 'dpdfg-dp-divi-filtergrid' ),
					'related'     => __( 'Related Posts (related to current post)', 'dpdfg-dp-divi-filtergrid' ),
					'posts_ids'   => __( 'Manual (post IDs)', 'dpdfg-dp-divi-filtergrid' ),
					'custom'      => __( 'Custom (create your own query)', 'dpdfg-dp-divi-filtergrid' ),
					'third_party' => __( 'Third Party Integration', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'basic',
				'description'     => __( 'Choose the type of query you would like to use to display your posts. Please review the <a target="_blank" href="https://diviplugins.com/documentation/divi-filtergrid/query-type/">documentation page</a> for details about each query type.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'support_for'                 => array(
				'label'           => __( 'Plugin Name', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'sfp' => __( 'Search & Filter Pro', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'sfp',
				'show_if'         => array(
					'custom_query' => 'third_party'
				),
				'description'     => __( '...', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'sfp_id'                      => array(
				'label'       => __( 'Search & Filter Form ID', 'dpdfg-dp-divi-filtergrid' ),
				'type'        => 'text',
				'show_if'     => array(
					'custom_query' => 'third_party',
					'support_for'  => 'sfp'
				),
				'tab_slug'    => 'general',
				'toggle_slug' => 'query_options',
			),
			'include_categories'          => array(
				'label'            => __( 'Include Categories', 'dpdfg-dp-divi-filtergrid' ),
				'type'             => 'categories',
				'option_category'  => 'configuration',
				'renderer_options' => array(
					'use_terms' => false,
				),
				'show_if'          => array( 'custom_query' => 'basic' ),
				'description'      => __( 'Choose which categories you would like to include in the feed.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'query_options',
			),
			'current_post_type'           => array(
				'label'           => __( 'Use Current Post Type', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array( 'custom_query' => 'archive' ),
				'description'     => __( 'Automatically gets the post type associated with the current archive page. Turn this option off to manually select a post type below.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'multiple_cpt'                => array(
				'label'           => __( 'Select Post Types', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => false,
				'groups'          => false,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_cpt',
				'cache'           => 'cpt_list',
				'action'          => 'dpdfg_get_cpt_action',
				'placeholder'     => __( 'Start typing the post type name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => 'post',
				'show_if'         => array(
					'custom_query' => array(
						'advanced',
						'archive'
					)
				),
				'description'     => __( 'Click to select the post types you would like to display.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'use_taxonomy_terms'          => array(
				'label'           => __( 'Use Taxonomies', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array( 'custom_query' => 'advanced' ),
				'description'     => __( 'Turn this option on to use taxonomies (categories, tags, etc.) to narrow the results. Leave this option off if you want to display all posts from the post type(s) above.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'multiple_taxonomies'         => array(
				'label'           => __( 'Select Taxonomies', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => false,
				'groups'          => false,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_tax',
				'cache'           => 'tax_list',
				'action'          => 'dpdfg_get_taxonomies_action',
				'placeholder'     => __( 'Start typing the taxonomy name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => 'category',
				'show_if'         => array(
					'custom_query'       => 'advanced',
					'use_taxonomy_terms' => 'on',
				),
				'description'     => __( 'Click to select the taxonomies you would like to include.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'taxonomies_relation'         => array(
				'label'           => __( 'Taxonomies Relation', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'OR'  => __( 'OR', 'dpdfg-dp-divi-filtergrid' ),
					'AND' => __( 'AND', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'OR',
				'show_if'         => array(
					'custom_query'       => 'advanced',
					'use_taxonomy_terms' => 'on',
				),
				'description'     => __( 'If you are using multiple taxonomies select the relation between all the taxonomies', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'include_terms'               => array(
				'label'           => __( 'Select Terms', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => true,
				'groups'          => true,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_terms',
				'cache'           => 'terms_list',
				'action'          => 'dpdfg_get_taxonomies_terms_action',
				'placeholder'     => __( 'Start typing the term name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => '',
				'show_if'         => array(
					'custom_query'       => 'advanced',
					'use_taxonomy_terms' => 'on',
				),
				'description'     => __( 'Click to select the terms you would like to include.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'terms_relation'              => array(
				'label'           => __( 'Terms Relation', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'IN'  => __( 'OR', 'dpdfg-dp-divi-filtergrid' ),
					'AND' => __( 'AND', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'IN',
				'show_if'         => array(
					'custom_query'       => 'advanced',
					'use_taxonomy_terms' => 'on',
				),
				'description'     => __( 'If you are using multiple terms select the relation between all terms of the same taxonomy.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'include_children_terms'      => array(
				'label'           => __( 'Include Child Terms', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'custom_query'       => 'advanced',
					'use_taxonomy_terms' => 'on',
				),
				'description'     => __( 'Turn this option off to only display posts from the parent term. Leave this option on if you want to display posts from both parent and child terms.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'exclude_taxonomies'          => array(
				'label'           => __( 'Exclude Taxonomies', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => false,
				'groups'          => false,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_tax',
				'cache'           => 'tax_list',
				'action'          => 'dpdfg_get_taxonomies_action',
				'placeholder'     => __( 'Start typing the taxonomy name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => 'category',
				'show_if'         => array(
					'custom_query'       => 'advanced',
					'use_taxonomy_terms' => 'on',
				),
				'description'     => __( 'Click to select one or more taxonomies you would like to use to exclude posts.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'exclude_taxonomies_relation' => array(
				'label'           => __( 'Exclude Taxonomies Relation', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'AND' => __( 'AND', 'dpdfg-dp-divi-filtergrid' ),
					'OR'  => __( 'OR', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'OR',
				'show_if'         => array(
					'custom_query'       => 'advanced',
					'use_taxonomy_terms' => 'on',
				),
				'description'     => __( 'If you are using multiple exclude taxonomies select the relation between all the exclude taxonomies', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'exclude_terms'               => array(
				'label'           => __( 'Exclude Terms', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => true,
				'groups'          => true,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_terms',
				'cache'           => 'terms_list',
				'action'          => 'dpdfg_get_taxonomies_terms_action',
				'placeholder'     => __( 'Start typing the term name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => '',
				'show_if'         => array(
					'custom_query'       => 'advanced',
					'use_taxonomy_terms' => 'on',
				),
				'description'     => __( 'Click to select one or more terms you would like to use to exclude posts.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'related_taxonomies'          => array(
				'label'           => __( 'Related Taxonomies', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => false,
				'groups'          => false,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_tax',
				'cache'           => 'tax_list',
				'action'          => 'dpdfg_get_taxonomies_action',
				'placeholder'     => __( 'Start typing the taxonomy name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => '',
				'show_if'         => array(
					'custom_query' => 'related'
				),
				'description'     => __( 'Click to select the taxonomies you would like to use to determine if a post is related to the current post.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'related_criteria'            => array(
				'label'           => __( 'Taxonomy Relation', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'one_in_one' => __( 'Any terms in any taxonomies.', 'dpdfg-dp-divi-filtergrid' ),
					'one_in_all' => __( 'Any terms in all taxonomies.', 'dpdfg-dp-divi-filtergrid' ),
					'all_in_one' => __( 'All terms in any taxonomies.', 'dpdfg-dp-divi-filtergrid' ),
					'all_in_all' => __( 'All terms in all taxonomies.', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'one_in_one',
				'show_if'         => array(
					'custom_query' => 'related'
				),
				'description'     => __( 'Choose how the posts should be related. Taxonomies used for the relation will be the ones selected in the Related Taxonomies field above.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'posts_ids'                   => array(
				'label'           => __( 'Include Posts by IDs', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'show_if'         => array(
					'custom_query' => array(
						'posts_ids'
					),
				),
				'dynamic_content' => 'text',
				'description'     => __( 'Enter a comma-separated list of page, post or custom post type IDs you want to include.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'post_number'                 => array(
				'label'           => __( 'Post Number', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '12',
				'show_if'         => array(
					'custom_query' => array(
						'related',
						'archive',
						'advanced',
						'basic',
						'posts_ids'
					),
				),
				'description'     => __( 'The number of posts to display per page or total if pagination is turned off. Use -1 to display all posts. If Query Type is set to Archive and pagination is on, value should match the value set in Divi Theme Options for those pages.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'offset_number'               => array(
				'label'           => __( 'Offset Number', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '0',
				'show_if'         => array(
					'custom_query' => array(
						'archive',
						'advanced',
						'basic',
					),
				),
				'description'     => __( 'Choose how many posts you would like to offset by.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'order'                       => array(
				'label'           => __( 'Order', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'ASC'  => __( 'Ascending', 'dpdfg-dp-divi-filtergrid' ),
					'DESC' => __( 'Descending', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'DESC',
				'show_if'         => array(
					'custom_query' => array(
						'related',
						'archive',
						'advanced',
						'basic',
						'posts_ids'
					),
				),
				'description'     => __( 'Choose to order posts in ascending or descending order.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'orderby'                     => array(
				'label'           => __( 'Order By', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'date'          => __( 'Date', 'dpdfg-dp-divi-filtergrid' ),
					'title'         => __( 'Title', 'dpdfg-dp-divi-filtergrid' ),
					'name'          => __( 'Slug', 'dpdfg-dp-divi-filtergrid' ),
					'rand'          => __( 'Random', 'dpdfg-dp-divi-filtergrid' ),
					'menu_order'    => __( 'Menu Order', 'dpdfg-dp-divi-filtergrid' ),
					'modified'      => __( 'Last Modified Date', 'dpdfg-dp-divi-filtergrid' ),
					'comment_count' => __( 'Comments Count', 'dpdfg-dp-divi-filtergrid' ),
					'parent'        => __( 'Parent ID', 'dpdfg-dp-divi-filtergrid' ),
					'type'          => __( 'Post Type', 'dpdfg-dp-divi-filtergrid' ),
					'author'        => __( 'Author', 'dpdfg-dp-divi-filtergrid' ),
					'relevance'     => __( 'Search Relevance', 'dpdfg-dp-divi-filtergrid' ),
					'meta_value'    => __( 'Custom Field', 'dpdfg-dp-divi-filtergrid' ),
					'post__in'      => __( 'Preserve post ID order', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'date',
				'show_if'         => array(
					'custom_query' => array(
						'related',
						'archive',
						'advanced',
						'basic',
						'posts_ids'
					),
				),
				'description'     => __( 'Choose a parameter to apply the order to.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'meta_key'                    => array(
				'label'           => __( 'Custom Field Name', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '',
				'show_if'         => array(
					'custom_query' => array(
						'related',
						'archive',
						'advanced',
						'basic',
						'posts_ids'
					),
					'orderby'      => array( 'meta_value' ),
				),
				'description'     => __( 'Enter the custom field name.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'meta_type'                   => array(
				'label'           => __( 'Custom Field Type', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'NUMERIC',
					'BINARY',
					'CHAR',
					'DATE',
					'DATETIME',
					'DECIMAL',
					'SIGNED',
					'TIME',
					'UNSIGNED',
				),
				'default'         => 'CHAR',
				'show_if'         => array(
					'custom_query' => array(
						'related',
						'archive',
						'advanced',
						'basic',
						'posts_ids'
					),
					'orderby'      => array( 'meta_value' ),
				),
				'description'     => __( 'Enter the custom field type.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'show_private'                => array(
				'label'           => __( 'Show Private Posts', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'custom_query' => array(
						'related',
						'archive',
						'advanced',
						'basic',
						'posts_ids'
					),
				),
				'description'     => __( 'Turn this option on to display private posts if user is logged in.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'current_author'              => array(
				'label'           => __( 'Only Display Posts From Current Author', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'custom_query' => array(
						'related',
						'advanced',
						'basic',
						'posts_ids'
					),
				),
				'description'     => __( 'Turn this option on to display posts only from the current author.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'sticky_posts'                => array(
				'label'           => __( 'Ignore Sticky Posts', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if_not'     => array(
					'custom_query' => array(
						'custom',
						'third_party'
					)
				),
				'description'     => __( 'Turn this option on to ignore sticky posts. Currently sticky posts are not compatible with filters or pagination.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'remove_current_post'         => array(
				'label'           => __( 'Remove Current Post', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'custom_query' => array(
						'basic',
						'advanced'
					)
				),
				'description'     => __( 'Turn on if you want to remove the current post. Useful if you want to show related content.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'no_results'                  => array(
				'label'           => __( 'Empty Results Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'No results found.', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Enter the text you would like to display when no results are found.', 'dpdfg-dp-divi-filtergrid' ),
				'dynamic_content' => 'text',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'query_options',
			),
			'no_init'                     => array(
				'label'       => __( 'Hide Initial Results', 'dpdfg-dp-divi-filtergrid' ),
				'description' => __( 'Turn on to hide initial query results on page load.', 'dpdfg-dp-divi-filtergrid' ),
				'type'        => 'yes_no_button',
				'options'     => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'     => 'off',
				'toggle_slug' => 'query_options',
			),
		);
		$posts_elements_fields = array(
			'thumbnail_action'         => array(
				'label'           => __( 'Click Action', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'none'             => __( 'None', 'dpdfg-dp-divi-filtergrid' ),
					'link'             => __( 'Link to post', 'dpdfg-dp-divi-filtergrid' ),
					'popup'            => __( 'Show post in popup', 'dpdfg-dp-divi-filtergrid' ),
					'popup_v'          => __( 'Show secondary view in popup', 'dpdfg-dp-divi-filtergrid' ),
					'lightbox'         => __( 'Show feature image in lightbox', 'dpdfg-dp-divi-filtergrid' ),
					'lightbox_gallery' => __( 'Show all feature images in lightbox gallery', 'dpdfg-dp-divi-filtergrid' ),
					'gallery_cf'       => __( 'Open custom lightbox gallery', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'link',
				'description'     => __( 'Select the click action you would like to apply when the featured image, overlay or item is clicked. Don\'t apply to read more button and title link.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'gallery_cf_name'          => array(
				'label'           => __( 'Custom Field Name for Images', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '',
				'show_if'         => array(
					'thumbnail_action' => array(
						'gallery_cf',
					)
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
				'description'     => __( 'Enter the custom field name containing the image or array of images you would like to load in the custom lightbox gallery. Leave this empty to use the <a href="https://diviplugins.com/documentation/divi-filtergrid/custom-lightbox/">Custom Lightbox filter</a>.', 'dpdfg-dp-divi-filtergrid' ),
			),
			'lightbox_elements'        => array(
				'label'           => __( 'Lightbox Data', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'multiple_checkboxes',
				'option_category' => 'configuration',
				'options'         => array(
					'p_title'     => __( 'Post Title', 'dpdfg-dp-divi-filtergrid' ),
					'i_title'     => __( 'Image Title', 'dpdfg-dp-divi-filtergrid' ),
					'caption'     => __( 'Image Caption', 'dpdfg-dp-divi-filtergrid' ),
					'description' => __( 'Image Description', 'dpdfg-dp-divi-filtergrid' ),
					'custom'      => __( 'Custom Data', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on|||',
				'show_if'         => array(
					'thumbnail_action' => array(
						'lightbox',
						'lightbox_gallery',
					)
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
				'description'     => __( 'Select data to show on the lightbox footer ', 'dpdfg-dp-divi-filtergrid' ),
			),
			'show_thumbnail'           => array(
				'label'           => __( 'Show Featured Image', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'description'     => __( 'This will turn thumbnails on and off.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'thumbnail_size'           => array(
				'label'           => __( 'Thumbnail Size', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => Dp_Dfg_Utils::get_registered_thumbnail_sizes(),
				'default'         => '400x284',
				'show_if'         => array( 'show_thumbnail' => 'on' ),
				'description'     => __( 'Select the thumbnail size.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			't_alt'                    => array(
				'label'           => __( 'Image Alt Tag Source', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'title'   => __( 'Post title', 'dpdfg-dp-divi-filtergrid' ),
					'alt'     => __( 'Image alternative text', 'dpdfg-dp-divi-filtergrid' ),
					'image'   => __( 'Image title', 'dpdfg-dp-divi-filtergrid' ),
					'caption' => __( 'Image caption', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'title',
				'show_if'         => array( 'show_thumbnail' => 'on' ),
				'description'     => __( 'Select the thumbnail alt tag source.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'use_overlay'              => array(
				'label'           => __( 'Overlay', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'description'     => __( 'If enabled, an overlay color and icon will be displayed when a visitor hovers over the featured image of a post.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'show_title'               => array(
				'label'           => __( 'Show Title', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'description'     => __( 'Turn on or off the title.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'title_link'               => array(
				'label'           => __( 'Add Link to Title', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array( 'show_title' => 'on' ),
				'description'     => __( 'Turn this option on if you want the title to link to the post or the custom URL.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'show_post_meta'           => array(
				'label'           => __( 'Show Post Meta', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'description'     => __( 'Turn on or off the post meta information.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'meta_separator'           => array(
				'label'           => __( 'Meta Separator', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => ' | ',
				'show_if'         => array( 'show_post_meta' => 'on' ),
				'description'     => __( 'Enter any character including empty spaces to replace the default pipe separator between each meta element.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'show_author'              => array(
				'label'           => __( 'Show Author', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array( 'show_post_meta' => 'on' ),
				'description'     => __( 'Turn on or off the author link.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'author_prefix_text'       => array(
				'label'           => __( 'Author Prefix', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'By ', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array(
					'show_post_meta' => 'on',
					'show_author'    => 'on',
				),
				'description'     => __( 'Custom prefix displayed before author name.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'show_date'                => array(
				'label'           => __( 'Show Date', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array( 'show_post_meta' => 'on' ),
				'description'     => __( 'Turn the date on or off.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'date_format'              => array(
				'label'       => __( 'Date Format', 'dpdfg-dp-divi-filtergrid' ),
				'type'        => 'text',
				'show_if'     => array(
					'show_post_meta' => 'on',
					'show_date'      => 'on',
				),
				'default'     => get_option( 'date_format' ),
				'description' => __( 'Define the date format. <a target="_blank" href="https://codex.wordpress.org/Formatting_Date_and_Time">Documentation on date and time formatting</a>.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'    => 'general',
				'toggle_slug' => 'elements_options',
			),
			'show_terms'               => array(
				'label'           => __( 'Show Terms', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array( 'show_post_meta' => 'on' ),
				'description'     => __( 'Turn the terms links on or off (categories, tags, etc.)', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'show_terms_taxonomy'      => array(
				'label'           => __( 'Show Terms Taxonomy', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => false,
				'groups'          => false,
				'draggable'       => true,
				'json_data'       => false,
				'nonce'           => 'nonce_tax',
				'cache'           => 'tax_list',
				'action'          => 'dpdfg_get_taxonomies_action',
				'placeholder'     => __( 'Start typing the taxonomy name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => 'category',
				'show_if'         => array(
					'show_post_meta' => 'on',
					'show_terms'     => 'on',
				),
				'description'     => __( 'Show terms of specific taxonomies. Let blank to show all terms.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'terms_separator'          => array(
				'label'           => __( 'Terms Separator', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => ',',
				'show_if'         => array(
					'show_post_meta' => 'on',
					'show_terms'     => 'on',
				),
				'description'     => __( 'Enter any character including empty spaces to replace the default comma separator between each term.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'terms_links'              => array(
				'label'           => __( 'Add Links To Terms', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'show_post_meta' => 'on',
					'show_terms'     => 'on',
				),
				'description'     => __( 'Turn this option on if you want to link each term\'s archive page', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'show_comments'            => array(
				'label'           => __( 'Show Comment Count', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array( 'show_post_meta' => 'on' ),
				'description'     => __( 'Turn comment count on or off.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'show_content'             => array(
				'label'           => __( 'Show Content', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Turn the post excerpt or content on or off.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'content_length'           => array(
				'label'           => __( 'Content Length', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'excerpt' => __( 'Show Excerpt', 'dpdfg-dp-divi-filtergrid' ),
					'full'    => __( 'Show Full Content', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'excerpt',
				'show_if'         => array( 'show_content' => 'on' ),
				'description'     => __( 'Show excerpt or full post content.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'truncate_content'         => array(
				'label'           => __( 'Limit Excerpt', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'default'         => '120',
				'option_category' => 'configuration',
				'show_if'         => array(
					'show_content'   => 'on',
					'content_length' => 'excerpt'
				),
				'description'     => __( 'Enter the number of characters you would like to limit the excerpt to for posts that do not have an excerpt. This will not apply to posts that have an excerpt.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'truncate_excerpt'         => array(
				'label'           => __( 'Limit Manually Added Excerpts', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'show_if'         => array(
					'show_content'   => 'on',
					'content_length' => 'excerpt'
				),
				'default'         => 'off',
				'description'     => __( 'Turn on to limit manually added excerpts to the number of characters entered above. Leave this option off to display the full excerpts for posts that have an excerpt defined.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'strip_html'               => array(
				'label'           => __( 'Strip HTML', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'show_if'         => array(
					'show_content'   => 'on',
					'content_length' => 'excerpt'
				),
				'default'         => 'on',
				'description'     => __( 'Remove HTML tags from excerpt. Turning this option off can break the grid layout if the excerpt is truncated in the middle of an HTML tag.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'action_button'            => array(
				'label'           => __( 'Show Click Action Button', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'thumbnail_action' => array(
						'popup',
						'lightbox',
						'lightbox_gallery',
						'gallery_cf'
					)
				),
				'description'     => __( 'Turn click action button on or off.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'action_button_text'       => array(
				'label'           => __( 'Click Action Button Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'Click Action Button', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array(
					'thumbnail_action' => array(
						'popup',
						'lightbox',
						'lightbox_gallery',
						'gallery_cf'
					),
					'action_button'    => 'on'
				),
				'dynamic_content' => 'text',
				'description'     => __( 'Custom text for the click action button.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'read_more'                => array(
				'label'           => __( 'Show Read More Button', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Turn read more button on or off.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'read_more_text'           => array(
				'label'           => __( 'Read More Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'Read More', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 'read_more' => 'on' ),
				'dynamic_content' => 'text',
				'description'     => __( 'Custom text for the read more button.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'read_more_window'         => array(
				'label'           => __( 'Link Target', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'Same Window', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'New Tab', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Here you can choose whether or not your link opens in a new window', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'show_custom_fields'       => array(
				'label'           => __( 'Show Custom Fields', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Turn custom fields on or off', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'custom_fields'            => array(
				'label'           => __( 'Custom Fields', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Select the custom field you want to add. Once added, you can optionally add a label before each custom field by typing in the input for that field. Leave input empty to display the custom field value without a label. Drag and drop custom fields to change their order.', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => true,
				'groups'          => false,
				'draggable'       => true,
				'json_data'       => array( 'label' ),
				'nonce'           => 'nonce_cf',
				'cache'           => 'cf_list',
				'action'          => 'dpdfg_get_custom_fields_action',
				'placeholder'     => __( 'Start typing the field name', 'dpdfg-dp-divi-filtergrid' ),
				'p_label'         => __( 'Custom field label', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => '',
				'show_if'         => array( 'show_custom_fields' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'show_custom_content'      => array(
				'label'           => __( 'Show Custom Content', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Turn custom content on or off. Please review the <a target="_blank" href="https://diviplugins.com/documentation/divi-filtergrid/">documentation page</a> for instructions on adding custom content.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'custom_content_container' => array(
				'label'           => __( 'Custom Content / Custom Fields Wrapper', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'description'     => __( 'Turn this option off to remove the "dp-dfg-custom-content" wrapper, allowing you to create your own wrappers for different pieces of content and more placement options using CSS Grid.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'custom_url'               => array(
				'label'           => __( 'Use Custom URLs', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Changes the URL to a custom field value set in each post.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
			'custom_url_field_name'    => array(
				'label'       => __( 'Custom Field for URL', 'dpdfg-dp-divi-filtergrid' ),
				'type'        => 'text',
				'show_if'     => array( 'custom_url' => 'on' ),
				'description' => __( 'Enter custom field name (NOT the URL). The URL value needs to be set in each post using the custom field you input here. If no value is set, defaults to post URL.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'    => 'general',
				'toggle_slug' => 'elements_options',
			),
			'custom_url_target'        => array(
				'label'           => __( 'Custom URL Link Target', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'same' => __( 'Same as Link Target', 'dpdfg-dp-divi-filtergrid' ),
					'off'  => __( 'Same Window', 'dpdfg-dp-divi-filtergrid' ),
					'on'   => __( 'New Tab', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'same',
				'show_if'         => array( 'custom_url' => 'on' ),
				'description'     => __( 'Here you can choose whether or not custom url opens in a new window', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'elements_options',
			),
		);
		$video_fields          = array(
			'show_video_preview'    => array(
				'label'           => __( 'Display Video Previews', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'This will turn video previews on and off. Not compatible with all skins. For more information please visit the <a href="https://diviplugins.com/documentation/divi-filtergrid/video-preview/" target="_blank">documentation page</a>.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'video_options',
			),
			'video_module'          => array(
				'label'           => __( 'Search Video Modules & Blocks', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'show_video_preview' => 'on'
				),
				'description'     => __( 'Turn this option on to enable searching for video modules or gutenberg video blocks to display the video preview.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'video_options',
			),
			'video_action'          => array(
				'label'           => __( 'Video Click Action', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'play'  => __( 'Play video', 'dpdfg-dp-divi-filtergrid' ),
					'popup' => __( 'Play video in popup', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'play',
				'show_if'         => array(
					'show_video_preview' => 'on',
				),
				'description'     => __( 'Select the click action you would like to apply when the video or overlay is clicked.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'video_options',
			),
			'video_action_priority' => array(
				'label'           => __( 'Override Click Action', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'show_video_preview' => 'on',
				),
				'description'     => __( 'Trigger video action above instead of item click action.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'video_options',
			),
			'video_overlay'         => array(
				'label'           => __( 'Overlay', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'show_video_preview' => 'on',
				),
				'description'     => __( 'If enabled, an overlay color and icon will be displayed when a visitor hovers over the video preview.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'video_options',
			),
			'video_overlay_icon'    => array(
				'label'           => __( 'Show Overlay Icon', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'show_video_preview' => 'on',
					'video_overlay'      => 'on'
				),
				'description'     => __( 'Turn this option off to hide the icon in the overlay.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'video_options',
			),
			'video_icon'            => array(
				'label'           => __( 'Hover Icon Picker', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'class'           => array( 'et-pb-font-icon' ),
				'default'         => '%%40%%',
				'show_if'         => array(
					'show_video_preview' => 'on',
					'video_overlay'      => 'on',
					'video_overlay_icon' => 'on'
				),
				'description'     => __( 'Here you can define a custom icon for the overlay', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'video_options',
			),
			'video_icon_color'      => array(
				'label'        => __( 'Overlay Icon Color', 'dpdfg-dp-divi-filtergrid' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#ffffff',
				'show_if'      => array(
					'show_video_preview' => 'on',
					'video_overlay'      => 'on',
					'video_overlay_icon' => 'on'
				),
				'description'  => __( 'Here you can define a custom color for the overlay icon', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'     => 'general',
				'toggle_slug'  => 'video_options',
			),
			'video_overlay_color'   => array(
				'label'        => __( 'Hover Overlay Color', 'dpdfg-dp-divi-filtergrid' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => 'rgba(0,0,0,0.6)',
				'show_if'      => array(
					'show_video_preview' => 'on',
					'video_overlay'      => 'on'
				),
				'description'  => __( 'Here you can define a custom color for the overlay', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'     => 'general',
				'toggle_slug'  => 'video_options',
			),
		);
		$tax_filter_fields     = array(
			'show_filters'             => array(
				'label'           => __( 'Show Taxonomy Filters', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'description'     => __( 'Turn this option off if you do not want to give visitors the option to filter the results from the query above by taxonomy.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'multilevel'               => array(
				'label'           => __( 'Use MultiLevel Filters', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'show_filters' => 'on',
				),
				'show_if_not'     => array( 'custom_query' => 'basic' ),
				'description'     => __( 'Turn this option on to add more than one level of filters.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'multilevel_hierarchy'     => array(
				'label'           => __( 'Use Parent/Child Levels', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'show_filters' => 'on',
					'multilevel'   => 'on',
				),
				'show_if_not'     => array( 'custom_query' => 'basic' ),
				'description'     => __( 'Turn this option on to automatically generate filter levels from child terms of a single taxonomy that supports hierarchical terms (post categories). For more information please visit the <a href="https://diviplugins.com/documentation/divi-filtergrid/hierarchical-filters/" target="_blank">documentation page</a>.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'multilevel_hierarchy_tax' => array(
				'label'           => __( 'Parent/Child Taxonomy', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Select the taxonomy you want to use. Only one taxonomy can be used with the Parent/Child Taxonomy option. Once added, you can optionally add a label by typing in the first input. Leave the first input empty if you do not want to display a label. The ALL text can be changed by typing in the second input.', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => true,
				'search'          => false,
				'groups'          => false,
				'draggable'       => false,
				'json_data'       => array( 'label', 'all' ),
				'nonce'           => 'nonce_tax',
				'cache'           => 'tax_list',
				'action'          => 'dpdfg_get_taxonomies_action',
				'placeholder'     => __( 'Start typing the taxonomy name', 'dpdfg-dp-divi-filtergrid' ),
				'p_label'         => __( 'Label filter text', 'dpdfg-dp-divi-filtergrid' ),
				'p_all'           => __( 'All filter text', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => '[{"name":"category","label":"","all":""}]',
				'show_if'         => array(
					'show_filters'         => 'on',
					'multilevel'           => 'on',
					'multilevel_hierarchy' => 'on'
				),
				'show_if_not'     => array(
					'custom_query' => 'basic',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'multilevel_relation'      => array(
				'label'           => __( 'MultiLevel Filters Relation', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'OR'  => __( 'OR', 'dpdfg-dp-divi-filtergrid' ),
					'AND' => __( 'AND', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'AND',
				'show_if'         => array(
					'show_filters'         => 'on',
					'multilevel'           => 'on',
					'multilevel_hierarchy' => 'off'
				),
				'show_if_not'     => array( 'custom_query' => 'basic' ),
				'description'     => __( 'Choose if posts need to have an active filter in each level (AND) or if posts need to have only 1 active filter in any level (OR).', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'multilevel_tax_data'      => array(
				'label'           => __( 'MultiLevel Taxonomies', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Select the taxonomy you want to add for each level. Once added, you can optionally add a label before each level by typing in the first input for that level. Leave the first input empty to display levels without a label. The ALL text can be changed by typing in the second input for each level. Drag and drop levels to change their order.', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => false,
				'groups'          => false,
				'draggable'       => true,
				'json_data'       => array( 'label', 'all' ),
				'nonce'           => 'nonce_tax',
				'cache'           => 'tax_list',
				'action'          => 'dpdfg_get_taxonomies_action',
				'placeholder'     => __( 'Start typing the taxonomy name', 'dpdfg-dp-divi-filtergrid' ),
				'p_label'         => __( 'Label filter text', 'dpdfg-dp-divi-filtergrid' ),
				'p_all'           => __( 'All filter text', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => '[{"name":"category","label":"","all":""}]',
				'show_if'         => array(
					'show_filters'         => 'on',
					'multilevel'           => 'on',
					'multilevel_hierarchy' => 'off'
				),
				'show_if_not'     => array( 'custom_query' => 'basic' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'filter_children_terms'    => array(
				'label'           => __( 'Filter Child Terms', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array( 'show_filters' => 'on' ),
				'description'     => __( 'Turn this option on to include posts in child terms of the selected parent term in the filtered results, even if post is not in the currently filtered parent term. Turn this option off to only include posts in child terms if they are also in the currently filtered parent term.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'use_custom_terms_filters' => array(
				'label'           => __( 'Use Custom Filters', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array( 'show_filters' => 'on' ),
				'description'     => __( 'Turn this option on to bypass the filter options below and add the filters manually using our Custom Filters filter. For more information and examples, please visit the documentation page at <a href="https://diviplugins.com/documentation/divi-filtergrid/custom-filters/" target="_blank">Divi Plugins</a>.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'filter_taxonomies'        => array(
				'label'           => __( 'Filter Taxonomies', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => false,
				'groups'          => false,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_tax',
				'cache'           => 'tax_list',
				'action'          => 'dpdfg_get_taxonomies_action',
				'placeholder'     => __( 'Start typing the taxonomy name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => 'category',
				'show_if'         => array(
					'show_filters'             => 'on',
					'use_custom_terms_filters' => 'off',
					'multilevel'               => 'off'
				),
				'show_if_not'     => array( 'custom_query' => 'basic' ),
				'description'     => __( 'Click to select the taxonomies you would like to include in the filters.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'filter_terms'             => array(
				'label'           => __( 'Filter Terms', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => false,
				'search'          => true,
				'groups'          => true,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_terms',
				'cache'           => 'terms_list',
				'action'          => 'dpdfg_get_taxonomies_terms_action',
				'placeholder'     => __( 'Start typing the term name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => '',
				'show_if'         => array(
					'show_filters'             => 'on',
					'use_custom_terms_filters' => 'off'
				),
				'show_if_not'     => array( 'custom_query' => 'basic' ),
				'description'     => __( 'Click to select the terms you would like to include in the filters. Leave this field empty if you would like to include all terms from the taxonomies chosen above.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'default_filter'           => array(
				'label'           => __( 'Default Filter', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => true,
				'search'          => true,
				'groups'          => true,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_terms',
				'cache'           => 'terms_list',
				'action'          => 'dpdfg_get_taxonomies_terms_action',
				'placeholder'     => __( 'Start typing the term name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => 'All',
				'show_if'         => array(
					'show_filters' => 'on',
				),
				'description'     => __( 'Click to select the term you want active by default when the page first loads. Leave blank to display all posts from the query above by default. This option is not currently compatible with the Cache Filter & Pagination Results option. Cache will be disabled if a default filter is set.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'filters_order'            => array(
				'label'           => __( 'Filters Order', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'ASC'  => __( 'Ascending', 'dpdfg-dp-divi-filtergrid' ),
					'DESC' => __( 'Descending', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'ASC',
				'show_if'         => array(
					'show_filters'             => 'on',
					'filters_sort'             => array(
						'id',
						'name',
					),
					'use_custom_terms_filters' => 'off',
				),
				'description'     => __( 'Choose to order filters in ascending or descending order.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'filters_sort'             => array(
				'label'           => __( 'Filters Order By', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'id'         => __( 'ID', 'dpdfg-dp-divi-filtergrid' ),
					'name'       => __( 'Name', 'dpdfg-dp-divi-filtergrid' ),
					'slug'       => __( 'Slug', 'dpdfg-dp-divi-filtergrid' ),
					'term_group' => __( 'Menu Order', 'dpdfg-dp-divi-filtergrid' ),
					'hierarchy'  => __( 'Hierarchy', 'dpdfg-dp-divi-filtergrid' ),
					'custom'     => __( 'Custom Order', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'id',
				'show_if'         => array(
					'show_filters'             => 'on',
					'use_custom_terms_filters' => 'off',
				),
				'description'     => __( 'Choose a parameter to apply the order to.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'filters_custom'           => array(
				'label'           => __( 'Filters Custom', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'textarea',
				'option_category' => 'configuration',
				'show_if'         => array(
					'show_filters'             => 'on',
					'filters_sort'             => 'custom',
					'use_custom_terms_filters' => 'off',
				),
				'description'     => __( 'Enter a comma-separated list of filters name. Filters will appear in the order you enter them.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'hide_all'                 => array(
				'label'           => __( 'Hide All Filter Button', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
			'all_text'                 => array(
				'label'           => __( 'All Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => 'All',
				'show_if'         => array(
					'multilevel' => 'off',
					'hide_all'   => 'off',
				),
				'description'     => __( 'Here you can change the default text used for the All filter button.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tax_filter',
			),
		);
		$date_filter_fields    = array(
			's_df'          => array(
				'label'           => __( 'Show Date Filters', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Turn this option on if you want to give visitors the option to filter the results from the query above by post date.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_col'        => array(
				'label'           => __( 'Date Column', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'post_date'     => __( 'Published Date ', 'dpdfg-dp-divi-filtergrid' ),
					'post_modified' => __( 'Modified Date', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'post_date',
				'description'     => __( 'Choose to filter by published or modified date.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			's_df_y'        => array(
				'label'           => __( 'Show Years', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'description'     => __( 'Show Year Filters.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_y'          => array(
				'label'           => __( 'Years', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'textarea',
				'option_category' => 'configuration',
				'default'         => '2024, 2023',
				'description'     => __( 'Enter a comma-separated list of years. Leave empty to use default years. For help with proper formatting, please <a href="https://diviplugins.com/documentation/divi-filtergrid/date-filters/" target="_blank">view the documentation</a>.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_y' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_y_o'        => array(
				'label'           => __( 'Order', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'hidden',
				'option_category' => 'configuration',
				'options'         => array(
					'ASC'  => __( 'Ascending', 'dpdfg-dp-divi-filtergrid' ),
					'DESC' => __( 'Descending', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'DESC',
				'description'     => __( 'Text for the dropdown placeholder if filter layout is dropdown.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_y' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_y_all_hide' => array(
				'label'           => __( 'Hide All Years Button', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array( 's_df' => 'on', 's_df_y' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_y_all'      => array(
				'label'           => __( 'All Years Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'All Years', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Text for the All years option.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_y' => 'on', 'df_y_all_hide' => 'off' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_y_dp'       => array(
				'label'           => __( 'Dropdown Placeholder', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'Select the year', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Text for the dropdown placeholder if filter layout is dropdown.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_y' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_y_lb'       => array(
				'label'           => __( 'Button Level Label', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '',
				'description'     => __( 'Text for the label that appears above the year filters if filter layout is button. Leave empty for no label.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_y' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			's_df_m'        => array(
				'label'           => __( 'Show Months', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'description'     => __( 'Show Months.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_m'          => array(
				'label'           => __( 'Months', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'textarea',
				'option_category' => 'configuration',
				'default'         => 'January, February, March, April, May, June, July, August, September, October, November, December',
				'description'     => __( 'Enter a comma-separated list of months. Leave empty to use default months. For help with proper formatting, please <a href="https://diviplugins.com/documentation/divi-filtergrid/date-filters/" target="_blank">view the documentation</a>.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_m' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_m_o'        => array(
				'label'           => __( 'Order', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'hidden',
				'option_category' => 'configuration',
				'options'         => array(
					'ASC'  => __( 'Ascending', 'dpdfg-dp-divi-filtergrid' ),
					'DESC' => __( 'Descending', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'ASC',
				'description'     => __( 'Text for the dropdown placeholder.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_m' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_m_all_hide' => array(
				'label'           => __( 'Hide All Months Button', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array( 's_df' => 'on', 's_df_m' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_m_all'      => array(
				'label'           => __( 'All Months Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'All Months', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Text for the All months filter.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_m' => 'on', 'df_m_all_hide' => 'off' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_m_dp'       => array(
				'label'           => __( 'Dropdown Placeholder', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'Select the month', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Text for the dropdown placeholder.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_m' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
			'df_m_lb'       => array(
				'label'           => __( 'Button Level Label', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '',
				'description'     => __( 'Text for the label that appears above the month filters if filter layout is button. Leave empty for no label.', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 's_df' => 'on', 's_df_m' => 'on' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'df_options',
			),
		);
		$all_filters_fields    = array(
			'trigger_filters'             => array(
				'label'           => __( 'Trigger Filters', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'default'    => __( 'After each filter is clicked', 'dpdfg-dp-divi-filtergrid' ),
					'button'     => __( 'After clicking a button', 'dpdfg-dp-divi-filtergrid' ),
					'last_level' => __( 'After last level is selected (Parent/Child Levels)', 'dpdfg-dp-divi-filtergrid' )
				),
				'default'         => 'default',
				'description'     => __( 'Chose when to show the results of the filters.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'filter_options',
			),
			'filter_now_text'             => array(
				'label'           => __( 'Filter Button Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'Filter', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array(
					'trigger_filters' => 'button',
				),
				'description'     => __( 'Custom text for the Filter button.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'filter_options',
			),
			'clear_filters'               => array(
				'label'           => __( 'Show Clear All Button', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Turn on to display a Clear All button which will reset all selected filters.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'filter_options',
			),
			'clear_filters_text'          => array(
				'label'           => __( 'Clear All Button Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'Clear Filters', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array(
					'clear_filters' => 'on',
				),
				'description'     => __( 'Custom text for the Clear All button.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'filter_options',
			),
			'filter_layout'               => array(
				'label'           => __( 'Filters Layout', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'button' => __( 'Buttons', 'dpdfg-dp-divi-filtergrid' ),
					'select' => __( 'Dropdown', 'dpdfg-dp-divi-filtergrid' )
				),
				'default'         => 'button',
				'description'     => __( 'Chose which layout you want to use for the filters.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'filter_options',
			),
			'filter_dropdown_show_tags'   => array(
				'label'           => __( 'Show Placeholder Active Filters', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'filter_layout' => 'select',
				),
				'description'     => __( 'Turn this option on if you want to show active terms for the filter dropdown layout.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'filter_options',
			),
			'filter_dropdown_placeholder' => array(
				'label'           => __( 'Dropdown Layout Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'Select the terms', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array(
					'filter_layout' => 'select',
					'multilevel'    => 'off',
				),
				'description'     => __( 'Default text for the dropdown filter layout', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'filter_options',
			),
			'multifilter'                 => array(
				'label'           => __( 'Use MultiSelect Filters', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'multilevel_hierarchy' => 'off'
				),
				'description'     => __( 'Turn this option on if you would like to allow users to select more than one filter at a time.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'filter_options',
			),
			'multifilter_relation'        => array(
				'label'           => __( 'MultiSelect Filters Relation', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'OR'  => __( 'OR', 'dpdfg-dp-divi-filtergrid' ),
					'AND' => __( 'AND', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'OR',
				'show_if'         => array(
					'multifilter'          => 'on',
					'multilevel_hierarchy' => 'off'
				),
				'description'     => __( 'Choose if posts need to have only 1 active filter (OR) to display or if posts need to have all active filters (AND).', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'filter_options',
			),
		);
		$sorting_fields        = array(
			'show_sort'      => array(
				'label'           => __( 'Show Sort Dropdown', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'options'         => array(
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
				),
				'description'     => __( 'Turn frontend sort dropdown on or off.', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => 'off',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'sort_options',
			),
			'sort_position'  => array(
				'label'           => __( 'Sort Position', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'above' => __( 'Above Filters', 'dpdfg-dp-divi-filtergrid' ),
					'below' => __( 'Below Filters', 'dpdfg-dp-divi-filtergrid' ),
					'left'  => __( 'Left of Filters  (dropdown filters only)', 'dpdfg-dp-divi-filtergrid' ),
					'right' => __( 'Right of Filters  (dropdown filters only)', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'below',
				'show_if'         => array(
					'show_sort'    => 'on',
					'show_filters' => 'on'
				),
				'description'     => __( 'Choose to display the sort above or below the filters', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'sort_options',
			),
			'orderby_sort'   => [
				'label'           => __( 'Enable Sort for:', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_position2',
				'option_category' => 'configuration',
				'options'         => array(
					'date'          => __( 'Date', 'dpdfg-dp-divi-filtergrid' ),
					'title'         => __( 'Title', 'dpdfg-dp-divi-filtergrid' ),
					'type'          => __( 'Post Type', 'dpdfg-dp-divi-filtergrid' ),
					'author'        => __( 'Author', 'dpdfg-dp-divi-filtergrid' ),
					'comment_count' => __( 'Comments Count', 'dpdfg-dp-divi-filtergrid' ),
					'default'       => __( 'Default', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => wp_json_encode( [
					[ 'name' => 'date', 'show' => 'on' ],
					[ 'name' => 'title', 'show' => 'on' ],
					[ 'name' => 'type', 'show' => 'off' ],
					[ 'name' => 'author', 'show' => 'off' ],
					[ 'name' => 'comment_count', 'show' => 'off' ],
					[ 'name' => 'default', 'show' => 'off' ],
				] ),
				'action_name'     => __( 'Show', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 'show_sort' => 'on' ),
				'toggle_slug'     => 'sort_options',
			],
			'orderby_text'   => array(
				'label'           => __( 'Sort Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => __( 'Sort By', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 'show_sort' => 'on' ),
				'toggle_slug'     => 'sort_options',
			),
			'date_ob_text'   => array(
				'label'           => __( 'Date Sort Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => __( 'Date', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 'show_sort' => 'on' ),
				'toggle_slug'     => 'sort_options',
			),
			'title_ob_text'  => array(
				'label'           => __( 'Title Sort Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => __( 'Title', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 'show_sort' => 'on' ),
				'toggle_slug'     => 'sort_options',
			),
			'type_ob_text'   => array(
				'label'           => __( 'Type Sort Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => __( 'Type', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 'show_sort' => 'on' ),
				'toggle_slug'     => 'sort_options',
			),
			'author_ob_text' => array(
				'label'           => __( 'Author Sort Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => __( 'Author', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 'show_sort' => 'on' ),
				'toggle_slug'     => 'sort_options',
			),
			'cc_ob_text'     => array(
				'label'           => __( 'Comments Count Sort Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => __( 'Comments Count', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 'show_sort' => 'on' ),
				'toggle_slug'     => 'sort_options',
			),
			'd_ob_text'      => array(
				'label'           => __( 'Default Sort Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'default'         => __( 'Default', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array( 'show_sort' => 'on' ),
				'toggle_slug'     => 'sort_options',
			),
			'asc_icon'       => array(
				'label'           => __( 'Ascending Icon', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_sort' => 'on'
				),
				'class'           => array( 'et-pb-font-icon' ),
				'default'         => '&#x21;||divi||400',
				'toggle_slug'     => 'sort_options',
			),
			'desc_icon'      => array(
				'label'           => __( 'Descending Icon', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'show_if'         => array(
					'show_sort' => 'on'
				),
				'class'           => array( 'et-pb-font-icon' ),
				'default'         => '&#x22;||divi||400',
				'toggle_slug'     => 'sort_options',
			),
		);
		$pagination_fields     = array(
			'show_pagination'     => array(
				'label'           => __( 'Activate Pagination', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'description'     => __( 'Turn this option off if you want to limit the number of posts returned to the Post Number value above. Leave this option on if you want to give users the ability to load more posts.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'pagination_type'     => array(
				'label'           => __( 'Pagination Type', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'paged'  => __( 'Paged', 'dpdfg-dp-divi-filtergrid' ),
					'button' => __( 'Load more button', 'dpdfg-dp-divi-filtergrid' ),
					'scroll' => __( 'Load more on scroll', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'paged',
				'show_if'         => array( 'show_pagination' => 'on' ),
				'description'     => __( 'Select the method to load additional posts.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'p_st'                => array(
				'label'           => __( 'Auto Scroll To Top', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged'
				),
				'description'     => __( 'Once pagination has finished and new posts are loaded in the grid, the browser will auto scroll to the top of the grid to display the new items.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'ajax_load_more_text' => array(
				'label'           => __( 'Load More Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'Load More', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'button',
				),
				'description'     => __( 'Custom text for the load more button.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'previous_icon'       => array(
				'label'           => __( 'Previous Icon', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
				),
				'class'           => array( 'et-pb-font-icon' ),
				'default'         => '%%19%%',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'next_icon'           => array(
				'label'           => __( 'Next Icon', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
				),
				'class'           => array( 'et-pb-font-icon' ),
				'default'         => '%%20%%',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'previous_text'       => array(
				'label'           => __( 'Previous Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'next_text'           => array(
				'label'           => __( 'Next Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'pagination_pages'    => array(
				'label'           => __( 'Pagination Pages', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => 2,
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
				),
				'description'     => __( 'Number of pages to show before and after the active page on the pagination.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'first_last'          => array(
				'label'           => __( 'Activate First/Last Buttons', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
				),
				'description'     => __( 'Add first and last page buttons to the pagination.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'first_icon'          => array(
				'label'           => __( 'First Icon', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
					'first_last'      => 'on',
				),
				'class'           => array( 'et-pb-font-icon' ),
				'default'         => '%%23%%',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'last_icon'           => array(
				'label'           => __( 'Next Icon', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
					'first_last'      => 'on',
				),
				'class'           => array( 'et-pb-font-icon' ),
				'default'         => '%%24%%',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'first_text'          => array(
				'label'           => __( 'First Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
					'first_last'      => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
			'last_text'           => array(
				'label'           => __( 'Last Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => '',
				'show_if'         => array(
					'show_pagination' => 'on',
					'pagination_type' => 'paged',
					'first_last'      => 'on',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination_options',
			),
		);
		$search_fields         = array(
			'show_search'        => array(
				'label'           => __( 'Activate Search', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Turn this option on if you want to give visitors the ability to search results', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'search_options',
			),
			'search_placeholder' => array(
				'label'           => __( 'Placeholder Text', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'default'         => __( 'Search', 'dpdfg-dp-divi-filtergrid' ),
				'show_if'         => array(
					'show_search' => 'on'
				),
				'description'     => __( 'Custom text for search placeholder', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'search_options',
			),
			'search_position'    => array(
				'label'           => __( 'Search Position', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'above' => __( 'Above Filters', 'dpdfg-dp-divi-filtergrid' ),
					'below' => __( 'Below Filters', 'dpdfg-dp-divi-filtergrid' ),
					'left'  => __( 'Left of Filters  (dropdown filters only)', 'dpdfg-dp-divi-filtergrid' ),
					'right' => __( 'Right of Filters  (dropdown filters only)', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'above',
				'show_if'         => array(
					'show_search' => 'on',
				),
				'description'     => __( 'Choose to display the search box above or below the filters', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'search_options',
			),
			'orderby_search'     => array(
				'label'           => __( 'Order Search Results by Relevance', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'show_if'         => array(
					'show_search' => 'on'
				),
				'default'         => 'on',
				'description'     => __( 'Leave this option on to order the search results by search term relevance. Turn this option off to order the search results by the Order By value set in the Query Options section.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'search_options',
			),
			'relevanssi'         => array(
				'label'           => __( 'Relevanssi Support', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'description'     => __( 'Turn this option on to enable Relevanssi search results. Please contact <a href="https://www.relevanssi.com/" target="_blank">Relevanssi</a> for search result support.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'search_options',
			),
		);
		$layout_fields         = array(
			'filters_width'    => array(
				'label'           => __( 'Dropdown Filters Columns', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'default'         => '4',
				'show_if'         => array(
					'filter_layout' => array(
						'select'
					)
				),
				'responsive'      => true,
				'description'     => __( 'Define how many columns each row of filters should have.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'container_layout' => array(
				'label'           => __( 'Container Layout', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'dp-dfg-skin-top-filters'                                              => __( 'Top Horizontal Filters', 'dpdfg-dp-divi-filtergrid' ),
					'dp-dfg-skin-left-vertical-filters'                                    => __( 'Left Vertical Filters', 'dpdfg-dp-divi-filtergrid' ),
					'dp-dfg-skin-left-vertical-filters dp-dfg-skin-right-vertical-filters' => __( 'Right Vertical Filters', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'dp-dfg-skin-top-filters',
				'description'     => __( 'Choose position of filters, sort, search, and filter action buttons.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'items_layout'     => array(
				'label'           => __( 'Items Layout', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'dp-dfg-layout-grid'             => __( 'Grid', 'dpdfg-dp-divi-filtergrid' ),
					'dp-dfg-layout-list'             => __( 'List', 'dpdfg-dp-divi-filtergrid' ),
					'dp-dfg-layout-fullwidth'        => __( 'Fullwidth', 'dpdfg-dp-divi-filtergrid' ),
					'dp-dfg-layout-masonry'          => __( 'Grid Masonry', 'dpdfg-dp-divi-filtergrid' ),
					'dp-dfg-layout-flex'             => __( 'Flex', 'dpdfg-dp-divi-filtergrid' ),
					'dp-dfg-layout-masonry-standard' => __( 'Standard Masonry', 'dpdfg-dp-divi-filtergrid' ),
					'dp-dfg-layout-none'             => __( 'None', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'dp-dfg-layout-grid',
				'description'     => __( 'Choose a layout to display the posts.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'thumb_min_width'  => array(
				'label'           => __( 'Image Min Width', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '300px',
				'default_unit'    => 'px',
				'allow_empty'     => false,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '400',
					'step' => '1',
				),
				'show_if'         => array( 'items_layout' => 'dp-dfg-layout-list' ),
				'responsive'      => true,
				'description'     => __( 'Define the minimum width of the image. The image will never be smaller than this value.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'thumb_width'      => array(
				'label'           => __( 'Image Max Width', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '33%',
				'default_unit'    => '%',
				'allow_empty'     => false,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'         => array( 'items_layout' => 'dp-dfg-layout-list' ),
				'responsive'      => true,
				'description'     => __( 'Define the maximum width of the image in relation to the total width of the item. The image will always be as wide as this value unless this value is smaller than the minimum width set above.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'items_width'      => array(
				'label'           => __( 'Items Width', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '20%',
				'default_unit'    => '%',
				'allow_empty'     => false,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'         => array(
					'items_layout' => array(
						'dp-dfg-layout-grid',
						'dp-dfg-layout-masonry'
					)
				),
				'responsive'      => true,
				'description'     => __( 'Define the width of each post item in the grid. This value is combined with the Column & Row Gutter value below to determine how many columns the grid will have for each screen size.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'items_width_flex' => array(
				'label'           => __( 'Items Width', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '23.5%',
				'default_unit'    => '%',
				'allow_empty'     => false,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'         => array(
					'items_layout' => array(
						'dp-dfg-layout-flex',
						'dp-dfg-layout-masonry-standard'
					)
				),
				'responsive'      => true,
				'description'     => __( 'Define the width of each post item in the grid. This value is combined with the Column & Row Gutter value below to determine how many columns the grid will have for each screen size.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'column_gutter'    => array(
				'label'           => __( 'Column Gutter', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '2em',
				'default_unit'    => 'em',
				'allow_empty'     => false,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '10',
					'step' => '1',
				),
				'show_if'         => array(
					'items_layout' => array(
						'dp-dfg-layout-grid',
						'dp-dfg-layout-list',
						'dp-dfg-layout-masonry'
					),
				),
				'responsive'      => true,
				'description'     => __( 'Define the gap between each column in the grid.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'row_gutter'       => array(
				'label'           => __( 'Row Gutter', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '2em',
				'default_unit'    => 'em',
				'allow_empty'     => false,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '10',
					'step' => '1',
				),
				'show_if'         => array(
					'items_layout' => array(
						'dp-dfg-layout-grid',
						'dp-dfg-layout-list',
						'dp-dfg-layout-masonry'
					),
				),
				'responsive'      => true,
				'description'     => __( 'Define the gap between each row in the grid', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'row_gutter_flex'  => array(
				'label'           => __( 'Row Gutter', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '2%',
				'default_unit'    => '%',
				'allow_empty'     => false,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '10',
					'step' => '1',
				),
				'show_if'         => array(
					'items_layout' => array(
						'dp-dfg-layout-flex',
						'dp-dfg-layout-masonry-standard'
					),
				),
				'responsive'      => true,
				'description'     => __( 'Define the gap between each row in the grid', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'justify_content'  => array(
				'label'           => __( 'Justify Items', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'space-between' => __( 'Space Between', 'dpdfg-dp-divi-filtergrid' ),
					'space-around'  => __( 'Space Around', 'dpdfg-dp-divi-filtergrid' ),
					'space-evenly'  => __( 'Space Evenly', 'dpdfg-dp-divi-filtergrid' ),
					'center'        => __( 'Center', 'dpdfg-dp-divi-filtergrid' ),
					'flex-start'    => __( 'Flex Start', 'dpdfg-dp-divi-filtergrid' ),
					'flex-end'      => __( 'Flex End', 'dpdfg-dp-divi-filtergrid' ),
				),
				'show_if'         => array(
					'items_layout' => array(
						'dp-dfg-layout-flex',
					),
				),
				'default'         => 'space-between',
				'description'     => __( 'Choose a layout to display the posts.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'items_skin'       => array(
				'label'           => __( 'Skin', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => Dp_Dfg_Utils::get_skins(),
				'default'         => 'dp-dfg-skin-default',
				'description'     => __( 'Select a skin to apply different visual effects to the posts.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
			'primary_view'     => [
				'label'           => __( 'Primary View', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_position',
				'option_category' => 'configuration',
				'options'         => [
					'thumbnail'        => __( 'Thumbnail', 'dpdfg-dp-divi-filtergrid' ),
					'overlay'          => __( 'Overlay', 'dpdfg-dp-divi-filtergrid' ),
					'title'            => __( 'Title', 'dpdfg-dp-divi-filtergrid' ),
					'meta'             => __( 'Meta', 'dpdfg-dp-divi-filtergrid' ),
					'ext'              => __( 'Extension Meta Content', 'dpdfg-dp-divi-filtergrid' ),
					'content'          => __( 'Content', 'dpdfg-dp-divi-filtergrid' ),
					'action_button'    => __( 'Action Button', 'dpdfg-dp-divi-filtergrid' ),
					'read_more_button' => __( 'Read More', 'dpdfg-dp-divi-filtergrid' ),
					'custom_content'   => __( 'Custom Content/Fields', 'dpdfg-dp-divi-filtergrid' )
				],
				'default'         => wp_json_encode( [
					[ 'name' => 'thumbnail', 'show' => 'on' ],
					[ 'name' => 'overlay', 'show' => 'on' ],
					[ 'name' => 'title', 'show' => 'off' ],
					[ 'name' => 'meta', 'show' => 'off' ],
					[ 'name' => 'ext', 'show' => 'off' ],
					[ 'name' => 'content', 'show' => 'off' ],
					[ 'name' => 'action_button', 'show' => 'off' ],
					[ 'name' => 'read_more_button', 'show' => 'off' ],
					[ 'name' => 'custom_content', 'show' => 'off' ],
				] ),
				'action_name'     => __( 'Show', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Choose the order (drag and drop) of the elements. Also choose which elements to show (checkbox) in primary view when split content skin selected (Flip Card, Slide Card, None - Split Content). Only elements turned on in Content tab will be available below.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			],
			'secondary_view'   => [
				'label'           => __( 'Secondary View', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_position',
				'option_category' => 'configuration',
				'options'         => [
					'thumbnail'        => __( 'Thumbnail', 'dpdfg-dp-divi-filtergrid' ),
					'title'            => __( 'Title', 'dpdfg-dp-divi-filtergrid' ),
					'meta'             => __( 'Meta', 'dpdfg-dp-divi-filtergrid' ),
					'ext'              => __( 'Extension Meta Content', 'dpdfg-dp-divi-filtergrid' ),
					'content'          => __( 'Content', 'dpdfg-dp-divi-filtergrid' ),
					'action_button'    => __( 'Action Button', 'dpdfg-dp-divi-filtergrid' ),
					'read_more_button' => __( 'Read More', 'dpdfg-dp-divi-filtergrid' ),
					'custom_content'   => __( 'Custom Content/Fields', 'dpdfg-dp-divi-filtergrid' )
				],
				'default'         => wp_json_encode( [
					[ 'name' => 'thumbnail', 'show' => 'off' ],
					[ 'name' => 'title', 'show' => 'on' ],
					[ 'name' => 'meta', 'show' => 'on' ],
					[ 'name' => 'ext', 'show' => 'on' ],
					[ 'name' => 'content', 'show' => 'on' ],
					[ 'name' => 'action_button', 'show' => 'on' ],
					[ 'name' => 'read_more_button', 'show' => 'on' ],
					[ 'name' => 'custom_content', 'show' => 'on' ],
				] ),
				'action_name'     => __( 'Show', 'dpdfg-dp-divi-filtergrid' ),
				'description'     => __( 'Choose the order (drag and drop) of the elements and which elements to show (checkbox) in secondary view. This only applies to skins that display the secondary view or if the "Show secondary view in popup" click action is selected. Only elements turned on in Content tab will be available below.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			],
			'grid_font_size'   => array(
				'label'           => __( 'Grid Font Size', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '10px',
				'default_unit'    => 'px',
				'allow_empty'     => false,
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if_not'     => array(
					'items_layout' => array(
						'dp-dfg-layout-none'
					),
				),
				'responsive'      => true,
				'description'     => __( 'All font sizes, padding, margins, gaps, etc. are based on the grid font size. Changing this value will change these values throughout the entire grid.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_options',
			),
		);
		$popup_fields          = array(
			'popup_template'    => array(
				'label'           => __( 'Popup Template', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'dpdfg_multiselect',
				'option_category' => 'configuration',
				'singular'        => true,
				'search'          => true,
				'groups'          => false,
				'draggable'       => false,
				'json_data'       => false,
				'nonce'           => 'nonce_layouts',
				'cache'           => 'layouts_list',
				'action'          => 'dpdfg_get_layouts_action',
				'placeholder'     => __( 'Start typing the layout name', 'dpdfg-dp-divi-filtergrid' ),
				'default'         => 'default',
				'description'     => __( 'The Default template will display the post content in the popup window similar to how it would display when the post is viewed directly. You can also select a layout from your Divi Library. Only layouts categorized under the <strong>DFG Popup</strong> category will be available to select below. For more information, please see the <a href="https://diviplugins.com/documentation/divi-filtergrid/popup-template/" target="_blank">documentation</a>.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_options',
			),
			'popup_link_target' => array(
				'label'           => __( 'Popup Link Target', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'none'    => __( 'Popup Window', 'dpdfg-dp-divi-filtergrid' ),
					'_parent' => __( 'Parent Window', 'dpdfg-dp-divi-filtergrid' ),
					'_blank'  => __( 'New Tab in Parent Window', 'dpdfg-dp-divi-filtergrid' )
				),
				'default'         => 'none',
				'description'     => __( 'Choose whether links inside the post content in the popup should open in the popup, in the parent window, or in a new tab in the parent window.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_options',
			),
			'popup_width'       => array(
				'label'           => __( 'Popup Width', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '80%',
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'      => true,
				'description'     => __( 'Set the width of the popup window.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_options',
			),
			'popup_max_width'   => array(
				'label'           => __( 'Popup Maximum Width', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'validate_unit'   => true,
				'default'         => '1080px',
				'default_unit'    => 'px',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '1920',
					'step' => '1',
				),
				'description'     => __( 'Set the maximum width of the popup window.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_options',
			),
			'popup_height'      => array(
				'label'           => __( 'Popup Height', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '80%',
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'      => true,
				'description'     => __( 'Set the height of the popup window.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_options',
			),
			'popup_bg'          => array(
				'label'           => __( 'Popup Overlay Color', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_options',
			),
			'popup_code'        => array(
				'label'           => __( 'Popup Content CSS', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'codemirror',
				'mode'            => 'css',
				'inline'          => false,
				'option_category' => 'configuration',
				'description'     => __( 'CSS added here will target the content of the popup window.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'popup_options',
			),
		);
		$overlay_fields        = array(
			'use_overlay_icon'    => array(
				'label'           => __( 'Show Overlay Icon', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'on',
				'show_if'         => array(
					'use_overlay' => 'on'
				),
				'description'     => __( 'Turn this option off to hide the icon in the overlay.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay_options',
			),
			'hover_icon'          => array(
				'label'           => __( 'Icon Picker', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'class'           => array( 'et-pb-font-icon' ),
				'default'         => '%%200%%',
				'show_if'         => array(
					'use_overlay'      => 'on',
					'use_overlay_icon' => 'on'
				),
				'description'     => __( 'Here you can define a custom icon for the overlay', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay_options',
			),
			'overlay_icon_size'   => array(
				'label'           => __( 'Icon Size', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'range',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '32',
				'default_unit'    => 'px',
				'range_settings'  => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'      => true,
				'show_if'         => array(
					'use_overlay'      => 'on',
					'use_overlay_icon' => 'on'
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay_options',
			),
			'overlay_icon_color'  => array(
				'label'        => __( 'Icon Color', 'dpdfg-dp-divi-filtergrid' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#2ea3f2',
				'show_if'      => array(
					'use_overlay'      => 'on',
					'use_overlay_icon' => 'on'
				),
				'description'  => __( 'Here you can define a custom color for the overlay icon', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'overlay_options',
			),
			'hover_overlay_color' => array(
				'label'        => __( 'Hover Color', 'dpdfg-dp-divi-filtergrid' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => 'rgba(255,255,255,0.9)',
				'show_if'      => array( 'use_overlay' => 'on' ),
				'description'  => __( 'Here you can define a custom color for the overlay', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'overlay_options',
			),
		);
		$loaders_fields        = array(
			'dfg_loader' => array(
				'label'           => __( 'Loader', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'default' => __( 'Default or Custom', 'dpdfg-dp-divi-filtergrid' ),
					'c1'      => __( 'Spinning Circle', 'dpdfg-dp-divi-filtergrid' ),
					'c2'      => __( 'Rotating Squares', 'dpdfg-dp-divi-filtergrid' ),
					'c3'      => __( 'Spinning Rings', 'dpdfg-dp-divi-filtergrid' ),
					'c4'      => __( 'Vertical Bars', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'default',
				'description'     => __( 'Select the loader. Leave as default to load the Divi loader or the one that is added via custom filter hook "dpdfg_custom_loader"', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'loader_options',
			),
			'dfg_lp'     => array(
				'label'       => __( 'Loader Preview', 'dpdfg-dp-divi-filtergrid' ),
				'type'        => 'dpdfg_loader',
				'default'     => '48|48|8|0.8',
				'show_if_not' => array(
					'dfg_loader' => 'default'
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'loader_options',
			),
			'dfg_lc1'    => array(
				'label'        => __( 'Color 1', 'dpdfg-dp-divi-filtergrid' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#2ea3f2',
				'show_if_not'  => array(
					'dfg_loader' => 'default'
				),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'loader_options',
			),
			'dfg_lc2'    => array(
				'label'        => __( 'Color 2', 'dpdfg-dp-divi-filtergrid' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#29c4a9',
				'show_if_not'  => array(
					'dfg_loader' => 'default'
				),
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'loader_options',
			),
		);
		$background_fields     = array(
			'bg_search'            => array(
				'label'           => __( 'Search Input Background', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'background',
			),
			'bg_search_icon'       => array(
				'label'           => __( 'Search Icon Background', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'background',
			),
			'bg_items'             => array(
				'label'           => __( 'Grid Item Background', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'background',
			),
			'bg_filters'           => array(
				'label'           => __( 'Filters Background', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'background',
			),
			'bg_filter_active'     => array(
				'label'           => __( 'Active Filter Background', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'background',
			),
			'bg_sorting'           => array(
				'label'           => __( 'Sorting Background', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'background',
			),
			'bg_sorting_active'    => array(
				'label'           => __( 'Active Sorting Background', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'background',
			),
			'bg_pagination'        => array(
				'label'           => __( 'Pagination Background', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'background',
			),
			'bg_pagination_active' => array(
				'label'           => __( 'Pagination Active Background', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'color-alpha',
				'option_category' => 'configuration',
				'custom_color'    => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'background',
			),
		);
		$url_options           = array(
			'url_navigation' => array(
				'label'       => __( 'URL Navigation', 'dpdfg-dp-divi-filtergrid' ),
				'description' => __( 'Turn on to enable filter, search and pagination using URL parameters. This option will force AJAX and disable javascript filtering.', 'dpdfg-dp-divi-filtergrid' ),
				'type'        => 'yes_no_button',
				'options'     => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'     => 'off',
				'toggle_slug' => 'advanced_options',
			),
			'url_history'    => array(
				'label'       => __( 'URL Navigation History', 'dpdfg-dp-divi-filtergrid' ),
				'description' => __( 'Turn on to automatically add URL parameters to the URL after every action.', 'dpdfg-dp-divi-filtergrid' ),
				'type'        => 'yes_no_button',
				'options'     => array(
					'on'  => __( 'On', 'dpdfg-dp-divi-filtergrid' ),
					'off' => __( 'Off', 'dpdfg-dp-divi-filtergrid' ),
				),
				'show_if'     => array( 'url_navigation' => 'on' ),
				'default'     => 'on',
				'toggle_slug' => 'advanced_options',
			),
			'url_nav_action' => array(
				'label'       => __( 'Go Back/Forward Action', 'dpdfg-dp-divi-filtergrid' ),
				'description' => __( '...', 'dpdfg-dp-divi-filtergrid' ),
				'type'        => 'hidden',
				'options'     => array(
					'reload' => __( 'Reload Page', 'dpdfg-dp-divi-filtergrid' ),
					'ajax'   => __( 'Trigger AJAX', 'dpdfg-dp-divi-filtergrid' ),
				),
				'show_if'     => array( 'url_navigation' => 'on', 'url_history' => 'on' ),
				'default'     => 'reload',
				'toggle_slug' => 'advanced_options',
			),
			'ajax_filters'   => array(
				'label'           => __( 'Enforce AJAX Filters', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'default'         => 'off',
				'show_if'         => array(
					'show_filters'   => 'on',
					's_df'           => 'off',
					'url_navigation' => 'off',
					'no_init'        => 'off'
				),
				'description'     => __( 'Force AJAX filtering. This will override the javascript based filtering that is the default when pagination is off or the number of posts found is less than the number of posts to show defined in the query options.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'advanced_options',
			),
			'cache_on_page'  => array(
				'label'           => __( 'Cache Filter & Pagination Results', 'dpdfg-dp-divi-filtergrid' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => __( 'No', 'dpdfg-dp-divi-filtergrid' ),
					'on'  => __( 'Yes', 'dpdfg-dp-divi-filtergrid' ),
				),
				'show_if'         => array(
					'url_navigation' => 'off',
					'no_init'        => 'off',
					'multifilter'    => 'off',
					'multilevel'     => 'off'
				),
				'default'         => 'off',
				'description'     => __( 'Turn this option on to enable filter and pagination caching. Please review the <a href="https://diviplugins.com/documentation/divi-filtergrid/caching/">documentation page</a> for more information on this option.', 'dpdfg-dp-divi-filtergrid' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'advanced_options',
			),
		);

		return apply_filters( 'dpdfg_ext_get_fields', array_merge( $query_fields, $posts_elements_fields, $video_fields, $tax_filter_fields, $date_filter_fields, $all_filters_fields, $sorting_fields, $url_options, $pagination_fields, $layout_fields, $popup_fields, $overlay_fields, $loaders_fields, $search_fields, $background_fields ) );
	}

	public function before_render() {
		wp_enqueue_script( 'dp-divi-filtergrid-frontend-bundle' );
		wp_enqueue_script( 'magnific-popup' );
		if ( 'on' === $this->props['show_video_preview'] ) {
			wp_enqueue_script( 'fitvids' );
		}
		if ( 'dp-dfg-layout-masonry' === $this->props['items_layout'] || 'dp-dfg-layout-masonry-standard' === $this->props['items_layout'] ) {
			wp_enqueue_script( 'dfg-imagesloaded', '/wp-includes/js/imagesloaded.min.js', array(), '5.0.0', 1 );
			wp_enqueue_script( 'dfg-masonry', '/wp-includes/js/masonry.min.js', array(), '4.2.2', 1 );
		}
		/*
		* Custom loader
		*/
		$loader_html = apply_filters( 'dpdfg_custom_loader', '<div class="et-fb-loader-wrapper dp-dfg-loader"><div class="et-fb-loader"></div></div>' );
		/*
		 * Localize script
		 */
		wp_localize_script(
			'dp-divi-filtergrid-frontend-bundle',
			'dpdfg',
			apply_filters( 'dpdfg_ext_localize_main_script', array(
				'loader_html' => $loader_html,
				'ajaxurl'     => admin_url( 'admin-ajax.php' ),
			) )
		);
		add_filter( 'et_late_global_assets_list', array( $this, 'et_global_assets_list' ) );
		// New container skin old modules compatibility
		if ( $this->props['items_skin'] === 'dp-dfg-skin-default dp-dfg-skin-left-vertical-filters' ) {
			$this->props['items_skin']       = 'dp-dfg-skin-default';
			$this->props['container_layout'] = 'dp-dfg-skin-left-vertical-filters';
		}
		// Layout incompatible with flip skins
		$flip_skins = [
			'dp-dfg-skin-default dp-dfg-skin-split',
			'dp-dfg-skin-default dp-dfg-skin-split dp-dfg-skin-flip-card',
			'dp-dfg-skin-default dp-dfg-skin-split dp-dfg-skin-slide-card'
		];
		if ( $this->props['items_layout'] === 'dp-dfg-layout-list' && in_array( $this->props['items_skin'], $flip_skins ) ) {
			$this->props['items_skin'] = 'dp-dfg-skin-default';
		}
		// Video preview incompatible skins
		$video_incompatible_skins = array(
			'dp-dfg-skin-default dp-dfg-skin-zoomimage',
			'dp-dfg-skin-default dp-dfg-skin-itemsinoverlay'
		);
		if ( in_array( $this->props['items_skin'], $video_incompatible_skins ) ) {
			$this->props['show_video_preview'] = 'off';
		}
		// Split skins
		$split_skins = array(
			'dp-dfg-skin-default dp-dfg-skin-split',
			'dp-dfg-skin-default dp-dfg-skin-split dp-dfg-skin-flip-card',
			'dp-dfg-skin-default dp-dfg-skin-split dp-dfg-skin-slide-card'
		);
		if ( in_array( $this->props['items_skin'], $split_skins ) && $this->props['thumbnail_action'] === 'popup_v' ) {
			$this->props['items_skin'] = 'dp-dfg-skin-default';
		}
		// Orderby sort options migration
		if ( strpos( $this->props['orderby_sort'], 'on|' ) || strpos( $this->props['orderby_sort'], '|on' ) ) {
			$sort_by_mig    = [];
			$value_map      = array( 'date', 'title', 'type', 'author', 'comment_count', 'default' );
			$active_sort_by = explode( '|', $this->props['orderby_sort'] );
			foreach ( $active_sort_by as $index => $sb ) {
				$sort_by_mig[] = [ 'name' => $value_map[ $index ], 'show' => $sb === 'on' ? 'on' : 'off' ];
			}
			$this->props['orderby_sort'] = wp_json_encode( $sort_by_mig );
		}
		do_action( 'dpdfg_ext_before_render', $this );
	}

	public function render( $attrs, $content, $render_slug ) {
		$props                     = $this->props;
		$props['the_ID']           = get_queried_object_id();
		$props['the_author']       = get_the_author_meta( 'ID' );
		$props['seed']             = wp_rand( 0, 10000 );
		$props['query_context']    = 'initial_query';
		$props['init_override']    = [];
		$props['conditional_tags'] = array(
			'is_user_logged_in' => is_user_logged_in() ? 'on' : 'off',
			'is_front_page'     => is_front_page() ? 'on' : 'off',
			'is_singular'       => is_singular() ? 'on' : 'off',
			'is_archive'        => is_archive() ? 'on' : 'off',
			'is_search'         => is_search() ? 'on' : 'off',
			'is_tax'            => is_tax() || is_category() || is_tag() ? 'on' : 'off',
			'is_author'         => is_author() ? 'on' : 'off',
			'is_date'           => is_date() ? 'on' : 'off',
			'is_post_type'      => is_post_type_archive() ? 'on' : 'off',
		);
		$props['query_var']        = array(
			's'         => get_search_query(),
			'year'      => esc_attr( get_query_var( 'year' ) ),
			'monthnum'  => esc_attr( get_query_var( 'monthnum' ) ),
			'day'       => esc_attr( get_query_var( 'day' ) ),
			'post_type' => get_query_var( 'post_type' ),
		);
		$props['custom_data']      = apply_filters( 'dpdfg_module_custom_data', array(), $props );
		// Responsive CSS
		$props['popup_code'] = rawurlencode( wp_strip_all_tags( $props['popup_code'] ) );
		$this->responsive_css( $props, $props['items_layout'], $render_slug );
		// Default filter
		if ( 'All' !== $props['default_filter'] ) {
			$props['active_filter']      = $props['default_filter'];
			$props['use_taxonomy_terms'] = 'on';
		}
		// Deactivate multi-select for hierarchical based multi-levels
		if ( 'on' === $props['multilevel_hierarchy'] ) {
			$props['multifilter']         = 'off';
			$props['multilevel_relation'] = 'AND';
		}
		// Deactivating cache
		if ( 'All' !== $props['default_filter'] || 'on' === $props['multifilter'] || 'on' === $props['multilevel'] || 'on' === $props['url_navigation'] ) {
			$props['cache_on_page'] = 'off';
		}
		// Override filter taxonomies if Use Custom Filters is active
		if ( 'on' === $props['use_custom_terms_filters'] ) {
			$props['filter_taxonomies'] = apply_filters( 'dpdfg_custom_filters_taxonomies', $props['filter_taxonomies'], $props );
		}
		// Get current page
		if ( get_query_var( 'paged' ) ) {
			$page = get_query_var( 'paged' );
		} elseif ( get_query_var( 'page' ) ) {
			$page = get_query_var( 'page' );
		} else {
			$page = 1;
		}
		// Active filter
		$active_filter      = isset( $props['default_filter'] ) && intval( $props['default_filter'] ) ? array( $props['default_filter'] ) : 'all';
		$active_date_filter = 'all';
		// Query URL arguments
		$query_url_args = [];
		if ( isset( $_SERVER['REQUEST_URI'] ) ) {
			$request_uri    = esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) );
			$query_url_args = wp_parse_url( $request_uri );
			if ( isset( $query_url_args['query'] ) ) {
				parse_str( $query_url_args['query'], $query_url_args );
			}
			if ( 'on' === $props['url_navigation'] ) {
				$props['ajax_filters'] = 'on';
				if ( 'on' === $props['show_pagination'] && isset( $query_url_args['dfg_page'] ) ) {
					$page = intval( $query_url_args['dfg_page'] );
					if ( $props['pagination_type'] === 'button' || $props['pagination_type'] === 'scroll' ) {
						$props['init_override']['posts_per_page'] = $page * $props['post_number'];
						$props['init_override']['paged']          = 1;
					}
				}
				if ( 'on' === $props['show_filters'] && isset( $query_url_args['dfg_filter'] ) ) {
					$props['active_filter']      = sanitize_text_field( $query_url_args['dfg_filter'] );
					$props['use_taxonomy_terms'] = 'on';
					$active_filter               = explode( '|', sanitize_text_field( $query_url_args['dfg_filter'] ) );
				}
				if ( 'on' === $props['show_sort'] && isset( $query_url_args['dfg_sort'] ) ) {
					$url_sort         = explode( '|', sanitize_text_field( $query_url_args['dfg_sort'] ) );
					$props['order']   = $url_sort[0];
					$props['orderby'] = $url_sort[1];
				}
				if ( 'on' === $props['show_search'] && isset( $query_url_args['dfg_s'] ) ) {
					$props['query_var']['s'] = sanitize_text_field( $query_url_args['dfg_s'] );
				}
				if ( isset( $props['s_df'] ) && 'on' === $props['s_df'] && isset( $query_url_args['dfg_date_filter'] ) ) {
					$props['active_date_filter'] = sanitize_text_field( $query_url_args['dfg_date_filter'] );
					$active_date_filter          = explode( '|', $props['active_date_filter'] );
				}
			}
		}
		// Date Filter
		if ( isset( $props['s_df'] ) && 'on' === $props['s_df'] ) {
			$props['ajax_filters'] = 'on';
		}
		// Init query
		if ( 'on' === $props['no_init'] ) {
			$props['ajax_filters']                    = 'on';
			$props['init_override']['posts_per_page'] = 1;
		}
		// Third party query
		$sfp_comp = 'third_party' === $props['custom_query'] && $props['support_for'] === 'sfp';
		if ( $sfp_comp ) {
			$page = isset( $query_url_args['sf_paged'] ) ? intval( $query_url_args['sf_paged'] ) : $page;
		}
		$posts_data = Dp_Dfg_Utils::get_posts_data( $props, $page, 'init' );
		// Init output
		ob_start();
		if ( isset( $posts_data['error'] ) ) {
			echo et_core_intentionally_unescaped( sprintf( '<div class="dp-dfg-container"><p class="dp-dfg-error">%1$s</p></div>', $posts_data['error'] ), 'html' );
		} elseif ( isset( $posts_data['no_results'] ) ) {
			echo et_core_intentionally_unescaped( sprintf( '<div class="dp-dfg-container dp-dfg-empty"><div class="dp-dfg-items"></div>%1$s</div>', $posts_data['no_results'] ), 'html' );
		} else {
			$posts_number          = intval( $posts_data['post_number'] );
			$layout                = ( 'dp-dfg-layout-masonry' === $props['items_layout'] ) ? 'dp-dfg-layout-grid dp-dfg-layout-masonry' : $props['items_layout'];
			$main_class            = esc_attr( 'dp-dfg-container ' . $layout . ' ' . $props['items_skin'] . ' ' . $props['container_layout'] );
			$active_filter_by_link = '';
			if ( ! empty( $query_url_args ) ) {
				if ( isset( $query_url_args['dfg_active_filter'] ) ) {
					$active_filter_by_link = sanitize_text_field( $query_url_args['dfg_active_filter'] );
				}
			}
			// Localize module properties
			$module_class = trim( ET_Builder_Element::get_module_order_class( $render_slug ) );
			wp_localize_script(
				'dp-divi-filtergrid-frontend-bundle',
				$module_class,
				array(
					'no_results' => apply_filters( 'dpdfg_no_results_html', sprintf( '<div class="dp-dfg-no-results">%1$s</div>', $props['no_results'] ), $props ),
					'props'      => $this->get_data_module_for_ajax( $props ),
					'loader'     => Dp_Dfg_Utils::generate_loader( $props )
				)
			);
			// Main container
			echo et_core_intentionally_unescaped( sprintf(
				'<!-- DPDFG Start Main Container --><div class="%2$s" data-active-filter="%3$s" data-page="%4$s" data-found-posts="%5$s" data-post-number="%6$s" data-default-filter="%7$s" data-link-filter="%8$s" data-cache="%9$s" data-ratio="%10$s" data-show-thumb="%11$s" data-action="%12$s" data-new-window="%13$s" data-filters="%20$s" data-date-filters="%37$s" data-multifilter="%14$s|%15$s" data-multilevel="%16$s|%17$s|%22$s" data-sorting="%27$s" data-order="%28$s" data-orderby="%29$s" data-initorderby="%29$s" data-url-navigation="%31$s" data-url-history="%33$s|%34$s" data-ajax-filters="%32$s" data-doing-ajax="off" data-module="%1$s" data-search="%18$s" data-search-position="%19$s" data-terms-tags="%21$s" data-pagination="%23$s" data-filter-method="%24$s" data-third-party="%25$s" data-lightbox="%26$s" data-video-preview="%30$s" data-no-init="%35$s" data-st="%36$s">',
				$module_class,
				$main_class,
				is_array( $active_filter ) ? implode( '|', $active_filter ) : $active_filter,
				intval( $page ),
				intval( $posts_data['found_posts'] ),
				$posts_number,
				$props['default_filter'],
				$active_filter_by_link,
				$props['cache_on_page'],
				$posts_data['ratio'],
				$props['show_thumbnail'],
				$props['thumbnail_action'],
				$props['read_more_window'],
				$props['multifilter'],
				$props['multifilter_relation'],
				$props['multilevel'],
				$props['multilevel_relation'],
				$props['show_search'],
				$props['search_position'],
				$props['show_filters'] === 'on' || ( isset( $props['s_df'] ) && $props['s_df'] === 'on' ) ? 'on' : 'off',
				$props['filter_dropdown_show_tags'],
				$props['multilevel_hierarchy'],
				$props['show_pagination'],
				$props['trigger_filters'],
				$sfp_comp ? 'sfp' : '',
				$props['lightbox_elements'],
				$props['show_sort'],
				$posts_data['order'],
				$posts_data['orderby'],
				$props['show_video_preview'],
				$props['url_navigation'],
				$props['ajax_filters'],
				$props['url_history'],
				$props['url_nav_action'],
				$props['no_init'],
				$props['p_st'],
				$props['s_df'] ?? 'off'
			), 'html' );
			$ssf_output = '';
			// Search
			$search_output = '';
			if ( 'on' === $props['show_search'] ) {
				$search_icon   = esc_attr( et_pb_process_font_icon( '%%52%%' ) );
				$clear_icon    = esc_attr( et_pb_process_font_icon( '%%48%%' ) );
				$search_button = sprintf( '<span class="et-pb-icon dp-dfg-search-icon" data-icon-search="%1$s" data-icon-clear="%2$s">%3$s</span>', $search_icon, $clear_icon, '' === $props['query_var']['s'] ? $search_icon : $clear_icon );
				$search_output = sprintf( '<input class="dp-dfg-search-input %4$s" type="search" placeholder="%1$s" value="%3$s"/>%2$s', $props['search_placeholder'], $search_button, $props['query_var']['s'], '' === $props['query_var']['s'] ? 'search-clean' : 'search-active' );
				$search_output = sprintf( '<div class="dp-dfg-search">%1$s</div><!-- DPDFG End Search Container -->', $search_output );
			}
			// Sorting
			$sort_output = '';
			if ( $props['show_sort'] === 'on' ) {
				$order_html   = sprintf( '<div class="dp-dfg-sort-order"><span class="dp-dfg-sort-order-asc" data-icon="%1$s"></span><span class="dp-dfg-sort-order-desc" data-icon="%2$s"></span></div>',
					et_pb_process_font_icon( $props['asc_icon'] ),
					et_pb_process_font_icon( $props['desc_icon'] )
				);
				$orderby_html = '';
				if ( ! empty( $props['orderby_sort'] ) ) {
					$sort_by_options = array(
						'date'          => isset( $props['date_ob_text'] ) ? $props['date_ob_text'] : __( 'Date', 'dpdfg-dp-divi-filtergrid' ),
						'title'         => isset( $props['title_ob_text'] ) ? $props['title_ob_text'] : __( 'Title', 'dpdfg-dp-divi-filtergrid' ),
						'type'          => isset( $props['type_ob_text'] ) ? $props['type_ob_text'] : __( 'Post Type', 'dpdfg-dp-divi-filtergrid' ),
						'author'        => isset( $props['author_ob_text'] ) ? $props['author_ob_text'] : __( 'Author', 'dpdfg-dp-divi-filtergrid' ),
						'comment_count' => isset( $props['cc_ob_text'] ) ? $props['cc_ob_text'] : __( 'Comments Count', 'dpdfg-dp-divi-filtergrid' ),
						'default'       => isset( $props['d_ob_text'] ) ? $props['d_ob_text'] : __( 'Default', 'dpdfg-dp-divi-filtergrid' )
					);
					$sort_by_view    = [];
					if ( ! empty( $props['orderby_sort'] ) ) {
						$clean        = html_entity_decode( $props['orderby_sort'] );
						$sort_by_view = json_decode( $clean );
					}
					$sort_by_options_html = '';
					foreach ( $sort_by_view as $sb ) {
						if ( $sb->show === 'on' ) {
							$sort_by_options_html .= sprintf( '<li class="dp-dfg-sort-option" data-value="%1$s">%2$s</li>', $sb->name, $sort_by_options[ $sb->name ] );
						}
					}
					$dropdown     = sprintf( '<div class="dp-dfg-filters-dropdown closed" data-parent="0"><p class="dp-dfg-dropdown-label"><span class="dp-dfg-dropdown-placeholder" data-text="%1$s&nbsp;">%1$s</span></p><ul>%2$s</ul></div>',
						$props['orderby_text'],
						$sort_by_options_html );
					$orderby_html = sprintf( '<div class="dp-dfg-sort-orderby">%1$s</div>', $dropdown );
				}
				$order_options_html = apply_filters( 'dpdfg_custom_sorting_html', $orderby_html . $order_html, $props );
				$sort_output        = sprintf( '<div class="dp-dfg-sorting%2$s">%1$s</div><!-- DPDFG End Sorting Container -->', $order_options_html, $props['no_init'] === 'on' ? ' dp-dfg-hide' : '' );
			}
			// Filters
			$filters_output = '';
			if ( 'on' === $props['show_filters'] || ( isset( $props['s_df'] ) && 'on' === $props['s_df'] ) ) {
				$filter_layout_class = $props['filter_layout'] === 'button' ? "dp-dfg-filters-buttons-layout" : "dp-dfg-filters-dropdown-layout";
				$filters             = [];
				$filters             = array_merge( $filters, Dp_Dfg_Utils::get_filter_terms( $props, $posts_data['posts'] ) );
				$filters_levels      = $filters['levels'];
				$filters_data        = $filters['levels_data'];
				foreach ( $filters_levels as $filter_tax => $filter_level ) {
					$tax_data            = explode( '%%', $filter_tax );
					$order               = $tax_data[0] !== 'all' ? $tax_data[0] : 0;
					$tax_name            = isset( $tax_data[1] ) ? $tax_data[1] : 'all';
					$parent_term         = isset( $tax_data[2] ) ? $tax_data[2] : 0;
					$is_date_filter      = $tax_name === 'dfgthemonths' || $tax_name === 'dfgtheyears';
					$level_active_filter = $is_date_filter ? $active_date_filter : $active_filter;
					if ( is_array( $level_active_filter ) ) {
						$level_terms_ids = [];
						foreach ( $filter_level as $filter ) {
							if ( $filter['id'] !== 'all' ) {
								$level_terms_ids[] = $filter['id'];
							}
						}
						if ( ! count( array_intersect( $level_terms_ids, $level_active_filter ) ) ) {
							$level_active_filter = 'all';
						}
					}
					switch ( $props['filter_layout'] ) {
						case 'button':
							$label_output = '';
							if ( is_array( $filters_data ) ) {
								$level_label = '';
								foreach ( $filters_data as $filter_data ) {
									if ( $filter_data['name'] === $tax_name ) {
										$level_label = $filter_data['label'];
										break;
									}
								}
								if ( ! empty( $level_label ) && ! $parent_term ) {
									$label_output = sprintf( '<p class="dp-dfg-taxonomy-label dp-dfg-taxonomy-%2$s" data-parent="%3$s" data-order="%4$s">%1$s</p>', $level_label, $tax_name, $parent_term, $order );
								}
							}
							$buttons_output = '';
							foreach ( $filter_level as $filter ) {
								$buttons_output .= Dp_Dfg_Utils::filter_button_output( $filter, $level_active_filter, $props, $is_date_filter ? 'date' : 'filter' );
							}
							$filters_output .= sprintf( '%4$s<ul class="dp-dfg-level dp-dfg-taxonomy-level-%1$s dp-dfg-taxonomy-%3$s" data-parent="%5$s" data-tax="%6$s" data-order="%1$s">%2$s</ul>', $order, $buttons_output, $tax_name, $label_output, $parent_term, $tax_name );
							break;
						case 'select':
							$buttons_output = '';
							$all_text       = $props['filter_dropdown_placeholder'];
							if ( is_array( $filters_data ) ) {
								$level_label = '';
								foreach ( $filters_data as $filter_data ) {
									if ( $filter_data['name'] === $tax_name ) {
										$level_label = $filter_data['label'];
										break;
									}
								}
								if ( ! empty( $level_label ) ) {
									$all_text = $level_label;
									if ( $props['multilevel_hierarchy'] === 'on' ) {
										$hierarchy_labels = explode( '|', $level_label );
										$deep             = isset( $filter_level[0]['level'] ) ? $filter_level[0]['level'] : 0;
										$all_text         = isset( $hierarchy_labels[ $deep ] ) ? $hierarchy_labels[ $deep ] : $hierarchy_labels[0];
									}
								} else if ( taxonomy_exists( $tax_name ) ) {
									$all_text = 'Select the ' . get_taxonomy( $tax_name )->labels->name;
								}
							}
							$active_dropdown_tag = '';
							foreach ( $filter_level as $filter ) {
								if ( 'all' !== $active_filter && 'on' === $props['filter_dropdown_show_tags'] && in_array( $filter['id'], $active_filter ) ) {
									$active_dropdown_tag .= sprintf( '<span class="dp-dfg-dropdown-tag" data-id="%1$s">%2$s</span>', esc_attr( $filter['id'] ), esc_attr( $filter['name'] ) );
								}
								$buttons_output .= Dp_Dfg_Utils::filter_button_output( $filter, $level_active_filter, $props, $is_date_filter ? 'date' : 'filter' );
							}
							$filters_output .= sprintf( '<div class="dp-dfg-filters-dropdown closed" data-parent="%6$s"><p class="dp-dfg-dropdown-label" data-content="%4$s"><span class="dp-dfg-dropdown-placeholder">%4$s</span>%5$s</p><ul class="dp-dfg-level dp-dfg-taxonomy-level-%1$s dp-dfg-taxonomy-%3$s">%2$s</ul></div>', $order, $buttons_output, $tax_name, $all_text, $active_dropdown_tag, $parent_term );
							break;
					}
				}
				if ( 'button' === $props['trigger_filters'] || 'on' === $props['clear_filters'] ) {
					$filter_now_button    = '';
					$clear_filters_button = '';
					if ( 'button' === $props['trigger_filters'] ) {
						$custom_button_class = $props['custom_filter_now_button'] === 'off' ? 'dp-dfg-filter-trigger-default' : '';
						$filter_now_button   = $this->render_button( array(
							'button_classname' => array(
								'et_pb_button',
								'dp-dfg-filter-trigger-button',
								'dp-dfg-filtering-done',
								$custom_button_class
							),
							'button_custom'    => $props['custom_filter_now_button'],
							'button_text'      => $props['filter_now_text'],
							'button_url'       => '#',
							'custom_icon'      => $props['filter_now_button_icon'] !== '' ? $props['filter_now_button_icon'] : '&#x35;'
						) );
					}
					if ( 'on' === $props['clear_filters'] ) {
						$custom_button_class  = $props['custom_clear_filters_button'] === 'off' ? 'dp-dfg-clear-filters-default' : '';
						$clear_filters_button = $this->render_button( array(
							'button_classname' => array( 'dp-dfg-clear-filters-button', $custom_button_class ),
							'button_custom'    => $props['custom_clear_filters_button'],
							'button_text'      => $props['clear_filters_text'],
							'button_url'       => '#',
							'custom_icon'      => $props['clear_filters_button_icon'] !== '' ? $props['clear_filters_button_icon'] : '&#x35;'
						) );
					}
					$filters_output = $filters_output . sprintf( '<div class="dp-dfg-filter-actions">%1$s</div>', $filter_now_button . $clear_filters_button );
				}
				if ( 'select' === $props['filter_layout'] ) {
					if ( 'right' === $props['sort_position'] ) {
						$filters_output = $filters_output . $sort_output;
					} else if ( 'left' === $props['sort_position'] ) {
						$filters_output = $sort_output . $filters_output;
					}
					if ( 'right' === $props['search_position'] ) {
						$filters_output = $filters_output . $search_output;
					} else if ( 'left' === $props['search_position'] ) {
						$filters_output = $search_output . $filters_output;
					}
				}
				$filters_output = apply_filters( 'dpdfg_custom_filters_output', $filters_output, $props, $filters );
				$filters_output = sprintf( '<div class="dp-dfg-filters %2$s" data-layout="%3$s" data-orderby="%4$s" data-hierarchy-levels="%5$s">%1$s</div><!-- DPDFG End Filters Container -->', $filters_output, $filter_layout_class, $props['filter_layout'], $props['filters_sort'], $props['multilevel_hierarchy'] );
			}
			$ssf_output .= $filters_output;
			// Sort and filters
			if ( 'below' === $props['sort_position'] ) {
				$ssf_output = $ssf_output . $sort_output;
			} elseif ( 'above' === $props['sort_position'] ) {
				$ssf_output = $sort_output . $ssf_output;
			} elseif ( 'button' === $props['filter_layout'] ) {
				$ssf_output = $ssf_output . $sort_output;
			}
			// Search and filters
			if ( 'below' === $props['search_position'] ) {
				$ssf_output = $ssf_output . $search_output;
			} elseif ( 'above' === $props['search_position'] ) {
				$ssf_output = $search_output . $ssf_output;
			} elseif ( 'button' === $props['filter_layout'] ) {
				$ssf_output = $search_output . $ssf_output;
			}
			echo et_core_intentionally_unescaped( $ssf_output, 'html' );
			// Grid
			$items_output = ! empty( $props['no_init'] ) && $props['no_init'] === 'on' ? '' : Dp_Dfg_Utils::get_items_html( $props, $posts_data['posts'] );
			echo et_core_intentionally_unescaped( sprintf( '<div class="dp-dfg-items">%1$s</div><!-- DPDFG End Posts Items Container -->', ( 'dp-dfg-layout-masonry-standard' === $props['items_layout'] ) ? $items_output . '<div class="dp-dfg-masonry-gutter"></div>' : $items_output ), 'html' );
			// Pagination
			if ( 'on' === $props['show_pagination'] && $posts_number > 0 && ( $posts_data['found_posts'] > $posts_number || $active_filter !== 'all' ) ) {
				$base_url = esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) );
				$base_url = explode( '?', $base_url, 2 );
				$url_args = isset( $base_url[1] ) ? '?' . $base_url[1] : '';
				$base_url = preg_replace( '/page(\/)*([0-9\/])*/i', '', $base_url[0] );
				echo et_core_intentionally_unescaped( sprintf( '<div class="dp-dfg-pagination%3$s" data-base-url="%1$s" data-url-args="%2$s">', $base_url, $url_args, $props['no_init'] === 'on' ? ' dp-dfg-hide' : '' ), 'html' );
				( '/' === array_reverse( str_split( $base_url ) )[0] ) ? $base_url .= 'page/' : $base_url .= '/page/';
				$max_pages     = intval( ceil( $posts_data['found_posts'] / $posts_number ) );
				$previous_page = ( $page > 1 ) ? $page - 1 : 1;
				$next_page     = ( $page < $max_pages ) ? $page + 1 : $max_pages;
				switch ( $props['pagination_type'] ) {
					case 'paged':
						$first_html    = '';
						$last_html     = '';
						$pages_html    = '';
						$previous_icon = sprintf( '<a href="%1$s" data-page="%4$s" class="pagination-link"><span class="et-pb-icon">%3$s</span> %2$s</a>',
							$this->get_page_link( $sfp_comp, $previous_page ),
							esc_html( $props['previous_text'] ),
							esc_attr( et_pb_process_font_icon( $props['previous_icon'] ) ),
							$previous_page );
						$next_icon     = sprintf( '<a href="%1$s" data-page="%4$s" class="pagination-link"> %2$s <span class="et-pb-icon">%3$s</span></a>',
							$this->get_page_link( $sfp_comp, $next_page ),
							esc_html( $props['next_text'] ),
							esc_attr( et_pb_process_font_icon( $props['next_icon'] ) ),
							$next_page );
						if ( 'on' === $props['first_last'] ) {
							$first_icon = sprintf( '<a href="%1$s" data-page="%4$s" class="pagination-link"><span class="et-pb-icon">%3$s</span> %2$s</a>',
								$this->get_page_link( $sfp_comp, 1 ),
								esc_html( $props['first_text'] ),
								esc_attr( et_pb_process_font_icon( $props['first_icon'] ) ),
								1 );
							$last_icon  = sprintf( '<a href="%1$s" data-page="%4$s" class="pagination-link"> %2$s <span class="et-pb-icon">%3$s</span></a>',
								$this->get_page_link( $sfp_comp, $max_pages ),
								esc_html( $props['last_text'] ),
								esc_attr( et_pb_process_font_icon( $props['last_icon'] ) ),
								$max_pages );
							$first_html = sprintf( '<li class="pagination-item dp-dfg-first-page dp-dfg-direction %2$s">%1$s</li>', $first_icon, $page === 1 ? ' dp-dfg-hide' : '' );
							$last_html  = sprintf( '<li class="pagination-item dp-dfg-last-page dp-dfg-direction %2$s">%1$s</li>', $last_icon, $page === $max_pages ? ' dp-dfg-hide' : '' );
						}
						$prev_html = sprintf( '<li class="pagination-item previous-posts dp-dfg-direction %2$s">%1$s</li>', $previous_icon, $page === 1 ? ' dp-dfg-hide' : '' );
						for ( $index = 1; $index <= $max_pages; $index ++ ) {
							$pages_html .= sprintf( '<li class="pagination-item%2$s%3$s"><a href="%1$s" data-page="%4$s" class="pagination-link dp-dfg-page">%4$s</a></li>',
								$this->get_page_link( $sfp_comp, $index ),
								$index === $page ? ' active' : '',
								( $index > $page + $props['pagination_pages'] || $index < $page - $props['pagination_pages'] ) ? ' dp-dfg-hide' : '',
								$index );
						}
						$next_html = sprintf( '<li class="pagination-item next-posts dp-dfg-direction %2$s">%1$s</li>', $next_icon, $page === $max_pages ? ' dp-dfg-hide' : '' );
						echo et_core_intentionally_unescaped( sprintf( '<ul class="pagination %1$s">%2$s</ul>', ( $posts_data['found_posts'] <= $posts_number ) ? ' dp-dfg-hide' : '', $first_html . $prev_html . $pages_html . $next_html . $last_html ), 'html' );
						break;
					case 'button':
						if ( '' !== $props['ajax_load_more_text'] ) {
							$custom_button_class = $props['custom_load_more_button'] === 'off' ? 'dp-dfg-load-more-default' : '';
							$button_output       = $this->render_button(
								array(
									'button_classname'    => array(
										'et_pb_button',
										'dp-dfg-load-more-button',
										$custom_button_class,
										$page >= $max_pages ? 'dp-dfg-hide' : ''
									),
									'button_custom'       => $props['custom_load_more_button'],
									'button_rel'          => $props['load_more_button_rel'],
									'button_text'         => esc_html( $props['ajax_load_more_text'] ),
									'button_text_escaped' => true,
									'button_url'          => $base_url . $next_page . $sfp_comp ? add_query_arg( 'sf_paged', $next_page, $url_args ) : $url_args . '/',
									'custom_icon'         => $props['load_more_button_icon'] !== '' ? $props['load_more_button_icon'] : '&#x35;',
									'url_new_window'      => false,
									'display_button'      => '' !== $props['ajax_load_more_text'],
								)
							);
							echo et_core_intentionally_unescaped( $button_output, 'html' );
						}
						break;
					case 'scroll':
						echo et_core_esc_previously( sprintf( '<div  class="dp-dfg-ajax-scroll%3$s"><a class="dp-dfg-scroll-page-link dp-dfg-hide" href="%1$s">%2$s</a></div>',
							$base_url . $next_page . $sfp_comp ? add_query_arg( 'sf_paged', $next_page, $url_args ) : $url_args . '/',
							__( 'Next Page', 'dpdfg-dp-divi-filtergrid' ),
							$page < $max_pages ? ' active' : ''
						) );
						break;
				}
				echo '</div><!-- DPDFG End Pagination Container -->';
			}
			echo '</div><!-- DPDFG End Main Container -->';
		}

		return ob_get_clean();
	}

	public function get_page_link( $sfp_comp, $page ): string {
		$p_link = get_pagenum_link( $page, false );
		if ( $sfp_comp ) {
			$p_link = add_query_arg( 'sf_paged', $page, $p_link );
		}

		return esc_url( $p_link );
	}

	public function responsive_css( $props, $layout, $render_slug ) {
		// Images: Add CSS Filters and Mix Blend Mode rules (if set)
		if ( array_key_exists( 'image', $this->advanced_fields ) && array_key_exists( 'css', $this->advanced_fields['image'] ) ) {
			$this->add_classname(
				$this->generate_css_filters(
					$render_slug,
					'child_',
					self::$data_utils->array_get( $this->advanced_fields['image']['css'], 'main', '%%order_class%% .dp-dfg-image img' )
				)
			);
		}
		if ( $props['bg_items'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-item',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['bg_items'] ) ),
				)
			);
		}
		if ( $props['bg_filters'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-skin-default .dp-dfg-filter a.dp-dfg-filter-link',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['bg_filters'] ) ),
				)
			);
		}
		if ( $props['bg_filter_active'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-skin-default .dp-dfg-filter a.dp-dfg-filter-link.active, %%order_class%% .dp-dfg-skin-default .dp-dfg-dropdown-tag',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['bg_filter_active'] ) ),
				)
			);
		}
		if ( $props['bg_sorting'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-skin-default .dp-dfg-sort-option',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['bg_sorting'] ) ),
				)
			);
		}
		if ( $props['bg_sorting_active'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-skin-default .dp-dfg-sort-option.active',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['bg_sorting_active'] ) ),
				)
			);
		}
		if ( $props['bg_pagination'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-skin-default .pagination-item a.pagination-link',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['bg_pagination'] ) ),
				)
			);
		}
		if ( $props['bg_pagination_active'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-skin-default .pagination-item.active a.pagination-link',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['bg_pagination_active'] ) ),
				)
			);
		}
		if ( $props['bg_search'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-search-input',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['bg_search'] ) ),
				)
			);
		}
		if ( $props['bg_search_icon'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-search-icon',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['bg_search_icon'] ) ),
				)
			);
		}
		if ( 'dp-dfg-layout-grid' === $layout ) {
			if ( '' !== $props['items_width_tablet'] || '' !== $props['items_width_phone'] || '' !== $props['items_width'] ) {
				$props['items_width_responsive_active'] = et_pb_get_responsive_status( $props['items_width_last_edited'] );
				$props['items_width_values']            = array(
					'desktop' => $props['items_width'],
					'tablet'  => $props['items_width_responsive_active'] ? $props['items_width_tablet'] : '',
					'phone'   => $props['items_width_responsive_active'] ? $props['items_width_phone'] : '',
				);
				$modify_css_values                      = array();
				foreach ( $props['items_width_values'] as $key => $width ) {
					if ( '' === $width ) {
						$modify_css_values[ $key ] = '';
					} else {
						$modify_css_values[ $key ] = ' repeat(auto-fill, minmax(' . esc_attr( $width ) . ', 1fr))';
					}
				}
				foreach ( $modify_css_values as $device => $current_value ) {
					if ( '' === $current_value ) {
						continue;
					}
					$declaration = sprintf( '%1$s: %2$s%3$s', 'grid-template-columns', $current_value, ';' );
					$style       = array(
						'selector'    => '%%order_class%% .dp-dfg-container.dp-dfg-layout-grid .dp-dfg-items',
						'declaration' => $declaration,
					);
					if ( 'desktop_only' === $device ) {
						$style['media_query'] = ET_Builder_Element::get_media_query( 'min_width_981' );
					} elseif ( 'desktop' !== $device ) {
						$current_media_query  = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
						$style['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
					}
					ET_Builder_Element::set_style( $render_slug, $style );
				}
			}
			if ( '' !== $props['column_gutter_tablet'] || '' !== $props['column_gutter_phone'] || '' !== $props['column_gutter'] ) {
				$props['column_gutter_responsive_active'] = et_pb_get_responsive_status( $props['column_gutter_last_edited'] );
				$props['column_gutter_values']            = array(
					'desktop' => $props['column_gutter'],
					'tablet'  => $props['column_gutter_responsive_active'] ? $props['column_gutter_tablet'] : '',
					'phone'   => $props['column_gutter_responsive_active'] ? $props['column_gutter_phone'] : '',
				);
				$this->generate_responsive_css( $props['column_gutter_values'], '%%order_class%% .dp-dfg-layout-grid .dp-dfg-items', 'column-gap', $render_slug );
			}
			if ( '' !== $props['row_gutter_tablet'] || '' !== $props['row_gutter_phone'] || '' !== $props['row_gutter'] ) {
				$props['row_gutter_responsive_active'] = et_pb_get_responsive_status( $props['row_gutter_last_edited'] );
				$props['row_gutter_values']            = array(
					'desktop' => $props['row_gutter'],
					'tablet'  => $props['row_gutter_responsive_active'] ? $props['row_gutter_tablet'] : '',
					'phone'   => $props['row_gutter_responsive_active'] ? $props['row_gutter_phone'] : '',
				);
				$this->generate_responsive_css( $props['row_gutter_values'], '%%order_class%% .dp-dfg-layout-grid .dp-dfg-items', 'row-gap', $render_slug );
			}
		}
		if ( 'dp-dfg-layout-masonry' === $layout ) {
			if ( '' !== $props['items_width_tablet'] || '' !== $props['items_width_phone'] || '' !== $props['items_width'] ) {
				$props['items_width_responsive_active'] = et_pb_get_responsive_status( $props['items_width_last_edited'] );
				$props['items_width_values']            = array(
					'desktop' => $props['items_width'],
					'tablet'  => $props['items_width_responsive_active'] ? $props['items_width_tablet'] : '',
					'phone'   => $props['items_width_responsive_active'] ? $props['items_width_phone'] : '',
				);
				$modify_css_values                      = array();
				foreach ( $props['items_width_values'] as $key => $width ) {
					if ( '' === $width ) {
						$modify_css_values[ $key ] = '';
					} else {
						$modify_css_values[ $key ] = ' repeat(auto-fill, minmax(' . $width . ', 1fr))';
					}
				}
				foreach ( $modify_css_values as $device => $current_value ) {
					if ( '' === $current_value ) {
						continue;
					}
					$declaration = sprintf( '%1$s: %2$s%3$s', 'grid-template-columns', $current_value, ';' );
					if ( '' === $declaration ) {
						continue;
					}
					$style = array(
						'selector'    => '%%order_class%% .dp-dfg-container.dp-dfg-layout-masonry .dp-dfg-items',
						'declaration' => $declaration,
					);
					if ( 'desktop_only' === $device ) {
						$style['media_query'] = ET_Builder_Element::get_media_query( 'min_width_981' );
					} elseif ( 'desktop' !== $device ) {
						$current_media_query  = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
						$style['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
					}
					ET_Builder_Element::set_style( $render_slug, $style );
				}
			}
			if ( '' !== $props['column_gutter_tablet'] || '' !== $props['column_gutter_phone'] || '' !== $props['column_gutter'] ) {
				$props['column_gutter_responsive_active'] = et_pb_get_responsive_status( $props['column_gutter_last_edited'] );
				$props['column_gutter_values']            = array(
					'desktop' => $props['column_gutter'],
					'tablet'  => $props['column_gutter_responsive_active'] ? $props['column_gutter_tablet'] : '',
					'phone'   => $props['column_gutter_responsive_active'] ? $props['column_gutter_phone'] : '',
				);
				$this->generate_responsive_css( $props['column_gutter_values'], '%%order_class%% .dp-dfg-layout-masonry .dp-dfg-items', 'column-gap', $render_slug );
			}
			if ( '' !== $props['row_gutter_tablet'] || '' !== $props['row_gutter_phone'] || '' !== $props['row_gutter'] ) {
				$props['row_gutter_responsive_active'] = et_pb_get_responsive_status( $props['row_gutter_last_edited'] );
				$props['row_gutter_values']            = array(
					'desktop' => $props['row_gutter'],
					'tablet'  => $props['row_gutter_responsive_active'] ? $props['row_gutter_tablet'] : '',
					'phone'   => $props['row_gutter_responsive_active'] ? $props['row_gutter_phone'] : '',
				);
				$this->generate_responsive_css( $props['row_gutter_values'], '%%order_class%% .dp-dfg-layout-masonry .dp-dfg-items', 'row-gap', $render_slug );
			}
		}
		if ( 'dp-dfg-layout-masonry-standard' === $layout ) {
			if ( '' !== $props['items_width_flex_tablet'] || '' !== $props['items_width_flex_phone'] || '' !== $props['items_width_flex'] ) {
				$props['items_width_flex_responsive_active'] = et_pb_get_responsive_status( $props['items_width_flex_last_edited'] );
				$props['items_width_flex_values']            = array(
					'desktop' => $props['items_width_flex'],
					'tablet'  => $props['items_width_flex_responsive_active'] ? $props['items_width_flex_tablet'] : '',
					'phone'   => $props['items_width_flex_responsive_active'] ? $props['items_width_flex_phone'] : '',
				);
				$this->generate_responsive_css( $props['items_width_flex_values'], '%%order_class%% .dp-dfg-layout-masonry-standard .dp-dfg-masonry-item', 'width', $render_slug );
				$modify_css_values = array();
				foreach ( $props['items_width_flex_values'] as $key => $width ) {
					if ( '' === $width ) {
						$modify_css_values[ $key ] = '';
					} else {
						$columns = intval( floor( 100 / floatval( $width ) ) );
						if ( 1 === $columns ) {
							$margin_percent = ( 100 - floatval( $width ) * $columns ) / ( $columns ) . '%';
						} else {
							$margin_percent = ( 100 - floatval( $width ) * $columns ) / ( $columns - 1 ) . '%';
						}
						$modify_css_values[ $key ] = sprintf( 'width: %1$s;', $margin_percent );
					}
				}
				foreach ( $modify_css_values as $device => $current_value ) {
					if ( '' === $current_value ) {
						continue;
					}
					$style = array(
						'selector'    => '%%order_class%% .dp-dfg-container.dp-dfg-layout-masonry-standard .dp-dfg-masonry-gutter',
						'declaration' => $current_value,
					);
					if ( 'desktop_only' === $device ) {
						$style['media_query'] = ET_Builder_Element::get_media_query( 'min_width_981' );
					} elseif ( 'desktop' !== $device ) {
						$current_media_query  = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
						$style['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
					}
					ET_Builder_Element::set_style( $render_slug, $style );
				}
			}
			if ( '' !== $props['row_gutter_flex_tablet'] || '' !== $props['row_gutter_flex_phone'] || '' !== $props['row_gutter_flex'] ) {
				$props['row_gutter_flex_responsive_active'] = et_pb_get_responsive_status( $props['row_gutter_flex_last_edited'] );
				$props['row_gutter_flex_values']            = array(
					'desktop' => $props['row_gutter_flex'],
					'tablet'  => $props['row_gutter_flex_responsive_active'] ? $props['row_gutter_flex_tablet'] : '',
					'phone'   => $props['row_gutter_flex_responsive_active'] ? $props['row_gutter_flex_phone'] : '',
				);
				$this->generate_responsive_css( $props['row_gutter_flex_values'], '%%order_class%% .dp-dfg-layout-masonry-standard .dp-dfg-masonry-item', 'margin-bottom', $render_slug );
			}
		}
		if ( 'dp-dfg-layout-flex' === $layout ) {
			if ( '' !== $props['items_width_flex_tablet'] || '' !== $props['items_width_flex_phone'] || '' !== $props['items_width_flex'] ) {
				$props['items_width_flex_responsive_active'] = et_pb_get_responsive_status( $props['items_width_flex_last_edited'] );
				$props['items_width_flex_values']            = array(
					'desktop' => $props['items_width_flex'],
					'tablet'  => $props['items_width_flex_responsive_active'] ? $props['items_width_flex_tablet'] : '',
					'phone'   => $props['items_width_flex_responsive_active'] ? $props['items_width_flex_phone'] : '',
				);
				$this->generate_responsive_css( $props['items_width_flex_values'], '%%order_class%% .dp-dfg-layout-flex .dp-dfg-item', 'width', $render_slug );
				$modify_css_values = array();
				foreach ( $props['items_width_flex_values'] as $key => $width ) {
					if ( '' === $width ) {
						$modify_css_values[ $key ] = '';
					} else {
						$columns = intval( floor( 100 / intval( $width ) ) );
						if ( 1 === $columns ) {
							$margin_percent = ( ( 100 % intval( $width ) ) / ( $columns ) ) . '%';
						} else {
							$margin_percent = ( ( 100 % intval( $width ) ) / ( $columns - 1 ) ) . '%';
						}
						$modify_css_values[ $key ] = sprintf( 'width: %1$s;', $margin_percent );
					}
				}
				foreach ( $modify_css_values as $device => $current_value ) {
					if ( '' === $current_value ) {
						continue;
					}
					$style = array(
						'selector'    => '%%order_class%% .dp-dfg-container.dp-dfg-layout-masonry-standard .dp-dfg-masonry-gutter',
						'declaration' => $current_value,
					);
					if ( 'desktop_only' === $device ) {
						$style['media_query'] = ET_Builder_Element::get_media_query( 'min_width_981' );
					} elseif ( 'desktop' !== $device ) {
						$current_media_query  = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
						$style['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
					}
					ET_Builder_Element::set_style( $render_slug, $style );
				}
			}
			if ( '' !== $props['row_gutter_flex_tablet'] || '' !== $props['row_gutter_flex_phone'] || '' !== $props['row_gutter_flex'] ) {
				$props['row_gutter_flex_responsive_active'] = et_pb_get_responsive_status( $props['row_gutter_flex_last_edited'] );
				$props['row_gutter_flex_values']            = array(
					'desktop' => $props['row_gutter_flex'],
					'tablet'  => $props['row_gutter_flex_responsive_active'] ? $props['row_gutter_flex_tablet'] : '',
					'phone'   => $props['row_gutter_flex_responsive_active'] ? $props['row_gutter_flex_phone'] : '',
				);
				$this->generate_responsive_css( $props['row_gutter_flex_values'], '%%order_class%% .dp-dfg-layout-flex .dp-dfg-item', 'margin-bottom', $render_slug );
			}
			if ( '' !== $props['justify_content'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dp-dfg-layout-flex .dp-dfg-items',
						'declaration' => sprintf( 'justify-content: %1$s;', $props['justify_content'] ),
					)
				);
			}
		}
		if ( 'dp-dfg-layout-list' === $layout ) {
			if ( '' !== $props['column_gutter_tablet'] || '' !== $props['column_gutter_phone'] || '' !== $props['column_gutter'] ) {
				$props['column_gutter_responsive_active'] = et_pb_get_responsive_status( $props['column_gutter_last_edited'] );
				$props['column_gutter_values']            = array(
					'desktop' => $props['column_gutter'],
					'tablet'  => $props['column_gutter_responsive_active'] ? $props['column_gutter_tablet'] : '',
					'phone'   => $props['column_gutter_responsive_active'] ? $props['column_gutter_phone'] : '',
				);
				$this->generate_responsive_css( $props['column_gutter_values'], '%%order_class%% .dp-dfg-layout-list .dp-dfg-item', 'column-gap', $render_slug );
			}
			if ( '' !== $props['row_gutter_tablet'] || '' !== $props['row_gutter_phone'] || '' !== $props['row_gutter'] ) {
				$props['row_gutter_responsive_active'] = et_pb_get_responsive_status( $props['row_gutter_last_edited'] );
				$props['row_gutter_values']            = array(
					'desktop' => $props['row_gutter'],
					'tablet'  => $props['row_gutter_responsive_active'] ? $props['row_gutter_tablet'] : '',
					'phone'   => $props['row_gutter_responsive_active'] ? $props['row_gutter_phone'] : '',
				);
				$this->generate_responsive_css( $props['row_gutter_values'], '%%order_class%% .dp-dfg-layout-list .dp-dfg-items', 'grid-row-gap', $render_slug );
			}
			if ( ( '' !== $props['thumb_min_width_tablet'] || '' !== $props['thumb_min_width_phone'] || '' !== $props['thumb_min_width'] ) && ( '' !== $props['thumb_width_tablet'] || '' !== $props['thumb_width_phone'] || '' !== $props['thumb_width'] ) ) {
				$props['thumb_min_width_responsive_active'] = et_pb_get_responsive_status( $props['thumb_min_width_last_edited'] );
				$props['thumb_min_width_values']            = array(
					'desktop' => $props['thumb_min_width'],
					'tablet'  => $props['thumb_min_width_responsive_active'] ? $props['thumb_min_width_tablet'] : '',
					'phone'   => $props['thumb_min_width_responsive_active'] ? $props['thumb_min_width_phone'] : '',
				);
				$props['thumb_width_responsive_active']     = et_pb_get_responsive_status( $props['thumb_width_last_edited'] );
				$props['thumb_width_values']                = array(
					'desktop' => $props['thumb_width'],
					'tablet'  => $props['thumb_width_responsive_active'] ? $props['thumb_width_tablet'] : '',
					'phone'   => $props['thumb_width_responsive_active'] ? $props['thumb_width_phone'] : '',
				);
				$modify_css_values                          = array();
				foreach ( $props['thumb_min_width_values'] as $key => $width ) {
					if ( '' === $width ) {
						$modify_css_values[ $key ] = ' 1fr';
					} else {
						$modify_css_values[ $key ] = ' minmax(' . esc_attr( $width ) . ' , ' . $props['thumb_width_values'][ $key ] . ') 1fr';
					}
				}
				foreach ( $modify_css_values as $device => $current_value ) {
					if ( '' === $current_value ) {
						continue;
					}
					$declaration = sprintf( '%1$s: %2$s%3$s %4$s: %2$s%3$s', 'grid-template-columns', $current_value, ';', '-ms-grid-columns' );
					$style       = array(
						'selector'    => '%%order_class%% .dp-dfg-layout-list .dp-dfg-item',
						'declaration' => $declaration,
					);
					if ( 'desktop_only' === $device ) {
						$style['media_query'] = ET_Builder_Element::get_media_query( 'min_width_981' );
					} elseif ( 'desktop' !== $device ) {
						$current_media_query  = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
						$style['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
					}
					ET_Builder_Element::set_style( $render_slug, $style );
				}
			}
		}
		if ( 'dp-dfg-layout-list' === $layout || 'dp-dfg-layout-grid' === $layout || $layout === 'dp-dfg-layout-masonry' || $layout === 'dp-dfg-layout-masonry-standard' ) {
			if ( '' !== $props['column_gutter_tablet'] || '' !== $props['column_gutter_phone'] || '' !== $props['column_gutter'] ) {
				$props['column_gutter_responsive_active'] = et_pb_get_responsive_status( $props['column_gutter_last_edited'] );
				$props['column_gutter_values']            = array(
					'desktop' => $props['column_gutter'],
					'tablet'  => $props['column_gutter_responsive_active'] ? $props['column_gutter_tablet'] : '',
					'phone'   => $props['column_gutter_responsive_active'] ? $props['column_gutter_phone'] : '',
				);
				$this->generate_responsive_css( $props['column_gutter_values'], '%%order_class%% .dp-dfg-container', 'column-gap', $render_slug );
			}
			if ( '' !== $props['row_gutter_tablet'] || '' !== $props['row_gutter_phone'] || '' !== $props['row_gutter'] ) {
				$props['row_gutter_responsive_active'] = et_pb_get_responsive_status( $props['row_gutter_last_edited'] );
				$props['row_gutter_values']            = array(
					'desktop' => $props['row_gutter'],
					'tablet'  => $props['row_gutter_responsive_active'] ? $props['row_gutter_tablet'] : '',
					'phone'   => $props['row_gutter_responsive_active'] ? $props['row_gutter_phone'] : '',
				);
				$this->generate_responsive_css( $props['row_gutter_values'], '%%order_class%% .dp-dfg-container', 'row-gap', $render_slug );
			}
		}
		if ( '' !== $props['grid_font_size_tablet'] || '' !== $props['grid_font_size_phone'] || '' !== $props['grid_font_size'] ) {
			$props['grid_font_size_responsive_active'] = et_pb_get_responsive_status( $props['grid_font_size_last_edited'] );
			$props['grid_font_size_values']            = array(
				'desktop' => $props['grid_font_size'],
				'tablet'  => $props['grid_font_size_responsive_active'] ? $props['grid_font_size_tablet'] : '',
				'phone'   => $props['grid_font_size_responsive_active'] ? $props['grid_font_size_phone'] : '',
			);
			$this->generate_responsive_css( $props['grid_font_size_values'], '%%order_class%% .dp-dfg-container', 'font-size', $render_slug );
		}
		if ( 'on' === $props['use_overlay_icon'] ) {
			if ( version_compare( ET_BUILDER_PRODUCT_VERSION, '4.12.1', '>' ) ) {
				$this->generate_styles(
					array(
						'utility_arg'    => 'icon_font_family',
						'render_slug'    => $render_slug,
						'base_attr_name' => 'hover_icon',
						'important'      => true,
						'selector'       => '%%order_class%% .dp-dfg-overlay span.dfg_et_overlay:before',
						'processor'      => array(
							'ET_Builder_Module_Helper_Style_Processor',
							'process_extended_icon',
						),
					)
				);
			}
			if ( '' !== $props['overlay_icon_color'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dp-dfg-overlay span.dfg_et_overlay:before',
						'declaration' => sprintf(
							'color: %1$s !important;',
							$this->maybe_get_global_color( $props['overlay_icon_color'] )
						),
					)
				);
			}
			$overlay_icon_size_values = et_pb_responsive_options()->get_property_values( $props, 'overlay_icon_size', '32px', true );
			$this->generate_responsive_css( $overlay_icon_size_values, '%%order_class%% .dfg_et_overlay:before', 'font-size', $render_slug );
		}
		if ( '' !== $props['hover_overlay_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-overlay span.dfg_et_overlay',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->maybe_get_global_color( $props['hover_overlay_color'] )
					),
				)
			);
		}
		if ( 'on' === $props['show_video_preview'] && 'on' === $props['video_overlay_icon'] ) {
			if ( version_compare( ET_BUILDER_PRODUCT_VERSION, '4.12.1', '>' ) ) {
				$this->generate_styles(
					array(
						'utility_arg'    => 'icon_font_family',
						'render_slug'    => $render_slug,
						'base_attr_name' => 'video_icon',
						'important'      => true,
						'selector'       => '%%order_class%% .dp-dfg-video-overlay span.dfg_et_overlay:before',
						'processor'      => array(
							'ET_Builder_Module_Helper_Style_Processor',
							'process_extended_icon',
						),
					)
				);
			}
		}
		if ( '' !== $props['video_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-video-overlay span.dfg_et_overlay:before',
					'declaration' => sprintf(
						'color: %1$s !important;',
						$this->maybe_get_global_color( $props['video_icon_color'] )
					),
				)
			);
		}
		if ( '' !== $props['video_overlay_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dp-dfg-video-overlay span.dfg_et_overlay',
					'declaration' => sprintf(
						'background-color: %1$s;',
						$this->maybe_get_global_color( $props['video_overlay_color'] )
					),
				)
			);
		}
		if ( 'select' === $props['filter_layout'] ) {
			if ( '' !== $props['filters_width_tablet'] || '' !== $props['filters_width_phone'] || '' !== $props['filters_width'] ) {
				$props['filters_width_responsive_active'] = et_pb_get_responsive_status( $props['filters_width_last_edited'] );
				$props['filters_width_values']            = array(
					'desktop' => $props['filters_width'],
					'tablet'  => $props['filters_width_responsive_active'] ? $props['filters_width_tablet'] : '',
					'phone'   => $props['filters_width_responsive_active'] ? $props['filters_width_phone'] : '',
				);
				$modify_css_values                        = array();
				foreach ( $props['filters_width_values'] as $key => $width ) {
					if ( '' === $width ) {
						$modify_css_values[ $key ] = '';
					} else {
						$modify_css_values[ $key ] = ' repeat(' . esc_attr( $width ) . ', 1fr)';
					}
				}
				foreach ( $modify_css_values as $device => $current_value ) {
					if ( '' === $current_value ) {
						continue;
					}
					$declaration = sprintf( '%1$s: %2$s%3$s', 'grid-template-columns', $current_value, ';' );
					$style       = array(
						'selector'    => '%%order_class%% .dp-dfg-container .dp-dfg-filters-dropdown-layout',
						'declaration' => $declaration,
					);
					if ( 'desktop_only' === $device ) {
						$style['media_query'] = ET_Builder_Element::get_media_query( 'min_width_981' );
					} elseif ( 'desktop' !== $device ) {
						$current_media_query  = 'tablet' === $device ? 'max_width_980' : 'max_width_767';
						$style['media_query'] = ET_Builder_Element::get_media_query( $current_media_query );
					}
					ET_Builder_Element::set_style( $render_slug, $style );
				}
			}
		}
		if ( 'popup' === $props['thumbnail_action'] || 'popup_v' === $props['thumbnail_action'] || 'popup' === $props['video_action'] ) {
			if ( '' !== $props['popup_width_tablet'] || '' !== $props['popup_width_phone'] || '' !== $props['popup_width'] ) {
				$props['popup_width_responsive_active'] = et_pb_get_responsive_status( $props['popup_width_last_edited'] );
				$props['popup_width_values']            = array(
					'desktop' => $props['popup_width'],
					'tablet'  => $props['popup_width_responsive_active'] ? $props['popup_width_tablet'] : '',
					'phone'   => $props['popup_width_responsive_active'] ? $props['popup_width_phone'] : '',
				);
				$this->generate_responsive_css( $props['popup_width_values'], '%%order_class%%-popup.dp-dfg-popup .mfp-content', 'width', $render_slug );
			}
			if ( '' !== $props['popup_height_tablet'] || '' !== $props['popup_height_phone'] || '' !== $props['popup_height'] ) {
				$props['popup_height_responsive_active'] = et_pb_get_responsive_status( $props['popup_height_last_edited'] );
				$props['popup_height_values']            = array(
					'desktop' => $props['popup_height'],
					'tablet'  => $props['popup_height_responsive_active'] ? $props['popup_height_tablet'] : '',
					'phone'   => $props['popup_height_responsive_active'] ? $props['popup_height_phone'] : '',
				);
				$this->generate_responsive_css( $props['popup_height_values'], '%%order_class%%-popup.dp-dfg-popup .mfp-content', 'height', $render_slug );
			}
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%-popup.dp-dfg-popup .mfp-content',
					'declaration' => sprintf( 'max-width: %1$s;', $props['popup_max_width'] ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%-popup.dp-dfg-popup',
					'declaration' => sprintf( 'background-color: %1$s;', $this->maybe_get_global_color( $props['popup_bg'] )
					),
				)
			);
		}
		if ( 'on' === $props['show_pagination'] ) {
			if ( version_compare( ET_BUILDER_PRODUCT_VERSION, '4.12.1', '>' ) ) {
				$this->generate_styles(
					array(
						'utility_arg'    => 'icon_font_family',
						'render_slug'    => $render_slug,
						'base_attr_name' => 'previous_icon',
						'important'      => true,
						'selector'       => '%%order_class%% .pagination-item.previous-posts span',
						'processor'      => array(
							'ET_Builder_Module_Helper_Style_Processor',
							'process_extended_icon',
						),
					)
				);
				$this->generate_styles(
					array(
						'utility_arg'    => 'icon_font_family',
						'render_slug'    => $render_slug,
						'base_attr_name' => 'next_icon',
						'important'      => true,
						'selector'       => '%%order_class%% .pagination-item.next-posts span',
						'processor'      => array(
							'ET_Builder_Module_Helper_Style_Processor',
							'process_extended_icon',
						),
					)
				);
				$this->generate_styles(
					array(
						'utility_arg'    => 'icon_font_family',
						'render_slug'    => $render_slug,
						'base_attr_name' => 'first_icon',
						'important'      => true,
						'selector'       => '%%order_class%% .pagination-item.dp-dfg-first-page span',
						'processor'      => array(
							'ET_Builder_Module_Helper_Style_Processor',
							'process_extended_icon',
						),
					)
				);
				$this->generate_styles(
					array(
						'utility_arg'    => 'icon_font_family',
						'render_slug'    => $render_slug,
						'base_attr_name' => 'last_icon',
						'important'      => true,
						'selector'       => '%%order_class%% .pagination-item.dp-dfg-last-page span',
						'processor'      => array(
							'ET_Builder_Module_Helper_Style_Processor',
							'process_extended_icon',
						),
					)
				);
			}
		}
		$this->set_button_alignment( $props, 'read_more_button', '.dp-dfg-item .et_pb_button_wrapper.read-more-wrapper', $render_slug );
		$this->set_button_alignment( $props, 'action_button', '.dp-dfg-item .et_pb_button_wrapper.action-button-wrapper', $render_slug );
		$this->set_button_alignment( $props, 'load_more_button', '.dp-dfg-pagination .et_pb_button_wrapper', $render_slug );
		if ( 'on' === $props['show_sort'] ) {
			$this->generate_styles(
				array(
					'utility_arg'    => 'icon_font_family',
					'render_slug'    => $render_slug,
					'base_attr_name' => 'asc_icon',
					'important'      => true,
					'selector'       => '%%order_class%% .dp-dfg-sort-order-asc:after',
					'processor'      => array(
						'ET_Builder_Module_Helper_Style_Processor',
						'process_extended_icon',
					),
				)
			);
			$this->generate_styles(
				array(
					'utility_arg'    => 'icon_font_family',
					'render_slug'    => $render_slug,
					'base_attr_name' => 'desc_icon',
					'important'      => true,
					'selector'       => '%%order_class%% .dp-dfg-sort-order-desc:after',
					'processor'      => array(
						'ET_Builder_Module_Helper_Style_Processor',
						'process_extended_icon',
					),
				)
			);
		}
		do_action( 'dpdfg_ext_responsive_css', $props, $layout, $render_slug );
	}

	public function maybe_get_global_color( $color_id ) {
		if ( function_exists( 'et_builder_get_global_color_info' ) ) {
			$color_info = et_builder_get_global_color_info( $color_id );
			if ( ! is_null( $color_info ) && isset( $color_info['color'] ) ) {
				$color_id = $color_info['color'];
			}
		}

		return $color_id;
	}

	public function generate_responsive_css( $values_array, $css_selector, $css_property, $function_name ) {
		if ( function_exists( 'et_pb_responsive_options' ) ) {
			et_pb_responsive_options()->generate_responsive_css( $values_array, $css_selector, $css_property, $function_name );
		}
	}

	public function get_data_module_for_ajax( $props ): array {
		$data_module_important_keys = apply_filters( 'dpdfg_ext_get_data_module_for_ajax', array(
			/* Query */
			'custom_query',
			'support_for',
			'sfp_id',
			'include_categories',
			'current_post_type',
			'multiple_cpt',
			'use_taxonomy_terms',
			'multiple_taxonomies',
			'include_terms',
			'terms_relation',
			'include_children_terms',
			'exclude_taxonomies',
			'exclude_terms',
			'taxonomies_relation',
			'exclude_taxonomies_relation',
			'related_taxonomies',
			'related_criteria',
			'posts_ids',
			'post_number',
			'offset_number',
			'order',
			'orderby',
			'meta_key',
			'meta_type',
			'posts_ids',
			'show_private',
			'current_author',
			'sticky_posts',
			'remove_current_post',
			'no_results',
			/* Posts elements options */
			'show_thumbnail',
			'thumbnail_action',
			'thumbnail_size',
			't_alt',
			'lightbox_elements',
			'gallery_cf_name',
			'use_overlay',
			'use_overlay_icon',
			'overlay_icon_color',
			'hover_overlay_color',
			'hover_icon',
			'show_title',
			'title_link',
			'show_post_meta',
			'meta_separator',
			'show_author',
			'author_prefix_text',
			'show_date',
			'date_format',
			'show_terms',
			'show_terms_taxonomy',
			'terms_separator',
			'terms_links',
			'show_comments',
			'show_content',
			'content_length',
			'truncate_content',
			'truncate_excerpt',
			'strip_html',
			'action_button',
			'action_button_text',
			'action_button_icon',
			'read_more',
			'read_more_text',
			'read_more_window',
			'read_more_button_icon',
			'show_custom_content',
			'custom_content_container',
			'show_custom_fields',
			'custom_fields',
			'custom_url',
			'custom_url_field_name',
			'custom_url_target',
			/* Video options fields */
			'show_video_preview',
			'video_module',
			'video_action',
			'video_action_priority',
			'video_overlay',
			'video_overlay_icon',
			'video_icon_color',
			'video_overlay_color',
			'video_icon',
			/* Filters options fields */
			'show_filters',
			'ajax_filters',
			'use_custom_terms_filters',
			'filter_layout',
			'filter_children_terms',
			'multifilter',
			'multifilter_relation',
			'multilevel',
			'multilevel_relation',
			'multilevel_tax_data',
			'multilevel_hierarchy',
			'multilevel_hierarchy_tax',
			'filter_taxonomies',
			'filter_terms',
			'default_filter',
			'hide_all',
			'all_text',
			'filters_sort',
			'filters_custom',
			'filters_order',
			/* Date Filters */
			's_df',
			'df_col',
			's_df_y',
			's_df_m',
			/* Search fields */
			'show_search',
			'search_position',
			'orderby_search',
			'relevanssi',
			/* Pagination fields */
			'show_pagination',
			'pagination_type',
			'ajax_load_more_text',
			'next_icon',
			'next_text',
			'previous_icon',
			'previous_text',
			'pagination_pages',
			/* Sorting options fields */
			'show_sort',
			/* Layout options fields */
			'items_layout',
			'items_skin',
			'primary_view',
			'secondary_view',
			'items_width',
			'thumb_width',
			/* Popup Field */
			'popup_template',
			'popup_link_target',
			'popup_code',
			/* Cache */
			'cache_on_page',
			/* Background Fields */
			'bg_items',
			/* Font Fields */
			'dpdfg_entry_title_level',
			/* Extra */
			'the_ID',
			'the_author',
			'conditional_tags',
			'query_var',
			'admin_label',
			'module_id',
			'module_class',
			'seed',
			'query_context',
			'custom_data'
		) );

		return array_intersect_key( $props, array_flip( $data_module_important_keys ) );
	}

	public function et_global_assets_list( $assets_list ) {
		$assets_prefix = et_get_dynamic_assets_path();
		if ( ! ( isset( $assets['et_icons_all'] ) && isset( $assets['et_icons_fa'] ) ) ) {
			$assets_list['et_icons_all'] = array(
				'css' => "$assets_prefix/css/icons_all.css",
			);
			$assets_list['et_icons_fa']  = array(
				'css' => "$assets_prefix/css/icons_fa_all.css",
			);
		}
		if ( ! isset( $assets['et_jquery_magnific_popup'] ) ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "$assets_prefix/css/magnific_popup.css"
			);
		}

		return $assets_list;
	}

	public function set_button_alignment( $props, $button_name, $selector, $render_slug ) {
		if ( 'off' === $props[ 'custom_' . $button_name ] ) {
			$responsive_active = et_pb_responsive_options()->is_responsive_enabled( $this->props, $button_name . '_alignment' );
			$responsive_values = array(
				'desktop' => $props[ $button_name . '_alignment' ],
				'tablet'  => $responsive_active ? $props[ $button_name . '_alignment_tablet' ] : '',
				'phone'   => $responsive_active ? $props[ $button_name . '_alignment_phone' ] : '',
			);
			et_pb_responsive_options()->generate_responsive_css( $responsive_values, '%%order_class%% ' . $selector, 'text-align', $render_slug, '', '' );
		}
	}

}

new DpDiviFilterGrid();
