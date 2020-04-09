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