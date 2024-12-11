<?php

class Dp_Dfg_License {


	/**
	 * Admin notice to inform the user about inactive license.
	 *
	 * @since 1.0.0
	 */
	public function notice_activation_license_require() {
		global $pagenow;
		if ( 'plugins.php' === $pagenow ) {
			echo sprintf( '<div class="notice notice-info is-dismissible"><p>%1$s <a href="plugins.php?page=%2$s">%3$s</a></p></div>', __( 'Please activate your Divi FilterGrid license to receive support and automatic updates.', 'dpdfg-dp-divi-filtergrid' ), 'dp_divi_plugins_menu', __( 'Activation Page', 'dpdfg-dp-divi-filtergrid' ) );
		}
	}

	/**
	 * Init the plugin updater
	 *
	 * @since 1.0.0
	 */
	public function init_plugin_updater() {
		// To support auto-updates, this needs to run during the wp_version_check cron job for privileged users.
		$doing_cron = defined( 'DOING_CRON' ) && DOING_CRON;
		if ( ! current_user_can( 'manage_options' ) && ! $doing_cron ) {
			return;
		}
		$license_key = trim( get_option( 'dpdfg_license_key' ) );
		new Dp_Dfg_Updater(
			DPDFG_STORE_URL,
			DPDFG_DIR . 'dp-divi-filtergrid.php',
			array(
				'version'   => DPDFG_VERSION,
				'license'   => $license_key,
				'item_id'   => DPDFG_ITEM_ID,
				'item_name' => DPDFG_ITEM_NAME,
				'author'    => 'Divi Plugins',
				'beta'      => false,
			)
		);
	}

	/**
	 * Plugin license page html output
	 *
	 * @since 1.0.0
	 */
	public function license_html() {
		$license = get_option( 'dpdfg_license_key' );
		$status  = get_option( 'dpdfg_license_status' );
		echo sprintf( '<div class="dp-license-block"><h2>%1$s</h2>', __( 'Divi FilterGrid License', 'dpdfg-dp-divi-filtergrid' ) );
		echo '<form method="post" action="options.php">';
		settings_fields( 'dpdfg_license' );
		echo sprintf( '<table class="form-table"><tbody><tr><th scope="row">%1$s</th>', __( 'License Key', 'dpdfg-dp-divi-filtergrid' ) );
		echo sprintf( '<td><input id="dpdfg_license_key" name="dpdfg_license_key" type="password" class="regular-text" placeholder="%2$s" value="%1$s" /><label class="description" for="dpdfg_license_key"></label></td></tr>', esc_attr__( $license ), __( 'Enter your license key', 'dpdfg-dp-divi-filtergrid' ) );
		echo sprintf( '<tr><th scope="row">%1$s</th><td>', __( 'License Status', 'dpdfg-dp-divi-filtergrid' ) );
		if ( $status === 'valid' ) {
			echo sprintf( '<span class="active">%1$s</span>', __( 'Active', 'dpdfg-dp-divi-filtergrid' ) );
			wp_nonce_field( 'dpdfg_license_nonce', 'dpdfg_license_nonce' );
			echo sprintf( '<input type="submit" class="button-secondary" name="dpdfg_license_deactivate" value="%1$s"/>', __( 'Deactivate License', 'dpdfg-dp-divi-filtergrid' ) );
		} else {
			echo sprintf( '<span class="inactive">%1$s</span>', __( 'Inactive', 'dpdfg-dp-divi-filtergrid' ) );
			wp_nonce_field( 'dpdfg_license_nonce', 'dpdfg_license_nonce' );
			echo sprintf( '<input type="submit" class="button-secondary" name="dpdfg_license_activate" value="%1$s"/>', __( 'Activate License', 'dpdfg-dp-divi-filtergrid' ) );
		}
		echo '</td></tr>';
		echo '</tbody></table></form></div>';
	}

	/**
	 * Register license option name dpdfg_license_key
	 *
	 * @since 1.0.0
	 */
	public function register_license_option() {
		register_setting(
			'dpdfg_license',
			'dpdfg_license_key',
			array(
				$this,
				'sanitize_license',
			)
		);
	}

	/**
	 * Delete dpdfg_license_status option when change license key
	 *
	 * @since 1.0.0
	 */
	public function sanitize_license( $new ) {
		$old = get_option( 'dpdfg_license_key' );
		if ( $old && $old != $new ) {
			delete_option( 'dpdfg_license_status' );
		}

		return $new;
	}

