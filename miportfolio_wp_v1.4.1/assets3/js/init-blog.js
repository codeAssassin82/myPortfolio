/** *************Init Blog JS*********************/

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



/******* Nice Scroll *******/

	 $("html").niceScroll();
	 $(".modal-body").niceScroll({cursorcolor:"#c8bd9f"});

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