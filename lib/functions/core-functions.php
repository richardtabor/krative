<?php 
/*--------------------------------------------------------------------*/                							
/*  ADD CUSTOM CLASSES TO THE ARRAY OF BODY CLASSES					                							
/*--------------------------------------------------------------------*/
function bean_browser_body_class($classes) {

	global $post, $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;

	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'gecko';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) {
	    $classes[] = 'ie';
	    $browser = $_SERVER[ 'HTTP_USER_AGENT' ];
	    if( preg_match( "/MSIE 7.0/", $browser ) ) {
	        $classes[] = 'ie7';
	    }
    }
	else $classes[] = 'unknown';

	if($is_iphone) $classes[] = 'iphone';
	
	if ( is_multi_author() ) {
		$classes[] = 'group-blog';
	}	
		
	return $classes;
}
add_filter('body_class','bean_browser_body_class');

/* CONTENT WIDTH */
if ( ! isset( $content_width ) ) $content_width = 980;


	
add_theme_support( 'post-thumbnails', array( 'post', 'page' ) );

//Remove Inline Style added by Multisite in the Signup Form
if ( !function_exists('bean_wpmu_signup_stylesheet') ) {
	function bean_wpmu_signup_stylesheet() {
		remove_action( 'wp_head', 'wpmu_signup_stylesheet');
	}
	add_action( 'wp_head', 'bean_wpmu_signup_stylesheet', 1 );
}

	
/*--------------------------------------------------------------------*/         							
/*  FIX FOR CATEGORY REL TAG (PRODUCES INVALID HTML5 CODE)									 					
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_add_nofollow_cat') ) {
	function bean_add_nofollow_cat( $text ) {
		$text = str_replace('rel="category tag"', "", $text); 
		return $text;
	}
	add_filter( 'the_category', 'bean_add_nofollow_cat' ); 
}


/*--------------------------------------------------------------------*/                							
/*  CHECK CURRENT POST FOR SHORT CODE					                							
/*--------------------------------------------------------------------*/
if ( !function_exists('radium_has_shortcode') ) {

	function radium_has_shortcode($shortcode = '') {

		global $post;
		
		$post_obj = get_post( $post->ID );
		$found = false;
		
		// if no short code was provided, return false
		if ( !$shortcode )
			return $found;
			
		// check the post content for the short code
		if ( stripos( $post_obj->post_content, '[' . $shortcode ) !== false )
		
			// we have found the short code
			$found = true;

		// return our final results  
		return $found;

	}
}
 
 
/*--------------------------------------------------------------------*/                							
/*  GET CUSTOM FIELD					                							
/*--------------------------------------------------------------------*/
if ( !function_exists('radium_get_custom_field') ) {

	function radium_get_custom_field( $key, $post_id = null ) {

		global $wp_query;
		
		$post_id = $post_id ? $post_id : $wp_query->get_queried_object()->ID;
		
		return get_post_meta( $post_id, $key, true );

	}

}


/*--------------------------------------------------------------------*/                							
/*  ADD DASHBOARD LINK			                							
/*--------------------------------------------------------------------*/
function admin_menu_new_items() {
    global $submenu;
    $submenu['index.php'][500] = array( 'ThemeBeans.com', 'manage_options' , 'http://themebeans.com/?ref=wp_sidebar' ); 
}
add_action( 'admin_menu' , 'admin_menu_new_items' );


/*--------------------------------------------------------------------*/         							
/*  FOOTER TYPE EDIT									 					
/*--------------------------------------------------------------------*/
function bean_footer_admin () {  
  echo 'Thank you for creating with <a href="http://themebeans.com/?ref=wp_footer" target="blank">ThemeBeans</a>. You rock.';  
}
add_filter('admin_footer_text', 'bean_footer_admin'); 


/*--------------------------------------------------------------------*/                							
/*  BEAN PLUGIN NOTIFICATION					                							
/*--------------------------------------------------------------------*/
add_action('admin_notices', 'bean_plugin_admin_notice');

function bean_plugin_admin_notice() {
	global $current_user ;
    $user_id = $current_user->ID;

	if ( ! get_user_meta($user_id, 'bean_ignore_notice') ) {
	    echo '<div class="updated"><p>'; 
	    printf(__('This theme is compatible with the ThemeBeans <a href="http://themebeans.com/plugin/portfolio-wordpress-plugin/?ref=plugin_notice" target="blank">Portfolio</a>, <a href="http://themebeans.com/plugin/bean-tweets-plugin/?ref=plugin_notice" target="blank">Tweets</a>, <a href="http://themebeans.com/plugin/bean-social-plugin/?ref=plugin_notice" target="blank">Social</a>,  <a href="http://themebeans.com/plugin/bean-shortcodes-plugin/?ref=plugin_notice" target="blank">Shortcodes</a> & <a href="http://themebeans.com/plugin/bean-instagram-plugin/?ref=plugin_notice" target="blank">Instagram</a> WordPress Plugins. <a href="%1$s">Dismiss</a>'), '?bean_plugin_ignore=0');
	    echo "</p></div>";
	}
	
}
add_action('admin_init', 'bean_plugin_ignore');

function bean_plugin_ignore() {
	global $current_user;
        $user_id = $current_user->ID;
        if ( isset($_GET['bean_plugin_ignore']) && '0' == $_GET['bean_plugin_ignore'] ) {
             add_user_meta($user_id, 'bean_ignore_notice', 'true', true);
	}
}


/*--------------------------------------------------------------------*/                							
/*  SIDEBAR LOADER					                							
/*--------------------------------------------------------------------*/
function bean_sidebar_loader() {
	global $post, $bean_sidebar_location, $bean_sidebar_class, $bean_content_class;

	$bean_sidebar_location = get_post_meta ($post->ID, '_bean_page_layout', true);
	$bean_sidebar_class = "";
	$bean_content_class = "";
	
	if ( $bean_sidebar_location === 'right' ) {
	
		$bean_sidebar_class = "four columns sidebar-right";
		$bean_content_class = "eight columns sidebar-right";  
	
	} elseif ( $bean_sidebar_location === 'left' ) {
	 
		$bean_sidebar_class = "four columns pull-eight sidebar-left"; 
		$bean_content_class = "eight columns push-four sidebar-left"; 
		
	} else { 
	
		$bean_content_class = "twelve columns"; 
		
	}	
	
}


/*--------------------------------------------------------------------*/                							
/* ENABLE SHORTCODES TO TEXT WIDGET					                							
/*--------------------------------------------------------------------*/
add_filter('widget_text', 'do_shortcode');