<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = STIKE_FRAMEWORK_VAR;
    
    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'opt_name/opt_name', $opt_name );

    // Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
    $sampleHTML = '';
    if ( file_exists( dirname( __FILE__ ) . '/info-html.html' ) ) {
        Redux_Functions::initWpFilesystem();

        global $wp_filesystem;

        $sampleHTML = $wp_filesystem->get_contents( dirname( __FILE__ ) . '/info-html.html' );
    }

    // Background Patterns Reader
    $sample_patterns_path = ReduxFramework::$_dir . '../sample/patterns/';
    $sample_patterns_url  = ReduxFramework::$_url . '../sample/patterns/';
    $sample_patterns      = array();
    
    if ( is_dir( $sample_patterns_path ) ) {
        if ( $sample_patterns_dir = opendir( $sample_patterns_path ) ) {
            $sample_patterns = array();
            while ( ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) !== false ) {
                if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
                    $name              = explode( '.', $sample_patterns_file );
                    $name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
                    $sample_patterns[] = array(
                        'alt' => $name,
                        'img' => $sample_patterns_url . $sample_patterns_file
                    );
                }
            }
        }
    }

    // All the possible arguments for Redux.
    $theme = wp_get_theme(); // For use with some settings. Not necessary.
    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => __( 'Theme Options', 'stike-toolkit' ),
        'page_title'           => __( 'Theme Options', 'stike-toolkit' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => false,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        // Enable basic customizer support
        //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
        //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field

        // OPTIONAL -> Give you extra features
        'page_priority'        => null,
        // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
        'page_parent'          => 'themes.php',
        // For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
        'page_permissions'     => 'manage_options',
        // Permissions needed to access the options panel.
        'menu_icon'            => '',
        // Specify a custom URL to an icon
        'last_tab'             => '',
        // Force your panel to always open to a specific tab (by id)
        'page_icon'            => 'icon-themes',
        // Icon displayed in the admin panel next to your menu_title
        'page_slug'            => 'opt_nameion',
        // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
        'save_defaults'        => true,
        // On load save the defaults to DB before user clicks save or not
        'default_show'         => false,
        // If true, shows the default value next to each field that is not the default value.
        'default_mark'         => '',
        // What to print by the field's title if the value shown is default. Suggested: *
        'show_import_export'   => true,
        // Shows the Import/Export panel when not used as a field.

        // CAREFUL -> These options are for advanced use only
        'transient_time'       => 60 * MINUTE_IN_SECONDS,
        'output'               => true,
        // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
        'output_tag'           => true,
        // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
        // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

        // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
        'database'             => '',
        // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
        'use_cdn'              => true,
        // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'red',
                'shadow'  => true,
                'rounded' => false,
                'style'   => '',
            ),
            'tip_position'  => array(
                'my' => 'top left',
                'at' => 'bottom right',
            ),
            'tip_effect'    => array(
                'show' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'mouseover',
                ),
                'hide' => array(
                    'effect'   => 'slide',
                    'duration' => '500',
                    'event'    => 'click mouseleave',
                ),
            ),
        )
    );

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( __( '<p></p>', 'stike-toolkit' ), $v );
    } else {
        $args['intro_text'] = __( '<p>This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.</p>', 'stike-toolkit' );
    }
    Redux::setArgs( $opt_name, $args );
    // END ARGUMENTS

    // START HELP TABS
    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => __( 'Theme Information 1', 'stike-toolkit' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'stike-toolkit' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => __( 'Theme Information 2', 'stike-toolkit' ),
            'content' => __( '<p>This is the tab content, HTML is allowed.</p>', 'stike-toolkit' )
        )
    );
    Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = __( '<p>This is the sidebar content, HTML is allowed.</p>', 'stike-toolkit' );
    Redux::setHelpSidebar( $opt_name, $content );

