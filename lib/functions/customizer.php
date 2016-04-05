<?php 
/*--------------------------------------------------------------------*/                							
/*  WORDPRESS THEME CUSTOMIZER FUNCTIONS		                							
/*--------------------------------------------------------------------*/
// 1. ADD BACKGROUND IMAGE UPLOADER SUPPORT
add_theme_support( 'custom-background' ); 




/*--------------------------------------------------------------------*/                							
/*  COLORS SECTION			                							
/*--------------------------------------------------------------------*/
function Bean_Customize_Register( $wp_customize ) {
$colors = array();
// BODY P COLOR
	$colors[] = array(
		'slug'=>'body_text_color', 
		'default' => '#818B92',
		'label' => __('Body Text Color', 'bean'),
		'priority' => 2,
	);
	
// THEME ACCENT COLOR
	$colors[] = array(
		'slug'=>'theme_accent_color', 
		'default' => '#FF6454',
		'label' => __('Accent Color', 'bean'),
		'priority' => 3,
	);

// SECONDARY THEME ACCENT COLOR
	$colors[] = array(
		'slug'=>'secondary_theme_accent_color', 
		'default' => '#1FB4DA',
		'label' => __('Secondary Accent Color', 'bean'),
		'priority' => 4,
	);	

// HEADER
	$colors[] = array(
		'slug'=>'header_color', 
		'default' => '#1FB4DA',
		'label' => __('Header Background', 'bean'),
		'priority' => 1,
	);
	
// HEADER
	$colors[] = array(
		'slug'=>'post_thumb_bg_color', 
		'default' => '#AFAFB6',
		'label' => __('Thumbnail Background', 'bean'),
		'priority' => 1,
	);		
	
	foreach( $colors as $color ) {
		$wp_customize->add_setting(
			$color['slug'], array(
				'default' => $color['default'],
				'type' => 'option', 
				'capability' => 
				'edit_theme_options'
			)
		);
		$wp_customize->add_control(
			new WP_Customize_Color_Control(
				$wp_customize,
				$color['slug'], 
				array('label' => $color['label'], 
				'section' => 'colors',
				'settings' => $color['slug'])
			)
		);
	



/*--------------------------------------------------------------------*/         	
/*  GENERAL SETTINGS SECTION			                							
/*--------------------------------------------------------------------*/		
$wp_customize->add_section(
    'general_settings',
    array(
        'title' => 'General Settings',
        'description' => 'This is a branding section.',
        'priority' => 35,
    )
);
		
		// 1 UPLOAD LOGIN LOGO	
		$wp_customize->add_setting( 'img-upload-login-logo' );
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'img-upload-login-logo',
		        array(
		            'label' => 'Upload Login Logo',
		            'section' => 'general_settings',
		            'settings' => 'img-upload-login-logo',
		            'priority' => 1,
		        )
		    )
		);	
		
		// 2 UPLOAD LOGO	
		$wp_customize->add_setting( 'img-upload-logo' );
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'img-upload-logo',
		        array(
		            'label' => 'Upload Logo',
		            'section' => 'general_settings',
		            'settings' => 'img-upload-logo',
		            'priority' => 2,
		        )
		    )
		);
		
		// 3 UPLOAD RETINA LOGO	
		$wp_customize->add_setting( 'img-upload-logo-retina' );
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'img-upload-logo-retina',
		        array(
		            'label' => 'Upload Retina Logo (@2x)',
		            'section' => 'general_settings',
		            'settings' => 'img-upload-logo-retina',
		            'priority' => 3,
		        )
		    )
		);	
		
		// 4 UPLOAD FAVICON	
		$wp_customize->add_setting( 'img-upload-favicon' );
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'img-upload-favicon',
		        array(
		            'label' => 'Upload Favicon (16x16px)',
		            'section' => 'general_settings',
		            'settings' => 'img-upload-favicon',
		            'priority' => 4,
		        )
		    )
		);	
		
		// 5 UPLOAD APPLETOUCH ICON	
		$wp_customize->add_setting( 'img-upload-apple_touch' );
		$wp_customize->add_control(
		    new WP_Customize_Image_Control(
		        $wp_customize,
		        'img-upload-apple_touch',
		        array(
		            'label' => 'Upload Web App Icon (144x144px)',
		            'section' => 'general_settings',
		            'settings' => 'img-upload-apple_touch',
		            'priority' => 5,
		        )
		    )
		);
		
		// 6 FOOTER COPYRIGHT
		$wp_customize->add_setting( 'footer_copyright', array( 'default' => '© 2013 <a href="http://themebeans.com/theme/krative">Krative</a> by <a href="http://themebeans.com">ThemeBeans</a>' ) );
		$wp_customize->add_control(
		    'footer_copyright',
		    array(
		        'label' => 'Footer Copyright Text',
		        'section' => 'general_settings',
		        'type' => 'text',
		        'priority' => 7,
		    )
		);


