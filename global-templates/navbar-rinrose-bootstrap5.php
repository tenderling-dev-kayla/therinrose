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
							<h2 id="rinrose_header-offcanvas_label" class="screen-reader-text"><?php esc_html_e( 'Main Navigation OffCanvas', 'tenderling' ); ?></h2>
							<div id="rinrose_header-offcanvas_content" class="container-fluid d-flex flex-column justify-content-between align-items-between h-100 pb-5">
					    		<div id="rinrose_header-offcanvas_header" class="row w-100 justify-content-between navbar navbar-dark">
									<div id="rinrose_header-offcanvas_header-action" class="col-5 justify-content-start d-flex align-items-center">
										<button id="rinrose_header-offcanvas_header-action_btn" type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
										<?php $oc_leftLink = get_sub_field('left_link');
										$oc_leftLink_args = [
											'href' => $oc_leftLink['link'],
											'label' => $oc_leftLink['text'],
											'target' => $oc_leftLink['target'],
											'class' => 'btn btn-link text-decoration-none text-uppercase text-light ms-5',
											'id' => 'rinrose_header-offcanvas_header-action_link',
										];
										the_rinrose_btn_link($oc_leftLink_args); ?>
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
										<?php $oc_rightLink = get_sub_field('right_link');
										$oc_rightLink_args = [
											'href' => $oc_rightLink['link'],
											'label' => $oc_rightLink['text'],
											'target' => $oc_rightLink['target'],
											'class' => 'btn btn-link text-decoration-none text-uppercase text-light me-5',
											'id' => 'rinrose_header-offcanvas_header-ctas_link',
										];
										the_rinrose_btn_link($oc_rightLink_args); 

										$oc_rightBtn = get_sub_field('right_button');
										$oc_rightBtn_args = [
											'href' => $oc_rightBtn['link'],
											'label' => $oc_rightBtn['text'],
											'target' => $oc_rightBtn['target'],
											'class' => 'btn text-uppercase btn-outline-light',
											'id' => 'rinrose_header-offcanvas_header-ctas_btn',
										];
										the_rinrose_btn_link($oc_rightBtn_args); ?>
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
									<?php $oc_menuLink = get_sub_field('menu_bottom_link');
									$oc_menuLink_args = [
										'href' => $oc_menuLink['link'],
										'label' => $oc_menuLink['text'],
										'target' => $oc_menuLink['target'],
										'class' => 'btn btn-link text-uppercase text-light text-decoration-none',
									]; ?>
									<span class="navbar-text" id="rinrose_header-offcanvas_footer-link">
				        				<?php the_rinrose_btn_link($oc_menuLink_args); ?>
				      				</span>
					      		</div>
					      	</div>
				    	</div>
				    	<?php $leftLink = get_sub_field('left_link');
						$leftLink_args = [
							'href' => $leftLink['link'],
							'label' => $leftLink['text'],
							'target' => $leftLink['target'],
							'class' => 'btn btn-link text-decoration-none text-uppercase ms-5',
							'id' => 'rinrose_header-main_toggle-link',
						];
						the_rinrose_btn_link($leftLink_args); ?>
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
						<?php $rightLink = get_sub_field('right_link');
						$rightLink_args = [
							'href' => $rightLink['link'],
							'label' => $rightLink['text'],
							'target' => $rightLink['target'],
							'class' => 'btn btn-link text-decoration-none text-uppercase me-5',
							'id' => 'rinrose_header-main_ctas-link',
						];
						the_rinrose_btn_link($rightLink_args); 

						$rightBtn = get_sub_field('right_button');
						$rightBtn_args = [
							'href' => $rightBtn['link'],
							'label' => $rightBtn['text'],
							'target' => $rightBtn['target'],
							'class' => 'btn text-uppercase btn-outline-primary',
							'id' => 'rinrose_header-main_ctas-btn',
						];
						the_rinrose_btn_link($rightBtn_args); ?>
			  		</div>
				</div>
		  	</div>
		</nav><!-- .site-navigation -->
	<?php endwhile;
endif;