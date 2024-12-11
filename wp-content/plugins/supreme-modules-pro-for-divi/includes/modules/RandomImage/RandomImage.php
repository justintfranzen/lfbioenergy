<?php

class DSM_Random_Image extends ET_Builder_Module {
	public $slug       = 'dsm_random_image';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name             = esc_html__( 'Supreme Random Image', 'dsm-supreme-modules-pro-for-divi' );
		$this->plural           = esc_html__( 'Supreme Random Images', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path        = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->main_css_element = '%%order_class%%';
		$this->vb_support       = 'on';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Images', 'dsm-supreme-modules-pro-for-divi' ),
					'link'         => esc_html__( 'Link', 'dsm-supreme-modules-pro-for-divi' ),
					'lightbox'     => esc_html__( 'Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'overlay' => et_builder_i18n( 'Overlay' ),
					'image'   => array(
						'title' => et_builder_i18n( 'Image' ),
					),
				),
			),
			'custom_css' => array(
				'toggles' => array(
					'animation' => array(
						'title'    => esc_html__( 'Animation', 'dsm-supreme-modules-pro-for-divi' ),
						'priority' => 90,
					),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .et_pb_image_wrap",
							'border_styles' => "{$this->main_css_element} .et_pb_image_wrap",
						),
					),
				),
				'image'   => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => "{$this->main_css_element} .et_pb_image_wrap",
							'border_styles' => "{$this->main_css_element} .et_pb_image_wrap",
						),
					),
					'label_prefix' => et_builder_i18n( 'Image' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'image',

				),
			),
			'box_shadow'     => array(
				'image' => array(
					'label'             => esc_html__( 'Image Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category'   => 'layout',
					'tab_slug'          => 'advanced',
					'toggle_slug'       => 'image',

					'css'               => array(
						'main'    => '%%order_class%% .et_pb_image_wrap',
						'overlay' => 'inset',
					),
					'default_on_fronts' => array(
						'color'    => '',
						'position' => '',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'important' => array( 'custom_margin' ), // needed to overwrite last module margin-bottom styling.
				),
			),
			'max_width'      => array(
				'options' => array(
					'width'     => array(
						'depends_show_if' => 'off',
					),
					'max_width' => array(
						'depends_show_if' => 'off',
					),
				),
			),
			'height'         => array(
				'css' => array(
					'main' => '%%order_class%% .et_pb_image_wrap img',
				),
			),
			'filters'        => array(
				'css'                  => array(
					'main' => '%%order_class%%',
				),
				'child_filters_target' => array(
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'image',
				),
			),
			'image'          => array(
				'css' => array(
					'main' => '%%order_class%% .et_pb_image_wrap img',
				),
			),
			'link_options'   => false,
			'button'         => false,
			'text'           => false,
		);
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		$fields          = array(
			'gallery_ids'         => array(
				'label'            => esc_html__( 'Images', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( 'Choose the images that you would like to appear in the image gallery.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'upload-gallery',
				'computed_affects' => array(
					'__gallery',
				),
				'option_category'  => 'basic_option',
				'toggle_slug'      => 'main_content',
			),
			'sizes'               => array(
				'label'            => esc_html__( 'Image Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'toggle_slug'      => 'main_content',
				'default'          => 'full',
				'default_on_front' => 'full',
				'computed_affects' => array(
					'__gallery',
				),
				'options'          => self::dsm_get_all_image_sizes(),
			),
			'use_image_link_url'  => array(
				'label'            => esc_html__( 'Use Image Link URL', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => et_builder_i18n( 'No' ),
					'on'  => et_builder_i18n( 'Yes' ),
				),
				'default_on_front' => 'off',
				'affects'          => array(
					'url_new_window',
				),
				'computed_affects' => array(
					'__gallery',
				),
				'toggle_slug'      => 'link',
				'description'      => esc_html__( 'You have the option to decide whether the image should be a link. Please note that if you enter a link in the Media settings, that link will be used. Otherwise, the image URL link will be utilized instead.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'url_new_window'      => array(
				'label'            => esc_html__( 'Image Link Target', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => esc_html__( 'In The Same Window', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'In The New Tab', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'show_if'          => array(
					'use_image_link_url' => 'on',
				),
				'computed_affects' => array(
					'__gallery',
				),
				'toggle_slug'      => 'link',
				'description'      => esc_html__( 'Here you can choose whether or not your link opens in a new window', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'show_in_lightbox'    => array(
				'label'            => esc_html__( 'Open in Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'off' => et_builder_i18n( 'No' ),
					'on'  => et_builder_i18n( 'Yes' ),
				),
				'default_on_front' => 'off',
				'show_if_not'      => array(
					'use_image_link_url' => 'on',
				),
				'computed_affects' => array(
					'__gallery',
				),
				'toggle_slug'      => 'lightbox',
				'description'      => esc_html__( 'Here you can choose whether or not the image should open in Lightbox. Note: if you select to open the image in Lightbox, url options below will be ignored.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'lightbox_img_sizes'  => array(
				'label'            => esc_html__( 'Image Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'toggle_slug'      => 'lightbox',
				'default'          => 'full',
				'default_on_front' => 'full',
				'computed_affects' => array(
					'__gallery',
				),
				'options'          => self::dsm_get_all_image_sizes(),
				'show_if_not'      => array(
					'use_image_link_url' => 'on',
				),
				'show_if'          => array(
					'show_in_lightbox' => 'on',
				),
			),
			'force_fullwidth'     => array(
				'label'            => esc_html__( 'Force Fullwidth', 'dsm-supreme-modules-pro-for-divi' ),
				'description'      => esc_html__( "When enabled, this will force your image to extend 100% of the width of the column it's in.", 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => et_builder_i18n( 'No' ),
					'on'  => et_builder_i18n( 'Yes' ),
				),
				'default_on_front' => 'off',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'width',
				'affects'          => array(
					'max_width',
					'width',
				),
			),
			'use_overlay'         => array(
				'label'            => esc_html__( 'Image Overlay', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => et_builder_i18n( 'Off' ),
					'on'  => et_builder_i18n( 'On' ),
				),
				'default_on_front' => 'off',
				'affects'          => array(
					'overlay_on_hover',
					'overlay_icon_color',
					'hover_overlay_color',
					'hover_icon',
				),
				'computed_affects' => array(
					'__gallery',
				),
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'overlay',
				'description'      => esc_html__( 'If enabled, an overlay color and icon will be displayed when a visitors hovers over the image', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'overlay_on_hover'    => array(
				'label'            => esc_html__( 'Show Overlay On Hover', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'layout',
				'options'          => array(
					'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'depends_show_if'  => 'on',
				'default'          => 'on',
				'default_on_front' => 'on',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'overlay',
				'computed_affects' => array(
					'__gallery',
				),
				'description'      => esc_html__( 'If enabled, overlay will only show on hover.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'overlay_icon_color'  => array(
				'label'           => esc_html__( 'Overlay Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay icon', 'dsm-supreme-modules-pro-for-divi' ),
				'mobile_options'  => true,
				'sticky'          => true,
			),
			'hover_overlay_color' => array(
				'label'           => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'color-alpha',
				'custom_color'    => true,
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom color for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
				'mobile_options'  => true,
				'sticky'          => true,
			),
			'hover_icon'          => array(
				'label'           => esc_html__( 'Icon Picker', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select_icon',
				'option_category' => 'configuration',
				'class'           => array( 'et-pb-font-icon' ),
				'depends_show_if' => 'on',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'overlay',
				'description'     => esc_html__( 'Here you can define a custom icon for the overlay', 'dsm-supreme-modules-pro-for-divi' ),
				'mobile_options'  => true,
				'sticky'          => true,
			),
			'__gallery'           => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DSM_Random_Image', 'get_gallery' ),
				'computed_depends_on' => array(
					'gallery_ids',
					'sizes',
					'use_image_link_url',
					'url_new_window',
					'lightbox_img_sizes',
					'show_in_lightbox',
					'use_overlay',
					'overlay_on_hover',
					'hover_icon',
				),
			),
		);

		return $fields;
	}

	/**
	 * Get attachment data for random image module
	 *
	 * @param array $args {
	 *     Gallery Options
	 *
	 *     @type array  $gallery_ids     Attachment Ids of images to be included in gallery.
	 *     @type string $gallery_orderby `orderby` arg for query. Optional.
	 * }
	 * @param array $conditional_tags
	 * @param array $current_page
	 *
	 * @return array Attachments data
	 */
	static function get_gallery( $args = array(), $conditional_tags = array(), $current_page = array() ) {
		$attachments = array();

		$defaults = array(
			'gallery_ids'        => array(),
			'sizes'              => 'full',
			'use_image_link_url' => 'off',
			'url_new_window'     => 'off',
			'show_in_lightbox'   => 'off',
			'lightbox_img_sizes' => 'full',
			'use_overlay'        => 'off',
			'overlay_on_hover'   => 'on',
			'hover_icon'         => '',
			'hover_icon_tablet'  => '',
			'hover_icon_phone'   => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$attachments_args = array(
			'include'        => $args['gallery_ids'],
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => 'ASC',
			'orderby'        => 'post__in',
		);

		// Woo Gallery module shouldn't display placeholder image when no Gallery image is
		// available.
		// @see https://github.com/elegantthemes/submodule-builder/pull/6706#issuecomment-542275647.
		if ( isset( $args['attachment_id'] ) ) {
			$attachments_args['attachment_id'] = $args['attachment_id'];
		}

		$_attachments = get_posts( $attachments_args );

		foreach ( $_attachments as $key => $val ) {
			$attachments[ $key ]                 = $_attachments[ $key ];
			$attachments[ $key ]->image_alt_text = get_post_meta( $val->ID, '_wp_attachment_image_alt', true );
			$attachments[ $key ]->image_src_full = wp_get_attachment_image_src( $val->ID, $args['sizes'] );
		}

		$random_images = array();
		foreach ( $attachments as $id => $attachment ) {

			$random_images[] = array(
				'id' => $attachment->ID,
			);

			$image = $random_images[ array_rand( $random_images, 1 ) ];
		}

		$dsm_upload_gallery_custom_link_url = get_post_meta( $image['id'], 'dsm_upload_gallery_custom_link_url', true );
		$dsm_upload_gallery_link_url_target = get_post_meta( $image['id'], 'dsm_upload_gallery_link_url_target', true );
		// $dsm_upload_gallery_link_as_download_file = get_post_meta( $image['id'], 'dsm_upload_gallery_link_as_download_file', true );

		$overlay_output = ET_Builder_Module_Helper_Overlay::render(
			array(
				'icon'        => $args['hover_icon'],
				'icon_tablet' => $args['hover_icon_tablet'],
				'icon_phone'  => $args['hover_icon_phone'],
			)
		);
		$image_output   = sprintf(
			'<span class="et_pb_image_wrap%3$s%4$s%5$s">%1$s%2$s</span>',
			wp_get_attachment_image(
				$image['id'],
				$args['sizes'],
				false,
				array(
					'class' => 'wp-image-' . esc_attr( $image['id'] ),
					'title' => get_the_title( $image['id'] ),
				)
			),
			'on' === $args['use_overlay'] ? $overlay_output : '',
			'on' === $args['use_overlay'] ? esc_attr( ' et_pb_has_overlay' ) : '',
			'off' === $args['overlay_on_hover'] ? esc_attr( ' dsm_random_image_overlay_off' ) : '',
			isset( pathinfo( wp_get_attachment_image_src( $image['id'], $args['sizes'] )[0] )['extension'] ) && 'svg' === pathinfo( wp_get_attachment_image_src( $image['id'], $args['sizes'] )[0] )['extension'] ? esc_attr( ' dsm_random_image_svg' ) : false
		);
		$url_new_window = 'on' === $args['url_new_window'] ? '_blank' : '_self';

		if ( 'on' === $args['use_image_link_url'] || ( isset( $dsm_upload_gallery_custom_link_url ) && '' !== $dsm_upload_gallery_custom_link_url ) ) {
			$output = sprintf(
				'<a href="%1$s" target="%3$s" title="%2$s">
				%4$s
			</a>',
				isset( $dsm_upload_gallery_custom_link_url ) && '' !== $dsm_upload_gallery_custom_link_url ? esc_url( $dsm_upload_gallery_custom_link_url ) : esc_url( wp_get_attachment_image_src( $image['id'], $args['sizes'] )[0] ),
				esc_attr( get_the_title( $image['id'] ) ),
				isset( $dsm_upload_gallery_link_url_target ) && '' !== $dsm_upload_gallery_link_url_target ? esc_attr( $dsm_upload_gallery_link_url_target ) : esc_attr( $url_new_window ),
				$image_output
			);
		} elseif ( 'on' === $args['show_in_lightbox'] ) {
			$output = sprintf(
				'<a href="%1$s" class="et_pb_image dsm-image-lightbox" title="%2$s">
				%3$s
			</a>',
				esc_url( wp_get_attachment_image_src( $image['id'], $args['lightbox_img_sizes'] )[0] ),
				esc_attr( get_the_title( $image['id'] ) ),
				$image_output
			);
		} else {
			$output = $image_output;
		}

		return $output;
	}

	/**
	 * Wrapper for DSM_Random_Image::get_gallery() which is intended to be extended by
	 * module which uses gallery module renderer so relevant argument for other module can be added
	 *
	 * @since 3.29
	 * @see DSM_Random_Image::get_gallery()
	 * @param array $args {
	 *     Gallery Options
	 *
	 *     @type array  $gallery_ids     Attachment Ids of images to be included in gallery.
	 * }
	 *
	 * @return array
	 */
	public function get_attachments( $args = array() ) {
		return self::get_gallery( $args );
	}

	public function get_pagination_alignment() {
		$text_orientation = isset( $this->props['pagination_text_align'] ) ? $this->props['pagination_text_align'] : '';

		return et_pb_get_alignment( $text_orientation );
	}

	/**
	 * Renders the module output.
	 *
	 * @param  array  $attrs       List of attributes.
	 * @param  string $content     Content being processed.
	 * @param  string $render_slug Slug of module that is used for rendering output.
	 *
	 * @return string
	 */
	public function render( $attrs, $content, $render_slug ) {
		$sticky             = et_pb_sticky_options();
		$multi_view         = et_pb_multi_view_options( $this );
		$gallery_ids        = $this->props['gallery_ids'];
		$force_fullwidth    = $this->props['force_fullwidth'];
		$sizes              = $this->props['sizes'];
		$use_image_link_url = $this->props['use_image_link_url'];
		$url_new_window     = $this->props['url_new_window'];
		$show_in_lightbox   = $this->props['show_in_lightbox'];
		$lightbox_img_sizes = $this->props['lightbox_img_sizes'];

		$hover_icon        = $this->props['hover_icon'];
		$hover_icon_tablet = $this->props['hover_icon_tablet'];
		$hover_icon_phone  = $this->props['hover_icon_phone'];
		$hover_icon_sticky = $sticky->get_value( 'hover_icon', $this->props );
		$use_overlay       = $this->props['use_overlay'];
		$overlay_on_hover  = $this->props['overlay_on_hover'];

		if ( 'on' === $use_overlay ) {
			$this->generate_styles(
				array(
					'hover'          => false,
					'base_attr_name' => 'overlay_icon_color',
					'selector'       => '%%order_class%% .et_overlay:before',
					'css_property'   => 'color',
					'render_slug'    => $render_slug,
					'important'      => true,
					'type'           => 'color',
				)
			);

			$this->generate_styles(
				array(
					'hover'          => false,
					'base_attr_name' => 'hover_overlay_color',
					'selector'       => '%%order_class%% .et_overlay',
					'css_property'   => 'background-color',
					'render_slug'    => $render_slug,
					'type'           => 'color',
				)
			);

			// Overlay Icon Styles.
			$this->generate_styles(
				array(
					'hover'          => false,
					'utility_arg'    => 'icon_font_family',
					'render_slug'    => $render_slug,
					'base_attr_name' => 'hover_icon',
					'important'      => true,
					'selector'       => '%%order_class%% .et_overlay:before',
					'processor'      => array(
						'ET_Builder_Module_Helper_Style_Processor',
						'process_extended_icon',
					),
				)
			);
		}

		// Get gallery item data.
		$attachments = $this->get_attachments(
			array(
				'gallery_ids'        => $gallery_ids,
				'sizes'              => $sizes,
				'use_image_link_url' => $use_image_link_url,
				'url_new_window'     => $url_new_window,
				'show_in_lightbox'   => $show_in_lightbox,
				'lightbox_img_sizes' => $lightbox_img_sizes,
				'use_overlay'        => $use_overlay,
				'overlay_on_hover'   => $overlay_on_hover,
				'hover_icon'         => $hover_icon,
				'hover_icon_tablet'  => $hover_icon_tablet,
				'hover_icon_phone'   => $hover_icon_phone,
			)
		);

		if ( empty( $attachments ) ) {
			return '';
		}

		$video_background          = $this->video_background();
		$parallax_image_background = $this->get_parallax_image_background();

		// Module classnames.
		$this->add_classname(
			array(
				// $this->get_text_orientation_classname(),
			)
		);

		// Background layout data attributes.
		$data_background_layout = et_pb_background_layout_options()->get_background_layout_attrs( $this->props );

		// Force Fullwidth.
		if ( 'on' === $force_fullwidth ) {
			$el_style = array(
				'selector'    => '%%order_class%%',
				'declaration' => 'width: 100%; max-width: 100% !important;',
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );

			$el_style = array(
				'selector'    => '%%order_class%% .et_pb_image_wrap, %%order_class%% img',
				'declaration' => 'width: 100%;',
			);
			ET_Builder_Element::set_style( $render_slug, $el_style );
		}

		if ( 'on' === $show_in_lightbox ) {
			if ( ! wp_script_is( 'dsm-magnific-popup-image', 'enqueued' ) ) {
				wp_enqueue_script( 'dsm-magnific-popup-image' );
			}
		}

		$output = self::get_gallery( $this->props );

		// Images: Add CSS Filters and Mix Blend Mode rules (if set).
		if ( array_key_exists( 'image', $this->advanced_fields ) && array_key_exists( 'css', $this->advanced_fields['image'] ) ) {
			$generate_css_filters_item = $this->generate_css_filters(
				$render_slug,
				'child_',
				self::$data_utils->array_get( $this->advanced_fields['image']['css'], 'main', '%%order_class%%' )
			);
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-random-image', plugin_dir_url( __DIR__ ) . 'RandomImage/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return $output;
	}

	static function dsm_get_all_image_sizes() {
		global $_wp_additional_image_sizes;

		$sizes = array();

		foreach ( get_intermediate_image_sizes() as $_size ) {
			if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ), true ) ) {
				$sizes[ $_size ]['width']  = get_option( "{$_size}_size_w" );
				$sizes[ $_size ]['height'] = get_option( "{$_size}_size_h" );
				$sizes[ $_size ]['crop']   = (bool) get_option( "{$_size}_crop" );
			} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
				$sizes[ $_size ] = array(
					'width'  => $_wp_additional_image_sizes[ $_size ]['width'],
					'height' => $_wp_additional_image_sizes[ $_size ]['height'],
					'crop'   => $_wp_additional_image_sizes[ $_size ]['crop'],
				);
			}
		}

		$image_sizes = array(
			'full' => esc_html__( 'Full Size', 'dsm-supreme-modules-pro-for-divi' ),
		);

		foreach ( $sizes as $size_key => $size_value ) {
			$size_key_title           = str_replace( '_', ' ', $size_key );
			$size_key_title           = str_replace( '-', ' ', $size_key_title );
			$image_sizes[ $size_key ] = sprintf(
				'%1$s (W: %2$s x H: %3$s,%4$s Cropped)',
				ucfirst( $size_key_title ),
				$size_value['width'],
				$size_value['height'],
				( false === $size_value['crop'] ? ' Not' : '' )
			);
		}

		return $image_sizes;
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

		if ( ! isset( $assets_list['et_pb_overlay'] ) ) {
			$assets_list['et_pb_overlay'] = array(
				'css' => "{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
			);
		}

		// RandomImage.
		if ( ! isset( $assets_list['dsm_random_image'] ) ) {
			$assets_list['dsm_random_image'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'RandomImage/style.css',
			);
		}
		if ( ! isset( $assets_list['et_jquery_magnific_popup'] ) ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
			);
		}
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

new DSM_Random_Image();
