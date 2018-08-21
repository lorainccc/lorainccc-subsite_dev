<?php
/**
 * Template Name: LCCC President
 *
 * @package LCCC Framework
 */

get_header(); ?>
<div class="small-12 columns gateway-header hide-for-print">
	<?php the_post_thumbnail(); ?>
	</div>
<div class="row page-content">
<div class="small-12 columns nopadding show-for-small-only" style="background:#000;"><!--Begin Mobile Side Menu -->
 <div class="small-12 medium-12 large-12 columns nopadding">
  <div class="row show-for-small-only sub-mobile-menu-row hide-for-print" style="background:#000; max-width:100%;">
   <div class="small-2 columns" style="padding-top: 0.5rem;padding-left: 1.625rem;"> <span data-responsive-toggle="sub-responsive-menu" data-hide-for="medium">
     <button class="menu-icon" type="button" data-toggle></button>
     </span> </div>
   <div class="small-10 columns nopadding hide-for-print">
    <h3 class="sub-mobile-menu-header" style="padding-top: 6px;
   padding-left: 8px;color:#ffffff ;"><?php echo bloginfo('the-title'); ?></h3></div>
  </div>
  <div id="sub-responsive-menu" class="show-for-small-only hide-for-print">
   <ul class="vertical menu" data-drilldown data-parent-link="true">

    <?php     
    
    wp_nav_menu(array(
        'container' => false,
        'menu' => __( 'Drill Menu', 'textdomain' ),
        'menu_class' => 'vertical menu',
        'theme_location' => 'left-nav',
        'menu_id' => 'sub-mobile-primary-menu', //Recommend setting this to false, but if you need a fallback...
        'fallback_cb' => 'lc_drill_menu_fallback',
        'walker' => new lc_drill_menu_walker(),
           ));
                    ?>

   </ul>
  </div>
 </div>
</div><!--End Mobile Side Menu -->
<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?>
</div>
<div class="medium-4 large-4 columns hide-for-small-only hide-for-print">
	<div class="small-12 medium-12 large-12 columns sidebar-widget">
	<?php	if ( has_nav_menu( 'left-nav' ) ) : ?>
	 <div class="small-12 medium-12 large-12 columns sidebar-menu-header">
   <h3><?php echo bloginfo('the-title'); ?></h3>
  </div>
 <div id="secondary" class="medium-12 columns secondary nopadding">
		<?php if ( has_nav_menu( 'left-nav' ) ) : ?>
			<nav id="site-navigation" class="main-navigation" role="navigation">
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
  <?php if ( is_active_sidebar( 'lccc-badges-sidebar' ) ) { ?>
			<div class="small-12 medium-12 large-12 columns hide-for-print">
			<?php dynamic_sidebar( 'lccc-badges-sidebar' ); ?>
			</div>
	<?php } ?>
	</div>
	</div>
 	<!--<div class="small-12 medium-12 large-12 columns">
				<?php //if ( is_active_sidebar( 'lccc-events-sidebar' ) ) { ?>
							<?php //dynamic_sidebar( 'lccc-events-sidebar' ); ?>
				<?php //} ?>
	</div>-->

	</div>
	<div class="small-12 medium-8 large-8 columns">
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
		<?php while ( have_posts() ) : the_post();

				 get_template_part( 'template-parts/content', 'page' );

			     endwhile; // end of the loop. ?>

		</main><!-- #main -->
  </div>
  
  <section class="section-divider">
  <div class="row">
   <div class="small-12 columns">
    <h2 style="margin: 0 0 25px 0;">Upcoming Events</h2>
   </div>
  </div>
  <?php
   $presidentevents = '';
   $domain = 'http://' . $_SERVER['SERVER_NAME'];
   // ID of the President Category in MyLCCC (Production is 51)
   $catId = 51;
   $presidentevents = new Endpoint( $domain . '/mylccc/wp-json/wp/v2/lccc_events?event_categories=' . $catId . '&per_page=3');
   
   $multi = new MultiBlog( 1 );
   $multi->add_endpoint ( $presidentevents );
   
   $event_posts = $multi->get_posts();
   if (empty($event_posts)){
    echo 'No Posts Found!';
   }else{
    
    foreach ( $event_posts as $event_post ){
     echo '<div class="row">';
      echo ' <div class="small-12 medium-12 large-1 columns calendar-small">';
      $date = date_create($event_post->event_start_date);
      $post_month = date_format($date, 'm');
      echo ' <p class="month">'.$event_post->event_start_date_month.'</p>';
      echo ' <p class="day">'.$event_post->event_start_date_day.'</p>';
      echo ' </div>';
      echo ' <div class="small-12 large-11 columns">';
     ?>
     <h2><a href="<?php echo $event_post->link; ?>"><?php echo $event_post->title->rendered; ?></a></h2><?php

      echo ' <p>' . $event_post->excerpt->rendered . '</p>' ;
      echo '</div>';
     echo '</div>';
    }
    echo '<p style="text-align:center;"><a href="/mylccc/event-categories/president/" class="button">View all events</a></p>';
   }   
   
   ?>
  </section>
  <!-- Begin Social Media Grid -->
  <section class="section-divider">
   <div class="row">
    <div class="small-12 columns">
     <h2 style="margin: 0 0 25px 0;">Connect with the President</h2>
    </div>
   </div>
   <div class="row">
    <?php if ( is_active_sidebar( 'lccc-president-twitter-sidebar' ) ) { ?>
    <div class="small-12 columns">
    <?php dynamic_sidebar( 'lccc-president-twitter-sidebar' ); ?>
    </div>
  <?php } ?>  
   </div>
  <div class="row">
   <div class="small-12">
    &nbsp;
   </div>
  </div>
  <div class="row medium-up-4">
   <?php 
   $lc_facebook_link = get_option( 'lc_facebook_link', '' );
   $lc_twitter_link = get_option( 'lc_twitter_link', '' );
   $lc_instagram_link = get_option( 'lc_instagram_link', '' );
   $lc_blog_link = get_option( 'lc_blog_link', '' );
   
