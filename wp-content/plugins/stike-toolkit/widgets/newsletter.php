<?php
/**
 * Newsletter Widget
 */

namespace Elementor;
class Stike_Newsletter extends Widget_Base {

	public function get_name() {
        return 'Stike_Newsletter';
    }

	public function get_title() {
        return __( 'Newsletter', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-email-field';
    }

	public function get_categories() {
        return [ 'stike-elements' ];
    }

	protected function register_controls() {

        $this->start_controls_section(
			'Stike_Newsletter',
			[
				'label' => __( 'Stike Newsletter', 'stike-toolkit' ),
				'tab' => Controls_Manager::TAB_CONTENT,
			]
        );

        $this->add_control(
            'content_style',
            [
                'label' => __( 'Style', 'tryo-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    '1'         => __( 'Style One', 'tryo-toolkit' ),
                    '2'         => __( 'Style Two', 'tryo-toolkit' ),
                ],
                'default' => '1',
            ]
        );

        $this->add_control(
			'title', [
				'label' => __( 'Title', 'stike-toolkit' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'We always try to be as close to you as possible' , 'stike-toolkit' ),
				'label_block' => true,
			]
        );

        $this->add_control(
			'placeholder_text', [
				'label' => __( 'Placeholder Text', 'stike-toolkit' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'hello@stike.com' , 'stike-toolkit' ),
				'label_block' => true,
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
			'button_text', [
				'label' => __( 'Button text', 'stike-toolkit' ),
				'type' => Controls_Manager::TEXT,
				'default' => __( 'Subscribe Now' , 'stike-toolkit' ),
				'label_block' => true,
			]
        );

        $this->add_control(
            'select_mod',
            [
                'label' => esc_html__( 'Newsletter Option', 'stike-toolkit' ),
                'type' => Controls_Manager::SELECT,
                'options' => [
                    'mailchimp'             => esc_html__( 'Mailchimp', 'stike-toolkit' ),
                    'newsletter'            => esc_html__( 'Newsletter Plugin', 'stike-toolkit' ),
                ],
                'default' => 'mailchimp',
            ]
        );

        $this->add_control(
            'action_url', [
                'label' => esc_html__( 'Action URL', 'stike-toolkit' ),
                'description' => __( 'Enter here your MailChimp action URL. <a href="https://www.docs.envytheme.com/docs/stike-theme-documentation/tips-guides-troubleshoots/get-mailchimp-newsletter-form-action-url/" target="_blank"> How to </a>', 'stike-toolkit' ),
                'type' => Controls_Manager::TEXT,
                'label_block' => true,
                'condition' => [
                    'select_mod' => 'mailchimp',
                ]
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
			'newsletter_style',
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
                        '{{WRAPPER}} .subscribe-content' => 'background-color: {{VALUE}}',
                    ],
                ]
            );
            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'stike-toolkit' ),
                    'type' => Controls_Manager::COLOR,
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-content h2' => 'color: {{VALUE}}',
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
                            'min' => 1,
                            'max' => 80,
                            'step' => 1,
                        ],
                    ],
                    'devices' => [ 'desktop', 'tablet', 'mobile' ],
                    'selectors' => [
                        '{{WRAPPER}} .subscribe-content h2' => 'font-size: {{SIZE}}px;',
                    ],
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
        // Inline Editing
        $this-> add_inline_editing_attributes('title','none');

        ?>
        <?php if( $settings['content_style'] == '2' ): ?>
            <div class="subscribe-content border-radius-0">
                <h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>

                <form class="newsletter-form mailchimp" method="post">
                    <div class="row align-items-center">
                        <div class="col-lg-8 col-md-8">
                            <input type="email" name="EMAIL" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" required autocomplete="off">
                        </div>

                        <div class="col-lg-4 col-md-4">
                            <?php if( $settings['button_text'] != '' ): ?>
                                <button type="submit"><i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i> <?php echo esc_html( $settings['button_text'] ); ?></button>
                            <?php endif; ?>
                        </div>
                    </div>

                    <p class="mchimp-errmessage" style="display: none;"></p>
                    <p class="mchimp-sucmessage" style="display: none;"></p>
                </form>

                <?php if( $settings['show_shape'] == 'yes' ): ?>
                    <div class="shape14"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/13.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                    <div class="shape15"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/14.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                    <div class="shape16"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/15.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                    <div class="shape17"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/16.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                    <div class="shape18"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/17.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                <?php endif; ?>
            </div>
        <?php else: ?>
            <div class="subscribe-area bg-f4f5fe">
                <div class="container">
                    <div class="subscribe-content">
                        <h2 <?php echo $this-> get_render_attribute_string('title'); ?>><?php echo esc_html( $settings['title'] ); ?></h2>

                        <form class="newsletter-form mailchimp" method="post">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-md-8">
                                    <input type="email" name="EMAIL" class="input-newsletter" placeholder="<?php echo esc_attr( $settings['placeholder_text'] ); ?>" required autocomplete="off">
                                </div>

                                <div class="col-lg-4 col-md-4">
                                    <?php if( $settings['button_text'] != '' ): ?>
                                        <button type="submit"><i class="<?php echo esc_attr( $settings['button_icon'] ); ?>"></i> <?php echo esc_html( $settings['button_text'] ); ?></button>
                                    <?php endif; ?>
                                </div>
                            </div>

                            <p class="mchimp-errmessage" style="display: none;"></p>
                            <p class="mchimp-sucmessage" style="display: none;"></p>
                        </form>

                        <?php if( $settings['show_shape'] == 'yes' ): ?>
                            <div class="shape14"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/13.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                            <div class="shape15"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/14.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                            <div class="shape16"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/15.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                            <div class="shape17"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/16.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                            <div class="shape18"><img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( STIKE_IMG .'/shape/17.png', 'stike-toolkit' ); ?>" alt="<?php echo esc_attr( $settings['title'] ); ?>"></div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        <?php endif; ?>

        <script>
            ;(function($){
                "use strict";
                $(document).ready(function () {
                    // MAILCHIMP
                    if ($(".mailchimp").length > 0) {
                        $(".mailchimp").ajaxChimp({
                            callback: mailchimpCallback,
                            url: "<?php echo esc_js($settings['action_url']) ?>" //Replace this with your own mailchimp post URL. Don't remove the "". Just paste the url inside "".
                        });
                    }
                    $(".memail").on("focus", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("keydown", function () {
                        $(".mchimp-errmessage").fadeOut();
                        $(".mchimp-sucmessage").fadeOut();
                    });
                    $(".memail").on("click", function () {
                        $(".memail").val("");
                    });

                    function mailchimpCallback(resp) {
                        if (resp.result === "success") {
                            $(".mchimp-sucmessage").html(resp.msg).fadeIn(1000);
                            $(".mchimp-sucmessage").fadeOut(500);
                        } else if (resp.result === "error") {
                            $(".mchimp-errmessage").html(resp.msg).fadeIn(1000);
                        }
                    }
                });
            })(jQuery)
        </script>

        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Newsletter );