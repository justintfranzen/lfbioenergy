<?php

class DSM_Circle_Info extends ET_Builder_Module {
	public $slug       = 'dsm_circle_info';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name            = esc_html__( 'Supreme Circle Info', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_slug      = 'dsm_circle_info_child';
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
					'dsm_circle_panel'       => esc_html__( 'Circle', 'dsm-supreme-modules-pro-for-divi' ),
					'alignment'              => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_title_panel'        => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
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
					'dsm_circle_item'        => array(
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
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'        => array(
				'circle_title' => array(
					'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% .dsm-circle-info-button-wrapper span',
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
					'toggle_slug'     => 'dsm_circle_item',
					'sub_toggle'      => 'general',
				),

				'header'       => array(
					'label'        => esc_html__( 'Title ', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => '%%order_class%% .dsm-circle-info-content-wrapper .dsm-title',
					),

					'header_level' => array(
						'default' => 'h4',
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_content_panel',
					'sub_toggle'   => 'title',
				),

				'dsm_content'  => array(
					'label'          => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%%  .dsm-circle-info-content-wrapper',
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

			'box_shadow'   => array(
				'default'                    => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
				'dsm_circle'                 => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%%  .dsm-circle-info-container',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_circle_panel',
				),
				'dsm_circle_item'            => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%%  .dsm-circle-info-button-wrapper',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_circle_item',
					'sub_toggle'  => 'normal_state',
				),
				'circle_active_item'         => array(
					'label'       => esc_html__( 'Active Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_circle_item',
					'sub_toggle'  => 'active_state',
				),
				'dsm_circle_icon_shadow'     => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_icon',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_icon_panel',
					'sub_toggle'  => 'icon',
				),

				'dsm_content_icon_shadow'    => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content_icon_panel',
					'sub_toggle'  => 'icon',
				),
				'dsm_circle_image_shadow'    => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_circle_info_image',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_icon_panel',
					'sub_toggle'  => 'image',
				),

				'dsm_content_image_shadow'   => array(
					'label'       => esc_html__( 'Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm-image img',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content_icon_panel',
					'sub_toggle'  => 'image',
				),

				'dsm_circle_content_wrapper' => array(
					'css'         => array(
						'main' => '%%order_class%% .dsm-circle-info-container .dsm-circle-info-content .dsm-circle-info-content-wrapper',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content_panel',
					'sub_toggle'  => 'general',
				),
			),
			'borders'      => array(
				'default'                       => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
				'dsm_circle_border'             => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-circle-info-container',
							'border_styles' => '%%order_class%% .dsm-circle-info-container',
						),
					),
					'defaults'     => array(
						'border_radii'  => 'on|50%|50%|50%|50%',
						'border_styles' => array(
							'width' => '6px',
							'color' => '#f5f3ff',
							'style' => 'solid',
						),
					),
					'label_prefix' => esc_html__( 'Circle', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_circle_panel',
				),
				'dsm_circle_item_border'        => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%%  .dsm-circle-info-button-wrapper',
							'border_styles' => '%%order_class%%  .dsm-circle-info-button-wrapper',
						),
					),
					'label_prefix' => esc_html__( 'Circle Item', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_circle_item',
					'sub_toggle'   => 'normal_state',
				),
				'dsm_active_circle_item_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
							'border_styles' => '%%order_class%% .dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
						),
					),

					'label_prefix' => esc_html__( 'Active Circle Item', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_circle_item',
					'sub_toggle'   => 'active_state',
				),
				'dsm_circle_icon_border'        => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_icon',
							'border_styles' => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_icon',
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
							'border_radii'  => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon',
							'border_styles' => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon',
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
							'border_radii'  => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_circle_info_image',
							'border_styles' => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_circle_info_image',
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
							'border_radii'  => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm-image img',
							'border_styles' => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm-image img',
						),
					),
					'label_prefix' => esc_html__( 'Image ', 'dsm-supreme-modules-pro-for-divi' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_content_icon_panel',
					'sub_toggle'   => 'image',
				),

				// 'dsm_circle_content_wrapper' => array(
				// 'css'         => array(
				// 'main' => array(
				// 'border_radii'  => '%%order_class%% .dsm-circle-info-container .dsm-circle-info-content-wrapper',
				// 'border_styles' => '%%order_class%% .dsm-circle-info-container .dsm-circle-info-content-wrapper',
				// ),
				// ),
				// 'use_radius'  => false,
				// 'tab_slug'    => 'advanced',
				// 'toggle_slug' => 'dsm_content_panel',
				// 'sub_toggle'  => 'general',
				// ),

				'dsm_content_wrapper'           => array(
					'css'         => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-circle-info-container .dsm-circle-info-content-wrapper',
							'border_styles' => '%%order_class%% .dsm-circle-info-container .dsm-circle-info-content-wrapper',
						),
					),
					'use_radius'  => false,
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_content_panel',
					'sub_toggle'  => 'general',
				),
			),
			'button'       => array(
				'button' => array(
					'label'          => et_builder_i18n( 'Button' ),
					'css'            => array(
						'main'        => '%%order_class%% .dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button',
						'plugin_main' => '%%order_class%% .dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button',
						'alignment'   => '%%order_class%% .dsm-circle-info-content-wrapper .et_pb_button_wrapper',
					),
					'use_alignment'  => true,
					'box_shadow'     => array(
						'css' => array(
							'main' => '%%order_class%% .et_pb_button',
						),
					),
					'margin_padding' => array(
						'css' => array(
							'margin'    => '%%order_class%% .dsm-circle-info-content-wrapper .et_pb_button_wrapper',
							'important' => 'all',
						),
					),
				),
			),
			'link_options' => false,
			'text'         => false,
			'filters'      => false,
			'transform'    => false,
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
			'dsm_enable_autoplay'        => array(
				'label'           => esc_html__( 'Enable Autoplay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
			),
			'dsm_speed'                  => array(
				'label'           => esc_html__( 'Speed', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'default_unit'    => 's',
				'default'         => '1s',

				'range_settings'  => array(
					'min'  => '0.1',
					'max'  => '10',
					'step' => '.1',
				),
				'show_if'         => array(
					'dsm_enable_autoplay' => 'on',
				),
			),
			'dsm_delay'                  => array(
				'label'           => esc_html__( 'Delay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'responsive'      => true,
				'unit_less'       => true,
				'default'         => '3000',
				'range_settings'  => array(
					'min'  => '100',
					'max'  => '10000',
					'step' => '100',
				),
				'show_if'         => array(
					'dsm_enable_autoplay' => 'on',
				),
			),
			'dsm_trigger'                => array(
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
				'description'     => esc_html__( 'Here you can choose to trigger it with Click or On Hover.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_circle_size'            => array(
				'label'           => esc_html__( 'Circle Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
				'default'         => '500px',
				'range_settings'  => array(
					'min'  => '100',
					'max'  => '1200',
					'step' => '1',
				),
			),
			'dsm_content_animation'      => array(
				'label'           => esc_html__( 'Content Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'fadeIn',
				'option_category' => 'configuration',
				'options'         => $dsm_animation_list,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
			),
			'dsm_circle_item_size'       => array(
				'label'           => esc_html__( 'Circle Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_circle_item',
				'sub_toggle'      => 'general',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
				'default'         => '80px',
				'range_settings'  => array(
					'min'  => '32',
					'max'  => '500',
					'step' => '1',
				),
			),
			'dsm_circle_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom background color for the circle item', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#444444',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_circle_item',
				'sub_toggle'     => 'normal_state',
			),
			'dsm_circle_color'           => array(
				'label'          => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom color for the circle item.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '#ffffff',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_circle_item',
				'sub_toggle'     => 'normal_state',
			),
			'dsm_circle_active_bg_color' => array(
				'label'          => esc_html__( 'Active Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom active background color for the circle item.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_circle_item',
				'sub_toggle'     => 'active_state',
			),
			'dsm_circle_active_color'    => array(
				'label'          => esc_html__( 'Active Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( 'Here you can define a custom active color for the circle item.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'dsm_circle_item',
				'sub_toggle'     => 'active_state',
			),
			'dsm_content_padding'        => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'default'         => '10px|20px|10px|20px',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content_panel',
				'sub_toggle'      => 'general',
				'mobile_options'  => true,
				'responsive'      => true,
			),
			'dsm_icon_font_size'         => array(
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
				'default'         => '16px',
			),

			'dsm_icon_bg_color'          => array(
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

			'dsm_icon_active_bg_color'   => array(
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

			'dsm_icon_color'             => array(
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
			'dsm_icon_active_color'      => array(
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
			'dsm_icon_margin'            => array(
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
			'dsm_icon_padding'           => array(
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
			'dsm_circle_image_width'     => array(
				'label'           => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_icon_panel',
				'sub_toggle'      => 'image',
				'default'         => '30px',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => 'px',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '200',
					'step' => '1',
				),
			),

			// content Icon field.

			'dsm_content_icon_font_size' => array(
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
				'default'         => '16px',
			),

			'dsm_content_icon_bg_color'  => array(
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

			'dsm_content_icon_color'     => array(
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

			'dsm_content_icon_margin'    => array(
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
			'dsm_content_icon_padding'   => array(
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

			// content Image field.

			'dsm_content_image_width'    => array(
				'label'           => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_content_icon_panel',
				'sub_toggle'      => 'image',
				'default'         => '30%',
				'mobile_options'  => true,
				'responsive'      => true,
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),

		);
	}

	/**
	 * Calculate the total item count based on the given content.
	 *
	 * @return int - Total Item Count.
	 */
	public function get_item_count() {
		global $dsm_circle_info_button_markup;
		return is_array( $dsm_circle_info_button_markup ) ? count( $dsm_circle_info_button_markup ) : 0;
	}


	public function get_circle_info_button_markup() {
		global $dsm_circle_info_button_markup;

		$circle_button = '';
		if ( empty( $dsm_circle_info_button_markup ) ) {
			return '';
		}

		foreach ( $dsm_circle_info_button_markup as $dsm_circle_info_button ) {
			$circle_button .= $dsm_circle_info_button;
		}

		return $circle_button;
	}

	public function get_circle_info_content() {
		global $dsm_circle_info_content_markup;

		$circle_content = '';
		if ( empty( $dsm_circle_info_content_markup ) ) {
			return '';
		}
		foreach ( $dsm_circle_info_content_markup as $dsm_circle_info_content ) {
			$circle_content .= $dsm_circle_info_content;
		}

		return $circle_content;
	}

	function before_render() {
		// Pass variable to child Item.
		global $dsm_variable, $et_pb_slider_custom_icon, $et_pb_slider_custom_icon_tablet, $et_pb_slider_custom_icon_phone;

		$dsm_variable = array(
			'header_level' => $this->props['header_level'],
		);

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

		$dsm_circle_bg_color_last_edited       = $this->props['dsm_circle_bg_color_last_edited'];
		$dsm_circle_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_circle_bg_color_last_edited );

		$dsm_circle_active_bg_color_last_edited       = $this->props['dsm_circle_active_bg_color_last_edited'];
		$dsm_circle_active_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_circle_active_bg_color_last_edited );

		$dsm_circle_size_last_edited       = $this->props['dsm_circle_size_last_edited'];
		$dsm_circle_size_responsive_active = et_pb_get_responsive_status( $dsm_circle_size_last_edited );

		$dsm_circle_item_size_last_edited       = $this->props['dsm_circle_item_size_last_edited'];
		$dsm_circle_item_size_responsive_active = et_pb_get_responsive_status( $dsm_circle_item_size_last_edited );

		wp_enqueue_script( 'dsm-circle-info' );
		$total_item_count = $this->get_item_count();

		global $dsm_circle_info_button_markup, $dsm_circle_info_content_markup;

		$circle_button  = $this->get_circle_info_button_markup();
		$circle_content = $this->get_circle_info_content();

		$dsm_circle_info_button_markup = $dsm_circle_info_content_markup = array();

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon',
				'declaration' => 'display: inline-block; line-height: 1em;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm-image',
				'declaration' => 'margin: 0 auto;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-circle-info-content-wrapper .et_pb_button_wrapper .et_pb_button::after',
				'declaration' => 'content: attr(data-icon);',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-circle-info-container .dsm-circle-info-content .dsm-circle-info-content-wrapper',
				'declaration' => 'opacity: 0; transition: opacity 300ms ease-out;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-circle-info-container .dsm-circle-info-content .dsm-circle-info-content-wrapper.dsm-circle-info-item-active',
				'declaration' => 'opacity: 1;',
			)
		);

		if ( '' === $this->props['border_radii_dsm_circle_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-circle-info-container',
					'declaration' => 'border-radius: 50%;',
				)
			);
		}

		if ( '' === $this->props['border_width_all_dsm_circle_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-circle-info-container',
					'declaration' => 'border-width:6px;',
				)
			);
		}
		if ( '' === $this->props['border_style_all_dsm_circle_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-circle-info-container',
					'declaration' => 'border-style: solid; overflow:visible;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_circle_item_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-circle-info-button-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_circle_icon_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_icon',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_content_wrapper'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-container .dsm-circle-info-content .dsm-circle-info-content-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_content_icon_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' === $this->props['border_style_all_dsm_content_image_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm-image img',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( $this->props['dsm_circle_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-container',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_circle_size'] ),
				)
			);
		}

		if ( $dsm_circle_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-container',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_circle_size_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_circle_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-container',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_circle_size_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_circle_item_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-circle-info-button-wrapper',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_circle_item_size'] ),
				)
			);
		}

		if ( $dsm_circle_item_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-circle-info-button-wrapper',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_circle_item_size_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_circle_item_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-circle-info-button-wrapper',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_circle_item_size_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_circle_bg_color',
				'selector'       => '%%order_class%% .dsm-circle-info-button-wrapper',
				'css_property'   => 'background',
				'render_slug'    => $render_slug,
				'type'           => 'background',
			)
		);
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_circle_color',
				'selector'       => '%%order_class%% .dsm-circle-info-button-wrapper',
				'css_property'   => 'color',
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_circle_active_bg_color',
				'selector'       => '%%order_class%% .dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
				'css_property'   => 'background',
				'render_slug'    => $render_slug,
				'type'           => 'background',
			)
		);
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_circle_active_color',
				'selector'       => '%%order_class%% .dsm-circle-info-item-active .dsm-circle-info-button-wrapper',
				'css_property'   => 'color',
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);
		$this->apply_custom_margin_padding(
			$render_slug,
			'dsm_content_padding',
			'padding',
			'%%order_class%%  .dsm-circle-info-content-wrapper'
		);

		// icon styling work.
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_icon_bg_color',
				'selector'       => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_icon',
				'css_property'   => 'background',
				'render_slug'    => $render_slug,
				'type'           => 'background',
			)
		);
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_icon_active_bg_color',
				'selector'       => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm_icon',
				'css_property'   => 'background',
				'render_slug'    => $render_slug,
				'type'           => 'background',
			)
		);
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_icon_color',
				'selector'       => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_icon',
				'css_property'   => 'color',
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_icon_active_color',
				'selector'       => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper.dsm-circle-info-item-active .dsm_icon',
				'css_property'   => 'color',
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);

		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_icon_font_size',
				'selector'       => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_icon',
				'css_property'   => 'font-size',
				'render_slug'    => $render_slug,
				'type'           => 'font-sze',
			)
		);

		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_circle_image_width',
				'selector'       => '%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_circle_info_image',
				'css_property'   => 'max-width',
				'render_slug'    => $render_slug,
				'type'           => 'max-width',
			)
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'dsm_icon_margin',
			'margin',
			'%%order_class%% .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper .dsm_icon'
		);
		$this->apply_custom_margin_padding(
			$render_slug,
			'dsm_icon_padding',
			'padding',
			'%%order_class%% .dsm-circle-info-button %%order_class%%.dsm-circle-info-item-inner-wrapper .dsm_icon'
		);

		// content icon styling work

		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_content_icon_bg_color',
				'selector'       => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon',
				'css_property'   => 'background',
				'render_slug'    => $render_slug,
				'type'           => 'background',
			)
		);

		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_content_icon_color',
				'selector'       => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon',
				'css_property'   => 'color',
				'render_slug'    => $render_slug,
				'type'           => 'color',
			)
		);

		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_content_icon_font_size',
				'selector'       => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon',
				'css_property'   => 'font-size',
				'render_slug'    => $render_slug,
				'type'           => 'font-sze',
			)
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'dsm_content_icon_margin',
			'margin',
			'%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon'
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'dsm_content_icon_padding',
			'padding',
			'%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm_content_icon'
		);

		// content image styling.

		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_content_image_width',
				'selector'       => '%%order_class%% .dsm-circle-info-content .dsm-circle-info-content-wrapper .dsm-image img',
				'css_property'   => 'max-width',
				'render_slug'    => $render_slug,
				'type'           => 'max-width',
			)
		);

		$angle = '';
		if ( $total_item_count ) {
			$angle = ( 360 / $total_item_count );
		}
		$rot = $angle;

		if ( $this->props['dsm_speed'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-container.dsm_animate .dsm-circle-info-button, %%order_class%% .dsm-circle-info-container.dsm_animate .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper',
					'declaration' => sprintf( 'transition-duration: %1$s;', $this->props['dsm_speed'] ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-circle-info-container.dsm_animate .dsm-circle-info-button, %%order_class%% .dsm-circle-info-container.dsm_animate .dsm-circle-info-button .dsm-circle-info-item-inner-wrapper',
				'declaration' => 'z-index:999;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%%',
				'declaration' => 'position: relative;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-circle-info-button',
				'declaration' => 'transform: rotate(calc(var(--dsm-angle) * 1deg));',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%%  .dsm-circle-info-button',
				'declaration' => 'position: absolute; display: block; top: 50%; left: 50%;',
			)
		);

		for ( $item_count = 1; $item_count <= $total_item_count; $item_count++ ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-item-inner-wrapper:nth-child(' . $item_count . ')',
					'declaration' => sprintf(
						'transform: rotate(calc(%1$s * 1deg)) translate(calc(%2$s / 2)) rotate(calc((%1$s + %3$s) * -1deg));',
						$rot,
						'var(--main-circle-size, 500px)',
						'var(--dsm-angle)'
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-item-inner-wrapper:nth-child(' . $item_count . ')',
					'declaration' => sprintf(
						'transform: rotate(calc(%1$s * 1deg)) translate(calc(%2$s / 2)) rotate(calc((%1$s + %3$s) * -1deg));',
						$rot,
						'var(--main-circle-size-tablet, var(--main-circle-size))',
						'var(--dsm-angle)'
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-circle-info-item-inner-wrapper:nth-child(' . $item_count . ')',
					'declaration' => sprintf(
						'transform: rotate(calc(%1$s * 1deg)) translate(calc(%2$s / 2)) rotate(calc((%1$s + %3$s) * -1deg));',
						$rot,
						'var(--main-circle-size-phone, var(--main-circle-size-tablet, var(--main-circle-size)))',
						'var(--dsm-angle)'
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			$rot = $rot + $angle;
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-circle-info', plugin_dir_url( __DIR__ ) . 'CircleInfo/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return sprintf(
			'<div class="dsm-circle-info-container" data-autoplay="%2$s" data-updateangle="%3$s" style="--main-circle-size: %1$s;%8$s;%9$s; --dsm-angle: 0;" data-trigger="%4$s" data-delay="%7$s" data-animation="%10$s">
			    <div class="dsm-circle-info-button">%5$s</div>
			    <div class="dsm-circle-info-content">%6$s</div>    
		     </div>
		    ',
			$this->props['dsm_circle_size'],
			$this->props['dsm_enable_autoplay'],
			$angle,
			$this->props['dsm_trigger'],
			$circle_button,
			$circle_content,
			$this->props['dsm_delay'],
			'' === $this->props['dsm_circle_size_tablet'] ? '' : sprintf( '--main-circle-size-tablet:%1$s;', $this->props['dsm_circle_size_tablet'] ),
			'' === $this->props['dsm_circle_size_phone'] ? '' : sprintf( '--main-circle-size-phone:%1$s;', $this->props['dsm_circle_size_phone'] ),
			$this->props['dsm_content_animation']
		);
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

		$assets_list['dsm_circle_info'] = array(
			'css' => plugin_dir_url( __DIR__ ) . 'CircleInfo/style.css',
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

new DSM_Circle_Info();
