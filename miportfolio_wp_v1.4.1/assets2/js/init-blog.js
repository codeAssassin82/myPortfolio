/** *************Init Blog JS*********************/
"use strict";

/*************************************/
/* Preloader Js */
/**************************************/
 jQuery(window).load(function() {
	jQuery("#preloader").delay(1000).fadeOut("slow");
	setTimeout(function(){ $('.header-hide').css('opacity','1') }, 1100);
	setTimeout(function(){ $('body').removeClass('stop-scrolling') }, 1800);
});


/***********************************/
/*Auto height function*/
/**********************************/
$(window).on("resize", function () {
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
/*Ready function*/
/**********************************/
$(document).ready(function(){

	/** Nice Scroll **/
	 $("html").niceScroll();
	panel();
});

function panel(){
	$('.show-panel').click(function () {
    $('.panel').slideToggle(500);
});
}	