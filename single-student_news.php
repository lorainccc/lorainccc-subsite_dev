<?php
/**
 * The template for displaying all single posts.
 *
 * @package LCCC Framework
 */

get_header(); ?>
<div class="small-12 medium-12 large-12 columns gateway-header hide-for-print">
	<?php the_post_thumbnail(); ?>
	</div>
<div class="row page-content">
<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
	<div class="small-12 medium-8 large-8 columns">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();

				 get_template_part( 'template-parts/content', 'single' );

			     endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<div class="small-12 medium-4 large-4 columns">
  <?php if ( is_active_sidebar( 'lccc-badges-sidebar' ) ) { ?>
			<div class="small-12 medium-12 large-12 columns hide-for-print">
			<?php dynamic_sidebar( 'lccc-badges-sidebar' ); ?>
			</div>
	<?php } ?>	
</div>
<?php
 //Jetpack Sharing Buttons
if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
}
 ?>
</div>
<?php get_footer(); ?>