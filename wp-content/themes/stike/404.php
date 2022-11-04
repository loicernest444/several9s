<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Stike
 */

global $stike_opt;

get_header();

if ( isset( $stike_opt['title_not_found'] ) ):
	$title 		= $stike_opt['title_not_found'];
	$content 	= $stike_opt['content_not_found'];
	$button 	= $stike_opt['button_not_found'];
	$image 	= $stike_opt['not_found_image']['url'];
else:
	$title 		= esc_html__('Page Not Found', 'stike');
	$content 	=  esc_html__('The page you are looking for might have been removed had its name changed or is temporarily unavailable.', 'stike');
	$button 	=  esc_html__('Go to Home', 'stike');
	$image 		= '';
endif;

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
	<div class="error-area">
		<div class="d-table">
			<div class="d-table-cell">
				<div class="container">
					<div class="error-content">
						<?php if( $image != '' ): ?>
							<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $image ); ?> " alt="<?php echo esc_attr( $title ); ?>">
						<?php endif; ?>

						<?php if ( !isset( $stike_opt['not_found_image'] ) ): ?>
							<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url(get_template_directory_uri() .'/assets/img/404.png' ); ?>" alt="<?php echo esc_attr__( '404', 'stike' ); ?>">
						<?php endif; ?>
					
						<h3><?php echo esc_html( $title ); ?></h3>
						<p><?php echo esc_html( $content ); ?></p>

						<?php if(  $button != '' ): ?>
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="default-btn"><i class="bx bx-rotate-left"></i><?php echo esc_html( $button ); ?><span></span></a>
						<?php endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div>
<?php
get_footer();
