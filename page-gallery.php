<?php
/**
 * Template Name: Gallery
 *
 * @package WordPress
 * @subpackage krygarcia
 * @since krygarcia 1.0
 */
?>
<?php get_header(); ?>
<div class="container gallery">
    <?php
    $galeria = get_object_taxonomies((object) array( 'post_type' => 'imagen' ));
    foreach ($galeria as $taxonomy) :
    // Gets every "category" (term) in this taxonomy to get the respective posts
        $terms = get_terms($taxonomy);

        foreach ($terms as $term) :
            $posts = new WP_Query("taxonomy=$taxonomy&term=$term->slug&posts_per_page=1&order=ASC");

            if ($posts->have_posts()) :
                while ($posts->have_posts()) :
                    $posts->the_post();
                    ?>
                    <div class="category">
                        <a href="#">
                            <?php the_post_thumbnail('medium');
                            echo $term->name; ?>
                        </a>
                    </div>
                    <?php
                endwhile;
            endif;
        endforeach;
    endforeach;
    ?>
    
</div>
<?php get_footer(); ?>