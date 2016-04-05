<?php
/*--------------------------------------------------------------------*/	
/*  META PAGE GENERAL							   			          							
/*--------------------------------------------------------------------*/
$meta_boxes[] = array(
	'id'       => 'sidebar-settings',
	'title'    => __('Page Sidebar Settings', 'bean'),
	'pages'    => array('page'),
	'context'  => 'normal',
	'priority' => 'high',
	'std'  => 'right',
	'desc' => __('Select a page sidebar option. (Only pages, not blogroll or posts.)', 'bean'),
	'fields'   => array(
		
		//SHOW PAGE TITLE
		array(
			'name'		=> 'Display Page Title:',
			'id'		=> "{$prefix}page_title",
			'type'		=> 'checkbox',
			'desc'		=> 'Select to display the page title above the content area',
			'std'		=> '1',
		),
		
		//SIDEBAR SWITCHER
 		array(
			'name'     => __('Select Sidebar Layout:', 'bean'),
			'id'		=> "{$prefix}page_layout",
			'type'     => 'radio_image',
			'options'  => array(
				'none' => '<img src="' . BEAN_ADMIN_IMAGES_URL . '/1col.png" alt="' . __('Fullwidth', 'bean') . '" title="' . __('Fullwidth"', 'bean') . ' />',
				'left'  => '<img src="' . BEAN_ADMIN_IMAGES_URL . '/2cl.png" alt="' . __('Left Sidebar', 'bean') . '" title="' . __('Left Sidebar', 'bean') . '" />',
				'right'  => '<img src="' . BEAN_ADMIN_IMAGES_URL . '/2cr.png" alt="' . __('Right Sidebar', 'bean') . '" title="' . __('Right Sidebar', 'bean') . '" />'
			),
			
		),
		
		
	)
);