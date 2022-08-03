<?php
/**
 * Disable Category and Tax Taxonomies
 */
add_action('init', 'tenderling_remove_default_taxonomies');
function wpsnipp_remove_default_taxonomies(){
  global $wp_taxonomies;
  unregister_taxonomy_for_object_type( 'category', 'post' );
  unregister_taxonomy_for_object_type( 'post_tag', 'post' );
  if ( taxonomy_exists( 'category'))
    unset( $wp_taxonomies['category']);
  if ( taxonomy_exists( 'post_tag'))
    unset( $wp_taxonomies['post_tag']);
  unregister_taxonomy('category');
  unregister_taxonomy('post_tag');
}


/**
 * Remove posts from menu options
 */
//add_filter('register_post_type_args', 'tenderling_remove_posts_from_nav_menus', 20, 2);
function tenderling_remove_posts_from_nav_menus($args, $post_type) {
    if($post_type == 'post') {
        $args['show_in_nav_menus'] => false;
    }
    return $args;
}





/*
Extended from WP Disable Posts by Tony Kwon
*/

class WP_Disable_Posts {

  public function __construct() {

    global $pagenow;

    /* checks the request and redirects to the dashboard */
    add_action( 'init', array( __CLASS__, 'disallow_post_type_post') );

    /* removes Post Type `Post` related menus from the sidebar menu */
    add_action( 'admin_menu', array( __CLASS__, 'remove_post_type_post' ) );

    if ( !is_admin() && ($pagenow != 'wp-login.php') ) {

      /* need to return a 404 when post_type `post` objects are found */
      add_action( 'posts_results', array( __CLASS__, 'check_post_type' ) );

      /* do not return any instances of post_type `post` */
      add_filter( 'pre_get_posts', array( __CLASS__, 'remove_from_search_filter' ) );

    }

  }

  /**
   * checks the request and redirects to the dashboard
   * if the user attempts to access any `post` related links
   *
   * @access public
   * @param none
   * @return void
   */

  public static function disallow_post_type_post() {

    global $pagenow, $wp;

    switch( $pagenow ) {
      case 'edit.php':
      case 'edit-tags.php':
      case 'post-new.php':

        if ( !array_key_exists('post_type', $_GET) && !array_key_exists('taxonomy', $_GET) && !$_POST ) {
          wp_safe_redirect( get_admin_url(), 301 );
          exit;
        }

        break;
    }
  }

  /**
   * loops through $menu and $submenu global arrays to remove any `post` related menus and submenu items
   *
   * @access public
   * @param none
   * @return void
   *
   */

  public static function remove_post_type_post() {

    global $menu, $submenu;

    $done = false;

    foreach( $menu as $k => $v ) {
      foreach($v as $key => $val) {
        switch($val) {
          case 'Posts':
            unset($menu[$k]);
            $done = true;
            break;
        }
      }

      /* bail out as soon as we are done */
      if ( $done ) {
        break;
      }
    }

    $done = false;

    foreach( $submenu as $k => $v ) {
      switch($k) {
        case 'edit.php':
          unset($submenu[$k]);
          $done = true;
          break;
      }

      /* bail out as soon as we are done */
      if ( $done ) {
        break;
      }
    }
  }

  /**
   * checks the SQL statement to see if we are trying to fetch post_type `post`
   *
   * @access public
   * @param array $posts,  found posts based on supplied SQL Query ($wp_query->request)
   * @return array $posts, found posts
   */

  public static function check_post_type( $posts = array() ) {

    global $wp_query;
    $look_for = "wp_posts.post_type = 'post'";
    $instance = strpos( $wp_query->request, $look_for );

    if ( $instance !== false ) {
      $posts = array(); // we are querying for post type `post`
    }

    return $posts;
  }

  /**
   * excludes post type `post` to be returned from search
   *
   * @access public
   * @param null
   * @return object $query, wp_query object
   */

  public static function remove_from_search_filter( $query ) {

    if ( !is_search() ) {
      return $query;
    }

    $post_types = get_post_types();

    if ( array_key_exists('post', $post_types) ) {
      /* exclude post_type `post` from the query results */
      unset( $post_types['post'] );
    }

    $query->set( 'post_type', array_values($post_types) );

    return $query;
  }
}

//new WP_Disable_Posts;



