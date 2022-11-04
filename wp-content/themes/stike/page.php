<?php
/**
 * The template for displaying all pages
 */

get_header();

/**
 * Page Control
 */
if( function_exists('acf_add_options_page') ) {
	$hide_banner = get_field( 'enable_page_banner' );
	$banner_desc = get_field( 'banner_short_description' );
}else {
	$hide_banner = false;
	$banner_desc = '';
}

if ( get_the_post_thumbnail_url() !='' ) {
    $page_headerbg      = " page-header-bg";
} else {
    $page_headerbg      = '';
}

if( isset($stike_opt['page_title_tag']) ):
    $tag = $stike_opt['page_title_tag'];
else:
    $tag = 'h2';
endif;

?>
	<?php if( $hide_banner == false ) { ?><!-- Start Page Title Area -->
		<div class="page-title-area  <?php echo esc_attr($page_headerbg); ?>" style="background-image:url(<?php echo esc_url(get_the_post_thumbnail_url( get_the_ID() )); ?>);">
			<div class="container">
				<div class="page-title-content page-title-main">
					<<?php echo esc_attr( $tag ); ?>><?php the_title(); ?></<?php echo esc_attr( $tag ); ?>>

					<?php if( !empty( $banner_desc ) ) : ?>
						<p><?php echo esc_html( $banner_desc ); ?></p>
					<?php endif; ?>

					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p class="stike-seo-breadcrumbs" id="breadcrumbs">','</p>' );
					} ?>
				</div>
			</div>
		</div>
	<?php } ?><!-- End Page Title Area -->

	<?php if( !stike_is_elementor()): ?>
		<div class="page-main-content">
	<?php endif; ?>

		<div class="page-area">
			<?php if( !stike_is_elementor()): ?>
				<div class="container">
			<?php endif; ?>
				<?php
				while ( have_posts() ) :
					the_post();

					//No Content
					$thecontent = get_the_content();
					if(empty($thecontent)){  ?><div class="stike-single-blank-page"> </div><?php }

					get_template_part( 'template-parts/content', 'page' );

					// If comments are open or we have at least one comment, load up the comment template.
					if ( comments_open() || get_comments_number() ) :
						comments_template();
					endif;

				endwhile; // End of the loop.
				?>
		<?php if( !stike_is_elementor()): ?>
			</div>
		<?php endif; ?>
		</div>
	<?php if( !stike_is_elementor()): ?>
		</div>
	<?php endif; ?>

<?php
get_footer();
