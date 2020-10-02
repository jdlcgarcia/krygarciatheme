<?php get_header(); ?>
<div class="container home" id="about">
	<div class="content">
		<div class="text">
			<?php if ( have_posts() ) : while ( have_posts() ) : the_post();
			the_content();
			endwhile; else: ?>
			<p>Sorry, no posts matched your criteria.</p>
			<?php endif; ?>  
		</div>
	</div>     
</div>
<?php get_footer(); ?>