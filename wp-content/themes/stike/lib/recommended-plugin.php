<?php
/**
 * Include the TGM_Plugin_Activation class.
 */

$pcs = trim( get_option( 'stike_purchase_code_status' ) );

require_once dirname( __FILE__ ) . '/class-tgm-plugin-activation.php';

if ( $pcs == 'valid' ) {
	add_action( 'tgmpa_register', 'stike_register_required_plugins' );
}

if ( ! function_exists( 'stike_register_required_plugins' ) ) {
	function stike_register_required_plugins() {

		$plugins = array(
			
			array(
				'name'               => esc_html__('Stike Toolkit', 'stike'),
				'slug'               => 'stike-toolkit',
				'source'             => get_stylesheet_directory() . '/lib/plugins/stike-toolkit.zip', 
				'required'           => true,
			),

			// Elementor Page Builder
			array(
				'name'               => esc_html__('Elementor Page Builder', 'stike'),
				'slug'               => 'elementor',
				'required'           => true,
			),

			// Advanced Custom Fields Pro
			array(
				'name'               => esc_html__('Advanced Custom Fields Pro', 'stike'),
				'slug'               => 'advanced-custom-fields-pro',
				'source'             => get_stylesheet_directory() . '/lib/plugins/advanced-custom-fields-pro.zip', 
				'required'           => true,
			),

			// Stike Plugins
			array(
				'name'      => esc_html__('WooCommerce', 'stike'),
				'slug'      => 'woocommerce',
				'required'  => false,
			),
			array(
				'name'      => esc_html__('Contact Form 7', 'stike'),
				'slug'      => 'contact-form-7',
				'required'  => false,
			),
			array(
				'name'		 => esc_html__( 'Unyson', 'stike' ),
				'slug'		 => 'unyson',
				'required'	 => true,
			),
		);

		$config = array(
			'id'           => 'tgmpa',
			'default_path' => '',
			'menu'         => 'tgmpa-install-plugins',
			'parent_slug'  => 'themes.php',
			'capability'   => 'edit_theme_options',
			'has_notices'  => true, 
			'dismissable'  => true, 
			'dismiss_msg'  => '',   
			'is_automatic' => false, 
			'message'      => '',                      
		);
		tgmpa( $plugins, $config );
	}
}