<?php get_header(); ?>
<div class="container">
	<div class="row move-content">
		<div class="col-12">
			<h3>Audio shortcode example</h3>
			<hr>
			<?php
				$music_file = get_template_directory_uri() . "/sounds/test.mp3"; 
				echo do_shortcode('[audio mp3=' . $music_file . ']');
			?>
			<hr>
		</div>
		<div class="col-12">
			<h3>Gallery:</h3>
			<hr>
			<?php
				echo do_shortcode('[gallery include="17,21,50,48,46,56"]');
			?>
		</div>
		<div class="col-12">
			<hr>
			<h3>Video shortcode example</h3>
			<hr>
			<?php
				$video_file = get_template_directory_uri() . "/videos/movie.mp4";
				$poster = get_template_directory_uri() . "/assets/images/site.jpg";
				echo do_shortcode('[video mp4=' . $video_file . ' poster=' . $poster . ']');
			?>
		</div>
	</div>
</div>
<?php get_footer(); ?>