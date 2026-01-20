<?php get_header(); ?>

<main>
    
    <?php if ( have_posts() ) : ?>
        <?php while ( have_posts() ) : the_post(); ?>

    <article>
        <?php if ( has_post_thumbnail() ) : ?>
            <div class="post-thumbnail">
                <?php the_post_thumbnail("medium"); ?>
            </div>
        <?php endif; ?>

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