<div id="header-dropin">

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
	
			<div id="dropin-nav" class="right">
			    
			    <?php if( has_nav_menu( 'drop-in-menu' ) ) { //IF HEADER DROPIN MENU IS ADDED
			    	wp_nav_menu( array(
			    		'theme_location' => 'drop-in-menu',
			    		'sort_column' => 'menu_order',
			    		'menu_class' => 'sf-menu'
			    	));
			    } else {  _e( 'Select a menu from the Navigation tab of the theme customizer ', 'bean' );  } ?>	
	
			</div><!-- END .dropin-menu -->
			
		</div><!-- END .nine columns -->	
		
	</div><!-- END .row -->

</div><!-- END #header-dropin -->
