<?php
/**
 *
 * The Header for our theme
 * @since 1.0.0
 * @version 1.0.0
 *
 */
?>
<!DOCTYPE html>
<html <?php language_attributes() ?>>
<!--[if lte IE 6]> <html class="no-js ie  lt-ie10 lt-ie9 lt-ie8 lt-ie7 ancient oldie" lang="en-US"> <![endif]-->
<!--[if IE 7]>     <html class="no-js ie7 lt-ie10 lt-ie9 lt-ie8 oldie" lang="en-US"> <![endif]-->
<!--[if IE 8]>     <html class="no-js ie8 lt-ie10 lt-ie9 oldie" lang="en-US"> <![endif]-->
<!--[if IE 9]>     <html class="no-js ie9 lt-ie10 oldie" lang="en-US"> <![endif]-->
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<!--[if IE]> <meta http-equiv="X-UA-Compatible" content="IE=edge"> <![endif]-->
<!-- Set the viewport width to device width for mobile -->
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
<meta name="author" content="ppandp">
<meta name="Description" content="<?php bloginfo('name'); ?>" />

<?php 
$website_type = cs_get_option( 'site_type_page' );
$website_style = cs_get_option( 'website_style' );
$home_class = 'bsc-'.$website_style.' st-'.$website_type[0]; ?>

<!-- favicon -->
<link rel="icon" href="<?php print cs_get_option( 'site_favicon' ); ?>" type="image/png">

<?php wp_head(); ?>

</head>
	<body <?php body_class($home_class); ?>>

		<!--PRELOADER-->
		<div class="preloading" id="preloader">
		<div class="loader"></div>
		</div>
		<!--/PRELOADER-->
        
        <?php get_template_part( 'cs-framework/include/rs-menu', 'template' ); ?>