/*--------------------------------------------------------------------*/         	
/*  NAVIGATION (ADDED ON)			                							
/*--------------------------------------------------------------------*/		
		$wp_customize->add_setting( 'menu_text', array( 'default' => 'Menu' ) );
		$wp_customize->add_control( 'menu_text',
		    array(
		        'label' => 'Menu Label (Sidebar Trigger)',
		        'section' => 'nav',
		        'type' => 'text',
		        'priority' => 5,
		    )
		);
		
		$wp_customize->add_setting( 'menu_padding', array( 'default' => '' ) );
		$wp_customize->add_control( 'menu_padding',
		    array(
		        'label' => 'Menu Padding (If Overflow)',
		        'section' => 'nav',
		        'type' => 'text',
		        'priority' => 6,
		    )
		);
		

/*--------------------------------------------------------------------*/         	
/*  THEME OPTIONS SECTION			                							
/*--------------------------------------------------------------------*/		
$wp_customize->add_section(
    'krative_settings',
    array(
        'title' => 'Theme Options',
        'description' => 'This is a branding section.',
        'priority' => 36,
    )
);
	
		// RETINA
		$wp_customize->add_setting( 'retina_option', array( 'default' => true ) );
		$wp_customize->add_control( 'retina_option',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Enable Retina.js for Images',
		        'section' => 'krative_settings',
		        'priority' => 1,
		    )
		);
	
		// HIDDEN SIDEBAR
		$wp_customize->add_setting( 'hidden_sidebar', array( 'default' => true ) );
		$wp_customize->add_control( 'hidden_sidebar',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Enable Hidden Sidebar Panel',
		        'section' => 'krative_settings',
		        'priority' => 2,
		    )
		);
		
		// DISABLE SUB HEADER
		$wp_customize->add_setting( 'header_dropin', array( 'default' => true ) );
		$wp_customize->add_control( 'header_dropin',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Enable Drop-in Header',
		        'section' => 'krative_settings',
		        'priority' => 3,
		    )
		);
		
		
		// SUB HEADER
		$wp_customize->add_setting( 'page_subheader', array( 'default' => true ) );
		$wp_customize->add_control( 'page_subheader',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Enable Page Sub Header',
		        'section' => 'krative_settings',
		        'priority' => 4,
		    )
		);
	
		// FOOTER WIDGET AREA
		$wp_customize->add_setting( 'footer_widget_area', array( 'default' => 'none' ) );
		$wp_customize->add_control( 'footer_widget_area',
		    array(
		        'type' => 'select',
		        'label' => 'Page Template Global Footer Widget Area',
		        'section' => 'krative_settings',
		        'choices' => array(
		        	'none' => 'None',
		            'home_section_1' => 'Home Section One',
		            'home_section_2' => 'Home Section Two',
		            'home_section_3' => 'Home Section Three',
		            'home_section_4' => 'Home Section Four',
		            'home_section_5' => 'Home Section Five',
		        ),
		    )
		);
		
		
