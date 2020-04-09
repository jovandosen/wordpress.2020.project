<?php
/*
* Plugin Name: Ajax Example Plugin
* Description: A short example showing how to work with Ajax
* Version: 1.0
* Author: Jovan Dosen
* Author URI: http://jovan-dosen.com
*/

if( !defined('ABSPATH') ){
	exit();
}

require 'include/AjaxExampleAssets.php';
require 'process-ajax-data.php';

// load assets
$loadAssets = new AjaxExampleAssets();
//

function ajax_example_test_field( $user )
{
    ?>
    <h3>Ajax example</h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="test">Test Field</label>
            </th>
            <td>
                <input type="text"
                       class="regular-text ltr"
                       id="test"
                       name="test"
                       value="<?= esc_attr( get_user_meta( $user->ID, 'test', true ) ) ?>"
                       title="Enter data"
                       placeholder="Data..."
                       required>
                <p class="description">
                    Please enter your data.
                </p>
            </td>
        </tr>
    </table>
    <?php
}

function ajax_example_test_field_update( $user_id )
{
    // check that the current user have the capability to edit the $user_id
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
  
    // create/update user meta for the $user_id
    return update_user_meta(
        $user_id,
        'test',
        $_POST['test']
    );
}

add_action('show_user_profile', 'ajax_example_test_field');

add_action('personal_options_update', 'ajax_example_test_field_update');