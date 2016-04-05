<?php /* Template Name: Archives */ ?>

<?php get_header(); ?>

<?php bean_sidebar_loader(); ?>

<div id="primary-container">  

	<div class="row">
	
		<div class="<?php echo $bean_content_class; ?> mobile-four">	
		
			<div class="entry-content">
			
				<?php //IF PAGE TITLE OPTION IN META IS CHECKED
				$page_title = get_post_meta($post->ID, '_bean_page_title', true); 
				if ( $page_title == true ) { ?><h3><?php wp_title(''); ?>.</h3>
				<?php }?>	
		
				<div class="entry-content">
				
					<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
					
					<?php wp_link_pages( array( 'before' => '<div class="page-link"><span>' . __( 'Pages:', 'bean' ) . '</span>', 'after' => '</div>' ) ); ?>
					
				</div><!-- END .entry-content -->
				
				<div class="archives-list">
				
				   	<h6><?php _e( 'Last 30 Posts', 'bean' );?></h6>

				   	<ul>
						<?php $archive_30 = get_posts('numberposts=30');
						foreach($archive_30 as $post) : ?>
						<li><a href="<?php the_permalink(); ?>"><?php the_title();?></a></li>
						<?php endforeach; ?>
					</ul>
			   			  
				   	<h6><?php _e( 'Archives by Month', 'bean' );?></h6>

				   	<ul><?php wp_get_archives('type=monthly'); ?></ul>

				   	<h6><?php _e( 'Archives by Category', 'bean' );?></h6>
				   	
				   	<ul><?php wp_list_categories( 'title_li=' ); ?></ul>
	
					<h6><?php _e( 'Site Map', 'bean' );?></h6>

					<ul><?php wp_list_pages('title_li='); ?></ul>
				 	
				</div><!-- END .archives-list --> 
			
			</div><!-- END .entry-content -->
	
		</div><!-- END .twelve columns -->
		
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