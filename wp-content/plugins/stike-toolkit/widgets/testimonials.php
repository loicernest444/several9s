<?php
/**
 * Testimonials Widget
 */

namespace Elementor;
class Stike_Testimonials extends Widget_Base {

	public function get_name() {
        return 'StikeTestimonials';
    }

	public function get_title() {
        return __( 'Testimonials', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-post-slider';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'testimonials_section',
			[
				'label' => __( 'Testimonials Post', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'top_title',
                [
                    'label' => __( 'Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Testimonials', 'stike-toolkit'),
                ]
            );
            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Our Customer Valuable Feedback', 'stike-toolkit'),
                ]
            );

            $repeater_items = new Repeater();

            $repeater_items->add_control(
                'image',
                [
                    'label' => __( 'Image', 'stike-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $repeater_items->add_control(
                'testimonial_text_alignment',
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
            $repeater_items->add_control(
                'name',
                [
                    'label' => esc_html__('Name', 'stike-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Olivar Lucy', 'stike-toolkit'),
                    'label_block' => true,
                ]
            );
            $repeater_items->add_control(
                'designation',
                [
                    'label' => esc_html__('Designation', 'stike-toolkit'),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Web Developer', 'stike-toolkit'),
                    'label_block' => true,
                ]
            );
            $repeater_items->add_control(
                'feedback',
                [
                    'label' => esc_html__('Feedback Content', 'stike-toolkit'),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna ali. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'stike-toolkit'),
                    'label_block' => true,
                ]
            );
            $this->add_control(
                'feedback_items',
                [
                    'label' => esc_html__('Slider Item', 'stike-toolkit'),
                    'type' => Controls_Manager::REPEATER,
                    'default' => [
                        [ 'name' => esc_html__(' Item #1', 'stike-toolkit') ],

                    ],
                    'fields' => $repeater_items->get_controls(),
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
                'name_color',
                [
                    'label' => __( 'Name Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonials-box .client-info .title h3' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'name_typography',
                    'label' => __( 'Name Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .single-testimonials-box .client-info .title h3',
                ]
            );

            $this->add_control(
                'designation_color',
                [
                    'label' => __( 'Designation Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonials-box .client-info .title span' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'designation_typography',
                    'label' => __( 'Designation Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .single-testimonials-box .client-info .title span',
                ]
            );

            $this->add_control(
                'feedback_color',
                [
                    'label' => __( 'Feedback Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-testimonials-box p' => 'color: {{VALUE}}',
                    ],
                ]

            );

            $this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'feedback_typography',
                    'label' => __( 'Feedback Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .single-testimonials-box p',
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

        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('description','none');

        ?>

        <div class="feedback-area ptb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12">
                        <?php if( $settings['title'] != '' || $settings['top_title'] != '' ): ?>
                            <div class="section-title text-left">
                                <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                                <h2><?php echo esc_html( $settings['title'] ); ?></h2>
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="testimonials-slides-two owl-carousel owl-theme">
                            <?php foreach( $settings['feedback_items'] as $item ):
                                // Text Alignment
                                if( $item['testimonial_text_alignment' ] == '1') {
                                    $alignment = 'text-center';
                                }
                                elseif( $item['testimonial_text_alignment' ] == '2') {
                                    $alignment = 'text-right';
                                } else {
                                    $alignment = 'text-left';
                                }
                            ?>
                                <div class="single-testimonials-box <?php echo esc_attr( $alignment); ?>">
                                    <p><?php echo wp_kses_post( $item['feedback'] ); ?></p>

                                    <div class="client-info">
                                        <div class="d-flex align-items-center">
                                            <?php if( $item['image']['url'] != '' ): ?>
                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['image']['url'] ); ?>" alt="<?php echo esc_attr( $item['name'] ); ?>">
                                            <?php endif; ?>

                                            <div class="title">
                                                <h3><?php echo esc_html( $item['name'] ); ?></h3>
                                                <span><?php echo esc_html( $item['designation'] ); ?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Testimonials );