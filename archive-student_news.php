<?php

/**
 * The template for displaying Student News Posts.
 *
	*
	*
 *
 * 
 */

get_header(); ?>
<div class="small-12 medium-12 large-12 columns gateway-header hide-for-print">
	<?php $featured_image = wp_get_attachment_image_src( get_option( 'lc_site_featured_image_id', '' ), 'large' ); ?>
	<img src="<?php echo $featured_image[0] ?>" width="<?php echo $featured_image[1] ?>" height="<?php echo $featured_image[2] ?>" class="attachment-post-thumbnail size-post-thumbnail wp-post-image">	
	</div>
<div class="row page-content">
<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
	<div class="small-12 medium-8 large-8 columns">		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<h1>Student News</h1>
			<br/> 
		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'studentnews' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
		<div style="float:left;"><?php previous_posts_link( '&laquo; Recent News' ) ?></div>
		<div style="float:right;"><?php next_posts_link( '&raquo; Previous News' ) ?></div>
		<div style="clear:both;"></div>
	</div><!-- #primary -->
</div>
<div class="small-12 medium-4 large-4 columns"	>
		<?php if ( is_active_sidebar( 'lccc-events-sidebar' ) ) { ?>
			<div class="small-12 medium-12 large-12 columns">
				<?php dynamic_sidebar( 'lccc-events-sidebar' ); ?>
			</div>	
		<?php } ?>
<div>&nbsp;</div>
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

<?php
get_footer();
?>