<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>
<nav id="main-nav" class="navbar sticky-top navbar-light bg-white" aria-labelledby="main-nav-label">
	<h2 id="main-nav-label" class="screen-reader-text"><?php esc_html_e( 'Main Navigation', 'tenderling' ); ?></h2>
	<div class="container-fluid">
		<div class="row w-100 justify-content-between">
			<div id="rinrose_header_nav-left" class="col-5 justify-content-start d-flex">
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
    			</button>
				<span class="navbar-text">
        			<a class="btn btn-link" href="#">Residents</a>
      			</span>
      		</div>
      		<div id="rinrose_header_nav-mind" class="col-2 justify-content-center d-flex">
				<!-- Your site title as branding in the menu -->
				<?php if (get_field('logo', 'option')) : ?>
					<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
						<?php echo wp_get_attachment_image( get_field('logo', 'option'), 'full', "", array( "class" => "img-responsive", "alt" => get_bloginfo( 'name' ) ) ); ?>
					</a>
				<?php endif; ?>
				<!-- end custom logo -->
			</div>
			<div id="rinrose_header_nav-right" class="col-5 justify-content-end d-flex">
				<span class="navbar-text">
        			<a class="btn btn-link" href="#">Tours</a>
      			</span>
      			<span class="navbar-text">
        			<a class="btn btn-outline-primary" href="#">Apply</a>
      			</span>
      		</div>
      	</div>
	</div><!-- .container(-fluid) -->
	<div class="collapse fixed-top w-100" id="navbarToggleExternalContent">
	 	<div class="bg-dark p-4">
	    	<h5 class="text-white h4">Collapsed content</h5>
	    	<span class="text-muted">Toggleable via the navbar brand.</span>
		</div>
	</div>
</nav><!-- .site-navigation -->
