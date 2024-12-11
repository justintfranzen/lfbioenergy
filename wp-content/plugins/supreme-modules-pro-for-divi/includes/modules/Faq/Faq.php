<?php

class DSM_Faq extends ET_Builder_Module {

	public $slug       = 'dsm_faq';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name            = esc_html__( 'Supreme Faq', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_slug      = 'dsm_faq_child';
		$this->child_item_text = esc_html__( 'Faq Item', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path       = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
					'toggle_icon'  => esc_html__( 'Toggle Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'toggle_image' => esc_html__( 'Toggle Image', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),

			'advanced'   => array(
				'toggles' => array(
					'dsm_title'         => esc_html__( 'Open State Title', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_closed_title'  => esc_html__( 'Closed State Title', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_open_toggle'   => esc_html__( 'Toggle Open State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_closed_toggle' => esc_html__( 'Toggle Closed State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_open_image'    => esc_html__( 'Image Open State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_closed_image'  => esc_html__( 'Image Closed State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_open_icon'     => esc_html__( 'Icon Open State', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_close_icon'    => esc_html__( 'Icon Close State', 'dsm-supreme-modules-pro-for-divi' ),
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
				'header'        => array(
					'label'        => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => '%%order_class%% .dsm-faq-item-wrapper .dsm-faq-title',
					),

					'header_level' => array(
						'default' => 'h5',
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_title',
				),

				'closed_header' => array(
					'label'       => esc_html__( 'Closed Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm-faq-title',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_closed_title',
				),

				'content'       => array(
					'label'          => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-faq-item-wrapper .dsm-faq-content',
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
						'main' => '%%order_class%%',
					),
				),

				'toggle_open_state_shadow'   => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_toggle',
				),

				'toggle_closed_state_shadow' => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_closed_toggle',
				),

				'icon_open_state_shadow'     => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_icon',
				),

				'icon_close_state_shadow'    => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_close_icon',
				),

				'image_open_state_shadow'    => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_image',
				),

				'image_close_state_shadow'   => array(
					'label'       => esc_html__( 'Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_closed_image',
				),
			),

			'borders'        => array(
				'default'                  => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),

				'dsm_toggle_open_border'   => array(
					'label_prefix' => esc_html__( 'Toggle Open State', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
							'border_styles' => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
						),
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_open_toggle',
				),

				'dsm_toggle_closed_border' => array(
					'label_prefix' => esc_html__( 'Toggle Closed State', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
							'border_styles' => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
						),
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_closed_toggle',
				),

				'dsm_icon_open_border'     => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
							'border_styles' => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
						),
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_icon',
				),

				'dsm_icon_close_border'    => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
							'border_styles' => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
						),
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_close_icon',
				),

				'dsm_image_open_border'    => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
							'border_styles' => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
						),
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_open_image',
				),

