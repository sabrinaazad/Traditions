<?php

if (!function_exists('cardinaltheme')) :
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
    function cardinaltheme() {
        /*
         * Enable support for Post Thumbnails on posts and pages.
         *
         * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
         */
        add_theme_support('post-thumbnails');
        /*
         * Switch default core markup for search form, comment form, and comments
         * to output valid HTML5.
         */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption'
        ));

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');
        add_theme_support('custom-logo');
    }
endif;
add_action('after_setup_theme', 'cardinaltheme');


function cardinaltheme_scripts() {
    wp_register_script('jQuery', '//code.jquery.com/jquery-3.5.1.min.js', null, null, true);
    wp_enqueue_script('jQuery');

    wp_enqueue_style('font-awesome', '//use.fontawesome.com/releases/v5.14.0/css/all.css');

    wp_enqueue_style('slick-css', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css');

    wp_enqueue_style('slick-theme-css', '//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css');

    wp_enqueue_style('cardinal-styleheet', get_stylesheet_uri(), array(), rand(111, 9999));

    wp_register_script('slick-js', '//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js', null, null, true);
    wp_enqueue_script('slick-js');

    wp_register_script('waypoints-js', get_template_directory_uri() . '/scripts/jquery.waypoints.js', null, null, true);
    wp_enqueue_script('waypoints-js');

    wp_register_script('counter-js',  get_template_directory_uri() . '/scripts/jquery.counter.js', null, null, true);
    wp_enqueue_script('counter-js');

    wp_enqueue_script('cardinal-script', get_template_directory_uri() . '/scripts/main.js', array(), filemtime(get_template_directory() . '/scripts/main.js'), true);
}
add_action('wp_enqueue_scripts', 'cardinaltheme_scripts');


/* DYNAMIC CSS FOR ACF FIELDS IN CSS */
add_action( 'wp_enqueue_scripts', 'theme_custom_style_script', 11 );
function theme_custom_style_script() {
	wp_enqueue_style( 'dynamic-css', admin_url('admin-ajax.php').'?action=dynamic_css', '');
}

add_action('wp_ajax_dynamic_css', 'dynamic_css');
add_action('wp_ajax_nopriv_dynamic_css', 'dynamic_css');
function dynamic_css() {
	require( get_template_directory().'/inc/custom.css.php' );
	exit;
}


/* ENABLE SVG SUPPORT */
function upload_svg_files( $allowed ) {
    if ( !current_user_can( 'manage_options' ) )
        return $allowed;
    $allowed['svg'] = 'image/svg+xml';
    return $allowed;
}
add_filter( 'upload_mimes', 'upload_svg_files');


/* MENUS */
function register_menus() {
    register_nav_menus(
        array(
            'top-nav' => __('Top Nav'),
            'primary-nav' => __('Primary Nav'),
            'footer-nav-1' => __('Footer Nav Side'),
            'footer-nav-2' => __('Footer Nav Bottom')
        )
    );
}
add_action('init', 'register_menus');


/* THEME FEATURES */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');


/* DISABLE GUTENBERG */
add_filter('use_block_editor_for_post', '__return_false', 10);


/* PAGE TEXTAREA REMOVAL */
function remove_textarea() {
    remove_post_type_support('page', 'editor');
}
add_action('admin_init', 'remove_textarea');


/* EXCERPT LENGTH */
add_filter( 'excerpt_length', function($length) {
    return 20;
}, PHP_INT_MAX );


/* WIDGETS */
function blog_widgets_init() {
    register_sidebar(array(
        'name'          => 'Blog Sidebar',
        'id'            => 'blog-sidebar',
        'before_widget' => '<div>',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="heading">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'blog_widgets_init');


/* ADMIN FOOTER MODIFICATION */
function remove_footer_admin () {
    echo '<span id="footer-thankyou">Developed by <a href="http://www.cardinaldigitalmarketing.com" target="_blank">Cardinal Digital Marketing</a></span>';
}
add_filter('admin_footer_text', 'remove_footer_admin');


/* CUSTOM POST TYPES */
function custom_post_types() {
    register_post_type( 'services',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Services' ),
                'singular_name' => __( 'Service' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'services',
                'with_front' => false
            ),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-clipboard',
            'supports' => array( 'title', 'thumbnail', 'excerpt' )

        )
    );

    register_post_type( 'team-members',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Team Members' ),
                'singular_name' => __( 'Team Member' )
            ),
            'public' => true,
            'has_archive' => true,
            'with_front' => false,
            'rewrite' => array(
                'slug' => 'team-members',
                'with_front' => false,
            ),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-businessperson',
            'supports' => array( 'title', 'thumbnail', 'excerpt' )

        )
    );

    register_post_type( 'locations',
    // CPT Options
        array(
            'labels' => array(
                'name' => __( 'Locations' ),
                'singular_name' => __( 'Location' )
            ),
            'public' => true,
            'has_archive' => true,
            'rewrite' => array(
                'slug' => 'locations',
                'with_front' => false,
            ),
            'show_in_rest' => true,
            'menu_icon' => 'dashicons-location',
            'supports' => array( 'title', 'thumbnail', 'excerpt' )

        )
    );
}
add_action( 'init', 'custom_post_types' );


/* LOCATIONS STATE TAXONOMY */
add_action( 'init', 'states_taxonomy', 0 );
 
