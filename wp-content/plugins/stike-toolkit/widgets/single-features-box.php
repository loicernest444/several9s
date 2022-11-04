<?php
/**
 * Feature  Widget
 */

namespace Elementor;
class Stike_Feature extends Widget_Base {

	public function get_name() {
        return 'Feature';
    }

	public function get_title() {
        return __( 'Feature', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-star-o';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Feature',
			[
				'label' => __( 'Stike Feature', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'style',
                [
                    'label' => __( 'Style', 'tryo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'         => __( 'Style One', 'tryo-toolkit' ),
                        '2'         => __( 'Style Two', 'tryo-toolkit' ),
                        '3'         => __( 'Style Three', 'tryo-toolkit' ),
                        '4'         => __( 'Style Four', 'tryo-toolkit' ),
                        '5'         => __( 'Style Five', 'tryo-toolkit' ),
                        '6'         => __( 'Style Six', 'tryo-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'font_type',
                [
                    'label'     => __( 'Font Type', 'stike-toolkit' ),
                    'type'      => Controls_Manager::SELECT,
                    'default'   => 'boxes-icon',
                    'options'   => [
                        'boxes-icon'     => __( 'Boxes-Icon', 'stike-toolkit' ),
                        'fa-icon'        => __( 'Font-Awesome', 'stike-toolkit' ),
                    ],
                ]
            );

            $this->add_control(
                'boxes-icon',
                [
                    'label' => __( 'Boxes Icons', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'bx bxs-droplet-half'       => __('Droplet Half', 'stike-toolkit' ),
                        'bx bxs-lock-open'          => __('Lock Open', 'stike-toolkit' ),
                        'bx bx-timer'               => __('Timer', 'stike-toolkit' ),
                        'bx bxs-check-shield'       => __('Check Shield', 'stike-toolkit' ),
                        'bx bx-cog'                 => __('Cog', 'stike-toolkit' ),
                        'bx bx-laptop'              => __('Laptop', 'stike-toolkit' ),
                        'bx bx-laptop'              => __('Laptop', 'stike-toolkit' ),
                        'bx bxs-badge-check'        => __('Badge Check', 'stike-toolkit' ),
                        'bx bxs-megaphone'          => __('Megaphone', 'stike-toolkit' ),
                        'bx bx-conversation'        => __('Conversation', 'stike-toolkit' ),
                        'bx bx-customize'        	=> __('Customize', 'stike-toolkit' ),
                        'bx bx-slider-alt'        	=> __('Slider', 'stike-toolkit' ),
                        'bx bx-reset'        	    => __('Reset', 'stike-toolkit' ),
                        'bx bx-bell'        	    => __('Bell', 'stike-toolkit' ),
                        'bx bx-shape-circle'        => __('Shape Circle', 'stike-toolkit' ),
                    ],
                    'condition' => [
                        'font_type' => 'boxes-icon',
                    ]
                ]
            );

            $this->add_control(
                'icon',
                [
                    'label' => __( 'Icons', 'stike-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'condition' => [
                        'font_type' => 'fa-icon',
                    ]
                ]
            );

            $this->add_control(
                'title',
                [
                    'label' => __( 'Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Simplify Communication', 'stike-toolkit'),
                ]
            );

            $this->add_control(
                'content',
                [
                    'label' => __( 'Content', 'stike-toolkit' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolore magna aliqua.', 'stike-toolkit'),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'section_style',
			[
				'label' => __( 'Style', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'icon_color',
                [
                    'label' => __( 'Icon Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features-box .icon, .single-features-card i, .features-box-six i' => 'color: {{VALUE}}',
                        '{{WRAPPER}} .features-box:hover .icon' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'style' => ['1','3','6']
                    ]
                ]
            );

            $this->add_control(
                'four_icon_bg_color',
                [
                    'label' => __( 'Icon Background Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .features-box-one i, .features-box-six i' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'style' => ['4', '5']
                    ]
                ]
            );

            $this->add_control(
                'style_2_icon_color',
                [
                    'label' => __( 'Icon Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .features-box .icon' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'style_2_icon_color_hover',
                [
                    'label' => __( 'Icon Hover Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .features-box:hover .icon' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'style_2_backgroud_icon_color',
                [
                    'label' => __( 'Background Icon Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .features-box .back-icon' => 'color: {{VALUE}}',
                    ],
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'style_2_icon_bg',
                [
                    'label' => __( 'Icon Background Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .features-box .icon' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'style_2_icon_bg_hover',
                [
                    'label' => __( 'Icon Hover Background Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .features-box:hover .icon' => 'background-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'style' => '2',
                    ]
                ]
            );

            $this->add_control(
                'icon_bg',
                [
                    'label' => __( 'Icon Background Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features-box .icon, .single-features-card i'            => 'background-color: {{VALUE}}',
                        '{{WRAPPER}} .single-features-box .icon::before'    => 'border-color: {{VALUE}}',
                    ],
                    'condition' => [
                        'style' => ['1','2'],
                    ]
                ]
            );

            $this->add_responsive_control(
                'icon_size',
                [
                    'label' => __( 'Icon Font Size', 'stike-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 1,
                            'max' => 60,
                            'step' => 1,
                        ],
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-features-card i, .features-box-one i' => 'font-size: {{SIZE}}px;',
                    ],
                    'condition' => [
                        'style' => ['1','2', '4', '5'],
                    ]
                ]
            );

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features-box h3, .features-box h3, .single-features-card h3, .features-box-one h3' => 'color: {{VALUE}}',
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
                            'max' => 50,
                            'step' => 1,
                        ],
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .single-features-box h3, .features-box h3, .single-features-card h3, .features-box-one h3' => 'font-size: {{SIZE}}px;',
                    ],
                ]
            );

            $this->add_control(
                'content_color',
                [
                    'label' => __( 'Content Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-features-box p, .features-box p, .single-features-card p, .features-box-one p' => 'color: {{VALUE}}',
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
                            'min' => 1,
                            'max' => 40,
                            'step' => 1,
                        ],
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}}  .single-features-box p, .features-box p, .single-features-card p, .features-box-one p' => 'font-size: {{SIZE}}px;',
                    ],
                ]
            );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        global $stike_opt;

        $is_animation      = !empty($stike_opt['enable_animation_css']) ? $stike_opt['enable_animation_css'] : '';

        if( $is_animation == true ):
            $wow_class = 'wow';
        else:
            $wow_class = '';
        endif;

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('content','none');

        // Icon
        if( $settings['font_type'] == 'boxes-icon' ) {
            $icon = $settings['boxes-icon'];
        }else {
            $icon = $settings['icon'];
        }

        ?>
        <?php if( $settings['style'] == '1' ): ?>
            <div class="single-features-box">
                <div class="icon">
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                </div>
                <h3 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h3>
                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
            </div>
        <?php elseif( $settings['style'] == '3' || $settings['style'] == '6' ): ?>
            <div class="single-features-card tx-center <?php echo esc_attr($wow_class); ?> fadeInUp <?php if( $settings['style'] == '6' ): echo 'blt-radius-0'; endif; ?>" data-wow-delay=".2s">
        <i class="<?php echo esc_attr( $icon ); ?> <?php if( $settings['style'] == '6' ): echo 'blt-radius-0'; endif; ?>"></i>
                <h3 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h3>
                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
            </div>
        <?php elseif( $settings['style'] == '4' || $settings['style'] == '5' ): ?>
            <div class="features-box-one <?php echo esc_attr($wow_class); ?> fadeInLeft <?php if( $settings['style'] == '5' ): ?>features-box-six text-center rounded<?php endif; ?>" data-wow-delay=".1s">
                <i class='<?php echo esc_attr( $icon ); ?> <?php if( $settings['style'] == '5' ): ?>rounded<?php endif; ?>'></i>
                <h3 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h3>
                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
            </div>
        <?php else: ?>
            <div class="features-box">
                <div class="icon">
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                </div>
                <h3 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h3>
                <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                <div class="back-icon">
                    <i class="<?php echo esc_attr( $icon ); ?>"></i>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Feature );