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
                    <h2><a href="<?php the_permalink();?>"><?php the_title(); ?></a></h2>
                    <span class="subtitle">
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
                    
                    </article>
                <?php
                
            }
            
            the_posts_pagination( array(
				'mid_size'  => 2,
				'prev_text' => __( 'Newer posts', 'textdomain' ),
				'next_text' => __( 'Older posts', 'textdomain' ),
				'screen_reader_text' => ' ',
			) );
        }
        ?>       
        </section>

        <?php get_sidebar(); ?>
    </div>
<?php get_footer(); ?>