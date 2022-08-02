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

/**Cleanup user profile**/
function tenderling_update_contact_methods( $contactmethods ) {
    unset( $contactmethods['facebook'] );
    unset( $contactmethods['instagram'] );
    unset( $contactmethods['linkedin'] );
    unset( $contactmethods['myspace'] );
    unset( $contactmethods['pinterest'] );
    unset( $contactmethods['soundcloud'] );
    unset( $contactmethods['tumblr'] );
    unset( $contactmethods['twitter'] );
    unset( $contactmethods['youtube'] );
    unset( $contactmethods['wikipedia'] );

    return $contactmethods;

}
add_filter( 'user_contactmethods', 'tenderling_update_contact_methods' );

function tenderling_update_user_fields_css() {
	ob_start(); ?>
	<style>
		form#your-profile tr.user-url-wrap, 
		form#your-profile > h2:nth-of-type(4), 
		form#your-profile > h2:nth-of-type(4) + table.form-table,
		form#your-profile tr.user-rich-editing-wrap,
		form#your-profile tr.user-syntax-highlighting-wrap,
		form#your-profile tr.user-admin-color-wrap,
		form#your-profile div#application-passwords-section,
		form#your-profile .yoast.yoast-settings
		form#createuser table.form-table > tbody > tr:nth-of-type(5) { 
			display: none; 
		}
	</style>
	<?php echo ob_get_clean(); 
}
add_action( 'admin_head-user-edit.php', 'tenderling_update_user_fields_css' );
add_action( 'admin_head-profile.php',   'tenderling_update_user_fields_css' );
add_action( 'admin_head-user-new.php',  'tenderling_update_user_fields_css' );