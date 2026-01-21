<?php get_header(); ?>

<main>
    <div class="post-list">
    
        <?php
        if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>

                <article class="post-item">

                    <?php if ( has_post_thumbnail() ) { ?>
                        <div class="post-thumbnail">
                            <?php the_post_thumbnail( 'medium' ); ?>
                        </div>
                    <?php } ?>

                    <h2 class="post-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h2>

                    <div class="post-excerpt">
                        <?php the_excerpt(); ?>
                    </div>

                </article>

                <?php
            }
        } else {
            echo '<p>Tidak ada konten</p>';
        }
        ?>

    </div>
</main>

<?php get_footer(); ?>