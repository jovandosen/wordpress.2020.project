<?php

class EventLocation
{
	public function __construct()
	{
		add_action('init', array($this, 'registerEventLocation'));
	}

	public function registerEventLocation()
	{
		$labels = array(
	        'name'          => 'Locations',
	        'singular_name' => 'Location',
	        'edit_item'     => 'Edit Location',
	        'update_item'   => 'Update Location',
	        'add_new_item'  => 'Add New Location',
	        'menu_name'     => 'Locations'
    	);

	    $args = array(
	        'hierarchical'      => true,
	        'labels'            => $labels,
	        'show_ui'           => true,
	        'show_admin_column' => true,
	        'rewrite'           => array( 'slug' => 'location' )
	    );

    	register_taxonomy( 'locations', 'events', $args );
	}
}