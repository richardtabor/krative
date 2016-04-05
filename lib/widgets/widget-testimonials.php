<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Testimonials Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget to display a testimonial slider.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_testimonials' );

// REGISTER WIDGET
function reg_bean_testimonials() {
	register_widget( 'Bean_Testimonials' );
}

// WIDGET CLASS
class Bean_Testimonials extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_testimonials', // BASE ID
		'Home Testimonials (ThemeBeans)', // NAME
		array( 'description' => __( 'A custom widget to display a testimonial slider', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );
	
	// WIDGET VARIABLES
	$title = apply_filters('widget_title', $instance['title'] );

	$desc_1  = $instance['desc_1'];
	$desc_2  = $instance['desc_2'];
	$desc_3  = $instance['desc_3'];
	$desc_4  = $instance['desc_4'];
	$desc_5  = $instance['desc_5'];
	
	$bg_url     = $instance['bg_url'];
	$bg_color     = $instance['bg_color'];
	$bg_height  = $instance['bg_height'];
	$animate = $instance['animate'];
	
	?>
	
	<div class="testimonial-style" <?php if ( $bg_url != '' OR $bg_color != '' ) { ?>style="<?php if ( $bg_url != '' ) { ?>background-image: url(<?php echo $bg_url; ?>); <?php } if ( $bg_color != '' ) { ?>background-color:<?php echo $bg_color; ?>;<?php } ?>"><?php } ?>
	
		<?php  if ( $animate != '' ) { // IF ANIMATION IS SELECTED THEN ADD THIS CLASS?>	
			<script type="text/javascript">
			 (function($) {
			     $('.testimonial-style').addClass('<?php echo 'BeanBGAnimateHori';?>');
			 })(jQuery);
			</script>
		<?php } ?> 
		
		<?php echo $before_widget;
	
		if ( $title ) echo $before_title . $title . $after_title;
		
		?>
	
		<div class="row">
		
		<span class="bean-quote-icon first"></span>
		
			<div class="twelve columns">
			
				<div class="post-slider">
					
					 <script type="text/javascript">
					 	jQuery(window).load(function() {
					 		jQuery('#testimonial-slider').flexslider({
					 			namespace: "bean-",
					 			animation: "fade",
					 			animationLoop: true,
					 			slideshow: true, 
					 			animationSpeed: 800,
					 			slideshowSpeed: 4500,
					 			directionNav: false,  
					 			controlNav: false,
					 			smoothHeight: true, 
					 		 });			
					 	});
					 </script>
					 
					 <div id="testimonial-slider">
					 		 
			 			<ul class="slides">
			 				
			 				<?php if ( $desc_1 != '' ) { ?><li><h1><?php echo $desc_1; ?></h1></li><?php } ?>
			 				<?php if ( $desc_2 != '' ) { ?><li><h1><?php echo $desc_2; ?></h1></li><?php } ?>
			 				<?php if ( $desc_3 != '' ) { ?><li><h1><?php echo $desc_3; ?></h1></li><?php } ?>
			 				<?php if ( $desc_4 != '' ) { ?><li><h1><?php echo $desc_4; ?></h1></li><?php } ?>
			 				<?php if ( $desc_5 != '' ) { ?><li><h1><?php echo $desc_5; ?></h1></li><?php } ?>
			 				
			 			</ul><!-- END ul.slides -->
			 		
			 		</div><!-- END #testimonial-slider -->
						
				</div><!-- END .post-slider -->
			
			</div><!-- END .twelve-columns -->
		
		<span class="bean-quote-icon last"></span>
		
		</div><!-- END .row -->
		  
		<?php echo $after_widget; ?>
	
	</div><!-- END .testimonial-style -->
	
	<?php
}


