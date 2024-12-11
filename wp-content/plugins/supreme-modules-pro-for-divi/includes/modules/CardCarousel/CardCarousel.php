<?php

class DSM_CardCarousel extends ET_Builder_Module {

	public $slug       = 'dsm_card_carousel';
	public $vb_support = 'on';
	public $child_slug = 'dsm_card_carousel_child';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Card Carousel', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%.dsm_card_carousel';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content'      => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
					'link'              => esc_html__( 'Link', 'dsm-supreme-modules-pro-for-divi' ),
					'carousel_settings' => esc_html__( 'Carousel Settings', 'dsm-supreme-modules-pro-for-divi' ),
					'image_settings'    => esc_html__( 'Image Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'layout_alignment'   => esc_html__( 'Layout & Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'image_settings'     => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'badge_settings'     => esc_html__( 'Badge', 'dsm-supreme-modules-pro-for-divi' ),
					'text'               => array(
						'title'    => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 49,
					),
					'arrow_element'      => esc_html__( 'Arrow Element', 'dsm-supreme-modules-pro-for-divi' ),
					'pagination_element' => esc_html__( 'Pagination Element', 'dsm-supreme-modules-pro-for-divi' ),
					'width'              => array(
						'title'    => esc_html__( 'Sizing', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 65,
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
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
				'badge'   => array(
					'label'          => esc_html__( 'Badge', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm_card_carousel_child_badge_text',
					),
					'font_size'      => array(
						'default' => '12px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'tab_slug'       => 'advanced',
					'toggle_slug'    => 'badge_settings',
				),
				'header'  => array(
					'label'          => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => "{$this->main_css_element} h4, {$this->main_css_element} h4 a, {$this->main_css_element} h1.et_pb_module_header, {$this->main_css_element} h1.et_pb_module_header a, {$this->main_css_element} h2.et_pb_module_header, {$this->main_css_element} h2.et_pb_module_header a, {$this->main_css_element} h3.et_pb_module_header, {$this->main_css_element} h3.et_pb_module_header a, {$this->main_css_element} h5.et_pb_module_header, {$this->main_css_element} h5.et_pb_module_header a, {$this->main_css_element} h6.et_pb_module_header, {$this->main_css_element} h6.et_pb_module_header a",
					),
					'font_size'      => array(
						'default' => '18px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h4',
					),
				),
				'body'    => array(
					'label'          => esc_html__( 'Body', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main'        => "{$this->main_css_element} .dsm_card_carousel_child_description",
						'line_height' => "{$this->main_css_element} .dsm_card_carousel_child_description p",
						'text_align'  => "{$this->main_css_element} .dsm_card_carousel_child_description",
						'text_shadow' => "{$this->main_css_element} .dsm_card_carousel_child_description",
					),
					'block_elements' => array(
						'tabbed_subtoggles' => true,
						'bb_icons_support'  => true,
						'css'               => array(
							'main' => "{$this->main_css_element} .dsm_card_carousel_child_description",
						),
					),
					'font_size'      => array(
						'default' => '14px',
					),
					'line_height'    => array(
						'default' => '1.7em',
					),
				),
				'subhead' => array(
					'label'          => esc_html__( 'Subhead', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm_card_carousel_child_subtitle',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
				),
			),
			'text'           => array(
				'use_background_layout' => true,
				'css'                   => array(
					'text_shadow' => '%%order_class%% .dsm_card_wrapper',
				),
				'options'               => array(
					'background_layout' => array(
						'default_on_front' => 'light',
					),
					'text_orientation'  => array(
						'default_on_front' => 'left',
					),
				),
			),
			'borders'        => array(
				'default' => array(),
				'image'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm_card_carousel_child_image_wrapper, %%order_class%% .dsm_card_carousel_child_img',
							'border_styles' => '%%order_class%% .dsm_card_carousel_child_image_wrapper, %%order_class%% .dsm_card_carousel_child_img',
						),
					),
					'label_prefix' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'image_settings',
				),
				'arrow'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm_card_carousel_arrow",
							'border_styles' => "{$this->main_css_element} .dsm_card_carousel_arrow",
						),
					),
					'label_prefix' => esc_html__( 'Arrow', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'arrow_element',
				),
				'badge'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm_card_carousel_child_badge_text",
							'border_styles' => "{$this->main_css_element} .dsm_card_carousel_child_badge_text",
						),
					),
					'defaults'     => array(
						'border_radii' => 'on|50px|50px|50px|50px',
					),
					'label_prefix' => esc_html__( 'Badge', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'badge_settings',
				),
				'card'    => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .dsm_card_carousel_child>div:first-of-type",
							'border_styles' => "{$this->main_css_element} .dsm_card_carousel_child>div:first-of-type",
						),
					),
					'label_prefix' => esc_html__( 'Card', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => "{$this->main_css_element}",
					),
				),
				'image'   => array(
					'label'             => esc_html__( 'Image Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category'   => 'layout',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'image_settings',
					'css'               => array(
						'main' => "{$this->main_css_element} .dsm_card_carousel_child_image_wrapper, {$this->main_css_element} .dsm_card_carousel_child_img",
					),
					'default_on_fronts' => array(
						'color'    => '',
						'position' => '',
					),
				),
				'arrow'   => array(
					'label'           => esc_html__( 'Arrow Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'arrow_element',
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm_card_carousel_arrow",
					),
				),
				'badge'   => array(
					'label'           => esc_html__( 'Badge Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'badge_settings',
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm_card_carousel_child_badge_text",
					),
				),
				'card'    => array(
					'label'           => esc_html__( 'Card Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'box_shadow',
					'css'             => array(
						'main' => "{$this->main_css_element} .dsm_card_carousel_child>div:first-of-type",
					),
				),
			),
			'button'         => array(
				'button' => array(
					'label'         => esc_html__( 'Button', 'dsm-supreme-modules-pro-for-divi' ),
					'css'           => array(
						'main'        => "{$this->main_css_element} .et_pb_button",
						'plugin_main' => "{$this->main_css_element} .et_pb_button",
						'alignment'   => "{$this->main_css_element} .et_pb_button_wrapper",
					),
					'use_alignment' => true,
					'box_shadow'    => array(
						'css' => array(
							'main' => "{$this->main_css_element} .et_pb_button",
						),
					),
				),
			),
			'margin_padding' => array(
				'css'           => array(
					'main'      => "{$this->main_css_element} .swiper-container",
					'important' => array( 'custom_margin' ),
				),
				'custom_margin' => array(
					'default' => '||60px||false|false',
				),
			),
			'filters'        => array(
				'css' => array(
					'main' => array(
						"{$this->main_css_element}",
					),
				),
				/*
				'child_filters_target' => array(
					'tab_slug' => 'advanced',
					'toggle_slug' => 'image_settings',
					'css'                 => array(
						'main'  => "{$this->main_css_element} .dsm_card_image_wrapper",
						'hover' => "{$this->main_css_element}:hover .dsm_card_image_wrapper",
					),
				),*/
			),
			'link_options'   => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();

		return array(
			// Image Settings.
			'lazyload'                         => array(
				'label'            => esc_html__( 'Enabled Lazy Load', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'image_settings',
				'description'      => esc_html__( 'If enable, images will be lazy loaded (Lazy loading images can improve performance, but it may not work with all performance caching plugins. Please test your settings before enabling this option).', 'dsm-supreme-modules-pro-for-divi' ),
				'default'          => 'off',
				'default_on_front' => 'off',
			),

			'slider_orientation'               => array(
				'label'            => esc_html__( 'Carousel Orientation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'horizontal' => esc_html__( 'Horizontal', 'dsm-supreme-modules-pro-for-divi' ),
					'vertical'   => esc_html__( 'Vertical', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'          => 'horizontal',
				'default_on_front' => 'horizontal',
				'toggle_slug'      => 'carousel_settings',
			),

			'slider_container_height'          => array(
				'label'            => esc_html__( 'Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '500px',
				'default_on_front' => '500px',
				'default_unit'     => 'px',
				'mobile_options'   => true,
				'responsive'       => true,
				'range_settings'   => array(
					'min'  => '100',
					'max'  => '2000',
					'step' => '10',
				),
				'toggle_slug'      => 'carousel_settings',

				'show_if'          => array(
					'slider_orientation' => 'vertical',
				),
			),

			'slider_vertical_height_msg'       => array(
				'label'           => '',
				'type'            => 'warning',
				'value'           => true,
				'display_if'      => true,
				'message'         => esc_html__( 'Increase Height If the content is being cut.', 'dsm-supreme-modules-pro-for-divi' ),
				'option_category' => 'configuration',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'carousel_settings',

				'show_if'         => array(
					'slider_orientation' => 'vertical',
				),
			),

			'slider_effect'                    => array(
				'label'            => esc_html__( 'Carousel Effect', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'default'   => esc_html__( 'Slide', 'dsm-supreme-modules-pro-for-divi' ),
					'coverflow' => esc_html__( 'Coverflow', 'dsm-supreme-modules-pro-for-divi' ),
					'flip'      => esc_html__( 'Flip', 'dsm-supreme-modules-pro-for-divi' ),
					'cube'      => esc_html__( 'Cube', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'          => 'default',
				'default_on_front' => 'default',
				'toggle_slug'      => 'carousel_settings',

			),
			'slider_effect_shadows'            => array(
				'label'           => esc_html__( 'Show Shadow', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'off',
				'show_if_not'     => array(
					'slider_effect' => 'default',
				),
				'toggle_slug'     => 'carousel_settings',
			),
			'slider_effect_coverflow_rotate'   => array(
				'label'            => esc_html__( 'Coverflow Rotate', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '30',
				'default_on_front' => '30',
				'default_unit'     => '',
				'validate_unit'    => false,
				'mobile_options'   => false,
				'unitless'         => true,
				'responsive'       => false,
				'range_settings'   => array(
					'min'  => '30',
					'max'  => '100',
					'step' => '1',
				),
				'toggle_slug'      => 'carousel_settings',
				'show_if'          => array(
					'slider_effect' => 'coverflow',
				),
			),
			'slider_effect_coverflow_depth'    => array(
				'label'            => esc_html__( 'Coverflow Depth', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '0',
				'default_on_front' => '0',
				'default_unit'     => '',
				'validate_unit'    => false,
				'mobile_options'   => false,
				'unitless'         => true,
				'responsive'       => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '500',
					'step' => '1',
				),
				'toggle_slug'      => 'carousel_settings',
				'show_if'          => array(
					'slider_effect' => 'coverflow',
				),
			),
			'slider_direction'                 => array(
				'label'            => esc_html__( 'Carousel Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'ltr' => esc_html__( 'Left to Right', 'dsm-supreme-modules-pro-for-divi' ),
					'rtl' => esc_html__( 'Right to Left', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'          => 'ltr',
				'default_on_front' => 'ltr',
				'toggle_slug'      => 'carousel_settings',

				'show_if'          => array(
					'slider_orientation' => 'horizontal',
				),
			),
			'text_direction'                   => array(
				'label'            => esc_html__( 'Text Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'ltr' => esc_html__( 'Left to Right', 'dsm-supreme-modules-pro-for-divi' ),
					'rtl' => esc_html__( 'Right to Left', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'          => 'rtl',
				'default_on_front' => 'rtl',
				'toggle_slug'      => 'carousel_settings',
				'show_if'          => array(
					'slider_direction' => 'rtl',
				),
			),
			'centered_slides'                  => array(
				'label'            => esc_html__( 'Centered Mode', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'description'      => esc_html__( 'If enable, then active slide will be centered, not always on the left side.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'          => 'off',
				'default_on_front' => 'off',
			),
			'slide_to_show'                    => array(
				'label'            => esc_html__( 'Slides To Show', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '3',
				'default_on_front' => '3',
				'default_unit'     => '',
				'validate_unit'    => false,
				'mobile_options'   => true,
				'unitless'         => true,
				'responsive'       => true,
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '9',
					'step' => '1',
				),
				'toggle_slug'      => 'carousel_settings',
				'show_if_not'      => array(
					'slider_effect'      => 'coverflow',
					'slider_effect'      => 'flip',
					'slider_effect'      => 'cube',
					'slider_orientation' => 'vertical',
				),
			),

			'slide_to_row_show'                => array(
				'label'            => esc_html__( 'Slides To Show', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '1',
				'default_on_front' => '1',
				'default_unit'     => '',
				'validate_unit'    => false,
				'mobile_options'   => true,
				'unitless'         => true,
				'responsive'       => true,
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '9',
					'step' => '1',
				),
				'toggle_slug'      => 'carousel_settings',
				'show_if_not'      => array(
					'slider_effect'      => 'coverflow',
					'slider_effect'      => 'flip',
					'slider_effect'      => 'cube',
					'slider_orientation' => 'horizontal',
				),
			),

			'slide_to_scroll'                  => array(
				'label'            => esc_html__( 'Slides To Scroll', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '1',
				'default_on_front' => '1',
				'default_unit'     => '',
				'validate_unit'    => false,
				'mobile_options'   => true,
				'unitless'         => true,
				'responsive'       => true,
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '9',
					'step' => '1',
				),
				'toggle_slug'      => 'carousel_settings',
				'show_if_not'      => array(
					'slider_effect' => 'coverflow',
					'slider_effect' => 'flip',
					'slider_effect' => 'cube',
				),
			),
			'multiple_slide_row'               => array(
				'label'            => esc_html__( 'Use Multiple Row', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'description'      => esc_html__( 'To use multirow layout.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'          => 'off',
				'default_on_front' => 'off',
				'show_if'          => array(
					'slider_orientation' => 'horizontal',
				),
			),
			'slide_row'                        => array(
				'label'            => esc_html__( 'Row Per Slide', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '1',
				'default_on_front' => '1',
				'default_unit'     => '',
				'validate_unit'    => false,
				'mobile_options'   => true,
				'responsive'       => true,
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '5',
					'step' => '1',
				),
				'show_if'          => array(
					'multiple_slide_row' => 'on',
				),
				'toggle_slug'      => 'carousel_settings',
			),
			'speed'                            => array(
				'label'            => esc_html__( 'Slider Speed', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '300',
				'default_on_front' => '300',
				'default_unit'     => '',
				'validate_unit'    => false,
				'unitless'         => true,
				'range_settings'   => array(
					'min'  => '100',
					'max'  => '5000',
					'step' => '1',
				),
				'toggle_slug'      => 'carousel_settings',
			),
			'autoplay'                         => array(
				'label'            => esc_html__( 'Autoplay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'description'      => esc_html__( 'If enable, slider will autoplay.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'          => 'on',
				'default_on_front' => 'on',
			),
			'autoplay_speed'                   => array(
				'label'            => esc_html__( 'Autoplay Change Interval', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '3000',
				'default_on_front' => '3000',
				'default_unit'     => '',
				'validate_unit'    => false,
				'unitless'         => true,
				'range_settings'   => array(
					'min'  => '100',
					'max'  => '5000',
					'step' => '1',
				),
				'toggle_slug'      => 'carousel_settings',
				'show_if'          => array(
					'autoplay' => 'on',
				),
			),
			'autoplay_viewport'                => array(
				'label'            => esc_html__( 'Autoplay Only On Viewport', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Autoplay when in viewport.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'toggle_slug'      => 'carousel_settings',
				'default'          => '80%',
				'default_on_front' => '80%',
				'unitless'         => false,
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'       => false,
				'mobile_options'   => false,
				'show_if'          => array(
					'autoplay' => 'on',
				),
			),
			'mousewheel'                       => array(
				'label'            => esc_html__( 'Use Mouse Wheel', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'description'      => esc_html__( 'To use mousewheel mousewheel swipes the slides.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'          => 'off',
				'default_on_front' => 'off',
			),
			'pause_on_hover'                   => array(
				'label'            => esc_html__( 'Pause on Hover', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'default'          => 'off',
				'default_on_front' => 'off',
				'show_if'          => array(
					'autoplay' => 'on',
				),
				'description'      => esc_html__( 'If enable, slider will pause on hover.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'space_between'                    => array(
				'label'            => esc_html__( 'Spacing', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '15',
				'default_on_front' => '15',
				'default_unit'     => '',
				'validate_unit'    => false,
				'mobile_options'   => true,
				'unitless'         => true,
				'responsive'       => true,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'toggle_slug'      => 'carousel_settings',

			),
			'infinite'                         => array(
				'label'            => esc_html__( 'Infinite looping', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'default'          => 'on',
				'default_on_front' => 'on',
				'show_if_not'      => array(
					'multiple_slide_row' => 'on',
				),
			),
			'infinite_smooth_scrolling'        => array(
				'label'            => esc_html__( 'Infinite Smooth Scrolling', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'default'          => 'off',
				'default_on_front' => 'off',
				'show_if'          => array(
					'infinite' => 'on',
				),
				'show_if_not'      => array(
					'multiple_slide_row' => 'on',
				),
			),
			'auto_height'                      => array(
				'label'            => esc_html__( 'Auto Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'default'          => 'on',
				'default_on_front' => 'on',
				'description'      => esc_html__( 'Carousel wrapper will adopt its height to the height of the currently active slide.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'          => array(
					'equal_height' => 'off',
				),
			),
			'equal_height'                     => array(
				'label'            => esc_html__( 'Equalize Card Heights', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'default'          => 'off',
				'default_on_front' => 'off',
				'mobile_options'   => true,
				'responsive'       => true,
				'description'      => esc_html__( 'Similar to the row equalize column heights. Equalizing card heights will force all columns to assume the height of the tallest column in the carousel. All card will have the same height, keeping their appearance uniform.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'button_vertical_alignment_on_off' => array(
				'label'            => esc_html__( 'Align Button Vertically', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'button',
				'default'          => 'off',
				'default_on_front' => 'off',
				'show_if'          => array(
					'equal_height' => 'on',
				),
				'description'      => esc_html__( 'Button Alignment when using Equalize Card Heights.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'button_vertical_alignment'        => array(
				'label'           => esc_html__( 'Vertical Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'top'    => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'center' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom' => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'top',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'button',
				'show_if'         => array(
					'button_vertical_alignment_on_off' => 'on',
				),
				'description'     => esc_html__( 'This setting determines the vertical alignment of your button. Your button can either be align to the top, vertically centered, or aligned to the bottom.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'layout'                           => array(
				'label'           => esc_html__( 'Layout', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'stacked' => __( 'Stacked', 'dsm-supreme-modules-pro-for-divi' ),
					'inline'  => __( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'stacked',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_alignment',
				'mobile_options'  => true,
			),
			'layout_inline_image_width'        => array(
				'label'            => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust width of the Image Wrapper.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'layout_alignment',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'          => '50%',
				'default_unit'     => '%',
				'default_on_front' => '50%',
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '70',
					'step' => '1',
				),
				'responsive'       => true,
				'show_if'          => array(
					'layout' => 'inline',
				),
			),
			'layout_inline_order'              => array(
				'label'            => esc_html__( 'Order Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'left'  => __( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'right' => __( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'left',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'layout_alignment',
				'show_if'          => array(
					'layout' => 'inline',
				),
			),
			'image_horizontal_alignment'       => array(
				'label'           => esc_html__( 'Horizontal Image Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'top'    => __( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'center' => __( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom' => __( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_alignment',
				'show_if'         => array(
					'layout' => 'inline',
				),
			),
			'content_horizontal_alignment'     => array(
				'label'           => esc_html__( 'Horizontal Content Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'flex-start' => __( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'center'     => __( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'flex-end'   => __( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'center',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'layout_alignment',
				'show_if'         => array(
					'layout' => 'inline',
				),
			),
			/*
			'horizontal_alignment' => array(
				'label'             => esc_html__( 'Horizontal Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'              => 'select',
				'option_category'   => 'layout',
				'options'           => array(
					'flex-start' => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'center'  => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'flex-end'  => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default' => 'center',
				'tab_slug'          => 'advanced',
				'toggle_slug'       => 'layout',
				'show_if' => array(
					'layout' => 'inline',
				),
			),*/
			'arrows'                           => array(
				'label'            => esc_html__( 'Show Arrow', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'default'          => 'on',
				'default_on_front' => 'on',
				'mobile_options'   => true,
				'show_if_not'      => array(
					'infinite_smooth_scrolling' => 'on',
				),
			),

			'navi_hori_position'               => array(
				'label'          => esc_html__( 'Arrow Horizontal Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'range',
				'default'        => '50%',
				'range_settings' => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'slider_orientation' => 'vertical',
				),
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'arrow_element',
			),

			'top_navi_ver_position'            => array(
				'label'          => esc_html__( 'Top Arrow Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'range',
				'default'        => '',
				'default_unit'   => 'px',
				'range_settings' => array(
					'min'  => '-100',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'slider_orientation' => 'vertical',
				),
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'arrow_element',
			),

			'bottom_navi_ver_position'         => array(
				'label'          => esc_html__( 'Bottom Arrow Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'range',
				'default'        => '',
				'default_unit'   => 'px',
				'range_settings' => array(
					'min'  => '-100',
					'max'  => '100',
					'step' => '1',
				),
				'show_if'        => array(
					'slider_orientation' => 'vertical',
				),
				'mobile_options' => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'arrow_element',
			),

			'arrow_position'                   => array(
				'label'           => esc_html__( 'Arrow Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inside'  => esc_html__( 'Inside', 'dsm-supreme-modules-pro-for-divi' ),
					'outside' => esc_html__( 'Outside', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'outside',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'arrow_element',
				'show_if_not'     => array(
					'use_arrow_custom_position' => 'on',
				),
			),
			'arrow_position_mobile'            => array(
				'label'           => esc_html__( 'Mobile Arrow Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'inside'  => esc_html__( 'Inside', 'dsm-supreme-modules-pro-for-divi' ),
					'outside' => esc_html__( 'Outside', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'inside',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'arrow_element',
				'show_if'         => array(
					'arrow_position' => 'outside',
				),
				'show_if_not'     => array(
					'use_arrow_custom_position' => 'on',
				),
			),
			'use_arrow_custom_position'        => array(
				'label'           => esc_html__( 'Use Arrow Custom Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'arrow_element',

				'show_if'         => array(
					'slider_orientation' => 'horizontal',
				),
			),

			'arrow_custom_position'            => array(
				'label'            => esc_html__( 'Arrow Custom Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default_unit'     => 'px',
				'validate_unit'    => true,
				'mobile_options'   => true,
				'unitless'         => false,
				'responsive'       => true,
				'default'          => '-60px',
				'default_on_front' => '-60px',
				'range_settings'   => array(
					'min'  => '-100',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'arrow_element',
				'show_if'          => array(
					'use_arrow_custom_position' => 'on',
					'slider_orientation'        => 'horizontal',
				),
			),
			'arrow_prev'                       => array(
				'label'           => esc_html__( 'Use Custom Previous Arrow Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'arrow_element',
				'description'     => esc_html__( 'Here you can choose to use a custom icon on the previous arrow.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'         => 'off',
			),
			'arrow_prev_font_icon'             => array(
				'label'            => esc_html__( 'Previous Arrow Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select_icon',
				'option_category'  => 'basic_option',
				'class'            => array( 'et-pb-font-icon' ),
				'default'          => '4',
				'default_on_front' => '4',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'arrow_element',
				'show_if'          => array(
					'arrow_prev' => 'on',
				),
			),
			'arrow_next'                       => array(
				'label'           => esc_html__( 'Use Custom Next Arrow Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'arrow_element',
				'description'     => esc_html__( 'Here you can choose to use a custom icon on the next arrow.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'         => 'off',
			),
			'arrow_next_font_icon'             => array(
				'label'            => esc_html__( 'Next Arrow Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select_icon',
				'option_category'  => 'basic_option',
				'class'            => array( 'et-pb-font-icon' ),
				'default'          => '5',
				'default_on_front' => '5',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'arrow_element',
				'show_if'          => array(
					'arrow_next' => 'on',
				),
			),
			'arrow_size'                       => array(
				'label'            => esc_html__( 'Arrow Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '40px',
				'default_on_front' => '40px',
				'default_unit'     => 'px',
				'mobile_options'   => true,
				'responsive'       => true,
				'range_settings'   => array(
					'min'  => '20',
					'max'  => '60',
					'step' => '1',
				),
				'allowed_units'    => array( 'px' ),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'arrow_element',
			),
			'arrow_color'                      => array(
				'label'          => esc_html__( 'Arrow Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'default'        => '#666',
				'mobile_options' => true,
				'responsive'     => true,
				'hover'          => 'tabs',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'arrow_element',
			),
			'arrow_background_color'           => array(
				'label'          => esc_html__( 'Arrow Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'custom_color'   => true,
				'mobile_options' => true,
				'responsive'     => true,
				'hover'          => 'tabs',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'arrow_element',
			),
			'dots'                             => array(
				'label'            => esc_html__( 'Show Pagination', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'default'          => 'on',
				'default_on_front' => 'on',
				'mobile_options'   => true,
				'show_if_not'      => array(
					'infinite_smooth_scrolling' => 'on',
				),
			),

			'dots_horizontal_placement'        => array(
				'label'            => esc_html__( 'Pagination Horizontal Placement', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '-30px',
				'default_on_front' => '-30px',
				'default_unit'     => 'px',
				'range_settings'   => array(
					'min'  => '-100',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'pagination_element',
				'show_if'          => array(
					'dots' => 'on',
				),
			),

			'dots_vertical_placement'          => array(
				'label'            => esc_html__( 'Pagination Vertical Placement', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '50%',
				'default_on_front' => '50%',
				'default_unit'     => '%',
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'pagination_element',
				'show_if'          => array(
					'dots'               => 'on',
					'slider_orientation' => 'vertical',
				),
			),

			'dots_active_color'                => array(
				'label'        => esc_html__( 'Pagination Active Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => 'rgba(0,0,0,0.75)',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'pagination_element',
				'show_if'      => array(
					'dots' => 'on',
				),
			),
			'dots_inactive_color'              => array(
				'label'        => esc_html__( 'Pagination In-Active Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => 'rgba(0,0,0,0.2)',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'pagination_element',
				'show_if'      => array(
					'dots' => 'on',
				),
			),

			'pagi_vertical_placement'          => array(
				'label'           => esc_html__( 'Pagination Placement', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'left'  => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'right' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'right',
				'show_if'         => array(
					'slider_orientation' => 'vertical',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'pagination_element',
			),

			'touch_move'                       => array(
				'label'            => esc_html__( 'Disable Touch/Dragging', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'default'          => 'off',
				'default_on_front' => 'off',
				'description'      => esc_html__( 'This option will prevent user to touch/drag the slide.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'grab'                             => array(
				'label'            => esc_html__( 'Use Grab Cursor', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'carousel_settings',
				'default'          => 'on',
				'default_on_front' => 'on',
				'show_if'          => array(
					'touch_move' => 'off',
				),
				'description'      => esc_html__( 'This option may a little improve desktop usability. If true, user will see the "grab" cursor when hover on Carousel.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'badge_position'                   => array(
				'label'           => esc_html__( 'Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'layout',
				'options'         => array(
					'top_left'      => esc_html__( 'Top Left', 'dsm-supreme-modules-pro-for-divi' ),
					'top_center'    => esc_html__( 'Top Center', 'dsm-supreme-modules-pro-for-divi' ),
					'top_right'     => esc_html__( 'Top Right', 'dsm-supreme-modules-pro-for-divi' ),
					'center_left'   => esc_html__( 'Center Left', 'dsm-supreme-modules-pro-for-divi' ),
					'center'        => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'center_right'  => esc_html__( 'Center Right', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_left'   => esc_html__( 'Bottom Left', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_center' => esc_html__( 'Bottom Center', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom_right'  => esc_html__( 'Bottom Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge_settings',
				'description'     => esc_html__( 'Here you can choose position of the badge.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'         => 'top_right',
				'show_if_not'     => array(
					'badge_custom_position' => 'on',
				),
			),
			'badge_background_color'           => array(
				'default'        => '#ffffff',
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom background color for your badge.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'badge_settings',
				'hover'          => 'tabs',
				'mobile_options' => true,
			),
			'badge_padding'                    => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Here you can define a custom padding size for the Badge.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_padding',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge_settings',
				'default_unit'    => 'px',
				'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '80',
					'step' => '1',
				),
				'default'         => '7px|15px|7px|15px',
				'mobile_options'  => true,
				'responsive'      => true,
				'hover'           => 'tabs',
			),
			'badge_show_on_hover'              => array(
				'label'           => esc_html__( 'Show Badge on Hover', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default'         => 'off',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'badge_settings',
				'description'     => esc_html__( 'Here you can choose if you want to show the badge on mouseover/hover.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'image_width'                      => array(
				'label'            => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Adjust the width of the image.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
				'default'          => '100%',
				'default_unit'     => '%',
				'default_on_front' => '100%',
				'allow_empty'      => false,
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '100',
					'step' => '1',
				),
				'responsive'       => true,
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_settings',
			),
			'stretch_image'                    => array(
				'label'           => esc_html__( 'Stretch Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_settings',
			),
			'image_alignment'                  => array(
				'label'            => esc_html__( 'Image Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Align image to the left, right or center.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'align',
				'option_category'  => 'layout',
				'options'          => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'image_settings',
				'default'          => 'left',
				'default_on_front' => 'left',
				'mobile_options'   => true,
			),
		);
	}

	public function get_transition_fields_css_props() {
		$badge_selector   = '%%order_class%% .dsm_card_carousel_child_badge_text';
		$content_selector = '%%order_class%% .dsm_card_wrapper';

		$fields = parent::get_transition_fields_css_props();

		$fields['arrow_color'] = array(
			'color' => '%%order_class%% .swiper-button-prev:before, %%order_class%% .swiper-button-next:before',
		);

		$fields['arrow_background_color'] = array(
			'background-color' => '%%order_class%% .swiper-button-prev, %%order_class%% .swiper-button-next',
		);

		$fields['badge_background_color'] = array(
			'background-color' => $badge_selector,
		);

		$fields['badge_show_on_hover'] = array(
			'opacity' => $badge_selector,
		);

		return $fields;
	}

	function before_render() {
		// Pass Main Module setting to Child Item.
		global $dsm_card_carousel_setting, $et_pb_slider_custom_icon, $global_stretch_image, $et_pb_slider_custom_icon_tablet, $et_pb_slider_custom_icon_phone;

		$button_custom        = $this->props['custom_button'];
		$stretch_image        = $this->props['stretch_image'];
		$global_stretch_image = 'on' === $stretch_image ? $stretch_image : '';

		$dsm_card_carousel_setting = array(
			'text_orientation'  => $this->props['text_orientation'],
			'background_layout' => $this->props['background_layout'],
			'badge_position'    => $this->props['badge_position'],
			'image_alignment'   => $this->props['image_alignment'],
			'header_level'      => $this->props['header_level'],
			'lazyload'          => $this->props['lazyload'],
		);

		$custom_icon_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon        = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone  = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';

		$et_pb_slider_custom_icon        = 'on' === $button_custom ? $custom_icon : '';
		$et_pb_slider_custom_icon_tablet = 'on' === $button_custom ? $custom_icon_tablet : '';
		$et_pb_slider_custom_icon_phone  = 'on' === $button_custom ? $custom_icon_phone : '';
	}

	public function render( $attrs, $content, $render_slug ) {
		$multi_view                        = et_pb_multi_view_options( $this );
		$slider_effect                     = $this->props['slider_effect'];
		$slider_effect_shadows             = $this->props['slider_effect_shadows'];
		$slider_effect_coverflow_rotate    = $this->props['slider_effect_coverflow_rotate'];
		$slider_effect_coverflow_depth     = $this->props['slider_effect_coverflow_depth'];
		$slider_direction                  = $this->props['slider_direction'];
		$text_direction                    = $this->props['text_direction'];
		$slide_to_show                     = $this->props['slide_to_show'];
		$slide_to_show_tablet              = $this->props['slide_to_show_tablet'];
		$slide_to_show_phone               = $this->props['slide_to_show_phone'];
		$slide_to_show_last_edited         = $this->props['slide_to_show_last_edited'];
		$slide_to_row_show                 = $this->props['slide_to_row_show'];
		$slide_to_row_show_tablet          = $this->props['slide_to_row_show_tablet'];
		$slide_to_row_show_phone           = $this->props['slide_to_row_show_phone'];
		$slide_to_row_show_last_edited     = $this->props['slide_to_row_show_last_edited'];
		$slide_to_scroll                   = $this->props['slide_to_scroll'];
		$slide_to_scroll_tablet            = $this->props['slide_to_scroll_tablet'];
		$slide_to_scroll_phone             = $this->props['slide_to_scroll_phone'];
		$slide_to_scroll_last_edited       = $this->props['slide_to_scroll_last_edited'];
		$multiple_slide_row                = $this->props['multiple_slide_row'];
		$slide_row                         = $this->props['slide_row'];
		$slide_row_tablet                  = $this->props['slide_row_tablet'] ? $this->props['slide_row_tablet'] : $slide_row;
		$slide_row_phone                   = $this->props['slide_row_phone'] ? $this->props['slide_row_phone'] : $slide_row_tablet;
		$centered_slides                   = $this->props['centered_slides'];
		$auto_height                       = $this->props['auto_height'];
		$equal_height                      = $this->props['equal_height'];
		$equal_height_tablet               = $this->props['equal_height_tablet'];
		$equal_height_phone                = $this->props['equal_height_phone'];
		$equal_height_last_edited          = $this->props['equal_height_last_edited'];
		$button_vertical_alignment_on_off  = $this->props['button_vertical_alignment_on_off'];
		$button_vertical_alignment         = $this->props['button_vertical_alignment'];
		$speed                             = $this->props['speed'];
		$space_between                     = $this->props['space_between'];
		$space_between_values              = et_pb_responsive_options()->get_property_values( $this->props, 'space_between' );
		$space_between_tablet              = true === isset( $space_between_values['tablet'] ) && '' !== $space_between_values['tablet'] ? $space_between_values['tablet'] : $space_between;
		$space_between_phone               = true === isset( $space_between_values['phone'] ) && '' !== $space_between_values['phone'] ? $space_between_values['phone'] : $space_between_tablet;
		$autoplay                          = $this->props['autoplay'];
		$autoplay_speed                    = $this->props['autoplay_speed'];
		$autoplay_viewport                 = $this->props['autoplay_viewport'];
		$pause_on_hover                    = $this->props['pause_on_hover'];
		$mousewheel                        = $this->props['mousewheel'];
		$infinite                          = $this->props['infinite'];
		$infinite_smooth_scrolling         = $this->props['infinite_smooth_scrolling'];
		$arrows                            = $this->props['arrows'];
		$arrows_tablet                     = $this->props['arrows_tablet'];
		$arrows_phone                      = $this->props['arrows_phone'];
		$arrows_last_edited                = $this->props['arrows_last_edited'];
		$dots                              = $this->props['dots'];
		$dots_tablet                       = $this->props['dots_tablet'];
		$dots_phone                        = $this->props['dots_phone'];
		$dots_last_edited                  = $this->props['dots_last_edited'];
		$touch_move                        = $this->props['touch_move'];
		$grab                              = $this->props['grab'];
		$dots_horizontal_placement         = $this->props['dots_horizontal_placement'];
		$arrow_color                       = $this->props['arrow_color'];
		$arrow_color_hover                 = $this->get_hover_value( 'arrow_color' );
		$arrow_background_color            = $this->props['arrow_background_color'];
		$arrow_background_color_hover      = $this->get_hover_value( 'arrow_background_color' );
		$arrow_position                    = $this->props['arrow_position'];
		$arrow_position_mobile             = $this->props['arrow_position_mobile'];
		$use_arrow_custom_position         = $this->props['use_arrow_custom_position'];
		$arrow_custom_position             = $this->props['arrow_custom_position'];
		$arrow_custom_position_tablet      = $this->props['arrow_custom_position_tablet'];
		$arrow_custom_position_phone       = $this->props['arrow_custom_position_phone'];
		$arrow_custom_position_last_edited = $this->props['arrow_custom_position_last_edited'];
		$arrow_size                        = $this->props['arrow_size'];
		$arrow_size_tablet                 = $this->props['arrow_size_tablet'];
		$arrow_size_phone                  = $this->props['arrow_size_phone'];
		$arrow_size_last_edited            = $this->props['arrow_size_last_edited'];
		$arrow_prev_font_icon              = $this->props['arrow_prev_font_icon'];
		$arrow_next_font_icon              = $this->props['arrow_next_font_icon'];
		$dots_active_color                 = $this->props['dots_active_color'];
		$dots_inactive_color               = $this->props['dots_inactive_color'];

		$navi_hori_position       = $this->props['navi_hori_position'];
		$top_navi_ver_position    = $this->props['top_navi_ver_position'];
		$bottom_navi_ver_position = $this->props['bottom_navi_ver_position'];

		$slider_orientation      = $this->props['slider_orientation'];
		$slider_container_height = $this->props['slider_container_height'];

		$image_width             = $this->props['image_width'];
		$image_width_tablet      = $this->props['image_width_tablet'];
		$image_width_phone       = $this->props['image_width_phone'];
		$image_width_last_edited = $this->props['image_width_last_edited'];

		$badge_show_on_hover           = $this->props['badge_show_on_hover'];
		$badge_position                = $this->props['badge_position'];
		$badge_background_color        = $this->props['badge_background_color'];
		$badge_background_color_hover  = $this->get_hover_value( 'badge_background_color' );
		$badge_background_color_values = et_pb_responsive_options()->get_property_values( $this->props, 'badge_background_color' );
		$badge_background_color_tablet = isset( $badge_background_color_values['tablet'] ) ? $badge_background_color_values['tablet'] : '';
		$badge_background_color_phone  = isset( $badge_background_color_values['phone'] ) ? $badge_background_color_values['phone'] : '';

		$badge_padding             = $this->props['badge_padding'];
		$badge_padding_hover       = $this->get_hover_value( 'badge_padding' );
		$badge_padding_values      = et_pb_responsive_options()->get_property_values( $this->props, 'badge_padding' );
		$badge_padding_tablet      = isset( $badge_padding_values['tablet'] ) ? $badge_padding_values['tablet'] : '';
		$badge_padding_phone       = isset( $badge_padding_values['phone'] ) ? $badge_padding_values['phone'] : '';
		$badge_padding_last_edited = $this->props['badge_padding_last_edited'];

		$layout                                = $this->props['layout'];
		$layout_values                         = et_pb_responsive_options()->get_property_values( $this->props, 'layout' );
		$layout_tablet                         = $this->props['layout_tablet'];
		$layout_phone                          = $this->props['layout_phone'];
		$layout_inline_image_width             = $this->props['layout_inline_image_width'];
		$layout_inline_image_width_tablet      = $this->props['layout_inline_image_width_tablet'];
		$layout_inline_image_width_phone       = $this->props['layout_inline_image_width_phone'];
		$layout_inline_image_width_last_edited = $this->props['layout_inline_image_width_last_edited'];
		$layout_inline_order                   = $this->props['layout_inline_order'];
		$content_horizontal_alignment          = $this->props['content_horizontal_alignment'];
		$image_horizontal_alignment            = $this->props['image_horizontal_alignment'];
		$content                               = $this->content;

		$background_layout = $this->props['background_layout'];
		$text_orientation  = $this->props['text_orientation'];

		$hover_transition_duration    = $this->props['hover_transition_duration'];
		$hover_transition_speed_curve = $this->props['hover_transition_speed_curve'];
		$hover_transition_delay       = $this->props['hover_transition_delay'];

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		wp_enqueue_script( 'dsm-card-carousel' );

		$badge_selector = '%%order_class%% .dsm_card_carousel_child_badge_text';

		// Transition Parent.
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_card_carousel_child>div:first-of-type, %%order_class%%.dsm_card_carousel .dsm_card_carousel_arrow, %%order_class%% .dsm_card_carousel_child_badge_text',
				'declaration' => sprintf(
					'transition: background %1$s %2$s %3$s, box-shadow %1$s %2$s %3$s, border %1$s %2$s %3$s, padding %1$s %2$s %3$s, border-radius %1$s %2$s %3$s;',
					esc_attr( $hover_transition_duration ),
					esc_attr( $hover_transition_speed_curve ),
					esc_attr( $hover_transition_delay )
				),
			)
		);

		// General.
		if ( 'off' !== $equal_height ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_carousel_child>div:first-of-type',
					'declaration' => sprintf(
						'height: %1$s;',
						esc_html( '100%' )
					),
				)
			);
		}
		/*
		if ( et_pb_get_responsive_status( $equal_height_last_edited ) && 'off' === $equal_height_phone ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_carousel_child>div:first-of-type',
					'declaration' => sprintf(
						'height: %1$s !important;',
						esc_html( 'unset' )
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

		}*/

		// Arrow.
		// Font Icon Style.
		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'arrow_prev_font_icon',
				'important'      => true,
				'selector'       => '%%order_class%% .swiper-button-prev::before',
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
				'base_attr_name' => 'arrow_next_font_icon',
				'important'      => true,
				'selector'       => '%%order_class%% .swiper-button-next::before',
				'processor'      => array(
					'ET_Builder_Module_Helper_Style_Processor',
					'process_extended_icon',
				),
			)
		);

		$arrow_color_style_hover = '';
		$this->generate_styles(
			array(
				'base_attr_name' => 'arrow_color',
				'selector'       => '%%order_class%% .swiper-button-prev:before, %%order_class%% .swiper-button-next:before',
				'css_property'   => 'color',
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);

		if ( et_builder_is_hover_enabled( 'arrow_color', $this->props ) ) {
			$arrow_color_style_hover = sprintf( 'color: %1$s;', esc_html( $arrow_color_hover ) );
		}

		if ( '' !== $arrow_color_style_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev:hover:before, %%order_class%% .swiper-button-next:hover:before',
					'declaration' => $arrow_color_style_hover,
				)
			);
		}

		$arrow_background_color_style_hover = '';
		$this->generate_styles(
			array(
				'base_attr_name' => 'arrow_background_color',
				'selector'       => '%%order_class%% .swiper-button-prev, %%order_class%% .swiper-button-next',
				'css_property'   => 'background-color',
				'render_slug'    => $render_slug,
				'type'           => 'background-color',
			)
		);

		if ( et_builder_is_hover_enabled( 'arrow_background_color', $this->props ) ) {
			$arrow_background_color_style_hover = sprintf( 'background-color: %1$s;', esc_html( $arrow_background_color_hover ) );
		}

		if ( '' !== $arrow_background_color_style_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev:hover, %%order_class%% .swiper-button-next:hover',
					'declaration' => $arrow_background_color_style_hover,
				)
			);
		}

		if ( 'off' !== $use_arrow_custom_position ) {

			if ( '' !== $arrow_custom_position_tablet || '' !== $arrow_custom_position_phone || '' !== $arrow_custom_position ) {
				$arrow_custom_position_responsive_active = et_pb_get_responsive_status( $arrow_custom_position_last_edited );

				$arrow_custom_position_values = array(
					'desktop' => $arrow_custom_position,
					'tablet'  => $arrow_custom_position_responsive_active ? $arrow_custom_position_tablet : '',
					'phone'   => $arrow_custom_position_responsive_active ? $arrow_custom_position_phone : '',
				);

				et_pb_responsive_options()->generate_responsive_css( $arrow_custom_position_values, '%%order_class%% .swiper-button-prev', 'left', $render_slug );
				et_pb_responsive_options()->generate_responsive_css( $arrow_custom_position_values, '%%order_class%% .swiper-button-next', 'right', $render_slug );
			}
		}

		$arrow_size_responsive_active = et_pb_get_responsive_status( $arrow_size_last_edited );

		$arrow_size_values = array(
			'desktop' => $arrow_size,
			'tablet'  => $arrow_size_responsive_active ? $arrow_size_tablet : '',
			'phone'   => $arrow_size_responsive_active ? $arrow_size_phone : '',
		);

		$arrow_size_height_width_values = array(
			'desktop' => ( floatval( $arrow_size ) + 20 ) . 'px',
			'tablet'  => $arrow_size_responsive_active ? ( floatval( $arrow_size_tablet ) + 20 ) . 'px' : '',
			'phone'   => $arrow_size_responsive_active ? ( floatval( $arrow_size_phone ) + 20 ) . 'px' : '',
		);

		$arrow_size_margin_values = array(
			'desktop' => '-' . ( floatval( $arrow_size ) + 20 ) / 2 . 'px',
			'tablet'  => $arrow_size_responsive_active ? '-' . ( floatval( $arrow_size_tablet ) + 20 ) / 2 . 'px' : '',
			'phone'   => $arrow_size_responsive_active ? '-' . ( floatval( $arrow_size_phone ) + 20 ) / 2 . 'px' : '',
		);

		$arrow_size_left_right_values = array(
			'desktop' => '-' . ( floatval( $arrow_size ) + 20 ) . 'px',
			'tablet'  => $arrow_size_responsive_active ? '-' . ( floatval( $arrow_size_tablet ) + 20 ) . 'px' : '',
			'phone'   => $arrow_size_responsive_active ? '-' . ( floatval( $arrow_size_phone ) + 20 ) . 'px' : '',
		);

		if ( '' !== $arrow_size_tablet || '' !== $arrow_size_phone || '40px' !== $arrow_size ) {
			et_pb_responsive_options()->generate_responsive_css( $arrow_size_values, '%%order_class%% .swiper-button-prev:before, %%order_class%% .swiper-button-next:before', 'font-size', $render_slug );
			et_pb_responsive_options()->generate_responsive_css( $arrow_size_height_width_values, '%%order_class%% .swiper-button-prev, %%order_class%% .swiper-button-next', 'height', $render_slug );
			et_pb_responsive_options()->generate_responsive_css( $arrow_size_height_width_values, '%%order_class%% .swiper-button-prev, %%order_class%% .swiper-button-next', 'width', $render_slug );
			et_pb_responsive_options()->generate_responsive_css( $arrow_size_margin_values, '%%order_class%% .swiper-button-prev, %%order_class%% .swiper-button-next', 'margin-top', $render_slug );
			if ( 'outside' === $arrow_position ) {
				et_pb_responsive_options()->generate_responsive_css( $arrow_size_left_right_values, '%%order_class%%.dsm_card_carousel_arrow_outside .swiper-button-prev', 'left', $render_slug );
				et_pb_responsive_options()->generate_responsive_css( $arrow_size_left_right_values, '%%order_class%%.dsm_card_carousel_arrow_outside .swiper-button-next', 'right', $render_slug );
			}
		}

		if ( 'inside' === $arrow_position_mobile ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm_card_carousel_arrow_outside.dsm_card_carousel_arrow_mobile_inside .swiper-button-prev',
					'declaration' => 'left: 0;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%.dsm_card_carousel_arrow_outside.dsm_card_carousel_arrow_mobile_inside .swiper-button-next',
					'declaration' => 'right: 0;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( '' !== $arrows ) {
			$arrows_condition = 'off' === $arrows ? 'none' : 'inline-flex';

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_carousel_arrow.swiper-button-prev, %%order_class%% .dsm_card_carousel_arrow.swiper-button-next',
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $arrows_condition )
					),
				)
			);
		}

		if ( '' !== $arrows_tablet ) {
			$arrows_tablet_condition = 'off' === $arrows_tablet ? 'none' : 'inline-flex';
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_carousel_arrow.swiper-button-prev, %%order_class%% .dsm_card_carousel_arrow.swiper-button-next',
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $arrows_tablet_condition )
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $arrows_phone ) {
			$arrows_phone_condition = 'off' === $arrows_phone ? 'none' : 'inline-flex';
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_carousel_arrow.swiper-button-prev, %%order_class%% .dsm_card_carousel_arrow.swiper-button-next',
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $arrows_phone_condition )
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// Dots.
		if ( '-30px' !== $dots_horizontal_placement ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination-bullets, %%order_class%% .swiper-pagination-custom, %%order_class%% .swiper-pagination-fraction',
					'declaration' => sprintf(
						'bottom: %1$s;',
						esc_attr( $dots_horizontal_placement )
					),
				)
			);
		}

		if ( '' !== $dots_active_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination-bullet.swiper-pagination-bullet-active',
					'declaration' => sprintf(
						'background: %1$s !important; opacity: 1;',
						esc_html( $dots_active_color )
					),
				)
			);
		}

		if ( '' !== $dots_inactive_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination-bullet',
					'declaration' => sprintf(
						'background: %1$s !important; opacity: 1;',
						esc_html( $dots_inactive_color )
					),
				)
			);
		}

		if ( '' !== $dots ) {
			$dots_condition = 'off' === $dots ? 'none' : 'block';

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_carousel_pagination',
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $dots_condition )
					),
				)
			);
		}

		if ( '' !== $dots_tablet ) {
			$dots_tablet_condition = 'off' === $dots_tablet ? 'none' : 'block';
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_carousel_pagination',
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $dots_tablet_condition )
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( '' !== $dots_phone ) {
			$dots_phone_condition = 'off' === $dots_phone ? 'none' : 'block';
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_carousel_pagination',
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( $dots_phone_condition )
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// Slider direction.
		if ( 'rtl' === $slider_direction ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_card_wrapper',
					'declaration' => sprintf(
						'direction: %1$s;',
						esc_attr( $text_direction )
					),
				)
			);
		}

		// Image.
		$image_selector = '%%order_class%% .dsm_card_carousel_child .dsm_card_carousel_child_image_wrapper';

		// Image Width.
		$image_width_selector          = '%%order_class%% .dsm_card_carousel_child_img';
		$image_width_responsive_active = et_pb_get_responsive_status( $image_width_last_edited );

		$image_width_values = array(
			'desktop' => $image_width,
			'tablet'  => $image_width_responsive_active ? $image_width_tablet : '',
			'phone'   => $image_width_responsive_active ? $image_width_phone : '',
		);

		et_pb_responsive_options()->generate_responsive_css( $image_width_values, $image_width_selector, 'max-width', $render_slug );

		$image_alignment             = $this->props['image_alignment'];
		$image_alignment_tablet      = $this->props['image_alignment_tablet'];
		$image_alignment_phone       = $this->props['image_alignment_phone'];
		$image_alignment_values      = et_pb_responsive_options()->get_property_values( $this->props, 'image_alignment' );
		$image_alignment_last_edited = $this->props['image_alignment_last_edited'];

		$image_alignment_selector = '%%order_class%% .dsm_card_carousel_child_image_wrapper';

		if ( 'center' === $image_alignment ) {
			$image_alignment = 'center';
		} elseif ( 'right' === $image_alignment ) {
			$image_alignment = 'flex-end';
		} else {
			$image_alignment = 'flex-start';
		}

		if ( 'center' === $image_alignment_tablet ) {
			$image_alignment_tablet = 'center';
		} elseif ( 'right' === $image_alignment_tablet ) {
			$image_alignment_tablet = 'flex-end';
		} else {
			$image_alignment_tablet = 'flex-start';
		}

		if ( 'center' === $image_alignment_phone ) {
			$image_alignment_phone = 'center';
		} elseif ( 'right' === $image_alignment_phone ) {
			$image_alignment_phone = 'flex-end';
		} else {
			$image_alignment_phone = 'flex-start';
		}

		$el_style = array(
			'selector'    => $image_alignment_selector,
			'declaration' => sprintf(
				'justify-content: %1$s;',
				esc_html( $image_alignment )
			),
		);

		if ( $this->props['image_alignment'] ) {
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( et_pb_get_responsive_status( $image_alignment_last_edited ) && '' !== implode( '', $image_alignment_values ) ) {
			// Icon and less than wrapper width image alignment style.
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $image_alignment_selector,
					'declaration' => sprintf(
						'justify-content: %1$s;',
						$image_alignment_tablet
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $image_alignment_selector,
					'declaration' => sprintf(
						'justify-content: %1$s;',
						$image_alignment_phone
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// Badge.
		$badge_background_style        = sprintf( 'background-color: %1$s;', esc_attr( $badge_background_color ) );
		$badge_background_tablet_style = '' !== $badge_background_color_tablet ? sprintf( 'background-color: %1$s;', esc_attr( $badge_background_color_tablet ) ) : '';
		$badge_background_phone_style  = '' !== $badge_background_color_phone ? sprintf( 'background-color: %1$s;', esc_attr( $badge_background_color_phone ) ) : '';
		$badge_background_style_hover  = '';

		if ( et_builder_is_hover_enabled( 'badge_background_color', $this->props ) ) {
			$badge_background_style_hover = sprintf( 'background-color: %1$s;', esc_attr( $badge_background_color_hover ) );
		}

		if ( '#ffffff' !== $badge_background_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $badge_selector,
					'declaration' => $badge_background_style,
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $badge_selector,
				'declaration' => $badge_background_tablet_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => $badge_selector,
				'declaration' => $badge_background_phone_style,
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		if ( '' !== $badge_background_style_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $badge_selector . ':hover',
					'declaration' => $badge_background_style_hover,
				)
			);
		}

		// Layout.
		if ( 'inline' === $layout ) {
			$layout_inline_image_width_style        = sprintf( 'flex: 0 0 %1$s;', esc_attr( $layout_inline_image_width ) );
			$layout_inline_image_width_tablet_style = '' !== $layout_inline_image_width_tablet ? sprintf( 'flex: 0 0 %1$s;', esc_attr( $layout_inline_image_width_tablet ) ) : '';
			$layout_inline_image_width_phone_style  = '' !== $layout_inline_image_width_phone ? sprintf( 'flex: 0 0 %1$s;', esc_attr( $layout_inline_image_width_phone ) ) : '';

			$layout_order              = 'left' === $layout_inline_order ? '0' : '1';
			$layout_inline_order_style = sprintf( 'order: %1$s;', esc_attr( $layout_order ) );

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $image_selector,
					'declaration' => $layout_inline_image_width_style,
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $image_selector,
					'declaration' => $layout_inline_image_width_tablet_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $image_selector,
					'declaration' => $layout_inline_image_width_phone_style,
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			if ( 'left' !== $layout_inline_order ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => $image_selector,
						'declaration' => $layout_inline_order_style,
					)
				);
			}
			// Content.
			if ( 'center' === $content_horizontal_alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_card_wrapper',
						'declaration' => sprintf( 'margin-top: auto; margin-bottom: auto;' ),
					)
				);
			} elseif ( 'flex-start' === $content_horizontal_alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_card_wrapper',
						'declaration' => sprintf( 'margin-bottom: auto;' ),
					)
				);
			} else {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_card_wrapper',
						'declaration' => sprintf( 'margin-top: auto;' ),
					)
				);
			}

			// Image.
			if ( 'center' === $image_horizontal_alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_card_carousel_child_image_wrapper',
						'declaration' => sprintf( 'margin-top: auto; margin-bottom: auto;' ),
					)
				);
			} elseif ( 'top' === $image_horizontal_alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_card_carousel_child_image_wrapper',
						'declaration' => sprintf( 'margin-bottom: auto;' ),
					)
				);
			} else {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_card_carousel_child_image_wrapper',
						'declaration' => sprintf( 'margin-top: auto;' ),
					)
				);
			}
		}
		/*
		else {
			// Content.
			if ( 'center' === $content_horizontal_alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_card_wrapper',
						'declaration' => sprintf( 'margin-top: auto; margin-bottom: auto;' ),
					)
				);
			} elseif ( 'flex-start' === $content_horizontal_alignment ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_card_wrapper',
						'declaration' => sprintf( 'margin-bottom: auto;' ),
					)
				);
			} else {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_card_wrapper',
						'declaration' => sprintf( 'margin-top: auto;' ),
					)
				);
			}
		}*/

		$this->apply_custom_margin_padding(
			$render_slug,
			'badge_padding',
			'padding',
			$badge_selector
		);

		$this->add_classname(
			array(
				"dsm_card_carousel_layout_{$layout}",
				'' !== $layout_values['tablet'] ? "dsm_card_carousel_tablet_layout_{$layout_tablet}" : '',
				'' !== $layout_values['phone'] ? "dsm_card_carousel_phone_layout_{$layout_phone}" : '',
				'off' !== $badge_show_on_hover ? 'dsm_card_carousel_badge_hover' : '',
				'off' !== $equal_height ? 'dsm_card_carousel_equal_height' : '',
				'on' === $button_vertical_alignment_on_off ? esc_html( " dsm-card-button-alignment dsm-card-button-alignment-{$button_vertical_alignment}" ) : '',
				// "dsm_card_carousel_child_badge_{$badge_position}",
				'on' !== $use_arrow_custom_position ? "dsm_card_carousel_arrow_{$arrow_position} dsm_card_carousel_arrow_mobile_{$arrow_position_mobile}" : '',
				'on' === $infinite_smooth_scrolling ? 'dsm_card_carousel_infinite_scroll' : '',
			)
		);

		$auto_height_check        = 'off' !== $equal_height ? true : false;
		$auto_height_check_tablet = et_pb_get_responsive_status( $equal_height_last_edited ) && 'off' === $equal_height_tablet ? false : true;
		$auto_height_check_phone  = et_pb_get_responsive_status( $equal_height_last_edited ) && 'off' === $equal_height_phone ? false : true;

		$loop_check = 'off' !== $infinite ? true : false;

		$slider_horizontal_to_show_tablet = et_pb_get_responsive_status( $slide_to_show_last_edited ) && '' !== $slide_to_show_tablet ? $slide_to_show_tablet : '1';
		$slider_vertical_to_show_tablet   = et_pb_get_responsive_status( $slide_to_row_show_last_edited ) && '' !== $slide_to_row_show_tablet ? $slide_to_row_show_tablet : '1';

		$slider_horizontal_to_show_phone = et_pb_get_responsive_status( $slide_to_show_last_edited ) && '' !== $slide_to_show_phone ? $slide_to_show_phone : '1';
		$slider_vertical_to_show_phone   = et_pb_get_responsive_status( $slide_to_row_show_last_edited ) && '' !== $slide_to_row_show_phone ? $slide_to_row_show_phone : '1';

		$slides_per_view        = 'horizontal' === $slider_orientation ? $slide_to_show : $slide_to_row_show;
		$slides_per_view_tablet = 'horizontal' === $slider_orientation ? $slider_horizontal_to_show_tablet : $slider_vertical_to_show_tablet;
		$slides_per_view_phone  = 'horizontal' === $slider_orientation ? $slider_horizontal_to_show_phone : $slider_vertical_to_show_phone;

		$data_attr[] = array(
			'direction'                      => $slider_orientation,
			'effect'                         => $slider_effect,
			'slider_effect_shadows'          => 'off' !== $slider_effect_shadows ? true : false,
			'slider_effect_coverflow_rotate' => $slider_effect_coverflow_rotate,
			'slider_effect_coverflow_depth'  => $slider_effect_coverflow_depth,
			'loop'                           => 'off' !== $multiple_slide_row ? false : $loop_check,
			'infinite_smooth_scrolling'      => 'on' === $infinite_smooth_scrolling ? true : false,
			'slide_to_show'                  => $slides_per_view,
			'slide_to_show_tablet'           => $slides_per_view_tablet,
			'slide_to_show_phone'            => $slides_per_view_phone,
			'slide_to_scroll'                => $slide_to_scroll,
			'slide_to_scroll_tablet'         => et_pb_get_responsive_status( $slide_to_scroll_last_edited ) && '' !== $slide_to_scroll_tablet ? $slide_to_scroll_tablet : '1',
			'slide_to_scroll_phone'          => et_pb_get_responsive_status( $slide_to_scroll_last_edited ) && '' !== $slide_to_scroll_phone ? $slide_to_scroll_phone : '1',
			'space_between'                  => 'cube' !== $slider_effect ? $space_between : '0',
			'space_between_tablet'           => 'cube' !== $slider_effect ? $space_between_tablet : '0',
			'space_between_phone'            => 'cube' !== $slider_effect ? $space_between_phone : '0',
			'centered_slides'                => 'off' !== $centered_slides ? true : false,
			'multiple_slide_row'             => $multiple_slide_row,
			'slide_row'                      => 'off' !== $multiple_slide_row ? $slide_row : '1',
			'slide_row_tablet'               => esc_attr( $slide_row_tablet ),
			'slide_row_phone'                => esc_attr( $slide_row_phone ),
			'speed'                          => $speed,
			'autoplay'                       => 'off' !== $autoplay ? true : false,
			'autoplay_speed'                 => $autoplay_speed,
			'autoplay_viewport'              => 'off' !== $autoplay && '' !== $autoplay_viewport ? esc_attr( $autoplay_viewport ) : '',
			'touch_move'                     => 'off' !== $touch_move ? false : true,
			'grab'                           => 'off' !== $grab ? true : false,
			'pause_on_hover'                 => 'off' !== $pause_on_hover ? true : false,
			'mousewheel'                     => 'off' !== $mousewheel ? true : false,
			'auto_height'                    => 'off' !== $multiple_slide_row ? false : $auto_height_check,
			'equal_height'                   => 'off' !== $multiple_slide_row ? false : $auto_height_check,
			'equal_height_tablet'            => 'off' !== $multiple_slide_row ? false : $auto_height_check_tablet,
			'equal_height_phone'             => 'off' !== $multiple_slide_row ? false : $auto_height_check_phone,
		);

		if ( 'vertical' === $this->props['slider_orientation'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev, %%order_class%% .swiper-button-next',
					'declaration' => 'width: 40px !important; height: 40px !important; font-size: 40px;',
				)
			);

				$slider_container_height_last_edited       = $this->props['slider_container_height_last_edited'];
				$slider_container_height_responsive_status = et_pb_get_responsive_status( $slider_container_height_last_edited );

			if ( '' !== $this->props['slider_container_height'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container',
						'declaration' => sprintf(
							'height: %1$s;',
							$this->props['slider_container_height']
						),
					)
				);
			}

			if ( '' !== $this->props['slider_container_height_tablet'] && $slider_container_height_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container',
						'declaration' => sprintf(
							'height: %1$s;',
							$this->props['slider_container_height_tablet']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( '' !== $this->props['slider_container_height_phone'] && $slider_container_height_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-container',
						'declaration' => sprintf(
							'height: %1$s;',
							$this->props['slider_container_height_phone']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullets, %%order_class%% .swiper-pagination-custom, %%order_class%% .swiper-pagination-fraction',
						'declaration' => 'transform: translateY(-50%) !important;',
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullets, %%order_class%% .swiper-pagination-custom, %%order_class%% .swiper-pagination-fraction',
						'declaration' => sprintf(
							'top: %1$s !important;',
							$this->props['dots_vertical_placement']
						),
					)
				);

			if ( 'right' === $this->props['pagi_vertical_placement'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullets, %%order_class%% .swiper-pagination-custom, %%order_class%% .swiper-pagination-fraction',
						'declaration' => sprintf(
							'right: %1$s;',
							$this->props['dots_horizontal_placement']
						),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination.swiper-pagination-bullets',
						'declaration' => 'left: auto;',
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination.swiper-pagination-progressbar',
						'declaration' => 'left: auto !important; right: 0px !important;',
					)
				);
			}

			if ( 'left' === $this->props['pagi_vertical_placement'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination-bullets, %%order_class%% .swiper-pagination-custom, %%order_class%% .swiper-pagination-fraction',
						'declaration' => sprintf(
							'left: %1$s;',
							$this->props['dots_horizontal_placement']
						),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-pagination.swiper-pagination-bullets',
						'declaration' => 'right: auto;',
					)
				);
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-pagination.swiper-pagination-bullets',
					'declaration' => 'top: 10px;
                                          bottom: auto;
                                          width: auto !important;
                                          display: flex;
                                          flex-direction: column;
                                          gap: 8px;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next::before',
					'declaration' => 'transform: rotate(90deg);',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-next',
					'declaration' => 'bottom: 0%; top: auto; left: 50%;',
				)
			);

			if ( 'outside' === $this->props['arrow_position'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev',
						'declaration' => 'top: -60px !important;',
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next',
						'declaration' => 'bottom: -60px !important;',
					)
				);
			}

			$navi_hori_position_last_edited       = $this->props['navi_hori_position_last_edited'];
			$navi_hori_position_responsive_status = et_pb_get_responsive_status( $navi_hori_position_last_edited );

			if ( '' !== $this->props['navi_hori_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
						'declaration' => sprintf(
							'left: %1$s !important;',
							$this->props['navi_hori_position']
						),
					)
				);
			}

			if ( '' !== $this->props['navi_hori_position_tablet'] && $navi_hori_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
						'declaration' => sprintf(
							'left: %1$s !important;',
							$this->props['navi_hori_position_tablet']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( '' !== $this->props['navi_hori_position_phone'] && $navi_hori_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next, %%order_class%% .swiper-button-prev',
						'declaration' => sprintf(
							'left: %1$s !important;',
							$this->props['navi_hori_position_phone']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			$top_navi_ver_position_last_edited       = $this->props['top_navi_ver_position_last_edited'];
			$top_navi_ver_position_responsive_status = et_pb_get_responsive_status( $top_navi_ver_position_last_edited );

			if ( '' !== $this->props['top_navi_ver_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev.dsm_card_carousel_arrow',
						'declaration' => sprintf(
							'top: %1$s !important;',
							$this->props['top_navi_ver_position']
						),
					)
				);
			}

			if ( '' !== $this->props['top_navi_ver_position_tablet'] && $top_navi_ver_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev.dsm_card_carousel_arrow',
						'declaration' => sprintf(
							'top: %1$s !important;',
							$this->props['top_navi_ver_position_tablet']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( '' !== $this->props['top_navi_ver_position_phone'] && $top_navi_ver_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-prev.dsm_card_carousel_arrow',
						'declaration' => sprintf(
							'top: %1$s !important;',
							$this->props['top_navi_ver_position_phone']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			$bottom_navi_ver_position_last_edited       = $this->props['bottom_navi_ver_position_last_edited'];
			$bottom_navi_ver_position_responsive_status = et_pb_get_responsive_status( $bottom_navi_ver_position_last_edited );

			if ( '' !== $this->props['bottom_navi_ver_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next.dsm_card_carousel_arrow',
						'declaration' => sprintf(
							'bottom: %1$s !important;',
							$this->props['bottom_navi_ver_position']
						),
					)
				);
			}

			if ( '' !== $this->props['bottom_navi_ver_position_tablet'] && $bottom_navi_ver_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next.dsm_card_carousel_arrow',
						'declaration' => sprintf(
							'bottom: %1$s !important;',
							$this->props['bottom_navi_ver_position_tablet']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( '' !== $this->props['bottom_navi_ver_position_phone'] && $bottom_navi_ver_position_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .swiper-button-next.dsm_card_carousel_arrow',
						'declaration' => sprintf(
							'bottom: %1$s !important;',
							$this->props['bottom_navi_ver_position_phone']
						),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev',
					'declaration' => 'top: 0%; transform: translateY(50%); left: 50%;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .swiper-button-prev::before',
					'declaration' => 'transform: rotate(90deg);',
				)
			);
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-swiper' );
				wp_enqueue_style( 'dsm-magnific-popup' );
				wp_enqueue_style( 'dsm-card-carousel', plugin_dir_url( __DIR__ ) . 'CardCarousel/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		// Render module content.
		$output = sprintf(
			'%3$s
			%2$s
			<div class="swiper-container dsm_card_carousel_wrapper" dir="%5$s" data-params="%4$s">
			<div class="swiper-wrapper">%1$s</div>
			</div>',
			$content,
			$video_background,
			$parallax_image_background,
			htmlspecialchars( wp_json_encode( $data_attr ), ENT_QUOTES, 'UTF-8' ),
			esc_attr( $slider_direction )
		);

		if ( 'off' === $infinite_smooth_scrolling ) {
			$output .= sprintf(
				'<div class="swiper-button-prev dsm_card_carousel_arrow" data-icon="%1$s"></div><div class="swiper-button-next dsm_card_carousel_arrow" data-icon="%2$s"></div>',
				esc_attr( et_pb_process_font_icon( $arrow_prev_font_icon ) ),
				esc_attr( et_pb_process_font_icon( $arrow_next_font_icon ) )
			);

			$output .= '<div class="swiper-pagination dsm_card_carousel_pagination"></div>';
		}
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
		$assets_prefix     = et_get_dynamic_assets_path();
		$all_shortcodes    = $instance->get_saved_page_shortcodes();
		$this->_cpt_suffix = et_builder_should_wrap_styles() && ! et_is_builder_plugin_active() ? '_cpt' : '';

		if ( ! isset( $assets_list['et_pb_overlay'] ) ) {
			$assets_list['et_pb_overlay'] = array(
				'css' => "{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
			);
		}

		// CardCarousel & Swiper.
		if ( ! isset( $assets_list['dsm_swiper'] ) ) {
			$assets_list['dsm_swiper'] = array(
				'css' => DSM_DIR_PATH . 'public/css/swiper.css',
			);
		}
		if ( ! isset( $assets_list['dsm_card_carousel'] ) ) {
			$assets_list['dsm_card_carousel'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'CardCarousel/style.css',
			);
		}
		if ( ! isset( $assets_list['et_jquery_magnific_popup'] ) ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
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

new DSM_CardCarousel();
