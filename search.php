<?php /* The Search */ ?>

<?php get_header(); ?>

<div id="primary-container">  

	<div class="row">
	
		<div class="eight columns sidebar-right mobile-four">	

			<?php // IF THERE ARE SEARCH RESULTS, PULL THE RESULTS
			global $query_string;
			query_posts( $query_string . '&posts_per_page='. get_option('posts_per_page') .'' );
			
			if ( have_posts() ) : $i = 0; ?>
			
			<?php $mySearch =& new WP_Query("s=$s & showposts=-1"); $NumResults = $mySearch->post_count; ?>
			<h6 class="search-title"><?php _e( 'Found&nbsp;', 'bean' ); echo $NumResults;  printf( __(' posts for "%s"', 'bean'), get_search_query()); ?></h6>
			<br />
			
			<?php // THE LOOP
			if (have_posts()) : while (have_posts()) : the_post(); 
				$format = get_post_format(); 
				if( false === $format ) { $format = 'standard'; }
				if( $format == 'aside' || $format == 'gallery' || $format == 'image' || $format == 'link' || $format == 'quote' ) { }	
				get_template_part( 'lib/post-formats/content', $format ); 	
			endwhile; endif; 
			?>
	
	  		<?php else : // IF NO SEARCH RESULTS, DISPLAY THE FOLLOWING ?>
	  				
    			<h1><?php printf( __('Nothing Found.', 'bean'), get_search_query()); ?></h1>
    		
    			<p><?php printf( __('Unfortunately we couldn&#39;t find anything for "%s".','bean'), get_search_query() ); ?></p>
    			
    			<form id="searchform" class="searchform" method="get" action="<?php echo get_home_url(); ?>">
    			
    			    <div class="clearfix default_searchform">
    			
    			        <input type="text" name="s" class="s" onblur="if (this.value == '') {this.value = '<?php _e('Search for another term or keyword and press enter...','bean'); ?>';}" 
    			        
    			        onfocus="if (this.value == '<?php _e('Search for another term or keyword and press enter...','bean'); ?>') {this.value = '';}" value="<?php _e('Search for another term or keyword and press enter...','bean'); ?>" />
    			        
    			        <button type="submit" class="button"><span><?php _e('Search Again', 'bean'); ?></span></button>
    			
    			    </div><!-- END .clearfix defaul_searchform -->
    			
    			</form><!-- END #searchform -->
	    				
			<?php endif; ?>
			
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