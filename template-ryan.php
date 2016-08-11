<?php
/*
 Template Name: Ryan
 *
 * @package LCCC Framework
 */

get_header(); ?>

<div class="page-content">
  <div class="column row breadcrumb-container">
    <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
  </div>
  <div class="row">
    <aside class="medium-4 columns show-for-medium" role="complementary">
      <div class="sidebar-widget">
        <?php	if ( has_nav_menu( 'left-nav' ) ) : ?>
        <div class="sidebar-menu-header">
          <h3><?php echo bloginfo('the-title'); ?></h3>
        </div>
        <div id="secondary" class="secondary">
          <?php if ( has_nav_menu( 'left-nav' ) ) : ?>
          <nav id="site-navigation" class="main-navigation" role="navigation">
            <?php
					// Primary navigation menu.
					wp_nav_menu( array(
						'menu_class'     => 'nav-menu',
						'theme_location' => 'left-nav',
					) );
				?>
          </nav>
          <!-- .main-navigation -->
          <?php endif; ?>
          <?php endif; ?>
        </div>
      </div>
      <div class="small-12 medium-12 large-12 columns">
				<?php //if ( is_active_sidebar( 'lccc-events-sidebar' ) ) { ?>
							<?php //dynamic_sidebar( 'lccc-events-sidebar' ); ?>
				<?php //} ?>
	</div>
    </aside>
    <div class="medium-8 columns main-right">
      <div id="primary" class="content-area">
        <main id="main" class="site-main" role="main">
          <?php while ( have_posts() ) : the_post(); ?>
          <?php get_template_part( 'template-parts/content', 'page' ); ?>
          <?php endwhile; // end of the loop. ?>
        </main>
        <!-- #main --> 
      </div>
      <!-- #primary --> 
    </div>
  </div>
  <!-- end row --> 
</div>
<!-- end .page-content -->
<!-- Ryan's styles to be added to main stylesheet -->
<style>

/* 
Remove rule on line 1001 in styles.scss that places 0 padding on aside.columns
The rule below is just overriding and adding padding that should be there originally
*/

@media screen and (min-width: 40em) {
aside.columns {
    padding-right: .9375rem !important;
    padding-left: .9375rem !important;
}
}

/* 
The below rule is only to override the existing rule for the .breadcrumb-container
I would recommend changing the existing .breadcrumb-container rule to:
.breadcrumb-container {
    padding-top: 2rem;
    padding-bottom: 2rem;
    font-size: .8125rem;
}

If you don't want those styles you can adjust, but I would leave out the padding-left: 2rem;
 */

.breadcrumb-container {
    padding: 2rem .9375rem !important;
    font-size: .8125rem !important;
}

.sidebar-widget {
    padding-top: 0px !important;
    margin: 1rem 0 3rem 0 !important;
}

header.entry-header {
    padding-top: 0px !important;
}

.main-navigation ul:not(.sub-menu) > li {
    
    border: 1px solid #dcdcdc !important;
    box-shadow: inset 0 0 10px #dcdcdc !important;
    padding: .75rem 2rem .75rem 1rem !important;
}

.main-navigation ul:not(.sub-menu) > li > a {
    font-size: 1rem !important;
    color: #0055a5 !important;
    font-weight: 700 !important;
    
}

.dropdown-toggle {
    top: 10px !important;
    right: 4px;
    /* background-color: rgba(51,51,51,0.1) !important; */
}	

.main-navigation ul ul {
    margin-left: 0 !important;
    padding-left: 1rem;
    
}

.main-navigation ul ul li {
    border-top: 1px solid #dcdcdc !important;
    padding-top: .5rem;
    padding-bottom: .5rem;
}

.main-navigation ul ul li a {
	
	color: #0055a5 !important;
}

/* 
   In the content I noticed bulleted lists had a 2rem top margin. 
   So I just added this rule, feel free to omit or add if you like how they look
   on the checklist for registration page
*/

ul {
    margin-top: 0px !important;
}

</style>
<!-- end Ryan styles -->
<?php get_footer(); ?>
