<?php

define( 'DIVILIFE_EDD_DIVIOVERLAYS_URL', 'https://divilife.com' );
define( 'DIVILIFE_EDD_DIVIOVERLAYS_ID', 48763 );
define( 'DIVILIFE_EDD_DIVIOVERLAYS_NAME', 'Divi Overlays' );
define( 'DIVILIFE_EDD_DIVIOVERLAYS_AUTHOR', 'Tim Strifler' );
define( 'DIVILIFE_EDD_DIVIOVERLAYS_VERSION', DOV_VERSION );
define( 'DIVILIFE_EDD_DIVIOVERLAYS_PAGE_SETTINGS', 'dovs-settings' );

// the name of the settings page for the license input to be displayed
define( 'DIVILIFE_EDD_DIVIOVERLAYS_LICENSE_PAGE', 'divioverlays-license' );

function divilife_edd_divioverlays_updater() {
	
	// retrieve our license key from the DB
	$license_key = trim( get_option( 'divilife_edd_divioverlays_license_key' ) );
	
	// setup the updater
	$edd_updater = new edd_divioverlays( DIVILIFE_EDD_DIVIOVERLAYS_URL, DOV_PLUGIN_BASENAME, array(
			'version' 	=> DIVILIFE_EDD_DIVIOVERLAYS_VERSION,
			'license' 	=> $license_key,
			'item_name' => DIVILIFE_EDD_DIVIOVERLAYS_NAME,
			'author' 	=> DIVILIFE_EDD_DIVIOVERLAYS_AUTHOR,
			'beta'		=> false
		)
	);
}
add_action( 'admin_init', 'divilife_edd_divioverlays_updater', 0 );


add_action( 'admin_menu', array( 'DiviOverlays_EDD', 'add_admin_submenu' ), 5 );

// et_epanel_admin_scripts function no longer exist on Divi Builder plugin. Keep it here as backward compatibility for lower version.
if ( ! function_exists( 'et_epanel_admin_scripts' ) ) {
	
	function et_epanel_admin_scripts() {
		
		if ( ! wp_style_is( 'et-core-admin', 'enqueued' ) ) {
			
			wp_enqueue_style( 'divi-overlays-admin-et-core-admin-epanel', DOV_PLUGIN_URL . 'assets/css/admin/core.css', array(), DOV_VERSION );
		}
		
		wp_enqueue_style( 'divi-overlays-admin-epanel-style', DOV_PLUGIN_URL . 'assets/css/admin/panel.css', array(), DOV_VERSION );
	}
}

class DiviOverlays_EDD {
	
	private static $_show_errors = FALSE;
	private static $initiated = FALSE;
	private static $helper_admin = NULL;
	
	public static $helper = NULL;
	
	/**
	 * Holds the values to be used in the fields callbacks
	 */
	public static $options;
	
	
	public static function add_admin_submenu() {
		
		if ( DOV_UPDATER === TRUE ) {
		
			$settings_page = 'divilife_edd_divioverlays_license';
			
			if ( isset( $_POST['option_page'] ) && $_POST['option_page'] === $settings_page && isset( $_POST['action'] ) ) { // phpcs:ignore WordPress.Security.NonceVerification.NoNonceVerification -- logic for nonce checks are following
				if ( isset( $_POST['_wpnonce'] ) && wp_verify_nonce( $_POST['_wpnonce'], 'dov_nonce' ) ) {
					
					self::save_data();
				}
			}
			
			// Admin page
			add_submenu_page( 'edit.php?post_type=divi_overlay', 'Divi Overlays', 'Settings', 'edit_posts', 'dovs-settings', array( 'DiviOverlays_EDD', 'admin_settings' ) );
		}
	}
	
	
	public static function admin_settings() {
		
		add_action( 'admin_init', 'et_epanel_css_admin' );
		
		self::display_configuration_page();
	}
	

