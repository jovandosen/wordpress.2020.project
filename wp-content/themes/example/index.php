<?php get_header(); ?>
<div class="container">
	<div class="row">
		<div class="col-md-8 move-content">
			<div class="row">
				<div class="col-12">
					<?php get_search_form(); ?>
				</div>
			</div>
			<hr>
			<h3>Learn Wordpress</h3>
			<hr>
			<p class="text-justify">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of "de Finibus Bonorum et Malorum" (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance.</p>
			<hr>
			<?php
				// Customizer data
				// Textarea field
				// get_theme_mod function retrives data
				$textareaData = get_theme_mod('baz_textarea_setting');

				// Uploaded file
				$uploadedData = get_theme_mod('img_setting');

				// Text field data
				$textFieldData = get_theme_mod('bar_setting');

				// Foo text field data
				$fooText = get_theme_mod('foo_setting');
			?>
			<h4 id="bar_setting_id"><?php _e($textFieldData, 'example'); ?></h4>
			<p class="text-justify" id="baz_textarea_setting_id"><?php _e($textareaData, 'example'); ?></p>
			<hr>
			<h5 id="foo_setting_id"><?php _e($fooText, 'example'); ?></h5>
			<img src="<?php _e($uploadedData, 'example'); ?>" class="img-fluid">
		</div>
		<div class="col-md-4 move-content">
			<?php get_sidebar('primary'); ?>
		</div>
	</div>
</div>	
<?php get_footer(); ?>