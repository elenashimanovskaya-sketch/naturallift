<?php get_header(); ?>

<section class="hero-split">
    <div class="hero-left">
        <div class="hero-text">
            <span class="meta">Блог о естественной красоте</span>
            <h1>Специалист по омоложению лица: гимнастика, уход, натуральная косметика</h1>
            <p>Узнайте, как сохранить молодость и сияние кожи без инъекций с помощью фейс-йоги, массажных техник и авторского ухода.</p>
            <a href="<?php echo esc_url( naturallift_get_page_url( 'diagnostika-kozhi' ) ); ?>" class="btn btn-primary">Пройти диагностику</a>
        </div>
    </div>
    <div class="hero-right" style="background-image: url('https://naturallift.store/wp-content/uploads/2026/05/сыворотка-для-лица-с-пептидами.jpg');">
    </div>
    <div class="hero-center-portrait">
        <img src="https://naturallift.store/wp-content/uploads/2026/05/Дизайн-без-названия4-—-копия.png" alt="Елена Шимановская">
    </div>
</section>

<div class="container">
    <!-- Начни свое преображение -->
    <section class="featured-grid-section">
        <h2 class="script-title">Начни свое преображение</h2>
        <div class="category-filters">
            <a href="<?php echo esc_url( naturallift_get_category_url( 'feys-yoga' ) ); ?>">Фейс-йога</a>
            <a href="<?php echo esc_url( naturallift_get_category_url( 'ukhod-za-kozhey-litsa' ) ); ?>">Уход за кожей</a>
            <a href="<?php echo esc_url( naturallift_get_category_url( 'obraz-zhizni' ) ); ?>">Образ жизни</a>
            <a href="<?php echo esc_url( naturallift_get_category_url( 'massazh-litsa' ) ); ?>">Массаж лица</a>
            <a href="<?php echo esc_url( naturallift_get_category_url( 'ayurveda' ) ); ?>">Аюрведа</a>
        </div>
        <div class="featured-grid">
            <div class="featured-card">
                <?php $post_url_1 = naturallift_get_post_url( 'почему-лицо-выглядит-уставшим-даже-ес' ); ?>
                <a href="<?php echo esc_url( $post_url_1 ); ?>" class="featured-image">
                    <img src="https://naturallift.store/wp-content/uploads/2026/05/отеки-по-утрам.jpg" alt="Отеки по утрам">
                </a>
                <h3>Отеки по утрам</h3>
                <a href="<?php echo esc_url( $post_url_1 ); ?>" class="read-more">Читать далее</a>
            </div>
            <div class="featured-card">
                <?php $post_url_2 = naturallift_get_post_url( 'напряжение-морщины-почему-лицо-старе' ); ?>
                <a href="<?php echo esc_url( $post_url_2 ); ?>" class="featured-image">
                    <img src="https://naturallift.store/wp-content/uploads/2026/05/шея-старит-лицо.jpg" alt="Шея старит лицо">
                </a>
                <h3>Шея старит лицо</h3>
                <a href="<?php echo esc_url( $post_url_2 ); ?>" class="read-more">Читать далее</a>
            </div>
            <div class="featured-card">
                <?php $post_url_3 = naturallift_get_post_url( 'как-расслабить-лицо-за-5-минут-и-убрать' ); ?>
                <a href="<?php echo esc_url( $post_url_3 ); ?>" class="featured-image">
                    <img src="https://naturallift.store/wp-content/uploads/2026/05/почему-крем-не-работает.jpg" alt="Почему крем не работает">
                </a>
                <h3>Почему крем не работает</h3>
                <a href="<?php echo esc_url( $post_url_3 ); ?>" class="read-more">Читать далее</a>
            </div>
        </div>
    </section>
</div>

