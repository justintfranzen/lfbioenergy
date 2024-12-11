<?php

class DSM_Social_Share_Buttons_Child extends ET_Builder_Module {
	public $slug                     = 'dsm_social_share_buttons_child';
	public $vb_support               = 'on';
	public $child_title_var          = 'admin_title';
	public $child_title_fallback_var = 'dsm_network';

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name                        = esc_html__( 'Supreme Social Share Buttons Child', 'dsm-supreme-modules-pro-for-divi' );
		$this->type                        = 'child';
		$this->advanced_setting_title_text = esc_html__( 'Social Share Buttons', 'dsm-supreme-modules-pro-for-divi' );

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),

			'advanced'   => array(
				'toggles' => array(
					'share_button' => esc_html__( 'Share Button', 'dsm-supreme-modules-pro-for-divi' ),
					'alignment'    => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
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

			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '.dsm-social-share-buttons-container %%order_class%% .dsm-social-share-button-inner-wrapper',
							'border_styles' => '.dsm-social-share-buttons-container %%order_class%% .dsm-social-share-button-inner-wrapper',
							'important'     => 'all',
						),
					),
				),
			),

			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main'      => '.dsm-social-share-buttons-container %%order_class%% .dsm-social-share-button-inner-wrapper',
						'important' => 'all',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main'      => '%%order_class%%.dsm-social-share-button-wrapper',
					'important' => 'all',
				),
			),
			'fonts'          => false,
			'text'           => false,
			'link_options'   => false,
			'animation'      => false,
			'max_width'      => false,
			'filters'        => false,
			'transform'      => false,
		);
	}

	public function get_fields() {
		return array(
			'module_id'             => array(
				'label'           => esc_html__( 'CSS ID', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign a unique CSS ID to the element which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'module_class'          => array(
				'label'           => esc_html__( 'CSS Class', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'configuration',
				'description'     => esc_html__( "Assign any number of CSS Classes to the element, separated by spaces, which can be used to assign custom CSS styles from within your child theme or from within Divi's custom CSS inputs.", 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'        => 'custom_css',
				'toggle_slug'     => 'classes',
				'option_class'    => 'et_pb_custom_css_regular',
			),
			'admin_title'           => array(
				'label'       => esc_html__( 'Admin Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'text',
				'description' => esc_html__( 'This will change the label of the icon list item in the builder for easy identification.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug' => 'admin_label',
			),
			'dsm_network'           => array(
				'label'           => esc_html__( 'Network', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'facebook',
				'option_category' => 'configuration',
				'options'         => array(
					'facebook'    => esc_html__( 'Facebook', 'dsm-supreme-modules-pro-for-divi' ),
					'twitter'     => esc_html__( 'Twitter', 'dsm-supreme-modules-pro-for-divi' ),
					'linkedin'    => esc_html__( 'LinkedIn', 'dsm-supreme-modules-pro-for-divi' ),
					'pinterest'   => esc_html__( 'Pinterest', 'dsm-supreme-modules-pro-for-divi' ),
					'reddit'      => esc_html__( 'Reddit', 'dsm-supreme-modules-pro-for-divi' ),
					'vk'          => esc_html__( 'Vk', 'dsm-supreme-modules-pro-for-divi' ),
					'tumblr'      => esc_html__( 'Tumblr', 'dsm-supreme-modules-pro-for-divi' ),
					'digg'        => esc_html__( 'Digg', 'dsm-supreme-modules-pro-for-divi' ),
					'skype'       => esc_html__( 'Skype', 'dsm-supreme-modules-pro-for-divi' ),
					'stumbleupon' => esc_html__( 'Stumbleupon', 'dsm-supreme-modules-pro-for-divi' ),
					'mix'         => esc_html__( 'Mix', 'dsm-supreme-modules-pro-for-divi' ),
					'telegram'    => esc_html__( 'Telegram', 'dsm-supreme-modules-pro-for-divi' ),
					'pocket'      => esc_html__( 'Pocket', 'dsm-supreme-modules-pro-for-divi' ),
					'xing'        => esc_html__( 'Xing', 'dsm-supreme-modules-pro-for-divi' ),
					'whatsapp'    => esc_html__( 'WhatsApp', 'dsm-supreme-modules-pro-for-divi' ),
					'email'       => esc_html__( 'Email', 'dsm-supreme-modules-pro-for-divi' ),
					'print'       => esc_html__( 'Print', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_custom_image_icon' => array(
				'label'           => esc_html__( 'Custom Image Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'Enabling this option will allow you to have a network with your own custom image icon.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'src'                   => array(
				'type'               => 'upload',
				'option_category'    => 'basic_option',
				'upload_button_text' => esc_attr__( 'Upload an image icon', 'dsm-supreme-modules-pro-for-divi' ),
				'choose_text'        => esc_attr__( 'Choose an Image Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'update_text'        => esc_attr__( 'Set As Image Icon', 'dsm-supreme-modules-pro-for-divi' ),
				'hide_metadata'      => true,
				'affects'            => array(
					'alt',
					'title_text',
				),
				'description'        => esc_html__( 'Upload your desired image icon, or type in the URL to the image you would like to display.', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'           => 'general',
				'toggle_slug'        => 'main_content',
				'dynamic_content'    => 'image',
				'show_if'            => array(
					'dsm_custom_image_icon' => 'on',
				),
			),
			'alt'                   => array(
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
			'title_text'            => array(
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

			'dsm_custom_label'      => array(
				'label'            => esc_html__( 'Custom Label', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'default_on_child' => true,
				'default'          => '',
				'option_category'  => 'basic_option',
				'dynamic_content'  => 'text',
				'description'      => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'main_content',
				'mobile_options'   => true,
			),

			'dsm_color_type'        => array(
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

			'dsm_custom_bg_color'   => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'share_button',

				'show_if'        => array(
					'dsm_color_type' => 'custom',
				),
			),

			'dsm_custom_color'      => array(
				'label'          => esc_html__( 'Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'mobile_options' => true,
				'responsive'     => true,
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'share_button',

				'show_if'        => array(
					'dsm_color_type' => 'custom',
				),
			),
		);
	}

	public function render( $attrs, $content, $render_slug ) {

		global $dsm_social_share_props;

		$parent_view            = self::$_->array_get( $dsm_social_share_props, 'dsm_view', '' );
		$parent_dsm_label       = self::$_->array_get( $dsm_social_share_props, 'dsm_label', '' );
		$parent_target_type     = self::$_->array_get( $dsm_social_share_props, 'dsm_target_type', '' );
		$parent_target_url      = self::$_->array_get( $dsm_social_share_props, 'dsm_target_link_url', '' );
		$button_hover_animation = self::$_->array_get( $dsm_social_share_props, 'dsm_social_hover_animation', '' );

		$multi_view = et_pb_multi_view_options( $this );

		$dsm_custom_image_icon = $this->props['dsm_custom_image_icon'];
		$src                   = $this->props['src'];
		$alt                   = $this->props['alt'];
		$title_text            = $this->props['title_text'];
		$dsm_custom_label      = $this->props['dsm_custom_label'];

		$dsm_custom_bg_color_last_edited       = $this->props['dsm_custom_bg_color_last_edited'];
		$dsm_custom_bg_color_responsive_active = et_pb_get_responsive_status( $dsm_custom_bg_color_last_edited );

		$dsm_custom_color_last_edited       = $this->props['dsm_custom_color_last_edited'];
		$dsm_custom_color_responsive_active = et_pb_get_responsive_status( $dsm_custom_color_last_edited );

		$social_share_button_value = '';
		$order_class               = self::get_module_order_class( $render_slug );

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

		// Set display block for svg image to avoid disappearing svg image.
		if ( $is_src_svg ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_custom_image_icon',
					'declaration' => 'width: 100%;',
				)
			);
		}

		$images_output = sprintf(
			'<img src="%1$s" class="dsm_custom_image_icon" alt="%2$s"%3$s />',
			esc_url( $src ),
			esc_attr( $alt ),
			( '' !== $title_text ? sprintf( ' title="%1$s"', esc_attr( $title_text ) ) : '' )
		);

		if ( '' === $this->props['border_style_all'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-social-share-button-inner-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		if ( 'custom' === $this->props['dsm_color_type'] ) {

			if ( $this->props['dsm_custom_bg_color'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dsm-social-share-buttons-container %%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'background-color: %1$s !important;', $this->props['dsm_custom_bg_color'] ),
					)
				);

			}

			if ( $dsm_custom_bg_color_responsive_active ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dsm-social-share-buttons-container %%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'background-color: %1$s !important;', $this->props['dsm_custom_bg_color_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_custom_bg_color_responsive_active ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dsm-social-share-buttons-container %%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'background-color: %1$s !important;', $this->props['dsm_custom_bg_color_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( 'custom' === $this->props['dsm_color_type'] ) {

			if ( $this->props['dsm_custom_color'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dsm-social-share-buttons-container %%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_custom_color'] ),
					)
				);
			}

			if ( $dsm_custom_color_responsive_active ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dsm-social-share-buttons-container %%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_custom_color_tablet'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}

			if ( $dsm_custom_color_responsive_active ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '.dsm-social-share-buttons-container %%order_class%% .dsm-social-share-button-inner-wrapper',
						'declaration' => sprintf( 'color: %1$s !important;', $this->props['dsm_custom_color_phone'] ),
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		$custom_text = $multi_view->render_element(
			array(
				'tag'     => 'span',
				'content' => '{{dsm_custom_label}}',
				'attrs'   => array(
					'class' => 'dsm-text',
				),
			)
		);

		switch ( $this->props['dsm_network'] ) {
			case 'facebook':
				$social_share_button_value = sprintf(
					'
					<div class="dsm-social-share-button-inner-wrapper dsm-facebook %4$s %6$s" data-share_url="%5$s">
							%1$s
							%2$s
							%3$s
					</div>
			   ',
					'icon_text' === $parent_view ?
						sprintf(
							'<div class="dsm-social-share-button-icon">
								%2$s
						    </div>
							%1$s
							',
							'on' === $parent_dsm_label ? sprintf(
								'<div class="dsm-social-share-button-text">%1$s</div>',
								'' === trim( $this->props['dsm_custom_label'] ) ? sprintf( '<span class="dsm-text">Facebook</span>' ) : $custom_text
							) : '',
							'on' === $dsm_custom_image_icon ? sprintf(
								'<span class="dsm_icon et-pb-icon">%1$s</span>
								',
								$images_output
							) : '<span class="dsm_icon et-pb-icon"></span>'
						) : '',
					'icon' === $parent_view ?
						sprintf(
							'<div class="dsm-social-share-button-icon">
								%1$s
							</div>',
							'on' === $dsm_custom_image_icon ? sprintf(
								'<span class="dsm_icon et-pb-icon">%1$s</span>
								',
								$images_output
							) : '<span class="dsm_icon et-pb-icon"></span>'
						) : '',
					'text' === $parent_view ?
						sprintf(
							'<div class="dsm-social-share-button-text">
									 %1$s
									</div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Facebook</span>' : $custom_text
						) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() : 'https://www.facebook.com/sharer/sharer.php?u=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'twitter':
				$social_share_button_value = sprintf(
					'<div class="dsm-social-share-button-inner-wrapper dsm-twitter %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
					',
					'icon_text' === $parent_view ? sprintf(
						'
				                <div class="dsm-social-share-button-icon">
								%2$s
						        </div>
						         %1$s
								',
						'on' === $parent_dsm_label ? sprintf(
							'<div class="dsm-social-share-button-text">
						              %1$s
						            </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Twitter</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'<div class="dsm-social-share-button-icon">
								%1$s
						        </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
								',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						        <div class="dsm-social-share-button-text">
						          %1$s
						        </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Twitter</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://twitter.com/intent/tweet?text=%20' . get_permalink() : 'https://twitter.com/intent/tweet?text=%20' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'linkedin':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-linkedin %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
				              <div class="dsm-social-share-button-icon">
						         <span class="dsm_icon et-pb-icon"></span>
						      </div>
						       %1$s 
							  ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						          %1$s
						        </div>
							  ',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Linkedin</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
				              <div class="dsm-social-share-button-icon">
							  %1$s						      </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
								  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						      <div class="dsm-social-share-button-text">
						          %1$s
						      </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Linkedin</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://www.linkedin.com/shareArticle?mini=true&url=' . get_permalink() . '/&title=&summary=&source=' : 'https://www.linkedin.com/shareArticle?mini=true&url=' . esc_url( $parent_target_url ) . '/&title=&summary=&source=',
					$button_hover_animation
				);
				break;

			case 'pinterest':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-pinterest %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
							%1$s
						    ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						          %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Pinterest</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						       %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Pinterest</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://www.pinterest.com/pin/create/button/?url=' . get_permalink() . '&media=' : 'https://www.pinterest.com/pin/create/button/?url=' . esc_url( $parent_target_url ) . '&media=',
					$button_hover_animation
				);
				break;

			case 'reddit':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-reddit %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
						    %1$s
							',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						          %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Reddit</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						      %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Reddit</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://www.reddit.com/submit?url=' . get_permalink() . '&title=' : 'https://www.reddit.com/submit?url=' . esc_url( $parent_target_url ) . '&title=',
					$button_hover_animation
				);
				break;

			case 'vk':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-vk %4$s %6$s" data-share_url="%5$s">
						     %1$s
							 %2$s
							 %3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
							%1$s
						    ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						          %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Vk</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-text">
						       %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Vk</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://vk.com/share.php?url=' . get_permalink() : 'https://vk.com/share.php?url=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;
			case 'tumblr':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-tumbler %4$s %6$s" data-share_url="%5$s">
						     %1$s
							 %2$s
							 %3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			            <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						</div>
						%1$s
						',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						            %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Tumblr</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			            <div class="dsm-social-share-button-icon">
						%1$s						</div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
								  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						<div class="dsm-social-share-button-text">
						      %1$s
						</div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Tumblr</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://tumblr.com/share/link?url=' . get_permalink() : 'https://tumblr.com/share/link?url=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'digg':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-digg %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
				            <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
							%1$s
						    ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						           %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Digg</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
				            <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						      %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Digg</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://digg.com/submit?url=' . get_permalink() : 'https://digg.com/submit?url=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'skype':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-skype %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
                            %1$s
						    ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						          %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Skype</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						      %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Skype</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://web.skype.com/share?url=' . get_permalink() : 'https://web.skype.com/share?url=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'stumbleupon':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-stumbleupon %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
						     %1$s
							',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						           %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Stumbleupon</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						       %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Stumbleupon</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://www.stumbleupon.com/submit?url=' . get_permalink() : 'https://www.stumbleupon.com/submit?url=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'mix':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-mix %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
							%1$s
						    ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						           %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Mix</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						      %1$s 
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Mix</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() : 'https://www.facebook.com/sharer/sharer.php?u=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'telegram':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-telegram %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
							%1$s
						    ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						          <span class="dsm-text">%1$s</span>
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Telegram</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						       %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Telegram</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://telegram.me/share/url?url=' . get_permalink() . '&text=' : 'https://telegram.me/share/url?url=' . esc_url( $parent_target_url ) . '&text=',
					$button_hover_animation
				);
				break;
			case 'pocket':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-pocket %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
							%1$s
						    ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						           %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Pocket</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						       %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Pocket</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://getpocket.com/edit?url=' . get_permalink() : 'https://getpocket.com/edit?url=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'xing':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-xing %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
						    %1$s
							',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						          %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Xing</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						       %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Xing</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://www.xing.com/spi/shares/new?url=' . get_permalink() : 'https://www.xing.com/spi/shares/new?url=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'whatsapp':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-whatsapp %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
						    %3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
				            <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
							%1$s
						    ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						          %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Whatsapp</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
				            <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						      %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Whatsapp</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'https://api.whatsapp.com/send?text=**' . get_permalink() : 'https://api.whatsapp.com/send?text=**' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'email':
				if ( isset( $_SERVER['REQUEST_URI'] ) ) {
					$request_uri = esc_url_raw( wp_unslash( $_SERVER['REQUEST_URI'] ) );
				}
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-email %4$s %6$s" data-share_url="%5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
							%1$s
						    ',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						           %1$s
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Email</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						      %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Email</span>' : $custom_text
					) : '',
					$order_class,
					'current_page' === $parent_target_type ? 'mailto:?body=' . get_permalink() : 'mailto:?body=' . esc_url( $parent_target_url ),
					$button_hover_animation
				);
				break;

			case 'print':
				$social_share_button_value = sprintf(
					'
			            <div class="dsm-social-share-button-inner-wrapper dsm-print %4$s %5$s">
						    %1$s
							%2$s
							%3$s
						</div>
			   ',
					'icon_text' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
						       <span class="dsm_icon et-pb-icon"></span>
						    </div>
						     %1$s
							',
						'on' === $parent_dsm_label ? sprintf(
							'
							    <div class="dsm-social-share-button-text">
						          %1$s 
						        </div>',
							'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Print</span>' : $custom_text
						) : '',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
							',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'icon' === $parent_view ? sprintf(
						'
			                <div class="dsm-social-share-button-icon">
							%1$s						    </div>',
						'on' === $dsm_custom_image_icon ? sprintf(
							'<span class="dsm_icon et-pb-icon">%1$s</span>
									  ',
							$images_output
						) : '<span class="dsm_icon et-pb-icon"></span>'
					) : '',
					'text' === $parent_view ? sprintf(
						'
						    <div class="dsm-social-share-button-text">
						       %1$s
						    </div>',
						'' === trim( $this->props['dsm_custom_label'] ) ? '<span class="dsm-text">Print</span>' : $custom_text
					) : '',
					$order_class,
					$button_hover_animation
				);
				break;

			default:
				$social_share_button_value = '';
				break;
		}

		$order_class = self::get_module_order_class( $render_slug );

		$output = sprintf(
			'<div%4$s class="dsm-social-share-button-wrapper %2$s%3$s">
				%1$s
			 </div>
			',
			$social_share_button_value,
			$order_class,
			// Module classnames.
			isset( $this->props['module_class'] ) && '' !== $this->props['module_class'] ? esc_attr( ' ' . $this->props['module_class'] ) : '',
			// Module ID.
			isset( $this->props['module_id'] ) && '' !== $this->props['module_id'] ? esc_attr( ' id=' . $this->props['module_id'] ) : ''
		);

		add_filter( 'et_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );
		add_filter( 'et_late_global_assets_list', array( $this, 'dsm_load_required_divi_assets' ), 10, 3 );

		return $output;
	}

	/**
	 * Filter multi view value.
	 *
	 * @since 3.27.1
	 *
	 * @see ET_Builder_Module_Helper_MultiViewOptions::filter_value
	 *
	 * @param mixed                                     $raw_value Props raw value.
	 * @param array                                     $args {
	 *                                         Context data.
	 *
	 *     @type string $context      Context param: content, attrs, visibility, classes.
	 *     @type string $name         Module options props name.
	 *     @type string $mode         Current data mode: desktop, hover, tablet, phone.
	 *     @type string $attr_key     Attribute key for attrs context data. Example: src, class, etc.
	 *     @type string $attr_sub_key Attribute sub key that availabe when passing attrs value as array such as styes. Example: padding-top, margin-botton, etc.
	 * }
	 * @param ET_Builder_Module_Helper_MultiViewOptions $multi_view Multiview object instance.
	 *
	 * @return mixed
	 */
	// public function multi_view_filter_value( $raw_value, $args, $multi_view ) {
	// $name = isset( $args['name'] ) ? $args['name'] : '';
	// $mode = isset( $args['mode'] ) ? $args['mode'] : '';

	// return et_pb_get_extended_font_icon_value( $raw_value, true );

	// if ( $raw_value && in_array( $name, $fields_need_escape, true ) ) {
	// return $this->_esc_attr( $multi_view->get_name_by_mode( $name, $mode ), 'none', $raw_value );
	// }

	// return $raw_value;
	// }

	protected function _render_module_wrapper( $output = '', $render_slug = '' ) {
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
		$assets_prefix  = et_get_dynamic_assets_path();
		$all_shortcodes = $instance->get_saved_page_shortcodes();

		// Social Share.
		if ( ! isset( $assets_list['dsm_button_hover'] ) ) {
			$assets_list['dsm_button_hover'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'Buttons/hover.css',
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

new DSM_Social_Share_Buttons_Child();
