/** *************Init JS*********************
	
    TABLE OF CONTENTS
	---------------------------
	1. Preloader Js
	2. Auto height for landing page
	3. Ready function
       a) Vimeo Video
	   b) Flex slider
	   c) Nice Scroll
	   d) Supersized Slider
	   e) Landing Slider
	4. Smooth Scroll
	5. Contact Us JS*/


"use strict";
/*************************************/
/* Preloader Js */
/**************************************/

	jQuery(window).load(function() {
		jQuery("#preloader").delay(1000).fadeOut("slow");
		$('body').addClass('stop-scrolling'); 
		setTimeout(function(){ $('.header-hide').css('opacity','1') }, 1100);
		setTimeout(function(){ $('body').removeClass('stop-scrolling') }, 1800);
	});
	$(document).ready(function() {
		$('body').css('overflow','auto');
		$('body').css('height','auto');
	});

/***********************************/
/*Auto height function*/
/**********************************/
var setElementHeight = function () {
    var height = $(window).height();
    $('.autoheight').css('min-height', (height));
	
};

$(window).on("resize", function () {
    setElementHeight();
}).resize();
/***********************************/
/*Ready function*/
/**********************************/
$(document).ready(function(){

/********Menu style 4*****************/		
$('#trigger_overlay2').click(function(){
	$('.overlay-slidedown').addClass('open');
});

$('.overlay-slidedown .close-cross, .nav-style-4 a').click(function(){
	$('.overlay-slidedown').removeClass('open');
});
$('.nav-style-4 a').click(function(){
	var scroll_element = $(this).attr('href');
	$('html, body').animate({
		scrollTop: $(scroll_element).offset().top
	}, 800);
	
});

/********Multipage*****************/
if ($('.multipage3').length && $('.header.header-hide').length){
	$('.multipage3').css({'padding-top' : $('.header.header-hide').height()+40});
} else if ($('.multipage3').length && $('#header-sticky-wrapper').length){
	$('.multipage3').css({'padding-top' : $('#header-sticky-wrapper').height()+40});
}

/********Inner page click*****************/	
	$('body a').click(function(){
		
		var $body_class = $('body');
		if ( $body_class.hasClass('single') || $body_class.hasClass('error404') || $body_class.hasClass('st-multipage') ) {
			if($(this).attr('target')=='' || $(this).attr('target')== undefined){
				window.location = $(this).attr('href');
				return false;
			}
		}

	});

	$('#wpadminbar a').attr('target', '_self');


/********Video autoplay*****************/	
	$( '.video-wrap' ).each(function() {
		var video_id = $(this).attr('id');
		var video = document.getElementById(video_id);
			video.play();
	});

	$("#small_menu").click(function(){
	       $('header').removeClass("ha-header-box");
	});
	$("#wrapper").click(function(){
	       $('header').removeClass("ha-header-box");
	});
	$(".trigger-overlay").click(function(){
	       $('header').addClass("header-move");
	});
	$(".overlay-close").click(function(){
	       $('header').removeClass("header-move");
	});
  
/********Vimeo Video*****************/
	$('.video-load-click').click(function(){
		$(this).closest('.wpb_wrapper').find('.vbox-video-content').addClass('active');
	});

/********Venobox*****************/
  $('.venobox').venobox({
				numeratio: true,
				infinigall: true,
				border: '20px'
			});
			$('.venoboxvid').venobox({
				bgcolor: '#000'
			});
			$('.venoboxframe').venobox({
				border: '6px'
			});
			$('.venoboxinline').venobox({
				framewidth: '300px',
				frameheight: '250px',
				border: '6px',
				bgcolor: '#f46f00'
			});
			$('.venoboxajax').venobox({
				border: '30px;',
				frameheight: '220px'
			});	
/*******Flex Gallery***************/
	$('.load-flex-slider').click(function(){
		var modal_flex_open = $(this).closest('.wpb_wrapper').find('.myLargeModal');
		modal_flex_open.show('fast', function(){
			modal_flex_open.addClass('in');
	
			$(this).find(".owl-carousel-flex").owlCarousel({
				items:1,
				center: true,
				loop:true
			});
	
		});
	});
	
	$('.close-flex-slider').click(function(){
		$('.myLargeModal').removeClass('in');
		setTimeout(function(){ 
			$('.myLargeModal').hide('fast');
		}, 900);
	});

/******* Gallery Sliders *******/
	if ($(".full-screen-slider").length){
		setTimeout(function(){ 
		$(".full-screen-slider").owlCarousel({
			items:1,
			center: true,
			loop:true,
			nav:true,
			navText: ["<a class='load-item fa fa-chevron-left fa-2x ui-link'></a>","<a class='load-item fa fa-chevron-right fa-2x ui-link'></a>"],
			dotsEach: true,
		});
		}, 800);
	}
	
	
/******* Background Sliders *******/
	if ($(".bg-slider").length){
		setTimeout(function(){ 
		$(".bg-slider").owlCarousel({
			items:1,
			center: true,
			loop:true,
			nav:false,
			dotsEach: false,
		});
		}, 800);
		

		$('.customNextBtn').click(function() {
			var owl = $(this).closest('.slider-bg-wrap').find($('.bg-slider'));
			owl.trigger('next.owl.carousel', [300]);
		})
		$('.customPrevBtn').click(function() {
			var owl = $(this).closest('.slider-bg-wrap').find($('.bg-slider'));
			owl.trigger('prev.owl.carousel', [300]);
		})
		
	}
	
/******* Grid image gallery******/  
	if ($('.grid-gallery').length){
		$('.grid-gallery').each(function(){
			grid_gallery_id = $(this).attr('id');	
			new CBPGridGallery( document.getElementById( grid_gallery_id ) );	
		});		
	}
	var grid_gallery_id;
	$('.load-grid-gallery').click(function(){
		$('.grid-gallery').eq($('.load-grid-gallery').index(this)).addClass('slideshow-open');
	});

/******* Nice Scroll *******/

	 $("html").niceScroll();
	 $(".modal-body").niceScroll({cursorcolor:"#c8bd9f"});

/******* Animate init *******/
	var wow = new WOW(
	{
		boxClass: 'wow', // animated element css class (default is wow)
		animateClass: 'animated', // animation css class (default is animated)
		offset: 0, // distance to the element when triggering the animation (default is 0)
		mobile: false, // trigger animations on mobile devices (default is true)
		live: true // act on asynchronously loaded content (default is true)
	}
	);
		wow.init();

/*******Landing Slider***************/
 			$("#overlay_slider").swiperight(function() {  
			  $slides.data('superslides').animate('prev');		  
			});  
		   $("#overlay_slider").swipeleft(function() {  
			  $slides.data('superslides').animate('next'); 
		   });  
          $("#intro_text").swiperight(function() {  
			  $slides.data('superslides').animate('prev');		  
			});  
		   $("#intro_text").swipeleft(function() {  
			  $slides.data('superslides').animate('next'); 
		   }); 

/*******Header Effect***************/			
			$(window).scroll(function() {
				var height = $(window).height();
				var scroll = $(window).scrollTop();
				if (scroll>300) {
					$(".header-hide, .sticky-wrapper").addClass("scroll-header");
				} else {
					 $(".header-hide, .sticky-wrapper").removeClass("scroll-header");
				}
			}); 
			if ($('body').hasClass('home')) {
				$('.site-logo, .head-p-name').click(function(){
					$("html, body").animate({scrollTop:0}, '500');
				});
			}
		

/**********Menu Close Logic***************/

$('.navbar-collapse.in').niceScroll({cursorcolor:"#c8bd9f"});
	$('.nav li a').click(function(){
		$('.navbar-collapse.collapse').toggleClass('in');
});		


	$('.show-panel').click(function () {
    $('.panel').slideToggle(500);
});

 }); 

