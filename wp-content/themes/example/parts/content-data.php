<?php if( have_posts() ): ?>

	<div class="container">
		<div class="row">
			<?php while( have_posts() ): ?>

				<?php the_post(); ?>

				<div class="col-12">
					<h4><?php the_title(); ?></h4>
				</div>

				<div class="col-12">
					<?php the_content(); ?>
				</div>

				<div class="col-12">
					<?php the_post_thumbnail('large'); ?>
				</div>

			<?php endwhile; ?>
		</div>	
		<div class="row add-box-top-style">
			<div class="col-6"><?php next_post_link( '<strong>%link</strong>', 'Previous' ); ?></div>	
			<div class="col-6 text-right"><?php previous_post_link( '<strong>%link</strong>', 'Next' ); ?></div>
		</div>
	</div>

<?php endif; ?>	