	/**
	 * Handle the activation of the license key.
	 *
	 * @since 1.0.0
	 */
	public function activate_license() {
		if ( isset( $_POST['dpdfg_license_activate'] ) ) {
			if ( ! check_admin_referer( 'dpdfg_license_nonce', 'dpdfg_license_nonce' ) ) {
				return;
			}
			if ( $_POST['dpdfg_license_key'] !== get_option( 'dpdfg_license_key' ) ) {
				update_option( 'dpdfg_license_key', $_POST['dpdfg_license_key'] );
				$license = trim( $_POST['dpdfg_license_key'] );
			} else {
				$license = trim( get_option( 'dpdfg_license_key' ) );
			}
			$api_params    = array(
				'edd_action' => 'activate_license',
				'license'    => $license,
				'item_name'  => urlencode( DPDFG_ITEM_NAME ),
				'url'        => home_url(),
			);
			$response      = wp_remote_post(
				DPDFG_STORE_URL,
				array(
					'timeout'   => 15,
					'sslverify' => false,
					'body'      => $api_params,
				)
			);
			$response_code = wp_remote_retrieve_response_code( $response );
			$message       = '';
			if ( is_wp_error( $response ) || 200 !== $response_code ) {
				if ( is_wp_error( $response ) ) {
					$message = $response->get_error_message();
				} else {
					$message = __( 'An error occurred on the license server, please try again.', 'dpdfg-dp-divi-filtergrid' );
				}
			} else {
				$license_data = json_decode( wp_remote_retrieve_body( $response ) );
				if ( false === $license_data->success ) {
					switch ( $license_data->error ) {
						case 'expired':
							$message = sprintf(
								__( 'Your license key expired on %s.', 'dpdfg-dp-divi-filtergrid' ),
								date_i18n( get_option( 'date_format' ), strtotime( $license_data->expires, current_time( 'timestamp' ) ) )
							);
							break;
						case 'revoked':
							$message = __( 'Your license key has been disabled.', 'dpdfg-dp-divi-filtergrid' );
							break;
						case 'missing':
							$message = __( 'Invalid license.', 'dpdfg-dp-divi-filtergrid' );
							break;
						case 'invalid':
						case 'site_inactive':
							$message = __( 'Your license is not active for this URL.', 'dpdfg-dp-divi-filtergrid' );
							break;
						case 'item_name_mismatch':
							$message = sprintf( __( 'This appears to be an invalid license key for %s.', 'dpdfg-dp-divi-filtergrid' ), DPDFG_ITEM_NAME );
							break;
						case 'no_activations_left':
							$message = __( 'Your license key has reached its activation limit.', 'dpdfg-dp-divi-filtergrid' );
							break;
						default:
							$message = __( 'An error occurred with the license data, please try again.', 'dpdfg-dp-divi-filtergrid' );
							break;
					}
				}
				update_option( 'dpdfg_license_status', $license_data->license );
			}
			if ( ! empty( $message ) ) {
				$base_url = admin_url( 'plugins.php?page=dp_divi_plugins_menu&product=DPDFG' );
				$redirect = add_query_arg(
					array(
						'sl_activation' => 'false',
						'message'       => urlencode( $message ),
					),
					$base_url
				);
				wp_redirect( $redirect );
				exit();
			} else {
				wp_redirect( admin_url( 'plugins.php?page=dp_divi_plugins_menu' ) . '&sl_activation=true&message=OK&product=DPDFG' );
				exit();
			}
		}
	}

	/**
	 * Handle the deactivation of the license key.
	 *
	 * @since 1.0.0
	 */
	public function deactivate_license() {
		if ( isset( $_POST['dpdfg_license_deactivate'] ) ) {
			if ( ! check_admin_referer( 'dpdfg_license_nonce', 'dpdfg_license_nonce' ) ) {
				return;
			}
			$license    = trim( get_option( 'dpdfg_license_key' ) );
			$api_params = array(
				'edd_action' => 'deactivate_license',
				'license'    => $license,
				'item_name'  => urlencode( DPDFG_ITEM_NAME ),
				'url'        => home_url(),
			);
			$response   = wp_remote_post(
				DPDFG_STORE_URL,
				array(
					'timeout'   => 15,
					'sslverify' => false,
					'body'      => $api_params,
				)
			);
			if ( is_wp_error( $response ) || 200 !== wp_remote_retrieve_response_code( $response ) ) {
				if ( is_wp_error( $response ) ) {
					$message = $response->get_error_message();
				} else {
					$message = __( 'An error occurred, please try again.' );
				}
				$base_url = admin_url( 'plugins.php?page=dp_divi_plugins_menu&product=DPDFG' );
				$redirect = add_query_arg(
					array(
						'sl_activation' => 'false',
						'message'       => urlencode( $message ),
					),
					$base_url
				);
				wp_redirect( $redirect );
				exit();
			}
			delete_option( 'dpdfg_license_status' );
			wp_redirect( admin_url( 'plugins.php?page=dp_divi_plugins_menu&product=DPDFG' ) );
			exit();
		}
	}

	/**
	 * Admin notices after activation or deactivation of the license key
	 *
	 * @since 1.0.0
	 */
	public function notice_license_activation_result() {
		if ( isset( $_GET['sl_activation'] ) && $_GET['page'] === 'dp_divi_plugins_menu' && $_GET['product'] === 'DPDFG' ) {
			switch ( $_GET['sl_activation'] ) {
				case 'false':
					$message = urldecode( $_GET['message'] );
					?>
                    <div class="notice notice-error is-dismissible">
                        <p><?php echo $message; ?></p>
                    </div>
					<?php
					break;
				case 'true':
					?>
                    <div class="notice notice-success is-dismissible">
						<?php echo sprintf( '<p>%1$s</p>', __( 'Thank you for purchasing and activating Divi FilterGrid.', 'dpdfg-dp-divi-filtergrid' ) ); ?>
                    </div>
					<?php
					break;
			}
		}
	}

}
