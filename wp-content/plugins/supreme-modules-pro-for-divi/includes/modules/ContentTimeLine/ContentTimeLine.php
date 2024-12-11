<?php

class DSM_Content_TimeLine extends ET_Builder_Module {
	public $slug       = 'dsm_content_timeline';
	public $vb_support = 'on';
	public $icon_path;

	protected $module_credits = array(
		'module_uri' => 'https://divisupreme.com/',
		'author'     => 'Divi Supreme',
		'author_uri' => 'https://divisupreme.com/',
	);

	public function init() {
		$this->name            = esc_html__( 'Supreme Content Timeline', 'dsm-supreme-modules-pro-for-divi' );
		$this->child_slug      = 'dsm_content_timeline_child';
		$this->child_item_text = esc_html__( 'Content Timeline Item', 'dsm-supreme-modules-pro-for-divi' );
		$this->icon_path       = plugin_dir_path( __FILE__ ) . 'icon.svg';

		$this->settings_modal_toggles = array(
			'general'    => array(
				'toggles' => array(
					'main_content' => esc_html__( 'General', 'dsm-supreme-modules-pro-for-divi' ),
				),
			),
			'advanced'   => array(
				'toggles' => array(
					'alignment'      => esc_html__( 'Alignment', 'dsm-supreme-modules-pro-for-divi' ),
					'title_typo'     => esc_html__( 'Title Text', 'dsm-supreme-modules-pro-for-divi' ),
					'text_typo'      => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'opposite_panel' => esc_html__( 'Opposite Text', 'dsm-supreme-modules-pro-for-divi' ),
					'card'           => esc_html__( 'Card', 'dsm-supreme-modules-pro-for-divi' ),
					'pointer'        => esc_html__( 'Pointer', 'dsm-supreme-modules-pro-for-divi' ),
					'tree'           => esc_html__( 'Tree', 'dsm-supreme-modules-pro-for-divi' ),
					'image-icon'     => esc_html__( 'Image & Icon', 'dsm-supreme-modules-pro-for-divi' ),
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
	}

	public function get_advanced_fields_config() {
		return array(
			'fonts'          => array(
				'header'        => array(
					'label'        => esc_html__( 'Title Font', 'dsm-supreme-modules-pro-for-divi' ),
					'css'          => array(
						'main' => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-title',
					),

					'header_level' => array(
						'default' => 'h4',
					),

					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'title_typo',
				),

				'content'       => array(
					'label'       => esc_html__( 'Content', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper',
					),

					'tab_slug'    => 'advanced',
					'toggle_slug' => 'text_typo',
				),

				'opposite_text' => array(
					'label'       => esc_html__( 'Opposite', 'dsm-supreme-modules-pro-for-divi' ),
					'css'         => array(
						'main' => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date, %%order_class%% .dsm-content-timeline-date .date',
					),
					'tab_slug'    => 'advanced',
					'toggle_slug' => 'opposite_panel',
				),
			),

			'box_shadow'     => array(
				'default'         => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),

				'image-icon'      => array(
					'label'           => esc_html__( 'Image Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image-icon',
					'css'             => array(
						'main' => '%%order_class%% .dsm-image, %%order_class%% .dsm_icon',
					),
				),

				'opposite_shadow' => array(
					'label'           => esc_html__( 'Opposite Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'opposite_panel',
					'css'             => array(
						'main' => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					),
				),

				'pointer_shadow'  => array(
					'label'           => esc_html__( 'Pointer Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'pointer',
					'css'             => array(
						'main' => '%%order_class%% .dsm-pointer-wrapper',
					),
				),

				'card_shadow'     => array(
					'label'           => esc_html__( 'Card Box Shadow', 'dsm-supreme-modules-pro-for-divi' ),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'card',
					'css'             => array(
						'main' => '%%order_class%% .dsm-content-timeline-content-wrapper',
					),
				),
			),

			'borders'        => array(
				'default'         => array(
					'css' => array(
						'main' => '%%order_class%%',
					),
				),

				'image-icon'      => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-image, %%order_class%% .dsm_icon',
							'border_styles' => '%%order_class%% .dsm-image, %%order_class%% .dsm_icon',
						),
					),
					'label_prefix' => et_builder_i18n( 'Image/Icon' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'image-icon',
				),

				'opposite_border' => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-content-timeline-date .date',
							'border_styles' => '%%order_class%% .dsm-content-timeline-date .date',
						),
					),
					'label_prefix' => et_builder_i18n( 'Opposite Border' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'opposite_panel',
				),

				'pointer_border'  => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-pointer-wrapper',
							'border_styles' => '%%order_class%% .dsm-pointer-wrapper',
						),
					),
					'label_prefix' => et_builder_i18n( 'Pointer Border' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'pointer',
				),

				'card_border'     => array(
					'css'          => array(
						'main' => array(
							'border_radii'  => '%%order_class%% .dsm-content-timeline-content-wrapper',
							'border_styles' => '%%order_class%% .dsm-content-timeline-content-wrapper',
						),
					),
					'label_prefix' => et_builder_i18n( 'Card Border' ),
					'tab_slug'     => 'advanced',
					'toggle_slug'  => 'card',
				),
			),

			'margin_padding' => array(

				'css'            => array(
					'main' => '%%order_class%% .dsm-content-timeline-content-wrapper',
				),

				'custom_padding' => array(
					'default' => '30px|30px|30px|30px',
				),
			),

			'image_icon'     => array(
				'image_icon' => array(
					'margin_padding'  => array(
						'css' => array(
							'important' => 'all',
						),
					),
					'option_category' => 'layout',
					'tab_slug'        => 'advanced',
					'toggle_slug'     => 'image-icon',
					'label'           => et_builder_i18n( 'Image/Icon' ),
					'css'             => array(
						'padding' => '%%order_class%% .dsm-image-wrapper .dsm-image, %%order_class%% .dsm-icon-wrapper .dsm_icon',
						'margin'  => '%%order_class%% .dsm-image-wrapper .dsm-image, %%order_class%% .dsm-icon-wrapper .dsm_icon',
						'main'    => '%%order_class%% .dsm-image-wrapper .dsm-image, %%order_class%% .dsm-icon-wrapper .dsm_icon',
					),
				),
			),

			'button'         => array(
				'button' => array(
					'label'          => et_builder_i18n( 'Button' ),
					'css'            => array(
						'main'        => '%%order_class%% .dsm-timeline-content .et_pb_button',
						'plugin_main' => '%%order_class%% .dsm-timeline-content .et_pb_button',
						'alignment'   => '%%order_class%% .dsm-timeline-content .et_pb_button_wrapper',
					),
					'use_alignment'  => true,
					'box_shadow'     => array(
						'css' => array(
							'main' => '%%order_class%% .et_pb_button',
						),
					),
					'margin_padding' => array(
						'css' => array(
							'important' => 'all',
						),
					),
				),
			),

			'animation'      => array(
				'css' => array(
					'main' => '%%order_class%% .dsm-content-timeline-content-wrapper',
				),
			),

			'text'           => false,
		);
	}

	public function get_fields() {
		return array(
			'dsm_timeline_style'            => array(
				'label'           => esc_html__( 'Style', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'default'         => 'center',
				'option_category' => 'configuration',
				'options'         => array(
					'left'   => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'center' => esc_html__( 'Center', 'dsm-supreme-modules-pro-for-divi' ),
					'right'  => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_responsive_style'          => array(
				'label'           => esc_html__( 'Mobile/Tablet Style', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'select',
				'option_category' => 'configuration',
				// 'mobile_options'  => true,
				// 'responsive'      => true,
				'options'         => array(
					'select' => esc_html__( 'Select', 'dsm-supreme-modules-pro-for-divi' ),
					'left'   => esc_html__( 'Left', 'dsm-supreme-modules-pro-for-divi' ),
					'right'  => esc_html__( 'Right', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( 'This option will work only tablet/mobile', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_card_arrow'                => array(
				'label'           => esc_html__( 'Show Card Arrow', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'responsive'      => true,
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_tree_animation'            => array(
				'label'           => esc_html__( 'Enable Tree Animation', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'responsive'      => true,
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_fill_animation_speed'      => array(
				'label'           => esc_html__( 'Speed', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '0',
				'unit_less'       => true,
				'range_settings'  => array(
					'min'  => '100',
					'max'  => '5000',
					'step' => '100',
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',

				'show_if'         => array(
					'dsm_tree_animation' => 'on',
				),
			),

			'dsm_image_lightbox'            => array(
				'label'           => esc_html__( 'Enable Image Lightbox', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'responsive'      => true,
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'tab_slug'        => 'general',
				'toggle_slug'     => 'main_content',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),

			'dsm_bg_color'                  => array(
				'label'       => esc_html__( 'Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#f6f6f6',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'card',
			),
			/*
			'dsm_use_transition'            => array(
				'label'           => esc_html__( 'Use Transition', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'yes_no_button',
				'option_category' => 'basic_option',
				'mobile_options'  => true,
				'responsive'      => true,
				'default'         => 'off',
				'options'         => array(
					'off' => esc_html__( 'No', 'dsm-supreme-modules-pro-for-divi' ),
					'on'  => esc_html__( 'Yes', 'dsm-supreme-modules-pro-for-divi' ),
				),
				'show_if'         => array(
					'dsm_tree_animation' => 'on',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'pointer',
				'description'     => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
			),*/

			'dsm_pointer_bg_color'          => array(
				'label'       => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#4161D4',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'pointer',
			),

			'dsm_pointer_active_bg_color'   => array(
				'label'       => esc_html__( 'Active Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#7cda24',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'pointer',

				'show_if'     => array(
					'dsm_tree_animation' => 'on',
				),
			),

			'dsm_pointer_icon_color'        => array(
				'label'       => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#ffffff',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'pointer',
			),

			'dsm_pointer_active_icon_color' => array(
				'label'       => esc_html__( 'Active Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#000000',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'pointer',

				'show_if'     => array(
					'dsm_tree_animation' => 'on',
				),
			),

			'dsm_pointer_icon_font_size'    => array(
				'label'           => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '20px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'pointer',
			),

			'dsm_tree_bg_color'             => array(
				'label'       => esc_html__( 'Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#4161D4',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'tree',
			),

			'dsm_tree_active_bg_color'      => array(
				'label'       => esc_html__( 'Active Background', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#E09900',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'tree',

				'show_if'     => array(
					'dsm_tree_animation' => 'on',
				),
			),

			'dsm_tree_width'                => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '3px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '10',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'tree',
			),

			'dsm_horizontal_alignment'      => array(
				'label'           => esc_html__( 'Horizontal Alignment', 'dsm-supreme-modules-pro-for-divi' ),
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
				'default'         => 'left',
				'toggleable'      => true,
				'multi_selection' => false,
				'toggle_slug'     => 'alignment',
				'tab_slug'        => 'advanced',
			),

			'dsm_icon_color'                => array(
				'label'       => esc_html__( 'Icon Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'     => '#000000',
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'image-icon',
			),

			'dsm_icon_bg_color'             => array(
				'label'       => esc_html__( 'Icon Bg Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'        => 'color-alpha',
				'description' => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'tab_slug'    => 'advanced',
				'toggle_slug' => 'image-icon',
			),

			'dsm_icon_font_size'            => array(
				'label'           => esc_html__( 'Icon Font Size', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '32px',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '120',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image-icon',
			),

			'dsm_image_width'               => array(
				'label'           => esc_html__( 'Image Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '100%',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'image-icon',
			),

			'dsm_icon_image_align'          => array(
				'label'           => esc_html__( 'Image/Icon Alignment', 'dsm-supreme-modules-pro-for-divi' ),
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
				'toggleable'      => true,
				'multi_selection' => false,
				'toggle_slug'     => 'image-icon',
				'tab_slug'        => 'advanced',
			),

			'dsm_opposite_bg_color'         => array(
				'label'          => esc_html__( 'Background Color', 'dsm-supreme-modules-pro-for-divi' ),
				'type'           => 'color-alpha',
				'description'    => esc_html__( '', 'dsm-supreme-modules-pro-for-divi' ),
				'default'        => '',
				'tab_slug'       => 'advanced',
				'toggle_slug'    => 'opposite_panel',
				'mobile_options' => true,
				'responsive'     => true,
			),

			'dsm_opposite_content_width'    => array(
				'label'           => esc_html__( 'Width', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'range',
				'option_category' => 'font_option',
				'default'         => '',
				'default_unit'    => '%',
				'mobile_options'  => true,
				'responsive'      => true,
				'range_settings'  => array(
					'min'  => '1',
					'max'  => '100',
					'step' => '1',
				),
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'opposite_panel',
			),

			'dsm_opposite_padding'          => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'opposite_panel',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_card_margin'               => array(
				'label'           => esc_html__( 'Margin', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'card',
				'mobile_options'  => true,
				'responsive'      => true,
			),

			'dsm_card_padding'              => array(
				'label'           => esc_html__( 'Padding', 'dsm-supreme-modules-pro-for-divi' ),
				'type'            => 'custom_margin',
				'option_category' => 'basic_option',
				'tab_slug'        => 'advanced',
				'toggle_slug'     => 'card',
				'mobile_options'  => true,
				'responsive'      => true,
			),
		);
	}

	function before_render() {
		// Pass content timeline Module setting to child content timeline Item.
		global $dsm_timeline_main, $et_pb_slider_custom_icon, $et_pb_slider_custom_icon_tablet, $et_pb_slider_custom_icon_phone;

		$dsm_timeline_main = array(
			'header_level' => $this->props['header_level'],
		);

		$button_custom = $this->props['custom_button'];

		$custom_icon_values = et_pb_responsive_options()->get_property_values( $this->props, 'button_icon' );
		$custom_icon        = isset( $custom_icon_values['desktop'] ) ? $custom_icon_values['desktop'] : '';
		$custom_icon_tablet = isset( $custom_icon_values['tablet'] ) ? $custom_icon_values['tablet'] : '';
		$custom_icon_phone  = isset( $custom_icon_values['phone'] ) ? $custom_icon_values['phone'] : '';

		$et_pb_slider_custom_icon        = 'on' === $button_custom ? $custom_icon : '';
		$et_pb_slider_custom_icon_tablet = 'on' === $button_custom ? $custom_icon_tablet : '';
		$et_pb_slider_custom_icon_phone  = 'on' === $button_custom ? $custom_icon_phone : '';
	}

	public function render( $attrs, $content, $render_slug ) {
		$dsm_opposite_bg_color_last_edited            = $this->props['dsm_opposite_bg_color_last_edited'];
		$dsm_opposite_bg_color_responsive_active      = et_pb_get_responsive_status( $dsm_opposite_bg_color_last_edited );
		$dsm_opposite_padding_last_edited             = $this->props['dsm_opposite_padding_last_edited'];
		$dsm_opposite_padding_responsive_active       = et_pb_get_responsive_status( $dsm_opposite_padding_last_edited );
		$dsm_pointer_icon_font_size_last_edited       = $this->props['dsm_pointer_icon_font_size_last_edited'];
		$dsm_pointer_icon_font_size_responsive_active = et_pb_get_responsive_status( $dsm_pointer_icon_font_size_last_edited );
		$dsm_opposite_content_width_last_edited       = $this->props['dsm_opposite_content_width_last_edited'];
		$dsm_opposite_content_width_responsive_active = et_pb_get_responsive_status( $dsm_opposite_content_width_last_edited );
		$dsm_opposite_content_width_last_edited       = $this->props['dsm_opposite_content_width_last_edited'];
		$dsm_opposite_content_width_responsive_active = et_pb_get_responsive_status( $dsm_opposite_content_width_last_edited );

		$dsm_card_margin_last_edited        = $this->props['dsm_card_margin_last_edited'];
		$dsm_card_margin_responsive_active  = et_pb_get_responsive_status( $dsm_card_margin_last_edited );
		$dsm_card_padding                   = $this->props['dsm_card_padding'];
		$dsm_card_padding_last_edited       = $this->props['dsm_card_padding_last_edited'];
		$dsm_card_padding_responsive_active = et_pb_get_responsive_status( $dsm_card_padding_last_edited );

		$dsm_card_arrow_last_edited       = $this->props['dsm_card_arrow_last_edited'];
		$dsm_card_arrow_responsive_active = et_pb_get_responsive_status( $dsm_card_arrow_last_edited );

		global $dsm_timeline_main;

		wp_enqueue_script( 'dsm-content-timeline' );
		wp_enqueue_script( 'dsm-magnific-popup' );

		if ( '' === $this->props['border_style_all_pointer_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-pointer-wrapper',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		// adjust tree animation speed

		if ( 'on' === $this->props['dsm_tree_animation'] && $this->props['dsm_fill_animation_speed'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%%  .dsm-content-timeline-tree-progress',
					'declaration' => sprintf( 'transition: height %1$sms ease;', $this->props['dsm_fill_animation_speed'] ),
				)
			);
		}

		// card padding & margin styling.

		$type_margin  = 'margin';
		$type_padding = 'padding';
		$important    = true;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_card_margin'], $type_margin, $important ),
			)
		);

		if ( $dsm_card_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_card_margin_tablet'], $type_margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_card_margin_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_card_margin_phone'], $type_margin, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_card_padding'], $type_padding, $important ),
			)
		);

		if ( $dsm_card_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_card_padding_tablet'], $type_padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_card_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_card_padding_phone'], $type_padding, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// default pointer styling.
		if ( '' === $this->props['border_radii_pointer_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-pointer-wrapper',
					'declaration' => 'border-radius:100%;',
				)
			);
		}

		// default border style.
		if ( '' === $this->props['border_style_all_image-icon'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image, %%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		// opposite text styling.
		if ( '' === $this->props['border_style_all_opposite_border'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => 'border-style: solid;',
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
				'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_opposite_bg_color'] ),
			)
		);

		if ( $dsm_opposite_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_opposite_bg_color_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_opposite_bg_color_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_opposite_bg_color_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		$type      = 'padding';
		$important = false;

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
				'declaration' => et_builder_get_element_style_css( $this->props['dsm_opposite_padding'], $type, $important ),
			)
		);

		if ( $dsm_opposite_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_opposite_padding_tablet'], $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_opposite_padding_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => et_builder_get_element_style_css( $this->props['dsm_opposite_padding_phone'], $type, $important ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $this->props['dsm_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_icon_color'] ),
				)
			);
		}

		if ( $this->props['dsm_icon_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm_icon',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_icon_bg_color'] ),
				)
			);
		}

		$mobile_enabled = et_pb_get_responsive_status( $this->props['dsm_icon_font_size_last_edited'] );

		$content_timeline_card_icon_values = array(
			'desktop' => $this->props['dsm_icon_font_size'],
			'tablet'  => $mobile_enabled ? $this->props['dsm_icon_font_size_tablet'] : '',
			'phone'   => $mobile_enabled ? $this->props['dsm_icon_font_size_phone'] : '',
		);

		et_pb_responsive_options()->generate_responsive_css( $content_timeline_card_icon_values, '%%order_class%% .dsm_icon', 'font-size', $render_slug );

		$image_mobile_enabled = et_pb_get_responsive_status( $this->props['dsm_image_width_last_edited'] );

		$content_timeline_card_image_values = array(
			'desktop' => $this->props['dsm_image_width'],
			'tablet'  => $image_mobile_enabled ? $this->props['dsm_image_width_tablet'] : '',
			'phone'   => $image_mobile_enabled ? $this->props['dsm_image_width_phone'] : '',
		);

		et_pb_responsive_options()->generate_responsive_css( $content_timeline_card_image_values, '%%order_class%% .dsm-image', 'max-width', $render_slug );

		// for icon image alignment.

		if ( 'left' === $this->props['dsm_icon_image_align'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image-wrapper, %%order_class%% .dsm-content-timeline-content-wrapper .dsm-icon-wrapper',
					'declaration' => 'display:flex; justify-content:flex-start;',
				)
			);
		}

		if ( 'center' === $this->props['dsm_icon_image_align'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => ' %%order_class%% .dsm-content-timeline-content-wrapper .dsm-image-wrapper, %%order_class%% .dsm-content-timeline-content-wrapper .dsm-icon-wrapper',
					'declaration' => 'display:flex; justify-content:center;',
				)
			);
		}

		if ( 'right' === $this->props['dsm_icon_image_align'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper .dsm-image-wrapper, %%order_class%% .dsm-content-timeline-content-wrapper .dsm-icon-wrapper',
					'declaration' => 'display:flex; justify-content:flex-end;',
				)
			);
		}

		// tree width.
		$mobile_enabled = et_pb_get_responsive_status( $this->props['dsm_tree_width_last_edited'] );

		$content_timeline_card_icon_values = array(
			'desktop' => $this->props['dsm_tree_width'],
			'tablet'  => $mobile_enabled ? $this->props['dsm_tree_width_tablet'] : '',
			'phone'   => $mobile_enabled ? $this->props['dsm_tree_width_phone'] : '',
		);

		et_pb_responsive_options()->generate_responsive_css( $content_timeline_card_icon_values, '%%order_class%% .dsm-content-timeline-tree', 'width', $render_slug );

		// Pointer Image/Icon Width.

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-pointer-wrapper .dsm_icon',
				'declaration' => sprintf( 'font-size: %1$s; ', $this->props['dsm_pointer_icon_font_size'] ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-pointer-wrapper .dsm-image',
				'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_pointer_icon_font_size'] ),
			)
		);

		if ( $dsm_pointer_icon_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-pointer-wrapper .dsm_icon, %%order_class%% .dsm-pointer-wrapper .dsm-image',
					'declaration' => sprintf( 'font-size: %1$s; ', $this->props['dsm_pointer_icon_font_size_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_pointer_icon_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-pointer-wrapper .dsm-image',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_pointer_icon_font_size_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_pointer_icon_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-pointer-wrapper .dsm_icon',
					'declaration' => sprintf( 'font-size: %1$s; ', $this->props['dsm_pointer_icon_font_size_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( $dsm_pointer_icon_font_size_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-pointer-wrapper .dsm-image',
					'declaration' => sprintf( 'width: %1$s; height: %1$s;', $this->props['dsm_pointer_icon_font_size_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'left' === $this->props['dsm_horizontal_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-image-wrapper, %%order_class%% .dsm-icon-wrapper, %%order_class%% .dsm-title, %%order_class%% .dsm-content-timeline-content-wrapper p, %%order_class%% .et_pb_button_wrapper, %%order_class%% .dsm-content-timeline-date.dsm-mobile .date',
					'declaration' => 'text-align:left;',
				)
			);
		}

		if ( 'center' === $this->props['dsm_horizontal_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-image-wrapper, %%order_class%% .dsm-icon-wrapper, %%order_class%% .dsm-title, %%order_class%% .dsm-content-timeline-content-wrapper p, %%order_class%% .et_pb_button_wrapper, %%order_class%% .dsm-content-timeline-date.dsm-mobile .date',
					'declaration' => 'text-align:center;',
				)
			);
		}

		if ( 'right' === $this->props['dsm_horizontal_alignment'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-image-wrapper, %%order_class%% .dsm-icon-wrapper, %%order_class%% .dsm-title, %%order_class%% .dsm-content-timeline-content-wrapper p, %%order_class%% .et_pb_button_wrapper, %%order_class%% .dsm-content-timeline-date.dsm-mobile .date',
					'declaration' => 'text-align:right;',
				)
			);
		}

		if ( $this->props['dsm_tree_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-tree',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_tree_bg_color'] ),
				)
			);
		}

		if ( $this->props['dsm_tree_active_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-tree .dsm-content-timeline-tree-progress',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_tree_active_bg_color'] ),
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-content-timeline-content-wrapper::before',
				'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_bg_color'] ),
			)
		);

		if ( $this->props['dsm_pointer_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-pointer-wrapper',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_pointer_bg_color'] ),
				)
			);
		}

		if ( $this->props['dsm_pointer_active_bg_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-pointer-active .dsm-pointer-wrapper',
					'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_pointer_active_bg_color'] ),
				)
			);
		}

		if ( $this->props['dsm_pointer_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-pointer-wrapper .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_pointer_icon_color'] ),
				)
			);
		}

		if ( $this->props['dsm_pointer_active_icon_color'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-pointer-active .dsm-pointer-wrapper .dsm_icon',
					'declaration' => sprintf( 'color: %1$s;', $this->props['dsm_pointer_active_icon_color'] ),
				)
			);
		}
		/*
		if ( 'on' === $this->props['dsm_use_transition'] ) {
		}*/

		// For dsm-mobile display.
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-mobile',
				'declaration' => 'display:none;',
			)
		);
		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-mobile',
				'declaration' => 'display:block;',
				'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-pointer-active .dsm-pointer-wrapper,%%order_class%% .dsm-pointer-wrapper',
				'declaration' => 'transition: all .1s ease-in-out;',
			)
		);

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper',
				'declaration' => sprintf( 'background-color: %1$s;', $this->props['dsm_bg_color'] ),
			)
		);

		if ( 'on' === $this->props['dsm_card_arrow'] && 'right' === $this->props['dsm_timeline_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'content: "";
			                  position: absolute;
                              top: 5px;
                              left: 100%;
							  clip-path: polygon(0 0, 0 100%, 100% 50%);
							  width: 15px;
							  height: 20px;
							  overflow: visible !important;',
				)
			);
		}

		if ( 'off' === $this->props['dsm_card_arrow_tablet'] && 'right' === $this->props['dsm_timeline_style'] ) {

			if ( $dsm_card_arrow_responsive_active ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
						'declaration' => 'clip-path: none;
				                     width: 0px;
									 height:0px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
		}

		if ( 'on' === $this->props['dsm_card_arrow_tablet'] && 'right' === $this->props['dsm_timeline_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'content: "";
			                  position: absolute;
                              top: 5px;
                              left: 100%;
							  clip-path: polygon(0 0, 0 100%, 100% 50%);
							  width: 15px;
							  height: 20px;
							  overflow: visible !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'off' === $this->props['dsm_card_arrow_phone'] && 'right' === $this->props['dsm_timeline_style'] ) {

			if ( $dsm_card_arrow_responsive_active ) {
				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
						'declaration' => 'clip-path: none;
				                      width: 0px;
									  height:0px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		if ( 'on' === $this->props['dsm_card_arrow_phone'] && 'right' === $this->props['dsm_timeline_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'content: "";
			                  position: absolute;
                              top: 5px;
                              left: 100%;
							  clip-path: polygon(0 0, 0 100%, 100% 50%);
							  width: 15px;
							  height: 20px;
							  overflow: visible !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'on' === $this->props['dsm_card_arrow'] && 'left' === $this->props['dsm_timeline_style'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'content: "";
			                  position: absolute;
                              top: 5px;
                              right: 100%;
							  left: auto;
							  clip-path: polygon(100% 0, 0 50%, 100% 100%);
							  width: 15px;
							  height: 20px;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_card_arrow_tablet'] && 'left' === $this->props['dsm_timeline_style'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'content: "";
			                  position: absolute;
                              top: 5px;
                              right: 100%;
							  left: auto;
							  clip-path: polygon(100% 0, 0 50%, 100% 100%);
							  width: 15px;
							  height: 20px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'on' === $this->props['dsm_card_arrow_phone'] && 'left' === $this->props['dsm_timeline_style'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'content: "";
			                  position: absolute;
                              top: 5px;
                              right: 100%;
							  left: auto;
							  clip-path: polygon(100% 0, 0 50%, 100% 100%);
							  width: 15px;
							  height: 20px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'off' === $this->props['dsm_card_arrow_tablet'] && 'left' === $this->props['dsm_timeline_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'clip-path:none;
				                  width:0px;
								  height:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'off' === $this->props['dsm_card_arrow_phone'] && 'left' === $this->props['dsm_timeline_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'clip-path:none;
				                  width:0px;
								  height:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		// for Desktop work.
		if ( 'on' === $this->props['dsm_card_arrow'] && 'center' === $this->props['dsm_timeline_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(odd) .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'content: "";
			                  position: absolute;
                              top: 5px;
                              left: 100%;
							  clip-path: polygon(0 0, 0 100%, 100% 50%);
							  width: 15px;
							  height: 20px;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(odd) .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'content: "";
			                  position: absolute;
							  top: 5px;
			                  right: 100%;
                              left: auto;
							  clip-path: polygon(100% 0, 0 50%, 100% 100%);
							  width: 15px;
							  height: 20px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'content: "";
			                  position: absolute;
							  top: 5px;
			                  right: 100%;
                              left: auto;
							  clip-path: polygon(100% 0, 0 50%, 100% 100%);
							  width: 15px;
							  height: 20px;',
				)
			);
		}

		if ( 'on' === $this->props['dsm_card_arrow_tablet'] && 'center' === $this->props['dsm_timeline_style'] ) {

			if ( $dsm_card_arrow_responsive_active ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(odd) .dsm-content-timeline-content-wrapper::before',
						'declaration' => 'content: "";
			                  position: absolute;
                              top: 5px;
                              left: 100% !important;
							  clip-path: polygon(0 0, 0 100%, 100% 50%);
							  width: 15px;
							  height: 20px;
                              ',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-content-wrapper::before',
						'declaration' => 'content: "";
								position: absolute;
								top: 5px;
								right: 100%;
								left: auto;
								clip-path: polygon(100% 0, 0 50%, 100% 100%);
								width: 15px;
								height: 20px;
								',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
		}

		if ( 'off' === $this->props['dsm_card_arrow_tablet'] && 'center' === $this->props['dsm_timeline_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(odd) .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'clip-path: none;
				                  width:0px;
							      height:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'clip-path: none;
				                  width:0px;
							      height:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'off' === $this->props['dsm_card_arrow_phone'] && 'center' === $this->props['dsm_timeline_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(odd) .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'clip-path: none;
				                  width:0px;
							      height:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'clip-path: none;
				                  width:0px;
							      height:0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'on' === $this->props['dsm_card_arrow_phone'] && 'center' === $this->props['dsm_timeline_style'] ) {

			if ( $dsm_card_arrow_responsive_active ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(odd) .dsm-content-timeline-content-wrapper::before',
						'declaration' => 'content: "";
								position: absolute;
								top: 5px;
								left: auto !important;
								right: 100% !important;
								clip-path: polygon(100% 0, 0 50%, 100% 100%) !important;
								width: 15px;
								height: 20px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-content-wrapper::before',
						'declaration' => 'content: "";
								position: absolute;
								top: 5px;
								left: auto !important;
								right: 100% !important;
								clip-path: polygon(100% 0, 0 50%, 100% 100%) !important;
								width: 15px;
								height: 20px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
					)
				);
			}
		}

		// opposite text styling.

		if ( $this->props['dsm_opposite_content_width'] ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-date.dsm-desktop .date, %%order_class%% .dsm-left .dsm-content-timeline-date.dsm-desktop, %%order_class%% .dsm-right .dsm-content-timeline-date.dsm-desktop',
					'declaration' => sprintf( 'width: %1$s; display:block;', $this->props['dsm_opposite_content_width'] ),
				)
			);
		}

		if ( $dsm_opposite_content_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_center .dsm-content-timeline-date.dsm-desktop .date, %%order_class%% .dsm-left .dsm-content-timeline-date.dsm-desktop, %%order_class%% .dsm-right .dsm-content-timeline-date.dsm-desktop',
					'declaration' => sprintf( 'width: %1$s;display:block;', $this->props['dsm_opposite_content_width_tablet'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( $dsm_opposite_content_width_responsive_active ) {
			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm_center .dsm-content-timeline-date.dsm-desktop .date, %%order_class%% .dsm-left .dsm-content-timeline-date.dsm-desktop, %%order_class%% .dsm-right .dsm-content-timeline-date.dsm-desktop',
					'declaration' => sprintf( 'width: %1$s;display:block;', $this->props['dsm_opposite_content_width_phone'] ),
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		if ( 'left' === $this->props['dsm_timeline_style'] && '' === $this->props['dsm_opposite_content_width'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-content-timeline-date.dsm-desktop',
					'declaration' => 'width: 10%;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-content-timeline-tree',
					'declaration' => 'left: 11%;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-content-timeline-tree',
					'declaration' => 'left: 4%;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-pointer-wrapper',
					'declaration' => 'left: 11%;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-pointer-wrapper',
					'declaration' => 'left: 4%;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => 'width:100%;display:block;',
				)
			);
		}

		if ( 'left' === $this->props['dsm_timeline_style'] && '' !== $this->props['dsm_opposite_content_width'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-content-timeline-tree',
					'declaration' => sprintf( 'left: %1$s;', $this->props['dsm_opposite_content_width'] ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-content-timeline-tree',
					'declaration' => 'left: 4%;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			$dsm_op_width = 100 - (int) $this->props['dsm_opposite_content_width'] . '%';

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-content-timeline-content-wrapper',
					'declaration' => sprintf( 'width: %1$s;', $dsm_op_width ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-pointer-wrapper',
					'declaration' => sprintf( 'left: %1$s;', $this->props['dsm_opposite_content_width'] ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-pointer-wrapper',
					'declaration' => 'left: 4%;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-left .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => 'width:100%;display:block;',
				)
			);
		}

		if ( 'right' === $this->props['dsm_timeline_style'] && '' === $this->props['dsm_opposite_content_width'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-date.dsm-desktop',
					'declaration' => 'width: 10%;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-tree',
					'declaration' => 'left: 89%;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-tree',
					'declaration' => 'left: 94%;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-pointer-wrapper',
					'declaration' => 'left: 89%;',
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-pointer-wrapper',
					'declaration' => 'left: 94%;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => 'width:100%;display:block;',
				)
			);
		}

		if ( 'right' === $this->props['dsm_timeline_style'] && '' !== $this->props['dsm_opposite_content_width'] ) {

			$dsm_op_width = 100 - (int) $this->props['dsm_opposite_content_width'] . '%';

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-tree',
					'declaration' => sprintf( 'left: %1$s;', $dsm_op_width ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-content-wrapper',
					'declaration' => sprintf( 'width: %1$s;', $dsm_op_width ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-tree',
					'declaration' => 'left: 94%;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-pointer-wrapper',
					'declaration' => 'left: 94%;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-pointer-wrapper',
					'declaration' => sprintf( 'left: %1$s;', $dsm_op_width ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-date.dsm-desktop .date',
					'declaration' => 'width:100%;display:block;',
				)
			);
		}

		ET_Builder_Element::set_style(
			$render_slug,
			array(
				'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-date.dsm-desktop .date',
				'declaration' => 'margin: 0 0 0 auto;',
			)
		);

		if ( '' === $this->props['opposite_text_text_align'] && $this->props['dsm_timeline_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-date.dsm-desktop',
					'declaration' => 'text-align: right;',
				)
			);
		}

		// For Responsive style timeline module.

		if ( 'left' === $this->props['dsm_responsive_style'] ) {

			if ( '' === $this->props['dsm_opposite_content_width'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-tree, %%order_class%% .dsm-left .dsm-content-timeline-tree, %%order_class%% .dsm-center .dsm-content-timeline-tree',
						'declaration' => 'left: 11% !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-right .dsm-pointer-wrapper, %%order_class%% .dsm-left .dsm-pointer-wrapper, %%order_class%% .dsm-center .dsm-pointer-wrapper',
						'declaration' => 'left: 11% !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-left .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-center .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper',
						'declaration' => 'margin-left: 120px !important; margin-right: 0px !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-content-wrapper',
						'declaration' => 'left: 0px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper',
						'declaration' => 'width:100% !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
						'declaration' => 'display:none !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-mobile .date',
						'declaration' => 'display:block;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
						'declaration' => 'clip-path:none !important; width:0px;height:0px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
		}

		if ( 'right' === $this->props['dsm_responsive_style'] ) {

			if ( '' === $this->props['dsm_opposite_content_width'] ) {

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-tree, %%order_class%% .dsm-left .dsm-content-timeline-tree, %%order_class%% .dsm-center .dsm-content-timeline-tree',
						'declaration' => 'left: 89% !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-right .dsm-pointer-wrapper, %%order_class%% .dsm-left .dsm-pointer-wrapper, %%order_class%% .dsm-center .dsm-pointer-wrapper',
						'declaration' => 'left: 89% !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-left .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-center .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper',
						'declaration' => 'margin-right: 120px !important; margin-left: 0px !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-content-wrapper',
						'declaration' => 'left: 0px;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper',
						'declaration' => 'width:100% !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-desktop .date',
						'declaration' => 'display:none !important;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-date.dsm-mobile .date',
						'declaration' => 'display:block;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);

				ET_Builder_Element::set_style(
					$render_slug,
					array(
						'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
						'declaration' => 'clip-path:none !important; width:0px;height:0px; background: transparent;',
						'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
					)
				);
			}
		}

		if ( 'left' === $this->props['dsm_responsive_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-tree, %%order_class%% .dsm-left .dsm-content-timeline-tree, %%order_class%% .dsm-center .dsm-content-timeline-tree',
					'declaration' => 'left: 4% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-pointer-wrapper, %%order_class%% .dsm-left .dsm-pointer-wrapper, %%order_class%% .dsm-center .dsm-pointer-wrapper',
					'declaration' => 'left: 4% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-left .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-center .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper',
					'declaration' => 'margin-left: 50px !important; margin-right: 0px !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-content-wrapper',
					'declaration' => 'left: 0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper',
					'declaration' => 'width:100% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'clip-path:none !important; width:0px;height:0px; background: transparent;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_980' ),
				)
			);
		}

		if ( 'right' === $this->props['dsm_responsive_style'] ) {

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-tree, %%order_class%% .dsm-left .dsm-content-timeline-tree, %%order_class%% .dsm-center .dsm-content-timeline-tree',
					'declaration' => 'left: 94% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-pointer-wrapper, %%order_class%% .dsm-left .dsm-pointer-wrapper, %%order_class%% .dsm-center .dsm-pointer-wrapper',
					'declaration' => 'left: 94% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-right .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-left .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper, %%order_class%% .dsm-center .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper',
					'declaration' => 'margin-right: 50px !important; margin-left: 0px !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-item-wrapper:nth-child(even) .dsm-content-timeline-content-wrapper',
					'declaration' => 'left: 0px;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-center .dsm-content-timeline-item-wrapper .dsm-content-timeline-content-wrapper',
					'declaration' => 'width:100% !important;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);

			ET_Builder_Element::set_style(
				$render_slug,
				array(
					'selector'    => '%%order_class%% .dsm-content-timeline-content-wrapper::before',
					'declaration' => 'clip-path:none !important; width:0px;height:0px; background:transparent;',
					'media_query' => ET_Builder_Element::get_media_query( 'max_width_767' ),
				)
			);
		}

		return sprintf(
			'<div class="dsm-content-timeline-items-wrapper dsm-%2$s" data-tree-animation="%4$s" data-tree-animation-tablet="%5$s" data-tree-animation-phone="%6$s" data-image_lightbox="%7$s">
			<div class="dsm-content-timeline-tree">
				%3$s
			</div>
		   %1$s
		</div>
		',
			$this->props['content'],
			$this->props['dsm_timeline_style'],
			'on' === $this->props['dsm_tree_animation'] || 'on' === $this->props['dsm_tree_animation_tablet'] || 'on' === $this->props['dsm_tree_animation_phone'] ? '<div class="dsm-content-timeline-tree-progress"></div>' : '',
			$this->props['dsm_tree_animation'],
			$this->props['dsm_tree_animation_tablet'],
			$this->props['dsm_tree_animation_phone'],
			$this->props['dsm_image_lightbox']
		);
	}
}

new DSM_Content_TimeLine();
