<?php
/**
 * Template Name: Week
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */

get_header(); ?>
<div class="row page-content">
<div class="small-12 columns nopadding show-for-small-only"><!--Begin Mobile Side Menu -->
 <div class="small-12 medium-12 large-12 columns nopadding">
  <div class="row show-for-small-only sub-mobile-menu-row hide-for-print" style="background:#000;">
   <div class="small-2 columns" style="padding-top: 0.5rem;padding-left: 1.625rem;"> <span data-responsive-toggle="sub-responsive-menu" data-hide-for="medium">
     <button class="menu-icon" type="button" data-toggle></button>
     </span> </div>
   <div class="small-10 columns nopadding hide-for-print">
    <h3 class="sub-mobile-menu-header" style="padding-top: 6px;
   padding-left: 8px;color:#ffffff ;"><?php echo bloginfo('the-title'); ?></h3></div>
  </div>
  <div id="sub-responsive-menu" class="show-for-small-only hide-for-print">
   <ul class="vertical menu" data-drilldown data-parent-link="true">

    <?php     wp_nav_menu(array(
                                                    'container' => false,
                                                    'menu' => __( 'Drill Menu', 'textdomain' ),
                                                    'menu_class' => 'vertical menu',
                                        'theme_location' => 'left-nav',
                                                    'menu_id' => 'sub-mobile-primary-menu',
                                                        //Recommend setting this to false, but if you need a fallback...
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
	<?php
						while ( have_posts() ) : the_post();
							get_template_part( 'template-parts/content', 'eventscalendar' );
					endwhile; // End of the loop.
						?>
		</main><!-- #main -->
	</div><!-- #primary -->
			<div class="small-12 medium-12 large-12 columns">

	<?php 
$myvar = get_query_var('d');
   //parse_str($_SERVER['QUERY_STRING']);  
 if($myvar != ''){
	$date=strtotime($myvar);
				$month=date("m",$date);
				$day=date("j",$date);
				$year=date("Y",$date);
	}elseif ($m == ""){  
    $dateComponents = getdate();
    $month = $dateComponents['mon'];
    $year = $dateComponents['year'];
				$day = $dateComponents['mday'];
   } else {
     $month = $m;
     $year = $y;
     $day =$d;
   }

$monthString = array();
$dateArray = array();

?>
<?php 	$lastdate =  $year.'-'.$month.'-'.$day; ?>
			<a href='calendar/?d=<?php echo $lastdate;?>'><-- Back To The Calendar</a><br />	
<div class="small-up-1 medium-up-3 large-up-3">		
					<div class="column column-block">
							<?php
							 do_action( 'lccc_prev_week',$year, $month, $day);
						?>
	</div>
						<div class="column column-block"><div style='display:inline-block;'>&nbsp;</div><div style='text-align:center;'><a href="week">Today</a></div></div>
	
						<div class="column column-block"><?php do_action( 'lccc_next_week',$year, $month, $day); ?></div>
</div>
<?php

//Code for calling functions to generate page
do_action('lccc_week',$month,$year,$day);
	
	// What is the first day of the month in question?
					$firstDayOfMonth = mktime(0,0,0,$month,1,$year);
	// How many days does this month contain?
					$numberDays = date('t',$firstDayOfMonth);
     $daydisplaycounter = '';
					if($day+7 > $numberDays){
							$nxtmonth = $month+1;	
							$day = 1;
								if ($nxtmonth == 13){
										$nxtmonth = 1;
										$year ++;
									}
							do_action('lccc_add_to_list',$nxtmonth,$year,$day);
					}
?>
</div>
		
</div>
<?php
 //Jetpack Sharing Buttons
if ( function_exists( 'sharing_display' ) ) {
    sharing_display( '', true );
}
 ?>
</div>
<?php get_footer(); ?>

