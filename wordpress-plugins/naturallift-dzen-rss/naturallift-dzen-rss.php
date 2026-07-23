<?php
/**
 * Plugin Name: NaturalLift RSS для Дзена
 * Description: Отдельная RSS-лента по требованиям Яндекс Дзена (/feed/dzen/): без UTM в URL, enclosure, category, media:rating, фильтрация HTML.
 * Version: 1.1.0
 * Author: NaturalLift
 * Requires at least: 6.0
 * Requires PHP: 7.4
 * License: GPLv2 or later
 *
 * Установка: скопировать папку naturallift-dzen-rss в wp-content/plugins/, активировать в админке.
 * После активации: Настройки → Постоянные ссылки → Сохранить (flush правил). Лента: https://ДОМЕН/feed/dzen/
 * В Студии Дзена указывать только эту ленту, не стандартный /feed/ (там часто остаются UTM в link).
 * Автопубликация: по умолчанию без native-draft (сразу на канал). Черновик в Студии: add_filter('naturallift_dzen_item_categories', fn($c,$p)=>array_merge(['native-draft'], $c), 10, 2);
 *
 * Документация Дзена: https://dzen.ru/help/ru/website/rss-modify.html
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NATURLIFT_DZEN_RSS_VERSION', '1.1.0' );

/**
 * Регистрация конечной точки ленты.
 */
function naturallift_dzen_register_feed() {
	add_feed( 'dzen', 'naturallift_dzen_render_feed' );
}
add_action( 'init', 'naturallift_dzen_register_feed' );

/**
 * После активации — пересобрать rewrite rules.
 */
function naturallift_dzen_activate() {
	naturallift_dzen_register_feed();
	flush_rewrite_rules();
}
register_activation_hook( __FILE__, 'naturallift_dzen_activate' );

function naturallift_dzen_deactivate() {
	flush_rewrite_rules();
}
register_deactivation_hook( __FILE__, 'naturallift_dzen_deactivate' );

/**
 * HTML-теги, допустимые в content:encoded по справке Дзена (+ iframe YouTube из примера).
 *
 * @return array
 */
function naturallift_dzen_allowed_tags() {
	return array(
		'p'          => array(),
		'a'          => array(
			'href'   => true,
			'title'  => true,
			'rel'    => true,
			'target' => true,
		),
		'b'          => array(),
		'i'          => array(),
		'u'          => array(),
		's'          => array(),
		'h1'         => array( 'id' => true ),
		'h2'         => array( 'id' => true ),
		'h3'         => array( 'id' => true ),
		'h4'         => array( 'id' => true ),
		'blockquote' => array(),
		'ul'         => array(),
		'ol'         => array(),
		'li'         => array(),
		'figure'     => array(),
		'figcaption' => array(),
		'span'       => array( 'class' => true ),
		'img'        => array(
			'src'    => true,
			'alt'    => true,
			'width'  => true,
			'height' => true,
		),
		'br'         => array(),
		'iframe'     => array(
			'width'             => true,
			'height'            => true,
			'src'               => true,
			'title'             => true,
			'frameborder'       => true,
			'allow'             => true,
			'allowfullscreen'   => true,
			'referrerpolicy'    => true,
			'loading'           => true,
		),
		'video'      => array(
			'width'  => true,
			'height' => true,
			'poster' => true,
		),
		'source'     => array(
			'src'  => true,
			'type' => true,
		),
	);
}

/**
 * Нормализация типового контента блоков WP под допустимые теги Дзена.
 *
 * @param string $html HTML.
 * @return string
 */
