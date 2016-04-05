<?php /* Template Name: Home */ ?>

<?php get_header(); ?>

<div id="primary-container" class="animated BeanFadeIn">

	<?php //CHECK IF SLIDER PLUGIN IS ACTIVE
		
		include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); if (is_plugin_active('bean-slider/bean-slider.php')) {
		
		get_template_part( 'content', 'home-slider' ); //PULL HOME SLIDER CONTENT
			
	} //END IF SLIDER  ?>

	<?php if ( is_active_sidebar('home_section_one') ) { ?>
				
		<div class='section section-one'>	
			
			<?php dynamic_sidebar( 'Home Section One' ) ?>
			
		</div><!-- END .section section-one -->
	
	<?php } //END IF SECTION ONE ?>
	
	<?php if ( is_active_sidebar('home_section_two') ) { ?>
				
		<div class='section even section-two'>	

			<?php dynamic_sidebar( 'Home Section Two' ) ?>
		
		</div><!-- END .section section-two -->
	
	<?php } //END IF SECTION TWO ?>
	
	<?php if ( is_active_sidebar('home_section_three') ) { ?>
				
		<div class='section section-three'>	
			
			<?php dynamic_sidebar( 'Home Section Three' ) ?>
			
		</div><!-- END .section section-three -->
	
	<?php } //END IF SECTION THREE ?>
	
	<?php if ( is_active_sidebar('home_section_four') ) { ?>
				
		<div class='section even section-four'>	
			
			<?php dynamic_sidebar( 'Home Section Four' ) ?>

		</div><!-- END .section section-four -->
	
	<?php } //END IF SECTION FOUR ?>
	
	<?php if ( is_active_sidebar('home_section_five') ) { ?>
					
			<div class='section section-five'>	
				
				<?php dynamic_sidebar( 'Home Section Five' ) ?>
	
			</div><!-- END .section section-five -->
		
	<?php } //END IF SECTION FIVE ?>
		
</div><!-- END #primary-container -->	

<?php get_footer(); ?>