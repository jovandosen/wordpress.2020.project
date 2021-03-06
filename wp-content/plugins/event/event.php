<?php
/**
 * Plugin Name: Event
 * Plugin URI: http://wordpress.2020.project/plugins/event/
 * Description: This is Wordpress 2020 Project Event plugin
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Jovan Dosen
 * Author URI: http://jovan-dosen.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: event
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

 require 'include/EventCustomPostType.php';
 require 'include/EventLocation.php';
 require 'include/EventCustomMetaBoxExample.php';
 require 'include/EventAssets.php';
 require 'include/EventMetaBox.php';
 require 'include/EventCheckboxMetaBox.php';
 require 'include/EventMixMetaBox.php';

 if( !class_exists('Event') ){

 	class Event
 	{	
 		public function __construct()
 		{
 			add_action('plugins_loaded', array($this, 'boot'));
 		}

 		public function boot()
 		{
 			$eventCustomPostType = new EventCustomPostType();
 			$eventLocation = new EventLocation();
 			$customMetaBoxExample = new EventCustomMetaBoxExample();
 			$eventAssets = new EventAssets();
 			$eventMetaBox = new EventMetaBox();
 			$eventCheckboxMetaBox = new EventCheckboxMetaBox();
 			$eventMetaBoxMix = new EventMixMetaBox();
 			add_action('pre_get_posts', array($this, 'extendMainQuery'));
 			add_action('admin_init', array($this, 'checkAcfActive'));
 		}

 		public static function create()
 		{
 			return new self;
 		}

 		public function extendMainQuery($query)
 		{
 			if ( is_home() && $query->is_main_query() ) {
        		$query->set( 'post_type', array( 'post', 'page', 'events' ) );
    		}
    		return $query;
 		}

 		public function checkAcfActive()
		{
			if( !is_plugin_active('advanced-custom-fields/acf.php') ){

				add_action('admin_notices', array($this, 'eventNotice'));

				deactivate_plugins( plugin_basename( __FILE__ ) ); 

		        if ( isset( $_GET['activate'] ) ) {
		            unset( $_GET['activate'] );
		        }

			} 
		}

		public function eventNotice()
		{
    		?>
    		<div class="error"><p>Sorry, but Event Plugin requires the Advanced Custom Fields plugin to be installed and active.</p></div>
    		<?php
		}
 	}

 	Event::create();

 }