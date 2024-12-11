<?php

class DSM_Text_Path extends ET_Builder_Module {
	public $slug       = 'dsm_text_path';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Text Path', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'alignment'  => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'text-path'  => esc_html__( 'Text Path', 'dsm-supreme-modules-pro-for-divi' ),
					'title_typo' => esc_html__( 'Title Text', 'dsm-supreme-modules-pro-for-divi' ),
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
				'header' => array(
					'label'          => esc_html__( 'Title Font', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% .dsm-text-path-container svg',
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
					'toggle_slug'    => 'title_typo',
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
					'main' => '%%order_class%%',
				),
			),
			'text'           => false,
		);
	}

	public function get_fields() {
		return array(
			'dsm_path_text'           => array(
				'label'            => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'default_on_front' => 'Add Your Curvy Text Here',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( 'Text entered here will appear as the text path.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'dynamic_content'  => 'text',
			),
			'dsm_path_type'           => array(
				'label'           => esc_html__( 'Path Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'wave',
				'options'         => array(
					'wave'   => esc_html__( 'Wave', 'dsm-supreme-modules-pro-for-divi' ),
					'arc'    => esc_html__( 'Arc', 'dsm-supreme-modules-pro-for-divi' ),
					'circle' => esc_html__( 'Circle', 'dsm-supreme-modules-pro-for-divi' ),
					'line'   => esc_html__( 'Line', 'dsm-supreme-modules-pro-for-divi' ),
					'oval'   => esc_html__( 'Oval', 'dsm-supreme-modules-pro-for-divi' ),
					'spiral' => esc_html__( 'Spiral', 'dsm-supreme-modules-pro-for-divi' ),
					'custom' => esc_html__( 'Custom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_custom_path_content' => array(
				'label'           => et_builder_i18n( 'SVG Code' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'description'     => esc_html__( 'Input the SVG code here.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'     => 'main_content',
				'show_if'         => array(
					'dsm_path_type' => 'custom',
				),
			),
			'dsm_text_dir'            => array(
				'label'           => esc_html__( 'Text Direction', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'default',
				'options'         => array(
					'default' => esc_html__( 'Default', 'dsm-supreme-modules-pro-for-divi' ),
					'rtl'     => esc_html__( 'RTL', 'dsm-supreme-modules-pro-for-divi' ),
					'ltr'     => esc_html__( 'LTR', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'dsm_show_path'           => array(
				'label'           => esc_html__( 'Show Path', 'dsm-supreme-modules-pro-for-divi' ),
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
			'dsm_stroke_color'        => array(
				'label'       => esc_html__( 'Path Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#e8178a',
				'mobile_options'  => true,
				'responsive'      => true,
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'text-path',
				'show_if'         => array(
					'dsm_show_path' => 'on',
				),
			),
			'dsm_stroke_width'      => array(
				'label'           => esc_html__( 'Path Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '1px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '800',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text-path',
				'show_if'         => array(
					'dsm_show_path' => 'on',
				),
			),
			'dsm_text_path_size'      => array(
				'label'           => esc_html__( 'Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '500px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '800',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text-path',
			),
			'dsm_path_rotate'         => array(
				'label'           => esc_html__( 'Rotate', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '0deg',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '360',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text-path',
			),
			'dsm_path_word_spacing'   => array(
				'label'           => esc_html__( 'Word Spacing', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '0px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '20',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text-path',
			),
			'dsm_path_starting_point' => array(
				'label'           => esc_html__( 'Starting Point', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'unit_less'       => true,
				'default'         => '0%',
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'text-path',
			),
			'dsm_path_alignment'      => array(
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
				'mobile_options'  => true,
				'responsive'      => true,
				'toggleable'      => true,
				'multi_selection' => false,
				'toggle_slug'     => 'alignment',
				'tab_slug'        => 'advanced',
			),
		);
	}


	public function process_custom_path( $content, $render_slug ) {

		$order_class = self::get_module_order_class( $render_slug );
		if ( '' === trim( $content ) ) {
			return '';
		}

		$document = new DOMDocument();

		libxml_use_internal_errors( true );

		$document->loadXML( $content );

		libxml_clear_errors();

		$svg = $document->getElementsByTagName( 'svg' )->item( 0 );

		$svg_width  = $svg->getAttribute( 'width' );
		$svg_height = $svg->getAttribute( 'height' );

		$inner_html = $this->get_inner_html( $svg );

		return array(
			$svg_width,
			$svg_height,
			str_replace( '<path', sprintf( '<path id="%1$s"', $order_class ), $inner_html ),
		);
	}

	public function get_inner_html( $node ) {
		$innerHTML = '';
		$children  = $node->childNodes;
		foreach ( $children as $child ) {
			$innerHTML .= $child->ownerDocument->saveXML( $child );
		}

		return $innerHTML;
	}

	public function render( $attrs, $content, $render_slug ) {
		$dsm_path_rotate_last_edited       = $this->props['dsm_path_rotate_last_edited'];
		$dsm_path_rotate_responsive_active = et_pb_get_responsive_status( $dsm_path_rotate_last_edited );

		if ( 'on' === $this->props['dsm_show_path'] ) {
			// Stroke Color.
			$this->generate_styles(
				array(
					'base_attr_name' => 'dsm_stroke_color',
					'selector'       => '%%order_class%% .dsm-text-path-container path',
					'css_property'   => 'stroke',
					'render_slug'    => $render_slug,
				)
			);
			// Stroke Width.
			$this->generate_styles(
				array(
					'base_attr_name' => 'dsm_stroke_width',
					'selector'       => '%%order_class%% .dsm-text-path-container path',
					'css_property'   => 'stroke-width',
					'render_slug'    => $render_slug,
				)
			);
		}

		if ( $this->props['header_text_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-text-path-container svg',
					'declaration' => sprintf( 'fill: %1$s !important;', $this->props['header_text_color'] ),
				)
			);
		}

		if ( '' === $this->props['header_text_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-text-path-container svg',
					'declaration' => 'fill: #000000;',
				)
			);
		}

		$mobile_enabled = et_pb_get_responsive_status( $this->props['dsm_text_path_size_last_edited'] );

		$text_path_size_values = array(
			'desktop' => $this->props['dsm_text_path_size'],
			'tablet'  => $mobile_enabled ? $this->props['dsm_text_path_size_tablet'] : '',
			'phone'   => $mobile_enabled ? $this->props['dsm_text_path_size_phone'] : '',
		);

		et_pb_responsive_options()->generate_responsive_css( $text_path_size_values, '%%order_class%% .dsm-text-path-container svg', 'width', $render_slug );

		$mobile_enabled = et_pb_get_responsive_status( $this->props['dsm_path_word_spacing_last_edited'] );

		$text_path_word_spacing_values = array(
			'desktop' => $this->props['dsm_path_word_spacing'],
			'tablet'  => $mobile_enabled ? $this->props['dsm_path_word_spacing_tablet'] : '',
			'phone'   => $mobile_enabled ? $this->props['dsm_path_word_spacing_phone'] : '',
		);

		et_pb_responsive_options()->generate_responsive_css( $text_path_word_spacing_values, '%%order_class%% .dsm-text-path-container svg', 'word-spacing', $render_slug );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-text-path-container svg',
				'declaration' => sprintf( 'transform:rotate(%1$s);', $this->props['dsm_path_rotate'] ),
			)
		);

		if ( $dsm_path_rotate_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-text-path-container svg',
					'declaration' => sprintf( 'transform:rotate(%1$s);', $this->props['dsm_path_rotate_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_path_rotate_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-text-path-container svg',
					'declaration' => sprintf( 'transform:rotate(%1$s);', $this->props['dsm_path_rotate_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// Path Alignment.
		$this->generate_styles(
			array(
				'base_attr_name' => 'dsm_path_alignment',
				'selector'       => '%%order_class%% .dsm-text-path-container',
				'css_property'   => 'text-align',
				'render_slug'    => $render_slug,
			)
		);

		$count_path_module = '';

		$order_class     = self::get_module_order_class( $render_slug );
		$text_path_value = '';
		switch ( $this->props['dsm_path_type'] ) {
			case 'wave':
				$text_path_value = sprintf(
					'<svg xmlns="http://www.w3.org/2000/svg" width="250" height="42.4994" viewBox="0 0 250 42.4994">
				                            <path d="M0,42.2494C62.5,42.2494,62.5.25,125,.25s62.5,41.9994,125,41.9994" id="dsm-path-wave"></path>
		                                    <path d="M-41.6693,49.25"></path>
			                                <path d="M-208.3307-6.75"></path>
											<text>
											<textPath href="#dsm-path-wave" startOffset="%2$s%3$s%4$s%5$s">%1$s%6$s%7$s</textPath>
											</text>
											</svg>',
					'' === trim( $this->props['link_option_url'] ) ? $this->props['dsm_path_text'] : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '100%' : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? 100 - (int) $this->props['dsm_path_starting_point'] . '%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '0%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? $this->props['dsm_path_starting_point'] : '',
					'on' === $this->props['link_option_url_new_window'] && '' !== trim( $this->props['link_option_url'] ) ? sprintf( '<a href="%1$s" target="_blank">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : '',
					'' !== trim( $this->props['link_option_url'] ) && 'off' === $this->props['link_option_url_new_window'] ? sprintf( '<a href="%1$s">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : ''
				);
				break;
			case 'arc':
				$text_path_value = sprintf(
					'<svg xmlns="http://www.w3.org/2000/svg" width="250.5" height="125.25" viewBox="0 0 250.5 125.25">
												<path d="M.25,125.25a125,125,0,0,1,250,0" id="dsm-path-arc"></path>
												<text>
												   <textPath href="#dsm-path-arc" startOffset="%2$s%3$s%4$s%5$s">%1$s%6$s%7$s</textPath>
												</text>
											</svg>
											',
					'' === trim( $this->props['link_option_url'] ) ? $this->props['dsm_path_text'] : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '100%' : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? 100 - (int) $this->props['dsm_path_starting_point'] . '%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '0%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? $this->props['dsm_path_starting_point'] : '',
					'on' === $this->props['link_option_url_new_window'] && '' !== trim( $this->props['link_option_url'] ) ? sprintf( '<a href="%1$s" target="_blank">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : '',
					'' !== trim( $this->props['link_option_url'] ) && 'off' === $this->props['link_option_url_new_window'] ? sprintf( '<a href="%1$s">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : ''
				);
				break;
			case 'circle':
				$text_path_value = sprintf(
					'<svg xmlns="http://www.w3.org/2000/svg" width="250.5" height="250.5" viewBox="0 0 250.5 250.5">
												<path d="M.25,125.25a125,125,0,1,1,125,125,125,125,0,0,1-125-125" id="dsm-path-circle"></path>
												<text>
													<textPath href="#dsm-path-circle" startOffset="%2$s%3$s%4$s%5$s">%1$s%6$s%7$s</textPath>
												</text>
											</svg>
											',
					'' === trim( $this->props['link_option_url'] ) ? $this->props['dsm_path_text'] : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '100%' : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? 100 - (int) $this->props['dsm_path_starting_point'] . '%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '0%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? $this->props['dsm_path_starting_point'] : '',
					'on' === $this->props['link_option_url_new_window'] && '' !== trim( $this->props['link_option_url'] ) ? sprintf( '<a href="%1$s" target="_blank">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : '',
					'' !== trim( $this->props['link_option_url'] ) && 'off' === $this->props['link_option_url_new_window'] ? sprintf( '<a href="%1$s">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : ''
				);
				break;
			case 'line':
				$text_path_value = sprintf(
					'<svg xmlns="http://www.w3.org/2000/svg" width="250" height="22" viewBox="0 0 250 22">
												<path d="M 0 27 l 250 -22" id="dsm-path-line"></path>
												<text>
													<textPath href="#dsm-path-line" startOffset="%2$s%3$s%4$s%5$s">%1$s%6$s%7$s</textPath>
												</text>
											</svg>
											',
					'' === trim( $this->props['link_option_url'] ) ? $this->props['dsm_path_text'] : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '100%' : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? 100 - (int) $this->props['dsm_path_starting_point'] . '%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '0%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? $this->props['dsm_path_starting_point'] : '',
					'on' === $this->props['link_option_url_new_window'] && '' !== trim( $this->props['link_option_url'] ) ? sprintf( '<a href="%1$s" target="_blank">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : '',
					'' !== trim( $this->props['link_option_url'] ) && 'off' === $this->props['link_option_url_new_window'] ? sprintf( '<a href="%1$s">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : ''
				);
				break;
			case 'oval':
				$text_path_value = sprintf(
					'<svg xmlns="http://www.w3.org/2000/svg" width="250.5" height="125.75" viewBox="0 0 250.5 125.75">
												<path class="b473dc75-7459-43a5-8a1c-89caf910da53" d="M.25,62.875C.25,28.2882,56.2144.25,125.25.25s125,28.0382,125,62.625-55.9644,62.625-125,62.625S.25,97.4619.25,62.875" id="dsm-path-oval"></path>
												<text>
													<textPath href="#dsm-path-oval" startOffset="%2$s%3$s%4$s%5$s">%1$s%6$s%7$s</textPath>
												</text>
											</svg>
											',
					'' === trim( $this->props['link_option_url'] ) ? $this->props['dsm_path_text'] : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '100%' : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? 100 - (int) $this->props['dsm_path_starting_point'] . '%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '0%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? $this->props['dsm_path_starting_point'] : '',
					'on' === $this->props['link_option_url_new_window'] && '' !== trim( $this->props['link_option_url'] ) ? sprintf( '<a href="%1$s" target="_blank">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : '',
					'' !== trim( $this->props['link_option_url'] ) && 'off' === $this->props['link_option_url_new_window'] ? sprintf( '<a href="%1$s">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : ''
				);
				break;
			case 'spiral':
				$text_path_value = sprintf(
					'<svg xmlns="http://www.w3.org/2000/svg" width="250.4348" height="239.4454" viewBox="0 0 250.4348 239.4454">
												<path d="M.1848,49.0219a149.3489,149.3489,0,0,1,210.9824-9.8266,119.479,119.479,0,0,1,7.8613,168.786A95.5831,95.5831,0,0,1,84,214.27a76.4666,76.4666,0,0,1-5.0312-108.023" id="dsm-path-spiral"></path>
												<text>
												<textPath href="#dsm-path-spiral" startOffset="%2$s%3$s%4$s%5$s">%1$s%6$s%7$s</textPath>
												</text>
											</svg>
											',
					'' === trim( $this->props['link_option_url'] ) ? $this->props['dsm_path_text'] : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '100%' : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? 100 - (int) $this->props['dsm_path_starting_point'] . '%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '0%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? $this->props['dsm_path_starting_point'] : '',
					'on' === $this->props['link_option_url_new_window'] && '' !== trim( $this->props['link_option_url'] ) ? sprintf( '<a href="%1$s" target="_blank">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : '',
					'' !== trim( $this->props['link_option_url'] ) && 'off' === $this->props['link_option_url_new_window'] ? sprintf( '<a href="%1$s">%2$s</a>', $this->props['link_option_url'], $this->props['dsm_path_text'] ) : ''
				);
				break;

			case 'custom':
				list( $svg_width, $svg_height, $svg_code ) = $this->process_custom_path( $this->props['dsm_custom_path_content'], $render_slug );

				$text_path_value = sprintf(
					'<svg xmlns="http://www.w3.org/2000/svg" width="%7$s" height="%8$s" viewBox="0 0 %7$s %8$s" fill="none" >
												%6$s
												<text>
													<textPath href="#%9$s" startOffset="%2$s%3$s%4$s%5$s">%1$s</textPath>
												</text>
											</svg>',
					'' === trim( $this->props['link_option_url'] ) ? $this->props['dsm_path_text'] : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '100%' : '',
					( 'rtl' === $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? 100 - (int) $this->props['dsm_path_starting_point'] . '%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' === $this->props['dsm_path_starting_point'] ) ? '0%' : '',
					( 'rtl' !== $this->props['dsm_text_dir'] && '0%' !== $this->props['dsm_path_starting_point'] ) ? $this->props['dsm_path_starting_point'] : '',
					$svg_code,
					$svg_width,
					$svg_height,
					$order_class
				);
				break;
			default:
				$text_path_value = '';
				break;
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-text-path', plugin_dir_url( __DIR__ ) . 'TextPath/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return sprintf(
			'
			<div class="dsm-text-path-container dsm-%2$s">
				%1$s  
			</div>',
			$text_path_value,
			$this->props['dsm_text_dir']
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
		$assets_prefix     = et_get_dynamic_assets_path();
		$all_shortcodes    = $instance->get_saved_page_shortcodes();
		$this->_cpt_suffix = et_builder_should_wrap_styles() && ! et_is_builder_plugin_active() ? '_cpt' : '';

		// TextPath.
		if ( ! isset( $assets_list['dsm_text_path'] ) ) {
			$assets_list['dsm_text_path'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'TextPath/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_Text_Path();
