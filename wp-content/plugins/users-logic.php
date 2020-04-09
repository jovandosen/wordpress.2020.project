<?php
/*
* Plugin Name: Users CRUD
* Description: A short example showing how to work with Users CRUD operations
* Version: 1.0
* Author: Jovan Dosen
* Author URI: http://jovan-dosen.com
*/

function createUser()
{
	$username = "Damjan";
	$email = "damjan@gmail.com";

	$user_id = username_exists($username);

	if( !$user_id && email_exists($email) === false ){
		$random_password = wp_generate_password($length = 12, $include_standard_special_chars = false);
		$user_id = wp_create_user($username, $random_password, $email);
	}
}

add_action('init', 'createUser');

function insertUser()
{
	$username = "Jovan";
	$password = "jovan";
	$website = "http://jovandosen.com";
	$email = "jovandosen@gmail.com";

	$user_data = [
		'user_login' => $username,
		'user_pass' => $password,
		'user_url' => $website,
		'user_email' => $email
	];

	$user_id = username_exists($username);

	if( !$user_id && email_exists($email) === false ){
		$user_id = wp_insert_user($user_data);
		if( !is_wp_error($user_id) ){
			echo 'User created: ' . $user_id;
		}
	}
}

add_action('init', 'insertUser');

function insertTestUser()
{
	$username = "Jelena";
	$password = "jelena";
	$website = "http://jelenatest.com";
	$email = "jelena@gmail.com";

	$user_data = [
		'user_login' => $username,
		'user_pass' => $password,
		'user_url' => $website,
		'user_email' => $email
	];

	$user_id = username_exists($username);

	if( !$user_id && email_exists($email) === false ){
		$user_id = wp_insert_user($user_data);
		if( !is_wp_error($user_id) ){
			echo 'User created: ' . $user_id;
		}
	}
}

add_action('init', 'insertTestUser');

function insertExampleUser()
{
	$username = "Petar";
	$password = "petar";
	$website = "http://petartest.com";
	$email = "petar@gmail.com";

	$user_data = [
		'user_login' => $username,
		'user_pass' => $password,
		'user_url' => $website,
		'user_email' => $email
	];

	$user_id = username_exists($username);

	if( !$user_id && email_exists($email) === false ){
		$user_id = wp_insert_user($user_data);
		if( !is_wp_error($user_id) ){
			echo 'User created: ' . $user_id;
		}
	}
}

add_action('init', 'insertExampleUser');

function updateUser()
{
	$user_id = 5;
	$website = 'http://petardev.com';
	$new_email = "petar123@gmail.com";
 
	$user_id = wp_update_user([
        'ID'       => $user_id,
        'user_url' => $website,
        'user_email' => $new_email,
    ]);
 
	if (is_wp_error($user_id)) {
	    // error
	} else {
	    // success
	}
}

// add_action('init', 'updateUser');

function deleteUser()
{
	$user_id = 5;
	$reassign = null;
	wp_delete_user($user_id, $reassign);
}

// add_action('init', 'deleteUser');

// Add custom form field to User profile //

/**
 * The field on the editing screens.
 *
 * @param $user WP_User user object
 */
function wporg_usermeta_form_field_birthday( $user )
{
    ?>
    <h3>It's Your Birthday</h3>
    <table class="form-table">
        <tr>
            <th>
                <label for="birthday">Birthday</label>
            </th>
            <td>
                <input type="date"
                       class="regular-text ltr"
                       id="birthday"
                       name="birthday"
                       value="<?= esc_attr( get_user_meta( $user->ID, 'birthday', true ) ) ?>"
                       title="Please use YYYY-MM-DD as the date format."
                       pattern="(19[0-9][0-9]|20[0-9][0-9])-(1[0-2]|0[1-9])-(3[01]|[21][0-9]|0[1-9])"
                       required>
                <p class="description">
                    Please enter your birthday date.
                </p>
            </td>
        </tr>
    </table>
    <?php
}

/**
 * The save action.
 *
 * @param $user_id int the ID of the current user.
 *
 * @return bool Meta ID if the key didn't exist, true on successful update, false on failure.
 */
function wporg_usermeta_form_field_birthday_update( $user_id )
{
    // check that the current user have the capability to edit the $user_id
    if ( ! current_user_can( 'edit_user', $user_id ) ) {
        return false;
    }
  
    // create/update user meta for the $user_id
    return update_user_meta(
        $user_id,
        'birthday',
        $_POST['birthday']
    );
}

// Add the field to user's own profile editing screen.
add_action('show_user_profile', 'wporg_usermeta_form_field_birthday');
  
// Add the field to user profile editing screen.
add_action('edit_user_profile', 'wporg_usermeta_form_field_birthday');
  
// Add the save action to user's own profile editing screen update.
add_action('personal_options_update', 'wporg_usermeta_form_field_birthday_update');
  
// Add the save action to user profile editing screen update.
add_action('edit_user_profile_update', 'wporg_usermeta_form_field_birthday_update');

// USER ROLES AND CAPABILITIES //

function wporg_simple_role() {
    add_role(
        'simple_role',
        'Simple Role',
        [
            'read'         => true,
            'edit_posts'   => true,
            'upload_files' => true,
        ]
    );
}
 
// Add the simple_role.
add_action('init', 'wporg_simple_role');

function wporg_simple_role_caps() {
    // Gets the simple_role role object.
    $role = get_role( 'simple_role' );
 
    // Add a new capability.
    $role->add_cap( 'edit_others_posts', true );
}
 
// Add simple_role capabilities, priority must be after the initial role definition.
add_action( 'init', 'wporg_simple_role_caps', 11 );