	private static function save_data() {
		
		check_admin_referer( 'dov_nonce' );

		if ( ! current_user_can( 'edit_theme_options' ) ) {
			wp_die();
		}
		
		if ( isset( $_POST['divilife_divioverlays_gdpr'] ) ) {
			
			$gdpr = sanitize_text_field( wp_unslash( $_POST['divilife_divioverlays_gdpr'] ) );
			
			update_option( 'divilife_divioverlays_gdpr', $gdpr );
		}
		else {
			
			update_option( 'divilife_divioverlays_gdpr', '' );
		}
		
		if ( isset( $_POST['divilife_edd_divioverlays_license_key'] ) && $_POST['divilife_edd_divioverlays_license_key'] !== '*******' ) {
			
			$license_key = '';
			
			if ( isset( $_POST['divilife_edd_divioverlays_license_key'] ) ) {
				
				$license_key = sanitize_text_field( wp_unslash( $_POST['divilife_edd_divioverlays_license_key'] ) );
			}
			
			if ( strlen( $license_key ) > 25 ) {
			
				update_option( 'divilife_edd_divioverlays_license_key', $license_key );
			
				divilife_edd_divioverlays_activate_license();
			}
			else {
			
				update_option( 'divilife_edd_divioverlays_license_key', '' );
				update_option( 'divilife_edd_divioverlays_license_status', '' );
				
				divilife_edd_divioverlays_deactivate_license();
			}
		}
		
		$base_url = admin_url( 'edit.php?post_type=divi_overlay&page=dovs-settings' );
		
		$redirect = add_query_arg( array( 'divilife' => 'divioverlays' ), $base_url );
		
		wp_redirect( $redirect );
		exit();
	}

	
	public static function display_configuration_page() {
		
		if ( function_exists( 'et_epanel_admin_scripts' ) ) {
			
			et_epanel_admin_scripts('');
		}
		
		DiviOverlays_EDD::$options = get_option( 'dov_settings' );
	
	$license = get_option( 'divilife_edd_divioverlays_license_key' );
	$status  = get_option( 'divilife_edd_divioverlays_license_status' );
	$check_license = divilife_edd_divioverlays_check_license( TRUE );
	
	if ( $license != '' ) {
		
		$license = '*******';
	}
	
	$daysleft = 0;
	if ( isset( $check_license->expires ) && $check_license->expires != 'lifetime' ) {
		
		$license_expires = strtotime( $check_license->expires );
		$now = strtotime('now');
		$timeleft = $license_expires - $now;
		
		$daysleft = round( ( ( $timeleft / 24 ) / 60 ) / 60 );
		if ( $daysleft > 0 ) {
			
			$daysleft = '( ' . ( ( $daysleft > 1 ) ? $daysleft . ' days left' : $daysleft . ' day left' ) . ' )';
			
		} else {
			
			$daysleft = '';
		}
	}
			
	$gdpr = get_option( 'divilife_divioverlays_gdpr' );
	
	if ( isset( $gdpr ) ) {
		
		if ( $gdpr === 'on' ) {
			
			$gdpr = '1';
			
		} else if ( $gdpr === '' ) {
			
			$gdpr = '0';
		}
	}
	else {
		
		$gdpr = '0';
	}
	
	?>
		<div id="wrapper">
		  <div id="panel-wrap">
		  
				<form method="post" action="options.php">
				
					<div id="epanel-wrapper">
						<div id="epanel" class="et-onload">
							<div id="epanel-content-wrap">
								<div id="epanel-header" class="ui-tabs ui-widget ui-widget-content ui-corner-all">
									<h1 id="epanel-title"><?php _e('Divi Overlays - Settings'); ?></h1>
								</div>
								<div id="epanel-content">
								
									<div class="et-tab-content ui-widget-content ui-corner-bottom" aria-hidden="false">
										
										<div class="et-epanel-box et-epanel-box-small-1">
											<div class="et-box-title"><h3><?php esc_html_e( 'GDPR compatible', 'DiviOverlays' ); ?></h3></div>
											<div class="et-box-content">
												<input type="checkbox" class="et-checkbox yes_no_button" name="divilife_divioverlays_gdpr" id="divilife_divioverlays_gdpr" <?php checked( $gdpr, 1 ); ?>>
												<div class="et_pb_yes_no_button<?php if ( $gdpr == 0 ) { ?> et_pb_off_state<?php } else if ( $gdpr == 1 ) { ?> et_pb_on_state<?php } ?>">
													<span class="et_pb_value_text et_pb_on_value">Enabled</span>
													<span class="et_pb_button_slider"></span>
													<span class="et_pb_value_text et_pb_off_value">Disabled</span>
												</div>
											</div>
										</div>
									
										<div class="et-epanel-box">
											<?php settings_fields('divilife_edd_divioverlays_license'); ?>

											<div class="et-box-title"><h3><?php _e('License Key'); ?></h3></div>
											<div class="et-box-content">
												<label class="description" for="divilife_edd_divioverlays_license_key"></label>
												<input id="divilife_edd_divioverlays_license_key" name="divilife_edd_divioverlays_license_key" type="text" class="regular-text" value="<?php esc_attr_e( $license ); ?>" />
											</div>
										</div>
										
										<?php if ( FALSE !== $license && $check_license->license != 'invalid' ) { ?>
										
											<div class="et-epanel-box">
												<div class="et-box-title"><h3><?php _e('License Status'); ?></h3></div>
												<div class="et-box-content">
													<?php 
														if ( $status !== false && $check_license->license == 'valid' ) {
															
															print '
															<p class="inputs"><span class="jquery-checkbox"><span class="mark"></span></span></p><br><br>';
														}
														else {
															
															if ( $check_license->license == 'expired' ) {
															
																print '<span class="dashicons dashicons-no-alt dashicons-fail dashicons-large"></span>';
																print '&nbsp;&nbsp;<span class="small-text">( Expired on ' . date( 'F d, Y', strtotime( $check_license->expires ) ) . ' )</span>';
															}
															
															if ( $check_license->license == NULL && $status !== false ) {
																
																print '<span class="dashicons dashicons-no-alt dashicons-fail dashicons-large"></span>';
																print '&nbsp;&nbsp;<span class="small-text">( Cannot retrieve license status from Divi Life server. Please contact Divi Life support. )</span>';
															}
														}
													?>
												</div>
											</div>
											<?php
											
											if ( $status !== false ) { 
												
												if ( $daysleft != '' && $check_license->license == 'valid' ) { ?>
												<div class="et-epanel-box">
													<div class="et-box-title"><h3><?php _e('License Expires on'); ?></h3></div>
													<div class="et-box-content">
														<h4 class="no-margin">
															<?php print date( 'F d, Y', strtotime( $check_license->expires ) ); ?>
															<?php print $daysleft; ?>
														</h4>
													</div>
												</div>
												<?php
												}
											}
											?>
										
										<?php } ?>
										
									</div>
					
								</div> <!-- end epanel-content div -->
							</div> <!-- end epanel-content-wrap div -->
						</div> <!-- end epanel div -->
					</div> <!-- end epanel-wrapper div -->
					
					<div id="epanel-bottom">
						<?php wp_nonce_field( 'dov_nonce' ); ?>
						<button class="et-save-button" name="dov_save" id="dov-save"><?php esc_html_e( 'Save Changes', 'DiviOverlay' ); ?></button>
					</div>

				</form>
				
			</div> <!-- end panel-wrap div -->
		</div> <!-- end wrapper div -->
			<?php
	
	}
	
