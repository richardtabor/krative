<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Call to Action Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget that displays a newsletter sign up feild.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_cta' );

// REGISTER WIDGET
function reg_bean_cta() {
	register_widget( 'Bean_CTA_Widget' );
}

// WIDGET CLASS
class Bean_CTA_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_cta', // BASE ID
		'Home Call to Action (ThemeBeans)', // NAME
		array( 'description' => __( 'A custom widget that displays a call to action', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );

	// WIDGET VARIABLES
	$title = apply_filters('widget_title', $instance['title'] );
	
	$desc  = $instance['desc'];
	
	$btn1_text  = $instance['btn1_text'];
	$btn2_text  = $instance['btn2_text'];
	
	$btn1_url  = $instance['btn1_url'];
	$btn2_url  = $instance['btn2_url'];
	
	$attention_1 = $instance['attention_1'];
	$attention_2 = $instance['attention_2'];

	// BEFORE WIDGET
	echo $before_widget;
	
	if ( $title ) { ?><h3><?php echo $title; ?></h3><?php } ?>
	
	<div class="row">
		
		<div class="ten columns centered">
			
			<p><?php echo $desc; ?></p>
			
			<div class="eleven columns centered action-buttons">
			
			<?php if ( $btn1_text != '' ) { ?>		
				<div class="<?php if ( $btn2_text == '' ) { ?>twelve<?php } else { ?>six<?php } ?> columns">
				
					<a href="<?php echo $btn1_url; ?>" class="button cta <?php if ( $attention_1 != '' ) { ?>attention animated BeanButtonShake<?php } ?>"><h3><?php echo $btn1_text; ?><?php if ( $attention_1 != '' ) { ?><span class="cta-arrow"></span><?php } ?></h3></a>
				
				</div><!-- END .six columns -->
			<?php } ?>
			
			<?php if ( $btn2_text != '' ) { ?>		
				<div class="six columns">
				
					<a href="<?php echo $btn2_url; ?>" class="button cta <?php if ( $attention_2 != '' ) { ?>attention animated BeanButtonShake<?php } ?>"><h3><?php echo $btn2_text; ?><?php if ( $attention_2 != '' ) { ?><span class="cta-arrow"></span><?php } ?></h3></a>
				
				</div><!-- END .six columns -->
			<?php } ?>
			
			</div><!-- END .ten columns centered -->
			
		</div><!-- END .ten columns centered -->
	
	</div><!-- END .row -->
	
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
	
	$instance['desc'] = stripslashes( $new_instance['desc'] );
	
	$instance['btn1_text'] = stripslashes( $new_instance['btn1_text'] );
	$instance['btn2_text'] = stripslashes( $new_instance['btn2_text'] );
	
	$instance['btn1_url'] = stripslashes( $new_instance['btn1_url'] );
	$instance['btn2_url'] = stripslashes( $new_instance['btn2_url'] );
	
	$instance['attention_1'] = strip_tags( $new_instance['attention_1'] );
	$instance['attention_2'] = strip_tags( $new_instance['attention_2'] );

	return $instance;
}
	
	
/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'title' => 'Let&#39;s Work Together.',
		'desc' => 'This is a fully customizable call to action widget that can be placed in any of the large widget areas. Customize everything here with ease, including an option to emphasize (accent color/arrow), text & url for each button.',
		
		'btn1_text' => 'Ask a Question',
		'btn2_text' => 'Send a Work Query',
		
		'btn1_url' => 'http://',
		'btn2_url' => 'http://',
		
		'attention_1' => false,
		'attention_2' => true
		);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
	<p>
	<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bean') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id( 'desc' ); ?>"><?php _e('Paragraph:', 'bean') ?></label>
	<textarea class="widefat" rows="7" cols="15" id="<?php echo $this->get_field_id( 'desc' ); ?>" name="<?php echo $this->get_field_name( 'desc' ); ?>"><?php echo $instance['desc']; ?></textarea>
	</p>
	<br/>
	<p>
	<label for="<?php echo $this->get_field_id( 'btn1_text' ); ?>"><?php _e('Button 1 Text:', 'bean') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'btn1_text' ); ?>" name="<?php echo $this->get_field_name( 'btn1_text' ); ?>" value="<?php echo $instance['btn1_text']; ?>" />
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id( 'btn1_url' ); ?>"><?php _e('Button 1 URL:', 'bean') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'btn1_url' ); ?>" name="<?php echo $this->get_field_name( 'btn1_url' ); ?>" value="<?php echo $instance['btn1_url']; ?>" />
	</p>
	
	<p>
	<?php if ($instance['attention_1']){ ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'attention_1' ); ?>" name="<?php echo $this->get_field_name( 'attention_1' ); ?>" checked="checked" />
	<?php } else { ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'attention_1' ); ?>" name="<?php echo $this->get_field_name( 'attention_1' ); ?>"  />
	<?php } ?>
	<label for="<?php echo $this->get_field_id( 'attention_1' ); ?>"><?php _e('Emphasize this Button', 'bean') ?></label>
	</p>
	
	<br/>
	<p>
	<label for="<?php echo $this->get_field_id( 'btn2_text' ); ?>"><?php _e('Button 2 Text:', 'bean') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'btn2_text' ); ?>" name="<?php echo $this->get_field_name( 'btn2_text' ); ?>" value="<?php echo $instance['btn2_text']; ?>" />
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id( 'btn2_url' ); ?>"><?php _e('Button 2 URL:', 'bean') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'btn2_url' ); ?>" name="<?php echo $this->get_field_name( 'btn2_url' ); ?>" value="<?php echo $instance['btn2_url']; ?>" />
	</p>
	
	<p>
	<?php if ($instance['attention_2']){ ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'attention_2' ); ?>" name="<?php echo $this->get_field_name( 'attention_2' ); ?>" checked="checked" />
	<?php } else { ?>
	<input type="checkbox" style="margin-top: 3px;" id="<?php echo $this->get_field_id( 'attention_2' ); ?>" name="<?php echo $this->get_field_name( 'attention_2' ); ?>"  />
	<?php } ?>
	<label for="<?php echo $this->get_field_id( 'attention_2' ); ?>"><?php _e('Emphasize this Button', 'bean') ?></label>
	</p>
	
	<?php
	} // END FORM

} // END CLASS
?>