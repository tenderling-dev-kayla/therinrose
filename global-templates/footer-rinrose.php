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
				<div class="row justify-content-between">
					<div class="col-12 col-md-4 col-lg-4">
						<div id="rinrose_footer-contact" class="mb-4">
							<h2 id="rinrose_footer-contact_company" class="text-uppercase fw-lightbold h6"><?php the_sub_field('company'); ?></h2>
							<p id="rinrose_footer-contact_address" class="mb-0 fs-small"><?php the_sub_field('address'); ?></p>
							<p id="rinrose_footer-contact_items" class="mb-0 fs-small">
								<span id="rinrose_footer-contact_items-phone" class="pe-3"><?php the_sub_field('phone'); ?></span>
								<span id="rinrose_footer-contact_items-email"><?php the_sub_field('email'); ?></span>
							</p>
						</div>
						<div id="rinrose_footer-office" class="mb-4">
							<h3 id="rinrose_footer-office_name" class="text-uppercase fw-lightbold h6"><?php the_sub_field('office'); ?></h3>
							<p id="rinrose_footer-office_hours" class="mb-0 fs-small"><?php the_sub_field('hours'); ?></p>
						</div>
						<?php if(have_rows('social')) : ?>
							<div id="rinrose_footer-social" class="d-flex">
								<?php while(have_rows('social')) : the_row(); 
									$field = get_sub_field_object('type');
									$value = get_sub_field('type');
									$label = $field['choices'][ $value ];
									$social_args = [
										'href' => get_sub_field('link'),
										'label' => [
											'html' => '<i class="fa-brands fa-'.get_sub_field('type').'" aria-label="'.$label.' icon"></i>',
											'text' => $label.' Profile',
										],
										'target' => '_blank',
										'class' => 'btn btn-outline-light rounded-circle p-2 me-5',
										'id'	=>	'rinrose_footer-social_'.get_sub_field('type'),
									];
									the_rinrose_btn_link($social_args);
								endwhile; ?>
							</div>
						<?php endif; ?>
					</div>
					<div class="col-12 col-md-4 col-lg-3">
						<div id="rinrose_footer-links" class="list-group list-group-flush mb-5">
							<?php $footer_links_args = array(
							    'theme_location'  => "footer_links",
							    'container'       => false,
								'echo'            => false,
								'items_wrap'      => '%3$s',
								'depth'           => 0,
								'link_class'	  => 'list-group-item list-group-item-action text-white text-uppercase bg-primary fw-lightbold px-0 border border-0 lh-1 py-0 mb-4',
							);
							echo strip_tags(wp_nav_menu($footer_links_args), '<a>' ); ?>
						</div>
						<?php if(have_rows('inquiry_button')):
							while(have_rows('inquiry_button')): the_row(); ?>
								<div id="rinrose_footer-button">
									<?php $RFB_args = [
										'href' => get_sub_field('link'),
										'label' => get_sub_field('text'),
										'target' => get_sub_field('target'),
										'class' => 'btn text-uppercase btn-outline-light btn-sm',
									];
									the_rinrose_btn_link($RFB_args); ?>
								</div>
							<?php endwhile;
						endif; ?>
					</div>
					<div class="col-12 col-md-4 col-lg-3">
						<div id="rinrose_footer-logo" class="mb-3 pb-3">
							<?php echo wp_get_attachment_image( get_sub_field('logo'), 'full', '', array( "class" => "img-fluid" ) );  ?>
						</div>
						<?php if(have_rows('icons')): ?>
							<div id="rinrose_footer-icons" class="d-flex mb-4">
								<?php while(have_rows('icons')): the_row(); ?>
									<div class="rinrose_footer-icons_icon opacity-75 pe-5">
										<?php echo wp_get_attachment_image( get_sub_field('image'), 'full', '', array( "class" => "img-fluid" ) );  ?>
									</div>
								<?php endwhile; ?>
							</div>
						<?php endif; ?>
						<div id="rinrose_footer-legal" class="list-group list-group-horizontal list-group-flush mb-3 flex-wrap">
							<?php $footer_legal_args = array(
							    'theme_location'  => "footer_legal",
							    'container'       => false,
								'echo'            => false,
								'items_wrap'      => '%3$s',
								'depth'           => 0,
								'walker'		  => new Understrap_WP_Bootstrap_Navwalker(),
								'link_class'	  => 'list-group-item list-group-item-action text-white text-uppercase bg-primary fw-lightbold ps-0 pe-4 py-0 pb-2 fs-small border border-0 w-auto lh-1',
							);
							echo strip_tags(wp_nav_menu($footer_legal_args), '<a>' ); ?>
						</div>
						<div id="rinrose_footer-tenderling">
							<?php $tend_args = [
								'href' => 'https://tenderling.com',
								'label' => 'Site by Tenderling',
								'target' => '_blank',
								'class' => 'text-uppercase text-white text-opacity-50 fw-lightbold text-decoration-none fs-smal',
							];
							the_rinrose_btn_link($tend_args); ?>
						</div>
					</div>
				</div>
			<?php endwhile;
		endif; ?>
	</footer>
</section>

<?php 