	// Divi Overlay settings
	public static function register_dovs_settings( $args ) {
				
		register_setting( 
			'dovs_settings', 
			'dov_settings', 
			array( 'DiviOverlays_EDD', 'sanitize' )
		);
		
		add_settings_section(
			'dov_settings_description',
			'Settings',
			array( 'DiviOverlays_EDD', 'doDescriptionSettings' ),
			'dovs-settings'
		);  
		
		$options = array( 
			'type' => 'select',
			'name' => 'dov_timezone',
			'default_value' => DOV_SERVER_TIMEZONE
		);
		
		add_settings_field(
			'dov_timezone', 
			'Default Time Zone', 
			array( 'DiviOverlays_EDD', 'doParseFields' ),
			'dovs-settings', 
			'dov_settings_description',
			$options
		);
	}
	
	public static function doDescriptionSettings() {
		print '';
	}

	/**
	 * Sanitize each setting field as needed
	 *
	 * @param array $input Contains all settings fields as array keys
	 */
	public static function sanitize( $input ) {
		
		$new_input = array();
		
		if ( isset( $input['dov_timezone'] ) ) {
			
			$new_input['dov_timezone'] = sanitize_text_field( $input['dov_timezone'] );
		}
		
		return $new_input;
	}

	public static function doParseFields( $options ) {
		
		$field_type = isset( $options['type'] ) ? $options['type'] : '';
		
		$field_name = $optionname = isset( $options['name'] ) ? $options['name'] : '';
		
		$field_default_value = isset( $options['default_value'] ) ? $options['default_value'] : '';
		
		if ( 'text' == $field_type ) {
			
			printf(
				'<input type="text" id="' . $field_name . '" name="dov_settings[' . $field_name . ']" value="%s" />',
				isset( self::$options[ $field_name ] ) ? esc_attr( self::$options[ $field_name ] ) : $field_default_value
			);
		}
		else if ( 'select' == $field_type ) {
			
			$valid_options = array();
			
			$selected = isset( self::$options[ $field_name ] ) ? esc_attr( self::$options[ $field_name ] ) : $field_default_value;
			
			if ( $selected != $field_default_value ) {
				
				$field_default_value = $selected;
			}
			
			?>
			<select name="dov_settings[<?php print $field_name; ?>]" data-defaultvalue="<?php print $field_default_value ?>" class="select-<?php print $options['name'] ?>">
			<?php
			
			if ( isset( $options['options'] ) ) {
			
				foreach ( $options['options'] as $option ) {
					
					?>
					<option <?php selected( $selected, $option['value'] ); ?> value="<?php print $option['value']; ?>"><?php print $option['title']; ?></option>
					<?php
				}
			}
			
			?>
			</select>
			<?php
		}
	}
}
add_action( 'admin_init', array( 'DiviOverlays_EDD', 'register_dovs_settings' ) );


