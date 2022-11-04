<?php
/**
 * Team Widget
 */

namespace Elementor;
class Stike_Team extends Widget_Base {

	public function get_name() {
        return 'Stike_Team';
    }

	public function get_title() {
        return __( 'Team', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'fa fa-users';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
	}
	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Team',
			[
				'label' => __( 'Stike Team', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);

        $this->add_control(
			'image',
			[
				'label' => __( 'Choose Team Member Image', 'stike-toolkit' ),
				'type' => Controls_Manager::MEDIA,
			]
        );

        $this->add_control(
            'name',
            [
                'label' => __( 'Name', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Sarah Taylor', 'stike-toolkit'),
            ]
        );

        $this->add_control(
            'designation',
            [
                'label' => __( 'Designation', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __('Co-Founder', 'stike-toolkit'),
            ]
        );

		$repeater_items = new Repeater();

        $repeater_items->add_control(
            'icon',
            [
				'label' => __( 'Social Icon', 'stike-toolkit' ),
				'type' => Controls_Manager::ICON,
				'default' => 'fa fa-facebook',
            ]
        );
        $repeater_items->add_control(
            'link',
            [
				'label' => __( 'Link', 'stike-toolkit' ),
				'type' => Controls_Manager::URL,
				'show_external' => true,
				'default' => [
					'url' => '#',
				],
            ]
        );
        $this->add_control(
            'social_link',
            [
                'label' => esc_html__('Add Social Link', 'stike-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'separator' => 'before',
                'fields' => $repeater_items->get_controls(),
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'team_style',
			[
				'label' => __( 'Style', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
		);

		$this->add_control(
			'border_color',
			[
				'label' => __( 'Border Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team-box .image' => 'border-color: {{VALUE}}',
				],
			]
		);

		$this->add_control(
			'border_color_hover',
			[
				'label' => __( 'Border Color Hover', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team-box:hover .image, .single-team-box .image .social li a:hover' => 'border-color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'name_color',
			[
				'label' => __( 'Name Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team-box .content h3' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'name_size',
			[
				'label' => __( 'Name Font Size', 'stike-toolkit' ),
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
					'{{WRAPPER}} .single-team-box .content h3' => 'font-size: {{SIZE}}px;',
				],
			]
		);

        $this->add_control(
			'designation_color',
			[
				'label' => __( 'Designation Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .single-team-box .content span' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_responsive_control(
			'designation_size',
			[
				'label' => __( 'Designation Font Size', 'stike-toolkit' ),
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
					'{{WRAPPER}} .single-team-box .content span' => 'font-size: {{SIZE}}px;',
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

        $social_array = $settings['social_link'];

        // Inline Editing
        $this-> add_inline_editing_attributes('name','none');
        $this-> add_inline_editing_attributes('designation','none');

        ?>
		<div class="single-team-box">
			<div class="image">
				<?php if( $settings['image']['url'] != '' ): ?>
					<img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['name'] ); ?>">
				<?php endif; ?>

				<ul class="social">
					<?php foreach( $social_array as $social_link ) {?>
						<li><a href="<?php echo esc_url( $social_link['link']['url'] ); ?>" target="_blank"><i class="<?php echo esc_attr( $social_link['icon'] ); ?>"></i></a></li>
					<?php } ?>
				</ul>

			</div>

			<div class="content">
				<h3 <?php echo $this-> get_render_attribute_string('name'); ?>><?php echo esc_html( $settings['name'] ); ?></h3>
                <span <?php echo $this-> get_render_attribute_string('designation'); ?>><?php echo esc_html( $settings['designation'] ); ?></span>
			</div>
		</div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Team );