<?php
/* 
Template Name: Post Archive 
*/
?>

<?php get_header(); ?>
	<div class="container">
		<div class="row move-content">

			<div class="col-md-8 add-border-style">
				<div class="row">
					
					<?php

						$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

						$args = array('post_type' => 'post', 'posts_per_page' => 4, 'paged' => $paged);

						query_posts($args);

					?>

					<?php if( have_posts() ): ?>

						<?php while( have_posts() ): ?>

							<div class="col-12">

								<?php the_post(); ?>

								<div class="title">
									<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank" class="link-style">
										<?php the_title(); ?>		
									</a>
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
							<?php next_posts_link( 'Older posts' ); ?>
							<?php previous_posts_link( 'Newer posts' ); ?>
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