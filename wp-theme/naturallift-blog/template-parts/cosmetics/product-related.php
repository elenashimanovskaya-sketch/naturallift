<?php
/**
 * Блок «С этим товаром покупают».
 *
 * @package naturallift-blog
 */

$post_id  = get_the_ID();
$related  = naturallift_sc_related_products( $post_id, 3 );

if ( empty( $related ) ) {
	return;
}
?>
<section class="sc-related">
	<h2 class="sc-related__title">С этим товаром покупают</h2>
	<div class="sc-related__grid">
		<?php
		foreach ( $related as $related_post ) :
			setup_postdata( $related_post );
			$rid   = (int) $related_post->ID;
			$img   = naturallift_sc_product_image_url( $rid );
			$price_lines = naturallift_sc_price_lines( $rid );
			?>
			<article class="sc-related__card">
				<a class="sc-related__media" href="<?php echo esc_url( get_permalink( $rid ) ); ?>">
					<img src="<?php echo esc_url( $img ); ?>" alt="<?php echo esc_attr( get_the_title( $rid ) ); ?>" loading="lazy" decoding="async" />
				</a>
				<div class="sc-related__body">
					<h3 class="sc-related__name">
						<a href="<?php echo esc_url( get_permalink( $rid ) ); ?>"><?php echo esc_html( get_the_title( $rid ) ); ?></a>
					</h3>
					<?php if ( ! empty( $price_lines ) ) : ?>
						<div class="sc-related__price">
							<?php foreach ( $price_lines as $line ) : ?>
								<span class="sc-related__price-line"><?php echo esc_html( $line ); ?></span>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
				</div>
			</article>
		<?php endforeach; ?>
		<?php wp_reset_postdata(); ?>
	</div>
</section>
