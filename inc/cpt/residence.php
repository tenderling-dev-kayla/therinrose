<?php 

/* 
 * Residence CPT
 */

if ( ! function_exists('residence') ) {

// Register Custom Post Type
function residence() {

	$labels = array(
		'name'                  => _x( 'Residences', 'Post Type General Name', 'understrap_child' ),
		'singular_name'         => _x( 'Residence', 'Post Type Singular Name', 'understrap_child' ),
		'menu_name'             => __( 'Residences', 'understrap_child' ),
		'name_admin_bar'        => __( 'Residence', 'understrap_child' ),
		'archives'              => __( 'Residence Archives', 'understrap_child' ),
		'attributes'            => __( 'Residence Attributes', 'understrap_child' ),
		'parent_item_colon'     => __( 'Parent Residence:', 'understrap_child' ),
		'all_items'             => __( 'All Residences', 'understrap_child' ),
		'add_new_item'          => __( 'Add New Residence', 'understrap_child' ),
		'add_new'               => __( 'Add New', 'understrap_child' ),
		'new_item'              => __( 'New Residence', 'understrap_child' ),
		'edit_item'             => __( 'Edit Residence', 'understrap_child' ),
		'update_item'           => __( 'Update Residence', 'understrap_child' ),
		'view_item'             => __( 'View Residence', 'understrap_child' ),
		'view_items'            => __( 'View Residences', 'understrap_child' ),
		'search_items'          => __( 'Search Residence', 'understrap_child' ),
		'not_found'             => __( 'Not found', 'understrap_child' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'understrap_child' ),
		'featured_image'        => __( 'Featured Image', 'understrap_child' ),
		'set_featured_image'    => __( 'Set featured image', 'understrap_child' ),
		'remove_featured_image' => __( 'Remove featured image', 'understrap_child' ),
		'use_featured_image'    => __( 'Use as featured image', 'understrap_child' ),
		'insert_into_item'      => __( 'Insert into Residence', 'understrap_child' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Residence', 'understrap_child' ),
		'items_list'            => __( 'Residences list', 'understrap_child' ),
		'items_list_navigation' => __( 'Residences list navigation', 'understrap_child' ),
		'filter_items_list'     => __( 'Filter Residences list', 'understrap_child' ),
	);
	$args = array(
		'label'                 => __( 'Residence', 'understrap_child' ),
		'description'           => __( 'Residences', 'understrap_child' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'revisions' ),
		'taxonomies'            => array( 'category', 'post_tag' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 20,
		'menu_icon'             => 'dashicons-building',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
	);
	register_post_type( 'residence', $args );

}
add_action( 'init', 'residence', 0 );

}