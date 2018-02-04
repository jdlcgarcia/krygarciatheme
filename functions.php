<?php
add_theme_support('post-thumbnails');

function load_scripts()
{
    wp_enqueue_script('interaction', get_stylesheet_directory_uri() . '/js/interaction.js', array('jquery'));
    wp_enqueue_script('jquery', get_stylesheet_directory_uri() . '/js/jquery.min.js');
}

add_action('wp_enqueue_scripts', 'load_scripts');

function register_my_menus()
{
    register_nav_menu('header-menu', __('Header Menu'));
    register_nav_menu('social-menu', __('Social Menu'));
}
add_action('init', 'register_my_menus');
add_action('widgets_init', 'sidebar_widgets_init');

function adjustBrightness($hex, $steps)
{
}

function sidebar_widgets_init()
{
    register_sidebar(array(
        'name'          => 'Blog right sidebar',
        'id'            => 'blog_right',
        'before_widget' => '<div class="widget">',
        'after_widget'  => '</div>',
        'before_title'  => '<div class="title">',
        'after_title'   => '</div>',
    ));
}

add_filter('get_the_archive_title', function ($title) {
    if (is_category()) {
        $title = single_cat_title('', false);
    } elseif (is_tag()) {
        $title = single_tag_title('', false);
    } elseif (is_author()) {
        $title = '<span class="vcard">' . get_the_author() . '</span>' ;
    } elseif (is_month()) {
        $title = single_month_title(' ', false);
    }
    return $title;
});
