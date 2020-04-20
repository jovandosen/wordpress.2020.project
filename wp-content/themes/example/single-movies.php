<?php get_header(); ?>
<div class="container">
	<hr>
	<h2>Movie:</h2>
	<hr>
</div>
<?php get_template_part('parts/content', 'data'); ?>

<?php if( comments_open() || get_comments_number() ): ?>
	<?php comments_template(); ?>
<?php endif; ?>	

<?php
	// Display comment form
	$settings = array(
		'label_submit' => __('Add Comment', 'example'), 
		'title_reply' => __('Leave a Comment', 'example'),
		'logged_in_as' => false
	);  
?>

<div class="container">
	<?php comment_form($settings); ?>
</div>

<?php get_footer(); ?>