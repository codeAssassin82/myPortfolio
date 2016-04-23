<?php
/**
 * Loads Shortcodes and other Stuffs.
 *
 * @package mi
 * @since 1.0
 */

// Import Integration
// ----------------------------------------------------------------------------------------------------
locate_template('cs-framework/importer/init.php', true);

// TGM Integration
// ----------------------------------------------------------------------------------------------------
locate_template('cs-framework/importer/plugins/tgm/class-tgm-plugin-activation.php', true);

