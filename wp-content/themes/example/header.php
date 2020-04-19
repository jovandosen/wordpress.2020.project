<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
	<head>
		<title><?php wp_title(''); echo ' | ';  bloginfo( 'name' ); ?></title>
		<meta name="author" content="Jovan Dosen">
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript,PHP,SQL">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php wp_body_open(); ?>
		<div class="container">
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
   				<?php if( function_exists('the_custom_logo') ): ?>
   					<?php if( has_custom_logo() ): ?>
   						<?php the_custom_logo(); ?>
   					<?php endif; ?>	
   				<?php endif; ?>	
	   			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#bs4navbar" aria-controls="bs4navbar" aria-expanded="false" aria-label="Toggle navigation">
	 				<span class="navbar-toggler-icon"></span>
	   			</button>
			   	<?php
				   	wp_nav_menu([
				     	'menu'            => 'top',
				     	'theme_location'  => 'header-menu',
					    'container'       => 'div',
					    'container_id'    => 'bs4navbar',
					    'container_class' => 'collapse navbar-collapse',
					    'menu_id'         => false,
					    'menu_class'      => 'navbar-nav ml-auto',
					    'depth'           => 0,
					    'fallback_cb'     => 'bs4navwalker::fallback',
					    'walker'          => new bs4navwalker()
				   	]);
			   	?>
			</nav>
		</div>
		<?php if ( get_header_image() ) : ?>
			<div class="container">
				<img src="<?php header_image(); ?>" width="<?php echo absint( get_custom_header()->width ); ?>" height="<?php echo absint( get_custom_header()->height ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>">
			</div>
		<?php endif; ?>	