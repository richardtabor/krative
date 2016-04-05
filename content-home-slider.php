<div class='section-bean-home-slider'>	
	
	<div class="post-slider">
	
		<?php //GRAB SLIDER OPTIONS FROM CUSTOMIZER
		$speed = get_theme_mod('hero_slider_speed', '5000'); 
		$speed = ( empty($speed) ) ? 5000 : $speed;
		
		$animation_speed = get_theme_mod('hero_animation_speed', '700'); 
		$animation_speed = ( empty($animation_speed) ) ? 700 : $animation_speed;
		
		$randomize = get_theme_mod('hero_slider_rando'); 
		$randomize = ( $randomize == false ) ? 'false' : 'true';
		
		$slide_animation = get_theme_mod('hero_slider_animation', 'slide');
		
		$arrows = get_theme_mod('hero_slider_nav'); 
		$arrows = ( $arrows == false ) ? 'true' : 'false';
		?>
		
		<script type="text/javascript">
			jQuery(document).ready(function($){
			 
				jQuery('#slider-home').flexslider({
					namespace: "bean-home-", 
					controlsContainer: ".flex-control-nav-container",
					animation: "<?php echo $slide_animation ?>",
					slideshowSpeed: <?php echo $speed ?>, 
					animationLoop: true,
					animationSpeed: <?php echo $animation_speed ?>,
					directionNav: <?php echo $arrows ?>,  
					pauseOnHover: false,
					smoothHeight: true, 
					controlNav: false,
					touch: false,
					randomize: <?php echo $randomize ?>,
					
					start: function(slider) {
						 jQuery('#slider-home').removeClass('loading');
					 } 
				 });			  
			});
		</script>
		
		 <div id='slider-home' class="loading">
		 
			<ul class="slides">

				<?php $args = array(
				    'post_type' 		=> 'slider',
				    'orderby' 			=> 'menu_order',
				    'order' 			=> 'ASC',
				    'posts_per_page' 	=>  -1,
					); 
				     
				query_posts($args); if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					
				<li>
					<article id="post-<?php the_ID(); ?>" class="home-slide">
					
						<div class="row">
						   
							<?php the_content(); ?>	
							
							<?php if( get_theme_mod( 'hide_slide_edit_btn' ) != true) { edit_post_link( __( 'Edit', 'bean' )); } ?>

						</div><!-- END .row -->	
					
					</article><!-- END post-<?php the_ID(); ?> --> 
					
				</li>
				
				<?php endwhile; endif; ?>	

			</ul><!-- END ul.slides -->

		</div><!-- END #slider -->
			
	</div><!-- END .post-slider -->
	
</div><!-- END .section-bean-home-slider -->
