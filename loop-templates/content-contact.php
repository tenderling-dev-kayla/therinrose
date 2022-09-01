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
	<div class="container py-5">
		<header class="entry-header pt-5">
			<?php the_title( '<h1 class="entry-title text-center p-5 pb-2 display-1 text-primary">', '</h1>' ); ?>
		</header><!-- .entry-header -->
		<div class="entry-content pb-5">
			<div class="row d-flex justify-content-center align-items-center px-3">
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-7">
					<?php the_content(); ?>
				</div>
			</div>
			<div class="d-flex justify-content-center align-items-center pt-3 pb-5">
				<?php if(have_rows('buttons')): ?>
					<?php while(have_rows('buttons')): the_row(); ?>
						<a  
						  class="rinrose_contact-button btn text-uppercase btn-outline-primary m-2" 
						  href="<?php the_sub_field('link'); ?>" 
						  target="<?php the_sub_field('target'); ?>"
						>
							<?php the_sub_field('text'); ?>
						</a>
					<?php endwhile;
				endif; ?>
			</div>
		</div><!-- .entry-content -->
	</div>
	<footer class="entry-footer pt-5">
		<div id="rinrose_contact-map" class="vh-80 position-relative">
			<div id="rinrose_contact-map_box" class="position-absolute w-100 h-100">
				<div id="map"></div>
				<div id="legend" class="bg-white px-3 py-2"><h3 class="visually-hidden">Legend</h3></div>
			</div>
		</div>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->

