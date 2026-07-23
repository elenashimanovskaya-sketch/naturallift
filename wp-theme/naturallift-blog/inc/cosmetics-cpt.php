<?php
/**
 * CPT sc_product, таксономии и meta для каталога Silver Cream.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

define( 'NL_SC_META_KEYS', array(
	'price',
	'price_options',
	'volume',
	'label',
	'short_description',
	'active_ingredients',
	'full_composition',
	'application',
	'recommendations',
	'face_yoga',
	'telegram_message',
	'gallery_urls',
	'related_slugs',
	'external_image',
	'gallery_ids',
	'menu_order',
) );

/**
 * Регистрация CPT и таксономий.
 */
function naturallift_register_sc_product(): void {
	register_post_type(
		'sc_product',
		array(
			'labels'              => array(
				'name'               => 'Косметика',
				'singular_name'      => 'Продукт',
				'add_new'            => 'Добавить продукт',
				'add_new_item'       => 'Добавить продукт Silver Cream',
				'edit_item'          => 'Редактировать продукт',
				'new_item'           => 'Новый продукт',
				'view_item'          => 'Просмотр продукта',
				'search_items'       => 'Искать продукты',
				'not_found'          => 'Продукты не найдены',
				'not_found_in_trash' => 'В корзине продуктов нет',
				'menu_name'          => 'Silver Cream',
			),
			'public'              => true,
			'has_archive'         => false,
			'show_in_rest'        => true,
			'menu_icon'           => 'dashicons-cart',
			'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'page-attributes' ),
			'rewrite'             => array(
				'slug'       => 'cosmetics',
				'with_front' => false,
			),
		)
	);

	$taxonomies = array(
		'skin_type'      => array(
			'label' => 'Тип кожи',
			'slug'  => 'skin-type',
		),
		'skin_concern'   => array(
			'label' => 'Эстетическая проблема',
			'slug'  => 'skin-concern',
		),
		'product_effect' => array(
			'label' => 'Эффект средства',
			'slug'  => 'product-effect',
		),
	);

	foreach ( $taxonomies as $taxonomy => $config ) {
		register_taxonomy(
			$taxonomy,
			'sc_product',
			array(
				'labels'            => array(
					'name'          => $config['label'],
					'singular_name' => $config['label'],
				),
				'public'            => true,
				'hierarchical'      => false,
				'show_admin_column' => true,
				'show_in_rest'      => true,
				'rewrite'           => array(
					'slug' => $config['slug'],
				),
			)
		);
	}

	foreach ( NL_SC_META_KEYS as $meta_key ) {
		register_post_meta(
			'sc_product',
			'_sc_' . $meta_key,
			array(
				'show_in_rest'  => true,
				'single'        => true,
				'type'          => 'string',
				'auth_callback' => function () {
					return current_user_can( 'edit_posts' );
				},
			)
		);
	}
}
add_action( 'init', 'naturallift_register_sc_product' );

/**
 * Meta-box в админке.
 */
function naturallift_sc_product_meta_box(): void {
	add_meta_box(
		'sc_product_details',
		'Данные продукта Silver Cream',
		'naturallift_sc_product_meta_box_render',
		'sc_product',
		'normal',
		'high'
	);
}
add_action( 'add_meta_boxes', 'naturallift_sc_product_meta_box' );

/**
 * @param WP_Post $post Post object.
 */
