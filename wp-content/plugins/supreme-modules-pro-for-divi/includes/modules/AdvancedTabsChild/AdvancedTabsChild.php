<?php

use DiviSupreme\Classes\DiviSupreme_Helpers;

class DSM_Advanced_Tabs_Child extends ET_Builder_Module {



	public $slug       = 'dsm_advanced_tabs_child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name                        = esc_html__( 'Supreme Advanced Tabs Child', 'dsm-supreme-modules-pro-for-divi' );
		$this->type                        = 'child';
		$this->advanced_setting_title_text = esc_html__( 'Advanced Tabs', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_title_var             = 'admin_title';
		$this->child_title_fallback_var    = 'dsm_title';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'tab'                     => esc_html__( 'Tab Title', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_icon_image'          => array(
						'title'             => esc_html__( 'Tab Icon & Image', 'dsm-supreme-modules-pro-for-divi' ),
						'tabbed_subtoggles' => true,
						'sub_toggles'       => array(
							'inactive' => array(
								'name' => esc_html__( 'Inactive State', 'dsm-supreme-modules-pro-for-divi' ),
							),
							'active'   => array(
								'name' => esc_html__( 'Active State', 'dsm-supreme-modules-pro-for-divi' ),
							),
						),
					),
					'content'                 => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_title_subtitle_link' => esc_html__( 'Title & Subtitle Links', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),

			'advanced'   => array(
				'toggles' => array(
					'image_icon'         => esc_html__( 'Tab Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'content_image_icon' => esc_html__( 'Content Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_tabs'           => esc_html__( 'Tabs', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_tabs_subtitle'  => esc_html__( 'Tabs Subtitle', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_content'        => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
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
				'tab_title'        => array(
					'label'          => esc_html__( 'Tab', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm-title, .dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm-title a',
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
					'toggle_slug'    => 'dsm_tabs',
				),

				'tab_subtitle'     => array(
					'label'          => esc_html__( 'Subtitle', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm-tab-subtitle, .dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm-tab-subtitle a',
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
					'toggle_slug'    => 'dsm_tabs_subtitle',
				),

				'content_title'    => array(
					'label'          => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '.dsm-advanced-tabs-content-wrapper %%order_class%% .dsm-inner-content .dsm-title',
					),

					'header_level'   => array(
						'default' => 'h2',
					),

					'font_size'      => array(
						'default' => '24px',
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
					'toggle_slug'    => 'dsm_content',
				),

				'tab_content_text' => array(
					'label'          => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),

					'css'            => array(
						'main' => '.dsm-advanced-tabs-container .dsm-advanced-tabs-content-wrapper %%order_class%% .dsm-inner-content .dsm-content',
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
					'toggle_slug'    => 'dsm_content',
				),
			),

			'button'         => array(
				'button' => array(
					'label'          => et_builder_i18n( 'Button' ),
					'css'            => array(
						'main'         => '.et_pb_module.dsm_advanced_tabs %%order_class%% .dsm-inner-content .et_pb_button',
						'limited_main' => '.et_pb_module.dsm_advanced_tabs %%order_class%% .dsm-inner-content .et_pb_button',
						'alignment'    => '.et_pb_module.dsm_advanced_tabs %%order_class%% .dsm-inner-content .et_pb_button_wrapper',
					),
					'use_alignment'  => true,
					'box_shadow'     => array(
						'css' => array(
							'main'      => '.et_pb_module.dsm_advanced_tabs %%order_class%% .dsm-inner-content .et_pb_button',
							'important' => true,
						),
					),
					'margin_padding' => array(
						'css' => array(
							'important' => 'all',
						),
					),
				),
			),

			'borders'        => array(
				'default'                       => false,
				'dsm_image_icon_border'         => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm_icon, .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm-image',
							'border_styles' => '.dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm_icon, .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm-image',
							'important'     => 'all',
						),
					),

					'label_prefix' => esc_html__( 'Image/Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'image_icon',
				),

				'dsm_content_image_icon_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-icon, %%order_class%%.dsm-content-wrapper .dsm-image',
							'border_styles' => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-icon, %%order_class%%.dsm-content-wrapper .dsm-image',
							'important'     => 'all',
						),
					),

					'label_prefix' => esc_html__( 'Image/Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'content_image_icon',
				),
			),

			'box_shadow'     => array(
				'default'            => false,

				'tabs_image_icon'    => array(
					'css'         => array(
						'main' => '.dsm-advanced-tabs-container %%order_class%%.dsm-tab .dsm_icon,%%order_class%%.dsm-tab .dsm-image',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'image_icon',
				),

				'content_image_icon' => array(
					'css'         => array(
						'main' => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-icon, %%order_class%%.dsm-content-wrapper .dsm-image',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'content_image_icon',
				),
			),

			'image_icon'     => array(
				'image_icon' => array(
					'margin_padding'  => array(
						'css' => array(
							'important' => 'all',
						),
					),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image_icon',
					'label'           => et_builder_i18n( 'Image/Icon' ),
					'css'             => array(
						'padding' => '%%order_class%%.dsm-tab .dsm_icon,%%order_class%%.dsm-tab .dsm-image',
						'margin'  => '%%order_class%%.dsm-tab .dsm_icon,%%order_class%%.dsm-tab .dsm-image',
						'main'    => '%%order_class%%.dsm-tab .dsm_icon,%%order_class%%.dsm-tab .dsm-image',
					),
				),
			),

			'background'     => array(
				'css' => array(
					'main'      => '.dsm-advanced-tabs-container .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper%%order_class%%',
					'important' => true,
				),
			),

			'margin_padding' => false,
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
			'admin_title'                      => array(
				'label'       => esc_html__( 'Admin Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the flip box item in the builder for easy identification.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'admin_label',
			),
			'module_id'                        => array(
				'label'           => esc_html__( 'CSS ID', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign a unique CSS ID to the element which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class'                     => array(
				'label'           => esc_html__( 'CSS Class', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign any number of CSS Classes to the element, separated by spaces, which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'dsm_title'                        => array(
				'label'            => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				// 'default_on_front' => 'Tab Title',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'The title of your tab..', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'tab',
				'mobile_options'   => true,
			),

			'dsm_title_url'                    => array(
				'label'           => esc_html__( 'Title URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_title_subtitle_link',
				'dynamic_content' => 'url',
			),

			'dsm_title_url_new_window'         => array(
				'label'           => esc_html__( 'Title URL Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'dsm_title_subtitle_link',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_subtitle_url'                 => array(
				'label'           => esc_html__( 'Subtitle URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'dsm_title_subtitle_link',
				'dynamic_content' => 'url',
			),

			'dsm_subtitle_url_new_window'      => array(
				'label'           => esc_html__( 'Subtitle URL Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'dsm_title_subtitle_link',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_title_subtitle_notice'        => array(
				'label'           => '',
				'type'            => 'warning',
				'value'           => true,
				'display_if'      => true,
				'message'         => esc_html__( 'Only use when using the "Hover" Trigger, using with "Click" trigger might create issues.', 'dsm-supreme-modules-pro-for-divi' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_title_subtitle_link',
			),

			'dsm_subtitle'                     => array(
				'label'            => esc_html__( 'Subtitle', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'The subtitle of your tab will appear below your title', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'tab',
				'mobile_options'   => true,
			),

			'dsm_use_icon_image'               => array(
				'label'           => esc_html__( 'Use Icon / Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tab_icon_image',
				'sub_toggle'      => 'inactive',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_image'                        => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'default_on_child'   => true,
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'tab_icon_image',
				'sub_toggle'         => 'inactive',
				'show_if'            => array(
					'dsm_use_icon'       => 'off',
					'dsm_use_icon_image' => 'on',
				),
			),

			'dsm_use_icon'                     => array(
				'label'           => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tab_icon_image',
				'sub_toggle'      => 'inactive',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_use_icon_image' => 'on',
				),
			),

			'font_icon'                        => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tab_icon_image',
				'sub_toggle'      => 'inactive',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_use_icon'       => 'on',
					'dsm_use_icon_image' => 'on',
				),
			),

			// active state.
			'dsm_use_icon_image_active'        => array(
				'label'           => esc_html__( 'Use Icon / Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tab_icon_image',
				'sub_toggle'      => 'active',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_image_active'                 => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'default_on_child'   => true,
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'tab_icon_image',
				'sub_toggle'         => 'active',
				'show_if'            => array(
					'dsm_use_icon_active'       => 'off',
					'dsm_use_icon_image_active' => 'on',
				),
			),

			'dsm_use_icon_active'              => array(
				'label'           => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tab_icon_image',
				'sub_toggle'      => 'active',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_use_icon_image_active' => 'on',
				),
			),

			'font_icon_active'                 => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'tab_icon_image',
				'sub_toggle'      => 'active',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_use_icon_active'       => 'on',
					'dsm_use_icon_image_active' => 'on',
				),
			),

			'dsm_content_type'                 => array(
				'label'           => esc_html__( 'Content Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'content',
				'option_category' => 'configuration',
				'options'         => array(
					'content'   => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'library'   => esc_html__( 'Divi Library', 'dsm-supreme-modules-pro-for-divi' ),
					'shortcode' => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_content_library_layout'       => array(
				'label'            => esc_html__( 'Layouts', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'default_on_front' => 'select',
				'options'          => $this->get_divi_library_options(),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'content',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'          => array(
					'dsm_content_type' => 'library',
				),
				'computed_affects' => array(
					'__library_one',
				),
			),

			'__library_layout'                 => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DSM_Advanced_Tabs_Child', 'get_content_one' ),
				'computed_depends_on' => array(
					'dsm_content_library_layout',
				),
			),

			'shortcode_content'                => array(
				'label'       => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'tab_slug'    => 'general',
				'toggle_slug' => 'content',
				'show_if'     => array(
					'dsm_content_type' => 'shortcode',
				),
			),

			'dsm_content_title'                => array(
				'label'            => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				// 'default_on_front' => 'Title Here',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'content',
				'mobile_options'   => true,

				'show_if'          => array(
					'dsm_content_type' => 'content',
				),
			),

			'dsm_content'                      => array(
				'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'tiny_mce',
				// 'default_on_front' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'content',
				'mobile_options'  => true,

				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),

			'dsm_content_use_icon_image'       => array(
				'label'           => esc_html__( 'Use Icon / Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),

			'dsm_content_image'                => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'dynamic_content'    => 'image',
				// 'default'            => 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSIxMDgwIiBoZWlnaHQ9IjU0MCIgdmlld0JveD0iMCAwIDEwODAgNTQwIj48ZyBmaWxsPSJub25lIiBmaWxsLXJ1bGU9ImV2ZW5vZGQiPjxwYXRoIGZpbGw9IiNFQkVCRUIiIGQ9Ik0wIDBoMTA4MHY1NDBIMHoiLz48cGF0aCBkPSJNNDQ1LjY0OSA1NDBoLTk4Ljk5NUwxNDQuNjQ5IDMzNy45OTUgMCA0ODIuNjQ0di05OC45OTVsMTE2LjM2NS0xMTYuMzY1YzE1LjYyLTE1LjYyIDQwLjk0Ny0xNS42MiA1Ni41NjggMEw0NDUuNjUgNTQweiIgZmlsbC1vcGFjaXR5PSIuMSIgZmlsbD0iIzAwMCIgZmlsbC1ydWxlPSJub256ZXJvIi8+PGNpcmNsZSBmaWxsLW9wYWNpdHk9Ii4wNSIgZmlsbD0iIzAwMCIgY3g9IjMzMSIgY3k9IjE0OCIgcj0iNzAiLz48cGF0aCBkPSJNMTA4MCAzNzl2MTEzLjEzN0w3MjguMTYyIDE0MC4zIDMyOC40NjIgNTQwSDIxNS4zMjRMNjk5Ljg3OCA1NS40NDZjMTUuNjItMTUuNjIgNDAuOTQ4LTE1LjYyIDU2LjU2OCAwTDEwODAgMzc5eiIgZmlsbC1vcGFjaXR5PSIuMiIgZmlsbD0iIzAwMCIgZmlsbC1ydWxlPSJub256ZXJvIi8+PC9nPjwvc3ZnPg==',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'hide_metadata'      => true,
				'affects'            => array(
					'content_image_alt',
					'content_image_title_text',
				),
				'description'        => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'content',
				'show_if'            => array(
					'dsm_content_use_icon_image' => 'on',
					'dsm_content_type'           => 'content',
					'dsm_content_use_icon'       => 'off',
				),
			),

			'dsm_content_image_alt'            => array(
				'label'           => esc_html__( 'Content Image Alternative Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'dsm_content_image',
				),
				'description'     => esc_html__( 'This defines the HTML ALT text. A short description of your image can be placed here.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'dsm_content_image_title_text'     => array(
				'label'           => esc_html__( 'Content Image Title Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'dsm_content_image',
				),
				'description'     => esc_html__( 'This defines the HTML Title text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),

			'dsm_content_use_icon'             => array(
				'label'           => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_content_use_icon_image' => 'on',
				),
			),

			'dsm_content_font_icon'            => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_content_use_icon'       => 'on',
					'dsm_content_use_icon_image' => 'on',
				),
			),

			'dsm_content_image_icon_placement' => array(
				'label'           => esc_html__( 'Image/Icon Placement', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'top',
				'option_category' => 'configuration',
				'options'         => array(
					'top'  => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'left' => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

			),

			'button_text'                      => array(
				'label'           => esc_html__( 'Button Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'content',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),

			'button_url'                       => array(
				'label'           => esc_html__( 'Button Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'content',
				'dynamic_content' => 'url',

				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),

			'url_new_window'                   => array(
				'label'           => esc_html__( 'Button Link Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),

			'dsm_tabs_image_width'             => array(
				'label'           => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_use_icon'       => 'off',
					'dsm_use_icon_image' => 'on',
				),
			),

			'dsm_tabs_icon_size'               => array(
				'label'           => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'show_if'         => array(
					'dsm_use_icon'       => 'on',
					'dsm_use_icon_image' => 'on',
				),
			),

			'dsm_tabs_icon_color'              => array(
				'label'       => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'image_icon',

				'show_if'     => array(
					'dsm_use_icon'       => 'on',
					'dsm_use_icon_image' => 'on',
				),
			),

			'dsm_tabs_active_icon_color'       => array(
				'label'       => esc_html__( 'Active Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'image_icon',

				'show_if'     => array(
					'dsm_use_icon'       => 'on',
					'dsm_use_icon_image' => 'on',
				),
			),

			'dsm_content_image_icon_alignment' => array(
				'label'           => esc_html__( 'Image / Icon Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'multiple_buttons',
				'options'         => array(
					'start'  => array(
						'title' => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					),
					'center' => array(
						'title' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					),
					'end'    => array(
						'title' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
					),
				),
				'default'         => '',
				'toggleable'      => true,
				'multi_selection' => false,
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'content_image_icon',
			),

			'dsm_content_icon_size'            => array(
				'label'           => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'content_image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'show_if'         => array(
					'dsm_content_use_icon_image' => 'on',
					'dsm_content_use_icon'       => 'on',
				),
			),

			'dsm_content_image_width'          => array(
				'label'           => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '',
				'default_unit'    => '%',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'content_image_icon',

				'show_if'         => array(
					'dsm_content_use_icon_image' => 'on',
					'dsm_content_use_icon'       => 'off',
				),
			),

			'dsm_content_icon_color'           => array(
				'label'       => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'content_image_icon',

				'show_if'     => array(
					'dsm_content_use_icon_image' => 'on',
					'dsm_content_use_icon'       => 'on',
				),
			),

			'dsm_content_margin'               => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'content_image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_content_padding'              => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'default'         => '',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'content_image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),
		);
	}

	protected function get_divi_library_options() {
		$library = DiviSupreme_Helpers::dsm_load_library();
		return $library;
	}
	/*
	protected function get_divi_library_options() {

		$args = array(
			'post_type'      => 'et_pb_layout',
			'posts_per_page' => -1,
		);

		$dsm_library_list = array( 'none' => '-- Select Layout --' );

		if ( $categories = get_posts( $args ) ) {
			foreach ( $categories as $category ) {
				$types = wp_get_post_terms( $category->ID, 'layout_type' );

				$current_layout_type = isset( $types[0]->name ) ? isset( $types[0]->name ) : '';
				$dsm_library_list[ sprintf( '%1$s|%2$s', $category->ID, $current_layout_type ) ] = empty( $category->post_title ) ? 'Unknown Layout ' . $category->ID : $category->post_title;

			}
		}

		return $dsm_library_list;
	}*/

	public static function get_content_one( $args = array() ) {

		$defaults = array();
		$args     = wp_parse_args( $args, $defaults );

		global $dsm_advanced_tabs_content, $dsm_advanced_tabs;

		$dsm_advanced_tabs_content_copy = $dsm_advanced_tabs_content;
		$dsm_advanced_tabs_copy         = $dsm_advanced_tabs;

		if ( empty( $args['dsm_content_library_layout'] ) ) {
			return;
		}

		ob_start();

		ET_Builder_Element::clean_internal_modules_styles();

		$dsm_advanced_tabs_content = array();
		$dsm_advanced_tabs         = array();

		$shortcode = sprintf(
			'[et_pb_section global_module="%1$s" template_type="section" fullwidth="on"][/et_pb_section]',
			$args['dsm_content_library_layout']
		);

		$dsm_advanced_tabs_content = $dsm_advanced_tabs_content_copy;
		$dsm_advanced_tabs         = $dsm_advanced_tabs_copy;

		add_action(
			'wp_footer',
			function () use ( $shortcode, $args ) {

				// echo $shortcode;

				// ET_Builder_Element::clean_internal_modules_styles();.
				/*
				$renderlayout = do_shortcode(
				sprintf(
					'[et_pb_section global_module="%1$s" template_type="section" fullwidth="on"][/et_pb_section]',
					$args['dsm_content_library_layout']
				)
				);

				$renderlayout_styles = preg_replace( '/et_pb_([a-z]+)_(\d+)( |"|.)/', 'et_pb_dsm_${1}_${2}${3}', $renderlayout );
				echo et_core_esc_previously( $renderlayout );*/

				$internal_style = ET_Builder_Element::get_style();
				ET_Builder_Element::clean_internal_modules_styles( false );

				if ( $internal_style ) {
					// $cleaned_styles = preg_replace( '/et_pb_([a-z]+)_(\d+)( |"|.)/', 'et_pb_dsm_${1}_${2}${3}', $internal_style );.
					$modules_style = sprintf(
						'<style id="dsm_content_library_layout_styles-%2$s" type="text/css" class="dsm_content_library_layout_styles-%2$s">
					%1$s
				</style>',
						$internal_style,
						$args['dsm_content_library_layout']
					);
				}
				/*
				if ( function_exists( 'et_core_is_fb_enabled' ) && et_core_is_fb_enabled() ) {
					echo et_core_esc_previously( $modules_style );
				}*/

				ob_flush();
				echo et_core_esc_previously( $modules_style );
			}
		);

		return $shortcode;
	}

	protected function render_content_one() {
		$dsm_content_library_layout = $this->props['dsm_content_library_layout'];
		$args                       = array( 'dsm_content_library_layout' => $dsm_content_library_layout );

		return $this->get_content_one( $args );
	}

	public function render( $attrs, $content, $render_slug ) {

		global $dsm_advanced_tabs, $dsm_advanced_tabs_content, $dsm_parent_level, $et_pb_slider_custom_icon, $et_pb_slider_custom_icon_tablet, $et_pb_slider_custom_icon_phone, $deep_link;

		$display_condition = isset( $attrs['display_conditions'] ) ? json_decode( base64_decode( $attrs['display_conditions'] ), true ) : array();

		$multi_view                   = et_pb_multi_view_options( $this );
		$parent_header_level          = self::$_->array_get( $dsm_parent_level, 'content_title_level', '' );
		$dsm_content_image_alt        = $this->props['dsm_content_image_alt'];
		$dsm_content_image_title_text = $this->props['dsm_content_image_title_text'];
		$button_url                   = $this->props['button_url'];
		$button_custom                = $this->props['custom_button'];
		$button_rel                   = $this->props['button_rel'];
		$custom_icon_values           = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon                  = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet           = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone            = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';

		$custom_slide_icon        = 'on' === $button_custom && '' !== $custom_icon ? $custom_icon : $et_pb_slider_custom_icon;
		$custom_slide_icon_tablet = 'on' === $button_custom && '' !== $custom_icon_tablet ? $custom_icon_tablet : $et_pb_slider_custom_icon_tablet;
		$custom_slide_icon_phone  = 'on' === $button_custom && '' !== $custom_icon_phone ? $custom_icon_phone : $et_pb_slider_custom_icon_phone;

		$dsm_tabs_image_width_last_edited        = $this->props['dsm_tabs_image_width_last_edited'];
		$dsm_tabs_image_width_responsive_active  = et_pb_get_responsive_status( $dsm_tabs_image_width_last_edited );
		$dsm_tabs_icon_size_last_edited          = $this->props['dsm_tabs_icon_size_last_edited'];
		$dsm_tabs_icon_size_responsive_active    = et_pb_get_responsive_status( $dsm_tabs_icon_size_last_edited );
		$dsm_content_icon_size_last_edited       = $this->props['dsm_content_icon_size_last_edited'];
		$dsm_content_icon_size_responsive_active = et_pb_get_responsive_status( $dsm_content_icon_size_last_edited );

		$dsm_content_margin_last_edited       = $this->props['dsm_content_margin_last_edited'];
		$dsm_content_margin_responsive_active = et_pb_get_responsive_status( $dsm_content_margin_last_edited );

		$dsm_content_padding_last_edited       = $this->props['dsm_content_padding_last_edited'];
		$dsm_content_padding_responsive_active = et_pb_get_responsive_status( $dsm_content_padding_last_edited );

		$dsm_content_image_width_last_edited       = $this->props['dsm_content_image_width_last_edited'];
		$dsm_content_image_width_responsive_active = et_pb_get_responsive_status( $dsm_content_image_width_last_edited );

		$dsm_content_image_icon_placement_last_edited       = $this->props['dsm_content_image_icon_placement_last_edited'];
		$dsm_content_image_icon_placement_responsive_active = et_pb_get_responsive_status( $dsm_content_image_icon_placement_last_edited );

		$dsm_content_image_icon_alignment_last_edited       = $this->props['dsm_content_image_icon_alignment_last_edited'];
		$dsm_content_image_icon_alignment_responsive_active = et_pb_get_responsive_status( $dsm_content_image_icon_alignment_last_edited );

		$order_class = self::get_module_order_class( $render_slug );
		$multi_view  = et_pb_multi_view_options( $this );

		// background image setting css.

		if ( 'cover' === $this->props['background_size'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-content-wrapper',
					'declaration' => 'background-size: cover !important;',
				)
			);
		}

		if ( 'no-repeat' === $this->props['background_repeat'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-content-wrapper',
					'declaration' => 'background-repeat: no-repeat !important;',
				)
			);
		}

		if ( 'center' === $this->props['background_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-content-wrapper',
					'declaration' => 'background-position: center !important;',
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%%.dsm-content-wrapper .dsm-image',
				'declaration' => 'line-height: 0.5em;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%%.dsm-content-wrapper .dsm-icon',
				'declaration' => 'line-height: 1;',
			)
		);

		if ( 'top' === $this->props['dsm_content_image_icon_placement'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-inner-content-wrapper',
					'declaration' => 'display: -webkit-box;
                                  display: -ms-flexbox;
                                  display: flex;
                                  -webkit-box-orient: vertical;
                                  -webkit-box-direction: normal;
                                  -ms-flex-direction: column;
                                  flex-direction: column;',
				)
			);
		}

		if ( $dsm_content_image_icon_placement_responsive_active ) {
			if ( 'top' === $this->props['dsm_content_image_icon_placement_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-inner-content-wrapper',
						'declaration' => 'display: -webkit-box;
									  display: -ms-flexbox;
									  display: flex;
									  -webkit-box-orient: vertical;
									  -webkit-box-direction: normal;
									  -ms-flex-direction: column;
									  flex-direction: column;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			if ( 'top' === $this->props['dsm_content_image_icon_placement_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-inner-content-wrapper',
						'declaration' => 'display: -webkit-box;
									  display: -ms-flexbox;
									  display: flex;
									  -webkit-box-orient: vertical;
									  -webkit-box-direction: normal;
									  -ms-flex-direction: column;
									  flex-direction: column;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( 'left' === $this->props['dsm_content_image_icon_placement_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-inner-content-wrapper',
						'declaration' => 'display: -webkit-box;
                                  display: -ms-flexbox;
                                  display: flex;
                                  -webkit-box-orient: horizontal;
                                  -webkit-box-direction: normal;
                                  -ms-flex-direction: row;
                                  flex-direction: row; ',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			if ( 'left' === $this->props['dsm_content_image_icon_placement_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-inner-content-wrapper',
						'declaration' => 'display: -webkit-box;
                                  display: -ms-flexbox;
                                  display: flex;
                                  -webkit-box-orient: horizontal;
                                  -webkit-box-direction: normal;
                                  -ms-flex-direction: row;
                                  flex-direction: row; ',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( 'left' === $this->props['dsm_content_image_icon_placement'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-inner-content-wrapper',
					'declaration' => 'display: -webkit-box;
                                  display: -ms-flexbox;
                                  display: flex;
                                  -webkit-box-orient: horizontal;
                                  -webkit-box-direction: normal;
                                  -ms-flex-direction: row;
                                  flex-direction: row; ',
				)
			);
		}

		if ( 'library' === $this->props['dsm_content_type'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-inner-content',
					'declaration' => 'width: 100% !important;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-content-wrapper',
					'declaration' => '-webkit-box-orient:vertical;
                                  -webkit-box-direction:normal;
                                  -ms-flex-direction:column;
                                  flex-direction:column;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_content_image_icon_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm-content-wrapper .dsm-icon,%%order_class%%.dsm-content-wrapper .dsm-image',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( $this->props['dsm_tabs_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm_icon',
					'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_tabs_icon_color'] ),
				)
			);
		}

		if ( $this->props['dsm_tabs_active_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab.dsm-active .dsm_icon',
					'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_tabs_active_icon_color'] ),
				)
			);
		}

		// tabs image width responsive work.
		if ( $this->props['dsm_tabs_image_width'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_tabs_image_width'] ),
				)
			);
		}

		if ( $dsm_tabs_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_tabs_image_width_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_tabs_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_tabs_image_width_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// tabs icon size responsive work.
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm_icon',
				'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_tabs_icon_size'] ),
			)
		);

		if ( $dsm_tabs_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_tabs_icon_size_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_tabs_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-wrapper %%order_class%%.dsm-tab .dsm_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_tabs_icon_size_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// content icon size responsive work.
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm_content_icon',
				'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_content_icon_size'] ),
			)
		);

		if ( $dsm_content_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm_content_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_content_icon_size_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm_content_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_content_icon_size_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_content_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm_content_icon',
					'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_content_icon_color'] ),
				)
			);
		}

		$content_width_desktop = 100 - (int) $this->props['dsm_content_image_width'] . '%';
		$content_width_tablet  = 100 - (int) $this->props['dsm_content_image_width_tablet'] . '%';
		$content_width_phone   = 100 - (int) $this->props['dsm_content_image_width_phone'] . '%';

		// content image / icon alignment.
		if ( '' !== $this->props['dsm_content_image_icon_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-container %%order_class%%.dsm-content-wrapper.dsm-content-image .dsm-image',
					'declaration' => sprintf( 'align-self: %1$s;', $this->props['dsm_content_image_icon_alignment'] ),
				)
			);
		}

		if ( $dsm_content_image_icon_alignment_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-container %%order_class%%.dsm-content-wrapper.dsm-content-image .dsm-image',
					'declaration' => sprintf( 'align-self: %1$s;', $this->props['dsm_content_image_icon_alignment_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_image_icon_alignment_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-container %%order_class%%.dsm-content-wrapper.dsm-content-image .dsm-image',
					'declaration' => sprintf( 'align-self: %1$s;', $this->props['dsm_content_image_icon_alignment_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// content image width responsive work.
		if ( $this->props['dsm_content_image_width'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-container %%order_class%%.dsm-content-wrapper.dsm-content-image .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_content_image_width'] ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-container %%order_class%%.dsm-content-wrapper.dsm-content-image.dsm-left .dsm-inner-content',
					'declaration' => sprintf( 'width: %1$s;', $content_width_desktop ),
				)
			);
		}

		if ( $dsm_content_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-container %%order_class%%.dsm-content-wrapper.dsm-content-image .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_content_image_width_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-container %%order_class%%.dsm-content-wrapper.dsm-content-image.dsm-left .dsm-inner-content',
					'declaration' => sprintf( 'width: %1$s;', $content_width_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-container %%order_class%%.dsm-content-wrapper.dsm-content-image .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_content_image_width_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-advanced-tabs-container %%order_class%%.dsm-content-wrapper.dsm-content-image.dsm-left .dsm-inner-content',
					'declaration' => sprintf( 'width: %1$s;', $content_width_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'font_icon',
				'selector'       => '%%order_class%%.dsm-tab .dsm_icon',
				'important'      => true,
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
				'base_attr_name' => 'font_icon_active',
				'selector'       => '%%order_class%%.dsm-tab.dsm-tab-active-state .dsm_icon',
				'important'      => true,
				'processor'      => array(
					'ET_Builder_Module_Helper_Style_Processor',
					'process_extended_icon',
				),
			)
		);

		$tab_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{font_icon}}',
				'attrs'   => array(
					'class' => 'dsm_icon',
				),
			)
		);

		$tab_icon_active = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{font_icon_active}}',
				'attrs'   => array(
					'class' => 'dsm_icon',
				),
			)
		);

		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'dsm_content_font_icon',
				'selector'       => '.dsm-content-wrapper%%order_class%% .dsm_content_icon',
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
				'content' => '{{dsm_content_font_icon}}',
				'attrs'   => array(
					'class' => 'dsm_content_icon',
				),
			)
		);

