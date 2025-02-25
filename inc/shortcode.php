<?php


if ( ! defined( 'ABSPATH') ) {
	exit;
}


function slider_shortcode_products_slider_shortcode( $attr ) {
	$content = '';

	if ( ! class_exists( 'WC_Product_Query' ) ) {
		return $content;
	}

	$args    = array(
		'limit' => -1,
		'orderby' => 'date',
		'order' => 'DESC',
		'status' => 'publish'
	);
	$products = ( new WC_Product_Query( $args ) )->get_products();
	$products = slider_shortcode_filter_products_by_price( $products, $attr );

	$section_title = $attr['title'] ?? null;
	$template_path = SC_PLUGIN_PATH . '/templates/products-slider.php';
	if ( file_exists( $template_path ) ) {
		ob_start();
		include_once $template_path;
		$content = ob_get_clean();
	}

	return $content;
}
add_shortcode( 'flormar-test-slider', 'slider_shortcode_products_slider_shortcode' );

