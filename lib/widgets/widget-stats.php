<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Stats Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget that displays stats for the about us template.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_stats' );

// REGISTER WIDGET
function reg_bean_stats() {
	register_widget( 'Bean_Stats_Widget' );
}

// WIDGET CLASS
class Bean_Stats_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_stats', // BASE ID
		'Home Stats (ThemeBeans)', // NAME
		array( 'description' => __( 'A custom widget that displays stats for the about us template', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );
	
	$title = apply_filters('widget_title', $instance['title'] );

	// WIDGET VARIABLES
	$number1 = $instance['number1'];
	$number2 = $instance['number2'];
	$number3 = $instance['number3'];
	$number4 = $instance['number4'];
	
	$title1 = $instance['title1'];
	$title2 = $instance['title2'];
	$title3 = $instance['title3'];
	$title4 = $instance['title4'];

	// BEFORE WIDGET
	echo $before_widget;

	?> 
	

	<div class="row">	
	
		<ul>
		
			<?php if($number1 && $title1 != '') : ?>
			
				<li class="three columns mobile-two">
					<div class="bean-stat">
						<span class="stat-number"><?php echo $number1; ?></span>
						<p class="stat-title"><?php echo $title1; ?></p>
					</div><!--END .bean-stat-->
				</li>	
			
			<?php endif; ?>
			
			<?php if($number2 && $title2 != '') : ?>
			
				<li class="three columns mobile-two">
					<div class="bean-stat">
						<span class="stat-number"><?php echo $number2; ?></span>
						<p class="stat-title"><?php echo $title2; ?></p>
					</div><!--END .bean-stat-->
				</li>		
			
			<?php endif; ?>
			
			<?php if($number3 && $title3 != '') : ?>
			
				<li class="three columns mobile-two">
					<div class="bean-stat">
						<span class="stat-number"><?php echo $number3; ?></span>
						<p class="stat-title"><?php echo $title3; ?></p>
					</div><!--END .bean-stat-->
				</li>
			
			<?php endif; ?>

			<?php if($number4 && $title4 != '') : ?>
			
				<li class="three columns mobile-two">
					<div class="bean-stat">
						<span class="stat-number"><?php echo $number4; ?></span>
						<p class="stat-title"><?php echo $title4; ?></p>
					</div><!--END .bean-stat-->
				</li><!--END .stat four columns-->	
			
			<?php endif; ?>
			
		</ul>			

	 </div><!--END .row-->
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
	$instance['number1'] = stripslashes( $new_instance['number1'] );
	$instance['number2'] = stripslashes( $new_instance['number2'] );
	$instance['number3'] = stripslashes( $new_instance['number3'] );
	$instance['number4'] = stripslashes( $new_instance['number4'] );
	
	$instance['title1'] = stripslashes( $new_instance['title1'] );
	$instance['title2'] = stripslashes( $new_instance['title2'] );
	$instance['title3'] = stripslashes( $new_instance['title3'] );
	$instance['title4'] = stripslashes( $new_instance['title4'] );

	return $instance;
}
	
	
/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'number1' => '21',
		'number2' => '103',
		'number3' => '77',
		'number4' => '340',
		'title1' => 'WordPress Themes',
		'title2' => 'Customization Options',
		'title3' => 'Shortcodes Galore',
		'title4' => 'WordPress Plugins',
		);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
 
    <table>
    	<tr>
        	<td width="70%">		
    			<label for="<?php echo $this->get_field_id( 'title1' ); ?>"><?php _e('1. Title:', 'bean') ?></label>
    			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title1' ); ?>" name="<?php echo $this->get_field_name( 'title1' ); ?>" value="<?php echo $instance['title1']; ?>" />
    		</td>
    		
    		<td width="30%">	
    			<label for="<?php echo $this->get_field_id( 'number1' ); ?>"><?php _e('Count:', 'bean') ?></label>
    			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number1' ); ?>" name="<?php echo $this->get_field_name( 'number1' ); ?>" value="<?php echo $instance['number1']; ?>" />
    		</td>
    	</tr>
    </table>
    
    <table>
    	<tr>
        	<td width="70%">		
    			<label for="<?php echo $this->get_field_id( 'title2' ); ?>"><?php _e('2. Title:', 'bean') ?></label>
    			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title2' ); ?>" name="<?php echo $this->get_field_name( 'title2' ); ?>" value="<?php echo $instance['title2']; ?>" />
    		</td>
    		
    		<td width="30%">	
    			<label for="<?php echo $this->get_field_id( 'number2' ); ?>"><?php _e('Count:', 'bean') ?></label>
    			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number2' ); ?>" name="<?php echo $this->get_field_name( 'number2' ); ?>" value="<?php echo $instance['number2']; ?>" />
    		</td>
    	</tr>
    </table>
    
    <table>
    	<tr>
        	<td width="70%">		
    			<label for="<?php echo $this->get_field_id( 'title3' ); ?>"><?php _e('3. Title:', 'bean') ?></label>
    			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title3' ); ?>" name="<?php echo $this->get_field_name( 'title3' ); ?>" value="<?php echo $instance['title3']; ?>" />
    		</td>
    		
    		<td width="30%">	
    			<label for="<?php echo $this->get_field_id( 'number3' ); ?>"><?php _e('Count:', 'bean') ?></label>
    			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number3' ); ?>" name="<?php echo $this->get_field_name( 'number3' ); ?>" value="<?php echo $instance['number3']; ?>" />
    		</td>
    	</tr>
    </table>
    
    <table>
    	<tr>
        	<td width="70%">		
    			<label for="<?php echo $this->get_field_id( 'title4' ); ?>"><?php _e('4. Title:', 'bean') ?></label>
    			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title4' ); ?>" name="<?php echo $this->get_field_name( 'title4' ); ?>" value="<?php echo $instance['title4']; ?>" />
    		</td>
    		
    		<td width="30%">	
    			<label for="<?php echo $this->get_field_id( 'number4' ); ?>"><?php _e('Count:', 'bean') ?></label>
    			<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'number4' ); ?>" name="<?php echo $this->get_field_name( 'number4' ); ?>" value="<?php echo $instance['number4']; ?>" />
    		</td>
    	</tr>
    </table>
	<?php
	} // END FORM

} // END CLASS
?>