		$margin    = 'margin';
		$padding   = 'padding';
		$important = false;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-icon, .dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin'], $margin, $important ),
			)
		);

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-icon, .dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-icon, .dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-icon, .dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding'], $padding, $important ),
			)
		);

		if ( $dsm_content_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-icon, .dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-icon, .dsm_advanced_tabs %%order_class%%.dsm-content-wrapper .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// Render Button.
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
				'url_new_window'      => $this->props['url_new_window'],
				'display_button'      => $multi_view->has_value( 'button_text' ),
				'multi_view_data'     => $multi_view->render_attrs(
					array(
						'content'    => '{{button_text}}',
						'visibility' => array(
							'button_text' => '__not_empty',
						),
					)
				),
			)
		);

		// $dsm_advanced_tab_index = preg_replace( '/[^0-9]/', '', $order_class );
		$dsm_advanced_tab_index = uniqid();

		$tab_title_no_link = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{dsm_title}}',
				'attrs'   => array(
					'class' => 'dsm-title',
				),
			)
		);

		$tab_title_with_link = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => sprintf( '<div class="dsm-title"><a href="%1$s" %2$s>{{dsm_title}}</a></div>', trim( $this->props['dsm_title_url'] ), 'on' === $this->props['dsm_title_url_new_window'] ? 'target="_blank" ' : '' ),
				'attrs'   => array(
					'class' => 'dsm-title',
				),
			)
		);

		$tab_sub_title_no_link = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{dsm_subtitle}}',
				'attrs'   => array(
					'class' => 'dsm-tab-subtitle',
				),
			)
		);

		$tab_sub_title_with_link = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => sprintf( '<div class="dsm-tab-subtitle"><a href="%1$s" %2$s>{{dsm_subtitle}}</a></div>', trim( $this->props['dsm_subtitle_url'] ), 'on' === $this->props['dsm_subtitle_url_new_window'] ? 'target="_blank" ' : '' ),
				'attrs'   => array(
					'class' => 'dsm-tab-subtitle',
				),
			)
		);

		$tab_markup = '';
		$tab_markup = sprintf(
			'<div id="dsm-tab-%6$s" class="dsm-tab %4$s%5$s%10$s%14$s" role="tab"  aria-selected="true" aria-controls="dsm-panel-%11$s" tabindex="0" data-tabId="%15$s">
			     %3$s
			     %2$s
				 %13$s
				 %12$s 
				 <div class="dsm-title-wrapper">
			     %1$s
				 %8$s
				 %7$s
				 %9$s
				 </div>
			  </div>
		',
			'' !== $this->props['dsm_title'] && '' === trim( $this->props['dsm_title_url'] ) ? $tab_title_no_link : '',
			'on' === $this->props['dsm_use_icon_image'] && 'off' === $this->props['dsm_use_icon'] && '' !== $this->props['dsm_image'] ? sprintf( '<div class="dsm-image"><img src="%1$s"/></div>', $this->props['dsm_image'] ) : '',
			'on' === $this->props['dsm_use_icon_image'] && 'on' === $this->props['dsm_use_icon'] ? sprintf( '<div class="dsm-icon-wrapper">%1$s</div>', $tab_icon ) : '',
			$order_class,
			// Module classnames.
			isset( $this->props['module_class'] ) && '' !== $this->props['module_class'] ? esc_attr( ' ' . $this->props['module_class'] ) : '',
			// Module ID.
			esc_attr( esc_attr( $dsm_advanced_tab_index ) . ' ' . $this->props['module_id'] ),
			'' !== $this->props['dsm_subtitle'] && '' === trim( $this->props['dsm_subtitle_url'] ) ? $tab_sub_title_no_link : '',
			'' !== $this->props['dsm_title'] && '' !== trim( $this->props['dsm_title_url'] ) ? $tab_title_with_link : '',
			'' !== $this->props['dsm_subtitle'] && '' !== trim( $this->props['dsm_subtitle_url'] ) ? $tab_sub_title_with_link : '',
			'on' === $deep_link ? sprintf( ' %1$s', preg_replace( '/[^a-zA-Z0-9_]/s', '', strtolower( $this->props['dsm_title'] ) ) ) : '',
			esc_attr( $dsm_advanced_tab_index ),
			// active state.
			'on' === $this->props['dsm_use_icon_image_active'] && 'off' === $this->props['dsm_use_icon_active'] && '' !== $this->props['dsm_image_active'] ? sprintf( '<div class="dsm-image dsm-image-active"><img src="%1$s"/></div>', $this->props['dsm_image_active'] ) : '',
			'on' === $this->props['dsm_use_icon_image_active'] && 'on' === $this->props['dsm_use_icon_active'] ? sprintf( '<div class="dsm-icon-wrapper">%1$s</div>', $tab_icon_active ) : '',
			'on' === $this->props['dsm_use_icon_image_active'] ? esc_attr( ' dsm-tab-active-state' ) : '',
			esc_attr( $dsm_advanced_tab_index )
		);
		$content_markup = '';

		$dsm_content = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{dsm_content}}',
				'attrs'   => array(
					'class' => 'dsm-content',
				),
			)
		);

		$static_content    = '' !== $this->props['dsm_content'] ? html_entity_decode( $dsm_content ) : '';
		$library_content   = 'select' === $this->props['dsm_content_library_layout'] ? '<h1>Please Select Layout</h1>' : $this->render_content_one();
		$shortcode_content = '' !== $this->props['shortcode_content'] ? html_entity_decode( $this->props['shortcode_content'] ) : '';
		$final_content     = '';

		if ( empty( $dsm_content_image_alt ) || empty( $dsm_content_image_title_text ) ) {
			$raw_src   = et_()->array_get( $this->attrs_unprocessed, 'dsm_content_image' );
			$src_value = et_builder_parse_dynamic_content( $raw_src );

			if ( empty( $dsm_content_image_alt ) ) {
				$dsm_content_image_alt = get_post_meta( attachment_url_to_postid( $raw_src ), '_wp_attachment_image_alt', true );
			}

			// If there is no user-specified TITLE attribute text, check the WP
			// Media Library entry for text that may have been added there.
			if ( empty( $dsm_content_image_title_text ) ) {
				$dsm_content_image_title_text = get_the_title( attachment_url_to_postid( $raw_src ) );
			}
		}

		$image_attrs              = array(
			'src'   => '{{dsm_content_image}}',
			'alt'   => $dsm_content_image_alt,
			'title' => $dsm_content_image_title_text,
		);
		$dsm_content_image_output = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => $image_attrs,
				'required' => 'dsm_content_image',
			)
		);

		switch ( $this->props['dsm_content_type'] ) {
			case 'library':
				$final_content = $library_content;
				break;
			case 'content':
				$final_content = $static_content;
				break;
			case 'shortcode':
				$final_content = do_shortcode( $shortcode_content );
				break;
			default:
				$final_content = '';
				break;
		}

		$content_title = $multi_view->render_element(
			array(
				'tag'     => '' === $this->props['content_title_level'] ? $parent_header_level : $this->props['content_title_level'],
				'content' => '{{dsm_content_title}}',
				'attrs'   => array(
					'class' => 'dsm-title',
				),
			)
		);

		$content_markup = sprintf(
			'<div id="dsm-panel-%10$s" class="dsm-content-wrapper %5$s animated%7$s%8$s" aria-labelledby="dsm-tab-%9$s" data-contentId="%9$s">
				<div class="dsm-inner-content-wrapper">  
					%3$s
					%6$s
					<div class="dsm-inner-content"> 
						%1$s
						%2$s
						%4$s
					</div>
				</div>
		   </div>',
			'content' === $this->props['dsm_content_type'] && '' !== $this->props['dsm_content_title'] ? $content_title : '',
			$final_content,
			'content' === $this->props['dsm_content_type'] && 'on' === $this->props['dsm_content_use_icon_image'] && 'off' === $this->props['dsm_content_use_icon'] && '' !== $this->props['dsm_content_image'] ? sprintf( '<div class="dsm-image">%1$s</div>', $dsm_content_image_output ) : '',
			$button,
			$order_class,
			'content' === $this->props['dsm_content_type'] && 'on' === $this->props['dsm_content_use_icon_image'] && 'on' === $this->props['dsm_content_use_icon'] ? sprintf( '<div class="dsm-icon">%1$s</div>', $content_icon ) : '',
			'content' === $this->props['dsm_content_type'] && 'on' === $this->props['dsm_content_use_icon_image'] && 'off' === $this->props['dsm_content_use_icon'] && '' !== $this->props['dsm_content_image'] ? ' dsm-content-image' : '',
			'content' === $this->props['dsm_content_type'] && 'on' === $this->props['dsm_content_use_icon_image'] && 'off' === $this->props['dsm_content_use_icon'] && '' !== $this->props['dsm_content_image'] ? sprintf( ' dsm-%1$s', $this->props['dsm_content_image_icon_placement'] ) : '',
			esc_attr( $dsm_advanced_tab_index ),
			// Module ID.
			esc_attr( $dsm_advanced_tab_index . ' ' . $this->props['module_id'] )
		);

		$is_displayed = '' !== apply_filters( 'et_module_process_display_conditions', 'content', 'render', $this );

		if ( $is_displayed ) {
			$dsm_advanced_tabs[]         = $tab_markup;
			$dsm_advanced_tabs_content[] = $content_markup;
		}

		$order_class = self::get_module_order_class( $render_slug );

		$output = sprintf(
			'<div class="dsm-advanced-tab-item-wrapper %1$s">
				</div>
			',
			$order_class
		);

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-animate' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return $output;
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

		if ( $raw_value && 'font_icon_active' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}

		if ( $raw_value && 'dsm_content_font_icon' === $name ) {
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


new DSM_Advanced_Tabs_Child();