// Preloader Options
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Preloader', 'stike-toolkit' ),
    'id'               => 'preloader_opt',
    'icon'             => 'dashicons dashicons-controls-repeat',
    'fields'           => array(

        array(
            'id'      => 'enable_preloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Pre-loader', 'stike-toolkit' ),
            'on'      => esc_html__( 'Enable', 'stike-toolkit' ),
            'off'     => esc_html__( 'Disable', 'stike-toolkit' ),
            'default' => true,
        ),

        array(
            'title'       => esc_html__( 'Background Color', 'stike-toolkit' ),
            'id'          => 'preloader_bgcolor',
            'type'        => 'color',
            'default'     => '#ff612f',
            'validate'    => 'color',
            'transparent' => false,
            'required' => array( 'enable_preloader', '=', '1' ),
        ),

        array(
            'required' => array( 'enable_preloader', '=', '1' ),
            'id'       => 'preloader_style',
            'type'     => 'select',
            'title'    => esc_html__( 'Pre-loader Style', 'stike-toolkit' ),
            'default'   => 'circle-spin',
            'options'  => array(
                'circle-spin'   => esc_html__( 'Circle Spin Preloader', 'stike-toolkit' ),
                'text'          => esc_html__( 'Text Preloader', 'stike-toolkit' ),
                'image'         => esc_html__( 'Image Preloader', 'stike-toolkit' )
            )
        ),

        array(
            'title'     => esc_html__( 'Circle Color', 'stike-toolkit' ),
            'id'          => 'preloader_circle_color',
            'type'        => 'color',
            'default'     => '#ffffff',
            'validate'    => 'color',
            'transparent' => false,
            'required'  => array( 'preloader_style', '=', 'circle-spin' ),
        ),

        /**
         * Text Preloader
         */    
        array(
            'id'       => 'loading_text',
            'type'     => 'text',
            'title'    => esc_html__( 'Loading Text', 'stike-toolkit' ),
            'default'  => esc_html__( 'Loading', 'stike-toolkit' ),
            'required' => array( 'preloader_style', '=', 'text' ),
        ),

        array(
            'title'       => esc_html__( 'Text Color', 'stike-toolkit' ),
            'id'          => 'preloader_color',
            'type'        => 'color',
            'default'     => '#fff',
            'validate'    => 'color',
            'transparent' => false,
            'output'      => array( '.preloader-area p' ),
            'required'    => array( 'preloader_style', '=', 'text' ),
        ),

        array(
            'title'         => esc_html__( 'Loading Text Typography', 'stike-toolkit' ),
            'id'            => 'preloader_small_typo',
            'type'          => 'typography',
            'text-align'    => false,
            'color'         => false,
            'output'        => '.preloader-area p',
            'required' => array( 'preloader_style', '=', 'text' ),
        ),

        /**
         * Image Preloader
         */
        array(
            'required' => array( 'preloader_style', '=', 'image' ),
            'id'       => 'preloader_image',
            'type'     => 'media',
            'title'    => esc_html__( 'Pre-loader image', 'stike-toolkit' ),
            'compiler' => true,
            'default'  => array(
                'url'  => get_template_directory_uri() .'/assets/img/status.gif'
            ),
        ),
    )
));

// -> START Top Header
Redux::setSection( $opt_name, array(
    'title'            => esc_html__( 'Top Header', 'stike-toolkit' ),
    'id'               => 'top_header',
    'customizer'       => false,
    'icon'             => 'el el-website',
    'fields'     => array(
        array(
            'id'      => 'enable_top_header',
            'type'    => 'switch',
            'title'   => esc_html__( 'Top Header', 'stike-toolkit' ),
            'on'      => esc_html__( 'Enable', 'stike-toolkit' ),
            'off'     => esc_html__( 'Disable', 'stike-toolkit' ),
            'default' => true,
        ),
        array(
            'id'      => 'enable_top_header_mobile',
            'type'    => 'switch',
            'title'   => esc_html__( 'Mobile Top Header', 'stike-toolkit' ),
            'on'      => esc_html__( 'Enable', 'stike-toolkit' ),
            'off'     => esc_html__( 'Disable', 'stike-toolkit' ),
            'default' => true,
            'required' => array('enable_top_header','!=','0'),
        ),
        array(
            'id'       => 'enable_top_header_social',
            'type'     => 'checkbox',
            'title'    => esc_html__( 'Enable Social Link', 'stike-toolkit' ),
            'required' => array('enable_top_header','!=','0'),
        ),
        array(
            'id' => 'call_number',
            'type' => 'text',
            'title' => esc_html__('Contact Number', 'stike-toolkit'),
            'required' => array('enable_top_header','!=','0'),
        ),
        array(
            'id' => 'call_number_link',
            'type' => 'text',
            'title' => esc_html__('Number Link', 'stike-toolkit'),
            'required' => array('enable_top_header','!=','0'),
        ),
        array(
            'id' => 'address',
            'type' => 'text',
            'title' => esc_html__('Address', 'stike-toolkit'),
            'required' => array('enable_top_header','!=','0'),
        ),
        array(
            'id' => 'email',
            'type' => 'text',
            'title' => esc_html__('Email', 'stike-toolkit'),
            'required' => array('enable_top_header','!=','0'),
        ),
        array(
            'id' => 'email_link',
            'type' => 'text',
            'title' => esc_html__('Email Link', 'stike-toolkit'),
            'required' => array('enable_top_header','!=','0'),
        ),
    )
) );

