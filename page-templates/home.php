<?php
/**
* Template Name: Home
*
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<div class="wrapper" id="rinrose_home-wrapper">
	<div class="" id="content">
		<?php 
		/**
		 * Splash
		 **/
		if( have_rows('splash') ):
		    while( have_rows('splash') ): the_row(); 
		    	//Mobile Video = the_sub_field('mobile_video');
		    	?>
				<section id="rinrose_home-splash">
					<div id="rinrose_home-splash_video">
						<div class="ratio ratio-16x9" id="rinrose_home-splash_video-sizing">
							<video loop="loop" autoplay="" playsinline="" muted="" id="rinrose_home-splash_video-file" preload="none" src="<?php the_sub_field('video'); ?>"> 
								<source type="video/mp4" src="<?php the_sub_field('video'); ?>">
							</video>
						</div>
					</div>
				</section>
				<div id="rinrose_home-splash_overlay" class="position-absolute top-0 start-0 w-100 vh-100 justify-content-center d-flex">
					<div id="rinrose_home-splash_overlay-content" class="p-5 mb-5 position-relative">
						<img src="/wp-content/themes/therinrose-tenderling/inc/img/rinrose_logo.svg" class="img-fluid mw-100 mh-100" />
						<div id="rinrose_home-splash_overlay-video" class="position-absolute p-5">
							<video id="rinrose_home-splash_overlay-video_file" class="rinrose-clipped_video w-100 h-100" loop="loop" autoplay="" playsinline="" muted="" preload="none" width="360px" height="474px" src="<?php the_sub_field('mobile_video'); ?>"> 
								<source type="video/mp4" src="<?php the_sub_field('mobile_video'); ?>">
							</video>
						</div>
					</div>
					<svg width="0" height="0" viewBox="0 0 1102 1455" fill="none" xmlns="http://www.w3.org/2000/svg">
						<clipPath id="rinrose-clipped_svg" clipPathUnits="objectBoundingBox" transform="scale(0.00090744101 0.00068728522)">
							<path d="M0.29995 0.400391H654.3C816.4 0.400391 958.7 87.1004 1037.2 216.5H667.3C471.1 216.5 293.7 298.7 167.9 430.6C65.9999 315.5 3.09995 165.1 0.29995 0.400391Z" />
							<path d="M507.1 918.6H0.199951V1454.6H507.1V918.6Z" />
							<path d="M654.3 895.3H0.29995C3.09995 730.5 65.9999 580.1 167.9 465.1C293.7 596.9 471.1 679.2 667.3 679.2H1037.2C958.7 808.6 816.4 895.3 654.3 895.3Z" />
							<path d="M667.3 655.8C477.2 655.8 305.4 575.9 183.8 447.8C305.4 319.8 477.2 239.8 667.3 239.8H1050.4C1083.2 302 1101.7 372.7 1101.7 447.8C1101.7 522.9 1083.1 593.6 1050.4 655.8H667.3Z" />
							<path d="M610.8 998.9V1226.7C610.8 1352.3 713 1454.5 838.6 1454.5H1066.4V1226.7C1066.4 1101.1 964.2 998.9 838.6 998.9H610.8Z" />
					   	</clipPath>
					</svg>
				</div>
			<?php endwhile;
		endif;

		/**
		 * Intro
		 **/
		if( have_rows('intro') ):
		    while( have_rows('intro') ): the_row(); ?>
				<section id="rinrose_home-intro" class="py-5">
					<div class="container py-5 text-center">
						<div class="row justify-content-center">
							<div class="col-12 col-lg-8">
								<h1 id="rinrose_home-intro_title" class="px-5 text-primary display-1 mb-3"><?php the_sub_field('title'); ?></h1>
							</div>
							<div class="col-12 col-lg-9">
								<div id="rinrose_home-intro_blurb" class="px-2"><?php echo do_shortcode(get_sub_field('blurb')); ?></div>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile;
		endif;

		/**
		 * Amenities
		 **/
		if( have_rows('amenities') ):
		    while( have_rows('amenities') ): the_row(); ?>
				<section id="rinrose_home-amenities">					
					<div id="rinrose_home-amenities_banner">
						<?php echo wp_get_attachment_image( get_sub_field('banner'), 'full', "", array( "class" => "img-fluid" ) ); ?>
					</div>
					<div id="rinrose_home-amenities_body" class="d-flex justify-content-between mt-5 pt-5 align-items-center">
						<div id="rinrose_home-amenities_body-left" class="w-60">
							<?php echo wp_get_attachment_image( get_sub_field('left_image'), 'full', "", array( "class" => "img-fluid", "id" => "rinrose_home-amenities_body-left_img", ) ); ?>
						</div>
						<div id="rinrose_home-amenities_body-right" class="w-40 p-5">
							<div id="rinrose_home_amenities_body-right_content">
								<h2 id="rinrose_home_amenities_body-right_content-title" class="display-1 text-primary pb-3"><?php the_sub_field('title'); ?></h2>
								<?php if(have_rows('button')):
									while(have_rows('button')): the_row(); ?>
										<a id="rinrose_home-amenities_body-right_content-button" class="btn btn-outline-primary text-uppercase" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a>
									<?php endwhile;
								endif; ?>
							</div>
						</div>
					</div>
					<div id="rinrose_home-amenities_footer" class="w-100 d-flex justify-content-end pb-5 mb-5">
						<div id="rinrose_home-amenities_footer-image" class="w-40 px-5">
							<?php echo wp_get_attachment_image( get_sub_field('right_image'), 'full', "", array( "class" => "img-fluid", "id" => "rinrose_home-amenities_footer-image_img" ) ); ?>
						</div>
					</div>
				</section>
			<?php endwhile;
		endif;

		/**
		 * Residences
		 **/
		if( have_rows('residences') ):
		    while( have_rows('residences') ): the_row(); ?>
				<section id="rinrose_home-residences">
					<?php $resBg = wp_get_attachment_image_src(get_sub_field('banner'), 'full', false); ?>
					<div id="rinrose_home-residences_banner" class="vh-60 d-flex align-items-end px-5 py-3  panorama" style="background-image:  url('<?php echo $resBg[0]; ?>')">
						<h2 id="rinrose_home_residences-title" class="display-1 text-white px-5">
							<?php the_sub_field('title'); ?>
						</h2>
					</div>
					<div id="rinrose_home-residences_blurb" class="d-flex p-5 mb-5">
						<div id="rinrose_home-residences_blurb-content" class="w-50 px-5">
							<?php echo do_shortcode(get_sub_field('blurb')); ?>
						</div>
					</div>
					<div id="rinrise_home_residences-grid" class="container pb-5 mb-3">
						<h3 id="rinrose_home_residences-grid_title" class="text-center text-primary text-uppercase pb-5"><?php the_sub_field('grid_title'); ?></h3>
						<div id="rinrise_home_residences-grid_display">
							<!--Residences CPT Grid query here. Show Featured. 3 Wide (Type, name, plan art, button) -->
							<img src="/wp-content/themes/therinrose-tenderling/inc/img/rinrose-floorplans_placeholder.jpg" class="img-fluid" />
						</div>
						<?php if(have_rows('button')):
							while(have_rows('button')): the_row(); ?>
								<div id="rinrose_home_residences-grid_button" class="text-center py-5">
									<a class="btn btn-outline-primary text-uppercase" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a>
								</div>
							<?php endwhile;
						endif; ?>
					</div>
				</section>
			<?php endwhile;
		endif;

		/**
		 * Location
		 **/
		if( have_rows('location') ):
		    while( have_rows('location') ): the_row(); ?>
				<section id="rinrose_home-location">
					<?php $locationBg = wp_get_attachment_image_src(get_sub_field('banner'), 'full', false); ?>
					<div id="rinrose_home-location_banner" class="panorama vh-60 d-flex align-items-center justify-content-center" style="background-image: url('<?php echo $locationBg[0]; ?>')">
						<div id="rinrose_home-location_banner-content" class="container d-flex justify-content-center">
							<div id="rinrose_home-location_banner-content_body" class="py-5 w-50">
								<h2 id="rinrose_home-location_banner-content_body-title" class="display-1 text-white text-center"><?php the_sub_field('banner_text'); ?></h2>
							</div>
						</div>
					</div>
					<div id="rinrose_home_location-info" class="container py-5 my-5 d-flex justify-content-center">
						<div id="rinrose_home_location-info_content" class="w-50 text-center">
							<h3 id="rinrose_home_location-content_title" class="text-primary text-uppercase"><?php the_sub_field('title'); ?></h3>
							<div id="rinrose_home_location-content_blurb">
								<?php echo do_shortcode(get_sub_field('blurb')); ?>
							</div>
						</div>
					</div>
					<div id="rinrose_home_location-map" class="vh-80">
						<div id="map"></div>
					</div>
				</section>
			<?php endwhile;
		endif;

		/**
		 * Wellness
		 **/
		if( have_rows('wellness') ):
		    while( have_rows('wellness') ): the_row(); ?>
		    	<section id="rinrose_home-wellness">
		    		<a id="wellness" class="d-none anchorPin"></a>
		    		<?php $wellnessBg = wp_get_attachment_image_src(get_sub_field('banner'), 'full', false); ?>
					<div id="rinrose_home-wellness_banner" class="panorama vh-60 d-flex align-items-center justify-content-center" style="background-image: url('<?php echo $wellnessBg[0]; ?>')">
						<div id="rinrose_home-wellness_banner-content" class="container d-flex justify-content-center">
							<div id="rinrose_home-wellness_banner-content_body" class="py-5 w-60">
								<h2 id="rinrose_home-wellness_banner-content_body-title" class="h3 text-white text-center text-uppercase pb-3"><?php the_sub_field('title'); ?></h2>
								<div id="rinrose_home-wellness_banner-content_body-blurb" class="text-white text-center"><?php echo do_shortcode(get_sub_field('blurb')); ?></div>
							</div>
						</div>
					</div>
				</section>
			<?php endwhile;
		endif;
		?>
	</div><!-- #content -->
</div><!-- #rinrose_home-wrapper -->

<?php
get_footer();