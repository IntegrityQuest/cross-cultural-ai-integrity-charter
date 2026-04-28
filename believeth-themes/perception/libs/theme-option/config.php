<?php
    /**
     * ReduxFramework Sample Config File
     * For full documentation, please visit: http://docs.reduxframework.com/
     */

    if ( ! class_exists( 'Redux' ) ) {
        return;
    }

    // This is your option name where all the Redux data is stored.
    $opt_name = "perceptron_option";

    // This line is only for altering the demo. Can be easily removed.
    $opt_name = apply_filters( 'perceptron/opt_name', $opt_name );

    /*
     *
     * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
     *
     */

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
        'menu_title'           => esc_html__( 'Perceptron Option', 'perceptron' ),
        'page_title'           => esc_html__( 'Perceptron Option', 'perceptron' ),
        // You will need to generate a Google API key to use this feature.
        // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
        'google_api_key'       => '',
        // Set it you want google fonts to update weekly. A google_api_key value is required.
        'google_update_weekly' => false,
        // Must be defined to add google fonts to the typography module
        'async_typography'     => true,
        // Use a asynchronous font on the front end or font string
        //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
        'admin_bar'            => false,
        // Show the panel pages on the admin bar
        'admin_bar_icon'       => 'dashicons-portfolio',
        // Choose an icon for the admin bar menu
        'admin_bar_priority'   => 50,
        // Choose an priority for the admin bar menu
        'global_variable'      => '',
        // Set a different name for your global variable other than the opt_name
        'dev_mode'             => false,
        'forced_dev_mode_off' => true,
        // Show the time the page took to load, etc
        'update_notice'        => true,
        // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
        'customizer'           => true,
        'compiler' => true,
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
        'force_output' => true,
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
        $args['intro_text'] = sprintf( esc_html__( 'Perceptron Theme', 'perceptron' ), $v );
    } else {
        $args['intro_text'] = esc_html__( 'Perceptron Theme', 'perceptron' );
    }

    Redux::setArgs( $opt_name, $args );

    /*
     * ---> END ARGUMENTSperceptron
     */
    /*
     *
     * ---> START SECTIONS
     *
     */     
   // -> START General Settings
   Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'General Sections', 'perceptron' ),
        'id'               => 'basic-checkbox',
        'customizer_width' => '450px',
        'fields'           => array(
            array(
                'id'       => 'container_size',
                'title'    => esc_html__( 'Container Size', 'perceptron' ),
                'subtitle' => esc_html__( 'Container Size example(1200px)', 'perceptron' ),
                'type'     => 'text',
                'default'  => '1280px'                
            ),
            array(
                'id'       => 'logo',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Default Logo', 'perceptron' ),
                'subtitle' => esc_html__( 'Upload your logo', 'perceptron' ),
                'url'=> true                
            ),

            array(
                'id'       => 'logo_light',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Light', 'perceptron' ),
                'subtitle' => esc_html__( 'Upload your light logo', 'perceptron' ),
                'url'=> true
                
            ),

            array(
                    'id'       => 'logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'perceptron' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'perceptron' ),
                    'type'     => 'text',
                    'default'  => '40px'
                    
            ),
            array(
                'id'       => 'logo-height-mobile',                               
                'title'    => esc_html__( 'Mobile Logo Height', 'perceptron' ),
                'subtitle' => esc_html__( 'Mobile Logo max height example(50px)', 'perceptron' ),
                'type'     => 'text',
                'default'  => '30px'
                    
            ),

            array(
                'id'       => 'rswplogo_sticky',
                'type'     => 'media',
                'title'    => esc_html__( 'Upload Your Sticky Logo', 'perceptron' ),
                'subtitle' => esc_html__( 'Upload your sticky logo', 'perceptron' ),
                'url'=> true                
            ),

            array(
                'id'       => 'sticky_logo_height',                               
                'title'    => esc_html__( 'Sticky Logo Height', 'perceptron' ),
                'subtitle' => esc_html__( 'Sticky Logo max height example(20px)', 'perceptron' ),
                'type'     => 'text',
                'default'  => '20px'
                    
            ),

            
            array(
            'id'       => 'rs_favicon',
            'type'     => 'media',
            'title'    => esc_html__( 'Upload Favicon', 'perceptron' ),
            'subtitle' => esc_html__( 'Upload your faviocn here', 'perceptron' ),
            'url'=> true            
            ),
            
            array(
                'id'       => 'off_sticky',
                'type'     => 'switch', 
                'title'    => esc_html__('Sticky Menu', 'perceptron'),
                'subtitle' => esc_html__('You can show or hide sticky menu here', 'perceptron'),
                'default'  => false,
            ),
               
             array(
                'id'       => 'off_search',
                'type'     => 'switch', 
                'title'    => esc_html__('Show Search', 'perceptron'),
                'subtitle' => esc_html__('You can show or hide search icon at menu area', 'perceptron'),
                'default'  => false,
            ),            
           
            array(
                'id'       => 'show_top_bottom',
                'type'     => 'switch', 
                'title'    => esc_html__('Go to Top', 'perceptron'),
                'subtitle' => esc_html__('You can show or hide here', 'perceptron'),
                'default'  => false,
            ),
            array(
                'id'       => 'show_top_position_select',
                'type'     => 'select',
                'title'    => esc_html__( 'Positon', 'perceptron' ),  
                'options'  => array(
                    'left_option' => 'Left',
                    'right_option' => 'Right',
                ),
                'default'  => 'left_option',        
                'required' => array(
                    array(
                        'show_top_bottom',
                        'equals',
                        true,
                    ),
                ),                 
            ),          
        )
    ) );
    
    
    // -> START Header Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Header', 'perceptron' ),
        'id'               => 'header',
        'customizer_width' => '450px',
        'icon' => 'el el-certificate',       
         
        'fields'           => array(
        array(
            'id'     => 'notice_critical',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Top Area', 'perceptron')            
        ),
        
        array(
            'id'       => 'show-top',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Top Bar', 'perceptron'),
            'subtitle' => esc_html__('You can select top bar show or hide', 'perceptron'),
            'default'  => false,
        ),

        array(
            'id'       => 'show-top-mobile',
            'type'     => 'switch', 
            'title'    => esc_html__('Hide Top Bar At Mobile', 'perceptron'),
            'subtitle' => esc_html__('You can select top bar show or hide', 'perceptron'),
            'default'  => true,
        ),           
      
        array(
            'id'       => 'show-social',
            'type'     => 'switch', 
            'title'    => esc_html__('Show Social Icons at Header', 'perceptron'),
            'subtitle' => esc_html__('You can select Social Icons show or hide', 'perceptron'),
            'default'  => true,
        ),  
                    
        array(
            'id'     => 'notice_critical2',
            'type'   => 'info',
            'notice' => true,
            'style'  => 'success',
            'title'  => esc_html__('Header Area', 'perceptron')            
        ),

        array(
                'id'               => 'header-grid',
                'type'             => 'select',
                'title'            => esc_html__('Header Area Width', 'perceptron'),                  
               
                //Must provide key => value pairs for select options
                'options'          => array(                                     
                
                    'container' => esc_html__('Container', 'perceptron'),
                    'full'      => esc_html__('Container Fluid', 'perceptron'),
                ),

                'default'          => 'container',            
            ),

        
         array(
                    'id'       => 'phone',                               
                    'title'    => esc_html__( ' Phone Number', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter Phone Number', 'perceptron' ),
                    'type'     => 'text',
                    
            ),

               
        array(
                    'id'       => 'top-email',                               
                    'title'    => esc_html__( 'Email Address', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter Email Address', 'perceptron' ),
                    'type'     => 'text',
                    'validate' => 'email',
                    'msg'      => esc_html__('Email Address Not Valid', 'perceptron')
                    
            ),  

            
        array(
                'id'       => 'quote',                               
                'title'    => esc_html__( 'Quote Button Text', 'perceptron' ),                  
                'type'     => 'text',
                
        ),  
        
        array(
                'id'       => 'quote_link',                               
                'title'    => esc_html__( 'Quote Button Link', 'perceptron' ),
                'subtitle' => esc_html__( 'Enter Quote Button Link Here', 'perceptron' ),
                'type'     => 'text',
                
            ),      
        )
    ) 

);  
   

