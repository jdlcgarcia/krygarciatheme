<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php bloginfo('stylesheet_url'); ?>">
</head>
<body>
    <?php
    wp_nav_menu(
        array(
            'theme_location' => 'social-menu',
            'container' => 'ul',
            'menu_class' => 'social'
        )
    );
    ?>
    <section class="logo">
        <img src="<?php bloginfo('template_url'); ?>/res/cabecera.jpg" alt="">
    </section>
    <nav>
        <img id="burger" src="<?php bloginfo('template_url'); ?>/res/burger.png" alt="">
        <?php 
        wp_nav_menu( 
            array( 
                'theme_location' => 'header-menu',
                'container' => 'ul',
            ) 
        ); 
        ?>
        

    </nav>