<?php
/*--------------------------------------------------------------------*/
/*                    							
/*                    							
/*                    							 
/*     GENERAL THEME FUNCTIONS					
/*     PLAY SAFE YOUNG ONE, INCORRECT MODIFICATIONS TO THIS CODE CAN BREAK THINGS BIG TIME. 	 
/*                    							
/*                    							
/*                    							
/*--------------------------------------------------------------------*/

/*--------------------------------------------------------------------*/                							
/* 	ENQEUE THEME FONTS FROM GOOGLE FONTS		                							
/*--------------------------------------------------------------------*/
function bean_theme_fonts() {
    $protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style( 'theme-montserrat', "$protocol://fonts.googleapis.com/css?family=Montserrat:400,700" );
    wp_enqueue_style( 'theme-open-sans', "$protocol://fonts.googleapis.com/css?family=Open+Sans:400,700,600" );
    }
add_action( 'wp_enqueue_scripts', 'bean_theme_fonts' );


/*--------------------------------------------------------------------*/    							
/*  CUSTOM LOGIN LOGO				      							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_custom_login') ) {
	function bean_custom_login() {
	  	
	  if( get_theme_mod( 'img-upload-login-logo' ) ) { $login_logo = get_theme_mod( 'img-upload-login-logo');
	  	} else { $login_logo = BEAN_IMAGES_URL.'/login-logo.png';
	  }

	$dimensions = @getimagesize( $login_logo );
	echo '<style>' . "\n" . 'body.login #login h1 a { background: url("' . $login_logo . '") no-repeat scroll center top transparent; height: ' . $dimensions[1] . 'px; background-size: auto !important; width: auto; }' . "\n.login #nav {text-align: center}.login #backtoblog { display:none }" . '</style>' . "\n";
	
} 
add_filter('login_head', 'bean_custom_login');	
}

if ( !function_exists('bean_login_url') ) {
	function bean_login_url($url) {
		$login_url = home_url();
		return $login_url; 
	} 
	add_filter('login_headerurl', 'bean_login_url');
}

if ( !function_exists('bean_login_title') ) {
	function bean_login_title($title) {
		$title_text = get_bloginfo('name').' - Log In';
	    return $title_text;
	} 
	add_filter('login_headertitle', 'bean_login_title');
}	


/*--------------------------------------------------------------------*/        							
/*  CUSTOM FAVICON AND APPLE TOUCH ICON		       							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_add_favicon') ) {
	function bean_add_favicon() { ?>	

<?php if( get_theme_mod( 'img-upload-favicon' ) ) { $favicon = get_theme_mod( 'img-upload-favicon');
	} else { $favicon = BEAN_IMAGES_URL.'/favicon.ico';
} ?> 

<?php if( get_theme_mod( 'img-upload-apple_touch' ) ) { $appleicon = get_theme_mod( 'img-upload-apple_touch');
	} else { $appleicon = BEAN_IMAGES_URL.'/apple-touch-icon.png';
} ?>	
		
<link rel="shortcut icon" href="<?php echo $favicon ?>"/> 
<link rel="apple-touch-icon-precomposed" href="<?php echo $appleicon ?>"/>

<?php }
	add_action('wp_head', 'bean_add_favicon');
}


/*--------------------------------------------------------------------*/             							
/*  POST META 								               							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_post_meta') ) {

	function bean_post_meta() { ?>
		
			<div class="entry-meta">
				<ul>
					<li><?php echo the_time('F j, Y');  ?></li>
					
					<span class="meta-sep">/</span>	
					
					<li><?php comments_popup_link(__('0 Comments', 'bean'), __('1 Comment', 'bean'), __('% Comments', 'bean')); ?></li>
					
					<span class="meta-sep post-cats">/</span>	
						
					<li class="post-cats"><?php the_category(', ');  ?></li>
				</ul>
				<?php edit_post_link( __( '[Edit]', 'bean' )); ?>
			</div><!-- END .entry-meta -->
			<?php
			
	} add_action('bean_post_meta','bean_post_meta');
}


/*--------------------------------------------------------------------*/
/*  BEAN POST SHARING BUTTONS			          							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_post_sharing') ) {

	function bean_post_sharing() { ?>
		
		<div class="social-overlay">
		    <ul>
		        <li class="social-icon twitter animated BeanFadeIn"><a href="http://twitter.com/share?url=<?php the_permalink(); ?>&text= <?php the_title(); ?> via @<?php echo get_theme_mod( 'share_twitter', 'ThemeBeans' ); ?>" target="_blank" class="share-btn twitter"></a></li>
		        
		        <li class="social-icon facebook animated BeanFadeIn"><a onClick="window.open('http://www.facebook.com/sharer.php?s=100&amp;p[title]=<?php the_title(); ?>&amp;p[summary]=&amp;p[url]=<?php the_permalink(); ?>&amp;&amp;p[images][0]=','sharer','toolbar=0,status=0,width=548,height=325');" href="javascript: void(0)"></a></li>
		        
		        <li class="social-icon google animated BeanFadeIn"><a href="https://plus.google.com/share?url=<?php the_permalink(); ?>"></a></li>
		    </ul>
		</div><!-- END .social-overlay -->   		
	
		<?php  }
	add_action('bean_post_sharing', 'bean_post_sharing');
}


/*--------------------------------------------------------------------*/
/*  AUTHOR ICONS (ABOUT THE AUTHOR & AUTHOR PROFILE PAGES)			          							
/*--------------------------------------------------------------------*/

