<?php

/**
* Plugin Name: Our Programs
* Plugin URI: http://wowdevshop.com
* Description: This plugin registers the 'program' post type, it let's you manage your companies programs.
* Author: XicoOfficial
* Version: 1.0.0
* License: GPLv2
* Author URI: http://wowdevshop.com
* Text Domain: our-programs-by-wowdevshop
*
* @package WordPress
* @subpackage WowDevShop_Our_Programs
* @author XicoOfficial
* @since 1.0.0
*/

add_action( 'init', 'wpmudev_create_post_type' );

// register custom post type to work with
function wpmudev_create_post_type() {
	// set up labels
	$labels = array(
 		'name' => 'Programs',
    	'singular_name' => 'Program',
    	'add_new' => 'Add New Program',
    	'add_new_item' => 'Add New Program',
    	'edit_item' => 'Edit Program',
    	'new_item' => 'New Program',
    	'all_items' => 'All Programs',
    	'view_item' => 'View Program',
    	'search_items' => 'Search Programs',
    	'not_found' =>  'No Program Found',
    	'not_found_in_trash' => 'No Program found in Trash',
    	'parent_item_colon' => '',
    	'menu_name' => 'Programs',
    );
    //register post type
	register_post_type( 'program', array(
		'labels' => $labels,
		'has_archive' => true,
 		'public' => true,
		'supports' => array( 'title', 'editor', 'excerpt', 'custom-fields', 'thumbnail','page-attributes' ),
		'taxonomies' => array('program-category' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'programs' ),
        'menu_icon' => 'dashicons-format-aside',
        'menu_position' => 6
		)
	);
}



// hook into the init action and call create_book_taxonomies when it fires
add_action( 'init', 'create_program_taxonomies', 0 );


// Create own taxonomies for the opst type "program"
function create_program_taxonomies() {
    //Add new taxonomi, make it hierarchical (like categories)
    $labels = array(
        'name'              => _x( 'Program Categories', 'taxonomy general name' ),
        'singular_name'     => _x( 'Program Category', 'taxonomy singular name' ),
        'search_items'      => __( 'Search Categories' ),
        'all_items'         => __( 'All Categories' ),
        'parent_item'       => __( 'Parent Category' ),
        'parent_item_colon' => __( 'Parent Category:' ),
        'edit_item'         => __( 'Edit Category' ),
        'update_item'       => __( 'Update Category' ),
        'add_new_item'      => __( 'Add New Category' ),
        'new_item_name'     => __( 'New Category Name' ),
        'menu_name'         => __( 'Program Category' ),
    );


    $args = array(
        'hierarchical'      => true,
        'labels'            => $labels,
        'show_ui'           => true,
        'show_admin_column' => true,
        'query_var'         => true,
        'rewrite'           => array( 'slug' => 'program-category' ),
    );

    register_taxonomy( 'program-category', array( 'program' ), $args );
}

?>
