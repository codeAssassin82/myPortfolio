<?php
/**
 * The template for requried actions hooks.
 *
 * @package mi
 * @since 1.0
 */
	
	wp_enqueue_script( 'jquery-placeholder',          		 T_URI . '/assets3/js/jquery.placeholder.js',      	 array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-classie',    	      		 T_URI . '/assets3/js/classie.js',      				 array( 'jquery-main' ), false, true );
	
	if (is_page()){
	wp_enqueue_script( 'jquery-flexslider',          		 T_URI . '/assets3/js/jquery.flexslider.js',      	 array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-venobox',          			 T_URI . '/assets3/js/venobox.js',      				 array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-wow',         				 T_URI . '/assets3/js/wow.min.js',      				 array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-modernizer-gridgallery',      T_URI . '/assets3/js/modernizr.gridgallery.js',      array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-classie-gallery',          	 T_URI . '/assets3/js/classie.grid.gallery.js',       array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-grid-gallery',          		 T_URI . '/assets3/js/cbpGridGallery.js',      		 array( 'jquery-carousel' ), false, true );
	wp_enqueue_script( 'jquery-easing',          			 T_URI . '/assets3/js/jquery.easing.min.js',      	 array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-supersized',          		 T_URI . '/assets3/js/supersized.3.2.7.min.js',       array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-supersized-shutter',          T_URI . '/assets3/js/supersized.shutter.min.js',     array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-mobile',          			 T_URI . '/assets3/js/jquery.mobile-1.4.3.js',      	 array( 'jquery-main' ), true, false );
	wp_enqueue_script( 'jquery-carousel',          			 T_URI . '/assets3/js/carousel_init.js',      		 array( 'jquery-supersized' ), false, true );
	wp_enqueue_script( 'jquery-slider-popup',          		 T_URI . '/assets3/js/slider-popup.js',      		 array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-init',          				 T_URI . '/assets3/js/init.js',      				 array( 'jquery-grid-gallery' ), false, true );
	wp_enqueue_script( 'owl', 	         					 T_URI . '/assets3/js/owl.carousel.min.js', 		     array( 'jquery-main' ), false, true );
	} else {
	wp_enqueue_script( 'jquery-blog',          				 T_URI . '/assets3/js/init-blog.js',     			 array( 'jquery' ), false, true );
	}
	
	$menu_style = cs_get_option( 'menu_style' ); 
	if ($menu_style == 'style-5' ) {
		wp_enqueue_script( 'border-menu',          			 T_URI . '/assets3/js/borderMenu.js',      			 array( 'jquery-main' ), false, true );
	}
	
	if ( is_singular() ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// register style
	wp_enqueue_style( 'supersized',				T_URI . '/assets3/css/supersized.css' );
	wp_enqueue_style( 'supersized-shutter',		T_URI . '/assets3/css/supersized.shutter.css' );
	wp_enqueue_style( 'bootstrap',				T_URI . '/assets3/css/bootstrap.min.css' );
	wp_enqueue_style( 'et-line',				T_URI . '/assets3/css/et-line.css' );
	wp_enqueue_style( 'font-awesome',			T_URI . '/assets3/css/font-awesome.min.css' );
	wp_enqueue_style( 'flexslider',				T_URI . '/assets3/css/flexslider.css' );
	wp_enqueue_style( 'venobox',				T_URI . '/assets3/css/venobox.css' );
	wp_enqueue_style( 'animate',				T_URI . '/assets3/css/animate.min.css' );
	wp_enqueue_style( 'gridgallery',			T_URI . '/assets3/css/gridgallery.css' );
	wp_enqueue_style( 'panel',					T_URI . '/assets3/css/panel.css' );
	wp_enqueue_style( 'style',					T_URI . '/assets3/css/style.css' );
	wp_enqueue_style( 'slider-popup',			T_URI . '/assets3/css/slider-popup.css' );
	wp_enqueue_style( 'responsive',				T_URI . '/assets3/css/responsive.css' );
	wp_enqueue_style( 'owl',					T_URI . '/assets3/css/owl.carousel.css' );
	if ($menu_style == 'style-5' ) {
		wp_enqueue_style( 'borderstyle',		T_URI . '/assets3/css/borderstyle.css' );
	} else if ($menu_style == 'style-4' ) {
		wp_enqueue_style( 'menu-overlay',			T_URI . '/assets3/css/menu-overlay.css' );
	}