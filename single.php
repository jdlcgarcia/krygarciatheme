<?php get_header(); ?>
<div class="container">
    <section class="content">
        <article>
            <?php if ( have_posts() ) : while ( have_posts() ) : the_post();
            $title = get_the_title( );
            ?>
            <h1><a href="<?php the_permalink();?>"><?php echo $title; ?></a></h1>
            
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
            <div class="postContent">
                <?php the_content(); ?>
            </div>
            <div class="mainCategory">
                Posted in <?php $categories = get_the_category();
 
                if ( ! empty( $categories ) ) {
                    echo esc_html( $categories[0]->name );   
                } ?>
            </div>

            <div id="comments">
                <?php 
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }
                ?>
            </div>
        </article>
        <?php 
        endwhile; else: ?>
        <p>Sorry, no posts matched your criteria.</p>
        <?php endif; ?> 
    </section>
    <?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>