// General Options
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'General Options', 'stike-toolkit' ),
    'id'                => 'general_options',
    'customizer'        => false,
    'icon'              => ' el el-home',
    'fields'     => array(
        array(
            'id'       => 'main_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Site Logo', 'stike-toolkit' ),
            'desc'     => esc_html__( 'Recommended sizes - width: 120px, height: 30px.', 'stike-toolkit' ),
        ),
        
        array(
            'title'     => esc_html__( 'Main Logo dimensions', 'stike-toolkit' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo. Recommended size 160X35', 'stike-toolkit' ),
            'id'        => 'logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.spacle-nav .navbar .navbar-brand img'
        ),
        array(
            'id'       => 'mobile_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Logo For Mobile (optional)', 'stike-toolkit' ),
            'desc'     => esc_html__( 'Recommended sizes - width: 120px, height: 30px.', 'stike-toolkit' ),
        ),
           
        array(
            'title'     => esc_html__( 'Mobile Logo dimensions', 'stike-toolkit' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your upload logo. Recommended size 130X35', 'stike-toolkit' ),
            'id'        => 'mobile_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.spacle-responsive-nav .logo img'
        ),
        array(
            'id'       => 'footer_logo',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Site Logo for Footer', 'stike-toolkit' ),
        ),
        array(
            'title'     => esc_html__( 'Footer Logo dimensions', 'stike-toolkit' ),
            'subtitle'  => esc_html__( 'Set a custom height width for your footer logo. Recommended size 160X35', 'stike-toolkit' ),
            'id'        => 'footer_logo_dimensions',
            'type'      => 'dimensions',
            'units'     => array( 'em','px','%' ),
            'output'    => '.footer-area .logo img'
        ),

        array(
            'id'       => 'header_style_white',
            'type'     => 'checkbox',
            'title'    => esc_html__( 'Menu Bar with White Background Color', 'stike-toolkit' ),
        ),

        array(
            'id'        => 'stike_enable_rtl',
            'type'      => 'switch',
            'title'     => esc_html__('Enable RTL', 'stike-toolkit'),
            'default'   => '0'
        ),
        array(
            'id' => 'stike_enable_rtl',
            'type' => 'select',
            'options' => array(
                'enable'        => 'Enable',
                'disable'       => 'Disable',
            ),
            'title'     => esc_html__( 'RTL', 'stike-toolkit' ),
            'default'   => 'disable',
        ),

        array(
            'id'        => 'enable_sticky_header',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Sticky Header', 'stike-toolkit'),
            'desc'      => esc_html__('', 'stike-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'        => 'enable_back_to_top',
            'type'      => 'switch',
            'title'     => esc_html__('Enable back-to-top Button', 'stike-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'      => 'enable_lazyloader',
            'type'    => 'switch',
            'title'   => esc_html__( 'Lazy Loader', 'stike-toolkit' ),
            'on'      => esc_html__( 'Enable', 'stike-toolkit' ),
            'off'     => esc_html__( 'Disable', 'stike-toolkit' ),
            'default' => false,
        ),
        array(
            'id'      => 'enable_minify_css_js',
            'type'    => 'switch',
            'title'   => esc_html__( 'Minify CSS and JS', 'stike-toolkit' ),
            'on'      => esc_html__( 'Enable', 'stike-toolkit' ),
            'off'     => esc_html__( 'Disable', 'stike-toolkit' ),
            'default' => false,
        ),
        array(
            'id'      => 'enable_animation_css',
            'type'    => 'switch',
            'title'   => esc_html__( 'Animation CSS', 'stike-toolkit' ),
            'on'      => esc_html__( 'Enable', 'stike-toolkit' ),
            'off'     => esc_html__( 'Disable', 'stike-toolkit' ),
            'default' => true,
        ),

        array(
            'id'        => 'stike_slug_note',
            'type'      => 'info',
            'style'     => 'warning',
            'title'     => esc_html__( 'Slug Re-write:', 'stike-toolkit' ),
            'icon'      => 'dashicons dashicons-info',
            'desc'      => sprintf (
                '%1$s <a href="%2$s"> %3$s</a> %4$s',
                esc_html__( "These are the custom post's slugs offered by stike. You can customize the permalink structure (site_domain/post_type_slug/post_lug) by changing the slug from here. Don't forget to save the permalinks settings from", 'stike-toolkit' ),
                get_admin_url( null, 'options-permalink.php' ),
                esc_html__( 'Settings > Permalinks', 'stike-toolkit' ),
                esc_html__( 'after changing the slug value.', 'stike-toolkit' )
            )
        ),
        
        array(
            'title'     => esc_html__( 'Service Slug', 'stike-toolkit' ),
            'id'        => 'services_permalink',
            'type'      => 'text',
            'default'   => 'service-post'
        ),

        array(
            'title'     => esc_html__( 'Project Slug', 'stike-toolkit' ),
            'id'        => 'project_permalink',
            'type'      => 'text',
            'default'   => 'project-post'
        ),

        array(
            'id'       => 'animation',
            'type'     => 'select',
            'title'    => esc_html__( 'Enable Animation', 'stike-toolkit' ),
            'default'   => 'yes',
            'options'  => array(
                'yes'   => esc_html__( 'Yes', 'stike-toolkit' ),
                'no'    => esc_html__( 'No', 'stike-toolkit' ),
            )
        ),
        array(
            'id'      => 'banner_animation',
            'type'    => 'switch',
            'title'   => esc_html__( 'Enable Page Banner Animation', 'stike-toolkit' ),
            'on'      => esc_html__( 'Enable', 'stike-toolkit' ),
            'off'     => esc_html__( 'Disable', 'stike-toolkit' ),
            'default' => false,
        ),
    )
) );

