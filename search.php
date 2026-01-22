<?php get_header() ?>

<main>

    <header class="archive-header">
        <div class="archive-title">
            Hasil pencarian: <?php echo get_search_query(); ?>
        </div>
    </header>

    <div class="post-list">

        <?php if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>

                <article class="post-item">

                <h2>
                    <a href="<?php the_permalink(); ?>">
                        <?php the_title(); ?>
                    </a>
                </h2>

                <?php the_excerpt(); ?>

                </article>

                <?php
            }
        } else {
            echo "<p>Tidak ada hasil ditemukan</p>";
        }
        ?>

    </div>

    <div class="pagination">
        <?php the_posts_pagination(); ?>
    </div>

</main>

<?php get_footer(); ?>