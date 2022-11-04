<?php 
/**
 * Stike post content
 */

global $stike_opt;

// Post thumb size
if(isset($stike_opt['blog_sidebar'])) {
   if( $stike_opt['blog_sidebar'] == 'stike_without_sidebar' ):
        $thumb_size = 'full';
   else:
        $thumb_size = 'stike_post_thumb';
   endif;
}else {
    $thumb_size = 'stike_post_thumb';
}

// Author info
$get_author_id = get_the_author_meta('ID');
$get_author_gravatar = get_avatar_url($get_author_id);

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
?>

<div <?php post_class(); ?>>
    <div class="single-blog-post">
        <?php if(has_post_thumbnail()) { ?>
            <div class="blog-image">
                <a href="<?php the_permalink() ?>">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php the_post_thumbnail_url($thumb_size) ?>" alt="<?php esc_attr__('blog image', 'stike')?>">
				</a>
            </div>
        <?php } ?>

        <div class="blog-post-content">
            <?php if( isset( $stike_opt['is_post_meta'] ) && $stike_opt['is_post_meta'] == true ) { ?>
                <div class="date">
                    <i class='bx bx-calendar'></i> 
                    <?php echo wp_kses_post(get_the_date('F d, Y')) ?>
                </div>
            <?php } ?>

			<h3><a href="<?php the_permalink() ?>"><?php the_title() ?></a></h3>
			<?php the_excerpt() ?>

			<div class="post-info">
                <?php if( isset( $stike_opt['is_post_meta'] ) && $stike_opt['is_post_meta'] == true ) { ?>
                    <div class="post-by">
                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $get_author_gravatar ); ?>" alt="<?php the_author() ?>">
                        <h6><?php the_author() ?></h6>
                    </div>
                <?php } ?>
				<div class="details-btn">
					<a href="<?php the_permalink() ?>"><i class="bx bx-right-arrow-alt"></i></a>
				</div>
			</div>
        </div>
    </div>
</div>
 