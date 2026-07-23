<?php
/**
 * Template Name: Моя косметика (Landing)
 * Description: Полнофункциональная премиум посадочная страница Silver Cream (дизайн deesse.com).
 */

$product_img = 'https://naturallift.ru/wp-content/uploads/2026/03/elena_shim2026-03-11t154406.443z.jpg';
$logo_url    = 'https://naturallift.ru/wp-content/uploads/2026/05/sc-na-prozrachn-fone.png';
$catalog_url = naturallift_get_page_url( 'cosmetics' );
$philosophy_url = naturallift_get_page_url( 'philosophy' );
$quiz_url    = naturallift_get_page_url( 'diagnostika-kozhi' );
$blog_url    = home_url( '/' );

$nav_links = array(
	array( 'label' => 'Диагностика', 'url' => '#sc-diagnostic' ),
	array( 'label' => 'Каталог',     'url' => $catalog_url ),
	array( 'label' => 'О бренде',    'url' => $philosophy_url ),
	array( 'label' => 'Философия',   'url' => $philosophy_url ),
	array( 'label' => 'FAQ',         'url' => '#sc-faq' ),
);

$social_links = array(
	array(
		'label' => 'Instagram: lena.shimanovskaya',
		'url'   => 'https://www.instagram.com/lena.shimanovskaya',
		'icon'  => 'instagram',
	),
	array(
		'label' => 'YouTube: бьюти советы',
		'url'   => 'https://www.youtube.com/channel/UC04cTZmebO4CRv7EKC-VM7w',
		'icon'  => 'youtube',
	),
	array(
		'label' => 'WhatsApp: написать',
		'url'   => 'https://wa.me/79166963801?text=' . rawurlencode( 'Добрый день! У меня вопрос с сайта Silver Cream' ),
		'icon'  => 'whatsapp',
	),
	array(
		'label' => 'Telegram: @silver_cream',
		'url'   => 'https://t.me/silver_cream',
		'icon'  => 'telegram',
	),
	array(
		'label' => 'MAX: канал омоложения лица',
		'url'   => 'https://max.ru/id772800956730_biz',
		'icon'  => 'max',
		'class' => 'side-rail__social-link--max',
	),
);

$header_nav_links = array(
	array( 'label' => 'Философия ухода', 'url' => $philosophy_url ),
	array( 'label' => 'Моя косметика',  'url' => $catalog_url ),
	array( 'label' => 'Мой блог',       'url' => $blog_url ),
	array( 'label' => 'Диагностика',    'url' => '#sc-diagnostic' ),
);

function silvercream_render_social_icon( string $icon ): void {
	$icons = array(
		'instagram' => '<path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.209-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>',
		'youtube'   => '<path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>',
		'whatsapp'  => '<path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.435 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>',
		'telegram'  => '<path d="M11.944 0A12 12 0 0 0 0 12a12 12 0 0 0 12 12 12 12 0 0 0 12-12A12 12 0 0 0 12 0a12 12 0 0 0-.056 0zm4.962 7.224c.1-.002.321.023.465.14a.506.506 0 0 1 .171.325c.016.093.036.306.02.472-.18 1.898-.962 6.502-1.36 8.627-.168.9-.499 1.201-.82 1.23-.696.065-1.225-.46-1.9-.902-1.056-.693-1.653-1.124-2.678-1.8-1.185-.78-.417-1.21.258-1.91.177-.184 3.247-2.977 3.307-3.23.007-.032.014-.15-.056-.212s-.174-.041-.249-.024c-.106.024-1.793 1.14-5.061 3.345-.48.33-.913.49-1.302.48-.428-.008-1.252-.241-1.865-.44-.752-.245-1.349-.374-1.297-.789.027-.216.325-.437.893-.663 3.498-1.524 5.831-2.529 6.998-3.014 3.332-1.386 4.025-1.627 4.476-1.635z"/>',
		'max'       => '<path d="M7 17V7h2.45l2.58 7.35L14.62 7H17v10h-1.95v-7.2L12.58 17h-1.35L9 9.92V17z"/>',
	);

	if ( isset( $icons[ $icon ] ) ) {
		printf(
			'<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="18" height="18" aria-hidden="true" fill="currentColor">%s</svg>',
			$icons[ $icon ]
		);
	}
}

