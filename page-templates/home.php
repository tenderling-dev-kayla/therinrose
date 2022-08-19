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
								<h1 id="rinrose_home-intro_title" class="px-5 text-primary display-1 mb-5"><?php the_sub_field('title'); ?></h1>
							</div>
							<div class="col-12 col-lg-9">
								<div id="rinrose_home-intro_blurb"><?php echo do_shortcode(get_sub_field('blurb')); ?></div>
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
					<div id="rinrose_home-amenities_body">
						<div id="rinrose_home-amenities_body-left">
							<?php echo wp_get_attachment_image( get_sub_field('left_image'), 'full', "", array( "class" => "img-fluid", "id" => "rinrose_home-amenities_body-left_img", ) ); ?>
						</div>
						<div id="rinrose_home-amenities_body-right">
							<div id="rinrose_home-amenities_body-right_content">
								<h2 id="rinrose_home_amenities_body-right_content-title"><?php the_sub_field('title'); ?></h2>
								<?php if(have_rows('button')):
									while(have_rows('button')): the_row(); ?>
										<div id="rinrose_home-amenities_body-right_content-button">
											<a class="btn btn-outline-primary" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a>
										</div>
									<?php endwhile;
								endif; ?>
							</div>
							<?php echo wp_get_attachment_image( get_sub_field('right_image'), 'full', "", array( "class" => "img-fluid", "id" => "rinrose_home-amenities_body-right_img" ) ); ?>
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
				<section id="rinrose_home_residences">
					<div class="container-fluid">
						<div id="rinrose_home_residences-banner">
							<?php echo wp_get_attachment_image( get_sub_field('banner'), 'full', "", array( "class" => "img-responsive" ) ); ?>
						</div>
						<h2 id="rinrose_home_residences-title"><?php the_sub_field('title'); ?></h2>
						<div id="rinrose_home_residences-blurb"><?php echo do_shortcode(get_sub_field('blurb')); ?></div>
						<div id="rinrise_home_residences-grid">
							<h3 id="rinrose_home_residences-grid_title"><?php the_sub_field('grid_title'); ?></h3>
							<div id="rinrise_home_residences-grid_display">
								<p>Residences CPT Grid query here. Show Featured. 3 Wide (Type, name, plan art, button)</p>
							</div>
							<?php if(have_rows('button')):
								while(have_rows('button')): the_row(); ?>
									<div id="rinrose_home_residences-grid_button">
										<a class="btn btn-outline-primary" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a>
									</div>
								<?php endwhile;
							endif; ?>
						</div>
					</div>
				</section>
			<?php endwhile;
		endif;

		/**
		 * Location
		 **/
		if( have_rows('location') ):
		    while( have_rows('location') ): the_row(); ?>
				<section id="rinrose_home_location">
					<div class="container-fluid">
						<div id="rinrose_home_location-banner">
							<div id="rinrose_home_location-banner_image">
								<?php echo wp_get_attachment_image( get_sub_field('banner'), 'full', "", array( "class" => "img-responsive" ) ); ?>
							</div>
							<h3 id="rinrose_home_location-banner_text"><?php the_sub_field('banner_text'); ?></h3>
						</div>
						<div id="rinrose_home_location-content">
							<h2 id="rinrose_home_location-content_title"><?php the_sub_field('title'); ?></h2>
							<div id="rinrose_home_location-content_blurb"><?php echo do_shortcode(get_sub_field('blurb')); ?></div>
						</div>
						<div id="rinrose_home_location-map">
							<p>Google Map with rinrose iconography and possible styling here</p>
							<p>Address: <?php the_sub_field('address'); ?></p>
						</div>
					</div>
				</section>
			<?php endwhile;
		endif;

		/**
		 * Wellness
		 **/
		if( have_rows('wellness') ):
		    while( have_rows('wellness') ): the_row(); ?>
		    	<section id="rinrose_home_wellness">
		    		<a id="wellness" class="d-none anchorPin"></a>
					<div id="rinrose_home_wellness-banner" class="container-fluid">
						<div id="rinrose_home_wellness-banner_image">
							<?php echo wp_get_attachment_image( get_sub_field('banner'), 'full', "", array( "class" => "img-responsive" ) ); ?>
						</div>
						<h2 id="rinrose_home_wellness-banner_title"><?php the_sub_field('title'); ?></h2>
						<div id="rinrose_home_wellness-banner_blurb"><?php echo do_shortcode(get_sub_field('blurb')); ?></div>
					</div>
				</section>
			<?php endwhile;
		endif;
		?>
	</div><!-- #content -->
</div><!-- #rinrose_home-wrapper -->

<?php
get_footer();