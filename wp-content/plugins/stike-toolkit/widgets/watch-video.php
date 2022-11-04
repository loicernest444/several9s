<?php
/**
 * Video Widget
 */

namespace Elementor;
class Stike_Watch_Video extends Widget_Base {

	public function get_name() {
        return 'Stike_Watch_Video';
    }

	public function get_title() {
        return __( 'Watch Video', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-play';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Watch_Video_Area',
			[
				'label' => __( 'Video Controls', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
		);


			$this->add_control(
				'video_link',
				[
					'label' => __( 'Video Link', 'stike-toolkit' ),
					'type' => Controls_Manager::URL,
				]
			);

			$this->add_control(
				'image',
				[
					'label' => __( 'Image', 'stike-toolkit' ),
					'type' => Controls_Manager::MEDIA,
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
				'button_bg_color',
				[
					'label' => __( 'Button Background Color', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-box .video-btn' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .video-box .video-btn::after, .video-box .video-btn::before' => 'border-color: {{VALUE}}',
					],
				]
            );
            $this->add_control(
				'button_bg_color_hover',
				[
					'label' => __( 'Button Background Color Hover', 'stike-toolkit' ),
					'type' => Controls_Manager::COLOR,
					'selectors' => [
						'{{WRAPPER}} .video-box .video-btn:hover, .video-box .video-btn:focus' => 'background-color: {{VALUE}}',
						'{{WRAPPER}} .video-box .video-btn::after, .video-box .video-btn::before' => 'border-color: {{VALUE}}',
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

        ?>
            <div class="video-box">
                <?php if( $settings['image']['url'] != '' ): ?>
                    <img class="<?php echo esc_attr($lazy_class); ?> main-image" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr__( 'Watch Video', 'stike-toolkit' ); ?>">
                <?php endif; ?>

                <a href="<?php echo esc_url( $settings['video_link']['url'] ); ?>" class="video-btn popup-youtube"><i class="bx bx-play"></i></a>

                <?php if( $settings['show_shape'] == 'yes' ): ?>
                    <div class="shape1"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/1.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr__( 'Watch Video', 'stike-toolkit' ); ?>"></div>
                    <div class="shape2"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/2.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr__( 'Watch Video', 'stike-toolkit' ); ?>"></div>
                    <div class="shape3"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/3.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr__( 'Watch Video', 'stike-toolkit' ); ?>"></div>
                    <div class="shape4"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/4.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr__( 'Watch Video', 'stike-toolkit' ); ?>"></div>
                    <div class="shape5"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/5.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr__( 'Watch Video', 'stike-toolkit' ); ?>"></div>
                    <div class="shape6"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/6.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr__( 'Watch Video', 'stike-toolkit' ); ?>"></div>
                <?php endif; ?>
            </div>

        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Watch_Video );