				'dsm_image_close_border'   => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
							'border_styles' => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
						),
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_closed_image',
				),
			),

			'margin_padding' => array(

				'css' => array(
					'main' => '%%order_class%%',
				),
			),

			'text'           => false,
			'filters'        => false,
			'transform'      => false,
			'link_options'   => false,
		);
	}

	public function get_fields() {
		return array(

			'dsm_accordion_gap'         => array(
				'label'           => esc_html__( 'Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '10px',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),

			'dsm_make_accordion_toggle' => array(
				'label'           => esc_html__( 'Make Accordion', 'dsm-supreme-modules-pro-for-divi' ),
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

			'dsm_open_faq_item'         => array(
				'label'           => esc_html__( 'Open First Item', 'dsm-supreme-modules-pro-for-divi' ),
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

			'dsm_enable_schema_markup'  => array(
				'label'           => esc_html__( 'Enable Schema Support', 'dsm-supreme-modules-pro-for-divi' ),
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

			'dsm_open_bg_color'         => array(
				'label'          => esc_html__( 'Open Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#ffffff',
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
				'default'        => '#f4f4f4',
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

			'dsm_use_image'             => array(
				'label'           => esc_html__( 'Use Image', 'dsm-supreme-modules-pro-for-divi' ),
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

			'dsm_open_image'            => array(
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
					'dsm_use_image' => 'on',
				),
			),

			'dsm_open_alt_image'        => array(
				'label'           => esc_html__( 'Open Image Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'mobile_options'  => true,

				'show_if'         => array(
					'dsm_use_image' => 'on',
				),
			),

			'dsm_close_image'           => array(
				'label'              => esc_html__( 'Close Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'default'            => '',
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'toggle_image',

				'show_if'            => array(
					'dsm_use_image' => 'on',
				),
			),

			'dsm_close_alt_image'       => array(
				'label'           => esc_html__( 'Close Image Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'mobile_options'  => true,
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',

				'show_if'         => array(
					'dsm_use_image' => 'on',
				),
			),

			'dsm_open_image_width'      => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '32px',
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
					'dsm_use_image' => 'on',
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
					'dsm_use_image' => 'on',
				),
			),

			'dsm_close_image_width'     => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '32px',
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
					'dsm_use_image' => 'on',
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
					'dsm_use_image' => 'on',
				),
			),

			'dsm_open_font_icon'        => array(
				'label'           => esc_html__( 'Open Faq Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => 'K',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'toggle_icon',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_close_font_icon'       => array(
				'label'           => esc_html__( 'Close Faq Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => 'L',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'toggle_icon',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
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
				'default'         => '22px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_open_icon',
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
				'default'         => '22px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_close_icon',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),

			'dsm_animate_icon'          => array(
				'label'           => esc_html__( 'Animate Toggle Icons', 'dsm-supreme-modules-pro-for-divi' ),
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

			'dsm_icon_placement'        => array(
				'label'           => esc_html__( 'Icon Placement', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'left',
				'options'         => array(
					'left'  => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'right' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'toggle_icon',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
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

	function before_render() {
		global $dsm_faq_props, $toggle_open_icon, $toggle_close_icon, $dsm_open_alt_image, $dsm_close_alt_image, $dsm_open_image, $dsm_close_image, $dsm_icon_placement, $dsm_use_image;

		$multi_view = et_pb_multi_view_options( $this );

		$toggle_open_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{dsm_open_font_icon}}',
			)
		);

		$toggle_close_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{dsm_close_font_icon}}',
			)
		);

		$dsm_faq_props = array(
			'header_level' => $this->props['header_level'],
		);

		$dsm_open_font_icon  = $this->props['dsm_open_font_icon'];
		$dsm_open_image      = $this->props['dsm_open_image'];
		$dsm_close_image     = $this->props['dsm_close_image'];
		$dsm_icon_placement  = $this->props['dsm_icon_placement'];
		$dsm_use_image       = $this->props['dsm_use_image'];
		$dsm_open_alt_image  = $this->props['dsm_open_alt_image'];
		$dsm_close_alt_image = $this->props['dsm_close_alt_image'];
	}

	/**
	 * Generates a new google schema support script.
	 */

	private function generate_schema_support() {
		$initial_schema = array(
			'@context'   => 'https://schema.org',
			'@type'      => 'FAQPage',
			'mainEntity' => array(),
		);

		libxml_use_internal_errors( true ); // For suppressing any document error.

		$document = new DOMDocument();

		if ( '' === $this->props['content'] ) {
			return '';
		}

		$document->loadHTML( '<?xml encoding="utf-8" ?>' . $this->props['content'] );
		$finder = new DOMXPath( $document );

		$faq_items = $finder->query( '//*[contains(@class, "dsm-faq-item-wrapper")]' );

		// loop through each faq item DOMNodeList.
		foreach ( $faq_items as $current_faq_item ) {
			$faq_title_element  = $finder->query( 'descendant::*[contains(@class, "dsm-faq-title")]', $current_faq_item )->item( 0 );
			$faq_answer_element = $finder->query( 'descendant::*[contains(@class, "dsm-faq-content")]', $current_faq_item )->item( 0 );

			// Check if both title and answer elements exist before adding to schema
			if ( $faq_title_element !== null && $faq_answer_element !== null ) {
				$faq_title  = $faq_title_element->nodeValue;
				$faq_answer = $faq_answer_element->nodeValue;

				$initial_schema['mainEntity'][] = array(
					'@type'          => 'Question',
					'name'           => $faq_title,
					'acceptedAnswer' => array(
						'@type' => 'Answer',
						'text'  => $faq_answer,
					),
				);
			}
		}

		return '<script type="application/ld+json">' . wp_json_encode( $initial_schema ) . '</script>';
	}

	public function render( $attrs, $content, $render_slug ) {

		$multi_view                             = et_pb_multi_view_options( $this );
		$dsm_accordion_gap_last_edited          = $this->props['dsm_accordion_gap_last_edited'];
		$dsm_accordion_gap_responsive_active    = et_pb_get_responsive_status( $dsm_accordion_gap_last_edited );
		$dsm_open_bg_color_last_edited          = $this->props['dsm_open_bg_color_last_edited'];
		$dsm_open_bg_color_responsive_active    = et_pb_get_responsive_status( $dsm_open_bg_color_last_edited );
		$dsm_open_bg_color_hover                = $this->get_hover_value( 'dsm_open_bg_color' );
		$dsm_close_bg_color_hover               = $this->get_hover_value( 'dsm_close_bg_color' );
		$dsm_close_bg_color_last_edited         = $this->props['dsm_close_bg_color_last_edited'];
		$dsm_close_bg_color_responsive_active   = et_pb_get_responsive_status( $dsm_close_bg_color_last_edited );
		$dsm_open_icon_color_hover              = $this->get_hover_value( 'dsm_open_icon_color' );
		$dsm_open_icon_color_last_edited        = $this->props['dsm_open_icon_color_last_edited'];
		$dsm_open_icon_color_responsive_active  = et_pb_get_responsive_status( $dsm_open_icon_color_last_edited );
		$dsm_close_icon_color_hover             = $this->get_hover_value( 'dsm_close_icon_color' );
		$dsm_close_icon_color_last_edited       = $this->props['dsm_close_icon_color_last_edited'];
		$dsm_close_icon_color_responsive_active = et_pb_get_responsive_status( $dsm_close_icon_color_last_edited );
		$dsm_open_font_size_last_edited         = $this->props['dsm_open_font_size_last_edited'];
		$dsm_open_font_size_responsive_active   = et_pb_get_responsive_status( $dsm_open_font_size_last_edited );
		$dsm_close_font_size_last_edited        = $this->props['dsm_close_font_size_last_edited'];
		$dsm_close_font_size_responsive_active  = et_pb_get_responsive_status( $dsm_close_font_size_last_edited );

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

		wp_enqueue_script( 'dsm-faq' );

		if ( 'on' === $this->props['dsm_use_image'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-container .dsm-faq-item-wrapper .dsm-title-wrapper .dsm-faq-title',
					'declaration' => 'margin-left: 10px;',
				)
			);
		}

		if ( 'left' === $this->props['dsm_icon_placement'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-container .dsm-faq-item-wrapper .dsm-title-inner-wrapper,%%order_class%% .dsm-faq-container .dsm-faq-item-wrapper .dsm-faq-item-inner-wrapper',
					'declaration' => 'display:flex; align-items:center;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-container .dsm-faq-item-wrapper .dsm-title-wrapper .dsm-faq-title',
					'declaration' => 'margin-left: 10px;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-container .dsm-faq-item-wrapper .dsm-title-wrapper',
					'declaration' => 'justify-content: space-between;',
				)
			);
		}

		if ( 'right' === $this->props['dsm_icon_placement'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-container .dsm-faq-item-wrapper .dsm-title-inner-wrapper,%%order_class%% .dsm-faq-container .dsm-faq-item-wrapper .dsm-faq-item-inner-wrapper',
					'declaration' => 'display:flex; align-items:center;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-container .dsm-faq-item-wrapper .dsm-title-wrapper',
					'declaration' => 'justify-content: space-between;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_icon_open_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => 'border-style:solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_icon_close_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_image_open_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => 'border-style:solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_image_close_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => 'border-style:solid;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_animate_icon'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon span, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon span',
					'declaration' => 'transform: rotate(-90deg);transition: 0.3s; display:block;',
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_icon span, %%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_faq-item-open_icon span',
					'declaration' => 'transform: rotate(0deg);',
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_close_icon span, %%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_faq-item-close_icon span',
					'declaration' => 'transform: rotate(90deg);',
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon span, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon span',
					'declaration' => 'transform: rotate(0deg);transition: 0.3s; display:block;',
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm-faq-title',
				'declaration' => 'padding-bottom: 0px !important;',
			)
		);

		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'dsm_open_font_icon',
				'selector'       => '%%order_class%% .dsm_open_icon span',
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
				'base_attr_name' => 'dsm_close_font_icon',
				'selector'       => '%%order_class%% .dsm_close_icon span',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active:hover',
					'declaration' => sprintf( 'background: %1$s;', $dsm_open_bg_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_open_bg_color'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_open_bg_color'] ),
				)
			);
		}

		if ( $dsm_open_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active):hover',
					'declaration' => sprintf( 'background: %1$s;', $dsm_close_bg_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_close_bg_color'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_bg_color'] ),
				)
			);
		}

		if ( $dsm_close_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_accordion_gap'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper',
					'declaration' => sprintf( 'margin-bottom: %1$s;', $this->props['dsm_accordion_gap'] ),
				)
			);
		}

		if ( $dsm_accordion_gap_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper',
					'declaration' => sprintf( 'margin-bottom: %1$s;', $this->props['dsm_accordion_gap_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_accordion_gap_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper',
					'declaration' => sprintf( 'margin-bottom: %1$s;', $this->props['dsm_accordion_gap_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $dsm_open_icon_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active:hover .dsm_open_icon,%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active:hover .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'background: %1$s;', $dsm_open_icon_bg_color_hover ),
				)
			);
		}

		if ( $dsm_open_icon_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active:hover .dsm_open_icon,%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active:hover .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'color: %1$s;', $dsm_open_icon_color_hover ),
				)
			);
		}

		if ( $dsm_close_icon_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:hover .dsm_close_icon,%%order_class%% .dsm-faq-item-wrapper:hover .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'color: %1$s;', $dsm_close_icon_color_hover ),
				)
			);
		}

		if ( $dsm_close_icon_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:hover .dsm_close_icon,%%order_class%% .dsm-faq-item-wrapper:hover .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'background: %1$s;', $dsm_close_icon_bg_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_open_icon_bg_color'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_open_icon_bg_color'] ),
				)
			);
		}

		if ( $dsm_open_icon_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_open_icon_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_open_icon_color'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_open_icon_color'] ),
				)
			);
		}

		if ( $dsm_open_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_open_icon_color_phone'] ),
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
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_margin'], $margin, $important ),
			)
		);

		if ( $dsm_open_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_padding'], $padding, $important ),
			)
		);

		if ( $dsm_open_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_icon_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_close_icon_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_icon_bg_color'] ),
				)
			);
		}

		if ( $dsm_close_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_close_icon_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_close_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_close_icon_color'] ),
				)
			);
		}

		if ( $dsm_close_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_close_icon_color_phone'] ),
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
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_margin'], $margin, $important ),
			)
		);

		if ( $dsm_close_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_padding'], $padding, $important ),
			)
		);

		if ( $dsm_close_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_icon_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_open_font_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
					'declaration' => sprintf( 'font-size : %1$s;', $this->props['dsm_open_font_size'] ),
				)
			);
		}

		if ( $dsm_open_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_open_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-open_icon',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_close_font_size'] ),
				)
			);
		}

		if ( $dsm_close_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
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
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm_close_icon, %%order_class%% .dsm-faq-item-wrapper .dsm_faq-item-close_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_close_font_size_phone'] ),
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
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_margin'], $margin, $important ),
			)
		);

		if ( $dsm_open_toggle_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_toggle_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_padding'], $padding, $important ),
			)
		);

		if ( $dsm_open_toggle_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_toggle_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_toggle_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_margin'], $margin, $important ),
			)
		);

		if ( $dsm_closed_toggle_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_closed_toggle_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_padding'], $padding, $important ),
			)
		);

		if ( $dsm_closed_toggle_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_closed_toggle_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active)',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_closed_toggle_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_open_image_width'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => sprintf( 'width: %1$s; height : %1$s;', $this->props['dsm_open_image_width'] ),
				)
			);
		}

		if ( $dsm_open_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_open_image_width_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_open_image_width_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_close_image_width'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_close_image_width'] ),
				)
			);
		}

		if ( $dsm_close_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_close_image_width_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_close_image_width_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_margin'], $margin, $important ),
			)
		);

		if ( $dsm_open_image_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_image_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_padding'], $padding, $important ),
			)
		);

		if ( $dsm_open_image_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_open_image_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper.dsm-faq-item-active .dsm_open_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_open_image_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_margin'], $margin, $important ),
			)
		);

		if ( $dsm_close_image_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_image_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_padding'], $margin, $important ),
			)
		);

		if ( $dsm_close_image_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_padding_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_close_image_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper:not(.dsm-faq-item-active) .dsm_close_image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_close_image_padding_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm-faq-content',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin'], $margin, $important ),
			)
		);

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm-faq-content',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm-faq-content',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm-faq-content',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding'], $padding, $important ),
			)
		);

		if ( $dsm_content_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm-faq-content',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-faq-item-wrapper .dsm-faq-content',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-faq', plugin_dir_url( __DIR__ ) . 'Faq/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		$output = sprintf(
			'<div class="dsm-faq-container dsm-front" data-accordion="%2$s" data-open_first_item="%3$s">
				%1$s
			 </div>
			 %4$s
			',
			$this->props['content'],
			$this->props['dsm_make_accordion_toggle'],
			$this->props['dsm_open_faq_item'],
			'on' === $this->props['dsm_enable_schema_markup'] ? $this->generate_schema_support() : ''
		);

		return do_shortcode( $output );
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

		if ( $raw_value && 'dsm_open_font_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}

		if ( $raw_value && 'dsm_close_font_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}

		/*
		$fields_need_escape = array(
			'button_text',
		);

		if ( $raw_value && in_array( $name, $fields_need_escape, true ) ) {
			return $this->_esc_attr( $multi_view->get_name_by_mode( $name, $mode ), 'none', $raw_value );
		}*/

		return $raw_value;
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

		$assets_list['dsm_faq'] = array(
			'css' => plugin_dir_url( __DIR__ ) . 'Faq/style.css',
		);

		return $assets_list;
	}
}

new DSM_Faq();
