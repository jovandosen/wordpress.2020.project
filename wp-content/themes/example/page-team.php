<?php get_header(); ?>
<div class="container add-box-style">
	<div class="row">

		<?php
			$imgOne = get_template_directory_uri() . '/assets/images/ddaaeaweq.jpg';
			$imgTwo = get_template_directory_uri() . '/assets/images/aadad.jpg';
			$imgThree = get_template_directory_uri() . '/assets/images/site.jpg';
			$imgFour = get_template_directory_uri() . '/assets/images/aadad.jpg';

			$imgOneAlt = 'image one alt text';
			$imgTwoAlt = 'image two alt text';
			$imgThreeAlt = 'image three alt text';
			$imgFourAlt = 'image four alt text';

			$imgClass = 'card-img-top';

			$imgText = "Some quick example text to build on the card title and make up the bulk of the card's content.";
		?>

		<div class="col-md-3">
			
			<div class="card">
				<img src="<?php echo esc_url($imgOne); ?>" class="<?php echo esc_attr($imgClass); ?>" alt="<?php echo esc_attr($imgOneAlt); ?>">
				<div class="card-body">
					<h5 class="card-title">Foo</h5>
					<p class="card-text"><?php echo esc_html($imgText); ?></p>
					<a href="#" class="btn btn-primary">Read more</a>
				</div>
			</div>

		</div>

		<div class="col-md-3">
			
			<div class="card">
				<img src="<?php echo esc_url($imgTwo); ?>" class="<?php echo esc_attr($imgClass); ?>" alt="<?php echo esc_attr($imgTwoAlt); ?>">
				<div class="card-body">
					<h5 class="card-title">Bar</h5>
					<p class="card-text"><?php echo esc_html($imgText); ?></p>
					<a href="#" class="btn btn-primary">Read more</a>
				</div>
			</div>

		</div>

		<div class="col-md-3">
			
			<div class="card">
				<img src="<?php echo esc_url($imgThree); ?>" class="<?php echo esc_attr($imgClass); ?>" alt="<?php echo esc_attr($imgThreeAlt); ?>">
				<div class="card-body">
					<h5 class="card-title">Baz</h5>
					<p class="card-text"><?php echo esc_html($imgText); ?></p>
					<a href="#" class="btn btn-primary">Read more</a>
				</div>
			</div>

		</div>

		<div class="col-md-3">
			
			<div class="card">
				<img src="<?php echo esc_url($imgFour); ?>" class="<?php echo esc_attr($imgClass); ?>" alt="<?php echo esc_attr($imgFourAlt); ?>">
				<div class="card-body">
					<h5 class="card-title">Test</h5>
					<p class="card-text"><?php echo esc_html($imgText); ?></p>
					<a href="#" class="btn btn-primary">Read more</a>
				</div>
			</div>

		</div>

	</div>
</div>
<?php get_footer(); ?>