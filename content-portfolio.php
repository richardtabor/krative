<?php /* PORTFOLIO CONTENT */ ?>

<?php 
// TEMPLATE VARIABLES
$filter = false;
$columns = 'portfolio-3col';
$thumbnail = 'portfolio-feat';

if( is_page_template('page-portfolio-2col.php') OR is_page_template('page-portfolio-2col-filter.php') ) {
	$columns = 'portfolio-2col'; // COLUMN SIZE
	$thumbnail = 'portfolio-feat-2col'; // THUMBNAIL SIZE
}

if( is_page_template('page-portfolio-2col-filter.php') OR is_page_template('page-portfolio-3col-filter.php') ) {
	$filter = true;  // FILTER TEMPLATE
}

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
			
			<?php if ($filter == true ) { get_template_part( 'content', 'portfolio-filter' ); } // PULL CONTENT-PORTFOLIO-FILTER.PHP ?>
			
			<div id="isotope-container" class="<?php echo $columns ?> animated BeanFadeIn">
				
				<?php
				// LOAD PORTFOLIO QUERY - REQUIRES BEAN PORTFOLIO POST TYPE PLUGIN
				$args = array(
				'post_type' 		=> 'portfolio',
				'order' 			=> 'ASC',
				'orderby' 		=> 'menu_order',
				'paged' 			=> $paged,
				'posts_per_page' 	=> 12,
				'meta_key' 		=> '_thumbnail_id' // LOAD POSTS ONLY WITH FEAT IMAGES
				); 
				
				query_posts($args); if (have_posts()) : while (have_posts()) : the_post(); 
				
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
				
						<a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail($thumbnail); ?></a> 
					   								
					</div><!-- END .portfolio-thumb --> 
					
					<h3><a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php echo get_the_title(); ?></a></h3>
					
					<p class="portfolio-cats"><?php the_terms($post->ID, 'portfolio_category', '', ', ', ''); ?></p>
				
				</article><!-- END post-<?php the_ID(); ?> --> 
				
				<?php endwhile; endif; wp_reset_postdata(); ?>				
				 
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