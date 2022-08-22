<?php /**
 * 
 *	Footer Content Layout 
 * 
 **/


?>
<section id="rinrose_footer" class="bg-primary text-white">
	<footer class="site-footer" id="colophon">
		<?php if(have_rows('footer', 'option')) :
			while(have_rows('footer','option')): the_row(); ?>
				<div class="row">
					<div class="col">
						<div id="rinrose_footer_contact">
							<h4 id="rinrose_footer_contact-company"><?php the_sub_field('company'); ?></h4>
							<p id="rinrose_footer_contact-address"><?php the_sub_field('address'); ?></p>
							<p id="rinrose_footer_contact-phone-email">
								<span id="rinrose_footer_contact-phone"><?php the_sub_field('phone'); ?></span>
								<span id="rinrose_footer_contact-email"><?php the_sub_field('email'); ?></span>
							</p>
						</div>
						<div id="rinrose_footer_office">
							<h4 id="rinrose_footer_office-name"><?php the_sub_field('office'); ?></h4>
							<p id="rinrose_footer_office-hours"><?php the_sub_field('hours'); ?></p>
						</div>
						<?php if(have_rows('social')) : ?>
							<div id="rinrose_footer_social">
								<ul id="rinrose_footer_social-icons">
									<?php while(have_rows('social')) : the_row(); ?>
										<li id="rinrose_footer_social-icons_<?php the_sub_field('type'); ?>" class="rinrose_footer_social-icons_icon">
											<a href="<?php the_sub_field('link'); ?>" target="_blank">
												<i class="fa-brands fa-<?php the_sub_field('type'); ?>"></i>
											</a>
										</li>
									<?php endwhile; ?>
								</ul>
							</div>
						<?php endif; ?>
					</div>
					<div class="col">
						<div id="rinrose_footer_links">
							<?php $footer_links_args = array(
							    'menu_class'        => "rinrose_footer-menu",
							    'menu_id'           => "rinrose_footer_links-menu",
							    'container'         => false,
							    'theme_location'    => "footer_links",
							);
							wp_nav_menu($footer_links_args); 

							if(have_rows('inquiry_button')):
								while(have_rows('inquiry_button')): the_row(); ?>
									<div id="rinrose_footer_links-button">
										<a class="btn btn-outline-light" target="<?php the_sub_field('target'); ?>" href="<?php the_sub_field('link'); ?>">
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
								<ul id="rinrose_footer_legal-icons">
									<?php while(have_rows('icons')): the_row(); ?>
										<li>
											<?php echo wp_get_attachment_image( get_sub_field('image'), 'full', '', array( "class" => "img-fluid" ) );  ?>
										</li>
									<?php endwhile; ?>
								</ul>
							<?php endif;
							$footer_legal_args = array(
							    'menu_class'        => "rinrose_footer-menu",
							    'menu_id'           => "rinrose_footer_legal-menu",
							    'container'         => false,
							    'theme_location'    => "footer_legal",
							);
							wp_nav_menu($footer_legal_args); ?>
						</div>
						<div id="tenderling-footer-info">
							<a href="https://www.tenderling.com" target="_blank">Site by Tenderling</a>
						</div>
					</div>
				</div>
			<?php endwhile;
		endif; ?>
	</footer>
</section>

<?php 