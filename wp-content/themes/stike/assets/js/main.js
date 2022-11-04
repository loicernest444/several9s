(function($){
	"use strict";
	jQuery(document).on('ready', function () {

        // Header Sticky
		$(window).on('scroll',function() {
            if ($(this).scrollTop() > 120){  
                $('.navbar-area').addClass("is-sticky");
            }
            else{
                $('.navbar-area').removeClass("is-sticky");
            }
        });
		
		// Mean Menu
		jQuery('.mean-menu').meanmenu({
			meanScreenWidth: "991"
        });

        // Button Hover JS
        $(function() {
            $('.default-btn')
            .on('mouseenter', function(e) {
                var parentOffset = $(this).offset(),
                relX = e.pageX - parentOffset.left,
                relY = e.pageY - parentOffset.top;
                $(this).find('span').css({top:relY, left:relX})
            })
            .on('mouseout', function(e) {
                var parentOffset = $(this).offset(),
                relX = e.pageX - parentOffset.left,
                relY = e.pageY - parentOffset.top;
                $(this).find('span').css({top:relY, left:relX})
            });
        });

        // Odometer JS
        $('.odometer').appear(function(e) {
			var odo = $(".odometer");
			odo.each(function() {
				var countNumber = $(this).attr("data-count");
				$(this).html(countNumber);
			});
        });

        // Tooltip JS
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        });

        // Popup Image
        $('.popup-btn').magnificPopup({
            type: 'image',
            gallery: {
                enabled: true,
            }
        });
		
		// Popup Video
		$('.popup-youtube').magnificPopup({
			disableOn: 320,
			type: 'iframe',
			mainClass: 'mfp-fade',
			removalDelay: 160,
			preloader: false,
			fixedContentPos: false
        });
        
        // Go to Top
        $(function(){
            // Scroll Event
            $(window).on('scroll', function(){
                var scrolled = $(window).scrollTop();
                if (scrolled > 600) $('.go-top').addClass('active');
                if (scrolled < 600) $('.go-top').removeClass('active');
            });  
            // Click Event
            $('.go-top').on('click', function() {
                $("html, body").animate({ scrollTop: "0" },  500);
            });
        });
	});
    
    // Preloader
	$(window).on('load', function() {
		$('.preloader-area').fadeOut();
    });
    
    // Banner Content Slides
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/Stike_Banner.default', function($scope, $){
            $('.banner-content-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: false,
                items: 1,
                navText: [
                    "<i class='bx bx-left-arrow-alt'></i>",
                    "<i class='bx bx-right-arrow-alt'></i>"
                ]
            });

            // Banner Image Slides
            $('.banner-image-slider').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                autoplayTimeout: 2500,
                autoHeight: true,
                items: 1,
                animateOut: 'fadeOut',
            });
	
		});
    });

    // Partner Slides
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/Partner_Logo.default', function($scope, $){
           
            $('.partner-slides').owlCarousel({
                loop: true,
                nav: false,
                dots: false,
                autoplayHoverPause: true,
                autoplay: false,
                margin: 50,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 2,
                    },
                    576: {
                        items: 3,
                    },
                    768: {
                        items: 3,
                    },
                    1200: {
                        items: 5,
                    }
                }
            });
	
		});
    });

    // Elementor JS
	$( window ).on( 'elementor/frontend/init', function() {
        elementorFrontend.hooks.addAction( 'frontend/element_ready/widget', function( $scope ) {
            
            // Blog Slides
            $('.blog-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 1,
                    },
                    768: {
                        items: 2,
                    },
                    1200: {
                        items: 3,
                    }
                }
            });

            // Case Studies Slides
            $('.case-studies-slides').owlCarousel({
                loop: true,
                nav: true,
                dots: false,
                autoplayHoverPause: true,
                autoplay: true,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    992: {
                        items: 3,
                    },
                    1200: {
                        items: 4,
                    }
                }
            });

            // Testimonials Slides
            $('.testimonials-slides-two').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                autoplayHoverPause: true,
                autoplay: true,
                animateOut: 'fadeOut',
                animateIn: 'fadeIn',
                items: 1,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ]
            });
           
            $('.feedback-slides').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                autoplayHoverPause: true,
                autoplay: false,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    768: {
                        items: 1,
                    },
                    1024: {
                        items: 2,
                    },
                    1200: {
                        items: 2,
                    }
                }
            });

            // Testimonials Slides
            $('.testimonials-slides').owlCarousel({
                loop: true,
                nav: false,
                dots: true,
                autoplayHoverPause: true,
                autoplay: false,
                margin: 30,
                navText: [
                    "<i class='bx bx-chevron-left'></i>",
                    "<i class='bx bx-chevron-right'></i>"
                ],
                responsive: {
                    0: {
                        items: 1,
                    },
                    576: {
                        items: 2,
                    },
                    768: {
                        items: 2,
                    },
                    1200: {
                        items: 2,
                    }
                }
            });
        
		});
    });

    // Tabs
	$( window ).on( 'elementor/frontend/init', function() {
		elementorFrontend.hooks.addAction( 'frontend/element_ready/Stike_Pricing.default', function($scope, $){

            (function ($) {
                $('.tab ul.tabs').addClass('active').find('> li:eq(0)').addClass('current');
                $('.tab ul.tabs li a').on('click', function (g) {
                    var tab = $(this).closest('.tab'), 
                    index = $(this).closest('li').index();
                    tab.find('ul.tabs > li').removeClass('current');
                    $(this).closest('li').addClass('current');
                    tab.find('.tab_content').find('div.tabs_item').not('div.tabs_item:eq(' + index + ')').slideUp();
                    tab.find('.tab_content').find('div.tabs_item:eq(' + index + ')').slideDown();
                    g.preventDefault();
                });
            })(jQuery);
    	});
    });
    
}(jQuery));