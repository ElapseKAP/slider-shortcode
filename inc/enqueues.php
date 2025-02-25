<?php

if ( ! defined( 'ABSPATH') ) {
	exit;
}


function slider_shortcode_enqueues() {
	wp_enqueue_style(
		'slick-css',
		SC_PLUGIN_URL . 'assets/libs/slick/slick.css',
		false,
		'1.8.1',
	);

	wp_enqueue_style(
		'slick-theme-css',
		SC_PLUGIN_URL . 'assets/libs/slick/slick-theme.css',
		false,
		'1.8.1',
	);

	wp_enqueue_script(
		'slick-js',
		SC_PLUGIN_URL . 'assets/libs/slick/slick.min.js',
		array( 'jquery' ),
		'1.8.1',
		array( 'footer' => true )
	);

	wp_enqueue_style(
		'slider-shortcode-styles',
		SC_PLUGIN_URL . 'assets/css/style.css'
	);

	wp_enqueue_script(
		'slider-shortcode-script',
		SC_PLUGIN_URL . 'assets/js/script.js',
		array( 'slick-js' ),
		'1.0.0',
		array( 'footer' => true )
	);
}
add_action( 'wp_enqueue_scripts', 'slider_shortcode_enqueues' );