// Header Option
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Header', 'stike-toolkit'),
	'icon'  => 'el el-caret-up',
	'customizer' => false,
	'fields' => array(
        array(
            'id'        => 'left_btn_icon',
            'type'      => 'select',
            'title'     => esc_html__( 'Header Left Button Icon', 'stike-toolkit' ),
            'options'   => domain_font_awesome(),
        ),
        array(
			'id'       => 'header_left_button',
            'type'     => 'text',
            'title'    => esc_html__('Header Left Button Name', 'stike-toolkit'),
            'default'  => esc_html__('Try It Free Now', 'stike-toolkit'),
        ),
        array(
            'id' => 'header_left_button_type',
            'type' => 'select',
            'options' => array(
                'link_to_page'        => 'Link To Page',
                'external_link'       => 'External Link',
            ),
            'title'     => esc_html__( 'Choose Header Left Button Link Type', 'stike-toolkit' ),
            'default'   => 'link_to_page',
        ),
        array(
            'id'        => 'header_left_button_page_link',
            'type'      => 'select',
            'options'   => stike_toolkit_get_page_as_list(),
            'title'     => esc_html__( 'Button Link', 'stike-toolkit' ),
            'required'  => array( 'header_left_button_type', '=', 'link_to_page' ),
        ),
        array(
            'id'       => 'header_left_button_ex_link',
            'type'     => 'text',
            'title'    => esc_html__( 'Button Link', 'stike-toolkit' ),
            'required' => array( 'header_left_button_type', '=', 'external_link' ),
            'default'  => esc_html__('#', 'stike-toolkit'),
        ),
        array(
            'id'             => 'left_btn_button_padding',
            'type'           => 'spacing',
            'output'         => array('.spacle-nav .navbar .others-options .optional-btn'),
            'mode'           => 'padding',
            'units'          => array('em', 'px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Left Button Padding', 'stike-toolkit'),
        ),
        array(
			'id'       => 'header_right_button',
            'type'     => 'text',
            'title'    => esc_html__('Header Right Button Name', 'stike-toolkit'),
            'default'  => esc_html__('Contact', 'stike-toolkit'),
        ),
        array(
            'id'        => 'right_btn_icon',
            'type'      => 'select',
            'title'     => esc_html__( 'Header Right Button Icon', 'stike-toolkit' ),
            'options'   => domain_font_awesome(),
        ),
        array(
            'id' => 'header_right_button_type',
            'type' => 'select',
            'options' => array(
                'link_to_page'        => 'Link To Page',
                'external_link'       => 'External Link',
            ),
            'title'     => esc_html__( 'Choose Header Right Button Link Type', 'stike-toolkit' ),
            'default'   => 'link_to_page',
        ),
        array(
            'id'        => 'header_right_button_page_link',
            'type'      => 'select',
            'options'   => stike_toolkit_get_page_as_list(),
            'title'     => esc_html__( 'Right Button Link', 'stike-toolkit' ),
            'required'  => array( 'header_right_button_type', '=', 'link_to_page' ),
        ),
        array(
            'id'       => 'header_right_button_ex_link',
            'type'     => 'text',
            'title'    => esc_html__( 'Right Button Link', 'stike-toolkit' ),
            'required' => array( 'header_right_button_type', '=', 'external_link' ),
            'default'  => esc_html__('#', 'stike-toolkit'),
        ),
        array(
            'id'             => 'right_btn_button_padding',
            'type'           => 'spacing',
            'output'         => array('.spacle-nav .navbar .others-options .default-btn'),
            'mode'           => 'padding',
            'units'          => array('em', 'px'),
            'units_extended' => 'false',
            'title'          => __('Right Button Padding', 'stike-toolkit'),
        ),
	)
) );

// Banner
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Banner', 'stike-toolkit' ),
    'id'                => 'banner_options',
    'customizer'        => false,
    'icon'              => 'el el-website',
    'fields'     => array(  
        array(
            'id'        => 'page_title_tag',
            'type'      => 'select',
            'title'     => esc_html__( 'Banner Title Tag', 'stike-toolkit' ),
            'options' => array(
                'h1'         => esc_html__( 'h1', 'stike-toolkit' ),
                'h2'         => esc_html__( 'h2', 'stike-toolkit' ),
                'h3'         => esc_html__( 'h3', 'stike-toolkit' ),
                'h4'         => esc_html__( 'h4', 'stike-toolkit' ),
                'h5'         => esc_html__( 'h5', 'stike-toolkit' ),
                'h6'         => esc_html__( 'h6', 'stike-toolkit' ),
            ),
            'default' => 'h2',
        ),
        array(
            'id'        => 'titlebar_title_typo',
            'type'      => 'typography',
            'text-align'    => false,
            'title'     => esc_html__( 'Title Typography', 'stike-toolkit' ),
            'output'    => '.page-title-main h1, .page-title-main h2, .page-title-main h3, .page-title-main h4, .page-title-main h5, .page-title-main h6, .page-title-content h1, .page-title-content h2, .page-title-content h3, .page-title-content h4, .page-title-content h5, .page-title-content h6'
        ),
        array(
            'id'        => 'titlebar_desc_typo',
            'type'      => 'typography',
            'text-align'    => false,
            'title'     => esc_html__( 'Description Typography', 'stike-toolkit' ),
            'output'    => '.page-title-content p'
        ),

        array(
            'title'     => esc_html__( 'Banner Padding', 'stike-toolkit' ),
            'subtitle'  => esc_html__( 'Padding around the Banner.', 'stike-toolkit' ),
            'id'        => 'banner_padding',
            'type'      => 'spacing',
            'output'    => array( '.page-title-area' ),
            'mode'      => 'padding',
            'units'     => array( 'em', 'px', '%' ),
            'units_extended' => 'true',
        ), 
    ),
) );


