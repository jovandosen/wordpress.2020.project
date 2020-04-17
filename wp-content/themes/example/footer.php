		<div class="container move-content bg-dark" id="site-footer">
			<hr>
			<?php if( function_exists('the_privacy_policy_link') ): ?>
				<?php the_privacy_policy_link(); ?>
			<?php endif; ?>	
		</div>
		<?php wp_footer(); ?>
	</body>
</html>