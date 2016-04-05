<?php /* The Comments */ ?>                      
	
<div id="comments">
	
	<?php $req = get_option('require_name_email');
	
    	if ( 'comments.php' == basename($_SERVER['SCRIPT_FILENAME']) )
    	        die ( 'Please do not load this page directly. Thanks!' );
    	        
		if ( ! empty($post->post_password) ) :
	        if ( $_COOKIE['wp-postpass_' . COOKIEHASH] != $post->post_password ) : ?>
    			<div class="nopassword"><?php _e('Comments are not available on this post.', 'bean') ?></div></div>
	
		<?php return; endif; endif;

		do_action( 'radium_before_comment_template' );
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	DISPLAY THE COMMENTS
	/*-----------------------------------------------------------------------------------*/                                          
	if ( have_comments() ) :

		$ping_count = $comment_count = 0;
		foreach ( $comments as $comment )
	    	get_comment_type() == "comment" ? ++$comment_count : ++$ping_count;

		if ( ! empty($comments_by_type['comment']) ) : ?>
		
            <h6><?php comments_number(__('0 Comments ', 'bean'), __('1 Comment ', 'bean'), __('% Comments ', 'bean')); ?><?php _e('on this Post', 'bean') ?></h6>
			
			<div id="comments-list" class="comments">
				                                    
				<?php $total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>
				
			        <div id="comments-nav-above" class="comments-navigation">
			        	
			        	<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
			        
			        </div><!-- END #comments-nav-above -->             
			                                 
				<?php endif;
				
				do_action( 'radium_before_comments' );
				                                
				/* An ordered list of our custom comments callback, custom_comments(), in functions.php   */ ?>                           
		        	<ol>
		       			<?php wp_list_comments('type=comment&callback=theme_comments'); ?>
		        	</ol>
				<?php /* If there are enough comments, build the comment navigation */
				
				$total_pages = get_comment_pages_count(); if ( $total_pages > 1 ) : ?>    
				                                
		        	<div id="comments-nav-below" class="comments-navigation">
		        	
		        		<div class="paginated-comments-links"><?php paginate_comments_links(); ?></div>
		       		
		       		</div><!-- END #comments-nav-below -->
		
				<?php endif; ?> 
				 
			</div><!-- END #comments-list .comments -->
		
		<?php endif;
		
		/*-----------------------------------------------------------------------------------*/
		/*	DISPLAY THE PINGS
		/*-----------------------------------------------------------------------------------*/
	
		if ( ! empty($comments_by_type['pings']) ) : ?>
		
		<div id="trackbacks-list" class="comments">
			
			<div class="twelve">
		
				<div class="entry-meta">
		
			    	<h5><?php printf($ping_count > 1 ? __('<span>%d</span> Trackbacks', 'bean') : __('<span>One</span> Trackback for this Post.', 'bean'), $ping_count) ?></h5>
		
				</div><!-- END .entry-meta -->
		
			</div><!-- END .twelve -->
		
			<ol>
				<?php wp_list_comments('type=pings&callback=radium_custom_pings'); ?>
			</ol>
			                      
		</div><!-- END #trackbacks-list .comments -->   
			
		<?php endif; /* if ( $ping_count ) */
		
		endif; /* if ( $comments ) */ 
	
	
	
	/*-----------------------------------------------------------------------------------*/
	/*	RESPOND TO COMMENTS
	/*-----------------------------------------------------------------------------------*/
	if ( comments_open() ) : ?>
	
	<div class="twelve columns">			
	
	<?php comment_form(); ?> 
	
	</div>	
	
	<?php endif; /* if ( get_option('comment_registration') && !$user_ID ) */
	
	/* Display comments disabled message if there's already comments, but commenting is disabled */
	
	if ( ! comments_open() && have_comments() && ! is_page() ) : ?>
		
		<div id="respond">
		
			<p id="reply-title"><strong><?php _e( 'Comments have been disabled.', 'bean' ); ?></strong></p>
	   
	        <?php do_action( 'radium_comments_disabled' ); ?>
	        
	    </div>
	
	<?php endif; ?>

</div><!-- END #comments-respond -->