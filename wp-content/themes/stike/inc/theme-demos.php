<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

// Initializing online demo contents
function _filter_stike_fw_ext_backups_demos( $demos ) {
	$demos_array			 = array(
		'default-demo'	=> array(
			'title'			 => esc_html__( 'Default Demo', 'stike' ),
			'screenshot'	 => esc_url( get_template_directory_uri() ) . '/screenshot.png',
			'preview_link'	 => esc_url( 'https://themes.envytheme.com/stike/' ),
		),		
	);
	$download_url	 = 'https://themes.envytheme.com/stike/wp-content/demo-content/';

	foreach ( $demos_array as $id => $data ) {
		$demo			 = new FW_Ext_Backups_Demo( $id, 'piecemeal', array(
			'url'		 => $download_url,
			'file_id'	 => $id,
		) );
		$demo->set_title( $data[ 'title' ] );
		$demo->set_screenshot( $data[ 'screenshot' ] );
		$demo->set_preview_link( $data[ 'preview_link' ] );
		$demos[ $demo->get_id() ]	 = $demo;
		unset( $demo );
	}
	return $demos;
}
add_filter( 'fw:ext:backups-demo:demos', '_filter_stike_fw_ext_backups_demos' );