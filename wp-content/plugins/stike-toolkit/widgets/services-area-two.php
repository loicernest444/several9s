<?php
/**
 * Services Area Two Widget
 */

namespace Elementor;
class Stike_Services_Area_Two extends Widget_Base {

	public function get_name() {
        return 'Stike_Services_Area_Two';
    }

	public function get_title() {
        return __( 'Services Area', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-tools';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Services_Area_Two_Area',
			[
				'label' => __( 'Services Controls', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $list_items = new Repeater();

            $list_items->add_control(
                'title',
                [
                    'label' => __( 'Title', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Free Calling Service', 'stike-core'),
                ]
            );

            $list_items->add_control(
                'content',
                [
                    'label' => __( 'Content', 'stike-core' ),
                    'type' => Controls_Manager::WYSIWYG,
                    'default' => __('Plan ahead by day, week, or month, and see project status at a glance. Search and filter to focus in on anything form a single project to an individual person\'s workload.', 'stike-core'),
                ]
            );

            $list_items->add_control(
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

            $list_items->add_control(
                'boxes-icon',
                [
                    'label' => __( 'Boxes Icons', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'bx bx-code-alt'            => __('Code', 'stike-toolkit' ),
                        'bx bx-gift'                => __('Gift', 'stike-toolkit' ),
                        'bx bx-phone-call'          => __('Phone Call', 'stike-toolkit' ),
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

            $list_items->add_control(
                'icon',
                [
                    'label' => __( 'Icons', 'stike-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'condition' => [
                        'font_type' => 'fa-icon',
                    ]
                ]
            );

            $list_items->add_control(
                'icon_color',
                [
                    'label' => __( 'Icon Background Color', 'plugin-domain' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} {{CURRENT_ITEM}}' => 'background-color: {{VALUE}}'
                    ],
                ]
            );
            $this->add_control(
                'list_items',
                [
                    'label' => __( 'List Items', 'stike-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $list_items->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );

            $this->add_control(
                'image',
                [
                    'label' => __( 'Section Image', 'stike-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );


			$this->add_control(
				'show_shape',
				[
					'label' => __( 'Shape Images', 'stike-toolkit' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'stike-toolkit' ),
					'label_off' => __( 'Hide', 'stike-toolkit' ),
					'return_value' => 'yes',
					'default' => 'yes',
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
				'title_color',
				[
					'label' => __( 'Title Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .features-inner-content .features-item h3' => 'color: {{VALUE}}',
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
							'min' => 5,
							'max' => 70,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .features-inner-content .features-item h3' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .features-inner-content .features-item p' => 'color: {{VALUE}}',
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
							'min' => 5,
							'max' => 40,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .features-inner-content .features-item p' => 'font-size: {{SIZE}}px;',
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
            $wow_class = 'wow';
        else:
            $wow_class = '';
        endif;

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
		$this-> add_inline_editing_attributes('content','none');

        ?>
        <div class="services-area ptb-100">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="services-image <?php echo esc_attr($wow_class); ?> fadeInLeft" data-wow-delay=".3s">
                        <?php if( $settings['image']['url'] != '' ): ?>
                            <div class="image">
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__('Services Image', 'stike-toolkit'); ?>">
                            </div>
                        <?php endif; ?>
                    </div>

                    <div class="services-content it-service-content">
                        <div class="content">
                            <div class="features-inner-content">
                                <?php foreach( $settings['list_items'] as $item ): ?>
                                    <div class="features-item <?php echo esc_attr($wow_class); ?> fadeInRight" data-wow-delay=".1s">
                                        <?php
                                            // Icon
                                            if( $item['font_type'] == 'boxes-icon' ) {
                                                $icon = $item['boxes-icon'];
                                            }else {
                                                $icon = $item['icon'];
                                            }
                                        ?>
                                        <i class='<?php echo esc_attr( $icon ); ?> blt-radius-0 elementor-repeater-item-<?php echo esc_attr($item['_id']); ?>'></i>
                                        <h3><?php echo esc_html( $item['title'] ); ?></h3>
                                        <p><?php echo wp_kses_post( $item['content'] ); ?></p>
                                    </div>
                                <?php endforeach; ?>
							</div>
                        </div>
                    </div>
                </div>
            </div>


            <?php if( $settings['show_shape'] == 'yes' ): ?>
                <div class="shape9">
                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri() ?>/assets/img/shape/9.png" alt="<?php echo esc_attr__( 'Shape Image', 'stike-toolkit' ); ?>">
                </div>
            <?php endif; ?>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Services_Area_Two );