function silvercream_render_spin_badge( string $variant, string $uid ): void {
	$phrase = 'Silver Cream любит тебя';
	$heart  = '<tspan class="spin-badge__heart"> &#9829;&#xFE0E; </tspan>';
	$loop   = $phrase . $heart . $phrase . $heart . $phrase . $heart;
	$path_id = 'mkSpinPath' . $uid;
	?>
	<div class="spin-badge spin-badge--<?php echo esc_attr( $variant ); ?>" aria-hidden="true">
		<svg class="spin-badge__svg" viewBox="0 0 200 200" xmlns="http://www.w3.org/2000/svg" role="img">
			<title><?php echo esc_html( $phrase ); ?></title>
			<defs>
				<path id="<?php echo esc_attr( $path_id ); ?>" fill="none" d="M100,100 m-80,0 a80,80 0 1,1 160,0 a80,80 0 1,1 -160,0" />
			</defs>
			<g class="spin-badge__ring">
				<text class="spin-badge__text" fill="currentColor">
					<textPath href="#<?php echo esc_attr( $path_id ); ?>" startOffset="0" textLength="502.65" lengthAdjust="spacing">
						<?php echo $loop; ?>
					</textPath>
				</text>
			</g>
		</svg>
	</div>
	<?php
}
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>
<body <?php body_class( 'moya-kosmetika-landing-page' ); ?>>
<?php wp_body_open(); ?>

<!-- Шапка лендинга -->
<header class="site-header" id="sc-header">
	<div class="container site-header__inner">
		<a class="brand" href="#" aria-label="Silver Cream — на главную">
			<img class="brand__mark brand__mark--img" src="<?php echo esc_url( $logo_url ); ?>" alt="" width="56" height="56" decoding="async" />
			<span class="brand__text">
				<span class="brand__name">Silver Cream</span>
				<span class="brand__tag">Cosmeceuticals</span>
			</span>
		</a>

		<nav class="site-header__nav" aria-label="Основная навигация">
			<?php foreach ( $header_nav_links as $link ) : ?>
				<a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a>
			<?php endforeach; ?>
		</nav>

		<div class="site-header__actions">
			<div class="site-header__lang" aria-label="Язык">
				<a href="#" lang="en">EN</a>
				<span aria-hidden="true">|</span>
				<a href="#" lang="ru" aria-current="true">RU</a>
			</div>
		</div>
	</div>
</header>

<!-- Правый сайд-бар (меню и соцсети) -->
<aside class="side-rail" aria-label="Меню и соцсети">
	<button class="side-rail__menu" type="button" id="mk-menu-open" aria-controls="mk-menu-overlay" aria-expanded="false" aria-label="Открыть меню">
		<span class="side-rail__menu-label">Меню</span>
		<span class="side-rail__menu-bars" aria-hidden="true">
			<span></span>
			<span></span>
			<span></span>
		</span>
	</button>

	<nav class="side-rail__social" aria-label="Соцсети Silver Cream">
		<?php foreach ( $social_links as $link ) : ?>
			<a class="side-rail__social-link<?php echo ! empty( $link['class'] ) ? ' ' . esc_attr( $link['class'] ) : ''; ?>" href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $link['label'] ); ?>">
				<?php silvercream_render_social_icon( $link['icon'] ); ?>
			</a>
		<?php endforeach; ?>
	</nav>
</aside>

