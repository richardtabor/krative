<?php
/*--------------------------------------------------------------------*/	
/*  PORTFOLIO GENERAL META							   			          							
/*--------------------------------------------------------------------*/
$meta_boxes[] = array(
	'id'       => 'portfolio-meta',
	'title'    => __('Portfolio Entry Meta', 'bean'),
	'pages'    => array('portfolio'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(
			'name' =>  __('Portfolio Type:', 'bean'),
			'id' => $prefix.'portfolio_type',
			'type' => 'select',
			'std' => 'Gallery',
			'desc' => __('Select the portfolio type for this post.','bean'),
			'options' => array(
				'gallery' =>'Gallery', 
				'video' =>'Video', 
				'audio' =>'Audio'
				)
		),
				
		array(  
			'name' => __('Portfolio Client:','bean'),
			'desc' => __('','bean'),
			'id' => $prefix.'portfolio_client',
			'type' => 'text',
			'std' => ''
			),		
		array(  
			'name' => __('Portfolio URL:','bean'),
			'desc' => __('Insert a URL without the "http://" For example: www.themebeans.com','bean'),
			'id' => $prefix.'portfolio_url',
			'type' => 'text',
			'std' => ''
			),
		array(  
			'name' => __('Portfolio URL Link Text:','bean'),
			'desc' => __('Enter the text to be displayed as the link.','bean'),
			'id' => $prefix.'portfolio_url_text',
			'type' => 'text',
			'std' => 'View Project &rarr;'
			),	
		array(
			'name'     => __('Display Categories:', 'bean'),
			'id' => $prefix.'portfolio_cats',
			'type' => 'checkbox',
			'desc' => __('Yes, please do.', 'bean'),
			'std' => 1 
			),		
		array(
			'name'     => __('Display Publish Date:', 'bean'),
			'id' => $prefix.'portfolio_date',
			'type' => 'checkbox',
			'desc' => __('Yes, please do.', 'bean'),
			'std' => 1 
			),				
	)
);


/*--------------------------------------------------------------------*/	
/*  GALLERY TYPE						   			          							
/*--------------------------------------------------------------------*/
$meta_boxes[] = array(
	'id' => 'portfolio-images',
	'title' => __('Gallery Settings', 'bean'),
	'pages' => array('portfolio'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array(
			'name' =>  __('Gallery Layout:', 'bean'),
			'desc' => __('Choose which layout to display for this portfolio post.', 'bean'),
			'id' => $prefix.'gallery_layout',
			'type' => 'select',
			'std' => 'Image',
			'options' => array(
				'view' =>'jQuery Photo Viewer', 
				'stacked' =>'Stacked Images', 
				'slideshow' =>'Slideshow', 
				)
			),
		array( 
			'name' => 'Gallery Images:',
			'desc' => 'Upload images here. Click "Insert into Post" and once uploaded, drag & drop to reorder.',
			'id' => $prefix . 'portfolio_upload_images',
			'type' => 'thickbox_image',
			),
		array(
			'name'     => __('Randomize Images:', 'bean'),
			'id' => $prefix.'portfolio_randomize',
			'type' => 'checkbox',
			'desc' => __('Yes, please do.', 'bean'),
			'std' => 0 
			),			
    )
);
 

/*--------------------------------------------------------------------*/	
/*  AUDIO TYPE						   			          							
/*--------------------------------------------------------------------*/
$meta_boxes[] = array(
	'id' => 'portfolio-audio',
	'title' =>  __('Audio Settings', 'bean'),
	'pages' => array('portfolio'),
	'context' => 'normal',
	'priority' => 'high',
	'fields' => array(
		array( 
		    'name' => __('MP3 File URL:','bean'),
			'desc' => __('','bean'),
			'id' => $prefix.'audio_mp3',
			'type' => 'text',
			'std' => ''
		),
		array( 
		    'name' => __('OGA File URL:','bean'),
			'desc' => __('','bean'),
			'id' => $prefix.'audio_ogg',
			'type' => 'text',
			'std' => ''
		),
	)
);

 
/*--------------------------------------------------------------------*/	
/*  VIDEO TYPE						   			          							
/*--------------------------------------------------------------------*/ 
$meta_boxes[] = array(
	'id' => 'portfolio-video',
	'title' => __('Video Settings', 'bean'),
	'pages' => array('portfolio'),
	'context' => 'normal',
	'priority' => 'high',	
	'fields' => array(	
		array( 
			'name' => __('M4V File URL:','bean'),
			'desc' => __('','bean'),
			'id' => $prefix . 'video_m4v',
			'type' => 'text',
			'std' => ''
			),
		array( 
			'name' => __('OGV File URL:','bean'),
			'desc' => __('','bean'),
			'id' => $prefix . 'video_ogv',
			'type' => 'text',
			'std' => ''
			),
		array( 
			'name' => __('Poster Image:','bean'),
			'desc' => __('','bean'),
			'id' => $prefix . 'video_poster',
			'type' => 'text',
			'std' => ''
			),
		array(
			'name' => __('Embed Code:', 'bean'),
			'desc' => __('If you are not using self hosted video then you can include embeded code here.', 'bean'),
			'id' => $prefix . 'portfolio_embed_code',
			'type' => 'textarea',
			'std' => ''
			)
	),
	
);
