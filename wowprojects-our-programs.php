<?php

/**
* Plugin Name: Our Programs
* Plugin URI: http://wowdevshop.com
* Description: This plugin registers the 'product' post type, it let's you manage your companies programs.
* Author: WowDevHop
* Version: 1.0.1
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
		'taxonomies' => array('category' ),
		'exclude_from_search' => false,
		'capability_type' => 'post',
		'rewrite' => array( 'slug' => 'programs' ),
        'menu_icon' => 'dashicons-format-aside',
		)
	);
}

?>
