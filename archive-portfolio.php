<?php get_header(); ?>

<main class="container archive-portfolio">

    <h1>Portfolio</h1>

    <?php
    $terms = get_terms(array(
        'taxonomy'   => 'portfolio_category',
        'hide_empty' => true,
    ));
    ?>

    <?php if ( ! empty($terms) && ! is_wp_error($terms) ) : ?>
        <ul class="portfolio-filter">
            <li><a href="<?php echo get_post_type_archive_link('portfolio'); ?>">All</a></li>

            <?php foreach ( $terms as $term ) : ?>
                <li>
                    <a href="<?php echo esc_url( get_term_link($term) ); ?>">
                        <?php echo esc_html( $term->name ); ?>
                    </a>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>


    <div class="portfolio-grid">

    <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article class="portfolio-items">
        <a href="<?php the_permalink(); ?>">

            <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('medium'); ?>
            <?php endif; ?>

            <h2><?php the_title(); ?></h2>
        </a>
    </article>

    <?php endwhile; endif; ?>

    </div>

</main>

<?php get_footer(); ?>