<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Clients Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget that displays up to 8 client logos
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_clients' );

// REGISTER WIDGET
function reg_bean_clients() {
	register_widget( 'Bean_Clients_Widget' );
}

// WIDGET CLASS
class Bean_Clients_Widget extends WP_Widget {

	
/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_clients', // BASE ID
		'Home Clients Widget (ThemeBeans)', // NAME
		array( 'description' => __( 'A widget that displays up to 8 client logos', 'bean' ), )
	);
}

	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );

	// WIDGET VARIABLES
	$image1 = $instance['image1'];
	$image2 = $instance['image2'];
	$image3 = $instance['image3'];
	$image4 = $instance['image4'];
	$image5 = $instance['image5'];
	$image6 = $instance['image6'];
	$image7 = $instance['image7'];
	$image8 = $instance['image8'];
	$link1 = $instance['link1'];
	$link2 = $instance['link2'];
	$link3 = $instance['link3'];
	$link4 = $instance['link4'];
	$link5 = $instance['link5'];
	$link6 = $instance['link6'];
	$link7 = $instance['link7'];
	$link8 = $instance['link8'];

	// BEFORE WIDGET
	echo $before_widget;

	?>
	
	<div class="row">
	                   	
    <ul>
					
		<?php if($image1 != '') : ?>
		<a href="<?php echo $link1; ?>">
			<li class="three columns mobile-two">
				<div class="client-logo">
					<img src="<?php echo $image1; ?>" alt=""/>
				</div><!-- END .client-logo -->
			</li><!-- END .three columns -->
		</a>   
		<?php endif; ?>
		
		<?php if($image2 != '') : ?>
		<a href="<?php echo $link2; ?>">
			<li class="three columns mobile-two">
				<div class="client-logo">
					<img src="<?php echo $image2; ?>" alt=""/>
				</div><!-- END .client-logo -->
			</li><!-- END .three columns -->
		</a>   
		<?php endif; ?>
		
		<?php if($image3 != '') : ?>
		<a href="<?php echo $link3; ?>">
			<li class="three columns mobile-two">
				<div class="client-logo">
					<img src="<?php echo $image3; ?>" alt=""/>
				</div><!-- END .client-logo -->
			</li><!-- END .three columns -->
		</a>   
		<?php endif; ?>
		
		<?php if($image4 != '') : ?>
		<a href="<?php echo $link4; ?>">
			<li class="three columns mobile-two">
				<div class="client-logo">
					<img src="<?php echo $image4; ?>" alt=""/>
				</div><!-- END .client-logo -->
			</li><!-- END .three columns -->
		</a>   
		<?php endif; ?>
		
		<?php if($image5 != '') : ?>
		<a href="<?php echo $link5; ?>">
			<li class="three columns mobile-two">
				<div class="client-logo">
					<img src="<?php echo $image5; ?>" alt=""/>
				</div><!-- END .client-logo -->
			</li><!-- END .three columns -->
		</a>   
		<?php endif; ?>
		
		<?php if($image6 != '') : ?>
			<a href="<?php echo $link6; ?>">
				<li class="three columns mobile-two">
					<div class="client-logo">
						<img src="<?php echo $image6; ?>" alt=""/>
					</div><!-- END .client-logo -->
				</li><!-- END .three columns -->
			</a>   
		<?php endif; ?>
		
		<?php if($image7 != '') : ?>
			<a href="<?php echo $link7; ?>">
				<li class="three columns mobile-two">
					<div class="client-logo">
						<img src="<?php echo $image7; ?>" alt=""/>
					</div><!-- END .client-logo -->
				</li><!-- END .three columns -->
			</a>   
		<?php endif; ?>
		
		<?php if($image8 != '') : ?>
		   <a href="<?php echo $link8; ?>">
		       <li class="three columns mobile-two">
			       <div class="client-logo">
			           	<img src="<?php echo $image8; ?>" alt=""/>
			       </div><!-- END .client-logo -->
		       </li><!-- END .three columns -->
		   </a>   
		<?php endif; ?>
		
	</ul>
	
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
	
	// NO NEED TO STRIP
	$instance['image1'] = $new_instance['image1'];
	$instance['image2'] = $new_instance['image2'];
	$instance['image3'] = $new_instance['image3'];
	$instance['image4'] = $new_instance['image4'];
	$instance['image5'] = $new_instance['image5'];
	$instance['image6'] = $new_instance['image6'];
	$instance['image7'] = $new_instance['image7'];
	$instance['image8'] = $new_instance['image8'];
	$instance['link1'] = $new_instance['link1'];
	$instance['link2'] = $new_instance['link2'];
	$instance['link3'] = $new_instance['link3'];
	$instance['link4'] = $new_instance['link4'];
	$instance['link5'] = $new_instance['link5'];
	$instance['link6'] = $new_instance['link6'];	
	$instance['link7'] = $new_instance['link7'];
	$instance['link8'] = $new_instance['link8'];	
	
	return $instance;
}
	
	
/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'image1' => 'http://www.assets.themebeans.com/krative/logo1.png',
		'image2' => 'http://www.assets.themebeans.com/krative/logo2.png',
		'image3' => 'http://www.assets.themebeans.com/krative/logo3.png',
		'image4' => 'http://www.assets.themebeans.com/krative/logo4.png',		
		'image5' => 'http://www.assets.themebeans.com/krative/logo5.png',
		'image6' => 'http://www.assets.themebeans.com/krative/logo6.png',
		'image7' => 'http://www.assets.themebeans.com/krative/logo7.png',
		'image8' => 'http://www.assets.themebeans.com/krative/logo8.png',		
		'link1'  => '',
		'link2'  => '',
		'link3'  => '',
		'link4'  => '',
		'link5'  => '',
		'link6'  => '',
		'link7'  => '',
		'link8'  => '',
		);
			
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>
	
		<p>
			<label for="<?php echo $this->get_field_id( 'image1' ); ?>"><?php _e('Image 1 Direct URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'image1' ); ?>" name="<?php echo $this->get_field_name( 'image1' ); ?>" value="<?php echo $instance['image1']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'link1' ); ?>"><?php _e('Link URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'link1' ); ?>" name="<?php echo $this->get_field_name( 'link1' ); ?>" value="<?php echo $instance['link1']; ?>" />
		</p>	
		
		<p>
			<label for="<?php echo $this->get_field_id( 'image2' ); ?>"><?php _e('Image 2 Direct URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'image2' ); ?>" name="<?php echo $this->get_field_name( 'image2' ); ?>" value="<?php echo $instance['image2']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'link2' ); ?>"><?php _e('Link URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'link2' ); ?>" name="<?php echo $this->get_field_name( 'link2' ); ?>" value="<?php echo $instance['link2']; ?>" />
		</p>	

		<p>
			<label for="<?php echo $this->get_field_id( 'image3' ); ?>"><?php _e('Image 3 Direct URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'image3' ); ?>" name="<?php echo $this->get_field_name( 'image3' ); ?>" value="<?php echo $instance['image3']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'link3' ); ?>"><?php _e('Link URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'link3' ); ?>" name="<?php echo $this->get_field_name( 'link3' ); ?>" value="<?php echo $instance['link3']; ?>" />
		</p>	

		<p>
			<label for="<?php echo $this->get_field_id( 'image4' ); ?>"><?php _e('Image 4 Direct URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'image4' ); ?>" name="<?php echo $this->get_field_name( 'image4' ); ?>" value="<?php echo $instance['image4']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'link4' ); ?>"><?php _e('Link URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'link4' ); ?>" name="<?php echo $this->get_field_name( 'link4' ); ?>" value="<?php echo $instance['link4']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'image5' ); ?>"><?php _e('Image 5 Direct URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'image5' ); ?>" name="<?php echo $this->get_field_name( 'image5' ); ?>" value="<?php echo $instance['image5']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'link5' ); ?>"><?php _e('Link URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'link5' ); ?>" name="<?php echo $this->get_field_name( 'link5' ); ?>" value="<?php echo $instance['link5']; ?>" />
		</p>		

		<p>
			<label for="<?php echo $this->get_field_id( 'image6' ); ?>"><?php _e('Image 6 Direct URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'image6' ); ?>" name="<?php echo $this->get_field_name( 'image6' ); ?>" value="<?php echo $instance['image6']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'link6' ); ?>"><?php _e('Link URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'link6' ); ?>" name="<?php echo $this->get_field_name( 'link6' ); ?>" value="<?php echo $instance['link6']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'image7' ); ?>"><?php _e('Image 7 Direct URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'image7' ); ?>" name="<?php echo $this->get_field_name( 'image7' ); ?>" value="<?php echo $instance['image7']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'link7' ); ?>"><?php _e('Link URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'link7' ); ?>" name="<?php echo $this->get_field_name( 'link7' ); ?>" value="<?php echo $instance['link7']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'image8' ); ?>"><?php _e('Image 8 Direct URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'image8' ); ?>" name="<?php echo $this->get_field_name( 'image8' ); ?>" value="<?php echo $instance['image8']; ?>" />
		</p>
		
		<p>
			<label for="<?php echo $this->get_field_id( 'link7' ); ?>"><?php _e('Link URL:', 'bean') ?></label>
			<input type="text" class="widefat"  id="<?php echo $this->get_field_id( 'link8' ); ?>" name="<?php echo $this->get_field_name( 'link8' ); ?>" value="<?php echo $instance['link8']; ?>" />
		</p>	
		
		<?php
		}
	}
?>