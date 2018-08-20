<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

		if ( is_single() ) {
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row'); ?>>
	<header class="entry-header">
		<?php	
				the_title( '<h1 class="entry-title">', '</h1>' );
		?>
			</header><!-- .entry-header -->
		<div class="entry-content">
			<?php the_content(); ?>
	</div>
	<?php
			} else {
			?>
<article id="post-<?php the_ID(); ?>" <?php post_class('row student-news-list'); ?>>
	<header class="entry-header">
		<?php
				the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
   ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_excerpt();
		?>
	</div><!-- .entry-content -->
		<?php
			}
		?>
</article><!-- #post-## -->