<!-- Полноэкранное меню -->
<div class="menu-overlay" id="mk-menu-overlay" aria-hidden="true" hidden>
	<div class="menu-overlay__panel" role="dialog" aria-modal="true" aria-label="Навигация">
		<button class="menu-overlay__close" type="button" id="mk-menu-close" aria-label="Закрыть меню">
			<span aria-hidden="true">&times;</span>
		</button>

		<nav class="menu-overlay__nav" aria-label="Основное меню">
			<?php foreach ( $nav_links as $link ) : ?>
				<a class="menu-overlay__link" href="<?php echo esc_url( $link['url'] ); ?>">
					<?php echo esc_html( $link['label'] ); ?>
				</a>
			<?php endforeach; ?>
		</nav>

		<a class="btn-primary menu-overlay__cta" href="<?php echo esc_url( $catalog_url ); ?>">
			В каталог
		</a>
	</div>
</div>

<main>
	<!-- HERO БЛОК -->
	<section class="hero" id="sc-hero">
		<div class="container hero__grid">
			<div class="hero__copy">
				<p class="hero__eyebrow">Откройте для себя</p>
				<h1 class="hero__title">Красоту,<br />которую видно —<br /><em>научную</em> и нежную</h1>
				<p class="hero__lead">Silver Cream — авторская cosmeceuticals-линия в золотых флаконах: формулы с активными фазами, прозрачный состав и видимый результат для кожи лица и тела.</p>
				<div class="hero__actions">
					<a class="btn-primary" href="<?php echo esc_url( $catalog_url ); ?>">Смотреть каталог</a>
					<a class="btn-ghost" href="#sc-concept">Узнать о бренде</a>
				</div>
				<ul class="hero__benefits">
					<li>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
						Золотые флаконы — премиальная подача
					</li>
					<li>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
						Активные фазы и прозрачный состав
					</li>
					<li>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
						Ручная работа и малые серии
					</li>
					<li>
						<svg width="18" height="18" viewBox="0 0 24 24" fill="none" aria-hidden="true"><path d="M20 6L9 17l-5-5" stroke="currentColor" stroke-width="2.2" stroke-linecap="round"/></svg>
						Синергия с практиками омоложения
					</li>
				</ul>
			</div>
			<div class="hero__visual">
				<div class="hero__photo-wrap">
					<img class="hero__product" src="<?php echo esc_url( $product_img ); ?>" alt="Silver Cream" width="640" height="800" loading="eager" decoding="async" />
					<div class="skin-promo skin-promo--hero" id="sc-skin-promo">
						<a class="skin-promo__circle" href="<?php echo esc_url( $quiz_url ); ?>">
							<span class="skin-promo__eyebrow">Новинка</span>
							<strong class="skin-promo__title">Диагностика кожи онлайн</strong>
							<span class="skin-promo__cta">Начать</span>
						</a>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- О БРЕНДЕ / КОНЦЕПТ -->
	<section class="section section--white" id="sc-concept">
		<div class="container">
			<div class="section-head">
				<p class="section-head__kicker">Ваш успех с Silver Cream</p>
				<h2 class="section-head__title">Формулы, которые работают <em>вместе</em> с вами</h2>
				<p class="section-head__text">Мы соединяем лабораторную точность и природные экстракты — как на вашем эталонном флаконе: состав на экране, активные фазы в формуле, золото в руках.</p>
			</div>
			<div class="concept">
				<div class="concept__panel">
					<h3>Cosmeceuticals без компромиссов</h3>
					<p>Каждый продукт — это продуманная система: жирная, водная и активная фазы. Гиалуроновая кислота, пептиды, масла и экстракты подбираются под задачу: увлажнение, сияние, упругость, комфорт чувствительной кожи.</p>
					<p class="concept__shout">Красота — это забота, упакованная в золото</p>
					<a class="btn-primary" href="<?php echo esc_url( $catalog_url ); ?>">Выбрать продукт</a>
				</div>
				<div class="concept__visual">
					<img src="<?php echo esc_url( $product_img ); ?>" alt="" loading="lazy" decoding="async" />
					<div class="concept__visual-content">
						<strong>Лаборатория и природа в одном флаконе</strong>
						<span>Ручная работа · малые партии · честный состав</span>
					</div>
				</div>
			</div>
		</div>
	</section>

	<!-- БЕГУЩАЯ СТРОКА -->
	<div class="marquee" aria-hidden="true">
		<div class="marquee__track">
			<span>Чистые формулы</span><span>+++</span>
			<span>Золотая упаковка</span><span>+++</span>
			<span>Видимый результат</span><span>+++</span>
			<span>Silver Cream</span><span>+++</span>
			<span>Cosmeceuticals</span><span>+++</span>
			<span>Чистые формулы</span><span>+++</span>
			<span>Золотая упаковка</span><span>+++</span>
			<span>Видимый результат</span><span>+++</span>
			<span>Silver Cream</span><span>+++</span>
			<span>Cosmeceuticals</span><span>+++</span>
		</div>
	</div>

	<!-- ДИАГНОСТИКА -->
	<section class="section section--blush skin-diagnostic" id="sc-diagnostic">
		<div class="container skin-diagnostic__grid">
			<div class="skin-diagnostic__copy">
				<p class="section-head__kicker">Диагностика кожи</p>
				<h2 class="section-head__title skin-diagnostic__title">Узнайте, что нужно <em>вашей коже</em> сегодня</h2>
				<p class="skin-diagnostic__lead">Короткий квиз Silver Cream поможет определить тип кожи, зоны внимания и подобрать продукты линии — без догадок и лишних покупок.</p>
				<ul class="skin-diagnostic__list">
					<li>5–7 вопросов о типе кожи и ритуале</li>
					<li>Рекомендации из каталога Silver Cream</li>
					<li>Советы по сочетанию с фейс-йогой и массажем</li>
				</ul>
				<a class="btn-primary" href="<?php echo esc_url( $quiz_url ); ?>" target="_blank">Начать диагностику</a>
			</div>
			<div class="skin-diagnostic__visual">
				<img src="<?php echo esc_url( $product_img ); ?>" alt="Silver Cream" loading="lazy" decoding="async" />
			</div>
		</div>
	</section>

	<!-- КАТАЛОГ / MUST HAVES -->
	<section class="section section--blush" id="sc-catalog">
		<div class="container">
			<div class="section-head">
				<h2 class="section-head__title">Must-have, с которых стоит <em>начать</em></h2>
				<p class="section-head__text">Три ключевых продукта линии — для ежедневного ритуала, сияния и глубокого увлажнения.</p>
			</div>
			<div class="products-grid">
				<?php
				$featured_slugs = array(
					'dnevnoj-krem-dlya-suhoj-kozhi',
					'antivozrastnoj-dnevnoj-krem',
					'nochnaya-maslyanaya-syvorotka',
				);
				$featured_ids = array();
				foreach ( $featured_slugs as $featured_slug ) {
					$featured_post = get_page_by_path( $featured_slug, OBJECT, 'sc_product' );
					if ( $featured_post ) {
						$featured_ids[] = (int) $featured_post->ID;
					}
				}
				$featured_query = new WP_Query(
					array(
						'post_type'      => 'sc_product',
						'post__in'       => $featured_ids,
						'posts_per_page' => count( $featured_ids ),
						'orderby'        => 'post__in',
						'post_status'    => 'publish',
					)
				);
				if ( $featured_query->have_posts() ) :
					while ( $featured_query->have_posts() ) :
						$featured_query->the_post();
						$card_id    = get_the_ID();
						$card_label = naturallift_sc_get_meta( $card_id, 'label' );
						$card_short = naturallift_sc_get_meta( $card_id, 'short_description' );
						$card_img   = naturallift_sc_product_image_url( $card_id );
						if ( ! $card_label ) {
							$card_label = 'Silver Cream';
						}
						?>
				<article class="product-card">
					<div class="product-card__media">
						<img src="<?php echo esc_url( $card_img ); ?>" alt="<?php the_title_attribute(); ?>" loading="lazy" decoding="async" />
					</div>
					<div class="product-card__body">
						<span class="product-card__label"><?php echo esc_html( wp_strip_all_tags( $card_label ) ); ?></span>
						<h3 class="product-card__title"><?php the_title(); ?></h3>
						<p class="product-card__text"><?php echo esc_html( wp_strip_all_tags( $card_short ?: get_the_excerpt() ) ); ?></p>
						<a class="product-card__link" href="<?php the_permalink(); ?>">Подробнее</a>
					</div>
				</article>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					?>
				<article class="product-card">
					<div class="product-card__body">
						<h3 class="product-card__title">Каталог Silver Cream</h3>
						<p class="product-card__text">Авторская линия натуральной косметики для синергии с фейс-йогой.</p>
						<a class="product-card__link" href="<?php echo esc_url( $catalog_url ); ?>">Смотреть каталог</a>
					</div>
				</article>
				<?php endif; ?>
			</div>
		</div>
	</section>

	<!-- ИСТОРИЯ СЕМЬИ / СТАТУС -->
	<section class="section section--white" id="sc-story">
		<div class="container story">
			<div>
				<p class="section-head__kicker">Как всё начиналось</p>
				<h2 class="section-head__title" style="text-align:left;margin-bottom:1rem;">История, которая началась с <em>заботы</em></h2>
				<p class="section-head__text" style="text-align:left;margin:0;">Silver Cream вырос из практики омоложения и глубокого понимания кожи: когда упражнения и массаж меняют лицо, косметика должна поддерживать, а не мешать. Так появилась линия в золотых флаконах — видимая, честная, тактильно премиальная.</p>
				<ul class="story__list">
					<li>Авторские формулы и ручная работа</li>
					<li>Золотая упаковка как часть ритуала</li>
					<li>Открытый состав — активные фазы на этикетке</li>
				</ul>
				<a class="btn-primary" href="<?php echo esc_url( $philosophy_url ); ?>">Начать знакомство</a>
			</div>
			<div class="story__media">
				<div class="story__image">
					<img src="<?php echo esc_url( $product_img ); ?>" alt="Silver Cream" loading="lazy" decoding="async" />
				</div>
				<?php silvercream_render_spin_badge( 'story-below', 'Story' ); ?>
			</div>
		</div>
	</section>

	<!-- ТЕМЫ О КОЖЕ / ПОСТЫ -->
	<section class="section section--white articles" id="sc-articles">
		<div class="container">
			<div class="articles__head">
				<h2 class="articles__title">Темы о коже</h2>
				<a class="articles__all" href="<?php echo esc_url( $blog_url ); ?>">Все статьи</a>
			</div>
			<div class="articles__grid">
				<?php
				$recent_posts = new WP_Query( array(
					'post_type'      => 'post',
					'posts_per_page' => 3,
				) );

				if ( $recent_posts->have_posts() ) :
					while ( $recent_posts->have_posts() ) : $recent_posts->the_post();
						$cats = get_the_category();
						$cat_name = ! empty( $cats ) ? $cats[0]->name : 'Полезное';
						$p_img = naturallift_get_post_image_url( get_the_ID() );
						?>
						<article class="article-card">
							<div class="article-card__body">
								<span class="article-card__cat"><?php echo esc_html( $cat_name ); ?></span>
								<h3 class="article-card__title">
									<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
								</h3>
							</div>
							<a class="article-card__media" href="<?php the_permalink(); ?>" tabindex="-1" aria-hidden="true">
								<img src="<?php echo esc_url( $p_img ); ?>" alt="" loading="lazy" decoding="async" />
							</a>
						</article>
						<?php
					endwhile;
					wp_reset_postdata();
				else :
					// Фолбэк на статические карточки, если постов в WP еще нет
					$static_articles = array(
						array(
							'title' => 'От anti-age к долголетию кожи: новый взгляд на уход',
							'category' => 'Здоровая кожа',
							'url' => '#',
						),
						array(
							'title' => 'Активные фазы: как читать состав Silver Cream',
							'category' => 'Состав и формулы',
							'url' => '#',
						),
						array(
							'title' => 'Покраснения и чувствительность: мягкий уход без раздражения',
							'category' => 'Чувствительная кожа',
							'url' => '#',
						),
					);
					foreach ( $static_articles as $art ) :
						?>
						<article class="article-card">
							<div class="article-card__body">
								<span class="article-card__cat"><?php echo esc_html( $art['category'] ); ?></span>
								<h3 class="article-card__title">
									<a href="<?php echo esc_url( $art['url'] ); ?>"><?php echo esc_html( $art['title'] ); ?></a>
								</h3>
							</div>
							<a class="article-card__media" href="<?php echo esc_url( $art['url'] ); ?>" tabindex="-1" aria-hidden="true">
								<img src="<?php echo esc_url( $product_img ); ?>" alt="" loading="lazy" decoding="async" />
							</a>
						</article>
						<?php
					endforeach;
				endif;
				?>
			</div>
		</div>
	</section>

	<!-- ШАГИ РИТУАЛА -->
	<section class="section section--blush" id="sc-steps">
		<div class="container">
			<div class="section-head">
				<p class="section-head__kicker">С чего начать</p>
				<h2 class="section-head__title">Четыре шага к вашему <em>ритуалу</em></h2>
			</div>
			<div class="steps">
				<article class="step">
					<div class="step__num">01</div>
					<h3 class="step__title">Выбор</h3>
					<p class="step__text">Определите задачу кожи: увлажнение, сияние, плотность или комфорт чувствительной кожи.</p>
				</article>
				<article class="step">
					<div class="step__num">02</div>
					<h3 class="step__title">Консультация</h3>
					<p class="step__text">Напишите нам — подберём продукты под ваш тип кожи и текущий уход.</p>
				</article>
				<article class="step">
					<div class="step__num">03</div>
					<h3 class="step__title">Ритуал</h3>
					<p class="step__text">Включите крем в ежедневную программу: утро, вечер, синергия с массажем и фейс-йогой.</p>
				</article>
				<article class="step">
					<div class="step__num">04</div>
					<h3 class="step__title">Результат</h3>
					<p class="step__text">Оцените изменения через 3–4 недели регулярного применения — кожа благодарит стабильностью.</p>
				</article>
			</div>
		</div>
	</section>

	<!-- КОМУ ПОДХОДИТ -->
	<section class="section section--white" id="sc-audience">
		<div class="container">
			<div class="section-head">
				<p class="section-head__kicker">Кому подойдёт</p>
				<h2 class="section-head__title">Кому подойдёт <em>Silver Cream</em></h2>
			</div>
			<ul class="audience">
				<li><strong>Ценителям премиального ухода</strong> Кто хочет видеть состав, чувствовать текстуру и получать результат без агрессивной химии.</li>
				<li><strong>Последователям natural lift</strong> Кто уже практикует омоложение без уколов и ищет косметику-союзника.</li>
				<li><strong>Чувствительной коже</strong> Мягкие формулы, продуманные фазы, комфорт без липкости и без «маски» на лице.</li>
				<li><strong>Профессионалам beauty</strong> Косметологам и наставникам, которые рекомендуют линию клиентам в связке с программами.</li>
			</ul>
		</div>
	</section>

	<!-- FAQ -->
	<section class="section section--blush" id="sc-faq">
		<div class="container">
			<div class="section-head">
				<p class="section-head__kicker">Частые вопросы</p>
				<h2 class="section-head__title">Частые <em>вопросы</em></h2>
			</div>
			<div class="faq">
				<details>
					<summary>Чем Silver Cream отличается от масс-маркета?</summary>
					<p>Авторские формулы, малые партии, акцент на активные фазы и премиальная золотая упаковка. Состав продуман для синергии с практиками естественного омоложения.</p>
				</details>
				<details>
					<summary>Можно ли сочетать с фейс-йогой и массажем?</summary>
					<p>Да, линия создавалась именно для этого: текстуры не конфликтуют с техниками, поддерживают барьер и увлажнение после практики.</p>
				</details>
				<details>
					<summary>Где купить?</summary>
					<p>Каталог и заказ — на этой странице или в нашем <a href="<?php echo esc_url( $catalog_url ); ?>">каталоге Silver Cream</a>. Для подбора продукта напишите в Telegram.</p>
				</details>
				<details>
					<summary>Почему флаконы золотые?</summary>
					<p>Золото — часть айдентики бренда: тактильная премиальность, защита формулы от света и ежедневный ритуал «особенного» ухода.</p>
				</details>
			</div>
		</div>
	</section>