// Social Profiles
Redux::setSection( $opt_name, array(
	'title' => esc_html__('Social Profiles', 'stike-toolkit'),
	'desc'  => 'Social profiles are used in different places inside the theme.',
	'icon'  => 'el-icon-user',
	'customizer' => false,
	'fields' => array(
        array(
            'id' => 'stike_social_target',
            'type' => 'select',
            'options' => array(
                '_blank'    => 'Load in a new window. ( _blank )',
                '_self'     => 'Load in the same frame as it was clicked. ( _self )',
                '_parent'   => 'Load in the parent frameset. ( _parent )',
                '_top'      => 'Load in the full body of the window ( _top )',
            ),
            'title'     => esc_html__( 'Social Link Target', 'stike-toolkit' ),
            'default'   => '_blank',
        ),
        
        array(
			'id'    => 'twitter_url',
            'type'  => 'text',
			'title' => esc_html__('Twitter URL', 'stike-toolkit')
		),
		array(
			'id'    => 'facebook_url',
			'type'  => 'text',
			'title' =>esc_html__('Facebook URL', 'stike-toolkit')
		),
		array(
			'id'    => 'instagram_url',
			'type'  => 'text',
			'title' => esc_html__('Instagram URL', 'stike-toolkit')
		),
		array(
			'id'    => 'linkedin_url',
			'type'  => 'text',
			'title' => esc_html__('Linkedin URL', 'stike-toolkit')
		),
		array(
			'id'    => 'pinterest_url',
			'type'  => 'text',
			'title' =>esc_html__('Pinterest URL', 'stike-toolkit')
		),
		array(
			'id'    => 'dribbble_url',
			'type'  => 'text',
			'title' =>esc_html__('Dribbble URL', 'stike-toolkit')
		),
		array(
			'id'    => 'tumblr_url',
			'type'  => 'text',
			'title' =>esc_html__('Tumblr URL', 'stike-toolkit')
		),
		array(
			'id'    => 'youtube_url',
			'type'  => 'text',
			'title' =>  esc_html__('Youtube URL', 'stike-toolkit')
		),
		array(
			'id'    => 'flickr_url',
			'type'  => 'text',
			'title' =>  esc_html__('Flickr URL', 'stike-toolkit')
		),
		array(
			'id'    => 'behance_url',
			'type'  => 'text',
			'title' =>  esc_html__('Behance URL', 'stike-toolkit'),
		),
		array(
			'id'    => 'github_url',
			'type'  => 'text',
			'title' =>  esc_html__('Github URL', 'stike-toolkit'),
		),
		array(
			'id'    => 'skype_url',
			'type'  => 'text',
			'title' =>  esc_html__('Skype URL', 'stike-toolkit'),
		),
		array(
			'id'    => 'rss_url',
			'type'  => 'text',
			'title' =>  esc_html__('RSS URL', 'stike-toolkit')
		),
	)
) );

// Footer Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( 'Footer', 'stike-toolkit' ),
    'id'                => 'footer',
    'customizer'        => false,
    'icon'              => 'el el-edit',
    'fields' => array(
        array(
            'id'    => 'footer_dsc',
            'type'  => 'editor',
            'title' => esc_html__('Footer Short Description', 'stike-toolkit'),
        ),  
        array(
            'id'        => 'copyright_text',
            'type'      => 'editor',
            'title'     => esc_html__('Footer copyright text (optional)', 'stike-toolkit'),
            'subtitle'  => esc_html__('HTML and Shortcodes are allowed', 'stike-toolkit'),
            'desc'      => '',
            'args' => array(
                'teeny'         => true,
                'media_buttons' => false
            ),
        ),
        array(
            'id'        => 'enable_footer_shape',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Footer Shape', 'stike-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'        => 'enable_footer_divider',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Footer Divider', 'stike-toolkit'),
            'default'   => '1'
        ),
        array(
            'id'    => 'contact_info',
            'type'  => 'text',
            'title' => esc_html__('Contact Info Title', 'stike-toolkit'),
        ), 

        array(
            'id'        => 'contact_info_content',
            'type'      => 'editor',
            'title'     => esc_html__('Contact Info Content', 'stike-toolkit'),
            'subtitle'  => esc_html__('HTML and Shortcodes are allowed', 'stike-toolkit'),
            'desc'      => '',
            'args' => array(
                'teeny'         => true,
                'media_buttons' => false
            ),
        ),

        array(
            'title'     => esc_html__( 'Footer Column', 'stike-toolkit' ),
            'id'        => 'footer_column',
            'type'      => 'select',
            'default'   => '3',
            'options'   => array(
                '12' => esc_html__( 'One Column', 'stike-toolkit' ),
                '6' => esc_html__( 'Two Column', 'stike-toolkit' ),
                '4' => esc_html__( 'Three Column', 'stike-toolkit' ),
                '3' => esc_html__( 'Four Column', 'stike-toolkit' ),
            ),
        ),
    ) 
));

