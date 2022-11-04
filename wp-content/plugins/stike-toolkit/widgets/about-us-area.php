<?php
/**
 * Stike About Area Widget
 */

namespace Elementor;
class Stike_About_Area extends Widget_Base {

	public function get_name() {
        return 'Stike_About_Area';
    }

	public function get_title() {
        return __( 'About Area Two', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-editor-list-ul';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_About_Area',
			[
				'label' => __( 'About Area', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'about_text_alignment',
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
			'image',
			[
				'label' => __( 'Choose Image', 'stike-toolkit' ),
				'type' => Controls_Manager::MEDIA,
			]
        );

        $this->add_control(
            'top_title',
            [
                'label' => __( 'Top Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('About Us', 'stike-toolkit'),
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We Are A Strategic Digital Marketing Agency', 'stike-toolkit'),
            ]
        );

        $this->add_control(
            'desc_title',
            [
                'label' => esc_html__('Description Title', 'stike-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('We Can Build Strategy That Would Make a Big Difference', 'stike-toolkit'),
            ]
        );

        $this->add_control(
            'desc',
            [
                'label' => esc_html__('Description', 'stike-toolkit'),
                'type' => Controls_Manager::WYSIWYG,
                'default' =>
                    "
                    <ul class='features-list'>
                        <li><i class='bx bx-check'></i> Complete Marketing Solutions</li>
                        <li><i class='bx bx-check'></i> Flexible Working Hours</li>
                        <li><i class='bx bx-check'></i> Experienced Team Members</li>
                        <li><i class='bx bx-check'></i> Outstanding Digital Experience</li>
                    </ul>
                    ",
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'about_style',
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
					'{{WRAPPER}} .section-title.text-left .sub-title' => 'color: {{VALUE}}',
				],
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
						'min' => 1,
						'max' => 50,
						'step' => 1,
					],
				],
				'devices' => [ 'desktop', 'tablet', 'mobile' ],
				'selectors' => [
					'{{WRAPPER}} .section-title.text-left .sub-title' => 'font-size: {{SIZE}}px;',
				],
			]
        );

        $this->add_control(
			'title_color',
			[
				'label' => __( 'Title Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .section-title h2' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'title_typography',
                'label' => __( 'Title Typography', 'stike-toolkit' ),

                'selector' => '{{WRAPPER}} .section-title h2',
            ]
        );

        $this->add_control(
			'desc_bg_color',
			[
				'label' => __( 'Description Background Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-inner-content' => 'background-color: {{VALUE}}',
				],
			]
        );

        $this->add_control(
			'desc_title_color',
			[
				'label' => __( 'Description Title Color', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .about-inner-content .content h2' => 'color: {{VALUE}}',
				],
			]
        );

        $this->add_group_control(
            Group_Control_Typography::get_type(),
            [
                'name' => 'desc_title_typography',
                'label' => __( 'Description Title Typography', 'stike-toolkit' ),

					'{{WRAPPER}} .about-inner-content .content h2' => 'color: {{VALUE}}',
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
		if( $settings['about_text_alignment' ] == '1') {
			$alignment = 'text-center';
		}
		elseif( $settings['about_text_alignment' ] == '2') {
			$alignment = 'text-right';
		} else {
			$alignment = 'text-left';
		}

        // Inline Editing
        $this-> add_inline_editing_attributes('top_title','none');
        $this-> add_inline_editing_attributes('title','none');
        $this-> add_inline_editing_attributes('desc_title','none');
        ?>

            <div class="about-area">
                <div class="container">
                    <div class="section-title <?php echo esc_attr( $alignment); ?>">
                        <span class="sub-title"><?php echo esc_html( $settings['top_title'] ); ?></span>
                        <h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>
                    </div>
                </div>

                <div class="container-fluid">
                    <div class="about-inner-area">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <?php if( $settings['image']['url'] != '' ): ?>
                                    <div class="about-inner-image" style="background-image:url(<?php echo esc_url( $settings['image']['url'] ); ?>);">
                                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="col-lg-6 col-md-12">
                                <div class="about-inner-content">
                                    <div class="content">
                                        <h2 <?php echo $this-> get_render_attribute_string('desc_title'); ?>><?php echo esc_html( $settings['desc_title'] ); ?></h2>
                                        <?php echo wp_kses_post( $settings['desc'] ); ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php
	}
}
Plugin::instance()->widgets_manager->register_widget_type( new Stike_About_Area );