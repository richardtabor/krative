<?php /* FOOTER */ ?>

<?php if (is_404() OR is_page_template('page-comingsoon.php') ) { } else { // HIDE FOOTER FOR 404 & COMING SOON TEMPLATES ?>

	<div id="footer-container">
	
		<div class="row">	
	
			<div class="twelve columns">
			
				<?php if ( has_nav_menu( 'footer-menu' ) ) { //IF FOOTER MENU IS ADDED
					wp_nav_menu( array(
						'theme_location' => 'footer-menu',
						'sort_column' => 'menu_order',
						'depth' => '1',
					));
				}  ?>	
						
				<?php echo get_theme_mod( 'footer_copyright', '&copy; 2013 Krative by <a href="http://themebeans.com">ThemeBeans</a>', 'bean' ); ?>
				
			</div><!-- END .twelve columns -->		
	
		</div><!-- END .row -->
	
	</div><!-- END #footer-container -->

</div><!-- END #theme-wrapper -->	

<?php get_template_part( 'content', 'hidden-sidebar' ); //PULL HIDDEN SIDEBAR CONTENT ?>
	   
<?php }  // END HIDE HEADER FOR 404 PAGE ?>
 	
<?php wp_footer(); ?>

</body>

</html>