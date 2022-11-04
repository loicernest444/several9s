<?php
/**
 * Services Area Widget
 */

namespace Elementor;
class Stike_Services_Area extends Widget_Base {

	public function get_name() {
        return 'Stike_Services_Area';
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
			'Stike_Services_Area_Area',
			[
				'label' => __( 'Services Controls', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

			$this->add_control(
				'services_section_style',
				[
					'label' => __( 'Style', 'stike-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1'   => __( 'Style One', 'stike-toolkit' ),
						'2'   => __( 'Style Two', 'stike-toolkit' ),
						'3'   => __( 'Style Three', 'stike-toolkit' ),
					],
					'default' => '1',
				]
			);

			$this->add_control(
				'service_text_alignment',
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
                'position',
                [
                    'label' => __( 'Image Position', 'stike-toolkit' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'left'   => __( 'Left', 'stike-toolkit' ),
                        'right'   => __( 'Right', 'stike-toolkit' ),
                    ],
					'default' => 'left',
					'condition' => [
						'services_section_style' => ['1', '2'],
					],
                ]
            );
            $this->add_control(
                'top_image',
                [
                    'label' => __( 'Service Section Image', 'stike-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
					'condition' => [
						'services_section_style' => ['1', '2'],
					],
                ]
            );

			$this->add_control(
				'title',
				[
					'label' => __( 'Title', 'stike-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('Path is here for faster way of connections with your customers', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'content',
				[
					'label' => __( 'Content', 'stike-toolkit' ),
					'type' => Controls_Manager::WYSIWYG,
					'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'button_icon',
				[
					'label' 		=> esc_html__( 'Button Icon', 'stike-toolkit' ),
					'type' 			=> Controls_Manager::ICON,
					'label_block' 	=> true,
					'options' 		=> stike_icons(),
					'default' 		=> 'bx bxs-spreadsheet',
				]
			);

			$this->add_control(
				'button_text',
				[
					'label'=>__('Button Text', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'default' => __('Learn More', 'stike-toolkit'),
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
				'list_items',
				[
					'label' => __( 'List Items( use comma for new line )', 'stike-toolkit' ),

					'type' => Controls_Manager::TEXTAREA,
					'default' => __('Responsive Design, UI / UX Design, Mobile App Development, Laravel Web Development, React Web Development, Angular Web Development', 'stike-toolkit'),
					'condition' => [
						'services_section_style' => ['2', '3'],
					],
				]
			);

			$this->add_control(
				'list_icon',
				[
					'label' => __( 'List Icon', 'stike-toolkit' ),

					'type' => Controls_Manager::ICON,
					'condition' => [
						'services_section_style' => '2',
					],
				]
			);

			$this->add_control(
				'image',
				[
					'label' => __( 'Service Image', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
				]
			);

			$this->add_control(
				'bg_color',
				[
					'label' => __( 'Shape Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .services-area.bg-right-color::before, .services-area.bg-right-shape::before, .services-area.bg-left-color::before' => 'background-color: {{VALUE}}',
					],
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
				'section_bg_color',
				[
					'label' => __( 'Background Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .services-area' => 'background-color: {{VALUE}}',
					],
				]
            );

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .services-content .content h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .services-content .content h2' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .services-content .content p' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .services-content .content p' => 'font-size: {{SIZE}}px;',
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
						'{{WRAPPER}} .services-content .content .default-btn' => 'font-size: {{SIZE}}px;',
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
				'list_bg_color',
				[
					'label' => __( 'List Hover Background Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .feature-box:hover' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'services_section_style' => '2',
					],
				]
			);

			$this->add_responsive_control(
				'list_title_size',
				[
					'label' => __( 'List Title Font Size', 'stike-toolkit' ),
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
						'{{WRAPPER}} .feature-box' => 'font-size: {{SIZE}}px;',
					],
					'condition' => [
						'services_section_style' => '2',
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

		$is_animation      = !empty($stike_opt['enable_animation_css']) ? $stike_opt['enable_animation_css'] : '';

        if( $is_animation == true ):
            $wow_class = 'wow';
        else:
            $wow_class = '';
        endif;

		// Text Alignment
		if( $settings['service_text_alignment' ] == '1') {
			$alignment = 'text-center';
		}
		elseif( $settings['service_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
		$this-> add_inline_editing_attributes('content','none');

        ?>
		<?php if( $settings['services_section_style'] == '2' ): ?>
			<?php if( $settings['position']  == 'right' ): ?>
				<div class="services-area bg-right-shape ptb-100">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="services-content it-service-content">
								<div class="content left-content <?php echo esc_attr( $alignment); ?>">
									<?php if( $settings['top_image']['url'] != '' ): ?>
										<div class="icon">
											<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['top_image']['url'] );?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
										</div>
									<?php endif; ?>

									<h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>
									<p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

									<?php if( $settings['list_items'] != '' ): ?>
										<div class="row">
											<?php $lists = explode(',',$settings['list_items']); ?>
											<?php foreach( $lists as $item ): ?>
												<div class="col-sm-6">
													<div class="feature-box">
														<?php if( $settings['list_icon'] != '' ): ?>
															<i class="<?php echo esc_attr( $settings['list_icon'] ); ?>"></i>
														<?php else: ?>
															<i class="bx bxs-badge-check"></i>
														<?php endif; ?>
														<?php echo str_replace(',', '', $item); ?>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>

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

							<?php if( $settings['image']['url'] != '' ): ?>
								<div class="services-image <?php echo esc_attr($wow_class); ?> fadeInRight" data-wow-delay=".3s">
									<div class="image">
										<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="services-area bg-left-color bg-left-shape bg-f4f6fc ptb-100">
					<div class="container-fluid">
						<div class="row align-items-center">
							<?php if( $settings['image']['url'] != '' ): ?>
								<div class="services-image <?php echo esc_attr($wow_class); ?> fadeInLeft" data-wow-delay=".3s">
									<div class="image">
										<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
									</div>
								</div>
							<?php endif; ?>

							<div class="services-content it-service-content">
								<div class="content <?php echo esc_attr( $alignment); ?>">
									<?php if( $settings['top_image']['url'] != '' ): ?>
										<div class="icon">
											<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['top_image']['url'] );?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
										</div>
									<?php endif; ?>
									<h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>
									<p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

									<?php if( $settings['list_items'] != '' ): ?>
										<div class="row">
											<?php $lists = explode(',',$settings['list_items']); ?>
											<?php foreach( $lists as $item ): ?>
												<div class="col-sm-6">
													<div class="feature-box">
														<?php if( $settings['list_icon'] != '' ): ?>
															<i class="<?php echo esc_attr( $settings['list_icon'] ); ?>"></i>
														<?php else: ?>
															<i class="bx bxs-badge-check"></i>
														<?php endif; ?>
														<?php echo str_replace(',', '', $item); ?>
													</div>
												</div>
											<?php endforeach; ?>
										</div>
									<?php endif; ?>

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
		<?php elseif( $settings['services_section_style'] == '3'): ?>
			<div class="services-area ptb-100 bg-f4f6fc">
				<div class="container-fluid">
					<div class="row align-items-center">
						<div class="services-image <?php echo esc_attr($wow_class); ?> fadeInLeft" data-wow-delay=".3s">
							<div class="image">
								<?php if(  $settings['image']['url'] != '' ): ?>
									<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
								<?php endif; ?>
							</div>
						</div>

						<div class="services-content it-service-content">
							<div class="content <?php echo esc_attr( $alignment); ?>">
								<div class="fun-facts-inner-content">
									<h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>
									<p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

									<ul>
										<?php if( $settings['list_items'] != '' ): ?>
											<?php $lists = explode(',',$settings['list_items']); ?>
											<?php foreach( $lists as $item ): ?>
												<li>
													<?php if( $settings['list_icon'] != '' ): ?>
														<i class="<?php echo esc_attr( $settings['list_icon'] ); ?>"></i>
													<?php else: ?>
														<i class="bx bxs-badge-check"></i>
													<?php endif; ?>
													<?php echo str_replace(',', '', $item); ?>
												</li>
											<?php endforeach; ?>
										<?php endif; ?>
									</ul>

									<?php if($btn1_text != '') { ?>
										<?php if ( 'yes' === $settings['target_page'] ) { ?>
											<a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn black-btn">
												<?php if( $settings['show_button_icon'] == 'yes' ): ?>
													<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i>
												<?php endif; ?>
												<?php echo esc_html($btn1_text); ?>
												<span></span>
											</a> <?php
										} else { ?>
											<a href="<?php echo esc_url($link_source); ?>" class="default-btn black-btn">
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

				<div class="shape9">
					<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo get_template_directory_uri() ?>/assets/img/shape/9.png" alt="<?php echo esc_attr__( 'image', 'stike-toolkit' ); ?>">
				</div>
			</div>
		<?php else: ?>
			<?php if( $settings['position']  == 'right' ): ?>
				<div class="services-area bg-right-color ptb-100">
					<div class="container-fluid">
						<div class="row align-items-center">
							<div class="services-content">
								<div class="content left-content <?php echo esc_attr( $alignment); ?>">
									<?php if( $settings['top_image']['url'] != '' ): ?>
										<div class="icon">
											<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['top_image']['url'] );?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
										</div>
									<?php endif; ?>

									<h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>
									<p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
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

							<?php if( $settings['image']['url'] != '' ): ?>
								<div class="services-image">
									<div class="image">
										<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
									</div>
								</div>
							<?php endif; ?>
						</div>
					</div>
				</div>
			<?php else: ?>
				<div class="services-area bg-left-color bg-f4f6fc ptb-100">
					<div class="container-fluid">
						<div class="row align-items-center">
							<?php if( $settings['image']['url'] != '' ): ?>
								<div class="services-image">
									<div class="image">
										<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
									</div>
								</div>
							<?php endif; ?>

							<div class="services-content <?php echo esc_attr( $alignment); ?>">
								<div class="content">
									<?php if( $settings['top_image']['url'] != '' ): ?>
										<div class="icon">
											<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['top_image']['url'] );?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
										</div>
									<?php endif; ?>
									<h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>
									<p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>

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
        <?php endif; ?>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Services_Area );