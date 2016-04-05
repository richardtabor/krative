<?php
/*--------------------------------------------------------------------*/
/*                    										
/*     ADD OUR SCRIPTS										
/*                    										
/*--------------------------------------------------------------------*/
if ( !function_exists( 'bean_enqueue_scripts') ) {
		 
	function bean_enqueue_scripts() {
		global $post;
		
	 	wp_enqueue_style('bean', get_stylesheet_directory_uri(). '/assets/css/framework.css', false,'1.0','all');
	 	wp_enqueue_style('main-style', get_stylesheet_directory_uri(). '/style.css', false, '1.4', 'all'); 
		wp_enqueue_style('mobile', get_stylesheet_directory_uri(). '/assets/css/mobile.css',false,'1.0','all'); 
		
		wp_register_script('validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', 'jquery', '1.9', true);
		
		wp_enqueue_script('jquery');
		wp_enqueue_script('custom-libraries', BEAN_JS_URL . '/custom-libraries.js', 'jquery', '1.0', true); 
		wp_enqueue_script('custom', BEAN_JS_URL . '/custom.js', 'jquery', '2.0', true);
		wp_enqueue_script('superfish', BEAN_JS_URL . '/superfish.js', 'jquery', '1.7.4', true); 
		wp_enqueue_script('fitvids', BEAN_JS_URL . '/jquery.fitvids.js', 'jquery', '1.0.3', true);
		
		if( get_theme_mod( 'retina_option' ) == true) {
			wp_enqueue_script('retina', BEAN_JS_URL . '/retina.js', 'jquery', '2.0', true);
		}

		if ( is_page_template('page-comingsoon.php') ) wp_enqueue_script('bean-soon', BEAN_JS_URL . '/bean-soon.js', 'jquery', '1.0', true);
		if ( is_singular('portfolio')) wp_enqueue_script('view', BEAN_JS_URL . '/view.min.js?auto', 'jquery', '2.0', true);
		if ( is_singular('post') && comments_open() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' );
		
		
		if ( is_page_template('page-contact.php') || is_singular('post') ) { 	
			wp_register_script('validation', 'http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js', 'jquery', '1.9', true);
			wp_enqueue_script('validation');
		}		
		
		global $is_IE;
		
		if ( $is_IE ) {
			wp_enqueue_script('selectivizr', BEAN_JS_URL . '/selectivizr-min.js', 'jquery', '2.0', false);
		}
	}
	add_action( 'wp_enqueue_scripts', 'bean_enqueue_scripts',0);
}


function bean_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'init', 'bean_add_editor_styles' );




/*--------------------------------------------------------------------*/                   										
/*  POST THUMBNAILS & POST FORMATS											                 										
/*--------------------------------------------------------------------*/
if ( !function_exists( 'bean_theme_setup') ) {
	function bean_theme_setup() {
		if ( function_exists( 'add_theme_support' ) ) {

			set_post_thumbnail_size( 140, 140, true );
			
			add_image_size( 'sml-thumbnail', 50, 50, true );
			add_image_size( 'thumbnail-large', 677, 9999, true );
			add_image_size( 'thumbnail-small', 250, 9999 );
			add_image_size( 'portfolio-feat', 316, 210 );
			add_image_size( 'team-feat', 316, 316 );
			add_image_size( 'portfolio-feat-2col', 470, 330 );
			add_image_size( 'portfolio-single', 640, 9999, false );
			
			add_theme_support('post-thumbnails');
			add_theme_support( 'automatic-feed-links' );
			add_theme_support( 'post-formats', array( 'audio', 'gallery', 'image', 'link', 'quote', 'video' ) );
		}	 
	}
	add_action('after_setup_theme', 'bean_theme_setup');
}

  
  
  
/*--------------------------------------------------------------------*/             										
/*  THEME MENUS								                   										
/*--------------------------------------------------------------------*/
if ( function_exists( 'wp_nav_menu') ) {

	add_theme_support( 'nav-menus' );
	$menus = array(
		'primary-menu' => __( 'Primary Navigation', 'bean' ),
		'drop-in-menu' => __( 'Drop In Navigation', 'bean' ),
		'sidebar-menu' => __( 'Sidebar Navigation', 'bean' ),
		'footer-menu' => __( 'Footer Navigation', 'bean' ),
	);
	$menus = apply_filters( 'radium_nav_menus', $menus );
	register_nav_menus( $menus );
	
}




