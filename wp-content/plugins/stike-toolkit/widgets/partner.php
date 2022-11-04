<?php
/**
 * Partner Logo Slider Widget
 */

namespace Elementor;
class Stike_Partner_Logo extends Widget_Base {

	public function get_name() {
        return 'Partner_Logo';
    }

	public function get_title() {
        return __( 'Partner Logo', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-logo';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'partner_section',
			[
				'label' => __( 'Partner Logo Control', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'style',
                [
                    'label' => __( 'Style', 'tryo-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'         => __( 'With Slider', 'tryo-toolkit' ),
                        '2'         => __( 'Without Slider', 'tryo-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );

            $this->add_control(
                'title',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => esc_html__( 'Title', 'stike-toolkit' ),
                ]
            );

            $repeater_items = new Repeater();

            $repeater_items->add_control(
                'logo_link',
                [
                    'type'    => Controls_Manager::URL,
                    'label'   => esc_html__( 'Logo Link', 'stike-toolkit' ),
                ]
            );
            $repeater_items->add_control(
                'logo',
                [
                    'type'    => Controls_Manager::MEDIA,
                    'label'   => esc_html__( 'Logo', 'stike-toolkit' ),
                ]
            );
            $this->add_control(
                'logos',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'label'   => esc_html__( 'Add Partner Logo', 'stike-toolkit' ),
                    'fields' => $repeater_items->get_controls(),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'partner_style',
			[
				'label' => __( 'Style', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'background_color',
                [
                    'label' => __( 'Background Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .partner-area .bg-f8fbfa, .our-loving-clients.bg-f4f5fe' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .partner-title h3' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .partner-title h3' => 'font-size: {{SIZE}}px;',
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
        ?>

        <?php if( $settings['style'] == '1' ): ?>
            <div class="partner-area ptb-100 bg-f8fbfa">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-2 col-md-12">
                            <div class="partner-title">
                                <h3><?php echo esc_html( $settings['title'] ); ?></h3>
                            </div>
                        </div>

                        <div class="col-lg-10 col-md-12">
                            <div class="partner-slides owl-carousel owl-theme">
                                <?php foreach( $settings['logos'] as $item ): ?>
                                    <div class="single-partner-item">
                                        <a href="<?php echo esc_url( $item['logo_link']['url'] ); ?>">
                                            <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                        </a>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php else: ?>
            <div class="our-loving-clients ptb-100 bg-f4f5fe">
                <div class="container">
                    <div class="section-title">
                        <h2><?php echo esc_html( $settings['title'] ); ?></h2>
                    </div>

                    <div class="clients-logo-list align-items-center">
                        <?php foreach( $settings['logos'] as $item ): ?>
                            <div class="single-clients-logo">
                                <?php if( $item['logo']['url'] != '' ): ?>
                                    <a href="<?php echo esc_url( $item['logo_link']['url'] ); ?>">
                                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['logo']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    </a>
                                <?php endif; ?>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>
        <?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Partner_Logo );