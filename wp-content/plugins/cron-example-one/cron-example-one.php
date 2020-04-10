<?php
/*
Plugin Name: Cron Example One
*/

// This function prints all cron jobs
function bl_print_tasks() {
    echo '<pre>'; print_r( _get_cron_array() ); echo '</pre>';
}
// bl_print_tasks();