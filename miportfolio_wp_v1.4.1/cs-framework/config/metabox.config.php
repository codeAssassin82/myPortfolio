<?php if ( ! defined( 'ABSPATH' ) ) { die; } // Cannot access pages directly.
// ===============================================================================================
// -----------------------------------------------------------------------------------------------
// METABOX OPTIONS
// -----------------------------------------------------------------------------------------------
// ===============================================================================================
$options      = array();



// -----------------------------------------
// Page Side Metabox Options               -
// -----------------------------------------
$options[]    = array(
  'id'        => '_custom_page_side_options',
  'title'     => 'Page Options',
  'post_type' => 'page',
  'context'   => 'side',
  'priority'  => 'default',
  'sections'  => array(

    array(
      'name'   => 'section_3',
      'fields' => array(
		
		array(
          'id'          => 'page_types',
          'type'        => 'radio',
          'title'       => 'Choose page type',
          'options'     => array(
            'common_page'      => 'Common page',
            'slide_page'       => 'Slide page',
          ),
		  'default'     => 'common_page',
    	),
		array(
          'id'      => 'page_bg_color',
          'type'    => 'color_picker',
          'title'   => 'Page Background Color',
          'default' => '#ffffff',
        ),
		array(
          'id'      => 'page_bg_img',
          'type'    => 'upload',
          'title'   => 'Page Background Image',
        ),

      ),
    ),

  ),
);



CSFramework_Metabox::instance( $options );