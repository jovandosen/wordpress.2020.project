<?php if( have_posts() ): ?>

	<div class="container">
		<?php while( have_posts() ): ?>

			<?php the_post(); ?>

			<div class="post-<?php the_ID(); ?> data-container">
				<div class="title">
					<h2><?php the_title(); ?></h2>
				</div>	
				<div class="post-content">
					<?php the_content(); ?>
				</div>
				<div class="thumbnail">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div>
			</div>	

		<?php endwhile; ?>	

		<div class="nav-previous alignleft"><?php next_post_link( '<strong>%link</strong>', 'Previous' ); ?></div>	
		<div class="nav-next alignright"><?php previous_post_link( '<strong>%link</strong>', 'Next' ); ?></div>
	</div>

<?php endif; ?>	