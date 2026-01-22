<?php get_header(); ?>

<main>

    <h1>Halaman Category</h1>

    <h2><?php single_cat_title() ?></h2>

    <div class="post-list">

        <?php if ( have_posts() ) {
            while ( have_posts() ) {
                the_post();
                ?>

                <article class="post-item">

                    <h3>
                        <a href="<?php the_permalink() ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                </article>

                <?php
            }
        }
        ?>

    </div>

</main>

<?php get_footer() ?>