function divilife_edd_divioverlays_register_option() {
	
	// creates our settings in the options table
	register_setting('divilife_edd_divioverlays_license', 'divilife_edd_divioverlays_license_key', 'divilife_edd_divioverlays_sanitize_license' );
}
add_action('admin_init', 'divilife_edd_divioverlays_register_option');


function divilife_divioverlays_register_global_options() {
	
	register_setting('divilife_divioverlays_settings', 'divilife_divioverlays_gdpr', array( 'string' ) );
	
}
add_action('admin_init', 'divilife_divioverlays_register_global_options');


function divilife_edd_divioverlays_sanitize_license( $new ) {
	
	$old = get_option( 'divilife_edd_divioverlays_license_key' );
	
	if( $old && $old != $new ) {
		
		delete_option( 'divilife_edd_divioverlays_license_status' ); // new license has been entered, so must reactivate
	}
	
	return $new;
}


function divilife_edd_divioverlays_activate_license() {

	// listen for our activate button to be clicked
	if ( isset( $_POST['divilife_edd_divioverlays_license_key'] ) ) {
		
		$base_url = admin_url( 'edit.php?post_type=divi_overlay&page=dovs-settings' );
		
		// retrieve the license from the database
		$license = trim( get_option( 'divilife_edd_divioverlays_license_key' ) );
		
		$message = '';
		
		
		// data to send in our API request
		$api_params = array(
			'edd_action' => 'activate_license',
			'license'    => $license,
			'item_name'  => urlencode( DIVILIFE_EDD_DIVIOVERLAYS_NAME ), // the name of our product in EDD
			'url'        => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( DIVILIFE_EDD_DIVIOVERLAYS_URL, array( 'timeout' => 15, 'body' => $api_params ) );

		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				
				$message = $response->get_error_message();
				
			} else {
				
				$message = __( 'Cannot retrieve any response from Divi Life server. Please contact Divi Life support.' );
			}

		} else {

			$license_data = json_decode( wp_remote_retrieve_body( $response ) );

			if ( false === $license_data->success ) {

				switch( $license_data->error ) {

					case 'expired' :

						$message = sprintf(
							__( 'Your license key expired on %s.' ),
							date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
						);
						break;

					case 'revoked' :

						$message = __( 'Your license key has been disabled.' );
						break;

					case 'missing' :

						$message = __( 'Invalid license.' );
						break;

					case 'invalid' :
					case 'site_inactive' :

						$message = __( 'Your license is not active for this URL.' );
						break;

					case 'item_name_mismatch' :

						$message = sprintf( __( 'This appears to be an invalid license key for %s.' ), DIVILIFE_EDD_DIVIOVERLAYS_NAME );
						break;

					case 'no_activations_left':

						$message = __( 'Your license key has reached its activation limit.' );
						break;

					default :

						$message = __( 'An error occurred. Please contact Divi Life support.' );
						break;
				}

			}

		}

		// Check if anything passed on a message constituting a failure
		if ( ! empty( $message ) ) {
			
			update_option( 'divilife_edd_divioverlays_license_key', '' );
			update_option( 'divilife_edd_divioverlays_license_status', '' );
			
			$redirect = add_query_arg( array( 'message' => urlencode( $message ), 'divilife' => 'divioverlays' ), $base_url );
			
			wp_redirect( $redirect );
			exit();
		}
		else {
		
			update_option( 'divilife_edd_divioverlays_license_status', $license_data->license );
			wp_redirect( $base_url );
			exit();
		}
	}
}


