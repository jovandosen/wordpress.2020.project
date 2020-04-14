<?php

require_once('bs4navwalker.php');

function loadExampleAssets()
{
	wp_enqueue_style( 'examplecss', get_template_directory_uri() . '/assets/css/example.css', array(), '1.1', 'all');
  	wp_enqueue_script( 'examplejs', get_template_directory_uri() . '/assets/js/example.js', array ( 'jquery' ), 1.1, true);
  	wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css');
  	wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.min.js');
}

add_action('wp_enqueue_scripts', 'loadExampleAssets');

function extendDefaultSettings()
{
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
}

add_action('after_setup_theme', 'extendDefaultSettings');

function custom_class( $classes ) 
{
	if( is_front_page() ){
		$classes[] = 'add-front-page-class';
	}

    $classes[] = 'add-to-all';

    return $classes;
}

add_filter( 'body_class', 'custom_class' );

function allowCommentsForEvents()
{
	add_post_type_support( 'events', 'comments' );
}

add_action('init', 'allowCommentsForEvents');

function registerNavMenus()
{
	register_nav_menus(array(
		'header-menu' => __('Header Menu')
	));
}

add_action('init', 'registerNavMenus');

// Add submenu to admin area, menu is added under Settings top level menu

add_action( 'admin_menu', 'my_menu' );
 
function my_menu() 
{
    add_options_page(
        'My Options',
        'My Menu',
        'manage_options',
        'my-unique-identifier',
        'my_options'
    );
}
 
function my_options() 
{
    if ( !current_user_can( 'manage_options' ) ) {
        wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
    }
    echo 'Here is where I output the HTML for my screen.';
    echo '</div><pre>';
}

// end 

// Add top level menu and submenu

function register_my_theme_settings_menu() 
{
    add_menu_page(
        "My Theme's Settings",
        "My Theme",
        "manage_options",
        "my-theme-settings-menu"
    );
}
 
function register_my_theme_more_settings_menu() 
{
    add_submenu_page(
        "my-themes-settings-menu",
        "More Settings for My Theme",
        "More Settings",
        "manage_options",
        "my-theme-more-settings-menu"
    );
}
 
add_action( "admin_menu", "register_my_theme_settings_menu");
add_action( "admin_menu", "register_my_theme_more_settings_menu");

// end

// Register submenu pages to existing top level menus, register new top level menus

// Hook for adding admin menus
add_action('admin_menu', 'mt_add_pages');
 
// Action function for hook above
function mt_add_pages() 
{
	// Add a new submenu under Settings:
	add_options_page(__('Test Settings','menu-test'), __('Test Settings','menu-test'), 'manage_options', 'testsettings', 'mt_settings_page');
 
	// Add a new submenu under Tools:
	add_management_page( __('Test Tools','menu-test'), __('Test Tools','menu-test'), 'manage_options', 'testtools', 'mt_tools_page');
 
	// Add a new top-level menu (ill-advised):
	add_menu_page(__('Test Toplevel','menu-test'), __('Test Top-level','menu-test'), 'manage_options', 'mt-top-level-handle', 'mt_toplevel_page' );
 
	// Add a submenu to the custom top-level menu:
	add_submenu_page('mt-top-level-handle', __('Test Sub-Level','menu-test'), __('Test Sub-Level','menu-test'), 'manage_options', 'sub-page', 'mt_sublevel_page');
 
	// Add a second submenu to the custom top-level menu:
	add_submenu_page('mt-top-level-handle', __('Test Sub-Level 2','menu-test'), __('Test Sub-Level 2','menu-test'), 'manage_options', 'sub-page2', 'mt_sublevel_page2');
}
 
// mt_settings_page() displays the page content for the Test settings sub-menu
function mt_settings_page() 
{
    echo "</pre>
    <h2>" . __( 'Test Settings', 'menu-test' ) . "</h2>
    <pre>
    ";
}
 
// mt_tools_page() displays the page content for the Test Tools sub-menu
function mt_tools_page() 
{
    echo "</pre>
    <h2>" . __( 'Test Tools', 'menu-test' ) . "</h2>
    <pre>
    ";
}
 
// mt_toplevel_page() displays the page content for the custom Test Top-Level menu
function mt_toplevel_page() 
{
    echo "</pre>
    <h2>" . __( 'Test Top-Level', 'menu-test' ) . "</h2>
    <pre>
    ";
}
 
// mt_sublevel_page() displays the page content for the first sub-menu
// of the custom Test Toplevel menu
function mt_sublevel_page() 
{
    echo "</pre>
    <h2>" . __( 'Test Sub-Level', 'menu-test' ) . "</h2>
    <pre>
	";
}
 
// mt_sublevel_page2() displays the page content for the second sub-menu
// of the custom Test Top-Level menu
function mt_sublevel_page2() 
{
    echo "</pre>
    <h2>" . __( 'Test Sub-Level 2', 'menu-test' ) . "</h2>
    <pre>
	";
}

// end