<?php
/**
 * Template Name: Department/Division Page
 *
 * @package WordPress
 * @subpackage lorainccc
 * @since Lorainccc 1.0
 */
get_header(); ?>
<div class="small-12 medium-12 large-12 columns gateway-header hide-for-print">
	<?php the_post_thumbnail(); ?>
	</div>
<div class="row page-content">
 <div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
<div class="medium-4 large-4 columns hide-for-small-only hide-for-print">
	<div class="small-12 medium-12 large-12 columns sidebar-widget">
	<?php	if ( has_nav_menu( 'left-nav' ) ) : ?>
	 <div class="small-12 medium-12 large-12 columns sidebar-menu-header hide-for-print">
   <h3><?php echo bloginfo('the-title'); ?></h3>
  </div>
 <div id="secondary" class="medium-12 columns secondary nopadding">
		<?php if ( has_nav_menu( 'left-nav' ) ) : ?>
			<nav id="site-navigation" class="main-navigation hide-for-print" role="navigation">
				<?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'left-nav',
					) );
				?>
			</nav><!-- .main-navigation -->
				<?php endif; ?>
		<?php endif; ?>
		
	</div>
	</div>
	<div class="small-12 medium-12 large-12 columns">
			<?php if ( is_active_sidebar( 'lccc-events-sidebar' ) ) { ?>
			<div class="small-12 medium-12 large-12 columns">
				<?php dynamic_sidebar( 'lccc-events-sidebar' ); ?>
			</div>	
			<?php } ?>
	<?php if ( is_active_sidebar( 'lccc-badges-sidebar' ) ) { ?>
			<div class="small-12 medium-12 large-12 columns">			
			<?php dynamic_sidebar( 'lccc-badges-sidebar' ); ?>
			</div>
	<?php } ?>
	</div>
	</div>			
	<div class="small-12 medium-8 large-8 columns">		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'deptdiv' ); ?>

			<?php endwhile; // end of the loop. ?>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>	
	
</div>
<?php get_footer(); ?>
