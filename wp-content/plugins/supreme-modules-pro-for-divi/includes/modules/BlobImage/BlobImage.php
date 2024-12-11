<?php
class DSM_BlobImage extends ET_Builder_Module {

	public $slug       = 'dsm_blob_image';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {

		$this->name      = esc_html__( 'Supreme Blob Shape Image', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Image', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay_text' => esc_html__( 'Overlay Content', 'dsm-supreme-modules-pro-for-divi' ),
					'link'         => esc_html__( 'Link', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'blob_settings'    => esc_html__( 'Blob Image Settings', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay'          => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay_text'     => array(
						'priority'          => 24,
						'sub_toggles'       => array(
							'title'       => array(
								'name' => 'Title',
							),
							'description' => array(
								'name' => 'Description',
							),
							'spacing'     => array(
								'name' => 'Spacing',
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => 'Overlay Text',
					),
					'blob_title'       => esc_html__( 'Overlay Title', 'dsm-supreme-modules-pro-for-divi' ),
					'blob_description' => esc_html__( 'Overlay Description', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_fields() {

		$fields = array();

		$fields['blob_image'] = array(
			'type'               => 'upload',
			'hide_metadata'      => true,
			'choose_text'        => esc_attr__( 'Choose an Image', 'dsm-supreme-modules-pro-for-divi' ),
			'update_text'        => esc_attr__( 'Set As Image', 'dsm-supreme-modules-pro-for-divi' ),
			'upload_button_text' => esc_attr__( 'Upload an image', 'dsm-supreme-modules-pro-for-divi' ),
			'toggle_slug'        => 'main_content',
			'dynamic_content'    => 'image',
			'affects'            => array(
				'alt',
				'title_text',
			),
		);

		$fields['alt'] = array(
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
		);

		$fields['title_text'] = array(
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
		);

		$fields['blob_shapes'] = array(
			'label'       => esc_html__( 'Blob Shapes', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'select',
			'default'     => 'image_one',
			'options'     => array(
				'image_one'       => esc_html__( 'Blob 1', 'dsm-supreme-modules-pro-for-divi' ),
				'image_two'       => esc_html__( 'Blob 2', 'dsm-supreme-modules-pro-for-divi' ),
				'image_three'     => esc_html__( 'Blob 3', 'dsm-supreme-modules-pro-for-divi' ),
				'image_four'      => esc_html__( 'Blob 4', 'dsm-supreme-modules-pro-for-divi' ),
				'image_five'      => esc_html__( 'Blob 5', 'dsm-supreme-modules-pro-for-divi' ),
				'image_six'       => esc_html__( 'Blob 6', 'dsm-supreme-modules-pro-for-divi' ),
				'image_seven'     => esc_html__( 'Blob 7', 'dsm-supreme-modules-pro-for-divi' ),
				'image_eight'     => esc_html__( 'Blob 8', 'dsm-supreme-modules-pro-for-divi' ),
				'image_nine'      => esc_html__( 'Blob 9', 'dsm-supreme-modules-pro-for-divi' ),
				'image_ten'       => esc_html__( 'Blob 10', 'dsm-supreme-modules-pro-for-divi' ),
				'image_eleven'    => esc_html__( 'Blob 11', 'dsm-supreme-modules-pro-for-divi' ),
				'image_twelve'    => esc_html__( 'Blob 12', 'dsm-supreme-modules-pro-for-divi' ),
				'image_thirdteen' => esc_html__( 'Blob 13', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug' => 'main_content',
		);

		$fields['blob_title'] = array(
			'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'toggle_slug'     => 'overlay_text',
			'mobile_options'  => true,
			'dynamic_content' => 'text',
		);

		$fields['blob_desc'] = array(
			'label'           => esc_html__( 'Description', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'textarea',
			'toggle_slug'     => 'overlay_text',
			'mobile_options'  => true,
			'dynamic_content' => 'text',
		);
		/*
		$fields['show_blob_button'] = array(
			'default'     => 'off',
			'label'       => esc_html__( 'Show Button', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'options'     => array(
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug' => 'overlay_text',
		);

		$fields['blob_button_text'] = array(
			'label'           => esc_html__( 'Button Text', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'show_if'         => array(
				'show_blob_button' => 'on',
			),
			'toggle_slug'     => 'overlay_text',
			'dynamic_content' => 'text',
		);

		$fields['blob_button_link'] = array(
			'label'           => esc_html__( 'Button Link', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'show_if'         => array(
				'show_blob_button' => 'on',
			),
			'toggle_slug'     => 'overlay_text',
			'dynamic_content' => 'url',
		);

		$fields['blob_button_link_target'] = array(
			'label'       => esc_html__( 'Link Target', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'select',
			'default'     => 'same',
			'options'     => array(
				'same' => esc_html__( 'Same Window', 'dsm-supreme-modules-pro-for-divi' ),
				'new'  => esc_html__( 'New Window', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'show_if'     => array(
				'show_blob_button' => 'on',
			),
			'toggle_slug' => 'overlay_text',
		);
		*/

		$fields['show_content_hover'] = array(
			'label'       => esc_html__( 'Show Content On Hover', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'default'     => 'off',
			'options'     => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug' => 'overlay_text',
		);

		/*
		$fields['use_lightbox'] = array(
			'label'       => esc_html__( 'Use Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'default'     => 'off',
			'options'     => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'affects'     => array(
				'url_new_window',
			),
			'toggle_slug' => 'link',
		);*/

		$fields['url'] = array(
			'label'           => esc_html__( 'Image Link URL', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'text',
			'option_category' => 'basic_option',
			'description'     => esc_html__( 'If you would like your image to be a link, input your destination URL here. No link will be created if this field is left blank.', 'dsm-supreme-modules-pro-for-divi' ),
			'toggle_slug'     => 'link',
			'dynamic_content' => 'url',
		);

		$fields['url_new_window'] = array(
			'label'            => esc_html__( 'Image Link Target', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'default_on_front' => 'off',
			'toggle_slug'      => 'link',
			'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'dsm-supreme-modules-pro-for-divi' ),
		);

		$fields['use_overlay'] = array(
			'label'       => esc_html__( 'Use Overlay', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'default'     => 'off',
			'options'     => array(
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'overlay',
		);

		$fields['use_gradient'] = array(
			'label'       => esc_html__( 'Use Gradient Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'yes_no_button',
			'default'     => 'off',
			'show_if'     => array(
				'use_overlay' => 'on',
			),
			'options'     => array(
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'overlay',
		);

		$fields['gradient_angle'] = array(
			'label'          => esc_html__( 'Gradient Angle', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'range',
			'default'        => '45',
			'unitless'       => true,
			'show_if'        => array(
				'use_overlay'  => 'on',
				'use_gradient' => 'on',
			),
			'range_settings' => array(
				'min'  => '0',
				'max'  => '360',
				'step' => '1',
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
		);

		$fields['fade_offset'] = array(
			'label'          => esc_html__( 'Fade Offset', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'range',
			'default'        => '50%',
			'show_if'        => array(
				'use_overlay'  => 'on',
				'use_gradient' => 'on',
			),
			'range_settings' => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
		);

		$fields['gradient_color_one'] = array(
			'label'          => esc_html__( 'Gradient Color 1', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'color-alpha',
			'custom_color'   => true,
			'show_if'        => array(
				'use_overlay'  => 'on',
				'use_gradient' => 'on',
			),
			'mobile_options' => true,
			'default'        => et_builder_accent_color(),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
		);

		$fields['gradient_color_one_offset'] = array(
			'label'          => esc_html__( 'Gradient Color 1 Offset', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'range',
			'default'        => '0%',
			'show_if'        => array(
				'use_overlay'  => 'on',
				'use_gradient' => 'on',
			),
			'range_settings' => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
		);

		$fields['gradient_color_two'] = array(
			'label'          => esc_html__( 'Gradient Color 2', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'color-alpha',
			'custom_color'   => true,
			'show_if'        => array(
				'use_overlay'  => 'on',
				'use_gradient' => 'on',
			),
			'mobile_options' => true,
			'default'        => et_builder_accent_color(),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
		);

		$fields['gradient_color_two_offset'] = array(
			'label'          => esc_html__( 'Gradient Color 2 Offset', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'range',
			'default'        => '100%',
			'show_if'        => array(
				'use_overlay'  => 'on',
				'use_gradient' => 'on',
			),
			'range_settings' => array(
				'min'  => '0',
				'max'  => '100',
				'step' => '1',
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
		);

		$fields['overlay_color'] = array(
			'label'          => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'color-alpha',
			'custom_color'   => true,
			'show_if'        => array(
				'use_overlay'  => 'on',
				'use_gradient' => 'off',
			),
			'mobile_options' => true,
			'default'        => et_builder_accent_color(),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'overlay',
		);

		$fields['blob_size'] = array(
			'label'          => esc_html__( 'Size', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'select',
			'default'        => 'cover',
			'mobile_options' => true,
			'options'        => array(
				'none'  => esc_html__( 'Initial', 'dsm-supreme-modules-pro-for-divi' ),
				'cover' => esc_html__( 'Cover', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'blob_settings',
		);

		$fields['blob_position'] = array(
			'label'          => esc_html__( 'Position', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'select',
			'default'        => 'center',
			'options'        => array(
				'top'    => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
				'center' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
				'right'  => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				'bottom' => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				'left'   => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'blob_settings',
		);

		$fields['image_height'] = array(
			'label'          => esc_html__( 'Blob Image Height', 'dsm-supreme-modules-pro-for-divi' ),
			'type'           => 'range',
			'default'        => '380px',
			'range_settings' => array(
				'min'  => '0',
				'max'  => '800',
				'step' => '1',
			),
			'mobile_options' => true,
			'tab_slug'       => 'advanced',
			'toggle_slug'    => 'blob_settings',
			'show_if'        => array(
				'blob_size' => 'cover',
			),
		);

		$fields['overlay_content_padding'] = array(
			'label'           => esc_html__( 'Content Padding', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'custom_padding',
			'mobile_options'  => true,
			'hover'           => 'tabs',
			'option_category' => 'layout',
			'description'     => esc_html__( 'Adjust padding to specific values, or leave blank to use the default padding.', 'dsm-supreme-modules-pro-for-divi' ),
			'tab_slug'        => 'advanced',
			'default'         => '20px|20px|20px|20px',
			'toggle_slug'     => 'overlay_text',
			'sub_toggle'      => 'spacing',
			'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
		);

		return $fields;
	}

	public function get_advanced_fields_config() {

		$advanced_fields                 = array();
		$advanced_fields['text']         = false;
		$advanced_fields['fonts']        = array();
		$advanced_fields['text_shadow']  = false;
		$advanced_fields['link_options'] = false;

		/*
		$advanced_fields['text'] = array(
			'label'                 => esc_html__( 'Overlay Text', 'dsm-supreme-modules-pro-for-divi' ),
			'default'               => 'dark',
			'use_text_orientation'  => false,
			'use_background_layout' => true,
			'tab_slug'              => 'advanced',
			'toggle_slug'           => 'text',
		);*/

		$advanced_fields['fonts']['title'] = array(
			'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm_blob_title',
			),
			'hide_text_align' => false,
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'overlay_text',
			'line_height'     => array(
				'default'        => '1em',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'text_color'      => array(
				'default' => '#ffffff',
			),
			'header_level'    => array(
				'default' => 'h3',
			),
			'text_align'      => array(
				'default' => 'center',
			),
			'sub_toggle'      => 'title',
		);

		$advanced_fields['fonts']['desc'] = array(
			'label'           => esc_html__( 'Description', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm_blob_description',
			),
			'hide_text_align' => false,
			'line_height'     => array(
				'default'        => '1.7em',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'text_color'      => array(
				'default' => '#ffffff',
			),
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'overlay_text',
			'sub_toggle'      => 'description',

		);

		$advanced_fields['borders']['blob'] = array(
			'css'          => array(
				'main' => array(
					'border_radii'  => false,
					// 'border_radii'  => '%%order_class%%',
					'border_styles' => '%%order_class%% .dsm_blob_image_wrap',
				),
			),
			'border_radii' => false,
			'tab_slug'     => 'advanced',
			'toggle_slug'  => 'blob_settings',
		);

		$advanced_fields['box_shadow']['blob'] = array(
			'css'         => array(
				'main' => '%%order_class%% .dsm_blob_image_wrap',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'blob_settings',
		);

		/*
		$advanced_fields['button']['button'] = array(
			'label'            => esc_html__( 'Button', 'dsm-supreme-modules-pro-for-divi' ),
			'use_alignment'    => true,
			'css'              => array(
				'main'      => '%%order_class%% .dsm_blob_image_button.et_pb_button',
				'alignment' => '%%order_class%% .et_pb_button_wrapper.dsm_blob_image_button_wrapper',
				'important' => true,
			),
			'button_alignment' => array(
				'default' => '#center',
			),
			'box_shadow'       => array(
				'css' => array(
					'main'      => '%%order_class%% .dsm_blob_image_button.et_pb_button',
					'important' => true,
				),
			),
			'margin_padding'   => array(
				'css' => array(
					'main'      => '%%order_class%% .dsm_blob_image_button.et_pb_button',
					'important' => 'all',
				),
			),
		);
		*/

		return $advanced_fields;
	}

	public function render( $attrs, $content, $render_slug ) {

		$this->custom_css( $render_slug );

		$multi_view         = et_pb_multi_view_options( $this );
		$blob_shapes        = $this->props['blob_shapes'];
		$blob_image         = $this->props['blob_image'];
		$alt                = $this->props['alt'];
		$title_text         = $this->props['title_text'];
		$use_overlay        = $this->props['use_overlay'];
		$url                = $this->props['url'];
		$url_new_window     = $this->props['url_new_window'];
		$show_content_hover = $this->props['show_content_hover'];
		$title_level        = $this->props['title_level'];
		$overlay_class      = 'on' === $use_overlay ? ' dsm_blob_image_overlay' : '';

		// Load up Dynamic Content (if needed) to capture Featured Image objects.
		// In this way we can process `alt` and `title` attributes defined in
		// the WP Media Library when they haven't been specified by the user in
		// Module Settings.
		if ( empty( $alt ) || empty( $title_text ) ) {
			$raw_src   = et_()->array_get( $this->attrs_unprocessed, 'blob_image' );
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

		$title = $multi_view->render_element(
			array(
				'tag'      => $title_level,
				'content'  => '{{blob_title}}',
				'attrs'    => array(
					'class' => 'dsm_blob_title',
				),
				'required' => 'blob_title',
			)
		);

		$desc = $multi_view->render_element(
			array(
				'tag'      => 'div',
				'content'  => '{{blob_desc}}',
				'attrs'    => array(
					'class' => 'dsm_blob_description',
				),
				'required' => 'blob_desc',
			)
		);

		$image_attrs = array(
			'src'   => '{{blob_image}}',
			'alt'   => esc_attr( $alt ),
			'title' => esc_attr( $title_text ),
		);

		$image_attachment_class = et_pb_media_options()->get_image_attachment_class( $this->props, 'blob_image' );

		if ( ! empty( $image_attachment_class ) ) {
			$image_attrs['class'] = esc_attr( $image_attachment_class );
			$image_attrs['class'] = 'dsm_blob_image_img';
		}

		$image_html = $multi_view->render_element(
			array(
				'tag'      => 'img',
				'attrs'    => $image_attrs,
				'required' => 'blob_image',
			)
		);

		$url_output = '' !== $url ? sprintf(
			' href="%1$s"%2$s',
			esc_url( $url ),
			( 'on' === $url_new_window ? ' target="_blank"' : '' )
		) : '';

		/*
		$show_blob_button        = $this->props['show_blob_button'];
		$blob_button_text        = $this->props['blob_button_text'];
		$blob_button_link        = $this->props['blob_button_link'];
		$blob_button_link_target = $this->props['blob_button_link_target'];

		$blob_button_rel    = $this->props['button_rel'];
		$blob_button_icon   = $this->props['button_icon'];
		$blob_button_custom = $this->props['custom_button'];

		$blob_button = $this->render_button(
			array(
				'button_classname' => array( 'dsm_blob_image_button' ),
				'button_custom'    => $blob_button_custom,
				'button_rel'       => $blob_button_rel,
				'button_text'      => $blob_button_text,
				'button_url'       => $blob_button_link,
				'custom_icon'      => $blob_button_icon,
				'url_new_window'   => $blob_button_link_target,
				'has_wrapper'      => false,
			)
		);

		$blob_button = 'on' === $show_blob_button ? sprintf(
			'<div class="et_pb_button_wrapper dsm_blob_image_button_wrapper">%1$s</div>',
			$blob_button
		) : '';
		*/

		$overlay_text = '' !== $this->props['blob_title'] || '' !== $this->props['blob_desc'] ? sprintf(
			'<div class="dsm_blob_overlay_wrapper">
				<div class="dsm_blob_overlay_text">
				%1$s
				%2$s
				</div>
			</div>',
			$title,
			$desc
		) : '';

		$output = sprintf(
			'<%5$s%6$s class="dsm_blob_image_wrap%2$s%3$s%7$s">
				%1$s
				%4$s	
			</%5$s>',
			$image_html,
			' dsm_blob_' . esc_attr( $blob_shapes ),
			$overlay_class,
			$overlay_text,
			'' !== $url ? 'a' : 'div',
			$url_output,
			'on' === $show_content_hover ? ' dsm_blob_image_content_hover' : ''
		);

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-blob-image', plugin_dir_url( __DIR__ ) . 'BlobImage/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return $output;
	}

	public function custom_css( $render_slug ) {
		$use_overlay  = $this->props['use_overlay'];
		$use_gradient = $this->props['use_gradient'];
		if ( 'on' === $use_overlay ) {
			if ( 'on' === $use_gradient ) {

				$gradient_angle                       = $this->props['gradient_angle'];
				$fade_offset                          = $this->props['fade_offset'];
				$gradient_color_one                   = $this->props['gradient_color_one'];
				$gradient_color_one_tablet            = $this->props['gradient_color_one_tablet'];
				$gradient_color_one_phone             = $this->props['gradient_color_one_phone'];
				$gradient_color_one_last_edited       = $this->props['gradient_color_one_last_edited'];
				$gradient_color_one_responsive_status = et_pb_get_responsive_status( $gradient_color_one_last_edited );
				$gradient_color_one_offset            = $this->props['gradient_color_one_offset'];
				$gradient_color_two                   = $this->props['gradient_color_two'];
				$gradient_color_two_tablet            = $this->props['gradient_color_two_tablet'];
				$gradient_color_two_phone             = $this->props['gradient_color_two_phone'];
				$gradient_color_two_last_edited       = $this->props['gradient_color_two_last_edited'];
				$gradient_color_two_responsive_status = et_pb_get_responsive_status( $gradient_color_two_last_edited );
				$gradient_color_two_offset            = $this->props['gradient_color_two_offset'];

				$gradient_bg        = sprintf(
					'linear-gradient( %1$sdeg, %2$s %3$s, %4$s, %5$s %6$s )',
					$gradient_angle,
					$gradient_color_one,
					$gradient_color_one_offset,
					$fade_offset,
					$gradient_color_two,
					$gradient_color_two_offset
				);
				$gradient_bg_tablet = sprintf(
					'linear-gradient( %1$sdeg, %2$s %3$s, %4$s, %5$s %6$s )',
					$gradient_angle,
					$gradient_color_one_tablet,
					$gradient_color_one_offset,
					$fade_offset,
					$gradient_color_two_tablet,
					$gradient_color_two_offset
				);
				$gradient_bg_phone  = sprintf(
					'linear-gradient( %1$sdeg, %2$s %3$s, %4$s, %5$s %6$s )',
					$gradient_angle,
					$gradient_color_one_phone,
					$gradient_color_one_offset,
					$fade_offset,
					$gradient_color_two_phone,
					$gradient_color_two_offset
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_blob_image_overlay',
						'declaration' => sprintf( 'background:%1$s;', $gradient_bg ),
					)
				);

				if ( $gradient_color_one_responsive_status || $gradient_color_two_responsive_status ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm_blob_image_overlay',
							'declaration' => sprintf( 'background:%1$s;', $gradient_bg_tablet ),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm_blob_image_overlay',
							'declaration' => sprintf( 'background:%1$s;', $gradient_bg_phone ),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}
			} else {
				$overlay_color                   = $this->props['overlay_color'];
				$overlay_color_tablet            = $this->props['overlay_color_tablet'];
				$overlay_color_phone             = $this->props['overlay_color_phone'];
				$overlay_color_last_edited       = $this->props['overlay_color_last_edited'];
				$overlay_color_responsive_status = et_pb_get_responsive_status( $overlay_color_last_edited );

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_blob_image_overlay',
						'declaration' => sprintf( 'background:%1$s;', $overlay_color ),
					)
				);

				if ( $overlay_color_responsive_status ) {
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm_blob_image_overlay',
							'declaration' => sprintf( 'background-color:%1$s;', $overlay_color_tablet ),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
						)
					);
					ET_Builder_Element::set_style(
						$render_slug,
						array(
							'selector'    => '%%order_class%% .dsm_blob_image_overlay',
							'declaration' => sprintf( 'background-color:%1$s;', $overlay_color_phone ),
							'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
						)
					);
				}
			}
		}

		$blob_shapes = $this->props['blob_shapes'];

		$blob_size                   = $this->props['blob_size'];
		$blob_size_tablet            = $this->props['blob_size'];
		$blob_size_phone             = $this->props['blob_size_phone'];
		$blob_size_last_edited       = $this->props['blob_size_last_edited'];
		$blob_size_responsive_status = et_pb_get_responsive_status( $blob_size_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_blob_image_img',
				'declaration' => sprintf(
					'object-fit: %1$s;',
					esc_attr( $blob_size )
				),
			)
		);

		if ( $blob_size_responsive_status ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_blob_image_img',
					'declaration' => sprintf(
						'object-fit: %1$s;',
						esc_attr( $blob_size_tablet )
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_blob_image_img',
					'declaration' => sprintf(
						'object-fit: %1$s;',
						esc_attr( $blob_size_phone )
					),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

		}

		$blob_position                   = $this->props['blob_position'];
		$blob_position_tablet            = $this->props['blob_position_tablet'];
		$blob_position_phone             = $this->props['blob_position_phone'];
		$blob_position_last_edited       = $this->props['blob_position_last_edited'];
		$blob_position_responsive_status = et_pb_get_responsive_status( $blob_position_last_edited );

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm_blob_image_img',
				'declaration' => sprintf( 'object-position: %1$s;', $blob_position ),
			)
		);

		if ( $blob_position_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_blob_image_img',
					'declaration' => sprintf( 'object-position: %1$s;', $blob_position_tablet ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $blob_position_responsive_status ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_blob_image_img',
					'declaration' => sprintf( 'object-position: %1$s;', $blob_position_phone ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'cover' === $this->props['blob_size'] ) {

			$image_height                   = $this->props['image_height'];
			$image_height_tablet            = $this->props['image_height_tablet'];
			$image_height_phone             = $this->props['image_height_phone'];
			$image_height_last_edited       = $this->props['image_height_last_edited'];
			$image_height_responsive_status = et_pb_get_responsive_status( $image_height_last_edited );

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_blob_image_wrap',
					'declaration' => sprintf( 'height: %1$s;', $image_height ),
				)
			);

			if ( $image_height_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_blob_image_wrap',
						'declaration' => sprintf( 'height: %1$s;', $image_height_tablet ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $image_height_responsive_status ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm_blob_image_wrap',
						'declaration' => sprintf( 'height: %1$s;', $image_height_phone ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		$this->apply_custom_margin_padding(
			$render_slug,
			'overlay_content_padding',
			'padding',
			'%%order_class%% .dsm_blob_overlay_text'
		);
	}

	/**
	 * Apply Margin and Padding
	 */
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

		// BlobImage.
		if ( ! isset( $assets_list['dsm_blob_image'] ) ) {
			$assets_list['dsm_blob_image'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'BlobImage/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_BlobImage();
