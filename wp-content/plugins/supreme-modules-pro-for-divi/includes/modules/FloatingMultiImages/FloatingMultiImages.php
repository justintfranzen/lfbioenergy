<?php

class DSM_FloatingMultiImages extends ET_Builder_Module {

	public $slug       = 'dsm_floating_multi_images';
	public $vb_support = 'on';
	public $child_slug = 'dsm_floating_multi_images_child';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Floating Multi Images', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'        => false,
			'text'         => false,
			'button'       => false,
			'link_options' => false,
		);
	}

	public function get_fields() {
		return array(
			'floating_height' => array(
				'label'            => esc_html__( 'Height', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'width',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'default'          => '360px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'range_settings'   => array(
					'min'  => '1',
					'max'  => '1200',
					'step' => '1',
				),
				'responsive'       => true,
			),
			'floating_effect' => array(
				'label'           => esc_html__( 'Floating Effect', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				'default'         => 'up-down',
				'options'         => array(
					'up-down'    => esc_html__( 'Up Down', 'dsm-supreme-modules-pro-for-divi' ),
					'left-right' => esc_html__( 'Left Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'animation',
			),
			'floating_delay'  => array(
				'label'            => esc_html__( 'Image Animation Delay Interval (in ms)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '0ms',
				'default_on_front' => '0ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '5000',
					'step' => '1',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'animation',
			),
			'floating_speed'  => array(
				'label'            => esc_html__( 'Animation Speed (in ms)', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'configuration',
				'default'          => '5000ms',
				'default_on_front' => '5000ms',
				'default_unit'     => 'ms',
				'range_settings'   => array(
					'min'  => '0',
					'max'  => '8000',
					'step' => '1',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'animation',
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$floating_height             = $this->props['floating_height'];
		$floating_height_tablet      = $this->props['floating_height_tablet'];
		$floating_height_phone       = $this->props['floating_height_phone'];
		$floating_height_last_edited = $this->props['floating_height_last_edited'];
		$floating_effect             = $this->props['floating_effect'];
		$floating_delay              = $this->props['floating_delay'];
		$floating_speed              = $this->props['floating_speed'];

		if ( '' !== $floating_height_tablet || '' !== $floating_height_phone || '' !== $floating_height ) {
			$floating_height_responsive_active = et_pb_get_responsive_status( $floating_height_last_edited );

			$floating_height_values = array(
				'desktop' => $floating_height,
				'tablet'  => $floating_height_responsive_active ? $floating_height_tablet : '',
				'phone'   => $floating_height_responsive_active ? $floating_height_phone : '',
			);

			et_pb_responsive_options()->generate_responsive_css( $floating_height_values, '%%order_class%% .dsm_floating_multi_images_container', 'height', $render_slug );
		}

		$floating_item_selector = '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child, %%order_class%% .dsm_floating_multi_images_child';

		if ( 'up-down' !== $floating_effect ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $floating_item_selector,
					'declaration' => sprintf(
						'animation-name: dsm-float-%1$s;',
						esc_attr( $floating_effect )
					),
				)
			);
		}

		if ( '5000ms' !== $floating_speed ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => $floating_item_selector,
					'declaration' => sprintf(
						'animation-duration: %1$s;',
						esc_html( $floating_speed )
					),
				)
			);
		}

		if ( '0ms' !== $floating_delay ) {
			$interval_delay1 = ( -5000 + -floatval( $floating_delay ) );
			$interval_delay2 = ( -7000 + -floatval( $floating_delay ) );
			$interval_delay3 = ( -9000 + -floatval( $floating_delay ) );
			$interval_delay4 = ( -11000 + -floatval( $floating_delay ) );
			$interval_delay5 = ( -13000 + -floatval( $floating_delay ) );
			$interval_delay6 = ( -15000 + -floatval( $floating_delay ) );
			$interval_delay7 = ( -17000 + -floatval( $floating_delay ) );
			$interval_delay8 = ( -19000 + -floatval( $floating_delay ) );
			$interval_delay9 = ( -21000 + -floatval( $floating_delay ) );
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child:nth-child(2), %%order_class%% .dsm_floating_multi_images_child:nth-child(2)',
					'declaration' => sprintf(
						'animation-delay: %1$sms;',
						esc_html( $interval_delay1 )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child:nth-child(3), %%order_class%% .dsm_floating_multi_images_child:nth-child(3)',
					'declaration' => sprintf(
						'animation-delay: %1$sms;',
						esc_html( $interval_delay2 )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child:nth-child(4), %%order_class%% .dsm_floating_multi_images_child:nth-child(4)',
					'declaration' => sprintf(
						'animation-delay: %1$sms;',
						esc_html( $interval_delay3 )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child:nth-child(5), %%order_class%% .dsm_floating_multi_images_child:nth-child(5)',
					'declaration' => sprintf(
						'animation-delay: %1$sms;',
						esc_html( $interval_delay4 )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child:nth-child(6), %%order_class%% .dsm_floating_multi_images_child:nth-child(6)',
					'declaration' => sprintf(
						'animation-delay: %1$sms;',
						esc_html( $interval_delay5 )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child:nth-child(7), %%order_class%% .dsm_floating_multi_images_child:nth-child(7)',
					'declaration' => sprintf(
						'animation-delay: %1$sms;',
						esc_html( $interval_delay6 )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child:nth-child(8), %%order_class%% .dsm_floating_multi_images_child:nth-child(8)',
					'declaration' => sprintf(
						'animation-delay: %1$sms;',
						esc_html( $interval_delay7 )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child:nth-child(9), %%order_class%% .dsm_floating_multi_images_child:nth-child(9)',
					'declaration' => sprintf(
						'animation-delay: %1$sms;',
						esc_html( $interval_delay8 )
					),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.et-db #et-boc .et-l %%order_class%%.et_pb_module .dsm_floating_multi_images_child:nth-child(10), %%order_class%% .dsm_floating_multi_images_child:nth-child(10)',
					'declaration' => sprintf(
						'animation-delay: %1$sms;',
						esc_html( $interval_delay9 )
					),
				)
			);
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-floating-multi-images', plugin_dir_url( __DIR__ ) . 'FloatingMultiImages/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		$output = sprintf(
			'<div class="dsm_floating_multi_images_container">%1$s</div>',
			et_core_sanitized_previously( $this->content )
		);

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

		// FloatingMultiImages.
		if ( ! isset( $assets_list['dsm_floating_multi_images'] ) ) {
			$assets_list['dsm_floating_multi_images'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'FloatingMultiImages/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_FloatingMultiImages();
