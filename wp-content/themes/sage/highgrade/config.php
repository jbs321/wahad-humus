<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );

    // This is your option name where all the Redux data is stored.
    $opt_name = "redux_options";


    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

    $sampleHTML = '';

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


    $theme = wp_get_theme(); // For use with some settings. Not necessary.

    $args = array(
        // TYPICAL -> Change these values as you need/desire
        'opt_name'             => $opt_name,
        // This is where your data is stored in the database and also becomes your global variable name.
        'display_name'         => $theme->get( 'Name' ),
		'disable_tracking' => true,
        // Name that appears at the top of your panel
        'display_version'      => $theme->get( 'Version' ),
        // Version that appears at the top of your panel
        'menu_type'            => 'menu',
        //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
        'allow_sub_menu'       => true,
        // Show the sections below the admin menu item or not
        'menu_title'           => esc_html__( 'Theme Options', 'sage' ),
        'page_title'           => esc_html__( 'Theme Options', 'sage' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => true,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => 'hgr_options',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        // Show the time the page took to load, etc
        'update_notice'        => false,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => false,
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
        'page_slug'            => '',
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
        'system_info'          => false,
        // REMOVE

        //'compiler'             => true,

        // HINTS
        'hints'                => array(
            'icon'          => 'el el-question-sign',
            'icon_position' => 'right',
            'icon_color'    => 'lightgray',
            'icon_size'     => 'normal',
            'tip_style'     => array(
                'color'   => 'light',
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

    // SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
    $args['share_icons'][] = array(
        'url'   => 'https://www.youtube.com/user/HighGradeLab',
        'title' => esc_html__( 'YouTube Video Help','sage'),
        'icon'  => 'el el-youtube'
        //'img'   => '', // You can use icon OR img. IMG needs to be a full URL.
    );
    $args['share_icons'][] = array(
        'url'   => 'https://www.facebook.com/highgradelab',
        'title' => esc_html__( 'Like us on Facebook','sage'),
        'icon'  => 'el el-facebook'
    );
	
	$allowed_html_array = array(
		'a' => array(
			'href' => array(),
			'title' => array()
		),
		'br' => array(),
		'em' => array(),
		'strong' => array(),
	);

    // Panel Intro text -> before the form
    if ( ! isset( $args['global_variable'] ) || $args['global_variable'] !== false ) {
        if ( ! empty( $args['global_variable'] ) ) {
            $v = $args['global_variable'];
        } else {
            $v = str_replace( '-', '_', $args['opt_name'] );
        }
        $args['intro_text'] = sprintf( wp_kses(__( '<p>For support or problems please submit your ticket at <a href="https://highgrade.ticksy.com/" target="_blank">https://highgrade.ticksy.com/</a>.</p>', 'sage' ), $allowed_html_array ), $v );
    } else {
        $args['intro_text'] = wp_kses(__( '<p>For support or problems please submit your ticket at <a href="https://highgrade.ticksy.com/" target="_blank">https://highgrade.ticksy.com/</a>.</p>', 'sage' ), $allowed_html_array );
    }

    // Add content after the form.
    $args['footer_text'] = wp_kses(__( '<p>For support or problems please submit your ticket at <a href="https://highgrade.ticksy.com/" target="_blank">https://highgrade.ticksy.com/</a>.</p>', 'sage' ), $allowed_html_array );

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTS
     */


    /*
     * ---> START HELP TABS
     */

    $tabs = array(
        array(
            'id'      => 'redux-help-tab-1',
            'title'   => esc_html__( 'Theme Information 1', 'sage' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'sage' )
        ),
        array(
            'id'      => 'redux-help-tab-2',
            'title'   => esc_html__( 'Theme Information 2', 'sage' ),
            'content' => esc_html__( '<p>This is the tab content, HTML is allowed.</p>', 'sage' )
        )
    );
    //Redux::setHelpTab( $opt_name, $tabs );

    // Set the help sidebar
    $content = esc_html__( '<p>This is the sidebar content, HTML is allowed.</p>', 'sage' );
    Redux::setHelpSidebar( $opt_name, $content );


    /*
     * <--- END HELP TABS
     */


    // ACTUAL DECLARATION OF SECTIONS ****************************************** //
	// GENERAL SETTINGS SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_general',
		'icon'		=>	'el-icon-eye-open',
		'title'		=>	esc_html__('General Settings', 'sage'),
		'desc'		=>	esc_html__('General settings for your website', 'sage'),
        'fields'     => array(
					array(
                        'id'        => 'website_model',
                        'type'      => 'button_set',
                        'title'     => __('Full-Widht or Boxed?', 'sage'),
                        'subtitle'  => esc_html__('Is your website Full-Widht or Boxed?', 'sage'),
                        'options'   => array(
                            'website_full_width'=> esc_html__('Full Width', 'sage'), 
                            'website_boxed'		=> esc_html__('Boxed', 'sage'), 
                        ), 
                        'default'   => 'website_full_width'
                    ),
					array(
                        'id'        => 'enable_boxed_shadow',
                        'type'      => 'switch',
						'required'	=> array('website_model', '=', 'website_boxed'),
                        'title'     => esc_html__('Enable lateral shadow?', 'sage'),
                        'subtitle'  => esc_html__('Enable or Disable website lateral shadow.', 'sage'),
                        'default'   => 0,
                        'on'        => esc_html__('Enabled', 'sage'),
                        'off'       => esc_html__('Disabled', 'sage'),
                    ),
					array(
						'id'				=>	'website-background',
						'type'				=>	'background',
						'required'			=>	array('website_model', '=', 'website_boxed'),
						'compiler'			=>	array('body'),
						'output'			=>	array('body'),
						'title'				=>	esc_html__('Body Background', 'sage'),
						'subtitle'			=>	esc_html__('Body background image (optional).', 'sage'),
						'preview_height'	=>	'60px',
						'background-color'	=>	true,
					),
					array(
                        'id'        => 'enable_full_screen_search',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Full Screen Search into Menu Bar?', 'sage'),
                        'subtitle'  => esc_html__('Enable or Disable Full Screen Search button into Menu Bar.', 'sage'),
                        'default'   => 0,
                        'on'        => esc_html__('Enabled', 'sage'),
                        'off'       => esc_html__('Disabled', 'sage'),
                    ),
					array(
                        'id'        => 'enable_top_info_bar',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Info Bar?', 'sage'),
                        'subtitle'  => esc_html__('Show / Hide Info Bar', 'sage'),
                        'default'   => 0,
                        'on'        => esc_html__('Enabled', 'sage'),
                        'off'       => esc_html__('Disabled', 'sage'),
                    ),
					!is_plugin_active('hgr_info_bars/hgr_info_bars.php') ? 
					array(
						'id'    => 'top_info_bar',
						'type'  => 'info',
						'style' => 'critical',
						'title' => esc_html__( 'Info Bar Error', 'sage' ),
						'desc'  => sprintf( esc_html__( '<b>Highgrade Info Bars Add-On</b> is not active. Please activate <a href="%s">here</a>', 'sage' ), plugins_url() ),
						'required'	=> array('enable_top_info_bar', '=', '1'),
					) : NULL,
					array(
						'id'		=> 'top_info_bar_select',
						'type'		=> 'select',
						'required'	=> array('enable_top_info_bar', '=', '1'),
						'data'		=> 'posts',
						'args'		=> array('post_type' => 'hgr_info_bars'),
						'title'		=> esc_html__( 'Displayed Info Bar', 'sage' ),
						'subtitle'	=> esc_html__( 'Select the info bar to be displayed.', 'sage' ),
						'desc'		=> esc_html__( 'Info Bars are a special custom post type that allows you to display some info into your website.', 'sage' ),
					),
					array(
                        'id'            => 'top_info_btn_font',
                        'type'          => 'typography',
						'required'		=> array('enable_top_info_bar', '=', '1'),
                        'title'         => esc_html__('Info Bar Button Font', 'sage'),
                        'google'        => true,
                        'font-backup'   => true,
                        'font-style'    => true,	
                        'subsets'       => true,	
                        'font-size'     => true,
                        'line-height'   => true,
                        'word-spacing'  => true,
                        'letter-spacing'=> true,
                        'color'         => false,
						'text-transform'=> true,
                        'preview'       => true,	
                        'all_styles'    => true,	
                        'output'        => array('div.top_info_bar_btn'),
                        'units'         => array('px','em'),
                        'default'       => array(
                            //'color'         => '#000',
                            'font-style'    => '400',
                            'font-family'   => 'Roboto',
                            'google'        => true,
                            'font-size'     => '14px',
                            'line-height'   => '14px',
							'text-align'	=> 'center',
						),
                        'preview' => array('text' => 'ooga booga'),
                    ),
					array(
                        'id'            => 'top_info_content_font',
                        'type'          => 'typography',
						'required'		=> array('enable_top_info_bar', '=', '1'),
                        'title'         => esc_html__('Info Bar Content Font', 'sage'),
                        'google'        => true,
                        'font-backup'   => true,
                        'font-style'    => true,	
                        'subsets'       => true,	
                        'font-size'     => true,
                        'line-height'   => true,
                        'word-spacing'  => true,
                        'letter-spacing'=> true,
                        'color'         => true,
                        'preview'       => true,	
                        'all_styles'    => true,	
                        'output'        => array('div.top_info_bar_content'),
                        'units'         => array('px','em'),
                        'default'       => array(
                            'color'         => '#000',
                            'font-style'    => '400',
                            'font-family'   => 'Roboto',
                            'google'        => true,
                            'font-size'     => '14px',
                            'line-height'   => '24px',
							'text-align'	=>	'left',
						),
                        'preview' => array('text' => 'ooga booga'),
                    ),
					array(
                        'id'            => 'top_info_bar_padding',
                        'type'          => 'spacing',
						'required'		=> array('enable_top_info_bar', '=', '1'),
                        'output'        => array('.top_info_bar'),
                        'mode'          => 'padding',
                        'all'           => false, 
                        'units'         => array('px','em'),
                        'units_extended'=> 'true',
                        'display_units' => 'true',
                        'title'         => esc_html__('Top Info Bar Padding', 'sage'),
                        'subtitle'      => esc_html__('Choose the padding you want for your info bar.', 'sage'),
                        'default'       => array(
                            'margin-top'    => '10', 
                            'margin-right'  => '30', 
                            'margin-bottom' => '10', 
                            'margin-left'   => '30'
                        )
                    ),
					/*array(
                        'id'        => 'enable_breadcrumbs',
                        'type'      => 'switch',
                        'title'     => esc_html__('Enable Breadcrumbs?', 'sage'),
                        'subtitle'  => esc_html__('Show / Hide Breadcrumbs', 'sage'),
                        'default'   => 1,
                        'on'        => esc_html__('Enabled', 'sage'),
                        'off'       => esc_html__('Disabled', 'sage'),
                    ),
					*/
					array(
                        'id'        => 'body_border',
                        'type'      => 'button_set',
                        'title'     => esc_html__('Enable body border?', 'sage'),
                        'subtitle'  => esc_html__('Do you want do display a body border?', 'sage'),
                        'options'   => array(
                            'body_border_on'	=> esc_html__('Enabled', 'sage'), 
                            'body_border_off'	=> esc_html__('Disabled', 'sage'), 
                        ), 
                        'default'   => 'body_border_off'
                    ),
					array(
						'id'		=> 'body_border_dimensions',
						'type'		=> 'dimensions',
						'title'		=> esc_html__('Body border width', 'sage'),
						'subtitle'	=> esc_html__('This must be numeric only.', 'sage'),
						'desc'		=> esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
						'width'		=> true,
						'height'	=> false,
						'output'	=> false,
						'units'		=> array('px'),
						'default'	=> array(
							'width'	=> 15, 
						),
						'required'  => array('body_border', '=', 'body_border_on'),
					),
					array(
                        'id'        => 'body_border_color',
                        'type'      => 'color_rgba',
                        'title'     => esc_html__('Body border color', 'sage'),
                        'subtitle'  => esc_html__('Style your body border color', 'sage'),
                        'default'   => array('color' => '#dd9933', 'alpha' => '1.0'),
                        'output'    => array('#hgr_top, #hgr_bottom, #hgr_left, #hgr_right'),
						'compiler'  => array('#hgr_top, #hgr_bottom, #hgr_left, #hgr_right'),
                        'mode'      => 'background',
                        'validate'  => 'colorrgba',
						'required'  => array('body_border', '=', 'body_border_on'),
                    ),
					
					array(
                        'id'        => 'section_bk_to_top_btn',
                        'type'      => 'section',
                        'title'     => esc_html__('Back to top button', 'sage'),
                        'subtitle'  => esc_html__('Style your "Back To Top" button.', 'sage'),
                        'indent'    => true // Indent all options below until the next 'section' option is set.
                    ),
					array(
                        'id'        => 'back_to_top_button',
                        'type'      => 'switch',
                        'title'     => esc_html__('Back To Top Button', 'sage'),
                        'subtitle'  => esc_html__('Show / Hide "Back to top" button', 'sage'),
                        'default'   => 1,
                        'on'        => esc_html__('Enabled', 'sage'),
                        'off'       => esc_html__('Disabled', 'sage'),
                    ),
					array(
                        'id'        => 'back_to_top_button_bg_color',
                        'type'      => 'color_rgba',
                        'title'     => esc_html__('Back to top button background color', 'sage'),
                        'subtitle'  => esc_html__('Style your back to top button just the way you want.', 'sage'),
                        'default'   => array('color' => '#dd9933', 'alpha' => '1.0'),
                        'output'    => array('.back-to-top'),
						'compiler'  => array('.back-to-top'),
                        'mode'      => 'background',
                        'validate'  => 'colorrgba',
						'required'  => array('back_to_top_button', '=', '1'),
                    ),
					array(
						'id'		=> 'back_to_top_button_dimensions',
						'type'		=> 'dimensions',
						'title'		=> esc_html__('Back to top button dimensions', 'sage'),
						'subtitle'	=> esc_html__('This must be numeric only.', 'sage'),
						'desc'		=> esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
						'width'		=> true,
						'height'	=> false,
						'output'    => false,
						'units'		=> array('px'),
						'default'	=> array(
							'width'	=> '30px', 
						),
						'required'  => array('back_to_top_button', '=', '1'),
					),
		)
    ) );
	
	
	// DEVICE SETTINGS
	Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_device',
		'icon'		=>	'el-icon-screen',
		'title'		=>	esc_html__('Device Specs', 'sage'),
		'desc'		=>	esc_html__('Responsiveness and mobile specific settings are below. Use them so your website gets the perfect look, feel and functionality on any device.', 'sage'),
        'fields'     => array(
			array(
				'id'        => 'section_media_queries',
				'type'      => 'section',
				'title'     => esc_html__('Media queries breakpoints', 'sage'),
				'subtitle'  => esc_html__('Define the breakpoints at which your layout will change, adapting to different screen sizes.', 'sage'),
				'indent'    => true,
			),
			array(
				'id'        => 'mediaquery_screen_xs',
				'type'      => 'text',
				'title'     => esc_html__('Extra Small Screen', 'sage'),
				'subtitle'  => esc_html__('Extra small devices, like phones (<480px)', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'validate'  => 'numeric',
				'default'   => '480',
			),
			array(
				'id'        => 'mediaquery_screen_s',
				'type'      => 'text',
				'title'     => esc_html__('Small Screen', 'sage'),
				'subtitle'  => esc_html__('Small devices, like tablets (≥480px)', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'validate'  => 'numeric',
				'default'   => '640',
			),
			array(
				'id'        => 'mediaquery_screen_m',
				'type'      => 'text',
				'title'     => esc_html__('Medium Screen', 'sage'),
				'subtitle'  => esc_html__('Medium devices Desktops (<=768px)', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'validate'  => 'numeric',
				'default'   => '768',
			),
			array(
				'id'        => 'mediaquery_screen_l',
				'type'      => 'text',
				'title'     => esc_html__('Large Screen', 'sage'),
				'subtitle'  => esc_html__('Large devices Desktops (<=980px)', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'validate'  => 'numeric',
				'default'   => '980',
			),
			array(
				'id'        => 'mediaquery_screen_xl',
				'type'      => 'text',
				'title'     => esc_html__('Extra Large Screen', 'sage'),
				'subtitle'  => esc_html__('Extra Large devices Desktops (<=1280px)', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'validate'  => 'numeric',
				'default'   => '1280',
			),
			array(
				'id'        => 'mediaquery_screen_xxl',
				'type'      => 'text',
				'title'     => esc_html__('XXL Screen', 'sage'),
				'subtitle'  => esc_html__('XXL devices Desktops (>1280px)', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'validate'  => 'numeric',
				'default'   => '1280',
			),
			array(
				'id'        => 'section_containers',
				'type'      => 'section',
				'title'     => esc_html__('Container sizes', 'sage'),
				'subtitle'  => esc_html__('Define the maximum width of .container for different screen sizes.', 'sage'),
				'indent'    => true,
			),
			array(
				'id'			=> 'container_xs',
				'type'		=> 'dimensions',
				'title'     => esc_html__('Extra Small Screen Container', 'sage'),
				'subtitle'  => esc_html__('This must be numeric only.', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'width'		=> true,
				'height'		=> false,
				'output'		=> array('.container_xs'),
				'units'		=> array('px'),
				'default'	=> array(
					'width'	=> '300px', 
				),
			),
			array(
				'id'			=> 'container_s',
				'type'		=> 'dimensions',
				'title'     => esc_html__('Small Screen Container', 'sage'),
				'subtitle'  => esc_html__('This must be numeric only.', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'width'		=> true,
				'height'		=> false,
				'output'		=> array('.container_s'),
				'units'		=> array('px'),
				'default'	=> array(
					'width'	=> '440px', 
				),
			),
			array(
				'id'			=> 'container_m',
				'type'		=> 'dimensions',
				'title'     => esc_html__('Medium Screen Container', 'sage'),
				'subtitle'  => esc_html__('This must be numeric only.', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'width'		=> true,
				'height'		=> false,
				'output'		=> array('.container_m'),
				'units'		=> array('px'),
				'default'	=> array(
					'width'	=> '600px', 
				),
			),
			array(
				'id'			=> 'container_l',
				'type'		=> 'dimensions',
				'title'		=> esc_html__('Large Screen Container', 'sage'),
				'subtitle'	=> esc_html__('This must be numeric only.', 'sage'),
				'desc'		=> esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'width'		=> true,
				'height'		=> false,
				'output'		=> array('.container_l'),
				'units'		=> array('px'),
				'default'	=> array(
					'width'	=> '720px', 
				),
			),
			array(
				'id'			=> 'container_xl',
				'type'		=> 'dimensions',
				'title'		=> esc_html__('Extra Large Screen Container', 'sage'),
				'subtitle'	=> esc_html__('This must be numeric only.', 'sage'),
				'desc'		=> esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'width'		=> true,
				'height'		=> false,
				'output'		=> array('.container_xl'),
				'units'		=> array('px'),
				'default'	=> array(
					'width'	=> '920px', 
				),
			),
			array(
				'id'			=> 'container_xxl',
				'type'		=> 'dimensions',
				'title'		=> esc_html__('XXL Screen Container', 'sage'),
				'subtitle'	=> esc_html__('This must be numeric only.', 'sage'),
				'desc'		=> esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'width'		=> true,
				'height'		=> false,
				'output'		=> array('.container_xxl'),
				'units'		=> array('px'),
				'default'	=> array(
					'width'	=> '1200px', 
				),
			),
			
		)
	) );
	// BRANDING SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_branding',
		'icon'		=> 'el-icon-globe',
		'title'		=>	esc_html__('Branding', 'sage'),
        'fields'		=> array(
			array(
				'id'        		=> 'logo_position',
				'type'      		=> 'button_set',
				'title'     		=> esc_html__('Logo Position', 'sage'),
				'subtitle'  		=> esc_html__('Logo position into the header', 'sage'),
				'description'  	=> esc_html__('You can have a left positioned logo and the menu to the right, OR a centered logo a menu on each side of it.', 'sage'),
				'options'  		=> array(
					'left_logo'		=> esc_html__('Left logo', 'sage'), 
					'centered_logo'	=> esc_html__('Centered logo', 'sage'), 
				), 
				'default'   => 'left_logo'
			),
			array(
				'id'				=>	'logo',
				'type'			=>	'media',
				'title'			=>	esc_html__('Regular logo', 'sage'),
				'subtitle'		=>	esc_html__('Upload your logo. <br>Recomended: 174px x 60px transparent .png', 'sage'),
				'url'			=>	true,
				'mode'			=>	false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'		=>	array( 'url'=>get_template_directory_uri().'/highgrade/images/logo.png', 'width'=>'174', 'height'=>'60' ),
				'hint'			=>	array(
					'content'	=>	'Please respect the recommended dimensions, in order to have a perfect-look branding.',
				)
			),
			array(
				'id'				=>	'retina_logo',
				'type'			=>	'media',
				'title'			=>	esc_html__('Retina Logo @2x', 'sage'),
				'subtitle'		=>	esc_html__('Upload your retina logo. <br>Recomended: 348px x 120px transparent .png', 'sage'),
				'url'			=>	true,
				'mode'			=>	false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'		=>	array( 'url'=>get_template_directory_uri().'/highgrade/images/logo@2x.png','width'=>'174', 'height'=>'60' ),
				'hint'			=>	array(
					'content'	=>	'Please respect the recommended dimensions, in order to have a perfect-look branding.',
				)
			),
			array(
				'id'				=>	'favicon',
				'type'			=>	'media',
				'title'			=>	esc_html__('Regular Favicon', 'sage'),
				'subtitle'		=>	esc_html__('Upload your favicon. <br>Recomended: 16px x 16px transparent .png file', 'sage'),
				'url'			=>	true,
				'mode'			=>	false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'		=>	array('url'=>get_template_directory_uri().'/highgrade/images/favicon.png'),
				'hint'			=>	array(
					'content'	=>	'Please respect the recommended dimensions, in order to have a perfect-look branding.',
				)
			),
			array(
				'id'				=>	'retina_favicon',
				'type'			=>	'media',
				'title'			=>	esc_html__('Retina Favicon @2x', 'sage'),
				'subtitle'		=>	esc_html__('Upload your retina favicon. <br>Recomended: 32px x 32px transparent .png file', 'sage'),
				'url'			=>	true,
				'mode'			=>	false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'		=>	array('url'=>get_template_directory_uri().'/highgrade/images/favicon@2x.png'),
				'hint'			=>	array(
					'content'	=>	'Please respect the recommended dimensions, in order to have a perfect-look branding.',
				)
			),
			array(
				'id'				=>	'iphone_icon',
				'type'			=>	'media',
				'title'			=>	esc_html__('Apple iPhone Icon', 'sage'),
				'subtitle'		=>	esc_html__('Upload your Apple iPhone icon. <br>Recomended: 60px x 60px transparent .png file', 'sage'),
				'url'			=>	true,
				'mode'			=>	false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'		=>	array('url'=>get_template_directory_uri().'/highgrade/images/iphone-favicon.png'),
				'hint'			=>	array(
					'content'	=>	'Please respect the recommended dimensions, in order to have a perfect-look branding.',
				)
			),
			array(
				'id'				=>	'retina_iphone_icon',
				'type'			=>	'media',
				'title'			=>	esc_html__('Apple iPhone Retina Icon @2x', 'sage'),
				'subtitle'		=>	esc_html__('Upload your Apple iPhone Retina icon. <br>Recomended: 120px x 120px transparent .png file', 'sage'),
				'url'			=>	true,
				'mode'			=>	false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'		=>	array('url'=>get_template_directory_uri().'/highgrade/images/iphone-favicon@2x.png'),
				'hint'			=>	array(
					'content'	=>	'Please respect the recommended dimensions, in order to have a perfect-look branding.',
				)
			),
			array(
				'id'				=>	'ipad_icon',
				'type'			=>	'media',
				'title'			=>	esc_html__('Apple iPad Icon', 'sage'),
				'subtitle'		=>	esc_html__('Upload your Apple iPad icon. <br>Recomended: 76px x 76px transparent .png file', 'sage'),
				'url'			=>	true,
				'mode'			=>	false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'		=>	array('url'=>get_template_directory_uri().'/highgrade/images/ipad-favicon.png'),
				'hint'			=>	array(
					'content'	=>	'Please respect the recommended dimensions, in order to have a perfect-look branding.',
				)
			),
			array(
				'id'				=>	'ipad_retina_icon',
				'type'			=>	'media',
				'title'			=>	esc_html__('Apple iPad Retina Icon @2x', 'sage'),
				'subtitle'		=>	esc_html__('Upload your Apple iPad Retina icon. <br>Recomended: 152px x 152px transparent .png file', 'sage'),
				'url'			=>	true,
				'mode'			=>	false, // Can be set to false to allow any media type, or can also be set to any mime type.
				'default'		=>	array('url'=>get_template_directory_uri().'/highgrade/images/ipad-favicon@2x.png'),
				'hint'			=>	array(
					'content'	=>	'Please respect the recommended dimensions, in order to have a perfect-look branding.',
				)
			),
		)
    ) );
	
	// COLORS SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_colors',
		'icon'		=>	'el-icon-eye-open',
		'title'		=>	esc_html__('Colors', 'sage'),
		'desc'		=>	esc_html__('You can setup two color schemes: dark and light', 'sage'),
        'fields'     => array(
			array(
				'id'				=>	'bg_color',
				'type'			=>	'color',
				'validate'		=>	'color',
				'compiler'		=>	array('body'),
				'output'			=>	array('body'),
				'title'			=>	esc_html__('Body Background Color', 'sage'), 
				'subtitle'		=>	esc_html__('Pick a background color for the theme.', 'sage'),
				'default'		=>	'#666666',
			),
			array(
				'id'				=>	'theme_dominant_color',
				'type'			=>	'color',
				'validate'		=>	'color',
				'compiler'		=>	array('.theme_dominant_color'),
				'output'			=>	array('.theme_dominant_color'),
				'title'			=>	esc_html__('Theme dominant color', 'sage'), 
				'subtitle'		=>	esc_html__('Pick a dominant color for the theme.', 'sage'),
				'hint'			=>	array(
					'content'	=>	'Theme dominant color its used on certain elements, for witch you do not have a specific option to define a color.',
				),
				'default'		=>	'#dd9933',
			),
		)
    ) );
	
	// COLORS SECTION - Dark Color Scheme
    Redux::setSection( $opt_name, array(
        'title'		=>	esc_html__('Dark Color Scheme', 'sage'),
        'id'         => 'hgr_dark_colors',
		'subsection' => true,
        'fields'     => array(
			array(
				'id'			=>	'dark-scheme-info',
				'type'		=>	'info',
				'desc'		=>	esc_html__('Color options settings for "dark" color scheme (website sections that feature a dark image or background color; a light text color is recommended for these sections).', 'sage'),
			),
			array(
				'id'			=>	'ds_text_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.dark_scheme'),
				'output'		=>	array('.dark_scheme'),
				'title'		=>	esc_html__('Text color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for text.', 'sage'),
				'default'	=>	'#e0e0e0',
			),
			array(
				'id'			=>	'h1_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.dark_scheme h1'),
				'output'		=>	array('.dark_scheme h1'),
				'title'		=>	esc_html__('H1 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H1 tags.', 'sage'),
				'default'	=>	'#ffffff',
			),
			array(
				'id'			=>	'h2_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.dark_scheme h2'),
				'output'		=>	array('.dark_scheme h2'),
				'title'		=>	esc_html__('H2 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H2 tags.', 'sage'),
				'default'	=>	'#ffffff',
			),
			array(
				'id'			=>	'h3_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.dark_scheme h3'),
				'output'		=>	array('.dark_scheme h3'),
				'title'		=>	esc_html__('H3 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H3 tags.', 'sage'),
				'default'	=>	'#e0e0e0',
			),
			array(
				'id'			=>	'h4_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.dark_scheme h4'),
				'output'		=>	array('.dark_scheme h4'),
				'title'		=>	esc_html__('H4 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H4 tags.', 'sage'),
				'default'	=>	'#ffffff',
			),
			array(
				'id'			=>	'h5_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.dark_scheme h5'),
				'output'		=>	array('.dark_scheme h5'),
				'title'		=>	esc_html__('H5 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H5 tags.', 'sage'),
				'default'	=>	'#ffffff',
			),
			array(
				'id'			=>	'h6_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.dark_scheme h6'),
				'output'		=>	array('.dark_scheme h6'),
				'title'		=>	esc_html__('H6 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H6 tags.', 'sage'),
				'default'	=>	'#ffffff',
			),
			array(
				'id'        	=>	'ahref_color',
				'type'      	=>	'link_color',
				'compiler'	=>	array('.dark_scheme a'),
				'output'		=>	array('.dark_scheme a'),
				'title'		=>	esc_html__('Links Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for links.', 'sage'),
				'desc'      	=>	esc_html__('Setup links color on regular and hovered state.', 'sage'),
				'regular'   	=>	true,	// Enable / Disable Regular Color
				'hover'     	=>	true,	// Enable / Disable Hover Color
				'active'    	=>	false,	// Enable / Disable Active Color
				'visited'   	=>	false,	// Enable / Disable Visited Color
				'default'   	=>	array(
					'regular'	=>	'#e0e0e0',
					'hover'		=>	'#dd9933',
				)
			),
		)
    ) );
	
	// COLORS SECTION - Light Color Scheme
    Redux::setSection( $opt_name, array(
        'title'		=>	esc_html__('Light Color Scheme', 'sage'),
        'id'         => 'hgr_light_colors',
		'subsection' => true,
        'fields'     => array(
			array(
				'id'			=>	'light-scheme-info',
				'type'		=>	'info',
				'desc'		=>	esc_html__('Color options settings for "light" color scheme (website sections that feature a light image or background color; a dark text color is recommended for these sections).', 'sage'),
			),
			array(
				'id'			=>	'ls_text_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.light_scheme'),
				'output'		=>	array('.light_scheme'),
				'title'		=>	esc_html__('Text color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for text.', 'sage'),
				'default'	=>	'#848484',
			),
			array(
				'id'			=>	'light_h1_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.light_scheme h1'),
				'output'		=>	array('.light_scheme h1'),
				'title'		=>	esc_html__('H1 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H1 tags.', 'sage'),
				'default'	=>	'#222222',
			),
			array(
				'id'			=>	'light_h2_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.light_scheme h2'),
				'output'		=>	array('.light_scheme h2'),
				'title'		=>	esc_html__('H2 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H2 tags.', 'sage'),
				'default'	=>	'#222222',
			),
			array(
				'id'			=>	'light_h3_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.light_scheme h3'),
				'output'		=>	array('.light_scheme h3'),
				'title'		=>	esc_html__('H3 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H3 tags.', 'sage'),
				'default'	=>	'#666666',
			),
			array(
				'id'			=>	'light_h4_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.light_scheme h4'),
				'output'		=>	array('.light_scheme h4'),
				'title'		=>	esc_html__('H4 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H4 tags.', 'sage'),
				'default'	=>	'#222222',
			),
			array(
				'id'			=>	'light_h5_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.light_scheme h5'),
				'output'		=>	array('.light_scheme h5'),
				'title'		=>	esc_html__('H5 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H5 tags.', 'sage'),
				'default'	=>	'#222222',
			),
			array(
				'id'			=>	'light_h6_color',
				'type'		=>	'color',
				'validate'	=>	'color',
				'compiler'	=>	array('.light_scheme h6'),
				'output'		=>	array('.light_scheme h6'),
				'title'		=>	esc_html__('H6 Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for H6 tags.', 'sage'),
				'default'	=>	'#848484',
			),
			array(
				'id'        	=>	'light_ahref_color',
				'type'      	=>	'link_color',
				'compiler'	=>	array('.light_scheme a'),
				'output'		=>	array('.light_scheme a'),
				'title'		=>	esc_html__('Links Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for links.', 'sage'),
				'desc'      	=>	esc_html__('Setup links color on regular and hovered state.', 'sage'),
				'regular'   	=>	true,	// Enable / Disable Regular Color
				'hover'     	=>	true,	// Enable / Disable Hover Color
				'active'    	=>	false,	// Enable / Disable Active Color
				'visited'   	=>	false,	// Enable / Disable Visited Color
				'default'   	=>	array(
					'regular'	=>	'#848484',
					'hover'		=>	'#dd9933',
				)
			),
		)
    ) );
	
	// TYPOGRAPHY SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_typography',
		'icon'      => 'el-icon-fontsize',
		'title'		=>	esc_html__('Typography', 'sage'),
		'desc'		=>	esc_html__('Setup the fonts that will be used in your theme. You can choose from Standard Fonts and Google Web Fonts.', 'sage'),
        'fields'     => array(
			array(
				'id'					=>	'body-font',
				'type'				=>	'typography',
				'title'				=>	esc_html__('Body Font', 'sage'),
				'subtitle' 			=>	esc_html__('Specify the body font properties.', 'sage'),
				'compiler'			=>	array('body, .megamenu'),
				'output'				=>	array('body, .megamenu'),
				'google'				=>	true,
				'color'				=>	false,
				'text-transform'	=>	true,
				'letter-spacing'	=>	true,
				'default'			=>	array(
					'font-size'			=>	'14px',
					'line-height'		=>	'28px',
					'font-family'		=>	'Roboto',
					'font-weight'		=>	'400',
				),
			),
			array(
				'id'					=>	'h1-font',
				'type'				=>	'typography',
				'title'				=>	esc_html__('H1 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H1 font properties.', 'sage'),
				'compiler'			=>	array('h1, .megamenu h1'),
				'output'				=>	array('h1, .megamenu h1'),
				'google'				=>	true,
				'color'				=>	false,
				'text-transform'	=>	true,
				'letter-spacing'	=>	true,
				'default'			=>	array(
					'font-size'			=>	'60px',
					'line-height'		=>	'72px',
					'font-family'		=>	'Roboto Slab',
					'font-weight'		=>	'300',
				),
			),
			array(
				'id'					=>	'h2-font',
				'type'				=>	'typography',
				'title'				=>	esc_html__('H2 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H2 font properties.', 'sage'),
				'compiler'			=>	array('h2, .megamenu h2'),
				'output'				=>	array('h2, .megamenu h2'),
				'google'				=>	true,
				'color'				=>	false,
				'text-transform'	=>	true,
				'letter-spacing'	=>	true,
				'default'			=>	array(
					'font-size'			=>	'36px',
					'line-height'		=>	'40px',
					'font-family'		=>	'Roboto Slab',
					'font-weight'		=>	'300',
				),
			),
			array(
				'id'					=>	'h3-font',
				'type'				=>	'typography',
				'title'				=>	esc_html__('H3 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H3 font properties.', 'sage'),
				'compiler'			=>	array('h3, .megamenu h3'),
				'output'				=>	array('h3, .megamenu h3'),
				'google'				=>	true,
				'color'				=>	false,
				'text-transform'	=>	true,
				'letter-spacing'	=>	true,
				'default'			=>	array(
					'font-size'			=>	'48px',
					'line-height'		=>	'56px',
					'font-family'		=>	'Dancing Script',
					'font-weight'		=>	'',
				),
			),
			array(
				'id'					=>	'h4-font',
				'type'				=>	'typography',
				'title'				=>	esc_html__('H4 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H4 font properties.', 'sage'),
				'compiler'			=>	array('h4, .megamenu h4'),
				'output'				=>	array('h4, .megamenu h4'),
				'google'				=>	true,
				'color'				=>	false,
				'text-transform'	=>	true,
				'letter-spacing'	=>	true,
				'default'			=>	array(
					'font-size'			=>	'18px',
					'line-height'		=>	'30px',
					'font-family'		=>	'Roboto Slab',
					'font-weight'		=>	'400',
				),
			),
			array(
				'id'					=>	'h5-font',
				'type'				=>	'typography',
				'title'				=>	esc_html__('H5 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H5 font properties.', 'sage'),
				'compiler'			=>	array('h5, .megamenu h5'),
				'output'				=>	array('h5, .megamenu h5'),
				'google'				=>	true,
				'color'				=>	false,
				'text-transform'	=>	true,
				'letter-spacing'	=>	true,
				'default'			=> array(
					'font-size'			=>	'14px',
					'line-height'		=>	'24px',
					'font-family'		=>	'Roboto Condensed',
					'font-weight'		=>	'700',
				),
			),
			array(
				'id'					=>	'h6-font',
				'type'				=>	'typography',
				'title'				=> 	esc_html__('H6 Font', 'sage'),
				'subtitle'			=> 	esc_html__('Specify the H6 font properties.', 'sage'),
				'compiler'			=> 	array('h6, .megamenu h6'),
				'output'				=> 	array('h6, .megamenu h6'),
				'google'				=>	true,
				'color'				=>	false,
				'text-transform'	=>	true,
				'letter-spacing'	=>	true,
				'default'			=>	array(
					'font-size'			=>	'12px',
					'line-height'		=>	'18px',
					'font-family'		=>	'Source Sans Pro',
					'font-weight'		=>	'300',
				),
			),
		)
    ) );
	
	// HEADER & MENU SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_menu',
		'icon'		=> 'el-icon-website',
		'title'		=>	esc_html__('Header & Menu', 'sage'),
        'fields'		=> array(
			/* HEADER STYLE */
			array(
				'id'        => 'section_menu_style',
				'type'      => 'section',
				'title'     => esc_html__('Menu Styling', 'sage'),
				'subtitle'  => esc_html__('Customize your menu.', 'sage'),
				'indent'    => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'        => 'menu_bar_width',
				'type'      => 'button_set',
				'title'     => esc_html__('Full-Widht or Boxed?', 'sage'),
				'subtitle'  => esc_html__('Do you want your menu bar to expand full width or to be contained?', 'sage'),
				'options'   => array(
					'menu_full_width'	=> esc_html__('Full Width', 'sage'), 
					'menu_contained'	=> esc_html__('Contained', 'sage'), 
				), 
				'default'   => 'menu_contained'
			),
			
			array(
				'id'				=>	'menu-font',
				'type'			=>	'typography',
				'title'			=>	esc_html__('Menu Font', 'sage'),
				'subtitle'		=>	esc_html__('Specify the menu font properties.', 'sage'),
				'compiler'		=>	array('.bka_menu, .bka_menu .navbar-default .navbar-nav>li>a, .dropdown-menu > li > a'),
				'output'			=>	array('.bka_menu, .bka_menu .navbar-default .navbar-nav>li>a, .dropdown-menu > li > a'),
				'google'			=>	true,
				'letter-spacing'=>	true,
				'text-transform'=>	true,
				'color'			=>	false,
				'default'		=>	array(
					'font-size'			=>	'14px',
					'line-height'		=>	'60px',
					'font-family'		=>	'Roboto',
					'font-weight'		=>	'400',
					'letter-spacing'	=>	'',
				),
			),
			array(
				'id'        	=>	'menu-font-hover-color',
				'type'      	=>	'link_color',
				'compiler'	=>	array('.bka_menu .navbar-default .navbar-nav>li>a','.dropdown-menu>li>a'),
				'output'		=>	array('.bka_menu .navbar-default .navbar-nav>li>a','.dropdown-menu>li>a'),
				'title'		=>	esc_html__('Menu Font Color', 'sage'),
				'subtitle'	=>	esc_html__('Specify the menu font color.', 'sage'),
				'regular'   	=>	true,	// Enable / Disable Regular Color
				'hover'     	=>	true,	// Enable / Disable Hover Color
				'active'    	=>	false,	// Enable / Disable Active Color
				'visited'   	=>	false,	// Enable / Disable Visited Color
				'default'   	=>	array(
					'regular'	=>	'#000000',
					'hover'		=>	'#dd9933',
				)
			),
			
			/* HEADER BAR */
			/*array(
				'id'        => 'section_header_bar',
				'type'      => 'section',
				'title'     => esc_html__('Header Bar', 'sage'),
				'subtitle'  => esc_html__('Enable or disable header bar.', 'sage'),
				'indent'    => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'        => 'header_bar',
				'type'      => 'button_set',
				'title'     => esc_html__('Enable Header Bar?', 'sage'),
				'subtitle'  => esc_html__('Do you want to display a header bar?', 'sage'),
				'options'   => array(
					'header_bar_on'		=> esc_html__('Enabled', 'sage'), 
					'header_bar_off'	=> esc_html__('Disabled', 'sage'), 
				), 
				'default'   => 'header_bar_off'
			),*/
			
			/* HEADER STYLE */
			array(
				'id'        => 'section_header_style_one',
				'type'      => 'section',
				'title'     => esc_html__('Header Styling', 'sage'),
				'subtitle'  => esc_html__('Customize your header.', 'sage'),
				'indent'    => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'			=>	'header_floating',
				'type'		=>	'select',
				'title'     => esc_html__('Header bar display', 'sage'),
				//'subtitle'  => esc_html__('Do you want to display "Header" as fixed or to float as scrolling?', 'sage'),
				'options'   => array(
					'1' => esc_html__('Fixed Header', 'sage'), 
					'2' => esc_html__('Hidden, appears after scrolling', 'sage'),
					'3' => esc_html__('Displayed, dissapears after scrolling', 'sage'), 
					'4' => esc_html__('Large, shrinks after scrolling', 'sage'),
					'5' => esc_html__('Transparent before scrolling', 'sage'), 
				),
				'default'	=>	'3',
				'hint'		=>	array(
					'content'	=>	'<strong>Fixed Header:</strong> header is fixed, and stays there no matter if you scroll.<br><br>
									<strong>Hidden, appears after scrolling:</strong> This is hidden when page loads, and after a certain amount of scrolling (settings below) it appears.<br><br>
									<strong>Displayed, disappears after scrolling:</strong> This is displayed when page loads, and after a certain amount of scrolling (settings below) it disappears. As you start to scroll back to top it appears.<br><br>
									<strong>Large, shrinks after scrolling:</strong> Initially displayed as a large header. The initial height is set by adding padding (settings below). After a certain amount of scrolling (settings below) it shrinks. Shrinked dimensions are set below by modifying the paddings to a lower value.<br><br>
									<strong>Transparent before scrolling:</strong> Initially displayed as a transparent header. It scrolls with the page, and, after a certain amount of scrolling (settings below) it appears as transparent or with a background color (settings below).<br><br>
									<strong>NOTE</strong> Some specific settings (ex: necessary pixels to scroll) are displayed only if specific header type selected.
								',
				)
			),
			
			// Hidden, display after scroll
			array(
				'id'                => 'header_floating_display_after',
				'type'              => 'dimensions',
				'width'          	=> false,
				'units'             => array('px'),   // You can specify a unit value. Possible: px, em, %
				'units_extended'    => 'false',  // Allow users to select any type of unit
				'title'             => esc_html__('Display header after scrolling:', 'sage'),
				'output'    			=> false,
				'default'           => array('height' => '200'),
				'required'  			=> array('header_floating', '=', '2'),
				'hint'				=>	array(
					'content'	=>	'<p>Define the scroll amount necesarry for header bar to be displayed. <br><strong>Leave blank for window screen height</strong>.</p>',
				)
			),
			
			
			// Displayed, hidden after scroll
			array(
				'id'                => 'header_floating_hide_after',
				'type'              => 'dimensions',
				'width'          	=> false,
				'units'             => array('px'),
				'units_extended'    => 'false',
				'title'             => esc_html__('Hide header after scrolling:', 'sage'),
				'output'    			=> false,
				'default'           => array('height' => '200'),
				'required'  			=> array('header_floating', '=', '3'),
				'hint'				=>	array(
					'content'	=>	'<p>Define the scroll amount necesarry for header bar to be hidden. <br><strong>Leave blank for window screen height</strong>.</p>',
				)
			),
			
			// SHRINKING SETTINGS
			array(
				'id'                => 'header_shrink_after_scroll',
				'type'              => 'dimensions',
				'width'          	=> false,
				'units'             => array('px'),
				'units_extended'    => 'false',
				'title'             => esc_html__('Shrink header after scrolling:', 'sage'),
				'output'    			=> false,
				'default'           => array('height' => '200'),
				'required'  			=> array('header_floating', '=', '4'),
				'hint'				=>	array(
					'content'	=>	'<p>Define the scroll amount necesarry for header bar to shrink. <br><strong>Leave blank for window screen height</strong>.<br> Use padding settings below to setup height of the header bar, before and after scroll.</p>',
				)
			),
			array(
				'id'            => 'menu_bar_padding_start',
				'type'          => 'spacing',
				'mode'          => 'padding',
				'all'           => false, 
				'units'         => array('px','em'),
				'units_extended'=> 'true',
				'display_units' => 'true',
				'title'         => esc_html__('Initial Header Padding', 'sage'),
				'default'       => array(
					'margin-top'    => '20px', 
					'margin-right'  => '0px', 
					'margin-bottom' => '20px', 
					'margin-left'   => '0px'
				),
				'required'  		=> array('header_floating', '=', '4'),
				'hint'				=>	array(
					'content'	=>	'<p>The initial height of the header is given with the help of paddings. Here you can setup the initial values (large header). For example, setup a 20px padding for top and bottom.</p>',
				)
			),
			array(
				'id'            => 'menu_bar_padding_end',
				'type'          => 'spacing',
				'mode'          => 'padding',
				'all'           => false, 
				'units'         => array('px','em'),
				'units_extended'=> 'true',
				'display_units' => 'true',
				'title'         => esc_html__('Final Header Padding', 'sage'),
				'default'       => array(
					'margin-top'    => '0px', 
					'margin-right'  => '0px', 
					'margin-bottom' => '0px', 
					'margin-left'   => '0px'
				),
				'required'  		=> array('header_floating', '=', array('4','5')),
				'hint'				=>	array(
					'content'	=>	'<p>For the shriking effect, here we setup smaller values for top and bottom paddings. For example, a 0 value will reduce the header height to the menu height, which is the smalles possible value for the header bar.</p>',
				)
			),
			
			// TRANSPARENT SETTINGS
			array(
				'id'                => 'header_transparent_display_after',
				'type'              => 'dimensions',
				'width'          	=> false,
				'units'             => array('px'),   // You can specify a unit value. Possible: px, em, %
				'units_extended'    => 'false',  // Allow users to select any type of unit
				'title'             => esc_html__('Slide down after:', 'sage'),
				'subtitle'          => esc_html__('Header bar is scrolling up with the page. After this amount of scrolling it floats down and remains fixed to page top.', 'sage'),
				'output'    			=> false,
				'default'           => array('height' => '200'),
				'required'  			=> array('header_floating', '=', '5'),
				'hint'				=>	array(
					'content'	=>	esc_html__('Define the scroll amount necesarry for header bar to be displayed. Leave blank for window screen height.', 'sage'),
				)
			),
			array(
				'id'            => 'header_transp_bg_opacity_after_scroll',
				'type'          => 'slider',
				'title'     => esc_html__('Header Background Opacity After Scroll', 'sage'),
				'subtitle'  => esc_html__('0 = Transparent, 1 - Opaque', 'sage'),
				'default'       => 1,
				'min'           => 0,
				'step'          => .1,
				'max'           => 1,
				'resolution'    => 0.1,
				'display_value' => 'text',
				'required'  => array('header_floating', '=', '5'),
			),
			
			
			array(
				'id'        => 'header_background_type',
				'type'      => 'button_set',
				'title'     => esc_html__('Header background type:', 'sage'),
				'options'   => array(
					'1' => esc_html__('Color', 'sage'), 
					'2' => esc_html__('Image', 'sage'), 
				),
				'default'   => '1',
				'hint'			=>	array(
					'content'	=>	esc_html__('What kind of background you wanna use for your header? You can have solid color, semi-transparent color, full transparent header, OR, you can use a image or a pattern.', 'sage'),
				)
			),
			
			
			// FIXED SETTINGS
			array(
				'id'        => 'header_background_rgba',
				'type'      => 'color_rgba',
				'title'     => esc_html__('Header Background color', 'sage'),
				'default'   => array('color' => '#ffffff', 'alpha' => '1.0'),
				'output'    => array('.bka_menu, .navbar-collapse.in, .navbar-collapse.colapsing, #mainNavUl .dropdown-menu, li.dropdown.open, #mainNavUlLeft .dropdown-menu, li.dropdown.open, #mainNavUlRight .dropdown-menu, li.dropdown.open'),
				'mode'      => 'background',
				'validate'  => 'colorrgba',
				'required'  => array('header_background_type', '=', '1'),
				'hint'			=>	array(
					'content'	=>	esc_html__('Gives you the RGBA color for header background. Also, this is where you set up the transparency grade.', 'sage'),
				)
				
			),
			
			
			// Header BG color for TRANSPARENT
			array(
				'id'        => 'header_transparent_bg_rgba',
				'type'      => 'color_rgba',
				'title'     => esc_html__('Header Background color', 'sage'),
				'subtitle'  => esc_html__('Gives you the RGBA color for background.', 'sage'),
				'default'   => array('color' => '#ffffff', 'alpha' => '1.0'),
				//'output'    => array('.bka_menu, .navbar-collapse.in, .navbar-collapse.colapsing, #mainNavUl .dropdown-menu, li.dropdown.open'),
				'mode'      => 'background',
				'validate'  => 'colorrgba',
				'required'  => array('header_background_type', '=', '5'),
			),
			array(
				'id'        			=> 'header_background_image',
				'type'      			=> 'background',
				'output'   			=> array('.bka_menu, .navbar-collapse.in, .navbar-collapse.colapsing,#mainNavUl .dropdown-menu'),
				'title'    			=> esc_html__('Header Background Image or Pattern', 'sage'),
				'subtitle'  			=> esc_html__('Pick a background image or pattern for the header.', 'sage'),
				'default'   			=> '',
				'background-color'	=> false,
				'required' 			=> array('header_background_type', '=', '2'),
			),
			
			
			
			
			// GERERAL SETTINGS
			array(
				'id'        => 'header_opacity_change_after_scroll',
				'type'      => 'button_set',
				'title'     => esc_html__('Do you want header to change opacity after scroll?', 'sage'),
				'options'   => array(
					'1' => esc_html__('Yes', 'sage'), 
					'2' => esc_html__('No', 'sage'), 
				),
				'default'   => '1',
				'required'  => array('header_floating', '=', '1'),
			),
			array(
				'id'                => 'header_background_opacity_change_after_amount',
				'type'              => 'dimensions',
				'width'          	=> false,
				'units'             => array('px'),   // You can specify a unit value. Possible: px, em, %
				'units_extended'    => 'false',  // Allow users to select any type of unit
				'title'             => esc_html__('Change opacity after scrolling X pixels', 'sage'),
				'subtitle'          => esc_html__('Define the scroll amount necesarry for menu to change opacity.  Insert -1 for window screen height.', 'sage'),
				'output'    		=> false,
				'default'           => array('height' => '200'),
				'required'  => array('header_opacity_change_after_scroll', '=', '1'),
			),
			array(
				'id'            => 'header_background_opacity_after_scroll',
				'type'          => 'slider',
				'title'     => esc_html__('Header Background Opacity After Scroll', 'sage'),
				'subtitle'  => esc_html__('0 = Transparent, 1 - Opaque', 'sage'),
				'default'       => 1,
				'min'           => 0,
				'step'          => .1,
				'max'           => 1,
				'resolution'    => 0.1,
				'display_value' => 'text',
				'required'  => array('header_opacity_change_after_scroll', '=', '1'),
			),
			array(
				'id'        => 'header_border',
				'type'      => 'border',
				'title'     => esc_html__('Header Border', 'sage'),
				'compiler'	=> array('.bka_menu'),
				'output'    => array('.bka_menu'),
				'desc'      => esc_html__('Setup header border, in pixels (top, right, bottom, left).', 'sage'),
				'all'       => false,
				'default'   => array(
					'border-color'  => '#cecece', 
					'border-style'  => 'solid', 
					'border-top'    => '0px', 
					'border-right'  => '0px', 
					'border-bottom' => '0px', 
					'border-left'   => '0px',
				)
			),
	
			array(
				'id'            => 'header_margins',
				'type'          => 'spacing',
				'output'        => array('.bka_menu'), // An array of CSS selectors to apply this font style to
				'mode'          => 'margin',    // absolute, padding, margin, defaults to padding
				'all'           => false,        // Have one field that applies to all
				'units'         => array('px','em'), // You can specify a unit value. Possible: px, em, %
				'units_extended'=> 'true',    // Allow users to select any type of unit
				'display_units' => 'true',   // Set to false to hide the units if the units are specified
				'title'         => esc_html__('Header Margins', 'sage'),
				'subtitle'      => esc_html__('Choose the margin you want for your header.', 'sage'),
				'default'       => array(
					'margin-top'    => '0', 
					'margin-right'  => '0', 
					'margin-bottom' => '0', 
					'margin-left'   => '0'
				)
			),
			array(
				'id'            => 'menu_bar_padding',
				'type'          => 'spacing',
				'output'        => array('.bka_menu'),
				'mode'          => 'padding',
				'all'           => false, 
				'units'         => array('px','em'),
				'units_extended'=> 'true',
				'display_units' => 'true',
				'title'         => esc_html__('Header Padding', 'sage'),
				'subtitle'      => esc_html__('Choose the padding you want for your header.', 'sage'),
				'default'       => array(
					'margin-top'    => '0', 
					'margin-right'  => '0', 
					'margin-bottom' => '0', 
					'margin-left'   => '0'
				),
				'required'  		=> array('header_floating', '!=', '4'),
			),
		)
    ) );
	
	// FOOTER SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_footer',
		'icon'		=> 'el-icon-hand-down',
		'title'		=>	esc_html__('Footer', 'cast'),
        'fields'		=> array(
			array(
				'id'        => 'footer_fallback',
				'type'      => 'section',
				'title'     => esc_html__('Footer Fallback', 'cast'),
				'indent'    => true, // Indent all options below until the next 'section' option is set.
			),
			array(
				'id'			=> 'footer-bgcolor',
				'type'		=> 'color',
				'title'		=>	esc_html__('Footer background color', 'cast'), 
				'subtitle'	=>	esc_html__('Set the background color for footer', 'cast'),
				'default'	=> '#222222',
				'validate'	=> 'color',
			),
			array(
				'id'			=>	'footer_color_scheme',
				'type'		=>	'select',
				'title'		=>	esc_html__('Color scheme to use on footer', 'cast'), 
				'options'	=>	array('dark_scheme' => 'Dark scheme','light_scheme' => 'Light scheme'),
				'default'	=>	'dark_scheme'
			),
			array(
				'id'			=>	'footer-copyright',
				'type'		=>	'textarea',
				'validate'	=>	'html',
				'title'		=>	esc_html__('Footer copyright text', 'cast'), 
				'subtitle'	=>	esc_html__('If empty, this section will be hidden.', 'cast'),
				'desc'		=>	esc_html__('HTML is permited', 'cast'),
				'default'	=>	'Copyright 2015 <a href="http://www.highgradelab.com">HighGrade</a>. All rights reserved.'
			),
		)
    ) );
	// MEGA FOOTER SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_megafooter',
		'icon'		=> 'el-icon-hand-down',
		'title'		=>	esc_html__('HGR MegaFooter', 'cast'),
		'subsection'=> true,
        'fields'		=> array(
			
			!is_plugin_active('hgr_megafooter/hgr_megafooter.php') 
			? 
			array(
						'id'    => 'hgr_megafooter_support_info',
						'type'  => 'info',
						'style' => 'warning',
						'title' => esc_html__( 'HGR MegaFooter Warning', 'cast' ),
						'desc'  => sprintf( '%s <a href="%s">HGR MegaFooter</a> %s', esc_html__('Please first install and activate', 'cast'), admin_url('plugins.php'), esc_html__('otherwise the "Footer Fallback" settings will be used.', 'cast') ),
			)
			: NULL,
			array(
				'id'		=> 'hgr_megafooter_select',
				'type'		=> 'select',
				'data'		=> 'posts',
				'args'		=> array('post_type' => 'hgr_megafooter'),
				'title'		=> esc_html__( 'Default MegaFooter', 'cast' ),
				'subtitle'	=> esc_html__( 'Select the default MegaFooter to be displayed on all pages.', 'cast' ),
				'desc'		=> esc_html__( 'You can opt for a specific MegaFooter on a specific page when you edit that page. Otherwise, the default MegaFooter will be used on all pages across entire website', 'cast' ),
			),
		)
    ) );
	
	
	/*
	// PORTFOLIO SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_portfolio',
		'icon'		=> 'el-icon-cogs',
		'title'		=>	esc_html__('Portfolio', 'sage'),
        'fields'		=> array(
			array(
				'id'			=>	'portfolio-items-select',
				'type'		=>	'select',
				'title'		=>	esc_html__('Portfolio items to show', 'sage'), 
				'options'	=>	array('2' => '2','3' => '3','4' => '4','5' => '5','6' => '6','8' => '8', '9' => '9', '10'=>'10', '12'=>'12', '16'=>'16', '18'=>'18', '20'=>'20', '24'=>'24', 'All'=>'99999', ),
				'default' 	=>	'8'
			),
			array(
				'id'			=>	'portfolio-order-by',
				'type'		=>	'select',
				'title'		=>	esc_html__('Order by', 'sage'), 
				'subtitle'	=>	esc_html__('Order portfolio items by...', 'sage'),
				'options'	=>	array('title' => 'Title', 'date' => 'Date','id' => 'ID','rand' => 'Random'),
				'default'	=>	'date'
			),
			array(
				'id'			=>	'portfolio-order',
				'type'		=>	'select',
				'title'		=>	esc_html__('Order', 'sage'), 
				'options'	=>	array('ASC' => 'Ascending','DESC' => 'Descending'),
				'default'	=>	'DESC'
			),
		)
    ) );
	*/
	
	// CONTACT FORM SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_contactform',
		'icon'		=>	'el el-brush',
		'title'		=>	esc_html__('Contact Form', 'sage'),
		'desc'		=>	esc_html__('Style your Contact Form', 'sage'),
        'fields'     => array(
			
			!is_plugin_active('contact-form-7/wp-contact-form-7.php') 
			? 
			array(
						'id'    => 'cf_support_info',
						'type'  => 'info',
						'style' => 'critical',
						'title' => esc_html__( 'Contact Form 7 Error', 'sage' ),
						'desc'  => sprintf( esc_html__( 'Please first activate Contact Form 7 <a href="%s">here</a>, otherwise the settings below will be ignored.', 'sage' ), plugins_url() ),
			)
			: NULL,
			array(
				'id'					=> 'cf_label_font',
				'type'				=> 'typography',
				'compiler'			=>	array('.wpcf7 p'),
				'output'				=>	array('.wpcf7 p'),
				'title'				=>	esc_html__('Label Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the labels font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#666666',
					'font-size'		=>	'12px',
					'line-height'	=>	'30px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'700',
				),
			),
			array(
				'id'					=> 'cf_input_font',
				'type'				=> 'typography',
				'compiler'			=>	array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea'),
				'output'				=>	array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea'),
				'title'				=>	esc_html__('Input Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the input font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#8e8e8e',
					'font-size'		=>	'12px',
					'line-height'	=>	'12px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'        =>	'cf_input_field_bg',
				'type'      =>	'color_rgba',
				'title'		=>	esc_html__('Input fields Background Color', 'sage'),
				'default'   =>	array('color' => '', 'alpha' => ''),
				'compiler'	=>	array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea'),
				'output'		=>	array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea'),
				'mode'      =>	'background',
				'validate'  =>	'colorrgba',
			),
			array(
				'id'            => 'cf_input_field_roundness',
				'type'          => 'spacing',
				'mode'          => 'padding',
				'all'           => true, 
				'units'         => array('px'),
				'units_extended'=> 'true',
				'display_units' => 'true',
				'title'    		=> esc_html__('Input fields and button roundness', 'sage'),
				'desc'      		=> esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'default'       => array(
					'margin-top'    => '0', 
					'margin-right'  => '0', 
					'margin-bottom' => '0', 
					'margin-left'   => '0'
				)
			),
			array(
				'id'            => 'cf_input_padding',
				'type'          => 'spacing',
				'compiler'		=>	array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea'),
				'output'			=>	array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea'),
				'mode'          => 'padding',
				'all'           => false, 
				'units'         => array('px','em'),
				'units_extended'=> 'true',
				'display_units' => 'true',
				'title'         => esc_html__('Input fields Padding', 'sage'),
				'subtitle'      => esc_html__('Choose the padding you want for your input fields.', 'sage'),
				'default'       => array(
					'margin-top'    => '15', 
					'margin-right'  => '15', 
					'margin-bottom' => '15', 
					'margin-left'   => '15'
				)
			),
			array(
				'id'            => 'cf_input_margin',
				'type'          => 'spacing',
				'compiler'		=>	array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea, .wpcf7 input[type=submit]'),
				'output'			=>	array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea, .wpcf7 input[type=submit]'),
				'mode'          => 'margin',
				'all'           => false, 
				'units'         => array('px','em'),
				'units_extended'=> 'true',
				'display_units' => 'true',
				'title'         => esc_html__('Input fields Margin', 'sage'),
				'subtitle'      => esc_html__('Choose the margin you want for your input fields.', 'sage'),
				'default'       => array(
					'margin-top'    => '0', 
					'margin-right'  => '0', 
					'margin-bottom' => '12', 
					'margin-left'   => '0'
				)
			),
			array(
				'id'        => 'cf_input_border',
				'type'      => 'border',
				'title'     => esc_html__('Inputs Border', 'sage'),
				'compiler'	=> array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea'),
				'output'    => array('.wpcf7 input[type=text], .wpcf7 input[type=email], .wpcf7 textarea'),
				'desc'      => esc_html__('Setup input fields border, in pixels (top, right, bottom, left).', 'sage'),
				'all'       => false,
				'default'   => array(
					'border-color'  => '#cecece', 
					'border-style'  => 'dotted', 
					'border-top'    => '1px', 
					'border-right'  => '1px', 
					'border-bottom' => '1px', 
					'border-left'   => '1px',
				)
			),
			array(
				'id'			=> 'cf_input_submit_height',
				'type'		=> 'dimensions',
				'title'     => esc_html__('Submit Button Height', 'sage'),
				'subtitle'  => esc_html__('This must be numeric only.', 'sage'),
				'desc'      => esc_html__('Enter value in pixels, NUMBERS ONLY', 'sage'),
				'width'		=> false,
				'height'		=> true,
				'compiler'	=>	array('.wpcf7 input[type=submit]'),
				'output'		=>	array('.wpcf7 input[type=submit]'),
				'units'		=> array('px'),
				'default'	=> array(
					'height'=> 50, 
				),
			),
			array(
				'id'        => 'cf_input_submit_bg',
				'type'      => 'color_rgba',
				'title'		=>	esc_html__('Submit Button Background Color', 'sage'),
				'subtitle'	=>	esc_html__('Regular state color.', 'sage'),
				'default'   => array('color' => '#dd9933', 'alpha' => '1.0'),
				'compiler'	=>	array('.wpcf7 input[type=submit]'),
				'output'		=>	array('.wpcf7 input[type=submit]'),
				'mode'      => 'background',
				'validate'  => 'colorrgba',
			),
			array(
				'id'        => 'cf_input_submit_hover_bg',
				'type'      => 'color_rgba',
				'title'		=>	esc_html__('Submit Button Background Color', 'sage'),
				'subtitle'	=>	esc_html__('Hover state color.', 'sage'),
				'default'   => array('color' => '#be8124', 'alpha' => '1.0'),
				'compiler'	=>	array('.wpcf7 input[type=submit]:hover'),
				'output'		=>	array('.wpcf7 input[type=submit]:hover'),
				'mode'      => 'background',
				'validate'  => 'colorrgba',
			),
			array(
				'id'        	=>	'cf_input_submit_clr',
				'type'      	=>	'link_color',
				'compiler'	=>	array('.wpcf7 input[type=submit]'),
				'output'		=>	array('.wpcf7 input[type=submit]'),
				'title'		=>	esc_html__('Submit Button Text Color', 'sage'), 
				'desc'      	=>	esc_html__('Setup button text color on regular and hovered state.', 'sage'),
				'regular'   	=>	true,	// Enable / Disable Regular Color
				'hover'     	=>	true,	// Enable / Disable Hover Color
				'active'    	=>	false,	// Enable / Disable Active Color
				'visited'   	=>	false,	// Enable / Disable Visited Color
				'default'   	=>	array(
					'regular'	=>	'#ffffff',
					'hover'		=>	'#ffffff',
				)
			),
	
		)
    ) );
	
	
	// WOOCOMMERCE SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_woocommerce',
		'icon'		=> 'el el-picture',
		'title'		=>	esc_html__('WooCommerce', 'sage'),
        'fields'		=> array(
			!is_plugin_active('woocommerce/woocommerce.php') ? 
			array(
				'id'    => 'top_info_bar',
				'type'  => 'info',
				'style' => 'critical',
				'title' => esc_html__( 'WooCommerce Error', 'sage' ),
				'desc'  => sprintf( esc_html__( '<b>WooCommerce</b> is not active. Please install/activate <a href="%s">here</a>', 'sage' ), plugins_url() ),
				'required'	=> array('woo_support', '=', '1'),
			) : NULL,
			array(
				'id'			=>	'woo_support',
				'type'		=>	'switch',
				'title'		=>	esc_html__('Enable WooCommerce Support?', 'sage'),
				'subtitle'	=>	esc_html__('If "Yes", the theme offers support for WooCommerce. Please install and activate WooCommerce before activating this option.', 'sage'),
				'default'	=>	'0',
				'on'			=>	'Yes',
				'off'		=>	'No',
			),
			array(
				'id'					=> 'shop_body_font',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('body.woocommerce'),
				'output'				=>	array('body.woocommerce'),
				'title'				=>	esc_html__('Body Font for shop content', 'sage'),
				'subtitle'			=>	esc_html__('Specify the body font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#666666',
					'font-size'		=>	'14px',
					'line-height'	=>	'30px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'					=> 'shop_h3_font',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('.woocommerce h3'),
				'output'				=>	array('.woocommerce h3'),
				'title'				=>	esc_html__('Listing Product Title', 'sage'),
				'subtitle'			=>	esc_html__('Specify font properties for product title on the listing page.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#000000',
					'font-size'		=>	'18px',
					'line-height'	=>	'24px',
					'font-family'	=>	'Roboto Slab',
					'font-weight'	=>	'400',
					'text-align'	=>	'left',
				),
			),
			array(
				'id'					=> 'shop_price_font',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce .related ul.products li.product .price, .woocommerce #content div.product span.price, .woocommerce div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product span.price'),
				'output'				=>	array('.woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, .woocommerce .related ul.products li.product .price, .woocommerce #content div.product span.price, .woocommerce div.product span.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product span.price'),
				'title'				=>	esc_html__('Listing Price', 'sage'),
				'subtitle'			=>	esc_html__('Specify font properties for product price on the listing page.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#666666',
					'font-size'		=>	'14px',
					'line-height'	=>	'30px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'400',
					'text-align'	=>	'left',
				),
			),
			array(
				'id'					=> 'shop_h1_font',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('.woocommerce #content div.product .product_title, .woocommerce div.product .product_title, .woocommerce-page #content div.product .product_title, .woocommerce-page div.product .product_title'),
				'output'				=>	array('.woocommerce #content div.product .product_title, .woocommerce div.product .product_title, .woocommerce-page #content div.product .product_title, .woocommerce-page div.product .product_title'),
				'title'				=>	esc_html__('Single Product Title', 'sage'),
				'subtitle'			=>	esc_html__('Specify font properties for product title on the single product page.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#000000',
					'font-size'		=>	'36px',
					'line-height'	=>	'40px',
					'font-family'	=>	'Roboto Slab',
					'font-weight'	=>	'300',
				),
			),
			array(
				'id'					=> 'shop_single_price_font',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('.woocommerce div.product .summary span.price, .woocommerce div.product .summary p.price, .woocommerce #content div.product .summary span.price, .woocommerce #content div.product .summary p.price, .woocommerce-page div.product .summary span.price, .woocommerce-page div.product .summary p.price, .woocommerce-page #content div.product .summary span.price, .woocommerce-page #content div.product .summary p.price'),
				'output'				=>	array('.woocommerce div.product .summary span.price, .woocommerce div.product .summary p.price, .woocommerce #content div.product .summary span.price, .woocommerce #content div.product .summary p.price, .woocommerce-page div.product .summary span.price, .woocommerce-page div.product .summary p.price, .woocommerce-page #content div.product .summary span.price, .woocommerce-page #content div.product .summary p.price'),
				'title'				=>	esc_html__('Single Product Price', 'sage'),
				'subtitle'			=>	esc_html__('Specify font properties for product price on the single product page.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#666666',
					'font-size'		=>	'14px',
					'line-height'	=>	'30px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'					=> 'shop_h4_font',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('.woocommerce h4'),
				'output'				=>	array('.woocommerce h4'),
				'title'				=>	esc_html__('Form titles', 'sage'),
				'subtitle'			=>	esc_html__('Specify font properties for form titles (Ex: Billing address on Checkout Page).', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#000000',
					'font-size'		=>	'24px',
					'line-height'	=>	'30px',
					'font-family'	=>	'Roboto Condensed',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'        	=>	'shop_ahref_color',
				'required' 	=>	array('woo_support', "=", 1),
				'type'      	=>	'link_color',
				'compiler'	=>	array('.woocommerce a'),
				'output'		=>	array('.woocommerce a'),
				'title'		=>	esc_html__('Links Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for links.', 'sage'),
				'desc'      	=>	esc_html__('Setup links color on regular and hovered state.', 'sage'),
				'regular'   	=>	true,
				'hover'     	=>	true,
				'active'    	=>	false,
				'visited'   	=>	false,
				'default'   	=>	array(
					'regular'	=>	'#000000',
					'hover'		=>	'#dd9933',
				)
			),
			array(
				'id'				=> 'shop_bg_color',
				'required' 		=>	array('woo_support', "=", 1),
				'type'			=> 'color',
				'title'			=>	esc_html__('Body Background Color', 'sage'), 
				'subtitle'		=>	esc_html__('Pick a background color for blog.', 'sage'),
				'default'		=> '#ffffff',
				'validate'		=> 'color',
			),
			array(
				'id'        => 'section_minicart',
				'type'      => 'section',
				'title'     => esc_html__('Minicart', 'sage'),
				'indent'    => true, // Indent all options below until the next 'section' option is set.
				'required' 	=>	array('woo_support', "=", 1),
			),
			array(
				'id'				=> 'shop_minicart_icon_color',
				'required' 		=>	array('woo_support', "=", 1),
				'type'			=> 'color',
				'title'			=>	esc_html__('Minicart Icon Color', 'sage'), 
				'subtitle'		=>	esc_html__('Pick a color for cart icon on the header.', 'sage'),
				'default'		=> '#000000',
				'validate'		=> 'color',
				'transparent'	=>	false,	
				'compiler'		=>	array('.sage-cart-icon'),
				'output'			=>	array('.sage-cart-icon'),
			),
			array(
				'id'        	=>	'woo_bubble_color',
				'type'      	=>	'link_color',
				'title'		=>	esc_html__('Minicart bubble color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for the mini-cart bubble.', 'sage'),
				'desc'      	=>	esc_html__('Setup links color on regular and hovered state.', 'sage'),
				'regular'   	=>	true,
				'hover'     	=>	true,
				'active'    	=>	false,
				'visited'   	=>	false,
				'default'   	=>	array(
					'regular'	=>	'#dd9933',
					'hover'		=>	'#dd9933',
				),
				'required' 	=>	array('woo_support', "=", 1),
			),
			array(
				'id'				=> 'shop_minicart_bubble_color',
				'required' 		=>	array('woo_support', "=", 1),
				'type'			=> 'color',
				'title'			=>	esc_html__('Minicart Bubble text color ', 'sage'), 
				'subtitle'		=>	esc_html__('Color of the text into the minicart bubble (qty).', 'sage'),
				'default'		=> '#ffffff',
				'validate'		=> 'color',
				'transparent'	=>	false,	
				'compiler'		=>	array('a.hgr_woo_minicart_content'),
				'output'			=>	array('a.hgr_woo_minicart_content'),
			),
			array(
				'id'        => 'section_qcv',
				'type'      => 'section',
				'title'     => esc_html__('Quick Cart View', 'sage'),
				'indent'    => true, // Indent all options below until the next 'section' option is set.
				'required' 	=>	array('woo_support', "=", 1),
			),
			array(
				'id'        => 'qcv_bg_color',
				'type'      => 'color_rgba',
				'title'		=>	esc_html__('Quick Cart View Background Color', 'sage'),
				'default'   => array('color' => '#f9f8f6', 'alpha' => '1.0'),
				'compiler'	=>	array('#qcv_container'),
				'output'		=>	array('#qcv_container'),
				'mode'      => 'background',
				'validate'  => 'colorrgba',
			),
			array(
				'id'        => 'qcv_border',
				'type'      => 'border',
				'title'     => esc_html__('Quick Cart View Border', 'sage'),
				'compiler'	=> array('#qcv_container'),
				'output'    => array('#qcv_container'),
				'desc'      => esc_html__('Setup Quick Cart View border, in pixels (top, right, bottom, left).', 'sage'),
				'all'       => false,
				'default'   => array(
					'border-color'  => '#cecece', 
					'border-style'  => 'solid', 
					'border-top'    => '2px', 
					'border-right'  => '2px', 
					'border-bottom' => '2px', 
					'border-left'   => '2px',
				)
			),
			array(
				'id'					=> 'qcv_itemTitle',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('.qcv_item_title a, .qcv_item_title a:hover'),
				'output'				=>	array('.qcv_item_title a, .qcv_item_title a:hover'),
				'title'				=>	esc_html__('QuickCart View Item Title', 'sage'),
				'subtitle'			=>	esc_html__('Specify font properties for QCV Items title', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#000000',
					'font-size'		=>	'14px',
					'line-height'	=>	'30px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'					=> 'qcv_itemSubTotal',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('.qcv_item_subtotal'),
				'output'				=>	array('.qcv_item_subtotal'),
				'title'				=>	esc_html__('QuickCart View Item SubTotal', 'sage'),
				'subtitle'			=>	esc_html__('Specify font properties for QCV Items Subtitle', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#000000',
					'font-size'		=>	'14px',
					'line-height'	=>	'14px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'700',
				),
			),
			array(
				'id'					=> 'qcv_allSubTotal',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('div.qcv_items_subtotal, div.qcv_items_subtotal span'),
				'output'				=>	array('div.qcv_items_subtotal, div.qcv_items_subtotal span'),
				'title'				=>	esc_html__('QuickCart All Items SubTotal', 'sage'),
				'subtitle'			=>	esc_html__('Specify font properties for QCV Items Subtotal', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#000000',
					'font-size'		=>	'14px',
					'line-height'	=>	'30px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'700',
				),
			),
			array(
				'id'        	=>	'qcv_gtc_btn_bg_color',
				'type'      	=>	'link_color',
				'title'		=>	esc_html__('Go To Cart Button Background Color', 'sage'), 
				'regular'   	=>	true,
				'hover'     	=>	true,
				'active'    	=>	false,
				'visited'   	=>	false,
				'default'   	=>	array(
					'regular'	=>	'#dd9933',
					'hover'		=>	'#dd9933',
				),
				'required' 	=>	array('woo_support', "=", 1),
			),
			array(
				'id'        	=>	'qcv_chk_btn_bg_color',
				'type'      	=>	'link_color',
				'title'		=>	esc_html__('Checkout Button Background Color', 'sage'), 
				'regular'   	=>	true,
				'hover'     	=>	true,
				'active'    	=>	false,
				'visited'   	=>	false,
				'default'   	=>	array(
					'regular'	=>	'#dd9933',
					'hover'		=>	'#dd9933',
				),
				'required' 	=>	array('woo_support', "=", 1),
			),
			array(
				'id'					=> 'qcv_btns',
				'required' 			=>	array('woo_support', "=", 1),
				'type'				=> 'typography',
				'compiler'			=>	array('a.qcv_button_cart, a.qcv_button_checkout, a.qcv_button_cart:hover, a.qcv_button_checkout:hover'),
				'output'				=>	array('a.qcv_button_cart, a.qcv_button_checkout, a.qcv_button_cart:hover, a.qcv_button_checkout:hover'),
				'title'				=>	esc_html__('Quick Cart View Buttons Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify font properties for QCV buttons', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#ffffff',
					'font-size'		=>	'14px',
					'line-height'	=>	'30px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'700',
				),
			),
		)
    ) );
	
	// BLOG SECTION
    Redux::setSection( $opt_name, array(
        'id'			=> 'hgr_blog',
		'icon'		=> 'el-icon-screen',
		'title'		=>	esc_html__('Blog', 'sage'),
        'fields'		=> array(
			array(
				'id'					=> 'blog_body_font',
				'type'				=> 'typography',
				'compiler'			=>	array('body.blog, body.single-post'),
				'output'				=>	array('body.blog, body.single-post'),
				'title'				=>	esc_html__('Body Font for blog', 'sage'),
				'subtitle'			=>	esc_html__('Specify the body font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#666666',
					'font-size'		=>	'12px',
					'line-height'	=>	'28px',
					'font-family'	=>	'Roboto',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'					=> 'blog_h1_font',
				'type'				=> 'typography',
				'compiler'			=>	array('.blog h1, body.single-post h1, .archive h1'),
				'output'				=>	array('.blog h1, body.single-post h1'),
				'title'				=>	esc_html__('H1 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H1 font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#000000',
					'font-size'		=>	'36px',
					'line-height'	=>	'50px',
					'font-family'	=>	'Roboto Slab',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'					=> 'blog_h2_font',
				'type'				=> 'typography',
				'compiler'			=>	array('.blog h2, body.single-post h2'),
				'output'				=>	array('.blog h2, body.single-post h2'),
				'title'				=>	esc_html__('H2 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H2 font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#000000',
					'font-size'		=>	'14px',
					'line-height'	=>	'24px',
					'font-family'	=>	'Roboto Condensed',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'					=> 'blog_h3_font',
				'type'				=> 'typography',
				'compiler'			=>	array('.blog h3, body.single-post h3'),
				'output'				=>	array('.blog h3, body.single-post h3'),
				'title'				=>	esc_html__('H3 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H3 font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#646464',
					'font-size'		=>	'22px',
					'line-height'	=>	'38px',
					'font-family'	=>	'Georgia, serif',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'					=> 'blog_h4_font',
				'type'				=> 'typography',
				'compiler'			=>	array('.blog h4, body.single-post h4'),
				'output'				=>	array('.blog h4, body.single-post h4'),
				'title'				=>	esc_html__('H4 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H4 font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#000000',
					'font-size'		=>	'18px',
					'line-height'	=>	'30px',
					'font-family'	=>	'Roboto Slab',
					'font-weight'	=>	'400',
				),
			),
			array(
				'id'					=> 'blog_h5_font',
				'type'				=> 'typography',
				'compiler'			=>	array('.blog h5, body.single-post h5'),
				'output'				=>	array('.blog h5, body.single-post h5'),
				'title'				=>	esc_html__('H5 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H5 font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#646464',
					'font-size'		=>	'46px',
					'line-height'	=>	'50px',
					'font-family'	=>	'Open Sans',
					'font-weight'	=>	'600',
				),
			),
			array(
				'id'					=> 'blog_h6_font',
				'type'				=> 'typography',
				'compiler'			=>	array('.blog h6, body.single-post h6'),
				'output'				=>	array('.blog h6, body.single-post h6'),
				'title'				=>	esc_html__('H6 Font', 'sage'),
				'subtitle'			=>	esc_html__('Specify the H6 font properties.', 'sage'),
				'google'				=>	true,
				'color'				=>	true,
				'text-transform'	=>	true,
				'default'			=>	array(
					'color'			=>	'#646464',
					'font-size'		=>	'16px',
					'line-height'	=>	'24px',
					'font-family'	=>	'Source Sans Pro',
					'font-weight'	=>	'300',
				),
			),
			array(
				'id'        	=>	'blog_ahref_color',
				'type'      	=>	'link_color',
				'compiler'	=>	array('.blog  a'),
				'output'		=>	array('.blog  a'),
				'title'		=>	esc_html__('Links Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a color for links.', 'sage'),
				'desc'      	=>	esc_html__('Setup links color on regular and hovered state.', 'sage'),
				'regular'   	=>	true,	// Enable / Disable Regular Color
				'hover'     	=>	true,	// Enable / Disable Hover Color
				'active'    	=>	false,	// Enable / Disable Active Color
				'visited'   	=>	false,	// Enable / Disable Visited Color
				'default'   	=>	array(
					'regular'	=>	'#000000',
					'hover'		=>	'#dd9933',
				)
			),
			array(
				'id'			=> 'blog_bg_color',
				'type'		=> 'color',
				'title'		=>	esc_html__('Body Background Color', 'sage'), 
				'subtitle'	=>	esc_html__('Pick a background color for blog.', 'sage'),
				'default'	=> '#ffffff',
				'validate'	=> 'color',
			),
		)
    ) );
	
	// CUSTOM CODE SECTION
    Redux::setSection( $opt_name, array(
        'title'		=>	esc_html__('Custom Code', 'sage'),
        'id'         => 'hgr_custom_code',
        'fields'     => array(
			array(
				'id'        => 'enable_css-code',
				'type'      => 'button_set',
				'title'     => esc_html__('Enable Custom CSS?', 'sage'),
				'subtitle'  => esc_html__('Do you want to enable custom css?', 'sage'),
				'options'   => array(
					'custom_css_on'		=> esc_html__('Enabled', 'sage'), 
					'custom_css_off'	=> esc_html__('Disabled', 'sage'), 
				), 
				'default'   => 'custom_css_off'
			),
			array(
				'id'        => 'css-code',
				'type'      => 'ace_editor',
				'title'     => esc_html__('CSS Code', 'sage'),
				'subtitle'  => esc_html__('Paste your CSS code here.', 'sage'),
				'mode'      => 'css',
				'theme'     => 'monokai',
				'default'   => "",
				'required'  => array('enable_css-code', '=', 'custom_css_on'),
			),
			array(
				'id'        => 'enable_js-code',
				'type'      => 'button_set',
				'title'     => esc_html__('Enable Custom JS?', 'sage'),
				'subtitle'  => esc_html__('Do you want to enable custom js?', 'sage'),
				'options'   => array(
					'custom_js_on'		=> esc_html__('Enabled', 'sage'), 
					'custom_js_off'	=> esc_html__('Disabled', 'sage'), 
				), 
				'default'   => 'custom_js_off'
			),
			array(
				'id'        => 'js-code',
				'type'      => 'ace_editor',
				'title'     => esc_html__('JS Code', 'sage'),
				'subtitle'  => esc_html__('Paste your JS code here.', 'sage'),
				'mode'      => 'javascript',
				'theme'     => 'chrome',
				'default'   => "jQuery(document).ready(function(){\n\n});",
				'required'  => array('enable_js-code', '=', 'custom_js_on'),
			),
		)
    ) );
	
	
	/*
     * <--- END SECTIONS
     */

    /**
     * This is a test function that will let you see when the compiler hook occurs.
     * It only runs if a field    set with compiler=>true is changed.
     * */
    function compiler_action( $options, $css, $changed_values ) {
        echo '<h1>The compiler hook has run!</h1>';
        echo "<pre>";
        print_r( $changed_values ); // Values that have changed since the last save
        echo "</pre>";
        //print_r($options); //Option values
        //print_r($css); // Compiler selector CSS values  compiler => array( CSS SELECTORS )
    }

    /**
     * Custom function for the callback validation referenced above
     * */
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
                $return['error'] = $field;
                $field['msg']    = 'your custom error message';
            }

            if ( $warning == true ) {
                $return['warning'] = $field;
                $field['msg']      = 'your custom warning message';
            }

            return $return;
        }
    }

    /**
     * Custom function for the callback referenced above
     */
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
    function dynamic_section( $sections ) {
        //$sections = array();
        $sections[] = array(
            'title'  => esc_html__( 'Section via hook', 'sage' ),
            'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'sage' ),
            'icon'   => 'el el-paper-clip',
            // Leave this as a blank section, no options just some intro text set above.
            'fields' => array()
        );

        return $sections;
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    function change_arguments( $args ) {
        //$args['dev_mode'] = true;

        return $args;
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    function change_defaults( $defaults ) {
        $defaults['str_replace'] = 'Testing filter hook!';

        return $defaults;
    }

    // Remove the demo link and the notice of integrated demo from the redux-framework plugin
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
