<?php
/**
 * Stike Contact Area Widget
 */

namespace Elementor;
class Stike_Contact extends Widget_Base {

	public function get_name() {
        return 'Stike_Contact';
    }

	public function get_title() {
        return __( 'Contact Area', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'fa fa-phone';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Contact',
			[
				'label' => __( 'Contact Area', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'shortcode',
                [
                    'label' => __( 'Contact From Shortcode', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

            $this->add_control(
                'desc',
                [
                    'label' => esc_html__('Description', 'stike-toolkit'),
                    'type' => Controls_Manager::WYSIWYG,
                ]
            );

            $this->add_control(
                'info_title',
                [
                    'label' => __( 'Info Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('Contact us by Phone Number or Email Address', 'stike-toolkit'),
                ]
            );

            $this->add_control(
                'number',
                [
                    'label' => __( 'Number', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('+088 130 629 8615', 'stike-toolkit'),
                ]
            );
            $this->add_control(
                'number_link',
                [
                    'label' => __( 'Number Link', 'stike-toolkit' ),
                    'type' => Controls_Manager::URL,
                ]
            );

            $this->add_control(
                'email',
                [
                    'label' => __( 'Email', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => esc_html__('hello@stike.com', 'stike-toolkit'),
                ]
            );
            $this->add_control(
                'email_link',
                [
                    'label' => __( 'Email Link', 'stike-toolkit' ),
                    'type' => Controls_Manager::URL,
                ]
            );

            $repeater_items = new Repeater();

            $repeater_items->add_control(
                'icon',
                [
                    'label' => __( 'Social Icon', 'stike-toolkit' ),
                    'type' => Controls_Manager::ICON,
                    'default' => 'fa fa-facebook',
                ]
            );
            $repeater_items->add_control(
                'link',
                [
                    'label' => __( 'Link', 'stike-toolkit' ),
                    'type' => Controls_Manager::URL,
                    'show_external' => true,
                    'default' => [
                        'url' => '#',
                    ],
                ]
            );
			$this->add_control(
                'social_link',
                [
					'label' => esc_html__('Add Social Link', 'stike-toolkit'),
					'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater_items->get_controls(),
                    'separator' => 'before',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'contact_style',
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
					'{{WRAPPER}} .contact-form h3' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .contact-form h3' => 'font-size: {{SIZE}}px;',
				],
			]
        );

        $this->add_control(
			'info_title_color',
			[
				'label' => __( 'Info Title Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info .contact-info-content h3' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'info_title_size',
			[
				'label' => __( 'Info Title Font Size', 'stike-toolkit' ),
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
					'{{WRAPPER}} .contact-info .contact-info-content h3' => 'font-size: {{SIZE}}px;',
				],
			]
        );

        $this->add_control(
			'main_color',
			[
				'label' => __( 'Main Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info .contact-info-content h2 a:not(:first-child), .contact-info .contact-info-content h2 a:hover' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'secondary_color',
			[
				'label' => __( 'Secondary Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .contact-info .contact-info-content h2 a, .contact-info .contact-info-content h2 a:not(:first-child):hover' => 'color: {{VALUE}}',
					'{{WRAPPER}} .contact-info .contact-info-content .social li a:hover' => 'border-color: {{VALUE}}',
					'{{WRAPPER}} .contact-info .contact-info-content .social li a:hover' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        // Inline editing
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('info_title','none');
        ?>
        <div class="contact-area ptb-100">
            <div class="container">
                <div class="contact-inner">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
							<div class="cinfo-br">
								<div class="contact-features-list">
                                    <?php echo wp_kses_post( $settings['desc'] ); ?>
								</div>

								<div class="contact-info">
								<div class="contact-info-content">
									<h3 <?php echo $this-> get_render_attribute_string('info_title'); ?>>
										<?php echo esc_html( $settings['info_title'] ); ?>
									</h3>

									<ul class="c-info">
										<li>
											<i class='bx bx-phone-call'></i>
											<a href="<?php echo esc_url( $settings['number_link']['url'] ); ?>">
												<?php echo esc_html( $settings['number'] ); ?>
											</a>
										</li>
										<li>
											<i class='bx bx-mail-send' ></i>
											<a href="<?php echo esc_url( $settings['email_link']['url'] ); ?>">
												<?php echo esc_html( $settings['email'] ); ?>
											</a>
										</li>
									</ul>

									<ul class="social">
										<?php foreach( $settings['social_link'] as $item ): ?>
											<li>
												<a href="<?php echo esc_url( $item['link']['url'] ); ?>" target="_blank">
													<i class="<?php echo esc_attr( $item['icon'] ); ?>"></i>
												</a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
							</div>
						</div>

                        <div class="col-lg-6 col-md-12">
                            <?php echo do_shortcode( $settings['shortcode'] ); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Stike_Contact );