<?php

class DSM_Step_Flow extends ET_Builder_Module {
	public $slug          = 'dsm_step_flow';
	public $vb_support    = 'on';
	private $module_props = array();
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Step Flow', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content'   => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_image_icon' => esc_html__( 'Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'dsm-title_panel'      => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-content_panel'    => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_image_icon_panel' => esc_html__( 'Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_direction_panel'  => esc_html__( 'Direction', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_badge_panel'      => esc_html__( 'Badge', 'dsm-supreme-modules-pro-for-divi' ),
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
				'header'         => array(
					'label'          => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-step-flow-container .dsm-title',
					),

					'header_level'   => array(
						'default' => 'h4',
					),

					'font_size'      => array(
						'default' => '18px',
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
					'toggle_slug'    => 'dsm-title_panel',
				),

				'dsm_body_text'  => array(
					'label'          => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),

					'css'            => array(
						'main' => '%%order_class%% .dsm-step-flow-container .dsm-content',
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
					'toggle_slug'    => 'dsm-content_panel',
				),

				'dsm_badge_text' => array(
					'label'          => esc_html__( 'Badge', 'dsm-supreme-modules-pro-for-divi' ),

					'css'            => array(
						'main' => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
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
					'toggle_slug'    => 'dsm_badge_panel',
				),
			),

			'box_shadow'     => array(
				'default'               => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),

				'dsm_image_icon_shadow' => array(
					'label'           => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_image_icon_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
					),
				),

				'dsm_badge_shadow'      => array(
					'label'           => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_badge_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
					),
				),
			),

			'borders'        => array(
				'default'               => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),

				'dsm_image_icon_border' => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
							'border_styles' => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
						),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_image_icon_panel',
				),

				'dsm_badge_border'      => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
							'border_styles' => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_badge_panel',
				),
			),

			'margin_padding' => array(
				'css' => array(
					'main' => '%%order_class%% .dsm-step-flow-container',
				),
			),

			'background'     => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),

			'button'         => array(
				'button' => array(
					'label'          => et_builder_i18n( 'Button' ),
					'css'            => array(
						'main'         => '%%order_class%% .dsm-step-flow-container .dsm-button-wrapper .et_pb_button',
						'limited_main' => '%%order_class%% .dsm-step-flow-container .dsm-button-wrapper .et_pb_button',
						'alignment'    => '%%order_class%% .dsm-step-flow-container .dsm-button-wrapper',
					),
					'use_alignment'  => true,
					'box_shadow'     => array(
						'css' => array(
							'main'      => '%%order_class%% .dsm-step-flow-container .dsm-button-wrapper .et_pb_button',
							'important' => true,
						),
					),

					'margin_padding' => array(
						'css' => array(
							'main'      => '%%order_class%% .dsm-step-flow-container .dsm-button-wrapper',
							'important' => 'all',
						),
					),
				),
			),

			'text'           => false,
		);
	}

	public function get_fields() {
		return array(
			'dsm_title'                => array(
				'label'            => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'Enter your Title text here.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'mobile_options'   => true,
			),

			'dsm_badge'                => array(
				'label'            => esc_html__( 'Badge', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'default'          => '',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'Enter the Text for Badge here, which will appear on top of the Card. You can style it & change its position from the Design.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'mobile_options'   => true,
			),

			'dsm_use_content'          => array(
				'label'           => esc_html__( 'Use Description', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'on',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Enable/Disable this option to show/hide the Description.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_content'              => array(
				'label'           => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'tiny_mce',
				'option_category' => 'basic_option',
				'dynamic_content' => 'text',
				'description'     => esc_html__( 'Your Description Content goes here.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,

				'show_if'         => array(
					'dsm_use_content' => 'on',
				),
			),

			'button_text'              => array(
				'label'           => esc_html__( 'Button Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Add in your Button Text here.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
			),

			'button_url'               => array(
				'label'           => esc_html__( 'Button Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Add your Button link here.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'url',
			),

			'url_new_window'           => array(
				'label'           => esc_html__( 'Button Link Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'options'         => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose Whether you want to open the Link in the Same Tab or a New Tab.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_show_dir'             => array(
				'label'           => esc_html__( 'Show Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'mobile_options'  => true,
				'responsive'      => true,
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( "Enable this option If you'd like to show a Direction Arrow.", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_dir_type'             => array(
				'label'           => esc_html__( 'Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'default',
				'options'         => array(
					'default' => esc_html__( 'Default', 'dsm-supreme-modules-pro-for-divi' ),
					'icon'    => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'image'   => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Here you can choose the type of Direction. The Default will add an arrow that you can style from the Design tab. Or you can even choose an Arrow from Divi Icon Library or upload your own.', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_show_dir' => 'on',
				),
			),

			'dsm_dir_image'            => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'default'            => '',
				'default_on_child'   => true,
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display for the Direction Image.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'main_content',
				'show_if'            => array(
					'dsm_show_dir' => 'on',
					'dsm_dir_type' => 'image',
				),
			),

			'dsm_dir_image_width'      => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => 'Here you can adjust image width.',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_direction_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => '%',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_dir_type' => 'image',
					'dsm_show_dir' => 'on',
				),
			),

			'dsm_dir_font_icon'        => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Choose an icon to display with your direction.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_dir_type' => 'icon',
					'dsm_show_dir' => 'on',
				),
			),

			'dsm_dir_font_size'        => array(
				'label'           => esc_html__( 'Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '56px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_direction_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_dir_type' => 'icon',
					'dsm_show_dir' => 'on',
				),
			),

			'dsm_dir_color'            => array(
				'label'          => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for your icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#333333',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_direction_panel',
				'mobile_options' => true,
				'responsive'     => true,

				'show_if'        => array(
					'dsm_dir_type' => 'icon',
					'dsm_show_dir' => 'on',
				),
			),

			'dsm_use_icon'             => array(
				'label'           => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_image_icon',
				'description'     => esc_html__( "Enable this Option If you'd like to use an Icon instead of the image.", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_image'                => array(
				'label'              => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'default'            => '',
				'default_on_child'   => true,
				'dynamic_content'    => 'image',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( 'Upload your image for the Step Flow Card here.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'dsm_image_icon',
				'show_if'            => array(
					'dsm_use_icon' => 'off',
				),
				'affects'            => array(
					'alt',
					'title_text',
				),
			),

			'alt'                      => array(
				'label'           => esc_html__( 'Image Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Define the HTML ALT text for your image here.', 'dsm-supreme-modules-pro-for-divi' ),
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'dsm_image',
				),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),

			'title_text'               => array(
				'label'           => esc_html__( 'Image Title Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'dsm_image',
				),
				'description'     => esc_html__( 'This defines the HTML Title text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),

			'font_icon'                => array(
				'label'           => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'basic_option',
				'default'         => '',
				'class'           => array( 'et-pb-font-icon' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_image_icon',
				'description'     => esc_html__( 'Choose an icon to display with Step Flow.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_use_icon' => 'on',
				),
			),

			'dsm_icon_color'           => array(
				'label'          => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for your icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_image_icon_panel',
				'mobile_options' => true,
				'responsive'     => true,
				'hover'          => 'tabs',

				'show_if'        => array(
					'dsm_use_icon' => 'on',
				),
			),

			'dsm_image_icon_bg_color'  => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom background color for your icon.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_image_icon_panel',
				'mobile_options' => true,
				'responsive'     => true,
				'hover'          => 'tabs',
			),

			'dsm_icon_font_size'       => array(
				'label'           => esc_html__( 'Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '96px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_image_icon_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_use_icon' => 'on',
				),
			),

			'dsm_image_icon_margin'    => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_image_icon_panel',
			),

			'dsm_image_icon_padding'   => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_image_icon_panel',
			),

			'dsm_image_icon_alignment' => array(
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
				'toggleable'      => true,
				'multi_selection' => false,
				'default'         => 'center',
				'toggle_slug'     => 'dsm_image_icon_panel',
				'tab_slug'        => 'advanced',
			),

			'dsm_image_width'          => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '50%',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_image_icon_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => '%',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_use_icon' => 'off',
				),
			),

			'dsm_dir_style'            => array(
				'label'           => esc_html__( 'Style', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'solid',
				'options'         => array(
					'solid'  => esc_html__( 'Solid', 'dsm-supreme-modules-pro-for-divi' ),
					'dotted' => esc_html__( 'Dotted', 'dsm-supreme-modules-pro-for-divi' ),
					'dashed' => esc_html__( 'Dashed', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_direction_panel',
				'description'     => esc_html__( 'Here you can define a different Style for your Direction Arrow.', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_show_dir' => 'on',
					'dsm_dir_type' => 'default',
				),
			),

			'dsm_dir_width'            => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '100px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_direction_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '150',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_show_dir' => 'on',
					'dsm_dir_type' => 'default',
				),
			),

			'dsm_dir_offset_top'       => array(
				'label'           => esc_html__( 'Offset Top', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_direction_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '500',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_show_dir' => 'on',
				),
			),

			'dsm_dir_offset_left'      => array(
				'label'           => esc_html__( 'Offset Left', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_direction_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '500',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_show_dir' => 'on',
				),
			),

			'dsm_dir_color'            => array(
				'label'          => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for your direction arrow.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#dddddd',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_direction_panel',
				'mobile_options' => true,
				'responsive'     => true,

				'show_if'        => array(
					'dsm_show_dir' => 'on',
				),
			),

			'dsm_badge_position'       => array(
				'label'           => esc_html__( 'Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'top_right',
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
				'toggle_slug'     => 'dsm_badge_panel',
				'description'     => esc_html__( 'Here you can choose position of the badge.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_badge_use_position'   => array(
				'label'           => esc_html__( 'Use Custom Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_badge_panel',
				'description'     => esc_html__( 'Here you can choose to have a custom position for your badge.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_badge_left_position'  => array(
				'label'           => esc_html__( 'Left Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_badge_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => '%',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_badge_use_position' => 'on',
				),
			),

			'dsm_badge_top_position'   => array(
				'label'           => esc_html__( 'Top Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_badge_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => '%',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_badge_use_position' => 'on',
				),
			),

			'dsm_badge_bg_color'       => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom background color for your badge.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_badge_panel',
				'mobile_options' => true,
				'responsive'     => true,
				'hover'          => 'tabs',
			),

			'dsm_badge_margin'         => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_badge_panel',
			),

			'dsm_badge_padding'        => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_badge_panel',
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$multi_view                       = et_pb_multi_view_options( $this );
		$alt                              = $this->props['alt'];
		$title_text                       = $this->props['title_text'];
		$dsm_icon_color_last_edited       = $this->props['dsm_icon_color_last_edited'];
		$dsm_icon_color_responsive_active = et_pb_get_responsive_status( $dsm_icon_color_last_edited );

		$dsm_image_icon_bg_color_last_edited       = $this->props['dsm_image_icon_bg_color_last_edited'];
		$dsm_image_icon_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_image_icon_bg_color_last_edited );

		$dsm_icon_font_size_last_edited       = $this->props['dsm_icon_font_size_last_edited'];
		$dsm_icon_font_size_responsive_active = et_pb_get_responsive_status( $dsm_icon_font_size_last_edited );

		$dsm_image_icon_margin_last_edited       = $this->props['dsm_image_icon_margin_last_edited'];
		$dsm_image_icon_margin_responsive_active = et_pb_get_responsive_status( $dsm_image_icon_margin_last_edited );

		$dsm_image_icon_padding_last_edited       = $this->props['dsm_image_icon_padding_last_edited'];
		$dsm_image_icon_padding_responsive_active = et_pb_get_responsive_status( $dsm_image_icon_padding_last_edited );

		$dsm_image_width_last_edited       = $this->props['dsm_image_width_last_edited'];
		$dsm_image_width_responsive_active = et_pb_get_responsive_status( $dsm_image_width_last_edited );

		$dsm_dir_color_last_edited       = $this->props['dsm_dir_color_last_edited'];
		$dsm_dir_color_responsive_active = et_pb_get_responsive_status( $dsm_dir_color_last_edited );

		$dsm_dir_width_last_edited       = $this->props['dsm_dir_width_last_edited'];
		$dsm_dir_width_responsive_active = et_pb_get_responsive_status( $dsm_dir_width_last_edited );

		$dsm_dir_offset_left_last_edited       = $this->props['dsm_dir_offset_left_last_edited'];
		$dsm_dir_offset_left_responsive_active = et_pb_get_responsive_status( $dsm_dir_offset_left_last_edited );

		$dsm_dir_offset_top_last_edited       = $this->props['dsm_dir_offset_top_last_edited'];
		$dsm_dir_offset_top_responsive_active = et_pb_get_responsive_status( $dsm_dir_offset_top_last_edited );

		$dsm_badge_margin_last_edited       = $this->props['dsm_badge_margin_last_edited'];
		$dsm_badge_margin_responsive_active = et_pb_get_responsive_status( $dsm_badge_margin_last_edited );

		$dsm_badge_padding_last_edited       = $this->props['dsm_badge_padding_last_edited'];
		$dsm_badge_padding_responsive_active = et_pb_get_responsive_status( $dsm_badge_padding_last_edited );

		$dsm_badge_bg_color_last_edited       = $this->props['dsm_badge_bg_color_last_edited'];
		$dsm_badge_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_badge_bg_color_last_edited );

		$dsm_dir_font_size_last_edited       = $this->props['dsm_dir_font_size_last_edited'];
		$dsm_dir_font_size_responsive_active = et_pb_get_responsive_status( $dsm_dir_font_size_last_edited );

		$dsm_dir_color_last_edited       = $this->props['dsm_dir_color_last_edited'];
		$dsm_dir_color_responsive_active = et_pb_get_responsive_status( $dsm_dir_color_last_edited );

		$dsm_badge_left_position_last_edited       = $this->props['dsm_badge_left_position_last_edited'];
		$dsm_badge_left_position_responsive_active = et_pb_get_responsive_status( $dsm_badge_left_position_last_edited );

		$dsm_badge_top_position_last_edited       = $this->props['dsm_badge_top_position_last_edited'];
		$dsm_badge_top_position_responsive_active = et_pb_get_responsive_status( $dsm_badge_top_position_last_edited );

		$dsm_dir_image_width_last_edited       = $this->props['dsm_dir_image_width_last_edited'];
		$dsm_dir_image_width_responsive_active = et_pb_get_responsive_status( $dsm_dir_image_width_last_edited );

		$dsm_show_dir_last_edited       = $this->props['dsm_show_dir_last_edited'];
		$dsm_show_dir_responsive_active = et_pb_get_responsive_status( $dsm_show_dir_last_edited );

		$dsm_icon_color_hover          = $this->get_hover_value( 'dsm_icon_color' );
		$dsm_image_icon_bg_color_hover = $this->get_hover_value( 'dsm_image_icon_bg_color' );

		$dsm_badge_bg_color_hover = $this->get_hover_value( 'dsm_badge_bg_color' );

		$button_url     = $this->props['button_url'];
		$button_rel     = $this->props['button_rel'];
		$button_text    = $this->_esc_attr( 'button_text', 'limited' );
		$url_new_window = $this->props['url_new_window'];
		$button_custom  = $this->props['custom_button'];

		$custom_icon_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon        = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone  = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';

		if ( '' === $this->props['border_style_all_dsm_badge_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-badge',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_show_dir'] ) {

			if ( 'default' === $this->props['dsm_dir_type'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper',
						'declaration' => 'overflow: visible !important;',
					)
				);

				if ( $this->props['dsm_dir_style'] ) {
						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow',
								'declaration' => sprintf( 'border-style: %1$s;', $this->props['dsm_dir_style'] ),
							)
						);

						ET_Builder_Element::set_style(
							$render_slug,
							array(
								'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow::before',
								'declaration' => sprintf( 'border-top-style: %1$s; border-right-style : %1$s;', $this->props['dsm_dir_style'] ),
							)
						);
				}

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow',
						'declaration' => 'position: absolute;
										display: inline-block;
										top: 49%;
										left: calc(100% + 20px);
										width: 100px;
										border-bottom-color: transparent;
										border-left-color: transparent;
										border-right-color: transparent;
										border-top-width: 2px;',
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow::before',
						'declaration' => 'content: "";
										top: -3px;
										right: 5px;
										width: 12px;
										height: 12px;
										position: absolute;
										display: inline-block;
										transform: rotate(45deg) translateY(-50%);
										border-top-width: 2px;
										border-right-width: 2px;',
					)
				);

				if ( $this->props['dsm_dir_color'] ) {

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow::before',
							'declaration' => sprintf( 'border-top-color : %1$s;border-right-color : %1$s;', $this->props['dsm_dir_color'] ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow',
							'declaration' => sprintf( 'border-top-color : %1$s;', $this->props['dsm_dir_color'] ),
						)
					);
				}

				if ( $dsm_dir_color_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow',
							'declaration' => sprintf( 'border-top-color : %1$s;', $this->props['dsm_dir_color_tablet'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow::before',
							'declaration' => sprintf( 'border-top-color : %1$s;border-right-color : %1$s;', $this->props['dsm_dir_color_tablet'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);
				}

				if ( $dsm_dir_color_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow',
							'declaration' => sprintf( 'border-top-color : %1$s;', $this->props['dsm_dir_color_phone'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow::before',
							'declaration' => sprintf( 'border-top-color : %1$s;border-right-color : %1$s;', $this->props['dsm_dir_color_phone'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}

				if ( $this->props['dsm_dir_width'] ) {

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow',
							'declaration' => sprintf( 'width : %1$s;', $this->props['dsm_dir_width'] ),
						)
					);
				}

				if ( $dsm_dir_width_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow',
							'declaration' => sprintf( 'width : %1$s;', $this->props['dsm_dir_width_tablet'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);
				}

				if ( $dsm_dir_width_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow',
							'declaration' => sprintf( 'width : %1$s;', $this->props['dsm_dir_width_phone'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}
			}

			if ( 'icon' === $this->props['dsm_dir_type'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
						'declaration' => 'position: absolute;
										  display: inline-block;
										  top: 49%;
										  left: calc(100% + 20px);',
					)
				);

				if ( $this->props['dsm_dir_color'] ) {

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
							'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_dir_color'] ),
						)
					);
				}

				if ( $dsm_dir_color_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
							'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_dir_color_tablet'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);
				}

				if ( $dsm_dir_color_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
							'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_dir_color_phone'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}
			}

			if ( 'image' === $this->props['dsm_dir_type'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => 'position: absolute;
										  display: inline-block;
										  top: 49%;
										  left: calc(100% + 20px);',
					)
				);

				if ( $this->props['dsm_dir_image_width'] ) {

					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
							'declaration' => sprintf( 'width : %1$s;', $this->props['dsm_dir_image_width'] ),
						)
					);
				}

				if ( $dsm_dir_image_width_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
							'declaration' => sprintf( 'width : %1$s;', $this->props['dsm_dir_image_width_tablet'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);
				}

				if ( $dsm_dir_image_width_responsive_active ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
							'declaration' => sprintf( 'width : %1$s;', $this->props['dsm_dir_image_width_phone'] ),
							'important'   => 'all',
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}
			}

			if ( 'off' === $this->props['dsm_show_dir_tablet'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
						'declaration' => 'display:none !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => 'display:none !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow::before',
						'declaration' => 'display: none !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'on' === $this->props['dsm_show_dir_tablet'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
						'declaration' => 'display:block !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => 'display:block !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow::before',
						'declaration' => 'display: block !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'off' === $this->props['dsm_show_dir_phone'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
						'declaration' => 'display:none !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => 'display:none !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow::before',
						'declaration' => 'display: none !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'on' === $this->props['dsm_show_dir_phone'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
						'declaration' => 'display: block !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => 'display: block !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow::before',
						'declaration' => 'display: block !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( $this->props['dsm_dir_offset_top'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => sprintf( 'top: %1$s;', $this->props['dsm_dir_offset_top'] ),
					)
				);
			}

			if ( $dsm_dir_offset_top_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => sprintf( 'top : %1$s;', $this->props['dsm_dir_offset_top_tablet'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_dir_offset_top_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => sprintf( 'top : %1$s;', $this->props['dsm_dir_offset_top_phone'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( $this->props['dsm_dir_offset_left'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => sprintf( 'left: %1$s;', $this->props['dsm_dir_offset_left'] ),
					)
				);
			}

			if ( $dsm_dir_offset_left_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => sprintf( 'left : %1$s;', $this->props['dsm_dir_offset_left_tablet'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_dir_offset_left_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-step-arrow, %%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon, %%order_class%% .dsm-steps-image-icon-wrapper .dsm-dir-image',
						'declaration' => sprintf( 'left : %1$s;', $this->props['dsm_dir_offset_left_phone'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( '' === $this->props['border_style_all_dsm_image_icon_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm_icon, %%order_class%% .dsm-step-flow-container .dsm-image-wrap',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( $dsm_icon_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper:hover .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $dsm_icon_color_hover ),
				)
			);
		}

		if ( $dsm_image_icon_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper:hover .dsm_icon, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper:hover .dsm-image-wrap',
					'declaration' => sprintf( 'background: %1$s;', $dsm_image_icon_bg_color_hover ),
				)
			);
		}

		if ( $dsm_badge_bg_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper:hover .dsm-step-badge',
					'declaration' => sprintf( 'background: %1$s;', $dsm_badge_bg_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_image_icon_alignment'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container',
					'declaration' => sprintf( 'text-align: %1$s;', $this->props['dsm_image_icon_alignment'] ),
				)
			);
		}

		if ( $this->props['dsm_icon_color'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_icon_color'] ),
				)
			);
		}

		if ( $dsm_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_icon_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_icon_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_icon_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_image_icon_bg_color'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_image_icon_bg_color'] ),
				)
			);
		}

		if ( $dsm_image_icon_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_image_icon_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_image_icon_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_image_icon_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_icon_font_size'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm_icon',
					'declaration' => sprintf( 'font-size : %1$s;', $this->props['dsm_icon_font_size'] ),
				)
			);
		}

		if ( $dsm_icon_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_icon_font_size_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_icon_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_icon_font_size_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_image_width'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-image-wrap',
					'declaration' => sprintf( 'width : %1$s; display:inline-block;', $this->props['dsm_image_width'] ),
				)
			);
		}

		if ( $dsm_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-image-wrap',
					'declaration' => sprintf( 'width : %1$s; display:inline-block;', $this->props['dsm_image_width_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm-image-wrap',
					'declaration' => sprintf( 'width: %1$s; display:inline-block;', $this->props['dsm_image_width_phone'] ),
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
				'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_icon_margin'], $margin, $important ),
			)
		);

		if ( $dsm_image_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_icon_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_image_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_icon_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_icon_padding'], $padding, $important ),
			)
		);

		if ( $dsm_image_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_icon_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_image_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm-image-wrap, %%order_class%% .dsm-step-flow-container .dsm-steps-image-icon-wrapper .dsm_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_image_icon_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_badge_margin'], $margin, $important ),
			)
		);

		if ( $dsm_badge_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_badge_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_badge_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_badge_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_badge_padding'], $padding, $important ),
			)
		);

		if ( $dsm_badge_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_badge_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_badge_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_badge_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_badge_bg_color'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
					'declaration' => sprintf( 'background : %1$s;', $this->props['dsm_badge_bg_color'] ),
				)
			);
		}

		if ( $dsm_badge_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
					'declaration' => sprintf( 'background : %1$s;', $this->props['dsm_badge_bg_color_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_badge_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
					'declaration' => sprintf( 'background : %1$s;', $this->props['dsm_badge_bg_color_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_dir_font_size'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
					'declaration' => sprintf( 'font-size : %1$s;', $this->props['dsm_dir_font_size'] ),
				)
			);
		}

		if ( $dsm_dir_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
					'declaration' => sprintf( 'font-size : %1$s;', $this->props['dsm_dir_font_size_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_dir_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-steps-image-icon-wrapper .dsm_dir_icon',
					'declaration' => sprintf( 'font-size : %1$s;', $this->props['dsm_dir_font_size_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'on' === $this->props['dsm_badge_use_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
					'declaration' => 'left: 5px; top: 5px;',
				)
			);

			if ( $this->props['dsm_badge_left_position'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => sprintf( 'left : %1$s;', $this->props['dsm_badge_left_position'] ),
					)
				);
			}

			if ( $dsm_badge_left_position_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => sprintf( 'left : %1$s;', $this->props['dsm_badge_left_position_tablet'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_badge_left_position_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => sprintf( 'left : %1$s;', $this->props['dsm_badge_left_position_phone'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( $this->props['dsm_badge_top_position'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => sprintf( 'top : %1$s;', $this->props['dsm_badge_top_position'] ),
					)
				);
			}

			if ( $dsm_badge_top_position_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => sprintf( 'top : %1$s;', $this->props['dsm_badge_top_position_tablet'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_badge_top_position_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => sprintf( 'top : %1$s;', $this->props['dsm_badge_top_position_phone'] ),
						'important'   => 'all',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( 'off' === $this->props['dsm_badge_use_position'] ) {

			if ( 'top_left' === $this->props['dsm_badge_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => 'left: 5px; top: 5px;',
					)
				);
			}

			if ( 'top_center' === $this->props['dsm_badge_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => 'top: 5px;
                                              left: 50%;
                                              transform: translateX(-50%);',
					)
				);
			}

			if ( 'top_right' === $this->props['dsm_badge_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => 'right: 5px; top: 5px;',
					)
				);
			}

			if ( 'center_left' === $this->props['dsm_badge_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => 'top: 50%;
                                              left: 0%;
                                              transform: translateY(-50%);',
					)
				);
			}

			if ( 'center' === $this->props['dsm_badge_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => 'top: 50%;
                                              left: 50%;
                                              transform: translate(-50%,-50%);',
					)
				);
			}

			if ( 'center_right' === $this->props['dsm_badge_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => 'top: 50%;
                                              right: 0%;
                                              transform: translateY(-50%);',
					)
				);
			}

			if ( 'bottom_left' === $this->props['dsm_badge_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => 'left: 5px; bottom: 5px;',
					)
				);
			}

			if ( 'bottom_center' === $this->props['dsm_badge_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => 'bottom: 5px;
                                              left: 50%;
                                              transform: translateX(-50%);',
					)
				);
			}

			if ( 'bottom_right' === $this->props['dsm_badge_position'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-step-badge',
						'declaration' => 'right: 5px; bottom: 5px;',
					)
				);
			}
		}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-step-flow-container .dsm-button-wrapper .et_pb_button::after',
					'declaration' => 'content: attr(data-icon);',
				)
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

		$this->generate_styles(
			array(
				'utility_arg'    => 'icon_font_family',
				'render_slug'    => $render_slug,
				'base_attr_name' => 'dsm_dir_font_icon',
				'selector'       => '%%order_class%% .dsm_dir_icon',
				'important'      => true,
				'processor'      => array(
					'ET_Builder_Module_Helper_Style_Processor',
					'process_extended_icon',
				),
			)
		);

		$step_title = $multi_view->render_element(
			array(
				'tag'     => $this->props['header_level'],
				'content' => '{{dsm_title}}',
				'attrs'   => array(
					'class' => 'dsm-title',
				),
			)
		);

		$step_content = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{dsm_content}}',
				'attrs'   => array(
					'class' => 'dsm-content',
				),
			)
		);

		$step_badge = $multi_view->render_element(
			array(
				'tag'     => 'div',
				'content' => '{{dsm_badge}}',
				'attrs'   => array(
					'class' => 'dsm-step-badge',
				),
			)
		);

		// Load up Dynamic Content (if needed) to capture Featured Image objects.
		// In this way we can process `alt` and `title` attributes defined in
		// the WP Media Library when they haven't been specified by the user in
		// Module Settings.

		if ( empty( $alt ) || empty( $title_text ) ) {
			$raw_src   = et_()->array_get( $this->attrs_unprocessed, 'dsm_image' );
			$src_value = et_builder_parse_dynamic_content( $raw_src );

			if ( empty( $alt ) ) {
				$alt = get_post_meta( attachment_url_to_postid( $raw_src ), '_wp_attachment_image_alt', true );
			}

				// If there is no user-specified TITLE attribute text, check the WP
				// Media Library entry for text that may have been added there.
			if ( empty( $title_text ) ) {
				$title_text = get_the_title( attachment_url_to_postid( $raw_src ) );
			}
		}

		$image_attrs = array(
			'src'   => '{{dsm_image}}',
			'alt'   => esc_attr( $alt ),
			'title' => esc_attr( $title_text ),
		);

		$step_image = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => $image_attrs,
				'required' => 'dsm_image',
			)
		);

		$step_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{font_icon}}',
				'attrs'   => array(
					'class' => 'dsm_icon',
				),
			)
		);

		$direction_icon = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{dsm_dir_font_icon}}',
				'attrs'   => array(
					'class' => 'dsm_dir_icon',
				),
			)
		);

		$button = $this->render_button(
			array(
				'button_id'           => $this->module_id( false ),
				'button_classname'    => explode( ' ', $this->module_classname( $render_slug ) ),
				'button_custom'       => $button_custom,
				'button_rel'          => $button_rel,
				'button_text'         => $button_text,
				'button_text_escaped' => true,
				'button_url'          => $button_url,
				'custom_icon'         => $custom_icon,
				'custom_icon_tablet'  => $custom_icon_tablet,
				'custom_icon_phone'   => $custom_icon_phone,
				'has_wrapper'         => false,
				'url_new_window'      => $url_new_window,
				'multi_view_data'     => $multi_view->render_attrs(
					array(
						'content'        => '{{button_text}}',
						'hover_selector' => '%%order_class%%.et_pb_button',
						'visibility'     => array(
							'button_text' => '__not_empty',
						),
					)
				),
			)
		);

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-glitch-text', plugin_dir_url( __DIR__ ) . 'StepFlow/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return sprintf(
			'<div class="dsm-step-flow-container">
				<div class="dsm-steps-image-icon-wrapper">
					%5$s  
					%3$s
					%4$s
					%7$s
					%8$s
				</div>
				%6$s
				%1$s
				%2$s
				%9$s 
			</div>',
			'' !== $this->props['dsm_title'] ? $step_title : '',
			'on' === $this->props['dsm_use_content'] ? $step_content : '',
			'off' === $this->props['dsm_use_icon'] ? sprintf( '<span class="dsm-image-wrap">%1$s</span>', $step_image ) : '',
			$step_icon,
			'on' === $this->props['dsm_show_dir'] ? '<div class="dsm-step-arrow"></div>' : '',
			$this->props['dsm_badge'] ? $step_badge : '',
			'icon' === $this->props['dsm_dir_type'] ? $direction_icon : '',
			'image' === $this->props['dsm_dir_type'] ? sprintf( '<img class="dsm-dir-image" src="%1$s"/>', $this->props['dsm_dir_image'] ) : '',
			'' !== $button_text ? sprintf( '<div class="dsm-button-wrapper">%1$s</div>', et_core_esc_previously( $button ) ) : ''
		);
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

		if ( $raw_value && 'dsm_dir_font_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}

		return $raw_value;
	}

	public function dsm_load_required_divi_assets( $assets_list, $assets_args, $instance ) {
		$assets_prefix  = et_get_dynamic_assets_path();
		$all_shortcodes = $instance->get_saved_page_shortcodes();

		$assets_list['dsm_step_flow'] = array(
			'css' => plugin_dir_url( __DIR__ ) . 'StepFlow/style.css',
		);
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

new DSM_Step_Flow();
