<?php

if ( !defined( 'FW' ) ) {
	wp_die(  'Forbidden' );
}

$manifest = array();

$manifest[ 'name' ]			 = esc_html__( 'Stike', 'stike' );
$manifest[ 'uri' ]			 = esc_url( 'https://themes.envytheme.com/stike/' );
$manifest[ 'description' ]	 = esc_html__( 'stike - IT & SaaS Startups WordPress Theme', 'stike' );
$manifest[ 'version' ]		 = '4.3';
$manifest[ 'author' ]		 = 'EnvyTheme';
$manifest[ 'author_uri' ]	 = esc_url( 'https://themes.envytheme.com/stike/' );
$manifest[ 'requirements' ]	 = array(
	'wordpress' => array(
		'min_version' => '4.3',
	),
);

$manifest[ 'id' ] = 'scratch';

$manifest[ 'supported_extensions' ] = array(
	'backups'		 => array(),
);

?>