Redux::setSection( $opt_name, array(
'title'            => esc_html__( 'Header Layout', 'perceptron' ),
'id'               => 'header-style',
'customizer_width' => '450px',
'subsection'=>'true',      
'fields'    => array( 
                array(
                    'id'       => 'header_layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Header Layout', 'perceptron'), 
                    'subtitle' => esc_html__('Select header layout. Choose between 1, 2 or 3 layout.', 'perceptron'),
                    'options'  => array(
                    'style1'   => array(
                    'alt'      => 'Header Style 1', 
                    'img'      => get_template_directory_uri().'/libs/img/style_1.png'
                    
                    ),
                   
                    'style2' => array(
                    'alt'    => 'Header Style 2', 
                    'img'    => get_template_directory_uri().'/libs/img/style_2.png'
                    ),
                    ),
                    'default' => 'style2'
                ),                           
        )
    ) 
);
                              
//Topbar settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Toolbar area', 'perceptron' ),
        'desc'   => esc_html__( 'Toolbar area Style Here', 'perceptron' ),        
        'subsection' =>'true',  
        'fields' => array( 
                        
                array(
                    'id'        => 'toolbar_bg_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar background Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#01a0f9',                        
                    'validate'  => 'color',                        
                ),    

                array(
                    'id'        => 'toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Text Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ), 

                 array(
                    'id'        => 'transparent_toolbar_text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Text Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#ffffff',                        
                    'validate'  => 'color',                        
                ),  

                array(
                    'id'        => 'toolbar_link_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#fff',                        
                    'validate'  => 'color',                        
                ), 

               

                array(
                    'id'        => 'toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Toolbar Link Hover Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#cccccc',                        
                    'validate'  => 'color',                        
                ),  

                 array(
                    'id'        => 'transparent_toolbar_link_hover_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Transparent Toolbar Link Hover Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#cccccc',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'toolbar_text_size',
                    'type'      => 'text',                       
                    'title'     => esc_html__('Toolbar Font Size','perceptron'),
                    'subtitle'  => esc_html__('Font Size', 'perceptron'),    
                    'default'   => '14px',                                            
                ), 
                
        )
    )
);

  //Preloader settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Preloader Style', 'perceptron' ),
        'desc'   => esc_html__( 'Preloader Style Here', 'perceptron' ),        
        
        'fields' => array( 
                        array(
                            'id'       => 'show_preloader',
                            'type'     => 'switch', 
                            'title'    => esc_html__('Show Preloader', 'perceptron'),
                            'subtitle' => esc_html__('You can show or hide preloader', 'perceptron'),
                            'default'  => false,
                        ), 

                        array(
                            'id'        => 'preloader_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Preloader Background Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                            'default'   => '#01a0f9',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'preloader_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Preloader Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                            'default'   => '#fff',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'    => 'preloader_img', 
                            'url'   => true,     
                            'title' => esc_html__( 'Preloader Image', 'perceptron' ),                 
                            'type'  => 'media',                                  
                        ),       
                    )
                )
            );    
