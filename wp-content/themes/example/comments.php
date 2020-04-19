<?php

if( post_password_required() ){
	return;
}

// get post ID outside loop
$postID = get_queried_object_id(); 

//Get only the approved comments
$args = array(
    'status' => 'approve',
    'post_id' => $postID,
    'parent' => '0'
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
					<p>
						<?php 
							$arguments = array('depth' => 2, 'max_depth' => 3);
							comment_reply_link($arguments, $comment); 
						?>
					</p>

					<?php

						$commentArgs = array('status' => 'approve', 'parent' => $comment->comment_ID);

						$comments_nested_query = new WP_Comment_Query;

						$nestedComments = $comments_nested_query->query($commentArgs);

					?>

					<?php if( !empty($nestedComments) ): ?>
						<a href="<?php echo esc_js( 'javascript:void(0)' ); ?>" onclick="<?php echo esc_js( 'hideShowComments(this)' ); ?>">View comment reply list:</a>
						<div class="comments-lvl-two" style="display: none;" id="comments-reply-box">
							<?php foreach($nestedComments as $k => $v): ?>
								<hr>
								<p><?php echo 'Author: ' . $v->comment_author; ?></p>
								<p><?php echo 'Content: ' . $v->comment_content; ?></p>
								<p><?php echo 'Created: ' . $v->comment_date; ?></p>
								<hr>
							<?php endforeach; ?>	
						</div>
					<?php endif; ?>

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