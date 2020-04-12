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