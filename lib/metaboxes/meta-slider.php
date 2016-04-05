<?php
/*----------------------------------------------------------------------*/
/*	GENERAL / GLOBAL METABOXES
/*----------------------------------------------------------------------*/
$meta_boxes[] = array(
	'id'       => 'general-settings',
	'title'    => __('Customize Slider Background', 'bean'),
	'pages'    => array('slider'),
	'context'  => 'normal',
	'priority' => 'default',
	'fields'   => array( 
  
	// BG-Color
	array(
		'name'		=> 'Background Color:',
		'id'		=> "{$prefix}bgcolor",
		'type'		=> 'color'
	),
		
	// BG-IMAGE
	array(
		'name'	=> 'Background Image:',
		'id'	=> "{$prefix}bgimage",
		'desc'		=> 'Upload a pattern or a large image to be displayed full width.',
		'type'	=> 'thickbox_image'
	),
	
	// BG-REPEAT    
	array(
		'name'		=> 'Background Repeat:',
		'id'		=> "{$prefix}bgrepeat",
		'type'		=> 'radio',
		'multiple'	=> false,
		'std'		=> 'no-repeat',
		'options'	=> array(
			'repeat'		=> 'Repeat',
			'no-repeat'		=> 'No-Repeat',
			'repeat-x'		=> 'Horizonatal Repeat (X)',
			'repeat-y'		=> 'Vertical Repeat (Y)'
		    ),
	    ),
	)
);