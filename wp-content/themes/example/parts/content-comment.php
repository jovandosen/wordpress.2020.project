<?php

if( post_password_required() ){
	return;
}

$postID = get_the_ID();

//Get only the approved comments
$args = array(
    'status' => 'approve',
    'post_id' => $postID
);

// The comment Query
$comments_query = new WP_Comment_Query;
$comments = $comments_query->query( $args );

?>

<?php if( $comments ): ?>
	<div class="container">
		<div class="comments-section">
			<hr>
			<h4>Comments Section:</h4>
			<hr>
			<?php foreach( $comments as $comment ): ?>
				<div class="comment-data">
					<p><?php echo 'Author: ' . $comment->comment_author; ?></p>
					<p><?php echo 'Comment: ' . $comment->comment_content; ?></p>
					<p><?php echo 'Created: ' . $comment->comment_date; ?></p>
				</div>
			<?php endforeach; ?>	
		</div>
	</div>
<?php else: ?>
	<div class="container">
		<div class="comments-section">
			<hr>
			<h4>Comments Section:</h4>
			<hr>
			<p><?php echo 'No comments found.'; ?></p>
		</div>	
	</div>
<?php endif; ?>	 