/*--------------------------------------------------------------------*/                						
/*  HOME TEMPLATE SECTION			                							
/*--------------------------------------------------------------------*/		
$wp_customize->add_section(
    'home_settings',
    array(
        'title' => 'Home Template',
        'description' => 'This is a home section.',
        'priority' => 37,
    )
);
		
		// 1 SLIDER RANDOMIZER
		$wp_customize->add_setting( 'hero_slider_rando' );
		$wp_customize->add_control( 'hero_slider_rando',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Randomize Slides',
		        'section' => 'home_settings',
		        'priority' => 1,
		    )
		);
		
		// 2 HIDE SLIDER NAVIGATION
		$wp_customize->add_setting( 'hero_slider_nav' );
		$wp_customize->add_control( 'hero_slider_nav',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Hide Slider Navigation Arrows',
		        'section' => 'home_settings',
		        'priority' => 2,
		    )
		);
		
		// 3 HIDE EDIT LINK
		$wp_customize->add_setting( 'hide_slide_edit_btn' );
		$wp_customize->add_control( 'hide_slide_edit_btn',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Hide Slide Admin Edit Link',
		        'section' => 'home_settings',
		        'priority' => 3,
		    )
		);
		
		// 4 SLIDESHOW SPEED
		$wp_customize->add_setting( 'hero_slider_speed' );
		$wp_customize->add_control( 'hero_slider_speed',
		    array(
		        'label' => 'Hero Slideshow Rotation Speed',
		        'section' => 'home_settings',
		        'type' => 'text',
		        'priority' => 4,
		    )
		);
		
		// 5 ANIMATION SPEED
		$wp_customize->add_setting( 'hero_animation_speed' );
		$wp_customize->add_control( 'hero_animation_speed',
		    array(
		        'label' => 'Hero Animation Speed',
		        'section' => 'home_settings',
		        'type' => 'text',
		        'priority' => 5,
		    )
		);
		
		// 6 SLIDER HEIGHT
		$wp_customize->add_setting( 'hero_slider_height' );
		$wp_customize->add_control( 'hero_slider_height',
		    array(
		        'label' => 'Hero Slider Height Override',
		        'section' => 'home_settings',
		        'type' => 'text',
		        'priority' => 6,
		    )
		);
		
		// 6 SLIDER HEIGHT
		$wp_customize->add_setting( 'hero_slider_loading_height', array( 'default' => '800px' ) );
		$wp_customize->add_control( 'hero_slider_loading_height',
		    array(
		        'label' => 'Hero Loading Container Height',
		        'section' => 'home_settings',
		        'type' => 'text',
		        'priority' => 7,
		    )
		);
		
		// 7 SLIDER ANIMATION
		$wp_customize->add_setting( 'hero_slider_animation',
		    array( 'default' => 'Slide', )
			);
		 
		$wp_customize->add_control(
		    'hero_slider_animation',
		    array(
		        'type' => 'select',
		        'label' => 'Hero Slider Animation',
		        'section' => 'home_settings',
		        'choices' => array(
		        	'slide' => 'Slide',
		            'fade' => 'Fade In',
		        ),
		       
		    )
		);
		

/*--------------------------------------------------------------------*/                						
/*  CONTACT TEMPLATE SECTION			                							
/*--------------------------------------------------------------------*/		
$wp_customize->add_section(
    'contact_settings',
    array(
        'title' => 'Contact Template',
        'description' => 'This is a contact section.',
        'priority' => 38,
    )
);
			
		// 1 USE DEFAULT CONTACT FORM
		$wp_customize->add_setting( 'bean_contact_form', array( 'default' => true, ) );
		$wp_customize->add_control( 'bean_contact_form',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Use Default Contact Form',
		        'section' => 'contact_settings',
		        'priority' => 1,
		    )
		);
		
		// 2 HIDE REQUIRED ASTERISKS
		$wp_customize->add_setting( 'hide_required', array( 'default' => false, ) );
		$wp_customize->add_control( 'hide_required',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Hide Required Asterisks',
		        'section' => 'contact_settings',
		        'priority' => 2,
		    )
		);
		
		// 3 ADMIN EMAIL
		$wp_customize->add_setting( 'admin_custom_email',array( 'default' => '',));
		$wp_customize->add_control( 'admin_custom_email',
		    array(
		        'label' => 'Contact Form Email',
		        'section' => 'contact_settings',
		        'type' => 'text',
		        'priority' => 4,
		    )
		);
		
		// 4 CONTACT BUTTON TEXT
		$wp_customize->add_setting('contact_button_text',array( 'default' => 'Send Message',));
		$wp_customize->add_control('contact_button_text',
		    array(
		        'label' => 'Contact Button Text',
		        'section' => 'contact_settings',
		        'type' => 'text',
		        'priority' => 5,
		    )
		);
		
		// 5 USE DEFAULT CONTACT FORM
		$wp_customize->add_setting( 'grayscale_map', array( 'default' => true, ) );
		$wp_customize->add_control( 'grayscale_map',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Grayscale Map (Supported Browsers)',
		        'section' => 'contact_settings',
		        'priority' => 100,
		    )
		);
		
		// 1 UPLOAD LOGIN LOGO	
		$wp_customize->add_setting( 'contact_hero' );
		$wp_customize->add_control(
		    new WP_Customize_Image_Control( $wp_customize, 'contact_hero',
		        array(
		            'label' => 'Upload Hero Image (Instead of a Map)',
		            'section' => 'contact_settings',
		            'settings' => 'contact_hero',
		            'priority' => 200,
		        )
		    )
		);	
		
		
