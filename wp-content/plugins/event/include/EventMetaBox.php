<?php

class EventMetaBox
{
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'addMetaBoxContent'));
		add_action('save_post', array($this, 'saveBoxData'));
	}

	public function addMetaBoxContent()
	{
	    $screens = ['post', 'events'];
	    foreach ($screens as $screen) {
	        add_meta_box(
	            'box_el_id',           
	            'Custom Meta Box Title Example',  
	            array($this, 'addMetaBoxHtmlData'),  
	            $screen                   
	        );
	    }
	}

	public function addMetaBoxHtmlData($post)
	{
		$value = get_post_meta($post->ID, 'box_el_id', true);
	    ?>
	    <label for="dataExample">Field description</label>
	    <div>
	    	<select id="dataExample" name="dataExample" class="postbox">
	    		<option value="">Please select...</option>
	    		<option value="foo" <?php selected($value, 'foo'); ?>>Foo</option>
	    		<option value="bar" <?php selected($value, 'bar'); ?>>Bar</option>
	    		<option value="baz" <?php selected($value, 'baz'); ?>>Baz</option>
	    	</select>
	    </div>
	    <?php
	}

	public function saveBoxData($post_id)
	{
	    if (array_key_exists('dataExample', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'box_el_id',
	            $_POST['dataExample']
	        );
	    }
	}
}