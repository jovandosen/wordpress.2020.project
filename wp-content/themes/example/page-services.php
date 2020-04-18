<?php get_header(); ?>
<div class="container add-box-style">
	<div class="row">

		<div class="col-md-9">

			<?php
				$imgOne = get_template_directory_uri() . '/assets/images/ddaaeaweq.jpg';
				$imgTwo = get_template_directory_uri() . '/assets/images/aadad.jpg';
				$imgThree = get_template_directory_uri() . '/assets/images/site.jpg';
				$imgFour = get_template_directory_uri() . '/assets/images/image_test.jpg';
				$imgFive = get_template_directory_uri() . '/assets/images/imagesad.jpg';

				$imgOneAlt = 'image one alt text';
				$imgTwoAlt = 'image two alt text';
				$imgThreeAlt = 'image three alt text';
				$imgFourAlt = 'image four alt text';
				$imgFiveAlt = 'image five alt text';

				$width = '100%';
				$height = '300px';
			?>
			
			<div id="featuredToday" class="carousel slide" data-ride="carousel">
				<div class="carousel-inner">
					<div class="carousel-item active">
						<img src="<?php echo esc_url($imgOne); ?>" alt="<?php echo esc_attr($imgOneAlt); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>">
					</div>
					<div class="carousel-item">
						<img src="<?php echo esc_url($imgTwo); ?>" alt="<?php echo esc_attr($imgTwoAlt); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>">
					</div>
					<div class="carousel-item">
						<img src="<?php echo esc_url($imgThree); ?>" alt="<?php echo esc_attr($imgThreeAlt); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>">
					</div>
					<div class="carousel-item">
						<img src="<?php echo esc_url($imgFour); ?>" alt="<?php echo esc_attr($imgFourAlt); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>">
					</div>
					<div class="carousel-item">
						<img src="<?php echo esc_url($imgFive); ?>" alt="<?php echo esc_attr($imgFiveAlt); ?>" width="<?php echo esc_attr($width); ?>" height="<?php echo esc_attr($height); ?>">
					</div>
				</div>
				<a href="#featuredToday" class="carousel-control-prev" role="button" data-slide="prev">
					<span class="carousel-control-prev-icon" aria-hidden="true"></span>
					<span class="sr-only">Previous</span>
				</a>
				<a href="#featuredToday" class="carousel-control-next" role="button" data-slide="next">
					<span class="carousel-control-next-icon" aria-hidden="true"></span>
					<span class="sr-only">Next</span>
				</a>
			</div>

		</div>

		<div class="col-md-3">
			<h3>Services details</h3>
			<p class="text-justify">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>
		</div>

	</div>
</div>
<?php get_footer(); ?>