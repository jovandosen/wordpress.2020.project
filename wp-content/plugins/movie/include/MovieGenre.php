<?php

class MovieGenre
{
	public function __construct()
	{
		add_action('init', array($this, 'movieGenreSettings'));
	}

	public function movieGenreSettings()
	{
		$labels = array(
	        'name'          => 'Genres',
	        'singular_name' => 'Genre',
	        'edit_item'     => 'Edit Genre',
	        'update_item'   => 'Update Genre',
	        'add_new_item'  => 'Add New Genre',
	        'menu_name'     => 'Genres'
    	);

	    $args = array(
	        'hierarchical'      => true,
	        'labels'            => $labels,
	        'show_ui'           => true,
	        'show_admin_column' => true,
	        'rewrite'           => array( 'slug' => 'genre' )
	    );

    	register_taxonomy( 'genres', 'movies', $args );
	}
}