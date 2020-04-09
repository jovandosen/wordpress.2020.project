<?php

class AjaxExampleAssets
{
	public function __construct()
	{
		add_action('admin_enqueue_scripts', array($this, 'loadAssets'));
	}

	public function loadAssets()
	{
		wp_register_script('ajaxexamplejs', plugins_url('/ajax-example/assets/admin/js/ajax-example.js'), ['jquery']);
		wp_enqueue_script('ajaxexamplejs');

		wp_register_style('ajaxexamplecss', plugins_url('/ajax-example/assets/admin/css/ajax-example.css'));
		wp_enqueue_style('ajaxexamplecss');

		$nonce = wp_create_nonce('nonce_data');

	 	wp_localize_script(
            'ajaxexamplejs',
            'ajax_example_obj',
            [
                'url' => admin_url('admin-ajax.php'),
                'nonce' => $nonce,
            ]
        );
	}
}