<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('py-5'); ?> id="post-<?php the_ID(); ?>">
	<header class="entry-header rinrose_has_animation" data-animation="fadeIn">
		<?php the_title('<h2 class="entry-title h3 text-uppercase text-center text-primary">','</h2>'); ?>
	</header><!-- .entry-header -->
	<div class="entry-content rinrose_gallery-archive_single py-5">
		<?php if(have_rows('sets')):
			while(have_rows('sets')): the_row(); ?>
				<div class="row">
					<?php $img = 1;
					$delay = 0;
					while($img <= 5) : ?>	
						<div class="col rinrose_gallery-archive_single-col rinrose_has_animation" 
						  data-animation="fadeIn"
						  data-position="bottom"
						  data-delay="<?php echo $delay; ?>s">
							<div class="rinrose_gallery-archive_single-col_image ratio ratio-1x1">
								<?php echo wp_get_attachment_image( get_sub_field('img_'.$img), 'large', "", array( "class" => "img-fluid" ) ); ?>
							</div>
						</div>
					<?php 
					$img++;
					$delay++;
					endwhile; ?>
				</div>
				<?php break;
			endwhile;
		endif; ?>
	</div><!-- .entry-content -->
	<footer class="entry-footer rinrose_has_animation" data-animation="fadeIn">
		<div class="rinrose_gallery-archive_single-button d-flex justify-content-center align-items-center pt-3 pb-5">
			<?php $btn_args = [
				'href' => get_permalink(),
				'label' => 'View All',
				'class' => 'rinrose_gallery-button btn text-uppercase btn-outline-primary m-2',
			];
			the_rinrose_btn_link($btn_args); ?>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
