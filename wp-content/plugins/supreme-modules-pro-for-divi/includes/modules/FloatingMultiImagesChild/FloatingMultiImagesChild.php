<?php

class DSM_FloatingMultiImagesChild extends ET_Builder_Module {

	public $slug       = 'dsm_floating_multi_images_child';
	public $vb_support = 'on';
	public $type       = 'child';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com',
	);

	public function init() {
		$this->name                        = esc_html__( 'Floating Multi Images', 'dsm-supreme-modules-pro-for-divi' );
		$this->advanced_setting_title_text = esc_html__( 'Image Item', 'dsm-supreme-modules-pro-for-divi' );
		$this->settings_text               = esc_html__( 'Image Settings', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_title_var             = 'admin_title';

		// Toggle settings.
		$this->settings_modal_toggles = array(
			'general' => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'max_width'       => array(
				'css'     => array(
					'main' => '%%order_class%%, %%order_class%%.et_pb_module.dsm_floating_multi_images_child, .et-db #et-boc .et-l %%order_class%%.et_pb_module.dsm_floating_multi_images_child',
				),
				'options' => array(
					'max_width' => array(
						'default'         => '50%',
						'depends_show_if' => 'off',
					),
				),
			),
			'borders'         => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%% img',
							'border_styles' => '%%order_class%% img',
						),
					),
				),
			),
			'box_shadow'      => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%% img',
					),
				),
			),
			'fonts'           => false,
			'text'            => false,
			'button'          => false,
			'position_fields' => false,
		);
	}

	public function get_fields() {
		return array(
			'module_id'        => array(
				'label'           => esc_html__( 'CSS ID', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign a unique CSS ID to the element which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class'     => array(
				'label'           => esc_html__( 'CSS Class', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign any number of CSS Classes to the element, separated by spaces, which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'admin_title'      => array(
				'label'       => esc_html__( 'Admin Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the floating image item in the builder for easy identification.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'admin_label',
			),
			'src'              => array(
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
				'hide_metadata'      => true,
				'affects'            => array(
					'alt',
					'title_text',
				),
				'description'        => esc_html__( 'Upload your desired image, or type in the URL to the image you would like to display.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'        => 'main_content',
				'dynamic_content'    => 'image',
			),
			'alt'              => array(
				'label'           => esc_html__( 'Image Alternative Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'src',
				),
				'description'     => esc_html__( 'This defines the HTML ALT text. A short description of your image can be placed here.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'title_text'       => array(
				'label'           => esc_html__( 'Image Title Text', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'depends_show_if' => 'on',
				'depends_on'      => array(
					'src',
				),
				'description'     => esc_html__( 'This defines the HTML Title text.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'attributes',
				'dynamic_content' => 'text',
			),
			'horizontal_align' => array(
				'label'           => esc_html__( 'Horizontal Align', 'dsm-supreme-modules-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '0%',
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '-150',
					'max'  => '150',
					'step' => '1',
				),
				'responsive'      => true,
			),
			'vertical_align'   => array(
				'label'           => esc_html__( 'Vertical Align', 'dsm-supreme-modules-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'width',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '0%',
				'default_unit'    => '%',
				'range_settings'  => array(
					'min'  => '-150',
					'max'  => '150',
					'step' => '1',
				),
				'responsive'      => true,
			),
			'show_in_lightbox' => array(
				'label'            => esc_html__( 'Open in Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'off',
				'toggle_slug'      => 'link_options',
				'description'      => esc_html__( 'Here you can choose whether or not the image should open in Lightbox. Note: if you select to open the image in Lightbox, url options below will be ignored.', 'dsm-supreme-modules-pro-for-divi' ),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {
		$multi_view                         = et_pb_multi_view_options( $this );
		$src                                = $this->props['src'];
		$alt                                = $this->props['alt'];
		$title_text                         = $this->props['title_text'];
		$horizontal_align                   = $this->props['horizontal_align'];
		$horizontal_align_tablet            = $this->props['horizontal_align_tablet'];
		$horizontal_align_phone             = $this->props['horizontal_align_phone'];
		$horizontal_align_last_edited       = $this->props['horizontal_align_last_edited'];
		$horizontal_align_responsive_active = et_pb_get_responsive_status( $horizontal_align_last_edited );
		$vertical_align                     = $this->props['vertical_align'];
		$vertical_align_tablet              = $this->props['vertical_align_tablet'];
		$vertical_align_phone               = $this->props['vertical_align_phone'];
		$vertical_align_last_edited         = $this->props['vertical_align_last_edited'];
		$vertical_align_responsive_active   = et_pb_get_responsive_status( $vertical_align_last_edited );
		$show_in_lightbox                   = $this->props['show_in_lightbox'];
		// Handle svg image behaviour.
		$src_pathinfo = pathinfo( $src );
		$is_src_svg   = isset( $src_pathinfo['extension'] ) ? 'svg' === $src_pathinfo['extension'] : false;

		if ( empty( $alt ) || empty( $title_text ) ) {
			$raw_src   = et_()->array_get( $this->attrs_unprocessed, 'src' );
			$src_value = et_builder_parse_dynamic_content( $raw_src );

			if ( $src_value->is_dynamic() && $src_value->get_content() === 'post_featured_image' ) {
				// If there is no user-specified ALT attribute text, check the WP
				// Media Library entry for text that may have been added there.
				if ( empty( $alt ) ) {
					$alt = et_builder_resolve_dynamic_content( 'post_featured_image_alt_text', array(), get_the_ID(), 'display' );
				}

				// If there is no user-specified TITLE attribute text, check the WP
				// Media Library entry for text that may have been added there.
				if ( empty( $title_text ) ) {
					$title_text = et_builder_resolve_dynamic_content( 'post_featured_image_title_text', array(), get_the_ID(), 'display' );
				}
			}
		}

		// horizontal_align.
		$this->generate_styles(
			array(
				'base_attr_name'                  => 'horizontal_align',
				'selector'                        => '%%order_class%%.et_pb_module.dsm_floating_multi_images_child, .et-db #et-boc .et-l %%order_class%%.et_pb_module.dsm_floating_multi_images_child',
				'sticky_pseudo_selector_location' => 'prefix',
				'css_property'                    => 'left',
				'render_slug'                     => $render_slug,
				'type'                            => 'left',
				'important'                       => 'all',
			)
		);
		// vertical_align.
		$this->generate_styles(
			array(
				'base_attr_name'                  => 'vertical_align',
				'selector'                        => '%%order_class%%.et_pb_module.dsm_floating_multi_images_child, .et-db #et-boc .et-l %%order_class%%.et_pb_module.dsm_floating_multi_images_child',
				'sticky_pseudo_selector_location' => 'prefix',
				'css_property'                    => 'top',
				'render_slug'                     => $render_slug,
				'type'                            => 'top',
				'important'                       => 'all',
			)
		);
		/*
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%%',
				'important'   => 'all',
				'declaration' => sprintf( 'left: %1$s;', $horizontal_align ),
			)
		);

		if ( $horizontal_align_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'important'   => 'all',
					'declaration' => sprintf( 'left: %1$s;', $horizontal_align_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $horizontal_align_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'important'   => 'all',
					'declaration' => sprintf( 'left : %1$s;', $horizontal_align_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%%',
				'important'   => 'all',
				'declaration' => sprintf( 'top: %1$s;', $vertical_align ),
			)
		);

		if ( $vertical_align_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'important'   => 'all',
					'declaration' => sprintf( 'top: %1$s;', $vertical_align_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $vertical_align_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'important'   => 'all',
					'declaration' => sprintf( 'top : %1$s;', $vertical_align_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}
		*/

		// Set display block for svg image to avoid disappearing svg image.
		if ( $is_src_svg ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => 'width: 100%;',
				)
			);
		}

		$image_attrs = array(
			'src'   => '{{src}}',
			'alt'   => esc_attr( $alt ),
			'title' => esc_attr( $title_text ),
			// Module classnames.
			'class' => isset( $this->props['module_class'] ) && '' !== $this->props['module_class'] ? esc_attr( ' ' . $this->props['module_class'] ) : '',
			// Module ID.
			'id'    => isset( $this->props['module_id'] ) && '' !== $this->props['module_id'] ? esc_attr( ' id=' . $this->props['module_id'] ) : '',
		);

		$images_output = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => $image_attrs,
				'required' => 'src',
			)
		);

		if ( 'on' === $show_in_lightbox ) {
			$images_output = sprintf(
				'<a href="%1$s" class="et_pb_lightbox_image dsm-image-lightbox" data-mfp-src="%1$s">%2$s</a>',
				esc_url( $src ),
				$images_output
			);
			if ( ! wp_script_is( 'dsm-magnific-popup-image', 'enqueued' ) ) {
				wp_enqueue_script( 'dsm-magnific-popup-image' );
			}
		}

		$output = sprintf(
			'%1$s',
			$images_output
		);

		return $output;

	}
}

new DSM_FloatingMultiImagesChild();
