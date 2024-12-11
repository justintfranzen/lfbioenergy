<?php

class DSM_Filterable_Gallery extends ET_Builder_Module {


	public $slug          = 'dsm_filterable_gallery';
	public $vb_support    = 'on';
	private $module_props = array();
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Filterable Gallery', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content'  => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_element'   => esc_html__( 'Elements', 'dsm-supreme-modules-pro-for-divi' ),
					'configuration' => esc_html__( 'Configuration', 'dsm-supreme-modules-pro-for-divi' ),
					'pagination'    => esc_html__( 'Pagination', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),

			'advanced'   => array(
				'toggles' => array(
					'dsm_title_panel'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_caption_panel'         => esc_html__( 'Caption', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_description_panel'     => esc_html__( 'Description', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_card_panel'            => esc_html__( 'Card', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_image_panel'           => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_content_wrapper_panel' => esc_html__( 'Content Wrapper', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_overlay_panel'         => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_category_panel'        => esc_html__( 'Category Tab', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_pagination_panel'      => esc_html__( 'Pagination', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_load_more_panel'       => esc_html__( 'Load More', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),

			'custom_css' => array(
				'toggles' => array(
					'animation'  => array(
						'title'    => esc_html__( 'Animation', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 90,
					),
					'attributes' => array(
						'title'    => esc_html__( 'Attributes', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 95,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header'          => array(
					'label'        => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper .dsm-title',
					),

					'header_level' => array(
						'default' => 'h4',
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_title_panel',
				),

				'dsm_caption'     => array(
					'label'          => esc_html__( 'Caption', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper .dsm-caption',
					),

					'font_size'      => array(
						'default' => '14px',
					),

					'line_height'    => array(
						'default' => '1.7em',
					),

					'letter_spacing' => array(
						'default' => '0px',
					),

					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'dsm_caption_panel',
				),

				'dsm_description' => array(
					'label'          => esc_html__( 'Description', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper .dsm-description',
					),

					'font_size'      => array(
						'default' => '14px',
					),

					'line_height'    => array(
						'default' => '1.7em',
					),

					'letter_spacing' => array(
						'default' => '0px',
					),

					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'dsm_description_panel',
				),

				'dsm_category'    => array(
					'label'           => esc_html__( 'Category', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-filter-item',
					),

					'font_size'       => array(
						'default' => '14px',
					),

					'line_height'     => array(
						'default' => '1.7em',
					),

					'letter_spacing'  => array(
						'default' => '0px',
					),

					'hide_text_color' => true,

					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_category_panel',
				),

				'dsm_pagination'  => array(
					'label'           => esc_html__( 'Pagination', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					),

					'font_size'       => array(
						'default' => '14px',
					),

					'line_height'     => array(
						'default' => '1.7em',
					),

					'letter_spacing'  => array(
						'default' => '0px',
					),

					'hide_text_color' => true,

					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_pagination_panel',
				),

				'dsm_load_more'   => array(
					'label'          => esc_html__( 'Load More', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-gallery-loadmore-container span',
					),

					'font_size'      => array(
						'default' => '14px',
					),

					'line_height'    => array(
						'default' => '1.7em',
					),

					'letter_spacing' => array(
						'default' => '0px',
					),

					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'dsm_load_more_panel',
				),
			),

			'box_shadow'     => array(
				'default'                      => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),

				'dsm_card_shadow'              => array(
					'label'           => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_card_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-filterable-gallery-item .dsm-filterable-gallery-inner-item',
					),
				),

				'dsm_content_wrapper_shadow'   => array(
					'label'           => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_content_wrapper_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
					),
				),

				'dsm_image_shadow'             => array(
					'label'           => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_image_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
					),
				),

				'dsm_category_shadow'          => array(
					'label'           => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_category_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					),
				),

				'dsm_category_active_shadow'   => array(
					'label'           => esc_html__( 'Active Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_category_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
					),
				),

				'dsm_pagination_shadow'        => array(
					'label'           => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_pagination_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					),
				),

				'dsm_pagination_active_shadow' => array(
					'label'           => esc_html__( 'Active Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_pagination_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
					),
				),

				'dsm_load_more_shadow'         => array(
					'label'           => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_load_more_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-gallery-loadmore-container span',
					),
				),
			),

			'borders'        => array(
				'default'                      => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),

