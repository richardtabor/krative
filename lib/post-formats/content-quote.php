<?php /* QUOTE POST FORMAT */ ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	        
  
  <header class="entry-header">

	  	<div class="twelve columns">
	  		
	  		<h1 class="entry-title">
	  			
	  			<?php the_title(); ?>
	  	
			</h1><!-- END .entry-title -->
			
		</div><!-- END .twelve columns -->
		
    </header><!-- END .entry-header -->
  	
	<article class="entry-content">	
			
		<h6><?php the_content( __( '<span>Read More</span>', 'bean' ) ); ?></h6>
	 
	</article><!-- END .entry-content -->

</section><!-- END #post-<?php the_ID(); ?> -->