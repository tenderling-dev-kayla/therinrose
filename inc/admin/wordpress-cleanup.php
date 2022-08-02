<?php 

/**
 * Disable admin sections for non-admin users and non-tenderling admins
 */


function tenderling_register_custom_menu_items() {
	//Move Menus to top level
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




$tenderlingAdmin = true;
if (!current_user_can( 'manage_options' )) :
	$tenderlingAdmin = false;
else :
	$currentUser = get_current_user_id();
	$tenderlingAdmin = get_field('show_full_admin', 'user_'.get_current_user_id());
endif;

if(!$tenderlingAdmin):
	add_action('admin_menu', 'tenderling_register_custom_menu_items');
endif;