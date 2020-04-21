<div class="container">

	<div class="row add-box-top-style">
		<div class="col-12">
			<form role="search" method="GET" action="<?php echo home_url('/'); ?>" id="movie-form">
				<input type="search" class="form-control" placeholder="Search Movies..." value="<?php echo get_search_query(); ?>" name="s" title="Search" autocomplete="off">
				<input type="hidden" name="movie-search" value="search-for-movies">
			</form>
		</div>
	</div>

	<div class="row">
		<div class="col-12 add-box-top-style-two">
			<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" onclick="<?php echo esc_js( 'hideShowCategories(this)' ); ?>">show genres</a>
		</div>
		<div class="col-12 add-box-top-style-three" style="display: none;">
			
			<div class="custom-control custom-checkbox mr-sm-2">
        		<input type="checkbox" class="custom-control-input" id="action" name="action" value="action" form="movie-form">
        		<label class="custom-control-label" for="action">Action</label>
      		</div>

      		<div class="custom-control custom-checkbox mr-sm-2">
        		<input type="checkbox" class="custom-control-input" id="drama" name="drama" value="drama" form="movie-form">
        		<label class="custom-control-label" for="drama">Drama</label>
      		</div>

      		<div class="custom-control custom-checkbox mr-sm-2">
        		<input type="checkbox" class="custom-control-input" id="comedy" name="comedy" value="comedy" form="movie-form">
        		<label class="custom-control-label" for="comedy">Comedy</label>
      		</div>

      		<div class="custom-control custom-checkbox mr-sm-2">
        		<input type="checkbox" class="custom-control-input" id="horror" name="horror" value="horror" form="movie-form">
        		<label class="custom-control-label" for="horror">Horror</label>
      		</div>

      		<div class="custom-control custom-checkbox mr-sm-2">
        		<input type="checkbox" class="custom-control-input" id="thriller" name="thriller" value="thriller" form="movie-form">
        		<label class="custom-control-label" for="thriller">Thriller</label>
      		</div>

		</div>
	</div>
	
	<?php
		$currentPage = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
		$sql = array('post_type' => 'movies', 'posts_per_page' => 4, 'paged' => $currentPage);
		$query = new WP_Query($sql);
		$counter = 0;
	?>

	<?php if( $query->have_posts() ): ?>

		<?php while( $query->have_posts() ): ?>

			<?php $query->the_post(); ?>

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
			<div class="col-6"><?php next_posts_link(__('Older Posts', 'example'), $query->max_num_pages); ?></div>	
			<div class="col-6 text-right"><?php previous_posts_link(__('Newer Posts', 'example')); ?></div>
		</div>

		<?php wp_reset_postdata(); ?>

	<?php else: ?>		
		<h5><?php _e('No Posts found.', 'example'); ?></h5>

	<?php endif; ?>	

</div>