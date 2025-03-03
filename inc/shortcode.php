<?php


if ( ! defined( 'ABSPATH') ) {
	exit;
}


function slider_shortcode_products_slider_shortcode( $attr = array() ) {
	$content = '';

	if ( ! class_exists( 'WC_Product_Query' ) ) {
		return $content;
	}

	$args = array(
		'post_type'      => 'product',
		'post_status'    => 'publish',
		'posts_per_page' => -1,
		'orderby'        => 'DESC',
		'fields'         => 'ids',
		'tax_query' => array(
			array(
				'taxonomy' => 'product_type',
				'field'    => 'slug',
				'terms'    => array( 'grouped' ),
				'operator' => 'NOT IN'
			)
		)
	);

	foreach( $attr as $item => $val ) {
		if ( ! in_array( $item, array( 'min-price', 'max-price' ) ) ) {
			continue;
		}

		$args['meta_query'][] = array(
			'key'     => '_price',
			'value'   => $val,
			'compare' => 'min-price' == $item ? '>=' : '<=',
			'type'    => 'NUMERIC'
		) ;
	}

	if ( key_exists( 'meta_query', $args ) && 2 == count( $args['meta_query'] ) ) {
		$args['meta_query']['relation'] = 'AND';
	}

	$query = new WP_Query( $args );
	if ( $query->have_posts() ) {
		$products = array_map(
			fn( $prod_id ) => wc_get_product( $prod_id ),
			$query->get_posts()
		);

		$section_title = $attr['title'] ?? null;
		$template_path = SC_PLUGIN_PATH . '/templates/products-slider.php';
		if ( file_exists( $template_path ) ) {
			ob_start();
			include_once $template_path;
			$content = ob_get_clean();
		}
	}

	return $content;
}
add_shortcode( 'flormar-test-slider', 'slider_shortcode_products_slider_shortcode' );

