<!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" <?php language_attributes(); ?>><![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" <?php language_attributes(); ?>><![endif]-->
<!--[if gt IE 8]><!--><html <?php language_attributes(); ?>><!--<![endif]-->  

<!-- DESIGN & CODE BY THEMEBEANS OF WWW.THEMEBEANS.COM -->

<head>
	<!-- META TAGS -->
	<meta http-equiv="content-type" content="<?php bloginfo('html_type'); ?>; charset=<?php bloginfo('charset'); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	
	<!-- TITLE -->
	<title><?php if ( defined('WPSEO_VERSION') ) { wp_title(''); } else { if(is_home() OR is_404() OR is_search() ) { echo bloginfo("name"); echo " | "; echo bloginfo("description"); } else { echo bloginfo("name"); echo " | "; echo get_the_title();  } } ?></title>
	
	<!-- RSS & PINGBACKS -->
	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo( 'name' ); ?> RSS Feed" href="<?php bloginfo( 'rss2_url' ); ?>" />
	<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" /> 
	
	<!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
	
	<?php echo get_theme_mod( 'google_analytics', '' ); ?>
	
	<?php wp_head(); ?>	
</head>

<body <?php body_class(); ?>>

<?php if (is_404() OR is_page_template('page-comingsoon.php') ) { } else { // HIDE HEADER FOR 404 & COMING SOON TEMPLATES ?>
	
<div id="theme-wrapper">	
	
	<?php if( get_theme_mod( 'header_dropin' ) == true) { ?>
	
		<?php get_template_part( 'content', 'header-dropin' ); // PULL FROM CONTENT-HEADER-DROPIN.PHP  ?>
	
	<?php } // END IF HEADER DROPIN ?>

	<div id="header-container">	
	
		<div class="row">	
		
			<div class="three columns mobile-four">
				
				<div class="logo">
				
					<?php if( get_theme_mod( 'img-upload-logo' ) ) { // CUSTOMIZER LOGO ?>  
					  	<a href="<?php echo home_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>" rel="home"><img src="<?php echo get_theme_mod( 'img-upload-logo' )?>" class="logo-uploaded" alt="logo"/></a>
					<?php } else { ?> 
					    <a href="<?php echo home_url(); ?>" title="<?php echo bloginfo( 'name' ); ?>" rel="home"><h1 class="logo_text"><?php bloginfo( $name ); ?></h1></a>
					 <?php } ?> 
					 
				</div><!-- END .logo -->
				
			</div><!-- END .three columns -->
			
			<div class="nine columns hide-for-small">

				<div id="primary-nav" class="main-menu" role="navigation">
				    
				    <?php if( has_nav_menu( 'primary-menu' ) ) {
				        wp_nav_menu( array( 
				        	'theme_location' => 'primary-menu', 
				        	'container' => '', 
				        	'menu_id' => 'primary-menu',
				        	'menu_class' => 'sf-menu main-menu' ) ); 
				    } ?>
				    
					<a class="sidebar-btn <?php if( get_theme_mod( 'hidden_sidebar' ) == false) { echo'show-for-small'; } ?>" href="#"><?php echo get_theme_mod( 'menu_text', 'Menu', 'bean' ); ?><span class="menu-icon"></span></a>
						
				</div><!-- END #primary-nav main-menu -->
				
			</div><!-- END .nine columns -->	
			
			<div class="show-for-small">
			
				<a class="sidebar-btn" href="#"><span class="menu-icon large"></span></a>	
			
			</div><!-- END .show-for-small -->	
				
		</div><!-- END .row -->
		
	</div><!-- END #header-container -->

	<?php if( get_theme_mod( 'page_subheader' ) == true) { ?>
	
		<?php if ( !is_page_template('page-home.php') ) { ?>
			
			<div id="sub-header-container">
			
				<div class="row">
				
					<?php bean_breadcrumbs(); //FUNCTION FROM THEME-FUNCTIONS.PHP ?>
					
					<div class="five columns">
					
						<p class="right"><?php echo get_bloginfo ( 'description' ); ?></p>
					
					</div><!-- END .five columns -->
					
				</div><!-- END .row -->
				
			</div><!-- END #sub-header-container -->	
			
		<?php } //END !IF HOME SUB HEADER ?>
	
	<?php } //END IF SUB HEADER THEME CUSTOMIZER ?>
		
<?php } ?>	