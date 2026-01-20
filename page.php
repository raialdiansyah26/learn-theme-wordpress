<?php get_header(); ?>

<main>

    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

        <article>
            <h1>Halaman Page</h1>

            <h2><?php the_title() ?></h2>

            <div>
                <?php the_content() ?>
            </div>
        </article>

        <?php endwhile; ?>
    <?php endif; ?>

</main>

<?php get_footer() ?>