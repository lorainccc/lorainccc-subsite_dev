<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MyLCCC_Theme
 */

get_header(); 

?>
<!-- adding spacer -->
<div class="row">
	<div class="small-12 medium-12 large-12 columns">&nbsp;</div>
</div>
<!-- end spacer row -->
	<div class="row main">
<div class="small-12 medium-12 large-12 columns contentdiv">
		<div class="small-12 medium-8 large-8 columns nopadding content-container">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php
		while ( have_posts() ) : the_post();

			get_template_part( 'template-parts/content', 'lccc-event' );

		endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->
	</div>
		<div class="small-12 medium-4 large-4 columns sidebarcontainer">
<?php
get_sidebar();?>
	</div>
</div>
<?php
get_footer();
