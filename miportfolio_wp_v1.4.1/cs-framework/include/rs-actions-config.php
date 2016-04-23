<?php
/**
 * The template for requried actions hooks.
 *
 * @package mi
 * @since 1.0
 */
add_action( 'widgets_init', 'mi_register_widgets' );
add_action( 'wp_enqueue_scripts', 'enqueue_scripts');
add_action( 'wp_head', 'mi_custom_styles', 8);
add_action( 'tgmpa_register', 'mi_include_required_plugins' );

define( 'CS_ACTIVE_FRAMEWORK',  true  );
define( 'CS_ACTIVE_METABOX',    true );
define( 'CS_ACTIVE_SHORTCODE',  false );
define( 'CS_ACTIVE_CUSTOMIZE',  false );


if( !function_exists('mi_register_widgets') ) {

	function mi_register_widgets() {

		// register sidebars
	 	register_sidebar(array(
			'name'          => 'Main Widget Area',
			'id'            => 'sidebar',
			'description'   => 'Appears in the footer section of the site.',
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget'  => '</aside>',
			'before_title'  => '<h3 class="widget-title">',
			'after_title'   => '</h3>',
	    ));
	}	
}


/**
* @ return null
* @ param none
* @ loads all the js and css script to frontend
**/
function enqueue_scripts() {

	// general settings
	if( ( is_admin() ) ) { return; }


	//wp_enqueue_script( 'jquery-migrate' );

	// including jQuery plugins
	wp_localize_script('jquery-scripts', 'get',
		array(
			'ajaxurl' => admin_url( 'admin-ajax.php' ),
			'siteurl' => get_template_directory_uri()
		)
	);

	wp_enqueue_script( 'jquery-main',          				 T_URI . '/assets3/js/jquery-1.11.0.min.js',      	 array( 'jquery' ), true, false );
	wp_enqueue_script( 'jquery-ui',          				 T_URI . '/assets3/js/jquery-ui-1.10.4.min.js',      array( 'jquery-main' ) );
	wp_enqueue_script( 'jquery-bootstrap',          		 T_URI . '/assets3/js/bootstrap.min.js',      		 array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-modernizer',     			 T_URI . '/assets3/js/modernizr.custom.js',      	 array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-nicescroll',          		 T_URI . '/assets3/js/jquery.nicescroll.js',      	 array( 'jquery-main' ), false, true );
	wp_enqueue_script( 'jquery-scroll',          			 T_URI . '/assets3/js/smooth-scroll.js',      		 array( 'jquery-main' ), false, true );
	
	$website_style = cs_get_option( 'website_style' );
	if ($website_style == 'website-1' ) {
		locate_template ( 'cs-framework/include/rs-actions-config_s1.php',  true );
	} elseif ($website_style == 'website-2' ) {
		locate_template ( 'cs-framework/include/rs-actions-config_s2.php',  true );
	} else {
		locate_template ( 'cs-framework/include/rs-actions-config_s3.php',  true );
	}
	
}

