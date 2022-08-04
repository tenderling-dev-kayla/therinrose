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

    //remove Appearrance
    remove_menu_page('themes.php');

    //remove plugin editor
    remove_menu_page('plugin-editor.php');
}

/**
 * Remove User Profile Contact Methods
 **/
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

/**
 * Remove User Profile and Create User form Additional Fields
 **/
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
		form#your-profile .yoast.yoast-settings,
		form#your-profile tr.user-comment-shortcuts-wrap,
		form#createuser table.form-table > tbody > tr:nth-of-type(5) { 
			display: none; 
		}
	</style>
	<?php echo ob_get_clean(); 
}

/* Hide sections from WordPress customizer */
function tenderling_hide_customizer_sections($wp_customize) {

	//WP Standard Panels
	$wp_customize->remove_section('static_front_page');
	$wp_customize->remove_section('background_image');
	$wp_customize->remove_section('colors');

    //Understrap
    $wp_customize->remove_section( 'understrap_theme_layout_options' );
}



/*********
 * 
 * Define custom tenderling admin display
 *
 ********/
$adminStyle = 'tenderling';
$userStyle = 'tenderling';
$currentUser = get_current_user_id();

if (current_user_can( 'manage_options' )) :
	$currentUser = get_current_user_id();
	$adminStyle = get_field('admin_style', 'user_'.$currentUser);
	$userStyle = get_field('user_style', 'user_'.$currentUser);
endif;

if($adminStyle == 'tenderling'):
	add_action('admin_menu', 'tenderling_register_custom_menu_items');
	add_action( 'customize_register', 'tenderling_hide_customizer_sections', 99);
endif;

if($userStyle == 'tenderling'):
	add_action( 'admin_head-user-edit.php', 'tenderling_update_user_fields_css' );
	add_action( 'admin_head-profile.php',   'tenderling_update_user_fields_css' );
	add_action( 'admin_head-user-new.php',  'tenderling_update_user_fields_css' );
endif;


/**
 * Change to Tenderling Branding
 **/
function tenderling_loginlogo() {
	ob_start(); ?>
	<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/inc/img/tenderling-icon-square.png" />
	<style>
		h1 a {
			background-image: url('<?php echo get_bloginfo('stylesheet_directory'); ?>/inc/img/tenderling-icon.png') !important; 
		}
	</style>
	<?php echo ob_get_clean();
}
add_action('login_head', 'tenderling_loginlogo');

function tenderling_adminfavicon() {
	ob_start(); ?>
	<link rel="Shortcut Icon" type="image/x-icon" href="<?php echo get_bloginfo('stylesheet_directory'); ?>/inc/img/tenderling-icon-square.png" />
	<?php echo ob_get_clean();
}
add_action( 'admin_head', 'tenderling_adminfavicon' );

function tenderling_footer_admin () {
	ob_start(); ?>
	<span id="footer-thankyou">Developed by <a href="http://tenderling.com" target="_blank">Tenderling</a></span>
	<?php echo ob_get_clean();
}
add_filter('admin_footer_text', 'tenderling_footer_admin');

