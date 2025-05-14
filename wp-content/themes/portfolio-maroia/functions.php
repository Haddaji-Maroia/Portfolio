<?php

function portfoliomaroia_theme_support(){
    //Add Dynamic title tag support
    add_theme_support( 'title-tag' );

}

add_action( 'after_setup_theme', 'portfoliomaroia_theme_support' );





function portfoliomaroia_register_styles() {
    $version = wp_get_theme()->get( 'Version' ); //dynamic
    wp_enqueue_style('portfolio-maroia-style', get_template_directory_uri() . '/style.css', array(), $version, 'all');
}

add_action('wp_enqueue_scripts', 'portfoliomaroia_register_styles');




function portfoliomaroia_register_scripts() {

    // For js scripts still not ready (video minuto 33:00)

}

add_action('wp_enqueue_scripts', 'portfoliomaroia_register_scripts');


?>



