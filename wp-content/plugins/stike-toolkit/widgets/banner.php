<?php
/**
 * Banner Widget
 */

namespace Elementor;
class Stike_Banner extends Widget_Base {

	public function get_name() {
        return 'Stike_Banner';
    }

	public function get_title() {
        return __( 'Banner', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-banner';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Banner_Area',
			[
				'label' => __( 'Banner Controls', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'content_style',
				[
					'label' => __( 'Content Style', 'stike-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						'1'         => __( 'Content Without Slider', 'stike-toolkit' ),
						'2'         => __( 'Content With Slider', 'stike-toolkit' ),
						'5'         => __( 'Content With Slider( Video button )', 'stike-toolkit' ),
						'3'         => __( 'Banner Image With Animation', 'stike-toolkit' ),
						'4'         => __( 'Banner Image With Slider', 'stike-toolkit' ),
					],
					'default' => '1',
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
					'default' => __('Build your brand connecting with customers', 'stike-toolkit'),
					'condition' => [
                        'content_style' => ['1', '3', '4'],
                    ]
				]
			);

			$repeater_items = new Repeater();

            $repeater_items->add_control(
                'content_title',
                [
                    'label' => esc_html__('Title', 'stike-toolkit'),
					'type' => Controls_Manager::TEXT,
                ]
            );

            $repeater_items->add_control(
                'content_desc',
                [
					'label' => esc_html__('Description', 'stike-toolkit'),
					'type' => Controls_Manager::TEXTAREA,
                ]
            );
			$repeater_items->add_control(
                'button_text',
                [
					'label' => esc_html__('Button Text', 'stike-toolkit'),
					'type' => Controls_Manager::TEXT,
                ]
            );
			$repeater_items->add_control(
                'link_type',
                [
					'label' =>esc_html__( 'Link Type', 'stike-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'label_block' => true,
					'options' => [
						'1'  => __( 'Link To Page', 'stike-toolkit' ),
						'2' => __( 'External Link', 'stike-toolkit' ),
					],
                ]
            );
			$repeater_items->add_control(
                'link_to_page',
                [
					'label' => __( 'Link Page', 'stike-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'label_block' => true,
					'options' => stike_toolkit_get_page_as_list(),
					'condition' => [
						'link_type' => '1',
					],
                ]
            );
			$repeater_items->add_control(
                'external_link',
                [
					'label'=>__('External Link', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'condition' => [
						'link_type' => '2',
					],
                ]
            );
			$repeater_items->add_control(
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
                'content_slider',
                [
					'label' => esc_html__('Content Slider', 'stike-toolkit'),
					'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater_items->get_controls(),
					'default' => [
						[ 'name' => esc_html__('Content #1', 'stike-toolkit') ],
					],
					'condition' => [
                        'content_style' => ['2', '5'],
                    ]
                ]
            );
			// End repeater

			$this->add_control(
				'chat_delay',
				[
					'label' => __( 'Chat delay animation', 'stike-toolkit' ),
					'type' => Controls_Manager::NUMBER,
					'default' => 1000,
					'desc' => __('1000 equal 1 second', 'stike-toolkit'),
					'condition' => [
                        'content_style' => ['1', '2'],
                    ]
				]
			);
			$this->add_control(
				'content',
				[
					'label' => __( 'Content', 'stike-toolkit' ),
					'type' => Controls_Manager::WYSIWYG,
					'default' => __('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan lacus vel facilisis.', 'stike-toolkit'),
					'condition' => [
                        'content_style' => ['1', '3', '4'],
                    ]
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
					'default' => __('Try it Free Now', 'stike-toolkit'),
					'condition' => [
                        'content_style' => ['1', '3', '4'],
                    ]
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
					'condition' => [
                        'content_style' => ['1', '3', '4'],
                    ]
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
						'content_style' => ['1', '3', '4'],
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
						'content_style' => ['1', '3', '4'],
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
					'condition' => [
                        'content_style' => ['1', '3', '4'],
                    ]
				]
			);

			$this->add_control(
				'video_button_link',
				[
					'label' => __( 'Video Button Link', 'stike-toolkit' ),
					'type' => Controls_Manager::URL,
					'condition' => [
                        'content_style' => ['5'],
                    ]
				]
			);

			$this->add_control(
				'bg_style',
				[
					'label' => __( 'Background Style', 'stike-toolkit' ),
					'type' => Controls_Manager::SELECT,
					'options' => [
						1   => __( 'With Image', 'stike-toolkit' ),
						2   => __( 'With Color', 'stike-toolkit' ),
					],
					'default' => 1,
					'condition' => [
                        'content_style' => ['1', '2', '3', '5'],
                    ]
				]
			);

			$this->add_control(
				'image',
				[
					'label' => __( 'Background Image', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'condition' => [
						'bg_style' => '1',
                        'content_style' => ['1', '2', '3', '5'],
					],
				]
			);


			$this->add_control(
				'bg_color',
				[
					'label' => __( 'Background Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .banner-image' => 'background-color: {{VALUE}}',
					],
					'condition' => [
						'bg_style' => '2',
					],
				]
			);

			$this->add_control(
				'banner_image',
				[
					'label' => __( 'Banner Image', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'condition' => [
                        'content_style' => ['3'],
                    ]
				]
			);
			$this->add_control(
				'slider_images',
				[
					'label' => __( 'Banner Image', 'stike-toolkit' ),
					'type' => Controls_Manager::GALLERY,
					'condition' => [
                        'content_style' => ['4'],
                    ]
				]
			);

			$repeater_items2 = new Repeater();

            $repeater_items2->add_control(
                'user1_img',
                [
					'label' => __( 'Left User Image', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
                ]
            );
            $repeater_items2->add_control(
                'user1_massage',
                [
					'label' => esc_html__('Left User Content', 'stike-toolkit'),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__('Hi', 'stike-toolkit'),
                ]
            );
            $repeater_items2->add_control(
                'user1_time',
                [
					'label' => esc_html__('Left User Time', 'stike-toolkit'),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__('19:58', 'stike-toolkit'),
                ]
            );
            $repeater_items2->add_control(
                'user2_img',
                [
					'label' => __( 'Right User Image', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
                ]
            );
            $repeater_items2->add_control(
                'user2_massage',
                [
					'label' => esc_html__('Right User Content', 'stike-toolkit'),
					'type' => Controls_Manager::TEXTAREA,
					'default' => esc_html__('Hello', 'stike-toolkit'),
                ]
            );
            $repeater_items2->add_control(
                'user2_time',
                [
					'label' => esc_html__('Right User Time', 'stike-toolkit'),
					'type' => Controls_Manager::TEXT,
					'default' => esc_html__('19:59', 'stike-toolkit'),
                ]
            );
			$this->add_control(
                'message_item',
                [
					'label' => esc_html__('Chatting Content', 'stike-toolkit'),
					'type' => Controls_Manager::REPEATER,
                    'fields' => $repeater_items2->get_controls(),
					'default' => [
						[ 'name' => esc_html__(' Item #1', 'stike-toolkit') ],
					],
					'condition' => [
                        'content_style' => ['1', '2'],
                    ]
                ]
            );
		$this->end_controls_section();

		$this->start_controls_section(
			'Stike_Shape_Image',
			[
				'label' => __( 'Shape Image', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
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
			$this->add_control(
				'shape1',
				[
					'label' => __( 'Shape Image One', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'condition' => [
                        'show_shape' => ['yes'],
                    ],
				]
			);
			$this->add_control(
				'shape2',
				[
					'label' => __( 'Shape Image Two', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'condition' => [
                        'show_shape' => ['yes'],
                    ],
				]
			);
			$this->add_control(
				'shape3',
				[
					'label' => __( 'Shape Image Three', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'condition' => [
                        'show_shape' => ['yes'],
                    ],
				]
			);
			$this->add_control(
				'shape4',
				[
					'label' => __( 'Shape Image Four', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'condition' => [
                        'show_shape' => ['yes'],
                    ],
				]
			);
			$this->add_control(
				'shape5',
				[
					'label' => __( 'Shape Image Five', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'condition' => [
                        'show_shape' => ['yes'],
                    ],
				]
			);
			$this->add_control(
				'shape6',
				[
					'label' => __( 'Shape Image Six', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'condition' => [
                        'show_shape' => ['yes'],
                    ],
				]
			);
			$this->add_control(
				'shape7',
				[
					'label' => __( 'Shape Image Seven', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
					'condition' => [
                        'show_shape' => ['yes'],
                    ],
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
						'{{WRAPPER}} .main-banner-content .content h1, .banner-content .content h1' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .main-banner-content .content h1, .banner-content .content h1' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .main-banner-content .content p, .banner-content .content p' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .main-banner-content .content p, .banner-content .content p' => 'font-size: {{SIZE}}px;',
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
						'{{WRAPPER}} .main-banner-content .content .default-btn, .banner-content .content .default-btn' => 'font-size: {{SIZE}}px;',
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
				'left_user_bg_color',
				[
					'label' => __( 'Left Content Background Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .message-left .message-text' => 'background: {{VALUE}}',
					],
					'condition' => [
                        'content_style' => ['1', '2'],
                    ],
				]
			);
			$this->add_control(
				'right_user_bg_color',
				[
					'label' => __( 'Right Content Background Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .message-right .message-text' => 'background: {{VALUE}}',
					],
					'condition' => [
                        'content_style' => ['1', '2'],
                    ],
				]
			);

			$this->add_control(
				'chat_content_size',
				[
					'label' => __( 'User Content Font Size', 'stike-toolkit' ),
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
						'{{WRAPPER}} .message-right .message-text, .message-left .message-text' => 'font-size: {{SIZE}}px;',
					],
					'condition' => [
                        'content_style' => ['1', '2'],
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

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
		$this-> add_inline_editing_attributes('content','none');

		// Background
		if( $settings['bg_style'] == '1' ):
			$image = $settings['image']['url'];
			$bg_color = '';
		else:
			$image = '';
			$bg_color = $settings['bg_color'];
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

		// Shape Images
		if( $settings['show_shape'] == 'yes' ):
			if( $settings['shape1']['url'] != '' ):
				$shape1 = $settings['shape1']['url'];
			else:
				$shape1 = STIKE_IMG .'/shape/19.png';
			endif;
			if( $settings['shape2']['url'] != '' ):
				$shape2 = $settings['shape2']['url'];
			else:
				$shape2 = STIKE_IMG .'/shape/20.png';
			endif;
			if( $settings['shape3']['url'] != '' ):
				$shape3 = $settings['shape3']['url'];
			else:
				$shape3 = STIKE_IMG .'/shape/18.png';
			endif;
			if( $settings['shape4']['url'] != '' ):
				$shape4 = $settings['shape4']['url'];
			else:
				$shape4 = STIKE_IMG .'/shape/21.png';
			endif;
			if( $settings['shape5']['url'] != '' ):
				$shape5 = $settings['shape5']['url'];
			else:
				$shape5 = STIKE_IMG .'/shape/22.svg';
			endif;
			if( $settings['shape6']['url'] != '' ):
				$shape6 = $settings['shape6']['url'];
			else:
				$shape6 = STIKE_IMG .'/shape/23.png';
			endif;
			if( $settings['shape7']['url'] != '' ):
				$shape7 = $settings['shape7']['url'];
			else:
				$shape7 = STIKE_IMG .'/shape/25.png';
			endif;
		endif;
		?>

		<?php if( $settings['content_style'] == '1' ): ?>
			<div class="main-banner">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-7 col-md-12">
							<div class="main-banner-content <?php echo esc_attr( $alignment); ?>">
								<div class="d-table">
									<div class="d-table-cell">
										<div class="content">
											<h1 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h1>
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

						<div class="col-lg-5 col-md-12">
							<div class="banner-image bg-2" <?php if( $image != '' ){ ?> style="background-image:url(<?php echo esc_url( $image ); ?>);"<?php } ?>>
								<div class="chat-wrapper">
									<div class="chat">
										<div class="chat-container">
											<div class="chat-listcontainer">
												<ul class="chat-message-list"></ul>
											</div>
										</div>
									</div>
								</div>

								<?php if( $image != '' ): ?>
									<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
								<?php  endif; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if( $settings['show_shape'] == 'yes' ): ?>
					<div class="shape20"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape1 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape21"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape2 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape19"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape3 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape22"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape4 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape23"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape5 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape24"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape6 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape26"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape7 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
				<?php endif; ?>
			</div>
		<?php elseif( $settings['content_style'] == '2' ): ?>
			<div class="banner-section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-7 col-md-12">
							<div class="banner-content <?php echo esc_attr( $alignment); ?>">
								<div class="content">
									<div class="banner-content-slides owl-carousel owl-theme">
										<?php foreach( $settings['content_slider'] as $content_item ):
											$btn1_text  = $content_item['button_text'];
											//  Button Link
											$link_source = '';
											if( $content_item['link_type'] == 1 ){
												$link_source = get_page_link($content_item['link_to_page']);
											} else {
												$link_source = $content_item['external_link'];
											}

											?>
											<div class="inner-content">
												<h1><?php echo esc_html( $content_item['content_title'] ); ?></h1>
												<?php echo wp_kses_post( $content_item['content_desc'] ); ?>
												<?php if($btn1_text != '') { ?>
													<?php if ( 'yes' === $content_item['target_page'] ) { ?>
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
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-5 col-md-12">
							<div class="banner-img bg-2" <?php if( $image != '' ){ ?> style="background-image:url(<?php echo esc_url( $image ); ?>);"<?php } ?>>
								<div class="chat-wrapper">
									<div class="chat">
										<div class="chat-container">
											<div class="chat-listcontainer">
												<ul class="chat-message-list"></ul>
											</div>
										</div>
									</div>
								</div>

								<?php if( $image != '' ): ?>
									<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
								<?php  endif; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if( $settings['show_shape'] == 'yes' ): ?>
					<div class="shape20"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape1 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape21"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape2 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape19"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape3 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape22"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape4 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape23"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape5 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape24"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape6 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape26"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape7 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
				<?php endif; ?>
			</div>
		<?php elseif( $settings['content_style'] == '3' ): ?>
			<div class="main-banner main-banner-one">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-7 col-md-12">
							<div class="banner-content <?php echo esc_attr( $alignment); ?>">
								<div class="d-table">
									<div class="d-table-cell">
										<div class="content">
											<h1 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h1>
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

						<div class="col-lg-5 col-md-12">
							<div class="banner-image mbanner-bg-one" <?php if( $image != '' ){ ?> style="background-image:url(<?php echo esc_url( $image ); ?>);"<?php } ?>>
								<div class="d-table">
									<div class="d-table-cell">
										<div class="animate-banner-image">
											<?php if( $settings['banner_image']['url'] != '' ): ?>
												<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['banner_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
											<?php endif; ?>
										</div>
									</div>
								</div>

								<?php if( $image != '' ): ?>
									<img class="<?php echo esc_attr($lazy_class); ?> mbanner-img" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $image ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
								<?php endif; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if( $settings['show_shape'] == 'yes' ): ?>
					<div class="shape20"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape1 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape21"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape2 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape19"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape3 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape22"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape4 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape23"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape5 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape24"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape6 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape26"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape7 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
				<?php endif; ?>
			</div>
		<?php elseif( $settings['content_style'] == '5' ): ?>
			<div class="banner-section">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-7 col-md-12">
							<div class="banner-content <?php echo esc_attr( $alignment); ?>">
								<div class="content">
									<div class="banner-content-slides owl-carousel owl-theme">
										<?php foreach( $settings['content_slider'] as $content_item ):
											$btn1_text  = $content_item['button_text'];
											//  Button Link
											$link_source = '';
											if( $content_item['link_type'] == 1 ){
												$link_source = get_page_link($content_item['link_to_page']);
											} else {
												$link_source = $content_item['external_link'];
											}

											?>
											<div class="inner-content">
												<h1><?php echo esc_html( $content_item['content_title'] ); ?></h1>
												<?php echo wp_kses_post( $content_item['content_desc'] ); ?>
												<?php if($btn1_text != '') { ?>
													<?php if ( 'yes' === $content_item['target_page'] ) { ?>
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
										<?php endforeach; ?>
									</div>
								</div>
							</div>
						</div>

						<div class="col-lg-5 col-md-12">
							<div class="banner-img banner-video" <?php if( $image != '' ){ ?> style="background-image:url(<?php echo esc_url( $image ); ?>) !important;"<?php } ?>>
								<div class="d-table">
									<div class="d-table-cell">
										<div class="video-box">
											<?php if( $settings['video_button_link']['url'] != '' ): ?>
												<a href="<?php echo esc_url( $settings['video_button_link']['url'] ); ?>" class="video-btn popup-youtube">
													<i class="bx bx-play"></i>
												</a>
											<?php endif; ?>

											<?php if( $settings['show_shape'] == 'yes' ): ?>
												<div class="shape1"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/1.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
												<div class="shape2"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/2.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
												<div class="shape3"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/3.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
												<div class="shape4"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/4.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
												<div class="shape5"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/5.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
												<div class="shape6"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/6.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
											<?php endif; ?>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<?php if( $settings['show_shape'] == 'yes' ): ?>
					<div class="shape20"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape1 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape21"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape2 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape19"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape3 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape22"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape4 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape23"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape5 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape24"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape6 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape26"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape7 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if( $settings['content_style'] == '4' ): ?>
			<div class="main-banner main-banner-two">
				<div class="container-fluid">
					<div class="row">
						<div class="col-lg-7 col-md-12">
							<div class="main-banner-content <?php echo esc_attr( $alignment); ?>">
								<div class="d-table">
									<div class="d-table-cell">
										<div class="content">
											<h1 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h1>
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

						<div class="col-lg-5 col-md-12">
							<div class="banner-image-slider owl-carousel owl-theme">
								<?php foreach( $settings['slider_images'] as $image ): ?>
									<div class="banner-image banner-slider-bg1" style="background-image:url(<?php echo esc_url( $image['url'] ); ?>) !important;"></div>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>

				<?php if( $settings['show_shape'] == 'yes' ): ?>
					<div class="shape20"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape1 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape21"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape2 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape19"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape3 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape22"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape4 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape23"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape5 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape24"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape6 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
					<div class="shape26"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $shape7 ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
				<?php endif; ?>
			</div>
		<?php endif; ?>

		<?php if( $settings['content_style'] == '1' || $settings['content_style'] == '2' ): ?>
			<script>
				jQuery(function(){
						var chatMessages = [
							<?php
							$i = 0;
							foreach( $settings['message_item'] as $item ): ?>
								<?php if( $item['user1_massage'] != '' && $item['user1_img']['url'] != ''): ?>
									{
										name: "ms<?php echo esc_attr($i); ?>",
										msg: "<?php echo esc_html($item['user1_massage']); ?>",
										delay: <?php echo $settings['chat_delay']; ?>,
										align: "right",
										showTime: true,
										time: "<?php echo esc_html($item['user1_time']); ?>",
										img: "<?php echo esc_html($item['user1_img']['url']); ?>"
									},
								<?php endif; ?>

								<?php if( $item['user2_massage'] != '' && $item['user2_img']['url'] != ''): ?>
									{
										name: "ms<?php echo esc_attr($i); ?>",
										msg: "<?php echo esc_html($item['user2_massage']); ?>",
										delay: <?php echo $settings['chat_delay']; ?>,
										align: "left",
										showTime: true,
										time: "<?php echo esc_html($item['user2_time']); ?>",
										img: "<?php echo esc_html($item['user2_img']['url']); ?>"
									},
								<?php endif; ?>
							<?php
							$i++;
							endforeach; ?>

						];
						var chatDelay = 0;

						function onRowAdded() {
							$('.chat-container').animate({
								scrollTop: $('.chat-container').prop('scrollHeight')
							});
						};
						$.each(chatMessages, function(index, obj) {
							chatDelay = chatDelay + 1000;
							chatDelay2 = chatDelay + obj.delay;
							chatDelay3 = chatDelay2 + 10;
							scrollDelay = chatDelay;
							chatTimeString = " ";
							msgname = "." + obj.name;
							msginner = ".messageinner-" + obj.name;
							spinner = ".sp-" + obj.name;
							if (obj.showTime == true) {
								chatTimeString = "<span class='message-time'>" + obj.time + "</span>";
							}
							$(".chat-message-list").append("<li class='message-" + obj.align + " " + obj.name + "' hidden><div class='sp-" + obj.name + "'><span class='spinme-" + obj.align + "'><div class='spinner'><div class='bounce1'></div><div class='bounce2'></div><div class='bounce3'></div></div></span></div><div class='messageinner-" + obj.name + "' hidden><img src='" + obj.img +"'><span class='message-text'>" + obj.msg + chatTimeString + "</span></div></li>");

							$(msgname).delay(chatDelay).fadeIn();
							$(spinner).delay(chatDelay2).hide(1);
							$(msginner).delay(chatDelay3).fadeIn();
							setTimeout(onRowAdded, chatDelay);
							setTimeout(onRowAdded, chatDelay3);
							chatDelay = chatDelay3;
						});

					});
			</script>
		<?php endif; ?>
        <?php
	}
}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Banner );