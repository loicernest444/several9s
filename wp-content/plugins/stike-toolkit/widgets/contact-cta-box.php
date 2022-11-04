<?php
/**
 * Contact CTA Widget
 */

namespace Elementor;
class Stike_Contact_CTA extends Widget_Base {

	public function get_name() {
        return 'Stike_Contact_CTA';
    }

	public function get_title() {
        return __( 'Contact CTA', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-call-to-action';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Contact_CTA_Area',
			[
				'label' => __( 'Contact CTA Controls', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

			$this->add_control(
				'title',
				[
					'label' => __( 'Title', 'stike-toolkit' ),
					'type' => Controls_Manager::TEXT,
					'default' => __('Have any question about us?', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'short_title',
				[
					'label' => __( 'Short Title', 'stike-toolkit' ),
					'type' => Controls_Manager::WYSIWYG,
					'default' => __('Dont hesitate to contact us.', 'stike-toolkit'),
				]
			);

			$this->add_control(
				'button_icon',
				[
					'label' 		=> esc_html__( 'Button Icon', 'stike-toolkit' ),
                    'type' 			=> Controls_Manager::ICON,
                    'label_block' 	=> true,
                    'options' 		=> stike_icons(),
					'default' 		=> 'bx bxs-edit-alt',
				]
            );

			$this->add_control(
				'button_text',
				[
					'label'=>__('Button Text', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'default' => __('Contact Us', 'stike-toolkit'),
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
			'contact_cta__style',
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
						'{{WRAPPER}} .contact-cta-box h3' => 'color: {{VALUE}}',
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
						'{{WRAPPER}} .contact-cta-box h3' => 'font-size: {{SIZE}}px;',
					],
				]
			);

			$this->add_control(
				'short_title_color',
				[
					'label' => __( 'Short Title Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .contact-cta-box p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_responsive_control(
				'short_title_size',
				[
					'label' => __( 'Short Title Font Size', 'stike-toolkit' ),
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
						'{{WRAPPER}} .contact-cta-box p' => 'font-size: {{SIZE}}px;',
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
						'{{WRAPPER}} .contact-cta-box .default-btn' => 'font-size: {{SIZE}}px;',
					],
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
                        '{{WRAPPER}} .contact-cta-box' => 'margin-top: {{SIZE}}px;',
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

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
		$this-> add_inline_editing_attributes('short_title','none');

        ?>
        <div class="contact-cta-box mwidth-1000">
            <h3 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h3>
            <p <?php echo $this-> get_render_attribute_string('short_title'); ?>><?php echo wp_kses_post( $settings['short_title'] ); ?></p>
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
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Contact_CTA );