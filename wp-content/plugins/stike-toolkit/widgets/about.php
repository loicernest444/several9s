<?php
/**
 * Stike About Area Widget
 */

namespace Elementor;
class Stike_About extends Widget_Base {

	public function get_name() {
        return 'Stike_About';
    }

	public function get_title() {
        return __( 'About Area', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-user-circle-o';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_About',
			[
				'label' => __( 'About Area', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

		$this->add_control(
			'about_text_alignment',
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
			'image',
			[
				'label' => __( 'Choose Image', 'stike-toolkit' ),
				'type' => Controls_Manager::MEDIA,
			]
        );

        $this->add_control(
            'top_title',
            [
                'label' => __( 'Top Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('How we are Founded', 'stike-toolkit'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Take your business to the next level', 'stike-toolkit'),
            ]
        );

        $this->add_control(
            'desc',
            [
                'label' => esc_html__('Description', 'stike-toolkit'),
                'type' => Controls_Manager::WYSIWYG,
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'about_style',
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
					'{{WRAPPER}} .about-content .sub-title' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'top_title_size',
			[
				'label' => __( 'Top Title Font Size', 'stike-toolkit' ),
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
					'{{WRAPPER}} .about-content .sub-title' => 'font-size: {{SIZE}}px;',
				],
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-content h2' => 'color: {{VALUE}}',
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
					'{{WRAPPER}} .about-content h2' => 'font-size: {{SIZE}}px;',
				],
			]
        );

        $this->add_control(
			'desc_color',
			[
				'label' => __( 'Description Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-content p' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'desc_size',
			[
				'label' => __( 'Description Font Size', 'stike-toolkit' ),
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
					'{{WRAPPER}}  .about-content p' => 'font-size: {{SIZE}}px;',
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

		// Text Alignment
		if( $settings['about_text_alignment' ] == '1') {
			$alignment = 'text-center';
		}
		elseif( $settings['about_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}

        // Inline Editing
        $this-> add_inline_editing_attributes('top_title','none');
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('desc','none');
        ?>
        <div class="about-area ptb-100">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12">
                        <div class="about-content <?php echo esc_attr( $alignment); ?>">
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>

                            <h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>
                            <?php echo wp_kses_post( $settings['desc'] ); ?>
                        </div>
                    </div>

                    <div class="col-lg-6 col-md-12">
                        <div class="about-image">
                            <?php if( $settings['image']['url'] != '' ): ?>
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Stike_About );