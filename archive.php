<?php get_header(); ?>
    <section class="pageInfo">
        <?php the_archive_title('<h1 class="page-title">', '</h1>'); ?>
    </section>
    <div class="container">

        <section class="content">
            
        <?php
        if (false == have_posts()) {
        } else {
            while (have_posts()) {
                the_post();
                ?>
                <article>
                    <h2><?php the_title(); ?></h2>
                    <span class="subtitle"><?php the_time('Y.m.D') ?></span>
                    <?php the_post_thumbnail(); ?>
                    <p class="postContent"><?php echo get_the_excerpt(); ?></p>
                    <a class="readMore" href="<?php the_permalink(); ?>">Read more</a>
                </article>
                <?php
            }
        }
        ?>       
        </section>

        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>