?>
  <div class="row small-up-2 medium-up-4">
   <?php
   if ($lc_facebook_link != ''){
   ?>
    <div class="column-block small-centered column" style="margin: 10px 0;">
     <a href="<?php $lc_facebook_link ?>" title="Follow LCCC on Facebook" target="_blank">
      <!-- <div style="background: #0055a5; width: 125px; height: 125px; padding:20px; border-radius: 65px; margin:0 auto;"> -->
      <div style="width: 125px; height: 125px; padding:20px; margin:0 auto;">
      <img src="/wp-content/themes/lorainccc-subsite/images/icons/facebook_lc_blue.svg" border="0" />
     </div>
     </a>
    </div>
   <?php 
    }
   
   if ($lc_twitter_link != ''){
   ?>   
    <div class="column-block small-centered column" style="margin: 10px 0;">
     <a href="<?php $lc_twitter_link ?>" title="Follow the president on Twitter" target="_blank">
      <div style="width: 125px; height: 125px; padding:20px; margin:0 auto;">
        <img src="/wp-content/themes/lorainccc-subsite/images/icons/twitter_lc_blue.svg" border="0" />
       </div>
      </a>
    </div>
    <?php 
    }
   
   if ($lc_instagram_link != ''){
   ?> 
    <div class="column-block small-centered column" style="margin: 10px 0;">
     <a href="<?php $lc_instagram_link ?>" title="Follow the president on Instagram" target="_blank">
       <div style="width: 125px; height: 125px; padding:20px; margin:0 auto;">
       <img src="/wp-content/themes/lorainccc-subsite/images/icons/instagram_lc_blue.svg" border="0" />
      </div>
     </a>
    </div>
    <?php 
    }
   
   if ($lc_blog_link != ''){
   ?>    
    <div class="column-block small-centered column" style="margin: 30px 0;">
     <a href="<?php $lc_blog_link ?>" title="Follow the president's blog">
      <div style="background: #0055a5; width: 85px; height: 85px; padding:15px 5px 0 5px; border-radius: 65px; margin:0 auto;">
       <img src="/wp-content/themes/lorainccc-subsite/images/icons/lccc_white.svg" border="0" />
      </div>
     </a>
    </div>
  </div>
  <?php 
   }
   ?>
  </div>
  <!-- End Social Media Grid -->
  </section>
  <section class="section-divider">
  <div class="row">
   <div class="small-12 medium-8 columns">
    <h2 style="margin: 0 0 25px 0;">President’s blog</h2>
   </div>
  </div>
  <!-- Start Blog Post List -->
  <?php
   $args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 3,
   );
  $the_query = new WP_Query( $args );
  
  if ( $the_query->have_posts() ){
   while( $the_query->have_posts() ){
    $the_query->the_post();
     echo '<div class="row section-divider-btm">';
     echo ' <div class="small-12 medium-3 columns text-center">';
     echo ' <a href="' . get_the_permalink() . '">';
     echo the_post_thumbnail();
     echo ' </a>';
     echo ' </div>';
     echo ' <div class="small-12 medium-9 columns">';
     echo '  <h2><a href="' .get_the_permalink() . '">' . get_the_title() . '</a></h2>';
     echo '  <p>' . get_the_excerpt() . '</p>';
     echo '  <p><a href="' .get_the_permalink() . '">Read more about ' . get_the_title() . '</a></p>';
     echo ' </div>';
     echo '</div>';
    }
  }
  ?>  
  <p style="text-align:center;"><a class="button" href="blog/">View all posts</a></p>
  </section>
  <!-- End Blog Post List -->
  <!-- Begin In the News Section -->
  <section class="section-divider">
   <div class="row">
    <?php if ( is_active_sidebar( ' lccc-president-in-news' ) ) { ?>
			<div class="small-12 medium-8 columns">
			<?php dynamic_sidebar( ' lccc-president-in-news' ); ?>
       </div>
	<?php } ?>  
    </div>
    <p style="text-align:center;"><a href="news/" class="button">View more in the news</a></p>
   </section>
  <!-- End In the News Section -->
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

