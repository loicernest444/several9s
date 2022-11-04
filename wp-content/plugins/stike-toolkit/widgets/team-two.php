<?php
/**
 * Team Widget
 */
namespace Elementor;
class Stike_Team_Two extends Widget_Base{
    public function get_name(){
        return "Stike_Team_Two";
    }
    public function get_title(){
        return "Team Two";
    }
    public function get_icon(){
        return "eicon-gallery-group";
    }
    public function get_categories(){
        return ['gunter-elements'];
    }
    protected function register_controls(){

    $this->start_controls_section(
        'Stike_Team_Two',
        [
            'label' => __( 'Gunter Team', 'gunter-toolkit' ),
            'tab' => Controls_Manager::TAB_CONTENT,
        ]
    );

        $repeater = new Repeater();

        $repeater->add_control(
            'member_img',
            [
                'label' => esc_html__( 'Image', 'gunter-toolkit' ),
                'type' => Controls_Manager::MEDIA,
                'label_block' => true,
            ]
        );
        $repeater->add_control(
            'name',
            [
                'label' => esc_html__( 'Member Name', 'gunter-toolkit' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'designation',
            [
                'label' => esc_html__( 'Designation', 'gunter-toolkit' ),
                'type' => Controls_Manager::TEXT,
            ]
        );
        $repeater->add_control(
            'icon1',
            [
                'label' => esc_html__( 'Social Icon One', 'gunter-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );
        $repeater->add_control(
            'url1',
            [
                'label' => esc_html__( 'Social Link One', 'gunter-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'icon2',
            [
                'label' => esc_html__( 'Social Icon Two', 'gunter-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );
        $repeater->add_control(
            'url2',
            [
                'label' => esc_html__( 'Social Link Two', 'gunter-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'icon3',
            [
                'label' => esc_html__( 'Social Icon Three', 'gunter-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );
        $repeater->add_control(
            'url3',
            [
                'label' => esc_html__( 'Social Link Three', 'gunter-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $repeater->add_control(
            'icon4',
            [
                'label' => esc_html__( 'Social Icon Four', 'gunter-toolkit' ),
                'type' => Controls_Manager::ICON,
            ]
        );
        $repeater->add_control(
            'url4',
            [
                'label' => esc_html__( 'Social Link Four', 'gunter-toolkit' ),
                'type' => Controls_Manager::URL,
            ]
        );

        $this->add_control(
            'teams',
            [
                'label' => esc_html__( 'Add Member', 'gunter-toolkit' ),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater->get_controls(),
            ]
        );
    $this-> end_controls_section();

    // Start Style content controls
    $this-> start_controls_section(
        'style',
        [
            'label'=>esc_html__('Style', 'gunter-toolkit'),
            'tab'=> Controls_Manager::TAB_STYLE,
        ]
    );

        $this->add_control(
            'name_color',
            [
                'label' => esc_html__( 'Member Name Color', 'gunter-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team-member .content h3' => 'color: {{VALUE}}',
                ],
            ]
        );
        $this->add_responsive_control(
            'name_size',
            [
                'label' => esc_html__( 'Member Name Font Size', 'gunter-toolkit' ),
                'type' => Controls_Manager::SLIDER,
                'range' => [
                    'px' => [
                        'min' => 1,
                        'max' => 50,
                    ],
                ],
                'devices' => [ 'desktop', 'tablet', 'mobile' ],
                'unit' => 'px',
                'selectors' => [
                    '{{WRAPPER}} .single-team-member .content h3' => 'font-size: {{SIZE}}{{UNIT}}',
                ],
            ]
        );

        $this->add_control(
            'designation_color',
            [
                'label' => esc_html__( 'Member Designation Color', 'gunter-toolkit' ),
                'type' => Controls_Manager::COLOR,
                'selectors' => [
                    '{{WRAPPER}} .single-team-member .content span' => 'color: {{VALUE}}',
                ],
            ]
        );
    $this->add_responsive_control(
        'designation_size',
        [
            'label' => esc_html__( 'Member Designation Font Size', 'gunter-toolkit' ),
            'type' => Controls_Manager::SLIDER,
            'range' => [
                'px' => [
                    'min' => 0,
                    'max' => 50,
                ],
            ],
            'devices' => [ 'desktop', 'tablet', 'mobile' ],
            'unit' => 'px',
            'selectors' => [
                '{{WRAPPER}} .single-team-member .content span' => 'font-size: {{SIZE}}{{UNIT}}',
            ],
        ]
    );
    $this-> end_controls_section();
}
    protected function render()
    {
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

      ?>
        <div class="row">
            <?php foreach( $settings['teams'] as $item ): ?>
                <div class="col-lg-3 col-md-6 col-sm-6 <?php echo esc_attr($wow_class); ?> fadeInUp" data-wow-delay=".5s">
                    <div class="single-team-member">
                        <div class="image">
                            <?php if( $item['member_img']['url'] != '' ): ?>
                                <img class="<?php echo esc_attr($lazy_class); ?>" <?php echo esc_attr($lazy_attr); ?>src="<?php echo esc_url( $item['member_img']['url'] ); ?>" alt="<?php esc_attr(  $item['name'] ); ?>">
                            <?php endif; ?>

                            <ul class="social-link">
                                <?php if( $item['icon1'] != '' && $item['url1']['url'] != '' ): ?>
                                    <li><a href="<?php echo esc_url( $item['url1']['url'] ); ?>" class="d-block" target="_blank"><i class='<?php echo esc_attr( $item['icon1'] ); ?>'></i></a></li>
                                <?php endif; ?>
                                <?php if( $item['icon2'] != '' && $item['url2']['url'] != '' ): ?>
                                    <li><a href="<?php echo esc_url( $item['url2']['url'] ); ?>" class="d-block" target="_blank"><i class='<?php echo esc_attr( $item['icon2'] ); ?>'></i></a></li>
                                <?php endif; ?>
                                <?php if( $item['icon3'] != '' && $item['url3']['url'] != '' ): ?>
                                    <li><a href="<?php echo esc_url( $item['url3']['url'] ); ?>" class="d-block" target="_blank"><i class='<?php echo esc_attr( $item['icon3'] ); ?>'></i></a></li>
                                <?php endif; ?>
                                <?php if( $item['icon4'] != '' && $item['url4']['url'] != '' ): ?>
                                    <li><a href="<?php echo esc_url( $item['url4']['url'] ); ?>" class="d-block" target="_blank"><i class='<?php echo esc_attr( $item['icon4'] ); ?>'></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>

                        <div class="content">
                            <h3><?php echo esc_html( $item['name'] ); ?></h3>
                            <span><?php echo esc_html( $item['designation'] ); ?></span>
                            <i class='bx bx-share-alt'></i>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

    <?php
    }
}
Plugin::instance()->widgets_manager->register_widget_type( new Stike_Team_Two );