<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK SETTINGS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$settings      = array(
  'menu_title' => 'Theme Options',
  'menu_type'  => 'add_menu_page',
  'menu_slug'  => 'cs-framework',
  'ajax_save'  => false,
);

// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// FRAMEWORK OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options        = array();


// ----------------------------------------
// Global website style
// ----------------------------------------
$options[]      = array(
  'name'        => 'website_style',
  'title'       => 'Global website Styles',
  'icon'        => 'fa fa-desktop',

  // begin: fields
  'fields'      => array(
    
		array(
		  'id'      => 'site_type_page',
		  'type'    => 'radio',
		  'title'   => 'Website type',
		  'options' => array(
			'multipage'   => 'Multipage',
			'onepage'     => 'Onepage',
		  ),
		  'default'   => 'multipage'
		),
	
        array(
          'id'        => 'website_style',
          'type'      => 'image_select',
          'title'     => 'Website style',
          'options'   => array(
			'website-5' => get_template_directory_uri().'/assets3/img/website-5.png',
			'website-1' => get_template_directory_uri().'/assets3/img/website-1.png',
			'website-2' => get_template_directory_uri().'/assets3/img/website-2.png',
			'website-3' => get_template_directory_uri().'/assets3/img/website-3.png',
			'website-4' => get_template_directory_uri().'/assets3/img/website-4.png',
          ),
          'radio'     => true,
          'default'   => 'website-5'
        ),
	
  ), // end: fields
);

// ----------------------------------------
// general option section 
// ----------------------------------------
$options[]      = array(
  'name'        => 'general',
  'title'       => 'General',
  'icon'        => 'fa fa-star',

  // begin: fields
  'fields'      => array(

	//Site logo
    array(
          'id'          => 'site_logo',
          'type'        => 'radio',
          'title'       => 'Type of site logo',
          'options'     => array(
            'txtlogo'      => 'Text Logo',
            'imglogo'      => 'Image Logo',
          ),
		  'default'     => 'txtlogo',
    ),
        array(
          'id'         => 'text_logo',
          'type'       => 'text',
          'title'      => 'Text Logo*',
		  'default'    => 'MARY LOU',
		  'dependency' => array( 'site_logo_txtlogo', '==', 'true' ),
        ),
		array(
          'id'         => 'text_logo_color',
          'type'       => 'color_picker',
          'title'      => 'Text Logo Color',
		  'default'    => '',
		  'dependency' => array( 'site_logo_txtlogo', '==', 'true' ),
        ),
        array(
          'id'         => 'image_logo',
          'type'       => 'upload',
          'title'      => 'Site Logo',
          'desc'       => 'Upload any media using the WordPress Native Uploader.',
		  'dependency' => array( 'site_logo_imglogo', '==', 'true' ),
        ),
		array(
          'id'         => 'image_logo_2x',
          'type'       => 'upload',
          'title'      => 'Site Logo Retina (@2x)',
          'desc'       => 'Upload any media using the WordPress Native Uploader.',
		  'dependency' => array( 'site_logo_imglogo', '==', 'true' ),
        ),
		array(
          'id'         => 'img_logo_width',
          'type'       => 'text',
          'title'      => 'Site Logo Width Size*',
		  'desc'       => 'By default the logo have 150px width size',
		  'default'    => '150',
          'dependency' => array( 'site_logo_imglogo', '==', 'true' ),
        ),
		array(
          'id'         => 'img_logo_height',
          'type'       => 'text',
          'title'      => 'Site Logo Height Size*',
		  'desc'       => 'By default the logo have 150px height size',
		  'default'    => '150',
          'dependency' => array( 'site_logo_imglogo', '==', 'true' ),
        ),

	//Favicon
    array(
          'id'         => 'site_favicon',
          'type'       => 'upload',
          'title'      => 'Browser Favicon (16x16)*',
		  'desc'       => 'Upload Favicon icon of size 16x16',
		  'default'    => get_template_directory_uri().'/assets3/img/favicon.ico',
    ),
	
	//Footer Text
    array(
          'id'         => 'footer_text',
          'type'       => 'textarea',
          'title'      => 'Footer Content*',
		  'desc'       => 'Enter text.',
		  'default'    => '&copy; '.date('Y').', Miportfolio. All Rights Reserved.',
    ),
	
	//Tracking Code
    array(
          'id'         => 'analitycs_code',
          'type'       => 'textarea',
          'title'      => 'Tracking Code',
		  'desc'       => 'Paste your Google Analytics Code (or other) here.',
		  'sanitize'   => false
    ),
	
  ), // end: fields
);

