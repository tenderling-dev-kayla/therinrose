<?php
/**
 * The template for displaying Gallery archive pages
 *
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="rinrose_gallery-archive_wrapper">
	<div class="container-fluid" id="content" tabindex="-1">
		<div class="row">
			<main class="site-main px-0" id="main">
				<?php if(have_rows('gallery', 'options')):
					while(have_rows('gallery', 'options')): the_row(); ?>
						<header class="page-header">
							<?php $splashBg = wp_get_attachment_image_src(get_sub_field('image'), 'full', false); ?>
							<div id="rinrose_gallery-archive_splash" class="vh-80 d-flex align-items-end px-5 py-3 bg-pos-bottom panorama" style="background-image:  url('<?php echo $splashBg[0]; ?>')">
								<h1 id="rinrose_home_residences-title" class="display-1 text-white px-5 rinrose_has_animation" data-animation="fadeIn">
									<?php the_sub_field('heading'); ?>
								</h1>
							</div>							
						</header><!-- .page-header -->
					<?php endwhile;
				endif; ?>
				<div class="entry-content container py-5">
					<?php if ( have_posts() ) :
						while (have_posts()): the_post();
							get_template_part( 'loop-templates/content', 'gallery_grid' );
						endwhile;
					else :
						get_template_part( 'loop-templates/content', 'gallery_none' );
					endif; ?>
				</div>
			</main><!-- #main -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #archive-wrapper -->

<?php
get_footer();
