<?php
/**
 * Single product — Silver Cream catalog.
 */

get_header();

while ( have_posts() ) :
	the_post();
	$post_id = get_the_ID();
	$label   = naturallift_sc_get_meta( $post_id, 'label' );
	$short   = naturallift_sc_get_meta( $post_id, 'short_description' );
	$catalog = naturallift_catalog_url();
	?>

<div class="sc-product">
	<div class="container sc-product__inner">
		<nav class="sc-breadcrumb" aria-label="Хлебные крошки">
			<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Главная</a>
			<span aria-hidden="true">/</span>
			<a href="<?php echo esc_url( $catalog ); ?>">Моя косметика</a>
			<span aria-hidden="true">/</span>
			<span><?php the_title(); ?></span>
		</nav>

		<div class="sc-product__hero">
			<div class="sc-product__gallery-col">
				<?php get_template_part( 'template-parts/cosmetics/product', 'gallery' ); ?>
			</div>

			<div class="sc-product__summary">
				<?php if ( $label ) : ?>
					<span class="sc-product__label"><?php echo esc_html( $label ); ?></span>
				<?php endif; ?>
				<h1 class="sc-product__title"><?php the_title(); ?></h1>
				<?php if ( $short ) : ?>
					<p class="sc-product__lead"><?php echo esc_html( $short ); ?></p>
				<?php endif; ?>

				<div class="sc-product__buy-box">
					<?php
					$price_lines = naturallift_sc_price_lines( $post_id );
					if ( ! empty( $price_lines ) ) :
						?>
						<ul class="sc-product__prices">
							<?php foreach ( $price_lines as $line ) : ?>
								<li><?php echo esc_html( $line ); ?></li>
							<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					<a class="btn btn-primary sc-product__cta" href="<?php echo esc_url( naturallift_sc_telegram_url( $post_id ) ); ?>" target="_blank" rel="noopener noreferrer">
						Заказать в Telegram
					</a>
				</div>
			</div>
		</div>

		<div class="sc-product__details">
			<div class="sc-product__attributes-col">
				<?php get_template_part( 'template-parts/cosmetics/product', 'attributes' ); ?>
			</div>
			<div class="sc-product__tabs-col">
				<?php get_template_part( 'template-parts/cosmetics/product', 'tabs' ); ?>
			</div>
		</div>

		<?php get_template_part( 'template-parts/cosmetics/diagnostic', 'promo' ); ?>
		<?php get_template_part( 'template-parts/cosmetics/product', 'related' ); ?>

		<?php if ( get_the_content() ) : ?>
			<div class="sc-product__editor-content">
				<?php the_content(); ?>
			</div>
		<?php endif; ?>
	</div>
</div>

	<?php
endwhile;

get_footer();