// ADD FIELDS TO ADMIN USER PROFILE
function bean_author_fields( $contactmethods ) {
	$contactmethods['twitter'] = 'Twitter Username';
	$contactmethods['dribbble'] = 'Dribbble URL';
	$contactmethods['facebook'] = 'Facebook URL';
	$contactmethods['instagram'] = 'Instagram URL';
	$contactmethods['google_plus'] = 'Google Plus URL';

	return $contactmethods;
	}
add_filter('user_contactmethods','bean_author_fields',10,1);


// CONTENT PULLED BY ABOUT THE AUTHOR & PROFILE PAGE
if ( !function_exists('bean_author_icons') ) {
	function bean_author_icons() { ?>

	<ul class="author-links">
	
		<?php if (get_the_author_meta('user_url')) { ?>
			
			<li><a target="_blank" href="<?php the_author_meta('user_url'); ?>" class="author-icon web"></a></li>			
	
		<?php } if (get_the_author_meta('twitter')) { ?>
		
			<li><a target="_blank" href="http://www.twitter.com/<?php the_author_meta('twitter'); ?>" class="author-icon twitter" title="<?php the_author_meta('display_name'); ?> on Twitter"></a></li>
			
		<?php } if (get_the_author_meta('facebook')) { ?>
			
			<li><a target="_blank" href="<?php the_author_meta('facebook'); ?>" class="author-icon facebook" title="<?php the_author_meta('display_name'); ?> on Facebook"></a></li>
	
		<?php } if (get_the_author_meta('dribbble')) { ?>	
			
			<li><a target="_blank" href="<?php the_author_meta('dribbble'); ?>" class="author-icon dribbble" title="<?php the_author_meta('display_name'); ?> on Dribbble"></a></li>
		
		<?php } if (get_the_author_meta('instagram')) { ?>
			
			<li><a target="_blank" href="<?php the_author_meta('instagram'); ?>" class="author-icon instagram" title="<?php the_author_meta('display_name'); ?> on Instagram"></a></li>
		
		<?php } if (get_the_author_meta('google_plus')) { ?>
			
			<li><a target="_blank" href="<?php the_author_meta('google_plus'); ?>" class="author-icon google" title="<?php the_author_meta('display_name'); ?> on Google Plus"></a></li>
		
		<?php } if (get_the_author_meta('email')) { ?>
			
			<li><a target="_blank" href="mailto:<?php the_author_meta('email'); ?>" class="author-icon email" title="Email <?php the_author_meta('display_name'); ?>"></a></li>			
		
		<?php } ?>
		
	</ul><!-- END .author-links -->
								
	<?php }
	add_action('bean_author_icons', 'bean_author_icons');
}


