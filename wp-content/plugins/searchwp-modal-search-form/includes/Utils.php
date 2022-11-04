<?php

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Class SearchWPModalFormUtils.
 *
 * @since 0.5.0
 */
class SearchWPModalFormUtils {

	/**
	 * Check if SearchWP plugin is active.
	 *
	 * @since 0.5.0
	 */
	public static function is_searchwp_active() {

		return class_exists( 'SearchWP', false );
	}

	/**
	 * Check if SearchWP Live Ajax Search plugin is active.
	 *
	 * @since 0.5.0
	 */
	public static function is_live_search_active() {

		return function_exists( 'searchwp_live_search' );
	}

	/**
	 * Helper function to determine if loading a Modal Search Form admin settings page.
	 *
	 * @since 0.5.0
	 *
	 * @return bool
	 */
	public static function is_settings_page() {

		if ( ! is_admin() ) {
			return false;
		}

		// phpcs:ignore WordPress.Security.NonceVerification.Recommended
		$page = isset( $_REQUEST['page'] ) ? sanitize_key( $_REQUEST['page'] ) : '';

		if ( empty( $page ) ) {
			return false;
		}

		return $page === 'searchwp-modal-form';
	}

	/**
	 * Sanitize array/string of CSS classes.
	 *
	 * @since 0.5.0
	 *
	 * @param array|string $classes
	 * @param array        $args {
	 *     Optional arguments.
	 *
	 *     @type bool       $convert Whether to suppress filters. Default true.
	 * }
	 *
	 * @return string|array
	 */
	public static function sanitize_classes( $classes, $args = [] ) {

		$is_array = is_array( $classes );
		$convert  = ! empty( $args['convert'] );
		$css      = [];

		if ( ! empty( $classes ) ) {
			$classes = $is_array ? $classes : explode( ' ', trim( $classes ) );
			foreach ( $classes as $class ) {
				if ( ! empty( $class ) ) {
					$css[] = sanitize_html_class( $class );
				}
			}
		}

		if ( $is_array ) {
			return $convert ? implode( ' ', $css ) : $css;
		}

		return $convert ? $css : implode( ' ', $css );
	}
}
