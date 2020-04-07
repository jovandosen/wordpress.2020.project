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

 function wporg_options_page_html() 
 {
    ?>
    <div class="wrap">
      <h1><?php esc_html( get_admin_page_title() ); ?></h1>
      <form action="options.php" method="post">
        <?php
        // output security fields for the registered setting "wporg_options"
        settings_fields( 'wporg_options' );
        // output setting sections and their fields
        // (sections are registered for "wporg", each field is registered to a specific section)
        do_settings_sections( 'wporg' );
        // output save settings button
        submit_button( 'Save Settings' );
        ?>
      </form>
    </div>
    <?php
 }

 add_action( 'admin_menu', 'wporg_options_page' );

 function wporg_options_page() 
 {
    add_menu_page(
        'WPOrg',
        'WPOrg Options',
        'manage_options',
        'wporg',
        'wporg_options_page_html',
        '',
        20
    );
 }

 function code_base_page()
 {
 	?>
 	<div class="wrap">
 		<h1>Code Base Page</h1>
 		<p>Learn Wordpress.</p>
 		<form method="post" action="<?php menu_page_url( 'code-base' ) ?>">
 			<input type="text" name="data" autocomplete="off">
 			<input type="submit" name="send" value="SEND">
 			<input type="hidden" name="check" value="<?php echo wp_create_nonce('check'); ?>">
 		</form>
 	</div>
 	<?php
 }

 add_action('admin_menu', 'code_base_options');

 function code_base_options()
 {
 	$hookName = add_menu_page(
 		'Code Base',
 		'Code Base Options',
 		'manage_options',
 		'code-base',
 		'code_base_page',
 		'',
 		30
 	);

 	add_action( 'load-' . $hookName, 'code_base_page_submit' );
 }

 function code_base_page_submit()
 {
 	// runs on form submit
 	if( 'POST' === $_SERVER['REQUEST_METHOD'] && wp_verify_nonce($_POST['check'], 'check') ){
 		if( !empty($_POST['data']) ){
 			$data = $_POST['data'];
 			echo "You have submitted: " . $data;
 		}
 	}
 }

?>