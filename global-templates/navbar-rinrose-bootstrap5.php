<?php
/**
 * Header Navbar (bootstrap5)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if(have_rows('header', 'option')) :
	while(have_rows('header', 'option')): the_row();  ?>
		<nav id="rinrose_header" class="navbar fixed-top bg-light" aria-labelledby="main-nav-label">
			<h2 id="main-nav-label" class="screen-reader-text"><?php esc_html_e( 'Main Navigation', 'tenderling' ); ?></h2>
			<div class="container-fluid navbar-light" id="rinrose_header-main">
				<div id="rinrose_header-main_inner" class="row w-100 justify-content-between">
					<div id="rinrose_header-main_toggle" class="col-5 justify-content-start d-flex align-items-center">
						<button id="rinrose_header-main_toggle-btn" class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#rinrose_header-offcanvas" aria-controls="rinrose_header-offcanvas" aria-label="Toggle navigation">
							<span class="navbar-toggler-icon"></span>
						</button>
						<div class="offcanvas offcanvas-top text-bg-dark bg-primary" tabindex="-1" id="rinrose_header-offcanvas" aria-labelledby="rinrose_header-offcanvas_label">
							<div id="rinrose_header-offcanvas_content" class="container-fluid d-flex flex-column justify-content-between align-items-between h-100 pb-5">
					    		<div id="rinrose_header-offcanvas_header" class="row w-100 justify-content-between navbar navbar-dark">
									<div id="rinrose_header-offcanvas_header-action" class="col-5 justify-content-start d-flex align-items-center">
										<button id="rinrose_header-offcanvas_header-action_btn" type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
										<?php if (have_rows('left_link')):
											while(have_rows('left_link')): the_row(); ?>
												<a id="rinrose_header-offcanvas_header-action_link" class="btn btn-link text-decoration-none text-uppercase text-light ms-5" role="button" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
							    					<?php the_sub_field('text'); ?>
							    				</a>
							  				<?php endwhile;
							  			endif; ?>
								  	</div>
								  	<div id="rinrose_header-offcanvas_header-brand" class="col-2 justify-content-center d-flex align-items-center">
										<!-- Your site title as branding in the menu -->
										<?php if (get_sub_field('logo')) : ?>
											<a id="rinrose_header-offcanvas_header-brand_logo" class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url">
												<?php echo wp_get_attachment_image( get_sub_field('logo'), 'full', "", array( "class" => "img-fluid", "alt" => get_bloginfo( 'name' ) ) ); ?>
											</a>
										<?php endif; ?>
										<!-- end custom logo -->
									</div>
									<div id="rinrose_header-offcanvas_header-ctas" class="col-5 justify-content-end d-flex align-items-center">
										<?php if (have_rows('right_link')):
											while(have_rows('right_link')): the_row(); ?>
							   					<a id="rinrose_header-offcanvas_header-ctas_link" class="btn btn-link text-decoration-none text-uppercase text-light me-5" role="button" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
							   						<?php the_sub_field('text'); ?>
							   					</a>
							  				<?php endwhile;
							  			endif; ?>
							  			<?php if (have_rows('right_button')):
											while(have_rows('right_button')): the_row(); ?>
							   					<a id="rinrose_header-offcanvas_header-ctas_btn" class="btn text-uppercase btn-outline-light" role="button" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
							   						<?php the_sub_field('text'); ?>
							   					</a>
							  				<?php endwhile;
							  			endif; ?>
								  	</div>
								</div>
					      		<div id="rinrose_header-offcanvas_body" class="offcanvas-body flex-grow-1 pe-3 h-100">
					      			<?php $header_menu_args = array(
									    'menu_class'        => "navbar-nav text-center d-flex flex-column align-items-center justify-content-center h-100",
									    'menu_id'           => "rinrose_header-offcanvas_body-nav",
									    'container'         => false,
									    'theme_location'    => "primary",
									);
									wp_nav_menu($header_menu_args); ?>
								</div>
								<div id="rinrose_header-offcanvas_footer">
									<?php if (have_rows('menu_bottom_link')):
					    				while(have_rows('menu_bottom_link')): the_row(); ?>
											<span class="navbar-text" id="rinrose_header-offcanvas_footer-link">
						        				<a class="btn btn-link text-uppercase text-light text-decoration-none" role="button" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
						        					<?php the_sub_field('text'); ?>
						        				</a>
						      				</span>
						      			<?php endwhile;
						      		endif; ?>
					      		</div>
					      	</div>
				    	</div>
						<?php if (have_rows('left_link')):
							while(have_rows('left_link')): the_row(); ?>
								<a id="rinrose_header-main_toggle-link" class="btn btn-link text-decoration-none text-uppercase ms-5" role="button" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
			    					<?php the_sub_field('text'); ?>
			    				</a>
			  				<?php endwhile;
			  			endif; ?>
			  		</div>
			  		<div id="rinrose_header-main_brand" class="col-2 justify-content-center d-flex align-items-center">
						<!-- Your site title as branding in the menu -->
						<?php if (get_sub_field('logo')) : ?>
							<a id="rinrose_header-main_brand-logo" class="navbar-brand" rel="home" href="<?php echo esc_url( home_url( '/' ) ); ?>" itemprop="url" role="button">
								<?php echo wp_get_attachment_image( get_sub_field('logo'), 'full', "", array( "class" => "", "alt" => get_bloginfo( 'name' ) ) ); ?>
							</a>
						<?php endif; ?>
						<!-- end custom logo -->
					</div>
					<div id="rinrose_header-main_ctas" class="col-5 justify-content-end d-flex align-items-center">
						<?php if (have_rows('right_link')):
							while(have_rows('right_link')): the_row(); ?>
			   					<a id="rinrose_header-main_ctas-link" class="btn btn-link text-decoration-none text-uppercase me-5" role="button" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
			   						<?php the_sub_field('text'); ?>
			   					</a>
			  				<?php endwhile;
			  			endif; ?>
			  			<?php if (have_rows('right_button')):
							while(have_rows('right_button')): the_row(); ?>
			   					<a id="rinrose_header-main_ctas-btn" class="btn text-uppercase btn-outline-primary" role="button" href="<?php the_sub_field('link'); ?>" target="<?php the_sub_field('target'); ?>">
			   						<?php the_sub_field('text'); ?>
			   					</a>
			  				<?php endwhile;
			  			endif; ?>
			  		</div>
				</div>
		  	</div>
		</nav><!-- .site-navigation -->
	<?php endwhile;
endif;