//End Preloader settings  
    // -> START Style Section
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Style', 'perceptron' ),
        'id'               => 'stle',
        'customizer_width' => '450px',
        'icon' => 'el el-brush',
        ));
    
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Global Style', 'perceptron' ),
        'desc'   => esc_html__( 'Style your theme', 'perceptron' ),        
        'subsection' =>'true',  
        'fields' => array( 
                        
                        array(
                            'id'        => 'body_bg_color',
                            'type'      => 'color',                           
                            'title'     => esc_html__('Body Backgroud Color','perceptron'),
                            'subtitle'  => esc_html__('Pick body background color', 'perceptron'),
                            'default'   => '#ffffff',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'body_text_color',
                            'type'      => 'color',            
                            'title'     => esc_html__('Text Color','perceptron'),
                            'subtitle'  => esc_html__('Pick text color', 'perceptron'),
                            'default'   => '#666666',
                            'validate'  => 'color',                        
                        ),     
        
                        array(
                            'id'        => 'primary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Primary Color','perceptron'),
                            'subtitle'  => esc_html__('Select Primary Color.', 'perceptron'),
                            'default'   => '#FF5402',
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'secondary_color',
                            'type'      => 'color', 
                            'title'     => esc_html__('Secondary Color','perceptron'),
                            'subtitle'  => esc_html__('Select Secondary Color.', 'perceptron'),
                            'default'   => '#00212a',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'link_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Link Color','perceptron'),
                            'subtitle'  => esc_html__('Pick Link color', 'perceptron'),
                            'default'   => '#FF5402',
                            'validate'  => 'color',                        
                        ),
                        
                        array(
                            'id'        => 'link_hover_text_color',
                            'type'      => 'color',                 
                            'title'     => esc_html__('Link Hover Color','perceptron'),
                            'subtitle'  => esc_html__('Pick link hover color', 'perceptron'),
                            'default'   => '#ff7c3f',
                            'validate'  => 'color',                        
                        ),    
                       
                 ) 
            ) 
    ); 

       
    
    //Menu settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Main Menu', 'perceptron' ),
        'desc'   => esc_html__( 'Main Menu Style Here', 'perceptron' ),        
        'subsection' =>'true',  
        'fields' => array( 
                        
                        array(
                            'id'     => 'notice_critical_menu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Main Menu Settings', 'perceptron'),                                           
                        ),

                        array(
                            'id'        => 'menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Background Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                            'default'   => '',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                            'default'   => '#00212a',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'transparent_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Text Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                            'default'   => '#fff',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'transparent_menu_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Hover Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                            'default'   => '#ff5325',                        
                            'validate'  => 'color',                        
                        ),  

                        array(
                            'id'        => 'transparent_menu_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Tranparent Menu Active Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                            'default'   => '#ff5325',                        
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Hover Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),           
                            'default'   => '#ff5325',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),
                            'default'   => '#ff5325',
                            'validate'  => 'color',                        
                        ),

                        array(
                            'id'        => 'menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Left Right Gap','perceptron'),   
                            'default'   => '20px',                             
                        ), 
                        array(
                            'id'        => 'menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Top Gap','perceptron'),   
                            'default'   => '40px',                             
                        ),                        

                        array(
                            'id'        => 'menu_item_gap3',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Menu Item Bottom Gap','perceptron'),   
                            'default'   => '40px',                             
                        ),

                        array(
                            'id'       => 'menu_text_trasform',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Menu Text Uppercase', 'perceptron' ),
                            'on'       => esc_html__( 'Enabled', 'perceptron' ),
                            'off'      => esc_html__( 'Disabled', 'perceptron' ),
                            'default'  => false,
                        ),

                        array(
                            'id'     => 'notice_critical_dropmenu',
                            'type'   => 'info',
                            'notice' => true,
                            'style'  => 'success',
                            'title'  => esc_html__('Dropdown Menu Settings', 'perceptron'),                                           
                        ),
                                               
                        array(
                            'id'        => 'drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','perceptron'),
                            'subtitle'  => esc_html__('Pick bg color', 'perceptron'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','perceptron'),
                            'subtitle'  => esc_html__('Pick text color', 'perceptron'),
                            'default'   => '#00212a',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','perceptron'),
                            'subtitle'  => esc_html__('Pick text color', 'perceptron'),
                            'default'   => '#ff5325',
                            'validate'  => 'color',                        
                        ),                              
                     

                        array(
                            'id'       => 'menu_text_trasform2',
                            'type'     => 'switch',
                            'title'    => esc_html__( 'Dropdown Menu Text Uppercase', 'perceptron' ),
                            'on'       => esc_html__( 'Enabled', 'perceptron' ),
                            'off'      => esc_html__( 'Disabled', 'perceptron' ),
                            'default'  => false,
                        ),

                        array(
                             'id'        => 'dropdown_menu_item_gap',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Left Right Gap','perceptron'),   
                             'default'   => '40px',                             
                         ), 

                        array(
                             'id'        => 'dropdown_menu_item_separate',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Item Middle Gap','perceptron'),   
                             'default'   => '10px',                             
                         ), 
                         array(
                             'id'        => 'dropdown_menu_item_gap2',
                             'type'      => 'text',                       
                             'title'     => esc_html__('Dropdown Menu Boxes Top Bottom Gap','perceptron'),   
                             'default'   => '21px',                             
                         ),
                         array(
                             'id'     => 'notice_critical3',
                             'type'   => 'info',
                             'notice' => true,
                             'style'  => 'success',
                             'title'  => esc_html__('Mega Menu Settings', 'perceptron'),                                           
                         ),

                          array(
                            'id'        => 'meaga_menu_item_gap',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Left Right Gap','perceptron'),   
                            'default'   => '40px',                             
                        ), 

                         array(
                            'id'        => 'mega_menu_item_separate',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Item Middle Gap','perceptron'),   
                            'default'   => '10px',                             
                        ),  
                        array(
                            'id'        => 'mega_menu_item_gap2',
                            'type'      => 'text',                       
                            'title'     => esc_html__('Mega Menu Boxes Top Bottom Gap','perceptron'),   
                            'default'   => '21px',                             
                        ),                       
                        
                        
                )
            )
        ); 

     //Sticky Menu settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Sticky Menu', 'perceptron' ),
        'desc'       => esc_html__( 'Sticky Menu Style Here', 'perceptron' ),        
        'subsection' =>'true',  
        'fields' => array(                       

                        array(
                            'id'        => 'stiky_menu_area_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Sticky Menu Area Background Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                            'default'   => '#fff',                        
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'stikcy_menu_text_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                            'default'   => '#00212a',                        
                            'validate'  => 'color',                        
                        ), 
                       

                        array(
                            'id'        => 'sticky_menu_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Menu Text Hover Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),           
                            'default'   => '#ff5325',                 
                            'validate'  => 'color',                        
                        ), 

                        array(
                            'id'        => 'stikcy_menu_text_active_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Main Menu Text Active Color','perceptron'),
                            'subtitle'  => esc_html__('Pick color', 'perceptron'),
                            'default'   => '#ff5325',
                            'validate'  => 'color',                        
                        ),
                                               
                        array(
                            'id'        => 'sticky_drop_down_bg_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Background Color','perceptron'),
                            'subtitle'  => esc_html__('Pick bg color', 'perceptron'),
                            'default'   => '#fff',
                            'validate'  => 'color',                        
                        ), 
                            
                        
                        array(
                            'id'        => 'stikcy_drop_text_color',
                            'type'      => 'color',                     
                            'title'     => esc_html__('Dropdown Menu Text Color','perceptron'),
                            'subtitle'  => esc_html__('Pick text color', 'perceptron'),
                            'default'   => '#00212a',
                            'validate'  => 'color',                        
                        ), 
                        
                        array(
                            'id'        => 'sticky_drop_text_hover_color',
                            'type'      => 'color',                       
                            'title'     => esc_html__('Dropdown Menu Hover Text Color','perceptron'),
                            'subtitle'  => esc_html__('Pick text color', 'perceptron'),
                            'default'   => '#ff5325',
                            'validate'  => 'color',                        
                        ),   
                     
                        
                )
            )
        ); 

    //Breadcrumb settings
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Breadcrumb Style', 'perceptron' ),      
        'subsection' =>'true',  
        'fields' => array( 

                      array(
                        'id'       => 'off_breadcrumb',
                        'type'     => 'switch', 
                        'title'    => esc_html__('Show off Breadcrumb', 'perceptron'),
                        'subtitle' => esc_html__('You can show or hide off breadcrumb here', 'perceptron'),
                        'default'  => false,
                    ),

                    array(
                        'id'        => 'breadcrumb_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Background Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                        'default'   => '#3e6282',                        
                        'validate'  => 'color',                        
                    ), 
                    
                    array(
                        'id'        => 'breadcrumb_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                        'default'   => '#ffffff',                        
                        'validate'  => 'color',                        
                    ), 
                    
                  
                    array(
                        'id'        => 'breadcrumb_top_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Top Gap','perceptron'),                          
                        'default'   => '180px',                        
                                            
                    ), 
                     array(
                        'id'        => 'breadcrumb_bottom_gap',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Bottom Gap','perceptron'),                          
                        'default'   => '150px',                        
                                            
                    ),     
                        
                )
            )
        );

    //Button settings
    Redux::setSection( $opt_name, array(
        'title'      => esc_html__( 'Button Style', 'perceptron' ),
        'desc'       => esc_html__( 'Button Style Here', 'perceptron' ),        
        'subsection' =>'true',  
        'fields' => array( 

                    array(
                        'id'        => 'btn_bg_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Primary Background Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                        'default'   => '#ff5325',                        
                        'validate'  => 'color',                        
                    ), 

                    array(
                        'id'        => 'btn_bg_color2',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Secondary Background Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                        'default'   => '#ff7c3f',                        
                        'validate'  => 'color',                        
                    ), 
                    
                    array(
                        'id'        => 'btn_text_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Text Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                        'default'   => '#fff',                        
                        'validate'  => 'color',                        
                    ), 
                    
                    array(
                        'id'        => 'btn_txt_hover_color',
                        'type'      => 'color',                       
                        'title'     => esc_html__('Hover Text Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                        'default'   => '#fff',                        
                        'validate'  => 'color',                        
                    ),  
                )
            )
        );   

    

    //-> START Typography
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Typography', 'perceptron' ),
        'id'     => 'typography',
        'desc'   => esc_html__( 'You can specify your body and heading font here','perceptron'),
        'icon'   => 'el el-font',
        'fields' => array(
            array(
                'id'       => 'opt-typography-body',
                'type'     => 'typography',
                'title'    => esc_html__( 'Body Font', 'perceptron' ),
                'subtitle' => esc_html__( 'Specify the body font properties.', 'perceptron' ),
                'google'   => true, 
                'font-style' =>false,           
                'default'  => array(                    
                    'font-size'   => '15px',
                    'font-family' => 'Titillium Web',
                    'font-weight' => '400',
                ),
            ),
             array(
                'id'       => 'opt-typography-menu',
                'type'     => 'typography',
                'title'    => esc_html__( 'Navigation Font', 'perceptron' ),
                'subtitle' => esc_html__( 'Specify the menu font properties.', 'perceptron' ),
                'google'   => true,
                'font-backup' => true,                
                'all_styles'  => true,              
                'default'  => array(
                    'color'       => '#ffffff',                    
                    'font-family' => 'Titillium Web',
                    'google'      => true,
                    'font-size'   => '16px',                    
                    'font-weight' => '700',                    
                ),
            ),
            array(
                'id'          => 'opt-typography-h1',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H1', 'perceptron' ),
                'font-backup' => true,                
                'all_styles'  => true,
                'units'       => 'px',
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'perceptron' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '700',
                    'font-family' => 'Titillium Web',
                    'google'      => true,
                    'font-size'   => '48px',
                    'line-height' => '55px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h2',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H2', 'perceptron' ),
                'font-backup' => true,                
                'all_styles'  => true,                 
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'perceptron' ),
                    'default'     => array(
                        'color'       => '#222',
                        'font-style'  => '600',
                        'font-family' => 'Titillium Web',
                        'google'      => true,
                        'font-size'   => '36px',
                        'line-height' => '42px'
                        
                    ),
                ),
            array(
                'id'          => 'opt-typography-h3',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H3', 'perceptron' ),             
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'perceptron' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '600',
                    'font-family' => 'Titillium Web',
                    'google'      => true,
                    'font-size'   => '30px',
                    'line-height' => '40px'
                    
                    ),
                ),
            array(
                'id'          => 'opt-typography-h4',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H4', 'perceptron' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,                
                'all_styles'  => true,               
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'perceptron' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '600',
                    'font-family' => 'Titillium Web',
                    'google'      => true,
                    'font-size'   => '24px',
                    'line-height' => '30px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-h5',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H5', 'perceptron' ),
                //'compiler'      => true,  // Use if you want to hook in your own CSS compiler
                //'google'      => false,
                // Disable google fonts. Won't work if you haven't defined your google api key
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'perceptron' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '600',
                    'font-family' => 'Titillium Web',
                    'google'      => true,
                    'font-size'   => '21px',
                    'line-height' => '28px'
                    ),
                ),
            array(
                'id'          => 'opt-typography-6',
                'type'        => 'typography',
                'title'       => esc_html__( 'Heading H6', 'perceptron' ),
             
                'font-backup' => false,                
                'all_styles'  => true,                
                'units'       => 'px',
                // Defaults to px
                'subtitle'    => esc_html__( 'Typography option with each property can be called individually.', 'perceptron' ),
                'default'     => array(
                    'color'       => '#222',
                    'font-style'  => '500',
                    'font-family' => 'Titillium Web',
                    'google'      => true,
                    'font-size'   => '18px',
                    'line-height' => '24px'
                ),
                ),
                
                )
            )
                    
   
    );

    /*Blog Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog', 'perceptron' ),
        'id'               => 'blog',
        'customizer_width' => '450px',
        'icon' => 'el el-comment',
        )
        );
        
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Blog Settings', 'perceptron' ),
        'id'               => 'blog-settings',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(
        
                                array(
                                    'id'    => 'blog_banner_main', 
                                    'url'   => true,     
                                    'title' => esc_html__( 'Blog Page Banner', 'perceptron' ),                 
                                    'type'  => 'media',                                  
                                ),  

                                array(
                                    'id'        => 'blog_bg_color',
                                    'type'      => 'color',                           
                                    'title'     => esc_html__('Body Backgroud Color','perceptron'),
                                    'subtitle'  => esc_html__('Pick body background color', 'perceptron'),
                                    'default'   => '#fff',
                                    'validate'  => 'color',                        
                                ),
                                
                                array(
                                    'id'       => 'blog_title',                               
                                    'title'    => esc_html__( 'Blog  Title', 'perceptron' ),
                                    'subtitle' => esc_html__( 'Enter Blog  Title Here', 'perceptron' ),
                                    'type'     => 'text',                                   
                                ),
                                
                                array(
                                    'id'               => 'blog-layout',
                                    'type'             => 'image_select',
                                    'title'            => esc_html__('Select Blog Layout', 'perceptron'), 
                                    'subtitle'         => esc_html__('Select your blog layout', 'perceptron'),
                                    'options'          => array(
                                    'full'             => array(
                                    'alt'              => 'Blog Style 1', 
                                    'img'              => get_template_directory_uri().'/libs/img/1c.png'                                      
                                ),
                                    '2right'           => array(
                                    'alt'              => 'Blog Style 2', 
                                    'img'              => get_template_directory_uri().'/libs/img/2cr.png'
                                ),
                                '2left'            => array(
                                'alt'              => 'Blog Style 3', 
                                'img'              => get_template_directory_uri().'/libs/img/2cl.png'
                                ),                                  
                                ),
                                'default'          => '2right'
                                ),                      
                                
                                array(
                                    'id'               => 'blog-grid',
                                    'type'             => 'select',
                                    'title'            => esc_html__('Select Blog Gird', 'perceptron'),                   
                                    'desc'             => esc_html__('Select your blog gird layout', 'perceptron'),
                                //Must provide key => value pairs for select options
                                'options'          => array(
                                    '12'               => esc_html__('1 Column','perceptron'),                                   
                                    '6'                => esc_html__('2 Column', 'perceptron'),                                         
                                    '4'                => esc_html__('3 Column', 'perceptron'),
                                    '3'                => esc_html__('4 Column', 'perceptron'),
                                    ),
                                    'default'          => '12',                                  
                                ),  
                                
                                array(
                                'id'               => 'blog-author-post',
                                'type'             => 'select',
                                'title'            => esc_html__('Show Author Info ', 'perceptron'),                   
                                'desc'             => esc_html__('Select author info show or hide', 'perceptron'),
                                //Must provide key => value pairs for select options
                                'options'          => array(                                            
                                'show'             => esc_html__('Show','perceptron'), 
                                'hide'             => esc_html__('Hide', 'perceptron'),
                                ),
                                'default'          => 'show',
                                
                                ), 

                                

                                array(
                                'id'               => 'blog-category',
                                'type'             => 'select',
                                'title'            => esc_html__('Show Category', 'perceptron'),                   
                               
                                //Must provide key => value pairs for select options
                                'options'          => array(                                            
                                'show'             => esc_html__('Show','perceptron'), 
                                'hide'             => esc_html__('Hide', 'perceptron'),
                                ),
                                'default'          => 'show',
                                
                                ), 

                                array(
                                'id'               => 'view-comments',
                                'type'             => 'select',
                                'title'            => esc_html__('Show View & Comments', 'perceptron'),                   
                               
                                //Must provide key => value pairs for select options
                                'options'          => array(                                            
                                'show'             => esc_html__('Show','perceptron'), 
                                'hide'             => esc_html__('Hide', 'perceptron'),
                                ),
                                'default'          => 'show',
                                
                                ), 
                                
                                array(
                                    'id'               => 'blog-date',
                                    'type'             => 'switch',
                                    'title'            => esc_html__('Show Date', 'perceptron'),                   
                                    'desc'             => esc_html__('You can show/hide date at blog page', 'perceptron'),
                                    
                                    'default'          => true,
                                ), 
                                array(
                                    'id'               => 'blog_readmore',                               
                                    'title'            => esc_html__( 'Blog  ReadMore Text', 'perceptron' ),
                                    'subtitle'         => esc_html__( 'Enter Blog  ReadMore Here', 'perceptron' ),
                                    'type'             => 'text',                                   
                                ),
                                
                            )
                        ) 
                                
                    );
    
    
    /*Single Post Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Single Post', 'perceptron' ),
        'id'               => 'spost',
        'subsection'       => true,
        'customizer_width' => '450px',      
        'fields'           => array(                            
        
                            array(
                                    'id'       => 'blog_banner', 
                                    'url'      => true,     
                                    'title'    => esc_html__( 'Blog Single page banner', 'perceptron' ),                  
                                    'type'     => 'media',
                                    
                            ),  
                           
                            array(
                                    'id'       => 'blog-comments',
                                    'type'     => 'select',
                                    'title'    => esc_html__('Show Comment', 'perceptron'),                   
                                    'desc'     => esc_html__('Select comments show or hide', 'perceptron'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => esc_html__('Show', 'perceptron'),
                                            'hide' => esc_html__('Hide', 'perceptron'),
                                            ),
                                        'default'  => 'show',
                                        
                            ),  
                            
                            array(
                                    'id'       => 'blog-author',
                                    'type'     => 'select',
                                    'title'    => esc_html__('Show Ahthor Info', 'perceptron'),                   
                                    'desc'     => esc_html__('Select author info show or hide', 'perceptron'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => esc_html__('Show', 'perceptron'),
                                            'hide' => esc_html__('Hide', 'perceptron'),
                                        ),
                                    'default'  => 'show',
                                        
                            ),  
                            
                            array(
                                    'id'       => 'blog-post',
                                    'type'     => 'select',
                                    'title'    => esc_html__('Show Related Post', 'perceptron'),                  
                                    'desc'     => esc_html__('Choose related product show or hide', 'perceptron'),
                                     //Must provide key => value pairs for select options
                                    'options'  => array(                                            
                                            'show' => esc_html__('Show', 'perceptron'),
                                            'hide' => esc_html__('Hide', 'perceptron'),
                                            ),
                                    'default'  => 'show',
                                        
                            ),  
                        )
                ) 
    
    
    );

  
    /*Team Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Team Section', 'perceptron' ),
        'id'               => 'team',
        'customizer_width' => '450px',
        'icon' => 'el el-user',
        'fields'           => array(
        
            array(
                    'id'       => 'team_single_image', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Team Single page banner image', 'perceptron' ),                    
                    'type'     => 'media',
                    
            ),  

             array(
                    'id'        => 'team_single_bg_color',
                    'type'      => 'color',                           
                    'title'     => esc_html__('Sinlge Team Body Backgroud Color','perceptron'),
                    'subtitle'  => esc_html__('Pick body background color', 'perceptron'),
                    'default'   => '#fff',
                    'validate'  => 'color',                        
                ),
            
            array(
                    'id'       => 'team_slug',                               
                    'title'    => esc_html__( 'Team Slug', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter Team Slug Here', 'perceptron' ),
                    'type'     => 'text',
                    'default'  => esc_html__('teams', 'perceptron'),
                    
                ),      
                
                          
             )
         ) 
    );

    

  
    /*Portfolio Sections*/
    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Portfolio Section', 'perceptron' ),
        'id'               => 'Portfolio',
        'customizer_width' => '450px',
        'icon' => 'el el-align-right',
        'fields'           => array(
        
            array(
                    'id'       => 'department_single_image', 
                    'url'      => true,     
                    'title'    => esc_html__( 'Portfolio Single page banner image', 'perceptron' ),                    
                    'type'     => 'media',
                    
            ),  

             array(
                    'id'       => 'portfolio_slug',                               
                    'title'    => esc_html__( 'Portfolio Slug', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter Portfolio Slug Here', 'perceptron' ),
                    'type'     => 'text',
                    'default'  => 'portfolio',
                    
                ), 
            )
         ) 
    );




    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Social Icons', 'perceptron' ),
        'desc'   => esc_html__( 'Add your social icon here', 'perceptron' ),
        'icon'   => 'el el-share',
         'submenu' => true, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
        'fields' => array(
                    array(
                        'id'       => 'facebook',                               
                        'title'    => esc_html__( 'Facebook Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Facebook Link', 'perceptron' ),
                        'type'     => 'text',                     
                    ),
                        
                     array(
                        'id'       => 'twitter',                               
                        'title'    => esc_html__( 'Twitter Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Twitter Link', 'perceptron' ),
                        'type'     => 'text'
                    ),
                    
                        array(
                        'id'       => 'rss',                               
                        'title'    => esc_html__( 'Rss Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Rss Link', 'perceptron' ),
                        'type'     => 'text'
                    ),
                    
                     array(
                        'id'       => 'pinterest',                               
                        'title'    => esc_html__( 'Pinterest Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Pinterest Link', 'perceptron' ),
                        'type'     => 'text'
                    ),
                     array(
                        'id'       => 'linkedin',                               
                        'title'    => esc_html__( 'Linkedin Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Linkedin Link', 'perceptron' ),
                        'type'     => 'text',
                        
                    ),
                     array(
                        'id'       => 'google',                               
                        'title'    => esc_html__( 'Google Plus Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Google Plus  Link', 'perceptron' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'instagram',                               
                        'title'    => esc_html__( 'Instagram Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Instagram Link', 'perceptron' ),
                        'type'     => 'text',                       
                    ),

                     array(
                        'id'       => 'youtube',                               
                        'title'    => esc_html__( 'Youtube Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Youtube Link', 'perceptron' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'tumblr',                               
                        'title'    => esc_html__( 'Tumblr Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Tumblr Link', 'perceptron' ),
                        'type'     => 'text',                       
                    ),

                    array(
                        'id'       => 'vimeo',                               
                        'title'    => esc_html__( 'Vimeo Link', 'perceptron' ),
                        'subtitle' => esc_html__( 'Enter Vimeo Link', 'perceptron' ),
                        'type'     => 'text',                       
                    ),         
            ) 
        ) 
    );
    
    if ( class_exists( 'WooCommerce' ) ) {
    Redux::setSection( $opt_name, array(
        'title'  => esc_html__( 'Woocommerce', 'perceptron' ),    
        'icon'   => 'el el-shopping-cart',    
        ) 
    ); 

    Redux::setSection( $opt_name, array(
        'title'            => esc_html__( 'Shop', 'perceptron' ),
        'id'               => 'shop_layout',
        'customizer_width' => '450px',
        'subsection' =>'true',      
        'fields'           => array(                      
            array(
                'id'       => 'shop_banner', 
                'url'      => true,     
                'title'    => esc_html__( 'Shop page banner', 'perceptron' ),                    
                'type'     => 'media',
            ), 
            array(
                    'id'       => 'shop-layout',
                    'type'     => 'image_select',
                    'title'    => esc_html__('Select Shop Layout', 'perceptron'), 
                    'subtitle' => esc_html__('Select your shop layout', 'perceptron'),
                    'options'  => array(
                        'full'      => array(
                            'alt'   => 'Shop Style 1', 
                            'img'   => get_template_directory_uri().'/libs/img/1c.png'                                      
                        ),
                        'right-col'     => array(
                            'alt'       => 'Shop Style 2', 
                            'img'       => get_template_directory_uri().'/libs/img/2cr.png'
                        ),
                        'left-col'  => array(
                            'alt'   => 'Shop Style 3', 
                            'img'   => get_template_directory_uri().'/libs/img/2cl.png'
                        ),                                  
                    ),
                    'default' => 'full'
                ),

                array(
                    'id'       => 'wc_num_product',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Page', 'perceptron' ),
                    'default'  => '9',
                ),

                array(
                    'id'       => 'wc_num_product_per_row',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Number of Products Per Row', 'perceptron' ),
                    'default'  => '3',
                ),

                array(
                    'id'       => 'wc_cart_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Cart Icon Show At Menu Area', 'perceptron' ),
                    'on'       => esc_html__( 'Enabled', 'perceptron' ),
                    'off'      => esc_html__( 'Disabled', 'perceptron' ),
                    'default'  => false,
                ),

                array(
                    'id'       => 'wc_wishlist_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Show Wishlist Icon', 'perceptron' ),
                    'on'       => esc_html__( 'Enabled', 'perceptron' ),
                    'off'      => esc_html__( 'Disabled', 'perceptron' ),
                    'default'  => false,
                ),
                array(
                    'id'       => 'wc_quickview_icon',
                    'type'     => 'switch',
                    'title'    => esc_html__( 'Product Quickview Icon', 'perceptron' ),
                    'on'       => esc_html__( 'Enabled', 'perceptron' ),
                    'off'      => esc_html__( 'Disabled', 'perceptron' ),
                    'default'  => false,
                ),

                array(
                'id'       => 'disable-sidebar',
                'type'     => 'switch', 
                'title'    => esc_html__('Sidebar Disable For Single Product Page', 'perceptron'),                
                'default'  => true,
                ), 
               
            )
        ) 
    );
}   

   
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Footer Option', 'perceptron' ),
    'desc'   => esc_html__( 'Footer style here', 'perceptron' ),
    'icon'   => 'el el-th-large',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(
                array(
                        'id'       => 'footer_bg_image', 
                        'url'      => true,     
                        'title'    => esc_html__( 'Footer Background Image', 'perceptron' ),                 
                        'type'     => 'media',                                  
                ),

                array(
                        'id'        => 'footer_bg_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Bg Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color.', 'perceptron'),
                        'default'   => '#3e6282',
                        'validate'  => 'color',                        
                    ),  

                 array(
                    'id'               => 'header_grid2',
                    'type'             => 'select',
                    'title'            => esc_html__('Footer Area Width', 'perceptron'), 
                                  
                    'options'          => array(                            
                    
                        'container' => esc_html__('Container', 'perceptron'),
                        'full'      => esc_html__('Container Fluid', 'perceptron')
                    ),

                    'default'          => 'container',            
                ),

                array(
                        'id'       => 'footer_logo',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Footer Logo', 'perceptron' ),
                        'subtitle' => esc_html__( 'Upload your footer logo', 'perceptron' ),                  
                    ), 

                array(
                        'id'       => 'footer_dark_logo',
                        'type'     => 'media',
                        'title'    => esc_html__( 'Footer Dark Logo', 'perceptron' ),
                        'subtitle' => esc_html__( 'Upload your footer dark logo', 'perceptron' ),                  
                    ),  
                 array(
                    'id'       => 'footer-logo-height',                               
                    'title'    => esc_html__( 'Logo Height', 'perceptron' ),
                    'subtitle' => esc_html__( 'Logo max height example(50px)', 'perceptron' ),
                    'type'     => 'text',
                    'default'  => '40px'
                    
            ),
                array(
                        'id'        => 'foot_social_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Social Icon Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color.', 'perceptron'),
                        'default'   => '#fff',
                        'validate'  => 'color',                        
                    ),                   

                array(
                        'id'        => 'foot_social_hover',
                        'type'      => 'color',
                        'title'     => esc_html__('Social Icon Hover Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color.', 'perceptron'),
                        'default'   => '#fff',
                        'validate'  => 'color',                        
                    ), 
                array(
                        'id'        => 'footer_title_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Title Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color.', 'perceptron'),
                        'default'   => '#fff',
                        'validate'  => 'color',                        
                    ),  

                array(
                        'id'        => 'footer_h3_size',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Footer Title Font Size','perceptron'),
                        'subtitle'  => esc_html__('Font Size', 'perceptron'),    
                        'default'   => '20px',                                            
                    ),    

                array(
                        'id'        => 'footer_text_size',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Footer Font Size','perceptron'),
                        'subtitle'  => esc_html__('Font Size', 'perceptron'),    
                        'default'   => '16px',                                            
                    ),  
                 

                array(
                        'id'        => 'footer_link_size',
                        'type'      => 'text',                       
                        'title'     => esc_html__('Footer Link Font Size','perceptron'),
                        'subtitle'  => esc_html__('Font Size', 'perceptron'),    
                        'default'   => '15px',                                            
                    ),  

                array(
                        'id'        => 'footer_text_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Text Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color.', 'perceptron'),
                        'default'   => '#fff',
                        'validate'  => 'color',                        
                    ),  

                array(
                        'id'        => 'footer_link_color',
                        'type'      => 'color',
                        'title'     => esc_html__('Footer Link Hover Color','perceptron'),
                        'subtitle'  => esc_html__('Pick color.', 'perceptron'),
                        'default'   => '#ff7c3f',
                        'validate'  => 'color',                        
                    ),         
  
                
                array(
                    'id'       => 'copyright',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Footer CopyRight', 'perceptron' ),
                    'subtitle' => esc_html__( 'Change your footer copyright text ?', 'perceptron' ),
                    'default'  => esc_html__( '2019 All Rights Reserved', 'perceptron' ),
                ),  

                array(
                    'id'       => 'copyright_bg',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Copyright Background', 'perceptron' ),
                    'subtitle' => esc_html__( 'Copyright Background Color', 'perceptron' ),      
                    'default'  => '',            
                ),
                array(
                    'id'       => 'copyright_borders',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Copyright Border Color', 'perceptron' ),
                    'subtitle' => esc_html__( 'Copyright Border Color', 'perceptron' ),      
                    'default'  => '',            
                ),
                array(
                    'id'       => 'copyright_text_color',
                    'type'     => 'color',
                    'title'    => esc_html__( 'Copyright Text Color', 'perceptron' ),
                    'subtitle' => esc_html__( 'Copyright Text Color', 'perceptron' ),      
                    'default'  => '#fff',            
                ), 
            ) 
        ) 
    ); 

    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( 'Coming Soon Page', 'perceptron' ),
    'desc'   => esc_html__( 'You can set coming soon/maintenance mode here', 'perceptron' ),
    'icon'   => 'el el-error-alt',    
    'fields' => array(

                array(
                    'id'       => 'show-comingsoon',
                    'type'     => 'switch', 
                    'title'    => esc_html__('Enable Coming Soon', 'perceptron'),
                    'subtitle' => esc_html__('You can enable/disable coming soon', 'perceptron'),
                    'default'  => false,
                ),

                array(
                    'id'       => 'coming_logo',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Coming Soon Logo', 'perceptron' ),
                    'subtitle' => esc_html__( 'Upload your image', 'perceptron' ),
                    'url'=> true                
                ), 

                array(
                    'id'       => 'coming_title',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Title', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter title for coming soon page', 'perceptron' ), 
                    'default'  => esc_html__('Coming Soon', 'perceptron')                
                ),  
                
                array(
                    'id'       => 'coming_text',
                    'type'     => 'textarea',
                    'title'    => esc_html__( 'Text', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter text coming soon page', 'perceptron' ),  
                    'default'  => esc_html__('Our Exciting Website Is Coming Soon! Check Back Later
', 'perceptron')             
                ),                         
                
                array(
                    'id'            => 'opt-date-time',
                    'type'          => 'text',
                    'title'         => esc_html__('Date/Time', 'perceptron'),
                    'subtitle'      => esc_html__('Add Date/Time ex(Y-m-d  H:m:s)','perceptron'), 
                    'default'  => esc_html__('2020-10-22 17:40:12','perceptron'),                          
                ),
                array(
                    'id'       => 'coming_day',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Day Text', 'perceptron' ),                  
                    'default'  => esc_html__('Days', 'perceptron')                
                ),

              
                array(
                    'id'       => 'coming_hour',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Hour Text', 'perceptron' ),                  
                    'default'  => esc_html__('Hours', 'perceptron')                
                ), 

                array(
                    'id'       => 'coming_min',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Minute Text', 'perceptron' ),                  
                    'default'  => esc_html__('Minutes', 'perceptron')                
                ),

               

                array(
                    'id'       => 'coming_sec',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Second Text', 'perceptron' ),                  
                    'default'  => esc_html__('Seconds', 'perceptron')                
                ),

               
              
                array(
                    'id'       => 'coming_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload Page Background', 'perceptron' ),
                    'subtitle' => esc_html__( 'Upload your image', 'perceptron' ),
                    'url'=> true                
                ), 

                 array(
                    'id'       => 'fllow_title',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Social Title', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter title', 'perceptron' ), 
                    'default'  => esc_html__('Follow us', 'perceptron')                
                ), 

                array(
                    'id'        => 'text_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Text Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#fff',                        
                    'validate'  => 'color',                        
                ),

                array(
                    'id'        => 'circle_border_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Countdown Circle Border Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#fff',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'circle_primary_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Countdown Circle Primary Bg Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#09c778',                        
                    'validate'  => 'color',                        
                ), 

                array(
                    'id'        => 'circle_secondary_color',
                    'type'      => 'color',                       
                    'title'     => esc_html__('Countdown Circle Secondary Bg Color','perceptron'),
                    'subtitle'  => esc_html__('Pick color', 'perceptron'),    
                    'default'   => '#01a0f9',                        
                    'validate'  => 'color',                        
                ),         
                                  
            ) 
        ) 
    ); 

    
    Redux::setSection( $opt_name, array(
    'title'  => esc_html__( '404 Error Page', 'perceptron' ),
    'desc'   => esc_html__( '404 details  here', 'perceptron' ),
    'icon'   => 'el el-error-alt',
    // 'submenu' => false, // Setting submenu to false on a given section will hide it from the WordPress sidebar menu!
    'fields' => array(

                array(
                    'id'       => 'title_404',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Title', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter title for 404 page', 'perceptron' ), 
                    'default'  => esc_html__('404', 'perceptron')                
                ),  
                
                array(
                    'id'       => 'text_404',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Text', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter text for 404 page', 'perceptron' ),  
                    'default'  => esc_html__('Page Not Found', 'perceptron')             
                ),                      
                
                array(
                    'id'       => 'back_home',
                    'type'     => 'text',
                    'title'    => esc_html__( 'Back to Home Button Label', 'perceptron' ),
                    'subtitle' => esc_html__( 'Enter label for "Back to Home" button', 'perceptron' ),
                    'default'  => esc_html__('Back to Homepage', 'perceptron')   
                                
                ),  

                array(
                    'id'       => 'error_bg',
                    'type'     => 'media',
                    'title'    => esc_html__( 'Upload 404 Page Bg', 'perceptron' ),
                    'subtitle' => esc_html__( 'Upload your image', 'perceptron' ),
                    'url'=> true                
                ),              
            
                                  
            ) 
        ) 
    ); 
    


     // If Redux is running as a plugin, this will remove the demo notice and links
    //add_action( 'redux/loaded', 'remove_demo' );
    
    //add_filter('redux/options/' . $this->args['opt_name'] . '/compiler', array( $this, 'compiler_action' ), 10, 3);

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
     * so you must use get_template_directory_uri()() if you want to use any of the built in icons
     * */
    if ( ! function_exists( 'dynamic_section' ) ) {
        function dynamic_section( $sections ) {
            //$sections = array();
            $sections[] = array(
                'title'  => esc_html__( 'Section via hook', 'perceptron' ),
                'desc'   => esc_html__( '<p class="description">This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.</p>', 'perceptron' ),
                'icon'   => 'el el-paper-clip',
                // Leave this as a blank section, no options just some intro text set above.
                'fields' => array()
            );

            return $sections;
        }
    }

    /**
     * Filter hook for filtering the args. Good for child themes to override or add to the args array. Can also be used in other functions.
     * */
    if ( ! function_exists( 'change_arguments' ) ) {
        function change_arguments( $args ) {
            //$args['dev_mode'] = true;

            return $args;
        }
    }

    /**
     * Filter hook for filtering the default value of any given field. Very useful in development mode.
     * */
    if ( ! function_exists( 'change_defaults' ) ) {
        function change_defaults( $defaults ) {
            $defaults['str_replace'] = 'Testing filter hook!';

            return $defaults;
        }
    }

    /**
     * Removes the demo link and the notice of integrated demo from the redux-framework plugin
     */
    if ( ! function_exists( 'remove_demo' ) ) {
        function remove_demo() {
            // Used to hide the demo mode link from the plugin page. Only used when Redux is a plugin.
            if ( class_exists( 'ReduxFrameworkPlugin' ) ) {
                remove_action( 'plugin_row_meta', array(
                    ReduxFrameworkPlugin::instance(),
                    'plugin_metalinks'
                ), null, 2 );

                // Used to hide the activation notice informing users of the demo panel. Only used when Redux is a plugin.
                remove_action( 'admin_notices', array( ReduxFrameworkPlugin::instance(), 'admin_notices' ) );
            }
        }
    }