<?php /* Single Post */

get_header();

bean_sidebar_loader(); ?>

<div id="primary-container">  

	<div class="row">
	
		<div class="eight columns sidebar-right mobile-four">
		
			<?php // THE LOOP
			if (have_posts()) : while (have_posts()) : the_post(); 
				$format = get_post_format(); 
				if( false === $format ) { $format = 'standard'; }
				if( $format == 'aside' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote' ) { }	
				get_template_part( 'lib/post-formats/content', $format ); 	
			endwhile;
			?>
			
			<?php if ( !post_password_required() ) { // START PASSWORD PROTECTED META ?>
			
				<?php if( get_theme_mod( 'about_the_author' ) == true) { // IF ABOUT AUTHOR VIA THEME CUSTOMIZER ?>
				
					<?php get_template_part( 'content', 'about-author' ); // PULL CONTENT-ABOUT-AUTHOR.PHP ?>
					
				<?php } // END IF ABOUT AUTHOR ?>
			
			<?php } // END PASSWORD PROTECTED ?>
					
			<?php // COMMENTS & COMMENT FORM
			if( bean_theme_supports( 'comments', 'posts' ) && ( comments_open() || '0' != get_comments_number() )  ) comments_template( '', true ); 
			endif; 
			?>	

		</div><!-- END .eight columns mobile-four -->	
		
		<div class="four columns sidebar-right hide-for-small">
			
			<aside class="sidebar " role="complementary">
				
				<?php get_sidebar(); ?>
			
			</aside><!-- END .four.columns.sidebar-right.hide-for-small -->
		
		</div><!-- END .four columns hide-for-small -->
				
	</div><!-- END .row -->

	<?php get_template_part( 'content', 'global-widgets' ); //PULL GLOBAL WIDGET AREA CONTENT ?>	
	
</div><!-- END #primary-container -->	

<script type="text/javascript">
	jQuery(window).load(function(){ 		
		if(jQuery().validate) { jQuery("#commentform").validate(); }		
		});
</script>

<?php get_footer(); ?>