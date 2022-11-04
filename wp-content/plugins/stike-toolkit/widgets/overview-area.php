<?php
/**
 * Overview Area Widget
 */

namespace Elementor;
class Stike_Overview_Area extends Widget_Base {

	public function get_name() {
        return 'Stike_Overview_Area';
    }

	public function get_title() {
        return __( 'Overview Area', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-image-rollover';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Overview_Area_Area',
			[
				'label' => __( 'Overview Controls', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
                ]
            );
            $this->add_control(
                'image',
                [
                    'label' => __( 'Overview Section Image', 'stike-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
				'number',
				[
					'label' => __( 'Section Number', 'stike-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('01', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'title',
				[
					'label' => __( 'Title', 'stike-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('Getting Started Page', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'content',
				[
					'label' => __( 'Content', 'stike-toolkit' ),
					'type' => Controls_Manager::WYSIWYG,
					'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo.', 'stike-toolkit'),
				]
            );

            $this->add_control(
				'list_items',
				[
					'label' => __( 'List Items( use comma for new line )', 'stike-toolkit' ),

					'type' => Controls_Manager::TEXTAREA,
					'default' => __('Unique Design, Unlimited Video Call, Add Favorite Contact, Camera Filter',  'stike-toolkit'),
				]
			);

			$this->add_control(
				'button_text',
				[
					'label'=>__('Button Text', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'default' => __('Read More', 'stike-toolkit'),
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
				'list_icon',
				[
					'label' => __( 'List Icon', 'stike-toolkit' ),
					'type' => Controls_Manager::ICON,
				]
            );

			$this->add_control(
				'button_icon',
				[
					'label' => __( 'Button Icon', 'stike-toolkit' ),
					'type' => Controls_Manager::ICON,
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
						'{{WRAPPER}} .overview-content h3' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .overview-content h3' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .overview-content p' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .overview-content p' => 'font-size: {{SIZE}}px;',
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
						'{{WRAPPER}} .overview-content ul li' => 'font-size: {{SIZE}}px;',
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
            $wow_class = 'wow fadeInUp';
        else:
            $wow_class = '';
        endif;

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
		$this-> add_inline_editing_attributes('content','none');

        ?>
        <div class="overview-item <?php echo esc_attr($wow_class); ?>" data-wow-delay=".2s">
            <div class="container max-width-1290">
                <div class="row align-items-center">
                    <?php if( $settings['position']  == 'left' ): ?>
                        <div class="col-lg-6 col-md-6">
                            <?php if(  $settings['image']['url'] != '' ): ?>
                                <div class="overview-left-img">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] );?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>

                    <div class="col-lg-6 col-md-6">
                        <div class="overview-content pl-3">
                            <span class="number"><?php echo esc_html( $settings['number'] ); ?></span>
                            <h3 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h3>
                            <p <?php echo $this-> get_render_attribute_string('content'); ?>><?php echo wp_kses_post( $settings['content'] ); ?></p>
                            <ul>
                                <?php $lists = explode(',',$settings['list_items']); ?>
                                <?php foreach( $lists as $item ): ?>
									<?php if( $item != '' ): ?>
										<li>
											<?php if( $settings['list_icon'] == '' ): ?>
												<i class="bx bx-badge-check"></i>
											<?php else: ?>
												<i class='<?php echo esc_attr( $settings['list_icon'] ); ?>'></i>
											<?php endif; ?>
											<?php echo str_replace(',', '', $item); ?>
										</li>
									<?php endif; ?>
                                <?php endforeach; ?>
                            </ul>

							<?php if($btn1_text != '') { ?>
								<?php if ( 'yes' === $settings['target_page'] ) { ?>
									<a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn black-btn">
										<?php if( $settings['button_icon'] == '' ): ?>
											<i class="bx bxs-arrow-to-right"></i>
										<?php else: ?>
											<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i>
										<?php endif; ?>
										<?php echo esc_html($btn1_text); ?>
										<span></span>
									</a> <?php
								} else { ?>
									<a href="<?php echo esc_url($link_source); ?>" class="default-btn black-btn">
										<?php if( $settings['button_icon'] == '' ): ?>
											<i class="bx bxs-arrow-to-right"></i>
										<?php else: ?>
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

                    <?php if( $settings['position']  == 'right' ): ?>
                        <div class="col-lg-6 col-md-6">
                            <?php if(  $settings['image']['url'] != '' ): ?>
                                <div class="overview-left-img">
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] );?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Overview_Area );