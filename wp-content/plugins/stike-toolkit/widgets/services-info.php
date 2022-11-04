<?php
/**
 * Services Info Widget
 */

namespace Elementor;
class Stike_Services_Info extends Widget_Base {

	public function get_name() {
        return 'Services_Info';
    }

	public function get_title() {
        return __( 'Services Info', 'stike-toolkit' );
    }

	public function get_icon() {
        return 'eicon-alert';
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

        $repeater_items = new Repeater();

        $repeater_items->add_control(
            'title',
            [
                'label' => esc_html__('Label', 'stike-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('Client', 'stike-toolkit'),
                'label_block' => true,
            ]
        );
        $repeater_items->add_control(
            'desc',
            [
                'label' => esc_html__('Content', 'stike-toolkit'),
                'type' => Controls_Manager::TEXT,
                'default' => esc_html__('James Anderson', 'stike-toolkit'),
                'label_block' => true,
            ]
        );
        $this->add_control(
            'items',
            [
                'label' => esc_html__('Items', 'stike-toolkit'),
                'type' => Controls_Manager::REPEATER,
                'fields' => $repeater_items->get_controls(),
            ]
        );

        $this->add_control(
            'button_text',
            [
                'label'=>__('Button Text', 'stike-toolkit'),
                'type'=>Controls_Manager:: TEXT,
                'default' => __('Live Preview', 'stike-toolkit'),
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

    $this->end_controls_section();
    }

	protected function render() {

        $settings = $this->get_settings_for_display();

        $items = $settings['items'];

        $btn1_text  = $settings['button_text'];

        //  Button Link
        $link_source = '';
        if( $settings['link_type'] == 1 ){
            $link_source = get_page_link($settings['link_to_page']);
        } else {
            $link_source = $settings['external_link'];
        }

        ?>
            <div class="service-details-info">
                <?php foreach( $items as $item ): ?>
                    <div class="single-info-box">
                        <h4><?php echo esc_html( $item['title'] ); ?></h4>
                        <span><?php echo esc_html( $item['desc'] ); ?></span>
                    </div>
                <?php endforeach; ?>

                <div class="single-info-box">
                    <?php if($btn1_text != '') { ?>
                        <?php if ( 'yes' === $settings['target_page'] ) { ?>
                            <a target="_blank" href="<?php echo esc_url($link_source); ?>" class="default-btn">
                                <?php echo esc_html($btn1_text); ?>
                            </a> <?php
                        } else { ?>
                            <a href="<?php echo esc_url($link_source); ?>" class="default-btn">
                                <?php echo esc_html($btn1_text); ?>
                            </a><?php
                        } ?>
                    <?php
                    } ?>
                </div>


            </div>
        <?php
	}


}

Plugin::instance()->widgets_manager->register_widget_type( new Stike_Services_Info );