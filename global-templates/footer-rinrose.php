<?php /**
 * 
 *	Footer Content Layout 
 * 
 **/


?>
<section id="rinrose_footer" class="bg-primary text-white p-5">
	<footer class="site-footer px-5" id="colophon">
		<?php if(have_rows('footer', 'option')) :
			while(have_rows('footer','option')): the_row(); ?>
				<div class="row">
					<div class="col">
						<div id="rinrose_footer_contact" class="mb-2">
							<h4 id="rinrose_footer_contact-company" class="text-uppercase fw-lightbold"><?php the_sub_field('company'); ?></h4>
							<p id="rinrose_footer_contact-address" class="mb-0"><?php the_sub_field('address'); ?></p>
							<p id="rinrose_footer_contact-phone-email" class="mb-0">
								<span id="rinrose_footer_contact-phone" class="pe-3"><?php the_sub_field('phone'); ?></span>
								<span id="rinrose_footer_contact-email"><?php the_sub_field('email'); ?></span>
							</p>
						</div>
						<div id="rinrose_footer_office" class="mb-2">
							<h4 id="rinrose_footer_office-name" class="text-uppercase fw-lightbold"><?php the_sub_field('office'); ?></h4>
							<p id="rinrose_footer_office-hours" class="mb-0"><?php the_sub_field('hours'); ?></p>
						</div>
						<?php if(have_rows('social')) : ?>
							<div id="rinrose_footer_social">
								<div id="rinrose_footer_social-icons" class="d-flex">
									<?php while(have_rows('social')) : the_row(); ?>
										<a id="rinrose_footer_social-icons_<?php the_sub_field('type'); ?>" class="btn btn-outline-light rounded-circle me-3" href="<?php the_sub_field('link'); ?>" target="_blank">
											<i class="fa-brands fa-<?php the_sub_field('type'); ?>"></i>
										</a>
									<?php endwhile; ?>
								</div>
							</div>
						<?php endif; ?>
					</div>
					<div class="col">
						<div id="rinrose_footer_links">
							<?php $footer_links_args = array(
							    'menu_class'        => "rinrose_footer-menu list-group list-group-flush text-white text-uppercase",
							    'menu_id'           => "rinrose_footer_links-menu",
							    'container'         => false,
							    'theme_location'    => "footer_links",
							    'add_li_class'		=> "list-group-item",
							);
							wp_nav_menu($footer_links_args); 

							if(have_rows('inquiry_button')):
								while(have_rows('inquiry_button')): the_row(); ?>
									<div id="rinrose_footer_links-button">
										<a class="btn text-uppercase btn-outline-light" target="<?php the_sub_field('target'); ?>" href="<?php the_sub_field('link'); ?>">
											<?php the_sub_field('text'); ?>
										</a>
									</div>
								<?php endwhile;
							endif; ?>
						</div>
					</div>
					<div class="col">
						<div id="rinrose_footer_legal">
							<div id="rinrose_footer_legal-logo">
								<?php echo wp_get_attachment_image( get_sub_field('logo'), 'full', '', array( "class" => "img-fluid" ) );  ?>
							</div>
							<?php if(have_rows('icons')): ?>
								<div id="rinrose_footer_legal-icons" class="d-flex">
									<?php while(have_rows('icons')): the_row(); ?>
										<div class="rinrose_footer_legal-icons_icon">
											<?php echo wp_get_attachment_image( get_sub_field('image'), 'full', '', array( "class" => "img-fluid" ) );  ?>
										</div>
									<?php endwhile; ?>
								</div>
							<?php endif;
							$footer_legal_args = array(
							    'menu_class'        => "rinrose_footer-menu list-group list-group-flush text-white text-uppercase",
							    'menu_id'           => "rinrose_footer_legal-menu",
							    'container'         => false,
							    'theme_location'    => "footer_legal",
							    'add_li_class'		=> "list-group-item",
							);
							wp_nav_menu($footer_legal_args); ?>
						</div>
						<div id="tenderling-footer-info">
							<a href="https://www.tenderling.com" target="_blank" class="text-uppercase text-white text-opacity-50">Site by Tenderling</a>
						</div>
					</div>
				</div>
			<?php endwhile;
		endif; ?>
	</footer>
</section>

<?php 