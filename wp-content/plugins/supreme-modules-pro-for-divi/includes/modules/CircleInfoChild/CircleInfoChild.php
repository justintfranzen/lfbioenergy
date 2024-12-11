<?php

class DSM_Circle_Info_Child extends ET_Builder_Module {
	public $slug       = 'dsm_circle_info_child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name                        = esc_html__( 'Supreme Circle Info Child', 'dsm-supreme-modules-pro-for-divi' );
		$this->type                        = 'child';
		$this->child_title_var             = 'admin_title';
		$this->child_title_fallback_var    = 'dsm_circle_info_title';
		$this->advanced_setting_title_text = esc_html__( 'Circle Info', 'dsm-supreme-modules-pro-for-divi' );

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'dsm_circle_panel'  => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_content_panel' => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),

			'advanced'   => array(
				'toggles' => array(
					'dsm_item_panel'         => array(
						'sub_toggles'       => array(
							'general'      => array(
								'name' => 'General',
							),
							'normal_state' => array(
								'name' => 'Normal',
							),
							'active_state' => array(
								'name' => 'Active',
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => esc_html__( 'Circle Item', 'dsm-supreme-modules-pro-for-divi' ),
					),
					'dsm_content_panel'      => array(
						'sub_toggles'       => array(
							'general'     => array(
								'name' => 'General',
							),
							'title'       => array(
								'name' => 'Title',
							),
							'description' => array(
								'name' => 'Description',
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					),
					'dsm_icon_panel'         => array(
						'sub_toggles'       => array(
							'icon'  => array(
								'name' => 'Icon',
							),
							'image' => array(
								'name' => 'Image',
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => esc_html__( 'Icon / Image', 'dsm-supreme-modules-pro-for-divi' ),
					),

					'dsm_content_icon_panel' => array(
						'sub_toggles'       => array(
							'icon'  => array(
								'name' => 'Icon',
							),
							'image' => array(
								'name' => 'Image',
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => esc_html__( 'Content Icon / Image', 'dsm-supreme-modules-pro-for-divi' ),
					),
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

		$this->advanced_fields = array(
			'fonts'          => array(
				'dsm_circle_info_title' => array(
					'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '.dsm-circle-info-container %%order_class%% .dsm-circle-info-button-wrapper span',
					),

					'font_size'       => array(
						'default' => '14px',
					),

					'text_align'      => array(
						'default' => 'center',
					),

					'line_height'     => array(
						'default' => '1.7em',
					),

					'letter_spacing'  => array(
						'default' => '0px',
					),

					'hide_text_color' => true,

					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_item_panel',
					'sub_toggle'      => 'general',
				),

				'header'                => array(
					'label'        => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .dsm-title',
					),

					'header_level' => array(
						'default' => 'h4',
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_content_panel',
					'sub_toggle'   => 'title',
				),

				'dsm_content'           => array(
					'label'          => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .dsm-circle-info-description',
					),

					'font_size'      => array(
						'default' => '14px',
					),

					'text_align'     => array(
						'default' => 'center',
					),

					'line_height'    => array(
						'default' => '1.7em',
					),

					'letter_spacing' => array(
						'default' => '0px',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'dsm_content_panel',
					'sub_toggle'     => 'description',
				),
			),

			'borders'        => array(
				'default'                       => false,
				'dsm_circle_item_border'        => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm-circle-info-button-wrapper',
							'border_styles' => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm-circle-info-button-wrapper',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Circle Item', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_item_panel',
					'sub_toggle'   => 'normal_state',
				),

				'dsm_circle_active_item_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
							'border_styles' => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
							'important'     => 'all',
						),
					),
					'label_prefix' => esc_html__( 'Active Circle Item', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_item_panel',
					'sub_toggle'   => 'active_state',
				),

				'dsm_circle_icon_border'        => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_icon',
							'border_styles' => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_icon',
						),
					),

					'label_prefix' => esc_html__( 'Icon ', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_icon_panel',
					'sub_toggle'   => 'icon',
				),

				'dsm_content_icon_border'       => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm_content_icon',
							'border_styles' => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm_content_icon',
						),
					),

					'label_prefix' => esc_html__( 'Icon ', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_content_icon_panel',
					'sub_toggle'   => 'icon',
				),

				'dsm_circle_image_border'       => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_circle_info_image',
							'border_styles' => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_circle_info_image',
						),
					),
					'label_prefix' => esc_html__( 'Image ', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_icon_panel',
					'sub_toggle'   => 'image',
				),

				'dsm_content_image_border'      => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm-image img',
							'border_styles' => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm-image img',
						),
					),
					'label_prefix' => esc_html__( 'Image ', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_content_icon_panel',
					'sub_toggle'   => 'image',
				),