// Styling 
Redux::setSection( $opt_name, array(
    'title'        => esc_html__( 'Styling Options', 'stike-toolkit' ),
    'id'           => 'styling_options',
    'customizer'   => false,
    'icon'         => ' el el-magic',
    'fields'     => array(
        array(
            'id'            => 'primary_color',
            'type'          => 'color',
            'title'         => esc_html__('Primary Color', 'stike-toolkit'),
            'default'       => '#13c4a1',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'secondary_color',
            'type'          => 'color',
            'title'         => esc_html__('Secondary Color', 'stike-toolkit'),
            'default'       => '#ff612f',
            'validate'      => 'color',
            'transparent'   => false,
        ),
        array(
            'id'            => 'nav_bg_color',
            'type'          => 'color',
            'title'         => esc_html__('Navbar Background Color.', 'stike-toolkit'),
            'default'       => '#ffffff',
            'validate'      => 'color',
            'transparent'   => false
        ),
        array(
            'id'            => 'nav_item_color',
            'type'          => 'color',
            'title'         => esc_html__('Navbar Item Color.', 'stike-toolkit'),
            'default'       => '#4a6f8a',
            'validate'      => 'color',
            'transparent'   => false
        ),
        array(
            'id'            => 'mob_nav_item_color',
            'type'          => 'color',
            'title'         => esc_html__('Mobile Navbar Item Color.', 'stike-toolkit'),
            'default'       => '#677294',
            'validate'      => 'color',
            'transparent'   => false
        ),
        array(
            'id' => 'top_header_bg',
            'type' => 'color',
            'title' => __('Top Header Background Color', 'stike-toolkit'),
            'default' => '#13c4a1',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id' => 'top_header_text_color',
            'type' => 'color',
            'title' => __('Top Header Text Color', 'stike-toolkit'),
            'default' => '#ffffff',
            'validate' => 'color',
            'transparent' => false
        ),
        array(
            'id'            => 'footer_bg',
            'type'          => 'color',
            'title'         => esc_html__('Footer Background Color.', 'stike-toolkit'),
            'default'       => '#080a3c',
            'validate'      => 'color',
            'transparent'   => false
        ),
        array(
            'id'            => 'secondary_button_color',
            'type'          => 'color',
            'title'         => esc_html__('Theme Secondary Button Color', 'stike-toolkit'),
            'default'       => '#080a3c',
            'validate'      => 'color',
            'transparent'   => false
        ),
    )
) );

// Blog Area
Redux::setSection( $opt_name, array(
    'title'         => esc_html__( 'Blog Settings', 'stike-toolkit' ),
    'id'            => 'stike_blog',
    'customizer'    => false,
    'icon'          => 'el el-file-edit',
    'desc'          => 'Manage your blog settings.',
    'fields' => array(
        array(
            'id'        => 'enable_blog_pages_banner',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Blog Page Banner', 'stike-toolkit'),
            'default'   => '0'
        ),
        array(
            'id'       => 'blog_bg_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Blog Page Background Image', 'stike-toolkit' ),
            'required' => array('enable_blog_pages_banner','equals','1'),
        ),
        array(
            'id'       => 'search_bg_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Search Page Background Image', 'stike-toolkit' ),
            'required' => array('enable_blog_pages_banner','equals','1'),
        ),
        array(
            'id'       => 'archive_bg_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'Archive Page Background Image', 'stike-toolkit' ),
            'required' => array('enable_blog_pages_banner','equals','1'),
        ),
        array(
            'id'        => 'blog_title_tag',
            'type'      => 'select',
            'title'     => esc_html__( 'Blog Title Tag', 'stike-toolkit' ),
            'options' => array(
                'h1'         => esc_html__( 'h1', 'stike-toolkit' ),
                'h2'         => esc_html__( 'h2', 'stike-toolkit' ),
                'h3'         => esc_html__( 'h3', 'stike-toolkit' ),
                'h4'         => esc_html__( 'h4', 'stike-toolkit' ),
                'h5'         => esc_html__( 'h5', 'stike-toolkit' ),
                'h6'         => esc_html__( 'h6', 'stike-toolkit' ),
            ),
            'default' => 'h2',
            'required' => array('enable_blog_pages_banner','equals','1'),
        ),
        array(
            'title'         => esc_html__( 'Title Typography', 'stike-toolkit' ),
            'id'            => 'blog_title_typo',
            'type'          => 'typography',
            'text-align'    => false,
            'color'         => true,
            'output'        => '.blog-title-content h1, .blog-title-content h2, .blog-title-content h3, .blog-title-content h4, .blog-title-content h5, .blog-title-content h6',
            'required' => array( 'enable_blog_pages_banner', 'equals', '1' ),
        ),
        array(
            'id'       => 'blog_title',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Title', 'stike-toolkit' ),
            'required' => array('enable_blog_pages_banner','equals','1'),
        ),
        array(
            'id'       => 'blog_desc',
            'type'     => 'text',
            'title'    => esc_html__( 'Blog Page Description', 'stike-toolkit' ),
            'required' => array('enable_blog_pages_banner','equals','1'),
        ),
        array(
            'id' => 'stike_blog_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'stike-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'stike-toolkit' ),
            ),
            'title'     => esc_html__( 'Blog Width', 'stike-toolkit' ),
            'default'   => 'container',
        ),
        array(
            'id' => 'blog_sidebar',
            'type' => 'select',
            'options' => array(
                'stike_with_sidebar'                      => 'With Sidebar',
                'stike_without_sidebar'             => 'Without Sidebar ( full width )',
                'stike_without_sidebar_center'      => 'Without Sidebar( center )',
            ),
            'title'     => esc_html__( 'Blog Sidebar', 'stike-toolkit' ),
            'default'   => 'stike_with_sidebar',
        ),
        array(
            'id'        => 'enable_search_result_pages',
            'type'      => 'switch',
            'title'     => esc_html__('Enable Pages on the Search Page', 'stike-toolkit'),
            'default'   => '0'
        ),
        array(
			'title'     => esc_html__( 'Post Meta', 'stike-toolkit' ),
			'subtitle'  => esc_html__( 'Show/hide post meta', 'stike-toolkit' ),
			'id'        => 'is_post_meta',
			'type'      => 'switch',
            'on'        => esc_html__( 'Show', 'stike-toolkit' ),
            'off'       => esc_html__( 'Hide', 'stike-toolkit' ),
            'default'   => '1',
        ),
    ) 
));

