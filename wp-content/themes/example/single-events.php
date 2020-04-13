<?php get_header(); ?>
<h1>Event:</h1>
<hr>

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
	comment_form($settings); 
?>

<?php get_footer(); ?>