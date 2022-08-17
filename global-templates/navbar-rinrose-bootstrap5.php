<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

function tenderling_rinrose_header_bar($base, $button) {
	ob_start(); ?>
	<div id="<?php echo $base; ?>_top" class="row w-100 justify-content-between">
		<div id="<?php echo $base; ?>_toggle" class="col-5 justify-content-start d-flex align-items-center">
			<button id="<?php echo $base; ?>_toggle-btn" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#rinrose_header-expanded" aria-controls="rinrose_header-expanded" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<?php if (have_rows('left_link')):
				while(have_rows('left_link')): the_row(); ?>
					<a id="<?php echo $base; ?>_toggle-link" class="btn btn-link text-decoration-none text-uppercase" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
    					<?php the_sub_field('text'); ?>
    				</a>
  				<?php endwhile;
  			endif; ?>
  		</div>
  		<div id="<?php echo $base; ?>_brand" class="col-2 justify-content-center d-flex align-items-center">
			<!-- Your site title as branding in the menu -->
			<?php if (get_sub_field('logo')) : ?>
				<a id="<?php echo $base; ?>_brand-logo" class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
					<?php echo wp_get_attachment_image( get_sub_field('logo'), 'full', "", array( "class" => "img-fluid", "alt" => get_bloginfo( 'name' ) ) ); ?>
				</a>
			<?php endif; ?>
			<!-- end custom logo -->
		</div>
		<div id="<?php echo $base; ?>_ctas" class="col-5 justify-content-end d-flex align-items-center">
			<?php if (have_rows('right_link')):
				while(have_rows('right_link')): the_row(); ?>
   					<a id="<?php echo $base; ?>_ctas-link" class="btn btn-link text-decoration-none text-uppercase" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
   						<?php the_sub_field('text'); ?>
   					</a>
  				<?php endwhile;
  			endif; ?>
  			<?php if (have_rows('right_button')):
				while(have_rows('right_button')): the_row(); ?>
   					<a id="<?php echo $base; ?>_ctas-btn" class="btn text-uppercase btn-outline-<?php echo $button; ?>" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
   						<?php the_sub_field('text'); ?>
   					</a>
  				<?php endwhile;
  			endif; ?>
  		</div>
	</div>

	<?php return ob_get_clean();
}


if(have_rows('header', 'option')) :
	while(have_rows('header', 'option')): the_row();  ?>
		<nav id="rinrose_header" class="navbar sticky-top bg-white" aria-labelledby="main-nav-label">
			<h2 id="main-nav-label" class="screen-reader-text"><?php esc_html_e( 'Main Navigation', 'tenderling' ); ?></h2>
			<div class="container-fluid navbar-light" id="rinrose_header-collapsed">
				<?php echo tenderling_rinrose_header_bar('rinrose_header-collapsed', 'primary'); ?>
			</div><!-- .container(-fluid) -->
			<div class="collapse fixed-top w-100 bg-primary navbar-dark" id="rinrose_header-expanded">
				<div id="rinrose_header-expand" class="container-fluid">	
					<?php echo tenderling_rinrose_header_bar('rinrose_header-expand', 'light'); ?>		 	
		      		<div id="rinrose_header-expand_nav">
		      			<?php $header_menu_args = array(
						    'menu_class'        => "rinrose_header-menu",
						    'menu_id'           => "rinrose_header-expand_nav-menu",
						    'container'         => false,
						    'theme_location'    => "primary",
						);
						wp_nav_menu($header_menu_args); ?>
					</div>
					<div id="rinrose_header-expand_footer">
						<?php if (have_rows('menu_bottom_link')):
		    				while(have_rows('menu_bottom_link')): the_row(); ?>
								<span class="navbar-text" id="rinrose_header-expand_footer-link">
		        					<a class="btn btn-link" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
		        						<?php the_sub_field('text'); ?>
		        					</a>
		      					</span>
		      				<?php endwhile;
		      			endif; ?>
		      		</div>
		      	</div>
			</div>
		</nav><!-- .site-navigation -->
	<?php endwhile;
endif;