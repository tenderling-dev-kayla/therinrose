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
		<?php the_title( '<h1 class="entry-title text-center p-5 display-1 text-primary">', '</h1>' ); ?>
	</header><!-- .entry-header -->
	<div class="entry-content pb-5">
		<?php the_content(); ?>
	</div><!-- .entry-content -->
</article><!-- #post-## -->
