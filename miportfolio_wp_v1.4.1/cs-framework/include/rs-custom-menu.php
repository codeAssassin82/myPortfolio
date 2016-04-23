<?php
/**
 * @package nav-menu-custom-fields
 * @version 0.1.0
 */
 
$custom_fields = array(
	'menu_item_inactive' => array('name' => 'inactive', 'label' => 'Check this if you would like to link to a new page', 'type' => 'checkbox')
);

add_action('wp_update_nav_menu_item', 'mi_custom_nav_update',10, 3);
function mi_custom_nav_update($menu_id, $menu_item_db_id, $args ) {
	global $custom_fields;
	foreach ($custom_fields as $field => $property) {
    	if (!isset($_REQUEST[$field])){$_REQUEST[$field] = array();}
    	if (is_array($_REQUEST[$field])) {
    		if (!isset($_REQUEST[$field][$menu_item_db_id])){$_REQUEST[$field][$menu_item_db_id] = '';}
        	$custom_value = $_REQUEST[$field][$menu_item_db_id];
        	update_post_meta($menu_item_db_id, '_'.$field, $custom_value);
    	}
	}
    if (!isset($_REQUEST['menu-item-custom'])){$_REQUEST['menu-item-custom'] = array();}
	if (!isset($_REQUEST['menu-item-custom-color'])){$_REQUEST['menu-item-custom-color'] = array();}
	if (!isset($_REQUEST['menu-item-icon-color'])){$_REQUEST['menu-item-icon-color'] = array();}
	
	if ( is_array($_REQUEST['menu-item-custom']) ) {
		if (!isset($_REQUEST['menu-item-custom'][$menu_item_db_id])){$_REQUEST['menu-item-custom'][$menu_item_db_id] = '';}
        $custom_value = $_REQUEST['menu-item-custom'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_custom', $custom_value );
    }
    if ( is_array($_REQUEST['menu-item-custom-color']) ) {
		if (!isset($_REQUEST['menu-item-custom-color'][$menu_item_db_id])){$_REQUEST['menu-item-custom-color'][$menu_item_db_id] = '';}
        $custom_value = $_REQUEST['menu-item-custom-color'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_custom_color', $custom_value );
    }
	if ( is_array($_REQUEST['menu-item-icon-color']) ) {
		if (!isset($_REQUEST['menu-item-icon-color'][$menu_item_db_id])){$_REQUEST['menu-item-icon-color'][$menu_item_db_id] = '';}
        $custom_value = $_REQUEST['menu-item-icon-color'][$menu_item_db_id];
        update_post_meta( $menu_item_db_id, '_menu_item_icon_color', $custom_value );
    }

}

/*
 * Adds value of new field to $item object that will be passed to     Walker_Nav_Menu_Edit_Custom
 */
add_filter( 'wp_setup_nav_menu_item','mi_custom_nav_item' );
function mi_custom_nav_item($menu_item) {
	global $custom_fields;
    foreach ($custom_fields as $field => $property) {
		$menu_item->{$property['name']} = get_post_meta($menu_item->ID, '_'.$field, true);
	}
    $menu_item->custom 		= get_post_meta( $menu_item->ID, '_menu_item_custom', true );
	$menu_item->customcolor = get_post_meta( $menu_item->ID, '_menu_item_custom_color', true );
	$menu_item->customicon  = get_post_meta( $menu_item->ID, '_menu_item_icon_color', true );
    return $menu_item;
}

add_filter( 'wp_edit_nav_menu_walker', 'mi_custom_nav_edit_walker',10,2 );
function mi_custom_nav_edit_walker($walker,$menu_id) {
    return 'Walker_Nav_Menu_Edit_Custom';
}

/**
 * Copied from Walker_Nav_Menu_Edit class in core
 * 
 * Create HTML list of nav menu input items.
 *
 * @package WordPress
 * @since 3.0.0
 * @uses Walker_Nav_Menu
 */
class Walker_Nav_Menu_Edit_Custom extends Walker_Nav_Menu  {
/**
 * @see Walker_Nav_Menu::start_lvl()
 * @since 3.0.0
 *
 * @param string $output Passed by reference.
 */
function start_lvl(&$output, $depth = 0, $args = Array()) {}

/**
 * @see Walker_Nav_Menu::end_lvl()
 * @since 3.0.0
 *
 * @param string $output Passed by reference.
 */
function end_lvl(&$output, $depth = 0, $args = Array()) {
}

/**
 * @see Walker::start_el()
 * @since 3.0.0
 *
 * @param string $output Passed by reference. Used to append additional content.
 * @param object $item Menu item data object.
 * @param int $depth Depth of menu item. Used for padding.
 * @param object $args
 */
function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0) {
    global $_wp_nav_menu_max_depth, $custom_fields;
    $_wp_nav_menu_max_depth = $depth > $_wp_nav_menu_max_depth ? $depth : $_wp_nav_menu_max_depth;

    $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

    ob_start();
    $item_id = esc_attr( $item->ID );
    $removed_args = array(
        'action',
        'customlink-tab',
        'edit-menu-item',
        'menu-item',
        'page-tab',
        '_wpnonce',
    );

    $original_title = '';
    if ( 'taxonomy' == $item->type ) {
        $original_title = get_term_field( 'name', $item->object_id, $item->object, 'raw' );
        if ( is_wp_error( $original_title ) )
            $original_title = false;
    } elseif ( 'post_type' == $item->type ) {
        $original_object = get_post( $item->object_id );
        $original_title = $original_object->post_title;
    }

    $classes = array(
        'menu-item menu-item-depth-' . $depth,
        'menu-item-' . esc_attr( $item->object ),
        'menu-item-edit-' . ( ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? 'active' : 'inactive'),
    );

    $title = $item->title;

    if ( ! empty( $item->_invalid ) ) {
        $classes[] = 'menu-item-invalid';
        /* translators: %s: title of menu item which is invalid */
        $title = sprintf( __( '%s (Invalid)', 'mi' ), $item->title );
    } elseif ( isset( $item->post_status ) && 'draft' == $item->post_status ) {
        $classes[] = 'pending';
        /* translators: %s: title of menu item in draft status */
        $title = sprintf( __('%s (Pending)', 'mi' ), $item->title );
    }

    $title = empty( $item->label ) ? $title : $item->label;

    ?>
    <li id="menu-item-<?php print $item_id; ?>" class="<?php print implode(' ', $classes ); ?>">
        <dl class="menu-item-bar">
            <dt class="menu-item-handle">
                <span class="item-title"><?php echo esc_html( $title ); ?></span>
                <span class="item-controls">
                    <span class="item-type"><?php echo esc_html( $item->type_label ); ?></span>
                    <span class="item-order hide-if-js">
                        <a href="<?php
                            print wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-up-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                ),
                                'move-menu_item'
                            );
                        ?>" class="item-move-up"><abbr title="<?php esc_attr_e('Move up'); ?>">&#8593;</abbr></a>
                        |
                        <a href="<?php
                            print wp_nonce_url(
                                add_query_arg(
                                    array(
                                        'action' => 'move-down-menu-item',
                                        'menu-item' => $item_id,
                                    ),
                                    remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                                ),
                                'move-menu_item'
                            );
                        ?>" class="item-move-down"><abbr title="<?php esc_attr_e('Move down'); ?>">&#8595;</abbr></a>
                    </span>
                    <a class="item-edit" id="edit-<?php print $item_id; ?>" title="<?php esc_attr_e('Edit Menu Item'); ?>" href="<?php
                        print ( isset( $_GET['edit-menu-item'] ) && $item_id == $_GET['edit-menu-item'] ) ? admin_url( 'nav-menus.php' ) : add_query_arg( 'edit-menu-item', $item_id, remove_query_arg( $removed_args, admin_url( 'nav-menus.php#menu-item-settings-' . $item_id ) ) );
                    ?>"><?php _e( 'Edit Menu Item', 'mi' ); ?></a>
                </span>
            </dt>
        </dl>

        <div class="menu-item-settings" id="menu-item-settings-<?php print $item_id; ?>">
            <?php if( 'custom' == $item->type ) : ?>
                <p class="field-url description description-wide">
                    <label for="edit-menu-item-url-<?php print $item_id; ?>">
                        <?php _e( 'URL', 'mi' ); ?><br />
                        <input type="text" id="edit-menu-item-url-<?php print $item_id; ?>" class="widefat code edit-menu-item-url" name="menu-item-url[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->url ); ?>" />
                    </label>
                </p>
            <?php endif; ?>
            <p class="description description-thin">
                <label for="edit-menu-item-title-<?php print $item_id; ?>">
                    <?php _e( 'Navigation Label', 'mi' ); ?><br />
                    <input type="text" id="edit-menu-item-title-<?php print $item_id; ?>" class="widefat edit-menu-item-title" name="menu-item-title[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->title ); ?>" />
                </label>
            </p>
            <p class="description description-thin">
                <label for="edit-menu-item-attr-title-<?php print $item_id; ?>">
                    <?php _e( 'Title Attribute', 'mi' ); ?><br />
                    <input type="text" id="edit-menu-item-attr-title-<?php print $item_id; ?>" class="widefat edit-menu-item-attr-title" name="menu-item-attr-title[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->post_excerpt ); ?>" />
                </label>
            </p>
            <p class="field-link-target description">
                <label for="edit-menu-item-target-<?php print $item_id; ?>">
                    <input type="checkbox" id="edit-menu-item-target-<?php print $item_id; ?>" value="_blank" name="menu-item-target[<?php print $item_id; ?>]"<?php checked( $item->target, '_blank' ); ?> />
                    <?php _e( 'Open link in a new window/tab', 'mi' ); ?>
                </label>
            </p>
            <p class="field-css-classes description description-thin">
                <label for="edit-menu-item-classes-<?php print $item_id; ?>">
                    <?php _e( 'CSS Classes (optional)', 'mi' ); ?><br />
                    <input type="text" id="edit-menu-item-classes-<?php print $item_id; ?>" class="widefat code edit-menu-item-classes" name="menu-item-classes[<?php print $item_id; ?>]" value="<?php echo esc_attr( implode(' ', $item->classes ) ); ?>" />
                </label>
            </p>
            <p class="field-xfn description description-thin">
                <label for="edit-menu-item-xfn-<?php print $item_id; ?>">
                    <?php _e( 'Link Relationship (XFN)', 'mi' ); ?><br />
                    <input type="text" id="edit-menu-item-xfn-<?php print $item_id; ?>" class="widefat code edit-menu-item-xfn" name="menu-item-xfn[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->xfn ); ?>" />
                </label>
            </p>
            <p class="field-description description description-wide">
                <label for="edit-menu-item-description-<?php print $item_id; ?>">
                    <?php _e( 'Description', 'mi' ); ?><br />
                    <textarea id="edit-menu-item-description-<?php print $item_id; ?>" class="widefat edit-menu-item-description" rows="3" cols="20" name="menu-item-description[<?php print $item_id; ?>]"><?php print esc_html( $item->description ); // textarea_escaped ?></textarea>
                    <span class="description"><?php _e('The description will be displayed in the menu if the current theme supports it.', 'mi'); ?></span>
                </label>
            </p>        
            <?php
            /*
             * This is the added field
             */
     
			foreach ($custom_fields as $field => $property):
			?>      
			<p class="field-<?php print $property['name']; ?> description description-wide">
				<label for="edit-menu-item-<?php print $property['name']; ?>-<?php print $item_id; ?>">
					<?php _e( $property['label'] ); ?>
					<?php if ($property['type'] == 'checkbox'): ?>
					<input type="hidden" value="" name="menu_item_<?php print $property['name']; ?>[<?php print $item_id; ?>]" />
					<input type="checkbox" id="edit-menu-item-<?php print $property['name']; ?>-<?php print $item_id; ?>" value="true" name="menu_item_<?php print $property['name']; ?>[<?php print $item_id; ?>]"<?php checked( $item->{$property['name']}, 'true' ); ?> />
					<?php else: ?>
					<input type="text" id="edit-menu-item-<?php print $property['name']; ?>-<?php print $item_id; ?>" class="widefat edit-menu-item-<?php print $property['name']; ?>" name="menu_item_<?php print $property['name']; ?>[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->{$property['name']} ); ?>" />
					<?php endif; ?>
				</label>
			</p>
			<?php endforeach; ?>
            <p class="field-custom description description-wide hide-style3">
                <label for="edit-menu-item-custom-<?php print $item_id; ?>">
                    <?php _e( 'Menu Icon', 'mi' ); ?><br />
                    <input type="text" id="edit-menu-item-custom-<?php print $item_id; ?>" placeholder="icon-browser" class="widefat code edit-menu-item-custom" name="menu-item-custom[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->custom ); ?>" />
                </label>
                <span class="description">Enter the name of the icon. List icons http://www.elegantthemes.com/blog/resources/how-to-use-and-embed-an-icon-font-on-your-website#codes</span>
            </p>
            <p class="field-custom description description-wide hide-style3">
                <label for="edit-menu-item-icon-color-<?php print $item_id; ?>">
                    <?php _e( 'Icom color', 'mi' ); ?><br />
                    <input type="text" id="edit-menu-item-icon-color-<?php print $item_id; ?>" placeholder="#ffffff" class="widefat code edit-menu-item-icon-color" name="menu-item-icon-color[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->customicon ); ?>" />
                </label>
                <span class="description">Enter hex color. http://www.w3schools.com/tags/ref_colorpicker.asp</span>
            </p>
            <p class="field-custom description description-wide hide-style3">
                <label for="edit-menu-item-custom-color-<?php print $item_id; ?>">
                    <?php _e( 'Item background color', 'mi' ); ?><br />
                    <input type="text" id="edit-menu-item-custom-color-<?php print $item_id; ?>" placeholder="#ab977a" class="widefat code edit-menu-item-custom-color" name="menu-item-custom-color[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->customcolor ); ?>" />
                </label>
                <span class="description">Enter hex color. http://www.w3schools.com/tags/ref_colorpicker.asp</span>
            </p>
            <?php
            /*
             * end added field
             */
            ?>
            <div class="menu-item-actions description-wide submitbox">
                <?php if( 'custom' != $item->type && $original_title !== false ) : ?>
                    <p class="link-to-original">
                        <?php printf( __('Original: %s', 'mi'), '<a href="' . esc_attr( $item->url ) . '">' . esc_html( $original_title ) . '</a>' ); ?>
                    </p>
                <?php endif; ?>
                <a class="item-delete submitdelete deletion" id="delete-<?php print $item_id; ?>" href="<?php
                print wp_nonce_url(
                    add_query_arg(
                        array(
                            'action' => 'delete-menu-item',
                            'menu-item' => $item_id,
                        ),
                        remove_query_arg($removed_args, admin_url( 'nav-menus.php' ) )
                    ),
                    'delete-menu_item_' . $item_id
                ); ?>"><?php _e('Remove', 'mi'); ?></a> <span class="meta-sep"> | </span> <a class="item-cancel submitcancel" id="cancel-<?php print $item_id; ?>" href="<?php print esc_url( add_query_arg( array('edit-menu-item' => $item_id, 'cancel' => time()), remove_query_arg( $removed_args, admin_url( 'nav-menus.php' ) ) ) );
                    ?>#menu-item-settings-<?php print $item_id; ?>"><?php _e('Cancel', 'mi'); ?></a>
            </div>

            <input class="menu-item-data-db-id" type="hidden" name="menu-item-db-id[<?php print $item_id; ?>]" value="<?php print $item_id; ?>" />
            <input class="menu-item-data-object-id" type="hidden" name="menu-item-object-id[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->object_id ); ?>" />
            <input class="menu-item-data-object" type="hidden" name="menu-item-object[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->object ); ?>" />
            <input class="menu-item-data-parent-id" type="hidden" name="menu-item-parent-id[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->menu_item_parent ); ?>" />
            <input class="menu-item-data-position" type="hidden" name="menu-item-position[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->menu_order ); ?>" />
            <input class="menu-item-data-type" type="hidden" name="menu-item-type[<?php print $item_id; ?>]" value="<?php echo esc_attr( $item->type ); ?>" />
        </div><!-- .menu-item-settings-->
        <ul class="menu-item-transport"></ul>
    <?php
    $output .= ob_get_clean();
    }
}

?>