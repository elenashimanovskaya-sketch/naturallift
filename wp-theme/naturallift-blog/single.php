<?php get_header(); ?>

<div class="container" style="padding-top: var(--space-lg); padding-bottom: var(--space-xl);">
    <article class="single-post-layout" style="max-width: 800px; margin: 0 auto; background: var(--color-surface); padding: 48px; border: 1px solid var(--color-border); box-shadow: 0 10px 30px rgba(74, 51, 54, 0.03);">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <header class="post-header" style="text-align: center; margin-bottom: var(--space-lg);">
                <?php
                $cats = get_the_category();
                if ( ! empty( $cats ) ) : ?>
                    <span class="meta" style="margin-bottom: 12px; display: inline-block;"><?php echo esc_html( $cats[0]->name ); ?></span>
                <?php endif; ?>
                <h1 class="post-title" style="font-size: 42px; margin-bottom: 16px; font-family: var(--font-heading); line-height: 1.2; color: var(--color-text);"><?php the_title(); ?></h1>
                <div class="post-date" style="font-family: var(--font-body); font-size: 13px; color: var(--color-text-muted);"><?php echo get_the_date(); ?></div>
            </header>

            <?php if ( has_post_thumbnail() ) : ?>
                <div class="post-featured-image" style="margin-bottom: var(--space-lg); overflow: hidden; border-radius: 4px;">
                    <?php the_post_thumbnail( 'large', array( 'style' => 'width: 100%; height: auto; display: block; object-fit: cover;' ) ); ?>
                </div>
            <?php endif; ?>

            <div class="post-content-body" style="font-family: var(--font-body); font-size: 16px; line-height: 1.8; color: var(--color-text);">
                <?php the_content(); ?>
            </div>
            
            <footer class="post-footer" style="margin-top: 60px; padding-top: var(--space-md); border-top: 1px solid var(--color-border);">
                <div class="post-navigation" style="display: flex; justify-content: space-between; font-family: var(--font-body); font-size: 13px;">
                    <div class="nav-previous" style="max-width: 45%;"><?php previous_post_link( '%link', '&larr; Предыдущая статья' ); ?></div>
                    <div class="nav-next" style="max-width: 45%; text-align: right;"><?php next_post_link( '%link', 'Следующая статья &rarr;' ); ?></div>
                </div>
            </footer>
        <?php endwhile; endif; ?>
    </article>
</div>

<?php get_footer(); ?>