</main>

<!-- Подвал лендинга -->
<footer class="site-footer" id="sc-footer">
	<div class="container site-footer__inner">
		<div class="site-footer__brand">
			<div class="brand site-footer__brand-mark">
				<img src="https://naturallift.ru/wp-content/uploads/2026/05/sc_logo2-ondark.png" alt="Silver Cream" width="220" height="auto" loading="lazy" decoding="async" style="max-width:100%;height:auto;display:block;" />
			</div>
			<p>Естественное омоложение, фейс-йога и натуральная косметика.</p>
		</div>

		<div class="site-footer__col">
			<h4>Навигация</h4>
			<?php foreach ( $header_nav_links as $link ) : ?>
				<a href="<?php echo esc_url( $link['url'] ); ?>"><?php echo esc_html( $link['label'] ); ?></a>
			<?php endforeach; ?>
		</div>

		<div class="site-footer__col">
			<h4>Документы</h4>
			<a href="https://silvercream.net/privacy" target="_blank">Политика конфиденциальности</a>
			<a href="https://silvercream.net/dogovor_oferty" target="_blank">Договор оферты</a>
		</div>

		<div class="site-footer__col">
			<h4>Контакты</h4>
			<p>ИП Шимановская Е. Ю.<br>ИНН 772800956730<br>ОГРНИП 320774600046791</p>
			<p>
				<a href="mailto:elenashimanovskaya@silvercream.net">elenashimanovskaya@silvercream.net</a><br>
				<a href="https://t.me/silver_cream" target="_blank" rel="noopener noreferrer">t.me/silver_cream</a><br>
				Москва, ул. Марии Ульяновой, д. 8, кв. 4
			</p>
		</div>

		<div class="site-footer__social-row">
			<p class="site-footer__social-label">На связи</p>
			<nav class="side-rail__social" aria-label="Соцсети Silver Cream" style="flex-direction:row;position:static;box-shadow:none;background:transparent;padding:0;">
				<?php foreach ( $social_links as $link ) : ?>
					<a class="side-rail__social-link<?php echo ! empty( $link['class'] ) ? ' side-rail__social-link--max' : ''; ?>" href="<?php echo esc_url( $link['url'] ); ?>" target="_blank" rel="noopener noreferrer" aria-label="<?php echo esc_attr( $link['label'] ); ?>">
						<?php silvercream_render_social_icon( $link['icon'] ); ?>
					</a>
				<?php endforeach; ?>
			</nav>
		</div>
	</div>

	<div class="container site-footer__bottom">
		<p>&copy; 2021&ndash;<?php echo esc_html( date( 'Y' ) ); ?> ИП Шимановская Елена Юрьевна. Торговое обозначение Silver Cream.</p>
	</div>
</footer>

<div id="mk-cookie-banner" class="cookie-banner" role="dialog" aria-modal="false" aria-labelledby="mk-cookie-banner-label" hidden>
	<p id="mk-cookie-banner-label" class="cookie-banner__text">
		Мы используем файлы cookie, чтобы сайт работал стабильнее и удобнее. Продолжая пользоваться сайтом, вы соглашаетесь с
		<a href="https://silvercream.net/privacy" target="_blank">политикой обработки данных</a>.
	</p>
	<button type="button" class="cookie-banner__ok">OK</button>
</div>

<?php wp_footer(); ?>
</body>
</html>
