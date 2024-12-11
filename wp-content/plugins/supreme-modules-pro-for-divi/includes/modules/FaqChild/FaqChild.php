<?php

remove_filter( 'the_content', array( $GLOBALS['wp_embed'], 'autoembed' ), 8 );
add_filter( 'the_content', array( $GLOBALS['wp_embed'], 'autoembed' ), 99999 );

class DSM_Faq_Child extends ET_Builder_Module {

	public $slug       = 'dsm_faq_child';
	public $vb_support = 'on';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name                        = esc_html__( 'Supreme Faq Child', 'dsm-supreme-modules-pro-for-divi' );
		$this->type                        = 'child';
		$this->child_title_var             = 'dsm_title';
		$this->advanced_setting_title_text = esc_html__( 'Faq', 'dsm-supreme-modules-pro-for-divi' );

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_toggle'   => esc_html__( 'Toggle', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),

			'advanced'   => array(
				'toggles' => array(
					'title_typo'        => esc_html__( 'Open State Title', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_closed_title'  => esc_html__( 'Closed State Title', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_open_toggle'   => esc_html__( 'Toggle Open State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_closed_toggle' => esc_html__( 'Toggle Closed State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_open_icon'     => esc_html__( 'Icon Open State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_close_icon'    => esc_html__( 'Icon Close State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_open_image'    => esc_html__( 'Image Open State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_closed_image'  => esc_html__( 'Image Closed State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_content'       => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
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
				'header_item'        => array(
					'label'        => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main'      => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm-faq-title',
						'important' => 'all',
					),

					'header_level' => array(
						'default' => 'h2',
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'title_typo',
				),

				'closed_header_item' => array(
					'label'       => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main'      => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm-faq-title',
						'important' => 'all',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_closed_title',
				),

				'content'            => array(
					'label'          => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main'      => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm-faq-content',
						'important' => 'all',
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

			'box_shadow'     => array(
				'default'                    => array(
					'css' => array(
						'main'      => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper',
						'important' => 'all',
					),
				),

				'toggle_open_state_shadow'   => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_toggle',
				),

				'toggle_closed_state_shadow' => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_closed_toggle',
				),

				'icon_open_state_shadow'     => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_icon',
				),

				'icon_close_state_shadow'    => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_close_icon',
				),

				'image_open_state_shadow'    => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_image',
				),

				'image_close_state_shadow'   => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_closed_image',
				),
			),

			'borders'        => array(
				'default'                  => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper',
							'border_styles' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper',
						),
					),
				),

				'dsm_toggle_open_border'   => array(
					'label_prefix' => esc_html__( 'Toggle Open State', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
							'border_styles' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
						),
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_open_toggle',
				),

				'dsm_toggle_closed_border' => array(
					'label_prefix' => esc_html__( 'Toggle Closed State', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
							'border_styles' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
						),
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_closed_toggle',
				),

				'dsm_icon_open_border'     => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
							'border_styles' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
						),
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_icon',
				),