function states_taxonomy() {
  $labels = array(
    'name' => _x( 'States', 'taxonomy general name' ),
    'singular_name' => _x( 'State', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search State' ),
    'all_items' => __( 'All States' ),
    'parent_item' => __( 'Parent State' ),
    'parent_item_colon' => __( 'Parent State:' ),
    'edit_item' => __( 'Edit State' ), 
    'update_item' => __( 'Update State' ),
    'add_new_item' => __( 'Add New State' ),
    'new_item_name' => __( 'New State Name' ),
    'menu_name' => __( 'Assign State' ),
  ); 	
  register_taxonomy('state',array('locations'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'state' ),
  ));
}
/* Display a custom taxonomy dropdown in admin */
add_action('restrict_manage_posts', 'state_taxonomy_filter');
function state_taxonomy_filter() {
	global $typenow;
	$post_type = 'locations'; // change to your post type
	$taxonomy  = 'state'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf( __( 'Show all %s', 'textdomain' ), $info_taxonomy->label ),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
/* Filter posts by taxonomy in admin */
add_filter('parse_query', 'state_convert_id_to_term_in_query');
function state_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'locations'; // change to your post type
	$taxonomy  = 'state'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}


/* LOCATIONS SERVICE TYPE TAXONOMY */
add_action( 'init', 'locations_service_type_taxonomy', 0 );
 
function locations_service_type_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Service Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Service Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Service Types' ),
    'all_items' => __( 'All Service Types' ),
    'parent_item' => __( 'Parent Service Type' ),
    'parent_item_colon' => __( 'Parent Service Type:' ),
    'edit_item' => __( 'Edit Service Type' ), 
    'update_item' => __( 'Update Service Type' ),
    'add_new_item' => __( 'Add New Service Type' ),
    'new_item_name' => __( 'New Service Type Name' ),
    'menu_name' => __( 'Assign Service Types' ),
  ); 	
 
  register_taxonomy('locations-service-types',array('locations'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'locations-service-type' ),
  ));
}
/* DISPLAY A CUSTOM POST TAXONOMY DROPDOWN IN ADMIN */
add_action('restrict_manage_posts', 'locations_service_types_taxonomy_filter');
function locations_service_types_taxonomy_filter() {
	global $typenow;
	$post_type = 'locations'; // change to your post type
	$taxonomy  = 'locations-service-types'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf( __( 'Show all %s', 'textdomain' ), $info_taxonomy->label ),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
/* FILTER POSTS BY TAXONOMY IN ADMIN */
add_filter('parse_query', 'locations_service_types_convert_id_to_term_in_query');
function locations_service_types_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'locations'; // change to your post type
	$taxonomy  = 'locations-service-types'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}


/* SERVICE TYPE TAXONOMY */
add_action( 'init', 'service_type_taxonomy', 0 );
 
function service_type_taxonomy() {
 
  $labels = array(
    'name' => _x( 'Service Types', 'taxonomy general name' ),
    'singular_name' => _x( 'Service Type', 'taxonomy singular name' ),
    'search_items' =>  __( 'Search Service Types' ),
    'all_items' => __( 'All Service Types' ),
    'parent_item' => __( 'Parent Service Type' ),
    'parent_item_colon' => __( 'Parent Service Type:' ),
    'edit_item' => __( 'Edit Service Type' ), 
    'update_item' => __( 'Update Service Type' ),
    'add_new_item' => __( 'Add New Service Type' ),
    'new_item_name' => __( 'New Service Type Name' ),
    'menu_name' => __( 'Assign Service Types' ),
  ); 	
 
  register_taxonomy('service-types',array('services'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'service-type' ),
  ));
}
/* DISPLAY A CUSTOM POST TAXONOMY DROPDOWN IN ADMIN */
add_action('restrict_manage_posts', 'service_types_taxonomy_filter');
function service_types_taxonomy_filter() {
	global $typenow;
	$post_type = 'services'; // change to your post type
	$taxonomy  = 'service-types'; // change to your taxonomy
	if ($typenow == $post_type) {
		$selected      = isset($_GET[$taxonomy]) ? $_GET[$taxonomy] : '';
		$info_taxonomy = get_taxonomy($taxonomy);
		wp_dropdown_categories(array(
			'show_option_all' => sprintf( __( 'Show all %s', 'textdomain' ), $info_taxonomy->label ),
			'taxonomy'        => $taxonomy,
			'name'            => $taxonomy,
			'orderby'         => 'name',
			'selected'        => $selected,
			'show_count'      => true,
			'hide_empty'      => true,
		));
	};
}
/* FILTER POSTS BY TAXONOMY IN ADMIN */
add_filter('parse_query', 'service_types_convert_id_to_term_in_query');
function service_types_convert_id_to_term_in_query($query) {
	global $pagenow;
	$post_type = 'services'; // change to your post type
	$taxonomy  = 'service-types'; // change to your taxonomy
	$q_vars    = &$query->query_vars;
	if ( $pagenow == 'edit.php' && isset($q_vars['post_type']) && $q_vars['post_type'] == $post_type && isset($q_vars[$taxonomy]) && is_numeric($q_vars[$taxonomy]) && $q_vars[$taxonomy] != 0 ) {
		$term = get_term_by('id', $q_vars[$taxonomy], $taxonomy);
		$q_vars[$taxonomy] = $term->slug;
	}
}


/* THEMES OPTIONS */
if( function_exists('acf_add_options_page') ) {
	
	acf_add_options_page(array(
		'page_title' 	=> 'General Settings',
		'menu_title'	=> 'General Settings',
		'menu_slug' 	=> 'general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
	
}
$my_excerpt = wp_strip_all_tags( get_the_excerpt(), true );


function wpshock_search_filter( $query ) {
    if ( $query->is_search ) {
        $query->set( 'post_type', array('post','page') );
    }
    return $query;
}
add_filter('pre_get_posts','wpshock_search_filter');