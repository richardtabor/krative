<?php /* RELATED PORTFOLIO POST CONTENT */ ?>

<?php 
$related_items_count = 6;
$related = bean_get_related_posts($post->ID, 'portfolio_category', array('posts_per_page' => $related_items_count));
$i = 1;
?>
		
<div class="section even portfolio-related">
	
	<div class="row">
	
		<div class="twelve columns">			
			
			<ul>
			
				<?php if ($related->post_count == 0) { // IF NO RELATED POSTS ?>
				 
				<div class="widget">
				
					<h5 class="widget-title no-related">
					
						<?php _e( 'No Related Posts', 'bean' ); // TITLE IF NO RELATED POSTS ?>
					
					</h5><!-- END .widget-title -->
					
				</div><!-- END .widget -->
				
				<?php } else { ?>
				
				<div class="widget">
				
					<h5 class="widget-title">
					
						<?php if ( !post_password_required() ) { // IF POST IS NOT PASSWORD PROTECTED ?>
						
							<?php echo get_theme_mod( 'related_portfolio_title', 'Some Related Work' ); ?>	
							
						<?php } else { _e( 'View some other works', 'bean' ); } // TITLE FOR RELATED IF POST IS PROTECTED ?>
					
					</h5><!-- END .widget-title -->
					
				</div><!-- END .widget -->
				
				<?php while( $related->have_posts() ) : $related->the_post(); ?>
				  			                 
					 <li<?php if( $i%3 == 0 ) echo ' class="last"'; ?>>
					 	
						<article id="post-<?php the_ID(); ?>" <?php post_class(''); ?>>
						
							<div class="portfolio-thumb">
							
								<a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('portfolio-feat'); ?></a> 
										
							</div><!-- END .portfolio-thumb --> 
					
						</article><!-- END post-<?php the_ID(); ?> -->  	    			    			
					
					</li>
				
				<?php $i++; ?>
				
				<?php endwhile; wp_reset_postdata(); }?>
		
			</ul>
				
		</div><!-- END .twelve columns -->
		
	</div><!-- END .row -->	

</div><!-- END .section even -->