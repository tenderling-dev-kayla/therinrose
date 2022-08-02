<?php 

/**
 * Disable admin sections for non-admin users and non-tenderling admins
 */


function tenderling_register_custom_menu_items() {
	 
	//Add Menus to top level
    add_menu_page(
        'Navigation',			//Title
        'Navigation', 			//Menu Title
        'edit_pages',			//Capability
        'nav-menus.php', 		//Slug
        '', 			 		//Callback
        'dashicons-menu-alt2', 	//Icon
        26 				 		//Position
    );
}

$adminStyle = 'tenderling';

if (current_user_can( 'manage_options' )) :
	$currentUser = get_current_user_id();
	$adminStyleSetting = get_field('admin_style', 'user_'.$currentUser);
	if($adminStyleSetting == 'wp') :
		$adminStyle = 'wp';
	endif;
endif;

if($adminStyle == 'tenderling'):
	add_action('admin_menu', 'tenderling_register_custom_menu_items');
endif;