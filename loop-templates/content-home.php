<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class(); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header" id="rinrose_home-header">
		<?php 
		/**
		 * Splash
		 **/
		if( have_rows('splash') ): ?>
			<div id="rinrose_home-splash" class="section">
		    	<?php while( have_rows('splash') ): the_row(); ?>
					<div id="rinrose_home-splash_mask-bg" class="w-100 h-100 top-0 start-0" role="presentation"></div>
					<?php $posterBg = wp_get_attachment_image_src(get_sub_field('poster'), 'full', false); ?>
					<div id="rinrose_home-splash_mask" class="w-100 h-100" style="background-image: url(<?php echo $posterBg[0]; ?>);">
						<video loop="loop" autoplay="" playsinline="" muted="" id="rinrose_home-splash_video" preload="none" src="<?php the_sub_field('video'); ?>"> 
							<source type="video/mp4" src="<?php the_sub_field('video'); ?>">
						</video>
					</div>
				<?php endwhile; ?>
			</div><!-- #rinrose_home-splash -->
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1707 1654" width="0" height="0" fill="none" role="presentation">
				<clipPath id="rinrose-clipped_svg" clipPathUnits="objectBoundingBox" transform="scale(0.00058582308 0.00060459492)">
					<path d="M442.6,1643.2v-618.4c0-93.6,17.1-184.9,50.8-271.4c32.5-83.6,79.5-160.1,139.5-227.4l6.4-7.2l-6.4-7.2 c-60-67.3-107-143.8-139.5-227.4c-33.7-86.5-50.8-177.8-50.8-271.4v-2.1h735.8c280.1,0,508.1,227.9,508.1,508 c0,280.1-227.9,508-508.1,508h-147.2v616.3H442.6z"/>
					<path d="M1381.5,1643.2c-146.7,0-266-119.3-266-266v-266h266c146.7,0,266,119.3,266,266v266H1381.5z"/>
				</clipPath>
			</svg>
		<?php endif;

		/**
		 * Intro
		 **/
		if( have_rows('intro') ): ?>
			<div id="rinrose_home-intro" class="py-5 bg-white section">
		    	<?php while( have_rows('intro') ): the_row(); ?>
					<div class="container py-5 text-center">
						<div class="row justify-content-center">
							<div class="col-12 col-lg-9 rinrose_has_animation" data-animation="fadeIn">
								<h1 id="rinrose_home-intro_title" class="text-primary display-1 mb-3 entry-title"><?php the_sub_field('title'); ?></h1>
							</div>
							<div class="col-12 col-lg-10 rinrose_has_animation" data-animation="fadeIn">
								<div id="rinrose_home-intro_blurb"><?php echo do_shortcode(get_sub_field('blurb')); ?></div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div><!-- #rinrose_home-intro -->
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php 
		/**
		 * Amenities
		 **/
		if( have_rows('amenities') ): ?>
			<section id="rinrose_home-amenities" class="bg-white pb-5" aria-labelledby="rinrose_home_amenities_body-right_content-title">
		    	<?php while( have_rows('amenities') ): the_row(); ?>
					<?php $amenBg = wp_get_attachment_image_src(get_sub_field('banner'), 'full', false); 
					$amenBgAlt = get_post_meta(get_sub_field('banner'), '_wp_attachment_image_alt', TRUE); ?>
					<div id="rinrose_home-amenities_banner" class="vh-60 panorama bg-pos-bottom" style="background-image: url(<?php echo $amenBg[0]; ?>)" role="img" aria-label="<?php echo $amenBgAlt; ?>"></div>
					<div id="rinrose_home-amenities_body" class="d-flex justify-content-between mt-5 pt-5 align-items-center">
						<div id="rinrose_home-amenities_body-left" class="w-60">
							<?php $amenLeftBg = wp_get_attachment_image_src(get_sub_field('left_image'), 'full', false); 
							$amenLeftBgAlt = get_post_meta(get_sub_field('left_image'), '_wp_attachment_image_alt', TRUE); ?>
							<div id="rinrose_home-amenities_body-left_image" class="panorama min-vh-100" style="background-image: url(<?php echo $amenLeftBg[0]; ?>)" role="img" aria-label="<?php echo $amenLeftBgAlt; ?>"></div>
						</div><!--#rinrose_home-amenities_body-left -->
						<div id="rinrose_home-amenities_body-right" class="w-40 px-5 pt-1 pb-5">
							<div id="rinrose_home_amenities_body-right_content" class="pb-5 mb-5">
								<div id="rinrose_home_amenities_body-right_content-animated" class="rinrose_has_animation mb-5 pb-5" data-animation="fadeIn">
									<h2 id="rinrose_home_amenities_body-right_content-title" class="display-1 text-primary pb-3"><?php the_sub_field('title'); ?></h2>
									<?php if(have_rows('button')):
										while(have_rows('button')): the_row(); ?>
											<a id="rinrose_home-amenities_body-right_content-button" class="btn btn-outline-primary text-uppercase" role="button" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a>
										<?php endwhile;
									endif; ?>
								</div>
							</div>
						</div><!-- #rinrose_home-amenities_body-right -->
					</div><!-- #rinrose_home-amenities_body -->
					<div id="rinrose_home-amenities_footer" class="w-100 d-flex justify-content-end pb-5">
						<div id="rinrose_home-amenities_footer-image" class="w-40 px-5">
							<div id="rinrose_home-amenities_footer-image_wrap" class="rinrose_has_animation" data-animation="slideInRight">
								<?php echo wp_get_attachment_image( get_sub_field('right_image'), 'full', "", array( "class" => "img-fluid", "id" => "rinrose_home-amenities_footer-image_wrap-img" ) ); ?>
							</div>
						</div>
					</div><!-- #rinrose_home-amenities_footer -->
				<?php endwhile; ?>
			</section><!-- #rinrose_home-amenities -->
		<?php endif;

		/**
		 * Residences
		 **/
		if( have_rows('residences') ): ?>
			<div id="rinrose_home-residences" class="bg-white pb-3 section">
		    	<?php while( have_rows('residences') ): the_row(); ?>
		    		<section id="rinrose_home-residences_info" aria-labelledby="rinrose_home_residences-title">
						<?php $resBg = wp_get_attachment_image_src(get_sub_field('banner'), 'full', false); ?>
						<div id="rinrose_home-residences_banner" class="vh-60 d-flex align-items-end px-5 py-3 bg-pos-bottom panorama" style="background-image:  url('<?php echo $resBg[0]; ?>')">
							<h2 id="rinrose_home_residences-title" class="display-1 text-white px-5 rinrose_has_animation" data-animation="fadeIn">
								<?php the_sub_field('title'); ?>
							</h2>
						</div>
						<div id="rinrose_home-residences_blurb" class="d-flex p-5 mb-5 rinrose_has_animation" data-animation="fadeIn">
							<div id="rinrose_home-residences_blurb-content" class="w-50 ps-5 pe-2">
								<?php echo do_shortcode(get_sub_field('blurb')); ?>
							</div>
						</div>
					</section><!-- #rinrose_home-residences_info -->
					<section id="rinrise_home_residences-grid" class="container pb-5" aria-labelledby="rinrose_home-residences-grid_title">
						<h3 id="rinrose_home_residences-grid_title" class="text-center text-primary text-uppercase pb-5"><?php the_sub_field('grid_title'); ?></h3>
						<div id="rinrise_home_residences-grid_display">
							<!--Residences CPT Grid query here. Show Featured. 3 Wide (Type, name, plan art, button) -->
							<img src="/wp-content/themes/therinrose-tenderling/inc/img/rinrose-floorplans_placeholder.jpg" class="img-fluid" alt="Placeholder floor plans image" />
						</div>
						<?php if(have_rows('button')):
							while(have_rows('button')): the_row(); ?>
								<div id="rinrose_home_residences-grid_button" class="text-center py-5">
									<a class="btn btn-outline-primary text-uppercase" role="button" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a>
								</div>
							<?php endwhile;
						endif; ?>
					</section><!-- #rinrise_home_residences-grid -->
				<?php endwhile; ?>
			</div><!-- rinrose_home-residences -->
		<?php endif;

		/**
		 * Location
		 **/
		if( have_rows('location') ): ?>
			<section id="rinrose_home-location" class="bg-white section" aria-labelledby="rinrose_home-location_banner-content_body-title">
			    <?php while( have_rows('location') ): the_row(); ?>
					<?php $locationBg = wp_get_attachment_image_src(get_sub_field('banner'), 'full', false); ?>
					<div id="rinrose_home-location_banner" class="panorama vh-60 d-flex align-items-center justify-content-center" style="background-image: url('<?php echo $locationBg[0]; ?>')">
						<div id="rinrose_home-location_banner-content" class="container d-flex justify-content-center">
							<div id="rinrose_home-location_banner-content_body" class="py-5 px-3 w-60 rinrose_has_animation" data-animation="fadeIn">
								<h2 id="rinrose_home-location_banner-content_body-title" class="display-1 text-white text-center"><?php the_sub_field('banner_text'); ?></h2>
							</div>
						</div>
					</div>
					<div id="rinrose_home_location-info" class="container py-5 my-5 d-flex justify-content-center">
						<div id="rinrose_home_location-info_content" class="w-60 text-center px-3">
							<h3 id="rinrose_home_location-content_title" class="text-primary text-uppercase rinrose_has_animation" data-animation="fadeIn">
								<?php the_sub_field('title'); ?>
							</h3>
							<div id="rinrose_home_location-content_blurb" class="rinrose_has_animation" data-animation="fadeIn">
								<?php echo do_shortcode(get_sub_field('blurb')); ?>
							</div>
						</div>
					</div>
					<div id="rinrose_home-map" class="vh-80 position-relative">
						<div id="rinrose_home-map_box" class="position-absolute w-100 h-100">
							<div id="map"></div>
							<div id="legend" class="bg-white px-3 py-2"><h3 class="visually-hidden">Legend</h3></div>
						</div>
					</div>
				<?php endwhile; ?>
			</section><!-- #rinrose_home-location -->
		<?php endif; ?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php 
		/**
		 * Wellness
		 **/
		if( have_rows('wellness') ): ?>
			<div id="rinrose_home-wellness" class="bg-primary section">
		    	<?php while( have_rows('wellness') ): the_row(); ?>
		    		<a id="wellness" class="d-none anchorPin"></a>
		    		<?php $wellnessBg = wp_get_attachment_image_src(get_sub_field('banner'), 'full', false); ?>
					<div id="rinrose_home-wellness_banner" class="panorama vh-60 d-flex align-items-center justify-content-center bg-pos-bottom" style="background-image: url('<?php echo $wellnessBg[0]; ?>')">
						<div id="rinrose_home-wellness_banner-content" class="container d-flex justify-content-center">
							<div id="rinrose_home-wellness_banner-content_body" class="py-5  px-3 w-70">
								<h2 id="rinrose_home-wellness_banner-content_body-title" class="h3 text-white text-center text-uppercase pb-3 rinrose_has_animation" data-animation="fadeIn">
									<?php the_sub_field('title'); ?>
								</h2>
								<div id="rinrose_home-wellness_banner-content_body-blurb" class="text-white text-center rinrose_has_animation" data-animation="fadeIn">
									<?php echo do_shortcode(get_sub_field('blurb')); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div><!-- #rinrose_home-wellness -->
		<?php endif; ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-## -->
