<?php
/**
 * Атрибуты продукта — левый сайдбар с чипами.
 *
 * @package naturallift-blog
 */

$post_id = get_the_ID();
$groups  = naturallift_sc_product_taxonomy_groups( $post_id );
$labels  = naturallift_sc_taxonomy_labels();
?>
<aside class="sc-product__sidebar">
	<?php foreach ( $groups as $taxonomy => $terms ) : ?>
		<?php if ( is_wp_error( $terms ) || empty( $terms ) ) : ?>
			<?php continue; ?>
		<?php endif; ?>
		<div class="sc-product__attr-group">
			<h3 class="sc-product__attr-title"><?php echo esc_html( $labels[ $taxonomy ] ?? $taxonomy ); ?></h3>
			<ul class="sc-product__chips">
				<?php foreach ( $terms as $term ) : ?>
					<li><span class="sc-chip"><?php echo esc_html( $term->name ); ?></span></li>
				<?php endforeach; ?>
			</ul>
		</div>
	<?php endforeach; ?>
</aside>
