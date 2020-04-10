<?php
/*
* Plugin Name: Cron Example Two
* Description: A short example showing how to work with CRON jobs
* Version: 1.0
* Author: Jovan Dosen
* Author URI: http://jovan-dosen.com
*/

add_filter( 'cron_schedules', 'example_add_cron_interval' );

function example_add_cron_interval( $schedules ) 
{ 
    $schedules['five_seconds'] = array(
        'interval' => 5,
        'display'  => esc_html__( 'Every Five Seconds' ), );
    return $schedules;
}

add_action( 'bl_cron_hook', 'bl_cron_exec' );

function bl_cron_exec()
{
	$message = "Well and good.";
	echo $message;
	// error_log($message);
}

if ( ! wp_next_scheduled( 'bl_cron_hook' ) ) {
    wp_schedule_event( time(), 'five_seconds', 'bl_cron_hook' );
}

// Upon deactivation
register_deactivation_hook( __FILE__, 'bl_deactivate' ); 
 
function bl_deactivate() 
{
    $timestamp = wp_next_scheduled( 'bl_cron_hook' );
    wp_unschedule_event( $timestamp, 'bl_cron_hook' );
}