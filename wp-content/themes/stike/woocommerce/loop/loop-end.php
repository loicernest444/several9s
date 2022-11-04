<?php
/**
 * Product Loop End
 *
 * This template can be overridden by copying it to stike/woocommerce/loop/loop-end.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see 	    https://docs.woocommerce.com/document/template-structure/
 * @package 	WooCommerce/Templates
 * @version     2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>
</ul>
<!-- Start Products Modal -->
<?php
if ( wc_get_loop_prop( 'total' ) ) {
    while ( have_posts() ) {
        the_post();
        ?>
            <div class="modal productsQuickView fade" id="productsModalCenter<?php echo esc_attr(get_the_ID(),'stike');?>" tabindex="-1" role="dialog" aria-labelledby="productsModalCenterTitle" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="products-image">
                                <?php the_post_thumbnail( 'full' ); ?>
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="products-content">
                                    <h3><?php the_title(); ?></h3>
                                    <?php woocommerce_template_loop_price(); ?>
                                    <?php woocommerce_template_loop_rating(); ?>
                                    <?php woocommerce_template_single_excerpt(); ?>

                                    <?php  woocommerce_template_single_add_to_cart(); ?>


                                    <div class="product-meta">
                                        <?php woocommerce_template_single_meta(); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
    }
}
?>

<!-- End Produts Modal -->