/*--------------------------------------------------------------------*/         							
/*  REMOVE GENERATOR FOR WP SECURITY									 					
/*--------------------------------------------------------------------*/
remove_action( 'wp_head', 'wp_generator' );




/*--------------------------------------------------------------------*/ 
/*                  										
/* TGM PLUGIN ACTIVATION
/* 
/* REGISTER THE REQUIRED PLUGINS FOR THE THEME. THIS FUNCTION IS HOOKED
/* INTO tgmpa_init ,WHICH IS FIRED WITHIN THE TGM_Plugin_Activation CONSTRUCTOR.
/* 							                										
/*--------------------------------------------------------------------*/
function bean_register_required_plugins() {
    //PLUGIN ARRAY 
    $plugins = array(
 		//INCLUDED HOME SLIDER PLUGIN FOR KRATIVE 
        array(
            'name'                  => 'Bean Krative Slider',
            'slug'                  => 'bean-slider', //FOLDER NAME
            'source'                => get_stylesheet_directory() . '/lib/plugins/bean-slider.zip',
            'required'              => false, //RECCOMENDED - NOT REQUIRED
            'version'               => '',
            'force_activation'      => false,
            'force_deactivation'    => false,
        ),
        //INCLUDED HOME SLIDER PLUGIN FOR KRATIVE 
        array(
            'name'                  => 'Bean Krative Team',
            'slug'                  => 'bean-team', //FOLDER NAME
            'source'                => get_stylesheet_directory() . '/lib/plugins/bean-team.zip',
            'required'              => false, //RECCOMENDED - NOT REQUIRED
            'version'               => '',
            'force_activation'      => false,
            'force_deactivation'    => false,
        ),
        
        
    );
     
    $config = array(
        'default_path'      => '',                  
        'parent_menu_slug'  => 'themes.php',       
        'parent_url_slug'   => 'themes.php',
        'menu'              => 'install-required-plugins',
        'has_notices'       => true,             
        'is_automatic'      => false, 
        'message'           => '<br/>Please install the following plugins in order to take advantage of the built in features provided by this theme. First click "Activate", then "Install" upon returning to this page.<br/><br/>',
        'strings'           => array(
        'page_title'                                => __( 'Install Included Bean Plugins', 'bean' ),
        'menu_title'                                => __( 'Install Bean Plugins', 'bean' ),
        'installing'                                => __( 'Installing Plugin: %s', 'bean' ), // %1$s = plugin name
        'oops'                                      => __( 'Something went wrong with the plugin API.', 'bean' ),
        'notice_can_install_required'               => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ),
        'notice_can_install_recommended'            => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ),
        'notice_cannot_install'                     => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ),
        'notice_can_activate_required'              => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ),
        'notice_can_activate_recommended'           => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ),
        'notice_cannot_activate'                    => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ),
        'notice_ask_to_update'                      => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
        'notice_cannot_update'                      => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ),
        'install_link'                              => _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
        'activate_link'                             => _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
        'return'                                    => __( 'Return to Bean Plugins Installer', 'bean' ),
        'plugin_activated'                          => __( 'Plugin activated successfully.', 'bean' ),
        'complete'                                  => __( 'All plugins installed and activated successfully. %s', 'bean' )
        )
    );
 
    tgmpa( $plugins, $config );
 
}
   
add_action( 'tgmpa_register', 'bean_register_required_plugins' );   
   
   
