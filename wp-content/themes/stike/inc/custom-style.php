<?php
/**
 * Register custom style.
 */

if ( ! function_exists( 'stike_custom_style' ) ) {
    function stike_custom_style(){
        
        $custom_style ='';
            global $stike_opt;

            if( isset( $stike_opt['primary_color'] ) ):
                $primary_color              = $stike_opt['primary_color'];
                $secondary_color            = $stike_opt['secondary_color'];
                $footer_bg                  = $stike_opt['footer_bg'];
                $nav_bg_color               = $stike_opt['nav_bg_color'];
                $nav_item_color             = $stike_opt['nav_item_color'];
                $enable_footer_shape 	    = $stike_opt['enable_footer_shape'];
                $mob_nav_item_color 	    = $stike_opt['mob_nav_item_color'];
                $preloader_bg               = $stike_opt['preloader_bgcolor'];
                $preloader_circle           = $stike_opt['preloader_circle_color'];
                $top_header_bg              = $stike_opt['top_header_bg'];
                $top_header_text            = $stike_opt['top_header_text_color'];
                $secondary_button_color     = $stike_opt['secondary_button_color'];
            else:   
                $primary_color              = '#13c4a1';
                $secondary_color            = '#ff612f';
                $footer_bg                  = '#080a3c';
                $nav_bg_color               = '#fff';
                $nav_item_color             = '#4a6f8a';
                $mob_nav_item_color         = '#677294';
                $enable_footer_shape 	    = false;
                $preloader_bg               = '#ff612f';
                $preloader_circle           = '#ffffff';
                $top_header_bg              = '#13c4a1';
                $top_header_text            = '#ffffff';
                $secondary_button_color     = '#080a3c';
            endif;

            $custom_style .='
            .sidebar .widget ul li::before, .blog-details .blog-details-content .features-list li:hover i, .entry-meta li::before, blockquote::after, .blockquote::after, .page-title-content ul li::before, .pagination-area .page-numbers.current, .pagination-area .page-numbers:hover, .pagination-area .page-numbers:focus, .pages-links .post-page-numbers.current, .pages-links .post-page-numbers:hover, .pages-links .post-page-numbers:focus, .single-footer-widget h3::before, .footer-area .logo h2::before, .single-footer-widget .social li a:hover, .single-footer-widget .footer-contact-info li a::before, .post-password-form input[type="submit"], .search-form .search-submit, .sidebar .widget_search form button, .sidebar .tagcloud a:hover, .sidebar .tagcloud a:focus, .comment-navigation .nav-links .nav-previous a:hover, .comment-navigation .nav-links .nav-next a:hover, #comments .comment-list .comment-body .reply a:hover, .comment-respond .form-submit input, .wp-block-button .wp-block-button__link, .page-links .current, .page-links .post-page-numbers:hover , .footer-area .tagcloud a:hover, .sticky .single-blog-post .blog-post-content .details-btn a:hover, .post-tag-media ul li a:hover, .no-results form button, .default-btn span, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .spacle-nav .navbar .others-options .default-btn, .banner-content-slides.owl-theme .owl-nav [class*=owl-]:hover, .services-area.bg-right-color::before, .services-area.bg-left-color::before, .video-box .video-btn:hover, .video-box .video-btn:focus, .contact-cta-box .default-btn, .single-features-box .icon, .features-box:hover .icon, .single-team-box .image .social li a:hover, .testimonials-area, .col-lg-4:nth-child(3) .single-pricing-table .btn-box .default-btn, .app-download-content .sub-title, .blog-details-desc .article-footer .article-tags a:hover, .prev-link-wrapper .image-prev::after, .next-link-wrapper .image-next::after, .page-title-area, .widget-area .widget_search form button, .widget-area .tagcloud a:hover, .widget-area .tagcloud a:focus, .login-content .login-form form .connect-with-social button:hover, .signup-content .signup-form form .connect-with-social button:hover, .subscribe-content form button:hover, .subscribe-content form button:focus, .contact-info .contact-info-content .social li a:hover, .sidebar .widget_search form button,  .footer-area .widget_search form button, .banner-image-slider .owl-dots .owl-dot.active span, .banner-image-slider .owl-dots .owl-dot:hover span, .wp-block-search .wp-block-search__button, .wp-block-tag-cloud .tag-cloud-link:hover, .hero-banner-content .btn-box .default-btn, .banner-img.banner-video .video-box .video-btn, .overview-content .number, .services-area.bg-right-color::before, .services-area.bg-left-color::before, .feature-box:hover , .features-box-one i, .about-inner-content .content .features-list li:hover i, .single-case-studies-item .content .link-btn:hover, .single-team-member .image .social-link li a:hover, .company-preview-video .video-btn:hover, .company-preview-video .video-btn:focus, .service-details-content .service-details-info .single-info-box .default-btn, .header-left-content .social li a:hover { background-color: '.esc_attr($primary_color).';}

            .wp-block-file .wp-block-file__button, .navbar-area.bg-white .optional-btn span, .black-btn span { background-color: '.esc_attr($primary_color).' !important; }

            .footer-area .single-footer-widget ul li::before, .sidebar .widget .widget-title::before, .blog-details-desc .article-content .entry-meta ul li::before, .pagination-area .page-numbers.current, .pagination-area .page-numbers:hover, .pagination-area .page-numbers:focus, .widget-area .widget .widget-title::before, .widget-area .widget_recent_entries ul li::before, .widget-area .widget_recent_comments ul li::before, .widget-area .widget_archive ul li::before, .widget-area .widget_categories ul li::before, .widget-area .widget_meta ul li::before, .blog-details .blog-meta ul li::before, .saas-banner, .demo-rtl { background: '.esc_attr($primary_color).';}

            .sticky .blog-post-content h3::before, .blog-details .blog-details-content code, .blog-details .blog-details-content ul a, .blog-details .blog-details-content .category li a:hover, .entry-meta li a:hover, .blog-details .blog-details-content ul.entry-meta li a:hover, .wp-block-image figcaption a, .blog-details .blog-details-content p a, .blog-details .blog-details-content ol a, .wp-block-file a, table th a, .wp-caption .wp-caption-text a, .comments-area .comment-content code, .comments-area .comment-content kbd, table td a, table td a:hover, .page-main-content .entry-content a, .page-main-content kbd, .page-main-content code, a:hover, .sidebar .widget ul li a:hover, a:hover, .spacle-nav .navbar .navbar-nav .nav-item a:hover, .spacle-nav .navbar .navbar-nav .nav-item a:focus, .spacle-nav .navbar .navbar-nav .nav-item a.active, .spacle-nav .navbar .navbar-nav .nav-item:hover a, .spacle-nav .navbar .navbar-nav .nav-item.active a, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li a:hover, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li a:focus, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li a.active, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a:hover, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a:focus, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a.active, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active,.spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:hover, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a:focus, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li a.active, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li .dropdown-menu li .dropdown-menu li.active a, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li.active a, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li.active a, .spacle-responsive-nav .spacle-responsive-menu.mean-container .mean-nav ul li.active > a, .features-box .icon, .features-box .back-icon, .single-team-box .content span, .single-feedback-item .feedback-desc .client-info span, .single-testimonials-item .client-info span, .single-pricing-table .pricing-features li i, .blog-notes p a:hover, .blog-details-desc .article-content .entry-meta ul li a:hover, .blog-details-desc .article-content .features-list li i, .prev-link-wrapper a:hover .prev-link-info-wrapper, .next-link-wrapper a:hover .next-link-info-wrapper, .widget-area .widget_recent_entries ul li a:hover, .widget-area .widget_recent_comments ul li a:hover, .widget-area .widget_archive ul li a:hover, .widget-area .widget_categories ul li a:hover, .widget-area .widget_meta ul li a:hover, .login-content .login-form form .forgot-password a, .login-content .login-form form .connect-with-social button, .signup-content .signup-form form .connect-with-social button, .contact-features-list ul li i, .contact-info .contact-info-content h2 a, .contact-info .contact-info-content h2 a:not(:first-child):hover, .single-footer-widget .list li a:hover, .single-footer-widget .support-list li a:hover, .single-footer-widget .footer-contact-info li a:hover, .copyright-area p a:hover, .sticky .single-blog-post .blog-post-content h3 a:hover, .blog-details .blog-meta ul li i, .c-info li i, .c-info li a:hover, .contact-form span.wpcf7-list-item label a, .blog-details .blog-details-content dd a, .comments-area .comment-content dd a, .fun-facts-inner-content ul li i, .overview-content ul li i, .feature-box i, .funfact-style-two i, .single-features-card i, .single-features-card h3 a:hover, .hero-banner-content h1 span, .digital-agency-banner-content h1 span, .single-featured-box .read-more-btn i, .about-inner-content .content .features-list li i, .single-services-box .content .read-more-btn i, .single-blog-post-item .post-content .post-content-footer li i, .service-details-content .service-details-info .single-info-box .social li a:hover, .service-details-content .service-details-info .single-info-box .default-btn:hover { color: '.esc_attr($primary_color).'; }

            .is-style-outline .wp-block-button__link, .blog-details .blog-meta ul li a:hover, .blog-details .blog-meta ul li a:hover, table th a:hover, .footer-area .single-footer-widget ul li a:hover, .navbar-area.bg-white .optional-btn span, .features-box-six i  { color: '.esc_attr($primary_color).' !important; }

            #comments .comment-list .comment-body .reply a:hover, .sidebar .widget_search form .search-field:focus, .sidebar .tagcloud a:hover, .sidebar .tagcloud a:focus, .footer-area .tagcloud a:hover, .single-features-box .icon::before, .feedback-slides.owl-theme .owl-dots .owl-dot span, .login-content .login-form form .connect-with-social button, .signup-content .signup-form form .connect-with-social button, .services-btn-box .default-btn:hover, .company-preview-video .video-btn:hover::after, .company-preview-video .video-btn:hover::before, .company-preview-video .video-btn:focus::after, .company-preview-video .video-btn:focus::before, .banner-img.banner-video .video-box .video-btn::after, .banner-img.banner-video .video-box .video-btn::before, .service-details-content .service-details-info .single-info-box .default-btn { border-color: '.esc_attr($primary_color).'; } 

            .single-features-box .icon::before, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu { border-color: '.esc_attr($primary_color).'; } 

            .widget_search form button:hover, .post-password-form input[type="submit"]:hover, .no-results form button:hover, .default-btn, .optional-btn span, .banner-image, .banner-img, .video-box .video-btn, .contact-cta-box .default-btn span, .col-lg-4:nth-child(1) .single-features-box .icon, .col-lg-4:nth-child(1) .features-box:hover .icon, .col-lg-3:nth-child(1) .single-team-box .image .social li a:hover, .col-lg-3:nth-child(7) .single-team-box .image .social li a:hover, .feedback-slides.owl-theme .owl-dots .owl-dot span::before, .col-lg-4:nth-child(3) .single-pricing-table .btn-box .default-btn span, .blog-details-desc .article-footer .article-tags a, .widget-area .widget_search form button:hover, .subscribe-content, .go-top:hover, .hero-banner-content .btn-box .default-btn:hover, .banner-img.banner-video .video-box .video-btn:hover, .banner-img.banner-video .video-box .video-btn:focus, .saas-banner .hero-content .default-btn span, .col-lg-4:nth-child(1) .single-features-box .icon, .demo-rtl, .single-case-studies-item .content .link-btn, .case-studies-slides.owl-theme .owl-nav [class*=owl-]:hover, .testimonials-slides-two.owl-theme .owl-dots .owl-dot span::before, .single-team-member .content i, .blog-slides.owl-theme .owl-nav [class*=owl-]:hover { background-color: '.esc_attr($secondary_color).'; }

            .navbar-area.navbar-style-two .spacle-nav .navbar .others-options .optional-btn i, .main-banner-content .content h1 span, .main-banner-content .content .default-btn i, .banner-content .content h1 span, .banner-content .content .default-btn i, .about-content .sub-title, .single-funfacts h3, .contact-cta-box .default-btn i, .col-lg-4:nth-child(1) .features-box .icon, .col-lg-4:nth-child(1) .features-box .back-icon, .col-lg-3:nth-child(1) .single-team-box .content span, .col-lg-3:nth-child(7) .single-team-box .content span, .single-feedback-item .feedback-desc .rating i, .pricing-list-tab .tabs li a i, .col-lg-4:nth-child(1) .single-pricing-table .btn-box .default-btn i, .col-lg-4:nth-child(3) .single-pricing-table .btn-box .default-btn i, .faq-accordion h2 span, .faq-accordion .accordion .accordion-title.active i::before, .single-blog-post .blog-image .date i, .blog-notes p a, .blog-details-desc .article-content .entry-meta ul li i, .login-content .login-form form .forgot-password a:hover, .subscribe-content form button i, .contact-info .contact-info-content h2 a:hover, .contact-info .contact-info-content h2 a:not(:first-child), .copyright-area p a, .copyright-area p a, .section-title h2 span, .services-content .content .default-btn i, .saas-banner .hero-content .default-btn i, .saas-banner .hero-content .video-btn i, .single-feedback-item .feedback-desc .rating i, .single-testimonials-item .testimonials-desc .rating i, .comment-respond p.comment-form-cookies-consent, .section-title.text-left .sub-title, .services-btn-box .default-btn, .services-btn-box .default-btn i, .case-studies-slides.owl-theme .owl-nav [class*=owl-], .single-testimonials-box .client-info .title h3, .single-blog-post-item .post-content .category:hover, .single-blog-post-item .post-content .post-content-footer li .post-author span, .blog-slides.owl-theme .owl-nav [class*=owl-], .company-preview-video .video-btn, .lets-talk-content .sub-title { color: '.esc_attr($secondary_color).'; }

            .post-password-form input[type="submit"]:hover, .video-box .video-btn::after, .video-box .video-btn::before, .services-btn-box .default-btn { border-color: '.esc_attr($secondary_color).'; }

            .navbar-area.navbar-style-two, .navbar-area.is-sticky { background: '.esc_attr( $nav_bg_color ).' !important; }

            .spacle-nav .navbar .navbar-nav .nav-item a, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li a, .spacle-nav .navbar .navbar-nav .nav-item .dropdown-menu li .dropdown-menu li a { color: '.esc_attr( $nav_item_color  ).'; }

            .mean-container .mean-nav ul li a, .mean-container .mean-nav ul li li a { color: '.esc_attr( $mob_nav_item_color  ).'; }
            
            .footer-area {  background-color: '.esc_attr( $footer_bg ).'; } 

            .single-products .sale-btn, .single-products .products-image ul li a:hover, .productsQuickView .modal-dialog .modal-content .products-content form button, .productsQuickView .modal-dialog .modal-content button.close:hover, .productsQuickView .modal-dialog .modal-content button.close:hover, .woocommerce ul.products li.product:hover .add-to-cart-btn, .shop-sidebar .widget_product_search form button, .shop-sidebar a.button, .shop-sidebar .woocommerce-widget-layered-nav-dropdown__submit, .shop-sidebar .woocommerce button.button, .woocommerce .widget_price_filter .ui-slider .ui-slider-range, .woocommerce .widget_price_filter .ui-slider .ui-slider-handle, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt, .products_details div.product .woocommerce-tabs .panel #respond input#submit, .products_details div.product .product_title::before, .woocommerce #respond input#submit.alt.disabled, .woocommerce #respond input#submit.alt.disabled:hover, .woocommerce #respond input#submit.alt:disabled, .woocommerce #respond input#submit.alt:disabled:hover, .woocommerce #respond input#submit.alt:disabled[disabled], .woocommerce #respond input#submit.alt:disabled[disabled]:hover, .woocommerce a.button.alt.disabled, .woocommerce a.button.alt.disabled:hover, .woocommerce a.button.alt:disabled, .woocommerce a.button.alt:disabled:hover, .woocommerce a.button.alt:disabled[disabled], .woocommerce a.button.alt:disabled[disabled]:hover, .woocommerce button.button.alt.disabled, .woocommerce button.button.alt.disabled:hover, .woocommerce button.button.alt:disabled, .woocommerce button.button.alt:disabled:hover, .woocommerce button.button.alt:disabled[disabled], .woocommerce button.button.alt:disabled[disabled]:hover, .woocommerce input.button.alt.disabled, .woocommerce input.button.alt.disabled:hover, .woocommerce input.button.alt:disabled, .woocommerce input.button.alt:disabled:hover, .woocommerce input.button.alt:disabled[disabled], .woocommerce input.button.alt:disabled[disabled]:hover, .btn-primary:hover, .woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce .woocommerce-MyAccount-navigation ul .is-active a, .woocommerce .woocommerce-MyAccount-navigation ul li a:hover, .products_details div.product span.sale-btn { background-color: '.esc_attr($primary_color).'; }

            .btn-primary, .btn-primary.disabled, .btn-primary:disabled { background-color: '.esc_attr($secondary_color).'; }

            .preloader-area {background: '.esc_attr($preloader_bg, 'stike').';}

            .preloader-area .spinner .disc {
                border: 0.3em dotted '.esc_attr($preloader_circle, 'stike').';
            }

            .preloader-area .spinner::before {
                border: 2px dotted '.esc_attr($preloader_circle, 'stike').';
            }

            .top-header  {background-color: '. esc_attr($top_header_bg) .';}
            .top-header .header-left-content p, .top-header .header-right-content ul li, .top-header .header-right-content ul li a, .top-header .header-right-content ul li i  {color: '. esc_attr($top_header_text) .';}

            .productsQuickView .modal-dialog .modal-content .products-content .product-meta span a:hover, .woocommerce ul.products li.product h3 a:hover, .woocommerce ul.products li.product .add-to-cart-btn, .woocommerce div.product .woocommerce-tabs ul.tabs li.active a, .products_details div.product .woocommerce-tabs ul.tabs li a:hover, .products_details div.product .woocommerce-tabs ul.tabs li.active, .products_details div.product .woocommerce-tabs ul.tabs li.active a:hover, .products_details div.product .product_meta span.posted_in a:hover, .products_details div.product .product_meta span.tagged_as a:hover, .products_details div.product span.price, .cart-table table tbody tr td.product-name a, .woocommerce-message::before, .woocommerce-info::before { color: '.esc_attr ($primary_color).'; }

            .woocommerce-info, .woocommerce-message { border-top-color: '.esc_attr ($primary_color).'; }

            .shop-sidebar .widget_shopping_cart .cart_list li a:hover, .shop-sidebar ul li a:hover { color: '.esc_attr ($primary_color).' !important; }

            .woocommerce ul.products li.product:hover .add-to-cart-btn, .form-control:focus, .woocommerce .form-control:focus { border-color: '.esc_attr ($primary_color).'; }

            .navbar-area.bg-white .optional-btn, .black-btn { background-color: '.esc_attr ($secondary_button_color).' !important; }
            .navbar-area.bg-white .optional-btn::before { border-color: '.esc_attr ($secondary_button_color).' !important; }

            .spacle-nav .navbar .others-options .optional-btn span, .spacle-nav .navbar .others-options .default-btn span, .banner-content .content .default-btn, .services-content .content .default-btn, .col-lg-4:nth-child(1) .single-pricing-table .btn-box .default-btn, .subscribe-content form button, .saas-banner .hero-content .default-btn, .saas-banner .hero-content .video-btn:hover i, .pricing-list-tab .tabs li.current a, .main-banner-content .content .default-btn { background-color: '.esc_attr ($secondary_button_color).'; }

            .spacle-nav .navbar .others-options .optional-btn:hover::before, .spacle-nav .navbar .others-options .optional-btn:focus::before, .navbar-area.is-sticky .spacle-nav .navbar .others-options .optional-btn::before { border-color: '.esc_attr ($secondary_button_color).'; }
            
            ';

            if( !isset( $stike_opt['primary_color'] ) ):
                $custom_style .=' .footer-area {  padding-top: 50px; padding-bottom: 20px } ';
            endif;
           
            // Hide Sticky Header
            if(isset($stike_opt['enable_sticky_header']) && $stike_opt['enable_sticky_header'] == false){ $custom_style .='
                .navbar-area.is-sticky{
                    display:none !important;
                }';
            }

            // Hide 404 Page Header And Footer
            if( is_404() ): $custom_style .='
            .navbar-area, .footer-area {display: none;}';
            endif;

            // Custom Css
            if( isset($stike_opt['css_code'] ) && !empty($stike_opt['css_code']) ):
                $custom_style .= $stike_opt['css_code'];
            endif;

            if( is_user_logged_in() ){ 
                $custom_style .=' .comments-area .comment-respond .form-submit {
                    margin-top: 20px;
                }';
            }

            // Footer shape image
            if( $enable_footer_shape == false ):
                $custom_style .='
                .footer-area::before, .footer-area::after { display: none; }';
            endif;

            // Pre-loader image
            $is_preloader       = !empty($stike_opt['enable_preloader']) ? $stike_opt['enable_preloader'] : '';
            $preloader_image    = isset( $stike_opt['preloader_image']['url'] ) ? $stike_opt['preloader_image']['url'] : get_template_directory_uri() . '/assets/img' .'/status.gif';
            $preloader_style    = !empty( $stike_opt['preloader_style'] ) ? $stike_opt['preloader_style'] : 'text';
            if ( $preloader_style == 'image' && $is_preloader == '1' ) {
                $custom_style .= "
                .preloader-area:after,  .preloader-area:before {
                    display: none;
                }
                .preloader-area {background: '.esc_attr($preloader_bg, 'stike').';}
                
                .preloader-img {
                    background-image: url(" . esc_url( $preloader_image ) . ");
                    background-repeat: no-repeat;
                    background-position: center;
                }";
            }

            // Mobile top header
            if( isset( $stike_opt['enable_top_header_mobile'] ) ):
                if( $stike_opt['enable_top_header_mobile'] != true ):
                    $custom_style .= "
                    @media only screen and (max-width: 767px) {
                        .top-header {
                            display: none;
                        }
                    }";
                endif;
            endif;

            //Page Banner Animation Hide/Show
            if(isset($stike_opt['banner_animation']) && $stike_opt['banner_animation'] == false):
                $custom_style .='
                .page-title-area::before { animation: none; }';
            endif;
            
            wp_add_inline_style('stike-main-style', $custom_style);

            
            $custom_script ='';
            
            if( isset( $stike_opt['animation'] ) ):
                $animation = $stike_opt['animation'];
            else:
                $animation = 'yes';
            endif;

            if( $animation == 'yes' ):
                $custom_script.="
                (function($){
                    'use strict';

                    // WOW JS
                    $(window).on ('load', function (){
                        if ($('.wow').length) { 
                            var wow = new WOW({
                            boxClass:     'wow',      // animated element css class (default is wow)
                            animateClass: 'animated', // animation css class (default is animated)
                            offset:       20,          // distance to the element when triggering the animation (default is 0)
                            mobile:       true, // trigger animations on mobile devices (default is true)
                            live:         true,       // act on asynchronously loaded content (default is true)
                        });
                        wow.init();
                        }
                    });

                }(jQuery));
                ";
            endif;

            // Custom Js
            if( isset($stike_opt['js_code'] )){
                $custom_script .= $stike_opt['js_code'];
            }
            
            wp_add_inline_script( 'stike-main', $custom_script );
    }
}
add_action( 'wp_enqueue_scripts', 'stike_custom_style' );