function naturallift_dzen_normalize_content( $html ) {
	if ( '' === trim( (string) $html ) ) {
		return '';
	}

	// strong/em → b/i (в справке — b/i).
	$html = preg_replace( '/<strong\b[^>]*>/i', '<b>', $html );
	$html = preg_replace( '/<\/strong>/i', '</b>', $html );
	$html = preg_replace( '/<em\b[^>]*>/i', '<i>', $html );
	$html = preg_replace( '/<\/em>/i', '</i>', $html );

	// Убираем разделители и лишнюю обвязку блоков — Дзен их не описывает как поддерживаемые.
	$html = preg_replace( '/<hr\b[^>]*\/?>/i', '', $html );

	// Частые классы Gutenberg — разбор через заголовки: оставляем только тег заголовка.
	$html = preg_replace_callback(
		'/<h([1-4])\b[^>]*>(.*?)<\/h\1>/is',
		function ( $m ) {
			$lvl = (int) $m[1];
			$inner = strip_tags( $m[2], '<b><i><u><s><a><strong><em>' );
			$inner = preg_replace( '/<\/?strong>/i', '', $inner );
			$inner = preg_replace( '/<\/?em>/i', '', $inner );
			return '<h' . $lvl . '>' . $inner . '</h' . $lvl . '>';
		},
		$html
	);

	return $html;
}

/**
 * Превращает относительные src в абсолютные (Дзен ждёт полные URL картинок).
 *
 * @param string $html HTML.
 * @return string
 */
function naturallift_dzen_absolute_urls( $html ) {
	$home = trailingslashit( home_url() );
	return preg_replace_callback(
		'/(src|href)=(["\'])(?!https?:\/\/|mailto:|#|\/\/)([^"\']+)\2/i',
		function ( $m ) use ( $home ) {
			$url = $home . ltrim( $m[3], '/' );
			return $m[1] . '=' . $m[2] . esc_url( $url ) . $m[2];
		},
		$html
	);
}

/**
 * Убирает utm_* из одного абсолютного URL (query-сборка через WordPress-совместимый парсер).
 *
 * @param string $url URL.
 * @return string
 */
function naturallift_dzen_strip_utm_from_single_url( $url ) {
	$url = html_entity_decode( (string) $url, ENT_QUOTES | ENT_HTML5, 'UTF-8' );
	$parts = wp_parse_url( $url );
	if ( empty( $parts['query'] ) ) {
		return $url;
	}
	parse_str( $parts['query'], $query_vars );
	$strip = array();
	foreach ( array_keys( $query_vars ) as $key ) {
		if ( stripos( $key, 'utm_' ) === 0 ) {
			$strip[] = $key;
		}
	}
	return $strip ? remove_query_arg( $strip, $url ) : $url;
}

/**
 * Убирает utm_* из URL внутри href/src.
 *
 * @param string $html HTML.
 * @return string
 */
function naturallift_dzen_strip_utm_from_urls( $html ) {
	return preg_replace_callback(
		'/(href|src)=(["\'])([^"\']+)\2/i',
		function ( $m ) {
			$clean = naturallift_dzen_strip_utm_from_single_url( $m[3] );
			return $m[1] . '=' . $m[2] . esc_attr( $clean ) . $m[2];
		},
		$html
	);
}

/**
 * Разрешить только встраивания YouTube/Vimeo/Dzen/VK Video в iframe (остальное вырежется wp_kses).
 *
 * @param string $html HTML.
 * @return string
 */
function naturallift_dzen_sanitize_iframes( $html ) {
	if ( stripos( $html, '<iframe' ) === false ) {
		return $html;
	}

	return preg_replace_callback(
		'/<iframe\b[^>]*>.*?<\/iframe>/is',
		function ( $m ) {
			if ( ! preg_match( '/src=(["\'])([^"\']+)\1/i', $m[0], $sm ) ) {
				return '';
			}
			$src = $sm[2];
			$allowed_hosts = array(
				'youtube.com',
				'www.youtube.com',
				'youtu.be',
				'vk.com',
				'vkvideo.ru',
				'dzen.ru',
				'zen.yandex.ru',
				'player.vimeo.com',
				'vimeo.com',
			);
			$host = wp_parse_url( $src, PHP_URL_HOST );
			if ( ! $host ) {
				return '';
			}
			$ok = false;
			foreach ( $allowed_hosts as $h ) {
				if ( strtolower( $host ) === strtolower( $h ) || preg_match( '/\.' . preg_quote( $h, '/' ) . '$/i', $host ) ) {
					$ok = true;
					break;
				}
			}
			return $ok ? $m[0] : '';
		},
		$html
	);
}

