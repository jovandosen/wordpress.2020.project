<?php get_header(); ?>
<?php 
	if( isset($_GET['movie-search']) ){
		// process search query
		$s = $_GET["s"];

		$args = array('post_type' => 'movies', 'posts_per_page' => -1, 's' => $s);

		$query = new WP_Query($args);

		if( $query->have_posts() ){

			?>
			<div class="container">
				<div class="row add-box-top-style">
			<?php

			while($query->have_posts()){
				$query->the_post();
				?>
				<div class="col-12">
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

					</div>
				</div>
				<?php
			}

			?>
				</div>
			</div>
			<?php

		} else {
			?>
			<div class="container">
				<div class="row add-box-top-style">
					<div class="col-12">
						<h5><?php _e('No Movies found.', 'example'); ?></h5>
					</div>
				</div>
			</div>
			<?php
		}

	} else {
		get_template_part('content', 'search'); 
	}
?>
<?php get_footer(); ?>