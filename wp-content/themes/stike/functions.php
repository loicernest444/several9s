<?php
/**
 * Stike functions and definitions
 * @package Stike
 */

/**
 * Shorthand contents for theme assets url
 */
define('STIKE_VERSION', time());
define('STIKE_THEME_URI', get_template_directory_uri());
define('STIKE_THEME_DIR', get_template_directory());
define('STIKE_IMG',STIKE_THEME_URI . '/assets/img');
define('STIKE_CSS',STIKE_THEME_URI . '/assets/css');
define('STIKE_JS',STIKE_THEME_URI . '/assets/js');
if( !defined('STIKE_FRAMEWORK_VAR') ) define('STIKE_FRAMEWORK_VAR', 'stike_opt');
update_option( 'stike_purchase_code_status', 'valid', 'yes' );
update_option( 'stike_purchase_code', 'valid', 'yes' );
update_option('notice_dismissed', '0');
/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
if ( ! function_exists( 'stike_setup' ) ) :

	function stike_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'stike', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for yoast seo plugin
		add_theme_support( 'yoast-seo-breadcrumbs' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// Stike blog post image size for EL
		add_image_size( 'stike_el_post_thumb', 530, 430, true );		
		add_image_size( 'stike_product_card_thumb', 450, 450, true ); 
		add_image_size( 'stike_blog_two_thumb', 660, 715, true ); 
		add_image_size( 'stike_service_img', 350, 367, true ); 
		add_image_size( 'stike_590x560', 590, 560, true ); 

		// woocommerce support
		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Stike main blog post image size
		add_image_size( 'stike_post_thumb', 730, 400, true );

		// Switch default core markup for search form, comment form, and comments
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );
	}
endif;
add_action( 'after_setup_theme', 'stike_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function stike_content_width() {
	// This variable is intended to be overruled from themes.
	$GLOBALS['content_width'] = apply_filters( 'stike_content_width', 640 );
}
add_action( 'after_setup_theme', 'stike_content_width', 0 );

/**
 * Enqueue scripts and styles.
 */
if ( ! function_exists( 'stike_scripts' ) ) :

	function stike_scripts() {

		global $stike_opt;

		$is_animation      = !empty($stike_opt['enable_animation_css']) ? $stike_opt['enable_animation_css'] : '';

		if( isset( $stike_opt['enable_lazyloader'] ) ):
			$is_lazyloader = $stike_opt['enable_lazyloader'];
		else:
			$is_lazyloader = true;
		endif;

		if( isset( $stike_opt['enable_minify_css_js'] ) ):
			$is_minify = $stike_opt['enable_minify_css_js'];
		else:
			$is_minify = true;
		endif;

		wp_enqueue_style( 'stike-style', get_stylesheet_uri() );
		wp_style_add_data( 'stike-style', 'rtl', 'replace' );

		wp_enqueue_style( 'vendors', 			STIKE_CSS . '/vendors.min.css', null,STIKE_VERSION );
		wp_enqueue_style( 'boxicons', 			STIKE_CSS . '/boxicons.min.css', null,STIKE_VERSION );

		if( $is_animation == true ):
            wp_enqueue_style( 'animate', 		STIKE_CSS . '/animate.css', null, STIKE_VERSION );
        endif;

		// WooCommerce CSS
		if ( class_exists( 'WooCommerce' ) ):
			if( $is_minify == true ):
				wp_enqueue_style( 'stike-woocommerce', 	STIKE_CSS . '/woocommerce.min.css', null,STIKE_VERSION );
			else :
				wp_enqueue_style( 'stike-woocommerce', 	STIKE_CSS . '/woocommerce.css', null,STIKE_VERSION );
			endif;
		endif;

		if( $is_minify == true ):
			wp_enqueue_style( 'stike-main-style', 	STIKE_CSS . '/style.min.css', null,STIKE_VERSION );
			wp_enqueue_style( 'stike-responsive', 	STIKE_CSS . '/responsive.min.css', null,STIKE_VERSION );
		else :
			wp_enqueue_style( 'stike-main-style', 	STIKE_CSS . '/style.css', null,STIKE_VERSION );
			wp_enqueue_style( 'stike-responsive', 	STIKE_CSS . '/responsive.css', null,STIKE_VERSION );
		endif;

		// RTL CSS
		if( stike_rtl() == true ):
			wp_enqueue_style( 'stike-rtl', get_template_directory_uri() . '/style-rtl.css' );
		endif;

		wp_enqueue_script( 'vendors', 				STIKE_JS . '/vendors.min.js', array('jquery'),STIKE_VERSION );

		wp_enqueue_script( 'azaxchimp', 				STIKE_JS . '/ajaxChimp.min.js', array('jquery'),STIKE_VERSION );

		if( function_exists('acf_add_options_page') ) {
			wp_enqueue_script( 'coustom-particle', 	STIKE_JS . '/coustom-particles.js', array('jquery'),STIKE_VERSION );
		}
		// Smartify JS 
		if( $is_lazyloader == true ):
			wp_enqueue_script( 'jquery-smartify', 		STIKE_JS . '/jquery.smartify.js', array('jquery'),STIKE_VERSION );
			wp_enqueue_script( 'stike-smartify', 		STIKE_JS . '/smartify.js', array('jquery'),STIKE_VERSION );
		endif;

		if( $is_minify == true ):
			wp_enqueue_script( 'stike-main', 			STIKE_JS . '/main.min.js', array('jquery'),STIKE_VERSION );
		else :
			wp_enqueue_script( 'stike-main', 			STIKE_JS . '/main.js', array('jquery'),STIKE_VERSION );
		endif;
		
		if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
			wp_enqueue_script( 'comment-reply' );
		}

	}
	