/**
 * Получить канонический permalink записи без посторонних query-параметров (требование Дзена — без UTM).
 *
 * @param int|WP_Post $post Пост.
 * @return string
 */
function naturallift_dzen_item_link( $post ) {
	$post = get_post( $post );
	if ( ! $post ) {
		return '';
	}
	$url = get_permalink( $post );
	return naturallift_dzen_strip_utm_from_single_url( strtok( $url, '?' ) );
}

/**
 * Стабильный guid для Дзена (не меняется при смене slug): ?p=ID на домене сайта.
 *
 * @param WP_Post $post Пост.
 * @return string
 */
function naturallift_dzen_item_guid( $post ) {
	return naturallift_dzen_strip_utm_from_single_url( home_url( '/?p=' . (int) $post->ID ) );
}

/**
 * Обложка для enclosure: берётся самый широкий из размеров (naturallift-dzen-cover, full, large, …).
 *
 * @param int $post_id ID записи.
 * @return array{0:string,1:int,2:int,3:string}|null url, width, height, mime.
 */
function naturallift_dzen_enclosure_data( $post_id ) {
	$thumb_id = get_post_thumbnail_id( $post_id );
	if ( ! $thumb_id ) {
		return null;
	}

	$mime = get_post_mime_type( $thumb_id );
	$sizes = array( 'naturallift-dzen-cover', 'full', 'large', 'medium_large' );

	$best = null;
	foreach ( $sizes as $size ) {
		$data = wp_get_attachment_image_src( $thumb_id, $size );
		if ( ! $data ) {
			continue;
		}
		if ( ! $best || (int) $data[1] > (int) $best[1] ) {
			$best = $data;
		}
	}

	if ( ! $best ) {
		return null;
	}

	list( $url, $w, $h ) = $best;

	return array( $url, (int) $w, (int) $h, $mime ? $mime : 'image/jpeg' );
}

/**
 * Категории item для Дзена (повторяющиеся элементы category).
 *
 * Фильтр: naturallift_dzen_item_categories — массив строк.
 *
 * По умолчанию: сразу на канал (без native-draft), статья, индекс, комментарии для всех.
 *
 * @return string[]
 */
function naturallift_dzen_default_categories() {
	return array(
		'format-article',
		'index',
		'comment-all',
	);
}

/**
 * HTML обложки для content:encoded — первой картинкой в тексте.
 *
 * @param int   $post_id ID записи.
 * @param array $enc     Данные enclosure.
 * @return string
 */
function naturallift_dzen_cover_figure_html( $post_id, $enc ) {
	if ( ! $enc ) {
		return '';
	}
	list( $url, $w, $h ) = $enc;
	$thumb_id = get_post_thumbnail_id( $post_id );
	$alt      = $thumb_id ? get_post_meta( $thumb_id, '_wp_attachment_image_alt', true ) : '';
	if ( ! $alt ) {
		$alt = get_the_title( $post_id );
	}
	return sprintf(
		'<figure><img src="%s" alt="%s" width="%d" height="%d"></figure>',
		esc_url( $url ),
		esc_attr( $alt ),
		(int) $w,
		(int) $h
	);
}

/**
 * Первая картинка в HTML — обложка?
 *
 * @param string $html      HTML.
 * @param string $cover_url URL обложки.
 * @return bool
 */
function naturallift_dzen_content_starts_with_cover( $html, $cover_url ) {
	if ( '' === trim( (string) $html ) || '' === trim( (string) $cover_url ) ) {
		return false;
	}
	if ( ! preg_match( '/<img\b[^>]+src=(["\'])([^"\']+)\1/i', $html, $m ) ) {
		return false;
	}
	$first = untrailingslashit( html_entity_decode( $m[2], ENT_QUOTES | ENT_HTML5, 'UTF-8' ) );
	$cover = untrailingslashit( html_entity_decode( $cover_url, ENT_QUOTES | ENT_HTML5, 'UTF-8' ) );
	return $first === $cover;
}

