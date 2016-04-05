<?php /* LINK POST FORMAT */ ?>

<?php $link = get_post_meta($post->ID, '_bean_link_url', true); ?>

<section id="post-<?php the_ID(); ?>" <?php post_class(); ?>>	     
	   
	<a href="http://<?php echo $link; ?>" title="<?php the_title(); ?>" target="blank">
		
		<div class="link-wrapper">
			  
			<header class="entry-header">
			
				<div class="twelve columns">
				
					<h1 class="entry-title">
						
						 <?php the_title(); ?> 
					
					</h1><!-- END .entry-title -->
				
				</div><!-- END .twelve columns -->
			
			</header><!-- END .entry-header -->
		
			<article class="entry-content">	
				
				<h6><p><?php echo $link; ?></p></h6>
			
			</article><!-- END .entry-content -->
			
		</div><!-- END .link-wrapper -->
	
	</a>
	
</section><!-- END #post-<?php the_ID(); ?> -->
	
