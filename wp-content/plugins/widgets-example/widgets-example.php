<?php
/*
* Plugin Name: Widgets Example
* Description: A short example showing how to create Widget.
* Version: 1.0
* Author: Jovan Dosen
* Author URI: http://jovandosen.com
*/

if( !defined('ABSPATH') ){
	exit();
}

require 'include/MyWidget.php';

if( !class_exists('WidgetsExample') ){

	class WidgetsExample
	{
		public function __construct()
		{
			add_action('plugins_loaded', array($this, 'boot'));
		}

		public function boot()
		{
			$myWidget = new MyWidget(); // create instance of my widget
		}

		public static function create()
		{
			return new self();
		}
	}

	WidgetsExample::create();

}