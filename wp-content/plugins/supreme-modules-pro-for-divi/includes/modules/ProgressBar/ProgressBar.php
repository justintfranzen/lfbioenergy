<?php

class DSM_Progress_Bar extends ET_Builder_Module {
	public $slug          = 'dsm_progress_bar';
	public $vb_support    = 'on';
	private $module_props = array();
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Progress Bar', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'dsm_alignment'          => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_progress_indicator' => esc_html__( 'Progress Indicator', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_tracker'            => esc_html__( 'Tracker', 'dsm-supreme-modules-pro-for-divi' ),
					'dsm_percentage_text'    => esc_html__( 'Percentage Text', 'dsm-supreme-modules-pro-for-divi' ),
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
					'label'          => esc_html__( 'Percentage Font', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-progress-bar-container .dsm-current-progress-percentage, %%order_class%% .dsm-progress-bar-tracker-circular .dsm-current-progress-percentage',
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
					'toggle_slug'    => 'dsm_percentage_text',
				),
			),

			'box_shadow'     => array(
				'default'        => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),

				'tracker_shadow' => array(
					'label'           => esc_html__( 'Tracker Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'dsm_tracker',
					'css'             => array(
						'main' => '%%order_class%%',
					),

					'show_if'         => array(
						'dsm_tracker_type' => 'horizontal',
					),
				),
			),

			'borders'        => array(
				'default'                   => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),

