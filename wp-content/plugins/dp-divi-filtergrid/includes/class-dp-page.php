<?php
if ( ! class_exists( 'DiviPlugins_Menu_Page' ) ) {
	class DiviPlugins_Menu_Page {

		public $divi_plugins_page = false;

		public function add_dp_page() {
			if ( current_user_can( 'manage_options' ) ) {
				global $submenu;
				$plugins_menu = isset( $submenu['plugins.php'] ) ? $submenu['plugins.php'] : array();
				array_walk_recursive( $plugins_menu, array(
					$this,
					'check_submenu'
				) );
				if ( ! $this->divi_plugins_page ) {
					add_plugins_page(
						'DiviPlugins',
						'DiviPlugins',
						'manage_options',
						'dp_divi_plugins_menu',
						array(
							$this,
							'diviplugins_html',
						)
					);
				}
			}
		}

		public function check_submenu( $val ) {
			if ( $val === 'dp_divi_plugins_menu' ) {
				$this->divi_plugins_page = true;
			}
		}

		public function diviplugins_html() {
			?>
            <div class="wrap"><?php
				echo sprintf( '<h1>%1$s</h1>', esc_attr( get_admin_page_title() ) );
				echo sprintf( '<h3>%1$s</h3>', esc_attr( __( 'Divi Plugins extend the functionality and features of the Divi Theme by Elegant Themes.', 'diviplugins' ) ) );
				?>
                <div id="diviplugins-menu-page">
                    <div class="dp-licenses">
						<?php
						do_action( 'diviplugins_page_add_license' );
						?>
                    </div>
                    <div class="dp-sidebar">
                        <div class="dp-support">
							<?php
							echo sprintf( '<h3>%1$s</h3><hr>', __( 'Need Support?', 'diviplugins' ) );
							?>
                            <ul>
								<?php
								echo sprintf( '<li><a href="%1$s" target="_blank">%2$s</a></li>', 'https://diviplugins.com/my-account/downloads/', __( 'Manage licenses', 'diviplugins' ) );
								echo sprintf( '<li><a href="%1$s" target="_blank">%2$s</a></li>', 'https://diviplugins.com/documentation/', __( 'Documentation', 'diviplugins' ) );
								echo sprintf( '<li><a href="%1$s" target="_blank">%2$s</a></li>', 'https://diviplugins.com/faqs/', __( 'FAQs', 'diviplugins' ) );
								echo sprintf( '<li><a href="%1$s" target="_blank">%2$s</a></li>', 'https://diviplugins.com/my-account/support/', __( 'Open a support ticket', 'diviplugins' ) );
								echo sprintf( '<li><a href="%1$s" target="_blank">%2$s</a></li>', 'https://diviplugins.com/modules/custom-modules/', __( 'Need a custom Divi module?', 'diviplugins' ) );
								echo sprintf( '<li><a href="%1$s" target="_blank">%2$s</a></li>', 'https://diviplugins.com/affiliate-area/', __( 'Affiliate program', 'diviplugins' ) );
								?>
                            </ul>
                        </div>
						<?php
						do_action( 'diviplugins_page_add_sidebar_content' );
						?>
                    </div>
                </div>
            </div>
            <style>
                :root {
                    --dp-color-black: #2d2d2d;
                    --dp-color-green: #6bd45b;
                    --dp-color-white-text: whitesmoke;
                }

                #diviplugins-menu-page {
                    display: flex;
                    justify-content: space-between;
                    flex-wrap: wrap;
                }

                #diviplugins-menu-page .dp-licenses {
                    width: 70%;
                }

                #diviplugins-menu-page .dp-sidebar {
                    width: 28%;
                }

                #diviplugins-menu-page .dp-sidebar h3 {
                    color: var(--dp-color-white-text);
                }

                #diviplugins-menu-page .dp-sidebar a {
                    color: var(--dp-color-green);
                    font-size: larger;
                    text-decoration: none;
                }

                @media screen and (max-width: 767px) {
                    #diviplugins-menu-page .dp-licenses {
                        width: 100%;
                    }

                    #diviplugins-menu-page .dp-sidebar {
                        width: 100%;
                    }
                }

                #diviplugins-menu-page .dp-sidebar div {
                    padding: 8px 16px;
                    margin-bottom: 16px;
                    background-color: var(--dp-color-black);
                }

                #diviplugins-menu-page .dp-license-block {
                    padding: 16px 24px 24px;
                    margin-bottom: 16px;
                    background-color: var(--dp-color-black);
                }

                #diviplugins-menu-page .dp-license-block h2 {
                    color: var(--dp-color-white-text);
                    font-size: 1.4em;
                }

                #diviplugins-menu-page .dp-license-block td,
                #diviplugins-menu-page .dp-license-block th {
                    padding: 8px 0;
                    margin: 0;
                    color: var(--dp-color-white-text);
                    vertical-align: middle;
                    font-size: 1.1em;
                }

                #diviplugins-menu-page .dp-license-block .button-primary {
                    color: var(--dp-color-black);
                    background-color: var(--dp-color-green);
                    border-color: var(--dp-color-green);;
                    font-weight: bold;
                }

                #diviplugins-menu-page .dp-license-block .button-secondary {
                    color: var(--dp-color-black);
                    font-weight: bold;
                }

                #diviplugins-menu-page .dp-license-block span {
                    font-weight: bold;
                    font-size: 22px;
                    padding: 0 12px;
                }

                #diviplugins-menu-page .dp-license-block span.active {
                    color: var(--dp-color-green);
                }

                #diviplugins-menu-page .dp-license-block span.inactive {
                    color: lightcoral;
                }
            </style>
			<?php
		}

	}

}
