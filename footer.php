<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

?>

<section id="rinrose_footer">
	<footer class="site-footer" id="colophon">
		<?php get_template_part( 'global-templates/footer', 'rinrose' ); ?>
	</footer><!-- #colophon -->
</div><!-- wrapper end -->

</div><!-- #page we need this extra closing tag here -->

<?php wp_footer(); ?>

</body>

</html>

