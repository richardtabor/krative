<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Newsletter Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget that displays a newsletter sign up feild.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_intro' );

// REGISTER WIDGET
function reg_bean_intro() {
	register_widget( 'Bean_Intro_Widget' );
}

// WIDGET CLASS
class Bean_Intro_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_intro', // BASE ID
		'Home Intro Widget (ThemeBeans)', // NAME
		array( 'description' => __( 'A custom widget that displays up to three intro text areas', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );

	// WIDGET VARIABLES
	$title_1 = $instance['title_1'];
	$title_2 = $instance['title_2'];
	$title_3 = $instance['title_3'];
	
	$desc_1  = $instance['desc_1'];
	$desc_2  = $instance['desc_2'];
	$desc_3  = $instance['desc_3'];

	// BEFORE WIDGET
	echo $before_widget;

	?>
	
	<div class="row">
		
		<?php if ( $desc_1 != '' ) { ?>
		
			<div class="<?php if ( $desc_3 == '' ) { echo 'six'; } else { echo'four'; } ?> columns mobile-four">
			
				<h3><?php echo $title_1; ?></h3>
				<p><?php echo $desc_1; ?></p>
				
			</div><!-- END .four columns -->
		
		<?php } ?>
		
		<?php if ( $desc_2 != '' ) { ?>
			
			<div class="<?php if ( $desc_3 == '' ) { echo 'six'; } else { echo'four'; } ?> columns mobile-four">
			
				<h3><?php echo $title_2; ?></h3>
				<p><?php echo $desc_2; ?></p>
				
			</div><!-- END .four columns -->
		
		<?php } ?>
		
		<?php if ( $desc_3 != '' ) { ?>
			
			<div class="four columns mobile-four">
			
				<h3><?php echo $title_3; ?></h3>
				<p><?php echo $desc_3; ?></p>
				
			</div><!-- END .four columns -->
		
		<?php } ?>
		
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
	$instance['title_1'] = strip_tags( $new_instance['title_1'] );
	$instance['title_2'] = strip_tags( $new_instance['title_2'] );
	$instance['title_3'] = strip_tags( $new_instance['title_3'] );
	
	$instance['desc_1'] = stripslashes( $new_instance['desc_1'] );
	$instance['desc_2'] = stripslashes( $new_instance['desc_2'] );
	$instance['desc_3'] = stripslashes( $new_instance['desc_3'] );

	return $instance;
}
	
	
/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'title_1' => 'Who.',
		'title_2' => 'What.',
		'title_3' => 'Where.',
		
		'desc_1' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit.',
		'desc_2' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit.',
		'desc_3' => 'Vivamus sagittis lacus vel augue laoreet rutrum faucibus dolor auctor. Maecenas sed diam eget risus varius blandit.',
		
		);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
	<p>
	<label for="<?php echo $this->get_field_id( 'title_1' ); ?>"><?php _e('Section 1:', 'bean') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title_1' ); ?>" name="<?php echo $this->get_field_name( 'title_1' ); ?>" value="<?php echo $instance['title_1']; ?>" />
	</p>
	
	<p style="margin-top: -8px;">
	<textarea class="widefat" rows="3" cols="15" id="<?php echo $this->get_field_id( 'desc_1' ); ?>" name="<?php echo $this->get_field_name( 'desc_1' ); ?>"><?php echo $instance['desc_1']; ?></textarea>
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id( 'title_2' ); ?>"><?php _e('Section 2:', 'bean') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title_2' ); ?>" name="<?php echo $this->get_field_name( 'title_2' ); ?>" value="<?php echo $instance['title_2']; ?>" />
	</p>
	
	<p style="margin-top: -8px;">
	<textarea class="widefat" rows="3" cols="15" id="<?php echo $this->get_field_id( 'desc_2' ); ?>" name="<?php echo $this->get_field_name( 'desc_2' ); ?>"><?php echo $instance['desc_2']; ?></textarea>
	</p>
	
	<p>
	<label for="<?php echo $this->get_field_id( 'title_3' ); ?>"><?php _e('Section 3:', 'bean') ?></label>
	<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title_3' ); ?>" name="<?php echo $this->get_field_name( 'title_3' ); ?>" value="<?php echo $instance['title_3']; ?>" />
	</p>
	
	<p style="margin-top: -8px;">
	<textarea class="widefat" rows="3" cols="15" id="<?php echo $this->get_field_id( 'desc_3' ); ?>" name="<?php echo $this->get_field_name( 'desc_3' ); ?>"><?php echo $instance['desc_3']; ?></textarea>
	</p>
	


	<?php
	} // END FORM

} // END CLASS
?>