				'dsm_circle_content_wrapper'    => array(
					'css'         => array(
						'border_radii'  => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper',
						'border_styles' => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper',
						'important'     => 'all',
					),
					'use_radius'  => false,
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content_panel',
					'sub_toggle'  => 'general',
				),
			),
			'box_shadow'     => array(
				'default'                    => false,
				'dsm_circle_item'            => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main'      => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm-circle-info-button-wrapper',
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_item_panel',
					'sub_toggle'  => 'normal_state',
				),
				'dsm_circle_active_item'     => array(
					'label'       => esc_html__( 'Active Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main'      => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_item_panel',
					'sub_toggle'  => 'active_state',
				),
				'dsm_circle_content_wrapper' => array(
					'css'         => array(
						'main' => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content_panel',
					'sub_toggle'  => 'general',
				),
				'dsm_circle_icon_shadow'     => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_icon',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_icon_panel',
					'sub_toggle'  => 'icon',
				),

				'dsm_content_icon_shadow'    => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm_content_icon',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content_icon_panel',
					'sub_toggle'  => 'icon',
				),

				'dsm_circle_image_shadow'    => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_circle_info_image',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_icon_panel',
					'sub_toggle'  => 'image',
				),

				'dsm_content_image_shadow'   => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm-image img',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content_icon_panel',
					'sub_toggle'  => 'image',
				),
			),

			'background'     => array(
				'use_background_pattern' => false,
				'use_background_mask'    => false,

				'css'                    => array(
					'main' => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper',
				),
				'options'                => array(
					'background_color' => array(
						'default'          => et_builder_accent_color(),
						'default_on_child' => true,
					),
				),
				'important'              => true,
			),
			'button'         => array(
				'button' => array(
					'label'          => et_builder_i18n( 'Button' ),
					'css'            => array(
						'main'         => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button,.dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button',
						'limited_main' => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button, .dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button',
						'alignment'    => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper, .dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper',
					),
					'use_alignment'  => true,
					'box_shadow'     => array(
						'css' => array(
							'main'      => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button, .dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button',
							'important' => true,
						),
					),
					'margin_padding' => array(
						'css' => array(
							'margin'    => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button, .dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper',
							'main'      => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button, .dsm-circle-info-container %%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button',
							'important' => 'all',
						),
					),
				),
			),
			'margin_padding' => array(
				'dsm_circle_item' => array(
					'css'         => array(
						'main'      => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-button-wrapper',
						'important' => array( 'custom_margin' ),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_item_panel',
					'sub_toggle'  => 'normal_state',
				),
			),
			'text'           => false,
			'link_options'   => false,
			'animation'      => false,
			'max_width'      => false,
			'filters'        => false,
			'transform'      => false,
		);
	}

	public function get_fields() {
		return array(
			'admin_title'                    => array(
				'label'       => esc_html__( 'Admin Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the circle info item in the builder for easy identification.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'admin_label',
			),

			'dsm_circle_info_title'          => array(
				'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'description'     => esc_html__( 'Input your circle info button title here', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_circle_panel',
				'mobile_options'  => true,
			),

			'dsm_show_icon'                  => array(
				'label'            => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'options'          => array(
					'off' => et_builder_i18n( 'No' ),
					'on'  => et_builder_i18n( 'Yes' ),
				),
				'toggle_slug'      => 'dsm_circle_panel',
				'description'      => esc_html__( 'Here you can choose whether icon should be used.', 'dsm-supreme-modules-pro-for-divi' ),
				'default_on_front' => 'off',
			),

			'font_icon'                      => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'toggle_slug'     => 'dsm_circle_panel',
				'description'     => esc_html__( 'Choose an icon to display with your circle button.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_show_icon' => 'on',
				),
			),

			'image'                          => array(
				'label'              => et_builder_i18n( 'Image' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => et_builder_i18n( 'Upload an image' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( 'Upload an image to display at the top of your blurb.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'dsm_circle_panel',
				'dynamic_content'    => 'image',
				'mobile_options'     => true,
				'show_if'            => array(
					'dsm_show_icon' => 'off',
				),
			),

			'dsm_active_item_default'        => array(
				'label'           => esc_html__( 'Active Item By Default', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'default'         => 'off',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => et_builder_i18n( 'No' ),
					'on'  => et_builder_i18n( 'Yes' ),
				),

				'toggle_slug'     => 'dsm_circle_panel',
				'description'     => esc_html__( 'Here you can choose whether icon should be used.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_active_item_default_notice' => array(
				'label'           => '',
				'type'            => 'warning',
				'value'           => true,
				'display_if'      => true,
				'message'         => esc_html__( 'Make sure to enable this option for only 1 Item, enabling it on multiple items may cause an issue.', 'dsm-supreme-modules-pro-for-divi' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_circle_panel',

				'show_if'         => array(
					'dsm_active_item_default' => 'on',
				),
			),

			'alt'                            => array(
				'label'           => esc_html__( 'Image Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your circle info button image here.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
				'show_if'         => array(
					'dsm_show_icon' => 'off',
				),
			),

			'dsm_content_type'               => array(
				'label'           => esc_html__( 'Content Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'content',
				'option_category' => 'configuration',
				'options'         => array(
					'content'   => esc_html__( 'Custom Content', 'dsm-supreme-modules-pro-for-divi' ),
					'shortcode' => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_content_panel',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'shortcode_content'              => array(
				'label'       => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'tab_slug'    => 'general',
				'toggle_slug' => 'dsm_content_panel',
				'show_if'     => array(
					'dsm_content_type' => 'shortcode',
				),
			),

			'dsm_content_title'              => array(
				'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'description'     => esc_html__( 'The title of your circle info content.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_content_panel',
				'mobile_options'  => true,

				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),

			'dsm_circle_info_content'        => array(
				'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'description'     => esc_html__( 'Input the main text content for your module here.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_content_panel',
				'mobile_options'  => true,

				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),

			'dsm_content_show_icon'          => array(
				'label'           => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'default'         => 'off',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => et_builder_i18n( 'No' ),
					'on'  => et_builder_i18n( 'Yes' ),
				),

				'show_if'         => array(
					'dsm_content_type' => 'content',
				),

				'toggle_slug'     => 'dsm_content_panel',
				'description'     => esc_html__( 'Here you can choose whether icon should be used.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_font_icon'                  => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'toggle_slug'     => 'dsm_content_panel',
				'description'     => esc_html__( 'Choose an icon to display with your circle button.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_content_show_icon' => 'on',
					'dsm_content_type'      => 'content',
				),
			),

			'dsm_content_image'              => array(
				'label'              => et_builder_i18n( 'Image' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => et_builder_i18n( 'Upload an image' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( 'Upload an image to display at the top of your blurb.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'dsm_content_panel',
				'dynamic_content'    => 'image',
				'mobile_options'     => true,
				'show_if'            => array(
					'dsm_content_show_icon' => 'off',
					'dsm_content_type'      => 'content',
				),
			),

			'dsm_circle_bg_color'            => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom background color.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_item_panel',
			),
			'dsm_circle_active_bg_color'     => array(
				'label'          => esc_html__( 'Active Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom active background color.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_item_panel',
			),
			'dsm_content_padding'            => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content_panel',
				'sub_toggle'      => 'general',
				'mobile_options'  => true,
				'responsive'      => true,
			),
			'dsm_circle_image_width'         => array(
				'label'          => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'icon_settings',
				'description'    => esc_html__( 'Here you can choose image width.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_icon_panel',
				'sub_toggle'     => 'image',
				'validate_unit'  => true,
				'allowed_units'  => array( '%' ),
				'responsive'     => true,
				'mobile_options' => true,
			),
			// Icon.
			'dsm_icon_font_size'             => array(
				'label'           => esc_html__( 'Icon Size', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Here you can choose icon width.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_icon_panel',
				'sub_toggle'      => 'icon',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'responsive'      => true,
				'mobile_options'  => true,
			),
			'dsm_icon_bg_color'              => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom background color for the icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_icon_panel',
				'sub_toggle'     => 'icon',
			),
			'dsm_icon_active_bg_color'       => array(
				'label'          => esc_html__( 'Active Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom active background color for the icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_icon_panel',
				'sub_toggle'     => 'icon',
			),
			'dsm_icon_color'                 => array(
				'label'          => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for the icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_icon_panel',
				'sub_toggle'     => 'icon',
			),
			'dsm_icon_active_color'          => array(
				'label'          => esc_html__( 'Active Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom active color for the icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_icon_panel',
				'sub_toggle'     => 'icon',
			),
			'dsm_icon_margin'                => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_icon_panel',
				'sub_toggle'      => 'icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),
			'dsm_icon_padding'               => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_icon_panel',
				'sub_toggle'      => 'icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			// content icon
			'dsm_content_icon_font_size'     => array(
				'label'           => esc_html__( 'Icon Size', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Here you can choose icon width.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content_icon_panel',
				'sub_toggle'      => 'icon',
				'option_category' => 'layout',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'responsive'      => true,
				'mobile_options'  => true,
			),
			'dsm_content_icon_bg_color'      => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom background color for the icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_content_icon_panel',
				'sub_toggle'     => 'icon',
			),

			'dsm_content_icon_color'         => array(
				'label'          => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for the icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_content_icon_panel',
				'sub_toggle'     => 'icon',
			),

			'dsm_content_icon_margin'        => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content_icon_panel',
				'sub_toggle'      => 'icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),
			'dsm_content_icon_padding'       => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content_icon_panel',
				'sub_toggle'      => 'icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_content_image_width'        => array(
				'label'          => esc_html__( 'Image/Icon Width', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'    => 'icon_settings',
				'description'    => esc_html__( 'Here you can choose image width.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'range',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_content_icon_panel',
				'sub_toggle'     => 'image',
				'validate_unit'  => true,
				'default_unit'   => '%',
				'allowed_units'  => array( '%' ),
				'responsive'     => true,
				'mobile_options' => true,
			),

			'button_text'                    => array(
				'label'           => esc_html__( 'Button Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input your desired button text, or leave blank for no button.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_content_panel',
				'dynamic_content' => 'text',
				'mobile_options'  => true,

				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),
			'button_url'                     => array(
				'label'           => esc_html__( 'Button Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the destination URL for your Circle Info button.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_content_panel',
				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),
			'button_url_new_window'          => array(
				'label'           => esc_html__( 'Button Link Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'dsm_content_panel',
				'description'     => esc_html__( 'Here you can choose whether or not your link opens in a new window.', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		global $dsm_variable, $dsm_circle_info_button_markup, $dsm_circle_info_content_markup, $et_pb_slider_custom_icon, $et_pb_slider_custom_icon_tablet, $et_pb_slider_custom_icon_phone;

		$multi_view = et_pb_multi_view_options( $this );

		$parent_header_level = self::$_->array_get( $dsm_variable, 'header_level', '' );

		$dsm_circle_bg_color_last_edited       = $this->props['dsm_circle_bg_color_last_edited'];
		$dsm_circle_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_circle_bg_color_last_edited );

		$dsm_circle_active_bg_color_last_edited       = $this->props['dsm_circle_active_bg_color_last_edited'];
		$dsm_circle_active_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_circle_active_bg_color_last_edited );

		$button_url            = $this->props['button_url'];
		$button_url_new_window = $this->props['button_url_new_window'];
		$button_custom         = $this->props['custom_button'];
		$button_rel            = $this->props['button_rel'];
		$custom_icon_values    = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon           = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet    = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone     = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';

		$custom_slide_icon        = 'on' === $button_custom && '' !== $custom_icon ? $custom_icon : $et_pb_slider_custom_icon;
		$custom_slide_icon_tablet = 'on' === $button_custom && '' !== $custom_icon_tablet ? $custom_icon_tablet : $et_pb_slider_custom_icon_tablet;
		$custom_slide_icon_phone  = 'on' === $button_custom && '' !== $custom_icon_phone ? $custom_icon_phone : $et_pb_slider_custom_icon_phone;

		// fix bg image setting.

		if ( '' === $this->props['background_repeat'] || 'no-repeat' === $this->props['background_repeat'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-circle-info-content-wrapper',
					'declaration' => 'background-repeat: no-repeat;',
				)
			);
		}

		if ( '' === $this->props['background_position'] || 'center' === $this->props['background_position'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-circle-info-content-wrapper',
					'declaration' => 'background-position: center;',
				)
			);
		}

		if ( '' === $this->props['background_size'] || 'cover' === $this->props['background_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-circle-info-content-wrapper',
					'declaration' => 'background-size: cover;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_circle_item_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-circle-info-item-inner-wrapper .dsm-circle-info-button-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%%.dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button::after',
				'declaration' => 'content: attr(data-icon);',
			)
		);

		if ( $this->props['dsm_circle_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm-circle-info-button-wrapper',
					'declaration' => sprintf( 'background: %1$s !important;', $this->props['dsm_circle_bg_color'] ),
				)
			);
		}

		if ( $dsm_circle_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm-circle-info-button-wrapper',
					'declaration' => sprintf( 'background: %1$s!important;', $this->props['dsm_circle_bg_color_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_circle_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm-circle-info-button-wrapper',
					'declaration' => sprintf( 'background: %1$s!important;', $this->props['dsm_circle_bg_color_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_circle_active_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
					'declaration' => sprintf( 'background: %1$s!important;', $this->props['dsm_circle_active_bg_color'] ),
				)
			);
		}

		if ( $dsm_circle_active_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
					'declaration' => sprintf( 'background: %1$s!important;', $this->props['dsm_circle_active_bg_color_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_circle_active_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-circle-info-container %%order_class%%.dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
					'declaration' => sprintf( 'background: %1$s!important;', $this->props['dsm_circle_active_bg_color_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$this->apply_custom_margin_padding(
			$render_slug,
			'dsm_content_padding',
			'padding',
			'.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper'
		);

		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'font_icon',
				'selector'       => '%%order_class%% .dsm_icon',
				'important'      => true,
				'processor'      => array(
					'ET_Builder_Module_Helper_Style_Processor',
					'process_extended_icon',
				),
			)
		);

		if ( 'off' === $this->props['dsm_show_icon'] ) {
			$circle_icon_image = $multi_view->render_element(
				array(
					'tag'      => 'img',
					'attrs'    => array(
						'src'   => '{{image}}',
						'class' => 'dsm_circle_info_image',
						'alt'   => $this->_esc_attr( 'alt' ),
					),
					'required' => 'image',
				)
			);

			$this->generate_styles(
				array(
					'base_attr_name' => 'dsm_circle_image_width',
					'selector'       => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_circle_info_image',
					'css_property'   => 'max-width',
					'render_slug'    => $render_slug,
					'type'           => 'max-width',
				)
			);
		} elseif ( 'on' === $this->props['dsm_show_icon'] ) {
			$this->generate_styles(
				array(
					'base_attr_name' => 'dsm_icon_font_size',
					'selector'       => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm_icon',
					'css_property'   => 'font-size',
					'render_slug'    => $render_slug,
					'type'           => 'font-sze',
				)
			);
			$this->generate_styles(
				array(
					'base_attr_name' => 'dsm_icon_bg_color',
					'selector'       => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_icon',
					'css_property'   => 'background-color',
					'render_slug'    => $render_slug,
					'type'           => 'background-color',
				)
			);
			$this->generate_styles(
				array(
					'base_attr_name' => 'dsm_icon_active_bg_color',
					'selector'       => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm_icon',
					'css_property'   => 'background-color',
					'render_slug'    => $render_slug,
					'type'           => 'background-color',
				)
			);
			$this->generate_styles(
				array(
					'base_attr_name' => 'dsm_icon_color',
					'selector'       => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_icon',
					'css_property'   => 'color',
					'render_slug'    => $render_slug,
					'type'           => 'color',
				)
			);
			$this->generate_styles(
				array(
					'base_attr_name' => 'dsm_icon_active_color',
					'selector'       => '.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm_icon',
					'css_property'   => 'color',
					'render_slug'    => $render_slug,
					'type'           => 'color',
				)
			);
			$this->apply_custom_margin_padding(
				$render_slug,
				'dsm_icon_margin',
				'margin',
				'.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_icon'
			);
			$this->apply_custom_margin_padding(
				$render_slug,
				'dsm_icon_padding',
				'padding',
				'.dsm-circle-info-container .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_icon'
			);
		}

		// content image styling.

		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_content_image_width',
				'selector'       => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm-image img',
				'css_property'   => 'max-width',
				'render_slug'    => $render_slug,
				'type'           => 'max-width',
			)
		);

		// content icon styling.

		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_content_icon_font_size',
				'selector'       => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm_content_icon',
				'css_property'   => 'font-size',
				'render_slug'    => $render_slug,
				'type'           => 'font-sze',
			)
		);
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_content_icon_bg_color',
				'selector'       => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm_content_icon',
				'css_property'   => 'background-color',
				'render_slug'    => $render_slug,
				'type'           => 'background-color',
			)
		);
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_content_icon_color',
				'selector'       => '.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm_content_icon',
				'css_property'   => 'color',
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'dsm_content_icon_margin',
			'margin',
			'.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm_content_icon'
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'dsm_content_icon_padding',
			'padding',
			'.dsm-circle-info-container .dsm-circle-info-content %%order_class%%.dsm-circle-info-content-wrapper .dsm_content_icon'
		);

		$circle_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{font_icon}}',
				'attrs'   => array(
					'class' => 'dsm_icon',
				),
			)
		);

		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'dsm_font_icon',
				'selector'       => '%%order_class%% .dsm_content_icon',
				'important'      => true,
				'processor'      => array(
					'ET_Builder_Module_Helper_Style_Processor',
					'process_extended_icon',
				),
			)
		);

		$content_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{dsm_font_icon}}',
				'attrs'   => array(
					'class' => 'dsm_content_icon',
				),
			)
		);

		$button = $this->render_button(
			array(
				'button_classname'    => array( 'dsm_button' ),
				'button_custom'       => $button_custom,
				'button_custom'       => '' !== $custom_slide_icon || '' !== $custom_slide_icon_tablet || '' !== $custom_slide_icon_phone ? 'on' : 'off',
				'button_rel'          => $button_rel,
				'button_text'         => $this->props['button_text'],
				'button_text_escaped' => true,
				'button_url'          => $button_url,
				'custom_icon'         => $custom_slide_icon,
				'custom_icon_tablet'  => $custom_slide_icon_tablet,
				'custom_icon_phone'   => $custom_slide_icon_phone,
				'url_new_window'      => $button_url_new_window,
				// 'has_wrapper'         => false,
				'display_button'      => $multi_view->has_value( 'button_text' ),
				'multi_view_data'     => $multi_view->render_attrs(
					array(
						'content' => '{{button_text}}',
					)
				),
			)
		);

		$title = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{dsm_circle_info_title}}',
				'attrs'   => array(
					'class' => 'dsm_text',
				),
			)
		);

		$circle_content = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{dsm_circle_info_content}}',
				'attrs'   => array(
					'class' => 'dsm-circle-info-description',
				),
			)
		);

		$circle_content_title = $multi_view->render_element(
			array(
				'tag'     => '' === $this->props['header_level'] ? $parent_header_level : $this->props['header_level'],
				'content' => '{{dsm_content_title}}',
				'attrs'   => array(
					'class' => 'dsm-title',
				),
			)
		);

		$order_class = self::get_module_order_class( $render_slug );

		$circle_info_item_circle_button = '';
		$circle_info_item_circle_button = sprintf(
			'<div class="dsm-circle-info-item-inner-wrapper %1$s %5$s"> 
       	        <div class="dsm-circle-info-button-wrapper">
				  <div class="dsm-circle-info-inner">
				  	%4$s
				    %3$s
				    %2$s
				   </div>
				   </div>
		</div>',
			$order_class,
			$title,
			'on' === $this->props['dsm_show_icon'] ? $circle_icon : '',
			'off' === $this->props['dsm_show_icon'] ? $circle_icon_image : '',
			'on' === $this->props['dsm_active_item_default'] ? 'dsm-circle-info-item-active' : ''
		);
		$circle_info_item_content       = '';
		$circle_info_item_content       = sprintf(
			'<div class="dsm-circle-info-content-wrapper %1$s %8$s">
				<div class="dsm-circle-info-content-inner-wrapper">
					%5$s
					%6$s
					%2$s
					%3$s
					%4$s
					%7$s
					</div>
			</div>',
			$order_class,
			'content' === $this->props['dsm_content_type'] ? $circle_content_title : '',
			'content' === $this->props['dsm_content_type'] ? $circle_content : '',
			'content' === $this->props['dsm_content_type'] && '' !== $this->props['button_text'] ? $button : '',
			'content' === $this->props['dsm_content_type'] && 'off' === $this->props['dsm_content_show_icon'] ? sprintf( '<div class="dsm-image"><img src="%1$s" /></div>', $this->props['dsm_content_image'] ) : '',
			'content' === $this->props['dsm_content_type'] && 'on' === $this->props['dsm_content_show_icon'] ? $content_icon : '',
			'shortcode' === $this->props['dsm_content_type'] ? do_shortcode( html_entity_decode( $this->props['shortcode_content'] ) ) : '',
			'on' === $this->props['dsm_active_item_default'] ? 'dsm-circle-info-item-active' : ''
		);

		$is_displayed = '' !== apply_filters( 'et_module_process_display_conditions', 'content', 'render', $this );

		if ( $is_displayed ) {
			$dsm_circle_info_button_markup[]  = $circle_info_item_circle_button;
			$dsm_circle_info_content_markup[] = $circle_info_item_content;
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-animate' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return '';
	}

	/**
	 * Filter multi view value.
	 *
	 * @since 3.27.1
	 *
	 * @see ET_Builder_Module_Helper_MultiViewOptions::filter_value
	 *
	 * @param mixed                                     $raw_value Props raw value.
	 * @param array                                     $args {
	 *                                         Context data.
	 *
	 *     @type string $context      Context param: content, attrs, visibility, classes.
	 *     @type string $name         Module options props name.
	 *     @type string $mode         Current data mode: desktop, hover, tablet, phone.
	 *     @type string $attr_key     Attribute key for attrs context data. Example: src, class, etc.
	 *     @type string $attr_sub_key Attribute sub key that availabe when passing attrs value as array such as styes. Example: padding-top, margin-botton, etc.
	 * }
	 * @param ET_Builder_Module_Helper_MultiViewOptions $multi_view Multiview object instance.
	 *
	 * @return mixed
	 */
	public function multi_view_filter_value( $raw_value, $args, $multi_view ) {
		$name = isset( $args['name'] ) ? $args['name'] : '';
		$mode = isset( $args['mode'] ) ? $args['mode'] : '';

		if ( $raw_value && 'font_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}

		if ( $raw_value && 'dsm_font_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}

		$fields_need_escape = array(
			'button_text',
		);

		if ( $raw_value && in_array( $name, $fields_need_escape, true ) ) {
			return $this->_esc_attr( $multi_view->get_name_by_mode( $name, $mode ), 'none', $raw_value );
		}

		return $raw_value;
	}

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		return $output;
	}

	public function apply_custom_margin_padding( $function_name, $slug, $type, $class, $important = false ) {
		$slug_value                   = $this->props[ $slug ];
		$slug_value_tablet            = $this->props[ $slug . '_tablet' ];
		$slug_value_phone             = $this->props[ $slug . '_phone' ];
		$slug_value_last_edited       = $this->props[ $slug . '_last_edited' ];
		$slug_value_responsive_active = et_pb_get_responsive_status( $slug_value_last_edited );

		if ( isset( $slug_value ) && ! empty( $slug_value ) ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value, $type, $important ),
				)
			);
		}

		if ( isset( $slug_value_tablet ) && ! empty( $slug_value_tablet ) && $slug_value_responsive_active ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value_tablet, $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( isset( $slug_value_phone ) && ! empty( $slug_value_phone ) && $slug_value_responsive_active ) {
			ET_Builder_Element::set_style(
				$function_name,
				array(
					'selector'    => $class,
					'declaration' => et_builder_get_element_style_css( $slug_value_phone, $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
		if ( et_builder_is_hover_enabled( $slug, $this->props ) ) {
			if ( isset( $this->props[ $slug . '__hover' ] ) ) {
				$hover = $this->props[ $slug . '__hover' ];
				ET_Builder_Element::set_style(
					$function_name,
					array(
						'selector'    => $this->add_hover_to_order_class( $class ),
						'declaration' => et_builder_get_element_style_css( $hover, $type, $important ),
					)
				);
			}
		}
	}

	/**
	 * Force load global styles.
	 *
	 * @param array $assets_list Current global assets on the list.
	 *
	 * @return array
	 */
	public function dsm_load_required_divi_assets( $assets_list, $assets_args, $instance ) {
		$assets_prefix  = et_get_dynamic_assets_path();
		$all_shortcodes = $instance->get_saved_page_shortcodes();

		if ( ! isset( $assets_list['dsm_animate'] ) ) {
			$assets_list['dsm_animate'] = array(
				'css' => DSM_DIR_PATH . 'public/css/animate.css',
			);
		}

		if ( ! isset( $assets_list['et_icons_all'] ) ) {
			$assets_list['et_icons_all'] = array(
				'css' => "{$assets_prefix}/css/icons_all.css",
			);
		}

		if ( ! isset( $assets_list['et_icons_fa'] ) ) {
			$assets_list['et_icons_fa'] = array(
				'css' => "{$assets_prefix}/css/icons_fa_all.css",
			);
		}

		return $assets_list;
	}
}

new DSM_Circle_Info_Child();
