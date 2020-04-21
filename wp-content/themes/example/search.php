<?php get_header(); ?>
<?php 
	if( isset($_GET['movie-search']) ){
		// process search query

		$countGenres = 0;
		$terms = array();

		if( !empty($_GET['action']) ){
			$countGenres++;
			$terms[] = $_GET['action'];
		}

		if( !empty($_GET['drama']) ){
			$countGenres++;
			$terms[] = $_GET['drama'];
		}

		if( !empty($_GET['comedy']) ){
			$countGenres++;
			$terms[] = $_GET['comedy'];
		}

		if( !empty($_GET['horror']) ){
			$countGenres++;
			$terms[] = $_GET['horror'];
		}

		if( !empty($_GET['thriller']) ){
			$countGenres++;
			$terms[] = $_GET['thriller'];
		}

		$s = $_GET["s"];

		if( $countGenres === 0 ){
			$args = array('post_type' => 'movies', 'posts_per_page' => -1, 's' => $s);
		} else {

			$args = array('post_type' => 'movies', 'posts_per_page' => -1, 's' => $s, 'tax_query' => array(
				array(
					'taxonomy' => 'genres',
					'field' => 'slug',
					'terms' => $terms,
				)
			));

		}

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

		wp_reset_postdata();

	} else {
		get_template_part('content', 'search'); 
	}
?>
<?php get_footer(); ?>