<!-- Блок с кремом (Product Promo) -->
<section class="product-promo">
    <div class="product-promo__inner">
        <div class="product-promo__media">
            <img src="https://naturallift.store/wp-content/uploads/2026/05/сыворотка-для-лица-с-пептидами.jpg" alt="Silver Cream">
            <div class="spin-badge spin-badge--promo">
                <svg class="spin-badge__svg" viewBox="0 0 200 200">
                    <path id="badgePath" fill="none" d="M 100, 100 m -75, 0 a 75,75 0 1,1 150,0 a 75,75 0 1,1 -150,0" />
                    <text class="spin-badge__text">
                        <textPath href="#badgePath">SILVER CREAM • NATURAL COSMETICS • SILVER CREAM • NATURAL COSMETICS • </textPath>
                    </text>
                </svg>
            </div>
        </div>
        <div class="product-promo__card">
            <span class="product-promo__kicker">Авторская косметика</span>
            <h2>Синергия природы и науки для вашей кожи</h2>
            <p>Мои кремы созданы на основе профессиональных ингредиентов с учетом анатомии лица. Идеально дополняют практики фейс-йоги и массажа.</p>
            <a href="<?php echo esc_url( naturallift_get_page_url( 'main-silver-cream' ) ); ?>" class="btn btn-promo">Каталог косметики</a>
        </div>
    </div>
</section>

<div class="container">
    <!-- Исследуйте по темам -->
    <section class="topics">
        <div class="section-header">
            <span class="meta">Категории</span>
            <h2>Исследуйте по темам</h2>
            <div class="divider"></div>
        </div>
        <div class="topics-grid">
            <a href="<?php echo esc_url( naturallift_get_category_url( 'feys-yoga' ) ); ?>" class="topic-item">
                <div class="topic-img-wrap">
                    <img src="https://naturallift.store/wp-content/uploads/2026/05/фейс-йога.jpg" alt="Фейс-йога">
                </div>
                <h3>Фейс-йога</h3>
            </a>
            <a href="<?php echo esc_url( naturallift_get_category_url( 'ukhod-za-kozhey-litsa' ) ); ?>" class="topic-item">
                <div class="topic-img-wrap">
                    <img src="https://naturallift.ru/wp-content/uploads/2026/03/42c7a1779ed2d0c9f50fa3dc165d202e_d64b7ab3-e344-40a0-85e0-3e9227435d85.png" alt="Косметика">
                </div>
                <h3>Косметика</h3>
            </a>
            <a href="<?php echo esc_url( naturallift_get_category_url( 'ayurveda' ) ); ?>" class="topic-item">
                <div class="topic-img-wrap">
                    <img src="https://naturallift.store/wp-content/uploads/2026/05/аюрведа-для-сайта.jpg" alt="Аюрведа">
                </div>
                <h3>Аюрведа</h3>
            </a>
            <a href="<?php echo esc_url( naturallift_get_category_url( 'obraz-zhizni' ) ); ?>" class="topic-item">
                <div class="topic-img-wrap">
                    <img src="https://naturallift.store/wp-content/uploads/2026/05/я-на-йога-коврике-в-йога-костюме.jpg" alt="Образ жизни">
                </div>
                <h3>Образ жизни</h3>
            </a>
        </div>
    </section>
</div>

<!-- Диагностика лица -->
<section class="diagnostic-section">
    <div class="diagnostic-inner">
        <div class="diagnostic-content">
            <h2 class="diagnostic-title">Диагностика лица</h2>
            <p class="diagnostic-text">Пройдите онлайн-тест, чтобы определить состояние вашей кожи и получить персональные рекомендации по уходу и упражнениям.</p>
            <a href="<?php echo esc_url( naturallift_get_page_url( 'diagnostika-kozhi' ) ); ?>" class="btn btn-primary">Пройти тест</a>
        </div>
        <div class="diagnostic-images">
            <div class="diag-img-box"><img src="https://naturallift.store/wp-content/uploads/2026/05/до-после.jpg" alt="До и После"></div>
            <div class="diag-img-box"><img src="https://naturallift.store/wp-content/uploads/2026/05/фото-крема-с-девушками.jpg" alt="Процесс"></div>
            <div class="diag-img-box"><img src="https://naturallift.store/wp-content/uploads/2026/05/фото-моих-кремов-на-подносе.jpg" alt="Результат"></div>
        </div>
    </div>
    <div class="wave-divider">
        <svg preserveAspectRatio="none" viewBox="0 0 1200 120" xmlns="http://www.w3.org/2000/svg" fill="var(--color-bg)">
            <path d="M0 0v46.29c47.79 22.2 103.59 32.17 158 28 70.36-5.37 136.33-33.31 206.8-37.5 73.84-4.36 147.54 16.88 218.2 35.26 69.27 18 138.3 24.88 209.4 13.08 36.15-6 69.85-17.84 104.45-29.34C989.49 25 1113-14.29 1200 52.47V0z"/>
        </svg>
    </div>
</section>

