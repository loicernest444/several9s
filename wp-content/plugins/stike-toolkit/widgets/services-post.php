<?php
/**
 * Services Post Widget
 */

namespace Elementor;
class Stike_Services_Post extends Widget_Base {

	public function get_name() {
        return 'StikeServicesPost';
    }

	public function get_title() {
        return __( 'Services Post', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-posts-grid';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'services_section',
			[
				'label' => __( 'Services Post', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
                    'default' => 2,
                ]
            );

            $this->add_control(
                'service_text_alignment',
                [
                    'label' => __( 'Choose Title Alignment', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'     => __( 'Text Align Center', 'stike-toolkit' ),
                        '2'     => __( 'Text Align Right', 'stike-toolkit' ),
                        '3'     => __( 'Text Align Left', 'stike-toolkit' ),
                    ],
                    'default' => '3'
                ]
            );

            $this->add_control(
                'top_title',
                [
                    'label' => __( 'Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Services', 'stike-toolkit'),
                ]
            );
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Lets Check Our Services', 'stike-toolkit'),
                ]
            );

            $this->add_control(
				'button_icon',
				[
					'label' 		=> esc_html__( 'Button Icon', 'stike-toolkit' ),
                    'type' 			=> Controls_Manager::ICON,
                    'label_block' 	=> true,
                    'options' 		=> stike_icons(),
					'default' 		=> 'bx bx-bullseye',
				]
            );

            $this->add_control(
                'service_all',
                [
                    'label' => __( 'Services Button', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('View All', 'stike-toolkit'),
                ]
            );
            $this->add_control(
                'service_page_link',
                [
                    'label' => __( 'Button Page Link', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'label_block' => true,
                    'options' => stike_toolkit_get_page_as_list(),
                ]
            );

            $this->add_control(
                'cat', [
                    'label' => esc_html__( 'Category', 'stike-toolkit' ),
                    'description' => esc_html__( 'Enter the category slugs separated by commas (Eg. cat1, cat2)', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'label_block' => true,
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
                ]
            );

            $this->add_control(
                'read_more_icon',
                [
                    'label' => __( 'Read More Icon', 'stike-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'options' 		=> stike_icons(),
					'default' 		=> 'bx bx-right-arrow-alt',
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
                'top_title_color',
                [
                    'label' => __( 'Top Title Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title.text-left .sub-title' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'top_title_typography',
                    'label' => __( 'Top Title Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .section-title.text-left .sub-title',
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .section-title h2',
                ]
            );

            $this->add_control(
                'post_title_color',
                [
                    'label' => __( 'Post Title Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-services-box .content h3 a' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'post_title_typography',
                    'label' => __( 'Post Title Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .single-services-box .content h3 ',
                ]
            );

            $this->add_control(
                'post_content_color',
                [
                    'label' => __( 'Post Content Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-services-box .content p' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'post_content_typography',
                    'label' => __( 'Post Content Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .single-services-box .content p',
                ]
            );

            $this->add_control(
                'read_more_color',
                [
                    'label' => __( 'Read More Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-services-box .content .read-more-btn' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'read_more_typography',
                    'label' => __( 'Read More Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .single-services-box .content .read-more-btn',
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
            $wow_class = 'wow';
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

        if (!empty($settings['cat'])) {
            $services = new \WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => $settings['count'],
                'order' => $settings['order'],
                'tax_query' => array(
                    array(
                        'taxonomy' => 'service_cat',
                        'field'    => 'slug',
                        'terms'    => explode( ',', str_replace( ' ', '', $settings['cat'])),
                    ),
                ),
            ));
        } else {
            $services = new \WP_Query(array(
                'post_type' => 'service',
                'posts_per_page' => $settings['count'],
                'order' => $settings['order'],
            ));
        }

        // Text Alignment
		if( $settings['service_text_alignment' ] == '1') {
			$alignment = 'text-center';
		}
		elseif( $settings['service_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}


        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('description','none');

        ?>
        <div class="services-area ptb-100">
            <div class="container">
                <?php if( $settings['title'] != '' || $settings['top_title'] != '' ): ?>
                    <div class="section-title text-left">
                        <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                        <h2><?php echo esc_html( $settings['title'] ); ?></h2>
                    </div>
                <?php endif; ?>

                <div class="row">
                <?php
                    while ( $services->have_posts() ) {
                        $services->the_post();
                        $services_image = get_field( 'services_card_image' );
                        $services_external_link = get_field( 'services_external_link' );

                        if( $services_external_link != '' ):
                            $post_link = $services_external_link;
                        else:
                            $post_link = get_the_permalink();
                        endif;
                        ?>
                        <div class="<?php echo esc_attr( $column ); ?> <?php echo esc_attr($wow_class); ?> fadeInUp" data-wow-delay=".2s">
                            <div class="single-services-box <?php echo esc_attr( $alignment); ?>">
                                <div class="row m-0">
                                    <div class="col-lg-6 col-md-12 p-0">
                                        <div class="content">
                                            <h3><a href="<?php echo esc_url( $post_link ); ?>"><?php the_title() ?></a></h3>
                                            <p><?php the_excerpt(); ?></p>
                                            <?php if( $settings['read_more'] != '' ): ?>
                                                <a href="<?php echo esc_url( $post_link ); ?>" class="read-more-btn"><?php echo esc_html( $settings['read_more'] ); ?> <i class='<?php echo esc_attr( $settings['read_more_icon'] ); ?>'></i></a>
                                            <?php endif; ?>
                                        </div>
                                    </div>

                                    <div class="col-lg-6 col-md-12 p-0">
                                        <div class="image" style="background-image:url(<?php echo esc_url( $services_image ); ?>);">
                                            <img src="<?php echo esc_url( $services_image ); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    wp_reset_postdata();
                    ?>

                    <?php if( $settings['service_all'] != '' ): ?>
                        <div class="col-lg-12 col-md-12 <?php echo esc_attr($wow_class); ?> fadeInUp" data-wow-delay=".6s">


                            <div class="services-btn-box">
                                <a href="<?php echo esc_url( get_page_link( $settings['service_page_link'] ) ); ?>" class="default-btn">
                                    <i class='<?php echo esc_attr( $settings['button_icon'] ); ?>'></i><?php echo esc_html( $settings['service_all'] ); ?><span></span>
                                </a>
                            </div>



                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>

    <?php
    }


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Services_Post );