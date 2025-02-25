<?php

/**
 * Plugin Name: Slider shortcode
 * Description: Products slider in shortcode
 * Author: Alex K.
 * Domain Path: /assets/lang
 * Text Domain: slider-shortcode
 */


if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'SC_PLUGIN_PATH', __DIR__ );
define( 'SC_PLUGIN_URL', plugin_dir_url( __FILE__ ) );

require_once SC_PLUGIN_PATH . '/inc/enqueues.php';

$folder_contents = scandir( SC_PLUGIN_PATH . '/inc' );
if ( count( $folder_contents ) > 2 ) {
	foreach( $folder_contents as $item ) {
		if ( in_array( $item, array( '.', '..' ) ) ) {
			continue;
		}

		require_once SC_PLUGIN_PATH . "/inc/{$item}";
	}
}

