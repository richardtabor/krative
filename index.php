<?php /* THE BLOG INDEX */

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
			endwhile; endif; 
			?>

			<div class="pagination index">  
				
				<span class="page-previous">
				    <?php next_posts_link(''); ?>
				</span><!-- END .nav-previous -->
				<span class="page-next">
				    <?php previous_posts_link(''); ?>
				</span><!-- END .nav-next --> 
			
			</div><!-- END .pagination index -->
			
		</div><!-- END .eight columns mobile-four -->

		<div class="four columns sidebar-right hide-for-small">
			
			<aside class="sidebar " role="complementary">
				
				<?php get_sidebar(); ?>
			
			</aside><!-- END .four.columns.sidebar-right.hide-for-small -->
		
		</div><!-- END .four columns hide-for-small -->
					
	</div><!-- END .row -->
			
	<?php get_template_part( 'content', 'global-widgets' ); //PULL GLOBAL WIDGET AREA CONTENT ?>	
	
</div><!-- END #primary-container -->	

<?php get_footer(); ?>