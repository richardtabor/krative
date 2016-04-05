<?php

/*--------------------------------------------------------------------

 	Widget Name: Bean Recent Posts Widget
 	Widget URI: http://www.themebeans.com
 	Description:  A custom widget to display a theme slideshow.
 	Author: ThemeBeans
 	Author URI: http://www.themebeans.com
 
/*--------------------------------------------------------------------*/

// ADD FUNTION TO WIDGETS_INIT
add_action( 'widgets_init', 'reg_bean_recent_posts' );

// REGISTER WIDGET
function reg_bean_recent_posts() {
	register_widget( 'Bean_Recent_Posts_Widget' );
}

// WIDGET CLASS
class Bean_Recent_Posts_Widget extends WP_Widget {


/*--------------------------------------------------------------------*/
/*	WIDGET SETUP
/*--------------------------------------------------------------------*/
public function __construct() {
	parent::__construct(
 		'bean_recent_posts', // BASE ID
		'Home Recent Posts (ThemeBeans)', // NAME
		array( 'description' => __( 'A custom widget to display recent posts.', 'bean' ), )
	);
}
	
	
/*--------------------------------------------------------------------*/
/*	DISPLAY WIDGET
/*--------------------------------------------------------------------*/
function widget( $args, $instance ) {
	extract( $args );
	
	// WIDGET VARIABLES
	$title = apply_filters('widget_title', $instance['title'] );

	// BEFORE WIDGET
	echo $before_widget;

	if ( $title ) echo $before_title . $title . $after_title;
	
	?>

	<div class="row">
	
		<ul>
			<?php $args = array(
				'orderby' 			=> 'date',
				'order' 			=> 'DSC',
				'posts_per_page' 	=>  2,
				'meta_key' => '_thumbnail_id',
				'tax_query' => array( //DO NOT ALLOW IMAGE POST FORMATS
					array(
					'taxonomy' => 'post_format',
					'field' => 'slug',
					'terms' => 'post-format-image',
					'operator' => 'NOT IN',
					)
				)
			); 

			query_posts($args); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			
			<li>
				<article id="post-<?php the_ID(); ?>" class="six columns mobile-two">
				
					<div class="post-thumb">
					
						<?php $format = get_post_format(); //DISPLAY POST TYPE ICONS
						if( $format == 'video' )   { ?><span class="format-icon video"></span><?php   }
						if( $format == 'audio' )   { ?><span class="format-icon audio"></span><?php   }
						?>
						
						<a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('post-feat'); ?></a>
							
					</div><!-- END .post-thumb -->  
					
					<div class="post-info">
				
						<h3><a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
						
						<span class="meta"><?php echo the_time('F j, Y');  ?><span class="meta-sep">/</span><?php comments_popup_link(__('0 Comments', 'bean'), __('1 Comment', 'bean'), __('% Comments', 'bean')); ?></span>
		
						<div class="mini-post-excerpt">
						
							<?php echo wp_trim_words( get_the_content(), 17 ); ?>	
									
						</div><!-- END .post-excerpt -->
						
					</div><!-- END .post-info --> 	    							
						
				</article><!-- END post-<?php the_ID(); ?> --> 
		
			</li>
						
			<?php endwhile; endif; ?>	
				
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
	$instance['desc'] = stripslashes( $new_instance['desc'] );	

	return $instance;
}
	
	
/*--------------------------------------------------------------------*/
/*	WIDGET SETTINGS (FRONT END PANEL)
/*--------------------------------------------------------------------*/ 
function form( $instance ) {

	// WIDGET DEFAULTS
	$defaults = array(
		'title' => 'Recent Posts from the Blog',
		);
		
	$instance = wp_parse_args( (array) $instance, $defaults ); ?>

	<p>
		<label for="<?php echo $this->get_field_id( 'title' ); ?>"><?php _e('Title:', 'bean') ?></label>
		<input type="text" class="widefat" id="<?php echo $this->get_field_id( 'title' ); ?>" name="<?php echo $this->get_field_name( 'title' ); ?>" value="<?php echo $instance['title']; ?>" />
	</p>

  	<?php
	} // END FORM

} // END CLASS
?>