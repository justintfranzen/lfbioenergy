<?php
namespace DiviSupreme\Classes;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

class DiviSupreme_Helpers {

	/**
	 * Get Divi Library
	 *
	 * @return array
	 * @since 4.6.4
	 */
	public static function dsm_load_library() {
		$args = array(
			'post_type'      => 'et_pb_layout',
			'posts_per_page' => -1,
		);

		if ( false === ( $dsm_library_list = get_transient( 'dsm_load_library' ) ) ) {

			$dsm_library_list = array( 'none' => '-- Select Library --' );

			if ( $categories = get_posts( $args ) ) {
				foreach ( $categories as $category ) {
					$dsm_library_list[ $category->ID ] = $category->post_title;
				}
			}

			set_transient( 'dsm_load_library', $dsm_library_list, 24 * HOUR_IN_SECONDS );
		}

		return get_transient( 'dsm_load_library' );
	}
	public static function dsm_delete_library_transient() {
		delete_transient( 'dsm_load_library' );
	}

	/**
	 * Get Contact Form 7 Library
	 *
	 * @return array
	 * @since 4.9.81
	 */
	public static function dsm_load_cf7_library() {
		$args = array(
			'post_type'      => 'wpcf7_contact_form',
			'posts_per_page' => -1,
		);

		if ( false === ( $dsm_cf7_library_list = get_transient( 'dsm_load_cf7_library' ) ) ) {

			$dsm_cf7_library_list = array(
				'0' => esc_html__( '-- Select Contact Form 7 --', 'dsm-supreme-modules-pro-for-divi' ),
			);

			if ( ! class_exists( 'WPCF7' ) ) {
				$dsm_cf7_library_list['0'] = esc_html__( 'Contact Form 7 Not Installed', 'dsm-supreme-modules-pro-for-divi' );
				return $dsm_cf7_library_list;
			}

			if ( $categories = get_posts( $args ) ) {
				foreach ( $categories as $category ) {
					(int) $dsm_cf7_library_list[ $category->ID ] = $category->post_title;
				}
			} else {
				(int) $dsm_cf7_library_list['0'] = esc_html__( 'No Contact Form 7 form found', 'dsm-supreme-modules-pro-for-divi' );
			}

			set_transient( 'dsm_load_cf7_library', $dsm_cf7_library_list, 24 * HOUR_IN_SECONDS );
		}
		return get_transient( 'dsm_load_cf7_library' );
	}
	public static function dsm_delete_cf7_library_transient() {
		delete_transient( 'dsm_load_cf7_library' );
	}
}