function naturallift_sc_product_meta_box_render( WP_Post $post ): void {
	wp_nonce_field( 'naturallift_sc_product_save', 'naturallift_sc_product_nonce' );

	$fields = array(
		'price'              => array( 'label' => 'Цена (₽) — одна позиция', 'type' => 'text' ),
		'price_options'      => array( 'label' => 'Объёмы и цены (каждая строка: 50 мл — 2250)', 'type' => 'textarea' ),
		'volume'             => array( 'label' => 'Объём (если один)', 'type' => 'text' ),
		'label'              => array( 'label' => 'Метка (Bestseller / Night care)', 'type' => 'text' ),
		'short_description'  => array( 'label' => 'Краткое описание (каталог)', 'type' => 'textarea' ),
		'active_ingredients' => array( 'label' => 'Активные ингредиенты (HTML)', 'type' => 'textarea' ),
		'full_composition'   => array( 'label' => 'Полный состав (маркетинговый список)', 'type' => 'textarea' ),
		'application'        => array( 'label' => 'Применение', 'type' => 'textarea' ),
		'recommendations'    => array( 'label' => 'Рекомендации', 'type' => 'textarea' ),
		'face_yoga'          => array( 'label' => 'Синергия с фейс-йогой', 'type' => 'textarea' ),
		'telegram_message'   => array( 'label' => 'Текст для Telegram (без URL)', 'type' => 'text' ),
		'gallery_urls'       => array( 'label' => 'Галерея — URL по одному на строку (текстура, пипетка)', 'type' => 'textarea' ),
		'related_slugs'      => array( 'label' => 'С этим покупают — slug через запятую', 'type' => 'text' ),
	);

	echo '<table class="form-table" role="presentation"><tbody>';
	foreach ( $fields as $key => $field ) {
		$value = get_post_meta( $post->ID, '_sc_' . $key, true );
		echo '<tr><th scope="row"><label for="sc_' . esc_attr( $key ) . '">' . esc_html( $field['label'] ) . '</label></th><td>';
		if ( 'textarea' === $field['type'] ) {
			printf(
				'<textarea class="large-text" rows="4" id="sc_%1$s" name="sc_%1$s">%2$s</textarea>',
				esc_attr( $key ),
				esc_textarea( (string) $value )
			);
		} else {
			printf(
				'<input class="regular-text" type="text" id="sc_%1$s" name="sc_%1$s" value="%2$s" />',
				esc_attr( $key ),
				esc_attr( (string) $value )
			);
		}
		echo '</td></tr>';
	}
	echo '</tbody></table>';
}

/**
 * @param int $post_id Post ID.
 */
function naturallift_sc_product_meta_save( int $post_id ): void {
	if ( ! isset( $_POST['naturallift_sc_product_nonce'] ) ) {
		return;
	}
	if ( ! wp_verify_nonce( sanitize_text_field( wp_unslash( $_POST['naturallift_sc_product_nonce'] ) ), 'naturallift_sc_product_save' ) ) {
		return;
	}
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	if ( ! current_user_can( 'edit_post', $post_id ) ) {
		return;
	}

	$allowed_html = array(
		'p'      => array(),
		'br'     => array(),
		'strong' => array(),
		'em'     => array(),
		'ul'     => array(),
		'ol'     => array(),
		'li'     => array(),
	);

	foreach ( NL_SC_META_KEYS as $meta_key ) {
		if ( 'gallery_ids' === $meta_key || 'menu_order' === $meta_key ) {
			continue;
		}
		$field = 'sc_' . $meta_key;
		if ( ! isset( $_POST[ $field ] ) ) {
			continue;
		}
		$raw = wp_unslash( $_POST[ $field ] );
		if ( in_array( $meta_key, array( 'active_ingredients', 'full_composition', 'application', 'recommendations', 'face_yoga', 'short_description', 'price_options', 'gallery_urls' ), true ) ) {
			$value = wp_kses( (string) $raw, $allowed_html );
		} else {
			$value = sanitize_text_field( (string) $raw );
		}
		update_post_meta( $post_id, '_sc_' . $meta_key, $value );
	}
}
add_action( 'save_post_sc_product', 'naturallift_sc_product_meta_save' );

/**
 * Meta value helper.
 */
function naturallift_sc_get_meta( int $post_id, string $key ): string {
	return (string) get_post_meta( $post_id, '_sc_' . $key, true );
}

/**
 * Форматированная цена (одна или несколько позиций).
 */
