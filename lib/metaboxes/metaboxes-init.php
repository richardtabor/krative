<?php

/********************* META BOX DEFINITIONS ***********************/

$prefix = '_bean_';

global $meta_boxes, $pagenow;

$meta_boxes = array();

 
/********************* META BOX REGISTERING ***********************/

/**
 * Register meta boxes
 * @return void
 */
 
function bean_register_meta_boxes() {
	global $meta_boxes;

	// Make sure there's no errors when the plugin is deactivated or during upgrade
	if ( class_exists( 'RW_Meta_Box' ) ) {
		foreach ( $meta_boxes as $meta_box ) {
			new RW_Meta_Box( $meta_box );
		}
	}
}

// Hook to 'admin_init' to make sure the meta box class is loaded
add_action( 'admin_init', 'bean_register_meta_boxes' );

add_action( 'admin_enqueue_scripts', 'bean_load_metabox_conditional_js');
function bean_load_metabox_conditional_js() {
	
	wp_enqueue_script( 'rwmb-post-formats', BEAN_LIB_URL . '/metaboxes/js/post-formats.js', 'jquery', RWMB_VER, true );
	wp_enqueue_script( 'rwmb-portfolio', BEAN_LIB_URL . '/metaboxes/js/portfolio.js', 'jquery', RWMB_VER, true );

}