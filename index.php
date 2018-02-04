<?php get_header(); ?>
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
                    <span class="subtitle">Posted on
                        <?php
                        $year = get_the_time('Y');
                        $month = get_the_time('m');
                        $day = get_the_time('d');
                        ?>
<a href="<?php echo get_month_link( $year, $month ); ?>"><?php the_time('M') ?></a>
<a href="<?php echo get_day_link( $year, $month, $day); ?>">
    <?php the_time('d'); ?></a>,
<a href="<?php echo get_year_link( $year); ?>"><?php the_time('Y'); ?></a></span>
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