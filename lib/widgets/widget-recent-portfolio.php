<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Recent Portfolios Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget to display a theme slideshow.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_recent_portfolio' );

// REGISTER WIDGET
function reg_bean_recent_portfolio() {
	register_widget( 'Bean_Recent_Portfolio_Widget' );
}

// WIDGET CLASS
class Bean_Recent_Portfolio_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_recent_portfolio', // BASE ID
		'Home Recent Portfolios (ThemeBeans)', // NAME
		array( 'description' => __( 'A custom widget to display recent portfolio posts', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );
	
	// WIDGET VARIABLES
	$title = apply_filters('widget_title', $instance['title'] );
	$postcount = $instance['postcount'];
	$overflow_hidden = $instance['overflow_hidden'];
	$randomize = $instance['randomize'];	
	//RANDOMIZE / ARROWS OPTIONS
	$orderby = ( $randomize == true ) ? 'rand' : 'date';
	$arrows = ( $overflow_hidden == true ) ? 'true' : 'false';
	$autoplay = ( $overflow_hidden == false ) ? 'true' : 'false';
	
	// BEFORE WIDGET
	echo $before_widget;
	if ( $title ) echo $before_title . $title . $after_title;
	
	//PULL THE PORTFOLIO POSTS
	$args = array(
    'post_type' 		=> 'portfolio',
    'orderby' 			=> 'date',
    'order' 			=> 'DSC',
    'posts_per_page' 	=>  $postcount,
    'orderby'		     => $orderby,
    'meta_key' 		=> '_thumbnail_id'
	); 
     
    $portfolios = new WP_Query($args);
        
    if( $portfolios->have_posts() ) : 
        $post_count = $portfolios->post_count;
        $i = 1;
     ?>

	<div class='row'>
		
		<div class='post-slider'>
			
			 <script type="text/javascript">
			 	jQuery(window).load(function() {
			 		jQuery('#portfolio-slider').flexslider({
			 			namespace: "bean-", 
			 			controlsContainer: ".flex-control-nav-container",
			 			animation: "slide",
			 			startAt: 1,  
			 			slideshow: <?php echo $autoplay ?>, 
			 			animationLoop: true,
			 			animationSpeed: 600,
			 			slideshowSpeed: 5000,
			 			pauseOnHover: true,
			 			directionNav: <?php echo $arrows ?>,
			 			smoothHeight: true, 
			 			controlNav: false,
						touch: false,
					    keyboard: true
			 		 });
			 	});
			 </script>

			 <div id='portfolio-slider'>
			 
				<ul class="slides">
					
					<?php while( $portfolios->have_posts() ) : $portfolios->the_post(); ?>	
					
					<?php if( $i % 6 == 1 ) { echo '<li class="slide">'; } ?>
					
					<div class="four columns mobile-two">
					
						<?php if ( (function_exists('has_post_thumbnail')) && (has_post_thumbnail()) ) { ?>
						
							<div class="post-thumb">
									
								<a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfolio-feat'); ?></a> 
							   								
							</div><!-- END .post-thumb --> 
						
						<?php } ?>
					
					</div><!-- END .four-columns -->	
					
				 	<?php if( $i % 6 == 0 || $i == $post_count ) { echo '</li>'; } ?>
					<?php $i++; ?>
					<?php endwhile; wp_reset_postdata(); ?>
		
				</ul><!-- END ul.slides -->
		
			</div><!-- END #portfolio-slider -->
				
		</div><!-- END .post-slider -->
		
	</div><!-- END .row -->	
		
	<?php if ( $overflow_hidden == true ) { ?><style>#portfolio-slider .bean-viewport { overflow: hidden!important; }</style> <?php } ?>	
	
	<?php endif; ?>

	<?php 
	// AFTER WIDGET
	echo $after_widget;
}


/*--------------------------------------------------------------------*/
/*	UPDATE WIDGET
/*--------------------------------------------------------------------*/
function update( $new_instance, $old_instance ) {
	
	$instance = $old_instance;
	
	// STRIP TAGS TO REMOVE HTML - IMPORTANT FOR TEXT IMPUTS
	$instance['title'] = strip_tags( $new_instance['title'] );
	$instance['postcount'] = strip_tags( $new_instance['postcount'] );
	$instance['overflow_hidden'] = strip_tags( $new_instance['overflow_hidden'] );	
	$instance['randomize'] = strip_tags( $new_instance['randomize'] );	

	return $instance;
}
	
	
/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'title' => 'What We Have Been Working On',
		'postcount' => '6',
		'overflow_hidden' => true,
		'randomize' => true
		);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'postcount' ); ?>"><?php _e('Post Count (6, 12, 18, etc):', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'postcount' ); ?>" name="<?php echo $this->get_field_name( 'postcount' ); ?>" value="<?php echo $instance['postcount']; ?>" />
	</p>
	
	<p>
	<?php if ($instance['randomize']){ ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'randomize' ); ?>" name="<?php echo $this->get_field_name( 'randomize' ); ?>" checked="checked" />
	<?php } else { ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'randomize' ); ?>" name="<?php echo $this->get_field_name( 'randomize' ); ?>"  />
	<?php } ?>
	
	<label for="<?php echo $this->get_field_id( 'randomize' ); ?>"><?php _e('&nbsp;Randomize', 'bean') ?></label>
	</p>
	
	<p>
	<?php if ($instance['overflow_hidden']){ ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'overflow_hidden' ); ?>" name="<?php echo $this->get_field_name( 'overflow_hidden' ); ?>" checked="checked" />
	<?php } else { ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'overflow_hidden' ); ?>" name="<?php echo $this->get_field_name( 'overflow_hidden' ); ?>"  />
	<?php } ?>
	
	<label for="<?php echo $this->get_field_id( 'overflow_hidden' ); ?>"><?php _e('&nbsp;Hide Overflow (Not Fullwidth)', 'bean') ?></label>
	</p>
	
	
  	<?php
	} // END FORM

} // END CLASS
?>