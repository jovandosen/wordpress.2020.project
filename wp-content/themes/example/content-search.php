<div class="container add-box-style">
	<div class="row">
		<div class="col-12">
			
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
						<hr class="style-hr">
					</div>

				<?php endwhile; ?>

			<?php endif; ?>	

		</div>
	</div>
</div>