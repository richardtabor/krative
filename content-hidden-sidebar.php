<div class="hidden-sidebar <?php if( get_theme_mod( 'hidden_sidebar' ) == false) { echo'show-for-small'; } ?>">

	<div class="hidden-sidebar-inner">
	
		<span class="close-btn"></span>
		
		<?php if ( has_nav_menu( 'sidebar-menu' ) ) { //IF MENU IS ADDED ?>
			<div class="widget">
			
				<div class="widget responsive-menu">
					<h5 class="widget-title"><?php echo get_theme_mod( 'menu_text', 'Menu', 'bean' ); ?></h5>
				</div><!-- END .widget responsive-menu-->
				
				<?php wp_nav_menu( array(
						'theme_location' => 'sidebar-menu',
						'sort_column' => 'menu_order',
						'menu_class' => 'main-menu',
					));  ?>
					
			</div><!-- END .widget -->
			
		<?php } //END IF MENU ?>

		<?php if( get_theme_mod( 'hidden_sidebar' ) == true) { //GET HIDDEN SIDEBAR
			dynamic_sidebar( 'Hidden Sidebar Panel' ); 
		} ?>
	
	</div><!-- END .hidden-sidebar-inner -->	

</div><!-- END .hidden-sidebar -->