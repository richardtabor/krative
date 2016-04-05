<?php /* Default Template */

get_header();

bean_sidebar_loader(); ?>

<div id="primary-container">  

	<div class="row">
	
		<div class="<?php echo $bean_content_class; ?> mobile-four">	
		
			<div class="entry-content">
			
				<?php //IF PAGE TITLE OPTION IN META IS CHECKED
				$page_title = get_post_meta($post->ID, '_bean_page_title', true); 
				if ( $page_title == true ) { ?><h3><?php wp_title(''); ?>.</h3>
				<?php }?>
			
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
				
				<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bean' ) . '</span>', 'after' => '</div>' ) ); ?>
				
			</div><!-- END .entry-content -->
		
		</div><!-- END $bean_content_class -->
		
		<?php if( $bean_sidebar_location === 'left' || $bean_sidebar_location === 'right' ) { ?>
		
			<div class="<?php echo $bean_sidebar_class; ?> hide-for-small">
				
				<aside class="sidebar " role="complementary">
					
					<?php get_sidebar(); ?>
				
				</aside><!-- END .sidebar -->
			
			</div><!-- END .four columns hide-for-small -->
			
		<?php } // END SIDEBAR LEFT OR RIGHT ?>
		
	</div><!-- END .row -->

	<?php get_template_part( 'content', 'global-widgets' ); //PULL GLOBAL WIDGET AREA CONTENT ?>	
	
</div><!-- END #primary-container -->	

<?php get_footer(); ?>