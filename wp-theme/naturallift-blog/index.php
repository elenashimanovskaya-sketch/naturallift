<?php get_header(); ?>

<div class="container" style="padding-top: var(--space-lg); padding-bottom: var(--space-xl);">
    <header class="archive-header" style="text-align: center; margin-bottom: var(--space-xl);">
        <h1 class="archive-title" style="font-size: 48px; font-family: var(--font-heading); color: var(--color-text); margin-bottom: var(--space-sm);">
            <?php
            if ( is_category() ) {
                single_cat_title();
            } elseif ( is_tag() ) {
                single_tag_title();
            } elseif ( is_author() ) {
                the_author();
            } elseif ( is_archive() ) {
                the_archive_title();
            } else {
                echo 'Блог';
            }
            ?>
        </h1>
        <div class="divider"></div>
    </header>

    <main class="main-content" style="max-width: 800px; margin: 0 auto;">
        <?php if ( have_posts() ) : ?>
            <div class="blog-list" style="display: flex; flex-direction: column; gap: 64px;">
                <?php while ( have_posts() ) : the_post(); 
                    $cat_name = '';
                    $cats     = get_the_category();
                    if ( ! empty( $cats ) && ! is_wp_error( $cats ) ) {
                        $cat_name = (string) $cats[0]->name;
                    }
                ?>
                    <article class="post-card" style="text-align: center; margin-bottom: 0;">
                        <a href="<?php the_permalink(); ?>" class="post-image" style="display: block; margin-bottom: var(--space-md); overflow: hidden; border-radius: 4px;">
                            <img src="<?php echo esc_url( naturallift_get_post_image_url( get_the_ID() ) ); ?>" alt="<?php echo esc_attr( get_the_title() ); ?>" style="width: 100%; height: auto; aspect-ratio: 16/9; object-fit: cover;">
                        </a>
                        <div class="post-content" style="max-width: 80%; margin: 0 auto;">
                            <?php if ( $cat_name !== '' ) : ?>
                                <span class="meta"><?php echo esc_html( $cat_name ); ?></span>
                            <?php endif; ?>
                            <h3 style="font-size: 28px; margin-bottom: var(--space-sm);"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            <p style="color: var(--color-text-muted); margin-bottom: var(--space-md); font-family: var(--font-body); font-size: 15px; font-weight: 300;"><?php echo esc_html( wp_trim_words( get_the_excerpt(), 22, '…' ) ); ?></p>
                            <a href="<?php the_permalink(); ?>" class="read-more">Читать далее</a>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>
            
            <div class="pagination" style="display: flex; justify-content: center; gap: 16px; margin-top: 60px; font-family: var(--font-body); font-size: 13px;">
                <?php
                echo paginate_links(
                    array(
                        'prev_text' => '&larr; Предыдущие',
                        'next_text' => 'Следующие &rarr;',
                    )
                );
                ?>
            </div>
        <?php else : ?>
            <p style="text-align: center; color: var(--color-text-muted); font-family: var(--font-body);">Записей в этой рубрике пока нет. Напишите свою первую статью!</p>
        <?php endif; ?>
    </main>
</div>

<?php get_footer(); ?>
