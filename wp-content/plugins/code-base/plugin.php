<?php

function wporg_meta_box_scripts()
{
    // get current admin screen, or null
    $screen = get_current_screen();
    // verify admin screen object
    if (is_object($screen)) {
        // enqueue only for specific post types
        if (in_array($screen->post_type, ['post', 'wporg_cpt'])) {
            // enqueue script
            wp_enqueue_script('wporg_meta_box_script', plugin_dir_url(__FILE__) . 'admin/js/admin.js', ['jquery']);
            // localize script, create a custom js object
            wp_localize_script(
                'wporg_meta_box_script',
                'wporg_meta_box_obj',
                [
                    'url' => admin_url('admin-ajax.php'),
                ]
            );
        }
    }
}

add_action('admin_enqueue_scripts', 'wporg_meta_box_scripts');

function wporg_meta_box_ajax_handler()
{
    if (isset($_POST['wporg_field_value'])) {
        switch ($_POST['wporg_field_value']) {
            case 'something':
                echo 'success';
                break;
            default:
                echo 'failure';
                break;
        }
    }
    // ajax handlers must die
    die;
}
// wp_ajax_ is the prefix, wporg_ajax_change is the action we've used in client side code
add_action('wp_ajax_wporg_ajax_change', 'wporg_meta_box_ajax_handler');