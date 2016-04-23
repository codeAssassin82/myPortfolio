<?php
/**
 * Custom One page Template
 *
 * @package mi
 * @since 1.0
 *
 */
get_header();

	$website_type = cs_get_option( 'site_type_page' );
	$website_style = cs_get_option( 'website_style' );
	
	if ($website_type[0] == 'onepage' ) {

		if ($website_style == 'website-1' ) {
			locate_template ( 'cs-framework/include/rs-onepage-s1.php',  true );
		} elseif ($website_style == 'website-2' ) {
			locate_template ( 'cs-framework/include/rs-onepage-s2.php',  true );
		} else {
			locate_template ( 'cs-framework/include/rs-onepage-s3.php',  true );
		}

	} else {
		
		if ($website_style == 'website-1' ) {
			locate_template ( 'cs-framework/include/rs-page-multi-s1.php',  true );
		} elseif ($website_style == 'website-2' ) {
			locate_template ( 'cs-framework/include/rs-page-multi-s2.php',  true );
		} else {
			locate_template ( 'cs-framework/include/rs-page-multi-s3.php',  true );
		}
	}
    
get_footer(); ?>