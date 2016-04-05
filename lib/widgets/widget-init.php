<?php 
/*-----------------------------------------------------------------------------------*/
/*	REGISTER BASE WIDGET AREAS
/*-----------------------------------------------------------------------------------*/
if ( function_exists('register_sidebar') ) {
    $allWidgetizedAreas = 
        array(
                __( 'Internal Sidebar', 'bean' ),
                __( 'Hidden Sidebar Panel', 'bean' ),
                    
            );
            
    foreach ($allWidgetizedAreas as $WidgetAreaName) {
        register_sidebar(array(
           'name'			=> $WidgetAreaName,
           'before_widget' 	=> '<div class="widget %2$s clearfix">',
           'after_widget' 	=> '</div><div class="sep clearfix "></div>',
           'before_title' 	=> '<h5 class="widget-title">',
           'after_title' 	=> '</h5>',
        ));
    }
}	


/*-----------------------------------------------------------------------------------*/
/*	REGISTER HOME SECTION WIDGET AREAS
/*-----------------------------------------------------------------------------------*/
register_sidebar(
	array(
	'name'          => __('Home Section One', 'bean'),
	'id'          	=> 'home_section_one',
	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' 	=> '</div>',
	'before_title' 	=> '<h5 class="widget-title">',
	'after_title' 	=> '</h5>',
));

register_sidebar(
	array(
	'name'          => __('Home Section Two', 'bean'),
	'id'          	=> 'home_section_two',
	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' 	=> '</div>',
	'before_title' 	=> '<h5 class="widget-title">',
	'after_title' 	=> '</h5>',
));

register_sidebar(
	array(
	'name'          => __('Home Section Three', 'bean'),
	'id'          	=> 'home_section_three',
	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' 	=> '</div>',
	'before_title' 	=> '<h5 class="widget-title">',
	'after_title' 	=> '</h5>',
));

register_sidebar(
	array(
	'name'          => __('Home Section Four', 'bean'),
	'id'          	=> 'home_section_four',
	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' 	=> '</div>',
	'before_title' 	=> '<h5 class="widget-title">',
	'after_title' 	=> '</h5>',
));

register_sidebar(
	array(
	'name'          => __('Home Section Five', 'bean'),
	'id'          	=> 'home_section_five',
	'before_widget' => '<div class="widget %2$s clearfix">',
	'after_widget' 	=> '</div>',
	'before_title' 	=> '<h5 class="widget-title">',
	'after_title' 	=> '</h5>',
));


?>