/***********************************/
/*SmoothScroll*/
/**********************************/

	/*var height=$(".navbar ul").height();*/
	var height=$(".navbar.navbar-default").height();
	
	smoothScroll.init({
		speed: 1000,
		easing: 'easeInOutCubic',
		offset: height,
		updateURL: false,
		callbackBefore: function ( toggle, anchor ) {},
		callbackAfter: function ( toggle, anchor ) {},
	});
/***********************************/
/*Placeholder Js */
/**********************************/

$('input, textarea').placeholder();

/*************************************/
/* Contact us */
/**************************************/

/** Contact Us JS **/ 
	$("#submit_btn").click(function() { 
        
		var filter = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        var user_name       = $('input[name=name]').val();  //get input field values*/
        var user_email      = $('input[name=email1]').val();
        var user_message    = $('input[name=message]').val();
        
        //simple validation at client's end
        //we simply change border color to red if empty field using .css()
        var proceed = true;
        
		if(user_name==""){ 
            $('input[name=name]').css('border-bottom','1px solid red'); 
            proceed = false;
        }
		
        if(user_email== ""){ 
            $('input[name=email1]').css('border-bottom','1px solid red'); 
            proceed = false;
		}
		else if(!filter.test(user_email)) {
		   $('input[name=email1]').css('border-bottom','1px solid red'); 
          /*$('#email_error').html("X Please Enter valid email address");*/
		   $('#email_error').show();
             proceed = false;
        }
	
        if(user_message=="") {  
            $('input[name=message]').css('border-bottom','1px solid red'); 
            proceed = false;
        }
		
        if(proceed) //everything looks good! proceed...
        {
            //data to be sent to server
           var post_data = {'userName':user_name, 'userEmail':user_email,  'userMessage':user_message};
            
            //Ajax post data to server
            $.post('contact_me.php', post_data, function(response){  

                //load json data from server and output message     
				if(response.type == 'error')
				{
				var	output = '<div class="error">'+response.text+'</div>';
				}else{
				 var output = '<div class="success">'+response.text+'</div>';
					
					//reset values in all input fields
					$('#contact_form input').val('');
					$('#email_error').hide();
				}
				
				$("#result").hide().html(output).fadeIn(500);
				
            }, 'json');
			
        }
    
    
    //reset previously set border colors and hide all message on .keyup()
    $("#contact_form input").keyup(function() { 
	
        $("#contact_form input").css('border-color',''); 
		$('#email_error').hide();
        $("#result").slideUp();
	});
});