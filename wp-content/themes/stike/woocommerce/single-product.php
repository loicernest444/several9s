<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to stike/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
global $stike_opt;

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $stike_opt;

get_header( 'shop' );

if ( isset( $stike_opt['product_bg_image'] ) ): 
    $hide_banner        = $stike_opt['enable_shop_pages_banner'];
    $bg_img             = $stike_opt['product_bg_image']['url'];
    $hide_breadcrumb    = $stike_opt['hide_woo_breadcrumb'];
else:
    $bg_img             = '';
    $hide_banner        = true;
    $hide_breadcrumb    = false;
endif;

if( function_exists('acf_add_options_page') ) {
	$bg_img = get_field( 'product_banner_background_image' );
}else {
	$bg_img = '';
}

if ( $bg_img !='' ) {
    $page_headerbg      = " page-header-bg";
} else {
    $page_headerbg      = '';
}

if( $hide_banner == true ):
    $pt_165   = '';
else:
    $pt_165   = 'pt-165';
endif;

$stike_product_layout = !empty($stike_opt['stike_product_layout']) ? $stike_opt['stike_product_layout'] : 'container';
if ( !empty($_GET['stike_product_layout']) ) {
    $stike_product_layout = $_GET['stike_product_layout'];
}

remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
?>
    <?php if( $hide_banner == true ) { ?>
        <div class="page-title-area <?php echo esc_attr($page_headerbg); ?>" style="background-image:url( <?php echo esc_url( $bg_img ); ?> );">
            <div class="container">
                <div class="page-title-content">
                    <h2><?php the_title(); ?></h2>
                    <?php if( $hide_breadcrumb != true ): ?>
                        <?php if ( function_exists('yoast_breadcrumb') ) {
                            yoast_breadcrumb( '<p class="stike-seo-breadcrumbs" id="breadcrumbs">','</p>' );
                        } else { woocommerce_breadcrumb(); } ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="products-area products_details ptb-100 <?php echo esc_attr( $pt_165 ); ?>">
        <div class="<?php echo esc_attr( $stike_product_layout ); ?>">
            <div class="row">                
                <?php if ( is_active_sidebar( 'shop' ) ): ?>
                    <?php if ( isset( $_GET['shop-sidebar'] ) ): ?>
                        <?php  $stike_shop_cat_sidebar = $_GET['shop-sidebar']; ?>
                        <?php if ( $stike_shop_cat_sidebar == 'none' ): ?>
                            <div class="col-lg-12 col-md-12">
                        <?php elseif ( $stike_shop_cat_sidebar == 'left' ): ?>
                            <?php do_action( 'woocommerce_sidebar' ); ?>
                            <div class="col-lg-8 col-md-12">
                        <?php elseif ( $stike_shop_cat_sidebar == 'right' ): ?>
                            <div class="col-lg-8 col-md-12">
                        <?php endif; ?>
                    <?php else: ?>
                        <?php if( $stike_opt['stike_product_sidebar'] == 'stike_product_left_sidebar' ): ?>
                            <?php do_action( 'woocommerce_sidebar' ); ?>
                            <div class="col-lg-8 col-md-12">
                        <?php elseif ( $stike_opt['stike_product_sidebar'] == 'stike_product_right_sidebar' ): ?>
                            <div class="col-lg-8 col-md-12">
                        <?php else: ?>
                            <div class="col-lg-12 col-md-12">
                        <?php endif; ?>
                    <?php endif; ?>
                <?php else: ?>
                    <div class="col-lg-12 col-md-12">
                <?php endif; ?>

                    <?php
                    /**
                     * woocommerce_before_main_content hook.
                     *
                     * @hooked woocommerce_output_content_wrapper - 10 (outputs opening divs for the content)
                     * @hooked woocommerce_breadcrumb - 20
                     */

                    do_action( 'woocommerce_before_main_content' );
                    ?>

                        <?php while ( have_posts() ) : the_post(); ?>

                            <?php wc_get_template_part( 'content', 'single-product' ); ?>

                        <?php endwhile; // end of the loop. ?>

                    <?php
                        /**
                         * woocommerce_after_main_content hook.
                         *
                         * @hooked woocommerce_output_content_wrapper_end - 10 (outputs closing divs for the content)
                         */
                        do_action( 'woocommerce_after_main_content' );
                    ?>
                </div>
                <?php 
                if ( isset( $_GET['shop-sidebar'] ) ):
                    if ( $stike_shop_cat_sidebar == 'right' ) :
                        do_action( 'woocommerce_sidebar' );
                    endif; 
                else:
                    if ( $stike_opt['stike_product_sidebar'] == 'stike_product_right_sidebar' ):
                        do_action( 'woocommerce_sidebar' );
                    endif; 
                endif; 
                ?>
            </div>
        </div>
    </div>
    <?php get_footer( 'shop' );

    /* Omit closing PHP tag at the end of PHP files to avoid "headers already sent" issues. */
    ?>