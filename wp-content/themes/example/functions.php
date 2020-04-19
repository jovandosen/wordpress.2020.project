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

function loadCustomizerScripts()
{
    wp_enqueue_script( 'customizerjs', get_template_directory_uri() . '/assets/js/customizer-example.js', array ( 'customize-preview', 'jquery' ), '', true);
}

add_action('customize_preview_init', 'loadCustomizerScripts');

function extendDefaultSettings()
{
	add_theme_support( 'post-thumbnails' );
	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'post-formats', array ( 'aside', 'gallery', 'quote', 'image', 'video' ) );
    add_theme_support( 'html5', array('search-form') );
    add_theme_support( 'title-tag' );

	$args = array(
        'default-image'      => get_template_directory_uri() . '/assets/images/site.jpg',
        'default-text-color' => '000',
        'width'              => 1110,
        'height'             => 250,
        'flex-width'         => true,
        'flex-height'        => true,
    );

    add_theme_support( 'custom-header', $args );

    $defaults = array(
 		'height'      => 80,
 		'width'       => 80,
 		'flex-height' => true,
 		'flex-width'  => true,
 		'header-text' => array( 'site-title', 'site-description' ),
 	);

 	add_theme_support( 'custom-logo', $defaults );
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
		'header-menu' => __('Header Menu'),
        'foo-menu' => __('Foo Menu'),
        'bar-menu' => __('Bar Menu')
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

function addPostFormatsToEvents()
{
	add_post_type_support( 'events', 'post-formats' );
}

add_action('init', 'addPostFormatsToEvents');

// Add sidebar

function registerSidebar()
{
	register_sidebar(
        array(
            'id'            => 'primary',
            'name'          => __( 'Primary Sidebar' ),
            'description'   => __( 'A short description of the sidebar.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h3 class="widget-title">',
            'after_title'   => '</h3><hr>',
        )
    );

    register_sidebar(
        array(
            'id'            => 'footer-box-one',
            'name'          => __( 'Footer Box One' ),
            'description'   => __( 'A short description of the Footer Box One.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5><hr>',
        )
    );

    register_sidebar(
        array(
            'id'            => 'footer-box-two',
            'name'          => __( 'Footer Box Two' ),
            'description'   => __( 'A short description of the Footer Box Two.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5><hr>',
        )
    );

    register_sidebar(
        array(
            'id'            => 'footer-box-three',
            'name'          => __( 'Footer Box Three' ),
            'description'   => __( 'A short description of the Footer Box Three.' ),
            'before_widget' => '<div id="%1$s" class="widget %2$s">',
            'after_widget'  => '</div>',
            'before_title'  => '<h5 class="widget-title">',
            'after_title'   => '</h5><hr>',
        )
    );
}

add_action('widgets_init', 'registerSidebar');

// end

// Extend Customizer

function extendCustomizer($wp_customize)
{
    $wp_customize->add_setting('foo_setting', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Foo default',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'foo_control',
        array(
            'label' => __('Foo label', 'example'),
            'section' => 'foo_section',
            'settings' => 'foo_setting'
        )
    ));

    $wp_customize->add_section('foo_section', array(
        'title' => __('Foo section title', 'example'),
        'description' => __('Foo section description', 'example'),
        'panel' => 'foo_panel'
    ));

    $wp_customize->add_panel('foo_panel', array(
        'title' => __('Panel title 2020', 'example'),
        'description' => __('Panel description', 'example'),
        'priority' => 160
    ));

    // Another group

    $wp_customize->add_setting('bar_setting', array(
        'type' => 'theme_mod',
        'capability' => 'edit_theme_options',
        'default' => 'Bar default value',
        'transport' => 'refresh',
    ));

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'bar_control',
        array(
            'label' => __('Bar label', 'example'),
            'section' => 'bar_section',
            'settings' => 'bar_setting'
        )
    ));

    $wp_customize->add_section('bar_section', array(
        'title' => __('Bar section title', 'example'),
        'description' => __('Bar section description', 'example'),
        'panel' => 'bar_panel'
    ));

    $wp_customize->add_panel('bar_panel', array(
        'title' => __('Panel title two 2020', 'example'),
        'description' => __('Panel two description', 'example'),
        'priority' => 180
    ));

    // Add setting and control to existing sections

    $wp_customize->add_setting('img_setting');

    $wp_customize->add_control(new WP_Customize_Upload_Control(
        $wp_customize,
        'img_control',
        array(
            'label' => __('Upload Image', 'example'),
            'section' => 'bar_section',
            'settings' => 'img_setting'
        )
    ));

    //

    $wp_customize->add_setting('baz_textarea_setting');

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'baz_textarea_control',
        array(
            'label' => __('Description'),
            'section' => 'bar_section',
            'settings' => 'baz_textarea_setting',
            'type' => 'textarea'
        )
    ));

    //

    $wp_customize->add_setting('baz_date_setting');

    $wp_customize->add_control(new WP_Customize_Control(
        $wp_customize,
        'baz_date_control',
        array(
            'label' => __('Date'),
            'section' => 'foo_section',
            'settings' => 'baz_date_setting',
            'type' => 'date'
        )
    ));

    //

    $wp_customize->add_setting('baz_color_setting');

    $wp_customize->add_control(new WP_Customize_Color_Control(
        $wp_customize,
        'baz_color_control',
        array(
            'label' => __('Color'),
            'section' => 'foo_section',
            'settings' => 'baz_color_setting',
        )
    ));

    // this disables default javascript LIVE CHANGE event //
    $wp_customize->get_setting( 'foo_setting' )->transport = 'postMessage';
    // $wp_customize->get_setting( 'bar_setting' )->transport = 'postMessage';
    // $wp_customize->get_setting( 'baz_textarea_setting' )->transport = 'postMessage';
}

