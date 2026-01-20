<?php
/*
Template Name: Full Width Page
*/
?>

<?php get_header(); ?>

<main style="width:100%; background:#eee; padding:40px">

<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    
        <h1><?php the_title(); ?></h1>

        <?php the_content(); ?>

    <?php endwhile; ?>
<?php endif; ?>

</main>

<?php get_footer() ?>