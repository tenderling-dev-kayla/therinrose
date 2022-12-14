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

	//Add Font Awesome
	wp_enqueue_script( 'fontawsome-js', '//kit.fontawesome.com/5da03cc087.js', null, null, true);

	//Add Montserrat
	wp_enqueue_style('gfonts-css', '//fonts.googleapis.com/css2?family=Montserrat:wght@100;200;300;400;500;600;700&display=swap', false);

	//Add Google Maps
	$google_key = get_field('theme_google_key', 'option');
	wp_enqueue_script('gmaps-js', '//maps.googleapis.com/maps/api/js?key='.$google_key.'&callback=initMap&v=weekly' , array(), $the_theme->get( 'Version' ), true);

	//Add animate.css library
	wp_enqueue_style('animate-css', '//cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css', false);


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
 * Overrides the theme_mod to custom defaults
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @param string $current_mod The current value of the theme_mod.
 * @return string
 */

//bootstrap version
function tenderling_bootstrap_version( $current_mod ) {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'tenderling_bootstrap_version', 20 );

//navbar setting
function tenderling_navbar_type( $current_mod ) {
	return 'rinrose';
}
add_filter( 'theme_mod_understrap_navbar_type', 'tenderling_navbar_type', 20 );



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
	unset( $page_templates['page-templates/left-sidebarpage.php'] );
	unset( $page_templates['page-templates/right-sidebarpage.php'] );

	return $page_templates;
}

/**
 * Remove sidebars inherited from the parent theme
 **/
function tenderling_unregister_sidebars() {
	unregister_sidebar('right-sidebar');
	unregister_sidebar('left-sidebar');
	unregister_sidebar('hero');
	unregister_sidebar('herocanvas');
	unregister_sidebar('statichero');
	unregister_sidebar('footerfull');
}
add_action( 'widgets_init', 'tenderling_unregister_sidebars', 11 );


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
 * include CPT folder for custom post type setup
 **/
tenderling_require_folder('inc/cpt');

/**
 * include Admin folder for Tenderling admin cleanup 
 **/
tenderling_require_folder('inc/admin');

/**
 * include Fields folder for ACF metabox fields 
 **/
tenderling_require_folder('inc/fields');


/**
 * Register Nav Menus
 **/
function tenderling_register_nav_menus(){
    register_nav_menus( array(
        'footer_links'  => __( 'Footer Links', 'text_domain' ),
        'footer_legal'  => __( 'Footer Legal', 'text_domain' ),
    ) );
}
add_action( 'after_setup_theme', 'tenderling_register_nav_menus', 0 );


/**
 * Add Menu LI class option
 **/
