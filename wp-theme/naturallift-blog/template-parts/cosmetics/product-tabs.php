<?php
/**
 * Вкладки карточки продукта.
 *
 * @package naturallift-blog
 */

$post_id = get_the_ID();

$tabs = array(
	'ingredients'     => array(
		'label'   => 'Активные ингредиенты',
		'content' => naturallift_sc_get_meta( $post_id, 'active_ingredients' ),
	),
	'composition'     => array(
		'label'   => 'Полный состав',
		'content' => naturallift_sc_get_meta( $post_id, 'full_composition' ),
	),
	'application'     => array(
		'label'   => 'Применение',
		'content' => naturallift_sc_get_meta( $post_id, 'application' ),
	),
	'recommendations' => array(
		'label'   => 'Рекомендации',
		'content' => naturallift_sc_get_meta( $post_id, 'recommendations' ),
	),
);

$face_yoga = naturallift_sc_get_meta( $post_id, 'face_yoga' );
if ( $face_yoga && '—' !== trim( wp_strip_all_tags( $face_yoga ) ) ) {
	$tabs['face_yoga'] = array(
		'label'   => 'Фейс-йога',
		'content' => $face_yoga,
	);
}

$visible_tabs = array();
foreach ( $tabs as $key => $tab ) {
	if ( '' !== trim( wp_strip_all_tags( (string) $tab['content'] ) ) ) {
		$visible_tabs[ $key ] = $tab;
	}
}

if ( empty( $visible_tabs ) ) {
	return;
}

$first_key = array_key_first( $visible_tabs );
?>
<div class="sc-tabs" data-sc-tabs>
	<div class="sc-tabs__nav" role="tablist" aria-label="Информация о продукте">
		<?php foreach ( $visible_tabs as $key => $tab ) : ?>
			<button
				class="sc-tabs__btn<?php echo $key === $first_key ? ' is-active' : ''; ?>"
				type="button"
				role="tab"
				id="sc-tab-<?php echo esc_attr( $key ); ?>"
				aria-selected="<?php echo $key === $first_key ? 'true' : 'false'; ?>"
				aria-controls="sc-panel-<?php echo esc_attr( $key ); ?>"
				data-sc-tab="<?php echo esc_attr( $key ); ?>"
			>
				<?php echo esc_html( $tab['label'] ); ?>
			</button>
		<?php endforeach; ?>
	</div>

	<div class="sc-tabs__panels">
		<?php foreach ( $visible_tabs as $key => $tab ) : ?>
			<?php $is_active = ( $key === $first_key ); ?>
			<div
				class="sc-tabs__panel<?php echo $is_active ? ' is-active' : ''; ?>"
				role="tabpanel"
				id="sc-panel-<?php echo esc_attr( $key ); ?>"
				aria-labelledby="sc-tab-<?php echo esc_attr( $key ); ?>"
				data-sc-panel="<?php echo esc_attr( $key ); ?>"
				<?php echo $is_active ? '' : 'hidden'; ?>
			>
				<div class="sc-tabs__content">
					<?php echo wp_kses_post( $tab['content'] ); ?>
				</div>
			</div>
		<?php endforeach; ?>
	</div>
</div>
