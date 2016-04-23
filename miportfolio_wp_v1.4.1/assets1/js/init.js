/** *************Init JS*********************
	
    TABLE OF CONTENTS
	---------------------------
	1. Ready Function
	2. Preloader
	3. Auto height for landing page
	4. Smooth Scroll
	5. Placeholder for ie9
	6. Contact Form
	7. Miportfolio function includes initialization code for
	   a) Carousel slider
	   b) Vimeo Video
	   c) Flex slider
	   d) Nice Scroll
	   e) 3d gallery
	   f) Animation

/*************************************/

"use strict";

/***********************************/
/*Ready function*/
/**********************************/
$(document).ready(function(){

  miportfolio();

});
/*************************************/
/* Preloader Js */
/**************************************/
 jQuery(window).load(function() {
	jQuery("#preloader").delay(1000).fadeOut("slow");
	$('body').addClass('stop-scrolling'); 
	setTimeout(function(){ $('.header-hide').css('opacity','1') }, 1100);
	setTimeout(function(){ $('body').removeClass('stop-scrolling') }, 1800);
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
	main_menu();
}).resize();

/***********************************/
/*Main menu*/
/**********************************/
main_menu();
function main_menu(){
	var li_count = $('nav ul li').length;
	var win_widht = $(window).width();
	var win_height = $(window).outerHeight();
	
	var li_height = win_height/li_count;
	var li_width = win_widht/li_count;
	
	if (win_widht >= 1024 && li_count != 5){
		$('nav ul li').css({'height' : li_height, 'width' : 'inherit'});
	} else if (win_widht <= 1024 && li_count != 5){
		$('nav ul li').css({'width' : li_width, 'height' : 'inherit'});
	}
}

/***********************************/
/*SmoothScroll*/
/**********************************/
var delay = (function(){
    var timer = 0;
    return function(callback, ms){
        clearTimeout (timer);
        timer = setTimeout(callback, ms);
    };
})();

$(function() {

    var pause = 100;
    // will only process code within delay(function() { ... }) every 100ms.

    $(window).resize(function() {
        delay(function() {
            var width = $(window).width();
            if( width >= 1024 ) {
				offset_0();
            }  
			else {
				offset_height();
            }
        }, pause );
    });

    $(window).resize();
});


function offset_0(){

smoothScroll.init({
		speed: 1000,
		easing: 'easeInOutCubic',
		offset: 0,
		updateURL: false,
		callbackBefore: function ( toggle, anchor ) {},
		callbackAfter: function ( toggle, anchor ) {},
	});
}

function offset_height(){
var height=$("header").height();
smoothScroll.init({
		speed: 1000,
		easing: 'easeInOutCubic',
		offset: height,
		updateURL: false,
		callbackBefore: function ( toggle, anchor ) {},
		callbackAfter: function ( toggle, anchor ) {},
	});
}

/***********************************/
/*Placeholder Js */
/**********************************/

$('input, textarea').placeholder();

/***********************************/
/*Page scroll/open */
/**********************************/
var post_id = '';
$('nav a').click(function(){
	var scroll_element = $(this).attr('href');
	post_id = $(this).attr('data-id');
	
	$('html').css({'position' : 'relative'});
	$('.slide_page').removeClass('act');
	
	if ( $('#'+post_id).hasClass('slide_page') ){
		$('#'+post_id).addClass('act');
		$('html, body').animate({
			scrollTop: 0
		}, 800, function(){$('html').css({'position' : 'fixed'});});
	} else {
		$('html, body').animate({
			scrollTop: $(scroll_element).offset().top
		}, 800);
	}
});

$('.slide_page .close').click(function(){
	$(this).closest('.slide_page').removeClass('act');
	$('html').css({'position' : 'relative'});
});

/*************************/
/* Contact Form */
/*************************/
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

/*************************************/	
/* Flex Gallery */
/*************************************/
function initFlexModal() {
	$('.flexslider').flexslider({
	animation: "slide",
	directionNav:false,
	start: function(slider){
	  $('body').removeClass('loading');
	}
	});
	
}

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
	
function miportfolio(){

	$('body').css('overflow','auto');
	$('body').css('height','auto');
	$('body a').click(function(){
		
		var $body_class = $('body');
		if ( $body_class.hasClass('single') || $body_class.hasClass('error404') ) {
			if($(this).attr('target')=='' || $(this).attr('target')== undefined){
				window.location = $(this).attr('href');
				return false;
			}
		}

	});
	$('#wpadminbar a').attr('target', '_self');

	
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
	/********Vimeo Video*****************/
	$('.video-load-click').click(function(){
		$(this).closest('.portfolio-wrap').find('.vbox-video-content').addClass('active');
	});	
	
	/*******Flex Gallery***************/
	$('.load-flex-slider').click(function(){
		var modal_flex_open = $(this).closest('.portfolio-wrap').find('.myLargeModal');
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

	/** Nice Scroll **/

	 $("html").niceScroll();
	 $("#image_info").niceScroll({cursorcolor:"#c8bd9f"});
	 $(".modal-body").niceScroll({cursorcolor:"#c8bd9f"});
	 $(".slide_page .about-content").niceScroll({cursorcolor:"#c8bd9f"});
	 
	/** Grid image gallery **/  
	new CBPGridGallery( document.getElementById( 'grid-gallery' ) );

	/** Animate init **/
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
		panel();
}
function panel(){

	$('.show-panel').click(function () {
    $('.panel').slideToggle(500);
});
}	