function naturallift_sc_format_price( int $post_id ): string {
	$options = naturallift_sc_get_meta( $post_id, 'price_options' );
	if ( '' !== trim( $options ) ) {
		$lines = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $options ) ) );
		$formatted = array();
		foreach ( $lines as $line ) {
			if ( preg_match( '/^(.+?)\s*[—–-]\s*(\d+)/u', $line, $m ) ) {
				$formatted[] = trim( $m[1] ) . ' — ' . number_format( (float) $m[2], 0, ',', ' ' ) . ' ₽';
			} else {
				$formatted[] = $line;
			}
		}
		return implode( ' · ', $formatted );
	}

	$price = naturallift_sc_get_meta( $post_id, 'price' );
	if ( '' === $price ) {
		return '';
	}
	if ( is_numeric( $price ) ) {
		return number_format( (float) $price, 0, ',', ' ' ) . ' ₽';
	}
	return $price;
}

/**
 * Строки объёма/цены для карточки товара.
 *
 * @return string[]
 */
function naturallift_sc_price_lines( int $post_id ): array {
	$options = naturallift_sc_get_meta( $post_id, 'price_options' );
	if ( '' !== trim( $options ) ) {
		$lines = array_filter( array_map( 'trim', preg_split( '/\r\n|\r|\n/', $options ) ) );
		$out     = array();
		foreach ( $lines as $line ) {
			if ( preg_match( '/^(.+?)\s*[—–-]\s*(\d+)/u', $line, $m ) ) {
				$out[] = trim( $m[1] ) . ' — ' . number_format( (float) $m[2], 0, ',', ' ' ) . ' ₽';
			} else {
				$out[] = $line;
			}
		}
		return $out;
	}

	$price  = naturallift_sc_format_price( $post_id );
	$volume = naturallift_sc_get_meta( $post_id, 'volume' );
	if ( $price && $volume ) {
		return array( $volume . ' — ' . $price );
	}
	if ( $price ) {
		return array( $price );
	}
	return array();
}

/**
 * URL галереи продукта (миниатюра + доп. фото).
 *
 * @return string[]
 */
function naturallift_sc_gallery_urls( int $post_id ): array {
	$urls   = array();
	$main   = naturallift_sc_product_image_url( $post_id, 'large' );
	if ( $main ) {
		$urls[] = $main;
	}

	$extra = naturallift_sc_get_meta( $post_id, 'gallery_urls' );
	if ( '' !== trim( $extra ) ) {
		foreach ( preg_split( '/\r\n|\r|\n/', $extra ) as $line ) {
			$line = trim( $line );
			if ( $line && ! in_array( $line, $urls, true ) ) {
				$urls[] = $line;
			}
		}
	}

	return $urls;
}

/**
 * Связанные продукты для блока «С этим покупают».
 *
 * @return WP_Post[]
 */
function naturallift_sc_related_products( int $post_id, int $limit = 3 ): array {
	$slugs_raw = naturallift_sc_get_meta( $post_id, 'related_slugs' );
	$ids       = array();

	if ( '' !== trim( $slugs_raw ) ) {
		foreach ( array_map( 'trim', explode( ',', $slugs_raw ) ) as $slug ) {
			if ( ! $slug ) {
				continue;
			}
			$related = get_page_by_path( $slug, OBJECT, 'sc_product' );
			if ( $related && (int) $related->ID !== $post_id ) {
				$ids[] = (int) $related->ID;
			}
		}
	}

	if ( count( $ids ) < $limit ) {
		$terms = wp_get_post_terms( $post_id, 'product_effect', array( 'fields' => 'ids' ) );
		if ( ! is_wp_error( $terms ) && ! empty( $terms ) ) {
			$fallback = get_posts(
				array(
					'post_type'      => 'sc_product',
					'posts_per_page' => $limit,
					'post__not_in'   => array_merge( array( $post_id ), $ids ),
					'tax_query'      => array(
						array(
							'taxonomy' => 'product_effect',
							'field'    => 'term_id',
							'terms'    => $terms,
						),
					),
				)
			);
			foreach ( $fallback as $post ) {
				$ids[] = (int) $post->ID;
			}
		}
	}

	$ids = array_slice( array_unique( $ids ), 0, $limit );
	if ( empty( $ids ) ) {
		return array();
	}

	return get_posts(
		array(
			'post_type'      => 'sc_product',
			'post__in'       => $ids,
			'posts_per_page' => count( $ids ),
			'orderby'        => 'post__in',
		)
	);
}