/*--------------------------------------------------------------------*/                						
/*  PORTFOLIO SETTINGS SECTION			                							
/*--------------------------------------------------------------------*/		
$wp_customize->add_section(
    'portfolio_settings',
    array(
        'title' => 'Portfolio',
        'description' => 'This is a portfolio section.',
        'priority' => 39,
    )
);
	// PORTFOLIO GLOBAL WIDGET AREA
	$wp_customize->add_setting( 'footer_widget_area_portfolio', array( 'default' => true, ) );
	$wp_customize->add_control( 'footer_widget_area_portfolio',
	    array(
	        'type' => 'checkbox',
	        'label' => 'Display Global Widget Area',
	        'section' => 'portfolio_settings',
	        'priority' => 1,
	    )
	);
	
	// SHOW RELATED PORTFOLIO POSTS
	$wp_customize->add_setting( 'show_related_portfolio_posts', array( 'default' => true, ) );
	$wp_customize->add_control( 'show_related_portfolio_posts',
	    array(
	        'type' => 'checkbox',
	        'label' => 'Display Related Portfolio Posts',
	        'section' => 'portfolio_settings',
	        'priority' => 2,
	    )
	);
	
	// FILTER TEXT
	$wp_customize->add_setting(
	    'portfolio_filter_title',
	    array(
	        'default' => 'Filter:',
	    )
	);
	$wp_customize->add_control(
	    'portfolio_filter_title',
	    array(
	        'label' => 'Filter Template Heading',
	        'section' => 'portfolio_settings',
	        'type' => 'text',
	        'priority' => 4,
	    )
	);

	// CUSTOMIZE RELATED PORTFOLIO TITLE
	$wp_customize->add_setting( 'related_portfolio_title', array( 'default' => 'Some Related Work', ) );
	$wp_customize->add_control( 'related_portfolio_title',
	    array(
	        'label' => 'Related Title',
	        'section' => 'portfolio_settings',
	        'type' => 'text',
	        'priority' => 5,
	    )
	);
	
// 4 CSS FILTER TYPE
	$wp_customize->add_setting( 'portfolio_css_filter',
	    array( 'default' => 'none' )
	);
	 
	$wp_customize->add_control(
	    'portfolio_css_filter',
	    array(
	        'type' => 'select',
	        'label' => 'CSS3 Filter (Supported Browsers Only)',
	        'section' => 'portfolio_settings',
	        'priority' => 7,
	        'choices' => array(
	        	'none' => 'None',
	            'grayscale' => 'Black & White',
	            'sepia' => 'Sepia Tone',
	            'saturation' => 'High Saturation',
	        ),
	    )
	);
	
// Pull all the pages into an array
$options_pages = array();  
$options_pages_obj = get_pages('sort_column=post_parent,menu_order');
$options_pages[''] = 'Select your Main Portfolio Page:';
foreach ($options_pages_obj as $page) {
	$options_pages[$page->ID] = $page->post_title;
}

//Portfolio Page Link
$wp_customize->add_setting('portfolio_page_selector');

$wp_customize->add_control( 'portfolio_page_selector', array(
    'settings' => 'portfolio_page_selector',
    'label'   => 'Portfolio Page (for Breadcrumbs)',
    'section' => 'portfolio_settings',
    'type'    => 'select',
    'choices' => $options_pages,
    'priority' => 8,
));



/*--------------------------------------------------------------------*/         	
/*  BLOG POSTS SECTION			                							
/*--------------------------------------------------------------------*/		
	$wp_customize->add_section(
	    'blog_settings',
	    array(
	        'title' => 'Blog',
	        'description' => 'This is a blog post section.',
	        'priority' =>40,
	    )
	);
	
// TAGS
	$wp_customize->add_setting( 'show_tags', array( 'default' => false, ) );
	$wp_customize->add_control(
	    'show_tags',
	    array(
	        'type' => 'checkbox',
	        'label' => 'Display Single Post Tags',
	        'section' => 'blog_settings',
	         'priority' => 1,
	    )
	);

// ABOUT THE AUTHOR
	$wp_customize->add_setting( 'about_the_author', array( 'default' => true, ) );
	$wp_customize->add_control(
	    'about_the_author',
	    array(
	        'type' => 'checkbox',
	        'label' => 'Display About the Author',
	        'section' => 'blog_settings',
	         'priority' => 1,
	    )
	);


// SHOW SOCIAL SHARING
	$wp_customize->add_setting( 'show_social_sharing', array( 'default' => true, ) );
	$wp_customize->add_control('show_social_sharing',
	    array(
	        'type' => 'checkbox',
	        'label' => 'Display Single Post Social Sharing',
	        'section' => 'blog_settings',
	         'priority' => 2,
	    )
	);
	
