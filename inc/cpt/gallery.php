<?php 

/**
 * Gallery CPT
 */

if ( ! function_exists('gallery') ) {

// Register Custom Post Type
function gallery() {

	$labels = array(
		'name'                  => _x( 'Galleries', 'Post Type General Name', 'understrap_child' ),
		'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'understrap_child' ),
		'menu_name'             => __( 'Galleries', 'understrap_child' ),
		'name_admin_bar'        => __( 'Gallery', 'understrap_child' ),
		'archives'              => __( 'Gallery Archives', 'understrap_child' ),
		'attributes'            => __( 'Gallery Attributes', 'understrap_child' ),
		'parent_item_colon'     => __( 'Parent Gallery:', 'understrap_child' ),
		'all_items'             => __( 'All Galleries', 'understrap_child' ),
		'add_new_item'          => __( 'Add New Gallery', 'understrap_child' ),
		'add_new'               => __( 'Add New', 'understrap_child' ),
		'new_item'              => __( 'New Gallery', 'understrap_child' ),
		'edit_item'             => __( 'Edit Gallery', 'understrap_child' ),
		'update_item'           => __( 'Update Gallery', 'understrap_child' ),
		'view_item'             => __( 'View Gallery', 'understrap_child' ),
		'view_items'            => __( 'View Galleries', 'understrap_child' ),
		'search_items'          => __( 'Search Gallery', 'understrap_child' ),
		'not_found'             => __( 'Not found', 'understrap_child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'understrap_child' ),
		'featured_image'        => __( 'Featured Image', 'understrap_child' ),
		'set_featured_image'    => __( 'Set featured image', 'understrap_child' ),
		'remove_featured_image' => __( 'Remove featured image', 'understrap_child' ),
		'use_featured_image'    => __( 'Use as featured image', 'understrap_child' ),
		'insert_into_item'      => __( 'Insert into Gallery', 'understrap_child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Gallery', 'understrap_child' ),
		'items_list'            => __( 'Galleries list', 'understrap_child' ),
		'items_list_navigation' => __( 'Galleries list navigation', 'understrap_child' ),
		'filter_items_list'     => __( 'Filter Galleries list', 'understrap_child' ),
	);
	$args = array(
		'label'                 => __( 'Gallery', 'understrap_child' ),
		'description'           => __( 'Photo Galleries', 'understrap_child' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-images-alt2',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'gallery', $args );

}
add_action( 'init', 'gallery', 0 );

}