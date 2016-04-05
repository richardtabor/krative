<?php
/*--------------------------------------------------------------------*/                						
/*  THEME CUSTOMIZER STYLES	                							
/*--------------------------------------------------------------------*/
if ( !function_exists('Bean_Customize_Variables') ) {
	function Bean_Customize_Variables() {
	
		//VARIABLES
		$body_text_color = get_option('body_text_color');
		$header_color = get_option('header_color');
		$theme_accent_color = get_option('theme_accent_color');
		$secondary_theme_accent_color = get_option('secondary_theme_accent_color');
		$post_thumb_bg_color = get_option('post_thumb_bg_color');
		$hero_slider_height = get_theme_mod('hero_slider_height');
		$hero_slider_loading_height = get_theme_mod('hero_slider_loading_height');
		$contact_hero_img = get_theme_mod('contact_hero'); 
		$menu_padding = get_theme_mod('menu_padding');
		$dynammic_sidebar = get_theme_mod( 'footer_widget_area' );
		$css_filter_style = get_theme_mod( 'portfolio_css_filter' ); 
		$footer_widget_area_portfolio = get_theme_mod( 'footer_widget_area_portfolio' ); 
		$animate_comingsoon = get_theme_mod( 'animate_comingsoon' );
	
		//SET DEFAULTS
		if( !$body_text_color ) { $body_text_color = '#818B92;'; }
		if( !$theme_accent_color ) { $theme_accent_color = '#FF6454;'; }
		if( !$secondary_theme_accent_color ) { $secondary_theme_accent_color = '#1FB4DA'; $header_color = '#1FB4DA'; } 
		?>		
		
		
<style>
a { color:  <?php echo $theme_accent_color; ?>; }
body, p, .archives-list ul li a:hover { color:  <?php echo $body_text_color; ?>; }
.home-slide { height:  <?php echo $hero_slider_height; ?>; }
.loading { min-height:  <?php echo $hero_slider_loading_height; ?>!important; }

.bean-shot,
.post-thumb,
.portfolio-thumb,
.flickr_badge_image a,
.instagram_badge_image,
.bean500px_badge_image,
.widget_bean_recent_posts .post-thumb,
.widget_bean_recent_portfolio .post-thumb {
	background-color: <?php echo $post_thumb_bg_color; ?>!important;
}

.cats,
a:hover,
blockquote,
.entry-content p a,
.widget li a:hover,
.entry-meta a:hover,
.logged-in-as a:hover,
.comment-meta a:hover,
.comment-author a:hover,
.widget_bean_tweets li a:hover,
#footer-container a:hover,
.comment-meta .author-tag a,
.entry-content blockquote p,
.portfolio-meta-list a:hover,
.archives-list ul li a,
.team-member-meta a.team-twitter-profile:hover,
.isotope-item  .portfolio-cats a:hover,
.bean-tabs > li.active > a,
.widget.widget_bean_recent_posts li span.meta a:hover { 
	color:<?php echo $theme_accent_color; ?> 
}

.btn, 
.button, 
.tagcloud a,
button.button, 
div.jp-play-bar,
.pagination a:hover,		       
.btn[type="submit"],
input[type="button"], 
input[type="reset"], 
input[type="submit"],
.button[type="submit"],
div.jp-volume-bar-value,
.format-link .link-wrapper:hover,
.widget_bean_cta .button.cta.attention,
.widget_bean_recent_posts .post-thumb:hover .format-icon {
	background-color: <?php echo $theme_accent_color ?>; 
}		

.featurearea_icon .icon {
	background-color: <?php echo $theme_accent_color ?>!important;
	}
	
.btn:hover, 
li.skill-bar, 
.button:hover, 
.tagcloud a:hover,
.testimonial-style,
button.button:hover,
.btn[type="submit"]:hover,
input[type="reset"]:hover,
section.post.format-quote,
input[type="submit"]:hover,
input[type="button"]:hover, 
.format-link .link-wrapper,
.button[type="submit"]:hover,
.widget_bean_cta .button.cta,
.page-template-page-comingsoon-php,
.page-template-page-comingsoon-php #primary-container,
.form-submit input[type="submit"]:hover { 
	background-color: <?php echo $secondary_theme_accent_color ?>; 
	} 	

.comment-meta .author-tag a:hover,
.widget_bean_tweets li span a { color:<?php echo $secondary_theme_accent_color; ?> }		
	
.bean-quote { background-color: <?php echo $theme_accent_color; ?>!important; }


<?php 
//IF ACCENT COLORS FOR COMING SOON 
if( $animate_comingsoon != ''  ) { ?>  
	@-webkit-keyframes ComingSoonPulse { 
		0%   { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		50%  { background-color: <?php echo $theme_accent_color; ?>; } 
		75%  { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		100% { background-color: <?php echo $theme_accent_color; ?>; } 
		} 
	@-moz-keyframes ComingSoonPulse {
		0%   { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		50%  { background-color: <?php echo $theme_accent_color; ?>; } 
		75%  { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		100% { background-color: <?php echo $theme_accent_color; ?>; }
		}
	@-ms-keyframes ComingSoonPulse {
		0%   { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		50%  { background-color: <?php echo $theme_accent_color; ?>; } 
		75%  { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		100% { background-color: <?php echo $theme_accent_color; ?>; }
		}
	@-o-keyframes ComingSoonPulse {
		0%   { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		50%  { background-color: <?php echo $theme_accent_color; ?>; } 
		75%  { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		100% { background-color: <?php echo $theme_accent_color; ?>; }
		}
	@keyframes ComingSoonPulse {
		0%   { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		50%  { background-color: <?php echo $theme_accent_color; ?>; } 
		75%  { background-color: <?php echo $secondary_theme_accent_color; ?>; } 
		100% { background-color: <?php echo $theme_accent_color; ?>; }
		}   
<?php }
	
//IF HEADER COLOR 
if( $header_color != '' ) { ?>  
	#header-container, #header-dropin { background-color: <?php echo $header_color; ?>; }
<?php }

//IF HIDDEN SIDEBAR IS NOT SELECTED
if( get_theme_mod( 'hidden_sidebar' ) == false) { ?>
	#header-container .main-menu { padding-right: 0px!important; }
<?php }

//IF MENU PADDING 
if( $menu_padding != '' ) { ?>  
	#header-container .main-menu { padding-right: <?php echo get_theme_mod( 'menu_padding' )?>!important; }
<?php }

//IF SLIDER PLUGIN NOT ACTIVE, APPLY THESE STYLES TO HOME
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); if (!is_plugin_active('bean-slider/bean-slider.php')) { ?>
	.page-template-page-home-php #header-container {background-color: <?php echo $secondary_theme_accent_color ?>!important;position: relative!important; }
<?php }
	
//IF CONTACT IMAGE 
if( $footer_widget_area_portfolio == false ) { ?>  
	.page-template-page-portfolio-3col-filter-php #footer-container,
	.page-template-page-portfolio-2col-filter-php #footer-container,
	.page-template-page-portfolio-3col-php #footer-container,
	.page-template-page-portfolio-2col-php #footer-container { background-color: #F5F5F6!important; }
<?php }
	
//CSS FOR PORTFOLIO RELATED POSTS
if( get_theme_mod( 'show_related_portfolio_posts' ) == false) { ?>
	.single-portfolio #footer-container { background-color: #F5F5F6!important; }
<?php }

//CSS FOR GRAYSCALE MAP
if( get_theme_mod( 'grayscale_map' ) == true) { ?>
	#map-container iframe { -webkit-filter: grayscale(1); }
<?php }

//IF CONTACT IMAGE 
if( $contact_hero_img != '' ) { ?>  
	#map-container { background-image: url(<?php echo get_theme_mod( 'contact_hero' )?>); background-size: cover; }
<?php }

//PORTFOLIO FILTERS
if( $css_filter_style != '' ) {
    switch ( $css_filter_style ) {
        case 'none':
            // DO NOTHING
            break;
        case 'grayscale':
            echo '.isotope-item img, .post-thumb img, .entry-content-media img { -webkit-filter: grayscale(100%); }';
            break;
        case 'sepia':
        	echo '.isotope-item img, .post-thumb img, .entry-content-media img { -webkit-filter: sepia(100%); }';
            break;
         case 'saturation':
         	echo '.isotope-item img, .post-thumb img, .entry-content-media img { -webkit-filter: saturate(200%); }';
            break;      
    }
}

if( $show_related_portfolio_posts == true ) { ?>  
	.single-portfolio #footer-container { background-color: #FFF!important; }
<?php }


//FOOTER CONTAINER
if( $dynammic_sidebar != 'none' && !is_page_template('page-home.php') ) { ?>
	#footer-container { background-color: #FFF!important } 
	@media only screen and (max-width : 767px) { 
		#footer-container ul li a { background-color: #F5F5F6!important }
		#footer-container ul li a:hover { background-color: #FFF!important } 
	} 
<?php }

if( !$dynammic_sidebar ) { ?> #footer-container {background-color: #F5F5F6!important } 
<?php }

// STYLES FOR THE BEAN PRICING TABLE PLUGIN, IF ACTIVATED
include_once( ABSPATH . 'wp-admin/includes/plugin.php' ); if (is_plugin_active('bean-pricingtables/bean-pricingtables.php')) { ?>
	.bean-pricing-table .table-mast { background-color: <?php echo $secondary_theme_accent_color; ?>!important; }
	.bean-pricing-table .table-mast:hover { background-color: <?php echo $theme_accent_color; ?>!important; }
	.bean-pricing-table .pricing-column li span { color:<?php echo $theme_accent_color; ?>!important; }
	#powerTip, .bean-pricing-table .pricing-highlighted { background-color:<?php echo $theme_accent_color; ?>!important; }
	#powerTip:after { border-color:<?php echo $theme_accent_color; ?> transparent !important; }
<?php } // END is_plugin_active

//CSS FOR CUSTOM CSS
echo get_theme_mod( 'custom_css', '' ); ?>

</style>	

<?php } add_action( 'wp_head', 'Bean_Customize_Variables', 1 );
}