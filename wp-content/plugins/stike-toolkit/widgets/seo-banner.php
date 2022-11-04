<?php
/**
 * SEO Banner Widget
 */

namespace Elementor;
class Stike_SEO_Banner extends Widget_Base {

	public function get_name() {
        return 'Stike_SEO_Banner';
    }

	public function get_title() {
        return __( 'SEO Banner', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-banner';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_SEO_Banner_Area',
			[
				'label' => __( 'Banner Controls', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);
		$this->add_control(
			'banner_text_alignment',
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
				'title',
				[
					'label' => __( 'Title', 'stike-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('We Are Best SEO Service Provider', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'content',
				[
					'label' => __( 'Content', 'stike-toolkit' ),
					'type' => Controls_Manager::WYSIWYG,
					'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'button_icon',
				[
					'label' 		=> esc_html__( 'Button Icon', 'stike-toolkit' ),
					'type' 			=> Controls_Manager::ICON,
					'label_block' 	=> true,
					'options' 		=> stike_icons(),
					'default' 		=> 'bx bxs-hot',
				]
			);

			$this->add_control(
				'button_text',
				[
					'label' => __( 'Left Button Text', 'stike-toolkit' ),

					'type' => Controls_Manager::TEXT,
					'default' => __('Get Started', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'button_link',
				[
					'label' => __( 'Left Button Link', 'stike-toolkit' ),
					'type' => Controls_Manager::URL,
				]
			);

			$this->add_control(
				'right_button_text',
				[
					'label' => __( 'Right Button Text', 'stike-toolkit' ),

					'type' => Controls_Manager::TEXT,
					'default' => __('banner Us', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'right_button_link',
				[
					'label' => __( 'Right Button Link', 'stike-toolkit' ),
					'type' => Controls_Manager::URL,
				]
			);

			$this->add_control(
				'bg_color',
				[
					'label' => __( 'Background Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .hero-banner' => 'background-color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'banner_image',
				[
					'label' => __( 'Banner Image', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
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
						'{{WRAPPER}} .hero-banner-content h1' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .hero-banner-content h1' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .hero-banner-content p' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .hero-banner-content p' => 'font-size: {{SIZE}}px;',
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
		if( $settings['banner_text_alignment' ] == '1') {
			$alignment = 'text-center';
		}
		elseif( $settings['banner_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
		$this-> add_inline_editing_attributes('content','none');
		?>

		<div class="hero-banner">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
						<?php if( $settings['banner_image']['url'] != '' ): ?>
							<div class="hero-banner-image text-center">
								<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['banner_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
							</div>
						<?php endif; ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="hero-banner-content <?php echo esc_attr( $alignment); ?>">
							<h1 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h1>
							<p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

                            <div class="btn-box">
								<?php if( $settings['button_text'] != '' &&  $settings['button_link']['url'] != '' ): ?>
									<a href="<?php echo esc_url( $settings['button_link']['url'] ); ?>" class="default-btn">
										<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i><?php echo esc_html( $settings['button_text'] ); ?><span></span>
									</a>
								<?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_SEO_Banner );