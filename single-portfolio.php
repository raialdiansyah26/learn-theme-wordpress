<?php get_header(); ?>

<main class="container single-portfolio">

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

    <article>
        <h1><?php the_title(); ?></h1>

        <?php
        $client = get_post_meta(get_the_ID(), '_portfolio_client', true);
        $year   = get_post_meta(get_the_ID(), '_portfolio_year', true);
        $tools  = get_post_meta(get_the_ID(), '_portfolio_tools', true);
        $link  = get_post_meta(get_the_ID(), '_portfolio_link', true);
        ?>

        <?php if ($client || $year || $tools) : ?>
            <ul class="portfolio-meta">
                <?php if ($client) : ?>
                    <li><strong>Client:</strong> <?php echo esc_html($client); ?></li>
                <?php endif; ?>

                <?php if ($year) : ?>
                    <li><strong>Tahun:</strong> <?php echo esc_html($year); ?></li>
                <?php endif; ?>

                <?php if ($tools) : ?>
                    <li><strong>Tools:</strong> <?php echo esc_html($tools); ?></li>
                <?php endif; ?>
            </ul>
                <?php if ($link) : ?>
                    <a href="<?php echo esc_html($link); ?>"><strong>Details</strong></a>
                <?php endif; ?>
        <?php endif; ?>


        <?php if ( has_post_thumbnail() ) : ?>
            <div class="single-thumbnail">
                <?php the_post_thumbnail('large'); ?>
            </div>
        <?php endif; ?>

        <div class="content">
            <?php the_content(); ?>
        </div>
    </article>

<?php endwhile; endif; ?>

</main>

<?php get_footer(); ?>
