<?php

class DSM_Advanced_Tabs extends ET_Builder_Module {



	public $slug       = 'dsm_advanced_tabs';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name            = esc_html__( 'Supreme Advanced Tabs', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_slug      = 'dsm_advanced_tabs_child';
		$this->child_item_text = esc_html__( 'Advanced Tabs Item', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path       = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'tabs_wrapper'       => esc_html__( 'Tabs Wrapper', 'dsm-supreme-modules-pro-for-divi' ),
					'image_icon'         => esc_html__( 'Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'content_image_icon' => esc_html__( 'Content Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'alignment'          => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
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
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'tab_title'        => array(
					'label'           => esc_html__( 'Tab', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% .dsm-tab .dsm-title, %%order_class%% .dsm-tab .dsm-title a',
					),
					'hide_text_color' => true,

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

					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_tabs',
				),

				'tab_subtitle'     => array(
					'label'           => esc_html__( 'Subtitle', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% .dsm-tab .dsm-tab-subtitle, %%order_class%% .dsm-tab .dsm-tab-subtitle a',
					),
					'hide_text_color' => true,

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

					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_tabs_subtitle',
				),

				'content_title'    => array(
					'label'          => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-inner-content .dsm-title',
					),

					'header_level'   => array(
						'default' => 'h2',
					),

					'font_size'      => array(
						'default' => '24px',
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
					'label'          => esc_html__( 'Content Text', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper .dsm-content',
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
				'default'             => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),

				'tabs_image_icon'     => array(
					'css'         => array(
						'main' => '%%order_class%%  .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon,%%order_class%%  .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'image_icon',
				),

				'tabs_shadow'         => array(
					'label'       => esc_html__( 'Tabs Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_tabs',
				),

				'tab_active_shadow'   => array(
					'label'       => esc_html__( 'Active Tab Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab.dsm-active, %%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper .dsm-tab:focus',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_tabs',
				),

				'tabs_wrapper_shadow' => array(
					'css'         => array(
						'main' => '%%order_class%% .dsm-advanced-tabs-wrapper',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'tabs_wrapper',
				),

				'content_shadow'      => array(
					'css'         => array(
						'main' => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content',
				),

				'content_image_icon'  => array(
					'css'         => array(
						'main' => '%%order_class%% .dsm-content-wrapper .dsm-icon, %%order_class%% .dsm-content-wrapper .dsm-image',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'content_image_icon',
				),
			),

			'borders'        => array(
				'default'                       => array(
					'css'      => array(
						'main' => '%%order_class%%',
					),

					'defaults' => array(
						'border_styles' => array(
							'width' => '1px',
							'color' => '#000000',
							'style' => 'solid',
						),
					),
				),

				'dsm_tabs_border'               => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-tab',
							'border_styles' => '%%order_class%% .dsm-tab',
						),
					),

					'label_prefix' => esc_html__( 'Tabs', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_tabs',
				),

				'dsm_active_tabs_border'        => array(
					'label_prefix' => esc_html__( 'Active Tabs', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-tab.dsm-active, %%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper .dsm-tab:focus',
							'border_styles' => '%%order_class%% .dsm-tab.dsm-active, %%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper .dsm-tab:focus',
						),
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_tabs',
				),

				'dsm_tabs_wrapper_border'       => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%%  .dsm-advanced-tabs-wrapper',
							'border_styles' => '%%order_class%%  .dsm-advanced-tabs-wrapper',
						),
					),

					'label_prefix' => esc_html__( 'Tabs Wrapper', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'tabs_wrapper',
				),

				'dsm_content_border'            => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
							'border_styles' => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
						),
					),

					'defaults'     => array(
						'border_styles' => array(
							'width' => '2px',
							'color' => '#f5f5f5',
							'style' => 'solid',
						),
					),

					'label_prefix' => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_content',
				),

				'dsm_image_icon_border'         => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%%  .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon,%%order_class%%  .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
							'border_styles' => '%%order_class%%  .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon,%%order_class%%  .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
						),
					),

					'label_prefix' => esc_html__( 'Image/Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'image_icon',
				),

				'dsm_content_image_icon_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-content-wrapper .dsm-icon, %%order_class%% .dsm-content-wrapper .dsm-image',
							'border_styles' => '%%order_class%% .dsm-content-wrapper .dsm-icon, %%order_class%% .dsm-content-wrapper .dsm-image',
							'important'     => 'all',
						),
					),

					'label_prefix' => esc_html__( 'Image/Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'content_image_icon',
				),
			),

			'margin_padding' => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),

			'image_icon'     => array(
				'image_icon' => array(
					'margin_padding'  => array(
						'css'            => array(
							'important' => 'all',
						),
						'custom_padding' => array(
							'default' => '10px|15px|10px|15px',
						),
					),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_tabs',
					'label'           => et_builder_i18n( 'Tabs' ),
					'css'             => array(
						'padding' => '%%order_class%% .dsm-tab',
						'margin'  => '%%order_class%% .dsm-tab',
						'main'    => '%%order_class%% .dsm-tab',
					),
				),
			),

			'button'         => array(
				'button' => array(
					'label'          => et_builder_i18n( 'Button' ),
					'css'            => array(
						'main'        => '%%order_class%% .dsm-content-wrapper .et_pb_button',
						'plugin_main' => '%%order_class%% .dsm-content-wrapper .et_pb_button',
						'alignment'   => '%%order_class%% .dsm-content-wrapper .et_pb_button_wrapper',
					),
					'use_alignment'  => true,
					'box_shadow'     => array(
						'css' => array(
							'main' => '%%order_class%% .dsm-content-wrapper .et_pb_button',
						),
					),
					'margin_padding' => array(
						'css' => array(
							'important' => 'all',
						),
					),
				),
			),

			'text'           => false,
			'filters'        => false,
			'transform'      => false,
		);
	}

	public function get_fields() {
		$dsm_animation_list = array(
			'none'              => esc_html__( 'None', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeIn'            => esc_html__( 'Fade In', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDown'        => esc_html__( 'Fade In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDownBig'     => esc_html__( 'Fade In Down Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInLeft'        => esc_html__( 'Fade In Left', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInLeftBig'     => esc_html__( 'Fade In Left Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInRight'       => esc_html__( 'Fade In Right', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInRightBig'    => esc_html__( 'Fade In Right Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDown'        => esc_html__( 'Fade In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInDownBig'     => esc_html__( 'Fade In Down Big', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInUp'          => esc_html__( 'Fade In Up', 'dsm-supreme-modules-pro-for-divi' ),
			'fadeInUpBig'       => esc_html__( 'Fade In Up Big', 'dsm-supreme-modules-pro-for-divi' ),
			'bounce'            => esc_html__( 'Bounce', 'dsm-supreme-modules-pro-for-divi' ),
			'flash'             => esc_html__( 'Flash', 'dsm-supreme-modules-pro-for-divi' ),
			'pulse'             => esc_html__( 'Pulse', 'dsm-supreme-modules-pro-for-divi' ),
			'rubberBand'        => esc_html__( 'Rubber Band', 'dsm-supreme-modules-pro-for-divi' ),
			'shake'             => esc_html__( 'Shake', 'dsm-supreme-modules-pro-for-divi' ),
			'swing'             => esc_html__( 'Swing', 'dsm-supreme-modules-pro-for-divi' ),
			'tada'              => esc_html__( 'Tada', 'dsm-supreme-modules-pro-for-divi' ),
			'wobble'            => esc_html__( 'Wobble', 'dsm-supreme-modules-pro-for-divi' ),
			'jello'             => esc_html__( 'Jello', 'dsm-supreme-modules-pro-for-divi' ),
			'lightSpeedIn'      => esc_html__( 'Light Speed In', 'dsm-supreme-modules-pro-for-divi' ),
			'rollIn'            => esc_html__( 'Roll In', 'dsm-supreme-modules-pro-for-divi' ),
			'hinge'             => esc_html__( 'Hinge', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceIn'          => esc_html__( 'bounceIn', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceInDown'      => esc_html__( 'bounceInDown', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceInLeft'      => esc_html__( 'bounceInLeft', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceInRight'     => esc_html__( 'bounceInRight', 'dsm-supreme-modules-pro-for-divi' ),
			'bounceInUp'        => esc_html__( 'bounceInUp', 'dsm-supreme-modules-pro-for-divi' ),
			'slideInUp'         => esc_html__( 'Slide In Up', 'dsm-supreme-modules-pro-for-divi' ),
			'slideInDown'       => esc_html__( 'Slide In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'slideInLeft'       => esc_html__( 'Slide In Left', 'dsm-supreme-modules-pro-for-divi' ),
			'slideInRight'      => esc_html__( 'Slide In Right', 'dsm-supreme-modules-pro-for-divi' ),
			'flip'              => esc_html__( 'Flip', 'dsm-supreme-modules-pro-for-divi' ),
			'flipInX'           => esc_html__( 'Flip In X', 'dsm-supreme-modules-pro-for-divi' ),
			'flipInY'           => esc_html__( 'Flip In Y', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateIn'          => esc_html__( 'Rotate In', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateInDownLeft'  => esc_html__( 'Rotate In Down Left', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateInDownRight' => esc_html__( 'Rotate In Down Right', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateInUpLeft'    => esc_html__( 'Rotate In Up Left', 'dsm-supreme-modules-pro-for-divi' ),
			'rotateInUpRight'   => esc_html__( 'Rotate In Up Right', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomIn'            => esc_html__( 'Zoom In', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomInDown'        => esc_html__( 'Zoom In Down', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomInLeft'        => esc_html__( 'Zoom In Left', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomInRight'       => esc_html__( 'Zoom In Right', 'dsm-supreme-modules-pro-for-divi' ),
			'zoomInUp'          => esc_html__( 'Zoom In Up', 'dsm-supreme-modules-pro-for-divi' ),
		);

		return array(
			'dsm_aria_label'                      => array(
				'label'            => esc_html__( 'Aria Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				// 'default_on_front' => 'Tab Title',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'The aria label for your tab..', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
			),

			'dsm_tabs_layout'                     => array(
				'label'           => esc_html__( 'Layout', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'horizontal',
				'option_category' => 'configuration',
				'options'         => array(
					'horizontal' => esc_html__( 'Horizontal', 'dsm-supreme-modules-pro-for-divi' ),
					'vertical'   => esc_html__( 'Vertical', 'dsm-supreme-modules-pro-for-divi' ),
					'column'     => esc_html__( 'Column', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_tabs_horizontal_position'        => array(
				'label'           => esc_html__( 'Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'top',
				'option_category' => 'configuration',
				'options'         => array(
					'top'    => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom' => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_tabs_layout' => 'horizontal',
				),
			),

			'dsm_tabs_vertical_position'          => array(
				'label'           => esc_html__( 'Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'left',
				'option_category' => 'configuration',
				'options'         => array(
					'left'  => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'right' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_tabs_layout' => 'vertical',
				),
			),

			'dsm_tabs_mobile_tablet_vertical_pos' => array(
				'label'           => esc_html__( 'Mobile/Tablet Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'top',
				'option_category' => 'configuration',
				'options'         => array(
					'top'    => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom' => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_tabs_layout' => 'vertical',
				),
			),

			'dsm_tabs_column_position'            => array(
				'label'           => esc_html__( 'Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'left',
				'option_category' => 'configuration',
				'options'         => array(
					'left'  => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'right' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_tabs_layout' => 'column',
				),
			),

			'dsm_tabs_mobile_tablet_column_pos'   => array(
				'label'           => esc_html__( 'Mobile/Tablet Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'top',
				'option_category' => 'configuration',
				'options'         => array(
					'top'    => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom' => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_tabs_layout' => 'column',
				),
			),

			'dsm_equal_height'                    => array(
				'label'           => esc_html__( 'Equal Height', 'dsm-supreme-modules-pro-for-divi' ),
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

				'show_if'         => array(
					'dsm_tabs_layout' => 'vertical',
				),
			),

			'dsm_tabs_trigger'                    => array(
				'label'           => esc_html__( 'Trigger', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'click',
				'option_category' => 'configuration',
				'options'         => array(
					'click' => esc_html__( 'Click', 'dsm-supreme-modules-pro-for-divi' ),
					'hover' => esc_html__( 'Hover', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_show_arrow'                      => array(
				'label'           => esc_html__( 'Show Arrow For Active Tab', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
			),

			'dsm_content_animation'               => array(
				'label'           => esc_html__( 'Content Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'none',
				'option_category' => 'configuration',
				'options'         => $dsm_animation_list,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_inner_content_animation'         => array(
				'label'           => esc_html__( 'Inner Content Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'none',
				'option_category' => 'configuration',
				'options'         => $dsm_animation_list,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_tabs_horizontal_alignment'       => array(
				'label'           => esc_html__( 'Tabs Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'left',
				'option_category' => 'configuration',
				'options'         => array(
					'left'   => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'center' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'right'  => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'show_if'         => array(
					'dsm_tabs_layout' => 'horizontal',
				),
			),

			'dsm_tabs_image_icon_placement'       => array(
				'label'           => esc_html__( 'Tabs Image/Icon Placement', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'top',
				'option_category' => 'configuration',
				'options'         => array(
					'top'   => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'left'  => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'right' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_deep_link'                       => array(
				'label'           => esc_html__( 'Enable Deep Link', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'default'         => 'off',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
			),

			'dsm_anchor_scroll'                   => array(
				'label'           => esc_html__( 'Enable Anchor Scroll', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'default'         => 'off',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'dsm_deep_link' => 'on',
				),
				'description'     => esc_html__( 'If enabled, you can create an anchor scroll to open the tab.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_lightbox_image'                  => array(
				'label'           => esc_html__( 'Enable Image Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'default'         => 'off',
				'option_category' => 'basic_option',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
			),

			'dsm_tabs_sticky'                     => array(
				'label'           => esc_html__( 'Make Stick Tabs On Top', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'default'         => 'off',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'responsive'      => true,
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',

				'show_if'         => array(
					'dsm_tabs_layout'              => 'horizontal',
					'dsm_tabs_horizontal_position' => 'top',
				),
			),

			'dsm_stick_tabs_offset'               => array(
				'label'           => esc_html__( 'Stick Tabs Offset', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '88px',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '1000',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_tabs_sticky'              => 'on',
					'dsm_tabs_layout'              => 'horizontal',
					'dsm_tabs_horizontal_position' => 'top',
				),
			),

			'dsm_auto_scroll_mobile'              => array(
				'label'           => esc_html__( 'Auto Scroll On Mobile', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'default'         => 'off',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'responsive'      => true,
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
			),

			'dsm_tabs_vertical_alignment'         => array(
				'label'           => esc_html__( 'Tabs Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'left',
				'option_category' => 'configuration',
				'options'         => array(
					'top'    => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'center' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom' => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_tabs_layout' => 'vertical',
				),
			),

			'dsm_tabs_gap'                        => array(
				'label'           => esc_html__( 'Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_tabs',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
			),

			'dsm_tabs_bg_color'                   => array(
				'label'       => esc_html__( 'Inactive Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#f4f4f4',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_tabs',
				'hover'       => 'tabs',
			),

			'dsm_tabs_active_bg_color'            => array(
				'label'       => esc_html__( 'Active Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#ffffff',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_tabs',
				'hover'       => 'tabs',
			),

			'dsm_tabs_text_color'                 => array(
				'label'       => esc_html__( 'Inactive Title Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_tabs',
				'hover'       => 'tabs',
			),

			'dsm_tabs_active_text_color'          => array(
				'label'       => esc_html__( 'Active Title Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_tabs',
				'hover'       => 'tabs',
			),

			'dsm_tabs_subtitle_color'             => array(
				'label'       => esc_html__( 'Inactive Subtitle Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_tabs',
				'hover'       => 'tabs',
			),

			'dsm_tabs_active_subtitle_color'      => array(
				'label'       => esc_html__( 'Active Subtitle Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_tabs',
				'hover'       => 'tabs',
			),

			'dsm_tabs_image_width'                => array(
				'label'           => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '40px',
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
			),

			'dsm_tabs_icon_size'                  => array(
				'label'           => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '32px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
			),

			'dsm_tabs_icon_color'                 => array(
				'label'       => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#000000',
				'hover'       => 'tabs',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'image_icon',
			),

			'dsm_tabs_active_icon_color'          => array(
				'label'       => esc_html__( 'Active Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#444444',
				'tab_slug'    => 'advanced',
				'hover'       => 'tabs',
				'toggle_slug' => 'image_icon',
			),

			'dsm_content_bg_color'                => array(
				'label'       => esc_html__( 'Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#ffffff',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_content',
			),

			'dsm_content_margin'                  => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_content_padding'                 => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '30px|30px|30px|30px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_tabs_image_icon_margin'          => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_tabs_image_icon_padding'         => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_tabs_wrapper_width'              => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'default_unit'    => '%',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'tabs_wrapper',
				'mobile_options'  => true,
				'responsive'      => true,
				'show_if_not'     => array(
					'dsm_tabs_layout' => 'column',
				),
			),

			'dsm_tabs_wrapper_margin'             => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'tabs_wrapper',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_tabs_wrapper_padding'            => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'tabs_wrapper',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_tabs_wrapper_bg_color'           => array(
				'label'       => esc_html__( 'Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'tabs_wrapper',
				'hover'       => 'tabs',
			),

			'dsm_tabs_wrapper_alignment'          => array(
				'label'           => esc_html__( 'Tabs Wrapper Alignment', 'dsm-supreme-modules-pro-for-divi' ),
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
				'default'         => '',
				'toggleable'      => true,
				'multi_selection' => false,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'tabs_wrapper',
			),

			'dsm_content_image_icon_margin'       => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'content_image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_content_image_icon_padding'      => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'default'         => '10px|10px|10px|0px',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'content_image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_content_image_icon_alignment'    => array(
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

			'dsm_content_icon_size'               => array(
				'label'           => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '32px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'content_image_icon',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
			),

			'dsm_content_image_width'             => array(
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
			),

			'dsm_content_icon_color'              => array(
				'label'       => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#000000',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'content_image_icon',
			),
		);
	}

	public function get_advanced_tabs() {
		global $dsm_advanced_tabs;

		$tabs = '';

		if ( empty( $dsm_advanced_tabs ) ) {
			return '';
		}

		foreach ( $dsm_advanced_tabs as $dsm_advanced_tab ) {
			$tabs .= $dsm_advanced_tab;
		}

		return $tabs;
	}

	public function get_advanced_tabs_content() {
		global $dsm_advanced_tabs_content;

		$tabsContent = '';

		if ( empty( $dsm_advanced_tabs_content ) ) {
			return '';
		}

		foreach ( $dsm_advanced_tabs_content as $dsm_advanced_tab_content ) {
			$tabsContent .= $dsm_advanced_tab_content;
		}

		return $tabsContent;
	}


	function before_render() {
		global $dsm_parent_level, $et_pb_slider_custom_icon, $et_pb_slider_custom_icon_tablet, $et_pb_slider_custom_icon_phone, $deep_link;

		$dsm_parent_level = array(
			'content_title_level' => $this->props['content_title_level'],
		);

		$deep_link     = $this->props['dsm_deep_link'];
		$button_custom = $this->props['custom_button'];

		$custom_icon_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon        = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone  = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';

		$et_pb_slider_custom_icon        = 'on' === $button_custom ? $custom_icon : '';
		$et_pb_slider_custom_icon_tablet = 'on' === $button_custom ? $custom_icon_tablet : '';
		$et_pb_slider_custom_icon_phone  = 'on' === $button_custom ? $custom_icon_phone : '';
	}


	public function render( $attrs, $content, $render_slug ) {
		$dsm_tabs_gap_last_edited       = $this->props['dsm_tabs_gap_last_edited'];
		$dsm_tabs_gap_responsive_active = et_pb_get_responsive_status( $dsm_tabs_gap_last_edited );

		$dsm_tabs_image_width_last_edited       = $this->props['dsm_tabs_image_width_last_edited'];
		$dsm_tabs_image_width_responsive_active = et_pb_get_responsive_status( $dsm_tabs_image_width_last_edited );

		$dsm_tabs_icon_size_last_edited       = $this->props['dsm_tabs_icon_size_last_edited'];
		$dsm_tabs_icon_size_responsive_active = et_pb_get_responsive_status( $dsm_tabs_icon_size_last_edited );

		$dsm_tabs_wrapper_width_last_edited       = $this->props['dsm_tabs_wrapper_width_last_edited'];
		$dsm_tabs_wrapper_width_responsive_active = et_pb_get_responsive_status( $dsm_tabs_wrapper_width_last_edited );

		$dsm_content_margin_last_edited                = $this->props['dsm_content_margin_last_edited'];
		$dsm_content_margin_responsive_active          = et_pb_get_responsive_status( $dsm_content_margin_last_edited );
		$dsm_content_padding_last_edited               = $this->props['dsm_content_padding_last_edited'];
		$dsm_content_padding_responsive_active         = et_pb_get_responsive_status( $dsm_content_padding_last_edited );
		$dsm_tabs_image_icon_margin_last_edited        = $this->props['dsm_tabs_image_icon_margin_last_edited'];
		$dsm_tabs_image_icon_margin_responsive_active  = et_pb_get_responsive_status( $dsm_tabs_image_icon_margin_last_edited );
		$dsm_tabs_image_icon_padding_last_edited       = $this->props['dsm_tabs_image_icon_padding_last_edited'];
		$dsm_tabs_image_icon_padding_responsive_active = et_pb_get_responsive_status( $dsm_tabs_image_icon_padding_last_edited );

		$dsm_tabs_wrapper_margin_last_edited       = $this->props['dsm_tabs_wrapper_margin_last_edited'];
		$dsm_tabs_wrapper_margin_responsive_active = et_pb_get_responsive_status( $dsm_tabs_wrapper_margin_last_edited );

		$dsm_tabs_wrapper_padding_last_edited       = $this->props['dsm_tabs_wrapper_padding_last_edited'];
		$dsm_tabs_wrapper_padding_responsive_active = et_pb_get_responsive_status( $dsm_tabs_wrapper_padding_last_edited );

		$tabs_background_color_hover             = $this->get_hover_value( 'dsm_tabs_bg_color' );
		$tabs_active_background_color_hover      = $this->get_hover_value( 'dsm_tabs_active_bg_color' );
		$tabs_color_hover                        = $this->get_hover_value( 'dsm_tabs_text_color' );
		$tabs_subtitle_color_hover               = $this->get_hover_value( 'dsm_tabs_subtitle_color' );
		$tabs_active_color_hover                 = $this->get_hover_value( 'dsm_tabs_active_text_color' );
		$tabs_active_subtitle_color_hover        = $this->get_hover_value( 'dsm_tabs_active_subtitle_color' );
		$dsm_tabs_icon_color_hover               = $this->get_hover_value( 'dsm_tabs_icon_color' );
		$dsm_tabs_active_icon_color_hover        = $this->get_hover_value( 'dsm_tabs_active_icon_color' );
		$dsm_tabs_wrapper_background_color_hover = $this->get_hover_value( 'dsm_tabs_wrapper_bg_color' );

		$dsm_content_image_icon_margin_last_edited       = $this->props['dsm_content_image_icon_margin_last_edited'];
		$dsm_content_image_icon_margin_responsive_active = et_pb_get_responsive_status( $dsm_content_image_icon_margin_last_edited );

		$dsm_content_image_icon_padding_last_edited       = $this->props['dsm_content_image_icon_padding_last_edited'];
		$dsm_content_image_icon_padding_responsive_active = et_pb_get_responsive_status( $dsm_content_image_icon_padding_last_edited );

		$dsm_content_image_icon_alignment_last_edited       = $this->props['dsm_content_image_icon_alignment_last_edited'];
		$dsm_content_image_icon_alignment_responsive_active = et_pb_get_responsive_status( $dsm_content_image_icon_alignment_last_edited );

		$dsm_content_icon_size_last_edited       = $this->props['dsm_content_icon_size_last_edited'];
		$dsm_content_icon_size_responsive_active = et_pb_get_responsive_status( $dsm_content_icon_size_last_edited );

		$dsm_content_image_width_last_edited       = $this->props['dsm_content_image_width_last_edited'];
		$dsm_content_image_width_responsive_active = et_pb_get_responsive_status( $dsm_content_image_width_last_edited );

		$dsm_tabs_horizontal_alignment_last_edited       = $this->props['dsm_tabs_horizontal_alignment_last_edited'];
		$dsm_tabs_horizontal_alignment_responsive_active = et_pb_get_responsive_status( $dsm_tabs_horizontal_alignment_last_edited );

		$dsm_tabs_image_icon_placement_last_edited       = $this->props['dsm_tabs_image_icon_placement_last_edited'];
		$dsm_tabs_image_icon_placement_responsive_active = et_pb_get_responsive_status( $dsm_tabs_image_icon_placement_last_edited );

		$dsm_stick_tabs_offset_last_edited       = $this->props['dsm_stick_tabs_offset_last_edited'];
		$dsm_stick_tabs_offset_responsive_active = et_pb_get_responsive_status( $dsm_stick_tabs_offset_last_edited );

		global $dsm_advanced_tabs, $dsm_advanced_tabs_content;

		$tabs         = $this->get_advanced_tabs();
		$tabs_content = $this->get_advanced_tabs_content();

		$dsm_advanced_tabs = $dsm_advanced_tabs_content = array();

		$order_class = self::get_module_order_class( $render_slug );

		wp_enqueue_script( 'dsm-advanced-tabs' );
		wp_enqueue_script( 'dsm-magnific-popup' );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm_button',
				'declaration' => 'display:inline-block;',
			)
		);

		if ( 'on' === $this->props['dsm_deep_link'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container',
					'declaration' => 'scroll-margin-top: 100px;',
				)
			);
		}

		if ( $this->props['dsm_tabs_wrapper_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_tabs_wrapper_bg_color'] ),
				)
			);
		}

		if ( $dsm_tabs_wrapper_background_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper:hover',
					'declaration' => sprintf( 'background: %1$s;', $dsm_tabs_wrapper_background_color_hover ),
				)
			);
		}

		// default border styling work.

		if ( '' === $this->props['border_style_all_dsm_tabs_wrapper_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' !== $this->props['button_icon'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-inner-content .et_pb_button::after',
					'declaration' => 'content: attr(data-icon);',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_image_icon_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image, %%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_content_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_width_all_dsm_content_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
					'declaration' => 'border-width: 1px;',
				)
			);
		}

		if ( '' === $this->props['border_color_all_dsm_content_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
					'declaration' => 'border-color: #d9d9d9;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_tabs_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( $this->props['dsm_tabs_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab',
					'declaration' => sprintf( 'background: %1$s', $this->props['dsm_tabs_bg_color'] ),
				)
			);
		}

		if ( $tabs_background_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab:hover',
					'declaration' => sprintf( 'background: %1$s', $tabs_background_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_tabs_active_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_tabs_active_bg_color'] ),
				)
			);
		}

		if ( $tabs_active_background_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active:hover',
					'declaration' => sprintf( 'background: %1$s;', $tabs_active_background_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_tabs_text_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab .dsm-title, %%order_class%% .dsm-tab .dsm-title a',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_tabs_text_color'] ),
				)
			);
		}

		if ( $this->props['dsm_tabs_subtitle_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab .dsm-tab-subtitle, %%order_class%% .dsm-tab .dsm-tab-subtitle a',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_tabs_subtitle_color'] ),
				)
			);
		}

		if ( $tabs_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab:hover .dsm-title, %%order_class%% .dsm-tab:hover .dsm-title a',
					'declaration' => sprintf( 'color: %1$s;', $tabs_color_hover ),
				)
			);
		}

		if ( $tabs_subtitle_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab:hover .dsm-tab-subtitle, %%order_class%% .dsm-tab:hover .dsm-tab-subtitle a',
					'declaration' => sprintf( 'color: %1$s;', $tabs_subtitle_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_tabs_active_text_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active .dsm-title, %%order_class%% .dsm-tab.dsm-active .dsm-title a, %%order_class%% .dsm-tab.dsm-active .dsm-tab-subtitle, %%order_class%% .dsm-tab.dsm-active .dsm-tab-subtitle a',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_tabs_active_text_color'] ),
				)
			);
		}

		if ( $this->props['dsm_tabs_active_subtitle_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active .dsm-tab-subtitle, %%order_class%% .dsm-tab.dsm-active .dsm-tab-subtitle a',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_tabs_active_subtitle_color'] ),
				)
			);
		}

		if ( $tabs_active_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active:hover .dsm-title, %%order_class%% .dsm-tab.dsm-active:hover .dsm-title a',
					'declaration' => sprintf( 'color: %1$s;', $tabs_active_color_hover ),
				)
			);
		}

		if ( $tabs_active_subtitle_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active:hover .dsm-tab-subtitle, %%order_class%% .dsm-tab.dsm-active:hover .dsm-tab-subtitle a',
					'declaration' => sprintf( 'color: %1$s;', $tabs_active_subtitle_color_hover ),
				)
			);
		}

		// tabs gap responsive work.

		if ( $this->props['dsm_tabs_gap'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => sprintf( 'gap: %1$s;', $this->props['dsm_tabs_gap'] ),
				)
			);
		}

		if ( $dsm_tabs_gap_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => sprintf( 'gap: %1$s;', $this->props['dsm_tabs_gap_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_tabs_gap_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => sprintf( 'gap: %1$s;', $this->props['dsm_tabs_gap_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_tabs_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_tabs_icon_color'] ),
				)
			);
		}

		if ( $dsm_tabs_icon_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab:hover .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $dsm_tabs_icon_color_hover ),
				)
			);
		}

		if ( $this->props['dsm_tabs_active_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab.dsm-active .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_tabs_active_icon_color'] ),
				)
			);
		}

		if ( $dsm_tabs_active_icon_color_hover ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab.dsm-active:hover .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $dsm_tabs_active_icon_color_hover ),
				)
			);
		}

		if ( 'column' === $this->props['dsm_tabs_layout'] ) {

			if ( $this->props['dsm_tabs_gap'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => sprintf( 'grid-gap: %1$s;', $this->props['dsm_tabs_gap'] ),
					)
				);
			}

			if ( $dsm_tabs_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => sprintf( 'grid-gap: %1$s;', $this->props['dsm_tabs_gap_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_tabs_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => sprintf( 'grid-gap: %1$s;', $this->props['dsm_tabs_gap_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		// tabs image width responsive work.
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-tab .dsm-image',
				'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_tabs_image_width'] ),
			)
		);

		if ( $dsm_tabs_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_tabs_image_width_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_tabs_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_tabs_image_width_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// tabs icon size responsive work.
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_icon',
				'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_tabs_icon_size'] ),
			)
		);

		if ( $dsm_tabs_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_tabs_icon_size_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_tabs_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_tabs_icon_size_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_horizontal_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'justify-content: flex-start;',
				)
			);
		}

		if ( $dsm_tabs_horizontal_alignment_responsive_active ) {
			if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_horizontal_alignment_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => 'justify-content: flex-start;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_horizontal_alignment_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => 'justify-content: flex-start;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'center' === $this->props['dsm_tabs_horizontal_alignment_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => 'justify-content: center;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'center' === $this->props['dsm_tabs_horizontal_alignment_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => 'justify-content: center;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_horizontal_alignment_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => 'justify-content: flex-end;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_horizontal_alignment_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => 'justify-content: flex-end;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'center' === $this->props['dsm_tabs_horizontal_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'justify-content: center;',
				)
			);
		}

		if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_horizontal_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'justify-content: flex-end;',
				)
			);
		}

		// image/icon padding & margin work.
		$margin    = 'margin';
		$padding   = 'padding';
		$important = true;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon, %%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_image_icon_margin'], $margin, $important ),
			)
		);

		if ( $dsm_tabs_image_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon, %%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_image_icon_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_tabs_image_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon, %%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_image_icon_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_image_icon_padding'], $padding, $important ),
			)
		);

		if ( $dsm_tabs_image_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_image_icon_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_tabs_image_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm_icon',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_image_icon_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// tabs Wrapper padding & margin work.
		$tabs_wrapper_margin  = 'margin';
		$tabs_wrapper_padding = 'padding';
		$important            = false;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_wrapper_margin'], $tabs_wrapper_margin, $important ),
			)
		);

		if ( $dsm_tabs_wrapper_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_wrapper_margin_tablet'], $tabs_wrapper_margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_tabs_wrapper_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_wrapper_margin_phone'], $tabs_wrapper_margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_wrapper_padding'], $tabs_wrapper_padding, $important ),
			)
		);

		if ( $dsm_tabs_wrapper_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_wrapper_padding_tablet'], $tabs_wrapper_padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_tabs_wrapper_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_tabs_wrapper_padding_phone'], $tabs_wrapper_padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
		if ( 'horizontal' === $this->props['dsm_tabs_layout'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_tabs_wrapper_width'] ),
				)
			);

			if ( $dsm_tabs_wrapper_width_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_tabs_wrapper_width_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_tabs_wrapper_width_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
						'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_tabs_wrapper_width_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		// Vertical.
		if ( 'vertical' === $this->props['dsm_tabs_layout'] ) {

			if ( '0%' === $this->props['dsm_tabs_wrapper_width'] || '' === $this->props['dsm_tabs_wrapper_width'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'flex: 0 0 20% !important;',
					)
				);
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
					'declaration' => sprintf( '-ms-flex: 0 0 %1$s; flex: 0 0 %1$s;', $this->props['dsm_tabs_wrapper_width'] ),
				)
			);

			if ( $dsm_tabs_wrapper_width_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => sprintf( '-ms-flex: 0 0 %1$s; flex: 0 0 %1$s;', $this->props['dsm_tabs_wrapper_width_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_tabs_wrapper_width_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => sprintf( '-ms-flex: 0 0 %1$s; flex: 0 0 %1$s;', $this->props['dsm_tabs_wrapper_width_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		// Tabs Wrapper Alignment.
		if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'center' === $this->props['dsm_tabs_wrapper_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'margin-left: auto;margin-right:auto;',
				)
			);
		}

		if ( 'horizontal' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_wrapper_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'margin-left: auto;',
				)
			);
		}

		// content styling work.
		if ( $this->props['dsm_content_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
					'declaration' => sprintf( 'background: %1$s;', $this->props['dsm_content_bg_color'] ),
				)
			);
		}

		$margin    = 'margin';
		$padding   = 'padding';
		$important = false;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin'], $margin, $important ),
			)
		);

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding'], $padding, $important ),
			)
		);

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'left' === $this->props['dsm_tabs_image_icon_placement'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
					'declaration' => 'display: -webkit-box;
    								  display: -ms-flexbox;
                                      display: flex;
                                      gap: 5px;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-title',
					'declaration' => 'display: -webkit-box;
    								  display: -ms-flexbox;
                                      display: flex;
                                      -webkit-box-align: center;
                                      -ms-flex-align: center;
                                      align-items: center;',
				)
			);
		}
		if ( $dsm_tabs_image_icon_placement_responsive_active ) {
			if ( 'left' === $this->props['dsm_tabs_image_icon_placement_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
						'declaration' => 'display: -webkit-box;
										  display: -ms-flexbox;
										  display: flex;
										  gap: 5px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-title',
						'declaration' => 'display: -webkit-box;
										  display: -ms-flexbox;
										  display: flex;
										  -webkit-box-align: center;
										  -ms-flex-align: center;
										  align-items: center;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			if ( 'top' === $this->props['dsm_tabs_image_icon_placement_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
						'declaration' => 'margin: 0 auto;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
						'declaration' => 'display: block;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-title',
						'declaration' => 'display:block;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			if ( 'right' === $this->props['dsm_tabs_image_icon_placement_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
						'declaration' => 'display: -webkit-box;
    								  display: -ms-flexbox;
                                      display: flex;
                                      gap: 5px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-title',
						'declaration' => 'display: -webkit-box;
										  display: -ms-flexbox;
										  display: flex;
										  -webkit-box-align: center;
										  -ms-flex-align: center;
										  align-items: center;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image, %%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-icon-wrapper',
						'declaration' => '-webkit-box-ordinal-group: 2;
										  -ms-flex-order: 1;
										  order: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
			// mobile.
			if ( 'left' === $this->props['dsm_tabs_image_icon_placement_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
						'declaration' => 'display: -webkit-box;
										  display: -ms-flexbox;
										  display: flex;
										  gap: 5px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-title',
						'declaration' => 'display: -webkit-box;
										  display: -ms-flexbox;
										  display: flex;
										  -webkit-box-align: center;
										  -ms-flex-align: center;
										  align-items: center;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( 'top' === $this->props['dsm_tabs_image_icon_placement_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
						'declaration' => 'margin: 0 auto;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
						'declaration' => 'display: block;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-title',
						'declaration' => 'display:block;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
			if ( 'right' === $this->props['dsm_tabs_image_icon_placement_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
						'declaration' => 'display: -webkit-box;
    								  display: -ms-flexbox;
                                      display: flex;
                                      gap: 5px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-title',
						'declaration' => 'display: -webkit-box;
										  display: -ms-flexbox;
										  display: flex;
										  -webkit-box-align: center;
										  -ms-flex-align: center;
										  align-items: center;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image, %%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-icon-wrapper',
						'declaration' => '-webkit-box-ordinal-group: 2;
										  -ms-flex-order: 1;
										  order: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( 'top' === $this->props['dsm_tabs_image_icon_placement'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
					'declaration' => 'margin: 0 auto;',
				)
			);
		}

		if ( 'right' === $this->props['dsm_tabs_image_icon_placement'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
					'declaration' => 'display: -webkit-box;
    								  display: -ms-flexbox;
                                      display: flex;
                                      gap: 5px;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-title',
					'declaration' => 'display: -webkit-box;
    								  display: -ms-flexbox;
                                      display: flex;
                                      -webkit-box-align: center;
                                      -ms-flex-align: center;
                                      align-items: center;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image, %%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-icon-wrapper',
					'declaration' => '-webkit-box-ordinal-group: 2;
                                      -ms-flex-order: 1;
                                      order: 1;',
				)
			);
		}

		if ( 'horizontal' === $this->props['dsm_tabs_layout'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-image',
					'declaration' => 'margin: 0 auto;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper.dsm-active .dsm-inner-content-wrapper',
					'declaration' => 'display: -webkit-box;
					                  display: -ms-flexbox;
									  display: flex;
									  -webkit-box-align: center;
                                      -ms-flex-align: center;
                                      align-items: center;',
				)
			);
		}

		// vertical tab styling work.

		if ( 'vertical' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_vertical_position'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container',
					'declaration' => 'display: -webkit-box; display: -ms-flexbox; display: flex;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
					'declaration' => 'display: -webkit-box;
					                  display: -ms-flexbox;
									  display: flex;
                                      -webkit-box-orient: vertical;
                                      -webkit-box-direction: normal;
                                      -ms-flex-direction: column;
                                      flex-direction: column;
                                      -webkit-box-flex: 0;
                                      ',
				)
			);
		}

		if ( 'vertical' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_vertical_position'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container',
					'declaration' => 'display: -webkit-box; display: -ms-flexbox; display: flex;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
					'declaration' => 'display: -webkit-box;
					                  display: -ms-flexbox;
									  display: flex;
                                      -webkit-box-orient: vertical;
                                      -webkit-box-direction: normal;
                                      -ms-flex-direction: column;
                                      flex-direction: column;
                                      -webkit-box-flex: 0;
									  -webkit-box-ordinal-group: 2;
                                      -ms-flex-order: 1;
                                      order: 1;',
				)
			);
		}

		if ( 'vertical' === $this->props['dsm_tabs_layout'] && 'top' === $this->props['dsm_tabs_vertical_alignment'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => '-webkit-box-pack: start;-ms-flex-pack: start; justify-content: flex-start;',
				)
			);
		}

		if ( 'vertical' === $this->props['dsm_tabs_layout'] && 'center' === $this->props['dsm_tabs_vertical_alignment'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => '-webkit-box-pack: center; -ms-flex-pack: center; justify-content: center;',
				)
			);
		}

		if ( 'vertical' === $this->props['dsm_tabs_layout'] && 'bottom' === $this->props['dsm_tabs_vertical_alignment'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => '-webkit-box-pack: end; -ms-flex-pack: end; justify-content: flex-end;',
				)
			);
		}

		// column layout Styling work.
		if ( 'column' === $this->props['dsm_tabs_layout'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container',
					'declaration' => 'display:-webkit-box;
                                      display:-ms-flexbox;
                                      display:flex;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
					'declaration' => 'display: -ms-grid;
    								  display: grid;
                                      -ms-grid-columns: (1fr)[2];
                                      grid-template-columns: repeat(2,1fr);
									  grid-auto-rows: minmax(min-content, max-content);',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper,%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-content-wrapper',
					'declaration' => 'width:50%;',
				)
			);
		}

		if ( 'column' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_column_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => '-webkit-box-ordinal-group: 2;
       								  -ms-flex-order: 1;
                                      order: 1;
									  margin-left:30px;',
				)
			);
		}

		if ( 'column' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_column_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'margin-right:30px;',
				)
			);
		}

		// Responsive Work.

		if ( 'horizontal' === $this->props['dsm_tabs_layout'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper.dsm-active',
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

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper.dsm-active .dsm-inner-content',
					'declaration' => 'margin-left: 0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper.dsm-active .dsm-image',
					'declaration' => 'margin-bottom: 30px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper.dsm-active',
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

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper.dsm-active .dsm-image',
					'declaration' => 'margin-bottom:30px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-content-wrapper .dsm-content-wrapper.dsm-active .dsm-inner-content',
					'declaration' => 'margin-left: 0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'vertical' === $this->props['dsm_tabs_layout'] || 'column' === $this->props['dsm_tabs_layout'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container',
					'declaration' => '-webkit-box-orient: vertical;
                                      -webkit-box-direction: normal;
                                      -ms-flex-direction: column;
                                      flex-direction: column;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
					'declaration' => 'display:-webkit-box;
                                      display:-ms-flexbox;
                                      display:flex;
					                  -webkit-box-orient:horizontal;
    								  -webkit-box-direction:normal;
                                      -ms-flex-direction:row;
                                      flex-direction:row;
                                      -webkit-box-flex:0;
                                      -ms-flex:0;
                                      flex:0;
									  margin-left: 0px !important;
									  ',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper,%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-content-wrapper',
					'declaration' => 'width: 100% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container',
					'declaration' => '-webkit-box-orient: vertical;
                                      -webkit-box-direction: normal;
                                      -ms-flex-direction: column;
                                      flex-direction: column;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
					'declaration' => 'display:-webkit-box;
                                      display:-ms-flexbox;
                                      display:flex;
					                  -webkit-box-orient:horizontal;
    								  -webkit-box-direction:normal;
                                      -ms-flex-direction:row;
                                      flex-direction:row;
                                      -webkit-box-flex:0;
                                      -ms-flex:0;
                                      flex:0;
									  margin-left: 0px !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper,%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-content-wrapper',
					'declaration' => 'width: 100% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'column' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_column_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'margin-right:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'margin-right:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'column' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_column_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'margin-left:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'margin-left:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		// arrow styling work.

		// when a user select horizontal layout and top position.
		if ( 'on' === $this->props['dsm_show_arrow'] && 'horizontal' === $this->props['dsm_tabs_layout'] && 'top' === $this->props['dsm_tabs_horizontal_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible; z-index: 1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab::before',
					'declaration' => 'content: "";
    								  position: absolute;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
                                      z-index: -1;
                                      clip-path: polygon(50% 58%,0 0,100% 0);
                                      top: 50%;
                                      opacity: 0;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
    								  background: inherit;
									  position: absolute;
                                      top: 100%;
                                      opacity: 1;
                                      transition-property: top;
                                      transition-duration: .3s;
                                      clip-path: polygon(50% 58%,0 0,100% 0);
                                      width: 20px;
                                      height: 20px;
                                      left: 50%;
                                      transform: translateX(-50%);',
				)
			);
		}

		if ( 'off' === $this->props['dsm_show_arrow_tablet'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'width: 0px;
                                      height: 0px;
                                      clip-path: none !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'on' === $this->props['dsm_show_arrow_tablet'] && 'horizontal' === $this->props['dsm_tabs_layout'] && 'top' === $this->props['dsm_tabs_horizontal_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible;z-index: 1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      bottom: -0px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
                                      z-index: 1;
									  opacity:0;
                                      clip-path: polygon(50% 58%, 0 0, 100% 0) !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      bottom: -20px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
									  transition-property: bottom;
                                      transition-duration: .3s;
                                      background: inherit;
									  opacity:1;
                                      clip-path: polygon(50% 58%, 0 0, 100% 0) !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'off' === $this->props['dsm_show_arrow_phone'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'width: 0px;
                                      height: 0px;
                                      clip-path: none !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'on' === $this->props['dsm_show_arrow_phone'] && 'horizontal' === $this->props['dsm_tabs_layout'] && 'top' === $this->props['dsm_tabs_horizontal_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible;z-index: 1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      bottom: -0px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
                                      background: inherit;
                                      z-index: 1;
									  opacity:0;
                                      clip-path: polygon(50% 58%, 0 0, 100% 0) !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      bottom: -20px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
                                      background: inherit;
									  transition-property: bottom;
                                      transition-duration: .3s;
                                      z-index: 1;
                                      clip-path: polygon(50% 58%, 0 0, 100% 0) !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// when a user select horizontal layout and bottom position.

		if ( 'on' === $this->props['dsm_show_arrow'] && 'horizontal' === $this->props['dsm_tabs_layout'] && 'bottom' === $this->props['dsm_tabs_horizontal_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position:relative;overflow:visible;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: -0px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
                                      background: inherit;
                                      z-index: 1;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%);
									  opacity: 0;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: -12px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
                                      background: inherit;
                                      z-index: 1;
									  transition-property: top;
                                      transition-duration: .4s;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%);
									  opacity:1;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_show_arrow_tablet'] && 'horizontal' === $this->props['dsm_tabs_layout'] && 'bottom' === $this->props['dsm_tabs_horizontal_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible;z-index:1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: -0px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
                                      opacity:0;
                                      z-index: 1;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%); !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: -12px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
                                      background: inherit;
									  opacity:1;
									  transition-property: top;
                                      transition-duration: .3s;
                                      z-index: 1;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%); !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'on' === $this->props['dsm_show_arrow_phone'] && 'horizontal' === $this->props['dsm_tabs_layout'] && 'bottom' === $this->props['dsm_tabs_horizontal_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible;z-index:1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: -0px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
									  opacity:0;
                                      z-index: 1;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%) !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: -12px;
                                      left: 50%;
                                      transform: translateX(-50%);
                                      width: 20px;
                                      height: 20px;
									  opacity:1;
									  transition-property: top;
                                      transition-duration: .3s;
                                      background: inherit;
                                      z-index: 1;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%) !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// when a user select vertical layout and left position.

		if ( 'on' === $this->props['dsm_show_arrow'] && 'vertical' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_vertical_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible;z-index:1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: 50%;
                                      transform: translateY(-50%);
                                      right: -0px;
                                      width: 20px;
                                      height: 20px;
                                      background: inherit;
                                      clip-path: polygon(0 0, 0 100%, 100% 47%);
									  opacity:0;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: 50%;
                                      transform: translateY(-50%);
                                      right: -15px;
                                      width: 20px;
                                      height: 20px;
									  transition-property: right;
                                      transition-duration: .4s;
                                      background: inherit;
                                      clip-path: polygon(0 0, 0 100%, 100% 47%);
									  opacity:1;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_show_arrow_tablet'] && 'vertical' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_vertical_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible;z-index:1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab::before',
					'declaration' => 'content: "";
					                  position: absolute;
					                  width: 20px;
                                      height: 20px;
									  bottom: -0px;
									  top: auto;
                                      left: 50%;
                                      transform: translateX(-50%);
					                  opacity:0;
                                      clip-path: polygon(50% 58%, 0 0, 100% 0);
									  z-index: 1;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
					                  position: absolute;
					                  width: 20px;
                                      height: 20px;
									  bottom: -20px;
									  top: auto;
                                      left: 50%;
									  opacity:1;
									  transition-property: bottom;
                                      transition-duration: .3s;
                                      transform: translateX(-50%);
									  background: inherit;
                                      clip-path: polygon(50% 58%, 0 0, 100% 0);
									  z-index: 1;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'on' === $this->props['dsm_show_arrow_phone'] && 'vertical' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_vertical_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible;z-index:1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper::before',
					'declaration' => 'content: "";
					                  position: absolute;
					                  width: 20px;
                                      height: 20px;
									  bottom: -0px;
									  top: auto;
                                      left: 50%;
                                      transform: translateX(-50%);
									  opacity:0;
                                      clip-path: polygon(50% 58%, 0 0, 100% 0) !important;
									  z-index: 1;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
					                  position: absolute;
					                  width: 20px;
                                      height: 20px;
									  bottom: -20px;
									  top: auto;
                                      left: 50%;
                                      transform: translateX(-50%);
									  background: inherit;
									  opacity:1;
									  transition-property: bottom;
                                      transition-duration: .3s;
                                      clip-path: polygon(50% 58%, 0 0, 100% 0) !important;
									  z-index: 1;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// when a user select vertical layout and right position.

		if ( 'on' === $this->props['dsm_show_arrow'] && 'vertical' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_vertical_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative; overflow:visible;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: 50%;
                                      transform: translateY(-50%);
                                      left: -0px;
                                      width: 20px;
                                      height: 20px;
                                      background: inherit;
                                      clip-path: polygon(0 50%, 100% 100%, 100% 0);
									  opacity:0;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
                                      position: absolute;
                                      top: 50%;
                                      transform: translateY(-50%);
                                      left: -15px;
                                      width: 20px;
                                      height: 20px;
									  transition-property: left;
                                      transition-duration: .3s;
                                      background: inherit;
                                      clip-path: polygon(0 50%, 100% 100%, 100% 0);
									  opacity:1;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_show_arrow_tablet'] && 'vertical' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_vertical_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible;z-index:1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab::before',
					'declaration' => 'content: "";
					                  position: absolute;
					                  width: 20px;
                                      height: 20px;
									  top: -0px;
                                      left: 50%;
                                      transform: translateX(-50%);
	                                  opacity:0;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%);
									  z-index: 1;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
					                  position: absolute;
					                  width: 20px;
                                      height: 20px;
									  top: -12px;
                                      left: 50%;
                                      transform: translateX(-50%);
									  background: inherit;
									  opacity:1;
									  transition-property: top;
                                      transition-duration: .3s;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%);
									  z-index: 1;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'on' === $this->props['dsm_show_arrow_phone'] && 'vertical' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_vertical_position'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-tab.dsm-active',
					'declaration' => 'position: relative;overflow:visible;z-index:1;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab::before',
					'declaration' => 'content: "";
					                  position: absolute;
					                  width: 20px !important;
                                      height: 20px !important;
									  top: -0px;
                                      left: 50%;
                                      transform: translateX(-50%);
								      opacity:0;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%) !important;
									  z-index: 1;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab.dsm-active::before',
					'declaration' => 'content: "";
					                  position: absolute;
					                  width: 20px !important;
                                      height: 20px !important;
									  top: -12px;
                                      left: 50%;
									  opacity:1;
									  transition-property: top;
                                      transition-duration: .3s;
                                      transform: translateX(-50%);
									  background: inherit;
                                      clip-path: polygon(54% 0, 6% 59%, 100% 61%) !important;
									  z-index: 1;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// Equal Height Tabs work.

		if ( 'on' === $this->props['dsm_equal_height'] && 'vertical' === $this->props['dsm_tabs_layout'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'display:grid !important;grid-template-columns: repeat(1,1fr);',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'display: flex !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper',
					'declaration' => 'display: flex !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
					'declaration' => 'display: -webkit-box;
                                      display: -ms-flexbox;
    								  display: flex;
                                      -webkit-box-orient: vertical;
                                      -webkit-box-direction: normal;
                                      -ms-flex-direction: column;
                                      flex-direction: column;
                                      -webkit-box-pack: center;
                                      -ms-flex-pack: center;
                                      justify-content: center;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_equal_height'] && 'vertical' === $this->props['dsm_tabs_layout'] && 'left' === $this->props['dsm_tabs_image_icon_placement'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
					'declaration' => 'display: -webkit-box;
    								  display: -ms-flexbox;
                                      display: flex;
                                      -webkit-box-orient: horizontal;
                                      -webkit-box-direction: normal;
                                      -ms-flex-direction: row;
                                     flex-direction: row;
                                     -webkit-box-pack: center;
                                     -ms-flex-pack: center;
                                     justify-content: center;
                                     -webkit-box-align:center;
                                     -ms-flex-align:center;
                                     align-items:center;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_equal_height'] && 'vertical' === $this->props['dsm_tabs_layout'] && 'right' === $this->props['dsm_tabs_image_icon_placement'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab',
					'declaration' => 'display: -webkit-box;
    								  display: -ms-flexbox;
                                      display: flex;
                                      -webkit-box-orient: horizontal;
                                      -webkit-box-direction: normal;
                                      -ms-flex-direction: row;
                                     flex-direction: row;
                                     -webkit-box-pack: center;
                                     -ms-flex-pack: center;
                                     justify-content: center;
                                     -webkit-box-align:center;
                                     -ms-flex-align:center;
                                     align-items:center;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-wrapper .dsm-tab .dsm-title',
					'declaration' => '-webkit-box-ordinal-group: 1;
                                      -ms-flex-order: 0;
                                      order: 0;',
				)
			);
		}

		// content image icon work.

		$margin    = 'margin';
		$padding   = 'padding';
		$important = false;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-wrapper .dsm-icon, %%order_class%% .dsm-content-wrapper .dsm-image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_image_icon_margin'], $margin, $important ),
			)
		);

		if ( $dsm_content_image_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm-icon, %%order_class%% .dsm-content-wrapper .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_image_icon_margin_tablet'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_image_icon_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm-icon, %%order_class%% .dsm-content-wrapper .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_image_icon_margin_phone'], $margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-wrapper .dsm-icon, %%order_class%% .dsm-content-wrapper .dsm-image',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_image_icon_padding'], $padding, $important ),
			)
		);

		if ( $dsm_content_image_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm-icon, %%order_class%% .dsm-content-wrapper .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_image_icon_padding_tablet'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_image_icon_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm-icon, %%order_class%% .dsm-content-wrapper .dsm-image',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_content_image_icon_padding_phone'], $padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// content image / icon alignment.
		if ( '' !== $this->props['dsm_content_image_icon_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm-image',
					'declaration' => sprintf( 'align-self: %1$s;', $this->props['dsm_content_image_icon_alignment'] ),
				)
			);
		}

		if ( $dsm_content_image_icon_alignment_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm-image',
					'declaration' => sprintf( 'align-self: %1$s;', $this->props['dsm_content_image_icon_alignment_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_image_icon_alignment_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm-image',
					'declaration' => sprintf( 'align-self: %1$s;', $this->props['dsm_content_image_icon_alignment_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// content icon size responsive work.
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-wrapper .dsm_content_icon',
				'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_content_icon_size'] ),
			)
		);

		if ( $dsm_content_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm_content_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_content_icon_size_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm_content_icon',
					'declaration' => sprintf( 'font-size: %1$s;', $this->props['dsm_content_icon_size_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$content_width_desktop = 100 - (int) $this->props['dsm_content_image_width'] . '%';
		$content_width_tablet  = 100 - (int) $this->props['dsm_content_image_width_tablet'] . '%';
		$content_width_phone   = 100 - (int) $this->props['dsm_content_image_width_phone'] . '%';
		// content image width responsive work.
		if ( $this->props['dsm_content_image_width'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper.dsm-content-image .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_content_image_width'] ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper.dsm-content-image.dsm-left .dsm-inner-content',
					'declaration' => sprintf( 'width: %1$s;', $content_width_desktop ),
				)
			);
		}

		if ( $dsm_content_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper.dsm-content-image .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_content_image_width_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper.dsm-content-image.dsm-left .dsm-inner-content',
					'declaration' => sprintf( 'width: %1$s;', $content_width_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_content_image_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper.dsm-content-image .dsm-image',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_content_image_width_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper.dsm-content-image.dsm-left .dsm-inner-content',
					'declaration' => sprintf( 'width: %1$s;', $content_width_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_content_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-wrapper .dsm_content_icon',
					'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_content_icon_color'] ),
				)
			);
		}

		// horizontal tab position styling work.

		if ( 'horizontal' === $this->props['dsm_tabs_layout'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container',
					'declaration' => 'display:flex; flex-direction: column;',
				)
			);

			if ( 'bottom' === $this->props['dsm_tabs_horizontal_position'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 1;',
					)
				);
			}

			if ( 'top' === $this->props['dsm_tabs_horizontal_position_tablet'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 0;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'bottom' === $this->props['dsm_tabs_horizontal_position_tablet'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'top' === $this->props['dsm_tabs_horizontal_position_phone'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 0;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'bottom' === $this->props['dsm_tabs_horizontal_position_phone'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		// Vertical tab position responsive work.

		if ( 'vertical' === $this->props['dsm_tabs_layout'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-content-wrapper',
					'declaration' => 'width: 100% !important;',
				)
			);

			if ( 'top' === $this->props['dsm_tabs_mobile_tablet_vertical_pos_tablet'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 0;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'bottom' === $this->props['dsm_tabs_mobile_tablet_vertical_pos_tablet'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'top' === $this->props['dsm_tabs_mobile_tablet_vertical_pos_phone'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 0;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'bottom' === $this->props['dsm_tabs_mobile_tablet_vertical_pos_phone'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		// column tab position responsive work.

		if ( 'column' === $this->props['dsm_tabs_layout'] ) {

			if ( 'top' === $this->props['dsm_tabs_mobile_tablet_column_pos_tablet'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 0;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'bottom' === $this->props['dsm_tabs_mobile_tablet_column_pos_tablet'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'top' === $this->props['dsm_tabs_mobile_tablet_column_pos_phone'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 0;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'bottom' === $this->props['dsm_tabs_mobile_tablet_column_pos_phone'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => 'order: 1;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		// Stick tabs on top work.

		if ( 'on' === $this->props['dsm_tabs_sticky'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
					'declaration' => 'position: sticky;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
					'declaration' => sprintf( 'top: %1$s;', $this->props['dsm_stick_tabs_offset'] ),
				)
			);

			if ( $dsm_stick_tabs_offset_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => sprintf( 'top: %1$s;', $this->props['dsm_stick_tabs_offset_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_stick_tabs_offset_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper',
						'declaration' => sprintf( 'top: %1$s;', $this->props['dsm_stick_tabs_offset_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-advanced-tabs-container .dsm-advanced-tabs-wrapper .dsm-tab:focus',
				'declaration' => sprintf( 'background: %1$s; color: %2$s;', $this->props['dsm_tabs_active_bg_color'], $this->props['dsm_tabs_active_text_color'] ),

			)
		);

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-advanced-tabs', plugin_dir_url( __DIR__ ) . 'AdvancedTabs/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		$output = sprintf(
			'<div class="dsm-advanced-tabs-container" data-trigger="%3$s" data-animation="%4$s" data-inner_animation="%5$s" data-deep_link="%6$s" data-image_lightbox="%7$s" data-auto_scroll_mobile="%8$s" data-anchor_link="%9$s">
				    %1$s
				 <div class="dsm-advanced-tabs-content-wrapper">
				    %2$s
				 </div>
		     </div>
		    ',
			$this->props['dsm_tabs_horizontal_position'] ? sprintf( '<div class="dsm-advanced-tabs-wrapper" role="tablist"%2$s>%1$s</div>', $tabs, '' !== $this->props['dsm_aria_label'] ? esc_attr( ' aria-label=' . $this->props['dsm_aria_label'] ) : '' ) : '',
			$tabs_content,
			$this->props['dsm_tabs_trigger'],
			$this->props['dsm_content_animation'],
			$this->props['dsm_inner_content_animation'],
			$this->props['dsm_deep_link'],
			$this->props['dsm_lightbox_image'],
			$this->props['dsm_auto_scroll_mobile'],
			$this->props['dsm_anchor_scroll']
		);

		return do_shortcode( $output );
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

		$assets_list['dsm_advanced_tabs'] = array(
			'css' => plugin_dir_url( __DIR__ ) . 'AdvancedTabs/style.css',
		);

		return $assets_list;
	}
}

new DSM_Advanced_Tabs();
