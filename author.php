<?php /* THE BLOG INDEX */

get_header();

bean_sidebar_loader(); ?>

<div id="primary-container">  

	<div class="row">
	
		<div class="eight columns sidebar-right mobile-four">
		
			<div class="entry-content author">
			
				<?php	
				//PULL AUTHOR INFO
				global $authordata, $curauth;
				if(isset($_GET['author_name'])) : 
					$curauth = get_userdatabylogin($author_name);
				else :
					$curauth = get_userdata(intval($author));
				endif;
				
				//VARIABLES
				$description = $curauth->user_description;
				$name = $curauth->nickname;
				?>
				
				<div class="two columns">
				
					<div class="author-avatar">
						<?php $authordata=get_userdata(get_query_var( 'author' )); if(function_exists('get_avatar')) { echo get_avatar( get_the_author_id(), 50, "#646464" ); }  ?>
					</div><!-- END .author-avatar -->
					
				</div><!-- END .two-columns -->
				
				<div class="ten columns">
				
					<h3><?php _e( 'About ', 'bean' ); echo $name; ?>.</h3>
					
					<p>
						<?php if (get_the_author_meta('description')) { the_author_meta('description'); } else { ?> 
						
						<?php _e( 'This author has not added a biography. Meanwhile '. $name .' has contributed ', 'bean' ); the_author_posts(); _e( ' posts. Check them out below.', 'bean' ); } ?>
					</p>
						
					<?php bean_author_icons(); // PULL AUTHOR ICONS/URL FROM AUTHOR METADATA ?>
											
				</div><!-- END .ten-columns -->
				
			</div><!-- END .entry-content -->
			
			<h6 class="author"><?php _e( 'All Posts by ', 'bean' ); echo $name ?></h6>
			
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
			
			</div><!-- END .index-navigation -->
			
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