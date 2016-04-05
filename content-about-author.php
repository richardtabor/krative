<div class="about-author">

	<div class="author-avatar two columns">
		<?php echo get_avatar( get_the_author_meta('user_email'), '50', '' ); ?>
	</div><!-- END .author-avatar -->
	
	<div class="ten columns">
	
		<h6><?php _e( 'About the Author', 'bean' ); ?></h6>
			
		<p>
			<?php if (get_the_author_meta('description')) { the_author_meta('description'); } else { ?> 
			
			<?php _e( 'This author has not added a biography. Meanwhile ', 'bean' ); the_author_meta('display_name'); _e( ' has contributed ', 'bean' ); the_author_posts(); _e( ' posts.', 'bean' ); ?><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php _e( ' Click here', 'bean' );?></a><?php _e( ' to view them.', 'bean' );?>
			
			<?php } // END if get_the_author_meta('description') ?>
		</p>
		
		<?php bean_author_icons(); // PULL AUTHOR ICONS/URL FROM AUTHOR METADATA ?>

	</div><!-- END .ten columns --> 

</div><!-- END .about-author -->