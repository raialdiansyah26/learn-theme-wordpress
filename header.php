<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php bloginfo('name'); ?> | <?php bloginfo('description'); ?></title> 
    <?php wp_head(); ?>
</head>
<body>
    <header>
        <h1><?php bloginfo('name'); ?></h1>
        <p><?php bloginfo('description'); ?></p>

        <nav>
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main_menu'
            ));
            ?>
        </nav>
    </header>
