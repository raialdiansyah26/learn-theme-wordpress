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


/*
 * Theme Customizer
 */
function theme_pertama_customize_register( $wp_customize ) {

    // SECTION
    $wp_customize->add_section( 'theme_pertama_section', array(
        'title'    => 'Pengaturan Tema',
        'priority' => 30,
    ) );

    // SETTING: Warna utama
    $wp_customize->add_setting( 'primary_color', array(
        'default'   => '#333333',
        'transport' => 'refresh',
    ) );

    // CONTROL: Color Picker
    $wp_customize->add_control(
        new WP_Customize_Color_Control(
            $wp_customize,
            'primary_color_control',
            array(
                'label'   => 'Warna Utama',
                'section' => 'theme_pertama_section',
                'settings'=> 'primary_color',
            )
        )
    );

    // SETTING: Teks footer
    $wp_customize->add_setting( 'footer_text', array(
        'default'   => 'Copyright © ' . date('Y'),
        'transport' => 'refresh',
    ) );

    // CONTROL: Text input
    $wp_customize->add_control( 'footer_text', array(
        'label'   => 'Teks Footer',
        'section' => 'theme_pertama_section',
        'type'    => 'text',
    ) );
}
add_action( 'customize_register', 'theme_pertama_customize_register' );


/*
*Apply customizer style
*/
function theme_pertama_customizer_css() {
    ?>
    <style>
        body {
            color: <?php echo get_theme_mod( 'primary_color', '#333333' ); ?>;
        }
    </style>
    <?php
}
add_action( 'wp_head', 'theme_pertama_customizer_css' );


function theme_pertama_register_cpt() {

    register_post_type('portfolio', array(
        'labels'   => array(
            'name' => 'Portfolio',
            'singular_name' => 'Portfolio',
        ),
        'public'   => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-portfolio',
        'supports'  => array('title', 'editor', 'thumbnail'),
    ));

}
add_action( 'init', 'theme_pertama_register_cpt' );

// Register taxonomy untuk Portfolio
function mytheme_register_portfolio_taxonomy() {

    register_taxonomy(
        'portfolio_category',
        'portfolio',
        array(
            'label' => 'Portfolio Category',
            'rewrite' => array('slug' => 'portfolio_category'),
            'hierarchical' => true, //seperti category (bukan tag)
            'show_admin_column' => true,
            'show_in_rest' => true,
        )
    );

}
add_action('init', 'mytheme_register_portfolio_taxonomy');