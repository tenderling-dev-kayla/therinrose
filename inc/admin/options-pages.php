<?php 

/**
 * add theme options pages
 **/
if( function_exists('acf_add_options_page') ) {

    // Register main options page.
    $theme_settings_page = acf_add_options_page(array(
        'page_title'    => __('Site Options'),
        'menu_title'    => __('Site Options'),
        'menu_slug'     => 'theme-site-options',
        'capability'    => 'edit_posts',
        'redirect'      => true,
        'position' 		=> '5',
        'icon_url' 		=> 'dashicons-layout',
    ));
    // Add Authorization page.
    $modals_settings_page = acf_add_options_page(array(
        'page_title'  => __('General Settings'),
        'menu_title'  => __('General'),
        'parent_slug' => $theme_settings_page['menu_slug'],
        'menu_slug'	  => 'theme-general'
    ));
    // Add header page.
    $modals_settings_page = acf_add_options_page(array(
        'page_title'  => __('Header Settings'),
        'menu_title'  => __('Header'),
        'parent_slug' => $theme_settings_page['menu_slug'],
        'menu_slug'	  => 'theme-header'
    ));
    // Add footer page.
    $modals_settings_page = acf_add_options_page(array(
        'page_title'  => __('Footer Settings'),
        'menu_title'  => __('Footer'),
        'parent_slug' => $theme_settings_page['menu_slug'],
        'menu_slug'	  => 'theme-footer'
    ));
    // Add archive settings pages to each post type.
    $gallery_archive = acf_add_options_page(array(
        'page_title'  => __('Galleries Archive Settings'),
        'menu_title'  => __('Galleries Archive'),
        'parent_slug' => 'edit.php?post_type=gallery',
        'menu_slug'   => 'gallery-archive-options',
    ));
    $residence_archive = acf_add_options_page(array(
        'page_title'  => __('Residences Archive Settings'),
        'menu_title'  => __('Residences Archive'),
        'parent_slug' => 'edit.php?post_type=residence',
        'menu_slug'   => 'residence-archive-options',
    ));
}
