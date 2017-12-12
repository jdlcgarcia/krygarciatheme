<?php
add_theme_support('post-thumbnails');

function load_scripts()
{
    wp_enqueue_script('interaction', get_stylesheet_directory_uri() . '/js/interaction.js', array('jquery'));
    wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js');
}

add_action('wp_enqueue_scripts', 'load_scripts');

function register_my_menus() {
  register_nav_menu('header-menu',__( 'Header Menu' ));
  register_nav_menu('social-menu',__( 'Social Menu' ));
}
add_action( 'init', 'register_my_menus' );


function adjustBrightness($hex, $steps)
{
    
}