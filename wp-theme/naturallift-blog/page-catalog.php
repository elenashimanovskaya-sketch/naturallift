<?php
/**
 * Template Name: Cosmetics Catalog
 */

get_header();

$catalog_url = naturallift_catalog_url();

$filter_taxonomies = array(
	'skin_type'      => 'Тип кожи',
	'skin_concern'   => 'Задача',
	'product_effect' => 'Эффект',
);

$products_query = new WP_Query(
	array(
		'post_type'      => 'sc_product',
		'posts_per_page' => -1,
		'orderby'        => array(
			'menu_order' => 'ASC',
			'title'      => 'ASC',
		),
		'post_status'    => 'publish',
	)
);
?>

<div class="sc-catalog">
	<div class="container sc-catalog__inner">
		<header class="sc-catalog__header">
			<span class="product-promo__kicker">Premium Cosmeceuticals</span>
			<h1 class="sc-catalog__title">Моя косметика</h1>
			<p class="sc-catalog__subtitle">Авторская линия натуральной косметики Silver Cream</p>
			<div class="divider"></div>
		</header>

		<div class="sc-catalog__filters" data-sc-filters>
			<?php foreach ( $filter_taxonomies as $taxonomy => $label ) : ?>
				<?php
				$terms = get_terms(
					array(
						'taxonomy'   => $taxonomy,
						'hide_empty' => true,
					)
				);
				if ( is_wp_error( $terms ) || empty( $terms ) ) {
					continue;
				}
				?>
				<div class="sc-filter-group">
					<span class="sc-filter-group__label"><?php echo esc_html( $label ); ?></span>
					<div class="sc-filter-group__chips">
						<button type="button" class="sc-filter-chip is-active" data-filter="" data-taxonomy="<?php echo esc_attr( $taxonomy ); ?>">Все</button>
						<?php foreach ( $terms as $term ) : ?>
							<button
								type="button"
								class="sc-filter-chip"
								data-filter="<?php echo esc_attr( $taxonomy . ':' . $term->slug ); ?>"
								data-taxonomy="<?php echo esc_attr( $taxonomy ); ?>"
							>
								<?php echo esc_html( $term->name ); ?>
							</button>
						<?php endforeach; ?>
					</div>
				</div>
			<?php endforeach; ?>
		</div>

		<?php if ( $products_query->have_posts() ) : ?>
			<div class="sc-catalog__grid" data-sc-grid>
				<?php
				while ( $products_query->have_posts() ) :
					$products_query->the_post();
					get_template_part( 'template-parts/cosmetics/product', 'card' );
				endwhile;
				wp_reset_postdata();
				?>
			</div>
			<p class="sc-catalog__empty" data-sc-empty hidden>Нет продуктов по выбранным фильтрам.</p>
		<?php else : ?>
			<p class="sc-catalog__empty">Каталог скоро будет пополнен. Напишите в <a href="https://t.me/silver_cream" target="_blank" rel="noopener noreferrer">Telegram</a> для подбора ухода.</p>
		<?php endif; ?>

		<?php get_template_part( 'template-parts/cosmetics/diagnostic', 'promo' ); ?>

		<section class="sc-catalog__philosophy">
			<span class="product-promo__kicker">Философия Silver Cream</span>
			<h2>Синергия косметики и фейс-йоги</h2>
			<p>
				Я создаю косметику Silver Cream по принципу полной синергии с мануальными практиками. Натуральные формулы из профессиональных ингредиентов подготавливают кожу к массажу, улучшают скольжение и мгновенно усваиваются при разогреве тканей во время фейс-йоги.
			</p>
			<div class="sc-catalog__sign">С любовью к вашей коже, Елена Шимановская</div>
			<a class="btn" href="<?php echo esc_url( naturallift_get_page_url( 'main-silver-cream' ) ); ?>">О бренде Silver Cream</a>
		</section>
	</div>
</div>

<?php get_footer(); ?>
