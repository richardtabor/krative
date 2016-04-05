<?php /* Portfolio Archives */ ?>

<?php get_header();

$columns = 'portfolio-3col'; ?>

<div id="primary-container" class="portfolio">  

	<div class="row">
		
		<div class="twelve columns">
			<?php get_template_part( 'content', 'portfolio-filter' ); ?>

			<div id="isotope-container" class="<?php echo $columns ?> animated BeanFadeIn">
				
				<?php global $query_string; query_posts("{$query_string}&posts_per_page=-1"); ?>
				
				 <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

				 	<?php 
					// GENERATE PORTFOLIO TERMS FOR FILTER
					$terms =  get_the_terms( $post->ID, 'portfolio_category' ); 
					$term_list = null;
					if( is_array($terms) ) {
					    foreach( $terms as $term ) {
					        $term_list .= $term->slug;
					        $term_list .= ' ';
					    }
					}
					?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class("$term_list isotope-item mobile-two"); ?>>
					
						<div class="portfolio-thumb">
					
							<a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail($thumbnail ); ?></a> 
						   								
						</div><!-- END .portfolio-thumb --> 
						
						<h3><a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
						
						<p class="portfolio-cats"><?php the_terms($post->ID, 'portfolio_category', '', ', ', ''); ?></p>
					
					</article><!-- END post-<?php the_ID(); ?> --> 
				
				 <?php endwhile; endif; ?>			
				 
				<div id="page_nav" class="hide">
				    
				    <?php next_posts_link(); ?>
				
				</div><!-- END #page_nav -->
			
			</div><!-- END #isotope-container -->
		
		</div><!-- END .twelve-columns -->
			
	</div><!-- END .row -->

	<?php if( get_theme_mod( 'footer_widget_area_portfolio' ) == true) { ?>
	
		<?php get_template_part( 'content', 'global-widgets' ); // PULL GLOBAL WIDGET AREA CONTENT ?>
	
	<?php } // END IF SIDEBAR THEME CUSTOMIZER ?>

</div><!-- END #primary-container -->	

<?php get_footer(); ?>