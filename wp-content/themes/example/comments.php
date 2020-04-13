<?php

if( post_password_required() ){
	return;
}

// get post ID outside loop
$postID = get_queried_object_id(); 

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
<?php else: ?>
	<div class="comments-section">
		<hr>
		<h4>Comments Section:</h4>
		<hr>
		<p><?php echo 'No comments found.'; ?></p>
	</div>	
<?php endif; ?>	 