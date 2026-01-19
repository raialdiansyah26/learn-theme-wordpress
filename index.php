<?php get_header(); ?>

<main>
    
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

    <article>
        <a href="<?php the_permalink() ?>">
            <?php the_title(); ?>
        </a>
        <div>
            <?php the_content(); ?>
        </div>
    </article>

    <hr>

        <?php endwhile; ?>
    <?php else: ?>
        <p>Tidak ada konten</p>
    <?php endif ?>

</main>

<?php get_footer(); ?>