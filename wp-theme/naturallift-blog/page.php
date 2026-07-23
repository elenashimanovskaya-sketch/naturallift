<?php get_header(); ?>

<div class="container" style="padding-top: var(--space-lg); padding-bottom: var(--space-xl);">
    <article class="generic-page-layout" style="max-width: 800px; margin: 0 auto; background: var(--color-surface); padding: 48px; border: 1px solid var(--color-border); box-shadow: 0 10px 30px rgba(74, 51, 54, 0.03);">
        <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
            <header class="page-header" style="text-align: center; margin-bottom: var(--space-lg);">
                <h1 class="page-title" style="font-size: 42px; margin-bottom: 16px; font-family: var(--font-heading); line-height: 1.2; color: var(--color-text);"><?php the_title(); ?></h1>
            </header>

            <div class="page-content-body" style="font-family: var(--font-body); font-size: 16px; line-height: 1.8; color: var(--color-text);">
                <?php the_content(); ?>
            </div>
        <?php endwhile; endif; ?>
    </article>
</div>

<?php get_footer(); ?>
