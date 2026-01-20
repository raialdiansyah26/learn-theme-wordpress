<?php

function belajar_theme_styles() {
    wp_enqueue_style(
        'belajar-style',
        get_stylesheet_uri()
    );
}

add_action('wp_enqueue_scripts', 'belajar_theme_styles');


function belajar_theme_menu() {
    register_nav_menus(array(
        'main_menu' => 'Menu Utama'
    ));
}

add_action('after_setup_theme', 'belajar_theme_menu');


function theme_pertama_setup() {
    add_theme_support('post-thumbnails');
}

add_action('after_setup_theme', 'theme_pertama_setup');