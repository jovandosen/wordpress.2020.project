<?php

class EventMixMetaBox
{
	public function __construct()
	{
		add_action('add_meta_boxes', array($this, 'addCheckboxMetaBoxContent'));
		add_action('save_post', array($this, 'saveCheckboxMixData'));
	}

	public function addCheckboxMetaBoxContent()
	{
	    $screens = ['post', 'events'];
	    foreach ($screens as $screen) {
	        add_meta_box(
	            'box_mix_id',           
	            'Custom Meta Box Title For Multiple form fields',  
	            array($this, 'addMixCheckboxMetaBox'),  
	            $screen                   
	        );
	    }
	}

	public function addMixCheckboxMetaBox($post)
	{
		$values = get_post_meta($post->ID, 'box_mix_id', true);
	    ?>
	    <label for="dataMix">Description for multiple fields</label>
	    <div>
	    	<div>
	    		<input type="text" name="dataMix[name]" id="name" placeholder="Enter name..." value="<?php echo (!empty($values['name'])) ? $values['name'] : '' ?>">
	    	</div>
	    	<br>
	    	<div>
	    		<input type="number" name="dataMix[number]" id="number" placeholder="Enter number..." value="<?php echo (!empty($values['number'])) ? $values['number'] : '' ?>">
	    	</div>
	    	<br>
	    	<div>
	    		<input type="email" name="dataMix[email]" id="email" placeholder="Enter email..." value="<?php echo (!empty($values['email'])) ? $values['email'] : '' ?>">
	    	</div>	
	    	<br>
	    </div>
	    <?php
	}

	public function saveCheckboxMixData($post_id)
	{
	    if (array_key_exists('dataMix', $_POST)) {
	        update_post_meta(
	            $post_id,
	            'box_mix_id',
	            $_POST['dataMix']
	        );
	    }
	}
}