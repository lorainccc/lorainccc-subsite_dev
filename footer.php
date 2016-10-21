<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package LCCC Framework
 */
?>
	</div><!-- #content -->

	<footer id="colophon" class="small-12 medium-12 large-12 columns site-footer" role="contentinfo">
		  <div class="row text-center medium-text-left">
-
    <div class="large-3 medium-3 columns">
      <h2>Contact LCCC</h2>
      <p>1005 N Abbe Rd<br />
        Elyria, OH 44035<br />
        1-800-995-LCCC (5222)<br />
							 or (440) 365-5222<br />
        <a href="mailto:info@lorainccc.edu">info@lorainccc.edu</a> </p>
      <ul class="underline">
        <li><a href="/about/map-and-directions-to-lccc/">Map and Directions</a></li>
        <li><a href="/about/contact-lorain-county-community-college/">Contact LCCC</a></li>
        <li><a href="#">Visit LCCC</a></li>
      </ul>
    </div>
    <div class="large-3 medium-3 columns">
      <h2>Campus Locations</h2>
  <?php if ( has_nav_menu( 'footer-campus-location-nav' ) ) : ?>
		<nav id="site-navigation" class="footer-navigation" role="navigation">
			<?php
				// Primary Footer navigation menu.
				wp_nav_menu( array(
					'menu_class'     => 'underline',
					'theme_location' => 'footer-campus-location-nav',
				) );
			?>
		</nav><!-- .main-navigation -->
	<?php endif; ?>
    </div>
    <div class="large-3 medium-3 columns">
      <h2>Quick Links</h2>
	<?php if ( has_nav_menu( 'footer-quicklinks-nav' ) ) : ?>
		<nav id="site-navigation" class="footer-navigation" role="navigation">
			<?php
				// Primary Footer navigation menu.
				wp_nav_menu( array(
					'menu_class'     => 'underline',
					'theme_location' => 'footer-quicklinks-nav',
				) );
			?>
		</nav><!-- .main-navigation -->
	<?php endif; ?>
    </div>
  </div>
</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
