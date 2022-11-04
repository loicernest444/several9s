<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 * @package Stike
 */

/**
 * Adds custom classes to the array of body classes.
 */
if ( ! function_exists( 'stike_body_classes' ) ) {
	function stike_body_classes( $classes ) {
		// Adds a class of hfeed to non-singular pages.
		if ( ! is_singular() ) {
			$classes[] = 'hfeed';
		}

		// Adds a class of no-sidebar when there is no sidebar present.
		if ( ! is_active_sidebar( 'sidebar-1' ) ) {
			$classes[] = 'no-sidebar';
		}

		return $classes;
	}
}
add_filter( 'body_class', 'stike_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
if ( ! function_exists( 'stike_pingback_header' ) ) {
	function stike_pingback_header() {
		if ( is_singular() && pings_open() ) {
			printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
		}
	}
}
add_action( 'wp_head', 'stike_pingback_header' );

/**
 * Stike Preloader
*/
if ( ! function_exists( 'stike_preloader' ) ) {
	function stike_preloader() {
		global $stike_opt;

		if( isset( $stike_opt['enable_preloader'] ) ):
			$is_preloader = $stike_opt['enable_preloader'];
		else:
			$is_preloader = true;
		endif;

		//$is_preloader       = !empty($stike_opt['enable_preloader']) ? $stike_opt['enable_preloader'] : '1';

        $preloader_style    = !empty($stike_opt['preloader_style']) ? $stike_opt['preloader_style'] : 'circle-spin';

        if( $is_preloader == true ):
            if ( defined( 'ELEMENTOR_VERSION' ) ) :
                if (\Elementor\Plugin::$instance->preview->is_preview_mode()) :
                    echo '';
                else:
                    if ( $preloader_style == 'text' ) :
                        if (!empty( $stike_opt['loading_text'] ) ) : ?>
                            <div class="preloader-area">
                                <p class="text-center"> <?php echo esc_html( $stike_opt['loading_text'] ) ?> </p>
                            </div>
                        <?php endif;
                    elseif( $preloader_style == 'circle-spin' ) : ?>
                         <div class="preloader-area">
							<div class="spinner">
								<div class="inner">
									<div class="disc"></div>
									<div class="disc"></div>
									<div class="disc"></div>
								</div>
							</div>
						</div>
                    <?php else: ?>
                        <div class="preloader-area preloader-img">
                            <div class="spinner">
                            </div>
                        </div>
                    <?php endif;
                endif;
            else:
                if ( $preloader_style == 'text' ) :
                    if (!empty( $stike_opt['loading_text'] ) ) : ?>
                        <div class="preloader-area">
                            <p class="text-center"> <?php echo esc_html( $stike_opt['loading_text'] ) ?> </p>
                        </div>
                    <?php endif;
                elseif( $preloader_style == 'circle-spin' ) :
                    ?>
                    <div class="preloader-area">
						<div class="spinner">
							<div class="inner">
								<div class="disc"></div>
								<div class="disc"></div>
								<div class="disc"></div>
							</div>
						</div>
					</div>
                <?php else : ?>
					<div class="preloader-area preloader-img">
						<div class="spinner">
						</div>
					</div>
                    <?php
                endif;
            endif;
        endif;
	}
}

/**
 * Stike Nav
*/
if ( ! function_exists( 'stike_nav_area' ) ) {
	function stike_nav_area() {
		global $stike_opt;

		// Button text and link
		if( isset($stike_opt['header_left_button_type']) ):
			$left_button			= $stike_opt['header_left_button'];
			$left_button_link 		= $stike_opt['header_left_button_type'];
			$right_button 			= $stike_opt['header_right_button'];
			$right_button_link 		= $stike_opt['header_right_button_type'];
			$header_style_white		= $stike_opt['header_style_white'];
            $left_btn_icon         	= $stike_opt['left_btn_icon'];
			$right_btn_icon        	= $stike_opt['right_btn_icon'];
		else:
			$left_button			=	'';
			$left_button_link		=	'';
			$right_button			=	'';
			$right_button_link		=	'';
			$header_style_white		=  	true;
            $left_btn_icon         	= 'bx bx-log-in';
            $right_btn_icon        	= 'bx bxs-hot';

		endif;

		// Left Button Link Page
		if( $left_button_link == 'link_to_page') {
			// Page link
			$left_button_link 		= get_page_link( $stike_opt['header_left_button_page_link'] );
		} else {
			$left_button_link	    = $stike_opt['header_left_button_ex_link'];
		}

		// Right Button Link Page
		if( $right_button_link == 'link_to_page') {
			// Page link
			$right_button_link 		= get_page_link( $stike_opt['header_right_button_page_link'] );
		} else {
			$right_button_link	    = $stike_opt['header_right_button_ex_link'];
		}

		// Main site logo
		if(isset($stike_opt['main_logo']['url'])):
			$logo 	= $stike_opt['main_logo']['url'];
		else:
			$logo	= '';
		endif;

		// Logo for mobile device
		if(isset($stike_opt['mobile_logo']['url'])):
			$mobile_logo 	= $stike_opt['mobile_logo']['url'];
		else:
			$mobile_logo	= '';
		endif;

		// Nav style two class
		if( function_exists('acf_add_options_page') ) {
			$hide_banner 	= get_field( 'enable_page_banner' );
			$white_menu 	= get_field( 'enable_menu_color' );
		}else {
			$hide_banner 	= false;
			$white_menu 	= false;
		}

		// Navbar class
		if( $hide_banner == false ):
			$white_menu_class = 'bg-white';
		else:
			$white_menu_class = '';
		endif;

		// White bg
		if( $white_menu == true ):
			$nav_style_class = 'bg-white';
		else:
			$nav_style_class = '';
		endif;

		if( is_archive() || is_author() || is_category() || is_home() || is_single() || is_tag() && 'post' == get_post_type() || 'service' == get_post_type() ):
			if( $header_style_white == true ):
				$nav_style_class = 'bg-white';
			else:
				$nav_style_class = '';
			endif;
		endif;

		$hide_adminbar = 'hide-adminbar';

		if( isset($stike_opt['email']) ):
            $call_number           = $stike_opt['call_number'];
            $call_number_link      = $stike_opt['call_number_link'];
            $address               = $stike_opt['address'];
            $email                 = $stike_opt['email'];
            $email_link            = $stike_opt['email_link'];
            $header_social         = $stike_opt['enable_top_header_social'];
        else:
            $call_number           = '';
            $call_number_link      = '';
            $address               = '';
            $email                 = '';
            $email_link            = '';
            $header_social         = false;
        endif;

		?>

		<header class="header-area <?php if ( is_user_logged_in() ) { echo esc_attr( $hide_adminbar ); }?>">
			 <!-- Start Top Header Area -->
			 <?php if( isset( $stike_opt['enable_top_header'] ) && $stike_opt['enable_top_header'] == 1 ){
                if( $email != '' ) { ?>
                    <div class="top-header">
                        <div class="container">
                            <div class="row align-items-center">
                                <div class="col-lg-3">
                                    <div class="header-left-content">
										<?php if( $header_social == true ): ?>
											<?php stike_social_link(); ?>
										<?php endif; ?>
                                    </div>
                                </div>
                                <div class="col-lg-9">
                                    <div class="header-right-content">
                                        <ul>
											<?php if( $call_number !='' ): ?>
												<li>
													<a href="<?php echo esc_url( $call_number_link ); ?>">
														<i class='fa fa-phone'></i>
														<?php echo esc_html( $call_number ); ?>
													</a>
												</li>
											<?php endif; ?>
											<?php if( $address !='' ): ?>
												<li>
													<i class='fa fa-location-arrow'></i>
													<?php echo esc_html( $address ); ?>
												</li>
											<?php endif; ?>
											<?php if( $email !='' ): ?>
												<li>
													<a href="<?php echo esc_url( $email_link ); ?>">
														<i class='fa fa-envelope-o'></i>
														<?php echo esc_html( $email ); ?>
													</a>
												</li>
											<?php endif; ?>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <?php
                }
            } ?>
            <!-- End Top Header Area -->
			<div class="navbar-area navbar-style-one <?php echo esc_attr( $nav_style_class );  ?> <?php echo esc_attr( $white_menu_class ); ?>"><!-- Start Navbar Area -->
				<div class="spacle-responsive-nav">
					<div class="container">
						<div class="spacle-responsive-menu">
							<div class="logo">
								<a href="<?php echo esc_url( home_url( '/' ) );?>">
									<?php if( $mobile_logo != '' ): ?>
										<img src="<?php echo esc_url( $mobile_logo ); ?>" alt="<?php bloginfo( 'name' );?>">
									<?php elseif( $logo != '' ): ?>
										<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' );?>">
									<?php else: ?>
										<h2><?php bloginfo( 'name' ); ?></h2>
									<?php endif; ?>
								</a>
							</div>
						</div>
					</div>
				</div>

				<div class="spacle-nav">
					<div class="container">
						<nav class="navbar navbar-expand-md navbar-light">
							<a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) );?>">
								<?php if( $logo != '' ): ?>
									<img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' );?>">
								<?php else: ?>
									<h2><?php bloginfo( 'name' ); ?></h2>
								<?php endif; ?>
							</a>

							<div class="collapse navbar-collapse mean-menu" id="navbarSupportedContent">
								<?php
								$primary_nav_arg = [
									'menu'            => 'main-menu',
									'theme_location'  => 'main-menu',
									'container'       => null,
									'menu_class'      => 'navbar-nav ml-auto',
									'depth'           => 3,
									'walker'          => new Stike_Bootstrap_Navwalker(),
									'fallback_cb'     => 'Stike_Bootstrap_Navwalker::fallback',
								];

								if(has_nav_menu('main-menu')){
									wp_nav_menu($primary_nav_arg);
								}
								?>

								<div class="others-options">
									<?php if( $left_button != '' && $left_button_link != '' ): ?>
										<a href="<?php echo esc_url( $left_button_link); ?>" class="optional-btn">
											<i class="<?php echo esc_attr( $left_btn_icon ); ?>"></i><?php echo esc_html( $left_button ); ?><span></span>
										</a>
									<?php endif; ?>

									<?php if( $right_button != '' && $right_button_link != '' ): ?>
										<a href="<?php echo esc_url( $right_button_link ); ?>" class="default-btn">
											<i class="<?php echo esc_attr( $right_btn_icon ); ?>"></i><?php echo esc_html( $right_button ); ?><span></span>
										</a>
									<?php endif; ?>
								</div>
							</div>
						</nav>
					</div>
				</div>
			</div><!-- End Navbar Area -->
		</header>
		<?php
	}
}

