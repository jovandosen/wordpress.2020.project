<?php

class EventCustomPostType
{
	public function __construct()
	{
		add_action('init', array($this, 'registerCustomPostType'));
	}

	public function registerCustomPostType() 
	{
	    $labels = array(
	        'name'                => _x( 'Events', 'Post Type General Name', 'event' ),
	        'singular_name'       => _x( 'Event', 'Post Type Singular Name', 'event' ),
	        'menu_name'           => __( 'Events', 'event' ),
	        'parent_item_colon'   => __( 'Parent Event', 'event' ),
	        'all_items'           => __( 'All Events', 'event' ),
	        'view_item'           => __( 'View Event', 'event' ),
	        'add_new_item'        => __( 'Add New Event', 'event' ),
	        'add_new'             => __( 'Add New', 'event' ),
	        'edit_item'           => __( 'Edit Event', 'event' ),
	        'update_item'         => __( 'Update Event', 'event' ),
	        'search_items'        => __( 'Search Event', 'event' ),
	        'not_found'           => __( 'Not Found', 'event' ),
	        'not_found_in_trash'  => __( 'Not found in Trash', 'event' ),
	    );

	    $args = array(
	        'label'               => __( 'events', 'event' ),
	        'description'         => __( 'Event news and reviews', 'event' ),
	        'labels'              => $labels,
	        'supports'            => array( 'title', 'editor', 'thumbnail', ),
	        'taxonomies'          => array( 'genres' ),
	        'hierarchical'        => true,
	        'public'              => true,
	        'show_ui'             => true,
	        'show_in_menu'        => true,
	        'show_in_nav_menus'   => true,
	        'show_in_admin_bar'   => true,
	        'menu_position'       => 5,
	        'can_export'          => true,
	        'has_archive'         => true,
	        'exclude_from_search' => false,
	        'publicly_queryable'  => true,
	        'capability_type'     => 'page',
	        'rewrite' => array('slug' => 'events','with_front' => false),
	    );

    	register_post_type( 'events', $args );
	}
}