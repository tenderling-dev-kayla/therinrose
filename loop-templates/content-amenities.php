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
	<header class="entry-header" id="rinrose_amenities-header">
		<?php 
		/**
		 * Splash
		 **/
		if( have_rows('splash') ): ?>
			<section id="rinrose_amenities-splash" class="bg-primary">
			    <?php while( have_rows('splash') ): the_row(); ?>
		    		<?php $splashBg = wp_get_attachment_image_src(get_sub_field('image'), 'full', false); ?>
					<div id="rinrose_amenities-splash_banner" class="vh-full panorama" style="background-image: url(<?php echo $splashBg[0]; ?>)"></div>
					<div id="rinrose_home-intro" class="py-5 bg-white">
						<div class="container py-5 text-center">
							<div class="row justify-content-center">
								<div class="col-12 col-lg-8 rinrose_has_animation" data-animation="fadeIn" data-speed="slow">
									<h1 id="rinrose_home-intro_title" class="px-5 text-center text-primary text-uppercase h3 mb-3 entry-title"><?php the_sub_field('title'); ?></h1>
								</div>
								<div class="col-12 col-lg-9 rinrose_has_animation" data-animation="fadeIn" data-speed="slower">
									<div id="rinrose_home-intro_blurb" class="px-2"><?php echo do_shortcode(get_sub_field('blurb')); ?></div>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</section>
		<?php endif; ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php /**
		 * Gallery
		 **/
		if( have_rows('gallery') ): ?>
			<section id="rinrose_amenities-gallery" class="bg-white" aria-label="Photo Gallery">			
		    	<?php while( have_rows('gallery') ): the_row(); 
		    		$rowID = "rinrose_amenities-gallery_row".get_row_index();
		    		$rowClass = "rinrose_amenities-gallery_row";
		    		if(have_rows('row')): ?>
		    			<div id="<?php echo $rowID; ?>" class="<?php echo $rowClass; ?> d-flex">
		    				<?php while( have_rows('row') ): the_row(); ?>
		    					<div id="<?php echo $rowID; ?>-colLeft" class="<?php echo $rowClass; ?>-col w-50 rinrose_has_animation" data-animation="slideInLeft">
		    						<?php echo rinrose_get_image(get_sub_field('left')); ?>
		    					</div>
		    					<div id="<?php echo $rowID; ?>-colRight" class="<?php echo $rowClass; ?>-col w-50 rinrose_has_animation" data-animation="slideInRight">
		    						<?php echo wp_get_attachment_image( get_sub_field('right'), '4K'); ?>
		    					</div>
		    				<?php endwhile; ?>
		    			</div>
		    		<?php endif;
		    	endwhile; ?>
		    </section>
		<?php endif;

		/**
		 * Tabs
		 * 
		 **/
		if( have_rows('details') ): ?>
			<section id="rinrose_amenities-details" aria-label="Property Amenities">
				<div id="rinrose_amenities-tabs" class="d-flex align-items-stretch">					
					<div class="nav flex-column w-40 bg-primary px-5 py-1 justify-content-evenly" id="rinrose_amenities-tabs_list" role="tablist" aria-orientation="vertical"><!-- .nav-tabs -->
						<?php while( have_rows('details')): the_row(); 
							$rowIndex = get_row_index(); ?>
						    <button
						      class="btn btn-primary text-uppercase text-start w-content px-2 <?php echo ($rowIndex == 1) ? "active" : ""; ?>"
						      id="rinrose_amenities-tabs_list-tab<?php echo $rowIndex; ?>"
						      data-bs-toggle="tab"
						      data-bs-target="#rinrose_amenities-tabs_content-pane<?php echo $rowIndex; ?>"
						      type="button"
						      role="tab"
						      aria-controls="rinrose_amenities-tabs_content-pane<?php echo $rowIndex; ?>"
						      aria-selected="<?php echo ($rowIndex == 1) ? "true" : "false"; ?>"
							>
								<?php the_sub_field('title'); ?>
							</button>
						<?php endwhile; ?>
					</div><!-- .nav-tabs END -->
					<div class="tab-content w-100 bg-primary" id="rinrose_amenities-tabs_content"><!-- .tab-content -->
						<?php while(have_rows('details')): the_row();
							$rowIndex = get_row_index();
							$tabClass = 'rinrose_amenities-tabs_content-pane';
							$tabID = $tabClass.$rowIndex; ?>
					  		<div
					    	  class="tab-pane h-100 fade position-relative <?php echo $tabClass; ?> <?php echo ($rowIndex == 1) ? "show active" : ""; ?>"
					    	  id="<?php echo $tabID; ?>"
					    	  role="tabpanel"
					    	  aria-labelledby="rinrose_amenities-tabs_list-tab<?php echo $rowIndex; ?>"
					    	  tabindex="0"
							>
								<?php echo wp_get_attachment_image( get_sub_field('image'), 'full', "", array( "class" => "rinrose_amenities-tabs_content-page_image position-absolute top-0 start-0 w-100 h-100" ) ); ?>
								<div 
								  id="<?php echo $tabID; ?>_copy" 
								  class="<?php echo $tabClass; ?>_copy overflow-auto h-100 bg-primary px-5 py-4 text-white fs-medium position-relative" 
								>
									<?php echo do_shortcode(get_sub_field('copy')); ?>									
								</div>
					  		</div>
					  	<?php endwhile; ?>
					</div><!-- .tab-content END -->
				</div>
			</section>
		<?php endif; ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer">
		<?php /**
		 * Banner
		 **/
		if( have_rows('banner') ): ?>
			<div id="rinrose_amenities-banner">
				<?php while(have_rows('banner')): the_row(); 
					$bannerBg = wp_get_attachment_image_src(get_sub_field('image'), 'full', false); ?>
					<div id="rinrose_home-amenities_banner" class="vh-80 panorama" style="background-image: url(<?php echo $bannerBg[0]; ?>)"></div>
				<?php endwhile; ?>
			</div>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->


