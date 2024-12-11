<?php

class DSM_Social_Share_Buttons extends ET_Builder_Module {
	public $slug       = 'dsm_social_share_buttons';
	public $vb_support = 'on';
	public $child_slug = 'dsm_social_share_buttons_child';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name            = esc_html__( 'Supreme Social Share Buttons', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_slug      = 'dsm_social_share_buttons_child';
		$this->child_item_text = esc_html__( 'Social Share Buttons Item', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path       = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'share_button' => esc_html__( 'Share Button', 'dsm-supreme-modules-pro-for-divi' ),
					'share_label'  => esc_html__( 'Label', 'dsm-supreme-modules-pro-for-divi' ),
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
					'label'       => esc_html__( 'Label', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-social-share-button-text',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'share_label',
				),

			),

			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),

			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%.dsm_social_share_buttons',
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
		return array(
			'dsm_view'                   => array(
				'label'           => esc_html__( 'View', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'icon_text',
				'option_category' => 'configuration',
				'options'         => array(
					'icon_text' => esc_html__( 'Icon & Text', 'dsm-supreme-modules-pro-for-divi' ),
					'icon'      => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'text'      => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_label'                  => array(
				'label'           => esc_html__( 'Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'responsive'      => true,
				'default'         => 'on',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),

				'show_if'         => array(
					'dsm_view' => 'icon_text',
				),
			),

			'dsm_skin'                   => array(
				'label'           => esc_html__( 'Skin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'gradient',
				'option_category' => 'configuration',
				'options'         => array(
					'gradient'   => esc_html__( 'Gradient', 'dsm-supreme-modules-pro-for-divi' ),
					'minimal'    => esc_html__( 'Minimal', 'dsm-supreme-modules-pro-for-divi' ),
					'framed'     => esc_html__( 'Framed', 'dsm-supreme-modules-pro-for-divi' ),
					'boxed_icon' => esc_html__( 'Boxed Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'flat'       => esc_html__( 'Flat', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_shape'                  => array(
				'label'           => esc_html__( 'Shape', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'square',
				'option_category' => 'configuration',
				'options'         => array(
					'square'  => esc_html__( 'Square', 'dsm-supreme-modules-pro-for-divi' ),
					'rounded' => esc_html__( 'Rounded', 'dsm-supreme-modules-pro-for-divi' ),
					'circle'  => esc_html__( 'Circle', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_column'                 => array(
				'label'           => esc_html__( 'Columns', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'auto',
				'option_category' => 'configuration',
				'mobile_options'  => true,
				'responsive'      => true,
				'options'         => array(
					'auto'  => esc_html__( 'Auto', 'dsm-supreme-modules-pro-for-divi' ),
					'one'   => esc_html__( '1', 'dsm-supreme-modules-pro-for-divi' ),
					'two'   => esc_html__( '2', 'dsm-supreme-modules-pro-for-divi' ),
					'three' => esc_html__( '3', 'dsm-supreme-modules-pro-for-divi' ),
					'four'  => esc_html__( '4', 'dsm-supreme-modules-pro-for-divi' ),
					'five'  => esc_html__( '5', 'dsm-supreme-modules-pro-for-divi' ),
					'six'   => esc_html__( '6', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_alignment'              => array(
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
				'default'         => '',
				'toggleable'      => true,
				'multi_selection' => false,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',

				'show_if'         => array(
					'dsm_column' => 'auto',
				),
			),

			'dsm_column_gap'             => array(
				'label'           => esc_html__( 'Columns Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '10px',
				'default_unit'    => 'px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_button',
			),

			'dsm_row_gap'                => array(
				'label'           => esc_html__( 'Rows Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '10px',
				'default_unit'    => 'px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_button',
			),

			'dsm_button_size'            => array(
				'label'           => esc_html__( 'Button Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default_unit'    => 'px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '2',
					'step' => '.1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_button',
			),

			'dsm_icon_size'              => array(
				'label'           => esc_html__( 'Icon Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default_unit'    => 'px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_button',
			),

			'dsm_button_height'          => array(
				'label'           => esc_html__( 'Button Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default_unit'    => 'px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_button',
			),

			'dsm_color_type'             => array(
				'label'           => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'official',
				'option_category' => 'configuration',
				'options'         => array(
					'official' => esc_html__( 'Official', 'dsm-supreme-modules-pro-for-divi' ),
					'custom'   => esc_html__( 'Custom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'share_button',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_custom_bg_color'        => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'share_button',
				'hover'          => 'tabs',
				'show_if'        => array(
					'dsm_color_type' => 'custom',
				),
			),

			'dsm_custom_color'           => array(
				'label'          => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'share_button',
				'hover'          => 'tabs',
				'show_if'        => array(
					'dsm_color_type' => 'custom',
				),
			),

			'dsm_target_type'            => array(
				'label'           => esc_html__( 'Target URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'current_page',
				'option_category' => 'configuration',
				'options'         => array(
					'current_page' => esc_html__( 'Current', 'dsm-supreme-modules-pro-for-divi' ),
					'custom'       => esc_html__( 'Custom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_target_link_url'        => array(
				'label'           => esc_html__( 'Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'url',
				'show_if'         => array(
					'dsm_target_type' => 'custom',
				),
			),

			'dsm_social_hover_animation' => array(
				'label'           => esc_html__( 'Hover Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'dsm-none',
				'option_category' => 'configuration',
				'options'         => array(
					'dsm-none'                   => esc_html__( 'None', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-grow'                   => esc_html__( 'Grow', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-grow-rotate'            => esc_html__( 'Grow Rotate', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-shrink'                 => esc_html__( 'Shrink', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-pulse'                  => esc_html__( 'Pulse', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-pulse-grow'             => esc_html__( 'Pulse Grow', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-pulse-shrink'           => esc_html__( 'Pulse Shrink', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-push'                   => esc_html__( 'Push', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-pop'                    => esc_html__( 'Pop', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-bounce-in'              => esc_html__( 'Bounce In', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-bounce-out'             => esc_html__( 'Bounce Out', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-rotate'                 => esc_html__( 'Rotate', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-float'                  => esc_html__( 'Float', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-sink'                   => esc_html__( 'Sink', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-bob'                    => esc_html__( 'Bob', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-hang'                   => esc_html__( 'Hang', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-skew'                   => esc_html__( 'Skew', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-skew-forward'           => esc_html__( 'Skew Forward', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-skew-backward'          => esc_html__( 'Skew Backward', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-wobble-vertical'        => esc_html__( 'Wobble Vertical', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-wobble-horizontal'      => esc_html__( 'Wobble Horizontal', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-wobble-to-bottom-right' => esc_html__( 'Wobble to Bottom Right', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-wobble-to-top-right'    => esc_html__( 'Wobble to Top Right', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-wobble-top'             => esc_html__( 'Wobble Top', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-wobble-bottom'          => esc_html__( 'Wobble Bottom', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-wobble-skew'            => esc_html__( 'Wobble Skew', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-buzz'                   => esc_html__( 'Buzz', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-buzz-out'               => esc_html__( 'Buzz Out', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-forward'                => esc_html__( 'Forward', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm-backward'               => esc_html__( 'Backward', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
			),
		);
	}

	function before_render() {

		global $dsm_social_share_props;

		$dsm_social_share_props = array(
			'dsm_view'                   => $this->props['dsm_view'],
			'dsm_label'                  => $this->props['dsm_label'],
			'dsm_target_type'            => $this->props['dsm_target_type'],
			'dsm_target_link_url'        => $this->props['dsm_target_link_url'],
			'dsm_social_hover_animation' => $this->props['dsm_social_hover_animation'],
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$dsm_column_gap_last_edited          = $this->props['dsm_column_gap_last_edited'];
		$dsm_column_gap_responsive_active    = et_pb_get_responsive_status( $dsm_column_gap_last_edited );
		$dsm_row_gap_last_edited             = $this->props['dsm_row_gap_last_edited'];
		$dsm_row_gap_responsive_active       = et_pb_get_responsive_status( $dsm_row_gap_last_edited );
		$dsm_button_height_last_edited       = $this->props['dsm_button_height_last_edited'];
		$dsm_button_height_responsive_active = et_pb_get_responsive_status( $dsm_button_height_last_edited );
		$dsm_icon_size_last_edited           = $this->props['dsm_icon_size_last_edited'];
		$dsm_icon_size_responsive_active     = et_pb_get_responsive_status( $dsm_icon_size_last_edited );

		$dsm_custom_bg_color_last_edited       = $this->props['dsm_custom_bg_color_last_edited'];
		$dsm_custom_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_custom_bg_color_last_edited );

		$dsm_custom_color_last_edited       = $this->props['dsm_custom_color_last_edited'];
		$dsm_custom_color_responsive_active = et_pb_get_responsive_status( $dsm_custom_color_last_edited );

		$social_share_background_color_hover = $this->get_hover_value( 'dsm_custom_bg_color' );
		$social_share_color_hover            = $this->get_hover_value( 'dsm_custom_color' );

		$dsm_column_last_edited       = $this->props['dsm_column_last_edited'];
		$dsm_column_responsive_active = et_pb_get_responsive_status( $dsm_column_last_edited );

		wp_enqueue_script( 'dsm-social-share' );

		if ( '' === $this->props['dsm_button_height'] && '' !== $this->props['dsm_button_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
					'declaration' => 'height: 4.5em;',
				)
			);
		}

		if ( '' === $this->props['dsm_button_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
					'declaration' => 'height: 45px;',
				)
			);
		}

		if ( $this->props['dsm_button_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
					'declaration' => sprintf( 'font-size: calc(%1$s * 10);', $this->props['dsm_button_size'] ),
				)
			);
		}

		if ( 'none' === $this->props['dsm_social_hover_animation'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
					'declaration' => 'transition-property: filter,background-color,border-color,-webkit-filter;
								  -webkit-transition-duration: 0.2s;
								  -o-transition-duration: 0.2s;
								  transition-duration: 0.2s;',
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
				'declaration' => 'display: -webkit-box;
								  display: -ms-flexbox;
								  display: flex;
								  -ms-flex-item-align: stretch;
								  -ms-grid-row-align: stretch;
								  align-self: stretch;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper:hover',
				'declaration' => '-webkit-filter: saturate(1.5) brightness(1.2);
                              filter: saturate(1.5) brightness(1.2);',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper .dsm-social-share-button-text',
				'declaration' => '-webkit-box-align: center;
                              -ms-flex-align: center;
                              align-items: center;
                              display: -webkit-box;
                              display: -ms-flexbox;
                              display: flex;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper .dsm-social-share-button-icon',
				'declaration' => 'width: 45px;
                              display: -webkit-box;
                              display: -ms-flexbox;
                              display: flex;
                              -webkit-box-pack: center;
                              -ms-flex-pack: center;
                              justify-content: center;
							  -ms-flex-item-align: stretch;
                              -ms-grid-row-align: stretch;
                              align-self: stretch;
                              -webkit-box-align: center;
                              -ms-flex-align: center;
                              align-items: center;',
			)
		);

		if ( 'text' !== $this->props['dsm_view'] && 'gradient' === $this->props['dsm_skin'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-text',
					'declaration' => 'background-image : linear-gradient(90deg,rgba(0,0,0,.12),transparent);',
				)
			);
		}

		if ( 'boxed_icon' === $this->props['dsm_skin'] || 'framed' === $this->props['dsm_skin'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
					'declaration' => 'border-style: solid; border-width: 2px;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-icon',
					'declaration' => 'border-radius: inherit;',
				)
			);

		}

		if ( 'gradient' === $this->props['dsm_skin'] || 'minimal' === $this->props['dsm_skin'] || 'boxed_icon' === $this->props['dsm_skin'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper .dsm-social-share-button-text',
					'declaration' => 'padding-left:15px;padding-right:15px;',
				)
			);
		}

		if ( 'flat' === $this->props['dsm_skin'] || 'framed' === $this->props['dsm_skin'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper .dsm-social-share-button-text',
					'declaration' => 'padding-right:15px;',
				)
			);
		}

		if ( 'circle' === $this->props['dsm_shape'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
					'declaration' => 'border-radius:100px;',
				)
			);
		}

		if ( 'rounded' === $this->props['dsm_shape'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
					'declaration' => 'border-radius: 5px;',
				)
			);
		}

		if ( 'minimal' === $this->props['dsm_skin'] ) {
			if ( 'circle' === $this->props['dsm_shape'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-icon',
						'declaration' => 'border-radius:100px;',
					)
				);
			}

			if ( 'rounded' === $this->props['dsm_shape'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-icon',
						'declaration' => 'border-radius: 5px;',
					)
				);
			}
		}

		if ( 'custom' === $this->props['dsm_color_type'] ) {

			if ( $this->props['dsm_custom_bg_color'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'background-color: %1$s !important;', $this->props['dsm_custom_bg_color'] ),
					)
				);
			}

			if ( $dsm_custom_bg_color_responsive_active ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'background-color: %1$s !important;', $this->props['dsm_custom_bg_color_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_custom_bg_color_responsive_active ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'background-color: %1$s !important;', $this->props['dsm_custom_bg_color_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( $social_share_background_color_hover ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper:hover',
						'declaration' => sprintf( 'background-color: %1$s !important;', $social_share_background_color_hover ),
					)
				);
			}

			if ( $social_share_color_hover ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper:hover',
						'declaration' => sprintf( 'color: %1$s !important;', $social_share_color_hover ),
					)
				);
			}
		}

		if ( 'custom' === $this->props['dsm_color_type'] ) {

			if ( $this->props['dsm_custom_color'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_custom_color'] ),
					)
				);
			}

			if ( $dsm_custom_color_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_custom_color_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),

					)
				);
			}

			if ( $dsm_custom_color_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_custom_color_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-social-share-buttons-item-wrapper',
				'declaration' => 'margin-bottom: 10px;',
			)
		);

		if ( '' === $this->props['dsm_icon_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-icon .dsm_icon',
					'declaration' => 'font-size: 17px;',
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-print .dsm_icon',
				'declaration' => 'font-family: FontAwesome!important;
                              font-weight: 900!important;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-reddit .dsm_icon,
							  %%order_class%% .dsm-facebook .dsm_icon,
							  %%order_class%% .dsm-linkedin .dsm_icon,
							  %%order_class%% .dsm-pinterest .dsm_icon,
							  %%order_class%% .dsm-tumbler .dsm_icon,
							  %%order_class%% .dsm-vk .dsm_icon,
			                  %%order_class%% .dsm-digg .dsm_icon,
			                  %%order_class%% .dsm-skype .dsm_icon,
			                  %%order_class%% .dsm-stumbleupon .dsm_icon,
			                  %%order_class%% .dsm-mix .dsm_icon,
			                  %%order_class%% .dsm-telegram .dsm_icon,
			                  %%order_class%% .dsm-pocket .dsm_icon,
			                  %%order_class%% .dsm-xing .dsm_icon,
			                  %%order_class%% .dsm-whatsapp .dsm_icon,
			                  %%order_class%% .dsm-email .dsm_icon',
				'declaration' => 'font-family: FontAwesome!important;
                              font-weight: 400!important;',
			)
		);

		if ( 'auto' === $this->props['dsm_column'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
					'declaration' => 'gap: 10px; display: inline-flex; flex-wrap: wrap;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-wrapper',
					'declaration' => 'display: inline-block; margin-bottom: 10px; word-break: break-word;',
				)
			);
		}

		if ( 'one' === $this->props['dsm_column'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
					'declaration' => 'display: grid; grid-template-columns: repeat(1, 1fr);',
				)
			);
		}

		if ( 'two' === $this->props['dsm_column'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
					'declaration' => 'display: grid; grid-template-columns: repeat(2, 1fr);',
				)
			);
		}

		if ( 'three' === $this->props['dsm_column'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
					'declaration' => 'display: grid; grid-template-columns: repeat(3, 1fr);',
				)
			);
		}

		if ( 'four' === $this->props['dsm_column'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
					'declaration' => 'display: grid; grid-template-columns: repeat(4, 1fr);',
				)
			);
		}

		if ( 'five' === $this->props['dsm_column'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
					'declaration' => 'display: grid; grid-template-columns: repeat(5, 1fr);',
				)
			);
		}

		if ( 'six' === $this->props['dsm_column'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
					'declaration' => 'display: grid; grid-template-columns: repeat(6, 1fr);',
				)
			);
		}

		// responsive column layout work
		if ( $dsm_column_responsive_active ) {

			if ( 'one' === $this->props['dsm_column_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(1, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'two' === $this->props['dsm_column_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(2, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'three' === $this->props['dsm_column_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(3, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'four' === $this->props['dsm_column_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(4, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'five' === $this->props['dsm_column_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(5, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'six' === $this->props['dsm_column_tablet'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(6, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( 'one' === $this->props['dsm_column_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(1, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'two' === $this->props['dsm_column_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(2, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'three' === $this->props['dsm_column_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(3, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'four' === $this->props['dsm_column_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(4, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'five' === $this->props['dsm_column_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(5, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( 'six' === $this->props['dsm_column_phone'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => 'display: grid; grid-template-columns: repeat(6, 1fr);',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( 'auto' !== $this->props['dsm_column'] ) {

			if ( $this->props['dsm_row_gap'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'grid-row-gap: %1$s;', $this->props['dsm_row_gap'] ),
					)
				);
			}

			if ( $dsm_row_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'grid-row-gap: %1$s;', $this->props['dsm_row_gap_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_row_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'grid-row-gap: %1$s;', $this->props['dsm_row_gap_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( $this->props['dsm_column_gap'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'grid-column-gap : %1$s;', $this->props['dsm_column_gap'] ),
					)
				);
			}

			if ( $dsm_column_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'grid-column-gap: %1$s;', $this->props['dsm_column_gap_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_column_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'grid-column-gap: %1$s;', $this->props['dsm_column_gap_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( 'auto' === $this->props['dsm_column'] ) {

			if ( $this->props['dsm_row_gap'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'row-gap: %1$s !important;', $this->props['dsm_row_gap'] ),
					)
				);
			}

			if ( $dsm_row_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'row-gap: %1$s !important;', $this->props['dsm_row_gap_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_row_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'row-gap: %1$s !important;', $this->props['dsm_row_gap_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( $this->props['dsm_column_gap'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'gap: %1$s;', $this->props['dsm_column_gap'] ),
					)
				);
			}

			if ( $dsm_column_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'gap: %1$s;', $this->props['dsm_column_gap_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_column_gap_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-social-share-buttons-container',
						'declaration' => sprintf( 'gap: %1$s;', $this->props['dsm_column_gap_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( $this->props['dsm_button_height'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-inner-wrapper',
					'declaration' => sprintf( 'height : %1$s;', $this->props['dsm_button_height'] ),
				)
			);
		}

		if ( $dsm_button_height_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-inner-wrapper',
					'declaration' => sprintf( 'height : %1$s;', $this->props['dsm_button_height_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_button_height_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-inner-wrapper',
					'declaration' => sprintf( ' height: %1$s;', $this->props['dsm_button_height_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
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

		if ( $this->props['dsm_icon_size'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-icon .dsm_icon',
					'declaration' => sprintf( 'font-size : %1$s;', $this->props['dsm_icon_size'] ),
				)
			);
		}

		if ( $dsm_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-icon .dsm_icon',
					'declaration' => sprintf( 'font-size : %1$s;', $this->props['dsm_icon_size_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_icon_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-icon .dsm_icon',
					'declaration' => sprintf( 'font-size : %1$s;', $this->props['dsm_icon_size_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( ( 'icon_text' === $this->props['dsm_view'] && 'off' === $this->props['dsm_label'] ) || 'icon' === $this->props['dsm_view'] || 'text' === $this->props['dsm_view'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-wrapper .dsm-social-share-button-inner-wrapper',
					'declaration' => '-webkit-box-pack: center; -ms-flex-pack: center; justify-content: center;',
				)
			);
		}

		if ( ( 'boxed_icon' === $this->props['dsm_skin'] && 'icon' === $this->props['dsm_view'] ) ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-buttons-container .dsm-social-share-button-inner-wrapper',
					'declaration' => 'border-width:0px;',
				)
			);
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-icon-list', plugin_dir_url( __DIR__ ) . 'SocialShareButtons/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return sprintf(
			'<div class="dsm-social-share-buttons-container dsm-%2$s dsm-%3$s">
				%1$s
			</div>
			',
			$this->props['content'],
			$this->props['dsm_skin'],
			$this->props['dsm_view']
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
		$assets_prefix  = et_get_dynamic_assets_path();
		$all_shortcodes = $instance->get_saved_page_shortcodes();

		// Social Share.
		if ( ! isset( $assets_list['dsm_social_share_buttons'] ) ) {
			$assets_list['dsm_social_share_buttons'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'SocialShareButtons/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_Social_Share_Buttons();
