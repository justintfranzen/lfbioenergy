<?php

class DSM_ImageAccordionChild extends ET_Builder_Module {

	public function init() {
		$this->name                     = esc_html__( 'Image Accordion Child', 'dsm-supreme-modules-pro-for-divi' );
		$this->slug                     = 'dsm_image_accordion_child';
		$this->vb_support               = 'on';
		$this->type                     = 'child';
		$this->child_title_var          = 'admin_title';
		$this->child_title_fallback_var = 'image_accordion_title';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'content'         => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay_content' => esc_html__( 'Overlay Content', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'ia_icon'       => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
					'ia_image'      => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'ia_title'      => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'ia_desc'       => esc_html__( 'Description', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay'       => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay_title' => esc_html__( 'Overlay Content', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_fields() {

		$fields = array();

		$fields['module_id']    = array(
			'label'           => esc_html__( 'CSS ID', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'option_category' => 'configuration',
			'description'     => esc_html__( "Assign a unique CSS ID to the element which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'classes',
			'option_class'    => 'et_pb_custom_css_regular',
		);
		$fields['module_class'] = array(
			'label'           => esc_html__( 'CSS Class', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'option_category' => 'configuration',
			'description'     => esc_html__( "Assign any number of CSS Classes to the element, separated by spaces, which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'classes',
			'option_class'    => 'et_pb_custom_css_regular',
		);

		$fields['admin_title'] = array(
			'label'       => esc_html__( 'Admin Label', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'text',
			'description' => esc_html__( 'This will change the label of the Image Accordion Item in the builder for easy identification.', 'dsm-supreme-modules-pro-for-divi' ),
			'toggle_slug' => 'admin_label',
		);

		$fields['expanded_item'] = array(
			'label'       => esc_html__( 'Make Item Expanded', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'default'     => 'off',
			'options'     => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug' => 'content',
		);

		$fields['image_accordion_src'] = array(
			'type'               => 'upload',
			'hide_metadata'      => true,
			'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
			'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
			'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
			'toggle_slug'        => 'content',
			'dynamic_content'    => 'image',
		);

		$fields['image_accordion_src_notice'] = array(
			'type'            => 'warning',
			'value'           => true,
			'display_if'      => true,
			'message'         => esc_html__( 'For achieving a gradient overlay or other overlay effects, we recommend utilizing the built-in Divi background options. Please ensure that the above image is removed.', 'dsm-supreme-modules-pro-for-divi' ),
			'toggle_slug'     => 'content',
			'dynamic_content' => 'image',
		);

		$fields['use_accordion_icon'] = array(
			'label'       => esc_html__( 'Use Icon', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug' => 'content',
			'default'     => 'off',
		);

		$fields['image_accordion_icon'] = array(
			'label'       => esc_html__( 'Icon', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'select_icon',
			'class'       => array( 'et-pb-font-icon' ),
			'default'     => '1',
			'show_if'     => array(
				'use_accordion_icon' => 'on',
			),
			'toggle_slug' => 'content',
		);

		$fields['image_accordion_icon_image'] = array(
			'type'               => 'upload',
			'hide_metadata'      => true,
			'choose_text'        => esc_attr__( 'Choose an Icon Image', 'dsm-supreme-modules-pro-for-divi' ),
			'update_text'        => esc_attr__( 'Set As Icon Image', 'dsm-supreme-modules-pro-for-divi' ),
			'upload_button_text' => esc_attr__( 'Upload an Icon Image', 'dsm-supreme-modules-pro-for-divi' ),
			'show_if'            => array(
				'use_accordion_icon' => 'off',
			),
			'toggle_slug'        => 'content',
			'dynamic_content'    => 'image',
			'affects'            => array(
				'alt',
				'title_text',
			),
		);

		$fields['alt'] = array(
			'label'           => esc_html__( 'Icon mage Alt Text', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'option_category' => 'basic_option',
			'description'     => esc_html__( 'Define the HTML ALT text for your image icon here.', 'dsm-supreme-modules-pro-for-divi' ),
			'depends_show_if' => 'on',
			'depends_on'      => array(
				'image_accordion_icon_image',
			),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'attributes',
			'dynamic_content' => 'text',
		);

		$fields['title_text'] = array(
			'label'           => esc_html__( 'Icon Image Title Text', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'option_category' => 'basic_option',
			'depends_show_if' => 'on',
			'depends_on'      => array(
				'image_accordion_icon_image',
			),
			'description'     => esc_html__( 'This defines the HTML Title text.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'custom_css',
			'toggle_slug'     => 'attributes',
			'dynamic_content' => 'text',
		);

		$fields['image_width'] = array(
			'label'            => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'default'          => '100px',
			'default_unit'     => 'px',
			'default_on_front' => '100px',
			'allowed_units'    => array( 'px' ),
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '1000',
				'step' => '10',
			),
			'show_if'          => array(
				'use_accordion_icon' => 'off',
			),
			'validate_unit'    => true,
			'mobile_options'   => true,
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'ia_icon',
		);

		$fields['image_accordion_title'] = array(
			'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'toggle_slug'     => 'content',
			'mobile_options'  => true,
			'dynamic_content' => 'text',
		);

		$fields['image_accordion_desc'] = array(
			'label'           => esc_html__( 'Description', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'textarea',
			'dynamic_content' => 'text',
			'mobile_options'  => true,
			'toggle_slug'     => 'content',
		);

		$fields['show_ia_button'] = array(
			'default'     => 'off',
			'label'       => esc_html__( 'Show Button', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug' => 'content',
		);

		$fields['ia_button_text'] = array(
			'label'           => esc_html__( 'Button Text', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'show_if'         => array(
				'show_ia_button' => 'on',
			),
			'toggle_slug'     => 'content',
			'mobile_options'  => true,
			'dynamic_content' => 'text',
		);

		$fields['ia_button_link'] = array(
			'label'           => esc_html__( 'Button Link', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'show_if'         => array(
				'show_ia_button' => 'on',
			),
			'toggle_slug'     => 'content',
			'dynamic_content' => 'url',
		);

		$fields['ia_button_link_target'] = array(
			'default'          => 'off',
			'default_on_front' => true,
			'label'            => esc_html__( 'Url Opens', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'show_if'          => array(
				'show_ia_button' => 'on',
			),
			'toggle_slug'      => 'content',
			'description'      => esc_html__( 'Choose whether your link opens in a new window or not', 'dsm-supreme-modules-pro-for-divi' ),
		);

		$fields['ia_align_horizontal'] = array(
			'label'          => esc_html__( 'Horizontal Align', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'select',
			'default'        => 'center',
			'mobile_options' => true,
			'options'        => array(
				'left'   => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
				'center' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
				'right'  => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug'    => 'content',
		);

		$fields['ia_align_vertical'] = array(
			'label'          => esc_html__( 'Vertical Align', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'select',
			'default'        => 'center',
			'mobile_options' => true,
			'options'        => array(
				'top'    => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
				'center' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
				'bottom' => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug'    => 'content',
		);

		$fields['image_accordion_overlay_title'] = array(
			'label'           => esc_html__( 'Overlay Title', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'toggle_slug'     => 'overlay_content',
			'mobile_options'  => true,
			'dynamic_content' => 'text',
		);

		$fields['ia_overlay_align_horizontal'] = array(
			'label'          => esc_html__( 'Horizontal Align', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'select',
			'default'        => 'center',
			'mobile_options' => true,
			'options'        => array(
				'flex-start' => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
				'center'     => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
				'flex-end'   => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay_title',
		);

		$fields['ia_overlay_align_vertical'] = array(
			'label'          => esc_html__( 'Vertical Align', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'select',
			'default'        => 'center',
			'mobile_options' => true,
			'options'        => array(
				'flex-start' => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
				'center'     => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
				'flex-end'   => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay_title',
		);

		$fields['overlay_content_padding'] = array(
			'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
			'description'     => esc_html__( 'Here you can define a custom padding size for the Overlay Content.', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'custom_padding',
			'option_category' => 'layout',
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'overlay_title',
			'default_unit'    => 'px',
			'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'range_settings'  => array(
				'min'  => '1',
				'max'  => '80',
				'step' => '1',
			),
			'default'         => '10px|10px|10px|10px',
			'mobile_options'  => true,
			'responsive'      => true,
			'hover'           => 'tabs',
		);

		$fields['ia_icon_color'] = array(
			'label'          => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'color-alpha',
			'tab_slug'       => 'advanced',
			'default'        => '#fff',
			'mobile_options' => true,
			'show_if'        => array(
				'use_accordion_icon' => 'on',
			),
			'toggle_slug'    => 'ia_icon',
		);

		$fields['use_ia_icon_font_size'] = array(
			'label'       => esc_html__( 'Use Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'show_if'     => array(
				'use_accordion_icon' => 'on',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'ia_icon',
		);

		$fields['ia_icon_font_size'] = array(
			'label'            => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'default'          => '40px',
			'default_unit'     => 'px',
			'default_on_front' => '40px',
			'allowed_units'    => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'show_if'          => array(
				'use_accordion_icon'    => 'on',
				'use_ia_icon_font_size' => 'on',
			),
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '150',
				'step' => '1',
			),
			'validate_unit'    => true,
			'mobile_options'   => true,
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'ia_icon',
		);

		$fields['content_width'] = array(
			'label'          => esc_html__( 'Content Width', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'range',
			'default'        => '100%',
			'default_unit'   => '%',
			'range_settings' => array(
				'min'  => '1',
				'max'  => '100',
				'step' => '1',
			),
			'validate_unit'  => true,
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'width',
		);

		$fields['overlay_color'] = array(
			'label'          => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'color-alpha',
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
			'hover'          => 'tabs',
		);

		return $fields;
	}

	public function get_advanced_fields_config() {

		$advanced_fields                = array();
		$advanced_fields['text']        = false;
		$advanced_fields['text_shadow'] = false;
		$advanced_fields['fonts']       = array();

		$advanced_fields['margin_padding'] = array(
			'css' => array(
				'margin'    => '%%order_class%%',
				'padding'   => '%%order_class%%>div',
				'important' => 'all',
			),
		);

		$advanced_fields['borders']['default'] = array(
			'css' => array(
				'main' => array(
					'border_radii'  => '%%order_class%%.dsm_image_accordion_child',
					'border_styles' => '%%order_class%%.dsm_image_accordion_child',
				),
			),
		);

		$advanced_fields['box_shadow']['default'] = array(
			'css' => array(
				'main' => '%%order_class%%',
			),
		);

		$advanced_fields['fonts']['title'] = array(
			'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm_image_accordion_title',
			),
			'hide_text_align' => true,
			'toggle_slug'     => 'ia_title',
			'line_height'     => array(
				'default'        => '1em',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'header_level'    => array(
				'default' => 'h3',
			),
			'important'       => 'all',
		);

		$advanced_fields['fonts']['desc'] = array(
			'label'           => esc_html__( 'Description', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm_image_accordion_description',
			),
			'hide_text_align' => true,
			'line_height'     => array(
				'default'        => '1em',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'toggle_slug'     => 'ia_desc',
		);

		$advanced_fields['fonts']['overlay_title'] = array(
			'label'           => esc_html__( 'Overlay Title', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm_image_accordion_overylay_content .dsm_image_accordion_overylay_title',
			),
			'hide_text_align' => true,
			'toggle_slug'     => 'overlay_title',
			'line_height'     => array(
				'default'        => '1em',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'important'       => 'all',
		);

		$advanced_fields['borders']['image'] = array(
			'label_prefix'    => esc_html__( 'Icon Image', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .dsm_image_accordion_img',
					'border_styles' => '%%order_class%% .dsm_image_accordion_img',
				),
			),
			'depends_on'      => array( 'use_accordion_icon' ),
			'depends_show_if' => 'off',
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'ia_image',
		);

		$advanced_fields['box_shadow']['image'] = array(
			'label'       => esc_html__( 'Icon Image', 'dsm-supreme-modules-pro-for-divi' ),
			'css'         => array(
				'main' => '%%order_class%% .dsm_image_accordion_img',
				''     => 'inset',
			),
			'show_if'     => array(
				'use_accordion_icon' => 'off',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'ia_image',
		);

		$advanced_fields['button']['button'] = array(
			'label'          => esc_html__( 'Button', 'dsm-supreme-modules-pro-for-divi' ),
			'use_alignment'  => true,
			'css'            => array(
				'main'      => '%%order_class%% .dsm_ia_button.et_pb_button',
				'alignment' => '%%order_class%% .dsm_image_accordion_child_content .et_pb_button_wrapper.dsm_image_accordion_button_wrapper',
				'important' => true,
			),
			'box_shadow'     => array(
				'css' => array(
					'main'      => '%%order_class%% .dsm_ia_button.et_pb_button',
					'important' => true,
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%% .dsm_ia_button.et_pb_button',
					'important' => 'all',
				),
			),
		);

		return $advanced_fields;
	}

	public function render( $attrs, $content, $render_slug ) {
		$multi_view                          = et_pb_multi_view_options( $this );
		$use_accordion_icon                  = $this->props['use_accordion_icon'];
		$image_accordion_icon                = et_pb_process_font_icon( $this->props['image_accordion_icon'] );
		$image_accordion_icon_image          = $this->props['image_accordion_icon_image'];
		$alt                                 = $this->props['alt'];
		$title_text                          = $this->props['title_text'];
		$image_accordion_overlay_title       = $this->props['image_accordion_overlay_title'];
		$ia_overlay_align_vertical           = $this->props['ia_overlay_align_vertical'];
		$ia_overlay_align_horizontal         = $this->props['ia_overlay_align_horizontal'];
		$overlay_content_padding             = $this->props['overlay_content_padding'];
		$overlay_content_padding_hover       = $this->get_hover_value( 'overlay_content_padding' );
		$overlay_content_padding_values      = et_pb_responsive_options()->get_property_values( $this->props, 'overlay_content_padding' );
		$overlay_content_padding_tablet      = isset( $overlay_content_padding_values['tablet'] ) ? $overlay_content_padding_values['tablet'] : '';
		$overlay_content_padding_phone       = isset( $overlay_content_padding_values['phone'] ) ? $overlay_content_padding_values['phone'] : '';
		$overlay_content_padding_last_edited = $this->props['overlay_content_padding_last_edited'];

		$this->apply_custom_margin_padding(
			$render_slug,
			'overlay_content_padding',
			'padding',
			'%%order_class%%.dsm_image_accordion_child .dsm_image_accordion_overylay_content .dsm_image_accordion_overylay_content',
			'important'
		);

		$this->apply_css( $render_slug );

		$image_accordion_icon = '' !== $image_accordion_icon ? sprintf(
			'<div class="dsm_image_accordion_image_icon_wrapper">
                <span class="et-pb-icon et-pb-font-icon dsm_image_accordion_icon">
                    %1$s
                </span>
            </div>',
			esc_attr( $image_accordion_icon )
		) : '';

		// Load up Dynamic Content (if needed) to capture Featured Image objects.
		// In this way we can process `alt` and `title` attributes defined in
		// the WP Media Library when they haven't been specified by the user in
		// Module Settings.
		/*
		Removed in 4.9.97.4 due to duplicates */
		/*
		if ( empty( $alt ) || empty( $title_text ) ) {
			$raw_src   = et_()->array_get( $this->attrs_unprocessed, 'image_accordion_icon_image' );
			$src_value = et_builder_parse_dynamic_content( $raw_src );

			if ( empty( $alt ) ) {
				$alt = get_post_meta( attachment_url_to_postid( $raw_src ), '_wp_attachment_image_alt', true );
			}

				// If there is no user-specified TITLE attribute text, check the WP
				// Media Library entry for text that may have been added there.
			if ( empty( $title_text ) ) {
				$title_text = get_the_title( attachment_url_to_postid( $raw_src ) );
			}
		}*/

		$icon_image_attrs = array(
			'src'   => '{{image_accordion_icon_image}}',
			'alt'   => esc_attr( $alt ),
			'title' => esc_attr( $title_text ),
			'class' => 'dsm_image_accordion_img',
		);

		$icon_image = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => $icon_image_attrs,
				'required' => 'image_accordion_icon_image',
			)
		);

		$image_accordion_icon_image = '' !== $image_accordion_icon_image ? sprintf(
			'<div class="dsm_image_accordion_image_icon_wrapper">%1$s</div>',
			$icon_image
		) : '';

		$ia_icon = 'on' === $use_accordion_icon ? $image_accordion_icon : $image_accordion_icon_image;

		if ( 'on' === $use_accordion_icon ) {
			// Font Icon Style.
			$this->generate_styles(
				array(
					'hover'          => false,
					'utility_arg'    => 'icon_font_family',
					'render_slug'    => $render_slug,
					'base_attr_name' => 'image_accordion_icon',
					'important'      => true,
					'selector'       => '%%order_class%% .et-pb-icon.dsm_image_accordion_icon',
					'processor'      => array(
						'ET_Builder_Module_Helper_Style_Processor',
						'process_extended_icon',
					),
				)
			);
		}

		$ia_title       = $this->_esc_attr( 'image_accordion_title', 'full' );
		$ia_title_level = $this->props['title_level'] ? $this->props['title_level'] : 'h3';
		$ia_title       = $multi_view->render_element(
			array(
				'tag'      => $ia_title_level,
				'content'  => '{{image_accordion_title}}',
				'attrs'    => array(
					'class' => 'dsm_image_accordion_title',
				),
				'required' => 'image_accordion_title',
			)
		);

		$ia_description = $multi_view->render_element(
			array(
				'tag'      => 'div',
				'content'  => '{{image_accordion_desc}}',
				'attrs'    => array(
					'class' => 'dsm_image_accordion_description',
				),
				'required' => 'image_accordion_desc',
			)
		);

		$dsm_image_accordion_overlay_title = $multi_view->render_element(
			array(
				'tag'      => 'div',
				'content'  => '{{image_accordion_overlay_title}}',
				'attrs'    => array(
					'class' => 'dsm_image_accordion_overylay_title',
				),
				'required' => 'image_accordion_overlay_title',
			)
		);

		$image_accordion_overlay_title_render = '' !== $dsm_image_accordion_overlay_title ? sprintf(
			'<div class="dsm_image_accordion_overylay_content">
                    %1$s
            </div>',
			$dsm_image_accordion_overlay_title
		) : '';

		$this->generate_styles(
			array(
				'base_attr_name' => 'ia_overlay_align_horizontal',
				'selector'       => '.dsm_image_accordion %%order_class%% .dsm_image_accordion_overylay_content',
				'css_property'   => 'justify-content',
				'render_slug'    => $render_slug,
				'sticky'         => false,
				'responsive'     => true,
				'hover'          => false,
				'important'      => true,
			)
		);
		$this->generate_styles(
			array(
				'base_attr_name' => 'ia_overlay_align_vertical',
				'selector'       => '.dsm_image_accordion %%order_class%% .dsm_image_accordion_overylay_content',
				'css_property'   => 'align-items',
				'render_slug'    => $render_slug,
				'sticky'         => false,
				'responsive'     => true,
				'hover'          => false,
				'important'      => true,
			)
		);

		$align_horizontal_tablet = '';
		$align_horizontal_phone  = '';

		$ia_align_horizontal_last_edited       = $this->props['ia_align_horizontal_last_edited'];
		$ia_align_horizontal_responsive_status = et_pb_get_responsive_status( $ia_align_horizontal_last_edited );

		if ( $ia_align_horizontal_responsive_status ) {
			$align_horizontal_tablet = 'dsm_image_accordion_horizontal_tablet_' . $this->props['ia_align_horizontal_phone'];
			$align_horizontal_phone  = 'dsm_image_accordion_horizontal_phone_' . $this->props['ia_align_horizontal_phone'];
		}

		$align_vertical_tablet = '';
		$align_vertical_phone  = '';

		$ia_align_vertical_last_edited       = $this->props['ia_align_vertical_last_edited'];
		$ia_align_vertical_responsive_status = et_pb_get_responsive_status( $ia_align_vertical_last_edited );

		if ( $ia_align_vertical_responsive_status ) {
			$align_vertical_tablet = 'dsm_image_accordion_vertical_tablet_' . $this->props['ia_align_vertical_phone'];
			$align_vertical_phone  = 'dsm_image_accordion_vertical_phone_' . $this->props['ia_align_vertical_phone'];
		}

		$show_ia_button        = $this->props['show_ia_button'];
		$ia_button_text        = $this->props['ia_button_text'];
		$ia_button_link        = $this->props['ia_button_link'];
		$ia_button_link_target = $this->props['ia_button_link_target'];

		$ia_button_rel    = $this->props['button_rel'];
		$ia_button_icon   = $this->props['button_icon'];
		$ia_button_custom = $this->props['custom_button'];

		$ia_button = $this->render_button(
			array(
				'button_classname' => array( 'dsm_ia_button' ),
				'button_custom'    => $ia_button_custom,
				'button_rel'       => $ia_button_rel,
				'button_text'      => $ia_button_text,
				'button_url'       => $ia_button_link,
				'custom_icon'      => $ia_button_icon,
				'url_new_window'   => $ia_button_link_target,
				'has_wrapper'      => false,
				'multi_view_data'  => $multi_view->render_attrs(
					array(
						'content' => '{{ia_button_text}}',
					)
				),
			)
		);

		$ia_button = 'on' === $show_ia_button ? sprintf(
			'<div class="et_pb_button_wrapper dsm_image_accordion_button_wrapper">%1$s</div>',
			$ia_button
		) : '';

		$this->module_id( true );

		add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10 );

		$order_class = self::get_module_order_class( $render_slug );
		$output      = sprintf(
			'<div %14$s class="et_pb_module dsm_image_accordion_child %9$s %6$s %7$s %8$s %10$s %11$s %12$s %13$s %15$s"> 
			   <div class="et_pb_module_inner"> 
					<div class="dsm_image_accordion_child_content">
						%1$s
						%2$s
						%3$s
						%4$s
					</div>
					%5$s
				</div>
			</div>',
			$ia_icon,
			$ia_title,
			$ia_description,
			$ia_button,
			$image_accordion_overlay_title_render,
			$this->props['ia_align_horizontal'] ? sprintf( 'dsm_image_accordion_horizontal_%1$s', $this->props['ia_align_horizontal'] ) : '',
			$this->props['ia_align_vertical'] ? sprintf( 'dsm_image_accordion_vertical_%1$s', $this->props['ia_align_vertical'] ) : '',
			'on' === $this->props['expanded_item'] ? 'dsm_image_accordion_active_item' : '',
			$order_class,
			$align_horizontal_tablet,
			$align_horizontal_phone,
			$align_vertical_tablet,
			$align_vertical_phone,
			'' !== $this->props['module_id'] ? sprintf( 'id="%1$s" ', $this->props['module_id'] ) : '',
			$this->props['module_class']
		);

		return $output;
	}

	public function apply_css( $render_slug ) {
		$this->image_width_css( $render_slug );
		$this->content_width_css( $render_slug );

		$ia_icon_color         = $this->props['ia_icon_color'];
		$use_ia_icon_font_size = $this->props['use_ia_icon_font_size'];

		if ( 'on' === $use_ia_icon_font_size ) {
			// Font Icon Size Style.
			$this->generate_styles(
				array(
					'base_attr_name' => 'ia_icon_font_size',
					'selector'       => '%%order_class%% .et-pb-icon.dsm_image_accordion_icon',
					'css_property'   => 'font-size',
					'render_slug'    => $render_slug,
					'type'           => 'range',
					'hover_selector' => $this->add_hover_to_order_class( '%%order_class%% .et-pb-icon.dsm_image_accordion_icon' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_image_accordion_icon',
				'declaration' => "color: {$ia_icon_color};",
			)
		);

		$ia_icon_color_last_edited       = $this->props['ia_icon_color_last_edited'];
		$ia_icon_color_responsive_status = et_pb_get_responsive_status( $ia_icon_color_last_edited );

		if ( $ia_icon_color_responsive_status ) {

			$ia_icon_color_tablet = $this->props['ia_icon_color_tablet'];
			$ia_icon_color_phone  = $this->props['ia_icon_color_phone'];

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_accordion_icon',
					'declaration' => "color: {$ia_icon_color_tablet};",
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_accordion_icon',
					'declaration' => "color: {$ia_icon_color_phone};",
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( '' !== $this->props['image_accordion_src'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%',
					'declaration' => "background-image: url({$this->props['image_accordion_src']});",
				)
			);
		}

		if ( '' !== $this->props['overlay_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_image_accordion %%order_class%%>div.et_pb_module_inner:before',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['overlay_color']
					),
				)
			);
		}

		$overlay_color_last_edited       = $this->props['overlay_color_last_edited'];
		$overlay_color_responsive_status = et_pb_get_responsive_status( $overlay_color_last_edited );
		if ( $overlay_color_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_image_accordion %%order_class%%>div.et_pb_module_inner:before',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['overlay_color_tablet']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '.dsm_image_accordion %%order_class%%>div.et_pb_module_inner:before',
					'declaration' => sprintf(
						'background: %1$s;',
						$this->props['overlay_color_phone']
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

		}

		if ( isset( $this->props['overlay_color__hover'] ) ) {

			$overlay_color_hover = explode( '|', $this->props['overlay_color__hover'] );

			if ( isset( $overlay_color_hover ) ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dsm_image_accordion %%order_class%%.dsm_image_accordion_active_item:hover>div.et_pb_module_inner:before',
						'declaration' => sprintf(
							'background: %1$s;',
							$this->props['overlay_color__hover']
						),
					)
				);
			}
		}
	}

	private function image_width_css( $render_slug ) {
		$image_width        = $this->props['image_width'];
		$image_width_tablet = $this->props['image_width_tablet'];
		$image_width_phone  = $this->props['image_width_phone'];

		$image_width_last_edited       = $this->props['image_width_last_edited'];
		$image_width_responsive_status = et_pb_get_responsive_status( $image_width_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_image_accordion_img',
				'declaration' => sprintf( 'width: %1$s;', $image_width ),
			)
		);

		if ( $image_width_responsive_status ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_accordion_img',
					'declaration' => sprintf( 'width: %1$s;', $image_width_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_accordion_img',
					'declaration' => sprintf( 'width: %1$s;', $image_width_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

		}
	}

	private function content_width_css( $render_slug ) {
		$content_width        = $this->props['content_width'];
		$content_width_tablet = $this->props['content_width_tablet'];
		$content_width_phone  = $this->props['content_width_phone'];

		$content_width_last_edited       = $this->props['content_width_last_edited'];
		$content_width_responsive_status = et_pb_get_responsive_status( $content_width_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_image_accordion_child_content',
				'declaration' => sprintf( 'max-width: %1$s;', $content_width ),
			)
		);

		if ( $content_width_responsive_status ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_accordion_child_content',
					'declaration' => sprintf( 'max-width: %1$s;', $content_width_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_image_accordion_child_content',
					'declaration' => sprintf( 'max-width: %1$s;', $content_width_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

		}
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
	public function dsm_load_required_divi_assets( $assets_list ) {
		if ( isset( $assets_list['et_icons_all'] ) && isset( $assets_list['et_icons_fa'] ) ) {
			return $assets_list;
		}

		$assets_prefix = et_get_dynamic_assets_path();

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

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
		return $output;
	}

	/**
	 * Filter multi view value.
	 *
	 * @since 3.27.1
	 *
	 * @see ET_Builder_Module_Helper_MultiViewOptions::filter_value
	 *
	 * @param mixed $raw_value Props raw value.
	 * @param array $args {
	 *     Context data.
	 *
	 *     @type string $context      Context param: content, attrs, visibility, classes.
	 *     @type string $name         Module options props name.
	 *     @type string $mode         Current data mode: desktop, hover, tablet, phone.
	 *     @type string $attr_key     Attribute key for attrs context data. Example: src, class, etc.
	 *     @type string $attr_sub_key Attribute sub key that availabe when passing attrs value as array such as styes. Example: padding-top, margin-botton, etc.
	 * }
	 *
	 * @return mixed
	 */
	public function multi_view_filter_value( $raw_value, $args ) {

		$name = isset( $args['name'] ) ? $args['name'] : '';

		if ( $raw_value && 'image_accordion_icon' === $name ) {
			return et_pb_get_extended_font_icon_value( $raw_value, true );
		}
		return $raw_value;
	}
}

new DSM_ImageAccordionChild();
