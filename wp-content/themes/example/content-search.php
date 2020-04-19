<div class="container add-box-style">
	<div class="row">
		<div class="col-12">
			
			<?php $post_count = 1; ?>

			<?php if( have_posts() ): ?>

				<?php while( have_posts() ): ?>

					<?php the_post(); ?>

					<div class="post-details">  
						
						<div class="post-title">
							<h2><?php the_title(); ?></h2>
						</div>

						<div class="post-content">
							<p class="text-justify"><?php the_content(); ?></p>
						</div>

						<div class="post-thumbnail">
							<?php the_post_thumbnail('medium'); ?>
						</div>

						<?php if( $post_count != $wp_query->found_posts ): ?>
							<hr class="style-hr">
						<?php endif; ?>

					</div>

					<?php $post_count++; ?>

				<?php endwhile; ?>

				<div class="row">
					<div class="col-6"><?php next_posts_link('Older Posts'); ?></div>	
					<div class="col-6 text-right"><?php previous_posts_link('Newer Posts'); ?></div>
				</div>

			<?php else: ?>
				<h5><?php _e('No Posts found.', 'example'); ?></h5>	

			<?php endif; ?>	

		</div>
	</div>
</div>