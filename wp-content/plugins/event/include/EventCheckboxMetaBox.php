<?php

class EventCheckboxMetaBox
{
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'addCheckboxMetaBoxContent'));
		add_action('save_post', array($this, 'saveCheckboxData'));
	}

	public function addCheckboxMetaBoxContent()
	{
	    $screens = ['post', 'events'];
	    foreach ($screens as $screen) {
	        add_meta_box(
	            'box_checkbox_id',           
	            'Custom Meta Box Title For Checkbox',  
	            array($this, 'addCheckboxMetaBoxHtmlData'),  
	            $screen                   
	        );
	    }
	}

	public function addCheckboxMetaBoxHtmlData($post)
	{
		$values = get_post_meta($post->ID, 'box_checkbox_id', true);
	    ?>
	    <label for="dataCheckbox">Field description for checkbox</label>
	    <div>
	    	<p>
	    		<input type="checkbox" name="details[]" value="1" <?php echo (in_array("1", $values)) ? 'checked' : '' ?>>One
	    	</p>
	    	<p>
	    		<input type="checkbox" name="details[]" value="2" <?php echo (in_array("2", $values)) ? 'checked' : '' ?>>Two
			</p>
			<p>
	    		<input type="checkbox" name="details[]" value="3" <?php echo (in_array("3", $values)) ? 'checked' : '' ?>>Three
	    	</p>
	    	<p>
	    		<input type="checkbox" name="details[]" value="4" <?php echo (in_array("4", $values)) ? 'checked' : '' ?>>Four
	    	</p>
	    	<p>
	    		<input type="checkbox" name="details[]" value="5" <?php echo (in_array("5", $values)) ? 'checked' : '' ?>>Five
	    	</p>	
	    </div>
	    <?php
	}

	public function saveCheckboxData($post_id)
	{
	    if (array_key_exists('details', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'box_checkbox_id',
	            $_POST['details']
	        );
	    }
	}
}