add_action('customize_register', 'extendCustomizer');

// end

// wp_body_open action hook is used to print out some content that is not visible to users
function displaySomeDetails()
{
    printf("<!-- Wordpress 2020 Project Files -->");
}

add_action('wp_body_open', 'displaySomeDetails');

// Extend search results

function my_smart_search( $search, $wp_query ) 
{
    global $wpdb;
 
    if ( empty( $search ))
        return $search;
 
    $terms = $wp_query->query_vars[ 's' ];
    $exploded = explode( ' ', $terms );
    if( $exploded === FALSE || count( $exploded ) == 0 )
        $exploded = array( 0 => $terms );
         
    $search = '';
    foreach( $exploded as $tag ) {
        $search .= " AND (
            (wp_posts.post_title LIKE '%$tag%')
            OR (wp_posts.post_content LIKE '%$tag%')
            OR EXISTS
            (
                SELECT * FROM wp_comments
                WHERE comment_post_ID = wp_posts.ID
                    AND comment_content LIKE '%$tag%'
            )
            OR EXISTS
            (
                SELECT * FROM wp_terms
                INNER JOIN wp_term_taxonomy
                    ON wp_term_taxonomy.term_id = wp_terms.term_id
                INNER JOIN wp_term_relationships
                    ON wp_term_relationships.term_taxonomy_id = wp_term_taxonomy.term_taxonomy_id
                WHERE taxonomy = 'post_tag'
                    AND object_id = wp_posts.ID
                    AND wp_terms.name LIKE '%$tag%'
            )
        )";
    }
 
    return $search;
}

add_filter( 'posts_search', 'my_smart_search', 500, 2 );

function nestedComments()
{
    if ( is_single() && comments_open() && get_option( 'thread_comments' ) ) {
        wp_enqueue_script( 'comment-reply' );
    }
}

add_action('get_header', 'nestedComments');

// Display document title on Home page
function title_for_home( $title )
{
    if ( empty( $title ) && ( is_home() || is_front_page() ) ) {
        $title = __( 'Home', 'example' );
    }
    return $title;
}

add_filter( 'wp_title', 'title_for_home' );