<?php
/**
 * Feedback Widget
 */

namespace Elementor;
class Stike_Feedback extends Widget_Base {

	public function get_name() {
        return 'Feedback';
    }

	public function get_title() {
        return __( 'Feedback', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-testimonial';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'style',
            [
                'label' => __( 'Style', 'tryo-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1'         => __( 'Style One', 'tryo-toolkit' ),
                    '2'         => __( 'Style Two', 'tryo-toolkit' ),
                    '3'         => __( 'Style Three', 'tryo-toolkit' ),
                ],
                'default' => '1',
            ]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
            ]
        );

        $repeater_items = new Repeater();

        $repeater_items->add_control(
            'image',
            [
                'label' => __( 'Image', 'stike-toolkit' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );
        $repeater_items->add_control(
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
        $repeater_items->add_control(
            'name',
            [
                'label' => esc_html__('Name', 'stike-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Olivar Lucy', 'stike-toolkit'),
                'label_block' => true,
            ]
        );
        $repeater_items->add_control(
            'designation',
            [
                'label' => esc_html__('Designation', 'stike-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('CEO at ThemeForest', 'stike-toolkit'),
                'label_block' => true,
            ]
        );
        $repeater_items->add_control(
            'feedback',
            [
                'label' => esc_html__('Feedback Content', 'stike-toolkit'),
                'type' => Controls_Manager::WYSIWYG,
                'default' => esc_html__('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse.', 'stike-toolkit'),
                'label_block' => true,
            ]
        );
        $repeater_items->add_control(
            'rating',
            [
                'label' => __( 'Rating', 'stike-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1'        => __('1 Star', 'stike-toolkit' ),
                    '2'        => __('2 Star', 'stike-toolkit' ),
                    '3'        => __('3 Star', 'stike-toolkit' ),
                    '4'        => __('4 Star', 'stike-toolkit' ),
                    '5'        => __('5 Star', 'stike-toolkit' ),
                ],
            ]
        );
        $this->add_control(
            'stike_feedback_items',
            [

                'label' => esc_html__('Faq Item', 'stike-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater_items->get_controls(),
                'default' => [
                    [ 'name' => esc_html__(' Item #1', 'stike-toolkit') ],

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

        $slider = $settings['stike_feedback_items'];

        $count = 0;
        foreach ( $slider as $value ) {
            $count++;
        }
        $this-> add_inline_editing_attributes('title','none');

        ?>
        <?php if( $settings['style'] == '1' ): ?>
            <div class="feedback-area pt-100 pb-70">
                <div class="container">
                    <div class="section-title">
                        <h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo $settings['title'] ?></h2>
                    </div>

                    <?php if( $count == 1 ) { ?>
                    <div class="col-lg-8 col-md-12 offset-lg-2">
                    <?php }else { ?>
                    <div class="feedback-slides owl-carousel owl-theme"> <?php
                    } ?>
                        <?php foreach ($slider as $key => $value):
                        // Text Alignment
                            if( $value['about_text_alignment' ] == '1') {
                                $alignment = 'text-center';
                            }
                            elseif($value['about_text_alignment' ] == '2') {
                                $alignment = 'text-right';
                            } else {
                                $alignment = 'text-left';
                            }

                        ?>
                            <div class="single-feedback-item <?php echo esc_attr( $alignment); ?>">
                                <?php if( $value['image']['url'] != '' ): ?>
                                    <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ) ?>">
                                <?php endif; ?>

                                <div class="feedback-desc">
                                    <p><?php echo wp_kses_post( $value['feedback'] ); ?></p>

                                    <div class="rating">
                                        <?php if( $value['rating'] == '1' ): ?>
                                            <i class="bx bxs-star"></i>
                                        <?php elseif( $value['rating'] == '2' ): ?>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        <?php elseif( $value['rating'] == '3' ): ?>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        <?php elseif( $value['rating'] == '4' ): ?>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        <?php elseif( $value['rating'] == '5' ): ?>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        <?php endif; ?>
                                    </div>

                                    <div class="client-info">
                                        <h3><?php echo esc_html( $value['name'] ); ?></h3>
                                        <span><?php echo esc_html( $value['designation'] ); ?></span>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php elseif( $settings['style'] == '2' ): ?>
            <div class="testimonials-area pt-100 pb-70">
                <div class="container">
                    <div class="section-title">
                        <h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo $settings['title'] ?></h2>
                    </div>

                    <div class="row">
                        <?php
                        $i = 1;
                        $countSlider = count($slider);
                        foreach ($slider as $key => $value):
                            $class = '';
                            if( $i == 3 && $countSlider <= 3 ):
                                $class = 'col-lg-6 col-md-6 col-sm-6 offset-lg-3 offset-md-3 offset-sm-3';
                            else:
                                $class = 'col-lg-6 col-md-6 col-sm-6';
                            endif;
                        ?>
                            <div class="<?php echo esc_attr($class); ?>">
                                <div class="single-testimonials-item">
                                    <div class="client-info">
                                        <?php if( $value['image']['url'] != '' ): ?>
                                            <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ) ?>">
                                        <?php endif; ?>

                                        <h3><?php echo esc_html( $value['name'] ); ?></h3>
                                        <span><?php echo esc_html( $value['designation'] ); ?></span>
                                    </div>

                                    <div class="testimonials-desc">
                                        <p><?php echo wp_kses_post( $value['feedback'] ); ?></p>

                                        <div class="rating">
                                            <?php if( $value['rating'] == '1' ): ?>
                                                <i class="bx bxs-star"></i>
                                            <?php elseif( $value['rating'] == '2' ): ?>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                            <?php elseif( $value['rating'] == '3' ): ?>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                            <?php elseif( $value['rating'] == '4' ): ?>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                            <?php elseif( $value['rating'] == '5' ): ?>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                                <i class="bx bxs-star"></i>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php $i++; endforeach; ?>

                    </div>
                </div>
            </div>
        <?php elseif( $settings['style'] == '3' ): ?>
            <div class="testimonials-area pt-100 pb-70">
                <div class="container">
                    <div class="section-title">
                        <h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo $settings['title'] ?></h2>
                    </div>

                    <div class="testimonials-slides owl-carousel owl-theme">
                        <?php foreach ($slider as $key => $value): ?>
                            <div class="single-testimonials-item">
                                <div class="client-info">
                                    <?php if( $value['image']['url'] != '' ): ?>
                                        <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $value['image']['url'] ); ?>" alt="<?php echo esc_attr( $value['name'] ) ?>">
                                    <?php endif; ?>
                                    <h3><?php echo esc_html( $value['name'] ); ?></h3>
                                    <span><?php echo esc_html( $value['designation'] ); ?></span>
                                </div>

                                <div class="testimonials-desc">
                                    <p><?php echo wp_kses_post( $value['feedback'] ); ?></p>

                                    <div class="rating">
                                        <?php if( $value['rating'] == '1' ): ?>
                                            <i class="bx bxs-star"></i>
                                        <?php elseif( $value['rating'] == '2' ): ?>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        <?php elseif( $value['rating'] == '3' ): ?>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        <?php elseif( $value['rating'] == '4' ): ?>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        <?php elseif( $value['rating'] == '5' ): ?>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                            <i class="bx bxs-star"></i>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Feedback );