<div class="container">
    <!-- Обо мне -->
    <section class="about-section">
        <div class="about-inner">
            <div class="about-image-col">
                <div class="about-portrait">
                    <img src="https://naturallift.store/wp-content/uploads/2026/05/мое-фото-на-фоне-зелени.jpg" alt="Елена Шимановская">
                </div>
            </div>
            <div class="about-text-col">
                <span class="product-promo__kicker">блог</span>
                <h2 class="about-title">Елена Шимановская</h2>
                <p>Мне 55 лет, и я помогаю женщинам сохранять молодость и сияние кожи естественными методами. Мой путь — это сочетание глубоких знаний анатомии, фейс-йоги и создания авторской натуральной косметики.</p>
                <p>Я верю, что красота начинается с любви к себе и осознанного ухода. Моя миссия — показать вам, что вы можете выглядеть великолепно в любом возрасте, используя силу собственных рук и природные компоненты.</p>
                <a href="<?php echo esc_url( naturallift_get_page_url( 'about' ) ); ?>" class="btn">Больше обо мне</a>
            </div>
        </div>
    </section>

    <!-- Highlighted Posts (2 Blocks) -->
    <section class="highlighted-posts">
        <div class="highlighted-grid">
            <div class="highlight-col">
                <article class="highlight-post highlight-post--text-top">
                    <div class="highlight-post__content">
                        <h2 class="script-title">Секреты ухода</h2>
                        <p>Узнайте, почему ваша кожа может терять сияние и как вернуть ей здоровый вид с помощью простых ежедневных ритуалов и правильного подбора ингредиентов.</p>
                        <?php $post_url_4 = naturallift_get_post_url( 'секреты-ухода-почему-кожа-не-сияет-даж' ); ?>
                        <a href="<?php echo esc_url( $post_url_4 ); ?>" class="read-more">Читать далее</a>
                    </div>
                    <div class="highlight-post__image">
                        <img src="https://naturallift.store/wp-content/uploads/2026/05/секреты-ухода-за-лицом.jpg" alt="Секреты ухода">
                    </div>
                </article>
            </div>
            <div class="highlight-col">
                <article class="highlight-post highlight-post--image-top">
                    <div class="highlight-post__image">
                        <img src="https://naturallift.store/wp-content/uploads/2026/05/утренние-ритуалы-для-лица.jpg" alt="Жизнь в балансе">
                    </div>
                    <div class="highlight-post__content">
                        <h2 class="script-title">Жизнь в балансе</h2>
                        <?php $post_url_5 = naturallift_get_post_url( 'секреты-ухода-почему-кожа-не-сияет-даж-2' ); ?>
                        <p>Красота — это не только уход за лицом, но и гармония внутри. Делюсь практиками йоги, медитации и советами по питанию для поддержания энергии.</p>
                        <a href="<?php echo esc_url( $post_url_5 ); ?>" class="read-more">Читать далее</a>
                    </div>
                </article>
            </div>
        </div>
    </section>

    <!-- Новое в блоге -->
    <main class="main-content">
        <div class="section-header">
            <h2>Новое в блоге</h2>
            <div class="divider"></div>
        </div>

        <?php
        $latest = new WP_Query(
            array(
                'post_type'           => 'post',
                'posts_per_page'      => 3,
                'ignore_sticky_posts' => true,
            )
        );
        ?>

        <?php if ( $latest->have_posts() ) : ?>
            <?php while ( $latest->have_posts() ) : ?>
                <?php
                $latest->the_post();

                $cat_name = '';
                $cats     = get_the_category();
                if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
                    $cat_name = (string) $cats[0]->name;
                }
                ?>

                <article class="post-card">
                    <a href="<?php the_permalink(); ?>" class="post-image">
                        <img src="<?php echo esc_url( naturallift_get_post_image_url( get_the_ID() ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>">
                    </a>
                    <div class="post-content">
                        <?php if ( $cat_name !== '' ) : ?>
                            <span class="meta"><?php echo esc_html( $cat_name ); ?></span>
                        <?php endif; ?>
                        <h3><?php the_title(); ?></h3>
                        <p><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22, '…' ) ); ?></p>
                        <a href="<?php the_permalink(); ?>" class="read-more">Читать далее</a>
                    </div>
                </article>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        <?php else : ?>
            <p style="text-align: center; color: var(--color-text-muted);">Статей пока нет. Опубликуйте свою первую запись в WordPress!</p>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
