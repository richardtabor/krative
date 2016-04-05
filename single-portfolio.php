<?php get_header(); ?>
 
<?php 
$portfolio_type = get_post_meta($post->ID, '_bean_portfolio_type', true);  

//SETTING UP META
$portfolio_date = get_post_meta($post->ID, '_bean_portfolio_date', true); 
$portfolio_url = get_post_meta($post->ID, '_bean_portfolio_url', true); 
$portfolio_url_text = get_post_meta($post->ID, '_bean_portfolio_url_text', true);
$portfolio_client = get_post_meta($post->ID, '_bean_portfolio_client', true); 
$portfolio_cats = get_post_meta($post->ID, '_bean_portfolio_cats', true); 
?>

<div id="primary-container" class="animated BeanFadeIn">  

	<div class="row">
		
		<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		
			<div class="four columns mobile-four">
							
				<header class="entry-header">
			
			    	<h1 class="entry-title"><?php the_title(); ?>.</h1>
			    	
			    	<?php if ( !post_password_required() ) { // START PASSWORD PROTECTED META ?>
			    	
			    		<div class="entry-like"><?php Bean_PrintLikes($post->ID); ?></div>				
			    	
			    	<?php  } //END PASSWORD PROTECTED META ?>
			    	
				</header><!-- END .entry-header -->
								
				<div class="entry-content">
				
					<?php 
					if (have_posts()) : while (have_posts()) : the_post();
					the_content(); // CONTENT 
					endwhile; endif; 
					?>
				
				</div><!-- END .entry-content-->
			
			<?php if ( !post_password_required() ) { // START PASSWORD PROTECTED META ?>
				
				<ul class="portfolio-meta-list">
					
					<?php if ($portfolio_date == true) : // DISPLAY DATE ?> 
					
						<li><span><?php _e( 'Date: ', 'bean' ); ?></span><?php echo the_time('F Y'); ?></li>
						
					<?php endif; // END DATE ?>
					
					<?php if ($portfolio_client != '') : // DISPLAY CLIENT ?>
					
						<li><span><?php _e( 'For: ', 'bean' ); ?></span><?php echo $portfolio_client;  ?></li>
					
					<?php endif; // END CLIENT ?>
				
					<?php if ($portfolio_url != '') : // DISPLAY PORTFOLIO URL ?>
						
						<li><span><?php _e( 'Url: ', 'bean' ); ?></span><a href="http://<?php echo $portfolio_url; ?>" target="blank"><?php echo $portfolio_url_text; ?></a></li>
					
					<?php endif; // DISPLAY PORTFOLIO URL ?> 
					
					<?php if ($portfolio_cats == true) : // DISPLAY CATEGORY ?>
								
						<li><span><?php _e( 'Skills: ', 'bean' ); ?></span><?php the_terms($post->ID, 'portfolio_category', '', ', ', ''); ?></li>
						  
					<?php endif; // END CATEGORY ?>
						
				</ul><!--END .portfolio-meta-list -->
				
				<?php bean_portfolio_pagination(); // POST PAGINATION ?>
				
			<?php  } //END PASSWORD PROTECTED META ?>	
			
			</div><!-- END .four columns mobile-four -->
			
			<?php if ( !post_password_required() ) { // START PASSWORD PROTECTED MEDIA ?>
			
				<div class="eight columns mobile-four">
				
					<div class="entry-content-media portfolio-<?php echo $portfolio_type ?>">
					
						<?php get_template_part( 'content', 'portfolio-media' ); //PULL GLOBAL WIDGET AREA CONTENT ?>
						
					</div><!-- END .entry-content-media -->
					
					<?php if(!empty($post->post_excerpt)) { ?>
					
						<div class="post-excerpt">
							
							<h4><?php the_excerpt(); ?></h4>
						
						</div><!-- END .post-excerpt -->
						
					<?php  } //END IF EXCERPT ?>
					
				</div><!-- END .eight columns mobile-four --> 
					
			<?php  } //END PASSWORD PROTECTED MEDIA ?>		
		
		</div><!-- END .row -->

	</section>
	
	<?php //RELATED POSTS
	$terms = get_the_terms( $post->ID, 'portfolio_category' );
	if ( $terms && ! is_wp_error( $terms ) ) : //IF NO CATEGORY - DONT GET TEMPLATE PART
		if( get_theme_mod( 'show_related_portfolio_posts' ) != false) {
			get_template_part( 'content', 'portfolio-related' ); //PULL CONTENT-PORTFOLIO-RELATED.PHP
		} //END IF SHOW RELATED POSTS
	endif; ?>

</div><!-- END #primary-container -->		

<?php get_footer(); ?>