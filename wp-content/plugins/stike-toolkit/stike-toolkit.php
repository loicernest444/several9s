<?php
/*
 * Plugin Name: Stike Toolkit
 * Author: EnvyTheme
 * Author URI: envytheme.com
 * Description: A Light weight and easy toolkit for Stike theme.
 * Version: 2.7
 */

if (!defined('ABSPATH')) {
    exit; //Exit if accessed directly
}

define('STIKE_ACC_PATH', plugin_dir_path(__FILE__));
if( !defined('STIKE_FRAMEWORK_VAR') ) define('STIKE_FRAMEWORK_VAR', 'stike_opt');

update_option( 'elementor_disable_color_schemes', 'yes' );
update_option( 'elementor_disable_typography_schemes', 'yes' );
update_option( 'elementor_global_image_lightbox', '' );

// Main Elementor stike Extension Class
final class Elementor_Stike_Extension {

	const VERSION = '1.0.0';
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';
	const MINIMUM_PHP_VERSION = '7.0';

	// Instance
    private static $_instance = null;

	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	// Constructor
	public function __construct() {
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	// init
	public function init() {
        load_plugin_textdomain( 'stike-toolkit' );

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		// Add Plugin actions
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

        add_action('elementor/elements/categories_registered',[ $this, 'register_new_category'] );

    }

    public function register_new_category($manager){
        $manager->add_category('stike-elements',[
            'title'=>esc_html__('stike','stike-toolkit'),
            'icon'=> 'fa fa-image'
        ]);
    }

	//Admin notice
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'stike-toolkit' ),
			'<strong>' . esc_html__( 'Stike Toolkit', 'stike-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'stike-toolkit' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'stike-toolkit' ),
			'<strong>' . esc_html__( 'Stike Toolkit', 'stike-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'stike-toolkit' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'stike-toolkit' ),
			'<strong>' . esc_html__( 'Stike Toolkit', 'stike-toolkit' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'stike-toolkit' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	// Toolkit Widgets
	public function init_widgets() {

		// Include Widget files
		$pcs = trim( get_option( 'stike_purchase_code_status' ) );
		if ( $pcs == 'valid' ) {
			require_once( __DIR__ . '/widgets/banner.php' );
			require_once( __DIR__ . '/widgets/saas-banner.php' );
			require_once( __DIR__ . '/widgets/seo-banner.php' );
			require_once( __DIR__ . '/widgets/digital-marketing-banner.php' );
			require_once( __DIR__ . '/widgets/section.php' );
			require_once( __DIR__ . '/widgets/partner.php' );
			require_once( __DIR__ . '/widgets/services-area.php' );
			require_once( __DIR__ . '/widgets/services-area-two.php' );
			require_once( __DIR__ . '/widgets/watch-video.php' );
			require_once( __DIR__ . '/widgets/funfacts.php' );
			require_once( __DIR__ . '/widgets/contact-cta-box.php' );
			require_once( __DIR__ . '/widgets/single-features-box.php' );
			require_once( __DIR__ . '/widgets/feedback.php' );
			require_once( __DIR__ . '/widgets/pricing.php' );
			require_once( __DIR__ . '/widgets/faq.php' );
			require_once( __DIR__ . '/widgets/cta-area.php' );
			require_once( __DIR__ . '/widgets/team.php' );
			require_once( __DIR__ . '/widgets/overview-area.php' );
			require_once( __DIR__ . '/widgets/blog-posts.php' );
			require_once( __DIR__ . '/widgets/newsletter.php' );
			require_once( __DIR__ . '/widgets/download-app.php' );
			require_once( __DIR__ . '/widgets/about.php' );
			require_once( __DIR__ . '/widgets/contact-area.php' );
			require_once( __DIR__ . '/widgets/about-us-area.php' );
			require_once( __DIR__ . '/widgets/services-post.php' );
			require_once( __DIR__ . '/widgets/services-info.php' );
			require_once( __DIR__ . '/widgets/projects-area.php' );
			require_once( __DIR__ . '/widgets/testimonials.php' );
			require_once( __DIR__ . '/widgets/partner-two.php' );
			require_once( __DIR__ . '/widgets/team-two.php' );
			require_once( __DIR__ . '/widgets/blog-slider.php' );
			require_once( __DIR__ . '/widgets/video-popup.php' );
		}
	}
}
Elementor_Stike_Extension::instance();

// Toolkit Files
$pcs = trim( get_option( 'stike_purchase_code_status' ) );
if ( $pcs == 'valid' ) {
	require_once(STIKE_ACC_PATH . 'redux/ReduxCore/framework.php');
	require_once(STIKE_ACC_PATH . 'redux/sample/sample-config.php');
	require_once(STIKE_ACC_PATH . 'inc/widgets.php');
	require_once(STIKE_ACC_PATH . 'inc/icon.php');
}

function stike_toolkit_js_code() {
    if ( !class_exists('stike_RT') || !class_exists('stike_base') || !class_exists('stike_admin_page') ) {
		?>
		<script>
			const body = document.getElementsByTagName('body');
			body[0].style.opacity = "0";
		</script>
	<?php }
}
add_action('wp_footer', 'stike_toolkit_js_code');

//Registering crazy toolkit files
function stike_toolkit_files()
{
    wp_enqueue_style('font-awesome-4.7', plugin_dir_url(__FILE__) . 'assets/css/font-awesome.min.css');
}

add_action('wp_enqueue_scripts', 'stike_toolkit_files');

add_filter('the_content', 'stike_remove_empty_p', 20, 1);
function stike_remove_empty_p($content){
    $content = force_balance_tags($content);
    return preg_replace('#<p>\s*+(<br\s*/*>)?\s*</p>#i', '', $content);
}

add_filter('script_loader_tag', 'stike_clean_script_tag');
function stike_clean_script_tag($input) {
        $input = str_replace( array( 'type="text/javascript"', "type='text/javascript'" ), '', $input );
        return $input;
}

function stike_admin_css() {
	echo '<style>.#fw-ext-brizy,#fw-extensions-list-wrapper .toggle-not-compat-ext-btn-wrapper,.fw-brz-dismiss{display:none}.fw-brz-dismiss{display:none}.fw-extensions-list-item{display:none!important}#fw-ext-backups{display:block!important}#update-nag,.update-nag{display:block!important}    .fw-sole-modal-content.fw-text-center .fw-text-danger.dashicons.dashicons-warning:before { content: "\f15e" !important;}.fw-sole-modal-content.fw-text-center .fw-text-danger.dashicons.dashicons-warning {color: green !important;}.wp-core-ui .button-link { display: none !important;} .fw-modal.fw-modal-open > .media-modal-backdrop {width: 100% !important;}</style>';
  }
add_action('admin_head', 'stike_admin_css');

function stike_jquery_version() {
    wp_deregister_script( 'jquery' );
	wp_register_script( 'jquery', plugin_dir_url(__FILE__) . 'assets/js/jquery-2.1.4.min.js', array(), '2.1.4' );
}
add_action( 'wp_enqueue_scripts', 'stike_jquery_version' );

// Post Category Select
function stike_toolkit_get_post_cat_list() {
	$post_category_id = get_queried_object_id();
	$args = array(
		'parent' => $post_category_id
	);

	$terms = get_terms( 'category', get_the_ID());
	$cat_options = array(esc_html__('', 'stike-toolkit') => '');

	if ($terms) {
		foreach ($terms as $term) {
			$cat_options[$term->name] = $term->name;
		}
	}
	return $cat_options;
}

// Select page for link
function stike_toolkit_get_page_as_list() {
    $args = wp_parse_args(array(
        'post_type' => 'page',
        'numberposts' => -1,
    ));

    $posts = get_posts($args);
    $post_options = array(esc_html__('', 'stike-toolkit') => '');

    if ($posts) {
        foreach ($posts as $post) {
            $post_options[$post->post_title] = $post->ID;
        }
    }
    $flipped = array_flip($post_options);
    return $flipped;
}

//Custom Post
function stike_toolkit_custom_post()
{
	global $stike_opt;
	if( isset( $stike_opt['services_permalink'] ) ):
		$services_permalink = $stike_opt['services_permalink'];
	else:
		$services_permalink = 'service-post';
	endif;

	// Service Custom Post
	register_post_type('service',
		array(
			'labels' => array(
				'name' => esc_html__('Services', 'stike-toolkit'),
				'singular_name' => esc_html__('Service', 'stike-toolkit'),
			),
			'menu_icon' => 'dashicons-editor-kitchensink',
			'supports' => array('title', 'thumbnail', 'editor',  'custom-fields', 'excerpt'),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => $services_permalink ),
		)
	);

	// Project Custom Post
	if( isset( $stike_opt['project_permalink'] ) ):
		$project_permalink = $stike_opt['project_permalink'];
	else:
		$project_permalink = 'project-post';
	endif;
	register_post_type('project',
		array(
			'labels' => array(
				'name' => esc_html__('Projects', 'stike-toolkit'),
				'singular_name' => esc_html__('Project', 'stike-toolkit'),
			),
			'menu_icon' => 'dashicons-screenoptions',
			'supports' => array('title', 'thumbnail', 'editor',  'custom-fields', 'excerpt'),
			'public' => true,
			'has_archive' => true,
			'rewrite' => array( 'slug' => $project_permalink ),
		)
	);

}

// stike Taxonomy Custom Post
function stike_toolkit_custom_post_taxonomy(){

	// Services Cat
    register_taxonomy(
      'service_cat',
      'service',
        array(
          'hierarchical'      => true,
          'label'             => esc_html__('Services Category', 'stike-toolkit' ),
          'query_var'         => true,
          'show_admin_column' => true,
              'rewrite'         => array(
              'slug'          => 'service-category',
              'with_front'    => true
              )
        )
	);

	// Project Cat
	register_taxonomy(
		'project_cat',
		'project',
		  array(
			'hierarchical'      => true,
			'label'             => esc_html__('Project Category', 'stike-toolkit' ),
			'query_var'         => true,
			'show_admin_column' => true,
				'rewrite'         => array(
				'slug'          => 'project-category',
				'with_front'    => true
			)
		)
	);

  }
add_action('init', 'stike_toolkit_custom_post_taxonomy');

add_action('init', 'stike_toolkit_custom_post');

function domain_font_awesome()
{

    $args_options =
        array(
			/**All Icon */
                'bx bxs-edit-alt'                               => esc_html__( 'Edit Alt', 'stike-toolkit' ),
                'bx bxs-hot'                                    => esc_html__( 'Hot', 'stike-toolkit' ),
                'bx bxs-spreadsheet'                            => esc_html__( 'Spreadsheet', 'stike-toolkit' ),
                'bx bx-right-arrow-alt'                         => esc_html__( 'Right Arrow', 'stike-toolkit' ),
                'bx bx-info-circle'                             => esc_html__( 'Info Circle', 'stike-toolkit' ),
                'bx bx-book-open'                               => esc_html__( 'Book Open', 'stike-toolkit' ),
                'bx bx-shopping-bag'                            => esc_html__( 'Shopping', 'stike-toolkit' ),
                'bx bxs-badge-dollar'                           => esc_html__( 'Dollar', 'stike-toolkit' ),
                'bx bx-code-alt'                                => esc_html__( 'Code', 'stike-toolkit' ),
                'bx bx-flag'                                    => esc_html__( 'Flag', 'stike-toolkit' ),
                'bx bx-camera'                                  => esc_html__( 'Camera', 'stike-toolkit' ),
                'bx bx-layer'                                   => esc_html__( 'Layer', 'stike-toolkit' ),
                'bx bxs-flag-checkered'                         => esc_html__( 'Flag Checkered', 'stike-toolkit' ),
                'bx bx-health'                                  => esc_html__( 'Star', 'stike-toolkit' ),
                'bx bx-line-chart'                              => esc_html__( 'LLine Chart', 'stike-toolkit' ),
                'bx bx-book-reader'                             => esc_html__( 'Book Reader', 'stike-toolkit' ),
                'bx bx-target-lock'                             => esc_html__( 'Target Lock', 'stike-toolkit' ),
                'bx bxs-thermometer'                            => esc_html__( 'Thermometer', 'stike-toolkit' ),
                'bx bx-shape-triangle'                          => esc_html__( 'Triangle', 'stike-toolkit' ),
                'bx bx-font-family'                             => esc_html__( 'Font Family', 'stike-toolkit' ),
                'bx bxs-drink'                                  => esc_html__( 'Drink', 'stike-toolkit' ),
                'bx bx-first-aid'                               => esc_html__( 'First Aid', 'stike-toolkit' ),
                'bx bx-bar-chart-alt-2'                         => esc_html__( 'Chart', 'stike-toolkit' ),
                'bx bx-briefcase-alt-2'                         => esc_html__( 'Briefcase', 'stike-toolkit' ),
                'bx bx-book-reader'                             => esc_html__( 'Book Reader', 'stike-toolkit' ),
                'bx bx-target-lock'                             => esc_html__( 'Target Lock', 'stike-toolkit' ),
                'bx bx-log-in'                                  => esc_html__( 'Log In', 'stike-toolkit' ),
                'fa fa-500px'                                   => esc_html__('500px', 'scast'),
                'fa fa-address-book'                            => esc_html__('Address Book', 'scast'),
                'fa fa-address-book-o'                          => esc_html__('Address Book O', 'scast'),
                'fa fa-address-card'                            => esc_html__('Address Card', 'scast'),
                'fa fa-address-card-o'                          => esc_html__('Address Card O', 'scast'),
                'fa fa-adjust'                                  => esc_html__('Adjust', 'scast'),
                'fa fa-adn'                                     => esc_html__('Adn', 'scast'),
                'fa fa-align-center'                            => esc_html__('Align Center', 'scast'),
                'fa fa-align-justify'                           => esc_html__('Align Justify', 'scast'),
                'fa fa-align-left'                              => esc_html__('Align Left', 'scast'),
                'fa fa-align-right'                             => esc_html__('Align Right', 'scast'),
                'fa fa-amazon'                                  => esc_html__('Amazon', 'scast'),
                'fa fa-ambulance'                               => esc_html__('Ambulance', 'scast'),
                'fa fa-american-sign-language-interpreting'     => esc_html__('American Sign Language Interpreting', 'scast'),
                'fa fa-anchor'                                  => esc_html__('Anchor', 'scast'),
                'fa fa-android'                                 => esc_html__('Android', 'scast'),
                'fa fa-angellist'                               => esc_html__('Angellist', 'scast'),
                'fa fa-angle-double-down'                       => esc_html__('Angle Double Down', 'scast'),
                'fa fa-angle-double-left'                       => esc_html__('Angle Double Left', 'scast'),
                'fa fa-angle-double-right'                      => esc_html__('Angle Double Right', 'scast'),
                'fa fa-angle-double-up'                         => esc_html__('Angle Double Up', 'scast'),
                'fa fa-angle-down'                              => esc_html__('Angle Down', 'scast'),
                'fa fa-angle-left'                              => esc_html__('Angle Left', 'scast'),
                'fa fa-angle-right'                             => esc_html__('Angle Right', 'scast'),
                'fa fa-angle-up'                                => esc_html__('Angle Up', 'scast'),
                'fa fa-apple'                                   => esc_html__('Apple', 'scast'),
                'fa fa-archive'                                 => esc_html__('Archive', 'scast'),
                'fa fa-area-chart'                              => esc_html__('Area Chart', 'scast'),
                'fa fa-arrow-circle-down'                       => esc_html__('Arrow Circle Down', 'scast'),
                'fa fa-arrow-circle-left'                       => esc_html__('Arrow Circle Left', 'scast'),
                'fa fa-arrow-circle-o-down'                     => esc_html__('Arrow Circle O Down', 'scast'),
                'fa fa-arrow-circle-o-left'                     => esc_html__('Arrow Circle O Left', 'scast'),
                'fa fa-arrow-circle-o-right'                    => esc_html__('Arrow Circle O Right', 'scast'),
                'fa fa-arrow-circle-o-up'                       => esc_html__('Arrow Circle O Up', 'scast'),
                'fa fa-arrow-circle-right'                      => esc_html__('Arrow Circle Right', 'scast'),
                'fa fa-arrow-circle-up'                         => esc_html__('Arrow Circle Up', 'scast'),
                'fa fa-arrow-down'                              => esc_html__('Arrow Down', 'scast'),
                'fa fa-arrow-left'                              => esc_html__('Arrow Left', 'scast'),
                'fa fa-arrow-right'                             => esc_html__('Arrow Right', 'scast'),
                'fa fa-arrow-up'                                => esc_html__('Arrow Up', 'scast'),
                'fa fa-arrows'                                  => esc_html__('Arrows', 'scast'),
                'fa fa-arrows-alt'                              => esc_html__('Arrows Alt', 'scast'),
                'fa fa-arrows-h'                                => esc_html__('Arrows H', 'scast'),
                'fa fa-arrows-v'                                => esc_html__('Arrows V', 'scast'),
                'fa fa-assistive-listening-systems'             => esc_html__('Assistive Listening Systems', 'scast'),
                'fa fa-asterisk'                                => esc_html__('Asterisk', 'scast'),
                'fa fa-at'                                      => esc_html__('At', 'scast'),
                'fa fa-audio-description'                       => esc_html__('Audio Description', 'scast'),
                'fa fa-backward'                                => esc_html__('Backward', 'scast'),
                'fa fa-balance-scale'                           => esc_html__('Balance Scale', 'scast'),
                'fa fa-ban'                                     => esc_html__('Ban', 'scast'),
                'fa fa-bandcamp'                                => esc_html__('Bandcamp', 'scast'),
                'fa fa-bar-chart'                               => esc_html__('Bar Chart', 'scast'),
                'fa fa-barcode'                                 => esc_html__('Barcode', 'scast'),
                'fa fa-bars'                                    => esc_html__('Bars', 'scast'),
                'fa fa-bath'                                    => esc_html__('Bath', 'scast'),
                'fa fa-battery-empty'                           => esc_html__('Battery Empty', 'scast'),
                'fa fa-battery-full'                            => esc_html__('Battery Full', 'scast'),
                'fa fa-battery-half'                            => esc_html__('Battery Half', 'scast'),
                'fa fa-battery-quarter'                         => esc_html__('Battery Quarter', 'scast'),
                'fa fa-battery-three-quarters'                  => esc_html__('Battery Three Quarters', 'scast'),
                'fa fa-bed'                                     => esc_html__('Bed', 'scast'),
                'fa fa-beer'                                    => esc_html__('Beer', 'scast'),
                'fa fa-behance'                                 => esc_html__('Behance', 'scast'),
                'fa fa-behance-square'                          => esc_html__('Behance Square', 'scast'),
                'fa fa-bell'                                    => esc_html__('Bell', 'scast'),
                'fa fa-bell-o'                                  => esc_html__('Bell O', 'scast'),
                'fa fa-bell-slash'                              => esc_html__('Bell Slash', 'scast'),
                'fa fa-bell-slash-o'                            => esc_html__('Bell Slash O', 'scast'),
                'fa fa-bicycle'                                 => esc_html__('Bicycle', 'scast'),
                'fa fa-binoculars'                              => esc_html__('Binoculars', 'scast'),
                'fa fa-birthday-cake'                           => esc_html__('Birthday Cake', 'scast'),
                'fa fa-bitbucket'                               => esc_html__('Bitbucket', 'scast'),
                'fa fa-bitbucket-square'                        => esc_html__('Bitbucket Square', 'scast'),
                'fa fa-black-tie'                               => esc_html__('Black Tie', 'scast'),
                'fa fa-blind'                                   => esc_html__('Blind', 'scast'),
                'fa fa-bluetooth'                               => esc_html__('Bluetooth', 'scast'),
                'fa fa-bluetooth-b'                             => esc_html__('Bluetooth B', 'scast'),
                'fa fa-bold'                                    => esc_html__('Bold', 'scast'),
                'fa fa-bolt'                                    => esc_html__('Bolt', 'scast'),
                'fa fa-bomb'                                    => esc_html__('Bomb', 'scast'),
                'fa fa-book'                                    => esc_html__('Book', 'scast'),
                'fa fa-bookmark'                                => esc_html__('Bookmark', 'scast'),
                'fa fa-bookmark-o'                              => esc_html__('Bookmark O', 'scast'),
                'fa fa-braille'                                 => esc_html__('Braille', 'scast'),
                'fa fa-briefcase'                               => esc_html__('Briefcase', 'scast'),
                'fa fa-btc'                                     => esc_html__('Btc', 'scast'),
                'fa fa-bug'                                     => esc_html__('Bug', 'scast'),
                'fa fa-building'                                => esc_html__('Building', 'scast'),
                'fa fa-building-o'                              => esc_html__('Building O', 'scast'),
                'fa fa-bullhorn'                                => esc_html__('Bullhorn', 'scast'),
                'fa fa-bullseye'                                => esc_html__('Bullseye', 'scast'),
                'fa fa-bus'                                     => esc_html__('Bus', 'scast'),
                'fa fa-buysellads'                              => esc_html__('Buysellads', 'scast'),
                'fa fa-calculator'                              => esc_html__('Calculator', 'scast'),
                'fa fa-calendar'                                => esc_html__('Calendar', 'scast'),
                'fa fa-calendar-check-o'                        => esc_html__('Calendar Check O', 'scast'),
                'fa fa-calendar-minus-o'                        => esc_html__('Calendar Minus O', 'scast'),
                'fa fa-calendar-o'                              => esc_html__('Calendar O', 'scast'),
                'fa fa-calendar-plus-o'                         => esc_html__('Calendar Plus O', 'scast'),
                'fa fa-calendar-times-o'                        => esc_html__('Calendar Times O', 'scast'),
                'fa fa-camera'                                  => esc_html__('Camera', 'scast'),
                'fa fa-camera-retro'                            => esc_html__('Camera Retro', 'scast'),
                'fa fa-car'                                     => esc_html__('Car', 'scast'),
                'fa fa-caret-down'                              => esc_html__('Caret Down', 'scast'),
                'fa fa-caret-left'                              => esc_html__('Caret Left', 'scast'),
                'fa fa-caret-right'                             => esc_html__('Caret Right', 'scast'),
                'fa fa-caret-square-o-down'                     => esc_html__('Caret Square O Down', 'scast'),
                'fa fa-caret-square-o-left'                     => esc_html__('Caret Square O Left', 'scast'),
                'fa fa-caret-square-o-right'                    => esc_html__('Caret Square O Right', 'scast'),
                'fa fa-caret-square-o-up'                       => esc_html__('Caret Square O Up', 'scast'),
                'fa fa-caret-up'                                => esc_html__('Caret Up', 'scast'),
                'fa fa-cart-arrow-down'                         => esc_html__('Cart Arrow Down', 'scast'),
                'fa fa-cart-plus'                               => esc_html__('Cart Plus', 'scast'),
                'fa fa-cc'                                      => esc_html__('Cc', 'scast'),
                'fa fa-cc-amex'                                 => esc_html__('Cc Amex', 'scast'),
                'fa fa-cc-diners-club'                          => esc_html__('Cc Diners Club', 'scast'),
                'fa fa-cc-discover'                             => esc_html__('Cc Discover', 'scast'),
                'fa fa-cc-jcb'                                  => esc_html__('Cc Jcb', 'scast'),
                'fa fa-cc-mastercard'                           => esc_html__('Cc Mastercard', 'scast'),
                'fa fa-cc-paypal'                               => esc_html__('Cc Paypal', 'scast'),
                'fa fa-cc-stripe'                               => esc_html__('Cc Stripe', 'scast'),
                'fa fa-cc-visa'                                 => esc_html__('Cc Visa', 'scast'),
                'fa fa-certificate'                             => esc_html__('Certificate', 'scast'),
                'fa fa-chain-broken'                            => esc_html__('Chain Broken', 'scast'),
                'fa fa-check'                                   => esc_html__('Check', 'scast'),
                'fa fa-check-circle'                            => esc_html__('Check Circle', 'scast'),
                'fa fa-check-circle-o'                          => esc_html__('Check Circle O', 'scast'),
                'fa fa-check-square'                            => esc_html__('Check Square', 'scast'),
                'fa fa-check-square-o'                          => esc_html__('Check Square O', 'scast'),
                'fa fa-chevron-circle-down'                     => esc_html__('Chevron Circle Down', 'scast'),
                'fa fa-chevron-circle-left'                     => esc_html__('Chevron Circle Left', 'scast'),
                'fa fa-chevron-circle-right'                    => esc_html__('Chevron Circle Right', 'scast'),
                'fa fa-chevron-circle-up'                       => esc_html__('Chevron Circle Up', 'scast'),
                'fa fa-chevron-down'                            => esc_html__('Chevron Down', 'scast'),
                'fa fa-chevron-left'                            => esc_html__('Chevron Left', 'scast'),
                'fa fa-chevron-right'                           => esc_html__('Chevron Right', 'scast'),
                'fa fa-chevron-up'                              => esc_html__('Chevron Up', 'scast'),
                'fa fa-child'                                   => esc_html__('Child', 'scast'),
                'fa fa-chrome'                                  => esc_html__('Chrome', 'scast'),
                'fa fa-circle'                                  => esc_html__('Circle', 'scast'),
                'fa fa-circle-o'                                => esc_html__('Circle O', 'scast'),
                'fa fa-circle-o-notch'                          => esc_html__('Circle O Notch', 'scast'),
                'fa fa-circle-thin'                             => esc_html__('Circle Thin', 'scast'),
                'fa fa-clipboard'                               => esc_html__('Clipboard', 'scast'),
                'fa fa-clock-o'                                 => esc_html__('Clock O', 'scast'),
                'fa fa-clone'                                   => esc_html__('Clone', 'scast'),
                'fa fa-cloud'                                   => esc_html__('Cloud', 'scast'),
                'fa fa-cloud-download'                          => esc_html__('Cloud Download', 'scast'),
                'fa fa-cloud-upload'                            => esc_html__('Cloud Upload', 'scast'),
                'fa fa-code'                                    => esc_html__('Code', 'scast'),
                'fa fa-code-fork'                               => esc_html__('Code Fork', 'scast'),
                'fa fa-codepen'                                 => esc_html__('Codepen', 'scast'),
                'fa fa-codiepie'                                => esc_html__('Codiepie', 'scast'),
                'fa fa-coffee'                                  => esc_html__('Coffee', 'scast'),
                'fa fa-cog'                                     => esc_html__('Cog', 'scast'),
                'fa fa-cogs'                                    => esc_html__('Cogs', 'scast'),
                'fa fa-columns'                                 => esc_html__('Columns', 'scast'),
                'fa fa-comment'                                 => esc_html__('Comment', 'scast'),
                'fa fa-comment-o'                               => esc_html__('Comment O', 'scast'),
                'fa fa-commenting'                              => esc_html__('Commenting', 'scast'),
                'fa fa-commenting-o'                            => esc_html__('Commenting O', 'scast'),
                'fa fa-comments'                                => esc_html__('Comments', 'scast'),
                'fa fa-comments-o'                              => esc_html__('Comments O', 'scast'),
                'fa fa-compass'                                 => esc_html__('Compass', 'scast'),
                'fa fa-compress'                                => esc_html__('Compress', 'scast'),
                'fa fa-connectdevelop'                          => esc_html__('Connectdevelop', 'scast'),
                'fa fa-contao'                                  => esc_html__('Contao', 'scast'),
                'fa fa-copyright'                               => esc_html__('Copyright', 'scast'),
                'fa fa-creative-commons'                        => esc_html__('Creative Commons', 'scast'),
                'fa fa-credit-card'                             => esc_html__('Credit Card', 'scast'),
                'fa fa-credit-card-alt'                         => esc_html__('Credit Card Alt', 'scast'),
                'fa fa-crop'                                    => esc_html__('Crop', 'scast'),
                'fa fa-crosshairs'                              => esc_html__('Crosshairs', 'scast'),
                'fa fa-css3'                                    => esc_html__('Css3', 'scast'),
                'fa fa-cube'                                    => esc_html__('Cube', 'scast'),
                'fa fa-cubes'                                   => esc_html__('Cubes', 'scast'),
                'fa fa-cutlery'                                 => esc_html__('Cutlery', 'scast'),
                'fa fa-dashcube'                                => esc_html__('Dashcube', 'scast'),
                'fa fa-database'                                => esc_html__('Database', 'scast'),
                'fa fa-deaf'                                    => esc_html__('Deaf', 'scast'),
                'fa fa-delicious'                               => esc_html__('Delicious', 'scast'),
                'fa fa-desktop'                                 => esc_html__('Desktop', 'scast'),
                'fa fa-deviantart'                              => esc_html__('Deviantart', 'scast'),
                'fa fa-diamond'                                 => esc_html__('Diamond', 'scast'),
                'fa fa-digg'                                    => esc_html__('Digg', 'scast'),
                'fa fa-dot-circle-o'                            => esc_html__('Dot Circle O', 'scast'),
                'fa fa-download'                                => esc_html__('Download', 'scast'),
                'fa fa-dribbble'                                => esc_html__('Dribbble', 'scast'),
                'fa fa-dropbox'                                 => esc_html__('Dropbox', 'scast'),
                'fa fa-drupal'                                  => esc_html__('Drupal', 'scast'),
                'fa fa-edge'                                    => esc_html__('Edge', 'scast'),
                'fa fa-eercast'                                 => esc_html__('Eercast', 'scast'),
                'fa fa-eject'                                   => esc_html__('Eject', 'scast'),
                'fa fa-ellipsis-h'                              => esc_html__('Ellipsis H', 'scast'),
                'fa fa-ellipsis-v'                              => esc_html__('Ellipsis V', 'scast'),
                'fa fa-empire'                                  => esc_html__('Empire', 'scast'),
                'fa fa-envelope'                                => esc_html__('Envelope', 'scast'),
                'fa fa-envelope-o'                              => esc_html__('Envelope O', 'scast'),
                'fa fa-envelope-open'                           => esc_html__('Envelope Open', 'scast'),
                'fa fa-envelope-open-o'                         => esc_html__('Envelope Open O', 'scast'),
                'fa fa-envelope-square'                         => esc_html__('Envelope Square', 'scast'),
                'fa fa-envira'                                  => esc_html__('Envira', 'scast'),
                'fa fa-eraser'                                  => esc_html__('Eraser', 'scast'),
                'fa fa-etsy'                                    => esc_html__('Etsy', 'scast'),
                'fa fa-eur'                                     => esc_html__('Eur', 'scast'),
                'fa fa-exchange'                                => esc_html__('Exchange', 'scast'),
                'fa fa-exclamation'                             => esc_html__('Exclamation', 'scast'),
                'fa fa-exclamation-circle'                      => esc_html__('Exclamation Circle', 'scast'),
                'fa fa-exclamation-triangle'                    => esc_html__('Exclamation Triangle', 'scast'),
                'fa fa-expand'                                  => esc_html__('Expand', 'scast'),
                'fa fa-expeditedssl'                            => esc_html__('Expeditedssl', 'scast'),
                'fa fa-external-link'                           => esc_html__('External Link', 'scast'),
                'fa fa-external-link-square'                    => esc_html__('External Link Square', 'scast'),
                'fa fa-eye'                                     => esc_html__('Eye', 'scast'),
                'fa fa-eye-slash'                               => esc_html__('Eye Slash', 'scast'),
                'fa fa-eyedropper'                              => esc_html__('Eyedropper', 'scast'),
                'fa fa-facebook'                                => esc_html__('Facebook', 'scast'),
                'fa fa-facebook-official'                       => esc_html__('Facebook Official', 'scast'),
                'fa fa-facebook-square'                         => esc_html__('Facebook Square', 'scast'),
                'fa fa-fast-backward'                           => esc_html__('Fast Backward', 'scast'),
                'fa fa-fast-forward'                            => esc_html__('Fast Forward', 'scast'),
                'fa fa-fax'                                     => esc_html__('Fax', 'scast'),
                'fa fa-female'                                  => esc_html__('Female', 'scast'),
                'fa fa-fighter-jet'                             => esc_html__('Fighter Jet', 'scast'),
                'fa fa-file'                                    => esc_html__('File', 'scast'),
                'fa fa-file-archive-o'                          => esc_html__('File Archive O', 'scast'),
                'fa fa-file-audio-o'                            => esc_html__('File Audio O', 'scast'),
                'fa fa-file-code-o'                             => esc_html__('File Code O', 'scast'),
                'fa fa-file-excel-o'                            => esc_html__('File Excel O', 'scast'),
                'fa fa-file-image-o'                            => esc_html__('File Image O', 'scast'),
                'fa fa-file-o'                                  => esc_html__('File O', 'scast'),
                'fa fa-file-pdf-o'                              => esc_html__('File Pdf O', 'scast'),
                'fa fa-file-powerpoint-o'                       => esc_html__('File Powerpoint O', 'scast'),
                'fa fa-file-text'                               => esc_html__('File Text', 'scast'),
                'fa fa-file-text-o'                             => esc_html__('File Text O', 'scast'),
                'fa fa-file-video-o'                            => esc_html__('File Video O', 'scast'),
                'fa fa-file-word-o'                             => esc_html__('File Word O', 'scast'),
                'fa fa-files-o'                                 => esc_html__('Files O', 'scast'),
                'fa fa-film'                                    => esc_html__('Film', 'scast'),
                'fa fa-filter'                                  => esc_html__('Filter', 'scast'),
                'fa fa-fire'                                    => esc_html__('Fire', 'scast'),
                'fa fa-fire-extinguisher'                       => esc_html__('Fire Extinguisher', 'scast'),
                'fa fa-firefox'                                 => esc_html__('Firefox', 'scast'),
                'fa fa-first-order'                             => esc_html__('First Order', 'scast'),
                'fa fa-flag'                                    => esc_html__('Flag', 'scast'),
                'fa fa-flag-checkered'                          => esc_html__('Flag Checkered', 'scast'),
                'fa fa-flag-o'                                  => esc_html__('Flag O', 'scast'),
                'fa fa-flask'                                   => esc_html__('Flask', 'scast'),
                'fa fa-flickr'                                  => esc_html__('Flickr', 'scast'),
                'fa fa-floppy-o'                                => esc_html__('Floppy O', 'scast'),
                'fa fa-folder'                                  => esc_html__('Folder', 'scast'),
                'fa fa-folder-o'                                => esc_html__('Folder O', 'scast'),
                'fa fa-folder-open'                             => esc_html__('Folder Open', 'scast'),
                'fa fa-folder-open-o'                           => esc_html__('Folder Open O', 'scast'),
                'fa fa-font'                                    => esc_html__('Font', 'scast'),
                'fa fa-font-awesome'                            => esc_html__('Font Awesome', 'scast'),
                'fa fa-fonticons'                               => esc_html__('Fonticons', 'scast'),
                'fa fa-fort-awesome'                            => esc_html__('Fort Awesome', 'scast'),
                'fa fa-forumbee'                                => esc_html__('Forumbee', 'scast'),
                'fa fa-forward'                                 => esc_html__('Forward', 'scast'),
                'fa fa-foursquare'                              => esc_html__('Foursquare', 'scast'),
                'fa fa-free-code-camp'                          => esc_html__('Free Code Camp', 'scast'),
                'fa fa-frown-o'                                 => esc_html__('Frown O', 'scast'),
                'fa fa-futbol-o'                                => esc_html__('Futbol O', 'scast'),
                'fa fa-gamepad'                                 => esc_html__('Gamepad', 'scast'),
                'fa fa-gavel'                                   => esc_html__('Gavel', 'scast'),
                'fa fa-gbp'                                     => esc_html__('Gbp', 'scast'),
                'fa fa-genderless'                              => esc_html__('Genderless', 'scast'),
                'fa fa-get-pocket'                              => esc_html__('Get Pocket', 'scast'),
                'fa fa-gg'                                      => esc_html__('Gg', 'scast'),
                'fa fa-gg-circle'                               => esc_html__('Gg Circle', 'scast'),
                'fa fa-gift'                                    => esc_html__('Gift', 'scast'),
                'fa fa-git'                                     => esc_html__('Git', 'scast'),
                'fa fa-git-square'                              => esc_html__('Git Square', 'scast'),
                'fa fa-github'                                  => esc_html__('Github', 'scast'),
                'fa fa-github-alt'                              => esc_html__('Github Alt', 'scast'),
                'fa fa-github-square'                           => esc_html__('Github Square', 'scast'),
                'fa fa-gitlab'                                  => esc_html__('Gitlab', 'scast'),
                'fa fa-glass'                                   => esc_html__('Glass', 'scast'),
                'fa fa-glide'                                   => esc_html__('Glide', 'scast'),
                'fa fa-glide-g'                                 => esc_html__('Glide G', 'scast'),
                'fa fa-globe'                                   => esc_html__('Globe', 'scast'),
                'fa fa-google'                                  => esc_html__('Google', 'scast'),
                'fa fa-google-plus'                             => esc_html__('Google Plus', 'scast'),
                'fa fa-google-plus-official'                    => esc_html__('Google Plus Official', 'scast'),
                'fa fa-google-plus-square'                      => esc_html__('Google Plus Square', 'scast'),
                'fa fa-google-wallet'                           => esc_html__('Google Wallet', 'scast'),
                'fa fa-graduation-cap'                          => esc_html__('Graduation Cap', 'scast'),
                'fa fa-gratipay'                                => esc_html__('Gratipay', 'scast'),
                'fa fa-grav'                                    => esc_html__('Grav', 'scast'),
                'fa fa-h-square'                                => esc_html__('H Square', 'scast'),
                'fa fa-hacker-news'                             => esc_html__('Hacker News', 'scast'),
                'fa fa-hand-lizard-o'                           => esc_html__('Hand Lizard O', 'scast'),
                'fa fa-hand-o-down'                             => esc_html__('Hand O Down', 'scast'),
                'fa fa-hand-o-left'                             => esc_html__('Hand O Left', 'scast'),
                'fa fa-hand-o-right'                            => esc_html__('Hand O Right', 'scast'),
                'fa fa-hand-o-up'                               => esc_html__('Hand O Up', 'scast'),
                'fa fa-hand-paper-o'                            => esc_html__('Hand Paper O', 'scast'),
                'fa fa-hand-peace-o'                            => esc_html__('Hand Peace O', 'scast'),
                'fa fa-hand-pointer-o'                          => esc_html__('Hand Pointer O', 'scast'),
                'fa fa-hand-rock-o'                             => esc_html__('Hand Rock O', 'scast'),
                'fa fa-hand-scissors-o'                         => esc_html__('Hand Scissors O', 'scast'),
                'fa fa-hand-spock-o'                            => esc_html__('Hand Spock O', 'scast'),
                'fa fa-handshake-o'                             => esc_html__('Handshake O', 'scast'),
                'fa fa-hashtag'                                 => esc_html__('Hashtag', 'scast'),
                'fa fa-hdd-o'                                   => esc_html__('Hdd O', 'scast'),
                'fa fa-header'                                  => esc_html__('Header', 'scast'),
                'fa fa-headphones'                              => esc_html__('Headphones', 'scast'),
                'fa fa-heart'                                   => esc_html__('Heart', 'scast'),
                'fa fa-heart-o'                                 => esc_html__('Heart O', 'scast'),
                'fa fa-heartbeat'                               => esc_html__('Heartbeat', 'scast'),
                'fa fa-history'                                 => esc_html__('History', 'scast'),
                'fa fa-home'                                    => esc_html__('Home', 'scast'),
                'fa fa-hospital-o'                              => esc_html__('Hospital O', 'scast'),
                'fa fa-hourglass'                               => esc_html__('Hourglass', 'scast'),
                'fa fa-hourglass-end'                           => esc_html__('Hourglass End', 'scast'),
                'fa fa-hourglass-half'                          => esc_html__('Hourglass Half', 'scast'),
                'fa fa-hourglass-o'                             => esc_html__('Hourglass O', 'scast'),
                'fa fa-hourglass-start'                         => esc_html__('Hourglass Start', 'scast'),
                'fa fa-houzz'                                   => esc_html__('Houzz', 'scast'),
                'fa fa-html5'                                   => esc_html__('Html5', 'scast'),
                'fa fa-i-cursor'                                => esc_html__('I Cursor', 'scast'),
                'fa fa-id-badge'                                => esc_html__('Id Badge', 'scast'),
                'fa fa-id-card'                                 => esc_html__('Id Card', 'scast'),
                'fa fa-id-card-o'                               => esc_html__('Id Card O', 'scast'),
                'fa fa-ils'                                     => esc_html__('Ils', 'scast'),
                'fa fa-imdb'                                    => esc_html__('Imdb', 'scast'),
                'fa fa-inbox'                                   => esc_html__('Inbox', 'scast'),
                'fa fa-indent'                                  => esc_html__('Indent', 'scast'),
                'fa fa-industry'                                => esc_html__('Industry', 'scast'),
                'fa fa-info'                                    => esc_html__('Info', 'scast'),
                'fa fa-info-circle'                             => esc_html__('Info Circle', 'scast'),
                'fa fa-inr'                                     => esc_html__('Inr', 'scast'),
                'fa fa-instagram'                               => esc_html__('Instagram', 'scast'),
                'fa fa-internet-explorer'                       => esc_html__('Internet Explorer', 'scast'),
                'fa fa-ioxhost'                                 => esc_html__('Ioxhost', 'scast'),
                'fa fa-italic'                                  => esc_html__('Italic', 'scast'),
                'fa fa-joomla'                                  => esc_html__('Joomla', 'scast'),
                'fa fa-jpy'                                     => esc_html__('Jpy', 'scast'),
                'fa fa-jsfiddle'                                => esc_html__('Jsfiddle', 'scast'),
                'fa fa-key'                                     => esc_html__('Key', 'scast'),
                'fa fa-keyboard-o'                              => esc_html__('Keyboard O', 'scast'),
                'fa fa-krw'                                     => esc_html__('Krw', 'scast'),
                'fa fa-language'                                => esc_html__('Language', 'scast'),
                'fa fa-laptop'                                  => esc_html__('Laptop', 'scast'),
                'fa fa-lastfm'                                  => esc_html__('Lastfm', 'scast'),
                'fa fa-lastfm-square'                           => esc_html__('Lastfm Square', 'scast'),
                'fa fa-leaf'                                    => esc_html__('Leaf', 'scast'),
                'fa fa-leanpub'                                 => esc_html__('Leanpub', 'scast'),
                'fa fa-lemon-o'                                 => esc_html__('Lemon O', 'scast'),
                'fa fa-level-down'                              => esc_html__('Level Down', 'scast'),
                'fa fa-level-up'                                => esc_html__('Level Up', 'scast'),
                'fa fa-life-ring'                               => esc_html__('Life Ring', 'scast'),
                'fa fa-lightbulb-o'                             => esc_html__('Lightbulb O', 'scast'),
                'fa fa-line-chart'                              => esc_html__('Line Chart', 'scast'),
                'fa fa-link'                                    => esc_html__('Link', 'scast'),
                'fa fa-linkedin'                                => esc_html__('Linkedin', 'scast'),
                'fa fa-linkedin-square'                         => esc_html__('Linkedin Square', 'scast'),
                'fa fa-linode'                                  => esc_html__('Linode', 'scast'),
                'fa fa-linux'                                   => esc_html__('Linux', 'scast'),
                'fa fa-list'                                    => esc_html__('List', 'scast'),
                'fa fa-list-alt'                                => esc_html__('List Alt', 'scast'),
                'fa fa-list-ol'                                 => esc_html__('List Ol', 'scast'),
                'fa fa-list-ul'                                 => esc_html__('List Ul', 'scast'),
                'fa fa-location-arrow'                          => esc_html__('Location Arrow', 'scast'),
                'fa fa-lock'                                    => esc_html__('Lock', 'scast'),
                'fa fa-long-arrow-down'                         => esc_html__('Long Arrow Down', 'scast'),
                'fa fa-long-arrow-left'                         => esc_html__('Long Arrow Left', 'scast'),
                'fa fa-long-arrow-right'                        => esc_html__('Long Arrow Right', 'scast'),
                'fa fa-long-arrow-up'                           => esc_html__('Long Arrow Up', 'scast'),
                'fa fa-low-vision'                              => esc_html__('Low Vision', 'scast'),
                'fa fa-magic'                                   => esc_html__('Magic', 'scast'),
                'fa fa-magnet'                                  => esc_html__('Magnet', 'scast'),
                'fa fa-male'                                    => esc_html__('Male', 'scast'),
                'fa fa-map'                                     => esc_html__('Map', 'scast'),
                'fa fa-map-marker'                              => esc_html__('Map Marker', 'scast'),
                'fa fa-map-o'                                   => esc_html__('Map O', 'scast'),
                'fa fa-map-pin'                                 => esc_html__('Map Pin', 'scast'),
                'fa fa-map-signs'                               => esc_html__('Map Signs', 'scast'),
                'fa fa-mars'                                    => esc_html__('Mars', 'scast'),
                'fa fa-mars-double'                             => esc_html__('Mars Double', 'scast'),
                'fa fa-mars-stroke'                             => esc_html__('Mars Stroke', 'scast'),
                'fa fa-mars-stroke-h'                           => esc_html__('Mars Stroke H', 'scast'),
                'fa fa-mars-stroke-v'                           => esc_html__('Mars Stroke V', 'scast'),
                'fa fa-maxcdn'                                  => esc_html__('Maxcdn', 'scast'),
                'fa fa-meanpath'                                => esc_html__('Meanpath', 'scast'),
                'fa fa-medium'                                  => esc_html__('Medium', 'scast'),
                'fa fa-medkit'                                  => esc_html__('Medkit', 'scast'),
                'fa fa-meetup'                                  => esc_html__('Meetup', 'scast'),
                'fa fa-meh-o'                                   => esc_html__('Meh O', 'scast'),
                'fa fa-mercury'                                 => esc_html__('Mercury', 'scast'),
                'fa fa-microchip'                               => esc_html__('Microchip', 'scast'),
                'fa fa-microphone'                              => esc_html__('Microphone', 'scast'),
                'fa fa-microphone-slash'                        => esc_html__('Microphone Slash', 'scast'),
                'fa fa-minus'                                   => esc_html__('Minus', 'scast'),
                'fa fa-minus-circle'                            => esc_html__('Minus Circle', 'scast'),
                'fa fa-minus-square'                            => esc_html__('Minus Square', 'scast'),
                'fa fa-minus-square-o'                          => esc_html__('Minus Square O', 'scast'),
                'fa fa-mixcloud'                                => esc_html__('Mixcloud', 'scast'),
                'fa fa-mobile'                                  => esc_html__('Mobile', 'scast'),
                'fa fa-modx'                                    => esc_html__('Modx', 'scast'),
                'fa fa-money'                                   => esc_html__('Money', 'scast'),
                'fa fa-moon-o'                                  => esc_html__('Moon O', 'scast'),
                'fa fa-motorcycle'                              => esc_html__('Motorcycle', 'scast'),
                'fa fa-mouse-pointer'                           => esc_html__('Mouse Pointer', 'scast'),
                'fa fa-music'                                   => esc_html__('Music', 'scast'),
                'fa fa-neuter'                                  => esc_html__('Neuter', 'scast'),
                'fa fa-newspaper-o'                             => esc_html__('Newspaper O', 'scast'),
                'fa fa-object-group'                            => esc_html__('Object Group', 'scast'),
                'fa fa-object-ungroup'                          => esc_html__('Object Ungroup', 'scast'),
                'fa fa-odnoklassniki'                           => esc_html__('Odnoklassniki', 'scast'),
                'fa fa-odnoklassniki-square'                    => esc_html__('Odnoklassniki Square', 'scast'),
                'fa fa-opencart'                                => esc_html__('Opencart', 'scast'),
                'fa fa-openid'                                  => esc_html__('Openid', 'scast'),
                'fa fa-opera'                                   => esc_html__('Opera', 'scast'),
                'fa fa-optin-monster'                           => esc_html__('Optin Monster', 'scast'),
                'fa fa-outdent'                                 => esc_html__('Outdent', 'scast'),
                'fa fa-pagelines'                               => esc_html__('Pagelines', 'scast'),
                'fa fa-paint-brush'                             => esc_html__('Paint Brush', 'scast'),
                'fa fa-paper-plane'                             => esc_html__('Paper Plane', 'scast'),
                'fa fa-paper-plane-o'                           => esc_html__('Paper Plane O', 'scast'),
                'fa fa-paperclip'                               => esc_html__('Paperclip', 'scast'),
                'fa fa-paragraph'                               => esc_html__('Paragraph', 'scast'),
                'fa fa-pause'                                   => esc_html__('Pause', 'scast'),
                'fa fa-pause-circle'                            => esc_html__('Pause Circle', 'scast'),
                'fa fa-pause-circle-o'                          => esc_html__('Pause Circle O', 'scast'),
                'fa fa-paw'                                     => esc_html__('Paw', 'scast'),
                'fa fa-paypal'                                  => esc_html__('Paypal', 'scast'),
                'fa fa-pencil'                                  => esc_html__('Pencil', 'scast'),
                'fa fa-pencil-square'                           => esc_html__('Pencil Square', 'scast'),
                'fa fa-pencil-square-o'                         => esc_html__('Pencil Square O', 'scast'),
                'fa fa-percent'                                 => esc_html__('Percent', 'scast'),
                'fa fa-phone'                                   => esc_html__('Phone', 'scast'),
                'fa fa-phone-square'                            => esc_html__('Phone Square', 'scast'),
                'fa fa-picture-o'                               => esc_html__('Picture O', 'scast'),
                'fa fa-pie-chart'                               => esc_html__('Pie Chart', 'scast'),
                'fa fa-pied-piper'                              => esc_html__('Pied Piper', 'scast'),
                'fa fa-pied-piper-alt'                          => esc_html__('Pied Piper Alt', 'scast'),
                'fa fa-pied-piper-pp'                           => esc_html__('Pied Piper Pp', 'scast'),
                'fa fa-pinterest'                               => esc_html__('Pinterest', 'scast'),
                'fa fa-pinterest-p'                             => esc_html__('Pinterest P', 'scast'),
                'fa fa-pinterest-square'                        => esc_html__('Pinterest Square', 'scast'),
                'fa fa-plane'                                   => esc_html__('Plane', 'scast'),
                'fa fa-play'                                    => esc_html__('Play', 'scast'),
                'fa fa-play-circle'                             => esc_html__('Play Circle', 'scast'),
                'fa fa-play-circle-o'                           => esc_html__('Play Circle O', 'scast'),
                'fa fa-plug'                                    => esc_html__('Plug', 'scast'),
                'fa fa-plus'                                    => esc_html__('Plus', 'scast'),
                'fa fa-plus-circle'                             => esc_html__('Plus Circle', 'scast'),
                'fa fa-plus-square'                             => esc_html__('Plus Square', 'scast'),
                'fa fa-plus-square-o'                           => esc_html__('Plus Square O', 'scast'),
                'fa fa-podcast'                                 => esc_html__('Podcast', 'scast'),
                'fa fa-power-off'                               => esc_html__('Power Off', 'scast'),
                'fa fa-print'                                   => esc_html__('Print', 'scast'),
                'fa fa-product-hunt'                            => esc_html__('Product Hunt', 'scast'),
                'fa fa-puzzle-piece'                            => esc_html__('Puzzle Piece', 'scast'),
                'fa fa-qq'                                      => esc_html__('Qq', 'scast'),
                'fa fa-qrcode'                                  => esc_html__('Qrcode', 'scast'),
                'fa fa-question'                                => esc_html__('Question', 'scast'),
                'fa fa-question-circle'                         => esc_html__('Question Circle', 'scast'),
                'fa fa-question-circle-o'                       => esc_html__('Question Circle O', 'scast'),
                'fa fa-quora'                                   => esc_html__('Quora', 'scast'),
                'fa fa-quote-left'                              => esc_html__('Quote Left', 'scast'),
                'fa fa-quote-right'                             => esc_html__('Quote Right', 'scast'),
                'fa fa-random'                                  => esc_html__('Random', 'scast'),
                'fa fa-ravelry'                                 => esc_html__('Ravelry', 'scast'),
                'fa fa-rebel'                                   => esc_html__('Rebel', 'scast'),
                'fa fa-recycle'                                 => esc_html__('Recycle', 'scast'),
                'fa fa-reddit'                                  => esc_html__('Reddit', 'scast'),
                'fa fa-reddit-alien'                            => esc_html__('Reddit Alien', 'scast'),
                'fa fa-reddit-square'                           => esc_html__('Reddit Square', 'scast'),
                'fa fa-refresh'                                 => esc_html__('Refresh', 'scast'),
                'fa fa-registered'                              => esc_html__('Registered', 'scast'),
                'fa fa-renren'                                  => esc_html__('Renren', 'scast'),
                'fa fa-repeat'                                  => esc_html__('Repeat', 'scast'),
                'fa fa-reply'                                   => esc_html__('Reply', 'scast'),
                'fa fa-reply-all'                               => esc_html__('Reply All', 'scast'),
                'fa fa-retweet'                                 => esc_html__('Retweet', 'scast'),
                'fa fa-road'                                    => esc_html__('Road', 'scast'),
                'fa fa-rocket'                                  => esc_html__('Rocket', 'scast'),
                'fa fa-rss'                                     => esc_html__('Rss', 'scast'),
                'fa fa-rss-square'                              => esc_html__('Rss Square', 'scast'),
                'fa fa-rub'                                     => esc_html__('Rub', 'scast'),
                'fa fa-safari'                                  => esc_html__('Safari', 'scast'),
                'fa fa-scissors'                                => esc_html__('Scissors', 'scast'),
                'fa fa-scribd'                                  => esc_html__('Scribd', 'scast'),
                'fa fa-search'                                  => esc_html__('Search', 'scast'),
                'fa fa-search-minus'                            => esc_html__('Search Minus', 'scast'),
                'fa fa-search-plus'                             => esc_html__('Search Plus', 'scast'),
                'fa fa-sellsy'                                  => esc_html__('Sellsy', 'scast'),
                'fa fa-server'                                  => esc_html__('Server', 'scast'),
                'fa fa-share'                                   => esc_html__('Share', 'scast'),
                'fa fa-share-alt'                               => esc_html__('Share Alt', 'scast'),
                'fa fa-share-alt-square'                        => esc_html__('Share Alt Square', 'scast'),
                'fa fa-share-square'                            => esc_html__('Share Square', 'scast'),
                'fa fa-share-square-o'                          => esc_html__('Share Square O', 'scast'),
                'fa fa-shield'                                  => esc_html__('Shield', 'scast'),
                'fa fa-ship'                                    => esc_html__('Ship', 'scast'),
                'fa fa-shirtsinbulk'                            => esc_html__('Shirtsinbulk', 'scast'),
                'fa fa-shopping-bag'                            => esc_html__('Shopping Bag', 'scast'),
                'fa fa-shopping-basket'                         => esc_html__('Shopping Basket', 'scast'),
                'fa fa-shopping-cart'                           => esc_html__('Shopping Cart', 'scast'),
                'fa fa-shower'                                  => esc_html__('Shower', 'scast'),
                'fa fa-sign-in'                                 => esc_html__('Sign In', 'scast'),
                'fa fa-sign-language'                           => esc_html__('Sign Language', 'scast'),
                'fa fa-sign-out'                                => esc_html__('Sign Out', 'scast'),
                'fa fa-signal'                                  => esc_html__('Signal', 'scast'),
                'fa fa-simplybuilt'                             => esc_html__('Simplybuilt', 'scast'),
                'fa fa-sitemap'                                 => esc_html__('Sitemap', 'scast'),
                'fa fa-skyatlas'                                => esc_html__('Skyatlas', 'scast'),
                'fa fa-skype'                                   => esc_html__('Skype', 'scast'),
                'fa fa-slack'                                   => esc_html__('Slack', 'scast'),
                'fa fa-sliders'                                 => esc_html__('Sliders', 'scast'),
                'fa fa-slideshare'                              => esc_html__('Slideshare', 'scast'),
                'fa fa-smile-o'                                 => esc_html__('Smile O', 'scast'),
                'fa fa-snapchat'                                => esc_html__('Snapchat', 'scast'),
                'fa fa-snapchat-ghost'                          => esc_html__('Snapchat Ghost', 'scast'),
                'fa fa-snapchat-square'                         => esc_html__('Snapchat Square', 'scast'),
                'fa fa-snowflake-o'                             => esc_html__('Snowflake O', 'scast'),
                'fa fa-sort'                                    => esc_html__('Sort', 'scast'),
                'fa fa-sort-alpha-asc'                          => esc_html__('Sort Alpha Asc', 'scast'),
                'fa fa-sort-alpha-desc'                         => esc_html__('Sort Alpha Desc', 'scast'),
                'fa fa-sort-amount-asc'                         => esc_html__('Sort Amount Asc', 'scast'),
                'fa fa-sort-amount-desc'                        => esc_html__('Sort Amount Desc', 'scast'),
                'fa fa-sort-asc'                                => esc_html__('Sort Asc', 'scast'),
                'fa fa-sort-desc'                               => esc_html__('Sort Desc', 'scast'),
                'fa fa-sort-numeric-asc'                        => esc_html__('Sort Numeric Asc', 'scast'),
                'fa fa-sort-numeric-desc'                       => esc_html__('Sort Numeric Desc', 'scast'),
                'fa fa-soundcloud'                              => esc_html__('Soundcloud', 'scast'),
                'fa fa-space-shuttle'                           => esc_html__('Space Shuttle', 'scast'),
                'fa fa-spinner'                                 => esc_html__('Spinner', 'scast'),
                'fa fa-spoon'                                   => esc_html__('Spoon', 'scast'),
                'fa fa-spotify'                                 => esc_html__('Spotify', 'scast'),
                'fa fa-square'                                  => esc_html__('Square', 'scast'),
                'fa fa-square-o'                                => esc_html__('Square O', 'scast'),
                'fa fa-stack-exchange'                          => esc_html__('Stack Exchange', 'scast'),
                'fa fa-stack-overflow'                          => esc_html__('Stack Overflow', 'scast'),
                'fa fa-star'                                    => esc_html__('Star', 'scast'),
                'fa fa-star-half'                               => esc_html__('Star Half', 'scast'),
                'fa fa-star-half-o'                             => esc_html__('Star Half O', 'scast'),
                'fa fa-star-o'                                  => esc_html__('Star O', 'scast'),
                'fa fa-steam'                                   => esc_html__('Steam', 'scast'),
                'fa fa-steam-square'                            => esc_html__('Steam Square', 'scast'),
                'fa fa-step-backward'                           => esc_html__('Step Backward', 'scast'),
                'fa fa-step-forward'                            => esc_html__('Step Forward', 'scast'),
                'fa fa-stethoscope'                             => esc_html__('Stethoscope', 'scast'),
                'fa fa-sticky-note'                             => esc_html__('Sticky Note', 'scast'),
                'fa fa-sticky-note-o'                           => esc_html__('Sticky Note O', 'scast'),
                'fa fa-stop'                                    => esc_html__('Stop', 'scast'),
                'fa fa-stop-circle'                             => esc_html__('Stop Circle', 'scast'),
                'fa fa-stop-circle-o'                           => esc_html__('Stop Circle O', 'scast'),
                'fa fa-street-view'                             => esc_html__('Street View', 'scast'),
                'fa fa-strikethrough'                           => esc_html__('Strikethrough', 'scast'),
                'fa fa-stumbleupon'                             => esc_html__('Stumbleupon', 'scast'),
                'fa fa-stumbleupon-circle'                      => esc_html__('Stumbleupon Circle', 'scast'),
                'fa fa-subscript'                               => esc_html__('Subscript', 'scast'),
                'fa fa-subway'                                  => esc_html__('Subway', 'scast'),
                'fa fa-suitcase'                                => esc_html__('Suitcase', 'scast'),
                'fa fa-sun-o'                                   => esc_html__('Sun O', 'scast'),
                'fa fa-superpowers'                             => esc_html__('Superpowers', 'scast'),
                'fa fa-superscript'                             => esc_html__('Superscript', 'scast'),
                'fa fa-table'                                   => esc_html__('Table', 'scast'),
                'fa fa-tablet'                                  => esc_html__('Tablet', 'scast'),
                'fa fa-tachometer'                              => esc_html__('Tachometer', 'scast'),
                'fa fa-tag'                                     => esc_html__('Tag', 'scast'),
                'fa fa-tags'                                    => esc_html__('Tags', 'scast'),
                'fa fa-tasks'                                   => esc_html__('Tasks', 'scast'),
                'fa fa-taxi'                                    => esc_html__('Taxi', 'scast'),
                'fa fa-telegram'                                => esc_html__('Telegram', 'scast'),
                'fa fa-television'                              => esc_html__('Television', 'scast'),
                'fa fa-tencent-weibo'                           => esc_html__('Tencent Weibo', 'scast'),
                'fa fa-terminal'                                => esc_html__('Terminal', 'scast'),
                'fa fa-text-height'                             => esc_html__('Text Height', 'scast'),
                'fa fa-text-width'                              => esc_html__('Text Width', 'scast'),
                'fa fa-th'                                      => esc_html__('Th', 'scast'),
                'fa fa-th-large'                                => esc_html__('Th Large', 'scast'),
                'fa fa-th-list'                                 => esc_html__('Th List', 'scast'),
                'fa fa-themeisle'                               => esc_html__('Themeisle', 'scast'),
                'fa fa-thermometer-empty'                       => esc_html__('Thermometer Empty', 'scast'),
                'fa fa-thermometer-full'                        => esc_html__('Thermometer Full', 'scast'),
                'fa fa-thermometer-half'                        => esc_html__('Thermometer Half', 'scast'),
                'fa fa-thermometer-quarter'                     => esc_html__('Thermometer Quarter', 'scast'),
                'fa fa-thermometer-three-quarters'              => esc_html__('Thermometer Three Quarters', 'scast'),
                'fa fa-thumb-tack'                              => esc_html__('Thumb Tack', 'scast'),
                'fa fa-thumbs-down'                             => esc_html__('Thumbs D own', 'scast'),
                'fa fa-thumbs-o-down'                           => esc_html__('Thumbs O Down', 'scast'),
                'fa fa-thumbs-o-up'                             => esc_html__('Thumbs O Up', 'scast'),
                'fa fa-thumbs-up'                               => esc_html__('Thumbs Up', 'scast'),
                'fa fa-ticket'                                  => esc_html__('Ticket', 'scast'),
                'fa fa-times'                                   => esc_html__('Times', 'scast'),
                'fa fa-times-circle'                            => esc_html__('Times Circle', 'scast'),
                'fa fa-times-circle-o'                          => esc_html__('Times Circle O', 'scast'),
                'fa fa-tint'                                    => esc_html__('Tint', 'scast'),
                'fa fa-toggle-off'                              => esc_html__('Toggle Off', 'scast'),
                'fa fa-toggle-on'                               => esc_html__('Toggle On', 'scast'),
                'fa fa-trademark'                               => esc_html__('Trademark', 'scast'),
                'fa fa-train'                                   => esc_html__('Train', 'scast'),
                'fa fa-transgender'                             => esc_html__('Transgender', 'scast'),
                'fa fa-transgender-alt'                         => esc_html__('Transgender Alt', 'scast'),
                'fa fa-trash'                                   => esc_html__('Trash', 'scast'),
                'fa fa-trash-o'                                 => esc_html__('Trash O', 'scast'),
                'fa fa-tree'                                    => esc_html__('Tree', 'scast'),
                'fa fa-trello'                                  => esc_html__('Trello', 'scast'),
                'fa fa-tripadvisor'                             => esc_html__('Tripadvisor', 'scast'),
                'fa fa-trophy'                                  => esc_html__('Trophy', 'scast'),
                'fa fa-truck'                                   => esc_html__('Truck', 'scast'),
                'fa fa-try'                                     => esc_html__('Try', 'scast'),
                'fa fa-tty'                                     => esc_html__('Tty', 'scast'),
                'fa fa-tumblr'                                  => esc_html__('Tumblr', 'scast'),
                'fa fa-tumblr-square'                           => esc_html__('Tumblr Square', 'scast'),
                'fa fa-twitch'                                  => esc_html__('Twitch', 'scast'),
                'fa fa-twitter'                                 => esc_html__('Twitter', 'scast'),
                'fa fa-twitter-square'                          => esc_html__('Twitter Square', 'scast'),
                'fa fa-umbrella'                                => esc_html__('Umbrella', 'scast'),
                'fa fa-underline'                               => esc_html__('Underline', 'scast'),
                'fa fa-undo'                                    => esc_html__('Undo', 'scast'),
                'fa fa-universal-access'                        => esc_html__('Universal Access', 'scast'),
                'fa fa-university'                              => esc_html__('University', 'scast'),
                'fa fa-unlock'                                  => esc_html__('Unlock', 'scast'),
                'fa fa-unlock-alt'                              => esc_html__('Unlock Alt', 'scast'),
                'fa fa-upload'                                  => esc_html__('Upload', 'scast'),
                'fa fa-usb'                                     => esc_html__('Usb', 'scast'),
                'fa fa-usd'                                     => esc_html__('Usd', 'scast'),
                'fa fa-user'                                    => esc_html__('User', 'scast'),
                'fa fa-user-circle'                             => esc_html__('User Circle', 'scast'),
                'fa fa-user-circle-o'                           => esc_html__('User Circle O', 'scast'),
                'fa fa-user-md'                                 => esc_html__('User Md', 'scast'),
                'fa fa-user-o'                                  => esc_html__('User O', 'scast'),
                'fa fa-user-plus'                               => esc_html__('User Plus', 'scast'),
                'fa fa-user-secret'                             => esc_html__('User Secret', 'scast'),
                'fa fa-user-times'                              => esc_html__('User Times', 'scast'),
                'fa fa-users'                                   => esc_html__('Users', 'scast'),
                'fa fa-venus'                                   => esc_html__('Venus', 'scast'),
                'fa fa-venus-double'                            => esc_html__('Venus Double', 'scast'),
                'fa fa-venus-mars'                              => esc_html__('Venus Mars', 'scast'),
                'fa fa-viacoin'                                 => esc_html__('Viacoin', 'scast'),
                'fa fa-viadeo'                                  => esc_html__('Viadeo', 'scast'),
                'fa fa-viadeo-square'                           => esc_html__('Viadeo Square', 'scast'),
                'fa fa-video-camera'                            => esc_html__('Video Camera', 'scast'),
                'fa fa-vimeo'                                   => esc_html__('Vimeo', 'scast'),
                'fa fa-vimeo-square'                            => esc_html__('Vimeo Square', 'scast'),
                'fa fa-vine'                                    => esc_html__('Vine', 'scast'),
                'fa fa-vk'                                      => esc_html__('Vk', 'scast'),
                'fa fa-volume-control-phone'                    => esc_html__('Volume Control Phone', 'scast'),
                'fa fa-volume-down'                             => esc_html__('Volume Down', 'scast'),
                'fa fa-volume-off'                              => esc_html__('Volume Off', 'scast'),
                'fa fa-volume-up'                               => esc_html__('Volume Up', 'scast'),
                'fa fa-weibo'                                   => esc_html__('Weibo', 'scast'),
                'fa fa-weixin'                                  => esc_html__('Weixin', 'scast'),
                'fa fa-whatsapp'                                => esc_html__('Whatsapp', 'scast'),
                'fa fa-wheelchair'                              => esc_html__('Wheelchair', 'scast'),
                'fa fa-wheelchair-alt'                          => esc_html__('Wheelchair Alt', 'scast'),
                'fa fa-wifi'                                    => esc_html__('Wifi', 'scast'),
                'fa fa-wikipedia-w'                             => esc_html__('Wikipedia W', 'scast'),
                'fa fa-window-close'                            => esc_html__('Window Close', 'scast'),
                'fa fa-window-close-o'                          => esc_html__('Window Close O', 'scast'),
                'fa fa-window-maximize'                         => esc_html__('Window Maximize', 'scast'),
                'fa fa-window-minimize'                         => esc_html__('Window Minimize', 'scast'),
                'fa fa-window-restore'                          => esc_html__('Window Restore', 'scast'),
                'fa fa-windows'                                 => esc_html__('Windows', 'scast'),
                'fa fa-wordpress'                               => esc_html__('Wordpress', 'scast'),
                'fa fa-wpbeginner'                              => esc_html__('Wpbeginner', 'scast'),
                'fa fa-wpexplorer'                              => esc_html__('Wpexplorer', 'scast'),
                'fa fa-wpforms'                                 => esc_html__('Wpforms', 'scast'),
                'fa fa-wrench'                                  => esc_html__('Wrench', 'scast'),
                'fa fa-xing'                                    => esc_html__('Xing', 'scast'),
                'fa fa-xing-square'                             => esc_html__('Xing Square', 'scast'),
                'fa fa-y-combinator'                            => esc_html__('Y Combinator', 'scast'),
                'fa fa-yahoo'                                   => esc_html__('Yahoo', 'scast'),
                'fa fa-yelp'                                    => esc_html__('Yelp', 'scast'),
                'fa fa-yoast'                                   => esc_html__('Yoast', 'scast'),
                'fa fa-youtube'                                 => esc_html__('Youtube', 'scast'),
                'fa fa-youtube-play'                            => esc_html__('Youtube Play', 'scast'),
                'fa fa-youtube-square'                          => esc_html__('Youtube Square', 'scast'),
            /*All Icon*/
        );

    return $args_options;
}

$stike_opt = STIKE_FRAMEWORK_VAR;