// ----------------------------------------
// main menu options
// ----------------------------------------
$options[]      = array(
  'name'        => 'menu_options',
  'title'       => 'Main Menu Options',
  'icon'        => 'fa fa-bars',

  // begin: fields
  'fields'      => array(
    
	// Chouse menu type
        array(
          'id'        => 'menu_style',
          'type'      => 'image_select',
          'title'     => 'Menu style',
          'options'   => array(
			'style-4' => get_template_directory_uri().'/assets3/img/style-4.png',
			'style-5' => get_template_directory_uri().'/assets3/img/style-5.png',
			'style-6' => get_template_directory_uri().'/assets3/img/style-6.png',
          ),
          'radio'     => true,
          'default'   => 'style-6',
        ),
	
    array(
          'id'      => 'menu_text_color',
          'type'    => 'color_picker',
          'title'   => 'Menu Text*',
		  'desc'    => 'Menu Text color in the Normal state.',
          'default' => '',
    ),
	array(
          'id'      => 'menu_text_color_hover',
          'type'    => 'color_picker',
          'title'   => 'Menu Text (Hover) *',
		  'desc'    => 'Menu Text color in the Hover state',
          'default' => '',
    )
	
  ), // end: fields
);

// ----------------------------------------
// Blog options
// ----------------------------------------
$options[]      = array(
  'name'        => 'blog_options',
  'title'       => 'Blog Options',
  'icon'        => 'fa fa-rss',

  // begin: fields
  'fields'      => array(

    array(
      'id'      => 'show_head',
      'type'    => 'switcher',
      'title'   => 'Show head image',
	  'default' => true,
    ),
    array(
	  'id'         => 'head_bg_color',
	  'type'       => 'color_picker',
	  'title'      => 'Select background color',
	  'default'    => 'rgba(15,23,38,0.6)',
	  'dependency' => array( 'show_head', '!=', '' ),
    ),
	array(
	  'id'         => 'head_img',
	  'type'       => 'upload',
	  'title'      => 'Browser header image',
	  'default'    => get_template_directory_uri().'/assets3/img/blog.jpg',
	  'dependency' => array( 'show_head', '!=', '' ),
    ),
  ), // end: fields
);

// ----------------------------------------
// 404 Page
// ----------------------------------------
$options[]      = array(
  'name'        => 'error_page',
  'title'       => '404 Page',
  'icon'        => 'fa fa-bolt',

  // begin: fields
  'fields'      => array(

    array(
          'id'      => 'error_message',
          'type'    => 'textarea',
          'title'   => 'Error Message*',
          'default' => 'Something went wrong or this page no longer exist.',
    ),
    array(
      'id'      => 'show_head_404',
      'type'    => 'switcher',
      'title'   => 'Show head image',
	  'default' => true,
    ),
    array(
	  'id'         => 'head_bg_color_404',
	  'type'       => 'color_picker',
	  'title'      => 'Select background color',
	  'default'    => 'rgba(15,23,38,0.6)',
	  'dependency' => array( 'show_head', '!=', '' ),
    ),
	array(
	  'id'         => 'head_img_404',
	  'type'       => 'upload',
	  'title'      => 'Browser header image',
	  'default'    => get_template_directory_uri().'/assets3/img/blog.jpg',
	  'dependency' => array( 'show_head', '!=', '' ),
    ),

	
	
  ), // end: fields
);

// ------------------------------
// backup
// ------------------------------
$options[]   = array(
  'name'     => 'backup_section',
  'title'    => 'Import / Export Options',
  'icon'     => 'fa fa-shield',
  'fields'   => array(

    array(
      'type'    => 'notice',
      'class'   => 'warning',
      'content' => 'You can save your current options. Download a Backup and Import.',
    ),

    array(
      'type'    => 'backup',
    ),

  )
);

// ------------------------------
// Documentation
// ------------------------------
$options[]   = array(
  'name'     => 'documentation_section',
  'title'    => 'Documentation',
  'icon'     => 'fa fa-info-circle',
  'fields'   => array(

    array(
      'type'    => 'heading',
      'content' => 'Miportfolio Documentation'
    ),
    array(
      'type'    => 'content',
      'content' => 'To view the documentation, go to <a href="http://demo.nrgthemes.com/projects/miportfolio/documentation/" target="_blank">documentation page</a>.',
    ),

  )
);

CSFramework::instance( $settings, $options );