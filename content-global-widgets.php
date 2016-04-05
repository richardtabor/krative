<?php $dynammic_sidebar = get_theme_mod( 'footer_widget_area' ); //GLOBAL FOOTER WIDGET FROM THEME CUSTOMIZER
   
    if( $dynammic_sidebar != '' ) {
        
        switch ( $dynammic_sidebar ) {
            case 'none': break; //DO NOTHING
            
            case 'home_section_1': ?>
            
				<?php if ( is_active_sidebar('home_section_one') ) { ?>
							
					<div class='section even section-one'>	
						
						<?php dynamic_sidebar( 'Home Section One' ) ?>
				
					</div><!-- END .section section-one -->
				
				<?php } break; //END IF SECTION ONE
                
            case 'home_section_2': ?>
            
				<?php if ( is_active_sidebar('home_section_two') ) { ?>
							
					<div class='section even section-two'>	
						
						<?php dynamic_sidebar( 'Home Section Two' ) ?>
				
					</div><!-- END .section section-two -->
				
				<?php } break; //END IF SECTION TWO
				
             case 'home_section_3': ?>
             
             	 <?php if ( is_active_sidebar('home_section_three') ) { ?>
             	 				
             	 		<div class='section even section-three'>	
             	 			
             	 			<?php dynamic_sidebar( 'Home Section Three' ) ?>
             	 
             	 		</div><!-- END .section section-three -->
             	 	
             	 	<?php } break; //END IF SECTION THREE
             	 	
             case 'home_section_4': ?>
             
				<?php if ( is_active_sidebar('home_section_four') ) { ?>
							
					<div class='section even section-four'>	
						
						<?php dynamic_sidebar( 'Home Section Four' ) ?>
				
					</div><!-- END .section section-four -->
				
				<?php } break; //END IF SECTION FOUR
               
            case 'home_section_5': ?>
            
				<?php if ( is_active_sidebar('home_section_five') ) { ?>
							
					<div class='section even section-five'>	
						
						<?php dynamic_sidebar( 'Home Section Five' ) ?>
				
					</div><!-- END .section section-five -->
				
				<?php } break; //END IF SECTION FIVE
        }
    }
?>
