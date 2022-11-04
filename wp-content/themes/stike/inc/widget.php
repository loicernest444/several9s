<?php
/**
 * Register Theme Widget
 * @package Stike
 */


// Register sidebar
if ( ! function_exists( 'stike_widgets_init' ) ) {
    function stike_widgets_init() {
        register_sidebar( array(
            'name'          => esc_html__( 'Blog Sidebar', 'stike' ),
            'id'            => 'sidebar-1',
            'description'   => esc_html__( 'Add widgets here.', 'stike' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h2 class="widget-title">',
            'after_title'   => '</h2>',
        ) );

        // Shop Sidebar
        register_sidebar( array( 
            'name'          => esc_html__( 'Shop Sidebar', 'stike' ),
            'id'            => 'shop',
            'description'   => esc_html__( 'Add widgets here.', 'stike' ),
            'before_widget' => '<div class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ) );
        // Footer Sidebar
        global $stike_opt;
        $footer_column = !empty($stike_opt['footer_column']) ? $stike_opt['footer_column'] : '';
        register_sidebar( array( 
            'name'          => esc_html__( 'Footer Widgets', 'stike' ),
            'id'            => 'footer_widgets',
            'description'   => esc_html__( 'Add widgets here.', 'stike' ),
            'before_widget' => '<div class="single-footer-widget col-lg-'.$footer_column.' col-md-'.$footer_column.' %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3>',
            'after_title'   => '</h3>',
        ) );
        
    }
}
add_action( 'widgets_init', 'stike_widgets_init' );