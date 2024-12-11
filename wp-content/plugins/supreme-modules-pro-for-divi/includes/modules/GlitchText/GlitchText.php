<?php

class DSM_GlitchText extends ET_Builder_Module {

	public $slug       = 'dsm_glitch_text';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Glitch Text', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';
		// Toggle settings.
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content'  => esc_html__( 'Text', 'dsm-supreme-modules-pro-for-divi' ),
					'glitch_effect' => esc_html__( 'Glitch Effect', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'      => array(
				'header' => array(
					'label'          => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'            => array(
						'main' => '%%order_class%% h1.dsm-glitch-text, %%order_class%% h2.dsm-glitch-text, %%order_class%% h3.dsm-glitch-text, %%order_class%% h4.dsm-glitch-text, %%order_class%% h5.dsm-glitch-text, %%order_class%% h6.dsm-glitch-text',
					),
					'font_size'      => array(
						'default' => '30px',
					),
					'line_height'    => array(
						'default' => '1em',
					),
					'letter_spacing' => array(
						'default' => '0px',
					),
					'header_level'   => array(
						'default' => 'h1',
					),
				),
			),
			'text'       => array(
				'use_text_orientation'  => true,
				'use_background_layout' => true,
				'css'                   => array(
					'text_shadow' => '%%order_class%%',
				),
				'options'               => array(
					'background_layout' => array(
						'default' => 'light',
					),
				),
			),
			'background' => array(
				'css' => array(
					'main' => '%%order_class%% .dsm-glitch-text',
				),
			),
			'borders'    => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),
			),
			'box_shadow' => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
		);
	}

	public function get_fields() {
		return array(
			'glitch_text'          => array(
				'label'            => esc_html__( 'Glitch Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
				'default_on_front' => 'Supreme Glitch Text',
				'dynamic_content'  => 'text',
			),
			'glitch_text_effect'   => array(
				'label'           => esc_html__( 'Glitch Effect', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'one',
				'options'         => array(
					'one'   => esc_html__( 'Glitch One', 'dsm-supreme-modules-pro-for-divi' ),
					'two'   => esc_html__( 'Glitch Two', 'dsm-supreme-modules-pro-for-divi' ),
					'three' => esc_html__( 'Glitch Three', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'     => 'glitch_effect',
			),
			'glitch_one_color_one' => array(
				'default'     => '#FF0000',
				'label'       => esc_html__( 'Glitch One Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your Glitch One Color.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'hover'          => 'tabs',
				// 'mobile_options' => true,
				'toggle_slug' => 'glitch_effect',
				'show_if'     => array(
					'glitch_text_effect' => 'one',
					'glitch_text_effect' => 'three',
				),
			),
			'glitch_one_color_two' => array(
				'default'     => '#0000FF',
				'label'       => esc_html__( 'Glitch Two Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your Glitch Two Color.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'hover'          => 'tabs',
				// 'mobile_options' => true,
				'toggle_slug' => 'glitch_effect',
				'show_if'     => array(
					'glitch_text_effect' => 'one',
					'glitch_text_effect' => 'three',
				),
			),
			'glitch_two_color_one' => array(
				'default'     => '#a020f0',
				'label'       => esc_html__( 'Glitch One Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your Glitch One Color.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'hover'          => 'tabs',
				// 'mobile_options' => true,
				'toggle_slug' => 'glitch_effect',
				'show_if'     => array(
					'glitch_text_effect' => 'two',
				),
			),
			'glitch_two_color_two' => array(
				'default'     => '#008000',
				'label'       => esc_html__( 'Glitch Two Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( 'Here you can define a custom color for your Glitch Two Color.', 'dsm-supreme-modules-pro-for-divi' ),
				// 'hover'          => 'tabs',
				// 'mobile_options' => true,
				'toggle_slug' => 'glitch_effect',
				'show_if'     => array(
					'glitch_text_effect' => 'two',
				),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$glitch_text_effect   = $this->props['glitch_text_effect'];
		$glitch_text          = $this->props['glitch_text'];
		$glitch_one_color_one = $this->props['glitch_one_color_one'];
		$glitch_one_color_two = $this->props['glitch_one_color_two'];
		$glitch_two_color_one = $this->props['glitch_two_color_one'];
		$glitch_two_color_two = $this->props['glitch_two_color_two'];
		$background_layout    = $this->props['background_layout'];
		$header_level         = $this->props['header_level'];

		if ( 'one' === $glitch_text_effect ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-glitch-effect-type-one:after',
					'declaration' => sprintf(
						'text-shadow: -1px 0 %1$s;',
						esc_attr( $glitch_one_color_one )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-glitch-effect-type-one:before',
					'declaration' => sprintf(
						'text-shadow: 2px 0 %1$s;',
						esc_attr( $glitch_one_color_two )
					),
				)
			);
		} elseif ( 'two' === $glitch_text_effect ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-glitch-effect-type-two:after',
					'declaration' => sprintf(
						'text-shadow: -1px 0 %1$s;',
						esc_attr( $glitch_two_color_one )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-glitch-effect-type-two:before',
					'declaration' => sprintf(
						'text-shadow: 2px 0 %1$s;',
						esc_attr( $glitch_two_color_two )
					),
				)
			);
		} else {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-glitch-effect-type-three>span',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_attr( $glitch_one_color_one )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-glitch-effect-type-three:after',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_attr( $glitch_one_color_two )
					),
				)
			);
		}

		if ( '' !== $glitch_text ) {
			if ( 'three' === $glitch_text_effect ) {
				$glitch_text = sprintf(
					'<%1$s class="dsm-glitch-text et_pb_module_header dsm-glitch-effect-type-%3$s" data-dsm-glitch-text="%2$s"><span>%2$s</span></%1$s>',
					et_pb_process_header_level( $header_level, 'h1' ),
					$glitch_text,
					esc_attr( $glitch_text_effect )
				);
			} else {
				$glitch_text = sprintf(
					'<%1$s class="dsm-glitch-text dsm-glitch-text-effect et_pb_module_header dsm-glitch-effect-type-%3$s" data-dsm-glitch-text="%2$s">%2$s</%1$s>',
					et_pb_process_header_level( $header_level, 'h1' ),
					$glitch_text,
					esc_attr( $glitch_text_effect )
				);
			}
		}

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
				"et_pb_bg_layout_{$background_layout}",
			)
		);

		// Render module content.
		$output = sprintf(
			'%1$s',
			$glitch_text
		);

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-glitch-text', plugin_dir_url( __DIR__ ) . 'GlitchText/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

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
		$assets_prefix     = et_get_dynamic_assets_path();
		$all_shortcodes    = $instance->get_saved_page_shortcodes();
		$this->_cpt_suffix = et_builder_should_wrap_styles() && ! et_is_builder_plugin_active() ? '_cpt' : '';

		if ( ! isset( $assets_list['et_jquery_magnific_popup'] ) ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
			);
		}

		if ( ! isset( $assets_list['et_pb_overlay'] ) ) {
			$assets_list['et_pb_overlay'] = array(
				'css' => "{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
			);
		}

		// GlitchText.
		if ( ! isset( $assets_list['dsm_glitch_text'] ) ) {
			$assets_list['dsm_glitch_text'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'GlitchText/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_GlitchText();
