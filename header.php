<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php bloginfo('name'); ?></title>
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri()."?v=".time() ?>">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:100,300,400,700" rel="stylesheet">
    <link href="<?php echo get_stylesheet_directory_uri() ?>/res/apple-touch-icon.png" rel="apple-touch-icon shortcut icon" />
	<link href="<?php echo get_stylesheet_directory_uri() ?>/res/icon-hires.png" rel="icon" sizes="192x192" type="image/x-icon"/>
	<link href="<?php echo get_stylesheet_directory_uri() ?>/res/icon-normal.png" rel="icon" sizes="128x128" type="image/x-icon"/>
</head>
<body>
    <ul id="menu-social">
    <?php
    $bookmarks = get_bookmarks();
    foreach(array_reverse($bookmarks) as $link) {
        ?>
        <li><a href="<?php echo $link->link_url ?>"><img src="<?php echo $link->link_image ?>"></a></li>
        <?php
    }
    ?>
    </ul>
    <section class="logo">
        <a href="<?php bloginfo('url'); ?>"><img src="<?php bloginfo('template_url'); ?>/res/cabecera.jpg" alt=""></a>
    </section>
    <nav>
        <?php 
        wp_nav_menu( 
            array( 
                'theme_location' => 'header-menu',
                'container' => 'ul',
                'menu_id' => 'menu-principal'
            ) 
        ); 
        ?>
        <div id="menu-responsive">
            <button class="menu-toggle" aria-expanded="true">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 16 16"><rect x="0" fill="none" width="16" height="16"></rect><g><path id="menu-icon" d="M0 14h16v-2H0v2zM0 2v2h16V2H0zm0 7h16V7H0v2z"></path></g></svg>
                Menu           
            </button> 
            <?php 
            wp_nav_menu( 
                array( 
                    'theme_location' => 'header-menu',
                    'container' => 'ul',
                    'menu_id' => 'responsive-options'
                ) 
            ); 
            ?>   
        </div>
    </nav>