endif;
add_action( 'wp_enqueue_scripts', 'stike_scripts' );

if ( ! function_exists( 'stike_fonts' ) ) {
	function stike_fonts() {
		wp_enqueue_style( 'stike-fonts', "//fonts.googleapis.com/css?family=Poppins:100,300,400,500,600,700,800,900&display=swap", '', '1.0.0', 'screen' );
	}
}
add_action( 'wp_enqueue_scripts', 'stike_fonts' );

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * Load bootstrap navwalker 
 */
require STIKE_THEME_DIR. '/inc/bootstrap-navwalker.php';

/**
 * Load theme widgets
 */
require STIKE_THEME_DIR. '/inc/widget.php';

/**
 * Custom style
 */
require STIKE_THEME_DIR. '/inc/custom-style.php';

/**
 * Social link
 */
require STIKE_THEME_DIR. '/inc/social-link.php';

/**
 * Theme Demo
 */
$pcs = trim( get_option( 'stike_purchase_code_status' ) );
if ( $pcs == 'valid' ) :
    require get_template_directory() . '/inc/theme-demos.php';
endif;

/**
 * Recommended plugin
 */
require get_template_directory() . '/lib/recommended-plugin.php';

/**
 * ACF meta filed
 */
require get_template_directory() . '/inc/acf.php';

/**
 * Filter the categories archive widget to add a span around post count
 */
if ( ! function_exists( 'stike_cat_count_span' ) ) {
	function stike_cat_count_span( $links ) {
		$links = str_replace( '</a> (', '</a><span class="post-count">(', $links );
		$links = str_replace( ')', ')</span>', $links );
		return $links;
	}
}
add_filter( 'wp_list_categories', 'stike_cat_count_span' );

/**
 * Filter the archives widget to add a span around post count
 */
if ( ! function_exists( 'stike_archive_count_span' ) ) {
	function stike_archive_count_span( $links ) {
		$links = str_replace( '</a>&nbsp;(', '</a><span class="post-count">(', $links );
		$links = str_replace( ')', ')</span>', $links );
		return $links;
	}
}
add_filter( 'get_archives_link', 'stike_archive_count_span' );

/**
 * Excerpt more text
 */
if ( ! function_exists( 'stike_excerpt_more' ) ) :
	function stike_excerpt_more( $more ) {
		return ' ';
	}
endif;
add_filter('excerpt_more', 'stike_excerpt_more');

/**
 * Excerpt limit
 */
if ( ! function_exists( 'stike_excerpt_length' ) ) :
	function stike_excerpt_length( $length ) {
		return 25;
	}
endif;
add_filter( 'excerpt_length', 'stike_excerpt_length', 999 );

// Load WooCommerce compatibility file.
if ( class_exists( 'WooCommerce' ) ):
	require STIKE_THEME_DIR . '/inc/woocommerce.php';
endif;

/**
 * Remove pages from search result
 */
if ( ! function_exists( 'stike_remove_pages_from_search' ) ) :
    function stike_remove_pages_from_search() {
		global $wp_post_types;
		global $stike_opt;

		if( isset( $stike_opt['enable_search_result_pages'] ) &&  $stike_opt['enable_search_result_pages'] == true):
			$wp_post_types['page']->exclude_from_search = false;
		else:
			$wp_post_types['page']->exclude_from_search = true;
		endif;
	}
endif;
add_action('init', 'stike_remove_pages_from_search');

/**
 * If page edited by elementor
 */
if ( ! function_exists( 'stike_is_elementor' ) ) :
	function stike_is_elementor(){
		if ( function_exists( 'elementor_load_plugin_textdomain' ) ):
			global $post;
			return \Elementor\Plugin::$instance->db->is_built_with_elementor($post->ID);
		endif;
	}
endif;

/**
 * Stike primary menu
 */
if ( ! function_exists( 'stike_register_primary_menus' ) ) :
	function stike_register_primary_menus(){
		register_nav_menus(
			array('main-menu' => esc_html__('Primary Menu', 'stike'),
			)
		);
	}
endif;
add_action('init', 'stike_register_primary_menus');


/**
 * Classes
 */
require get_template_directory() . '/inc/classes/Stike_base.php';
require get_template_directory() . '/inc/classes/Stike_rt.php';
require get_template_directory() . '/inc/classes/Stike_admin_page.php';
require get_template_directory() . '/inc/admin/dashboard/Stike_admin_dashboard.php';

/**
 * Admin dashboard style and scripts
 */
add_action( 'admin_enqueue_scripts', function() {
    global $pagenow;
    wp_enqueue_script( 'stike-admin', get_template_directory_uri() .'/assets/js/stike-admin.js', array('jquery'), '1.0.0', true );
    if ( $pagenow == 'admin.php' ) {
        wp_enqueue_style( 'stike-admin-dashboard', get_template_directory_uri() .'/assets/css/admin-dashboard.min.css' );
    }
});

/**
 * Redirect after theme activation
 */
add_action( 'after_switch_theme', function() {
    if ( isset( $_GET['activated'] ) ) {
        wp_safe_redirect( admin_url('admin.php?page=stike') );
        
		update_option( 'stike_purchase_code_status', '', 'yes' );
		update_option( 'stike_purchase_code', '', 'yes' );
        exit;
	}
	update_option('notice_dismissed', '0');
});

/**
 * Notice dismiss handle
 */
add_action( 'admin_init', function() {
    if ( isset($_GET['dismissed']) && $_GET['dismissed'] == 1 ) {
        update_option('notice_dismissed', '1');
    }
});

remove_action("wp_head", "wp_generator");