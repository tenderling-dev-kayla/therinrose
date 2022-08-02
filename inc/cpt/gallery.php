<?php 

/**
 * Gallery CPT
 */

if ( ! function_exists('gallery') ) {

// Register Custom Post Type
function gallery() {

	$labels = array(
		'name'                  => _x( 'Galleries', 'Post Type General Name', 'tenderling' ),
		'singular_name'         => _x( 'Gallery', 'Post Type Singular Name', 'tenderling' ),
		'menu_name'             => __( 'Galleries', 'tenderling' ),
		'name_admin_bar'        => __( 'Gallery', 'tenderling' ),
		'archives'              => __( 'Gallery Archives', 'tenderling' ),
		'attributes'            => __( 'Gallery Attributes', 'tenderling' ),
		'parent_item_colon'     => __( 'Parent Gallery:', 'tenderling' ),
		'all_items'             => __( 'All Galleries', 'tenderling' ),
		'add_new_item'          => __( 'Add New Gallery', 'tenderling' ),
		'add_new'               => __( 'Add New', 'tenderling' ),
		'new_item'              => __( 'New Gallery', 'tenderling' ),
		'edit_item'             => __( 'Edit Gallery', 'tenderling' ),
		'update_item'           => __( 'Update Gallery', 'tenderling' ),
		'view_item'             => __( 'View Gallery', 'tenderling' ),
		'view_items'            => __( 'View Galleries', 'tenderling' ),
		'search_items'          => __( 'Search Gallery', 'tenderling' ),
		'not_found'             => __( 'Not found', 'tenderling' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'tenderling' ),
		'featured_image'        => __( 'Featured Image', 'tenderling' ),
		'set_featured_image'    => __( 'Set featured image', 'tenderling' ),
		'remove_featured_image' => __( 'Remove featured image', 'tenderling' ),
		'use_featured_image'    => __( 'Use as featured image', 'tenderling' ),
		'insert_into_item'      => __( 'Insert into Gallery', 'tenderling' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Gallery', 'tenderling' ),
		'items_list'            => __( 'Galleries list', 'tenderling' ),
		'items_list_navigation' => __( 'Galleries list navigation', 'tenderling' ),
		'filter_items_list'     => __( 'Filter Galleries list', 'tenderling' ),
	);
	$args = array(
		'label'                 => __( 'Gallery', 'tenderling' ),
		'description'           => __( 'Photo Galleries', 'tenderling' ),
		'labels'                => $labels,
		'supports'              => array( 'title'),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
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