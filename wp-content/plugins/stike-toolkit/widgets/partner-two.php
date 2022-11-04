<?php
/**
 * Partner Logo Two Widget
 */

namespace Elementor;
class Stike_Partner_Logo_Two extends Widget_Base {

	public function get_name() {
        return 'Partner_Logo_Two';
    }

	public function get_title() {
        return __( 'Partner Logo Two', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-logo';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'partner_section',
			[
				'label' => __( 'Partner Logo Control', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
			'images',
			[
				'label' => __( 'Partner Images', 'stike-toolkit' ),
				'type' => Controls_Manager::GALLERY,
			]
		);

        $this->end_controls_section();

        $this->start_controls_section(
			'partner_style',
			[
				'label' => __( 'Style', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_STYLE,
			]
        );

            $this->add_control(
                'background_color',
                [
                    'label' => __( 'Background Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .partner-area-two.ptb-70.bg-f9f9f9' => 'background-color: {{VALUE}}',
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

        $is_animation      = !empty($stike_opt['enable_animation_css']) ? $stike_opt['enable_animation_css'] : '';

        if( $is_animation == true ):
            $wow_class = 'wow fadeInUp';
        else:
            $wow_class = '';
        endif;
        ?>
            <div class="partner-area-two ptb-70 bg-f9f9f9">
                <div class="container">
                    <div class="row align-items-center">
                        <?php foreach ( $settings['images'] as $image ) { ?>
                            <div class="col-lg-2 col-6 col-sm-3 col-md-4 <?php echo esc_attr($wow_class); ?>" data-wow-delay=".2s">
                                <div class="single-partner-box">
                                    <img src="<?php echo esc_url( $image['url'] ); ?>" alt="<?php echo esc_attr__( 'Partner Image', 'ecademy-toolkit' ); ?>">
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        <?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Partner_Logo_Two );