/**
 * Добавляет обложку первым figure в content:encoded.
 *
 * @param string $html    HTML после wp_kses.
 * @param int    $post_id ID записи.
 * @return string
 */
function naturallift_dzen_prepend_cover_to_content( $html, $post_id ) {
	$enc = naturallift_dzen_enclosure_data( $post_id );
	if ( ! $enc ) {
		return $html;
	}
	list( $cover_url ) = $enc;
	if ( naturallift_dzen_content_starts_with_cover( $html, $cover_url ) ) {
		return $html;
	}
	$figure = naturallift_dzen_cover_figure_html( $post_id, $enc );
	if ( ! $figure ) {
		return $html;
	}
	return $figure . $html;
}

/**
 * Вывод RSS.
 */
function naturallift_dzen_render_feed() {
	nocache_headers();
	header( 'Content-Type: application/rss+xml; charset=UTF-8', true );

	$n = (int) apply_filters( 'naturallift_dzen_posts_per_feed', max( 10, (int) get_option( 'posts_per_rss', 10 ) ) );

	$query = new WP_Query(
		array(
			'post_type'           => 'post',
			'post_status'         => 'publish',
			'posts_per_page'      => $n,
			'ignore_sticky_posts' => true,
			'no_found_rows'       => true,
		)
	);

	$lang = get_bloginfo( 'language' );
	if ( stripos( $lang, 'ru' ) === 0 ) {
		$lang = 'ru';
	}

	echo '<?xml version="1.0" encoding="' . esc_attr( get_bloginfo( 'charset' ) ) . "\"?>\n";
	?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:media="http://search.yahoo.com/mrss/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:georss="http://www.georss.org/georss"
>
<channel>
	<title><?php echo esc_html( get_bloginfo( 'name' ) ); ?></title>
	<link><?php echo esc_url( home_url( '/' ) ); ?></link>
	<atom:link href="<?php echo esc_url( get_feed_link( 'dzen' ) ); ?>" rel="self" type="application/rss+xml" />
	<description><?php echo esc_html( get_bloginfo( 'description' ) ); ?></description>
	<language><?php echo esc_html( $lang ); ?></language>
	<lastBuildDate><?php echo esc_html( gmdate( 'D, d M Y H:i:s +0000' ) ); ?></lastBuildDate>
	<?php
	while ( $query->have_posts() ) :
		$query->the_post();
		global $post;

		$link = naturallift_dzen_item_link( $post );
		$guid = naturallift_dzen_item_guid( $post );

		// RFC822-подобная дата по GMT (как в примере Дзена).
		$pub_ts = get_post_time( 'U', true, $post );
		$pub    = gmdate( 'D, d M Y H:i:s', $pub_ts ) . ' +0000';

		$raw_content = apply_filters( 'the_content', $post->post_content );
		$raw_content = naturallift_dzen_normalize_content( $raw_content );
		$raw_content = naturallift_dzen_absolute_urls( $raw_content );
		$raw_content = naturallift_dzen_strip_utm_from_urls( $raw_content );
		$raw_content = naturallift_dzen_sanitize_iframes( $raw_content );
		$encoded     = wp_kses( $raw_content, naturallift_dzen_allowed_tags() );

		$enc = naturallift_dzen_enclosure_data( $post->ID );
		$encoded = naturallift_dzen_prepend_cover_to_content( $encoded, $post->ID );

		// Автоматически добавляем дисклеймер для медицинского/оздоровительного контента (требование Дзена)
		$disclaimer = '<p><i>Важно: Все материалы канала носят исключительно ознакомительный характер и не являются персональной медицинской рекомендацией. При наличии проблем со здоровьем, пожалуйста, проконсультируйтесь с лечащим врачом.</i></p>';
		$encoded    .= $disclaimer;

		if ( apply_filters( 'naturallift_dzen_prepend_title_in_content', false, $post ) ) {
			$t = get_the_title( $post );
			if ( $t ) {
				$encoded = '<h2>' . esc_html( $t ) . '</h2>' . $encoded;
			}
		}

		$excerpt = wp_strip_all_tags( get_the_excerpt( $post ) );
		if ( strlen( $excerpt ) < 40 ) {
			$excerpt = wp_trim_words( wp_strip_all_tags( $encoded ), 40, '…' );
		}

		$cats = apply_filters( 'naturallift_dzen_item_categories', naturallift_dzen_default_categories(), $post );
		if ( ! is_array( $cats ) ) {
			$cats = naturallift_dzen_default_categories();
		}

		?>
	<item>
		<title><?php echo esc_html( get_the_title( $post ) ); ?></title>
		<link><?php echo esc_url( $link ); ?></link>
		<pdalink><?php echo esc_url( $link ); ?></pdalink>
		<guid isPermaLink="false"><?php echo esc_html( $guid ); ?></guid>
		<pubDate><?php echo esc_html( $pub ); ?></pubDate>
		<media:rating scheme="urn:simple">nonadult</media:rating>
		<?php foreach ( $cats as $cat ) : ?>
		<category><?php echo esc_html( $cat ); ?></category>
		<?php endforeach; ?>
		<?php
		if ( $enc ) {
			printf(
				"<enclosure url=\"%s\" type=\"%s\"/>\n\t\t",
				esc_url( $enc[0] ),
				esc_attr( $enc[3] )
			);
		}
		?>
		<description><![CDATA[<?php echo esc_html( wp_trim_words( $excerpt, 55, '…' ) ); ?>]]></description>
		<content:encoded><![CDATA[<?php echo naturallift_dzen_cdata_wrap( $encoded ); ?>]]></content:encoded>
	</item>
	<?php endwhile; ?>
</channel>
</rss>
	<?php
	wp_reset_postdata();
	exit;
}

