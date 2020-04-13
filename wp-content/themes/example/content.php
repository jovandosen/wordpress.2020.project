<div id="content" class="container">

	<?php
		$currentPage = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$sql = array('post_type' => 'events', 'posts_per_page' => 3, 'paged' => $currentPage);
		query_posts($sql);
	?>

	<?php if( have_posts() ): ?>

		<?php while( have_posts() ): ?>

			<?php the_post(); ?>

			<div class="post-<?php the_ID(); ?> data-container">
				<div class="title">
					<?php if( is_archive() ): ?>
						<a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>" target="_blank" class="link-style"><?php the_title(); ?></a>
					<?php else: ?>
						<h2><?php the_title(); ?></h2>		
					<?php endif; ?>	
				</div>
				<div class="post-content">
					<?php the_content(); ?>
				</div>
				<div class="thumbnail">
					<?php the_post_thumbnail('thumbnail'); ?>
				</div>
				<?php if( is_single() ): ?>
					<div class="back-to-events">
						<a href="<?php echo home_url('/events'); ?>"><?php _e('Back to Events', 'example'); ?></a>
					</div>	
				<?php endif; ?>	
			</div>

		<?php endwhile; ?>

		<div class="nav-previous alignleft"><?php next_posts_link('Older Posts'); ?></div>	
		<div class="nav-next alignright"><?php previous_posts_link('Newer Posts'); ?></div>

		<?php //the_posts_pagination(); ?>

	<?php endif; ?>	

	<?php wp_reset_query(); ?>

</div>