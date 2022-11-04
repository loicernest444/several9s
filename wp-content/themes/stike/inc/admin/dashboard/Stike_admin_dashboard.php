<?php
if ( !defined( 'ABSPATH' ) )
	exit; // Exit if accessed directly

class Stike_admin_dashboard extends Stike_admin_page {

	/**
	 * [__construct description]
	 * @method __construct
	 */
	public function __construct() {

		$this->id = 'stike';
		$this->page_title = esc_html__( 'Stike Dashboard', 'stike' );
		$this->menu_title = esc_html__( 'Register Stike', 'stike' );
		$this->position = '50';

		parent::__construct();
	}

	/**
	 * [display description]
	 * @method display
	 * @return [type]  [description]
	 */
	public function display() {
		include_once( get_template_directory() . '/inc/admin/dashboard/dashboard.php' );
	}

	/**
	 * [save description]
	 * @method save
	 * @return [type] [description]
	 */
	public function save() {

	}
}
new Stike_admin_dashboard;
