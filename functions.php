<?php
/**
 * Tenderling Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme = wp_get_theme();

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $the_theme->get( 'Version' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $the_theme->get( 'Version' ), true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'tenderling', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */
function understrap_default_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );


/**
 * Add PUC for updates
 */
function tenderling_add_puc() {
	require 'inc/plugin-update-checker/plugin-update-checker.php';
	$repo = 'therinrose';
	$myUpdateChecker = Puc_v4_Factory::buildUpdateChecker(
		'https://github.com/tenderling-dev-kayla/therinrose/',
		__FILE__,
		$repo
	);

	//Set authentication
	$myUpdateChecker->setAuthentication(get_field('theme_','option'));

	//Set the branch that contains the stable release.
	$myUpdateChecker->setBranch('main');
}
tenderling_add_puc();

/**
 * Add Disable Posts
 **/
include "inc/disable-posts.php";


/**
* Remove page templates inherited from the parent theme.
*
* @param array $page_templates List of currently active page templates.
*
* @return array Modified list of page templates.
*/
add_filter( 'theme_page_templates', 'tenderling_remove_page_template' );
function tenderling_remove_page_template( $page_templates ) {
	unset( $page_templates['page-templates/blank.php'] );
	unset( $page_templates['page-templates/both-sidebarspage.php'] );
	unset( $page_templates['page-templates/empty.php'] );
	unset( $page_templates['page-templates/fullwidthpage.php'] );
	unset( $page_templates['page-templates/left-sidebarspage.php'] );
	unset( $page_templates['page-templates/right-sidebarspage.php'] );

	return $page_templates;
}


/**
 * Require Folder Loop
 **/
function tenderling_require_folder($folder) {
    foreach (glob(get_stylesheet_directory().'/'.$folder.'/*.php') as $function) {
        $function = basename($function);
        require get_stylesheet_directory().'/'.$folder.'/'.$function;
    }
}

/**
 * include CPT folder
 **/
tenderling_require_folder('inc/cpt');


/**
 * add theme options pages
 **/
if( function_exists('acf_add_options_page') ) {

    // Register options page.
    $option_page = acf_add_options_page(array(
        'page_title'    => __('Site Options'),
        'menu_title'    => __('Site Options'),
        'menu_slug'     => 'theme-site-options',
        'capability'    => 'edit_posts',
        'redirect'      => false,
        'position' 		=> '5',
        'icon_url' 		=> 'dashicons-layout',
    ));
}