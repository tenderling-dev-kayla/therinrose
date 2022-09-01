<?php
/**
 * The template for displaying all single posts
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
?>

<div class="wrapper" id="rinrose_gallery-single_wrapper">
	<div class="container-fluid" id="content" tabindex="-1">
		<div class="row">
			<main class="site-main px-0" id="main">
				<?php while(have_posts()): the_post();
					get_template_part( 'loop-templates/content', 'single_gallery' );
				endwhile; ?>
			</main><!-- #main -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #single-wrapper -->

<?php
get_footer();
