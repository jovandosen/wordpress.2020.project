<?php

function loadExampleAssets()
{
	wp_enqueue_style( 'examplecss', get_template_directory_uri() . '/assets/css/example.css', array(), '1.1', 'all');
  	wp_enqueue_script( 'examplejs', get_template_directory_uri() . '/assets/js/example.js', array ( 'jquery' ), 1.1, true);
}

add_action('wp_enqueue_scripts', 'loadExampleAssets');

function extendDefaultSettings()
{
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}

add_action('after_setup_theme', 'extendDefaultSettings');