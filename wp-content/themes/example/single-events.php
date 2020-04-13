<?php get_header(); ?>
<div class="container">
	<hr>
	<h1>Event:</h1>
	<hr>
</div>

<?php get_template_part('parts/content', 'event'); ?>

<?php
	// If comments are open or we have at least one comment, load up the comment template.
	if( comments_open() || get_comments_number() ){
		comments_template();
	}
?>

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