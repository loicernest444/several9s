<?php
/**
 * Stike Projects Area Widget
 */

namespace Elementor;
class Stike_Projects_Area extends Widget_Base {

	public function get_name() {
        return 'StikeProjectsArea';
    }

	public function get_title() {
        return __( 'Projects Area', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-featured-image';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'projects_section',
			[
				'label' => __( 'Projects', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'project_style',
                [
                    'label' => __( 'Project Style', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        1   => __( '1', 'stike-toolkit' ),
                        2   => __( '2', 'stike-toolkit' ),
                    ],
                    'default' => 1,
                ]
            );

            $this->add_control(
                'project_text_alignment',
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
                    'label' => __( 'Top Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Case Studies', 'stike-toolkit'),
                ]
            );
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Check Of Our Some Recent Works & Case Studies', 'stike-toolkit'),
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
                    'label' => __( 'Post Count', 'stike-toolkit' ),
                    'type' => Controls_Manager::NUMBER,
                    'default' => 4,
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
                        '{{WRAPPER}} .case-studies-area .section-title h2' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .case-studies-area .section-title h2',
                ]
            );

            $this->add_control(
                'post_title_color',
                [
                    'label' => __( 'Post Title Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-case-studies-item .content h3' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'post_title_typography',
                    'label' => __( 'Post Title Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .single-case-studies-item .content h3',
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

        // Text Alignment
		if( $settings['project_text_alignment' ] == '1') {
			$alignment = 'text-center';
		}
		elseif( $settings['project_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}

        if (!empty($settings['cat'])) {
            $projects = new \WP_Query(array(
                'post_type' => 'project',
                'posts_per_page' => $settings['count'],
                'order' => $settings['order'],
                'tax_query' => array(
                    array(
                        'taxonomy' => 'project_cat',
                        'field'    => 'slug',
                        'terms'    => explode( ',', str_replace( ' ', '', $settings['cat'])),
                    ),
                ),
            ));
        } else {
            $projects = new \WP_Query(array(
                'post_type' => 'project',
                'posts_per_page' => $settings['count'],
                'order' => $settings['order'],
            ));
        }

        ?>

        <?php if( $settings['project_style'] == '1' ): ?>
            <div class="case-studies-area pt-100 pb-70">
                <div class="container">
                    <?php if( $settings['title'] != '' || $settings['top_title'] != '' ): ?>
                        <div class="section-title <?php echo esc_attr( $alignment); ?>">
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <h2><?php echo esc_html( $settings['title'] ); ?></h2>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="container-fluid">
                    <div class="case-studies-slides owl-carousel owl-theme">
                    <?php
                        while ( $projects->have_posts() ) {
                            $projects->the_post();
                            $projects_image = get_field( 'project_card_image' );
                            $project_external_link = get_field( 'project_external_link' );

                            if( $project_external_link != '' ):
                                $post_link = $project_external_link;
                            else:
                                $post_link = get_the_permalink();
                            endif;
                            ?>
                            <div class="single-case-studies-item">
                                <a href="<?php echo esc_url( $post_link ); ?>" class="image d-block">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $projects_image ); ?>" alt="<?php the_post_thumbnail_caption(); ?>">
                                </a>
                                <div class="content">
                                    <h3><a href="<?php echo esc_url( $post_link ); ?>"><?php the_title() ?></a></h3>
                                    <a href="<?php echo esc_url( $post_link ); ?>" class="link-btn"><i class='bx bx-right-arrow-alt'></i></a>
                                </div>
                            </div>
                        <?php
                        }
                        wp_reset_postdata();
                    ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
    <?php
    }


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Projects_Area );