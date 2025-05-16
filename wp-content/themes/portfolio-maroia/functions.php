<?php
// Disable Gutenberg on the back end.
add_filter('use_block_editor_for_post', '__return_false');
// Disable Gutenberg for widgets.
add_filter('use_widgets_block_editor', '__return_false');

function portfoliomaroia_theme_support(){
    //Add Dynamic title tag support
    add_theme_support( 'title-tag' );
    add_theme_support('custom-logo');
    add_theme_support('post-thumbnails');
}

add_action( 'after_setup_theme', 'portfoliomaroia_theme_support' );


function portfoliomaroia_menus(){

    $locations = array(
        'primary'=> 'Desktop main menu',
        'footer'=> 'Footer main menu',
    );

    register_nav_menus( $locations );
}

add_action('init', 'portfoliomaroia_menus');


function portfolio_maroia_register_styles() {
    wp_enqueue_style(
        'portfolio-maroia-style',
        get_template_directory_uri() . '/style.css',
        array(),
        filemtime(get_template_directory() . '/style.css'),
        'all'
    );
}

add_action('wp_enqueue_scripts', 'portfolio_maroia_register_styles');



function portfoliomaroia_register_scripts() {

    // For js scripts still not ready (video minuto 33:00)

}

add_action('wp_enqueue_scripts', 'portfoliomaroia_register_scripts');
add_filter('show_admin_bar', '__return_false');

function my_own_mime_types($mimes) {
    $mimes['svg'] = 'image/svg+xml';

    return $mimes;
}

add_filter('upload_mimes', 'my_own_mime_types');


// Enregistrer contenu projets

function register_custom_post_type_projets() {
    register_post_type('projets', [
        'label' => 'Projets',
        'description' => 'Mes projets',
        'public' => true,
        'has_archive' => false,
        'menu_icon' => 'dashicons-portfolio',
        'menu_position' => 5,
        'rewrite' => ['slug' => 'projets'],
        'supports' => ['title', 'editor', 'thumbnail'],
        'show_in_rest' => true,
    ]);
}
add_action('init', 'register_custom_post_type_projets');