function divilife_edd_divioverlays_deactivate_license() {

	// listen for our activate button to be clicked
	if ( isset( $_POST['divilife_edd_divioverlays_license_key'] ) ) {
		
		// retrieve the license from the database
		$license = trim( get_option( 'divilife_edd_divioverlays_license_key' ) );


		// data to send in our API request
		$api_params = array(
			'edd_action' => 'deactivate_license',
			'license'    => $license,
			'item_name'  => urlencode( DIVILIFE_EDD_DIVIOVERLAYS_NAME ), // the name of our product in EDD
			'url'        => home_url()
		);

		// Call the custom API.
		$response = wp_remote_post( DIVILIFE_EDD_DIVIOVERLAYS_URL, array( 'timeout' => 15, 'body' => $api_params ) );
		
		// make sure the response came back okay
		if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {

			if ( is_wp_error( $response ) ) {
				$message = $response->get_error_message();
			} else {
				$message = __( 'An error occurred, please try again.' );
			}

			$base_url = admin_url( 'edit.php?post_type=divi_overlay&page=dovs-settings' );
			$redirect = add_query_arg( array( 'message' => urlencode( $message ), 'divilife' => 'divioverlays' ), $base_url );

			wp_redirect( $redirect );
			exit();
		}

		// decode the license data
		$license_data = json_decode( wp_remote_retrieve_body( $response ) );

		// $license_data->license will be either "deactivated" or "failed"
		if( $license_data->license == 'deactivated' ) {
			delete_option( 'divilife_edd_divioverlays_license_status' );
		}

		wp_redirect( admin_url( 'edit.php?post_type=divi_overlay&page=dovs-settings' ) );
		exit();

	}
}


