<?php get_header(); ?>
<div class="container">
	<div class="row move-content">
		<div class="col-12">

			<h1>Attachment:</h1>
			<hr>

			<div class="attachment-title">
				<h4><?php the_title(); ?></h4>
			</div>

			<?php if ( has_excerpt() ) : ?>
			        
			   <div class="entry-caption">
			        <?php the_excerpt(); ?>
			   </div>

			<?php endif; ?>

			<div class="attachment-image">
				<?php echo wp_get_attachment_image(get_the_ID(), 'medium'); ?>
			</div>

			<?php
				// Attachement meta data
				// wp_get_attachment_metadata( get_the_ID() )
			?>

		</div>
	</div>
</div>
<?php get_footer(); ?>