<?php /* TEAM MEMBERS CONTENT */ ?>

<?php 
// TEMPLATE VARIABLES
$filter = false;
$columns = 'portfolio-3col';
$thumbnail = 'team-feat';

//PULL PAGINATION FROM READING SETTINGS
$paged = 1; 
if ( get_query_var('paged') ) $paged = get_query_var('paged');
if ( get_query_var('page') ) $paged = get_query_var('page');
?>

<div id="primary-container" class="portfolio">  

	<div class="row">
		
		<div class="twelve columns">
		
			<div class="entry-content portfolio">
			
				<?php //IF PAGE TITLE OPTION IN META IS CHECKED
				$page_title = get_post_meta($post->ID, '_bean_page_title', true); 
				if ( $page_title == true ) { ?><h3><?php wp_title(''); ?>.</h3>
				<?php }?>
			
				<?php while ( have_posts() ) : the_post(); the_content(); endwhile; // THE LOOP ?>
				
			</div><!-- END .entry-content portfolio -->
			
			<div id="isotope-container" class="<?php echo $columns ?> animated BeanFadeIn">
				
				<?php
				// LOAD PORTFOLIO QUERY - REQUIRES BEAN PORTFOLIO POST TYPE PLUGIN
				$args = array(
				'post_type' 		=> 'team',
				'order' 			=> 'ASC',
				'orderby' 			=> 'menu_order',
				'paged' 			=> $paged,
				'posts_per_page' 	=> 12,
				'meta_key' 			=> '_thumbnail_id' // LOAD POSTS ONLY WITH FEAT IMAGES
				); 
				
				query_posts($args); if (have_posts()) : while (have_posts()) : the_post(); 
				
				//META VARIABLES
				$twitter = get_post_meta($post->ID, '_bean_team_twitter', true); 
				?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class("isotope-item mobile-two"); ?>>
					
					<div class="portfolio-thumb">
				
						<?php the_post_thumbnail($thumbnail ); ?>
					   								
					</div><!-- END .portfolio-thumb --> 
					
					<div class="team-member-meta">

						<h3><?php echo get_the_title(); ?>.</h3>
					
						<?php if ($twitter != '') : // DISPLAY TWITTER PROFILE ?> 
						
							<a target="_blank"class="team-twitter-profile" href="https://twitter.com/<?php echo $twitter; ?>">@<?php echo $twitter; ?><span class="arrow">&nbsp;&rarr;</span></a>
							
						<?php endif; // END TWITTER PROFILE ?>
						
						<?php the_content(); ?>
						
					</div>
					
				</article><!-- END post-<?php the_ID(); ?> --> 
				
				<?php endwhile; endif; wp_reset_postdata(); ?>				
				 
				<div id="page_nav" class="hide">
				    
				    <?php next_posts_link(); ?>
				
				</div><!-- END #page_nav -->
			
			</div><!-- END #isotope-container -->
		
		</div><!-- END .twelve-columns -->
			
	</div><!-- END .row -->

	<?php get_template_part( 'content', 'global-widgets' ); //PULL GLOBAL WIDGET AREA CONTENT ?>	

</div><!-- END #primary-container -->	