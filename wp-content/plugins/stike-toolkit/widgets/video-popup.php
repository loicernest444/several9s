<?php
/**
 * Video Popup Widget
 */

namespace Elementor;
class Stike_Video_popup extends Widget_Base {

	public function get_name() {
        return 'Video_Popup';
    }

	public function get_title() {
        return __( 'Video Popup', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-youtube';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'video_section',
			[
				'label' => __( 'Video Control', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

            $this->add_control(
                'images',
                [
                    'label' => __( 'Background Images', 'stike-toolkit' ),
                    'type' => Controls_Manager::MEDIA,
                ]
            );

            $this->add_control(
                'video_link',
                [
                    'label' => __( 'YouTube Video Link', 'stike-toolkit' ),
                    'type' => Controls_Manager::TEXT,
                ]
            );

        $this->end_controls_section();
    }

	protected function render() {
        $settings = $this->get_settings_for_display();
        ?>
            <div class="company-preview-area" style="background-image:url(<?php echo esc_url( $settings['images']['url'] ); ?>);">
                <div class="container">
                    <div class="company-preview-video">
                        <a href="<?php echo esc_url( $settings['video_link'] ); ?>" class="video-btn popup-youtube"><i class="bx bx-play"></i></a>
                    </div>
                </div>
            </div>
        <?php
	}

}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Video_popup );