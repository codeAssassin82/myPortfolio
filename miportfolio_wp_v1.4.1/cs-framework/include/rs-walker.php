<?php
/**
 * Main navigation hook
 *
 * @package mi
 * @since 1.0
 */

/**
 * Top Menu Walker style 1
 */
class topMenuS1 extends Walker_Nav_Menu {

    //add the description to the menu item output
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
        $class_names = $value = '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

		$website_type = cs_get_option( 'site_type_page' );
		$post = get_post($item->object_id);
		if ($item->inactive == true || $website_type == 'multipage' || $website_type[0] == 'multipage') {
				$slug = 'href="'.$item->url.'" target="_self"';
		} else {
			$slug = str_replace('-', '-', $post->post_name);
			$slug = 'href="#' . $slug.'"';
		}
		$slug_id = str_replace("-", "-", $post->post_name);
		
		$item_custom = ! empty( $item->custom )        ? ' class="'. esc_attr( $item->custom ) .'"' : '';
		$item_color	 = ! empty( $item->customicon )    ? ' style="color:'. esc_attr( $item->customicon) .'"' : '';
		$item_bg 	 = ! empty( $item->customcolor )   ? ' style="background:'. esc_attr( $item->customcolor) .'"' : '';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
 
        $item_output = $args->before;
        $item_output .= '<li id="p_'.$slug_id.'" '.$item_bg.'><a data-scroll data-id="'.$slug_id.'" '. $attributes . $class_names .' '.$slug.'> ';
        
		$item_output .= '<span '.$item_custom . $item_color.'></span></a>';
        $item_output .= $args->after;
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

/**
 * Top Menu Walker style 2
 */
class topMenuS2 extends Walker_Nav_Menu {

    //add the description to the menu item output
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
        $class_names = $value = '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . ' hight-head"';

		$website_type = cs_get_option( 'site_type_page' );
		$post = get_post($item->object_id);
		if ($item->inactive == true || $website_type == 'multipage' || $website_type[0] == 'multipage') {
				$slug = 'href="'.$item->url.'" target="_self"';
		} else {
			$slug = str_replace('-', '-', $post->post_name);
			$slug = 'href="#' . $slug.'"';
		}
		$slug_id = str_replace("-", "-", $post->post_name);
		
		$item_custom = ! empty( $item->custom )        ? ' '. esc_attr( $item->custom ) .'' : '';
		$item_color	 = ! empty( $item->customicon )    ? ' style="color:'. esc_attr( $item->customicon) .'"' : '';
		$item_bg 	 = ! empty( $item->customcolor )   ? ' style="background:'. esc_attr( $item->customcolor) .'"' : '';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
 
        $item_output  = $args->before;
        $item_output .= '<li id="p_'.$item->ID.'" '.$item_bg.' class="hover-effect"><a data-id="'.$slug_id.'" '. $attributes . $class_names .' '.$slug.' data-href="'.$item->url.'"><span class="show-on-desktop">';
		$item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
		$item_output .= '</span><span class="show-on-mobile '.$item_custom.'"'.$item_color.'></span></a><div class="menu-overlay"></div>';
        $item_output .= $args->after;
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

/**
 * Top Menu Walker style 3
 */
class topMenuWalker extends Walker_Nav_Menu {

    //the description to the menu item output
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
        $class_names = $value = '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

		$website_type = cs_get_option( 'site_type_page' );
		$post = get_post($item->object_id);
        if ($item->inactive == true || $website_type == 'multipage' || $website_type[0] == 'multipage') {
                $slug = 'href="'.$item->url.'" target="_self"';
        } else {
            $slug = str_replace('-', '-', $post->post_name);
            $slug = 'href="#' . $slug.'"';
        }
        $slug_id = str_replace("-", "-", $post->post_name);
        
        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
 
        $item_output = $args->before;

        $menu_style = cs_get_option( 'menu_style' );
        
        if ($menu_style == 'style-4' ) { $data_scroll_attr = ''; } else {$data_scroll_attr = 'data-scroll'; }
            $item_output .= '<li '. $attributes . $class_names .'><a '. $data_scroll_attr . $attributes . $class_names .' '.$slug.'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';

        $item_output .= $args->after;
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

/**
 * Additional Menu Walker changes the view of top navigation
 */
class additionalMenuWalker extends Walker_Nav_Menu {

    //the description to the menu item output
    function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
        global $wp_query;
        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
 
        $class_names = $value = '';
 
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
 
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="' . esc_attr( $class_names ) . '"';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
		$attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';
 
        $item_output = $args->before;

        $menu_style = cs_get_option( 'menu_style' );
        if ($menu_style == 'style-4' ) { $data_scroll_attr = ''; } else {$data_scroll_attr = 'data-scroll'; }
            $item_output .= '<li><a '. $data_scroll_attr . $attributes . $class_names .'>';
            $item_output .= $args->link_before . apply_filters( 'the_title', $item->title, $item->ID ) . $args->link_after;
            $item_output .= '</a>';

        $item_output .= $args->after;
 
        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }	
}