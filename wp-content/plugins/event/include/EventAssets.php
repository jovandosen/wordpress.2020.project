<?php

class EventAssets
{
	public function __construct()
	{
		add_action('wp_enqueue_scripts', array($this, 'addScripts'));
	}

	public function addScripts()
	{
		wp_register_script('eventjs', plugins_url('/event/assets/public/js/event.js'), array('jquery'),'1.1', true);
		wp_enqueue_script('eventjs');

		wp_register_style('eventcss', plugins_url('/event/assets/public/css/event.css'));
		wp_enqueue_style('eventcss');
	}
}