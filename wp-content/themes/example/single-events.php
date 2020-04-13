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

<?php //comment_form(); ?>

<?php get_footer(); ?>