/**
 * URL диагностики кожи.
 */
function naturallift_diagnostic_url(): string {
	return naturallift_get_page_url( 'diagnostika-kozhi' );
}

/**
 * Telegram order URL.
 */
function naturallift_sc_telegram_url( int $post_id ): string {
	$message = naturallift_sc_get_meta( $post_id, 'telegram_message' );
	if ( '' === $message ) {
		$message = 'Здравствуйте! Хочу заказать: ' . get_the_title( $post_id );
	}
	return 'https://t.me/silver_cream?text=' . rawurlencode( $message );
}

/**
 * Изображение продукта.
 */
function naturallift_sc_product_image_url( int $post_id, string $size = 'large' ): string {
	$external = naturallift_sc_get_meta( $post_id, 'external_image' );
	if ( $external ) {
		return $external;
	}

	if ( has_post_thumbnail( $post_id ) ) {
		$url = get_the_post_thumbnail_url( $post_id, $size );
		if ( is_string( $url ) && $url !== '' ) {
			return $url;
		}
	}
	return naturallift_get_post_image_url( $post_id );
}

/**
 * URL каталога.
 */
function naturallift_catalog_url(): string {
	return naturallift_get_page_url( 'cosmetics' );
}

/**
 * Термины продукта для чипов.
 *
 * @return array<string, WP_Term[]>
 */
function naturallift_sc_product_taxonomy_groups( int $post_id ): array {
	return array(
		'skin_type'      => wp_get_post_terms( $post_id, 'skin_type', array( 'fields' => 'all' ) ),
		'skin_concern'   => wp_get_post_terms( $post_id, 'skin_concern', array( 'fields' => 'all' ) ),
		'product_effect' => wp_get_post_terms( $post_id, 'product_effect', array( 'fields' => 'all' ) ),
	);
}

/**
 * Названия групп атрибутов.
 */
function naturallift_sc_taxonomy_labels(): array {
	return array(
		'skin_type'      => 'Тип кожи',
		'skin_concern'   => 'Эстетическая проблема',
		'product_effect' => 'Эффект средства',
	);
}

/**
 * Страница каталога + шаблон.
 */
function naturallift_ensure_cosmetics_page(): void {
	$page = get_page_by_path( 'cosmetics' );
	if ( ! $page ) {
		$page_id = wp_insert_post(
			array(
				'post_title'   => 'Моя косметика',
				'post_name'    => 'cosmetics',
				'post_status'  => 'publish',
				'post_type'    => 'page',
				'post_content' => '',
			)
		);
		if ( is_wp_error( $page_id ) || ! $page_id ) {
			return;
		}
	} else {
		$page_id = (int) $page->ID;
	}

	$current_template = get_page_template_slug( $page_id );
	if ( 'page-catalog.php' !== $current_template ) {
		update_post_meta( $page_id, '_wp_page_template', 'page-catalog.php' );
	}
}

/**
 * Flush rewrite rules один раз после регистрации CPT.
 */
function naturallift_maybe_flush_cosmetics_rewrites(): void {
	if ( get_option( 'naturallift_cosmetics_rewrites_flushed' ) === '1' ) {
		return;
	}
	flush_rewrite_rules( false );
	update_option( 'naturallift_cosmetics_rewrites_flushed', '1', false );
}
add_action( 'init', 'naturallift_maybe_flush_cosmetics_rewrites', 99 );

add_action(
	'after_switch_theme',
	function (): void {
		naturallift_ensure_cosmetics_page();
		delete_option( 'naturallift_cosmetics_rewrites_flushed' );
		flush_rewrite_rules();
	}
);

add_action( 'admin_init', 'naturallift_ensure_cosmetics_page' );

/**
 * Meta description для карточки продукта.
 */
add_action(
	'wp_head',
	function (): void {
		if ( ! is_singular( 'sc_product' ) ) {
			return;
		}
		$short = naturallift_sc_get_meta( get_the_ID(), 'short_description' );
		if ( $short ) {
			echo '<meta name="description" content="' . esc_attr( wp_strip_all_tags( $short ) ) . '" />' . "\n";
		}
	},
	1
);
