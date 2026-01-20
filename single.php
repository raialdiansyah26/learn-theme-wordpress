<?php get_header() ?>

<main>

    <?php if ( have_posts() ) :?>
        <?php while ( have_posts() ) : the_post(); ?>

        <article>
            <?php if ( has_post_thumbnail() ) : ?>
                <div class="single-thumbnail">
                    <?php the_post_thumbnail("large"); ?>
                </div>
            <?php endif; ?>

            <h1>Halaman yang di klik</h1>

            <h2><?php the_title(); ?></h2>
           
            <div>
                <?php the_content(); ?>
            </div>
            
        </article>

        <hr>

        <?php endwhile ?>
    <?php endif ?>

</main>

<?php get_footer(); ?>