<?php

class DSM_Svg_Animation extends ET_Builder_Module {
	public $slug          = 'dsm_svg_animation';
	public $vb_support    = 'on';
	private $module_props = array();
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name                   = esc_html__( 'Supreme Svg Animation', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path              = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_setting'  => esc_html__( 'Setting', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'dsm_alignemnt_panel' => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_svg_panel'       => esc_html__( 'Svg', 'dsm-supreme-modules-pro-for-divi' ),
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
				'header' => array(
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
						'main' => '%%order_class%%',
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
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_image_icon_panel',
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
			'dsm_use_svg_code'       => array(
				'label'           => esc_html__( 'Use SVG Code', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( "Enable this option If you'd like to use SVG Code Instead.", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_upload_svg'         => array(
				'label'              => esc_html__( 'SVG File', 'dsm-supreme-modules-pro-for-divi' ),
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'data_type'          => 'svg',
				'upload_button_text' => esc_attr__( 'Upload an svg file', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an SVG file', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As SVG for the module', 'dsm-supreme-modules-pro-for-divi' ),
				'description'        => esc_html__( 'Here you can upload your SVG File.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'main_content',

				'show_if'            => array(
					'dsm_use_svg_code' => 'off',
				),
			),

			'dsm_svg_code'           => array(
				'label'           => esc_html__( 'Insert SVG Code', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Here you can insert your SVG code.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',

				'show_if'         => array(
					'dsm_use_svg_code' => 'on',
				),
			),

			'dsm_animation_type'     => array(
				'label'           => esc_html__( 'Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'oneByOne',
				'options'         => array(
					'delayed'  => esc_html__( 'Delayed', 'dsm-supreme-modules-pro-for-divi' ),
					'sync'     => esc_html__( 'Sync', 'dsm-supreme-modules-pro-for-divi' ),
					'oneByOne' => esc_html__( 'One By One', 'dsm-supreme-modules-pro-for-divi' ),
				),

				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',
				'description'     => esc_html__( "Here you choose the Type of SVG Animation, you've option to choose from below options", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_animation_function' => array(
				'label'           => esc_html__( 'Animation Timing Function', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'linear',
				'options'         => array(
					'linear'          => esc_html__( 'Linear', 'dsm-supreme-modules-pro-for-divi' ),
					'ease'            => esc_html__( 'Ease', 'dsm-supreme-modules-pro-for-divi' ),
					'ease_in'         => esc_html__( 'Ease In', 'dsm-supreme-modules-pro-for-divi' ),
					'ease_out'        => esc_html__( 'Ease Out', 'dsm-supreme-modules-pro-for-divi' ),
					'ease_out_bounce' => esc_html__( 'Ease Out Bounce', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',
				'description'     => esc_html__( 'Here you can choose the Speed Curve for your Animation, you can choose whatever option works best for you.', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_loop'               => array(
				'label'           => esc_html__( 'Loop', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',
				'description'     => esc_html__( "Enable this option If you'd like the SVG Animation to Loop", 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_unlimited'          => array(
				'label'           => esc_html__( 'Unlimited', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'on',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',
				'description'     => esc_html__( 'If enabled, the animation will Loop infinitely. You can disable to set a custom number times the animation will Loop', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_loop' => 'on',
				),
			),

			'dsm_count'              => array(
				'label'           => esc_html__( 'Number of Times', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '2',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '10',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_loop'      => 'on',
					'dsm_unlimited' => 'off',
				),
			),

			'dsm_use_trigger'        => array(
				'label'           => esc_html__( 'Trigger', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',
				'description'     => esc_html__( 'Enable this option to choose a Trigger type for your SVG Animation', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_trigger_type'       => array(
				'label'           => esc_html__( 'Trigger Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'dsm_viewport',
				'options'         => array(
					'dsm_viewport' => esc_html__( 'Start Animation when in Viewport', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_hover'    => esc_html__( 'Start on Hover', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_click'    => esc_html__( 'Start on Click', 'dsm-supreme-modules-pro-for-divi' ),
				),

				'show_if'         => array(
					'dsm_use_trigger' => 'on',
				),

				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',
				'description'     => esc_html__( 'Here you can choose the Trigger Type, you can select Triggers from below options', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_visible_viewport'   => array(
				'label'           => esc_html__( 'Visible viewport', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '50%',
				'default_unit'    => '%',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_trigger_type' => 'dsm_viewport',
				),
			),

			'dsm_speed'              => array(
				'label'           => esc_html__( 'Speed', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '50',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',
				'description'     => esc_html__( 'Change the Speed of your SVG Animation here, the lower the value the faster the animation will be.', 'dsm-supreme-modules-pro-for-divi' ),

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '500',
					'step' => '1',
				),
			),

			'dsm_delay'              => array(
				'label'           => esc_html__( 'Delay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '0',
				'tab_slug'        => 'general',
				'toggle_slug'     => 'dsm_setting',
				'unit_less'       => true,
				'description'     => esc_html__( 'If you want to delay your animation, you can do so here.', 'dsm-supreme-modules-pro-for-divi' ),

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '500',
					'step' => '1',
				),
			),

			'dsm_alignment'          => array(
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
				'description'     => esc_html__( 'Here you can change the Alignment of your SVG Animation.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggleable'      => true,
				'multi_selection' => false,
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_alignemnt_panel',
			),

			'dsm_svg_color'          => array(
				'label'       => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'You can change the Color of your Animation here.', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#000000',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_svg_panel',
				'hover'       => 'tabs',
			),

			'dsm_width'              => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'default'         => '',
				'default_unit'    => '%',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_svg_panel',
				'mobile_options'  => true,
				'responsive'      => true,
				'description'     => esc_html__( 'Here you can adjust the Width of the Animation.', 'dsm-supreme-modules-pro-for-divi' ),

				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		$multi_view                  = et_pb_multi_view_options( $this );
		$dsm_width_last_edited       = $this->props['dsm_width_last_edited'];
		$dsm_width_responsive_active = et_pb_get_responsive_status( $dsm_width_last_edited );

		$get_svg_data_from_url = '';
		if ( 'off' === $this->props['dsm_use_svg_code'] ) {
			$svg_url               = esc_url_raw( $this->props['dsm_upload_svg'] );
			$svg_response          = wp_remote_get( $svg_url );
			$svg_response_body     = wp_remote_retrieve_body( $svg_response );
			$result                = json_decode( $svg_response_body );
			$get_svg_data_from_url = $svg_response_body;
		}

		wp_enqueue_script( 'dsm-svg-animation' );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-svg-animation-container svg',
				'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_width'] ),
			)
		);

		if ( $dsm_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-svg-animation-container svg',
					'declaration' => sprintf( 'width: %1$s;', $this->props['dsm_width_tablet'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-svg-animation-container svg',
					'declaration' => sprintf( 'width : %1$s;', $this->props['dsm_width_phone'] ),
					'important'   => 'all',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_svg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-svg-animation-container svg *',
					'declaration' => sprintf( 'stroke: %1$s;fill:none !important;', $this->props['dsm_svg_color'] ),
				)
			);
		}
		if ( 'dsm_viewport' === $this->props['dsm_trigger_type'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-svg-animation-container svg',
					'declaration' => 'visibility:hidden;',
				)
			);
		}
		if ( 'dsm_viewport' === $this->props['dsm_trigger_type'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-svg-animation-container svg.dsm-svg-visible',
					'declaration' => 'visibility:visible;',
				)
			);
		}
		if ( $this->props['dsm_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => sprintf( 'text-align: %1$s;', $this->props['dsm_alignment'] ),
				)
			);
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-svg-animation', plugin_dir_url( __DIR__ ) . 'SvgAnimation/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		$svg_code = $this->props['dsm_svg_code'];

		$svg_code = str_ireplace( '<p>', '', $svg_code );
		$svg_code = str_ireplace( '</p>', '', $svg_code );

		return sprintf(
			'<div class="dsm-svg-animation-container" data-speed="%2$s" data-delay="%3$s" data-animation_type="%4$s" data-loop="%5$s" data-unlimited="%6$s" data-count="%7$s" data-trigger_type="%8$s" data-animation_timing_func="%9$s" data-visibleviewport="%11$s">
		    %1$s
		    %10$s
		</div>',
			'on' === $this->props['dsm_use_svg_code'] ? $svg_code : '',
			$this->props['dsm_speed'],
			$this->props['dsm_delay'],
			$this->props['dsm_animation_type'],
			$this->props['dsm_loop'],
			$this->props['dsm_unlimited'],
			$this->props['dsm_count'],
			$this->props['dsm_trigger_type'],
			$this->props['dsm_animation_function'],
			'off' === $this->props['dsm_use_svg_code'] ? $get_svg_data_from_url : '',
			'dsm_viewport' === $this->props['dsm_trigger_type'] ? $this->props['dsm_visible_viewport'] : ''
		);
	}

	/**
	 * Force load global styles.
	 *
	 * @param array $assets_list Current global assets on the list.
	 *
	 * @return array
	 */
	public function dsm_load_required_divi_assets( $assets_list, $assets_args, $instance ) {
		$assets_prefix = et_get_dynamic_assets_path();

		// AnimatedGradientText.
		if ( ! isset( $assets_list['dsm_svg_animation'] ) ) {
			$assets_list['dsm_svg_animation'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'SvgAnimation/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_Svg_Animation();
