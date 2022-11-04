<?php
/**
 * Digital Marketing Banner Widget
 */

namespace Elementor;
class Stike_Digital_Marketing extends Widget_Base {

	public function get_name() {
        return 'Stike_Digital_Marketing';
    }

	public function get_title() {
        return __( 'Digital Marketing Banner ', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-banner';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Digital_Marketing_Area',
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
					'default' => __('World Leading <span>Digital Marketing</span> Agency', 'stike-toolkit'),
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
					'default' 		=> 'bx bxs-hot',
				]
            );

			$this->add_control(
				'button_text',
				[
					'label'=>__('Button Text', 'stike-toolkit'),
					'type'=>Controls_Manager:: TEXT,
					'default' => __('Get Started Now', 'stike-toolkit'),
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
				'image',
				[
					'label' => __( 'Background Image', 'stike-toolkit' ),
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
						'{{WRAPPER}} .digital-agency-banner-content h1' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_control(
				'span_color',
				[
					'label' => __( 'Span Tag Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .digital-agency-banner-content h1 span' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Title Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .digital-agency-banner-content h1',
                ]
            );


			$this->add_control(
				'content_color',
				[
					'label' => __( 'Content Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .digital-agency-banner-content p' => 'color: {{VALUE}}',
					],
				]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Content Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .digital-agency-banner-content p',
                ]
			);

			$this->add_group_control(
                Group_Control_Typography::get_type(),
                [
                    'name' => 'btn_typography',
                    'label' => __( 'Button Typography', 'stike-toolkit' ),

                    'selector' => '{{WRAPPER}} .default-btn',
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

        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');
		$this-> add_inline_editing_attributes('content','none');

		$btn1_text  = $settings['button_text'];

        //  Button Link
        $link_source = '';
        if( $settings['link_type'] == 1 ){
            $link_source = get_page_link($settings['link_to_page']);
        } else {
            $link_source = $settings['external_link'];
        }

		// Text Alignment
		if( $settings['banner_text_alignment' ] == '1') {
			$alignment = 'text-center';
		}
		elseif( $settings['banner_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}
		?>

		<div class="digital-agency-banner" style="background-image:url(<?php echo esc_url( $settings['image']['url'] );  ?>);">
            <div class="container">
                <div class="digital-agency-banner-content <?php echo esc_attr( $alignment); ?>">
                    <h1 class="<?php echo esc_attr($wow_class); ?> fadeInUp"><?php echo wp_kses_post( $settings['title'] ); ?></h1>
                    <p class="<?php echo esc_attr($wow_class); ?> fadeInUp"><?php echo wp_kses_post( $settings['content'] ); ?></p>

					<?php if($btn1_text != '') { ?>
						<?php if ( 'yes' === $settings['target_page'] ) { ?>
							<a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn <?php echo esc_attr($wow_class); ?> fadeInUp">
								<?php if( $settings['show_button_icon'] == 'yes' ): ?>
									<i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i>
								<?php endif; ?>
								<?php echo esc_html($btn1_text); ?>
								<span></span>
							</a> <?php
						} else { ?>
							<a href="<?php echo esc_url($link_source); ?>" class="default-btn <?php echo esc_attr($wow_class); ?> fadeInUp">
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
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Digital_Marketing );