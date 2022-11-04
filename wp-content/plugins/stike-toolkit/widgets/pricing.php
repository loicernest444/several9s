<?php
/**
 * Pricing Widget
 */

namespace Elementor;
class Stike_Pricing extends Widget_Base {

	public function get_name() {
        return 'Stike_Pricing';
    }

	public function get_title() {
        return __( 'Pricing Table', 'stike-core' );
    }

	public function get_icon() {
        return 'eicon-price-table';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Pricing_Area',
			[
				'label' => __( 'Pricing Controls', 'stike-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
        $this->add_control(
            'hide_tab',
            [
                'label' => __( 'Tab', 'stike-toolkit' ),
                'type' => Controls_Manager::SWITCHER,
                'label_on' => __( 'Show', 'stike-toolkit' ),
                'label_off' => __( 'Hide', 'stike-toolkit' ),
                'return_value' => 'yes',
                'default' => 'yes',
            ]
        );

            $this->add_control(
                'section_title',
                [
                    'label' => __( 'Title', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Choose The Pricing Plan', 'stike-core'),
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'Monthly',
			[
				'label' => __( 'Monthly Tab Controls', 'stike-core' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );
            $this->add_control(
                'monthly_title',
                [
                    'label' => __( 'Monthly Tab Title', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Monthly', 'stike-core'),
                    'condition' => [
                        'hide_tab' => 'yes',
                    ]
                ]
            );

            $monthly_items = new Repeater();

            $monthly_items->add_control(
                'title',
                [
                    'label' => __( 'Title', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Free', 'stike-core'),
                ]
            );

            $monthly_items->add_control(
                'price_prefix',
                [
                    'label' => __( 'Price Prefix', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('$', 'stike-core'),
                ]
            );

            $monthly_items->add_control(
                'price_suffix',
                [
                    'label' => __( 'Number Suffix', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('/y', 'stike-core'),
                ]
            );

            $monthly_items->add_control(
                'price',
                [
                    'label' => __( 'Price', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('0', 'stike-core'),
                ]
            );

            $monthly_items->add_control(
                'features',
                [
                    'label' => __( 'Features', 'stike-core' ),
                    'type' => Controls_Manager::TEXTAREA,
                    'default' =>
                        "
                        <li>
                            <i class='bx bxs-badge-check'></i>
                            Up to 3 chat operators
                            <span class='tooltips bx bxs-info-circle' data-toggle='tooltip' data-placement='right' title='Tight pants next level keffiyeh you probably haven't heard of them.'></span>
                        </li>
                        <li>
                            <i class='bx bxs-badge-check'></i>
                            100 ChatBot Triggers
                        </li>
                        <li>
                            <i class='bx bxs-badge-check'></i>
                            24/7 Live Chat
                        </li>
                        <li>
                            <i class='bx bxs-badge-check'></i>
                            Email Integration
                            <span class='tooltips bx bxs-info-circle'  data-toggle='tooltip' data-placement='right' title='Tight pants next level keffiyeh you probably haven't heard of them.'></span>
                        </li>
                        <li><i class='bx bxs-badge-check'></i> Messenger Integration</li>
                        <li><i class='bx bxs-badge-check'></i> Visitor Info</li>
                        <li><i class='bx bxs-badge-check'></i> Mobile + Desktop Apps</li>
                        <li>
                            <i class='bx bxs-badge-check'></i>
                            Quick Responses
                            <span class='tooltips bx bxs-info-circle'  data-toggle='tooltip' data-placement='right' title='Tight pants next level keffiyeh you probably haven't heard of them.'></span>
                        </li>
                        <li><i class='bx bxs-badge-check'></i> Drag & Drop Widgets</li>
                        <li>
                            <i class='bx bxs-badge-check'></i>
                            Visitor Notes
                            <span class='tooltips bx bxs-info-circle'  data-toggle='tooltip' data-placement='right' title='Tight pants next level keffiyeh you probably haven't heard of them.'></span>
                        </li>
                        <li><i class='bx bxs-badge-check'></i> Google Analytics</li>
                        ",
                ]
            );

            $monthly_items->add_control(
				'button_text',
				[
					'label'=>__('Button Text', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'default' => __('Try It Free Now', 'stike-toolkit'),
				]
			);

			$monthly_items->add_control(
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

			$monthly_items->add_control(
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

			$monthly_items->add_control(
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
			$monthly_items->add_control(
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

            $monthly_items->add_control(
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
                'monthly_list_items',
                [
                    'label' => __( 'Add Item', 'upkeep-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $monthly_items->get_controls(),
                    'title_field' => '{{{ title }}}',
                ]
            );
        $this->end_controls_section();

        $this->start_controls_section(
			'Yearly',
			[
				'label' => __( 'Yearly Tab Controls', 'stike-core' ),
                'tab' => Controls_Manager::TAB_CONTENT,
                'condition' => [
                    'hide_tab' => 'yes',
                ]
			]
        );
            $this->add_control(
                'yearly_title',
                [
                    'label' => __( 'Yearly Tab Title', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Yearly', 'stike-core'),
                ]
            );

            $yearly_items = new Repeater();

            $yearly_items->add_control(
                'title',
                [
                    'label' => __( 'Title', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('Free', 'stike-core'),
                ]
            );

            $yearly_items->add_control(
                'price_prefix',
                [
                    'label' => __( 'Price Prefix', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('$', 'stike-core'),
                ]
            );

            $yearly_items->add_control(
                'price_suffix',
                [
                    'label' => __( 'Number Suffix', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('/h', 'stike-core'),
                ]
            );

            $yearly_items->add_control(
                'price',
                [
                    'label' => __( 'Price', 'stike-core' ),
                    'type' => Controls_Manager::TEXT,
                    'default' => __('0', 'stike-core'),
                ]
            );

            $yearly_items->add_control(
                'features',
                [
                    'label' => __( 'Features', 'stike-core' ),
                    'type' => Controls_Manager::TEXTAREA,
                ]
            );

            $yearly_items->add_control(
				'button_text',
				[
					'label'=>__('Button Text', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'default' => __('Try It Free Now', 'stike-toolkit'),
				]
			);

			$yearly_items->add_control(
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

			$yearly_items->add_control(
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

			$yearly_items->add_control(
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
			$yearly_items->add_control(
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

            $yearly_items->add_control(
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
                'yearly',
                [
                    'label' => __( 'Add Item', 'upkeep-toolkit' ),
                    'type' => Controls_Manager::REPEATER,
                    'fields' => $yearly_items->get_controls(),
                    'title_field' => '{{{ title }}}',
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
						'{{WRAPPER}} .pricing-area.bg-f4f5fe' => 'background-color: {{VALUE}}',
					],
				]
            );

			$this->add_control(
				'title_color',
				[
					'label' => __( 'Title Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .pricing-area .section-title h2' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .pricing-area .section-title h2' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'main_color',
				[
					'label' => __( 'Main Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .pricing-list-tab .tabs li a i, .col-lg-4:nth-child(1) .single-pricing-table .btn-box .default-btn i, .col-lg-4:nth-child(3) .single-pricing-table .btn-box .default-btn i' => 'color: {{VALUE}}',
						'{{WRAPPER}} .col-lg-4:nth-child(3) .single-pricing-table .btn-box .default-btn span' => 'background-color: {{VALUE}}',
					],
				]
            );

            $this->add_control(
				'secondary_color',
				[
					'label' => __( 'Secondary Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .single-pricing-table .pricing-features li i' => 'color: {{VALUE}}',
						'{{WRAPPER}} .col-lg-4:nth-child(3) .single-pricing-table .btn-box .default-btn, .default-btn span ' => 'background-color: {{VALUE}}',
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
						'{{WRAPPER}} .single-pricing-table .pricing-features li' => 'font-size: {{SIZE}}px;',
					],
				]
			);

        $this->end_controls_section();

    }

	protected function render() {

        $settings = $this->get_settings_for_display();
        $monthly_item_count = 1;
        $yearly_item_count = 1;
        ?>

        <div class="pricing-area pt-100 pb-70 bg-f4f5fe">
            <div class="container">
                <div class="section-title">
                    <h2><?php echo esc_html( $settings['section_title'] );?></h2>
                </div>

                <div class="tab pricing-list-tab">
                    <ul class="tabs">
                        <?php if( $settings['monthly_title'] != '' ): ?>
                            <li><a href="#">
                                <i class="bx bxs-calendar-check"></i> <?php echo esc_html( $settings['monthly_title'] ); ?>
                            </a></li>
                        <?php endif; ?>

                        <?php if( $settings['yearly_title'] != '' ): ?>
                            <li><a href="#">
                                <i class="bx bxs-calendar-check"></i> <?php echo esc_html( $settings['yearly_title'] ); ?>
                            </a></li>
                        <?php endif; ?>
                    </ul>

                    <div class="tab_content">
                        <div class="tabs_item">
                            <div class="row">

                            <?php $i = 1;
                            foreach( $settings['monthly_list_items'] as $item ):
                                $total_count = $i;
                            $i++; endforeach; ?>

                                <?php foreach( $settings['monthly_list_items'] as $item ):

                                    $btn1_text  = $item['button_text'];
                                    //  Button Link
                                    $link_source = '';
                                    if( $item['link_type'] == 1 ){
                                        $link_source = get_page_link($item['link_to_page']);
                                    } else {
                                        $link_source = $item['external_link'];
                                    }
                                    ?>
                                    <?php
                                        if( $monthly_item_count == 3 ):
                                            $monthly_item_class = 'col-lg-4 col-md-6 offset-lg-0 offset-md-3';
                                        else:
                                            $monthly_item_class = 'col-lg-4 col-md-6';
                                        endif;

                                        if( $total_count == 1 ):
                                            $monthly_item_class = 'col-lg-4 col-md-6 offset-lg-4 offset-md-4';
                                        endif;
                                    ?>
                                    <div class="<?php echo esc_attr( $monthly_item_class ); ?>">
                                        <div class="single-pricing-table">
                                            <div class="pricing-header">
                                                <h3><?php echo esc_attr( $item['title'] ); ?></h3>
                                            </div>

                                            <div class="price">
                                                <?php echo esc_attr( $item['price_prefix'] ); ?><?php echo esc_attr( $item['price'] ); ?><sub><?php echo esc_attr( $item['price_suffix'] ); ?></sub>
                                            </div>

                                            <ul class="pricing-features">
                                                <?php echo wp_kses_post( $item['features'] ); ?>
                                            </ul>
                                            <div class="btn-box">
                                                <?php if($btn1_text != '') { ?>
                                                    <?php if ( 'yes' === $item['target_page'] ) { ?>
                                                        <a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn">
                                                            <i class="<?php echo esc_attr( $item['button_icon'] ); ?>"></i>
                                                            <?php echo esc_html($btn1_text); ?>
                                                            <span></span>
                                                        </a> <?php
                                                    } else { ?>
                                                        <a href="<?php echo esc_url($link_source); ?>" class="default-btn">
                                                            <i class="<?php echo esc_attr( $item['button_icon'] ); ?>"></i>
                                                            <?php echo esc_html($btn1_text); ?>
                                                            <span></span>
                                                        </a><?php
                                                    } ?>
                                                <?php
                                                } ?>
                                            </div>
                                        </div>
                                    </div>
                                <?php $monthly_item_count ++; endforeach; ?>
                            </div>
                        </div>

                        <div class="tabs_item">
                            <div class="row">
                                <?php $i = 1;
                                foreach( $settings['yearly'] as $item ):
                                    $total_count = $i;
                                $i++; endforeach; ?>

                                <?php foreach( $settings['yearly'] as $item ):
                                    $btn1_text  = $item['button_text'];
                                    //  Button Link
                                    $link_source = '';
                                    if( $item['link_type'] == 1 ){
                                        $link_source = get_page_link($item['link_to_page']);
                                    } else {
                                        $link_source = $item['external_link'];
                                    }

                                    ?>
                                    <?php
                                        if( $yearly_item_count == 3 ):
                                            $yearly_item_class = 'col-lg-4 col-md-6 offset-lg-0 offset-md-3';
                                        else:
                                            $yearly_item_class = 'col-lg-4 col-md-6';
                                        endif;

                                        if( $total_count == 1 ):
                                            $yearly_item_class = 'col-lg-4 col-md-6 offset-lg-4 offset-md-4';
                                        endif;
                                    ?>
                                    <div class="<?php echo esc_attr( $yearly_item_class ); ?>">
                                        <div class="single-pricing-table">
                                            <div class="pricing-header">
                                                <h3><?php echo esc_attr( $item['title'] ); ?></h3>
                                            </div>

                                            <div class="price">
                                                <?php echo esc_attr( $item['price_prefix'] ); ?><?php echo esc_attr( $item['price'] ); ?><sub><?php echo esc_attr( $item['price_suffix'] ); ?></sub>
                                            </div>

                                            <ul class="pricing-features">
                                                <?php echo wp_kses_post( $item['features'] ); ?>
                                            </ul>
                                            <div class="btn-box">
                                                <?php if($btn1_text != '') { ?>
                                                    <?php if ( 'yes' === $item['target_page'] ) { ?>
                                                        <a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn">
                                                            <i class="<?php echo esc_attr( $item['button_icon'] ); ?>"></i>
                                                            <?php echo esc_html($btn1_text); ?>
                                                            <span></span>
                                                        </a> <?php
                                                    } else { ?>
                                                        <a href="<?php echo esc_url($link_source); ?>" class="default-btn">
                                                            <i class="<?php echo esc_attr( $item['button_icon'] ); ?>"></i>
                                                            <?php echo esc_html($btn1_text); ?>
                                                            <span></span>
                                                        </a><?php
                                                    } ?>
                                                <?php
                                                } ?>
                                            </div>

                                        </div>
                                    </div>
                                <?php $yearly_item_count++; endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
    }


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Pricing );