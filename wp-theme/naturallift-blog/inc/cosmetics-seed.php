<?php
/**
 * Первичное наполнение и обновление каталога Silver Cream.
 */
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Создать или получить термин.
 */
function naturallift_sc_ensure_term( string $taxonomy, string $name ): int {
	$slug = sanitize_title( $name );
	$term = get_term_by( 'slug', $slug, $taxonomy );
	if ( $term && ! is_wp_error( $term ) ) {
		return (int) $term->term_id;
	}
	$result = wp_insert_term( $name, $taxonomy, array( 'slug' => $slug ) );
	if ( is_wp_error( $result ) ) {
		return 0;
	}
	return (int) $result['term_id'];
}

/**
 * Создать или обновить продукт.
 *
 * @param array<string, mixed> $data Product data.
 */
function naturallift_sc_upsert_product( array $data ): int {
	$slug     = $data['slug'];
	$existing = get_page_by_path( $slug, OBJECT, 'sc_product' );

	$postarr = array(
		'post_title'   => $data['title'],
		'post_name'    => $slug,
		'post_status'  => 'publish',
		'post_type'    => 'sc_product',
		'post_content' => $data['content'] ?? '',
		'menu_order'   => $data['menu_order'] ?? 0,
	);

	if ( $existing ) {
		$postarr['ID'] = $existing->ID;
		$post_id       = wp_update_post( $postarr );
	} else {
		$post_id = wp_insert_post( $postarr );
	}

	if ( is_wp_error( $post_id ) || ! $post_id ) {
		return 0;
	}

	foreach ( $data['meta'] as $key => $value ) {
		update_post_meta( (int) $post_id, '_sc_' . $key, $value );
	}

	if ( ! empty( $data['thumbnail_url'] ) ) {
		update_post_meta( (int) $post_id, '_sc_external_image', $data['thumbnail_url'] );
	}

	foreach ( array( 'skin_type', 'skin_concern', 'product_effect' ) as $taxonomy ) {
		if ( empty( $data[ $taxonomy ] ) ) {
			continue;
		}
		$term_ids = array();
		foreach ( (array) $data[ $taxonomy ] as $term_name ) {
			$term_id = naturallift_sc_ensure_term( $taxonomy, $term_name );
			if ( $term_id ) {
				$term_ids[] = $term_id;
			}
		}
		wp_set_object_terms( (int) $post_id, $term_ids, $taxonomy );
	}

	return (int) $post_id;
}

/**
 * Снять устаревшие позиции с витрины.
 */
function naturallift_sc_retire_old_products(): void {
	foreach ( naturallift_sc_retired_product_slugs() as $slug ) {
		$post = get_page_by_path( $slug, OBJECT, 'sc_product' );
		if ( $post && 'publish' === $post->post_status ) {
			wp_update_post(
				array(
					'ID'          => (int) $post->ID,
					'post_status' => 'draft',
				)
			);
		}
	}
}

/**
 * Запуск seed / sync каталога.
 */
function naturallift_seed_cosmetics_products(): void {
	if ( get_option( 'naturallift_cosmetics_seeded_v5' ) === '1' ) {
		return;
	}

	naturallift_ensure_cosmetics_page();

	foreach ( naturallift_sc_seed_products_data() as $product ) {
		naturallift_sc_upsert_product( $product );
	}

	naturallift_sc_retire_old_products();

	update_option( 'naturallift_cosmetics_seeded_v5', '1', false );
	delete_option( 'naturallift_cosmetics_seeded_v4' );
	delete_option( 'naturallift_cosmetics_seeded_v3' );
}

add_action( 'after_switch_theme', 'naturallift_seed_cosmetics_products' );
add_action(
	'admin_init',
	function (): void {
		if ( current_user_can( 'manage_options' ) ) {
			naturallift_seed_cosmetics_products();
		}
	}
);

if ( defined( 'WP_CLI' ) && WP_CLI ) {
	WP_CLI::add_command(
		'naturallift seed-cosmetics',
		function (): void {
			delete_option( 'naturallift_cosmetics_seeded_v5' );
			delete_option( 'naturallift_cosmetics_seeded_v4' );
			delete_option( 'naturallift_cosmetics_seeded_v3' );
			naturallift_seed_cosmetics_products();
			WP_CLI::success( 'Каталог Silver Cream обновлён (v5).' );
		}
	);
}