				'progress_indicator_border' => array(
					'label_prefix' => et_builder_i18n( 'Progress' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-progress-bar-container .dsm-current-progress',
							'border_styles' => '%%order_class%% .dsm-progress-bar-container .dsm-current-progress',
						),
					),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_progress_indicator',
					'show_if'      => array(
						'dsm_tracker_type' => 'horizontal',
					),
				),

				'progress_tracker_border'   => array(
					'label_prefix' => et_builder_i18n( 'Tracker' ),
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-progress-bar-container',
							'border_styles' => '%%order_class%% .dsm-progress-bar-container',
						),
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'dsm_tracker',
				),

			),

			'margin_padding' => array(

				'css' => array(
					'main' => '%%order_class%%',
				),
			),

			'background'     => array(
				'css'                     => array(
					'main' => '%%order_class%% .dsm-current-progress',
				),

				'options'                 => array(
					'background_color' => array(
						'default' => et_builder_accent_color(),
					),
				),

				'settings'                => array(
					'color'       => 'alpha',
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'dsm_progress_indicator',
				),

				'use_background_image'    => false,
				'use_background_pattern'  => false,
				'use_background_mask'     => false,
				'use_background_video'    => false,
				'use_background_gradient' => false,
			),

			'text'           => false,
			'box_shadow'     => false,
		);
	}

	public function get_fields() {
		return array(
			'dsm_tracker_type'             => array(
				'label'           => esc_html__( 'Tracker Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'horizontal',
				'options'         => array(
					'horizontal' => esc_html__( 'Horizontal', 'dsm-supreme-modules-pro-for-divi' ),
					'circular'   => esc_html__( 'Circular', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_progress_relative'        => array(
				'label'           => esc_html__( 'Progress Relative to', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'entire_page',
				'options'         => array(
					'entire_page' => esc_html__( 'Entire Page', 'dsm-supreme-modules-pro-for-divi' ),
					'selector'    => esc_html__( 'Selector', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_progress_selector'        => array(
				'label'            => esc_html__( 'Selector', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'option_category'  => 'basic_option',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',

				'show_if'          => array(
					'dsm_progress_relative' => 'selector',
				),
			),

			'dsm_progress_direction'       => array(
				'label'           => esc_html__( 'Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'multiple_buttons',
				'options'         => array(
					'left'  => array(
						'title' => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
					),
				),
				'default'         => 'left',
				'toggleable'      => true,
				'multi_selection' => false,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
			),

			'dsm_show_percentage'          => array(
				'label'           => esc_html__( 'Percentage', 'dsm-supreme-modules-pro-for-divi' ),
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

			'dsm_percentage_direction'     => array(
				'label'           => esc_html__( 'Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'multiple_buttons',
				'default'         => 'right',
				'options'         => array(
					'left'  => array(
						'title' => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					),
					'right' => array(
						'title' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
					),
				),

				'toggleable'      => true,
				'multi_selection' => false,
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',

				'show_if'         => array(
					'dsm_show_percentage' => 'on',
					'dsm_tracker_type'    => 'horizontal',
				),
			),

			'dsm_tracker_bg_color'         => array(
				'label'       => esc_html__( 'Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_tracker',

				'show_if'     => array(
					'dsm_tracker_type' => 'horizontal',
				),
			),

			'dsm_progress_height'          => array(
				'label'           => esc_html__( 'Height', 'dsm-supreme-modules-pro-for-divi' ),
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

				'show_if'         => array(
					'dsm_tracker_type' => 'horizontal',
				),

				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_tracker',
			),

			'dsm_progress_indicator_width' => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '4px',
				'default_unit'    => 'px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_tracker_type' => 'circular',
				),

				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_progress_indicator',
			),

			'dsm_progress_tracker_width'   => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '4px',
				'default_unit'    => 'px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_tracker_type' => 'circular',
				),

				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'dsm_tracker',
			),

			'dsm_indicator_color'          => array(
				'label'       => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#7ebec5',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_progress_indicator',

				'show_if'     => array(
					'dsm_tracker_type' => 'circular',
				),
			),

			'dsm_tracker_color'            => array(
				'label'       => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#eeeeee',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'dsm_tracker',

				'show_if'     => array(
					'dsm_tracker_type' => 'circular',
				),
			),

			'dsm_progress_alignment'       => array(
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
				'toggleable'      => true,
				'multi_selection' => false,
				'toggle_slug'     => 'dsm_alignment',
				'tab_slug'        => 'advanced',

				'show_if'         => array(
					'dsm_tracker_type' => 'circular',
				),
			),

			'dsm_progress_circle_size'     => array(
				'label'           => esc_html__( 'Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default_unit'    => 'px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '200',
					'step' => '1',
				),

				'show_if'         => array(
					'dsm_tracker_type' => 'circular',
				),

				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		$this->module_props = $this->props;

		$dsm_progress_height_last_edited       = $this->props['dsm_progress_height_last_edited'];
		$dsm_progress_height_responsive_active = et_pb_get_responsive_status( $dsm_progress_height_last_edited );

		$dsm_progress_indicator_width_last_edited       = $this->props['dsm_progress_indicator_width_last_edited'];
		$dsm_progress_indicator_width_responsive_active = et_pb_get_responsive_status( $dsm_progress_indicator_width_last_edited );

		$dsm_progress_tracker_width_last_edited       = $this->props['dsm_progress_tracker_width_last_edited'];
		$dsm_progress_tracker_width_responsive_active = et_pb_get_responsive_status( $dsm_progress_tracker_width_last_edited );

		$dsm_progress_circle_size_last_edited       = $this->props['dsm_progress_circle_size_last_edited'];
		$dsm_progress_circle_size_responsive_active = et_pb_get_responsive_status( $dsm_progress_circle_size_last_edited );

		wp_enqueue_script( 'dsm-progress-bar' );

		if ( '' === $this->props['border_style_all_progress_indicator_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-progress-bar-tracker-horizontal .dsm-current-progress',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( '' !== $this->props['border_radii_progress_tracker_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-progress-bar-container.dsm-progress-bar-tracker-horizontal',
					'declaration' => 'overflow:visible;',
				)
			);
		}
		if ( '' === $this->props['border_style_all_progress_tracker_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-progress-bar-container.dsm-progress-bar-tracker-horizontal',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( $this->props['dsm_percentage_direction'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-progress-bar-tracker-horizontal .dsm-current-progress-percentage',
					'declaration' => sprintf( 'direction:%1$s;', 'right' === $this->props['dsm_percentage_direction'] ? 'ltr' : 'rtl' ),
				)
			);
		}

		if ( $this->props['dsm_progress_direction'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-progress-bar-container.dsm-progress-bar-tracker-horizontal',
					'declaration' => sprintf( 'direction:%1$s;', 'right' === $this->props['dsm_progress_direction'] ? 'rtl' : 'ltr' ),
				)
			);
		}

		if ( 'horizontal' === $this->props['dsm_tracker_type'] ) {
			if ( $this->props['dsm_progress_height'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-container.dsm-progress-bar-tracker-horizontal',
						'declaration' => sprintf( 'height: %1$s;', $this->props['dsm_progress_height'] ),
					)
				);
			}

			if ( $dsm_progress_height_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-container.dsm-progress-bar-tracker-horizontal',
						'declaration' => sprintf( 'height: %1$s;', $this->props['dsm_progress_height_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_progress_height_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-container.dsm-progress-bar-tracker-horizontal',
						'declaration' => sprintf( 'height: %1$s;', $this->props['dsm_progress_height_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( $this->props['dsm_tracker_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-progress-bar-container.dsm-progress-bar-tracker-horizontal',
					'declaration' => sprintf( 'background:%1$s;', $this->props['dsm_tracker_bg_color'] ),
				)
			);
		}

		if ( 'circular' === $this->props['dsm_tracker_type'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-progressbar-circular',
					'declaration' => 'width: 200px;
                              height: 200px;
                              display: -webkit-box;
                              display: -ms-flexbox;
                              display: flex;
                              -webkit-box-align: center;
                              -ms-flex-align: center;
                              align-items: center;
                              -webkit-box-pack: center;
                              -ms-flex-pack: center;
                              justify-content: center;
                              position: relative;
                              -webkit-margin-start: 0;
                              margin-inline-start: 0;
                              -webkit-margin-end: auto;
                              margin-inline-end: auto;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-progressbar-circular svg, %%order_class%% .dsm-progressbar-circular .dsm-current-progress-percentage',
					'declaration' => 'position: absolute;',
				)
			);

			if ( $this->props['dsm_progress_indicator_width'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-tracker-circular .dsm-progressbar-circular .current-progress',
						'declaration' => sprintf( 'stroke-width: %1$s;', $this->props['dsm_progress_indicator_width'] ),
					)
				);
			}

			if ( $dsm_progress_indicator_width_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-tracker-circular .dsm-progressbar-circular .current-progress',
						'declaration' => sprintf( 'stroke-width: %1$s;', $this->props['dsm_progress_indicator_width_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_progress_indicator_width_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-tracker-circular .dsm-progressbar-circular .current-progress',
						'declaration' => sprintf( 'stroke-width: %1$s;', $this->props['dsm_progress_indicator_width_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( $this->props['dsm_progress_tracker_width'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-tracker-circular .dsm-progressbar-circular .circle',
						'declaration' => sprintf( 'stroke-width: %1$s;', $this->props['dsm_progress_tracker_width'] ),
					)
				);
			}

			if ( $dsm_progress_tracker_width_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-tracker-circular .dsm-progressbar-circular .circle',
						'declaration' => sprintf( 'stroke-width: %1$s;', $this->props['dsm_progress_tracker_width_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_progress_tracker_width_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-tracker-circular .dsm-progressbar-circular .circle',
						'declaration' => sprintf( 'stroke-width: %1$s;', $this->props['dsm_progress_tracker_width_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}

			if ( $this->props['dsm_indicator_color'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-tracker-circular .dsm-progressbar-circular .current-progress',
						'declaration' => sprintf( 'stroke:%1$s;', $this->props['dsm_indicator_color'] ),
					)
				);
			}

			if ( $this->props['dsm_tracker_color'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progress-bar-tracker-circular .dsm-progressbar-circular .circle',
						'declaration' => sprintf( 'stroke:%1$s;', $this->props['dsm_tracker_color'] ),
					)
				);
			}

			$progress_alignment_value = '';

			switch ( $this->props['dsm_progress_alignment'] ) {
				case 'left':
					$progress_alignment_value = 'auto 0 0 0';
					break;
				case 'center':
					$progress_alignment_value = '0 auto';
					break;
				case 'right':
					$progress_alignment_value = '0 0 0 auto';
					break;
			}

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-progressbar-circular',
					'declaration' => sprintf( 'margin:%1$s;', $progress_alignment_value ),
				)
			);

			if ( $this->props['dsm_progress_circle_size'] ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progressbar-circular',
						'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_progress_circle_size'] ),
					)
				);
			}

			if ( $dsm_progress_circle_size_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progressbar-circular',
						'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_progress_circle_size_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_progress_circle_size_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-progressbar-circular',
						'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_progress_circle_size_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-progress-bar-container .current-progress, %%order_class%% .dsm-progress-bar-container .dsm-current-progress',
				'declaration' => 'transition: .3s ease;',
			)
		);

		$tracker_markup = '';
		switch ( $this->props['dsm_tracker_type'] ) {
			case 'horizontal':
				$tracker_markup = sprintf(
					'<div class="dsm-current-progress">%1$s</div>',
					'on' === $this->props['dsm_show_percentage'] ? '<div class="dsm-current-progress-percentage"></div>' : ''
				);
				break;
			case 'circular':
				$tracker_markup = sprintf(
					'<div class="dsm-progressbar-circular">
						<svg width="100%%" height="100%%" xmlns="http://www.w3.org/2000/svg" version="1.1">
							<circle class="circle" r="40%%" cx="50%%" cy="50%%"></circle>
							<circle class="current-progress" r="40%%" cx="50%%" cy="50%%"></circle>    
						</svg>
						<div class="dsm-current-progress-percentage"></div>
					</div>'
				);
				break;
			default:
				$tracker_markup = '';
				break;
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-progress-bar', plugin_dir_url( __DIR__ ) . 'ProgressBar/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return sprintf(
			'<div class="dsm-progress-bar-container dsm-progress-bar-tracker-%1$s" data-relative="%2$s" data-show_percentage="%4$s" data-tracker_type="%1$s" data-direction="%5$s" data-selector="%6$s" >
				%3$s  
			</div>
			',
			$this->props['dsm_tracker_type'],
			$this->props['dsm_progress_relative'],
			$tracker_markup,
			$this->props['dsm_show_percentage'],
			$this->props['dsm_progress_direction'],
			$this->props['dsm_progress_selector']
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
		// ProgressBar.
		if ( ! isset( $assets_list['dsm_progress_bar'] ) ) {
			$assets_list['dsm_progress_bar'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'ProgressBar/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_Progress_Bar();
