<?php
/**
 * WordPress settings API
 */
if ( ! class_exists( 'DSM_Settings' ) ) :
	class DSM_Settings {
		private $settings_api;
		/**
		 * Fix PHP 8.2 Deprecated Notice
		 *
		 * Deprecated: Creation of dynamic property DSM_Settings::$licence
		 *
		 * @since    4.9.93
		 */
		private $licence;

		function __construct() {

			$this->licence = new DSM_PRO_licence();

			if ( isset( $_GET['page'] ) && ( 'dsm_license_page' === $_GET['page'] ) ) {
				add_action( 'init', array( $this, 'options_update' ), 1 );
			}
			add_action( 'admin_notices', array( $this, 'admin_notices' ) );

			add_action( 'admin_notices', array( $this, 'admin_no_key_notices' ) );
			// add_action('network_admin_notices', array($this, 'admin_no_key_notices'));

			$this->settings_api = new DSM_Settings_API();

			add_action( 'admin_init', array( $this, 'admin_init' ) );
			add_action( 'admin_menu', array( $this, 'admin_menu' ) );
			add_action( 'admin_menu', array( $this, 'plugin_options_menu' ) );
		}

		function admin_init() {

			// set the settings
			$this->settings_api->set_sections( $this->get_settings_sections() );
			$this->settings_api->set_fields( $this->get_settings_fields() );

			// initialize settings
			$this->settings_api->admin_init();
		}

		function admin_menu() {
			$dsm_plugin_menu_name = $this->settings_api->get_option( 'dsm_plugin_menu_name', 'dsm_settings_misc' );
			$dsm_plugin_menu_icon = $this->settings_api->get_option( 'dsm_plugin_menu_icon', 'dsm_settings_misc' );
			if ( '' !== $dsm_plugin_menu_name ) {
				$dsm_plugin_menu_name = $dsm_plugin_menu_name;
			} else {
				$dsm_plugin_menu_name = __( 'Divi Supreme Pro', 'dsm-supreme-modules-pro-for-divi' );
			}

			if ( '' !== $dsm_plugin_menu_icon ) {
				if ( filter_var( $dsm_plugin_menu_icon, FILTER_VALIDATE_URL ) === true ) {
					$dsm_plugin_menu_icon = esc_url( $dsm_plugin_menu_icon );
				} else {
					$dsm_plugin_menu_icon = $dsm_plugin_menu_icon;
				}
			} else {
				$dsm_plugin_menu_icon = 'data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAyMy4xNiAyNSI+PGRlZnM+PHN0eWxlPi5jbHMtMXtpc29sYXRpb246aXNvbGF0ZTt9LmNscy0ye2ZpbGw6I2ZmZjt9LmNscy0ze2ZpbGw6IzIzMWYyMDtvcGFjaXR5OjAuMjU7bWl4LWJsZW5kLW1vZGU6bXVsdGlwbHk7fTwvc3R5bGU+PC9kZWZzPjx0aXRsZT5pY29uLTEyOHgxMjg8L3RpdGxlPjxnIGNsYXNzPSJjbHMtMSI+PGcgaWQ9IkxheWVyXzEiIGRhdGEtbmFtZT0iTGF5ZXIgMSI+PHBhdGggY2xhc3M9ImNscy0yIiBkPSJNMjkuMjYsMTIuNzVBMTIuNDgsMTIuNDgsMCwwLDAsMTcuMzMsNEgxMC40MkEzLjc1LDMuNzUsMCwwLDAsNi42Nyw3Ljc1djcuOTFhMy43NSwzLjc1LDAsMCwwLDMuNzUsMy43NWgwYTMuNzUsMy43NSwwLDAsMCwzLjc1LTMuNzVoMFYxMS40OWgzLjE0YzMsMCw1LDEuNCw1LDQuODJhNi40NCw2LjQ0LDAsMCwxLS4yMywxLjc1LDQuNTUsNC41NSwwLDAsMS00LjE2LDMuNDNIMTAuNDJhMy43NSwzLjc1LDAsMCwwLTMuNzUsMy43NWgwQTMuNzUsMy43NSwwLDAsMCwxMC40MiwyOWg3LjkxYTMuNzcsMy43NywwLDAsMCwxLjE3LS4xOUExMi41LDEyLjUsMCwwLDAsMjkuODMsMTYuNWgwQTEyLjUyLDEyLjUyLDAsMCwwLDI5LjI2LDEyLjc1WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTYuNjcgLTQpIi8+PHBhdGggY2xhc3M9ImNscy0yIiBkPSJNMjcuNDgsOS4yYTEyLjU1LDEyLjU1LDAsMCwwLTQuMDctMy42Myw3LjQyLDcuNDIsMCwwLDAtMi4zMi0uMzcsNi43Miw2LjcyLDAsMCwwLTYuOTIsNi4yOWgzLjE0YzMsMCw1LDEuNCw1LDQuODJhNi40NCw2LjQ0LDAsMCwxLS4yMywxLjc1LDQuNTUsNC41NSwwLDAsMS00LjE2LDMuNDMsMTIuNDksMTIuNDksMCwwLDAsOS41OC01LjI0LDYuMDUsNi4wNSwwLDAsMCwwLTdaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNi42NyAtNCkiLz48cGF0aCBjbGFzcz0iY2xzLTMiIGQ9Ik0yOC40LDExLjFhNS41Niw1LjU2LDAsMCwxLC4xMywxLjIyYzAsMy41My0zLjExLDYuNTMtNy40NSw3LjY2YTQuNjEsNC42MSwwLDAsMS0zLjE0LDEuNTEsMTIuNDksMTIuNDksMCwwLDAsOS41OC01LjI0QTYsNiwwLDAsMCwyOC40LDExLjFaIiB0cmFuc2Zvcm09InRyYW5zbGF0ZSgtNi42NyAtNCkiLz48cGF0aCBjbGFzcz0iY2xzLTMiIGQ9Ik0yMi42Nyw1LjM3YTcuNSw3LjUsMCwwLDAtMS41OC0uMTcsNi43Miw2LjcyLDAsMCwwLTYuOTIsNi4yOWgxQTcuNjgsNy42OCwwLDAsMSwyMi42Nyw1LjM3WiIgdHJhbnNmb3JtPSJ0cmFuc2xhdGUoLTYuNjcgLTQpIi8+PC9nPjwvZz48L3N2Zz4=';
			}

			add_menu_page( $dsm_plugin_menu_name, $dsm_plugin_menu_name, 'manage_options', 'divi_supreme_settings', array( $this, 'plugin_page' ), $dsm_plugin_menu_icon, 99 );

			// add_action( 'load-' . $hook_id, array( $this, 'load_dependencies' ) );
			// add_action( 'load-' . $hook_id, array( $this, 'admin_notices' ) );
		}

		function get_settings_sections() {
			$sections = array(
				array(
					'id'    => 'dsm_general',
					'title' => __( 'General Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
				array(
					'id'    => 'dsm_modules',
					'title' => __( 'Modules Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
				array(
					'id'    => 'dsm_theme_builder',
					'title' => __( 'Easy Theme Builder', 'dsm-supreme-modules-pro-for-divi' ),
				),
				array(
					'id'    => 'dsm_settings_social_media',
					'title' => __( 'Social Media Settings', 'dsm-supreme-modules-pro-for-divi' ),
				),
				array(
					'id'    => 'dsm_settings_misc',
					'title' => __( 'Misc', 'dsm-supreme-modules-pro-for-divi' ),
				),
			);
			return $sections;
		}

		/**
		 * Returns all the settings fields
		 *
		 * @return array settings fields
		 */
		function get_settings_fields() {
			$settings_fields = array(
				'dsm_modules'               => array(
					array(
						'name'  => 'dsm_modules_section',
						'class' => 'dsm-section-subtitle',
						'label' => __( 'Divi Supreme Modules', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'The Divi Builder editor will display the <strong style="border-bottom:3px solid #fff;">activated</strong> modules that have been selected.' ),
						'type'  => 'subheading',
					),
					array(
						'name'    => 'AdvancedTabs',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/AdvancedTabs/icon.svg"></div>' . __( '<h4>Divi Advanced Tabs</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Supreme Advanced Tabs Module is the perfect module to create stunning High-Quality Tabs in Divi. The module features Beautiful Animations and a wide range of customization options & functionalities, allowing you to create tabs that perfectly match your website’s design. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-supreme-advanced-tabs-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),

					array(
						'name'    => 'AnimatedGradientText',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/AnimatedGradientText/icon.svg"></div>' . __( '<h4>Divi Animated Gradient Text</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Create a beautiful and stunning animated gradient text on your Divi website. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/animated-gradient-text-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'Badges',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/Badges/icon.svg"></div>' . __( '<h4>Divi Text Badges</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will show a badge before or after the text. A great way to show highlighted/important text badge. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/text-badges-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'BeforeAfterImage',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/BeforeAfterImage/icon.svg"></div>' . __( '<h4>Divi Before After Image Slider</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Divi before after image slider module allows you to display the before and after versions of an image by simply sliding over them. Users will be able to move a slider to easily compare the two images. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/before-after-image-slider" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'BlobImage',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/BlobImage/icon.svg"></div>' . __( '<h4>Divi Blob Image</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Fan of Blob Shaped Images? We got your back! Using Divi Supreme Blob Shape Image Module you can easily create Blob Images in Divi without any hassle. Add Blob Shapes from 13 Different styles, add overlay content, solid color & gradient overlay, and much more. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-blob-shape-image-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'BlockRevealImage',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/BlockRevealImage/icon.svg"></div>' . __( '<h4>Divi Block Reveal Image</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Create engaging and fresh interactions using Divi Block Reveal Image Module. The effect first shows a decorative block element drawn and when it starts to decrease its size, it uncovers image underneath. You get 4 types of animation to choose from. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/block-reveal-image-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'BlockRevealText',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/BlockRevealText/icon.svg"></div>' . __( '<h4>Divi Block Reveal Text</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Create engaging and fresh interactions using Divi Block Reveal Text Module. The effect first shows a decorative block element drawn and when it starts to decrease its size, it uncovers text underneath. 4 types of animation to choose from. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/block-reveal-text-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'BlogCarousel',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/BlogCarousel/icon.svg"></div>' . __( '<h4>Divi Blog Carousel</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Surprise your Visitors by showing your Posts in a new & creative way using Divi Supreme Blog Carousel Module. Add some special post Carousels to your site and take Blogging with Divi to the next level. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-blog-carousel-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'Breadcrumbs',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/Breadcrumbs/icon.svg"></div>' . __( '<h4>Divi Breadcrumbs</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Display a hierarchical representation of navigation links and make your site’s navigation easier to follow, add breadcrumbs to your site to improve the user’s experience, and yeah it’s good for SEO too. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-breadcrumbs-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'BusinessHours',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/BusinessHours/icon.svg"></div>' . __( '<h4>Divi Business Hours</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Want to add Business hours to Divi? And you are looking for some Plugin in the WordPress Repository? Divi Supreme got a new Module Called Business Hours, with this Module for Divi you can easily add business hours to Divi Builder without installing any sort of plugin. The setup is very simple and you can easily make attractive Business hours Section in Divi. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-business-hours-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'Buttons',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/Buttons/icon.svg"></div>' . __( '<h4>Divi Button</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Allow you to have two buttons with a separator text in between. 10 types of hover animation to choose from, image/video lightbox that supports: YouTube, Vimeo and Dailymotion! Not only that, we added URL link type that supports: URL, Email, Phone, SMS, Facebook Messenger, Skype, WhatsApp and Telegram! <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-supreme-button-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'CalderaForms',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/CalderaForms/icon.svg"></div>' . __( '<h4>Divi Caldera Forms</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Now with Divi Supreme Caldera Forms module, you can select your contact form from the dropdown list without having to go back and forth switching between Visual Builder and Caldera Forms setting page to copy the shortcode and adding it to the Divi Code Module. Style your Title, Body, Horizontal Ruler (HR Tag), Labels, Field Description, Input, Textarea, Select, Placeholder, Radio, Checkbox, Basic File, Error Messages, Success Message, Submit Button, Advanced File Button and more coming your way. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-caldera-forms" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'Card',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/Card/icon.svg"></div>' . __( '<h4>Divi Card</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'A creative Divi module to display a beautiful combination of texts, links, badge and image. With Image Hover Zoom animation, you can now impress your visitors even more. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-card-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'CardCarousel',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/CardCarousel/icon.svg"></div>' . __( '<h4>Divi Card Carousel</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'A creative and fully customizable Divi Carousel module to display a beautiful combination of texts, links, badge and image in a Carousel Slider. Control and customize almost everything in this powerful carousel module. It comes with image and video lightbox/popup for Image and Button and many more Carousel Settings. You can design an unlimited number of carousels with this module. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-card-carousel-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'CircleInfo',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/CircleInfo/icon.svg"></div>' . __( '<h4>Divi Circle Info</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Divi Supreme Circle Info Module helps you create beautiful, interactive circle information in Divi. You can use it to display important information about your business, service, or product in an engaging way. The module is easy to use and comes with a variety of customization options. With the Divi Supreme Circle Info Module, you can create a unique and informative way to present your business or product. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-supreme-circle-info-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ContactForm7',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ContactForm7/icon.svg"></div>' . __( '<h4>Divi Contact Form 7</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Big fan of Contact Form 7 plugin? Now with Supreme Contact Form 7, you can select your contact Form from the dropdown list without having to go back and forth switching between Visual Builder and Contact Form 7 setting page copying the shortcode and adding to the Divi Code Module. Style your Input Fields, Button, Labels, Validation, Error Messages and more! <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-contact-form-7-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ContentTimeLine',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ContentTimeLine/icon.svg"></div>' . __( '<h4>Divi Content TimeLine</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Divi Supreme Content Timeline Module allows you to create beautiful and compelling timelines using your content. With its easy-to-use interface, you can create a timeline in minutes, without any coding required. Plus, the module is fully responsive, so it looks great on any device. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-content-timeline-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ContentToggle',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ContentToggle/icon.svg"></div>' . __( '<h4>Divi Content Toggle</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Using the Divi Supreme Content Toggle Module you can easily create a Toggle to switch between two content Layouts. Use it to create stunning Pricing Tables, Food Menus and much more you can think of. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-supreme-content-toggle-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'DualHeading',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/DualHeading/icon.svg"></div>' . __( '<h4>Divi Dual Heading</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Are you looking for adding Attractive and Modern Headings to your Divi Site then welcome the Supreme Dual Heading Module to Divi Builder. Using this you can easily create beautiful Heading that attracts visitors. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-dual-heading-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'EmbedGoogleMap',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/EmbedGoogleMap/icon.svg"></div>' . __( '<h4>Divi Embed Google Map</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'If you just need a simple Google Map, then this Embed Google Map Module will do the job nicely. This will embed into your Divi’s site easily without having to worry about anything else. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-embed-google-map-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'EmbedTwitterTimeline',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/EmbedTwitterTimeline/icon.svg"></div>' . __( '<h4>Divi Embed Twitter Timeline</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Create and Embed Twitter Timeline Feed easily without any coding. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-twitter-timeline-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'FacebookEmbed',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/FacebookEmbed/icon.svg"></div>' . __( '<h4>Divi Facebook Embed</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'With Divi Facebook Embed Module, you can easily embed a post or video to any Divi post or page. Just copy and paste any Facebook post or video into the link input field and you’re good to go. Stop wasting time on enqueuing scripts and worry that it might not work. We’ve done that for you. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/facebook-embed-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'FacebookLikeButton',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/FacebookLikeButton/icon.svg"></div>' . __( '<h4>Divi Facebook Like Button</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Add a Facebook Like Button in your posts, so your visitors are encouraged to Like/Recommend or even share your content on Facebook. A single click on the Like button will ‘like’ pieces of content on the web and share them on Facebook. You can also display a Share button next to the Like button to let people add a personal message and customize who they share with. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/facebook-like-button-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'FacebookSimpleComments',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/FacebookSimpleComments/icon.svg"></div>' . __( '<h4>Divi Facebook Comments</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Add Facebook Comments to the anywhere to allow your readers to easily comment using their Facebook account. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/facebook-comments-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'FacebookSimpleFeed',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/FacebookSimpleFeed/icon.svg"></div>' . __( '<h4>Divi Facebook Feed</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Add Your Facebook Page Feed easily without having to embed them again. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/facebook-feed-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'Faq',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/Faq/icon.svg"></div>' . __( '<h4>Divi FAQ</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'If you’re tired of dull, boring FAQs on your website, it’s time to try something new. With Divi Supreme FAQ module, you can create stunning FAQs that are both informative and visually appealing. There are many styling and content options available, so you can customize your FAQs to match your website’s look and feel. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/supreme-faq-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'FilterableGallery',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/FilterableGallery/icon.svg"></div>' . __( '<h4>Divi Filterable Gallery</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'With Divi Supreme Filterable Gallery Module, you can easily create Beautiful Filterable Galleries in Divi. This module is packed with features and options that allow you to create amazing galleries without having to code. You can also quickly and easily filter your Images by Categories assigned to the image. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-supreme-filterable-gallery-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'FlipBoxPerk',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/FlipBoxPerk/icon.svg"></div>' . __( '<h4>Divi Flipbox</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'With over 15 effects to choose from, you can now create stunning interactive content that converts. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/supreme-flipbox-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'FloatingMultiImages',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/FloatingMultiImages/icon.svg"></div>' . __( '<h4>Divi Floating Multi Images</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'A better and unique way to showcase multiple images to your visitors by using Floating Multi Images module. You can also change the animation either up/down or left/right. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/floating-multi-images-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'GlitchText',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/GlitchText/icon.svg"></div>' . __( '<h4>Divi Glitch Text</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The glitch effect can bring some very unique style to your site, but can be also very distracting if you overuse it. So Glitch responsibly! <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/glitch-text-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'GradientText',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/GradientText/icon.svg"></div>' . __( '<h4>Divi Gradient Text</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'By using Divi’s built-in background gradient tool, this module allow you to have gradient text without coding. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/gradient-text-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'IconDivider',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/IconDivider/icon.svg"></div>' . __( '<h4>Divi Icon Divider</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Create an organized and unique Icon Divider with Supreme Icon Divider Module. With many border styles to choose from. You can put an icon in-between the Dividers or align them to suit your design. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/icon-divider-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'IconList',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/IconList/icon.svg"></div>' . __( '<h4>Divi Icon List</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Icon List module is like the Divi Blurb Module but more enhanced and well-aligned. If you want to create a list with icons then this module is helpful. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/icon-list-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ImageAccordion',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ImageAccordion/icon.svg"></div>' . __( '<h4>Divi Image Accordion</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Let’s you display all of your images on your Divi website with a stunning hover/click animation and effects. Add as many items as you need providing them with icons, images, titles, descriptions, buttons, and links easily and quickly. It ensures the perfect image quality and combines them beautifully with amazing accordion effects. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-image-accordion-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ImageCarousel',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ImageCarousel/icon.svg"></div>' . __( '<h4>Divi Image Carousel</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The easy way to create a beautiful image carousel using Divi Supreme Image Carousel Module. The image carousel module is perfect for showcasing a set of images, your portfolio pieces, client logos and much more. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/image-carousel-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ImageHotSpots',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ImageHotSpots/icon.svg"></div>' . __( '<h4>Divi Image Hotspots</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Adding Beautiful Image Hotspots was never easier in Divi Builder but now it’s super easy. Image Hotspots Module will let you add Hotspots to your image, if you ever wondered to add more info to your image then this module will be helpful. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/image-hotspots" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ImageHoverReveal',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ImageHoverReveal/icon.svg"></div>' . __( '<h4>Divi Image Hover Reveal</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Image Hover Reveal module allows you to add an impressive hover animation to your images without having to worry about custom CSS. The hover animation includes a slicing effect that breaks up the image and slides it away while simultaneously bringing the same image into view with a zoom animation. You can customize the animation to start from any direction. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/image-hover-reveal" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ImageReveal',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ImageReveal/icon.svg"></div>' . __( '<h4>Divi Image Text Reveal</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'When you hover over the image, you will see the an overlay slide from the left to hide the image with the revealing text and when you move the move away from the image, the image slide out of view to the right. There are plenty of animation for the revealing text too! <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/image-text-reveal" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'Lottie',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/Lottie/icon.svg"></div>' . __( '<h4>Divi Lottie</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Lottie is an iOS, macOS, Android, and React Native library that renders After Effects animations in any native app. And we’re bringing it to Divi with a Custom Module that’ll let you add beautiful animations with ease. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/lottie-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'MaskText',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/MaskText/icon.svg"></div>' . __( '<h4>Divi Mask Text</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'To grab the attention of your visitors, you need something more appealing. Mask your text with any image to achieve a very cool effect. The creativity you can achieve with our mask text module is insanely cool. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/mask-text-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'MasonryGallery',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/MasonryGallery/icon.svg"></div>' . __( '<h4>Divi Masonry Gallery</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'With Divi Supreme’s Masonry Gallery Module you can easily showcase your Images in an interesting way. Showcase your Portfolio in style whether you’re Web Designer, Photographer, etc this Module is made for you. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-supreme-masonry-gallery-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'Menu',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/Menu/icon.svg"></div>' . __( '<h4>Divi Menu</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Display your WordPress menu and design it in whatever way you want. Use it for Footer or Sidebar. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/menu-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'PerspectiveImage',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/PerspectiveImage/icon.svg"></div>' . __( '<h4>Divi Image</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Supreme Image allows you to transform the image using 3D transformation. Rotate it like the way you always wanted without coding. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/supreme-image-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'PostCarousel',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/PostCarousel/icon.svg"></div>' . __( '<h4>Divi Post Carousel</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Surprise your Visitors by showing your Posts in a new & creative way using Divi Supreme Post Carousel Module. Add some special post Carousels to your site and take Blogging with Divi to the next level. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-post-carousel-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'PriceList',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/PriceList/icon.svg"></div>' . __( '<h4>Divi Price List</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Create an attractive and stunning Price List for your business with easy options. Perfect for menus, catalogs, product lists and any other list of featured items. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/price-list-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ProgressBar',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ProgressBar/icon.svg"></div>' . __( '<h4>Divi Progress Bar</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'If you’re looking for a way to add a little extra flair to your Divi site, then look no further than the Supreme Progress Bar Module. This nifty little module allows you to add a sleek and stylish reading progress bar to your pages, Not only does it look great, but it’s completely Customizable, helping your readers keep track of their progress as they read through your content. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/supreme-progress-bar-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'RandomImage',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/RandomImage/icon.svg"></div>' . __( '<h4>Divi Random Image</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Divi Supreme Random Image module streamlines the display of a random image on your website. Upload images to the module, and it will automatically select and display a random image. This feature offers an effortless way to showcase a variety of images without the need for manual selection. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-supreme-random-image-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ScrollImage',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ScrollImage/icon.svg"></div>' . __( '<h4>Divi Scroll Image</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Divi Scroll Image Module allows you to add images on your Divi website which scroll up or down when the user hovers over the image. Scroll it like the way you always wanted without coding. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/scroll-image-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'Shapes',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/Shapes/icon.svg"></div>' . __( '<h4>Divi Shapes</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Shapes are one of the most important elements in Design. So we’ve created this module to make your life easier. Shapes module adds life and creativity to your website. Boost your Divi designs, without having to use image files or custom code. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/shapes-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'ShuffleLetters',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/ShuffleLetters/icon.svg"></div>' . __( '<h4>Divi Shuffle Letters</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Add a nice and cool text effect to your website using the Shuffle Letters Module for Divi. Write the text that you want to show and it will shuffle letter by letter in the random text before revealing. You can configure settings such as shuffle speed, duration and the random text with just a few clicks. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/shuffle-letters-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'SocialShareButtons',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/SocialShareButtons/icon.svg"></div>' . __( '<h4>Divi Social Share Buttons</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Divi Supreme Social Share Buttons Module provides an easy way to add Social Media Sharing Icons to your Divi website. The module includes a variety of Social icons and allows you to customize the look and feel of these icons. You can also choose where to place the icons on your page within the Divi Builder. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-social-share-buttons-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'StarRating',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/StarRating/icon.svg"></div>' . __( '<h4>Divi Star Rating</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'A must for all Divi sites and website owners. An important feature for many in order to get trust from your visitors. The star rating module is built with Google Schema in mind, and it’s fully customizable! <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/star-rating-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'StepFlow',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/StepFlow/icon.svg"></div>' . __( '<h4>Divi Step Flow</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Divi Supreme’s Step Flow Module is the perfect way to create stunning step flows in Divi. With this module, you can easily add, remove, and rearrange steps with just a few clicks. Plus, the module comes with a variety of pre-designed templates to choose from, so you can get started right away. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/supreme-step-flow-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'SvgAnimation',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/SvgAnimation/icon.svg"></div>' . __( '<h4>Divi SVG Animation</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'SVG animations are an easy way to add some pizzazz to your Divi website. The Supreme SVG Animation module makes it easy to create these animations, without any coding required. Just select the animation you want to use, and the module will handle the rest. With this module, you can easily add beautiful animated graphics to your website, without any headaches. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-svg-animation-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'TextDivider',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/TextDivider/icon.svg"></div>' . __( '<h4>Divi Text Divider</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Create an organized and beautiful to read headlines with Supreme Text Divider Module. With many border styles to choose from. You can also put a text in-between the Dividers or align them to suit your design. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/text-divider-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'TextNotation',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/TextNotation/icon.svg"></div>' . __( '<h4>Divi Text Notation</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'To grab the attention of your visitors, you need something more appealing. Put the focus on the important part of your text with an animated hand-drawn look and feel. 7 types of styles to choose from. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/text-notation-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'TextPath',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/TextPath/icon.svg"></div>' . __( '<h4>Divi Text Path</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Adding text to a shape is a great way to add interest and intrigue to your pages. But until now, doing that has been difficult and time consuming. Not anymore! With the Divi Supreme Text Path Module, you can attach your text to any shape in just a few clicks. Choose from a predefined list of shapes, or upload your own, and get creative with your text placement. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/divi-text-path-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'TextRotator',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/TextRotator/icon.svg"></div>' . __( '<h4>Divi Text Rotator</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Divi text rotator module allows you to take any text and rotate it with different phrases so you can create attractive headlines for your Divi site. Choose from any 36 animations to make your message pop. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/text-rotator-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'TiltImage',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/TiltImage/icon.svg"></div>' . __( '<h4>Divi Tilt Image</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'The Supreme Tilt Image allows you to create a unique and cool images. An interactive parallax tilt effect that responds to mouse move. Apply an Overlay Icon or Text to the image for better visibility. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/supreme-tilt-image-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					array(
						'name'    => 'TypingEffect',
						'class'   => 'dsm-settings-checkbox dsm-settings-column',
						'label'   => '<div class="dsm-settings-modules-icon"><img src="' . plugin_dir_url( __FILE__ ) . 'modules/TypingEffect/icon.svg"></div>' . __( '<h4>Divi Typing Effect</h4>', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Add a nice and cool typing effect to your website using the Typing Effect for Divi. Write the text that you want to show and it will appear letter by letter like if you were typing with an old typewriter. This module automatically types out sentences and then deletes them to type the following sentence. You can configure settings such as how quickly the typing effect and backspacing takes place, then delays before starting a sentence with just a few clicks, set the animation to loop infinitely or randomise the order of the sentences. <div class="dsm-settings-modules-docs"><span class="dashicons dashicons-media-document"></span><a href="https://docs.divisupreme.com/faqs/typing-effect-module" target="_blank">Documentation</a></div>' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
				),
				'dsm_general'               => array(
					array(
						'name'  => 'dsm_section_subtitle',
						'class' => 'dsm-section-subtitle',
						'label' => __( 'Divi Supreme Extensions', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'This is where you can enable Divi Extensions.' ),
						'type'  => 'subheading',
					),
					array(
						'name'    => 'dsm_use_scheduled_content',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Scheduled Element on Section, Row, Columns and Modules', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_supreme_popup',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Popup', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_library_widget',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Library Widget', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_readmore_content',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Readmore Content', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_shortcode',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Library Shortcodes', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_builder_responsive_viewer',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Builder Responsive Viewer', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_use_custom_attributes',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Divi Custom Attributes', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
				),
				'dsm_theme_builder'         => array(
					array(
						'name'  => 'dsm_theme_builder_header',
						'label' => __( 'Theme Builder Header', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Configure Theme Builder Header settings here.' ),
						'type'  => 'subheading',
					),
					array(
						'name'    => 'dsm_theme_builder_header_fixed',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Fixed Header', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will make the Divi Theme Builder Header stay fixed to the top. For developers, the fixed header CSS Class Selector is ".dsm_fixed_header"', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_theme_builder_header_fixed_devices',
						'label'   => __( 'Disable On', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will disable the fixed header on selected devices.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'multicheck',
						'options' => array(
							'tablet' => 'Tablet',
							'phone'  => 'Phone',
						),
					),
					array(
						'name'    => 'dsm_theme_builder_header_auto_calc',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Push Body Down', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will calculate the Divi Theme Builder Header height automatically and apply the height to the body to prevent the first section from overlapping. This will push the first section down based on the header height. This is not needed if you have a transparent background for the header.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'              => 'dsm_theme_builder_header_start_threshold',
						'label'             => __( 'On Scroll Threshold', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'You can define when the header should take effect after viewport. (Default: 200)', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '200',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'  => 'dsm_theme_builder_header_scroll_options',
						'label' => __( 'Scrolling', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Here you can make changes to the element on scroll.' ),
						'type'  => 'subheading',
					),
					array(
						'name'    => 'dsm_theme_builder_header_scroll',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Scrolling Options', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will enable the scrolling elements configured below. For developers, the active scroll CSS Class Selector is ".dsm_fixed_header_scroll_active"', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'    => 'dsm_theme_builder_header_first_section_background_color',
						'label'   => __( '#1 Section Background Color', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Change the background color for the first section in the Header on scroll.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'color',
						'default' => '',
					),
					array(
						'name'    => 'dsm_theme_builder_header_second_section_background_color',
						'label'   => __( '#2 Section Background Color', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Change the background color for the second section in the Header on scroll.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'color',
						'default' => '',
					),
					array(
						'name'    => 'dsm_theme_builder_header_show_box_shadow_scroll',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Show Box Shadow on Scroll', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will hide the box shadow on page load and show on shrink threshold.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					array(
						'name'  => 'dsm_theme_builder_header_shrink_options',
						'label' => __( 'Shrink', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Here you can make changes to the shrink elements.' ),
						'type'  => 'subheading',
					),
					array(
						'name'    => 'dsm_theme_builder_header_shrink',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Shrink on Scroll', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will shrink your Divi Theme Builder Header and stays fixed when you scroll. For developers, the active shrink CSS Class Selector is ".dsm_fixed_header_shrink_active"', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					/*
					array(
						'name'    => 'dsm_theme_builder_header_shrink_devices',
						'label'   => __( 'Disable On', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'This will disable the shrink effect on selected devices.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'multicheck',
						'options' => array(
							'tablet'  => 'Tablet',
							'phone'   => 'Phone',
						),
					),*/
					array(
						'name'              => 'dsm_theme_builder_header_section_padding',
						'label'             => __( 'Shrink Section Padding (px)', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'If Shrink on Scroll is enabled, you can define a custom top and bottom padding in pixel(px) value for the section when shrinked.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'              => 'dsm_theme_builder_header_row_padding',
						'label'             => __( 'Shrink Row Padding (px)', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'If Shrink on Scroll is enabled, you can define a custom top and bottom padding in pixel(px) value for the row when shrinked.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'              => 'dsm_theme_builder_header_menu_padding',
						'label'             => __( 'Shrink Menu Module Padding (px)', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'If Shrink on Scroll is enabled, you can define a custom top and bottom padding in pixel(px) value for the menu module when shrinked.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'              => 'dsm_theme_builder_header_shrink_image',
						'label'             => __( 'Shrink Image (%)', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'If Shrink on Scroll is enabled, you can define a max-width in percentage(%) value when shrinked. (Default: 70)', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'default'           => '70',
						'sanitize_callback' => 'sanitize_text_field',
					),
					array(
						'name'    => 'dsm_theme_builder_header_shrink_logo',
						'label'   => __( 'Switch Logo Image on Shrink', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'If Shrink on Scroll is enabled, you can change the logo image when shrinked.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'file',
						'default' => '',
						'options' => array(
							'button_label' => 'Choose Image',
						),
					),
				),
				'dsm_settings_social_media' => array(
					array(
						'name'  => 'dsm_section_subtitle',
						'class' => 'dsm-section-subtitle',
						'label' => __( 'Social Media Settings', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Configure Social Media settings here.' ),
						'type'  => 'subheading',
					),
					'dsm_facebook_app_id'    => array(
						'name'              => 'dsm_facebook_app_id',
						'label'             => __( 'Facebook APP ID', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => sprintf(
							'Enter the Facebook App ID. You can go to <a href="%1$s" target="_blank">Facebook Developer</a> and click on Create New App to get one.',
							esc_url( 'https://developers.facebook.com/apps/' )
						),
						'default'           => ' ',
						'type'              => 'text',
						'sanitize_callback' => 'sanitize_text_field',
					),
					'dsm_facebook_site_lang' => array(
						'name'    => 'dsm_facebook_site_lang',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Facebook Language', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Check this box if you would like your Divi Facebook Modules to use your WordPress Site Language instead of the default English(US).', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
				),
				'dsm_settings_misc'         => array(
					'dsm_dynamic_assets'               => array(
						'name'    => 'dsm_dynamic_assets',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Enable Dynamic Assets', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => sprintf(
							'Only load CSS/JS files related to Divi Supreme Module and Extension when they are needed on the page. This eliminates all file bloat and greatly improves load times.<br><br>Note: You need to clear <strong>Static CSS File Generation</strong> under Advanced Tab <a href="%1$s" target="_blank">%2$s</a>. Resaving page might be required where the Divi Supreme Modules and Extension are being used if it does not work.',
							esc_url( admin_url( 'admin.php?page=et_divi_options#wrap-builder' ) ),
							esc_html__( 'Theme Options', 'dsm-supreme-modules-pro-for-divi' )
						),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					'dsm_dynamic_assets_compatibility' => array(
						'name'    => 'dsm_dynamic_assets_compatibility',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Dynamic Assets (Compatibility)', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Check this box only if you have issue with Dynamic Assets above.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					'dsm_defer_js_assets'              => array(
						'name'    => 'dsm_defer_js_assets',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Defer Render-blocking JavaScript', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Check this box only if you have chosen to delay the loading of JavaScript files that slow down the rendering of your website through your cache plugin.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					'dsm_uninstall_on_delete'          => array(
						'name'  => 'dsm_uninstall_on_delete',
						'class' => 'dsm-settings-checkbox',
						'label' => __( 'Remove Data on Uninstall?', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'  => __( 'Check this box if you would like Divi Supreme to completely remove all of its data when the plugin is deleted.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'  => 'checkbox',
					),
					'dsm_allow_mime_json_upload'       => array(
						'name'    => 'dsm_allow_mime_json_upload',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Allow JSON file upload', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Check this box if you would like allow JSON file through WordPress Media Uploader.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'on',
					),
					'dsm_allow_mime_svg_upload'        => array(
						'name'    => 'dsm_allow_mime_svg_upload',
						'class'   => 'dsm-settings-checkbox',
						'label'   => __( 'Allow SVG file upload', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'    => __( 'Check this box if you would like allow SVG file through WordPress Media Uploader.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'    => 'checkbox',
						'default' => 'off',
					),
					'dsm_plugin_menu_name'             => array(
						'name'              => 'dsm_plugin_menu_name',
						'label'             => __( 'Menu Name', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => __( 'Change the menu name of Divi Supreme Pro.', 'dsm-supreme-modules-pro-for-divi' ),
						'type'              => 'text',
						'placeholder'       => __( 'Divi Supreme Pro', 'dsm-supreme-modules-pro-for-divi' ),
						'sanitize_callback' => 'sanitize_text_field',
					),
					'dsm_plugin_menu_icon'             => array(
						'name'              => 'dsm_plugin_menu_icon',
						'label'             => __( 'Menu Icon', 'dsm-supreme-modules-pro-for-divi' ),
						'desc'              => sprintf(
							'Image URL or <a href="%1$s" target="_blank">%2$s</a> to use for icon. Custom image should be 20px by 20px.',
							esc_url( 'https://developer.wordpress.org/resource/dashicons/' ),
							esc_html__( 'Dashicon class name', 'dsm-supreme-modules-pro-for-divi' )
						),
						'type'              => 'text',
						'placeholder'       => __( 'Full URL for icon or Dashicon class', 'dsm-supreme-modules-pro-for-divi' ),
						'sanitize_callback' => 'sanitize_text_field',
					),
				),
			);

			return $settings_fields;
		}

		function plugin_page() {
			echo '<div class="wrap">';
			$this->settings_api->show_navigation();
			$this->settings_api->show_forms();
			echo '</div>';
		}

		/**
		 * Get all the pages
		 *
		 * @return array page names with key value pairs
		 */
		function get_pages() {
			$pages         = get_pages();
			$pages_options = array();
			if ( $pages ) {
				foreach ( $pages as $page ) {
					$pages_options[ $page->ID ] = $page->post_title;
				}
			}

			return $pages_options;
		}

		// Start of license.

		/**
		 * Create the option page for this plugin
		 */
		function plugin_options_menu() {
			$hook_id = add_submenu_page( 'divi_supreme_settings', __( 'License', 'dsm-supreme-modules-pro-for-divi' ), __( 'License', 'dsm-supreme-modules-pro-for-divi' ), 'manage_options', 'dsm_license_page', array( $this, 'plugin_options_page' ) );
			add_action( 'admin_print_styles-' . $hook_id, array( $this, 'admin_print_styles' ) );
			add_action( 'admin_print_scripts-' . $hook_id, array( $this, 'admin_print_scripts' ) );
		}


		/**
		 * The plugin options page
		 */
		function plugin_options_page() {
			if ( ! $this->licence->licence_key_verify() ) {
				$this->licence_form();
				return;
			}

			if ( $this->licence->licence_key_verify() ) {
				$this->licence_deactivate_form();
			}
		}

		function options_interface() {
			if ( ! $this->licence->licence_key_verify() && ! is_multisite() ) {
				$this->licence_form();
				return;
			}

			/*
			if(!$this->licence->licence_key_verify() && is_multisite()) {
				$this->licence_multisite_require_nottice();
				return;
			}*/
		}

		function options_update() {
			if ( isset( $_POST['dsm_pro_license_form_submit'] ) && isset( $_POST['dsm_pro_license'] ) && wp_verify_nonce( sanitize_key( $_POST['dsm_pro_license'] ), 'dsm_pro_license' ) ) {
				$this->licence_form_submit();
				return;
			}
		}

		function load_dependencies() {}

		function admin_notices() {
			global $slt_form_submit_messages;

			if ( ! is_array( $slt_form_submit_messages ) ) {
				return;
			}

			if ( count( $slt_form_submit_messages ) > 0 ) {
				foreach ( $slt_form_submit_messages  as  $message ) {
					echo "<div class='" . esc_attr( $message['type'] ) . " notice-warning notice fade'><p>" . esc_html( $message['text'] ) . '</p></div>';
				}
			}
		}

		function admin_print_styles(){}

		function admin_print_scripts(){}


		function admin_no_key_notices() {
			if ( ! current_user_can( 'manage_options' ) ) {
				return;
			}
			if ( $this->licence->licence_key_verify() === true ) {
				return;
			}

			if ( ! DSM_NOTICE::is_admin_notice_active( 'disable-done-notice-forever' ) ) {
				return;
			}

			$screen = get_current_screen();

			/*
			if(is_multisite())
				{
					if(isset($screen->id) && $screen->id    ==  'settings_page_woo-ms-options-network')
						return;
					?><div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible"><p><?php _e( "Divi Supreme Pro: Please enter your", 'wooslt' ) ?> <a href="<?php echo network_admin_url() ?>settings.php?page=dsm_license_page_network"><?php _e( "Licence key", 'dsm-supreme-modules-pro-for-divi' ) ?></a> to get regular updates.</p></div><?php
				}
				else {
			*/
			if ( isset( $screen->id ) && 'settings_page_dsm_license_page' === $screen->id ) {
				return;
			}
			?><div data-dismissible="disable-done-notice-forever" class="notice notice-info is-dismissible"><p><?php esc_html_e( 'Divi Supreme Pro: Please enter your', 'dsm-supreme-modules-pro-for-divi' ); ?> <a href="admin.php?page=dsm_license_page"><?php esc_html_e( 'Licence key', 'dsm-supreme-modules-pro-for-divi' ); ?></a> to get regular updates.</p></div>
					<?php
					/*}*/
		}

		function licence_form_submit() {
			global $slt_form_submit_messages;

			// check for de-activation.
			if ( isset( $_POST['dsm_pro_license_form_submit'] ) && isset( $_POST['dsm_pro_licence_deactivate'] ) && isset( $_POST['dsm_pro_license'] ) && wp_verify_nonce( sanitize_key( $_POST['dsm_pro_license'] ), 'dsm_pro_license' ) ) {
				global $slt_form_submit_messages;

				$license_data = get_site_option( 'dsm_pro_license' );
				$license_key  = $license_data['key'];

				// build the request query.
				$args        = array(
					'woo_sl_action'     => 'deactivate',
					'licence_key'       => $license_key,
					'product_unique_id' => DSM_PRODUCT_ID,
					'domain'            => DSM_PRO_INSTANCE,
				);
				$request_uri = DSM_PRO_APP_API_URL . '?' . http_build_query( $args, '', '&' );
				$data        = wp_remote_get( $request_uri );

				if ( is_wp_error( $data ) || $data['response']['code'] != 200 ) {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( 'There was a problem connecting to ', 'dsm-supreme-modules-pro-for-divi' ) . DSM_PRO_APP_API_URL . ' (This issue could be related to a block on our domain by your hosting provider. Please reach out to your host for further information)',
					);
					return;
				}

				$response_block = json_decode( $data['body'] );
				$response_block = $response_block[ count( $response_block ) - 1 ];

				if ( is_object( $response_block ) ) {
					if ( $response_block->status == 'success' && $response_block->status_code == 's201' ) {
							// the license is active and the software is active.
							$slt_form_submit_messages[] = array(
								'type' => 'updated',
								'text' => $response_block->message,
							);

							$license_data = get_site_option( 'dsm_pro_license' );

							// save the license.
							$license_data['key']         = '';
							$license_data['last_check']  = time();
							$license_data['expiry_date'] = '';

							update_site_option( 'dsm_pro_license', $license_data );
					} elseif ( 'e002' === $response_block->status_code || 'e104' === $response_block->status_code || 'e211' === $response_block->status_code || 'e110' === $response_block->status_code ) { // if message code is e104  force de-activation.
							$license_data = get_site_option( 'dsm_pro_license' );
							// save the license.
							$license_data['key']         = '';
							$license_data['last_check']  = time();
							$license_data['expiry_date'] = '';

							update_site_option( 'dsm_pro_license', $license_data );

							$slt_form_submit_messages[] = array(
								'type' => 'error',
								'text' => __( 'There was a problem deactivating the licence: ', 'dsm-supreme-modules-pro-for-divi' ) . $response_block->message,
							);

					} else {
						$slt_form_submit_messages[] = array(
							'type' => 'error',
							'text' => __( 'There was a problem deactivating the licence: ', 'dsm-supreme-modules-pro-for-divi' ) . $response_block->message,
						);
						return;
					}
				} else {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( 'There was a problem with the data block received from ', 'dsm-supreme-modules-pro-for-divi' ) . DSM_PRO_APP_API_URL,
					);
					return;
				}

				/*
				// redirect
				$current_url = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

				wp_redirect( $current_url );
				die();
				*/

			}
			if ( isset( $_POST['dsm_pro_license_form_submit'] ) && isset( $_POST['dsm_pro_license_activate'] ) && isset( $_POST['dsm_pro_license'] ) && wp_verify_nonce( sanitize_key( $_POST['dsm_pro_license'] ), 'dsm_pro_license' ) ) {

				$license_key = isset( $_POST['license_key'] ) ? trim( sanitize_key( $_POST['license_key'] ) ) : '';

				if ( '' === $license_key ) {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( "Licence key can't be empty", 'dsm-supreme-modules-pro-for-divi' ),
					);
					return;
				}

				// build the request query.
				$args        = array(
					'woo_sl_action'     => 'activate',
					'licence_key'       => $license_key,
					'product_unique_id' => DSM_PRODUCT_ID,
					'domain'            => DSM_PRO_INSTANCE,
				);
				$request_uri = DSM_PRO_APP_API_URL . '?' . http_build_query( $args, '', '&' );
				$data        = wp_remote_get( $request_uri );

				if ( is_wp_error( $data ) || 200 !== $data['response']['code'] ) {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( 'There was a problem connecting to ', 'dsm-supreme-modules-pro-for-divi' ) . DSM_PRO_APP_API_URL . ' (This issue could be related to a block on our domain by your hosting provider. Please reach out to your host for further information)',
					);
					return;
				}

				$response_block = json_decode( $data['body'] );
				// retrieve the last message within the $response_block
				$response_block = $response_block[ count( $response_block ) - 1 ];
				if ( is_object( $response_block ) ) {
					if ( 'success' === $response_block->status && ( 's100' === $response_block->status_code || 's101' === $response_block->status_code ) ) {
							// the license is active and the software is active.
							$slt_form_submit_messages[] = array(
								'type' => 'updated',
								'text' => $response_block->message,
							);

							$license_data = get_site_option( 'dsm_pro_license' );
							// save the license.
							$license_data['key']        = $license_key;
							$license_data['last_check'] = time();
							// $license_data['expiry_date'] = $response_block->licence_expire;

							update_site_option( 'dsm_pro_license', $license_data );
					} else {
						$slt_form_submit_messages[] = array(
							'type' => 'error',
							'text' => __( 'There was a problem activating the licence: ', 'dsm-supreme-modules-pro-for-divi' ) . $response_block->message,
						);
						return;
					}
				} else {
					$slt_form_submit_messages[] = array(
						'type' => 'error',
						'text' => __( 'There was a problem with the data block received from ', 'dsm-supreme-modules-pro-for-divi' ) . DSM_PRO_APP_API_URL,
					);
					return;
				}

				/*
				// redirect
				$current_url = 'http' . ( isset( $_SERVER['HTTPS'] ) ? 's' : '' ) . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

				wp_redirect( $current_url );
				die();
				*/

			}
		}

		function licence_form() {
			?>
				<div class="wrap">
					<h2><?php esc_html_e( 'Divi Supreme Pro License', 'dsm-supreme-modules-pro-for-divi' ); ?></h2>
					<form id="form_data" name="form" method="post">
						<div class="postbox" style="padding: 0px 25px 25px; margin-top: 10px;">
							<?php wp_nonce_field( 'dsm_pro_license', 'dsm_pro_license' ); ?>
							<input type="hidden" name="dsm_pro_license_form_submit" value="true" />
							<input type="hidden" name="dsm_pro_license_activate" value="true" />
							<table class="form-table">
								<tbody>
									<tr>
										<th scope="row"><label for="blogname">License</label></th>
										<td><input type="password" value="" name="license_key" class="text-input"></td>
									</tr>
								</tbody>
							</table>
							<div class="explain"><?php esc_html_e( 'If you forgotten/lost your the license key, you can always retrieve it from your ', 'dsm-supreme-modules-pro-for-divi' ); ?> <a href="https://divisupreme.com/my-account/" target="_blank"><?php esc_html_e( 'Divi Supreme Account', 'dsm-supreme-modules-pro-for-divi' ); ?></a>. <?php esc_html_e( 'More license keys can be generate from your account.', 'dsm-supreme-modules-pro-for-divi' ); ?></a> 
							</div>
						</div>                        
						<p class="submit">
							<input type="submit" name="Submit" class="button-primary dsm-admin-button" value="<?php esc_html_e( 'Activate', 'dsm-supreme-modules-pro-for-divi' ); ?>">
						</p>
					</form> 
				</div> 
			<?php
		}

		function licence_deactivate_form() {
			$license_data       = get_site_option( 'dsm_pro_license' );
			$licese_data_key    = esc_attr( $license_data['key'] );
			$licese_data_expiry = ! empty( $license_data['expiry_date'] ) ? new DateTime( $license_data['expiry_date'] ) : '';
			$licese_expiry      = '' !== $licese_data_expiry ? $licese_data_expiry->format( 'd F Y' ) : __( 'Reactivate license key to get latest expiry date.', 'dsm-supreme-modules-pro-for-divi' );
			/*
			if(is_multisite())
				{
					?>
						<div class="wrap">
							<h2><?php _e( "Divi Supreme Pro License", 'dsm-supreme-modules-pro-for-divi' ) ?></h2>
					<?php
				}
			*/
			?>
			<div class="notice notice-success"><p><?php esc_html_e( 'Your Divi Supreme Pro license has been activated.', 'dsm-supreme-modules-pro-for-divi' ); ?></p></div>
			<div class="wrap"> 
				<h2><?php esc_html_e( 'Divi Supreme Pro License', 'dsm-supreme-modules-pro-for-divi' ); ?></h2>
				<form id="form_data" name="form" method="post">    
					<div class="postbox" style="padding: 0px 25px 25px;">
					<?php wp_nonce_field( 'dsm_pro_license', 'dsm_pro_license' ); ?>
					<input type="hidden" name="dsm_pro_license_form_submit" value="true" />
					<input type="hidden" name="dsm_pro_licence_deactivate" value="true" />
					<table class="form-table">
						<tbody>
							<tr>
								<th scope="row"><label for="blogname">License Key</label></th>
								<td>
									<b><?php echo esc_attr( substr( $licese_data_key, 0, 20 ) ); ?>-xxxxxxxx-xxxxxxxx</b></td>
									
							</tr>
						</tbody>
					</table>
						<div class="explain"><?php esc_html_e( 'You can generate more keys from your ', 'dsm-supreme-modules-pro-for-divi' ); ?> <a href="https://divisupreme.com/my-account/" target="_blank">Divi Supreme Account</a> 
						</div>
					</div>
					<a class="button-secondary dsm-admin-button-cancel" title="Deactivate" href="javascript: void(0)" onclick="jQuery(this).closest('form').submit();">Deactivate</a>
				</form>
			</div>
				<?php
				/*
				if(is_multisite()) {
				?>
				</div>
				<?php
				}*/
		}

		/*
		function licence_multisite_require_nottice() {
		?>
			<div class="wrap">
				<div id="icon-settings" class="icon32"></div>
				<h2><?php _e( "General Settings", 'dsm-supreme-modules-pro-for-divi' ) ?></h2>

				<h2 class="subtitle"><?php _e( "Software License", 'dsm-supreme-modules-pro-for-divi' ) ?></h2>
				<div id="form_data">
					<div class="postbox">
						<div class="section section-text ">
							<h4 class="heading"><?php _e( "License Key Required", 'dsm-supreme-modules-pro-for-divi' ) ?>!</h4>
							<div class="option">
								<div class="explain"><?php _e( "Enter the License Key you got when bought this product. If you lost the key, you can always retrieve it from", 'dsm-supreme-modules-pro-for-divi' ) ?> <a href="http://www.nsp-code.com/premium-plugins/my-account/" target="_blank"><?php _e( "My Account", 'dsm-supreme-modules-pro-for-divi' ) ?></a><br />
								<?php _e( "More keys can be generate from", 'dsm-supreme-modules-pro-for-divi' ) ?> <a href="https://divisupreme.com/my-account/" target="_blank"><?php _e( "My Account", 'dsm-supreme-modules-pro-for-divi' ) ?></a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php

		}*/
		// End of License.
	}

endif;
new DSM_Settings();