				'dsm_icon_close_border'    => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
							'border_styles' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
						),
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_close_icon',
				),

				'dsm_image_open_border'    => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
							'border_styles' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
						),
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_image',
				),

				'dsm_image_close_border'   => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
							'border_styles' => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
						),
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_closed_image',
				),
			),

			'margin_padding' => array(

				'css' => array(
					'main'      => '.dsm-faq-container %%order_class%%',
					'important' => 'all',
				),
			),

			'text'           => false,
			'filters'        => false,
			'transform'      => false,
			'link_options'   => false,
		);
	}

	public function get_fields() {

		global $dsm_enable_toggle_image;

		return array(

			'dsm_title'                 => array(
				'label'            => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'mobile_options'   => true,
			),

			'dsm_content_type'          => array(
				'label'           => esc_html__( 'Content Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'content',
				'option_category' => 'configuration',
				'options'         => array(
					'content'   => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'shortcode' => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_content'               => array(
				'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'description'     => esc_html__( 'Here you can create the content that will be used within the module.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'show_if'         => array(
					'dsm_content_type' => 'content',
				),
			),

			'dsm_shortcode_content'     => array(
				'label'       => esc_html__( 'Shortcode', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'toggle_slug' => 'main_content',
				'show_if'     => array(
					'dsm_content_type' => 'shortcode',
				),
			),

			'dsm_child_use_image'       => array(
				'label'           => esc_html__( 'Use image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_open_child_image'      => array(
				'label'              => esc_html__( 'Open Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'default'            => '',
				'default_on_child'   => true,
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'toggle_image',

				'show_if'            => array(
					'dsm_child_use_image' => 'on',
				),
			),

			'dsm_open_child_alt_image'  => array(
				'label'            => esc_html__( 'Open Image Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'         => 'custom_css',
				'toggle_slug'      => 'attributes',
				'mobile_options'   => true,

				'show_if'          => array(
					'dsm_child_use_image' => 'on',
				),
			),

			'dsm_close_child_alt_image' => array(
				'label'            => esc_html__( 'Close Image Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'         => 'custom_css',
				'toggle_slug'      => 'attributes',
				'mobile_options'   => true,

				'show_if'          => array(
					'dsm_child_use_image' => 'on',
				),
			),

			'dsm_open_image_width'      => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_open_image',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),

			'dsm_open_image_margin'     => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_open_image',

				'show_if'         => array(
					'dsm_child_use_image' => 'on',
				),
			),

			'dsm_open_image_padding'    => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_open_image',

				'show_if'         => array(
					'dsm_child_use_image' => 'on',
				),
			),

			'dsm_close_child_image'     => array(
				'label'              => esc_html__( 'Close Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'default'            => '',
				'default_on_child'   => true,
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'toggle_image',

				'show_if'            => array(
					'dsm_child_use_image' => 'on',
				),
			),

			'dsm_close_image_width'     => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_closed_image',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),

			'dsm_close_image_margin'    => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_closed_image',

				'show_if'         => array(
					'dsm_child_use_image' => 'on',
				),
			),

			'dsm_close_image_padding'   => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_closed_image',

				'show_if'         => array(
					'dsm_child_use_image' => 'on',
				),
			),

			'dsm_child_open_font_icon'  => array(
				'label'           => esc_html__( 'Open Faq Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'toggle_icon',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_child_close_font_icon' => array(
				'label'           => esc_html__( 'Close Faq Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'toggle_icon',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_open_bg_color'         => array(
				'label'          => esc_html__( 'Open Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_open_toggle',
				'hover'          => 'tabs',
			),

			'dsm_open_toggle_margin'    => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_open_toggle',
			),

			'dsm_open_toggle_padding'   => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_open_toggle',
			),

			'dsm_close_bg_color'        => array(
				'label'          => esc_html__( 'Close Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_closed_toggle',
				'hover'          => 'tabs',
			),

			'dsm_closed_toggle_margin'  => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_closed_toggle',
			),

			'dsm_closed_toggle_padding' => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_closed_toggle',
			),

			'dsm_open_icon_bg_color'    => array(
				'label'          => esc_html__( 'Open Icon Bg Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_open_icon',
				'hover'          => 'tabs',
			),

			'dsm_open_icon_color'       => array(
				'label'          => esc_html__( 'Open Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_open_icon',
				'hover'          => 'tabs',
			),

			'dsm_open_icon_margin'      => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_open_icon',
			),

			'dsm_open_icon_padding'     => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_open_icon',
			),

			'dsm_close_icon_bg_color'   => array(
				'label'          => esc_html__( 'Close Icon Bg Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_close_icon',
				'hover'          => 'tabs',
			),

			'dsm_close_icon_color'      => array(
				'label'          => esc_html__( 'Close Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_close_icon',
				'hover'          => 'tabs',
			),

			'dsm_close_icon_margin'     => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_close_icon',
			),

			'dsm_close_icon_padding'    => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_close_icon',
			),

			'dsm_open_font_size'        => array(
				'label'           => esc_html__( 'Open Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_toggle_icon',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),

			'dsm_close_font_size'       => array(
				'label'           => esc_html__( 'Close font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_toggle_icon',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),

			'dsm_content_margin'        => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content',
			),

			'dsm_content_padding'       => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content',
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		global $dsm_faq_props, $toggle_open_icon, $dsm_open_alt_image, $dsm_close_alt_image, $toggle_close_icon, $dsm_open_image, $dsm_close_image, $dsm_enable_toggle_image, $dsm_icon_placement, $dsm_use_image, $dsm_use_icon;
		$multi_view                             = et_pb_multi_view_options( $this );
		$parent_header_level                    = self::$_->array_get( $dsm_faq_props, 'header_level', '' );
		$dsm_open_bg_color_last_edited          = $this->props['dsm_open_bg_color_last_edited'];
		$dsm_open_bg_color_responsive_active    = et_pb_get_responsive_status( $dsm_open_bg_color_last_edited );
		$dsm_open_bg_color_hover                = $this->get_hover_value( 'dsm_open_bg_color' );
		$dsm_close_bg_color_hover               = $this->get_hover_value( 'dsm_close_bg_color' );
		$dsm_close_bg_color_last_edited         = $this->props['dsm_close_bg_color_last_edited'];
		$dsm_close_bg_color_responsive_active   = et_pb_get_responsive_status( $dsm_close_bg_color_last_edited );
		$dsm_open_font_size_last_edited         = $this->props['dsm_open_font_size_last_edited'];
		$dsm_open_font_size_responsive_active   = et_pb_get_responsive_status( $dsm_open_font_size_last_edited );
		$dsm_close_font_size_last_edited        = $this->props['dsm_close_font_size_last_edited'];
		$dsm_close_font_size_responsive_active  = et_pb_get_responsive_status( $dsm_close_font_size_last_edited );
		$dsm_open_icon_color_last_edited        = $this->props['dsm_open_icon_color_last_edited'];
		$dsm_open_icon_color_responsive_active  = et_pb_get_responsive_status( $dsm_open_icon_color_last_edited );
		$dsm_close_icon_color_last_edited       = $this->props['dsm_close_icon_color_last_edited'];
		$dsm_close_icon_color_responsive_active = et_pb_get_responsive_status( $dsm_close_icon_color_last_edited );

		$dsm_open_toggle_margin_last_edited       = $this->props['dsm_open_toggle_margin_last_edited'];
		$dsm_open_toggle_margin_responsive_active = et_pb_get_responsive_status( $dsm_open_toggle_margin_last_edited );

		$dsm_open_toggle_padding_last_edited       = $this->props['dsm_open_toggle_padding_last_edited'];
		$dsm_open_toggle_padding_responsive_active = et_pb_get_responsive_status( $dsm_open_toggle_padding_last_edited );

		$dsm_closed_toggle_margin_last_edited       = $this->props['dsm_closed_toggle_margin_last_edited'];
		$dsm_closed_toggle_margin_responsive_active = et_pb_get_responsive_status( $dsm_closed_toggle_margin_last_edited );

		$dsm_closed_toggle_padding_last_edited       = $this->props['dsm_closed_toggle_padding_last_edited'];
		$dsm_closed_toggle_padding_responsive_active = et_pb_get_responsive_status( $dsm_closed_toggle_padding_last_edited );

		$dsm_open_icon_bg_color_last_edited       = $this->props['dsm_open_icon_bg_color_last_edited'];
		$dsm_open_icon_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_open_icon_bg_color_last_edited );

		$dsm_close_icon_bg_color_last_edited       = $this->props['dsm_close_icon_bg_color_last_edited'];
		$dsm_close_icon_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_close_icon_bg_color_last_edited );

		$dsm_open_icon_margin_last_edited       = $this->props['dsm_open_icon_margin_last_edited'];
		$dsm_open_icon_margin_responsive_active = et_pb_get_responsive_status( $dsm_open_icon_margin_last_edited );

		$dsm_open_icon_padding_last_edited       = $this->props['dsm_open_icon_padding_last_edited'];
		$dsm_open_icon_padding_responsive_active = et_pb_get_responsive_status( $dsm_open_icon_padding_last_edited );

		$dsm_open_icon_padding_last_edited       = $this->props['dsm_open_icon_padding_last_edited'];
		$dsm_open_icon_padding_responsive_active = et_pb_get_responsive_status( $dsm_open_icon_padding_last_edited );

		$dsm_close_icon_margin_last_edited       = $this->props['dsm_close_icon_margin_last_edited'];
		$dsm_close_icon_margin_responsive_active = et_pb_get_responsive_status( $dsm_close_icon_margin_last_edited );

		$dsm_close_icon_padding_last_edited       = $this->props['dsm_close_icon_padding_last_edited'];
		$dsm_close_icon_padding_responsive_active = et_pb_get_responsive_status( $dsm_close_icon_padding_last_edited );

		$dsm_open_icon_bg_color_hover  = $this->get_hover_value( 'dsm_open_icon_bg_color' );
		$dsm_close_icon_bg_color_hover = $this->get_hover_value( 'dsm_close_icon_bg_color' );

		$dsm_open_image_width_last_edited       = $this->props['dsm_open_image_width_last_edited'];
		$dsm_open_image_width_responsive_active = et_pb_get_responsive_status( $dsm_open_image_width_last_edited );

		$dsm_close_image_width_last_edited       = $this->props['dsm_close_image_width_last_edited'];
		$dsm_close_image_width_responsive_active = et_pb_get_responsive_status( $dsm_close_image_width_last_edited );

		$dsm_open_image_margin_last_edited       = $this->props['dsm_open_image_margin_last_edited'];
		$dsm_open_image_margin_responsive_active = et_pb_get_responsive_status( $dsm_open_image_margin_last_edited );

		$dsm_open_image_padding_last_edited       = $this->props['dsm_open_image_padding_last_edited'];
		$dsm_open_image_padding_responsive_active = et_pb_get_responsive_status( $dsm_open_image_padding_last_edited );

		$dsm_close_image_margin_last_edited       = $this->props['dsm_close_image_margin_last_edited'];
		$dsm_close_image_margin_responsive_active = et_pb_get_responsive_status( $dsm_close_image_margin_last_edited );

		$dsm_close_image_padding_last_edited       = $this->props['dsm_close_image_padding_last_edited'];
		$dsm_close_image_padding_responsive_active = et_pb_get_responsive_status( $dsm_close_image_padding_last_edited );

		$dsm_content_margin_last_edited       = $this->props['dsm_content_margin_last_edited'];
		$dsm_content_margin_responsive_active = et_pb_get_responsive_status( $dsm_content_margin_last_edited );

		$dsm_content_padding_last_edited       = $this->props['dsm_content_padding_last_edited'];
		$dsm_content_padding_responsive_active = et_pb_get_responsive_status( $dsm_content_padding_last_edited );

		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'dsm_child_open_font_icon',
				'selector'       => '%%order_class%% .dsm_faq-item-open_icon span',
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
				'base_attr_name' => 'dsm_child_close_font_icon',
				'selector'       => '%%order_class%% .dsm_faq-item-close_icon span',
				'important'      => true,
				'processor'      => array(
					'ET_Builder_Module_Helper_Style_Processor',
					'process_extended_icon',
				),
			)
		);

		if ( $dsm_open_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active:hover',
					'declaration' => sprintf( 'background: %1$s;', $dsm_open_bg_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_open_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_open_bg_color'] ),
				)
			);
		}

		if ( $dsm_open_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_open_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_open_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $dsm_close_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active):hover',
					'declaration' => sprintf( 'background: %1$s;', $dsm_close_bg_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_close_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_bg_color'] ),
				)
			);
		}

		if ( $dsm_close_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_open_font_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_open_font_size'] ),
				)
			);
		}

		if ( $dsm_open_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_open_font_size_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_open_font_size_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_close_font_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon,.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_close_font_size'] ),
				)
			);
		}

		if ( $dsm_close_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_close_font_size_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon,.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_close_font_size_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_open_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_open_icon_color'] ),
				)
			);
		}

		if ( $dsm_open_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_open_icon_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_open_icon_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_close_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_close_icon_color'] ),
				)
			);
		}

		if ( $dsm_close_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_close_icon_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon,.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_close_icon_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$margin    = 'margin';
		$padding   = 'padding';
		$important = false;

		if ( $this->props['dsm_open_icon_bg_color'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_open_icon_bg_color'] ),
				)
			);
		}

		if ( $dsm_open_icon_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_open_icon_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_icon_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_open_icon_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_margin'], $margin, $important ),
			)
		);

		if ( $dsm_open_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_padding'], $padding, $important ),
			)
		);

		if ( $dsm_open_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_open_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_close_icon_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_icon_bg_color'] ),
				)
			);
		}

		if ( $dsm_close_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_icon_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_icon_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_margin'], $margin, $important ),
			)
		);

		if ( $dsm_close_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_padding'], $padding, $important ),
			)
		);

		if ( $dsm_close_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_close_icon, .dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_margin'], $margin, $important ),
			)
		);

		if ( $dsm_open_toggle_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_toggle_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_padding'], $padding, $important ),
			)
		);

		if ( $dsm_open_toggle_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_toggle_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_margin'], $margin, $important ),
			)
		);

		if ( $dsm_closed_toggle_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_closed_toggle_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_padding'], $padding, $important ),
			)
		);

		if ( $dsm_closed_toggle_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_closed_toggle_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $dsm_open_icon_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active:hover .dsm_open_icon,.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active:hover .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'background: %1$s;', $dsm_open_icon_bg_color_hover ),
				)
			);
		}

		if ( $dsm_close_icon_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:hover .dsm_close_icon,.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:hover .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'background: %1$s;', $dsm_close_icon_bg_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_open_image_width'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => sprintf( 'width: %1$s; height : %1$s;', $this->props['dsm_open_image_width'] ),
				)
			);
		}

		if ( $dsm_open_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => sprintf( 'width : %1$s; height : %1$s;', $this->props['dsm_open_image_width_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => sprintf( 'width : %1$s; height : %1$s;', $this->props['dsm_open_image_width_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_close_image_width'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => sprintf( 'width : %1$s; height : %1$s;', $this->props['dsm_close_image_width'] ),
				)
			);
		}

		if ( $dsm_close_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => sprintf( 'width: %1$s; height : %1$s;', $this->props['dsm_close_image_width_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_close_image_width_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_margin'], $margin, $important ),
			)
		);

		if ( $dsm_open_image_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_image_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_padding'], $padding, $important ),
			)
		);

		if ( $dsm_open_image_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_image_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_margin'], $margin, $important ),
			)
		);

		if ( $dsm_close_image_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_image_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_padding'], $margin, $important ),
			)
		);

		if ( $dsm_close_image_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_padding_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_image_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_padding_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm-faq-content',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin'], $margin, $important ),
			)
		);

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm-faq-content',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm-faq-content',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm-faq-content',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding'], $padding, $important ),
			)
		);

		if ( $dsm_content_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm-faq-content',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm-faq-container %%order_class%%.dsm-faq-item-wrapper .dsm-faq-content',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$child_toggle_open_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{dsm_child_open_font_icon}}',
			)
		);

		$child_toggle_close_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{dsm_child_close_font_icon}}',
			)
		);

		$parent_open_image_attachment_id  = attachment_url_to_postid( $dsm_open_image );
		$parent_close_image_attachment_id = attachment_url_to_postid( $dsm_close_image );
		$child_open_image_attachment_id   = attachment_url_to_postid( $this->props['dsm_open_child_image'] );
		$child_close_image_attachment_id  = attachment_url_to_postid( $this->props['dsm_close_child_image'] );

		$parent_open_image_alt_text  = '';
		$parent_close_image_alt_text = '';
		$child_open_image_alt_text   = '';
		$child_close_image_alt_text  = '';

		if ( $parent_open_image_attachment_id && empty( $dsm_open_alt_image ) ) {
			$parent_open_image_alt_text = get_post_meta( $parent_open_image_attachment_id, '_wp_attachment_image_alt', true );
		} else {
			$parent_open_image_alt_text = esc_attr( $dsm_open_alt_image );
		}

		if ( $parent_close_image_attachment_id && empty( $dsm_close_alt_image ) ) {
			$parent_close_image_alt_text = get_post_meta( $parent_close_image_attachment_id, '_wp_attachment_image_alt', true );
		} else {
			$parent_close_image_alt_text = esc_attr( $dsm_close_alt_image );
		}

		if ( $child_open_image_attachment_id && empty( $this->props['dsm_open_child_alt_image'] ) ) {
			$child_open_image_alt_text = get_post_meta( $child_open_image_attachment_id, '_wp_attachment_image_alt', true );
		} else {
			$child_open_image_alt_text = esc_attr( $this->props['dsm_open_child_alt_image'] );
		}

		if ( $child_close_image_attachment_id && empty( $this->props['dsm_close_child_alt_image'] ) ) {
			$child_close_image_alt_text = get_post_meta( $child_close_image_attachment_id, '_wp_attachment_image_alt', true );
		} else {
			$child_close_image_alt_text = esc_attr( $this->props['dsm_close_child_alt_image'] );
		}

		$parent_open_image  = 'on' === $dsm_use_image ? sprintf( '<div class="dsm_open_image"><img src="%1$s"  alt="%2$s" /></div>', esc_url( $dsm_open_image ), esc_attr( $parent_open_image_alt_text ) ) : '';
		$parent_close_image = 'on' === $dsm_use_image ? sprintf( '<div class="dsm_close_image"><img src="%1$s" alt="%2$s" /></div>', esc_url( $dsm_close_image ), esc_attr( $parent_close_image_alt_text ) ) : '';

		$parent_open_icon  = sprintf( '<div class="dsm_open_icon">%1$s</div>', $toggle_open_icon );
		$parent_close_icon = sprintf( '<div class="dsm_close_icon">%1$s</div>', $toggle_close_icon );

		$open_icon  = '' === $this->props['dsm_child_open_font_icon'] ? $parent_open_icon : sprintf( '<div class="dsm_faq-item-open_icon">%1$s</div>', $child_toggle_open_icon );
		$close_icon = '' === $this->props['dsm_child_close_font_icon'] ? $parent_close_icon : sprintf( '<div class="dsm_faq-item-close_icon">%1$s</div>', $child_toggle_close_icon );

		$open_image  = 'off' === $this->props['dsm_child_use_image'] ? $parent_open_image : sprintf( '<div class="dsm_open_image"><img src="%1$s" alt="%2$s" /></div>', esc_url( $this->props['dsm_open_child_image'] ), esc_attr( $child_open_image_alt_text ) );
		$close_image = 'off' === $this->props['dsm_child_use_image'] ? $parent_close_image : sprintf( '<div class="dsm_close_image"><img src="%1$s" alt="%2$s" /></div>', esc_url( $this->props['dsm_close_child_image'] ), esc_attr( $child_close_image_alt_text ) );

		$accordion_title = $multi_view->render_element(
			array(
				'tag'     => '' === $this->props['header_item_level'] ? $parent_header_level : $this->props['header_item_level'],
				'content' => '{{dsm_title}}',
				'attrs'   => array(
					'class' => 'dsm-faq-title',
				),
			)
		);

		$content = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => 'content' === $this->props['dsm_content_type'] ? html_entity_decode( '{{dsm_content}}' ) : do_shortcode( html_entity_decode( $this->props['dsm_shortcode_content'] ) ),
				'attrs'   => array(
					'class' => 'dsm-faq-content',
				),
			)
		);

		$order_class = self::get_module_order_class( $render_slug );
		$output      = sprintf(
			'<div class="%11$s dsm-faq-item-wrapper">
				<div class="dsm-title-wrapper">
				 <div class="dsm-title-inner-wrapper">
				   %3$s
				   %4$s
				   %9$s
				   %10$s
				   %1$s
				 </div> 
				 <div class="dsm-faq-item-inner-wrapper">
				   %5$s
				   %6$s
				   %7$s
				   %8$s
				 </div>
				</div>
				%2$s
			 </div>
			',
			$accordion_title,
			$content,
			'left' === $dsm_icon_placement ? $open_icon : '',
			'left' === $dsm_icon_placement ? $close_icon : '',
			'right' === $dsm_icon_placement ? $open_icon : '',
			'right' === $dsm_icon_placement ? $close_icon : '',
			'left' === $dsm_icon_placement ? $open_image : '',
			'left' === $dsm_icon_placement ? $close_image : '',
			'right' === $dsm_icon_placement ? $open_image : '',
			'right' === $dsm_icon_placement ? $close_image : '',
			$order_class
		);

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return $output;
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

		if ( $raw_value && 'dsm_child_open_font_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}

		if ( $raw_value && 'dsm_child_close_font_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}

		if ( $raw_value && 'dsm_close_font_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}

		return $raw_value;
	}
}

new DSM_Faq_Child();
