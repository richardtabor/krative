<?php /* STANDARD POST FORMAT */ ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	        
  
  <header class="entry-header">
  	
  	<?php if( is_singular() ) {  // DISPLAY ON SINGLE ONLY  ?>
	  	
	  	<div class="ten columns">
	  		
	  		<h1 class="entry-title">
	  		        
	  		    <?php the_title(); ?>
	  		
	  		</h1><!-- END .entry-title -->
	  		
	  	</div><!-- END .ten columns -->
		
	 	<div class="two columns">
	  	
	  		<div class="pagination right">  
	  			
	  			<span class="page-previous">
	  				<?php previous_post_link('%link', ''); ?>
	  			</span><!-- END .page-previous -->
	
	  			<span class="page-next">
	  				<?php next_post_link('%link', ''); ?>
	  			</span><!-- END .page-next -->
	  		
	  		</div><!-- END .pagination -->
	  		
	  	</div><!-- END .two columns -->
	
	  	<?php } else {  // END ON SINGLE ONLY ?>
	  	
	  	<div class="twelve columns">
	  		
	  		<h1 class="entry-title">
	  			
	  			<a href="<?php the_permalink(); ?>" title="<?php printf( esc_attr__( 'Permalink to %s', 'bean' ), the_title_attribute( 'echo=0' ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
	  	
			</h1><!-- END .entry-title -->
			
		</div><!-- END .twelve columns -->
		
 	<?php } ?>	
  		
	  	<div class="twelve columns">
	  		
	  		<?php bean_post_meta(); ?>
	  		
	  	</div><!-- END .twelve columns -->	
  		    
  	</header><!-- END .entry-header -->
  
   <?php if (( function_exists('has_post_thumbnail')) && (has_post_thumbnail() )) { // FEATURED IMAGE ?>
        
        <div class="entry-content-media">
        		
        	<div class="post-thumb">
	        	
				<?php if ( get_theme_mod( 'show_social_sharing' ) == true ) { bean_post_sharing(); } // END IF SOCIAL SHARING VIA CUSTOMIZER ?>
				
				<?php if( is_singular() ) { the_post_thumbnail('thumbnail-large'); // DIMENSIONS IN /LIB/FUNCTIONS/THEME-SETUP.PHP ?>
					
				<?php } else { // IF NOT SINGLE ?>
				
					<a title="<?php printf(__('Permanent Link to %s', 'bean'), get_the_title()); ?>" href="<?php the_permalink(); ?>"><?php the_post_thumbnail('thumbnail-large'); ?></a>
											
				<?php } ?>

            </div><!-- END .post-thumb -->
              
        </div><!-- END .entry-content-media -->
      
    <?php } // END has_post_thumbnail && get_post_format ?>
    
    <?php if(!empty($post->post_excerpt) && is_singular() ) { // POST EXCERPT ON SINGLE ?>
    
    	<div class="post-excerpt">
    		
    		<h4><?php the_excerpt(); ?></h4>
    	
    	</div><!-- END .post-excerpt -->
    	
    <?php  } //END IF EXCERPT ?>
	
	<article class="entry-content">	
			
		<?php the_content( __( '<span>Read More</span>', 'bean' ) ); ?>
	
		<?php if( is_singular() ) { ?>
			
			<?php if ( get_theme_mod( 'show_tags' ) == true && has_tag() ) { ?> 
			
				<div class="entry-meta">
				
					<h6><?php echo __('Tagged: ', 'bean'); ?></h6><?php the_tags('', ', ', ''); ?>	
				
				</div><!-- END .entry-meta -->	
			
			<?php }  // END IF TAG VIA CUSTOMIZER  ?>
			
		<?php } // DISPLAY ON SINGLE ONLY ?>
	 
	</article><!-- END .entry-content -->

</section><!-- END #post-<?php the_ID(); ?> -->