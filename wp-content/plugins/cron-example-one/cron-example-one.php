<?php
/*
* Plugin Name: Cron Example One
* Description: This plugin prints all scheduled tasks by Cron job
* Version: 1.0
* Author: Jovan Dosen
* Author URI: http://jovan-dosen.com
*/

// This function prints all cron jobs
function bl_print_tasks() {
    echo '<pre>'; print_r( _get_cron_array() ); echo '</pre>';
}
//bl_print_tasks();