function tenderling_additional_class_menu_li($classes, $item, $args) {
    if(isset($args->add_li_class)) {
        $classes[] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'tenderling_additional_class_menu_li', 1, 3);

/**
 * Add Menu A class option
 **/
function tenderling_add_menu_link_class( $atts, $item, $args ) {
	$classes = $atts['class'];
	if (property_exists($args, 'link_class')) {
    	$atts['class'] = $classes.' '.$args->link_class;
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'tenderling_add_menu_link_class', 1, 3 );

/**
 * Add aria label to new tab links in menus
 **/
function tenderling_add_menu_aria_label( $atts, $item, $args ) {
	if($item->target == '_blank') {
		$atts['aria-label'] = $item->title.' (Opens a new window)';
	}
	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'tenderling_add_menu_aria_label', 1, 3 );

/**Add Body Class to Homepage**/
add_filter( 'body_class','tenderling_body_classes' );
function tenderling_body_classes( $classes ) {
    if ( is_front_page() ) {
        $classes[] = 'rinrose_home rinrose_fresh_home';
    }
    return $classes;
}

/**Order Galleries oldest first**/
function rinrose_archive_order( $query ) {
    if ( is_post_type_archive( 'gallery' ) ) {
        $query->set( 'order', 'ASC' );
    }
}
add_filter( 'pre_get_posts', 'rinrose_archive_order' );


/**Add Image Sizes**/
add_image_size('4K', 4096, 4096);
add_image_size('2K', 2560, 2560);
add_image_size('FHD', 1920, 1920);
add_image_size('HD', 1280, 1280);
add_image_size('SD', 896, 896);
add_image_size('XS', 640, 640);

/**modify WP Image scaling**/
function mynamespace_big_image_size_threshold( $threshold ) {
	return 4096; // new threshold
}
add_filter('big_image_size_threshold', 'mynamespace_big_image_size_threshold', 999, 1);

/**Remove srcset max image width**/
function remove_max_srcset_image_width( $max_width ) {
    return false;
}
add_filter( 'max_srcset_image_width', 'remove_max_srcset_image_width' );

/**function to display image with custom class and srcset**/
function rinrose_get_image($attachment_id, $args = []) {
	$class = (empty($args['class'])) ? 'img-fluid' : 'img-fluid '.$args['class'];
	$size = (empty($args['size'])) ? '4K' : $args['size'];
	$src = wp_get_attachment_image_url($attachment_id, $size);
	$srcset = wp_get_attachment_image_srcset($attachment_id, '4K');
	$meta = wp_get_attachment_metadata($attachment_id);
	$sizes = wp_get_attachment_image_sizes($attachment_id, $size, $meta);


	ob_start(); ?>
	<img src="<?php echo esc_url( $src ); ?>"
     srcset="<?php echo esc_attr( $srcset ); ?>"
     sizes="<?php echo esc_attr( $sizes ); ?>" alt="Foo Bar">

     <?php $return = ob_get_clean();
     return $srcset;
}


/**Create ADA Compliant Link or Button**/
function get_rinrose_btn_link($args = array()) { 
	$href = $label = $target = $id = $class = $data = '';
	extract($args);
	$alt = false;
	if($target == '_blank'):
		if(is_array($label)):
			$alt = $label['text'].' (Opens a new window)';
		else:
			$alt = $label.' (Opens a new window)';
		endif;
	endif;

	ob_start(); ?>

	<a role="button" 
	  href="<?php echo $href; ?>" 
	  target="<?php echo $target; ?>" 
	  class="<?php echo $class; ?>" 
	  id="<?php echo $id; ?>" 
	  <?php echo ($alt) ? 'aria-label="'.$alt.'"' : ''; ?>
	>
		<?php echo (is_array($label)) ? $label['html'] : $label; ?>
	</a>

	<?php return ob_get_clean();
}
function the_rinrose_btn_link($args = array()) {
	echo get_rinrose_btn_link($args);
}

/** Preload Background Images **/
function rinrose_img_atts($attachment_id) {
	$upload_dir = wp_upload_dir();
	$attachment_metadata = wp_get_attachment_metadata( $attachment_id );
	$image = [
		'href' => wp_get_attachment_image_url($attachment_id, '4K'),
		'srcset' => wp_get_attachment_image_srcset($attachment_id, '4K'),
		'sizes' => wp_get_attachment_image_sizes($attachment_id, '4K'),
		'meta' => wp_get_attachment_metadata($attachment_id),
		'upload' => $upload_dir['url'] . '/',
	];
	return (object) $image;
}
function rinrose_preload_images($imgs) {
	$return = '';
	if(is_array($imgs)) :
		ob_start();
		foreach($imgs as $i):
			$img = rinrose_img_atts($i);
			echo '<link rel="preload" as="image" href="'.$img->href.'" imagesrcset="'.$img->srcset.'" imagesizes="'.$img->sizes.'">
';
		endforeach;
		$return = ob_get_clean();
	elseif($imgs) :
		$img = rinrose_img_atts($imgs);
		$return = '<link rel="preload" as="image" href="'.$img->href.'" imagesrcset="'.$img->srcset.'" imagesizes="'.$img->sizes.'">';
	endif;
	return $return;
}
function rinrose_preload() {
	$images = [];
	$imgs = [];
	$cssVars = '';
	if(basename(get_page_template()) == 'home.php'):
		$images = [
	        'poster' => [
	        	'file' => get_field('splash_poster'),
	        	'css' => 'rinrose_home-splash_mask',
	        ],
	        'banner' => [
	        	'file' => get_field('amenities_banner'),
	        	'css' => 'rinrose_home-amenities_banner',
	        ],
	        'leftImg' => [
	        	'file' => get_field('amenities_left_image'),
	        	'css' => 'rinrose_home-amenities_body-left_image',
	        ],
	        'resBanner' => [
	        	'file' => get_field('residences_banner'),
	        	'css' => 'rinrose_home-residences_banner',
	        ],
	        'locBanner' => [
	        	'file' => get_field('location_banner'),
	        	'css' => 'rinrose_home-location_banner',
	        ],
	        'wellBanner' => [
	        	'file' => get_field('wellness_banner'),
	        	'css' => 'rinrose_home-wellness_banner',
	        ],
	    ];
	elseif(basename(get_page_template()) == 'amenities.php'):
		$images = [
			'splash' => [
				'file' => get_field('splash_image'),
				'css' => 'rinrose_amenities-splash_banner',
			],
			'banner' => [
				'file' => get_field('banner_image'),
				'css' => 'rinrose_amenities-banner_img',
			],
		];
	elseif(is_post_type_archive('gallery')):
		$images = [
			'splash' => [
				'file' => get_field('gallery_image', 'option'),
				'css' => 'rinrose_gallery-archive_splash',
			],
		];
	elseif(is_post_type_archive('residence')):
		$images = [
			'splash' => [
				'file' => get_field('residence_splash', 'option'),
				'css' => 'rinrose_residence-archive_splash',
			],
		];
	elseif(is_singular('residence')):
		$images = [
			'splash' => [
				'file' => get_field('single_residence_splash', 'option'),
				'css' => 'rinrose_residence-splash',
			],
		];
	endif;

	ob_start(); ?>
<style>
:root {
	<?php foreach($images as $image): 
		$data = rinrose_img_atts($image['file']);
		$imgs[] = $image['file']; ?>
--<?php echo $image['css']; ?>:  url("<?php echo $data->href; ?>");
		<?php foreach($data->meta['sizes'] as $key => $info):
			$var = $image['css'].'_'.$key;
			$file = $data->upload.$info['file']; ?>
--<?php echo $var; ?>: url("<?php echo $file; ?>");
		<?php endforeach;
	endforeach; ?>
}
</style>
<?php
	$cssVars = ob_get_clean();
	echo rinrose_preload_images($imgs);
	echo $cssVars;
}
add_action( 'wp_head','rinrose_preload', 10);