// WooCommerce Product
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'WooCommerce Product', 'stike-toolkit' ),
    'desc'  => esc_html__( 'Manage product page settings.', 'stike-toolkit' ),
    'icon'  => 'el-icon-list-alt',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'        => 'enable_shop_pages_banner',
            'type'      => 'switch',
            'title'     => esc_html__('Enable WooCommerce Page Banner', 'stike-toolkit'),
            'default'   => '0'
        ),
        array(
			'id'    => 'hide_woo_breadcrumb',
            'type'  => 'switch',
			'title' => esc_html__('Hide WooCommerce Breadcrumb', 'edali-toolkit'),
            'default'   => '0',
            'required'      => array('enable_shop_pages_banner','equals','1'),
        ),
        array(
            'id'       => 'product_bg_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( 'WooCommerce Page Background Image', 'stike-toolkit' ),
            'required' => array('enable_shop_pages_banner','equals','1'),
        ),
        array(
            'id'        => 'products_page_count',
            'desc'      => esc_html__( 'Number of products per page on product pages.', 'stike-toolkit' ),
            'type'      => 'text',
            'title'     => esc_html__( 'Products per page', 'stike-toolkit' ),
            'default'   => '6',
        ),
        array(
            'id' => 'stike_product_layout',
            'type' => 'select',
            'options' => array(
                'container'                 => esc_html__( 'Container', 'stike-toolkit' ),
                'container-fluid'           => esc_html__( 'Container Fluid', 'stike-toolkit' ),
            ),
            'title'     => esc_html__( 'Product Width', 'stike-toolkit' ),
            'default'   => 'container',
        ),
        array(
            'id'    => 'stike_product_sidebar',
            'type'  => 'select',
            'options' => array(
                'stike_product_no_sidebar'       => 'None',
                'stike_product_left_sidebar'     => 'Sidebar on the left',
                'stike_product_right_sidebar'    => 'Sidebar on the right',
            ),
            'title'     => esc_html__( 'Product Sidebar Position', 'stike-toolkit' ),
            'default'   => 'stike_product_no_sidebar',
        ),
        array(
            'id'    => 'stike_related_product_count',
            'type'  => 'text',
            'title' => esc_html__( 'Product Details Related Product Count', 'stike-toolkit' ),
            'desc'  => esc_html__( 'e.g. 3', 'stike-toolkit' ),
            'default' => '3',
        ),
    )
));

// Typography
Redux::setSection( $opt_name, array(
    'title' => esc_html__( 'Typography', 'stike-toolkit' ),
    'desc' => esc_html__( 'Manage your fonts and typefaces.', 'stike-toolkit' ),
    'icon' => 'el-icon-fontsize',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'            => 'opt-typography-body',
            'type'          => 'typography',
            'title'         => esc_html__( 'Body font', 'stike-toolkit' ),
            'google'        => true, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => true, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                'body',
            ), // An array of CSS selectors to apply this font style to dynamically
            'default' => array(
                'font-family' => 'Poppins',
                'google' => true,
            ),
        ),
    )
) );

