<?php /* Template Name: Privacy Policy */ ?>
<?php get_header(); ?>
<div class="container move-content">
	<div class="row">
		<div class="col-12">
			<?php if( have_posts() ): ?>
				<?php while( have_posts() ): ?>
					
					<?php the_post(); ?>

					<div class="title">
						<h1><?php the_title(); ?></h1>	
					</div>

					<div class="page-content">
						<?php the_content(); ?>
					</div>

				<?php endwhile; ?>	
			<?php endif; ?>	
		</div>
	</div>
</div>
<?php get_footer(); ?>