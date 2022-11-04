<?php
/**
 * CTA Widget
 */

namespace Elementor;
class Stike_CTA extends Widget_Base {

	public function get_name() {
        return 'Stike_CTA';
    }

	public function get_title() {
        return __( 'CTA', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-call-to-action';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_CTA_Area',
			[
				'label' => __( 'CTA Controls', 'stike-toolkit' ),
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
				'about_text_alignment',
				[
					'label' => __( 'Choose Title Alignment', 'stike-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1'     => __( 'Text Align Left', 'stike-toolkit' ),
						'2'     => __( 'Text Align Right', 'stike-toolkit' ),
						'3'     => __( 'Text Align Center', 'stike-toolkit' ),
					],
					'default' => '3'
				]
			);

			$this->add_control(
				'top_title',
				[
					'label' => __( 'Top Title', 'stike-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('Let’s Talk', 'stike-toolkit'),
                    'condition' => [
                        'style' => '2',
                    ]
				]
			);

			$this->add_control(
				'title',
				[
					'label' => __( 'Title', 'stike-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('Practice active listening and follow through', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'description',
				[
					'label' => __( 'Description', 'stike-toolkit' ),
					'type' => Controls_Manager::WYSIWYG,
					'default' => __('Qualify your leads & recognize the value of word your customer will love you', 'stike-toolkit'),
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
					'label'=>__('Button Text', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'default' => __('Try It Free Now', 'stike-toolkit'),
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

        $this->end_controls_section();

        $this->start_controls_section(
			'cta_style',
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
						'{{WRAPPER}} .lets-talk-content .sub-title' => 'color: {{VALUE}}',
					],
                    'condition' => [
                        'style' => '2',
                    ]
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
							'min' => 5,
							'max' => 70,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .lets-talk-content .sub-title' => 'font-size: {{SIZE}}px;',
					],
                    'condition' => [
                        'style' => '2',
                    ]
				]
			);

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .free-trial-content h2, .lets-talk-content h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .free-trial-content h2, .lets-talk-content h2' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'description_color',
				[
					'label' => __( 'Description Title Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .free-trial-content p, .lets-talk-content p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'description_size',
				[
					'label' => __( 'Description Title Font Size', 'stike-toolkit' ),
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
						'{{WRAPPER}} .free-trial-content p, .lets-talk-content p' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_responsive_control(
				'button_size',
				[
					'label' => __( 'Button Text Font Size', 'stike-toolkit' ),
					'type' => Controls_Manager::SLIDER,
					'size_units' => [ 'px' ],
					'range' => [
						'px' => [
							'min' => 5,
							'max' => 35,
							'step' => 1,
						],
					],
					'devices' => [ 'desktop', 'tablet', 'mobile' ],
					'selectors' => [
						'{{WRAPPER}} .free-trial-content .default-btn' => 'font-size: {{SIZE}}px;',
					],
				]
            );

			$this->add_control(
				'show_button_icon',
				[
					'label' => __( 'Button Icon', 'stike-toolkit' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'stike-toolkit' ),
					'label_off' => __( 'Hide', 'stike-toolkit' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
            );

            $this->add_control(
				'shape',
				[
					'label' => __( 'Shape Image', 'stike-toolkit' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Show', 'stike-toolkit' ),
					'label_off' => __( 'Hide', 'stike-toolkit' ),
					'return_value' => 'yes',
					'default' => 'yes',
				]
			);

			$this->add_control(
				'padding',
				[
					'label' => __( 'Padding', 'stike-toolkit' ),
					'type' => Controls_Manager::SWITCHER,
					'label_on' => __( 'Bottom', 'stike-toolkit' ),
					'label_off' => __( 'Top Bottom', 'stike-toolkit' ),
					'return_value' => 'yes',
					'default' => 'yes',
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
		$this-> add_inline_editing_attributes('description','none');

		if( $settings['padding'] == 'yes' ):
			$padding_class = 'pb-100';
		else:
			$padding_class = 'ptb-100';
		endif;

		// Text Alignment
		if( $settings['about_text_alignment' ] == '1') {
			$alignment = 'text-left';
		}
		elseif( $settings['about_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-center';
		}
		$is_animation      = !empty($stike_opt['enable_animation_css']) ? $stike_opt['enable_animation_css'] : '';

        if( $is_animation == true ):
            $wow_class = 'wow';
        else:
            $wow_class = '';
        endif;

		?>

		<?php if( $settings['style'] == '1' ): ?>
			<div class="free-trial-area <?php echo esc_attr( $padding_class ); ?> bg-f4f5fe">
				<div class="container">
					<div class="free-trial-content <?php echo esc_attr( $alignment); ?>">
						<h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>
						<p <?php echo $this-> get_render_attribute_string('description'); ?>><?php echo wp_kses_post( $settings['description'] ); ?></p>

						<?php if($btn1_text != '') { ?>
							<?php if ( 'yes' === $settings['target_page'] ) { ?>
								<a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn">
									<?php if( $settings['show_button_icon'] == 'yes' ): ?>
										<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i>
									<?php endif; ?>
									<?php echo esc_html($btn1_text); ?>
									<span></span>
								</a> <?php
							} else { ?>
								<a href="<?php echo esc_url($link_source); ?>" class="default-btn">
									<?php if( $settings['show_button_icon'] == 'yes' ): ?>
										<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i>
									<?php endif; ?>
									<?php echo esc_html($btn1_text); ?>
									<span></span>
								</a><?php
							} ?>
						<?php
						} ?>
					</div>
				</div>

				<?php if( $settings['shape'] == 'yes' ): ?>
					<div class="shape10"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/10.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape11"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/7.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape12"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/11.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape13"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/12.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if( $settings['style'] == '2' ): ?>
			<div class="lets-talk-area <?php echo esc_attr( $padding_class ); ?>">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-lg-8 col-md-12">
							<div class="lets-talk-content <?php echo esc_attr( $alignment); ?>">
								<span class="sub-title <?php echo esc_attr($wow_class); ?> fadeInUp"><?php echo esc_html( $settings['top_title'] ); ?></span>
								<h2 class="<?php echo esc_attr($wow_class); ?> fadeInUp"><?php echo esc_html( $settings['title'] ); ?></h2>
								<p class="<?php echo esc_attr($wow_class); ?> fadeInUp"><?php echo wp_kses_post( $settings['description'] ); ?></p>
							</div>
						</div>

						<div class="col-lg-4 col-md-12 <?php echo esc_attr($wow_class); ?> fadeInRight" data-wow-delay=".2s">
							<div class="lets-talk-btn">
								<?php if($btn1_text != '') { ?>
									<?php if ( 'yes' === $settings['target_page'] ) { ?>
										<a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn">
											<?php if( $settings['show_button_icon'] == 'yes' ): ?>
												<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i>
											<?php endif; ?>
											<?php echo esc_html($btn1_text); ?>
											<span></span>
										</a> <?php
									} else { ?>
										<a href="<?php echo esc_url($link_source); ?>" class="default-btn">
											<?php if( $settings['show_button_icon'] == 'yes' ): ?>
												<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i>
											<?php endif; ?>
											<?php echo esc_html($btn1_text); ?>
											<span></span>
										</a><?php
									} ?>
								<?php
								} ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_CTA );