<?php
/**
 * Галерея продукта — Dior-style, фон бежевый.
 *
 * @package naturallift-blog
 */

$post_id = get_the_ID();
$images  = naturallift_sc_gallery_urls( $post_id );

if ( empty( $images ) ) {
	return;
}
?>
<div class="sc-gallery" data-sc-gallery>
	<div class="sc-gallery__stage">
		<img
			class="sc-gallery__main"
			data-sc-gallery-main
			src="<?php echo esc_url( $images[0] ); ?>"
			alt="<?php the_title_attribute(); ?>"
		/>
	</div>
	<?php if ( count( $images ) > 1 ) : ?>
		<div class="sc-gallery__thumbs" role="tablist" aria-label="Фото продукта">
			<?php foreach ( $images as $index => $url ) : ?>
				<button
					type="button"
					class="sc-gallery__thumb<?php echo 0 === $index ? ' is-active' : ''; ?>"
					data-sc-gallery-thumb="<?php echo esc_url( $url ); ?>"
					aria-label="Фото <?php echo esc_attr( (string) ( $index + 1 ) ); ?>"
				>
					<img src="<?php echo esc_url( $url ); ?>" alt="" loading="lazy" decoding="async" />
				</button>
			<?php endforeach; ?>
		</div>
	<?php endif; ?>
</div>
