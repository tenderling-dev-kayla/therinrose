<?php
/**
* Template Name: Amenities
*
*/

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>
<div class="wrapper" id="rinrose_amenities-wrapper">
	<div class="container-fluid" id="content">
		<div class="row">
			<main class="site-main px-0" id="main">
				<?php while (have_posts()): the_post();
					get_template_part( 'loop-templates/content', 'amenities' );
				endwhile; ?>
			</main><!-- #main -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #rinrose_home-wrapper -->

<?php
get_footer();