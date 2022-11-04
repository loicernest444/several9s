<?php
/**
 * FAQ Widget
 */

namespace Elementor;
class Stike_Faq extends Widget_Base {

	public function get_name() {
        return 'FAQ';
    }

	public function get_title() {
        return __( 'Stike FAQ', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-help-o';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Faq',
			[
				'label' => __( 'Faq Control', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'title',
            [
                'label' => __( 'Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'Get to know about Stike', 'stike-toolkit' ),
            ]
        );

        $this->add_control(
            'image',
            [
                'label' => __( 'Faq Image', 'stike-toolkit' ),
                'type' => Controls_Manager::MEDIA,
            ]
        );

        $repeater_items = new Repeater();

        $repeater_items->add_control(
            'title',
            [
                'label' => __( 'Title', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'default' => __( 'How do permissions work in Google Play Instant?', 'stike-toolkit' ),
            ]
        );
        $repeater_items->add_control(
            'content',
            [
                'label' => __( 'Description', 'stike-toolkit' ),
                'type' => Controls_Manager::WYSIWYG,
                'default' => __( 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book.', 'stike-toolkit' ),
            ]
        );
        $this->add_control(
            'faq_item',
            [
                'label' => esc_html__('Faq Item', 'stike-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater_items->get_controls(),
                'separator' => 'before',
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
                    '{{WRAPPER}} .faq-accordion h2' => 'font-size: {{SIZE}}px;',
                ],
            ]
        );

        $this->add_control(
			'color',
			[
				'label' => __( 'Faq Background', 'stike-toolkit' ),
				'type' => Controls_Manager::COLOR,
				'selectors' => [
					'{{WRAPPER}} .faq-accordion .accordion .accordion-title, .faq-accordion .accordion .accordion-content' => 'background-color: {{VALUE}}',
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

        $faq_item = $settings['faq_item'];
        $i = 0;
        ?>
        <div class="faq-area ptb-100">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-lg-7 col-md-12">
                        <div class="faq-accordion">
                            <h2><?php echo $settings['title']; ?></h2>
                            <div class="panel-group accordion" id="accordion" role="tablist" aria-multiselectable="true">
                            <?php foreach ( $faq_item as $key => $value ): ?>
                                <div class="panel panel-default accordion-item">
                                    <div class="panel-heading" role="tab" id="heading<?php echo $i; ?>">
                                        <h3 class="panel-title accordion-title">
                                        <a class="collapsed" role="button" title="" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $i; ?>" aria-expanded="true" aria-controls="collapse0">
                                            <?php echo esc_html( $value['title'] ); ?>
                                        </a>
                                        </h3>
                                    </div>
                                    <div id="collapse<?php echo $i; ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $i; ?>">
                                        <div class="panel-body accordion-content">
                                            <?php echo wp_kses_post( $value['content'] ); ?>
                                        </div>
                                    </div>
                                </div>
                            <?php $i++; endforeach; ?>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-5 col-md-12">
                        <div class="faq-image">
                            <?php if( $settings['image']['url'] != '' ): ?>
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $settings['image']['url'] ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>">
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Faq );