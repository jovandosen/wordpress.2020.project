<?php
/**
 * Plugin Name: Code Base
 * Plugin URI: http://wordpress.2020.project/plugins/code-base/
 * Description: This is Wordpress 2020 Project plugin
 * Version: 1.0.0
 * Requires at least: 5.2
 * Requires PHP: 7.2
 * Author: Jovan Dosen
 * Author URI: http://jovan-dosen.com
 * License: GPL v2 or later
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain: code-base
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

 function code_base_setup_book()
 {
 	register_post_type( 'book', ['public' => 'true'] );
 }

 add_action('init', 'code_base_setup_book');

 function code_base_install()
 {
 	code_base_setup_book();
 	flush_rewrite_rules();
 }

 register_activation_hook( __FILE__, 'code_base_install' );

 function code_base_deactivation()
 {
 	unregister_post_type( 'book' );
 	flush_rewrite_rules();
 }

 register_deactivation_hook( __FILE__, 'code_base_deactivation' );

 function code_base_uninstall()
 {
 	// removes all data
 }

 register_uninstall_hook(__FILE__, 'code_base_uninstall');

?>