/*--------------------------------------------------------------------*/
/*	DOCUMENT READY FUNCTIONS
/*--------------------------------------------------------------------*/

// IF JS IS ENABLED, REMOVE 'no-js' AND ADD 'js' CLASS
jQuery('html').removeClass('no-js').addClass('js');

jQuery(document).ready(function($) {
	
	/*--------------------------------------------------------------------*/
	/*	IE SIDEBAR TOGGLE SPECIFIC
	/*--------------------------------------------------------------------*/
	var $browserMSIE = $.browser.msie;
	var $browserVersion = parseInt($.browser.version, 10);
	
	if ($browserMSIE && $browserVersion === 8 || $browserMSIE && $browserVersion === 9) {
	$(document).on("click", '.ie .sidebar-btn' , function(){ 
		if ($('#theme-wrapper').hasClass('ie-side-menu')) {
			$('#theme-wrapper').removeClass('ie-side-menu');
		 	$('.hidden-sidebar').css('display','none').css('z-index','-1');
		 	$('.menu-icon').removeClass('close');
		 } else {
		 	$('#theme-wrapper').addClass('ie-side-menu');
		 	$('.hidden-sidebar').css('display','block').css('z-index','99');
		 	$('.menu-icon').addClass('close');
		} 
	 });
	} else {}
	//IE CLOSE 
	$(document).on("click", '.ie .close-btn' , function(){ 
		$('#theme-wrapper').removeClass('ie-side-menu');
		$('.hidden-sidebar').css('display','none').css('z-index','-1');
	});
	//END IE 
	
	jQuery('#windowTitleDialog').bind('show', function () { document.getElementById ("xlInput").value = document.title; });
		
	// FITVID
	jQuery("body").fitVids();
	
	//AUTOHEIGHT TEXTAREA
	jQuery('textarea.auto-height').flexText();
	  
  	//FORM VALIDATION
	if (jQuery().validate) { jQuery("#commentform").validate(); } 
	
	//BACK TO TOP
	jQuery().UItoTop({ 
		text: '',
	});
	
	//DROPDOWNS - SUPERFISH
	$('#primary-nav > ul, #dropin-nav')
		.superfish({
			delay: 300,
			animation: {opacity:'show', height:'show'},
			speed: 'fast',
			disableHI: true,
			cssArrows: false,
	});
	
	//HEADER DROP IN
	$(window).scroll(function(){
		var h = $('body').height();
		var y = $(window).scrollTop();
		if( y > (h*.15) && y < (h*.85) ){
			$("#header-dropin").fadeIn("fast");
		} else {
			$('#header-dropin').fadeOut('fast');
		}
	});
	          
	//ISOTOPE MAIN
	var $container = $('#isotope-container');
		$container.imagesLoaded( function(){
		$container.isotope({
		 itemSelector: '.isotope-item',
		 layoutMode : 'fitRows',
	 	 resizesContainer: true
	});

	//ISOTOPE FILTER
    $(function(){
        var $container = $('#isotope-container');
            optionFilter = jQuery('#filter'),
            optionFilterLinks = optionFilter.find('a');
        
        optionFilterLinks.attr('href', '#');
        
        optionFilterLinks.click(function(){
            var selector = jQuery(this).attr('data-filter');
           $container.imagesLoaded( function(){ 
            $container.isotope({ 
                filter : '.' + selector, 
                itemSelector : '.isotope-item',
                resizesContainer: true,
            });
            	});
            // Highlight the correct filter
            optionFilterLinks.removeClass('active');
            jQuery(this).addClass('active');
            return false;
        });
    });

	//ISOTOPE INFINITE SCROLLING   
	$(function(){
	  $container.infinitescroll({
	        navSelector  : '#page_nav',    
	        nextSelector : '#page_nav a',  
	        itemSelector : '.isotope-item',
	        loading: {
	            finishedMsg: 'Done Loading',
	            img: ' '
	          }
	        },
	        
	        function( newElements ) {
	          var $newElems = $( newElements ).css({ opacity: 0 });
	          $newElems.imagesLoaded(function(){
	            $newElems.animate({ opacity: 1 });
	            $container.isotope( 'appended', $newElems, true ); 
	          });
	        }
	      );
	  });
	  
	  
  	/*--------------------------------------------------------------------*/
  	/*	BEAN LIKES
  	/*--------------------------------------------------------------------*/	
	//ANIMATION CLICK TRIGGER
	$(".entry-like a:not(.active)").click(function () {
	$('span.bean-like-icon').addClass('animated BeanLikeAnimation');
	});

	function Bean_Reload_Likes(who) {
		var text = jQuery("#" + who).html();
		var patt= /(\d)+/;
	
		var num = patt.exec(text);
		num[0]++;
		text = text.replace(patt,num[0]);
		jQuery("#" + who).html('<span class="count">' + text + '</span>');
	}
	
	function Bean_Likes_Init() {
		jQuery(".bean-likes").click(function() {
			var classes = jQuery(this).attr("class");
			classes = classes.split(" ");
	
			if(classes[1] == "active") {
				return false;
			}
			var classes = jQuery(this).addClass("active");
			var id = jQuery(this).attr("id");
			id = id.split("like-");
			jQuery.ajax({
			  type: "POST",
			  url: "index.php",
			  data: "likepost=" + id[1],
			  success: Bean_Reload_Likes("like-" + id[1])
			}); 
	
	
			return false;
		});
	}
	
	Bean_Likes_Init();
  	
  		
  	/*--------------------------------------------------------------------*/
  	/*	RIGHT SIDEBAR MAIN
  	/*--------------------------------------------------------------------*/
	//CLICK EVENTS
	var ua = navigator.userAgent,
    	clickevent = (ua.match(/iPad/i) || ua.match(/iPhone/i) || ua.match(/Android/i)) ? "touchstart" : "click";
   	    console.log(clickevent);
   	    
	//MENU BUTTON TRIGGER
	$(document).on(clickevent, 'a.sidebar-btn', function(event){
	event.preventDefault();
		if ($('#theme-wrapper').hasClass('side-menu')) {
		  closeMenu();
		} else {
		  openMenu();
		}
	});  
	  
	// MOBILE CLOSE 
	$(document).on(clickevent, '.close-btn', function(event){
	  event.preventDefault();
	  closeMenu();
	});
	 
	//OPEN
	function openMenu(){
	 	$('.hidden-sidebar').css('display','block');
	 	$('.menu-icon').addClass('close');
	 	$('#theme-wrapper').addClass('side-menu');
	 	$('.safari #theme-wrapper').addClass('no-flick');
	 	$('.safari #header-container').addClass('no-flick');
	 	$('.safari #sub-header-container').addClass('no-flick');
	 	$('.hidden-sidebar-inner').addClass('animated BeanSidebarIn').removeClass('BeanSidebarOut');
	 	setTimeout(function(){$('.hidden-sidebar').css('z-index','0');},400);
	}
	
	//CLOSE 
	function closeMenu(){
		$('.hidden-sidebar').css('z-index','-1');
		$('.menu-icon').removeClass('close');
	    $('#theme-wrapper').removeClass('side-menu');
	    $('.hidden-sidebar-inner').removeClass('BeanSidebarIn').addClass('BeanSidebarOut');
	    $('.hidden-sidebar-inner').addClass('animated ');
		setTimeout(function(){ $('.hidden-sidebar').css('z-index','-1'); },400);
	 }
	});
	
	
	/*--------------------------------------------------------------------*/
	/*	WAYPOINTS FUNCTIONS
	/*--------------------------------------------------------------------*/
	
	//WAYPOINTS CLASS
	(function($) {
	    var $window = $(window),
	        $html = $('#theme-wrapper');
	    function resize() {
	        if ($window.width() > 320) {
	            return $html.addClass('waypoints');
	        }
	        $html.removeClass('waypoints');
	    }
	    $window
	        .resize(resize)
	        .trigger('resize');
	})(jQuery);
	
	
	//WAYPOINT RECENT PORTFOLIOS WIDGET
	$('.js .waypoints .widget_bean_recent_portfolio').waypoint(function() {
		$('.js .widget.widget_bean_recent_portfolio').css('opacity','1.0');
		$('.js #portfolio-slider li.slide').addClass('animated BeanSlideFromLeft').css('opacity','1.0');
	}, { offset: '60%' });
	
	
	//WAYPOINT TESTIMONIALS WIDGET
	$('.js .waypoints .widget_bean_testimonials').waypoint(function() {
		$('.js .widget_bean_testimonials .widget-title').addClass('animated BeanFadeIn').css('opacity','1.0');
		$('.js .widget_bean_testimonials .bean-quote-icon.first').addClass('animated BeanFadeFromLeft').css('opacity','1.0');
		$('.js .widget_bean_testimonials .bean-quote-icon.last').addClass('animated BeanFadeFromRight').css('opacity','1.0');
		$('.js .widget_bean_testimonials .post-slider h1').addClass('animated BeanFadeFromTop').css('opacity','1.0');
	}, { offset: 'bottom-in-view' });
	
	
	//WAYPOINT RECENT POSTS WIDGET
	$('.js .waypoints .widget_bean_recent_posts').waypoint(function() {
		$('.js .widget_bean_recent_posts').css('opacity','1.0');
		$('.js .widget_bean_recent_posts li').addClass('animated BeanBounceIn').css('opacity','1.0');
	}, { offset: '50%' });


	//WAYPOINT CALL TO ACTION WIDGET
	$('.js .waypoints .widget_bean_cta').waypoint(function() {
		$('.js .widget_bean_cta .six.columns').addClass('animated BeanBounceFromBottom').css('opacity','1.0');
	}, { offset: 'bottom-in-view' });
	
	
	//WAYPOINT STATS WIDGET
	$('.js .waypoints .widget_bean_stats').waypoint(function() {
		$('.js .widget_bean_stats .three.columns.mobile-two').addClass('animated BeanFlipInX').css('opacity','1.0');
	}, { offset: 'bottom-in-view' });
	
	
	//WAYPOINT FLICKR WIDGET
	$('.js .waypoints .sidebar .widget_bean_flickr').waypoint(function() {
		$('.js .sidebar .flickr_badge_image').addClass('animated BeanFadeIn').css('opacity','1.0');
	}, { offset: 'bottom-in-view' });
	
	
	//WAYPOINT SKILLS WIDGET
	$('.js .waypoints .widget_bean_skills').waypoint(function() {
		$('.js .bean-skillset li.skill-bar').addClass('animated BeanSlideFromRight').css('opacity','1.0');
	}, { offset: 'bottom-in-view' });
	
	
	//WAYPOINT INSTAGRAM
	$('.js .waypoints .sidebar .widget_bean_instagram').waypoint(function() {
		$('.js .sidebar .instagram_badge_image').addClass('animated BeanFadeIn').css('opacity','1.0');
	}, { offset: 'bottom-in-view' });
	
	
	//WAYPOINT DRIBBBLE
	$('.js .waypoints .sidebar .widget_bean-dribbble').waypoint(function() {
		$('.js .sidebar .bean-shot').addClass('animated BeanFadeIn').css('opacity','1.0');
	}, { offset: 'bottom-in-view' });
});