/**
 * Stike RTL
 */
if( ! function_exists( 'stike_rtl' ) ):
	function stike_rtl() {
		global $stike_opt;

		if(	isset( $stike_opt['stike_enable_rtl'])  ):
			$stike_rtl_opt = $stike_opt['stike_enable_rtl'];
		else:
			$stike_rtl_opt = 'disable';
		endif;

		if ( isset( $_GET['rtl'] ) ) {
			$stike_rtl_opt = $_GET['rtl'];
		}

		if( $stike_rtl_opt == 'enable' ):
			$stike_rtl = true;
		else:
			$stike_rtl = false;
		endif;

		return $stike_rtl;
	}
endif;


/**
 * Elementor post type support
 */
function stike_add_cpt_support() {

    //if exists, assign to $cpt_support var
    $cpt_support = get_option( 'elementor_cpt_support' );

    //check if option DOESN'T exist in db
    if ( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'service', 'project' ]; //create array of our default supported post types
        update_option( 'elementor_cpt_support', $cpt_support ); //write it to the database
    }
    //if it DOES exist, but header is NOT defined
    elseif ( !in_array( 'service', $cpt_support ) ) {
        $cpt_support[] = 'service'; //append to array
        update_option( 'elementor_cpt_support', $cpt_support ); //update database
    }
    elseif ( !in_array( 'project', $cpt_support ) ) {
        $cpt_support[] = 'project'; //append to array
        update_option( 'elementor_cpt_support', $cpt_support ); //update database
    }
}
add_action( 'after_switch_theme', 'stike_add_cpt_support' );


