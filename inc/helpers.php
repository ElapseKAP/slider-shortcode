<?php

if ( ! defined( 'ABSPATH') ) {
	exit;
}


function slider_shortcode_filter_products_by_price ( $products, $attr = array() ) {
	$min_price = $attr['min-price'] ?? null;
	$max_price = $attr['max-price'] ?? null;

	return array_filter( $products, function( $product ) use ( $min_price, $max_price ) {
		$price = $product->get_price();
		if ( is_numeric( $min_price ) && $price < floatval( $min_price ) ) {
			return false;
		}

		if ( is_numeric( $max_price ) && $price > floatval( $max_price ) ) {
			return false;
		}

		return true;
	} );
}

