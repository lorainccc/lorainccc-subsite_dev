<?php
/**
 * 
 *
 * @package WordPress
 * @subpackage lorainccc
 * @since Lorainccc 1.0
 */
get_header(); ?>
<div class="row page-content">
	<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
	</div>
		
	<div class="small-12 medium-12 large-12 columns">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
<!--			<ul class="facdir-listing-headings">
				<li class="facdir-list-sm facdir-list-heading">Last Name</li>
				<li class="facdir-list-sm facdir-list-heading">First Name</li>
				<li class="facdir-list-lg facdir-list-heading">Department</li>
				<li class="facdir-list-sm facdir-list-heading">Office</li>
				<li class="facdir-list-lg facdir-list-heading">Phone Number</li>
				<li class="facdir-list-lg facdir-list-heading">Email</li>
			</ul>
			<ul class="facdir-listing-content">-->
		<?php while ( have_posts() ) : the_post();

				 get_template_part( 'template-parts/content', 'facdirectoryphoto' );

			     endwhile; // end of the loop. ?>
<!--			</ul>-->
		</main><!-- #main -->
	</div><!-- #primary -->
</div>
<?php
 //Jetpack Sharing Buttons
if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
}
 ?>
</div>
<?php get_footer(); ?>