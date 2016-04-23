<?php
/**
 * The template for requried actions hooks.
 *
 * @package mi
 * @since 1.0
 */
 
$menu_text = cs_get_option( 'menu_text_color' );
$menu_text_hover = cs_get_option( 'menu_text_color_hover' );

$site_logo = cs_get_option( 'site_logo' );

$style  =	'<style type="text/css" media="screen">';
if($site_logo[0] == 'imglogo'){
	$logo = cs_get_option( 'image_logo' );
	$logo_retina = cs_get_option( 'image_logo_2x' );
	$logo_height = cs_get_option( 'img_logo_height' ); 
	$logo_width = cs_get_option( 'img_logo_width' );

	$style .=	'.navbar-brand {background:url('.$logo.') center no-repeat; width:'.$logo_width.'px !important; height:'.$logo_height.'px !important;}';
	if (strlen($logo_retina)>3) {
	$style .='only screen and (min-device-pixel-ratio: 1.5) { .navbar-brand { background:url('.$logo_retina.') center no-repeat !important; background-size:'.$logo_width.'px '.$logo_height.'px !important; } }'; 
	}
	$style .=	'.navbar-brand {background:url('.$logo.') center no-repeat;}';
} else {
	$logo_color = cs_get_option( 'text_logo_color' );
	$style .=	'.navbar-default .navbar-brand {color:'.$logo_color.'!important;}';
}
$style .=	'.navbar-default .navbar-nav li a:hover, .navbar-default .navbar-nav li a:focus, .menu-style-5 li a:hover, .menu-style-5 li a:focus, .bt-menu ul:first-of-type li a:focus, .overlay2 ul.nav-style-4 li a:hover, .overlay2 ul.nav-style-4 li a:focus {color:'.$menu_text_hover.'!important;}';
$style .=	'.navbar-default .navbar-nav li a, .menu-style-5 li a, .overlay2 ul.nav-style-4 li a {color:'.$menu_text.'!important;}';

$style .=	'</style>';

print $style;