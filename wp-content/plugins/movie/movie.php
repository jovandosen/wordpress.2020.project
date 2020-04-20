<?php
/**
 * Plugin Name: Movie
 * Plugin URI: http://wordpress.2020.project/plugins/movie/
 * Description: This is Wordpress 2020 Project Movie plugin
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Jovan Dosen
 * Author URI: http://jovan-dosen.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: movie
 * Domain Path: /languages

 {Plugin Name} is free software: you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation, either version 2 of the License, or
 any later version.
 
 {Plugin Name} is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 GNU General Public License for more details.
 
 You should have received a copy of the GNU General Public License
 along with {Plugin Name}. If not, see {License URI}.
 */

 if( !defined('ABSPATH') ){
 	exit();
 }

 require 'include/LoadMovieAssets.php';
 require 'include/MovieCustomPostType.php';
 require 'include/MovieGenre.php';

 if( !class_exists('Movie') ){

 	class Movie
 	{
 		public function __construct()
 		{
 			add_action('plugins_loaded', array($this, 'boot'));
 		}

 		public function boot()
 		{
 			$movieAssets = new LoadMovieAssets(); // load assets: css, js
 			$movieData = new MovieCustomPostType(); // create instance of Movie custom post type
 			$movieGenre = new MovieGenre(); // add genre taxonomy to Movies
 		}

 		public static function create()
 		{
 			return new self;
 		}
 	}

 	Movie::create();

 }