<?php
/*--------------------------------------------------------------------*/	
/*  TEAM GENERAL META							   			          							
/*--------------------------------------------------------------------*/
$meta_boxes[] = array(
	'id'       => 'team-meta',
	'title'    => __('Team Member Meta', 'bean'),
	'pages'    => array('team'),
	'context'  => 'normal',
	'priority' => 'high',
	'fields'   => array(
		array(  
			'name' => __('Twitter Username:','bean'),
			'desc' => __('Just your username without the "@" symbol. Ex: ThemeBeans','bean'),
			'id' => $prefix.'team_twitter',
			'type' => 'text',
			'std' => ''
			),		
	)
);
