<?php
//* Loads the parent's style sheet
add_action( 'wp_enqueue_scripts', 'enqueue_parent_styles' );

function enqueue_parent_styles() {
   wp_enqueue_style( 'parent-style', get_template_directory_uri().'/style.css' );
}



/* Custom Post Type Start */
function create_posttype() {
register_post_type( 'specials',
// CPT Options
array(
  'labels' => array(
   'name' => __( 'Specials' ),
   'singular_name' => __( 'Specials' )
  ),
  'public' => true,
  'has_archive' => false,
  'rewrite' => array('slug' => 'specials'),
 )
);
}
// Hooking up our function to theme setup
add_action( 'init', 'create_posttype' );

function cw_post_type_specials() {
$supports = array(
'title', // post title
'editor', // post content
'author', // post author
'thumbnail', // featured images
'excerpt', // post excerpt
'custom-fields', // custom fields
'comments', // post comments
'revisions', // post revisions
'post-formats', // post formats
);
$labels = array(
'name' => _x('specials', 'plural'),
'singular_name' => _x('specials', 'singular'),
'menu_name' => _x('specials', 'admin menu'),
'name_admin_bar' => _x('specials', 'admin bar'),
'add_new' => _x('Add New', 'add new'),
'add_new_item' => __('Add New specials'),
'new_item' => __('New specials'),
'edit_item' => __('Edit specials'),
'view_item' => __('View specials'),
'all_items' => __('All specials'),
'search_items' => __('Search specials'),
'not_found' => __('No specials found.'),
);
$args = array(
'supports' => $supports,
'labels' => $labels,
'public' => true,
'query_var' => true,
'rewrite' => array('slug' => 'specials'),
'has_archive' => true,
'hierarchical' => false,
);
register_post_type('specials', $args);
}
add_action('init', 'cw_post_type_specials');

/* Custom Post Type End */
