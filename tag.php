<?php get_header(); ?>

<main>

    <header class="archive-header">
        <h1 class="archive-title">
            <?php single_tag_title(); ?>
        </h1>
    </header>

    <div class="post-list">

        <?php
        if ( have_posts() ) {
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
            echo "<p>Tidak ada post untuk tag ini</p>";
        }
        ?>

    </div>

    <div class="pagination">
        <?php the_posts_pagination(); ?>
    </div>

</main>

<?php get_footer(); ?>