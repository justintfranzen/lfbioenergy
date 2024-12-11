<?php

defined( 'ABSPATH' ) || exit;

/**
 * V2.2
 */

class DSM_PRO_licence {
	function __construct() {
		$licence_data = $this->get_licence_data();

		if ( isset( $licence_data['last_check'] ) ) {
			if ( time() < ( (int) $licence_data['last_check'] + ( 86400 * 2 ) ) ) {
				return;
			}
		}
		$this->licence_deactivation_check();
		// update_site_option( 'my_plugin_last_checked', time() );
	}
	/**
	 * Retrieve licence details
	 */
	public function get_licence_data() {
		$licence_data = get_site_option( 'dsm_pro_license' );

		$default      = array(
			'key'            => '',
			'last_check'     => 0,
			'licence_status' => '',
			'licence_expire' => '',
		);
		$licence_data = wp_parse_args( $licence_data, $default );

		return $licence_data;
	}
	/**
	 * Reset license data
	 *
	 * @param mixed $licence_data
	 */
	public function reset_licence_data( $licence_data ) {
		if ( ! is_array( $licence_data ) ) {
			$licence_data = array();
		}

		$licence_data['key']            = '';
		$licence_data['last_check']     = time();
		$licence_data['licence_status'] = '';
		$licence_data['licence_expire'] = '';

		return $licence_data;
	}

	/**
	 * Set licence data
	 *
	 * @param mixed $licence_data
	 */
	public function update_licence_data( $licence_data ) {
		update_site_option( 'dsm_pro_license', $licence_data );
	}

	public function licence_key_verify() {
		$licence_data = $this->get_licence_data();

		if ( $this->is_local_instance() ) {
			return true;
		}

		if ( ! isset( $licence_data['key'] ) || '' === $licence_data['key'] ) {
			return false;
		}

		return true;
	}

	public function is_local_instance() {
		return false;
	}

	public function licence_deactivation_check() {
		if ( ! $this->licence_key_verify() ) {
			return;
		}

		// do not trigger if on server API.
		$api_parse_url = wp_parse_url( DSM_PRO_APP_API_URL );
		if ( DSM_PRO_INSTANCE === $api_parse_url['host'] ) {
			return;
		}

		$licence_data = $this->get_licence_data();

		$licence_key = $licence_data['key'];
		if ( empty( $licence_key ) ) {
			return;
		}

		$args = array(
			'woo_sl_action'     => 'status-check',
			'licence_key'       => $licence_key,
			'product_unique_id' => DSM_PRODUCT_ID,
			'domain'            => DSM_PRO_INSTANCE,
			'code_version'      => DSM_PRO_VERSION,
			// '_get_product_meta' => '_sl_new_version',.
		);
		$request_uri = DSM_PRO_APP_API_URL . '?' . http_build_query( $args, '', '&' );
		$data        = wp_safe_remote_get( $request_uri );

		if ( is_wp_error( $data ) || 200 !== $data['response']['code'] ) {
				$licence_data['last_check'] = time();
				$this->update_licence_data( $licence_data );
				return;
		}

		$response_block = json_decode( $data['body'] );

		if ( ! is_array( $response_block ) || count( $response_block ) < 1 ) {
				$licence_data['last_check'] = time();
				$this->update_licence_data( $licence_data );
				return;
		}

		$response_block = $response_block[ count( $response_block ) - 1 ];
		if ( is_object( $response_block ) ) {
			if ( in_array( $response_block->status_code, array( 'e312', 's203', 'e204', 'e002', 'e003' ) ) ) {
					$licence_data = $this->reset_licence_data( $licence_data );
			} else {
				$licence_data['licence_status']  = isset( $response_block->licence_status ) ? $response_block->licence_status : '';
				$licence_data['licence_expire']  = isset( $response_block->licence_expire ) ? $response_block->licence_expire : '';
				$licence_data['_sl_new_version'] = isset( $response_block->_sl_new_version ) ? $response_block->_sl_new_version : '';
			}

			if ( 'error' === $response_block->status ) {
					$licence_data = $this->reset_licence_data( $licence_data );
			}
		}

		$licence_data['last_check'] = time();
		$this->update_licence_data( $licence_data );
	}
}
