<?php

if ( ! class_exists( 'ET_Builder_Element' ) ) {
	return;
}

$module_files = glob( __DIR__ . '/modules/*/*.php' );

// Load custom Divi Builder modules
foreach ( (array) $module_files as $module_file ) {
	if ( $module_file && preg_match( "/\/modules\/\b([^\/]+)\/\\1\.php$/", $module_file ) ) {
		require_once $module_file;
	}
}
function _enqueue_lightbox() {
    $dir = plugins_url('/divilocal');
    wp_enqueue_script('lightbox',$dir.'/includes/scripts/lightbox.js','jquery');
    wp_enqueue_style('lightbox_css', $dir.'/includes/css/lightbox.css');
}
add_action('wp_enqueue_scripts','_enqueue_lightbox');