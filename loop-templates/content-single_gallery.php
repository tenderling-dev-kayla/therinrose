<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('pb-5'); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header pt-5">
		<?php the_title( '<h1 class="entry-title text-center p-5 h3 text-uppercase">', ' Gallery</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content">
		<?php if(have_rows('sets')): ?>
			<div id="rinrose_gallery-single_sets">
				<?php while(have_rows('sets')): the_row(); 
					$i = get_row_index();
					$set = 'rinrose_gallery-single_set'; ?>
					<div id="<?php echo $set.$i; ?>" class="<?php echo $set; ?> py-5">
						<div id="<?php echo $set.$i; ?>-panel1" class="<?php echo $set; ?>-panel px-5 pb-5 mb-5">
							<div class="row justify-content-end">
								<div id="<?php echo $set.$i; ?>-panel1_img1" 
								  class="<?php echo $set; ?>-panel_img col-sm-12 col-md-12 col-lg-9 rinrose_has_animation"
								  data-animation="slideInRight" 
								>
									<?php echo wp_get_attachment_image( get_sub_field('img_1'), 'full', "", array( "class" => "img-fluid" ) ); ?>
								</div>
							</div>
						</div>
						<div id="<?php echo $set.$i; ?>-panel2" class="<?php echo $set; ?>-panel p-5 mb-5">
							<div class="row justify-content-end">
								<div id="<?php echo $set.$i; ?>-panel2_img1" 
								  class="<?php echo $set; ?>-panel_img col-sm-12 col-md-6 col-lg-7 rinrose_has_animation"
								  data-animation="slideInLeft" 
								  data-delay="1s"
								>
									<div class="px-5">
										<?php echo wp_get_attachment_image( get_sub_field('img_2'), 'full', "", array( "class" => "img-fluid" ) ); ?>
									</div>
								</div>
								<div id="<?php echo $set.$i; ?>-panel2_img2" 
								  class="<?php echo $set; ?>-panel_img col-sm-12 col-md-6 col-lg-5 rinrose_has_animation"
								  data-animation="slideInLeft"
								>
									<div class="px-4">
										<?php echo wp_get_attachment_image( get_sub_field('img_3'), 'full', "", array( "class" => "img-fluid" ) ); ?>
									</div>
								</div>
							</div>
						</div>
						<div id="<?php echo $set.$i; ?>-panel3" class="<?php echo $set; ?>-panel py-5 mb-5">
							<div class="row justify-content-start">
								<div id="<?php echo $set.$i; ?>-panel3_img1" 
								  class="<?php echo $set; ?>-panel_img col-sm-12 col-md-12 col-lg-10 rinrose_has_animation"
								  data-animation="slideInLeft"
								>
									<?php echo wp_get_attachment_image( get_sub_field('img_4'), 'full', "", array( "class" => "img-fluid" ) ); ?>
								</div>
							</div>
						</div>
						<div id="<?php echo $set.$i; ?>-panel4" class="<?php echo $set; ?>-panel p-5">
							<div class="row justify-content-center">
								<div id="<?php echo $set.$i; ?>-panel4_img1" 
								  class="<?php echo $set; ?>-panel_img col-sm-12 col-md-10 col-lg-8 rinrose_has_animation"
								  data-animation="slideInRight"
								>
									<?php echo wp_get_attachment_image( get_sub_field('img_5'), 'full', "", array( "class" => "img-fluid" ) ); ?>
								</div>
							</div>
						</div>
					</div>
				<?php endwhile; ?>
			</div>
		<?php else : ?>
			<p class="text-center">No Images Found</p>
		<?php endif; ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