				'dsm_card_border'              => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-filterable-gallery-item .dsm-filterable-gallery-inner-item',
							'border_styles' => '%%order_class%% .dsm-filterable-gallery-item .dsm-filterable-gallery-inner-item',
						),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_card_panel',
				),

				'dsm_image_border'             => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
							'border_styles' => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
						),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_image_panel',
				),

				'dsm_content_wrapper_border'   => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
							'border_styles' => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
						),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content_wrapper_panel',
				),

				'dsm_category_border'          => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
							'border_styles' => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
						),
					),
					'label_prefix' => esc_html__( 'Category', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_category_panel',
				),

				'dsm_category_active_border'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
							'border_styles' => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
						),
					),
					'label_prefix' => esc_html__( 'Active Category', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_category_panel',
				),

				'dsm_pagination_border'        => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
							'border_styles' => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Pagination', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_pagination_panel',
				),

				'dsm_pagination_border_active' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
							'border_styles' => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Active Pagination', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_pagination_panel',
				),

				'dsm_load_more_border'         => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-gallery-loadmore-container span',
							'border_styles' => '%%order_class%% .dsm-gallery-loadmore-container span',
						),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_load_more_panel',
				),
			),

			'margin_padding' => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),

			'background'     => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),

			'text'           => false,
		);
	}

	public function get_fields() {
		return array(
			'dsm_use_dynamic_images'           => array(
				'label'           => esc_html__( 'Use Dynamic Images', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Enabling this option will give you the list of categories that you can select to show the images of only the selected categories.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'gallery_ids'                      => array(
				'label'           => esc_html__( 'Images', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'upload-gallery',
				'option_category' => 'basic_option',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'You can also manually upload your images here as many as you want. The main advantage of this is that you can rearrange the images however you like simply with drag & drop.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_use_dynamic_images' => 'off',
				),
			),

			'dsm_include_categories'           => array(
				'label'            => esc_html__( 'Select Categories', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'categories',
				'option_category'  => 'basic_option',
				'renderer_options' => array(
					'use_terms' => true,
					'term_name' => 'dsm-attachment-category',
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'description'      => esc_html__( 'Here you can choose which category images you would like to display. If you want to display all categories images, then leave it unchecked.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'          => array(
					'dsm_use_dynamic_images' => 'on',
				),
			),

			'dsm_number_of_columns'            => array(
				'label'           => esc_html__( 'Number of Columns', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => '3',
				'mobile_options'  => true,
				'responsive'      => true,
				'options'         => array(
					'1' => esc_html__( '1', 'dsm-supreme-modules-pro-for-divi' ),
					'2' => esc_html__( '2', 'dsm-supreme-modules-pro-for-divi' ),
					'3' => esc_html__( '3', 'dsm-supreme-modules-pro-for-divi' ),
					'4' => esc_html__( '4', 'dsm-supreme-modules-pro-for-divi' ),
					'5' => esc_html__( '5', 'dsm-supreme-modules-pro-for-divi' ),
					'6' => esc_html__( '6', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the Number of Columns for Images.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_image_sizes'                  => array(
				'label'           => esc_html__( 'Image Sizes', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'medium',
				'options'         => $this->get_image_sizes(),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'You can change the Image Size from here from different presets.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_column_gap'                   => array(
				'label'           => esc_html__( 'Column Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '10px',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
				'description'     => esc_html__( 'Here you can increase/decrease the Column gap between images.', 'dsm-supreme-modules-pro-for-divi' ),

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),

			'dsm_row_gap'                      => array(
				'label'           => esc_html__( 'Row Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '10px',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
				'description'     => esc_html__( 'Here you can increase/decrease the Row gap between images.', 'dsm-supreme-modules-pro-for-divi' ),

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),

			'dsm_custom_row_height'            => array(
				'label'           => esc_html__( 'Custom Row Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Enabling this option will allow you to have a custom row height. This is useful if you want to show even row height.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_row_height'                   => array(
				'label'           => esc_html__( 'Row Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '180px',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
				'description'     => esc_html__( 'Here you can change the Height of the Row.', 'dsm-supreme-modules-pro-for-divi' ),
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '500',
					'step' => '1',
				),
				'show_if'         => array(
					'dsm_custom_row_height' => 'on',
				),
			),

			'dsm_speed'                        => array(
				'label'           => esc_html__( 'Speed', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '250',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'unit_less'       => true,
				'description'     => esc_html__( 'Here you can control the Speed when Filtering Images.', 'dsm-supreme-modules-pro-for-divi' ),

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '5000',
					'step' => '1',
				),
			),

			'dsm_layout'                       => array(
				'label'           => esc_html__( 'Layout', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'card',
				'options'         => array(
					'card'    => esc_html__( 'Card', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay' => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can select the Layout, either "Card" or "Overlay"', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_auto_height'                  => array(
				'label'           => esc_html__( 'Auto Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Enabling this option will give you the list of categories that you can select to show the images of only the selected categories.', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_layout' => 'overlay',
				),
			),
			'dsm_image_height'                 => array(
				'label'           => esc_html__( 'Image Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '300px',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
				'description'     => esc_html__( 'Here you can change the Height of the Image manually.', 'dsm-supreme-modules-pro-for-divi' ),

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '500',
					'step' => '1',
				),
				'show_if'         => array(
					'dsm_layout'      => 'overlay',
					'dsm_auto_height' => 'off',
				),
			),

			'dsm_hover_style'                  => array(
				'label'           => esc_html__( 'Hover Style', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => '',
				'options'         => array(
					'none'    => esc_html__( 'None', 'dsm-supreme-modules-pro-for-divi' ),
					'fade_in' => esc_html__( 'Fade In', 'dsm-supreme-modules-pro-for-divi' ),
					'zoom_in' => esc_html__( 'Zoom In', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Change the Hover style here, you can select "Fade In" or "Zoom" or "None"', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_layout' => 'overlay',
				),
			),

			'dsm_hover_transition'             => array(
				'label'           => esc_html__( 'Hover Transition', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '500ms',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'default_unit'    => 'ms',
				'description'     => esc_html__( 'Change the Transition period of the Hover Effect here.', 'dsm-supreme-modules-pro-for-divi' ),

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '4000',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_layout' => 'overlay',
				),
			),

			'dsm_show_filterable_gallery'      => array(
				'label'           => esc_html__( 'Enable Filterable Gallery', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'on',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( 'Enable/Disable If you want to have Filters at the top.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_sortby'                       => array(
				'label'           => esc_html__( 'Sortby', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'asc',
				'options'         => array(
					'asc'  => esc_html__( 'Ascending Order', 'dsm-supreme-modules-pro-for-divi' ),
					'desc' => esc_html__( 'Descending Order', 'dsm-supreme-modules-pro-for-divi' ),
					'rand' => esc_html__( 'Random Order', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'show_if'         => array(
					'dsm_show_filterable_gallery' => 'on',
				),
			),

			'dsm_show_all_images_text'         => array(
				'label'           => esc_html__( 'Show All Images Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'on',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( 'If you want to show the "All" tab, where all the images will be displayed, you can enable this option.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_show_filterable_gallery' => 'on',
				),
			),

			'dsm_filterable_gallery_all_text'  => array(
				'label'            => esc_html__( 'All Images Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'default'          => 'All',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'You can also set a custom Text for "All" tab.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'dsm_element',
				'show_if'          => array(
					'dsm_show_filterable_gallery' => 'on',
					'dsm_show_all_images_text'    => 'on',
				),
			),

			'dsm_show_title'                   => array(
				'label'           => esc_html__( 'Show Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( "Enable this option If you'd like to show Image Title in the Gallery, you can assign this Title in the Media Library for each image.", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_show_caption'                 => array(
				'label'           => esc_html__( 'Show Caption', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( "Enable this option If you'd like to show Image Caption in the Gallery, you can assign this Caption in the Media Library for each image.", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_show_description'             => array(
				'label'           => esc_html__( 'Show Description', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( "Enable this option If you'd like to show Image Description in the Gallery, you can assign this Description in the Media Library for each image.", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_use_lightbox'                 => array(
				'label'           => esc_html__( 'Use Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( "You can enable this option If you'd like to show Gallery images in the Lightbox.", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_show_title_lightbox'          => array(
				'label'           => esc_html__( 'Show Title lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( "You can enable this option If you'd like to show Gallery images in the Lightbox.", 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_use_lightbox' => 'on',
				),
			),

			'dsm_show_description_lightbox'    => array(
				'label'           => esc_html__( 'Show Description Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_use_lightbox' => 'on',
				),
			),

			'dsm_show_caption_lightbox'        => array(
				'label'           => esc_html__( 'Show Caption Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( "You can enable this option If you'd like to show Gallery images in the Lightbox.", 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_use_lightbox' => 'on',
				),

			),

			'dsm_show_pagination'              => array(
				'label'           => esc_html__( 'Show Pagination', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( "If you got many images and want to pagination so the user won't have to scroll much, you can enable this option. You can change the Type of Pagination in the 'Pagination' panel.", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_use_zoom_on_hover'            => array(
				'label'           => esc_html__( 'Use Zoom On Hover', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_element',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_pagination_type'              => array(
				'label'           => esc_html__( 'Pagination Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'load_more',
				'options'         => array(
					'load_more' => esc_html__( 'Load More Button', 'dsm-supreme-modules-pro-for-divi' ),
					'number'    => esc_html__( 'Numbered Pagination', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'pagination',
				'description'     => esc_html__( 'Here you can change the Pagination type to either "Load More" button or "Numbered Pagination".', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_show_pagination' => 'on',
				),
			),

			'dsm_load_more_text'               => array(
				'label'            => esc_html__( 'Load More Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'default'          => 'Load More',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'You can set a custom Text for "Load More".', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'pagination',
				'show_if'          => array(
					'dsm_show_pagination' => 'on',
					'dsm_pagination_type' => 'load_more',
				),
			),

			'dsm_pagination_prev_text'         => array(
				'label'            => esc_html__( 'Prev Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'default'          => 'Prev',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'You can set a custom Text for "Prev".', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'pagination',
				'show_if'          => array(
					'dsm_show_pagination' => 'on',
					'dsm_pagination_type' => 'number',
				),
			),

			'dsm_pagination_next_text'         => array(
				'label'            => esc_html__( 'Next Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'default'          => 'Next',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'You can set a custom Text for "Next".', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'pagination',
				'show_if'          => array(
					'dsm_show_pagination' => 'on',
					'dsm_pagination_type' => 'number',
				),
			),

			'dsm_tidy_up_pagination'           => array(
				'label'           => esc_html__( 'Tidy Up Pagination', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'pagination',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_show_pagination' => 'on',
					'dsm_pagination_type' => 'number',
				),
			),

			'dsm_query_order'                  => array(
				'label'           => esc_html__( 'Order', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'ASC',
				'options'         => array(
					'ASC' => esc_html__( 'Ascending', 'dsm-supreme-modules-pro-for-divi' ),
					'DSC' => esc_html__( 'Descending', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'configuration',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_use_dynamic_images' => 'on',
				),
			),

			'dsm_total_number_images'          => array(
				'label'           => esc_html__( 'Number of Images', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '10',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'configuration',
				'unit_less'       => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '10000',
					'step' => '1',
				),
				'show_if'         => array(
					'dsm_use_dynamic_images' => 'on',
				),
			),

			'dsm_per_page'                     => array(
				'label'           => esc_html__( 'Images Per Page', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '10',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'configuration',
				'unit_less'       => true,
				'description'     => esc_html__( "Here you can set how many images you'd like to show per page.", 'dsm-supreme-modules-pro-for-divi' ),
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'         => array(
					'dsm_show_pagination' => 'on',
				),
			),

			'dsm_overlay_color'                => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => 'rgba(0,0,0,0.5)',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_overlay_panel',
				'description'    => esc_html__( "Here you can change the Background Color of the Overlay that shows on hover when using 'Overlay' type.", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_overlay_padding'              => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '15px|15px|15px|15px',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_overlay_panel',
				'description'     => esc_html__( 'Here you can add Padding to the Overlay.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_category_alignment'           => array(
				'label'           => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'multiple_buttons',
				'options'         => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					),

					'right'  => array(
						'title' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
					),
				),
				'default'         => 'center',
				'toggleable'      => true,
				'multi_selection' => false,
				'mobile_options'  => true,
				'responsive'      => true,
				'description'     => esc_html__( 'Here you can change the Alignment of the Category Tabs.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_category_panel',
			),

			'dsm_category_inactive_bg_color'   => array(
				'label'          => esc_html__( 'Inactive Bg Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#f4f4f4',
				'mobile_options' => true,
				'responsive'     => true,
				'hover'          => 'tabs',
				'tab_slug'       => 'advanced',
				'description'    => esc_html__( "Here you can change the Background color for Tabs for 'normal' state.", 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'dsm_category_panel',
			),

			'dsm_category_active_bg_color'     => array(
				'label'          => esc_html__( 'Active Bg Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#444444',
				'mobile_options' => true,
				'responsive'     => true,
				'hover'          => 'tabs',
				'tab_slug'       => 'advanced',
				'description'    => esc_html__( "Here you can change the Background color for Tabs for 'Active' state.", 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'dsm_category_panel',
			),

			'dsm_category_inactive_color'      => array(
				'label'          => esc_html__( 'InActive Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#000000',
				'mobile_options' => true,
				'responsive'     => true,
				'hover'          => 'tabs',
				'tab_slug'       => 'advanced',
				'description'    => esc_html__( 'Here you can change the Text color for Tabs for normal state.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'dsm_category_panel',
			),

			'dsm_category_active_color'        => array(
				'label'          => esc_html__( 'Active Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#ffffff',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'hover'          => 'tabs',
				'description'    => esc_html__( 'Here you can change the Text color for Tabs for normal state.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'dsm_category_panel',
			),

			'dsm_category_margin'              => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Margin to the Category Tabs.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_category_panel',
			),

			'dsm_category_padding'             => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '5px|15px|5px|15px',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Padding to the Category Tabs.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_category_panel',
			),

			'dsm_pagination_inactive_bg_color' => array(
				'label'          => esc_html__( 'InActive Bg Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#dddddd',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'hover'          => 'tabs',
				'description'    => esc_html__( "Here you can change the Background color for Pagination for 'normal' state.", 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'dsm_pagination_panel',
			),

			'dsm_pagination_active_bg_color'   => array(
				'label'          => esc_html__( 'active Bg Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#f4f4f4',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'hover'          => 'tabs',
				'description'    => esc_html__( "Here you can change the Background color for Pagination for 'Active' state.", 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'dsm_pagination_panel',
			),

			'dsm_pagination_inactive_color'    => array(
				'label'          => esc_html__( 'Inactive Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'hover'          => 'tabs',
				'description'    => esc_html__( 'Here you can change the Text color for Pagination for normal state.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'dsm_pagination_panel',
			),

			'dsm_pagination_active_color'      => array(
				'label'          => esc_html__( 'Active Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'hover'          => 'tabs',
				'description'    => esc_html__( 'Here you can change the Text color for Pagination for normal state.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'dsm_pagination_panel',
			),

			'dsm_pagination_margin'            => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Margin to the Pagination.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_pagination_panel',
			),

			'dsm_pagination_padding'           => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '5px|15px|5px|15px',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Padding to the Pagination.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_pagination_panel',
			),

			'dsm_pagination_alignment'         => array(
				'label'           => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'multiple_buttons',
				'options'         => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					),

					'right'  => array(
						'title' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
					),
				),
				'default'         => 'center',
				'toggleable'      => true,
				'multi_selection' => false,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can change the Alignment of the Pagination.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_pagination_panel',
			),

			'dsm_load_more_bg_color'           => array(
				'label'          => esc_html__( 'Bg Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#dddddd',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'hover'          => 'tabs',
				'description'    => esc_html__( 'Change the Background color of the Load more button here.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'dsm_load_more_panel',
			),

			'dsm_load_more_margin'             => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Margin to the Load More button.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_load_more_panel',
			),

			'dsm_load_more_padding'            => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '5px|15px|5px|15px',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Padding to the Load More button.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_load_more_panel',
			),

			'dsm_loadmore_alignment'           => array(
				'label'           => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'multiple_buttons',
				'options'         => array(
					'left'   => array(
						'title' => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					),

					'right'  => array(
						'title' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
					),
				),
				'default'         => 'center',
				'toggleable'      => true,
				'multi_selection' => false,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_load_more_panel',
			),

			'dsm_card_bg_color'                => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#f4f4f4',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_card_panel',
				'description'    => esc_html__( 'Here you can change the Background color of the Card.', 'dsm-supreme-modules-pro-for-divi' ),
				'hover'          => 'tabs',
			),

			'dsm_card_padding'                 => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add padding to the Card.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_card_panel',
			),

			'dsm_content_wrapper_margin'       => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Margin to the Content Wrapper.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_content_wrapper_panel',
			),

			'dsm_content_wrapper_padding'      => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Padding to the Content Wrapper', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_content_wrapper_panel',
			),

			'dsm_image_wrapper_margin'         => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Margin to the Image', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_image_panel',
			),

			'dsm_image_wrapper_padding'        => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'description'     => esc_html__( 'Here you can add Padding to the Image.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_image_panel',
			),
		);
	}

	/**
	 * Get attachment data for gallery module
	 *
	 * @param array $args {
	 *     Gallery Options
	 *
	 *     @type array  $gallery_ids     Attachment Ids of images to be included in gallery.
	 *     @type string $gallery_orderby `orderby` arg for query. Optional.
	 *     @type string $fullwidth       on|off to determine grid / slider layout
	 *     @type string $orientation     Orientation of thumbnails (landscape|portrait).
	 * }
	 * @param array $conditional_tags
	 * @param array $current_page
	 *
	 * @return array Attachments data
	 */
	static function get_gallery( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		$attachments = array();

		$defaults = array(
			'gallery_ids'        => array(),
			'gallery_orderby'    => '',
			'include_categories' => '',
			'posts_per_page'     => 10,
			'order'              => 'ASC',
			'dsm_sortby'         => '',

		);

		$args = wp_parse_args( $args, $defaults );

		// For Pagination.
		$current_page = 0;
		$per_page     = (int) $args['posts_per_page'];
		$offset       = $current_page * $per_page;

		$attachments_args = array(
			'include'        => $args['gallery_ids'],
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => $args['order'],
			'orderby'        => 'post__in',
			'numberposts'    => isset( $args['max'] ) ? $args['max'] : -1,
			'dsm_sortby'     => $args['dsm_sortby'],
		);

		if ( $args['use_dynamic'] ) {
			// Unsetting selected images.
			unset( $attachments_args['orderby'] );
			unset( $attachments_args['include'] );

			$cat_ids_as_int = array_map(
				function ( $cat ) {
					return (int) $cat;
				},
				explode( ',', $args['categories'] )
			);

			$attachments_args['tax_query'] = array(
				array(
					'taxonomy' => 'dsm-attachment-category',
					'field'    => 'term_id',
					'terms'    => $cat_ids_as_int,
				),
			);
		}

		if ( 'rand' === $args['gallery_orderby'] ) {
			$attachments_args['orderby'] = 'rand';
		}

		$_attachments = get_posts( $attachments_args );

		foreach ( $_attachments as $key => $val ) {
			$attachments[ $key ]                 = $_attachments[ $key ];
			$attachments[ $key ]->image_src_full = wp_get_attachment_image_src( $val->ID, 'full' );
			$attachments[ $key ]->description    = $val->post_content;
		}

		return array_chunk( $attachments, $per_page );
	}

	/**
	 * Wrapper for ET_Builder_Module_Gallery::get_gallery() which is intended to be extended by
	 * module which uses gallery module renderer so relevant argument for other module can be added
	 *
	 * @since 3.29
	 * @see ET_Builder_Module_Gallery::get_gallery()
	 * @param array $args {
	 *     Gallery Options
	 *
	 *     @type array  $gallery_ids     Attachment Ids of images to be included in gallery.
	 *     @type string $gallery_orderby `orderby` arg for query. Optional.
	 *     @type string $fullwidth       on|off to determine grid / slider layout
	 *     @type string $orientation     Orientation of thumbnails (landscape|portrait).
	 * }
	 *
	 * @return array
	 */
	public function get_attachments( $args = array() ) {
		return self::get_gallery( $args );
	}

	/**
	 * Obtains unique categories for the current images.
	 *
	 * @param int[] $image_ids - Array of image ids.
	 *
	 * @return array
	 */
	public function get_categories( $image_ids ) {
		$attachment_categories = array();

		foreach ( $image_ids as $image_id ) {
			$categories = get_the_terms( $image_id, 'dsm-attachment-category' );
			if ( $categories && ! is_wp_error( $categories ) && ! empty( $categories ) ) {
				foreach ( $categories as $category ) {
					$attachment_categories[ $category->slug ] = sprintf(
						/* translators: %1$s: category */
						esc_html__( '%1$s', 'dsm-supreme-modules-pro-for-divi' ),
						$category->name
					);
				}
			}
		}

		return $attachment_categories;
	}

	/**
	 * Obtains categories from ids.
	 *
	 * @return array
	 */
	public function get_categories_from_ids( $category_ids ) {
		$categories = array();

		foreach ( $category_ids as $cat_id ) {
			$term = get_term( $cat_id );

			$categories[] = $term->name;
		}

		return $categories;
	}

	/**
	 * Obtains necessary markup for loadmore pagination.
	 *
	 * @return string - Markup.
	 */
	public function get_loadmore_pagination() {
		$dsm_load_more_text = esc_html( $this->props['dsm_load_more_text'] );
		$markup             = '
			<div class="dsm-gallery-loadmore-container">
				<span>' . $dsm_load_more_text . '</span>
			</div>
		';

		return $markup;
	}


	/**
	 * Obtains all the image sizes available.
	 *
	 * @return array
	 */
	public function get_image_sizes() {
		$sizes_options   = array();
		$available_sizes = get_intermediate_image_sizes();
		$subsizes        = wp_get_registered_image_subsizes();

		foreach ( $available_sizes as $available_size ) {
			$subsize   = isset( $subsizes[ $available_size ] ) ? $subsizes[ $available_size ] : null;
			$size_name = $available_size;

			// Normalizing case.
			$size_name = str_replace( '-', ' ', $size_name );
			$size_name = str_replace( '_', ' ', $size_name );
			$size_name = ucfirst( $size_name );

			if ( ! is_null( $subsize ) ) {
				$size_name = sprintf( '%1$s (W: %2$s x H: %3$s, %4$s)', $size_name, $subsize['width'], $subsize['height'], $subsize['crop'] ? 'Cropped' : 'Not Cropped' );
			}

			$sizes_options[ $available_size ] = $size_name;
		}

		return $sizes_options;
	}

	/**
	 * Obtains necessary markup for number pagination.
	 *
	 * @param array $attachments - Attachments to create pagination for.
	 *
	 * @return string - Markup.
	 */
	public function get_number_pagination( $attachments ) {

		$total_pages            = count( $attachments );
		$has_next_prev_links    = true;
		$dsm_tidy_up_pagination = $this->props['dsm_tidy_up_pagination'];

		$markup = '';

		for ( $page = 0; $page < $total_pages; $page++ ) {
			$normalized_page_index = $page + 1;
			$markup               .= sprintf( '<span class="dsm-gallery-number-pagination" data-pagination="%1$s">%1$s</span>', $normalized_page_index );
		}

		if ( $has_next_prev_links ) {
			$multi_view = et_pb_multi_view_options( $this );

			$prev_text = $multi_view->render_element(
				array(
					'content' => '{{dsm_pagination_prev_text}}',
				)
			);
			$next_text = $multi_view->render_element(
				array(
					'content' => '{{dsm_pagination_next_text}}',
				)
			);
			$markup    = '<span class="dsm-gallery-number-pagination" data-pagination="prev">' . wp_strip_all_tags( $prev_text ) . '</span>' . $markup;
			$markup   .= '<span class="dsm-gallery-number-pagination" data-pagination="next">' . wp_strip_all_tags( $next_text ) . '</span>';
		}

		return sprintf( '<div class="dsm-gallery-number-pagination-container" data-pagination-prev-text="%2$s" data-pagination-next-text="%3$s" data-tidy-pagination="%4$s">%1$s</div>', $markup, wp_strip_all_tags( $prev_text ), wp_strip_all_tags( $next_text ), $dsm_tidy_up_pagination );
	}

	public function render( $attrs, $content, $render_slug ) {

		$multi_view  = et_pb_multi_view_options( $this );
		$gallery_ids = $this->props['gallery_ids'];

		$dsm_number_of_columns                   = $this->props['dsm_number_of_columns'];
		$dsm_number_of_columns_tablet            = $this->props['dsm_number_of_columns_tablet'];
		$dsm_number_of_columns_phone             = $this->props['dsm_number_of_columns_phone'];
		$dsm_number_of_columns_last_edited       = $this->props['dsm_number_of_columns_last_edited'];
		$dsm_number_of_columns_responsive_active = et_pb_get_responsive_status( $dsm_number_of_columns_last_edited );

		$dsm_column_gap                   = $this->props['dsm_column_gap'];
		$dsm_column_gap_tablet            = $this->props['dsm_column_gap_tablet'];
		$dsm_column_gap_phone             = $this->props['dsm_column_gap_phone'];
		$dsm_column_gap_last_edited       = $this->props['dsm_column_gap_last_edited'];
		$dsm_column_gap_responsive_active = et_pb_get_responsive_status( $dsm_column_gap_last_edited );

		$check_columns_gap_tablet = $dsm_column_gap_tablet ? $dsm_column_gap_tablet : $dsm_column_gap;
		$check_columns_gap_phone  = $dsm_column_gap_phone ? $dsm_column_gap_phone : $dsm_column_gap_tablet;

		$dsm_row_gap_last_edited       = $this->props['dsm_row_gap_last_edited'];
		$dsm_row_gap_responsive_active = et_pb_get_responsive_status( $dsm_row_gap_last_edited );

		$dsm_row_height_last_edited       = $this->props['dsm_row_height_last_edited'];
		$dsm_row_height_responsive_active = et_pb_get_responsive_status( $dsm_row_height_last_edited );

		$dsm_image_height_last_edited        = $this->props['dsm_image_height_last_edited'];
		$dsm_image_height_responsive_active  = et_pb_get_responsive_status( $dsm_image_height_last_edited );
		$dsm_overlay_color_last_edited       = $this->props['dsm_overlay_color_last_edited'];
		$dsm_overlay_color_responsive_active = et_pb_get_responsive_status( $dsm_overlay_color_last_edited );

		$dsm_overlay_padding_last_edited       = $this->props['dsm_overlay_padding_last_edited'];
		$dsm_overlay_padding_responsive_active = et_pb_get_responsive_status( $dsm_overlay_padding_last_edited );

		$dsm_category_inactive_bg_color_last_edited       = $this->props['dsm_category_inactive_bg_color_last_edited'];
		$dsm_category_inactive_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_category_inactive_bg_color_last_edited );

		$dsm_category_active_bg_color_last_edited       = $this->props['dsm_category_active_bg_color_last_edited'];
		$dsm_category_active_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_category_active_bg_color_last_edited );

		$dsm_category_inactive_color_last_edited       = $this->props['dsm_category_inactive_color_last_edited'];
		$dsm_category_inactive_color_responsive_active = et_pb_get_responsive_status( $dsm_category_inactive_color_last_edited );

		$dsm_category_active_color_last_edited       = $this->props['dsm_category_active_color_last_edited'];
		$dsm_category_active_color_responsive_active = et_pb_get_responsive_status( $dsm_category_active_color_last_edited );

		$dsm_category_margin_last_edited       = $this->props['dsm_category_margin_last_edited'];
		$dsm_category_margin_responsive_active = et_pb_get_responsive_status( $dsm_category_margin_last_edited );

		$dsm_category_padding_last_edited       = $this->props['dsm_category_padding_last_edited'];
		$dsm_category_padding_responsive_active = et_pb_get_responsive_status( $dsm_category_padding_last_edited );

		$dsm_category_padding_last_edited       = $this->props['dsm_category_padding_last_edited'];
		$dsm_category_padding_responsive_active = et_pb_get_responsive_status( $dsm_category_padding_last_edited );

		$dsm_pagination_inactive_bg_color_last_edited       = $this->props['dsm_pagination_inactive_bg_color_last_edited'];
		$dsm_pagination_inactive_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_pagination_inactive_bg_color_last_edited );

		$dsm_pagination_active_bg_color_last_edited       = $this->props['dsm_pagination_active_bg_color_last_edited'];
		$dsm_pagination_active_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_pagination_active_bg_color_last_edited );

		$dsm_pagination_active_color_last_edited       = $this->props['dsm_pagination_active_color_last_edited'];
		$dsm_pagination_active_color_responsive_active = et_pb_get_responsive_status( $dsm_pagination_active_color_last_edited );

		$dsm_pagination_inactive_color_last_edited       = $this->props['dsm_pagination_inactive_color_last_edited'];
		$dsm_pagination_inactive_color_responsive_active = et_pb_get_responsive_status( $dsm_pagination_inactive_color_last_edited );

		$dsm_pagination_margin_last_edited       = $this->props['dsm_pagination_margin_last_edited'];
		$dsm_pagination_margin_responsive_active = et_pb_get_responsive_status( $dsm_pagination_margin_last_edited );

		$dsm_pagination_padding_last_edited       = $this->props['dsm_pagination_padding_last_edited'];
		$dsm_pagination_padding_responsive_active = et_pb_get_responsive_status( $dsm_pagination_padding_last_edited );

		$dsm_load_more_bg_color_last_edited       = $this->props['dsm_load_more_bg_color_last_edited'];
		$dsm_load_more_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_load_more_bg_color_last_edited );

		$dsm_load_more_margin_last_edited       = $this->props['dsm_load_more_margin_last_edited'];
		$dsm_load_more_margin_responsive_active = et_pb_get_responsive_status( $dsm_load_more_margin_last_edited );

		$dsm_load_more_padding_last_edited       = $this->props['dsm_load_more_padding_last_edited'];
		$dsm_load_more_padding_responsive_active = et_pb_get_responsive_status( $dsm_load_more_padding_last_edited );

		$dsm_card_bg_color_last_edited       = $this->props['dsm_card_bg_color_last_edited'];
		$dsm_card_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_card_bg_color_last_edited );

		$dsm_card_padding_last_edited       = $this->props['dsm_card_padding_last_edited'];
		$dsm_card_padding_responsive_active = et_pb_get_responsive_status( $dsm_card_padding_last_edited );

		$dsm_content_wrapper_margin_last_edited       = $this->props['dsm_card_padding_last_edited'];
		$dsm_content_wrapper_margin_responsive_active = et_pb_get_responsive_status( $dsm_content_wrapper_margin_last_edited );

		$dsm_content_wrapper_padding_last_edited       = $this->props['dsm_content_wrapper_padding_last_edited'];
		$dsm_content_wrapper_padding_responsive_active = et_pb_get_responsive_status( $dsm_content_wrapper_padding_last_edited );

		$dsm_image_wrapper_margin_last_edited       = $this->props['dsm_image_wrapper_margin_last_edited'];
		$dsm_image_wrapper_margin_responsive_active = et_pb_get_responsive_status( $dsm_image_wrapper_margin_last_edited );

		$dsm_image_wrapper_padding_last_edited       = $this->props['dsm_image_wrapper_padding_last_edited'];
		$dsm_image_wrapper_padding_responsive_active = et_pb_get_responsive_status( $dsm_image_wrapper_padding_last_edited );

		$dsm_category_alignment_last_edited       = $this->props['dsm_category_alignment_last_edited'];
		$dsm_category_alignment_responsive_active = et_pb_get_responsive_status( $dsm_category_alignment_last_edited );

		$dsm_card_bg_color_hover                = $this->get_hover_value( 'dsm_card_bg_color' );
		$dsm_load_more_bg_color_hover           = $this->get_hover_value( 'dsm_load_more_bg_color' );
		$dsm_pagination_inactive_bg_color_hover = $this->get_hover_value( 'dsm_pagination_inactive_bg_color' );
		$dsm_pagination_active_bg_color_hover   = $this->get_hover_value( 'dsm_pagination_active_bg_color' );
		$dsm_pagination_inactive_color_hover    = $this->get_hover_value( 'dsm_pagination_inactive_color' );
		$dsm_pagination_active_color_hover      = $this->get_hover_value( 'dsm_pagination_active_color' );
		$dsm_category_inactive_bg_color_hover   = $this->get_hover_value( 'dsm_category_inactive_bg_color' );
		$dsm_category_active_bg_color_hover     = $this->get_hover_value( 'dsm_category_active_bg_color' );
		$dsm_category_active_color_hover        = $this->get_hover_value( 'dsm_category_active_color' );
		$dsm_category_inactive_color_hover      = $this->get_hover_value( 'dsm_category_inactive_color' );

		wp_enqueue_script( 'dsm-magnific-popup' );
		wp_enqueue_script( 'dsm-shuffle' );
		wp_enqueue_script( 'dsm-filterable-gallery' );

		// Lightbox Hover Cursor.
		if ( $this->props['dsm_use_lightbox'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-item:hover',
					'declaration' => 'cursor: pointer;',
				)
			);
		}

		if ( $dsm_card_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-item:hover .dsm-filterable-gallery-inner-item',
					'declaration' => sprintf( 'background: %1$s;', $dsm_card_bg_color_hover ),
				)
			);
		}

		if ( $dsm_load_more_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span:hover',
					'declaration' => sprintf( 'background: %1$s !important;', $dsm_load_more_bg_color_hover ),
				)
			);
		}

		if ( $dsm_pagination_inactive_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination:hover',
					'declaration' => sprintf( 'background: %1$s !important;', $dsm_pagination_inactive_bg_color_hover ),
				)
			);
		}

		if ( $dsm_pagination_active_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item:hover',
					'declaration' => sprintf( 'background: %1$s !important;', $dsm_pagination_active_bg_color_hover ),
				)
			);
		}

		if ( $dsm_pagination_inactive_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination:hover',
					'declaration' => sprintf( 'color : %1$s !important;', $dsm_pagination_inactive_color_hover ),
				)
			);
		}

		if ( $dsm_pagination_active_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item:hover',
					'declaration' => sprintf( 'color : %1$s !important;', $dsm_pagination_active_color_hover ),
				)
			);
		}

		if ( $dsm_category_inactive_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => sprintf( 'color : %1$s !important;', $dsm_category_inactive_color_hover ),
				)
			);
		}

		if ( $dsm_category_active_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
					'declaration' => sprintf( 'color : %1$s !important;', $dsm_category_active_color_hover ),
				)
			);
		}

		if ( $dsm_category_active_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter:hover',
					'declaration' => sprintf( 'background : %1$s !important;', $dsm_category_active_bg_color_hover ),
				)
			);
		}

		if ( $dsm_category_inactive_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item:hover',
					'declaration' => sprintf( 'background : %1$s;', $dsm_category_inactive_bg_color_hover ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%%',
				'declaration' => 'overflow: hidden;',
			)
		);

		// card styling work.
		if ( $this->props['dsm_card_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-item .dsm-filterable-gallery-inner-item',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_card_bg_color'] ),
				)
			);
		}

		if ( $dsm_card_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-item .dsm-filterable-gallery-inner-item',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_card_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_card_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-item .dsm-filterable-gallery-inner-item',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_card_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'card' === $this->props['dsm_layout'] ) {

			$margin    = 'margin';
			$padding   = 'padding';
			$important = false;

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-item .dsm-filterable-gallery-inner-item',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_card_padding'], $padding, $important ),
				)
			);

			if ( $dsm_card_padding_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-item .dsm-filterable-gallery-inner-item',
						'declaration' => et_builder_get_element_style_css( $this->props['dsm_card_padding_tablet'], $padding, $important ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_card_padding_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-item .dsm-filterable-gallery-inner-item',
						'declaration' => et_builder_get_element_style_css( $this->props['dsm_card_padding_phone'], $padding, $important ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( $this->props['dsm_category_inactive_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_category_inactive_bg_color'] ),
				)
			);
		}

		if ( $dsm_category_inactive_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_category_inactive_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_category_inactive_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_category_inactive_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_category_active_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_category_active_bg_color'] ),
				)
			);
		}

		if ( $dsm_category_active_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_category_active_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_category_active_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_category_active_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_category_inactive_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_category_inactive_color'] ),
				)
			);
		}

		if ( $dsm_category_inactive_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_category_inactive_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_category_inactive_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_category_inactive_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_category_active_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_category_active_color'] ),
				)
			);
		}

		if ( $dsm_category_active_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_category_active_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_category_active_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_category_active_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_category_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_category_active_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item.dsm-active-filter',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_load_more_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_pagination_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_pagination_border_active'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_card_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-item',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_category_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_content_wrapper_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_image_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_custom_row_height'] ) {
			if ( $this->props['dsm_row_height'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
						'declaration' => sprintf( 'min-height: %1$s;', $this->props['dsm_row_height'] ),
					)
				);
			}

			if ( $dsm_row_height_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
						'declaration' => sprintf( 'min-height: %1$s;', $this->props['dsm_row_height_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_row_height_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
						'declaration' => sprintf( 'min-height: %1$s;', $this->props['dsm_row_height_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( 'overlay' === $this->props['dsm_layout'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper img',
					'declaration' => 'object-fit: cover; width: 100%;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
					'declaration' => 'line-height: 0em;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => 'position: relative;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
					'declaration' => 'position: absolute;
                                      left: 0;
                                      top: 0;
                                      height: 100%;
                                      width: 100%;
                                      z-index: 10;
    								  visibility: hidden;
                                      opacity: 0;
									  display: flex;
                                      flex-direction: column;
                                      justify-content: center;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item:hover .dsm-filterable-gallery-content-wrapper',
					'declaration' => 'visibility : visible;
                                      opacity: 1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item .dsm-filterable-gallery-image-wrapper::before',
					'declaration' => 'content: "";
                                      position:absolute;
									  top:0;
									  bottom:0;
									  left:0;
									  right:0;
									  width:100%;
									  height:100%;',
				)
			);

			if ( 'off' === $this->props['dsm_auto_height'] ) {

				if ( $this->props['dsm_image_height'] ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper img',
							'declaration' => sprintf( 'height: %1$s;', $this->props['dsm_image_height'] ),
						)
					);
				}

				if ( $dsm_image_height_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper img',
							'declaration' => sprintf( 'height: %1$s;', $this->props['dsm_image_height_tablet'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);
				}

				if ( $dsm_image_height_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper img',
							'declaration' => sprintf( 'height: %1$s;', $this->props['dsm_image_height_phone'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}
			}

			if ( $this->props['dsm_overlay_color'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item:hover .dsm-filterable-gallery-image-wrapper::before',
						'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_overlay_color'] ),
					)
				);
			}

			if ( $dsm_overlay_color_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item:hover .dsm-filterable-gallery-image-wrapper::before',
						'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_overlay_color_tablet'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_overlay_color_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item:hover .dsm-filterable-gallery-image-wrapper::before',
						'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_overlay_color_phone'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			$margin    = 'margin';
			$padding   = 'padding';
			$important = false;

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_overlay_padding'], $padding, $important ),
				)
			);

			if ( $dsm_overlay_padding_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
						'declaration' => et_builder_get_element_style_css( $this->props['dsm_overlay_padding_tablet'], $padding, $important ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_overlay_padding_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
						'declaration' => et_builder_get_element_style_css( $this->props['dsm_overlay_padding_phone'], $padding, $important ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'none' !== $this->props['dsm_hover_style'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper, %%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item .dsm-filterable-gallery-image-wrapper::before',
						'declaration' => sprintf( 'transition: %1$s;', $this->props['dsm_hover_transition'] ),
					)
				);
			}

			if ( 'zoom_in' === $this->props['dsm_hover_style'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper, %%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item .dsm-filterable-gallery-image-wrapper::before',
						'declaration' => 'transform: scale(0.8);',
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item:hover .dsm-filterable-gallery-content-wrapper, %%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item:hover .dsm-filterable-gallery-image-wrapper::before',
						'declaration' => 'transform: scale(1);',
					)
				);
			}
		}

		if ( $dsm_number_of_columns ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => sprintf( 'width: calc(100%% / %1$s - %2$s);', $dsm_number_of_columns, $dsm_column_gap ),
				)
			);
		}
		if ( $dsm_number_of_columns_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => sprintf( 'width: calc(100%% / %1$s - %2$s);', $dsm_number_of_columns_tablet, $dsm_column_gap_responsive_active ? $dsm_column_gap_tablet : $dsm_column_gap ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => sprintf( 'width: calc(100%% / %1$s - %2$s);', $dsm_number_of_columns_phone, $dsm_column_gap_responsive_active ? $check_columns_gap_phone : $check_columns_gap_tablet ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $dsm_column_gap ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-inner-container',
					'declaration' => sprintf( 'margin-right: -%1$s;', $dsm_column_gap ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => sprintf( 'margin-right: %1$s;', $dsm_column_gap ),
				)
			);
		}

		if ( $dsm_column_gap_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-inner-container',
					'declaration' => sprintf( 'margin-right: -%1$s;', $check_columns_gap_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),

				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => sprintf( 'margin-right : %1$s;', $check_columns_gap_tablet ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_column_gap_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-inner-container',
					'declaration' => sprintf( 'margin-right: -%1$s;', $check_columns_gap_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),

				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => sprintf( 'margin-right: %1$s;', $check_columns_gap_phone ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_row_gap'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => sprintf( 'margin-bottom: %1$s;', $this->props['dsm_row_gap'] ),
				)
			);
		}

		if ( $this->props['dsm_row_gap_tablet'] && $dsm_row_gap_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => sprintf( 'margin-bottom: %1$s;', $this->props['dsm_row_gap_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $this->props['dsm_row_gap_phone'] && $dsm_row_gap_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-item',
					'declaration' => sprintf( 'margin-bottom: %1$s;', $this->props['dsm_row_gap_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// category styling work.

		if ( $this->props['dsm_category_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container',
					'declaration' => sprintf( 'text-align : %1$s;', $this->props['dsm_category_alignment'] ),
				)
			);
		}

		if ( $dsm_category_alignment_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container',
					'declaration' => sprintf( 'text-align : %1$s;', $this->props['dsm_category_alignment_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_category_alignment_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-category-container',
					'declaration' => sprintf( 'text-align : %1$s;', $this->props['dsm_category_alignment_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$margin    = 'margin';
		$padding   = 'padding';
		$important = false;

		if ( $this->props['dsm_category_margin'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_category_margin'], $margin, $important ),
				)
			);
		}

		if ( $dsm_category_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_category_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_category_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_category_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_category_padding'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_category_padding'], $padding, $important ),
				)
			);
		}

		if ( $dsm_category_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_category_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_category_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-category-container .dsm-filterable-gallery-filter-item',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_category_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// pagination styling work.

		$pagination_alignemnt_value = 'center';

		switch ( $this->props['dsm_pagination_alignment'] ) {
			case 'left':
				$pagination_alignemnt_value = 'flex-start';
				break;
			case 'center':
				$pagination_alignemnt_value = 'center';
				break;
			case 'right':
				$pagination_alignemnt_value = 'flex-end';
				break;
		}

		if ( $this->props['dsm_pagination_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container',
					'declaration' => sprintf( 'justify-content : %1$s;', $pagination_alignemnt_value ),
				)
			);
		}

		if ( $this->props['dsm_pagination_margin'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_pagination_margin'], $margin, $important ),
				)
			);
		}

		if ( $dsm_pagination_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_pagination_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_pagination_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_pagination_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_pagination_padding'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_pagination_padding'], $padding, $important ),
				)
			);
		}

		if ( $dsm_pagination_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_pagination_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_pagination_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_pagination_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_pagination_inactive_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_pagination_inactive_bg_color'] ),
				)
			);
		}

		if ( $dsm_pagination_inactive_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_pagination_inactive_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_pagination_inactive_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_pagination_inactive_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_pagination_active_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_pagination_active_bg_color'] ),
				)
			);
		}

		if ( $dsm_pagination_active_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_pagination_active_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_pagination_active_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_pagination_active_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_pagination_inactive_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => sprintf( 'color : %1$s !important;', $this->props['dsm_pagination_inactive_color'] ),
				)
			);
		}

		if ( $dsm_pagination_inactive_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_pagination_inactive_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_pagination_inactive_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination',
					'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_pagination_inactive_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_pagination_active_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
					'declaration' => sprintf( 'color : %1$s !important;', $this->props['dsm_pagination_active_color'] ),
				)
			);
		}

		if ( $dsm_pagination_active_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
					'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_pagination_active_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_pagination_active_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-number-pagination.dsm-active-pagination-item',
					'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_pagination_active_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_pagination_inactive_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-previous-dot, %%order_class%% .dsm-gallery-number-pagination-container .dsm-gallery-next-dot',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_pagination_inactive_bg_color'] ),
				)
			);
		}

		// load more button styling.

		$loadmore_alignemnt_value = 'center';

		switch ( $this->props['dsm_pagination_alignment'] ) {
			case 'left':
				$loadmore_alignemnt_value = 'flex-start';
				break;
			case 'center':
				$loadmore_alignemnt_value = 'center';
				break;
			case 'right':
				$loadmore_alignemnt_value = 'flex-end';
				break;
		}

		if ( $this->props['dsm_loadmore_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container',
					'declaration' => sprintf( 'justify-content : %1$s;', $loadmore_alignemnt_value ),
				)
			);
		}

		if ( $this->props['dsm_load_more_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => sprintf( 'background : %1$s !important;', $this->props['dsm_load_more_bg_color'] ),
				)
			);
		}

		if ( $dsm_load_more_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => sprintf( 'background: %1$s !important;', $this->props['dsm_load_more_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_load_more_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => sprintf( 'background : %1$s !important;', $this->props['dsm_load_more_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_load_more_margin'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_load_more_margin'], $margin, $important ),
				)
			);
		}

		if ( $dsm_load_more_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_load_more_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_load_more_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_load_more_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_load_more_padding'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_load_more_padding'], $padding, $important ),
				)
			);
		}

		if ( $dsm_load_more_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_load_more_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_load_more_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-gallery-loadmore-container span',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_load_more_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$margin    = 'margin';
		$padding   = 'padding';
		$important = false;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_wrapper_margin'], $margin, $important ),
			)
		);

		if ( $dsm_content_wrapper_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_wrapper_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_wrapper_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_wrapper_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_wrapper_padding'], $padding, $important ),
			)
		);

		if ( $dsm_content_wrapper_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_wrapper_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_wrapper_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_wrapper_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$margin    = 'margin';
		$padding   = 'padding';
		$important = false;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_wrapper_margin'], $margin, $important ),
			)
		);

		if ( $dsm_image_wrapper_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_wrapper_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_image_wrapper_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_wrapper_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_wrapper_padding'], $padding, $important ),
			)
		);

		if ( $dsm_image_wrapper_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_wrapper_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_image_wrapper_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-filterable-gallery-container .dsm-filterable-gallery-image-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_wrapper_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$has_pagination     = 'on' === $this->props['dsm_show_pagination'];
		$has_dynamic_images = 'on' === $this->props['dsm_use_dynamic_images'];

		// Get gallery item data.
		$attachments_pages = $this->get_attachments(
			array(
				'gallery_ids'    => $gallery_ids,
				'posts_per_page' => $this->props['dsm_per_page'],
				'order'          => $this->props['dsm_query_order'],
				'use_dynamic'    => $has_dynamic_images,
				'categories'     => $this->props['dsm_include_categories'],
				'max'            => (int) $this->props['dsm_total_number_images'],
			)
		);

		if ( empty( $attachments_pages ) ) {
			return '';
		}

		wp_enqueue_script( 'hashchange' );

		$ids_in_array = explode( ',', $gallery_ids );
		$__ids        = array();

		$markup                 = array();
		$categories             = $has_dynamic_images ? $this->get_categories_from_ids( explode( ',', $this->props['dsm_include_categories'] ) ) : $this->get_categories( $ids_in_array );
		$filterable_tabs_markup = '';

		foreach ( $ids_in_array as $id ) {
			$__ids[] = (int) $id;
		}

		$slides = '';

		foreach ( $attachments_pages as $attachment_page_no => $attachments_in_page ) {
			foreach ( $attachments_in_page as $attachment ) {
				// Divi Supreme Custom URL for Galleries.
				$dsm_upload_gallery_custom_link_url       = get_post_meta( $attachment->ID, 'dsm_upload_gallery_custom_link_url', true );
				$dsm_upload_gallery_link_url_target       = get_post_meta( $attachment->ID, 'dsm_upload_gallery_link_url_target', true );
				$dsm_upload_gallery_link_as_download_file = get_post_meta( $attachment->ID, 'dsm_upload_gallery_link_as_download_file', true );

				$title                    = 'on' === $this->props['dsm_show_title'] ? sprintf( '<%2$s class="dsm-title">%1$s</%2$s>', trim( wptexturize( get_the_title( $attachment->ID ) ) ), $this->props['header_level'] ) : '';
				$caption                  = 'on' === $this->props['dsm_show_caption'] ? sprintf( '<div class="dsm-caption">%1$s</div>', esc_html( trim( wp_get_attachment_caption( $attachment->ID ) ) ) ) : '';
				$description              = 'on' === $this->props['dsm_show_description'] ? sprintf( '<div class="dsm-description">%1$s</div>', esc_html( trim( $attachment->post_content ) ) ) : '';
				$attachment_sizes         = wp_get_attachment_image_src( $attachment->ID, $this->props['dsm_image_sizes'] );
				$current_attachment_sizes = $attachment_sizes[0];
				$current_image_title      = get_the_title( $attachment->ID );
				$current_image_alt        = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
				$current_categories       = get_the_terms( $attachment->ID, 'dsm-attachment-category' );

				if ( false === $current_categories ) {
					$current_categories = array();
				}

				$all_category         = new stdClass();
				$all_category->name   = 'all';
				$current_categories[] = $all_category;

				$categories_as_string = join( ',', wp_list_pluck( $current_categories, 'name' ) );

				$normalized_page_index = $attachment_page_no + 1;

				$image = sprintf(
					'<img src="%1$s" title="%2$s" alt="%3$s" />',
					esc_url( $current_attachment_sizes ),
					esc_attr( $current_image_title ),
					esc_attr( $current_image_alt )
				);

				$content_wrapper = 'on' === $this->props['dsm_show_title'] || 'on' === $this->props['dsm_show_caption'] || 'on' === $this->props['dsm_show_description'] ? sprintf( '<div class="dsm-filterable-gallery-content-wrapper">%1$s %2$s %3$s</div>', $title, $caption, $description ) : '';

				if ( '' === $dsm_upload_gallery_custom_link_url ) {
					$wrapper = sprintf(
						'<div class="dsm-filterable-gallery-item" data-mfp-src="%5$s" data-inpage="%4$s" data-groups="%3$s" %6$s %7$s %8$s>
							<div class="dsm-filterable-gallery-inner-item">
							  <div class="dsm-filterable-gallery-image-wrapper">%1$s</div>
							  %2$s
							</div>
						</div> 
					',
						$image,
						$content_wrapper,
						strtolower( $categories_as_string ),
						$normalized_page_index,
						esc_url( $current_attachment_sizes ),
						'on' === $this->props['dsm_show_title_lightbox'] ? sprintf( 'data-lightbox_title="%1$s"', trim( wptexturize( get_the_title( $attachment->ID ) ) ) ) : '',
						'on' === $this->props['dsm_show_caption_lightbox'] ? sprintf( 'data-lightbox_caption="%1$s"', esc_html( trim( wp_get_attachment_caption( $attachment->ID ) ) ) ) : '',
						'on' === $this->props['dsm_show_description_lightbox'] ? sprintf( 'data-lightbox_description="%1$s"', esc_html( html_entity_decode( trim( $attachment->post_content ) ) ) ) : ''
					);
				}

				if ( '' !== $dsm_upload_gallery_custom_link_url ) {
					$wrapper = sprintf(
						'<div class="dsm-filterable-gallery-item" data-mfp-src="%5$s" data-inpage="%4$s" data-groups="%3$s" %9$s %10$s %11$s>
							<div class="dsm-filterable-gallery-inner-item">
							 <a href="%6$s" target="%7$s" %8$s>
							  <div class="dsm-filterable-gallery-image-wrapper">
							    <div class="et_pb_image_wrap">%1$s</div> 
							  </div>
							  %2$s
							  </a>
							</div>
						</div> 
					',
						$image,
						$content_wrapper,
						strtolower( $categories_as_string ),
						$normalized_page_index,
						esc_url( $current_attachment_sizes ),
						esc_url( $dsm_upload_gallery_custom_link_url ),
						esc_attr( $dsm_upload_gallery_link_url_target ),
						( '1' === $dsm_upload_gallery_link_as_download_file ? ' download' : '' ),
						'on' === $this->props['dsm_show_title_lightbox'] ? sprintf( 'data-lightbox_title="%1$s"', trim( wptexturize( get_the_title( $attachment->ID ) ) ) ) : '',
						'on' === $this->props['dsm_show_caption_lightbox'] ? sprintf( 'data-lightbox_caption="%1$s"', esc_html( trim( wp_get_attachment_caption( $attachment->ID ) ) ) ) : '',
						'on' === $this->props['dsm_show_description_lightbox'] ? sprintf( 'data-lightbox_description="%1$s"', esc_html( html_entity_decode( trim( $attachment->post_content ) ) ) ) : ''
					);
				}

				$slides .= $wrapper;
			}
		}

		$filterable_tabs_markup .= 'on' === $this->props['dsm_show_all_images_text'] ? sprintf( '<li class="dsm-filterable-gallery-filter-item" data-category="all">%1$s</li>', $this->props['dsm_filterable_gallery_all_text'] ) : '';
		if ( 'asc' === $this->props['dsm_sortby'] ) {
			natcasesort( $categories );
		} elseif ( 'desc' === $this->props['dsm_sortby'] ) {
			rsort( $categories );
		} else {
			shuffle( $categories );
		}

		foreach ( $categories as $category ) {
			$filterable_tabs_markup .= sprintf( '<li class="dsm-filterable-gallery-filter-item" data-category="%2$s">%1$s</li>', $category, strtolower( $category ) );
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-magnific-popup' );
				wp_enqueue_style( 'dsm-filterable-gallery', plugin_dir_url( __DIR__ ) . 'FilterableGallery/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return sprintf(
			'<div class="dsm-filterable-gallery-container %11$s" data-paginationtype="%6$s" data-currentpage="1" data-per_page="%4$s" data-use_lightbox="%7$s" data-totalpages="%8$s" data-speed="%9$s" data-showpagination="%10$s">
			  	%2$s 
		      <div class="dsm-filterable-gallery-inner-container ">
			  	%1$s 
			  </div>
			  %3$s
			  %5$s
		   </div>
		',
			$slides,
			'on' === $this->props['dsm_show_filterable_gallery'] ? sprintf( '<ul class="dsm-filterable-category-container">%1$s</ul>', $filterable_tabs_markup ) : '',
			'on' === $this->props['dsm_show_pagination'] && 'load_more' === $this->props['dsm_pagination_type'] ? $this->get_loadmore_pagination() : '',
			$this->props['dsm_per_page'],
			'on' === $this->props['dsm_show_pagination'] && 'number' === $this->props['dsm_pagination_type'] ? $this->get_number_pagination( $attachments_pages ) : '',
			$this->props['dsm_pagination_type'],
			$this->props['dsm_use_lightbox'],
			count( $attachments_pages ),
			$this->props['dsm_speed'],
			$this->props['dsm_show_pagination'],
			'on' === $this->props['dsm_use_zoom_on_hover'] ? 'dsm-image-hover' : ''
		);
	}

	/**
	 * Force load global styles.
	 *
	 * @param array $assets_list Current global assets on the list.
	 *
	 * @return array
	 */
	public $_cpt_suffix;
	public function dsm_load_required_divi_assets( $assets_list, $assets_args, $instance ) {
		$assets_prefix     = et_get_dynamic_assets_path();
		$all_shortcodes    = $instance->get_saved_page_shortcodes();
		$this->_cpt_suffix = et_builder_should_wrap_styles() && ! et_is_builder_plugin_active() ? '_cpt' : '';

		if ( ! isset( $assets_list['et_jquery_magnific_popup'] ) ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
			);
		}

		if ( ! isset( $assets_list['et_pb_overlay'] ) ) {
			$assets_list['et_pb_overlay'] = array(
				'css' => "{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
			);
		}

		// FilterableGallery.
		if ( ! isset( $assets_list['dsm_filterable_gallery'] ) ) {
			$assets_list['dsm_filterable_gallery'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'FilterableGallery/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_Filterable_Gallery();
