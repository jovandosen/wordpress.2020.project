		<div class="container move-content">
			<hr id="footer-hr">
			<div class="row">
				<div class="col-md-3">
					<h5>Site Information</h5>
					<hr>
					<?php if( function_exists('the_privacy_policy_link') ): ?>
						<?php the_privacy_policy_link(); ?>
					<?php endif; ?>	
				</div>
				<div class="col-md-3">
					<?php if ( is_active_sidebar( 'footer-box-one' ) ) : ?>
    					<?php dynamic_sidebar( 'footer-box-one' ); ?>
					<?php else : ?>
    					<!-- Time to add some widgets! -->
					<?php endif; ?>
				</div>
				<div class="col-md-3">
					<?php if ( is_active_sidebar( 'footer-box-two' ) ) : ?>
    					<?php dynamic_sidebar( 'footer-box-two' ); ?>
					<?php else : ?>
    					<!-- Time to add some widgets! -->
					<?php endif; ?>
				</div>
				<div class="col-md-3">
					<?php if ( is_active_sidebar( 'footer-box-three' ) ) : ?>
    					<?php dynamic_sidebar( 'footer-box-three' ); ?>
					<?php else : ?>
    					<!-- Time to add some widgets! -->
					<?php endif; ?>
				</div>
			</div>
		</div>
		<?php wp_footer(); ?>
	</body>
</html>