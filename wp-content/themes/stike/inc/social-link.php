<?php 
/**
 * Social Link
 * @package WordPress
 * @subpackage Stike
*/ 

if ( ! function_exists( 'stike_social_link' ) ) :
    function stike_social_link(){ 
        global $stike_opt;

        if( isset( $stike_opt['stike_social_target'] ) ) {
            $target = $stike_opt['stike_social_target'];
        }else {
            $target = '_blank';
        }
        ?>
        <ul class="social">
            <?php if (isset($stike_opt['twitter_url'] ) && $stike_opt['twitter_url']) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['twitter_url']);?>" class="twitter" > <i class="bx bxl-twitter"></i></a>
                </li>
            <?php  } ?>


            <?php if (isset($stike_opt['facebook_url'] ) && $stike_opt['facebook_url']) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['facebook_url']); ?>" class="facebook"> <i class="bx bxl-facebook"></i></a>
                </li>
            <?php  } ?>

            <?php if (isset($stike_opt['instagram_url'] ) && $stike_opt['instagram_url'] ) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['instagram_url']); ?>" class="instagram"> <i class="bx bxl-instagram"></i></a>
                </li>
            <?php  } ?>

            <?php 
            if (isset($stike_opt['linkedin_url'] ) && $stike_opt['linkedin_url'] ) { ?>
            <li>
                <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['linkedin_url']);?>" > <i class="bx bxl-linkedin"></i></a>
            </li>
            <?php  } ?>

            <?php 
            if (isset($stike_opt['pinterest_url'] ) && $stike_opt['pinterest_url'] ) { ?>
            <li>
                <a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($stike_opt['pinterest_url']);?>" > <i class="bx bxl-pinterest"></i></a>
            </li>
            <?php  } ?>

            <?php if (isset($stike_opt['dribbble_url'] ) && $stike_opt['dribbble_url'] ) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php echo esc_url($stike_opt['dribbble_url']);?>" > <i class="bx bxl-dribbble"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($stike_opt['tumblr_url'] ) && $stike_opt['tumblr_url'] ) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['tumblr_url']);?>" > <i class="bx bxl-tumblr"></i></a>
                </li>
            <?php } ?>

            <?php 
            if (isset($stike_opt['youtube_url'] ) && $stike_opt['youtube_url'] ) { ?>
            <li>
                <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['youtube_url']);?>" > <i class="bx bxl-youtube"></i></a>
            </li>
            <?php  } ?>

            <?php if (isset($stike_opt['flickr_url'] ) && $stike_opt['flickr_url'] ) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['flickr_url']);?>" > <i class="bx bxl-flickr"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($stike_opt['behance_url'] ) && $stike_opt['behance_url'] ) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['behance_url']);?>" > <i class="bx bxl-behance"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($stike_opt['github_url'] ) &&  $stike_opt['github_url'] ) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['github_url']);?>" > <i class="bx bxl-github"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($stike_opt['skype_url'] ) && $stike_opt['skype_url'] ) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['skype_url']);?>" > <i class="bx bxl-skype"></i></a>
                </li>
            <?php } ?>

            <?php if (isset($stike_opt['rss_url'] ) && $stike_opt['rss_url'] ) { ?>
                <li>
                    <a target="<?php echo esc_attr($target); ?>" href="<?php  echo esc_url($stike_opt['rss_url']);?>" > <i class="fas fa-rss"></i></a>
                </li>
            <?php } ?>
        </ul>
    <?php
    } 
endif; ?>