<!DOCTYPE html>
<html lang="<?php bloginfo('language'); ?>">
	<head>
		<title><?php bloginfo('name'); ?></title>
		<meta name="author" content="Jovan Dosen">
		<meta charset="<?php bloginfo('charset'); ?>">
		<meta name="keywords" content="HTML,CSS,XML,JavaScript,PHP,SQL">
		<meta name="description" content="<?php bloginfo('description'); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
		<?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>

		<div class="container">
			<nav class="navbar navbar-expand-md navbar-dark bg-dark">
	   			<a class="navbar-brand" href="#">Example</a>
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