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
        'before_title'  => false,
        'after_title'   => false,
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

// Register Custom Taxonomy
function custom_taxonomy()
{
    $labels = array(
        'name'                       => _x('Galerías', 'Taxonomy General Name', 'text_domain'),
        'singular_name'              => _x('Galería', 'Taxonomy Singular Name', 'text_domain'),
        'menu_name'                  => __('Galerías', 'text_domain')
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy('galeria', array( 'imagen' ), $args);
}
add_action('init', 'custom_taxonomy', 0);


// Register Custom Post Type
function imagen()
{
    $labels = array(
        'name'                  => _x('Imágenes', 'Post Type General Name', 'text_domain'),
        'singular_name'         => _x('Imagen', 'Post Type Singular Name', 'text_domain'),
    );
    $args = array(
        'label'                 => __('Imagen', 'text_domain'),
        'description'           => __('Imagen desc', 'text_domain'),
        'labels'                => $labels,
        'supports'              => array( 'title', 'thumbnail' ),
        'taxonomies'            => array( 'galeria' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'page',
    );
    register_post_type('imagen', $args);
}
add_action('init', 'imagen', 0);
