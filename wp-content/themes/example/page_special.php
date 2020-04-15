<?php /* Template Name: Special */ ?>
<?php get_header(); ?>
<div class="container">
	<div class="row move-content">
		
		<div class="col-md-8 add-border-style">
			<div class="row">

				<?php if( have_posts() ): ?>

					<?php while( have_posts() ): ?>

						<div class="col-12">

							<?php the_post(); ?>

							<div class="title">
								<h1><?php the_title(); ?></h1>	
							</div>

							<div class="page-content">
								<?php the_content(); ?>
							</div>

							<div class="page-thumbnail">
								<?php the_post_thumbnail('thumbnail'); ?>
							</div>

							<hr>

						</div>

					<?php endwhile; ?>	

					<div class="col-12">
						<?php next_post_link('<strong>%link</strong>', 'Previous'); ?>
						<?php previous_post_link('<strong>%link</strong>', 'Next'); ?>
					</div>

				<?php else: ?>
					<?php _e('Sorry, no posts matched your criteria.'); ?>	

				<?php endif; ?>

				<?php wp_reset_query(); ?>	
					
			</div>
		</div>

		<div class="col-md-4">
			<?php get_sidebar('primary'); ?>
		</div>

	</div>
</div>	
<?php get_footer(); ?>