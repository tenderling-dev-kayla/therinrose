<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();

?>

<div class="wrapper" id="rinrose_404-wrapper">
	<div class="container" id="content" tabindex="-1">
		<div class="row">
			<div class="col-md-12 content-area py-5" id="primary">
				<main class="site-main py-5" id="main">
					<?php if(have_rows('404_page', 'option')):
						while(have_rows('404_page', 'option')): the_row(); ?>
							<section class="error-404 not-found py-5">
								<header class="page-header mb-5">
									<h1 class="page-title text-center display-1 text-primary"><?php the_sub_field('title'); ?></h1>
								</header><!-- .page-header -->
								<div class="page-content text-center">
									<div id="rinrose_404-copy" class="text-center pb-2">
										<?php echo do_shortcode(get_sub_field('copy')); ?>
									</div> 
									<?php $btn = get_sub_field('button');
									$btn_args = [
										'href' => $btn['link'],
										'label' => $btn['label'],
										'target' => $btn['target'],
										'class' => 'btn btn-outline-primary text-uppercase',
										'id'	=>	'rinrose_404-btn',
									];
									the_rinrose_btn_link($btn_args); ?>
								</div><!-- .page-content -->
							</section><!-- .error-404 -->
						<?php endwhile;
					endif; ?>
				</main><!-- #main -->
			</div><!-- #primary -->
		</div><!-- .row -->
	</div><!-- #content -->
</div><!-- #error-404-wrapper -->

<?php
get_footer();
