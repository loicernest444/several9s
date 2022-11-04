<?php
/**
 * The template for displaying search results pages
 * @package Stike
 */
get_header();

// Blog Sidebar
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

// Page Banner
if(isset($stike_opt['blog_title'])) {
    $hide_banner    = $stike_opt['enable_blog_pages_banner'];
    $bg_img         = $stike_opt['search_bg_image']['url'];
} else {
    $hide_banner    = false;
    $bg_img         = '';
}

if ( $bg_img !='' ) {
    $page_headerbg      = " page-header-bg";
} else {
    $page_headerbg      = '';
}

// Blog Title 
if( isset($stike_opt['blog_title_tag']) ):
    $tag = $stike_opt['blog_title_tag'];
else:
    $tag = 'h2';
endif;

if( $hide_banner == true ):
    $pt_165   = '';
else:
    $pt_165   = 'pt-165';
endif;
?>

	<?php if( $hide_banner == true ) { ?><!-- Start Page Title Area -->
        <div class="page-title-area  <?php echo esc_attr($page_headerbg); ?>" style="background-image:url( <?php echo esc_url( $bg_img ); ?> );">
            <div class="container">
                <div class="page-title-content blog-title-content">
                    <<?php echo esc_attr( $tag ); ?>><?php printf( esc_html__( 'Search Results for: %s', 'stike' ), '<span>' . get_search_query() . '</span>' ); ?></<?php echo esc_attr( $tag ); ?>>
                    <?php if ( function_exists('yoast_breadcrumb') ) {
						yoast_breadcrumb( '<p class="stike-seo-breadcrumbs" id="breadcrumbs">','</p>' );
					} ?>
                </div>
            </div>
        </div>
    <?php } ?><!-- End Page Title Area -->
<!-- Start Blog Area -->
<div class="blog-area ptb-100 <?php echo esc_attr( $pt_165 ); ?>">
    <div class="container">
        <div class="row">
            <!-- Start Blog Content -->
            <div class="<?php echo esc_attr( $stike_sidebar ); ?>">
                <?php
                if ( have_posts() ) :
                    while ( have_posts() ) :
                        the_post();
                        get_template_part( 'template-parts/content', get_post_format());
                    endwhile;
                else :
                    get_template_part( 'template-parts/content', 'none' );
                endif;
                ?>
        
                <!-- Stat Pagination -->
                <div class="pagination-area">
                    <nav aria-label="navigation">
                    <?php echo paginate_links( array(
                        'format' => '?paged=%#%',
                        'prev_text' => '<i class="bx bx-chevrons-left"></i>',
                        'next_text' => '<i class="bx bx-chevrons-right"></i>',
                            )
                        ) ?>
                    </nav>
                </div>
                <!-- End Pagination -->
            </div>
            <!-- End Blog Content -->
            
            <?php if( $stike_sidebar_hide == 'stike_with_sidebar' ): ?>
                <?php get_sidebar(); ?>
            <?php endif; ?>
        </div>   
    </div>
</div>
<!-- End Blog Area -->
<?php
get_footer();