/*--------------------------------------------------------------------*/             				
/*  CUSTOM COMMENT STRUCTURE
/*--------------------------------------------------------------------*/
function theme_comments($comment, $args, $depth) {
		$GLOBALS['comment'] = $comment;
		extract($args, EXTR_SKIP);

		if ( 'div' == $args['style'] ) {
			$tag = 'div';
			$add_below = 'comment';
		} else {
			$tag = 'li';
			$add_below = 'div-comment';
		}
	?>
	<<?php echo $tag ?> <?php comment_class(empty( $args['has_children'] ) ? '' : 'parent') ?> id="comment-<?php comment_ID() ?>">
	
	<?php if ( 'div' != $args['style'] ) : ?>
	
		<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
	
	<?php endif; ?>
		
	<div class="two columns hide-for-small">	
		<div class="comment-avatar">
			<?php if ($args['avatar_size'] != 0) echo get_avatar( $comment ); ?>
		</div>
	</div>	
	
	<div class="ten columns mobile-four">	
		<div class="comment-author vcard">
			<h6><?php printf(__('<cite class="fn">%s</cite>'), get_comment_author_link()) ?></h6>
			<div class="comment-meta commentmetadata">
			<?php $isByAuthor = false;
			    if($comment->comment_author_email == get_the_author_meta('email')) {
			        $isByAuthor = true;
			} ?>
			
			<?php if($isByAuthor) { ?><span class="author-tag"><a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>"><?php _e('Author','bean') ?></a><span class="meta-sep">/</span></span><?php } ?>
				<a href="<?php echo htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ?>"><?php printf( __('%1$s'), get_comment_date()) ?></a><span class="meta-sep">/</span><?php comment_reply_link(array_merge( $args, array('add_below' => $add_below, 'depth' => $depth, 'max_depth' => $args['max_depth']))) ?><?php edit_comment_link(__('Edit', 'bean'), '<span class="meta-sep">/</span>','') ?>
			</div>
		</div>
		
		<?php if ($comment->comment_approved == '0') : ?>
			<em class="comment-awaiting-moderation"><?php _e('Your comment is awaiting moderation', 'bean') ?></em>
			<br />
		<?php endif; ?>
				
		<?php comment_text() ?>
				
		<?php if ( 'div' != $args['style'] ) : ?></div><?php endif; ?>
	</div>		
<?php
}


/*--------------------------------------------------------------------*/                							
/*  BEAN BREADCRUMBS FUNCTION					                							
/*--------------------------------------------------------------------*/
function bean_breadcrumbs() { ?>
	<?php 
	// TRIM THE BREADCRUMB TITLE (CURRENT - 5 WORDS)
	$short_title = wp_trim_words( get_the_title(), '4' );
	
	//PORTFOLIO PAGE SELECT FROM CUSTOMIZER
	$portfolio_page = get_theme_mod('portfolio_page_selector');
	
	//BREADCRUMB DIVIDER INPUT 
	$divider = '/';
	
	// FIND THE POST TYPE
	$post_type = get_post_type();
	$post_type_data = get_post_type_object( $post_type );
	$post_type_slug = ucfirst($post_type_data->rewrite['slug']);
	
	//BLOG TITLE & URL
	$posts_page_id = get_option( 'page_for_posts');
	$posts_page = get_page( $posts_page_id);
	$posts_page_title = $posts_page->post_title;
	$posts_page_url = get_page_uri($posts_page_id  );
	
	echo '<nav class="breadcrumbs hide-for-small">';
	echo '<div class="seven columns">';
	echo '<ul>';
	 	
	 	//IF HOME LINK
	    if (!is_front_page()) { 
	        echo '<li><a href="'; echo home_url(); echo '">'; echo _e('Home', 'bean'); echo "</a></li>";
	        echo "<span class='meta-sep'>$divider</span>";
	    }   
	    
		//IF SINGLE POST
		if ( is_single() ) {
			//IF PORTFOLIO SINGLE
			if (is_singular('portfolio')) {
				echo '<li><a href="'; echo get_page_link($portfolio_page); echo '">'; echo $post_type_slug; echo "</a></li>";
				echo "<span class='meta-sep'>$divider</span>";
				echo "<li>"; the_title(); echo '</li>';
				
			}
			//IF POST SINGLE 
			if (is_singular('post')) { 
				echo '<li><a href="'; echo home_url(); echo '/'; echo $posts_page_url; echo '">'; echo $posts_page_title; echo "</a></li>";
				echo "<span class='meta-sep'>$divider</span>";
				echo '<li>'; the_category(' </li>');
				echo "<span class='meta-sep'>$divider</span>";
				echo "<li>"; echo $short_title; echo '</li>';
			}
	    }   
	    
	    //IF PORTFOLIO ARCHIVE
	    if (is_archive('portfolio') || is_tax('portfolio')) {
	    	echo '<li><a href="'; echo get_page_link($portfolio_page); echo '">'; echo $post_type_slug; echo "</a></li>";
	    }

	    if (!is_singular('portfolio')) {
		  	global $post; $postid = $post->ID;

			if ( get_the_terms($postid, 'portfolio_tag') ) {
				echo "<span class='meta-sep'>$divider</span>";
				single_tag_title(); 
			} elseif (get_the_terms($postid, 'portfolio_category')) {
				echo "<span class='meta-sep'>$divider</span>";
				single_cat_title(); 
			} 
		}
	         
	     // IF PAGE           
	   	if (is_page()) {
	       echo "<li>"; echo $short_title; echo '</li>';
		}
		
		// IF BLOGROLL           
		if (is_home()) {
		   echo "<li>"; echo $posts_page_title; echo '</li>';
		}
		
		// IF BLOGROLL           
		if (is_search()) {
		   echo "<li>"; _e( ' Search', 'bean' ); echo '</li>';
		}
		
		// IF BLOG ARCHIVE
		elseif (is_archive('post')) { 

			if (!is_archive('portfolio')) {
				echo '<li><a href="'; echo home_url(); echo '/'; echo $posts_page_url; echo '">'; echo $posts_page_title; echo "</a></li>";
				echo "<span class='meta-sep'>$divider</span>";	
			}

			if (!is_archive('portfolio') && !is_tax('portfolio')) {
				echo '<li><a href="'; echo home_url(); echo '/'; echo $posts_page_url; echo '">'; echo $posts_page_title; echo "</a></li>";
			}

			if ( is_author() ) :
			   	global $post; $author_id=$post->post_author; $field='display_name';	   
			    echo the_author_meta( $field, $author_id ); _e( '&#39;s Articles', 'bean' );
		     elseif(is_tag() ):
		     	echo "<span class='meta-sep'>$divider</span>";
				single_tag_title();
			elseif (is_category() ) :
			     echo "<span class='meta-sep'>$divider</span>";
				single_cat_title();
			elseif ( is_day() ) : 
				echo "<span class='meta-sep'>$divider</span>";
				get_the_date();
			elseif ( is_month() ) : 
				echo "<span class='meta-sep'>$divider</span>";
				get_the_date( _x( 'F Y', 'monthly archives date format', 'bean' ) );
			elseif ( is_year() ) :
				echo "<span class='meta-sep'>$divider</span>";
				get_the_date( _x( 'Y', 'yearly archives date format', 'bean' ) );
			else :
	
			endif;
		}
	 
	echo '</ul>';
	echo '</div>';
	echo '</nav>';
	?>
    <?php
}

    
/*-----------------------------------------------------------------------------------*/
/*	PORTFOLIO RELATED POSTS
/*-----------------------------------------------------------------------------------*/
if ( !function_exists( 'bean_get_related_posts' ) ) {
    function bean_get_related_posts($post_id, $taxonomy, $args=array()) {
        $terms = wp_get_object_terms($post_id, $taxonomy);

        if( count($terms) ) {
            $post = get_post($post_id);
            $our_terms = array();
            foreach ($terms as $term) {
                $our_terms[] = $term->slug;
            }
            $args = wp_parse_args($args, array(
                'post_type' => $post->post_type,
                'post__not_in' => array($post_id),
                'tax_query' => array(
                    array(
                        'taxonomy' => $taxonomy,
                        'terms' => $our_terms,
                        'field' => 'slug',
                        'operator' => 'IN'
                    )
                ),
                'orderby' => 'rand',
                'meta_key' 			=> '_thumbnail_id' // LOAD POSTS ONLY WITH FEAT IMAGES
                )
            );
            $query = new WP_Query($args);
            return $query;
        } else {
            return false;
        }
    }
}


/*--------------------------------------------------------------------*/
/*  PORTFOLIO PAGINATION			          							
/*--------------------------------------------------------------------*/
if ( !function_exists('bean_portfolio_pagination') ) {

	function bean_portfolio_pagination() { 
	
	//PORTFOLIO PAGE SELECT FROM CUSTOMIZER
	$portfolio_page = get_theme_mod('portfolio_page_selector');
		
	if( is_single('') ) : $options = get_option('bean_theme'); ?>

		<div class="pagination hide-on-little">
			
			<span class="page-previous">
				<?php previous_post_link('%link', ''); if(!get_adjacent_post(false, '', true)) { echo '<style>span.page-previous {display:none}</style>'; } ?>
			</span><!-- END .page-previous -->
		
			<span class="page-portfolio">
		    	<a href="<?php echo get_page_link($portfolio_page); ?>" rel="bookmark"></a>
			</span><!-- END .page-portfolio -->
		    			
			<span class="page-next">
				<?php next_post_link('%link', ''); if(!get_adjacent_post(false, '', false)) { echo '<style>span.page-next {display:none}</style>'; } ?>
			</span><!-- END .page-next -->
		
		</div><!-- END .pagination -->				
	<?php endif;
		
	}
	add_action('bean_portfolio_pagination', 'bean_portfolio_pagination');
}


/*--------------------------------------------------------------------*/                							
/*  REDIRECT TO SEARCH RESULT, IF ONLY ONE RESULT IS FOUND				                							
/*--------------------------------------------------------------------*/
function single_search_result() {  
    if (is_search()) {  
        global $wp_query;  
        if ($wp_query->post_count == 1) {  
            wp_redirect( get_permalink( $wp_query->posts['0']->ID ) );  
        }  
    }  
}  

add_action('template_redirect', 'single_search_result'); 


/*--------------------------------------------------------------------*/                							
/*  SEARCH ONLY POSTS, NOT PAGES					                							
/*--------------------------------------------------------------------*/
function BeanSearchFilter($query) {
	if ($query->is_search) {
	$query->set('post_type', 'post');
	}	
	return $query;
	}

add_filter('pre_get_posts','BeanSearchFilter');


/* ---------------------------------------------------------------------- */
/*	HIDE VIEW POST LINK FOR SLIDER AND TEAM POST FORMATS
/* ---------------------------------------------------------------------- */
function bean_hide_slider_view() {
    global $post_type;
    if($post_type == 'slider' || $post_type == 'team' ) {
    echo '<style type="text/css">#edit-slug-box,#view-post-btn,#post-preview,.updated.below-h2 a, li#wp-admin-bar-view, .row-actions .view {display: none;}</style>';
    }
}
add_action('admin_head', 'bean_hide_slider_view'); 


/* ---------------------------------------------------------------------- */
/*	CUSTOM BACKGROUND SLIDER CSS
/* ---------------------------------------------------------------------- */
if ( !function_exists('bean_custom_styles') ) {
    function bean_custom_styles() { 
    ?>
     
<style>
   
   <?php
   // GET PORTFOLIO IDs
   $port_posts = get_posts( 
   		array( 
   			'numberposts' => -1, 
   			'post_type' => 'slider') 
   		);
   
	foreach( $port_posts as $post ) {  

	// GET THE VALUES FROM THE SLIDER META
	$postid = $post->ID; 
	$bgcolor = get_post_meta($postid, '_bean_bgcolor', true);
	$bgimage = get_post_meta($postid, '_bean_bgimage', true );
	$bgrepeat = get_post_meta($postid, '_bean_bgrepeat', true );
	$secondary_theme_accent_color = get_option('secondary_theme_accent_color');

if ( $bgcolor != '' ) { //BACKGROUND-COLOR ?>
	#post-<?php echo $postid ?> { <?php echo 'background-color: ' .$bgcolor. ';'; ?> }
	#post-<?php echo $postid ?>.home-slide .short-btn { <?php echo 'color: ' .$bgcolor. '!important;'; ?> }
	#post-<?php echo $postid ?>.home-slide .short-btn:hover { <?php echo 'color:#FFF!important;'; ?> }
<?php } // END BACKGROUND-COLOR

if ( $bgimage != '' && $bgrepeat == 'no-repeat') { //BACKGROUND-IMAGE NO REPEAT ?>
	#post-<?php echo $postid ?> { <?php echo 'background-image: ' .'url('.wp_get_attachment_url( $bgimage ).');';?> background-size: cover; }
<?php }  

if ( $bgimage != '' && $bgrepeat != 'no-repeat') {  //BACKGROUND-IMAGE REPEATD ?>
	#post-<?php echo $postid ?> { <?php echo 'background-image: ' .'url('.wp_get_attachment_url( $bgimage ).');';?> <?php echo 'background-repeat: ' .$bgrepeat. ';'; ?> }
<?php } 
		
// IF NO BACKGROUND COLOR/IMAGE DEFAULT TO ACCENT 1 COLOR
if ( $bgcolor == '' && $bgimage == '') { ?>
	#post-<?php echo $postid ?> { <?php echo 'background-color: ' .$secondary_theme_accent_color. ';'; ?> }
	#post-<?php echo $postid ?>.home-slide .short-btn { <?php echo 'color: ' .$secondary_theme_accent_color. '!important;'; ?> }
	#post-<?php echo $postid ?>.home-slide .short-btn:hover { <?php echo 'color:#FFF!important;'; ?> }
<?php } // END BACKGROUND-COLOR

if ( $bgcolor == '' && $bgimage != '') { ?>
	#post-<?php echo $postid ?> { <?php echo 'background-color: ' .$secondary_theme_accent_color. ';'; ?> }
	#post-<?php echo $postid ?>.home-slide .short-btn { <?php echo 'color:#23313A !important;'; ?> }
	#post-<?php echo $postid ?>.home-slide .short-btn:hover { <?php echo 'color:#FFF!important;'; ?> }
<?php } // END BACKGROUND-COLOR ?>

<?php } // END FOR EACH ?>
</style>

<?php  }
}
add_action('wp_head', 'bean_custom_styles');