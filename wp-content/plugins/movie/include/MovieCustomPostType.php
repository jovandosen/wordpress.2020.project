<?php

class MovieCustomPostType
{
	public function __construct()
	{
		add_action('init', array($this, 'movieSettings'));
	}

	public function movieSettings()
	{
		$labels = array(
	        'name'                => _x( 'Movies', 'Post Type General Name', 'movie' ),
	        'singular_name'       => _x( 'Movie', 'Post Type Singular Name', 'movie' ),
	        'menu_name'           => __( 'Movies', 'movie' ),
	        'parent_item_colon'   => __( 'Parent Movie', 'movie' ),
	        'all_items'           => __( 'All Movies', 'movie' ),
	        'view_item'           => __( 'View Movie', 'movie' ),
	        'add_new_item'        => __( 'Add New Movie', 'movie' ),
	        'add_new'             => __( 'Add New', 'movie' ),
	        'edit_item'           => __( 'Edit Movie', 'movie' ),
	        'update_item'         => __( 'Update Movie', 'movie' ),
	        'search_items'        => __( 'Search Movie', 'movie' ),
	        'not_found'           => __( 'Not Found', 'movie' ),
	        'not_found_in_trash'  => __( 'Not found in Trash', 'movie' ),
	    );

	    $args = array(
	        'label'               => __( 'movies', 'movie' ),
	        'description'         => __( 'Movie news and reviews', 'movie' ),
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
	        'rewrite' => array('slug' => 'movies','with_front' => false),
	    );

    	register_post_type( 'movies', $args );
	}
}