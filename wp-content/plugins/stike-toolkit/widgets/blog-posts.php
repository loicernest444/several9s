<?php
/**
 * Blog Post Widget
 */

namespace Elementor;
class Stike_Blog_Post extends Widget_Base {

	public function get_name() {
        return 'StikeBlogPost';
    }

	public function get_title() {
        return __( 'Blog Post', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-posts-grid';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'blog_section',
			[
				'label' => __( 'Blog Post', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'blog_style',
                [
                    'label' => __( 'Blog Style', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        1   => __( 'Style One', 'stike-toolkit' ),
                        2   => __( 'Style Two', 'stike-toolkit' ),
                    ],
                    'default' => 1,
                ]
            );

            $this->add_control(
                'columns',
                [
                    'label' => __( 'Choose Columns', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        2   => __( '2', 'stike-toolkit' ),
                        3   => __( '3', 'stike-toolkit' ),
                        4   => __( '4', 'stike-toolkit' ),
                    ],
                    'default' => 3,
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('News and Insights', 'stike-toolkit'),
					'condition' => [
                        'blog_style' => ['1'],
                    ]
                ]
            );

            $this->add_control(
                'description',
                [
                    'label' => __( 'Short Description', 'stike-toolkit' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => __('Insights to help you do what you do better, faster and more profitably.', 'stike-toolkit'),
					'condition' => [
                        'blog_style' => ['1'],
                    ]
                ]
            );

            $this->add_control(
                'blog_all',
                [
                    'label' => __( 'Blog Page Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Read Full Blog', 'stike-toolkit'),
					'condition' => [
                        'blog_style' => ['1'],
                    ]
                ]
            );
            $this->add_control(
                'blog_page_link',
                [
                    'label' => __( 'Blog Page Link', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => stike_toolkit_get_page_as_list(),
					'condition' => [
                        'blog_style' => ['1'],
                    ]
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
                    'label' => __( 'Post Per Page', 'stike-toolkit' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 3,
                ]
            );

            $this->add_control(
                'read_more',
                [
                    'label' => __( 'Read More Text', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Read More', 'stike-toolkit'),
					'condition' => [
                        'blog_style' => ['2'],
                    ]
                ]
            );

            $this->add_control(
                'read_more_icon',
                [
                    'label' => __( 'Read More Icon', 'stike-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'options' 		=> stike_icons(),
					'default' 		=> 'bx bx-right-arrow-alt',
					'condition' => [
                        'blog_style' => ['2'],
                    ]
                ]
            );


        $this->end_controls_section();

        $this->start_controls_section(
			'post_style',
			[
				'label' => __( 'Style', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-featured-box h3' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_responsive_control(
                'title_size',
                [
                    'label' => __( 'Title Font Size', 'stike-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 70,
                            'step' => 1,
                        ],
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-featured-box h3' => 'font-size: {{SIZE}}px;',
                    ],
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

        $is_animation      = !empty($stike_opt['enable_animation_css']) ? $stike_opt['enable_animation_css'] : '';

        if( $is_animation == true ):
            $wow_class = 'wow fadeInUp';
        else:
            $wow_class = '';
        endif;

        $columns = $settings['columns'];
        if ($columns == 2) {
            $column = 'col-lg-6 col-md-6';
        }elseif ($columns == 4) {
            $column = 'col-lg-3 col-md-6';
        }else {
            $column = 'col-lg-4 col-md-6';
        }

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


        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('description','none');

        ?>

        <?php if( $settings['blog_style'] == '1' ):
            $blog_link = get_page_link($settings['blog_page_link']);
            ?>
            <div class="blog-area ptb-100">
                <div class="container">
                    <div class="section-title">
                        <h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo $settings['title'] ?></h2>
                    </div>

                    <div class="row">

                        <?php
                        while($post_array->have_posts()): $post_array->the_post();
                            $get_author_id = get_the_author_meta('ID');
                            $get_author_gravatar = get_avatar_url($get_author_id, array('size' => 60));
                            ?>
                            <div class="<?php echo esc_attr($column); ?>">
                                <div class="single-blog-post page-single-blog">
                                    <div class="blog-image">
                                        <a href="<?php the_permalink(); ?>">
                                            <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php the_post_thumbnail_url( 'stike_el_post_thumb' ); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                        </a>
                                    </div>

                                    <div class="blog-post-content">

                                        <?php if( isset( $stike_opt['is_post_meta'] ) && $stike_opt['is_post_meta'] == true ) { ?>
                                            <div class="date">
                                            <i class='bx bx-calendar'></i> <?php echo esc_html(get_the_date()); ?>
                                        </div>
                                        <?php } ?>

                                        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>

                                        <div class="post-info">
                                            <?php if( isset( $stike_opt['is_post_meta'] ) && $stike_opt['is_post_meta'] == true ) { ?>
                                                <div class="post-by">
                                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $get_author_gravatar ); ?>" alt="<?php the_title(); ?>">

                                                    <h6><?php echo esc_html(get_the_author()); ?></h6>
                                                </div>
                                            <?php } ?>

                                            <div class="details-btn">
                                                <a href="<?php the_permalink(); ?>"><i class="bx bx-right-arrow-alt"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>

                        <div class="col-lg-12 col-md-12">
                            <div class="blog-notes">
                                <p <?php echo $this-> get_render_attribute_string('description'); ?>><?php echo wp_kses_post( $settings['description'] ); ?> <a href="<?php echo esc_url( $blog_link ); ?>"> <?php echo esc_html( $settings['blog_all'] ); ?></a></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php if( $settings['blog_style'] == '2' ):
            ?>
            <div class="featured-area pt-100 pb-70">
                <div class="container">
                    <div class="row">
                        <?php
                        while($post_array->have_posts()): $post_array->the_post();
                            $get_author_id = get_the_author_meta('ID');
                            $get_author_gravatar = get_avatar_url($get_author_id, array('size' => 60));
                            ?>
                        <div class="<?php echo esc_attr($column); ?> <?php echo esc_attr($wow_class); ?>" data-wow-delay=".2s">
                            <div class="single-featured-box">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php the_post_thumbnail_url( 'stike_blog_two_thumb' ); ?>" alt="<?php the_post_thumbnail_caption(); ?>">

                                <h3><?php the_title(); ?></h3>

                                <?php if( $settings['read_more'] != '' ): ?>
                                    <a href="<?php the_permalink(); ?>" class="read-more-btn"><?php echo esc_html( $settings['read_more'] ); ?> <i class='<?php echo esc_attr( $settings['read_more_icon'] ); ?>'></i></a>
                                <?php endif; ?>
                                <a href="<?php the_permalink(); ?>" class="link-btn"></a>
                            </div>
                        </div>
                        <?php endwhile; ?>
                        <?php wp_reset_postdata(); ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php
    }


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Blog_Post );