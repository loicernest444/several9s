<?php
/**
 * Single Service
 */

get_header();

if( function_exists('acf_add_options_page') ) {
	$hide_banner    = get_field( 'enable_service_banner' );
	$bg_image       = get_field( 'services_bg_image' );
	$description 	= get_field( 'service_banner_short_description' );
}else {
	$hide_banner = false;
	$description = '';
	$bg_image   = '';
}
if( isset($stike_opt['page_title_tag']) ):
    $tag = $stike_opt['page_title_tag'];
else:
    $tag = 'h2';
endif;
?>
    <?php if( $hide_banner == false ) { ?>
        <div class="page-title-area" style="background-image:url( <?php echo esc_url( $bg_image ); ?> );">
            <div class="container">
                <div class="page-title-content page-title-main">
                    <<?php echo esc_attr( $tag ); ?>><?php the_title(); ?></<?php echo esc_attr( $tag ); ?>>
                    <?php if( $description != '' ): ?>
						<p><?php echo wp_kses_post( $description ); ?></p>
					<?php endif; ?>
                </div>
            </div>
        </div>
    <?php } ?>

    <div class="service-details pt-100">
        <div class="container">
                <div class="service-details-image">
                    <?php the_post_thumbnail( 'full' ); ?>
                </div>
        </div>
        <?php while ( have_posts() ) :  the_post(); ?>
            <?php the_content(); ?>
        <?php endwhile; // End of the loop. ?>
    </div>

<?php
get_footer();
