<?php

class DSM_Content_TimeLine_Child extends ET_Builder_Module {

	public $slug       = 'dsm_content_timeline_child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name                        = esc_html__( 'Supreme Content Timeline Child', 'dsm-supreme-modules-pro-for-divi' );
		$this->type                        = 'child';
		$this->advanced_setting_title_text = esc_html__( 'Content Timeline', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_title_var             = 'admin_title';
		$this->child_title_fallback_var    = 'dsm_title';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'content'          => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'oppsite_text'     => esc_html__( 'Opposite Text', 'dsm-supreme-modules-pro-for-divi' ),
					'point_breakpoint' => esc_html__( 'Pointer Icon/Image', 'dsm-supreme-modules-pro-for-divi' ),
					'link'             => esc_html__( 'Button', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),

			'advanced'   => array(
				'toggles' => array(
					'alignment'      => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'title_typo'     => esc_html__( 'Title Text', 'dsm-supreme-modules-pro-for-divi' ),
					'text_typo'      => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'opposite_panel' => esc_html__( 'Opposite Text', 'dsm-supreme-modules-pro-for-divi' ),
					'button'         => esc_html__( 'Button', 'dsm-supreme-modules-pro-for-divi' ),
					'image-icon'     => esc_html__( 'Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'pointer'        => esc_html__( 'Pointer', 'dsm-supreme-modules-pro-for-divi' ),
					'card'           => esc_html__( 'Card', 'dsm-supreme-modules-pro-for-divi' ),
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
				'header'        => array(
					'label'        => esc_html__( 'Title Font', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main'      => '.dsm_content_timeline %%order_class%% .dsm-content-timeline-content-wrapper .dsm-title',
						'important' => 'all',
					),

					'header_level' => array(
						'default' => 'h2',
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'title_typo',
				),

				'content'       => array(
					'label'       => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main'      => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-timeline-content .dsm-description',
						'important' => 'all',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'text_typo',
				),

				'opposite_text' => array(
					'label'       => esc_html__( 'Opposite', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main'      => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-content-timeline-date.dsm-desktop .date,.dsm-content-timeline-items-wrapper %%order_class%% .dsm-content-timeline-date .date',
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'opposite_panel',
				),
			),

			'button'         => array(
				'button' => array(
					'label'          => et_builder_i18n( 'Button' ),
					'css'            => array(
						'main'         => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-timeline-content .et_pb_button',
						'limited_main' => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-timeline-content .et_pb_button',
						'alignment'    => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-timeline-content .et_pb_button_wrapper',
					),
					'use_alignment'  => true,
					'box_shadow'     => array(
						'css' => array(
							'main'      => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-timeline-content .et_pb_button',
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
				'default'         => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-content-timeline-content-wrapper',
							'border_styles' => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-content-timeline-content-wrapper',
							'important'     => 'all',
						),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'card',

				),

				'image_icon'      => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image, %%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
							'border_styles' => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image, %%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
							'important'     => 'all',
						),
					),
					'label_prefix' => et_builder_i18n( 'Image/Icon' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'image-icon',
				),

				'opposite_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
							'border_styles' => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
							'important'     => 'all',
						),
					),
					'label_prefix' => et_builder_i18n( 'Opposite Text Border' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'opposite_panel',
				),
			),

			'box_shadow'     => array(
				'default'         => array(
					'css'         => array(
						'main'      => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-content-timeline-content-wrapper',
						'important' => 'all',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'card',
				),

				'image-icon'      => array(
					'label'           => esc_html__( 'Image Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image-icon',
					'css'             => array(
						'main'      => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image, %%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
						'important' => 'all',
					),
				),

				'opposite_shadow' => array(
					'label'           => esc_html__( 'Opposite Text Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'opposite_panel',
					'css'             => array(
						'main'      => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
						'important' => 'all',
					),
				),
			),

			'margin_padding' => array(
				'css'         => array(
					'main'      => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'important' => 'all',
				),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'card',
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
					'toggle_slug'     => 'image-icon',
					'label'           => et_builder_i18n( 'Image/Icon' ),
					'css'             => array(
						'padding'   => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image, %%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
						'margin'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image, %%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
						'main'      => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image, %%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
						'important' => 'all',
					),
				),
			),

			'background'     => array(
				'css'     => array(
					'main'      => '%%order_class%% .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-content-timeline-content-wrapper::before',
					'important' => 'all',
				),

				'options' => array(
					'background_color' => array(
						'default' => '#f5f5f5',
					),
				),
			),

			'text'           => false,
			'link_options'   => false,
			'animation'      => false,
			'max_width'      => false,
		);
	}

	public function get_fields() {
		return array(
			'admin_title'               => array(
				'label'       => esc_html__( 'Admin Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the flip box item in the builder for easy identification.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'admin_label',
			),
			'module_id'                 => array(
				'label'           => esc_html__( 'CSS ID', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign a unique CSS ID to the element which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class'              => array(
				'label'           => esc_html__( 'CSS Class', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign any number of CSS Classes to the element, separated by spaces, which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'dsm_use_icon_image'        => array(
				'label'           => esc_html__( 'Use Icon / Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'on',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_image'                 => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'default_on_child'   => true,
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'content',
				'show_if'            => array(
					'dsm_use_icon'       => 'off',
					'dsm_use_icon_image' => 'on',
				),
			),
			'alt'                       => array(
				'label'           => esc_html__( 'Image Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'title_text'                => array(
				'label'           => esc_html__( 'Image Title Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'This defines the HTML Title text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'dsm_use_icon'              => array(
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
					'dsm_use_icon_image' => 'on',
				),
			),

			'font_icon'                 => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_use_icon'       => 'on',
					'dsm_use_icon_image' => 'on',
				),
			),

			'dsm_icon_color'            => array(
				'label'       => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'image-icon',

				'show_if'     => array(
					'dsm_use_icon'       => 'on',
					'dsm_use_icon_image' => 'on',
				),
			),

			'dsm_icon_bg_color'         => array(
				'label'       => esc_html__( 'Icon Bg Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'image-icon',

				'show_if'     => array(
					'dsm_use_icon'       => 'on',
					'dsm_use_icon_image' => 'on',
				),
			),

			'dsm_icon_image_placement'  => array(
				'label'           => esc_html__( 'Image/Icon Placement', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'top',
				'options'         => array(
					'top'  => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'left' => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_use_icon_image' => 'on',
				),
			),

			'dsm_title'                 => array(
				'label'            => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				// 'default_on_front' => 'Your Title Goes Here',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'content',
				'mobile_options'   => true,

			),

			'dsm_content_type'          => array(
				'label'           => esc_html__( 'Content Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'custom',
				'options'         => array(
					'custom'    => esc_html__( 'Custom Content', 'dsm-supreme-modules-pro-for-divi' ),
					'shortcode' => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'content',
				'description'     => esc_html__( 'Here you can choose if you wish to have custom content or render shortcode.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_content'               => array(
				'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'tiny_mce',
				// 'default_on_front' => 'Your description goes here. Edit or remove this text inline or in the description settings',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'content',
				'mobile_options'  => true,

				'show_if'         => array(
					'dsm_content_type' => 'custom',
				),
			),

			'dsm_shortcode'             => array(
				'label'            => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'default'          => '',
				'option_category'  => 'basic_option',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'content',
				'show_if'          => array(
					'dsm_content_type' => 'shortcode',
				),
			),

			'dsm_use_pointer_element'   => array(
				'label'           => esc_html__( 'Use Pointer Icon/Image', 'dsm-supreme-modules-pro-for-divi' ),
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
			),

			'dsm_select_pointer_option' => array(
				'label'           => esc_html__( 'Select', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'icon',
				'options'         => array(
					'icon'  => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'image' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'point_breakpoint',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_use_pointer_element' => 'on',
				),
			),

			'dsm_point_image'           => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'default_on_child'   => true,
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'point_breakpoint',

				'show_if'            => array(
					'dsm_select_pointer_option' => 'image',
					'dsm_use_pointer_element'   => 'on',
				),
			),

			'dsm_point_font_icon'       => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'point_breakpoint',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_select_pointer_option' => 'icon',
					'dsm_use_pointer_element'   => 'on',
				),
			),

			'button_text'               => array(
				'label'           => esc_html__( 'Button Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'link',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
			),

			'button_url'                => array(
				'label'           => esc_html__( 'Button Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'dynamic_content' => 'url',
				'toggle_slug'     => 'link',
			),
			'button_url_new_window'     => array(
				'label'           => esc_html__( 'Button Link Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'link',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_opposite_text'         => array(
				'label'           => esc_html__( 'Opposite Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'oppsite_text',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
			),

			'dsm_horizontal_alignment'  => array(
				'label'           => esc_html__( 'Horizontal Alignment', 'dsm-supreme-modules-pro-for-divi' ),
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
				'toggleable'      => true,
				'multi_selection' => false,
				'toggle_slug'     => 'alignment',
				'tab_slug'        => 'advanced',
			),

			'dsm_image_icon_width'      => array(
				'label'                  => esc_html__( 'Image/Icon Width', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'            => 'image-icon',
				'description'            => esc_html__( 'Here you can choose icon/img width.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'                   => 'range',
				'range_settings'         => array(
					'min'  => '1',
					'max'  => '200',
					'step' => '1',
				),
				'option_category'        => 'layout',
				'tab_slug'               => 'advanced',
				'mobile_options'         => true,
				'validate_unit'          => true,
				'allowed_units'          => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'responsive'             => true,
				'mobile_options'         => true,
				'sticky'                 => true,
				'default_value_depends'  => array( 'dsm_use_icon' ),
				'default_values_mapping' => array(
					'on'  => '96px',
					'off' => '100%',
				),
			),

			'dsm_icon_image_align'      => array(
				'label'           => esc_html__( 'Image/Icon Alignment', 'dsm-supreme-modules-pro-for-divi' ),
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
				'toggleable'      => true,
				'multi_selection' => false,
				'toggle_slug'     => 'image-icon',
				'tab_slug'        => 'advanced',

				'show_if'         => array(
					'dsm_icon_image_placement' => 'top',
				),
			),

			'dsm_opposite_bg_color'     => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'opposite_panel',
				'mobile_options' => true,
				'responsive'     => true,
			),

			'dsm_opposite_padding'      => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'opposite_panel',
				'mobile_options'  => true,
				'responsive'      => true,
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		global $dsm_timeline_main, $et_pb_slider_custom_icon, $et_pb_slider_custom_icon_tablet, $et_pb_slider_custom_icon_phone;

		$multi_view = et_pb_multi_view_options( $this );
		$alt        = $this->_esc_attr( 'alt' );
		$title_text = $this->props['title_text'];

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

		$parent_header_level                     = self::$_->array_get( $dsm_timeline_main, 'header_level', '' );
		$dsm_opposite_bg_color_last_edited       = $this->props['dsm_opposite_bg_color_last_edited'];
		$dsm_opposite_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_opposite_bg_color_last_edited );
		$dsm_opposite_padding_last_edited        = $this->props['dsm_opposite_padding_last_edited'];
		$dsm_opposite_padding_responsive_active  = et_pb_get_responsive_status( $dsm_opposite_padding_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-timeline-content',
				'declaration' => 'margin-top: 15px;',
			)
		);

		if ( '' === $this->props['border_style_all_image_icon'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image, %%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		// opposite text styling.

		if ( '' === $this->props['dsm_opposite_text'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-content-timeline-items-wrapper.dsm-left %%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => 'margin-left: 15% !important;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-content-timeline-items-wrapper.dsm-left %%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => 'margin-left: 15% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-content-timeline-items-wrapper.dsm-left %%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => 'margin-left: 11% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( '' === $this->props['dsm_opposite_text'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-content-timeline-items-wrapper.dsm-right %%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => 'margin-right: 15% !important;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-content-timeline-items-wrapper.dsm-right %%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => 'margin-right: 15% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-content-timeline-items-wrapper.dsm-right %%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => 'margin-right: 11% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
				'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_opposite_bg_color'] ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
				'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_opposite_bg_color'] ),
			)
		);

		if ( $dsm_opposite_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_opposite_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_opposite_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-content-timeline-date.dsm-desktop',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_opposite_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$type      = 'padding';
		$important = true;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_opposite_padding'], $type, $important ),
			)
		);

		if ( $dsm_opposite_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_opposite_padding_tablet'], $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_opposite_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_opposite_padding_phone'], $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// icon size for content item.

		if ( 'on' === $this->props['dsm_use_icon'] ) {

			$mobile_enabled = et_pb_get_responsive_status( $this->props['dsm_image_icon_width_last_edited'] );

			$content_timeline_card_icon_values = array(
				'desktop' => $this->props['dsm_image_icon_width'],
				'tablet'  => $mobile_enabled ? $this->props['dsm_image_icon_width_tablet'] : '',
				'phone'   => $mobile_enabled ? $this->props['dsm_image_icon_width_phone'] : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $content_timeline_card_icon_values, '.dsm-content-timeline-items-wrapper %%order_class%% .dsm_icon', 'font-size', $render_slug );

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_icon',
					'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_icon_color'] ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_icon',
					'declaration' => sprintf( 'background-color: %1$s !important;', $this->props['dsm_icon_bg_color'] ),
				)
			);
		}

		if ( 'off' === $this->props['dsm_use_icon'] ) {

			$mobile_enabled = et_pb_get_responsive_status( $this->props['dsm_image_icon_width_last_edited'] );

			$content_timeline_card_icon_values = array(
				'desktop' => $this->props['dsm_image_icon_width'],
				'tablet'  => $mobile_enabled ? $this->props['dsm_image_icon_width_tablet'] : '',
				'phone'   => $mobile_enabled ? $this->props['dsm_image_icon_width_phone'] : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $content_timeline_card_icon_values, '.dsm-content-timeline-items-wrapper %%order_class%% .dsm-image', 'max-width', $render_slug );
		}

		// for icon image alignment.

		if ( 'left' === $this->props['dsm_icon_image_align'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image-wrapper, %%order_class%% .dsm-content-timeline-content-wrapper .dsm-icon-wrapper',
					'declaration' => 'display:flex; justify-content:flex-start !important;',
				)
			);
		}

		if ( 'center' === $this->props['dsm_icon_image_align'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => ' %%order_class%% .dsm-content-timeline-content-wrapper .dsm-image-wrapper, %%order_class%% .dsm-content-timeline-content-wrapper .dsm-icon-wrapper',
					'declaration' => 'display:flex; justify-content:center !important;',
				)
			);
		}

		if ( 'right' === $this->props['dsm_icon_image_align'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image-wrapper, %%order_class%% .dsm-content-timeline-content-wrapper .dsm-icon-wrapper',
					'declaration' => 'display:flex; justify-content:flex-end !important;',
				)
			);
		}

		// for button alignment.

		if ( 'left' === $this->props['button_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-timeline-content .et_pb_button_wrapper',
					'declaration' => 'text-align:left !important;',
				)
			);
		}
		if ( 'center' === $this->props['button_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => ' %%order_class%% .dsm-timeline-content .et_pb_button_wrapper',
					'declaration' => 'text-align:center !important;',
				)
			);
		}
		if ( 'right' === $this->props['button_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => ' %%order_class%% .dsm-timeline-content .et_pb_button_wrapper',
					'declaration' => 'text-align:right !important;',
				)
			);
		}

		// for card Content alignment.
		if ( 'left' === $this->props['dsm_horizontal_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-image, %%order_class%% .dsm-icon-wrapper, %%order_class%% .dsm-title, %%order_class%% .dsm-content-timeline-content-wrapper p, %%order_class%% .et_pb_button_wrapper, %%order_class%% .dsm-content-timeline-date.dsm-mobile .date',
					'declaration' => 'text-align:left !important;',
				)
			);
		}

		if ( 'center' === $this->props['dsm_horizontal_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-image, %%order_class%% .dsm-icon-wrapper, %%order_class%% .dsm-title, %%order_class%% .dsm-content-timeline-content-wrapper p, %%order_class%% .et_pb_button_wrapper, %%order_class%% .dsm-content-timeline-date.dsm-mobile .date',
					'declaration' => 'text-align:center !important;',
				)
			);
		}

		if ( 'right' === $this->props['dsm_horizontal_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-image, %%order_class%% .dsm-icon-wrapper, %%order_class%% .dsm-title, %%order_class%% .dsm-content-timeline-content-wrapper p, %%order_class%% .et_pb_button_wrapper, %%order_class%% .dsm-content-timeline-date.dsm-mobile .date',
					'declaration' => 'text-align:right !important;',
				)
			);
		}

		if ( 'left' === $this->props['dsm_icon_image_placement'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => 'display: -webkit-box; display: -ms-flexbox; display: flex;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon, %%order_class%% .dsm-content-timeline-content-wrapper .dsm-image',
					'declaration' => 'width: 100px; margin-right: 10px;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => '-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => '-webkit-box-orient: vertical;-webkit-box-direction: normal;-ms-flex-direction: column;flex-direction: column;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'top' === $this->props['dsm_icon_image_placement'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => '
				                  display: -webkit-box;
								  display: -ms-flexbox;
								  display: flex;
								  -webkit-box-orient: vertical;
   								  -webkit-box-direction: normal;
                                  -ms-flex-direction: column;
                                  flex-direction: column;',
				)
			);
			/*
			Not needed and will be removed
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon, %%order_class%% .dsm-content-timeline-content-wrapper .dsm-image',
					'declaration' => 'margin-bottom: 15px;',
				)
			);*/
		}

		/*
		Not needed and will be removed
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-description',
				'declaration' => 'margin-bottom: 15px;',
			)
		);*/

		if ( '' === $this->props['border_style_all_opposite_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .et_pb_button:after',
				'declaration' => 'content: attr(data-icon);',
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

		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'font_icon',
				'selector'       => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
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
				'base_attr_name' => 'dsm_point_font_icon',
				'selector'       => '%%order_class%% .dsm-pointer-wrapper .dsm_icon',
				'important'      => true,
				'processor'      => array(
					'ET_Builder_Module_Helper_Style_Processor',
					'process_extended_icon',
				),
			)
		);

		$pointer_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{dsm_point_font_icon}}',
				'attrs'   => array(
					'class' => 'dsm_icon',
				),
			)
		);

		if ( empty( $alt ) || empty( $title_text ) ) {
			$image_id = attachment_url_to_postid( $this->props['dsm_image'] );

			// If there is no user-specified ALT attribute text, check the WP
			// Media Library entry for text that may have been added there.
			if ( empty( $alt ) ) {
				$alt = get_post_meta( $image_id, '_wp_attachment_image_alt', true );
			}

			// If there is no user-specified TITLE attribute text, check the WP
			// Media Library entry for text that may have been added there.
			if ( empty( $title_text ) ) {
				$title_text = get_the_title( $image_id );
			}
		}

		$image_attrs = array(
			'src'   => '{{dsm_image}}',
			'alt'   => esc_attr( $alt ),
			'title' => esc_attr( $title_text ),
		);

		$dsm_image_output = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => $image_attrs,
				'required' => 'dsm_image',
			)
		);

		$title = $multi_view->render_element(
			array(
				'tag'     => '' === $this->props['header_level'] ? $parent_header_level : $this->props['header_level'],
				'content' => '{{dsm_title}}',
				'attrs'   => array(
					'class' => 'dsm-title',
				),
			)
		);

		$content = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{dsm_content}}',
				'attrs'   => array(
					'class' => 'dsm-description',
				),
			)
		);

		$opposite_text_desktop = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '<span class="date">{{dsm_opposite_text}}</span>',
				'attrs'   => array(
					'class' => 'dsm-content-timeline-date dsm-desktop',
				),
			)
		);

		$opposite_text_mobile = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '<span class="date">{{dsm_opposite_text}}</span>',
				'attrs'   => array(
					'class' => 'dsm-content-timeline-date dsm-mobile',
				),
			)
		);

		$order_class = self::get_module_order_class( $render_slug );
		$output      = sprintf(
			'<div%12$s class="dsm-content-timeline-item-wrapper %1$s%11$s">
				%10$s
				<div class="dsm-content-timeline-content-wrapper dsm_wrapper_%1$s dsm-visibility">   		
					%7$s
					%6$s
					%5$s
					<div class="dsm-timeline-content">
						%2$s
						%3$s
						%13$s
						%4$s
					</div>	
				</div>
				<div class="dsm-pointer-wrapper">
					%8$s
					%9$s
				</div>
			</div>',
			$order_class,
			( '' !== $this->props['dsm_title'] ? $title : '' ),
			( 0 !== strlen( trim( $this->props['dsm_content'] ) ) && 'custom' === $this->props['dsm_content_type'] ? $content : '' ),
			$button,
			( 'on' === $this->props['dsm_use_icon_image'] && 'on' === $this->props['dsm_use_icon'] ? sprintf( '<span class="dsm-icon-wrapper">%1$s</span>', $content_icon ) : '' ),
			'on' === $this->props['dsm_use_icon_image'] && 'off' === $this->props['dsm_use_icon'] && '' !== $this->props['dsm_image'] ? sprintf( '<div class="dsm-image-wrapper"><div class="dsm-image">%1$s</div></div>', $dsm_image_output ) : '',
			'' !== $this->props['dsm_opposite_text'] ? $opposite_text_mobile : '',
			( 'on' === $this->props['dsm_use_pointer_element'] && 'icon' === $this->props['dsm_select_pointer_option'] ? sprintf( '%1$s', $pointer_icon ) : '' ),
			( 'on' === $this->props['dsm_use_pointer_element'] && 'image' === $this->props['dsm_select_pointer_option'] ? sprintf( '<div class="dsm-image"><img src="%1$s"/></div>', $this->props['dsm_point_image'] ) : '' ),
			'' !== $this->props['dsm_opposite_text'] ? $opposite_text_desktop : '',
			// Module classnames.
			isset( $this->props['module_class'] ) && '' !== $this->props['module_class'] ? esc_attr( ' ' . $this->props['module_class'] ) : '',
			// Module ID.
			isset( $this->props['module_id'] ) && '' !== $this->props['module_id'] ? esc_attr( ' id=' . $this->props['module_id'] ) : '',
			( $this->props['dsm_shortcode'] && 'shortcode' === $this->props['dsm_content_type'] ? sprintf( '<div class="dsm-description">%1$s</div>', do_shortcode( html_entity_decode( $this->props['dsm_shortcode'] ) ) ) : '' )
		);

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-content-timeline', plugin_dir_url( __DIR__ ) . 'ContentTimeLineChild/style.css', array(), DSM_PRO_VERSION, 'all' );
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

		if ( $raw_value && 'dsm_point_font_icon' === $name ) {
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

		if ( ! isset( $assets_list['dsm_content_timeline_child'] ) ) {
			$assets_list['dsm_content_timeline_child'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'ContentTimeLineChild/style.css',
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

new DSM_Content_TimeLine_Child();
