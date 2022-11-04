<?php
/**
 * The template for displaying the footer
 * @package Stike
 */

	/**
	 * Footer optional data
	 */
	global $stike_opt;
	if( isset( $stike_opt['footer_logo']['url'] )):
		$footer_logo 			= $stike_opt['footer_logo']['url'];
		$footer_dsc 			= $stike_opt['footer_dsc'];
		$copyright_text 		= $stike_opt['copyright_text'];
		$enable_back_to_top 	= $stike_opt['enable_back_to_top'];
		$contact_info			= $stike_opt['contact_info'];
		$contact_info_content	= $stike_opt['contact_info_content'];
		$enable_footer_divider	= $stike_opt['enable_footer_divider'];
	else:
		$footer_logo 			= '';
		$footer_dsc 			= '';
		$copyright_text 		= '';
		$enable_back_to_top 	= false;
		$contact_info 			= '';
		$contact_info_content 	= '';
		$enable_footer_divider 	= false;
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
	<!-- Start Footer Area -->
	<footer class="footer-area">
		<?php if( $enable_footer_divider == true ): ?>
			<div class="divider"></div>
		<?php endif; ?>

		<div class="container">
			<div class="row">

			<?php $footer_column = !empty($stike_opt['footer_column']) ? $stike_opt['footer_column'] : ''; ?>
				<div class="col-lg-<?php echo esc_attr($footer_column); ?> col-md-<?php echo esc_attr($footer_column); ?>">
					<div class="single-footer-widget">
						<div class="logo">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
								<?php if( $footer_logo != '' ): ?>
									<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $footer_logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
								<?php else: ?>
									<h2><?php bloginfo( 'name' ) ?></h2>
								<?php endif; ?>
								</a>
						</div>
						<p><?php echo wp_kses_post( $footer_dsc ); ?></p>
					</div>
				</div>

				<?php if ( is_active_sidebar( 'footer_widgets') ) : ?>
					<?php dynamic_sidebar( 'footer_widgets' ); ?>
				<?php endif; ?>

				<div class="col-lg-<?php echo esc_attr($footer_column); ?> col-md-<?php echo esc_attr($footer_column); ?>">
					<?php if( $contact_info != '' && $contact_info_content != '' ): ?>
						<div class="single-footer-widget">
							<h3><?php echo esc_html( $contact_info ); ?></h3>

							<?php echo wp_kses_post( $contact_info_content ); ?>
							<?php stike_social_link(); ?>
						</div>
					<?php endif; ?>
				</div>

			</div>

			<?php if( $copyright_text != '' ): ?>
				<div class="copyright-area">
					<p><?php echo wp_kses_post( $copyright_text ); ?></p>
				</div>
			<?php endif; ?>
		</div>
	</footer>
	<!-- End Footer Area -->

	<?php if( $enable_back_to_top == true ):?>
		<div class="go-top"><i class='bx bx-chevron-up'></i></div>
	<?php endif; ?>

	<?php 
    $actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
    if ( strpos($actual_link, 'themes.envytheme.com/stike') != false ): ?>	

		<!--
		<div class="et-demo-options-toolbar">
			<?php
			//global $wp;
			//$current_url = home_url(add_query_arg(array(), $wp->request));
			?>
			<?php //if( Stike_rtl() == true ): ?>
				<a href="<?php //echo esc_url( $current_url ); ?>" class="hint--bounce hint--left hint--black" id="toggle-quick-options" aria-label="LTR Demo">
					<i class="fa fa-align-left"></i>
				</a>
			<?php //else: ?>
				<a href="<?php //echo esc_url( $current_url ); ?>/?rtl=enable" class="hint--bounce hint--left hint--black" id="toggle-quick-options" aria-label="RTL Demo">
					<i class="fa fa-align-right"></i>
				</a>
			<?php //endif; ?>
			<a href="mailto:hello@envytheme.com" target="_blank" rel="nofollow" class="hint--bounce hint--left hint--black" aria-label="Reach Us">
				<i class="fa fa-life-ring"></i>
			</a>
			<a href="https://docs.envytheme.com/docs/stike-theme-documentation/" target="_blank" rel="nofollow" class="hint--bounce hint--left hint--black" aria-label="Documentation">
				<i class="fa fa-book"></i>
			</a>
			<a href="https://1.envato.market/ENg2W" target="_blank" rel="nofollow" class="hint--bounce hint--left hint--black" aria-label="Purchase Stike">
				<i class="fa fa-shopping-cart"></i>
			</a>
		</div>
		-->

	<?php endif; ?>

<?php wp_footer(); ?>

</body>
</html>