/*--------------------------------------------------------------------*/
/*	UPDATE WIDGET
/*--------------------------------------------------------------------*/
function update( $new_instance, $old_instance ) {
	
	$instance = $old_instance;
	
	// STRIP TAGS TO REMOVE HTML - IMPORTANT FOR TEXT IMPUTS
	$instance['title'] = strip_tags( $new_instance['title'] );	
	
	$instance['desc_1'] = stripslashes( $new_instance['desc_1'] );
	$instance['desc_2'] = stripslashes( $new_instance['desc_2'] );
	$instance['desc_3'] = stripslashes( $new_instance['desc_3'] );
	$instance['desc_4'] = stripslashes( $new_instance['desc_4'] );
	$instance['desc_5'] = stripslashes( $new_instance['desc_5'] );
	
	$instance['bg_url'] = stripslashes( $new_instance['bg_url'] );
	$instance['bg_color'] = stripslashes( $new_instance['bg_color'] );
	$instance['bg_height'] = stripslashes( $new_instance['bg_height'] );
	$instance['animate'] = strip_tags( $new_instance['animate'] );

	return $instance;
}
	
	
/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'title'  => 'What People Are Saying',
		'desc_1' => 'Krative is the most impressive WordPress Theme that we&#39;ve built as of yet. Yes it&#39;s that good!',
		'desc_2' => 'Select the theme customizer from the Appearance Tab of your WordPress Dashboard to customize away.',
		'desc_3' => 'Re-order your home page as you see fit.  It&#39;s amazingly simple and incredibly intuitive. Nice!',
		'desc_4' => 'Add up to five testimonials to this widget here. Upload your own background and customizer the color too!',
		'bg_url' => 'http://assets.themebeans.com/krative/testimonials.png',
		'bg_height' => '400px',
		'animate' => true,	
	);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
	
	<p style="margin-top: 30px;">
		<label for="<?php echo $this->get_field_id( 'desc_1' ); ?>"><?php _e('Testimonial 1:', 'bean') ?></label>
		<textarea class="widefat" rows="3" cols="15" id="<?php echo $this->get_field_id( 'desc_1' ); ?>" name="<?php echo $this->get_field_name( 'desc_1' ); ?>"><?php echo $instance['desc_1']; ?></textarea>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'desc_2' ); ?>"><?php _e('Testimonial 2:', 'bean') ?></label>
		<textarea class="widefat" rows="3" cols="15" id="<?php echo $this->get_field_id( 'desc_2' ); ?>" name="<?php echo $this->get_field_name( 'desc_2' ); ?>"><?php echo $instance['desc_2']; ?></textarea>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'desc_3' ); ?>"><?php _e('Testimonial 3:', 'bean') ?></label>
		<textarea class="widefat" rows="3" cols="15" id="<?php echo $this->get_field_id( 'desc_3' ); ?>" name="<?php echo $this->get_field_name( 'desc_3' ); ?>"><?php echo $instance['desc_3']; ?></textarea>
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'desc_4' ); ?>"><?php _e('Testimonial 4:', 'bean') ?></label>
		<textarea class="widefat" rows="3" cols="15" id="<?php echo $this->get_field_id( 'desc_4' ); ?>" name="<?php echo $this->get_field_name( 'desc_4' ); ?>"><?php echo $instance['desc_4']; ?></textarea>
	</p>

	<p>
		<label for="<?php echo $this->get_field_id( 'desc_5' ); ?>"><?php _e('Testimonial 5:', 'bean') ?></label>
		<textarea class="widefat" rows="3" cols="15" id="<?php echo $this->get_field_id( 'desc_5' ); ?>" name="<?php echo $this->get_field_name( 'desc_5' ); ?>"><?php echo $instance['desc_5']; ?></textarea>
	</p>
	
	<p style="margin-top: 25px;"><strong><?php _e('Background Settings', 'bean') ?></strong></p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'bg_url' ); ?>"><?php _e('Background Image URL:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'bg_url' ); ?>" name="<?php echo $this->get_field_name( 'bg_url' ); ?>" value="<?php echo $instance['bg_url']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'bg_height' ); ?>"><?php _e('Background Height: (ex: 400px)', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'bg_height' ); ?>" name="<?php echo $this->get_field_name( 'bg_height' ); ?>" value="<?php echo $instance['bg_height']; ?>" />
	</p>
	
	<p>
		<label for="<?php echo $this->get_field_id( 'bg_color' ); ?>"><?php _e('BG Color: (ex: #1FB4DA)', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'bg_color' ); ?>" name="<?php echo $this->get_field_name( 'bg_color' ); ?>" value="<?php echo $instance['bg_color']; ?>" />
	</p>
	
	<p>
	<?php if ($instance['animate']){ ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'animate' ); ?>" name="<?php echo $this->get_field_name( 'animate' ); ?>" checked="checked" />
	<?php } else { ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'animate' ); ?>" name="<?php echo $this->get_field_name( 'animate' ); ?>"  />
	<?php } ?>
	
	<label for="<?php echo $this->get_field_id( 'animate' ); ?>"><?php _e('&nbsp;Animate Background', 'bean') ?></label>
	</p>
		
  	<?php
	} // END FORM

} // END CLASS
?>