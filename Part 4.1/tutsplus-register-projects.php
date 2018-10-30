<?php
	/**
	Plugin Name: Tutsplus plugin to register post type
	Plugin URI: https://code.tutsplus.com
	Description: Registers the 'project' post type
	Version: 4.1
	Author: Rachel McCollin
	Author URI: https://rachelmccollin.com
	*/

/******************************************************************
function tutsplus_register_post_type() - registers our post type
*******************************************************************/
function tutsplus_register_post_type() {
	
	$labels = array(
		'name' => __( 'Projects', 'tutsplus' ),
		'singular_name' => __( 'Project', 'tutsplus' ),
		'add_new' => __( 'Add New Project', 'tutsplus' ),
		'add_new_item' => __( 'Add New Project', 'tutsplus' ),
		'edit_item' => __( 'Edit Project', 'tutsplus' ),
		'new_item' => __( 'New Project', 'tutsplus' ),
		'view_item' => __( 'View Project', 'tutsplus' ),
		'search_items' => __( 'Search Projects', 'tutsplus' ),
		'not_found' => __( 'No Projects Found', 'tutsplus' ),
		'not_found_in_trash' => __( 'No Projects Found in Trash', 'tutsplus' ),
	);
	
	$args = array(
		'labels' => $labels,
		'has_archive' =>true,
		'public' => true,
		'hierarchical' => false,
		'rewrite' => array( 'slug' => 'projects' ),
		'supports' => array(
			'title',
			'editor',
			'excerpt',
			'custom-fields',
			'thumbnail',
			'page-attributes'
		),
		'taxonomies' => array( 'post_tag', 'category' )
	);
	
	register_post_type( 'tutsplus_project', $args );
	
	
}
add_action( 'init', 'tutsplus_register_post_type' );

/****************************************************************************
Register custom taxonomy
****************************************************************************/
function tutsplus_register_taxonomy() {	
	
	// genres
	$labels = array(
		'name'              => __( 'Project Types' ),
		'singular_name'     => __( 'Project Type' ),
		'search_items'      => __( 'Search Project Types' ),
		'all_items'         => __( 'All Project Types' ),
		'edit_item'         => __( 'Edit Project Types' ),
		'update_item'       => __( 'Update Project Types' ),
		'add_new_item'      => __( 'Add New Project Types' ),
		'new_item_name'     => __( 'New Project Type Name' ),
		'menu_name'         => __( 'Project Types' ),
	);
	
	$args = array(
		'labels' => $labels,
		'hierarchical' => true,
		'sort' => true,
		'args' => array( 'orderby' => 'term_order' ),
		'rewrite' => array( 'slug' => 'project-type' ),
		'show_admin_column' => true
	);
	
	register_taxonomy( 'tutsplus_project_type', array( 'tutsplus_project' ), $args);
		
}
add_action( 'init', 'tutsplus_register_taxonomy' );