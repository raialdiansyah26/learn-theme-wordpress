<?php
/**
 * File functions.php
 * Berfungsi untuk:
 * - Mengaktifkan fitur WordPress
 * - Mendaftarkan menu, widget, thumbnail, dll
 * - Menghubungkan CSS & JS
 */

/**
 * Fungsi setup theme
 * Dipanggil saat theme pertama kali dimuat
 */

function belajar_theme_styles() {
    wp_enqueue_style(
        'belajar-style',
        get_stylesheet_uri()
    );
}

add_action('wp_enqueue_scripts', 'belajar_theme_styles');


function belajar_theme_menu() {

    // Mendaftarkan menu utama
    register_nav_menus(array(
        'main_menu' => 'Menu Utama'
    ));
}

add_action('after_setup_theme', 'belajar_theme_menu');


function theme_pertama_setup() {

    // Mengaktifkan Featured Image (Post Thumbnail)
    add_theme_support('post-thumbnails');
}

// Hook ke WordPress agar fungsi setup dijalankan
add_action('after_setup_theme', 'theme_pertama_setup');



/*
Mendaftarkan sidebar (widget area)
*/
function theme_pertama_widgets() {

    register_sidebar(array(
        'name' => 'Sidebar Utama',
        'id' => 'sidebar-1',
        'description' => 'Widget di sidebar utama',
        'before_widget' => '<div class="widget">',
        'after_widget' => '</div>',
        'before_title' => '<h3 class="widget-title">',
        'after_title' => '</h3>',
    ));

}

// Hook agar Wordpress mendaftarkan widget
add_action('widgets_init', 'theme_pertama_widgets');