/**
 * Безопасно экранировать последовательность ]]> внутри CDATA.
 *
 * @param string $inner Inner HTML.
 * @return string
 */
function naturallift_dzen_cdata_wrap( $inner ) {
	return str_replace( ']]>', ']]]]><![CDATA[>', $inner );
}

/**
 * Регистрируем размер для обложек под Дзен (минимум 700 по ширине в справке).
 */
function naturallift_dzen_register_image_size() {
	add_image_size( 'naturallift-dzen-cover', 1200, 675, true );
}
add_action( 'after_setup_theme', 'naturallift_dzen_register_image_size', 20 );

/**
 * Подсказка администратору в консоли.
 */
function naturallift_dzen_admin_notice() {
	if ( ! current_user_can( 'manage_options' ) ) {
		return;
	}
	$screen = function_exists( 'get_current_screen' ) ? get_current_screen() : null;
	if ( ! $screen || 'dashboard' !== $screen->id ) {
		return;
	}
	if ( ! get_option( 'naturallift_dzen_show_notice', 1 ) ) {
		return;
	}
	$url = esc_url( get_feed_link( 'dzen' ) );
	echo '<div class="notice notice-info"><p>';
	echo wp_kses_post(
		sprintf(
			/* translators: %s feed URL */
			__( 'Лента для Яндекс Дзена: <a href="%s">%s</a>. Укажите её в Студии Дзена → Настроить трансляцию. После загрузки новых изображений выполните регенерацию миниатюр при необходимости.', 'naturallift-dzen-rss' ),
			$url,
			$url
		)
	);
	echo ' <a href="' . esc_url( admin_url( '?naturallift_dzen_dismiss=1' ) ) . '">' . esc_html__( 'Скрыть', 'naturallift-dzen-rss' ) . '</a>';
	echo '</p></div>';
}
add_action( 'admin_notices', 'naturallift_dzen_admin_notice' );

/**
 * Скрыть подсказку.
 */
function naturallift_dzen_dismiss_notice() {
	if ( isset( $_GET['naturallift_dzen_dismiss'] ) && current_user_can( 'manage_options' ) ) {
		update_option( 'naturallift_dzen_show_notice', 0 );
		wp_safe_redirect( remove_query_arg( 'naturallift_dzen_dismiss' ) );
		exit;
	}
}
add_action( 'admin_init', 'naturallift_dzen_dismiss_notice' );
