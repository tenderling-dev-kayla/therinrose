<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;


?>
<div class="collapse" id="navbarToggleExternalContent">
 	<div class="bg-dark p-4">
    	<h5 class="text-white h4">Collapsed content</h5>
    	<span class="text-muted">Toggleable via the navbar brand.</span>
	</div>
</div>
<nav id="main-nav" class="navbar fiex-top navbar-light bg-white" aria-labelledby="main-nav-label">

	<h2 id="main-nav-label" class="screen-reader-text">
		<?php esc_html_e( 'Main Navigation', 'understrap' ); ?>
	</h2>


	<div class="container-fluid">

		<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarToggleExternalContent" aria-controls="navbarToggleExternalContent" aria-expanded="false" aria-label="Toggle navigation">
    		<span class="navbar-toggler-icon"></span>
    	</button>

		<span class="navbar-text">
        	<a href="#">Residents</a>
      	</span>

		<!-- Your site title as branding in the menu -->
		<?php if (get_field('logo', 'option')) : ?>
			<a class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
				<?php echo wp_get_attachment_image( get_field('logo', 'option'), 'full', "", array( "class" => "img-responsive", "alt" => get_bloginfo( 'name' ) ) ); ?>
			</a>
		<?php endif; ?>
		<!-- end custom logo -->

		<span class="navbar-text">
        	<a href="#">Tours</a>
      	</span>
      	<span class="navbar-text">
        	<a href="#">Apply</a>
      	</span>

	</div><!-- .container(-fluid) -->

</nav><!-- .site-navigation -->
