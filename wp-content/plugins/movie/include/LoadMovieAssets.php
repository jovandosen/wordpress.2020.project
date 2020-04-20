<?php

class LoadMovieAssets
{
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'loadMovieAssetsData'));	
	}

	public function loadMovieAssetsData()
	{
		wp_register_script('moviejs', plugins_url('/movie/assets/public/js/movie.js'), array('jquery'),'1.1', true);
		wp_enqueue_script('moviejs');

		wp_register_style('moviecss', plugins_url('/movie/assets/public/css/movie.css'));
		wp_enqueue_style('moviecss');
	}
}