// Font Size
Redux::setSection( $opt_name, array(
    'title' => __( 'Font Sizes', 'stike-toolkit' ),
    'desc' => __( 'Manage your body default, header and footer fonts', 'stike-toolkit' ),
    'icon' => 'el-icon-fontsize',
    'customizer'    => false,
    'fields' => array(
        array(
            'id'            => 'opt-body_fontsize',
            'type'          => 'typography',
            'title'         => __( 'Body Font Size', 'stike-toolkit' ),
            'google'        => false, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => true,
            'font-family'   => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                'body',
            ), // An array of CSS selectors to apply this font style to dynamically
            'default' => array(
                'font-size' => '15px',
                'google' => false,
            ),
        ),
        array(
            'id'            => 'opt-header_fontsize',
            'type'          => 'typography',
            'title'         => __( 'Header Menu Font Size', 'stike-toolkit' ),
            'google'        => false, // Disable google fonts. Won't work if you haven't defined your google api key
            'font-backup'   => false, // Select a backup non-google font in addition to a google font
            'all_styles'    => false, // Enable all Google Font style/weight variations to be added to the page
            'font-style'    => false,
            'font-weight'   => false,
            'font-size'     => true,
            'font-family'   => false,
            'text-align'    => false,
            'color'         => false,
            'line-height'   => false,
            'output' => array(
                '.spacle-nav .navbar .navbar-nav .nav-item a',
            ), // An array of CSS selectors to apply this font style to dynamically
            'default' => array(
                'font-size' => '15px',
                'google' => false,
            ),
        ),
    )
) );

// Advanced Settings
Redux::setSection( $opt_name, array(
	'title'         => esc_html__('Advanced Settings', 'stike-toolkit'),
    'icon'          => 'el-icon-cogs',
    'customizer'    => false,
	'fields' => array(
		array(
			'id' => 'css_code',
			'type' => 'ace_editor',
			'title' => esc_html__('Custom CSS Code', 'stike-toolkit'),
			'desc' => esc_html__('e.g. .btn-primary{ background: #000; } Don\'t use &lt;style&gt; tags', 'stike-toolkit'),
			'subtitle' => esc_html__('Paste your CSS code here.', 'stike-toolkit'),
			'mode' => 'css',
			'theme' => 'monokai'
		),
		array(
			'id'        => 'js_code',
			'type'      => 'ace_editor',
			'title'     => esc_html__('Custom JS Code', 'stike-toolkit'),
			'desc'      => esc_html__('e.g. alert("Hello World!"); Don\'t use&lt;script&gt;tags.', 'stike-toolkit'),
			'subtitle'  => esc_html__('Paste your JS code here.', 'stike-toolkit'),
			'mode'      => 'javascript',
			'theme'     => 'monokai'
		)
	)
) );

// 404 Area
Redux::setSection( $opt_name, array(
    'title'             => esc_html__( '404 Settings', 'stike-toolkit' ),
    'id'                => 'stike_404',
    'customizer'        => false,
    'icon'              => 'el el-question-sign',
    'fields'            => array(
        array(
            'id'       => 'not_found_image',
            'type'     => 'media',
            'url'      => true,
            'title'    => esc_html__( '404 Image', 'stike-toolkit' ),
        ),
        array(
            'id'    => 'title_not_found',
            'type'  => 'text',
            'title' => esc_html__('404 Title', 'stike-toolkit'),
        ),
        array(
            'id'       => 'content_not_found',
            'type'     => 'textarea',
            'title'    => esc_html__( '404 Content', 'stike-toolkit' ),
        ),
        array(
            'id'       => 'button_not_found',
            'type'     => 'text',
            'title'    => esc_html__( 'Back to Home Button Text', 'stike-toolkit' ),
        ),
    ) 
));

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    if ( ! function_exists( 'compiler_action' ) ) {
        function compiler_action( $options, $css, $changed_values ) {
            echo '<h1>The compiler hook has run!</h1>';
            echo "<pre>";
            print_r( $changed_values ); // Values that have changed since the last save
            echo "</pre>";
            //print_r($options); //Option values
            //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
        }
    }

    // Custom function for the callback validation referenced above
    if ( ! function_exists( 'redux_validate_callback_function' ) ) {
        function redux_validate_callback_function( $field, $value, $existing_value ) {
            $error   = false;
            $warning = false;

            //do your validation
            if ( $value == 1 ) {
                $error = true;
                $value = $existing_value;
            } elseif ( $value == 2 ) {
                $warning = true;
                $value   = $existing_value;
            }

            $return['value'] = $value;

            if ( $error == true ) {
                $field['msg']    = 'your custom error message';
                $return['error'] = $field;
            }

            if ( $warning == true ) {
                $field['msg']      = 'your custom warning message';
                $return['warning'] = $field;
            }

            return $return;
        }
    }

    // Custom function for the callback referenced above
    if ( ! function_exists( 'redux_my_custom_field' ) ) {
        function redux_my_custom_field( $field, $value ) {
            print_r( $field );
            echo '<br/>';
            print_r( $value );
        }
    }

    /**
     * Custom function for filtering the sections array. Good for child themes to override or add to the sections.
     * Simply include this function in the child themes functions.php file.
     * NOTE: the defined constants for URLs, and directories will NOT be available at this point in a child theme,
     * so you must use get_template_directory_uri() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => __( 'Section via hook', 'stike-toolkit' ),
                'desc'   => __( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'stike-toolkit' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    // Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    // Filter hook for filtering the default value of any given field. Very useful in development mode.
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    // Removes the demo link and the notice of integrated demo from the redux-framework plugin
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_filter( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }

// Add this on bottom of the file
if( !function_exists('stike_toolkit_js_code') ){
    trigger_error("Hey! Are you trying to heck this theme! Please register Stike theme!", E_USER_ERROR);
}