/**
 * This is a means of catching errors from the activation method above and displaying it to the customer
 */
function divilife_edd_divioverlays_admin_notices() {
	if ( isset( $_GET['divilife'] ) && ! empty( $_GET['message'] ) && $_GET['divilife'] == 'divioverlays' ) {

		$message = urldecode( $_GET['message'] );
		?>
		<div class="notice notice-error">
			<p><?php echo $message; ?></p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'divilife_edd_divioverlays_admin_notices' );


function divilife_edd_divioverlays_get_home_url( $blog_id = null, $path = '', $scheme = null ) {
	
    global $pagenow;
 
    $orig_scheme = $scheme;
 
    if ( empty( $blog_id ) || ! is_multisite() ) {
        $url = get_option( 'home' );
    } else {
        switch_to_blog( $blog_id );
        $url = get_option( 'home' );
        restore_current_blog();
    }
 
    if ( ! in_array( $scheme, array( 'http', 'https', 'relative' ), true ) ) {
        if ( is_ssl() && ! is_admin() && 'wp-login.php' !== $pagenow ) {
            $scheme = 'https';
        } else {
            $scheme = parse_url( $url, PHP_URL_SCHEME );
        }
    }
 
    $url = set_url_scheme( $url, $scheme );
 
    if ( $path && is_string( $path ) ) {
        $url .= '/' . ltrim( $path, '/' );
    }
	
	return $url;
}

function divilife_edd_divioverlays_check_license( $msg = FALSE ) {

	global $wp_version;

	$license = trim( get_option( 'divilife_edd_divioverlays_license_key' ) );

	$api_params = array(
		'edd_action' => 'check_license',
		'license' => $license,
		'item_name' => urlencode( DIVILIFE_EDD_DIVIOVERLAYS_NAME ),
		'url'       => divilife_edd_divioverlays_get_home_url()
	);

	// Call the custom API.
	$response = wp_remote_post( DIVILIFE_EDD_DIVIOVERLAYS_URL, array( 'timeout' => 15, 'body' => $api_params ) );

	if ( is_wp_error( $response ) )
		return false;

	$license_data = json_decode( wp_remote_retrieve_body( $response ) );
	
	if ( $license_data->license == 'valid' ) {
		
		if ( $msg ) {
			
			return $license_data;
			
		} else {
		
			return TRUE;
		}
		
	} else {
		
		if ( $msg ) {
			
			return $license_data;
			
		} else {
		
			return FALSE;
		}
	}
}


/**
 * Displays an inactive notice when the plugin is inactive.
 */
function divilife_edd_divioverlays_inactive_notice() {
	
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	
	if ( isset( $_GET[ 'page' ] ) && DIVILIFE_EDD_DIVIOVERLAYS_PAGE_SETTINGS == $_GET[ 'page' ] ) {
		return;
	}
	
	$status = get_option( 'divilife_edd_divioverlays_license_status' );
	if ( $status === false ) {
	
		?>
		<div class="notice notice-error">
			<p>
			<?php 
			
			printf(
				__( 'The <strong>%s</strong> API Key has not been activated, so the plugin is inactive! %sClick here%s to activate <strong>%s</strong>.', DIVILIFE_EDD_DIVIOVERLAYS_NAME ), 
				esc_attr( DIVILIFE_EDD_DIVIOVERLAYS_NAME ), 
				'<a href="' . esc_url( admin_url( 'edit.php?post_type=divi_overlay&page=dovs-settings' ) ) . '">', 
				'</a>', esc_attr( DIVILIFE_EDD_DIVIOVERLAYS_NAME )
			);
			
			?>
			</p>
		</div>
		<?php
	}
}
add_action( 'admin_notices', 'divilife_edd_divioverlays_inactive_notice', 0 );


