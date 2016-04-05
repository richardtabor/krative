<?php
//SETTING UP PORTFOLIO 
$gallery_layout = get_post_meta($post->ID, '_bean_gallery_layout', true);
$portfolio_type = get_post_meta($post->ID, '_bean_portfolio_type', true);  
$orderby = get_post_meta($post->ID, '_bean_portfolio_randomize', true);  

//RANDOMIZE VARIABLE
$orderby = ( $orderby == false ) ? 'menu_order' : 'rand';


/*--------------------------------------------------------------------*/                							
/*  GALLERY PORTFOLIO TYPE					                							
/*--------------------------------------------------------------------*/
if ( $portfolio_type == 'gallery') {
	
	// IF VIEW OR STACKED LAYOUT
	if ( $gallery_layout == 'view' OR $gallery_layout == 'stacked' ) {
	
		$thumb_ID = get_post_thumbnail_id( $post->ID ); // EXCLUDE USE THE FEATURED IMAGE
		$images =& get_children( array (
			'post_parent' => $post->ID,
			'order' => 'ASC',
			'orderby' => $orderby,
			'post_type' => 'attachment',
			'post_mime_type' => 'image',
			'exclude' => $thumb_ID // EXCLUDED
		));
		
		foreach ( $images as $attachment_id => $attachment ) { // SUPPORT FOR CUSTOM EXPORT - CLASS AND CAPTION (VIEW.JS)
			$imageUrl = wp_get_attachment_image_src( $attachment->ID, 'portfolio-single' );
			$caption = $attachment->post_excerpt;
			
			if ( $gallery_layout == 'view' ) { // VIEW.JS CLASS
				echo '<a href="'.$imageUrl[0].'" class="view" rel="bean"><img src="'.$imageUrl[0].'"/></a>';
			} 
			
			if ( $gallery_layout == 'stacked' ) {
				echo '<li class="stacked-image">';
				echo '<img src="'.$imageUrl[0].'"/>'; 
				if ( $caption != '' ) { echo '<h6 class="media-caption">'; echo $caption; echo '</h6>'; } //CAPTIONS
				echo '</li>';
			}
			
		} // END FOR EACH IMAGE
		
	} // END IF VIEW OR STACKED LAYOUT	
	
	// IF SLIDESHOW LAYOUT
	if ( $gallery_layout == 'slideshow') { 
	
		$thumb_w = 640; //Define width
		$thumb_h = 9999; // Define height
		radium_gallery( $post->ID, $thumb_w, $thumb_h, true );  
		
	} // END IF SLIDESHOW LAYOUT
	
} // END GALLERY PORTFOLIO TYPE ?>


<?php
/*--------------------------------------------------------------------*/                							
/*  AUDIO PORTFOLIO TYPE					                							
/*--------------------------------------------------------------------*/
if ( $portfolio_type == 'audio') { 

$thumb_ID = get_post_thumbnail_id( $post->ID ); // EXCLUDE USE THE FEATURED IMAGE
$images =& get_children( array (
	'post_parent' => $post->ID,
	'order' => 'ASC',
	'orderby' => 'menu_order',
	'post_type' => 'attachment',
	'post_mime_type' => 'image',
	'numberposts' => 1,
	'exclude' => $thumb_ID // EXCLUDED
));

foreach ( $images as $attachment_id => $attachment ) { 
	$imageUrl = wp_get_attachment_image_src( $attachment->ID, 'portfolio-single' );
} //END FOR EACH ?>	
	
	<img src="<?php echo $imageUrl[0]; ?>" class="wp-post-image" width="<?php echo $thumb_w; ?>" height="<?php echo $thumb_h; ?>" alt="" />
		
	<?php radium_audio($post->ID); ?>
	
<?php 	
} // END AUDIO PORTFOLIO TYPE ?>


<?php 
/*--------------------------------------------------------------------*/                							
/*  VIDEO PORTFOLIO TYPE					                							
/*--------------------------------------------------------------------*/
if ( $portfolio_type == 'video') { 

	$embed = get_post_meta($post->ID, '_bean_portfolio_embed_code', true);
	
	if( !empty($embed) ) {
		echo "<div class='video-frame'>";
	    	echo stripslashes(htmlspecialchars_decode($embed));
	    echo "</div>";
	} else {
	    radium_video($post->ID);
	}

} // END VIDEO PORTFOLIO TYPE ?>