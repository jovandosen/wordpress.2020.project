<?php

class EventCustomMetaBoxExample
{
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'addMetaBox'));
		add_action('save_post', array($this, 'saveData'));
	}

	public function addMetaBox()
	{
	    $screens = ['post', 'events'];
	    foreach ($screens as $screen) {
	        add_meta_box(
	            'box_id',           
	            'Custom Meta Box Title',  
	            array($this, 'addMetaBoxHtml'),  
	            $screen                   
	        );
	    }
	}

	public function addMetaBoxHtml($post)
	{
		$value = get_post_meta($post->ID, 'box_id', true);
	    ?>
	    <label for="data">Description for this field</label>
	    <div>
	    	<input type="text" name="data" id="data" value="<?php echo $value; ?>" autocomplete="off" placeholder="Enter data...">
	    </div>
	    <?php
	}

	public function saveData($post_id)
	{
	    if (array_key_exists('data', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'box_id',
	            $_POST['data']
	        );
	    }
	}
}