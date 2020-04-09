<?php

function processData()
{
	check_ajax_referer('nonce_data');

    $data = $_POST['detail'];

    echo $data;

    // ajax handlers must die
    die;
}

add_action('wp_ajax_process', 'processData');