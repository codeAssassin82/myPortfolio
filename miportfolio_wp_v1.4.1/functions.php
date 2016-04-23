<?php
/**
 * The template includes necessary functions for theme.
 *
 * @package Miportfolio
 * @since 1.0
 */

if ( is_user_logged_in() ) {
add_filter('show_admin_bar', '__return_true');
}


defined( 'F_PATH' )			or 	define(	'F_PATH',	'cs-framework' );
defined( 'T_NAME' )			or 	define(	'T_NAME',	'mi');
defined( 'F_DIR' )			or 	define(	'F_DIR',	F_PATH . '/includes' );
defined( 'T_URI' )			or 	define(	'T_URI', 	get_template_directory_uri() );
defined( 'T_PATH' )			or 	define(	'T_PATH',	get_template_directory() );
defined( 'T_IMG' )			or 	define(	'T_IMG',	T_URI . '/assets/images' );
defined( 'T_JS' )			or 	define(	'T_JS',		T_URI . '/assets/js' );
defined( 'T_CSS' )			or 	define(	'T_CSS',	T_URI . '/assets/css' );


add_action('after_setup_theme', 'mi_after_setup');
function mi_after_setup() {

	// register nav
	register_nav_menus	(array( 'primary-menu' 		=> 'Main Navigation' ) );
	register_nav_menus	(array( 'additional-menu' 	=> 'Blog Navigation' ) );
	// register nav

	add_theme_support( 'custom-background' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', 	array( 'aside', 'quote', 'audio', 'video') );
	add_theme_support( 'custom-header');
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
}

/**
* Category navigation
**/
function mi_cat_paging_nav($pages = '', $range = 2) {
	global $wp_query, $post, $paged;

	if ( $wp_query->max_num_pages < 2 )
		return;?>
		<div class="nav-links">

			<?php
			if ( empty( $paged ) ) $paged = 1;
			$showitems = ( $range * 2 ) + 1;
			
			if ( $pages == '' ) {
				$pages = $wp_query->max_num_pages;
			};
			
			// Previous/Newer Post Links
			if ( $paged > 1 && $showitems < $pages)
				previous_posts_link( '<' );

			if ( $paged > 2 && $paged > $range + 1 && $showitems < $pages)
				print '<a href="' . get_pagenum_link(1) . '">1</a> ...';
				
			// Pagination Numbers
			for ( $i = 1; $i <= $pages; $i++ ) {
				if ( 1 != $pages && ( ! ( $i >= $paged + $range + 1 || $i <= $paged - $range - 1 ) || $pages <= $showitems ) ) {
					print ($paged == $i) ? '<span class="current">' . $i . '</span>' : '<a href="' . get_pagenum_link( $i ) . '" class="numeric" >' . $i . '</a>';
				};
			};
			
			if ( $paged < $pages - 1 &&  $paged + $range - 1 < $pages && $showitems < $pages ) {
				print '... <a href="' . get_pagenum_link( $pages ) . '">'.$pages.'</a>';
			};
			
			// Next/Older Posts Links
			if ( $paged < $pages && $showitems < $pages) {
				next_posts_link( '>' );
			};?>

		</div><!-- .nav-links -->
<?php }


// Framework integration
// ----------------------------------------------------------------------------------------------------
require_once dirname( __FILE__ ) .'/cs-framework/cs-framework.php';
require_once dirname( __FILE__ ) .'/cs-framework/include/rs-helper-functions.php';
require_once dirname( __FILE__ ) .'/cs-framework/include/rs-custom-menu.php';
require_once dirname( __FILE__ ) .'/cs-framework/include/rs-include-config.php';
require_once dirname( __FILE__ ) .'/cs-framework/include/rs-actions-config.php';
require_once dirname( __FILE__ ) .'/cs-framework/include/rs-walker.php';

add_action( 'admin_menu', 'mi_remove_menu_items' );
function mi_remove_menu_items() {
 remove_menu_page('edit.php?post_type=vc_grid_item');
}

if ( ! isset( $content_width ) )
	$content_width = 1280; /* pixels */

?>