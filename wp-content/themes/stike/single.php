<?php
/**
 * The single template file
 * @package Stike
 */
get_header();

global $stike_opt;

$title = get_the_title();

// Blog sidebar
if(isset($stike_opt['blog_sidebar'])) {
    if( $stike_opt['blog_sidebar'] == 'stike_without_sidebar_center' ):
        $stike_sidebar = 'col-lg-8 col-md-12 offset-lg-2';
    elseif( $stike_opt['blog_sidebar'] == 'stike_without_sidebar' ):
        $stike_sidebar = 'col-lg-12 col-md-12';
    else:
        if( is_active_sidebar( 'sidebar-1' ) ):
            $stike_sidebar = 'col-lg-8 col-md-12';
        else:
            $stike_sidebar = 'col-lg-8 col-md-12 offset-lg-2';
        endif;
    endif;
    $stike_sidebar_hide = $stike_opt['blog_sidebar'];
} else {
    if( is_active_sidebar( 'sidebar-1' ) ):
        $stike_sidebar = 'col-lg-8 col-md-12';
        $stike_sidebar_hide = 'stike_with_sidebar';
    else:
        $stike_sidebar = 'col-lg-8 col-md-12 offset-lg-2';
        $stike_sidebar_hide = 'stike_without_sidebar';
    endif;
} 

if( function_exists('acf_add_options_page') ) {
	$bg_img 		= get_field( 'post_banner_background_image' );
	$description 	= get_field( 'post_banner_short_description' );
}else {
	$bg_img = '';
	$description = '';
}

// Blog Title 
if( isset($stike_opt['blog_title_tag']) ):
    $tag = $stike_opt['blog_title_tag'];
else:
    $tag = 'h2';
endif;

// Blog title and description
if(isset($stike_opt['blog_title'])) {
    $hide_banner    = $stike_opt['enable_blog_pages_banner'];
} else {
    $hide_banner    = false;
}

if( $hide_banner == true ):
    $pt_165   = '';
else:
    $pt_165   = 'pt-165';
endif;


if ( $bg_img !='' ) {
    $page_headerbg      = " page-header-bg";
} else {
    $page_headerbg      = '';
}

if( isset( $stike_opt['enable_lazyloader'] ) ):
    $is_lazyloader = $stike_opt['enable_lazyloader'];
else:
    $is_lazyloader = true;
endif;

if( $is_lazyloader == true ):
    $lazy_class = 'smartify';
    $lazy_attr = 'sm-';
else:
    $lazy_class = '';
    $lazy_attr = '';
endif;

$stike_blog_layout = !empty($stike_opt['stike_blog_layout']) ? $stike_opt['stike_blog_layout'] : 'container';
if ( !empty($_GET['stike_blog_layout']) ) {
    $stike_blog_layout = $_GET['stike_blog_layout'];
}

?>
	<?php if( $hide_banner == true ): ?>
		<div class="page-title-area  <?php echo esc_attr($page_headerbg); ?>"  style="background-image:url( <?php echo esc_url( $bg_img ); ?> );">
			<div class="container">
				<div class="page-title-content blog-title-content">
					<?php if($title != ''): ?>
						<<?php echo esc_attr( $tag ); ?>><?php the_title(); ?></<?php echo esc_attr( $tag ); ?>>
					<?php else: ?>
						<<?php echo esc_attr( $tag ); ?>><?php echo esc_html_e('No Title', 'stike'); ?></<?php echo esc_attr( $tag ); ?>>
					<?php endif; ?>

					<?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p class="stike-seo-breadcrumbs" id="breadcrumbs">','</p>' );
					} ?>
					<?php if( $description != '' ): ?>
						<p><?php echo wp_kses_post( $description ); ?></p>
					<?php endif; ?>
				</div>
			</div>
		</div>
	<?php endif; ?>

	<!-- Start Blog Area -->
	<div class="blog-details-area ptb-100  <?php echo esc_attr( $pt_165 ); ?>">
		<div class="<?php echo esc_attr( $stike_blog_layout ); ?>">
			<div class="row">
				<?php
				while ( have_posts() ) : 
				the_post(); ?>
					<div class="<?php echo esc_attr( $stike_sidebar ); ?>">
						<div class="blog-details">
							
							<?php if(has_post_thumbnail()) { ?>
								<div class="post-image">
									<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php the_post_thumbnail_url('full') ?>" alt="<?php esc_attr__('blog image', 'stike')?>">
								</div>
							<?php } ?> 
	
							<div class="blog-details-content">
								<?php if( isset( $stike_opt['is_post_meta'] ) && $stike_opt['is_post_meta'] == true ) { ?>
									<div class="blog-meta">
										<ul>
											<li><i class="bx bx-user-circle"></i> <a href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ), get_the_author_meta( 'user_nicename' ) ) ) ?>"> <?php the_author() ?></a></li>
											<li><i class="bx bx-calendar"></i> <?php echo wp_kses_post(get_the_date('F d, Y')) ?></li>
											<li><i class="bx bx-comment"></i> <?php comments_number(); ?></li>
										</ul>
									</div>
								<?php } ?>

								<?php the_content(); 
								
								wp_link_pages( array(
									'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'stike' ),
									'after'  => '</div>',
								) );
								?>

								<?php if ( get_the_tags() ) {  ?>
								<div class="post-tag-media">
									<ul class="tag">
										<li><span><?php echo esc_html_e('Tags:', 'stike') ?></span></li>
										<?php $tags = get_the_tags();
										foreach ($tags as $tag ) {  ?>
												<li><a href="<?php echo esc_url(get_tag_link($tag->term_id)); ?>">
													<?php echo esc_html($tag->name) ?></a>
												</li>
											<?php
										} ?>
									</ul>
								</div>
								<?php } ?>
							</div>
						</div>
					
						<?php
							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;
						?>
					</div>
				<?php endwhile; // End of the loop. ?>
				
				<?php if( $stike_sidebar_hide == 'stike_with_sidebar' ): ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

			</div>
		</div>
	</div>
	<!-- End Blog Area -->

<?php
get_footer();
