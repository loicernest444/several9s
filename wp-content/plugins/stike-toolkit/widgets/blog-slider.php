<?php
/**
 * Blog Post Slider Widget
 */

namespace Elementor;
class Stike_Blog_Post_Slider extends Widget_Base {

	public function get_name() {
        return 'StikeBlogPostSlider';
    }

	public function get_title() {
        return __( 'Blog Post Slider', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-slider-album';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'blog_section',
			[
				'label' => __( 'Blog Post Slider', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'cat_name',
                [
                    'label' => __( 'Select Category', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => stike_toolkit_get_post_cat_list(),
                ]
            );

            $this->add_control(
                'order',
                [
                    'label' => __( 'Post Order By', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'DESC'      => __( 'DESC', 'stike-toolkit' ),
                        'ASC'       => __( 'ASC', 'stike-toolkit' ),
                    ],
                    'default' => 'DESC',
                ]
            );

            $this->add_control(
                'count',
                [
                    'label' => __( 'Count', 'stike-toolkit' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3,
                ]
            );


        $this->end_controls_section();

    }

	protected function render() {
        $settings = $this->get_settings_for_display();

        global $stike_opt;
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

        if ($settings['cat_name'] != '') {
            $args = array(
                'orderby' => 'date',
                'order' => $settings['order'],
                'posts_per_page' => $settings['count'],
                'ignore_sticky_posts' => 1,
                'meta_key' => '_thumbnail_id',
                'tax_query' => array(
                    array(
						'taxonomy' => 'category',
						'field'    => 'slug',
                        'terms' => $settings['cat_name'],
                    )
                )
            );
        }else{
            $args = array(
                'orderby' => 'date',
                'order' => $settings['order'],
                'posts_per_page' => $settings['count'],
                'ignore_sticky_posts' => 1,
                'meta_key' => '_thumbnail_id'
            );
        }
        $post_array = new \WP_Query( $args );

        ?>
            <div class="blog-slides owl-carousel owl-theme">
                <?php
                while($post_array->have_posts()): $post_array->the_post();
                    $get_author_id = get_the_author_meta('ID');
                    $get_author_gravatar = get_avatar_url($get_author_id, array('size' => 60));
                    ?>
                    <div class="single-blog-post-item">
                        <div class="post-image">
                            <a href="#" class="d-block">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php the_post_thumbnail_url( 'stike_el_post_thumb' ); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                            </a>
                        </div>

                        <div class="post-content">
                            <?php
                            $posttags = get_the_tags();
                            $count = 0; $sep = '';
                            if ( $posttags ) {
                                foreach( $posttags as $tag ) {
                                    $count++;
                                    echo '<a class="category" href="'.get_tag_link($tag->term_id).'">'.$tag->name.'</a>';
                                    if( $count > 0 ) break;
                                }
                            }
                            ?>
                            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <ul class="post-content-footer d-flex justify-content-between align-items-center">
                                <li>
                                    <?php
                                        $user       = get_the_author_meta('ID');
                                        $user_image = get_avatar_url($user, ['size' => '51']);
                                    ?>
                                    <div class="post-author d-flex align-items-center">
                                        <?php if( $is_lazyloader == true ): ?>
                                            <img sm-src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php echo esc_attr( get_the_author() ); ?>">
                                        <?php else: ?>
                                            <img src="<?php echo esc_url( $user_image ); ?>" class="rounded-circle" alt="<?php echo esc_attr( get_the_author() ); ?>">
                                        <?php endif; ?>
                                        <span><?php echo esc_html( get_the_author() ); ?></span>
                                    </div>
                                </li>
                                <li>
                                    <i class='bx bx-calendar'></i> <?php echo get_the_date( 'Y-m-d' ); ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
    <?php
    }


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Blog_Post_Slider );