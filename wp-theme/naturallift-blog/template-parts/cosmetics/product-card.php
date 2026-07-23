<?php
/**
 * Карточка продукта в сетке каталога.
 *
 * @package naturallift-blog
 */

$post_id = get_the_ID();
$label   = naturallift_sc_get_meta( $post_id, 'label' );
$short   = naturallift_sc_get_meta( $post_id, 'short_description' );
if ( '' === $short ) {
	$short = get_the_excerpt();
}
$price_lines = naturallift_sc_price_lines( $post_id );
$img   = naturallift_sc_product_image_url( $post_id );

$filter_attrs = array();
foreach ( naturallift_sc_product_taxonomy_groups( $post_id ) as $taxonomy => $terms ) {
	if ( is_wp_error( $terms ) || empty( $terms ) ) {
		continue;
	}
	foreach ( $terms as $term ) {
		$filter_attrs[] = esc_attr( $taxonomy . ':' . $term->slug );
	}
}
?>
<article class="sc-card" data-filters="<?php echo esc_attr( implode( ' ', $filter_attrs ) ); ?>">
	<a class="sc-card__media" href="<?php the_permalink(); ?>">
		<img src="<?php echo esc_url( $img ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" />
	</a>
	<div class="sc-card__body">
		<?php if ( $label ) : ?>
			<span class="sc-card__label"><?php echo esc_html( $label ); ?></span>
		<?php endif; ?>
		<h2 class="sc-card__title">
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
		</h2>
		<?php if ( $short ) : ?>
			<p class="sc-card__text"><?php echo esc_html( wp_strip_all_tags( $short ) ); ?></p>
		<?php endif; ?>
		<div class="sc-card__footer">
			<?php if ( ! empty( $price_lines ) ) : ?>
				<div class="sc-card__price">
					<?php foreach ( $price_lines as $line ) : ?>
						<span class="sc-card__price-line"><?php echo esc_html( $line ); ?></span>
					<?php endforeach; ?>
				</div>
			<?php endif; ?>
			<a class="sc-card__link" href="<?php the_permalink(); ?>">Подробнее</a>
		</div>
	</div>
</article>
