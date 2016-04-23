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
$logo = cs_get_option( 'image_logo' );
$logo_retina = cs_get_option( 'image_logo_2x' );
$logo_height = cs_get_option( 'img_logo_height' ); 
$logo_width = cs_get_option( 'img_logo_width' );
$logo_color = cs_get_option( 'text_logo_color' );
$logo_bg_color = cs_get_option( 'logo_bg_color' );


$style   =	'<style type="text/css" media="screen">';

if($site_logo[0] == 'imglogo'){
$style  .=	'#p_name .img-logo {background:url('.$logo.') center no-repeat; width:'.$logo_width.'px !important; height:'.$logo_height.'px !important;}';
	if (strlen($logo_retina)>3) {
		$style .='only screen and (min-device-pixel-ratio: 1.5) { #p_name .img_logo { background:url('.$logo_retina.') center no-repeat !important; background-size:'.$logo_width.'px '.$logo_height.'px !important; } }'; 
	}
} else {
	$style .=	'#p_name a {color:'.$logo_color.'!important;}';
}
$style .=   '#p_name{background:'.$logo_bg_color.';}';
$style .=	'nav li.hover-effect a {color:'.$menu_text.'!important;}';
$style .=	'nav li.hover-effect a:hover, nav li a:focus {color:'.$menu_text_hover.'!important;}';

$style .=	'</style>';
print $style;