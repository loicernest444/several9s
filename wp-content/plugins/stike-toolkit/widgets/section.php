<?php
/**
 * Stike Section Widget
 */

namespace Elementor;
class Stike_Section extends Widget_Base {

	public function get_name() {
        return 'Stike_Section';
    }

	public function get_title() {
        return __( 'Section', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-section';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Section',
			[
				'label' => __( 'Section', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'style',
			[
				'label' => __( 'Select Style', 'stike-toolkit' ),
				'type' => Controls_Manager::SELECT,
				'options' => [
					'1'   => __( 'Style 1', 'stike-toolkit' ),
					'2'   => __( 'Style 2', 'stike-toolkit' ),
				],
				'default' => '1',
			]
		);

		$this->add_control(
            'top_title',
            [
                'label' => __( 'Top Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Our Team', 'stike-toolkit'),
				'condition' => [
					'style' => '2',
				]
            ]
		);

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXTAREA,
                'default' => esc_html__('Take your business to the next level', 'stike-toolkit'),
            ]
		);

		$this->add_control(
            'content',
            [
                'label' => __( 'Content', 'stike-toolkit' ),
                'type' => Controls_Manager::WYSIWYG,
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
						'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .section-title h2' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .section-title p' => 'color: {{VALUE}}',
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
							'max' => 70,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .section-title p' => 'font-size: {{SIZE}}px;',
					],
				]
			);

        $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();
		?>
		<?php if( $settings['style'] == '1' ): ?>
			<div class="section-title">
				<h2><?php echo $settings['title']; ?></h2>
				<?php if( $settings['content'] != '' ): ?>
					<p><?php echo wp_kses_post( $settings['content'] ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if( $settings['style'] == '2' ): ?>
			<div class="section-title text-left">
				<span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
				<h2><?php echo $settings['title']; ?></h2>
				<?php if( $settings['content'] != '' ): ?>
					<p><?php echo wp_kses_post( $settings['content'] ); ?></p>
				<?php endif; ?>
			</div>
		<?php endif; ?>

        <?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Stike_Section );