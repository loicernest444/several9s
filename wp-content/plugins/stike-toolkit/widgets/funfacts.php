<?php
/**
 * Funfacts Widget
 */

namespace Elementor;
class Stike_Funfacts extends Widget_Base {

	public function get_name() {
        return 'Stike_Funfacts';
    }

	public function get_title() {
        return __( 'Funfacts', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-counter';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'funfacts_section',
			[
				'label' => __( 'Funfacts Control', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $repeater_items = new Repeater();

            $repeater_items->add_control(
                'card_style',
                [
                    'label' => __( 'Style', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        '1'   => __( 'Style One', 'stike-toolkit' ),
                        '2'   => __( 'Style Two', 'stike-toolkit' ),
                    ],
                    'default' => '1',
                ]
            );
            $repeater_items->add_control(
                'number',
                [
                    'type'    => Controls_Manager::NUMBER,
                    'label'   => esc_html__( 'Ending Number', 'stike-toolkit' ),
                ]
            );
            $repeater_items->add_control(
                'icon',
                [
                    'type'    => Controls_Manager::ICON,
                    'label'   => esc_html__( 'Icon', 'stike-toolkit' ),
                    'condition' => [
                        'card_style' => '2',
                    ],
                ]
            );
            $repeater_items->add_control(
                'suffix',
                [
                    'type'    => Controls_Manager::TEXT,
                    'label'   => esc_html__( 'Number Suffix', 'stike-toolkit' ),
                ]
            );
            $repeater_items->add_control(
                'title',
                [
                    'type'    => Controls_Manager::WYSIWYG,
                    'label'   => esc_html__( 'Title', 'stike-toolkit' ),
                ]
            );
            $this->add_control(
                'items',
                [
                    'type'    => Controls_Manager::REPEATER,
                    'label'   => esc_html__( 'Add Counter Item', 'stike-toolkit' ),
                    'fields' => $repeater_items->get_controls(),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'counter_style',
			[
				'label' => __( 'Style', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_responsive_control(
                'margin_top',
                [
                    'label' => __( 'Margin Top', 'stike-toolkit' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 200,
                            'step' => 1,
                        ],
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .funfacts-inner' => 'margin-top: {{SIZE}}px;',
                    ],
                ]
            );

            $this->add_control(
                'counter_color',
                [
                    'label' => __( 'Number Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .single-funfacts h3' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_responsive_control(
				'number_size',
				[
					'label' => __( 'Number Font Size', 'stike-toolkit' ),
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
						'{{WRAPPER}} .single-funfacts h3 .sign-icon, .single-funfacts h3' => 'font-size: {{SIZE}}px;',
					],
				]
			);

            $this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-funfacts p' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .single-funfacts p' => 'font-size: {{SIZE}}px;',
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
            $wow_class = 'wow fadeInLeft';
        else:
            $wow_class = '';
        endif;

        ?>
        <div class="funfacts-inner">
            <div class="row">
                <?php foreach( $settings['items'] as $item ): ?>
                    <?php if( $item['card_style'] == '2' ): ?>
                        <div class="col-lg-3 col-6 col-sm-6">
                            <div class="single-funfacts funfact-style-two <?php echo esc_attr($wow_class); ?>" data-wow-delay=".2s">
                                <i class='<?php echo esc_html( $item['icon'] ); ?>'></i>
                                <h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span><span class="sign-icon"><?php echo esc_html( $item['suffix'] ); ?></span></h3>
                                <p><?php echo wp_kses_post( $item['title'] ); ?></p>
                            </div>
                        </div>
                    <?php else: ?>
                        <div class="col-lg-3 col-6 col-sm-3 col-md-3">
                            <div class="single-funfacts">
                                <h3><span class="odometer" data-count="<?php echo esc_attr( $item['number'] ); ?>">00</span><span class="sign-icon"><?php echo esc_html( $item['suffix'] ); ?></span></h3>
                                <p><?php echo wp_kses_post( $item['title'] ); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Funfacts );