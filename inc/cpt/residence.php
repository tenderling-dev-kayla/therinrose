<?php 

/* 
 * Residence CPT
 */

if ( ! function_exists('residence') ) {

// Register Custom Post Type
function residence() {

	$labels = array(
		'name'                  => _x( 'Residences', 'Post Type General Name', 'tenderling' ),
		'singular_name'         => _x( 'Residence', 'Post Type Singular Name', 'tenderling' ),
		'menu_name'             => __( 'Residences', 'tenderling' ),
		'name_admin_bar'        => __( 'Residence', 'tenderling' ),
		'archives'              => __( 'Residence Archives', 'tenderling' ),
		'attributes'            => __( 'Residence Attributes', 'tenderling' ),
		'parent_item_colon'     => __( 'Parent Residence:', 'tenderling' ),
		'all_items'             => __( 'All Residences', 'tenderling' ),
		'add_new_item'          => __( 'Add New Residence', 'tenderling' ),
		'add_new'               => __( 'Add New', 'tenderling' ),
		'new_item'              => __( 'New Residence', 'tenderling' ),
		'edit_item'             => __( 'Edit Residence', 'tenderling' ),
		'update_item'           => __( 'Update Residence', 'tenderling' ),
		'view_item'             => __( 'View Residence', 'tenderling' ),
		'view_items'            => __( 'View Residences', 'tenderling' ),
		'search_items'          => __( 'Search Residence', 'tenderling' ),
		'not_found'             => __( 'Not found', 'tenderling' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'tenderling' ),
		'featured_image'        => __( 'Featured Image', 'tenderling' ),
		'set_featured_image'    => __( 'Set featured image', 'tenderling' ),
		'remove_featured_image' => __( 'Remove featured image', 'tenderling' ),
		'use_featured_image'    => __( 'Use as featured image', 'tenderling' ),
		'insert_into_item'      => __( 'Insert into Residence', 'tenderling' ),
		'uploaded_to_this_item' => __( 'Uploaded to this Residence', 'tenderling' ),
		'items_list'            => __( 'Residences list', 'tenderling' ),
		'items_list_navigation' => __( 'Residences list navigation', 'tenderling' ),
		'filter_items_list'     => __( 'Filter Residences list', 'tenderling' ),
	);
	$args = array(
		'label'                 => __( 'Residence', 'tenderling' ),
		'description'           => __( 'Residences', 'tenderling' ),
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