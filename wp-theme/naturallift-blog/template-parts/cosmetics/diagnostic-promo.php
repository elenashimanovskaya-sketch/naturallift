<?php
/**
 * Промо диагностики с купоном.
 *
 * @package naturallift-blog
 */

$diag_url = naturallift_diagnostic_url();
?>
<section class="sc-diag-promo">
	<div class="sc-diag-promo__inner">
		<div class="sc-diag-promo__badge">Подарок</div>
		<div class="sc-diag-promo__content">
			<h2 class="sc-diag-promo__title">Пройдите диагностику лица — получите купон на уход</h2>
			<p class="sc-diag-promo__text">Короткий квиз Silver Cream определит тип кожи и задачи. После прохождения — персональная рекомендация и купон на первый заказ.</p>
			<a class="btn btn-primary sc-diag-promo__cta" href="<?php echo esc_url( $diag_url ); ?>">Пройти диагностику</a>
		</div>
	</div>
</section>