function stike_function_pcs() {
	$purchase_code = htmlspecialchars(get_option( 'stike_purchase_code' ));
	$purchase_code = str_replace(' ', '', $purchase_code);
	if( $purchase_code != '' ){
		require get_template_directory().'/inc/verify/class.verify-purchase.php';
		$o = EnvatoApi2::verifyPurchase( $purchase_code );

		if ( is_object($o) && strpos($o->item_name, 'Stike') !== false ) {

			// Check in localhost
			$whitelist = array(
				'127.0.0.1',
				'::1',
				'192.168.1',
				'192.168.0.1',
				'182.168.1.5',
				'192.168.1.4',
				'192.168.1.5',
				'192.168.1.4',
				'192.168',
				'10.0.2.2',
			);

			if(!in_array($_SERVER['REMOTE_ADDR'], $whitelist)){ // In server
				$url 			= 'https://api.envytheme.com/api/v1/license';
				$purchaseKey 	= $purchase_code;
				$itemName 		= $o->item_name;
				$buyer 			= $o->buyer;
				$purchasedAt 	= $o->created_at;
				$supportUntil 	= $o->supported_until;
				$licenseType 	= $o->licence;
				$domain 		= get_site_url();
				$post_url 		= '';

				$post_url .= $url.'?purchaseKey='.$purchaseKey.'&itemName='.$itemName.'&buyer='.$buyer.'&purchasedAt='.$purchasedAt.'&supportUntil='.$supportUntil.'&licenseType='.$licenseType.'&domain='.$domain.'';

				$post_url = str_replace(' ', '%', $post_url);

				$curl = curl_init();

				curl_setopt_array($curl, array(
					CURLOPT_URL 			=> $post_url,
					CURLOPT_RETURNTRANSFER 	=> true,
					CURLOPT_ENCODING 		=> "",
					CURLOPT_MAXREDIRS		=> 10,
					CURLOPT_TIMEOUT 		=> 30,
					CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
					CURLOPT_CUSTOMREQUEST 	=> "POST",
					CURLOPT_HTTPHEADER 		=> array(
						"cache-control: no-cache",
						"content-type: application/x-www-form-urlencoded"
					),
					CURLOPT_SSL_VERIFYPEER => false,
				));

				$response = curl_exec($curl);
				$err = curl_error($curl);
				curl_close($curl);

				if ($err) {
					echo "cURL Error #:" . $err;
				} else {
					$json = json_decode($response);
					$already_registered = $json->message[0]; // Already registered

					$new_response = '';
					$new_response .= 'Congratulations! Updated for this domain '.$domain.'';
					preg_match_all('#https?://[^,\s()<>]+(?:\([\w\d]+\)|([^,[:punct:]\s]|/))#', $already_registered, $match);
					$url 			= $match[0];
					$protocols 		= array('http://', 'http://www.', 'www.', 'https://', 'https://www.');
					$domain_name 	= str_replace( $protocols, '', $url[0] );
					$site_url 		= str_replace( $protocols, '', get_site_url() );

					if( $already_registered != '' ){
						if( $already_registered == $new_response ):
							update_option('stike_purchase_code_status', 'valid', 'yes');
							update_option('stike_purchase_valid_code',  $purchase_code, 'yes');
							update_option('stike_valid_url',  $domain, 'yes');
							update_option('valid_url', get_site_url(), 'yes');
							?><script>let date = new Date(Date.now() + 604800);	date = date.toUTCString(); document.cookie = "ET_L_Status=<?php echo $purchase_code; ?>; expires=" + date; </script><?php
						elseif( $domain_name == $site_url ):
							/* Deregister  */
								$url 			= 'https://api.envytheme.com/api/v1/license';
								$purchaseKey 	= $purchase_code;
								$status 		= 'disabled';
								$post_url = '';
								$post_url .= $url.'?purchaseKey='.$purchaseKey.'&status='.$status.'';
								$post_url = str_replace(' ', '%', $post_url);
								$curl = curl_init();
								curl_setopt_array($curl, array(
									CURLOPT_URL 			=> $post_url,
									CURLOPT_RETURNTRANSFER 	=> true,
									CURLOPT_ENCODING 		=> "",
									CURLOPT_MAXREDIRS 		=> 10,
									CURLOPT_TIMEOUT 		=> 30,
									CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
									CURLOPT_CUSTOMREQUEST 	=> "PUT",
									CURLOPT_HTTPHEADER 		=> array(
										"cache-control: no-cache",
										"content-type: application/x-www-form-urlencoded"
									),
									CURLOPT_SSL_VERIFYPEER => false,
								));

								$response = curl_exec($curl);
								$err = curl_error($curl);
								curl_close($curl);
							/* Deregister */

							/* Register */
								$url 			= 'https://api.envytheme.com/api/v1/license';
								$purchaseKey 	= $purchase_code;
								$itemName 		= $o->item_name;
								$buyer 			= $o->buyer;
								$purchasedAt 	= $o->created_at;
								$supportUntil 	= $o->supported_until;
								$licenseType 	= $o->licence;
								$domain 		= get_site_url();
								$post_url 		= '';

								$post_url .= $url.'?purchaseKey='.$purchaseKey.'&itemName='.$itemName.'&buyer='.$buyer.'&purchasedAt='.$purchasedAt.'&supportUntil='.$supportUntil.'&licenseType='.$licenseType.'&domain='.$domain.'';

								$post_url = str_replace(' ', '%', $post_url);

								$curl = curl_init();

								curl_setopt_array($curl, array(
								CURLOPT_URL => $post_url,
								CURLOPT_RETURNTRANSFER => true,
								CURLOPT_ENCODING => "",
								CURLOPT_MAXREDIRS => 10,
								CURLOPT_TIMEOUT => 30,
								CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
								CURLOPT_CUSTOMREQUEST => "POST",
								CURLOPT_HTTPHEADER => array(
									"cache-control: no-cache",
									"content-type: application/x-www-form-urlencoded"
								),
								CURLOPT_SSL_VERIFYPEER => false,
								));

								$response = curl_exec($curl);
								$err = curl_error($curl);
								curl_close($curl);
							/* Register */

							update_option('stike_purchase_code_status', 'valid', 'yes');
							update_option('stike_purchase_valid_code',  $purchase_code, 'yes');
							update_option('stike_valid_url',  $domain, 'yes');
							update_option('valid_url', get_site_url(), 'yes');
							?><script>let date = new Date(Date.now() + 604800);	date = date.toUTCString(); document.cookie = "ET_L_Status=<?php echo $purchase_code; ?>; expires=" + date; </script><?php
						else:
							$target_site 	= $url[0];
							$src 			= file_get_contents( $target_site );
							preg_match("/\<link rel='stylesheet' id='stike-style-css'.*href='(.*?style\.css.*?)'.*\>/i", $src, $matches );

							if( $matches ) { // if theme found
								update_option('stike_purchase_code_status', 'already_registered', 'yes');
								update_option('stike_already_registered', $already_registered, 'yes');
							}else{
								/* Deregister  */
									$url 			= 'https://api.envytheme.com/api/v1/license';
									$purchaseKey 	= $purchase_code;
									$status 		= 'disabled';
									$post_url = '';
									$post_url .= $url.'?purchaseKey='.$purchaseKey.'&status='.$status.'';
									$post_url = str_replace(' ', '%', $post_url);
									$curl = curl_init();
									curl_setopt_array($curl, array(
										CURLOPT_URL 			=> $post_url,
										CURLOPT_RETURNTRANSFER 	=> true,
										CURLOPT_ENCODING 		=> "",
										CURLOPT_MAXREDIRS 		=> 10,
										CURLOPT_TIMEOUT 		=> 30,
										CURLOPT_HTTP_VERSION 	=> CURL_HTTP_VERSION_1_1,
										CURLOPT_CUSTOMREQUEST 	=> "PUT",
										CURLOPT_HTTPHEADER 		=> array(
											"cache-control: no-cache",
											"content-type: application/x-www-form-urlencoded"
										),
										CURLOPT_SSL_VERIFYPEER => false,
									));

									$response = curl_exec($curl);
									$err = curl_error($curl);
									curl_close($curl);
								/* Deregister */

								/* Register */
									$url 			= 'https://api.envytheme.com/api/v1/license';
									$purchaseKey 	= $purchase_code;
									$itemName 		= $o->item_name;
									$buyer 			= $o->buyer;
									$purchasedAt 	= $o->created_at;
									$supportUntil 	= $o->supported_until;
									$licenseType 	= $o->licence;
									$domain 		= get_site_url();
									$post_url 		= '';

									$post_url .= $url.'?purchaseKey='.$purchaseKey.'&itemName='.$itemName.'&buyer='.$buyer.'&purchasedAt='.$purchasedAt.'&supportUntil='.$supportUntil.'&licenseType='.$licenseType.'&domain='.$domain.'';

									$post_url = str_replace(' ', '%', $post_url);

									$curl = curl_init();

									curl_setopt_array($curl, array(
									CURLOPT_URL => $post_url,
									CURLOPT_RETURNTRANSFER => true,
									CURLOPT_ENCODING => "",
									CURLOPT_MAXREDIRS => 10,
									CURLOPT_TIMEOUT => 30,
									CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
									CURLOPT_CUSTOMREQUEST => "POST",
									CURLOPT_HTTPHEADER => array(
										"cache-control: no-cache",
										"content-type: application/x-www-form-urlencoded"
									),
									CURLOPT_SSL_VERIFYPEER => false,
									));

									$response = curl_exec($curl);
									$err = curl_error($curl);
									curl_close($curl);
								/* Register */
							}
						endif;
					}else {
						update_option('stike_purchase_code_status', 'valid', 'yes');
						update_option('stike_purchase_valid_code',  $purchase_code, 'yes');
						update_option('stike_valid_url',  $domain, 'yes');
						update_option('valid_url', get_site_url(), 'yes');
						?><script>let date = new Date(Date.now() + 604800);	date = date.toUTCString(); document.cookie = "ET_L_Status=<?php echo $purchase_code; ?>; expires=" + date; </script><?php
					}

				}

			}else{ // In local
				$domain = get_site_url();
				update_option('stike_purchase_code_status', 'valid', 'yes');
				update_option('stike_purchase_valid_code',  $purchase_code, 'yes');
				update_option('stike_valid_url',  $domain, 'yes');
			}
		} elseif( $purchase_code == '' ){
			update_option( 'stike_purchase_code_status', '', 'yes' );
			update_option( 'stike_purchase_code', '', 'yes' );
		}
	}
}

add_action( 'admin_bar_menu', 'edali_header_options', 500 );
function edali_header_options ( WP_Admin_Bar $admin_bar ) {
    global $wp;
	$actual_link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

	if ( $actual_link == home_url('/wp-admin/admin.php?page=stike') ){
		return '';
	}else{
		$site_url 		= get_site_url();
		$valid_url 		= get_option( 'valid_url' );
		$purchase_code 	= get_option( 'stike_purchase_valid_code' );

		if( current_user_can('administrator') ) {
			if(!isset($_COOKIE['ET_L_Status'])) {
				stike_function_pcs();
			}elseif( $site_url !=  $valid_url) {
				stike_function_pcs();
			}else{
				?><script>let date = new Date(Date.now() - 604800);	date = date.toUTCString(); document.cookie = "ET_L_Status=<?php echo $purchase_code; ?>; expires=" + date; </script><?php
			}
		}
	}
}