// TWITTER SHARE
	$wp_customize->add_setting(
	    'share_twitter',
	    array(
	        'default' => 'ThemeBeans',
	    )
	);
	$wp_customize->add_control(
	    'share_twitter',
	    array(
	        'label' => 'Twitter Username',
	        'section' => 'blog_settings',
	        'type' => 'text',
	        'priority' => 3,
	    )
	);
	



/*--------------------------------------------------------------------*/         	
/*  404 PAGE SECTION			                							
/*--------------------------------------------------------------------*/		
	$wp_customize->add_section(
	    '404_settings',
	    array(
	        'title' => '404 & Coming Soon Pages',
	        'description' => 'This is a 404 section.',
	        'priority' => 200,
	    )
	);
	
	// 404 PARAGRAPH
	$wp_customize->add_setting(
	    'error_text',
	    array(
	        'default' => '404 Error. Well now this stinks.',
	    )
	);
	$wp_customize->add_control(
	    'error_text',
	    array(
	        'label' => '404 Text',
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 1,
	    )
	);

	// YEAR
	$wp_customize->add_setting( 'comingsoon_year',array( 'default' => '2016',));
	$wp_customize->add_control( 'comingsoon_year',
	    array(
	        'label' => 'Year (ex: 2014)',
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 2,
	    )
	);
	
	// MONTH
	$wp_customize->add_setting( 'comingsoon_month',array( 'default' => '01',));
	$wp_customize->add_control( 'comingsoon_month',
	    array(
	        'label' => 'Month (ex: 01 for JAN)',
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 3,
	    )
	);
	
	// DAY
	$wp_customize->add_setting( 'comingsoon_day',array( 'default' => '01',));
	$wp_customize->add_control( 'comingsoon_day',
	    array(
	        'label' => 'Day (ex: 01)',
	        'section' => '404_settings',
	        'type' => 'text',
	        'priority' => 4,
	    )
	);	
	
	// ANIMATE COMING SOON BG
		$wp_customize->add_setting( 'animate_comingsoon', array( 'default' => false, ) );
		$wp_customize->add_control('animate_comingsoon',
		    array(
		        'type' => 'checkbox',
		        'label' => 'Animate Coming Soon Background',
		        'section' => '404_settings',
		         'priority' => 10,
		    )
		);
			
			
	}



/*--------------------------------------------------------------------*/                						
/*  CUSTOM CSS SECTION			                							
/*--------------------------------------------------------------------*/		
	$wp_customize->add_section(
	    'custom_css',
	    array(
	        'title' => 'Custom CSS',
	        'description' => 'This is a portfolio section.',
	        'priority' => 300,
	    )
	);
	
	
// CUSTOM CSS
class Custom_CSS_Control extends WP_Customize_Control {
    public $type = 'custom_css';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="7" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}

$wp_customize->add_setting( 'custom_css' );
$wp_customize->add_control(
    new Custom_CSS_Control( $wp_customize, 'custom_css',
        array(
            'label' => 'Enter Custom CSS',
            'section' => 'custom_css',
            'settings' => 'custom_css'
        )
    )
);

	
// GOOGLE ANALYTICS TEXTAREA
class Google_Analytics_Control extends WP_Customize_Control {
    public $type = 'google_analytics';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="7" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}

$wp_customize->add_setting( 'google_analytics' );
$wp_customize->add_control(
    new Google_Analytics_Control(
        $wp_customize, 'google_analytics',
        array(
            'label' => 'Google Analytics Script',
            'section' => 'general_settings',
            'settings' => 'google_analytics',
            'priority' => 10,
        )
    )
);

// GOOGLE MAPS EMBED TEXTAREA
class Google_Maps_Control extends WP_Customize_Control {
    public $type = 'google_analytics';
 
    public function render_content() {
        ?>
            <label>
                <span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
                <textarea rows="5" style="width:100%;" <?php $this->link(); ?>><?php echo esc_textarea( $this->value() ); ?></textarea>
            </label>
        <?php
    }
}

$wp_customize->add_setting( 'google_maps' );
$wp_customize->add_control(
    new Google_Maps_Control( $wp_customize, 'google_maps',
        array(
            'label' => 'Google Maps iFrame Embed',
            'section' => 'contact_settings',
            'settings' => 'google_maps'
        )
    )
);

}
add_action( 'customize_register', 'Bean_Customize_Register' );