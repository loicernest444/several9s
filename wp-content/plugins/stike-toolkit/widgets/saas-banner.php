<?php
/**
 * Saas Banner Widget
 */

namespace Elementor;
class Stike_Saas_Banner extends Widget_Base {

	public function get_name() {
        return 'Stike_Saas_Banner';
    }

	public function get_title() {
        return __( 'Saas Banner', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-banner';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Saas_Banner_Area',
			[
				'label' => __( 'Stike Banner Controls', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'image',
			[
				'label' => __( 'Choose Banner Image', 'stike-toolkit' ),
				'type' => Controls_Manager::MEDIA,
			]
        );


        $this->add_control(
            'image_shape',
            [
                'label' => __( 'Remove Background Shape Images?', 'stike-toolkit' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'stike-toolkit' ),
                'label_off' => __( 'No', 'stike-toolkit' ),
                'return_value' => 'yes',
                'default' => 'no',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Manage your business strategy in one placeholder', 'stike-toolkit'),
            ]
        );

        $this->add_control(
            'content',
            [
                'label' => __( 'Content', 'stike-toolkit' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __('Our passion to work hard and deliver excellent results. It could solve the needs of your customers and develop innovation. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod.', 'stike-toolkit'),
            ]
        );
        $this->add_control(
            'button_icon',
            [
                'label' => __( 'Button Icon', 'stike-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'=>__('Button Text', 'stike-toolkit'),
                'type'=>Controls_Manager:: TEXT,
                'default' => __('Get Started', 'stike-toolkit'),
            ]
        );

        $this->add_control(
            'link_type',
            [
                'label' => __( 'Link Type', 'stike-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => [
                    '1'  => __( 'Link To Page', 'stike-toolkit' ),
                    '2' => __( 'External Link', 'stike-toolkit' ),
                ],
            ]
        );

        $this->add_control(
            'link_to_page',
            [
                'label' => __( 'Link Page', 'stike-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'label_block' => true,
                'options' => stike_toolkit_get_page_as_list(),
                'condition' => [
                    'link_type' => '1',
                ]
            ]
        );

        $this->add_control(
            'external_link',
            [
                'label'=>__('External Link', 'stike-toolkit'),
                'type'=>Controls_Manager:: TEXT,
                'condition' => [
                    'link_type' => '2',
                ]
            ]
        );
        //Target Page
        $this->add_control(
            'target_page',
            [
                'label' => __( 'Link Open In New Tab?', 'stike-toolkit' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Yes', 'stike-toolkit' ),
                'label_off' => __( 'No', 'stike-toolkit' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

        $this->add_control(
            'video_button_text',
            [
                'label' => __( 'Video Button Text', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Watch Video', 'stike-toolkit'),
            ]
        );

        $this->add_control(
            'video_button_icon',
            [
                'label' => __( 'Video Button Icon', 'stike-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );

        $this->add_control(
            'video_button_link',
            [
                'label' => __( 'Video Link', 'stike-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'banner_style',
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
					'{{WRAPPER}} .saas-banner .hero-content h1' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .saas-banner .hero-content h1' => 'font-size: {{SIZE}}px;',
				],
			]
		);

        $this->add_control(
			'content_color',
			[
				'label' => __( 'Content Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .saas-banner .hero-content p' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'content_size',
			[
				'label' => __( 'Content Font Size', 'stike-toolkit' ),
				'type' => Controls_Manager::SLIDER,
				'size_units' => [ 'px' ],
				'range' => [
					'px' => [
						'min' => 10,
						'max' => 50,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'selectors' => [
					'{{WRAPPER}} .saas-banner .hero-content p' => 'font-size: {{SIZE}}px;',
				],
			]
        );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $btn1_text  = $settings['button_text'];

        //  Button Link
        $link_source = '';
        if( $settings['link_type'] == 1 ){
            $link_source = get_page_link($settings['link_to_page']);
        } else {
            $link_source = $settings['external_link'];
        }

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

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('content','none');

        // Button icon
        $button_icon = '';
        if( $settings['button_icon'] != '' ):
            $button_icon = $settings['button_icon'];
        else:
            $button_icon   = 'bx bxs-hot';
        endif;

        // Video button icon
        $video_button_icon = '';
        if( $settings['video_button_icon'] != '' ):
            $video_button_icon = $settings['video_button_icon'];
        else:
            $video_button_icon   = 'bx bxs-right-arrow';
        endif;

        $is_animation      = !empty($stike_opt['enable_animation_css']) ? $stike_opt['enable_animation_css'] : '';

        if( $is_animation == true ):
            $wow_class = 'wow';
        else:
            $wow_class = '';
        endif;

        ?>
        <div class="saas-banner">
            <div class="d-table">
                <div class="d-table-cell">
                    <div class="container max-width-1290">
                        <div class="row align-items-center pt-5">
                            <div class="col-lg-6 col-md-12">
                                <div class="saas-image mt-70">
                                    <?php if( $settings['image']['url'] != '' ): ?>
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> fadeInDown bannerrightimg" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr($settings['title']); ?>">
                                    <?php else: ?>
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> fadeInDown" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/arrow.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> fadeInUp" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/box1.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> fadeInLeft" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/boy1.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> zoomIn" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/boy2.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> bounceIn" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/boy3.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> fadeInDown" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/digital-screen.png" data-wow-delay="0.6s" alt="digital-screen">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> zoomIn" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/filter1.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> fadeInUp" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/filter2.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> rotateIn" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/filter3.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> fadeInUp" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/girl1.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> zoomIn" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/girl2.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> zoomIn" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/monitor.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">

                                        <!-- Main image -->
                                        <img class="<?php echo esc_attr($lazy_class); ?> <?php echo esc_attr($wow_class); ?> zoomIn" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/main-image.png" data-wow-delay="0.6s" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    <?php endif; ?>
                                </div>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="hero-content pl-4">
                                    <h1 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h1>
                                    <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                                    <div class="banner-btn">
                                        <div class="d-flex">
                                            <?php if($btn1_text != '') { ?>
                                                <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                                    <a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn">
                                                        <i class="<?php echo esc_attr( $button_icon ); ?>"></i>
                                                        <?php echo esc_html($btn1_text); ?>
                                                        <span></span>
                                                    </a> <?php
                                                } else { ?>
                                                    <a href="<?php echo esc_url($link_source); ?>" class="default-btn">
                                                        <i class="<?php echo esc_attr( $button_icon ); ?>"></i>
                                                        <?php echo esc_html($btn1_text); ?>
                                                        <span></span>
                                                    </a><?php
                                                } ?>
                                            <?php
                                            } ?>
                                            <?php if( $settings['video_button_text'] != '' ): ?>
                                                <a href="<?php echo esc_url( $settings['video_button_link']['url'] ); ?>" class="video-btn popup-youtube">
                                                    <i class='<?php echo esc_attr( $video_button_icon ); ?>'></i> <?php echo esc_html( $settings['video_button_text'] ); ?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <?php if( $settings['image_shape'] != 'yes' ): ?>
                <div class="shape-rotate rotateme">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri(); ?>/assets/img/saas-shape/shape-rotate.png" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                </div>
                <div id="particles-js"></div>
            <?php endif; ?>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Saas_Banner );