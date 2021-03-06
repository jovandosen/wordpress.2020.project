<?php

abstract class CustomMetaBoxExample
{
	public static function add()
    {
        $screens = ['post', 'wporg_cpt'];
        foreach ($screens as $screen) {
            add_meta_box(
                'wporg_box_id',          // Unique ID
                'Custom Meta Box Title', // Box title
                [self::class, 'html'],   // Content callback, must be of type callable
                $screen                  // Post type
            );
        }
    }

    public static function save($post_id)
    {
        if (array_key_exists('wporg_field', $_POST)) {
            update_post_meta(
                $post_id,
                '_wporg_meta_key',
                $_POST['wporg_field']
            );
        }
    }
 
    public static function html($post)
    {
        $value = get_post_meta($post->ID, '_wporg_meta_key', true);
        ?>
        <label for="wporg_field">Description for this field</label>
        <select name="wporg_field" id="wporg_field" class="postbox">
            <option value="">Select something...</option>
            <option value="something" <?php selected($value, 'something'); ?>>Something</option>
            <option value="else" <?php selected($value, 'else'); ?>>Else</option>
        </select>
        <?php
    }
}

add_action('add_meta_boxes', ['CustomMetaBoxExample', 'add']);
add_action('save_post', ['CustomMetaBoxExample', 'save']);