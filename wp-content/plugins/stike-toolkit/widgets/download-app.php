<?php
/**
 * Download Widget
 */

namespace Elementor;
class Stike_Download extends Widget_Base {

	public function get_name() {
        return 'Stike_Download';
    }

	public function get_title() {
        return __( 'Download', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-call-to-action';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Download_Area',
			[
				'label' => __( 'Download Controls', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'section_background_img',
                [
                    'label' => __( 'Download Background Image', 'stike-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );
            $this->add_control(
                'image',
                [
                    'label' => __( 'Download App Image', 'stike-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'download_text_alignment',
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
                'top_title',
                [
                    'label' => __( 'Top Title', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Download App', 'stike-toolkit'),
                ]
            );

			$this->add_control(
				'title',
				[
					'label' => __( 'Title', 'stike-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('Supporting your customers on the go with our mobile app', 'stike-toolkit'),
				]
            );

            $this->add_control(
				'left_button_image',
				[
					'label' => __( 'Left Button Icon Image', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
				]
            );

            $this->add_control(
				'left_button_top_text',
				[
					'label' => __( 'Left Button Top Text', 'stike-toolkit' ),

					'type' => Controls_Manager::TEXT,
					'default' => __('Download on the', 'stike-toolkit'),
				]
			);

            $this->add_control(
				'left_button_text',
				[
					'label'=>__('Button Text', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'default' => __('Apple Store', 'stike-toolkit'),
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
				'right_button_image',
				[
					'label' => __( 'Right Button Icon Image', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
				]
            );

            $this->add_control(
				'right_button_top_text',
				[
					'label' => __( 'Right Button Top Text', 'stike-toolkit' ),

					'type' => Controls_Manager::TEXT,
					'default' => __('Get it on', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'right_button_text',
				[
					'label'=>__('Right Button Text', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'default' => __('Google Play', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'link_type_two',
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
				'link_to_page_two',
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
				'external_link_two',
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
				'target_page_two',
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
			'download_style',
			[
				'label' => __( 'Style', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );
            $this->add_control(
                'background_color',
                [
                    'label' => __( 'Section Background Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .app-download-area' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_control(
                'top_title_bg_color',
                [
                    'label' => __( 'Top Title Background Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .app-download-content .sub-title' => 'background-color: {{VALUE}}',
                    ],
                ]
            );

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .app-download-content h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .app-download-content h2' => 'font-size: {{SIZE}}px;',
					],
				]
            );

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $btn1_text  = $settings['left_button_text'];

        //  Button Link
        $link_source = '';
        if( $settings['link_type'] == 1 ){
            $link_source = get_page_link($settings['link_to_page']);
        } else {
            $link_source = $settings['external_link'];
        }

        $btn2_text  = $settings['right_button_text'];

        //  Button Link
        $link_source2 = '';
        if( $settings['link_type_two'] == 1 ){
            $link_source2 = get_page_link($settings['link_to_page_two']);
        } else {
            $link_source2 = $settings['external_link_two'];
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

        // Text Alignment
		if( $settings['download_text_alignment' ] == '1') {
			$alignment = 'text-center';
		}
		elseif( $settings['download_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');

        ?>
        <div class="app-download-area ptb-100" style="background-image:url( <?php echo esc_url( $settings['section_background_img']['url'] ); ?> );">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-5 col-md-12">
                        <div class="app-download-image">
                            <?php if( $settings['image']['url'] != '' ): ?>
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url($settings['image']['url']); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                            <?php endif; ?>
                        </div>
                    </div>

                    <div class="col-lg-7 col-md-12">
                        <div class="app-download-content <?php echo esc_attr( $alignment); ?>">
                            <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                            <h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>

                            <div class="btn-box">


                                <?php if($btn1_text != '') { ?>
                                    <?php if ( 'yes' === $settings['target_page'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url($link_source); ?>" class="apple-store-btn">
                                            <?php if( $settings['left_button_image']['url'] != '' ): ?>
                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['left_button_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['left_button_text'] ); ?>">
                                            <?php endif; ?>
                                            <?php echo esc_html( $settings['left_button_top_text'] );?>
                                            <span><?php echo esc_html( $settings['left_button_text'] );?></span>
                                        </a> <?php
                                    } else { ?>
                                        <a href="<?php echo esc_url($link_source); ?>" class="apple-store-btn">
                                            <?php if( $settings['left_button_image']['url'] != '' ): ?>
                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['left_button_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['left_button_text'] ); ?>">
                                            <?php endif; ?>
                                            <?php echo esc_html( $settings['left_button_top_text'] );?>
                                            <span><?php echo esc_html( $settings['left_button_text'] );?></span>
                                        </a><?php
                                    } ?>
                                <?php
                                } ?>

                                <?php if($btn2_text != '') { ?>
                                    <?php if ( 'yes' === $settings['target_page_two'] ) { ?>
                                        <a target="_blank" href="<?php echo esc_url($link_source2); ?>" class="play-store-btn">
                                            <?php if( $settings['right_button_image']['url'] != '' ): ?>
                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['right_button_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['right_button_text'] ); ?>">
                                            <?php endif; ?>
                                            <?php echo esc_html( $settings['right_button_top_text'] );?>
                                            <span><?php echo esc_html( $settings['right_button_text'] );?></span>
                                        </a> <?php
                                    } else { ?>
                                        <a href="<?php echo esc_url($link_source2); ?>" class="play-store-btn">
                                            <?php if( $settings['right_button_image']['url'] != '' ): ?>
                                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['right_button_image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['right_button_text'] ); ?>">
                                            <?php endif; ?>
                                            <?php echo esc_html( $settings['right_button_top_text'] );?>
                                            <span><?php echo esc_html( $settings['right_button_text'] );?></span>
                                        </a><?php
                                    } ?>
                                <?php
                                } ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Download );