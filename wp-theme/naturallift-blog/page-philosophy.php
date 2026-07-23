<?php
/**
 * Template Name: Philosophy & Care
 * Description: Страница, подробно описывающая философию бренда, активные фазы составов и ритуалы заботы о себе.
 */

get_header(); 
$catalog_url = naturallift_get_page_url( 'cosmetics' );
?>

<div class="container" style="padding-top: var(--space-lg); padding-bottom: var(--space-xl);">
    <!-- HERO СЕКЦИЯ -->
    <section class="philosophy-hero" style="display: flex; gap: 64px; align-items: center; margin-bottom: 100px;">
        <div class="philosophy-hero__content" style="flex: 1;">
            <span class="product-promo__kicker" style="font-size: 12px; letter-spacing: 2px;">Осознанная косметология</span>
            <h1 style="font-size: 56px; font-family: var(--font-heading); line-height: 1.1; margin-bottom: 24px; color: var(--color-text);">
                История, которая началась с <em>заботы</em>
            </h1>
            <p style="font-size: 18px; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 32px;">
                Silver Cream вырос из глубокого понимания физиологии кожи и многолетней практики омоложения. Когда регулярные упражнения и массаж меняют тонус мышц, косметика обязана поддерживать этот процесс изнутри, а не создавать видимость гладкости за счет силиконовой пленки.
            </p>
            <div class="philosophy-quote" style="border-left: 2px solid var(--color-primary); padding-left: 24px; margin-bottom: 32px; font-style: italic; font-family: var(--font-heading); font-size: 20px; line-height: 1.5; color: var(--color-text);">
                «Ваша красота — это не борьба с возрастом. Это ежедневный, наполненный любовью и благодарностью диалог с собой». <br>
                <span style="font-family: var(--font-script); font-size: 26px; color: var(--color-primary); display: block; margin-top: 10px; font-style: normal;">— Елена Шимановская</span>
            </div>
        </div>
        <div class="philosophy-hero__image" style="flex: 1; max-width: 540px; position: relative;">
            <img src="https://naturallift.store/wp-content/uploads/2026/05/фото-моих-кремов-на-подносе.jpg" alt="Косметика Silver Cream на подносе" style="width: 100%; aspect-ratio: 4/5; object-fit: cover; border-radius: 8px; border: 1px solid var(--color-border); box-shadow: 0 20px 40px rgba(74, 51, 54, 0.06);">
            <div class="spin-badge spin-badge--philosophy" style="position: absolute; bottom: -30px; right: -30px; width: 140px; height: 140px; background: var(--color-bg); border-radius: 50%; display: flex; align-items: center; justify-content: center; box-shadow: 0 10px 25px rgba(0,0,0,0.05); pointer-events: none; user-select: none;">
                <svg class="spin-badge__svg" viewBox="0 0 200 200" style="display: block; width: 100%; height: auto;">
                    <path id="philosophyPath" fill="none" d="M100,100 m-80,0 a80,80 0 1,1 160,0 a80,80 0 1,1 -160,0" />
                    <g class="spin-badge__ring" style="transform-origin: 100px 100px; animation: spin-badge-rotate 24s linear infinite;">
                        <text class="spin-badge__text" style="font-family: var(--font-body); font-size: 13px; font-weight: 600; fill: var(--color-text); letter-spacing: 0.18em; text-transform: uppercase;">
                            <textPath href="#philosophyPath" startOffset="0" textLength="502.65" lengthAdjust="spacing">
                                Silver Cream любит тебя <tspan class="spin-badge__heart" style="fill: var(--color-gold-deep);">♥︎</tspan> Silver Cream любит тебя <tspan class="spin-badge__heart" style="fill: var(--color-gold-deep);">♥︎</tspan> Silver Cream любит тебя <tspan class="spin-badge__heart" style="fill: var(--color-gold-deep);">♥︎</tspan>
                            </textPath>
                        </text>
                    </g>
                </svg>
            </div>
        </div>
    </section>

    <!-- СЕКЦИЯ: ТРИ АКТИВНЫЕ ФАЗЫ -->
    <section class="phases-section" style="margin-bottom: 100px;">
        <header class="section-header" style="text-align: center; margin-bottom: 60px;">
            <span class="meta">Честный состав</span>
            <h2 style="font-size: 40px; font-family: var(--font-heading); color: var(--color-text);">Три активные фазы Silver Cream</h2>
            <div class="divider" style="margin: 20px auto 0;"></div>
            <p style="max-width: 700px; margin: 24px auto 0; color: var(--color-text-muted); font-size: 16px; line-height: 1.6;">
                Мы не скрываем формулы за коммерческими тайнами. Наша косметика создается по канонам классической корнеотерапии и состоит из трех дополняющих друг друга фаз, указанных прямо на этикетках.
            </p>
        </header>

        <div class="phases-grid" style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 40px;">
            <!-- Фаза 1 -->
            <article class="phase-card" style="background: var(--color-surface); border: 1px solid var(--color-border); padding: 40px 30px; border-radius: 8px; text-align: center; transition: all 0.3s ease;">
                <div class="phase-card__number" style="font-family: var(--font-heading); font-size: 48px; color: var(--color-primary); line-height: 1; margin-bottom: 16px;">15-20%</div>
                <h3 style="font-size: 22px; font-family: var(--font-heading); color: var(--color-text); margin-bottom: 16px;">Жирная фаза (Oil)</h3>
                <span class="phase-card__subtitle" style="font-family: var(--font-script); font-size: 20px; color: var(--color-gold-deep); display: block; margin-bottom: 20px;">Питание и липидный барьер</span>
                <p style="font-size: 14px; line-height: 1.6; color: var(--color-text-muted); text-align: left;">
                    Мы используем исключительно натуральные растительные липиды премиального качества (натуральный сквалан, масла арганы, жожоба, макадамии, семян персика и ши). Они физиологически родственны коже, поэтому мгновенно встраиваются в поврежденный роговой слой, восстанавливая его защитный барьер, предотвращая потерю влаги и даря бархатистую мягкость без комедогенного эффекта.
                </p>
            </article>

            <!-- Фаза 2 -->
            <article class="phase-card" style="background: var(--color-surface); border: 1px solid var(--color-border); padding: 40px 30px; border-radius: 8px; text-align: center; transition: all 0.3s ease;">
                <div class="phase-card__number" style="font-family: var(--font-heading); font-size: 48px; color: var(--color-primary); line-height: 1; margin-bottom: 16px;">65-75%</div>
                <h3 style="font-size: 22px; font-family: var(--font-heading); color: var(--color-text); margin-bottom: 16px;">Водная фаза (Water)</h3>
                <span class="phase-card__subtitle" style="font-family: var(--font-script); font-size: 20px; color: var(--color-gold-deep); display: block; margin-bottom: 20px;">Глубокая гидратация</span>
                <p style="font-size: 14px; line-height: 1.6; color: var(--color-text-muted); text-align: left;">
                    Основа наших средств — не техническая вода, а чистейшие органические дистилляты (гидролаты розы, лаванды, белого чая и ромашки) в сочетании с деионизированной водой высокой очистки и соком алоэ вера. Это живая влага, которая насыщает клетки антиоксидантами, успокаивает чувствительную кожу и служит естественным проводником для глубокого проникновения биологически активных молекул.
                </p>
            </article>

            <!-- Фаза 3 -->
            <article class="phase-card" style="background: var(--color-surface); border: 1px solid var(--color-border); padding: 40px 30px; border-radius: 8px; text-align: center; transition: all 0.3s ease;">
                <div class="phase-card__number" style="font-family: var(--font-heading); font-size: 48px; color: var(--color-primary); line-height: 1; margin-bottom: 16px;">5-10%</div>
                <h3 style="font-size: 22px; font-family: var(--font-heading); color: var(--color-text); margin-bottom: 16px;">Активная фаза (Active)</h3>
                <span class="phase-card__subtitle" style="font-family: var(--font-script); font-size: 20px; color: var(--color-gold-deep); display: block; margin-bottom: 20px;">Клеточная терапия</span>
                <p style="font-size: 14px; line-height: 1.6; color: var(--color-text-muted); text-align: left;">
                    Высокотехнологичные компоненты с клинически доказанной эффективностью: инновационные пептиды-миорелаксанты (расслабляют мимическое напряжение по принципу мягкого ботокса), низкомолекулярная гиалуроновая кислота, стабильные витамины C и E, ниацинамид (витамин B3), Д-пантенол и ценные экстракты (эдельвейс, центелла азиатская). Они запускают регенерацию и синтез собственного коллагена.
                </p>
            </article>
        </div>
    </section>

    <!-- СЕКЦИЯ: СИНЕРГИЯ С ФЕЙС-ЙОГОЙ -->
    <section class="philosophy-synergy" style="display: flex; gap: 64px; align-items: center; margin-bottom: 100px;">
        <div class="philosophy-synergy__image" style="flex: 1; max-width: 500px;">
            <img src="https://naturallift.ru/wp-content/uploads/2026/04/ya-na-joga-kovrike.jpg" alt="Елена Шимановская практикует йогу" style="width: 100%; aspect-ratio: 1/1; object-fit: cover; border-radius: 50%; border: 1px solid var(--color-border); box-shadow: 0 15px 35px rgba(74, 51, 54, 0.05); padding: 12px; background: var(--color-surface);">
        </div>
        <div class="philosophy-synergy__content" style="flex: 1;">
            <span class="product-promo__kicker">Синергия ухода</span>
            <h2 style="font-size: 40px; font-family: var(--font-heading); color: var(--color-text); margin-bottom: 24px;">Сила рук и дары природы</h2>
            <p style="font-size: 15px; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 20px;">
                Мануальные техники, массаж лица и упражнения фейс-йоги разогревают ткани, запускают микроциркуляцию крови и улучшают лимфодренаж. Именно в этот момент ваша кожа максимально открыта для восприятия питательных веществ.
            </p>
            <p style="font-size: 15px; line-height: 1.7; color: var(--color-text-muted); margin-bottom: 24px;">
                Формулы Silver Cream разработаны таким образом, чтобы работать в полной синергии с массажем. Они обеспечивают идеальное скольжение рук без забивания пор, а при разогреве кожи во время практик активные компоненты мгновенно усваиваются и проникают в глубокие слои эпидермиса, удваивая результаты ваших занятий.
            </p>
            <div style="display: flex; gap: 24px;">
                <div style="flex: 1;">
                    <strong style="color: var(--color-text); font-family: var(--font-heading); font-size: 18px; display: block; margin-bottom: 8px;">Утренний ритуал</strong>
                    <p style="font-size: 13px; color: var(--color-text-muted); line-height: 1.5; margin: 0;">Нанесение дневного крема легкими похлопывающими движениями пальцевого душа. Пробуждает сияние и защищает кожу на весь день.</p>
                </div>
                <div style="flex: 1;">
                    <strong style="color: var(--color-text); font-family: var(--font-heading); font-size: 18px; display: block; margin-bottom: 8px;">Вечерний ритуал</strong>
                    <p style="font-size: 13px; color: var(--color-text-muted); line-height: 1.5; margin: 0;">Глубокий самомассаж с сывороткой и ночным кремом. Снимает накопленное за день мимическое напряжение мышц.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- СЕКЦИЯ: НАШИ СТАНДАРТЫ -->
    <section class="standards-section" style="background: var(--color-surface); border: 1px solid var(--color-border); padding: 60px; border-radius: 8px; margin-bottom: 100px;">
        <header class="section-header" style="text-align: center; margin-bottom: 48px;">
            <span class="meta">Наши принципы</span>
            <h2 style="font-size: 36px; font-family: var(--font-heading); color: var(--color-text); margin: 0;">Чистота без компромиссов</h2>
        </header>
        <div class="standards-grid" style="display: grid; grid-template-columns: repeat(4, 1fr); gap: 32px; text-align: center;">
            <div class="standard-item">
                <div style="font-size: 32px; margin-bottom: 16px;">🌱</div>
                <h4 style="font-family: var(--font-heading); font-size: 18px; color: var(--color-text); margin-bottom: 10px;">100% Веганские масла</h4>
                <p style="font-size: 13px; color: var(--color-text-muted); line-height: 1.5; margin: 0;">Никаких минеральных и дешевых синтетических масел. Только чистое холодное прессование.</p>
            </div>
            <div class="standard-item">
                <div style="font-size: 32px; margin-bottom: 16px;">🧴</div>
                <h4 style="font-family: var(--font-heading); font-size: 18px; color: var(--color-text); margin-bottom: 10px;">Без силиконов и парабенов</h4>
                <p style="font-size: 13px; color: var(--color-text-muted); line-height: 1.5; margin: 0;">Мы не маскируем проблемы кожи временным скольжением, а лечим и восстанавливаем её изнутри.</p>
            </div>
            <div class="standard-item">
                <div style="font-size: 32px; margin-bottom: 16px;">🧪</div>
                <h4 style="font-family: var(--font-heading); font-size: 18px; color: var(--color-text); margin-bottom: 10px;">Проверенные активы</h4>
                <p style="font-size: 13px; color: var(--color-text-muted); line-height: 1.5; margin: 0;">Используем инновационные сертифицированные компоненты с клинической базой из Европы.</p>
            </div>
            <div class="standard-item">
                <div style="font-size: 32px; margin-bottom: 16px;">🙌</div>
                <h4 style="font-family: var(--font-heading); font-size: 18px; color: var(--color-text); margin-bottom: 10px;">Малые партии</h4>
                <p style="font-size: 13px; color: var(--color-text-muted); line-height: 1.5; margin: 0;">Ручная работа гарантирует свежесть каждого флакона, сохраняя пользу всех активных фаз.</p>
            </div>
        </div>
    </section>

    <!-- СЕКЦИЯ: ПРИЗЫВ К ДЕЙСТВИЮ (CTA) -->
    <section class="philosophy-cta" style="text-align: center; max-width: 700px; margin: 0 auto;">
        <span class="product-promo__kicker">Начните свой ритуал красоты</span>
        <h2 style="font-size: 44px; font-family: var(--font-heading); color: var(--color-text); margin-bottom: 16px;">Раскройте потенциал вашей кожи</h2>
        <p style="color: var(--color-text-muted); font-size: 16px; line-height: 1.7; margin-bottom: 32px;">
            Пройдите короткую диагностику кожи, чтобы получить рекомендации по упражнениям и подобрать идеальный уход Silver Cream, или перейдите в наш каталог.
        </p>
        <div style="display: flex; gap: 20px; justify-content: center;">
            <a href="<?php echo esc_url( naturallift_get_page_url( 'diagnostika-kozhi' ) ); ?>" class="btn btn-primary" style="padding: 16px 40px; font-size: 14px;">Пройти диагностику</a>
            <a href="<?php echo esc_url( $catalog_url ); ?>" class="btn" style="padding: 16px 40px; font-size: 14px; border: 1px solid var(--color-border); background: transparent;">В каталог косметики</a>
        </div>
    </section>
</div>

<?php get_footer(); ?>
