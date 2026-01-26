<?php get_header(); ?>

<main class="content-area">
    <div class="content">

        <?php
        //Ambil data category (taxonomy) yang sedang dibuka
        $term = get_queried_object(); 
        ?>  

        <header class="archive-header">
            <h1 class="archive-title">
                Portfolio: <?php echo esc_html( $term->name ); ?>
            </h1>

            <?php if ( ! empty( $term->description ) ) : ?>
                <div class="archive-description">
                    <?php echo esc_html( $term->name ) ; ?>
                </div>
            <? endif; ?>
        </header>

        <div class="portfolio-grid">

            <?php if ( have_posts() ) : ?>
                <?php while ( have_posts() ) : the_post(); ?>

                    <article class="portfolio-item">
                        <a href="<?php the_permalink(); ?>">

                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="portfolio-thumb">
                                    <?php the_post_thumbnail('medium'); ?>
                                </div>
                            <?php endif; ?>

                            <h2 class="portfolio-title">
                                <?php the_title(); ?>
                            </h2>

                        </a>
                    </article>

                <?php endwhile; ?>
            <?php else : ?>
                <p>Belum ada portfolio di kategori ini.</p>
            <?php endif; ?>

        </div>

    </div>
</main>

<?php get_footer(); ?>