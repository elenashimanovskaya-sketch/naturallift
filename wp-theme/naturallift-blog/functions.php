<?php
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

require_once get_stylesheet_directory() . '/inc/cosmetics-cpt.php';
require_once get_stylesheet_directory() . '/inc/cosmetics-catalog-data.php';
require_once get_stylesheet_directory() . '/inc/cosmetics-seed.php';

/**
 * Enqueue theme styles.
 */
add_action(
	'wp_enqueue_scripts',
	function () {
		if ( is_page_template( 'page-catalog.php' ) || is_singular( 'sc_product' ) ) {
			$cosmetics_css = get_stylesheet_directory() . '/assets/cosmetics.css';
			$cosmetics_js  = get_stylesheet_directory() . '/assets/cosmetics.js';

			wp_enqueue_style(
				'naturallift-cosmetics',
				get_stylesheet_directory_uri() . '/assets/cosmetics.css',
				array( 'naturallift-blog-style' ),
				file_exists( $cosmetics_css ) ? filemtime( $cosmetics_css ) : '1.0.0'
			);
			wp_enqueue_script(
				'naturallift-cosmetics',
				get_stylesheet_directory_uri() . '/assets/cosmetics.js',
				array(),
				file_exists( $cosmetics_js ) ? filemtime( $cosmetics_js ) : '1.0.0',
				true
			);
		}

		if ( is_page_template( 'page-silvercream.php' ) ) {
			wp_enqueue_style(
				'mk-fonts',
				'https://fonts.googleapis.com/css2?family=Cormorant+Garamond:ital,wght@0,500;0,600;0,700;1,500;1,600&family=Manrope:wght@400;500;600;700;800&display=swap',
				array(),
				null
			);
			wp_enqueue_style(
				'moya-kosmetika-landing-style',
				get_stylesheet_directory_uri() . '/moya-kosmetika.css',
				array( 'mk-fonts' ),
				'1.0.12'
			);
			wp_enqueue_script(
				'moya-kosmetika-landing-script',
				get_stylesheet_directory_uri() . '/moya-kosmetika.js',
				array(),
				'1.0.12',
				true
			);
		} else {
			$style_path = get_stylesheet_directory() . '/style.css';
			$style_ver  = file_exists( $style_path ) ? filemtime( $style_path ) : null;

			wp_enqueue_style(
				'naturallift-blog-style',
				get_stylesheet_uri(),
				array(),
				$style_ver
			);
		}
	}
);

add_action(
	'after_setup_theme',
	function () {
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => __( 'Главное меню', 'naturallift-blog' ),
			)
		);
	}
);

/**
 * Возвращает URL страницы по slug.
 */
function naturallift_get_page_url( string $slug ): string {
	if ( strtolower( $slug ) === 'page-quiz' ) {
		$slug = 'diagnostika-kozhi';
	}

	// Поддержка возможных кастомных slug (с разным регистром), введенных пользователем
	if ( strtolower($slug) === 'main-silver-cream' || strtolower($slug) === 'main-silvercream' ) {
		// Сначала пробуем найти страницу по точному совпадению, как ввел пользователь
		$page = get_page_by_path( $slug );
		if ( ! $page ) {
			// Если не нашел, пробуем другие варианты написания
			$page = get_page_by_path( 'main-silver-cream' );
			if ( ! $page ) {
				$page = get_page_by_path( 'main-silvercream' );
			}
			if ( ! $page ) {
				$page = get_page_by_path( 'silvercream' );
			}
		}
		if ( $page ) {
			return (string) get_permalink( $page->ID );
		}
	}

	$page = get_page_by_path( $slug );
	if ( $page ) {
		return (string) get_permalink( $page->ID );
	}
	return home_url( '/' . $slug . '/' );
}

/**
 * Возвращает URL поста по slug.
 */
function naturallift_get_post_url( string $slug ): string {
	$post = get_page_by_path( $slug, OBJECT, 'post' );
	if ( $post ) {
		return (string) get_permalink( $post->ID );
	}
	// Фолбэк на поиск по части пути, если это дата
	return home_url( '/' . ltrim( $slug, '/' ) );
}

/**
 * Возвращает URL рубрики по slug.
 */
function naturallift_get_category_url( string $slug ): string {
	$term = get_category_by_slug( $slug );

	if ( $term && ! is_wp_error( $term ) ) {
		return (string) get_category_link( $term->term_id );
	}

	return home_url( '/category/' . $slug . '/' );
}

