<?php


if ( ! defined( 'ABSPATH' ) ) {
	exit;
} ?>


<section class="products-slider-section">
	<div class="container">
		<?php if ( $section_title ) : ?>
			<h2><?php esc_html_e( $section_title, 'slider-shortcode' ); ?></h2>
		<?php endif; ?>

		<?php if ( ! empty( $products ) ) : ?>
			<div class="products-list products-slider">
				<?php foreach ( $products as $product ) : ?>

					<div class="product-card">
						<div class="product-img">
							<?php echo $product->get_image( 'medium' ); ?>
						</div>

						<div class="title">
							<h4><?php esc_html_e( $product->get_title() ); ?></h4>
						</div>

						<div class="product-price">
							<span class="price"><?php echo wc_price( $product->get_price() ); ?></span>
						</div>
					</div>
				<?php endforeach; ?>
			</div>
		<?php else : ?>
			<p>No products Found</p>
		<?php endif; ?>
	</div>
</section>

