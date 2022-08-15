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
		    while( have_rows('splash') ): the_row(); ?>
				<section id="rinrose_home_splash">
					<div class="container-fluid">
						<p>Splash video with art</p>
						<p>Video: <?php the_sub_field('video'); ?></p>
						<p>Mobile Video: <?php the_sub_field('mobile_video'); ?></p>
					</div>
				</section>
			<?php endwhile;
		endif;

		/**
		 * Intro
		 **/
		if( have_rows('intro') ):
		    while( have_rows('intro') ): the_row(); ?>
				<section id="rinrose_home_intro">
					<div class="container">
						<h1 id="rinrose_home_intro-title"><?php the_sub_field('title'); ?></h1>
						<div id="rinrose_home_intro-blurb"><?php echo do_shortcode(get_sub_field('blurb')); ?></div>
					</div>
				</section>
			<?php endwhile;
		endif;

		/**
		 * Amenities
		 **/
		if( have_rows('amenities') ):
		    while( have_rows('amenities') ): the_row(); ?>
				<section id="rinrose_home_amenities">
					<div class="container-fluid">
						<div id="rinrose_home_amenities-banner">
							<?php echo wp_get_attachment_image( get_sub_field('banner'), 'full', "", array( "class" => "img-responsive" ) ); ?>
						</div>
						<div id="rinrose_home_amenities-leftImg">
							<?php echo wp_get_attachment_image( get_sub_field('left_image'), 'full', "", array( "class" => "img-responsive" ) ); ?>
						</div>
						<div id="rinrose_home_amenities-content">
							<h2 id="rinrose_home_amenities-content_title"><?php the_sub_field('title'); ?></h2>
							<?php if(have_rows('button')):
								while(have_rows('button')): the_row(); ?>
									<div id="rinrose_home_amenities-content_button">
										<a class="btn btn-outline-primary" href="<?php the_sub_field('link'); ?>"><?php the_sub_field('label'); ?></a>
									</div>
								<?php endwhile;
							endif; ?>
						</div>
						<div id="rinrose_home_amenities-rightImg">
							<?php echo wp_get_attachment_image( get_sub_field('right_image'), 'full', "", array( "class" => "img-responsive" ) ); ?>
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