function mi_include_required_plugins() {

	$plugins = array(
			
		array(
			'name'     				=> 'Contact Form 7', // The plugin name
			'slug'     				=> 'contact-form-7', // The plugin slug (typically the folder name)
			'required' 				=> false, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'Visual Composer', // The plugin name
			'slug'     				=> 'js_composer', // The plugin slug (typically the folder name)
			'source'   				=> T_PATH .'/'. F_PATH .'/importer/plugins/js_composer.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
		array(
			'name'     				=> 'MI Plugins', // The plugin name
			'slug'     				=> 'mi-plugins', // The plugin slug (typically the folder name)
			'source'   				=> T_PATH .'/'. F_PATH .'/importer/plugins/mi-plugins.zip', // The plugin source
			'required' 				=> true, // If false, the plugin is only 'recommended' instead of required
			'version' 				=> '', // E.g. 1.0.0. If set, the active plugin must be this version or higher, otherwise a notice is presented
			'force_activation' 		=> false, // If true, plugin is activated upon theme activation and cannot be deactivated until theme switch
			'force_deactivation' 	=> false, // If true, plugin is deactivated upon theme switch, useful for theme-specific plugins
			'external_url' 			=> '', // If set, overrides default API URL and points to an external URL
		),
	);

	// Change this to your theme text domain, used for internationalising strings

	/**
	 * Array of configuration settings. Amend each line as needed.
	 * If you want the default strings to be available under your own theme domain,
	 * leave the strings uncommented.
	 * Some of the strings are added into a sprintf, so see the comments at the
	 * end of each line for what each argument will be.
	 */
	$config = array(
		'domain'       		=> 'mi',         			// Text domain - likely want to be the same as your theme.
		'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
		'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
		'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
		'menu'         		=> 'install-required-plugins', 	// Menu slug
		'has_notices'      	=> true,                       	// Show admin notices or not
		'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
		'message' 			=> '',							// Message to output right before the plugins table
		'strings'      		=> array(
			'page_title'                       			=> __( 'Install Required Plugins', 'mi' ),
			'menu_title'                       			=> __( 'Install Plugins', 'mi' ),
			'installing'                       			=> __( 'Installing Plugin: %s', 'mi' ), // %1$s = plugin name
			'oops'                             			=> __( 'Something went wrong with the plugin API.', 'mi' ),
			'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
			'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
			'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
			'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
			'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
			'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
			'return'                           			=> __( 'Return to Required Plugins Installer', 'mi' ),
			'plugin_activated'                 			=> __( 'Plugin activated successfully.', 'mi' ),
			'complete' 									=> __( 'All plugins installed and activated successfully. %s', 'mi' ), // %1$s = dashboard link
			'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
		)
	);

	tgmpa( $plugins, $config );

}

function mi_print_header_info() {
 print '
	<!-- GOOGLE FONTS -->
	<link href="http://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Raleway:400,700,600,500,300,200,100,800,900" rel="stylesheet" type="text/css">
	<link href="http://fonts.googleapis.com/css?family=Lusitana:400,700" rel="stylesheet" type="text/css">

	<!--[if IE]>
	<script src="'.esc_url( get_template_directory_uri() ).'/assets3/js/html5.js"></script>
	<![endif]-->';
	
	$website_style = cs_get_option( 'website_style' );
	if ($website_style == 'website-1' ) {
	 print '
		<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="'.esc_url( get_template_directory_uri() ).'"/assets1/css/ie9.css">
		<![endif]-->';
	} elseif ($website_style == 'website-2' ) {
	 print '
		<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="'.esc_url( get_template_directory_uri() ).'"/assets2/css/ie9.css">
		<![endif]-->';
	} elseif ($website_style == 'website-3' || $website_style == 'website-4' || $website_style == 'website-5') {
	 print '
		<!--[if IE 9]>
		<link rel="stylesheet" type="text/css" href="'.esc_url( get_template_directory_uri() ).'"/assets3/css/ie9.css">
		<![endif]-->';
	}

}
add_action('wp_head', 'mi_print_header_info');


function mi_custom_styles() {
	$website_style = cs_get_option( 'website_style' );
	if ($website_style == 'website-2' ) {
		locate_template ( 'cs-framework/include/rs-actions-style_s2.php',  true );
	} elseif ($website_style == 'website-3' || $website_style == 'website-4' || $website_style == 'website-5' ) {
		locate_template ( 'cs-framework/include/rs-actions-style_s3.php',  true );
	}
}


add_action('admin_head', 'mi_custom_admin');
function mi_custom_admin() {
	print '<style>
	#cs-tab-website_style .cs-image-select label:after, 
	#cs-tab-website_style .cs-image-select label:before{display:none;} 
	#cs-tab-website_style .cs-image-select label:hover:after, 
	#cs-tab-website_style .cs-image-select label:hover:before{display:block;} 
	#cs-tab-website_style .cs-image-select label:nth-child(1):after{content: "Default style";} 
	#cs-tab-website_style .cs-image-select label:nth-child(2):after{content: "Style 1";} 
	#cs-tab-website_style .cs-image-select label:nth-child(3):after{content: "Style 2";} 
	#cs-tab-website_style .cs-image-select label:nth-child(4):after{content: "Style 3";} 
	#cs-tab-website_style .cs-image-select label:nth-child(5):after{content: "Style 4";} 
	#cs-tab-website_style .cs-image-select label:after {position: absolute;top: 50%;left: 50%;color: #fff;z-index: 90000;font-size: 20px;transform: translate(-50%, -50%);} #cs-tab-website_style .cs-image-select label {overflow: hidden;position: relative;} #cs-tab-website_style .cs-image-select label:before {content: "";background: rgba(0, 0, 0, 0.52);width: 100%;height: 100%;position: absolute;z-index: 5000;} ';
		
	$website_style = cs_get_option( 'website_style' );
	if ($website_style == 'website-1' ) {
		print 'li[data-element=mi_fullscreen_landing_s2], li[data-element=mi_heading_s2],li[data-element=mi_cta_button_s2],li[data-element=mi_button_s2],li[data-element=mi_icon_s2],li[data-element=mi_contact_info_s2], li[data-element=mi_social_link_s2],li[data-element=mi_fullscreen_landing], li[data-element=mi_text_icon],li[data-element=mi_cta_button],li[data-element=mi_portfolio_s3],li[data-element=mi_contact_info],li[data-element=mi_social_link], li[data-element=mi_heading], .isotope-filter.vc_filter-content-elements li:nth-child(4), .isotope-filter.vc_filter-content-elements li:nth-child(5),
		#cs-tab-general .cs-element.cs-field-radio, 
		div[data-controller=site_logo_txtlogo], div[data-controller=site_logo_imglogo],
		.cs-body .cs-nav ul li:nth-child(3){display:none!important;}';
	} elseif ($website_style == 'website-2' ) {
		print 'li[data-element=mi_fullscreen_landing_s1], li[data-element=mi_heading_s1], li[data-element=mi_cta_button_s1], li[data-element=mi_button_s1], li[data-element=mi_icon_s1], li[data-element=mi_contact_info_s1], li[data-element=mi_social_link_s1], li[data-element=mi_fullscreen_landing], li[data-element=mi_text_icon], li[data-element=mi_cta_button], li[data-element=mi_portfolio_s3], li[data-element=mi_contact_info], li[data-element=mi_social_link], li[data-element=mi_heading], .isotope-filter.vc_filter-content-elements li:nth-child(3), .isotope-filter.vc_filter-content-elements li:nth-child(5), #cs-tab-menu_options .cs-element.cs-field-image_select{display:none!important;}';
	} elseif ($website_style == 'website-3' || $website_style == 'website-4' || $website_style == 'website-5' ) {
		print 'li[data-element=mi_fullscreen_landing_s1], li[data-element=mi_heading_s1], li[data-element=mi_cta_button_s1], li[data-element=mi_button_s1], li[data-element=mi_icon_s1], li[data-element=mi_contact_info_s1], li[data-element=mi_social_link_s1], li[data-element=mi_portfolio_s1], li[data-element=mi_fullscreen_landing_s2], li[data-element=mi_heading_s2], li[data-element=mi_cta_button_s2], li[data-element=mi_button_s2], li[data-element=mi_icon_s2], li[data-element=mi_contact_info_s2], li[data-element=mi_social_link_s2], .isotope-filter.vc_filter-content-elements li:nth-child(3), .isotope-filter.vc_filter-content-elements li:nth-child(4), #_custom_page_side_options, .hide-style3{display:none!important;}';
	}
	print '</style>';
  
}