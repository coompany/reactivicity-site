<?php
/* Bones Custom Post Type Example
This page walks you through creating 
a custom post type and taxonomies. You
can edit this one or copy the following code 
to create another one. 

I put this in a separate file so as to 
keep it organized. I find it easier to edit
and change things if they are concentrated
in their own file.

Developed by: Eddie Machado
URL: http://themble.com/bones/
*/

// Flush rewrite rules for custom post types
add_action( 'after_switch_theme', 'bones_flush_rewrite_rules' );

// Flush your rewrite rules
function bones_flush_rewrite_rules() {
	flush_rewrite_rules();
}

register_post_type( 'workshop', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array( 'labels' => array(
        'name' => __( 'Workshops', 'bonestheme' ), /* This is the Title of the Group */
        'singular_name' => __( 'Workshop', 'bonestheme' ), /* This is the individual type */
        'all_items' => __( 'All Workshops', 'bonestheme' ), /* the all items menu item */
        'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
        'add_new_item' => __( 'Add New Workshop', 'bonestheme' ), /* Add New Display Title */
        'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
        'edit_item' => __( 'Edit Workshops', 'bonestheme' ), /* Edit Display Title */
        'new_item' => __( 'New Workshop', 'bonestheme' ), /* New Display Title */
        'view_item' => __( 'View Workshop', 'bonestheme' ), /* View Display Title */
        'search_items' => __( 'Search Workshop', 'bonestheme' ), /* Search Custom Type Title */
        'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */
        'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
        'parent_item_colon' => ''
    ), /* end of arrays */
        'description' => __( 'Workshop', 'bonestheme' ), /* Custom Type Description */
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        //'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
        //'menu_icon' => get_template_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
        'menu_icon' => 'dashicons-location',
        'rewrite'	=> array( 'slug' => 'workshops', 'with_front' => false ), /* you can specify its url slug */
        'has_archive' => 'workshops', /* you can rename the slug here */
        'capability_type' => 'post',
        'hierarchical' => false,
        /* the next one is important, it tells what's enabled in the post editor */
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'excerpt', 'trackbacks', 'comments', 'revisions', 'sticky', 'page-attributes')
    ) /* end of options */
); /* end of register post type */

//wp_create_category('News');
if (file_exists (ABSPATH.'/wp-admin/includes/taxonomy.php')) {
    require_once (ABSPATH.'/wp-admin/includes/taxonomy.php');
    if ( ! get_cat_ID( 'News' ) ) {
        wp_create_category( 'News' );
    }
    wp_insert_term('Homepage', 'post_tag');
}

register_post_type( 'docenti', /* (http://codex.wordpress.org/Function_Reference/register_post_type) */
    // let's now add all the options for this post type
    array( 'labels' => array(
        'name' => __( 'Docenti', 'bonestheme' ), /* This is the Title of the Group */
        'singular_name' => __( 'Docente', 'bonestheme' ), /* This is the individual type */
        'all_items' => __( 'All Docenti', 'bonestheme' ), /* the all items menu item */
        'add_new' => __( 'Add New', 'bonestheme' ), /* The add new menu item */
        'add_new_item' => __( 'Add New Docente', 'bonestheme' ), /* Add New Display Title */
        'edit' => __( 'Edit', 'bonestheme' ), /* Edit Dialog */
        'edit_item' => __( 'Edit Docenti', 'bonestheme' ), /* Edit Display Title */
        'new_item' => __( 'New Docente', 'bonestheme' ), /* New Display Title */
        'view_item' => __( 'View Docente', 'bonestheme' ), /* View Display Title */
        'search_items' => __( 'Search Docente', 'bonestheme' ), /* Search Custom Type Title */
        'not_found' =>  __( 'Nothing found in the Database.', 'bonestheme' ), /* This displays if there are no entries yet */
        'not_found_in_trash' => __( 'Nothing found in Trash', 'bonestheme' ), /* This displays if there is nothing in the trash */
        'parent_item_colon' => ''
    ), /* end of arrays */
        'description' => __( 'Docenti', 'bonestheme' ), /* Custom Type Description */
        'public' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'show_ui' => true,
        'query_var' => true,
        //'menu_position' => 8, /* this is what order you want it to appear in on the left hand side menu */
        //'menu_icon' => get_template_directory_uri() . '/library/images/custom-post-icon.png', /* the icon for the custom post type menu */
        'menu_icon' => 'dashicons-admin-users',
        'rewrite'	=> array( 'slug' => 'docenti', 'with_front' => false ), /* you can specify its url slug */
        'has_archive' => 'docenti', /* you can rename the slug here */
        'capability_type' => 'post',
        'hierarchical' => false,
        /* the next one is important, it tells what's enabled in the post editor */
        'supports' => array( 'title', 'editor', 'author', 'thumbnail', 'trackbacks', 'revisions', 'sticky', 'page-attributes')
    ) /* end of options */
); /* end of register post type */

?>
