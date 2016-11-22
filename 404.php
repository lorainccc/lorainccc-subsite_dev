<?php
/**
 * The template for displaying 404 pages (Not Found)
 *
 * @package lorainccc-subsite
 */

get_header(); ?>
<div class="row page-content">
<div class="medium-4 large-4 columns hide-for-small-only">
		
	</div>
	</div>
			
	<div class="small-12 medium-8 large-8 columns">		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			$domain = 'http://' . $_SERVER['SERVER_NAME'];
			$404pagefeed = new Endpoint( $domain.'/wp-json/wp/v2/pages?filter[pagename]=404-content' );
			$pages = $404pagefeed->get_posts();
		
			?>
			testing
		</main><!-- #main -->
	</div><!-- #primary -->
</div>	

<?php get_footer(); ?>

