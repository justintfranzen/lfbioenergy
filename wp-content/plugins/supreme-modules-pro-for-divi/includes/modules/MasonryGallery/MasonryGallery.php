<?php

class DSM_MasonryGallery extends ET_Builder_Module {

	public $slug       = 'dsm_masonry_gallery';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->icon_path              = plugin_dir_path( __FILE__ ) . 'icon.svg';
		$this->name                   = esc_html__( 'Supreme Masonry Gallery', 'dsm-supreme-modules-pro-for-divi' );
		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'gallery'  => esc_html__( 'Gallery', 'dsm-supreme-modules-pro-for-divi' ),
					'settings' => esc_html__( 'Settings', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay'  => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'layout'       => esc_html__( 'Grid Layout', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay_text' => array(
						'sub_toggles'       => array(
							'title'       => array(
								'name' => 'Title',
							),
							'caption'     => array(
								'name' => 'Caption',
							),
							'description' => array(
								'name' => 'Description',
							),
						),
						'tabbed_subtoggles' => true,
						'title'             => 'Overlay Text',
					),
					'grid'         => esc_html__( 'Grid Items', 'dsm-supreme-modules-pro-for-divi' ),
					'overlay'      => esc_html__( 'Overlay', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {

		$advanced_fields                = array();
		$advanced_fields['text']        = false;
		$advanced_fields['text_shadow'] = false;
		$advanced_fields['fonts']       = array();

		$advanced_fields['borders']['default'] = array(
			'css' => array(
				'main' => array(
					'border_radii'  => '%%order_class%%',
					'border_styles' => '%%order_class%%',
				),
			),
		);

		$advanced_fields['borders']['grid'] = array(
			'label_prefix' => esc_html__( 'Grid Items', 'dsm-supreme-modules-pro-for-divi' ),
			'toggle_slug'  => 'grid',
			'tab_slug'     => 'advanced',
			'css'          => array(
				'main' => array(
					'border_radii'  => '%%order_class%% .grid .et_pb_image_wrap',
					'border_styles' => '%%order_class%% .grid .et_pb_image_wrap',
				),
			),
		);

		$advanced_fields['box_shadow']['grid'] = array(
			'label'       => esc_html__( 'Grid Items Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
			'toggle_slug' => 'grid',
			'tab_slug'    => 'advanced',
			'css'         => array(
				'main' => '%%order_class%% .grid .et_pb_image_wrap',
			),
		);

		$advanced_fields['fonts']['image_title'] = array(
			'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-overlay-title',
			),
			'important'       => 'all',
			'hide_text_align' => true,
			'font_size'       => array(
				'default' => '18px',
			),
			'line_height'     => array(
				'default'        => '1em',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'header_level'    => array(
				'default'          => 'h4',
				'computed_affects' => array(
					'__gallery',
				),
			),
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'overlay_text',
			'sub_toggle'      => 'title',
		);

		$advanced_fields['fonts']['image_caption'] = array(
			'label'           => esc_html__( 'Caption', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-overlay-caption',
			),
			'important'       => 'all',
			'hide_text_align' => true,
			'font_size'       => array(
				'default' => '14px',
			),
			'line_height'     => array(
				'default'        => '1.7em',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'overlay_text',
			'sub_toggle'      => 'caption',
		);

		$advanced_fields['fonts']['image_desc'] = array(
			'label'           => esc_html__( 'Description', 'dsm-supreme-modules-pro-for-divi' ),
			'css'             => array(
				'main' => '%%order_class%% .dsm-overlay-desc',
			),
			'important'       => 'all',
			'hide_text_align' => true,
			'font_size'       => array(
				'default' => '14px',
			),
			'line_height'     => array(
				'default'        => '1.7em',
				'range_settings' => array(
					'min'  => '1',
					'max'  => '3',
					'step' => '0.1',
				),
			),
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'overlay_text',
			'sub_toggle'      => 'description',
		);

		return $advanced_fields;
	}

	public function get_fields() {

		$fields = array();

		$fields['gallery_ids'] = array(
			'label'            => esc_html__( 'Add Images', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'upload-gallery',
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'gallery',
		);

		$fields['lazyload'] = array(
			'label'            => esc_html__( 'Enabled Lazy Load', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'option_category'  => 'configuration',
			'options'          => array(
				'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug'      => 'settings',
			'description'      => esc_html__( 'If enable, images will be lazy loaded (Lazy loading images can improve performance, but it may not work with all performance caching plugins. Please test your settings before enabling this option).', 'dsm-supreme-modules-pro-for-divi' ),
			'default'          => 'off',
			'default_on_front' => 'off',
		);

		$fields['dsm_sort_images'] = array(
			'label'            => esc_html__( 'Sort Images', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'toggle_slug'      => 'settings',
			'computed_affects' => array(
				'__gallery',
			),
		);

		$fields['dsm_sort_images_order'] = array(
			'label'            => esc_html__( 'Order', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'default'          => 'title',
			'options'          => array(
				'title' => esc_html__( 'By Filename', 'dsm-supreme-modules-pro-for-divi' ),
				'date'  => esc_html__( 'By Date', 'dsm-supreme-modules-pro-for-divi' ),
				'rand'  => esc_html__( 'Random', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'show_if'          => array(
				'dsm_sort_images' => 'on',
			),

			'computed_affects' => array(
				'__gallery',
			),

			'toggle_slug'      => 'settings',
			'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
		);

		$fields['dsm_order_sort'] = array(
			'label'            => esc_html__( 'Order Sort', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'configuration',
			'default'          => 'asc',
			'options'          => array(
				'asc'  => esc_html__( 'Ascending', 'dsm-supreme-modules-pro-for-divi' ),
				'desc' => esc_html__( 'Descending', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'show_if'          => array(
				'dsm_sort_images'       => 'on',
				'dsm_sort_images_order' => 'date',
			),

			'computed_affects' => array(
				'__gallery',
			),

			'toggle_slug'      => 'settings',
			'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
		);

		$fields['columns'] = array(
			'label'            => esc_html__( 'Columns', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'default'          => '3',
			'range_settings'   => array(
				'min'  => '1',
				'max'  => '12',
				'step' => '1',
			),
			'computed_affects' => array(
				'__gallery',
			),
			'mobile_options'   => true,
			'responsive'       => true,
			'unitless'         => true,
			'toggle_slug'      => 'layout',
			'tab_slug'         => 'advanced',
		);

		$fields['gutter'] = array(
			'label'            => esc_html__( 'Columns Gap', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'range',
			'default'          => '12',
			'mobile_options'   => true,
			'responsive'       => true,
			'computed_affects' => array(
				'__gallery',
			),
			'range_settings'   => array(
				'min'  => '0',
				'max'  => '200',
				'step' => '1',
			),
			'toggle_slug'      => 'layout',
			'tab_slug'         => 'advanced',
			'unitless'         => true,
		);

		$fields['use_overlay'] = array(
			'label'            => esc_html__( 'Use Overlay', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'off',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
		);

		$fields['overlay_title'] = array(
			'label'            => esc_html__( 'Show Image Overlay Title', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
			'show_if'          => array(
				'use_overlay' => 'on',
			),
		);

		$fields['overlay_caption'] = array(
			'label'            => esc_html__( 'Show Image Overlay Caption', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
			'show_if'          => array(
				'use_overlay' => 'on',
			),
		);

		$fields['overlay_description'] = array(
			'label'            => esc_html__( 'Show Image Overlay Description', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
			'show_if'          => array(
				'use_overlay' => 'on',
			),
		);

		$fields['use_lightbox'] = array(
			'label'            => esc_html__( 'Use Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'off',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
		);

		$fields['lightbox_img_sizes'] = array(
			'label'            => esc_html__( 'Image Size', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'select',
			'option_category'  => 'layout',
			'toggle_slug'      => 'settings',
			'default'          => 'full',
			'default_on_front' => 'full',
			'computed_affects' => array(
				'__gallery',
			),
			'options'          => self::dsm_get_all_image_sizes(),
			'show_if'          => array(
				'use_lightbox' => 'on',
			),
		);

		$fields['lightbox_title'] = array(
			'label'            => esc_html__( 'Show Image Lightbox Title', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'lightbox',
			'show_if'          => array(
				'use_lightbox' => 'on',
			),
		);

		$fields['lightbox_caption'] = array(
			'label'            => esc_html__( 'Show Image Lightbox Caption', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'tab_slug'         => 'advanced',
			'toggle_slug'      => 'lightbox',
			'show_if'          => array(
				'use_lightbox' => 'on',
			),
		);

		$fields['overlay_color'] = array(
			'label'       => esc_html__( 'Overlay Color', 'dsm-supreme-modules-pro-for-divi' ),
			'type'        => 'color-alpha',
			'default'     => et_builder_accent_color(),
			'show_if'     => array(
				'use_overlay' => 'on',
			),
			'tab_slug'    => 'advanced',
			'toggle_slug' => 'overlay',
			'show_if'     => array(
				'use_overlay' => 'on',
			),
		);

		$fields['overlay_padding'] = array(
			'label'           => esc_html__( 'Overlay Padding', 'dsm-supreme-modules-pro-for-divi' ),
			'description'     => esc_html__( 'Here you can define a custom padding size for the Overlay Wrapper.', 'dsm-supreme-modules-pro-for-divi' ),
			'type'            => 'custom_padding',
			'option_category' => 'layout',
			'tab_slug'        => 'advanced',
			'toggle_slug'     => 'overlay',
			'default_unit'    => 'px',
			'allowed_units'   => array( '%', 'em', 'rem', 'px', 'cm', 'mm', 'in', 'pt', 'pc', 'ex', 'vh', 'vw' ),
			'range_settings'  => array(
				'min'  => '1',
				'max'  => '80',
				'step' => '1',
			),
			'mobile_options'  => true,
			'responsive'      => true,
			'hover'           => 'tabs',
		);

		$fields['use_horizontal_order'] = array(
			'label'            => esc_html__( 'Use Horizontal Order', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'on',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
		);

		$fields['use_zoom_on_hover'] = array(
			'label'            => esc_html__( 'Use Zoom On Hover', 'dsm-supreme-modules-pro-for-divi' ),
			'type'             => 'yes_no_button',
			'default'          => 'off',
			'options'          => array(
				'off' => esc_html__( 'Off', 'dsm-supreme-modules-pro-for-divi' ),
				'on'  => esc_html__( 'On', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'computed_affects' => array(
				'__gallery',
			),
			'toggle_slug'      => 'settings',
		);

		$fields['__gallery'] = array(
			'type'                => 'computed',
			'computed_callback'   => array( 'DSM_MasonryGallery', 'get_galleries' ),
			'computed_depends_on' => array(
				'gallery_ids',
				'columns',
				'gutter',
				'use_lightbox',
				'lightbox_img_sizes',
				'use_overlay',
				'overlay_caption',
				'overlay_description',
				'overlay_title',
				'image_title_level',
				'use_horizontal_order',
				'use_zoon_on_hover',
				'dsm_sort_images',
				'dsm_sort_images_order',
				'dsm_order_sort',
			),
			'computed_minimum'    => array(
				'gallery_ids',
			),
		);

		return $fields;
	}

	static function get_galleries( $args = array(), $conditional_tags = array(), $current_page = array() ) {

		$defaults = array(
			'gallery_ids'           => array(),
			'use_overlay'           => 'off',
			'use_zoom_on_hover'     => 'off',
			'overlay_title'         => 'on',
			'overlay_caption'       => 'on',
			'overlay_description'   => 'on',
			'lightbox_title'        => 'on',
			'lightbox_caption'      => 'on',
			'image_title_level'     => 'h4',
			'lightbox_img_sizes'    => 'full',
			'dsm_sort_images'       => 'off',
			'dsm_sort_images_order' => 'title',
			'dsm_order_sort'        => 'asc',
			'lazyload'              => 'off',
		);

		$args = wp_parse_args( $args, $defaults );

		$is_sort_image = 'on' === $args['dsm_sort_images'] ? $args['dsm_sort_images_order'] : 'post__in';

		$attachments_args = array(
			'include'        => $args['gallery_ids'],
			'post_status'    => 'inherit',
			'post_type'      => 'attachment',
			'post_mime_type' => 'image',
			'order'          => strtoupper( $args['dsm_order_sort'] ),
			'orderby'        => $is_sort_image,
		);

		$_attachments = get_posts( $attachments_args );
		$attachments  = array();

		foreach ( $_attachments as $key => $val ) {
			$attachments[ $key ]                          = $_attachments[ $key ];
			$attachments[ $key ]->lightbox_image_src_full = wp_get_attachment_image_src( $val->ID, $args['lightbox_img_sizes'] );
		}

		$output = array(
			'<div class="grid-sizer"></div>',
			'<div class="gutter-sizer"></div>',
		);

		foreach ( $attachments as $id => $attachment ) {
			$dsm_upload_gallery_custom_link_url       = get_post_meta( $attachment->ID, 'dsm_upload_gallery_custom_link_url', true );
			$dsm_upload_gallery_link_url_target       = get_post_meta( $attachment->ID, 'dsm_upload_gallery_link_url_target', true );
			$dsm_upload_gallery_link_as_download_file = get_post_meta( $attachment->ID, 'dsm_upload_gallery_link_as_download_file', true );

			$image             = wp_get_attachment_image_src( $attachment->ID, 'full' );
			$image_title       = get_the_title( $attachment->ID );
			$image_alt         = get_post_meta( $attachment->ID, '_wp_attachment_image_alt', true );
			$image_caption     = wp_get_attachment_caption( $attachment->ID );
			$gallery           = get_post( $attachment->ID );
			$image_description = isset( $attachment->post_content ) ? $attachment->post_content : '';
			$width             = isset( $image ) ? esc_attr( $image[1] ) : '';
			$height            = isset( $image ) ? esc_attr( $image[2] ) : '';
			$img_srcset_sizes  = isset( $image ) ? wp_get_attachment_image_sizes( $attachment->ID, 'full', null ) : '';
			$img_srcset        = isset( $image ) ? wp_get_attachment_image_srcset( $attachment->ID, 'full' ) : '';
			$lazyload          = isset( $args['lazyload'] ) && 'off' !== $args['lazyload'] ? '' : 'dsm-skip-lazyload';

			$image_html = sprintf(
				'<img src="%1$s" title="%2$s" alt="%3$s" class="%8$s" srcset="%4$s" sizes="%5$s" width="%6$s" height="%7$s" />',
				esc_url( $image[0] ),
				esc_attr( $image_title ),
				esc_attr( $image_alt ),
				esc_attr( $img_srcset ),
				esc_attr( $img_srcset_sizes ),
				esc_attr( $width ),
				esc_attr( $height ),
				esc_attr( $lazyload )
			);

			$image_title_render = sprintf(
				'<%2$s class="dsm-overlay-title">
                    %1$s
                </%2$s>',
				esc_attr( $image_title ),
				esc_attr( $args['image_title_level'] )
			);

			$image_caption_render = sprintf(
				'<p class="dsm-overlay-caption">
                    %1$s
                </p>',
				esc_attr( $image_caption )
			);

			$image_description_render = sprintf(
				'<p class="dsm-overlay-desc">
                    %1$s
                </p>',
				esc_attr( $image_description )
			);

			$overlay = '';
			if ( 'on' === $args['use_overlay'] ) {
				$overlay = sprintf(
					'<span class="et_overlay dsm-overlay">
                        <div class="dsm-overlay-inner">
                            %1$s
                            %2$s
							%3$s
                        </div>
                    </span>',
					'on' === $args['overlay_title'] ? $image_title_render : '',
					'on' === $args['overlay_caption'] ? $image_caption_render : '',
					'on' === $args['overlay_description'] ? $image_description_render : ''
				);
			}

			$lightbox = '';
			if ( 'on' === $args['use_lightbox'] ) {
				$lightbox = sprintf(
					'<a href="%5$s" %3$s %4$s data-mfp-src="%6$s">
                        <div class="et_pb_image_wrap">
                            %1$s
                            %2$s
                        </div>
                    </a>',
					$image_html,
					$overlay,
					'on' === $args['lightbox_title'] ? " data-title='$image_title'" : '',
					'on' === $args['lightbox_caption'] ? " data-caption='" . $image_caption . "'" : '',
					$image[0],
					esc_url( $attachment->lightbox_image_src_full[0] )
				);
			} elseif ( '' !== $dsm_upload_gallery_custom_link_url ) {
				$lightbox = sprintf(
					'<a href="%3$s" target="%4$s" %5$s>
						<div class="et_pb_image_wrap">
                        	%1$s
							%2$s
						</div>
					</a>
					',
					$image_html,
					$overlay,
					esc_url( $dsm_upload_gallery_custom_link_url ),
					esc_attr( $dsm_upload_gallery_link_url_target ),
					( '1' === $dsm_upload_gallery_link_as_download_file ? ' download' : '' )
				);
			} else {
				$lightbox = sprintf(
					'<div class="et_pb_image_wrap">
                        %1$s
                        %2$s
                    </div>',
					$image_html,
					$overlay
				);
			}

			$output[] = sprintf(
				'<div class="grid-item%2$s">
                    %1$s
                </div>',
				$lightbox,
				isset( pathinfo( wp_get_attachment_image_src( $attachment->ID, 'full' )[0] )['extension'] ) && 'svg' === pathinfo( wp_get_attachment_image_src( $attachment->ID, 'full' )[0] )['extension'] ? esc_attr( ' dsm_masonry_gallery_svg' ) : ''
			);
		}

		return implode( '', $output );
	}

	public function render( $attrs, $content, $render_slug ) {
		$gutter                   = $this->props['gutter'];
		$gutter_last_edited       = $this->props['gutter_last_edited'];
		$gutter_responsive_status = isset( $gutter_last_edited ) && et_pb_get_responsive_status( $gutter_last_edited );
		$gutter_tablet            = $gutter_responsive_status && $this->props['gutter_tablet'] ? $this->props['gutter_tablet'] : $gutter;
		$gutter_phone             = $gutter_responsive_status && $this->props['gutter_phone'] ? $this->props['gutter_phone'] : $gutter_tablet;

		$columns                   = $this->props['columns'];
		$columns_last_edited       = $this->props['columns_last_edited'];
		$columns_responsive_status = isset( $columns_last_edited ) && et_pb_get_responsive_status( $columns_last_edited );
		$columns_tablet            = $columns_responsive_status && $this->props['columns_tablet'] ? $this->props['columns_tablet'] : $columns;
		$columns_phone             = $columns_responsive_status && $this->props['columns_phone'] ? $this->props['columns_phone'] : $columns_tablet;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .gutter-sizer',
				'declaration' => "width: {$gutter}px;",
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .gutter-sizer',
				'declaration' => "width: {$gutter_tablet}px;",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .gutter-sizer',
				'declaration' => "width: {$gutter_phone}px;",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item, %%order_class%% .grid-sizer',
				'declaration' => "width: calc((100% - ({$columns} - 1) * {$gutter}px) / {$columns});",
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item, %%order_class%% .grid-sizer',
				'declaration' => "width: calc((100% - ({$columns_tablet} - 1) * {$gutter_tablet}px) / {$columns_tablet});",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item, %%order_class%% .grid-sizer',
				'declaration' => "width: calc((100% - ({$columns_phone} - 1) * {$gutter_phone}px) / {$columns_phone});",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item',
				'declaration' => "margin-bottom: {$gutter}px;",
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item',
				'declaration' => "margin-bottom: {$gutter_tablet}px;",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item',
				'declaration' => "margin-bottom: {$gutter_phone}px;",
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .grid-item .dsm-overlay',
				'declaration' => "background: {$this->props['overlay_color']} !important;",
			)
		);

		$this->apply_custom_margin_padding(
			$render_slug,
			'overlay_padding',
			'padding',
			'%%order_class%% .grid-item .dsm-overlay .dsm-overlay-inner'
		);

		$galleries = self::get_galleries( $this->props );

		if ( 'on' === $this->props['use_lightbox'] ) {
			wp_enqueue_script( 'dsm-magnific-popup' );
		}
		wp_enqueue_script( 'dsm-masonry-gallery' );

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-masonry-gallery', plugin_dir_url( __DIR__ ) . 'MasonryGallery/style.css', array(), DSM_PRO_VERSION, 'all' );
			} else {
				add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
				add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
			}
		}

		return sprintf(
			'<div class="dsm-gallery grid%4$s" data-lightbox="%2$s" data-horizontalorder="%3$s">
                %1$s
             </div>',
			$galleries,
			'on' === $this->props['use_lightbox'] ? esc_attr( 'true' ) : esc_attr( 'false' ),
			'on' === $this->props['use_horizontal_order'] ? esc_attr( 'true' ) : esc_attr( 'false' ),
			'on' === $this->props['use_zoom_on_hover'] ? esc_attr( ' dsm_masonry_zoom_hover' ) : ''
		);
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

	static function dsm_get_all_image_sizes() {
		global $_wp_additional_image_sizes;

		$sizes = array();

		foreach ( get_intermediate_image_sizes() as $_size ) {
			if ( in_array( $_size, array( 'thumbnail', 'medium', 'medium_large', 'large' ) ) ) {
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
	public function dsm_load_divi_assets( $assets_list, $assets_args, $instance ) {
		$assets_prefix     = et_get_dynamic_assets_path();
		$all_shortcodes    = $instance->get_saved_page_shortcodes();
		$this->_cpt_suffix = et_builder_should_wrap_styles() && ! et_is_builder_plugin_active() ? '_cpt' : '';

		if ( ! isset( $assets_list['et_pb_overlay'] ) ) {
			$assets_list['et_pb_overlay'] = array(
				'css' => "{$assets_prefix}/css/overlay{$this->_cpt_suffix}.css",
			);
		}

		if ( ! isset( $assets_list['et_jquery_magnific_popup'] ) ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
			);
		}

		return $assets_list;
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

		// MasonryGallery.
		if ( ! isset( $assets_list['dsm_masonry_gallery'] ) ) {
			$assets_list['dsm_masonry_gallery'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'MasonryGallery/style.css',
			);
		}
		if ( ! isset( $assets_list['et_jquery_magnific_popup'] ) ) {
			$assets_list['et_jquery_magnific_popup'] = array(
				'css' => "{$assets_prefix}/css/magnific_popup.css",
			);
		}

		return $assets_list;
	}
}

new DSM_MasonryGallery();
