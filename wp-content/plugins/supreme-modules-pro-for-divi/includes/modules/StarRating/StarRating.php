<?php

class DSM_Star_Rating extends ET_Builder_Module {

	public $slug       = 'dsm_star_rating';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name      = esc_html__( 'Supreme Star Rating', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'  => array(
				'toggles' => array(
					'main_content' => esc_html__( 'Rating', 'dsm-supreme-modules-pro-for-divi' ),
					'schema'       => esc_html__( 'Schema', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced' => array(
				'toggles' => array(
					'alignment' => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'stars'     => esc_html__( 'Stars', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
		);
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header'        => array(
					'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% h1.et_pb_module_header, %%order_class%% h2.et_pb_module_header, %%order_class%% h3.et_pb_module_header, %%order_class%% h4.et_pb_module_header, %%order_class%% h5.et_pb_module_header, %%order_class%% h6.et_pb_module_header',
					),
					'font_size'       => array(
						'default' => '18px',
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'header_level'    => array(
						'default' => 'h4',
					),
					'hide_text_align' => true,
				),
				'rating_number' => array(
					'label'           => esc_html__( 'Rating Number', 'dsm-supreme-modules-pro-for-divi' ),
					'css'             => array(
						'main' => '%%order_class%% .dsm-star-rating-text',
					),
					'font_size'       => array(
						'default' => '14px',
					),
					'line_height'     => array(
						'default' => '1em',
					),
					'letter_spacing'  => array(
						'default' => '0px',
					),
					'hide_text_align' => true,
				),
			),
			'text'           => array(
				'use_text_orientation'  => false,
				'use_background_layout' => true,
				'css'                   => array(
					'text_shadow' => '%%order_class%% .dsm-star-rating-title',
				),
				'options'               => array(
					'background_layout' => array(
						'default' => 'light',
					),
				),
			),
			'background'     => array(
				'css'     => array(
					'main' => '%%order_class%%',
				),
				'options' => array(
					'parallax_method' => array(
						'default' => 'off',
					),
				),
			),
			'margin_padding' => array(
				'css' => array(
					'main' => '%%order_class%%',
				),
			),
			'borders'        => array(
				'default' => array(
					'css' => array(
						'main' => array(
							'border_radii'  => '%%order_class%%',
							'border_styles' => '%%order_class%%',
						),
					),
				),
			),
			'box_shadow'     => array(
				'default' => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),
			),
		);
	}

	static function get_starrating( $args = array() ) {
		$defaults = array(
			'rating_scale'        => '',
			'rating'              => '',
			'show_number'         => '',
			'stars_schema_markup' => '',
		);

		$args = wp_parse_args( $args, $defaults );

		$int_rating               = (int) $args['rating'];
		$stars_rating_html_output = '';

		for ( $stars = 1; $stars <= $args['rating_scale']; $stars++ ) {
			if ( $stars <= $int_rating ) {
				$stars_rating_html_output .= '<i class="dsm-star-full">☆</i>';
			} elseif ( $int_rating + 1 === $stars && $args['rating'] !== $int_rating ) {
				$stars_rating_html_output .= '<i class="dsm-star-' . ( $args['rating'] - $int_rating ) * 10 . '">☆</i>';
			} else {
				$stars_rating_html_output .= '<i class="dsm-star-empty">☆</i>';
			}
		}

		if ( 'on' === $args['stars_schema_markup'] ) {
			$stars_rating_html_output .= ' <span class="dsm-star-rating-text"><meta itemprop="worstRating" content="1">(<span itemprop="ratingValue">' . $int_rating . '</span>/<span itemprop="bestRating">' . $args['rating_scale'] . '</span>)</span>';
		} elseif ( 'on' === $args['show_number'] ) {
			$stars_rating_html_output .= ' <span class="dsm-star-rating-text"><span>(<span>' . $int_rating . '</span>/<span>' . $args['rating_scale'] . '</span>)</span>';
		}
		return $stars_rating_html_output;
	}

	public function get_fields() {
		$et_accent_color = et_builder_accent_color();
		return array(
			'rating_scale'                   => array(
				'label'            => esc_html__( 'Rating Scale', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'configuration',
				'default'          => '5',
				'options'          => array(
					'5'  => esc_html__( '0 - 5', 'dsm-supreme-modules-pro-for-divi' ),
					'10' => esc_html__( '0 - 10', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__starrating',
				),
			),
			'rating'                         => array(
				'label'            => esc_html__( 'Rating', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'default'          => '5',
				'default_on_front' => '5',
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__starrating',
				),
				'dynamic_content'  => 'text',
			),
			'title'                          => array(
				'label'           => esc_html__( 'Title', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text',
				'option_category' => 'basic_option',
				'toggle_slug'     => 'main_content',
				'dynamic_content' => 'text',
				'mobile_options'  => true,
			),
			'title_inline_position'          => array(
				'label'            => esc_html__( 'Title Inline Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'left'  => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'right' => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'left',
				'toggle_slug'      => 'main_content',
				'show_if'          => array(
					'stars_display_type' => 'inline-block',
				),
			),
			'title_stacked_position'         => array(
				'label'            => esc_html__( 'Title Stacked Position', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'top'    => esc_html__( 'Top', 'dsm-supreme-modules-pro-for-divi' ),
					'bottom' => esc_html__( 'Bottom', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'bottom',
				'toggle_slug'      => 'main_content',
				'show_if'          => array(
					'stars_display_type' => 'block',
				),
			),
			'title_gap'                      => array(
				'label'            => esc_html__( 'Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'header',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'default'          => '7px',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allow_empty'      => false,
				'responsive'       => true,
				'description'      => esc_html__( 'Here you can define a gap between the title and the star rating', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'stars_display_type'             => array(
				'label'            => esc_html__( 'Display Type', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'select',
				'option_category'  => 'layout',
				'options'          => array(
					'inline-block' => esc_html__( 'Inline', 'dsm-supreme-modules-pro-for-divi' ),
					'block'        => esc_html__( 'Stacked', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'default_on_front' => 'inline-block',
				'toggle_slug'      => 'main_content',
			),
			'star_alignment'                 => array(
				'label'           => esc_html__( 'Stars Alignment', 'dsm-supreme-modules-pro-for-divi' ),
				'description'     => esc_html__( 'Align your Stars to the left, right or center of the module.', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'text_align',
				'option_category' => 'configuration',
				'options'         => et_builder_get_text_orientation_options( array( 'justified' ) ),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'alignment',
				'description'     => esc_html__( 'Here you can define the alignment of Stars', 'dsm-supreme-modules-pro-for-divi' ),
				'mobile_options'  => true,
			),
			'stars_size'                     => array(
				'label'           => esc_html__( 'Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'layout',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'stars',
				'mobile_options'  => true,
				'validate_unit'   => true,
				'default'         => '14px',
				'default_unit'    => 'px',
				'allow_empty'     => false,
				'responsive'      => true,
			),
			'stars_gap'                      => array(
				'label'            => esc_html__( 'Gap', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'range',
				'option_category'  => 'layout',
				'tab_slug'         => 'advanced',
				'toggle_slug'      => 'stars',
				'mobile_options'   => true,
				'validate_unit'    => true,
				'default'          => '0',
				'default_unit'     => 'px',
				'default_on_front' => '',
				'allow_empty'      => true,
				'responsive'       => true,
				'description'      => esc_html__( 'Here you can define a gap between each star', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'stars_color'                    => array(
				'label'        => esc_html__( 'Stars Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'         => 'color-alpha',
				'custom_color' => true,
				'default'      => '#f0ad4e',
				'tab_slug'     => 'advanced',
				'toggle_slug'  => 'stars',
				'hover'        => 'tabs',
			),
			'show_number'                    => array(
				'label'            => esc_html__( 'Show Rating Number', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'configuration',
				'options'          => array(
					'on'  => esc_html__( 'Yes', 'et_builder' ),
					'off' => esc_html__( 'No', 'et_builder' ),
				),
				'description'      => esc_html__( 'This will display the rating number after the stars.', 'dsm-supreme-modules-pro-for-divi' ),
				'toggle_slug'      => 'main_content',
				'computed_affects' => array(
					'__starrating',
				),
			),
			'__starrating'                   => array(
				'type'                => 'computed',
				'computed_callback'   => array( 'DSM_Star_Rating', 'get_starrating' ),
				'computed_depends_on' => array(
					'rating_scale',
					'rating',
					'show_number',
					'stars_schema_markup',
				),
			),
			'stars_schema_markup'            => array(
				'label'            => esc_html__( 'Enable Schema Support', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'yes_no_button',
				'option_category'  => 'basic_option',
				'default'          => 'off',
				'options'          => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'         => 'general',
				'toggle_slug'      => 'schema',
				'description'      => esc_html__( 'This will enable Schema Support for the Star Rating module.', 'dsm-supreme-modules-pro-for-divi' ),
				'computed_affects' => array(
					'__starrating',
				),
			),
			'stars_schema_author'            => array(
				'label'            => esc_html__( 'Author', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'default'          => '',
				'default_on_front' => '',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'schema',
				'dynamic_content'  => 'text',
				'show_if'          => array(
					'stars_schema_markup' => 'on',
				),
				'description'      => esc_html__( 'The author of the product for this rating.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'stars_schema_product_item_name' => array(
				'label'            => esc_html__( 'Product Item Name', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'default'          => '',
				'default_on_front' => '',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'schema',
				'dynamic_content'  => 'text',
				'show_if'          => array(
					'stars_schema_markup' => 'on',
				),
				'description'      => esc_html__( 'The item name for the product.', 'dsm-supreme-modules-pro-for-divi' ),
			),
			'stars_schema_num_of_rating'     => array(
				'label'            => esc_html__( 'Number of Rating', 'dsm-supreme-modules-pro-for-divi' ),
				'type'             => 'text',
				'option_category'  => 'basic_option',
				'default'          => '',
				'default_on_front' => '',
				'tab_slug'         => 'general',
				'toggle_slug'      => 'schema',
				'dynamic_content'  => 'text',
				'show_if'          => array(
					'stars_schema_markup' => 'on',
				),
				'description'      => esc_html__( 'The total number of ratings based on the rating given.', 'dsm-supreme-modules-pro-for-divi' ),
			),
		);
	}

	public function get_alignment( $device = 'desktop' ) {
		$is_desktop = 'desktop' === $device;
		$suffix     = ! $is_desktop ? "_{$device}" : '';
		$alignment  = $is_desktop && isset( $this->props['star_alignment'] ) ? $this->props['star_alignment'] : '';

		if ( ! $is_desktop && et_pb_responsive_options()->is_responsive_enabled( $this->props, 'star_alignment' ) ) {
			$alignment = et_pb_responsive_options()->get_any_value( $this->props, "star_alignment{$suffix}" );
		}

		return et_pb_get_alignment( $alignment );
	}



	public function render( $attrs, $content, $render_slug ) {
		$multi_view                     = et_pb_multi_view_options( $this );
		$title                          = $this->props['title'];
		$title_gap                      = $this->props['title_gap'];
		$title_gap_tablet               = $this->props['title_gap_tablet'];
		$title_gap_phone                = $this->props['title_gap_phone'];
		$title_gap_last_edited          = $this->props['title_gap_last_edited'];
		$rating_scale                   = (int) $this->props['rating_scale'];
		$rating                         = (float) $this->props['rating'];
		$show_number                    = $this->props['show_number'];
		$stars_display_type             = $this->props['stars_display_type'];
		$title_inline_position          = $this->props['title_inline_position'];
		$title_stacked_position         = $this->props['title_stacked_position'];
		$stars_size                     = $this->props['stars_size'];
		$stars_size_tablet              = $this->props['stars_size_tablet'];
		$stars_size_phone               = $this->props['stars_size_phone'];
		$stars_size_last_edited         = $this->props['stars_size_last_edited'];
		$stars_color                    = $this->props['stars_color'];
		$stars_gap                      = $this->props['stars_gap'];
		$stars_gap_tablet               = $this->props['stars_gap_tablet'];
		$stars_gap_phone                = $this->props['stars_gap_phone'];
		$stars_gap_last_edited          = $this->props['stars_gap_last_edited'];
		$background_layout              = $this->props['background_layout'];
		$header_level                   = $this->props['header_level'];
		$stars_schema_markup            = $this->props['stars_schema_markup'];
		$stars_schema_product_item_name = $this->props['stars_schema_product_item_name'];
		$stars_schema_num_of_rating     = $this->props['stars_schema_num_of_rating'];
		$stars_schema_author            = $this->props['stars_schema_author'];
		$stars_output                   = self::get_starrating(
			array(
				'rating_scale'        => $rating_scale,
				'rating'              => $rating,
				'show_number'         => $show_number,
				'stars_schema_markup' => $stars_schema_markup,
			)
		);

		$align        = $this->get_alignment();
		$align_tablet = $this->get_alignment( 'tablet' );
		$align_phone  = $this->get_alignment( 'phone' );
		// Responsive Star Alignment.

		$align_values = array(
			'desktop' => array(
				'text-align' => esc_html( $align ),
			),
		);

		if ( ! empty( $align_tablet ) ) {
			$align_values['tablet'] = array(
				'text-align' => esc_html( $align_tablet ),
			);
		}

		if ( ! empty( $align_phone ) ) {
			$align_values['phone'] = array(
				'text-align' => esc_html( $align_phone ),
			);
		}

		et_pb_responsive_options()->generate_responsive_css( $align_values, '%%order_class%%', '', $render_slug, '', 'star_alignment' );

		if ( '' !== $title ) {

			$is_star_schema = 'on' === $stars_schema_markup ? esc_attr( ' itemprop="name"' ) : '';

			$title = $multi_view->render_element(
				array(
					'tag'     => et_pb_process_header_level( $header_level, 'h4' ),
					'content' => sprintf( '<span %1$s>{{title}}</span>', 'on' === $stars_schema_markup ? 'itemprop="name"' : '' ),
					'attrs'   => array(
						'class' => 'dsm-star-rating-title et_pb_module_header',
					),
				)
			);
		}

		$title_display = 'inline-block' === $stars_display_type ? $title_inline_position : $title_stacked_position;

		if ( 'inline-block' === $stars_display_type ) {
			if ( '' !== $title_gap_tablet || '' !== $title_gap_phone || '' !== $title_gap ) {
				$title_gap_responsive_active = et_pb_get_responsive_status( $title_gap_last_edited );
				$inline_position             = 'left' === $title_inline_position ? 'right' : 'left';
				$title_gap_values            = array(
					'desktop' => $title_gap,
					'tablet'  => $title_gap_responsive_active ? $title_gap_tablet : '',
					'phone'   => $title_gap_responsive_active ? $title_gap_phone : '',
				);
				et_pb_responsive_options()->generate_responsive_css( $title_gap_values, "%%order_class%% .dsm-star-title-position-{$title_display} .dsm-star-rating-title", "margin-{$inline_position}", $render_slug );
			}
		} elseif ( '' !== $title_gap_tablet || '' !== $title_gap_phone || '' !== $title_gap ) {
			$title_gap_responsive_active = et_pb_get_responsive_status( $title_gap_last_edited );
			$stacked_position            = 'top' === $title_stacked_position ? 'bottom' : 'top';
			$title_gap_values            = array(
				'desktop' => $title_gap,
				'tablet'  => $title_gap_responsive_active ? $title_gap_tablet : '',
				'phone'   => $title_gap_responsive_active ? $title_gap_phone : '',
			);
			et_pb_responsive_options()->generate_responsive_css( $title_gap_values, "%%order_class%% .dsm-star-title-position-{$title_display} .dsm-star-rating-title", "margin-{$stacked_position}", $render_slug );
		}

		if ( '' !== $stars_size_tablet || '' !== $stars_size_phone || '14px' !== $stars_size ) {
			$stars_size_responsive_active = et_pb_get_responsive_status( $stars_size_last_edited );

			$stars_size_values = array(
				'desktop' => $stars_size,
				'tablet'  => $stars_size_responsive_active ? $stars_size_tablet : '',
				'phone'   => $stars_size_responsive_active ? $stars_size_phone : '',
			);
			et_pb_responsive_options()->generate_responsive_css( $stars_size_values, '%%order_class%% .dsm-star-rating', 'font-size', $render_slug );
		}

		if ( '' !== $stars_gap_tablet || '' !== $stars_gap_phone || '' !== $stars_gap ) {
			$stars_gap_responsive_active = et_pb_get_responsive_status( $stars_gap_last_edited );

			$stars_gap_values = array(
				'desktop' => $stars_gap,
				'tablet'  => $stars_gap_responsive_active ? $stars_gap_tablet : '',
				'phone'   => $stars_gap_responsive_active ? $stars_gap_phone : '',
			);
			et_pb_responsive_options()->generate_responsive_css( $stars_gap_values, '%%order_class%% .dsm-star-rating i:not(:last-of-type)', 'margin-right', $render_slug );
		}

		if ( '#f0ad4e' !== $stars_color ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-star-rating, %%order_class%% .dsm-star-rating i:before',
					'declaration' => sprintf(
						'color: %1$s;',
						esc_html( $stars_color )
					),
				)
			);
		}
		// Show dsm-star-rating-text.
		if ( 'off' === $show_number && 'on' === $stars_schema_markup ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-star-rating-text',
					'declaration' => sprintf(
						'display: %1$s;',
						esc_attr( 'none' )
					),
				)
			);
		}

		$this->add_classname(
			array(
				$this->get_text_orientation_classname(),
				"et_pb_bg_layout_{$background_layout}",
			)
		);

		$position_output = '';
		if ( 'inline-block' === $stars_display_type ) {
			$position_output = sprintf(
				'%1$s<div class="dsm-star-rating"%6$s title="%2$s/%3$s">%4$s</div>%5$s',
				'left' === $title_inline_position ? $title : '',
				esc_attr( $rating ),
				esc_attr( $rating_scale ),
				$stars_output,
				'right' === $title_inline_position ? $title : '',
				'on' === $stars_schema_markup ? esc_attr( ' itemprop=reviewRating itemscope itemtype=http://schema.org/Rating' ) : ''
			);
		} else {
			$position_output = sprintf(
				'%1$s<div class="dsm-star-rating"%6$s title="%2$s/%3$s">%4$s</div>%5$s',
				'top' === $title_stacked_position ? $title : '',
				esc_attr( $rating ),
				esc_attr( $rating_scale ),
				$stars_output,
				'bottom' === $title_stacked_position ? $title : '',
				'on' === $stars_schema_markup ? esc_attr( ' itemprop=reviewRating itemscope itemtype=http://schema.org/Rating' ) : ''
			);
		}

		if ( 'on' === $stars_schema_markup ) {
			$output = sprintf(
				'<div itemscope itemtype="https://schema.org/Review" class="dsm-star-rating-wrapper dsm-star-display-type-%2$s dsm-star-title-position-%3$s">
					<div style="display:none" itemprop="itemReviewed" itemscope itemtype="http://schema.org/Product">
						<span itemprop="name">%5$s</span>
						<span itemprop="aggregateRating" itemscope itemtype="https://schema.org/AggregateRating">
							<span itemprop="ratingValue">%7$s</span>
							<span itemprop="ratingCount">%6$s</span>
						</span>
					</div>
					%1$s
					<span style="display:none" itemprop="author" itemscope itemtype="https://schema.org/Person">
				  		<span itemprop="name">%4$s</span>
					</span>
				</div>',
				$position_output,
				esc_html( $stars_display_type ),
				esc_html( $title_display ),
				esc_html( $stars_schema_author ),
				esc_html( $stars_schema_product_item_name ),
				esc_html( $stars_schema_num_of_rating ),
				esc_html( $rating )
			);
		} else {
			$output = sprintf(
				'<div class="dsm-star-rating-wrapper dsm-star-display-type-%2$s dsm-star-title-position-%3$s">
				%1$s
				</div>',
				$position_output,
				esc_html( $stars_display_type ),
				esc_html( $title_display )
			);
		}

		if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) {
			if ( isset( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) && ! empty( get_option( 'dsm_settings_misc' )['dsm_dynamic_assets'] ) && 'on' === get_option( 'dsm_settings_misc' )['dsm_dynamic_assets_compatibility'] ) {
				wp_enqueue_style( 'dsm-star-rating', plugin_dir_url( __DIR__ ) . 'StarRating/style.css', array(), DSM_PRO_VERSION, 'all' );
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

		// StarRating.
		if ( ! isset( $assets_list['dsm_star_rating'] ) ) {
			$assets_list['dsm_star_rating'] = array(
				'css' => plugin_dir_url( __DIR__ ) . 'StarRating/style.css',
			);
		}

		return $assets_list;
	}
}

new DSM_Star_Rating();