/**
 * Возвращает изображение поста:
 * 1) миниатюра записи
 * 2) первая картинка из контента
 * 3) дефолтное изображение темы
 */
function naturallift_get_post_image_url( int $post_id ): string {
	if ( has_post_thumbnail( $post_id ) ) {
		$thumb = get_the_post_thumbnail_url( $post_id, 'large' );
		if ( is_string( $thumb ) && $thumb !== '' ) {
			return $thumb;
		}
	}

	$content = get_post_field( 'post_content', $post_id );
	if ( is_string( $content ) && preg_match( '/<img[^>]+src=[\'"]([^\'"]+)[\'"]/i', $content, $match ) ) {
		return (string) $match[1];
	}

	return 'https://naturallift.store/wp-content/uploads/2026/05/сыворотка-для-лица-с-пептидами.jpg';
}

/**
 * Hero-фото стартового экрана квиза «Диагностика кожи».
 * Latin slug в uploads — стабильнее кириллицы (до-после.jpg на prod отдаёт 404/500).
 */
function naturallift_get_quiz_intro_image_url(): string {
	return (string) apply_filters(
		'naturallift_quiz_intro_image_url',
		'https://naturallift.store/wp-content/uploads/2026/07/diagnostika-of-the-skin.jpg'
	);
}

/**
 * Фото шага 1 квиза (до/после).
 */
function naturallift_get_quiz_step1_image_url(): string {
	return (string) apply_filters(
		'naturallift_quiz_step1_image_url',
		'https://naturallift.store/wp-content/uploads/2026/07/before-after.jpg'
	);
}

/**
 * Гарантируем наличие и назначение главного меню даже после обновления темы.
 */
function naturallift_ensure_primary_menu(): void {
	$locations = (array) get_theme_mod( 'nav_menu_locations', array() );
	if ( ! empty( $locations['primary'] ) ) {
		return;
	}

	$menu_name      = 'Главное меню';
	$existing_menu  = wp_get_nav_menu_object( $menu_name );
	$menu_id        = $existing_menu ? (int) $existing_menu->term_id : wp_create_nav_menu( $menu_name );

	if ( is_wp_error( $menu_id ) || ! $menu_id ) {
		return;
	}

	$has_items = wp_get_nav_menu_items( $menu_id );
	if ( empty( $has_items ) ) {
		$items = array(
			array( 'title' => 'Главная',      'url' => home_url( '/' ) ),
			array( 'title' => 'Фейс-йога',    'url' => naturallift_get_category_url( 'feys-yoga' ) ),
			array( 'title' => 'Уход за кожей','url' => naturallift_get_category_url( 'ukhod-za-kozhey-litsa' ) ),
			array( 'title' => 'Массаж лица',  'url' => naturallift_get_category_url( 'massazh-litsa' ) ),
			array( 'title' => 'Образ жизни',  'url' => naturallift_get_category_url( 'obraz-zhizni' ) ),
			array( 'title' => 'Аюрведа',      'url' => naturallift_get_category_url( 'ayurveda' ) ),
		);

		foreach ( $items as $item ) {
			wp_update_nav_menu_item(
				$menu_id,
				0,
				array(
					'menu-item-title'  => $item['title'],
					'menu-item-url'    => $item['url'],
					'menu-item-status' => 'publish',
				)
			);
		}
	}

	$locations['primary'] = $menu_id;
	set_theme_mod( 'nav_menu_locations', $locations );
}

add_action( 'after_switch_theme', 'naturallift_ensure_primary_menu' );
add_action( 'admin_init', 'naturallift_ensure_primary_menu' );

/**
 * 301: устаревший slug page-quiz → diagnostika-kozhi (legacy-ссылки в статьях и Дзен).
 */
function naturallift_redirect_legacy_quiz_slug(): void {
	if ( is_admin() ) {
		return;
	}
	$path = trim( (string) parse_url( (string) ( $_SERVER['REQUEST_URI'] ?? '' ), PHP_URL_PATH ), '/' );
	if ( $path === 'page-quiz' ) {
		wp_safe_redirect( naturallift_get_page_url( 'diagnostika-kozhi' ), 301 );
		exit;
	}
}
add_action( 'template_redirect', 'naturallift_redirect_legacy_quiz_slug' );

