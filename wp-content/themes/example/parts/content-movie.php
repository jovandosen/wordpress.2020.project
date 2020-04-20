<div class="container">
	
	<?php
		$currentPage = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$sql = array('post_type' => 'movies', 'posts_per_page' => 3, 'paged' => $currentPage);
		query_posts($sql);
		$counter = 0;
	?>

	<?php if( have_posts() ): ?>

		<?php while( have_posts() ): ?>

			<?php the_post(); ?>

			<div class="row <?php echo ($counter === 0) ? 'add-box-top-style' : ''; ?>">

				<div class="col-12">
					<div class="movie-title">
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank" class="link-style"><?php the_title(); ?></a>
					</div>
				</div>

				<div class="col-12">
					<div class="movie-content">
						<?php the_content(); ?>
					</div>
				</div>

				<div class="col-12">
					<div class="movie-thumbnail">
						<?php the_post_thumbnail('medium'); ?>
					</div>
					<hr>
				</div>

			</div>

			<?php $counter++; ?>

		<?php endwhile; ?>

		<div class="row">
			<div class="col-6"><?php next_posts_link('Older Posts'); ?></div>	
			<div class="col-6 text-right"><?php previous_posts_link('Newer Posts'); ?></div>
		</div>	

	<?php endif; ?>	

	<?php wp_reset_query(); ?>

</div>