<?php
/**
 * Template Name: Campus Security Crime Log Template
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
<div class="medium-4 large-4 columns hide-for-small-only">
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
	
	</div>
	</div>
	</div>			
	<div class="small-12 medium-8 large-8 columns">		
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
					<table>
										<tbody>
														<?php
																		$args = array(
																			'post_type' => 'crime_log',
																			'posts_per_page' => -1,
																		);
																$i=1;
																// The Query
																$crime_query = new WP_Query( $args );
																	// The Loop
																	if ( $crime_query->have_posts() ) {
																		while ( $crime_query->have_posts() ) {
																			$crime_query->the_post();
																			$natureoffence = details_of_the_crime_get_meta('details_of_the_crime_nature_of_offense');
																			$reported_date = details_of_the_crime_get_meta('details_of_the_crime_date_reported');
																			$reported_time = details_of_the_crime_get_meta('details_of_the_crime_time_reported');
																			$unkown_dates = details_of_the_crime_get_meta('details_of_the_crime_unknown_incident_date');
																			$various_dates = details_of_the_crime_get_meta('details_of_the_crime_various_incident_dates');	
																			$incident_date_start = details_of_the_crime_get_meta('details_of_the_crime_date_incident_occurred_start');
																			$incident_date_end = details_of_the_crime_get_meta('details_of_the_crime_date_incident_occurred_end');	
																			$incident_time_start = details_of_the_crime_get_meta('details_of_the_crime_time_incident_occurred_start');
																			$incident_time_end = details_of_the_crime_get_meta('details_of_the_crime_time_incident_occurred_end');	
																			$secondary_incident_date_start = details_of_the_crime_get_meta('details_of_the_crime_secondary_date_incident_occurred_start');
																			$secondary_incident_date_end = details_of_the_crime_get_meta('details_of_the_crime_secondary_date_incident_occurred_end');	
																			$secondary_incident_time_start = details_of_the_crime_get_meta('details_of_the_crime_secondary_time_incident_occurred_start');
																			$secondary_incident_time_end = details_of_the_crime_get_meta('details_of_the_crime_secondary_time_incident_occurred_end_');
																			$general_location = details_of_the_crime_get_meta('details_of_the_crime_general_location');
																			$disposition = details_of_the_crime_get_meta('details_of_the_crime_disposition');	
																			echo '<tr>';
																			echo '<td>'.$natureoffence.'</td>';
																			echo '<td>' . get_the_title() . '</td>';
																			echo '<td>'.$reported_date.' '.$reported_time.'</td>';
																			//if unknown date checkbox is checked
																			if( $unkown_dates == 'TRUE' ){
																							echo '<td> Unknown </td>';
																			//if various incident dates checkbox is checked	
																			}elseif( $various_dates == 'TRUE' ){
																							echo '<td> Unknown </td>';
																			//else if neither checkbox is active	
																			}else{
																					
																							//if secondary date set
																							if(){
																											//if scondary date start equals the sames as its end echo the start
																											if(){
																															//if the time is set echo the time
																															if(){
																																			
																																			if(){
																																			//if the time start equals end is set echo the start time - end time
																																				
																																			}else{
																																			//if the time start does not equal end echo the start time	
																																			
																																			}//closes the else if time start does not equal end
																																
																															}else{
																															//if the time is not set echo just the date	
																																
																															}//closes the time else
																											}else{
																											//else if scondary date start  does not equal the sames as its end echo the start then - the end date	
																												//if the time is set echo the time
																															if(){
																																				if(){
																																			//if the time start equals end is set echo the start time - end time
																																				
																																			}else{
																																			//if the time start does not equal end echo the start time	
																																			
																																			}//closes the else if time start does not equal end																															
																																
																															}else{
																															//if the time is not set echo just the date	
																																
																																
																															}//closes the time else
																												
																											}//closes the else statement of if scondary date start  does not equal the sames as its end echo the start then - the end date	
																							//else if secondary date is not set	
																							}else{
																											//if incident date start equals the sames as its end echo the start
																											if(){
																															//if the time is set echo the time
																															if(){
																																				if(){
																																			//if the time start equals end is set echo the start time - end time
																																				
																																			}else{
																																			//if the time start does not equal end echo the start time	
																																			
																																			}//closes the else if time start does not equal end	
																														
																															//closes the if statement if time is set	
																															}else{
																															//if the time is not set echo just the date	
																																
																															
																															}//closes the else of time is not set	
																												//closes if statement incident date start does equal end
																											}else{
																											//else if incident date start  does not equal the sames as its end echo the start then - the end date	
																															//if the time is set echo the time
																															if(){
																																			if(){
																																			//if the time start equals end is set echo the start time - end time
																																				
																																			}else{
																																			//if the time start does not equal end echo the start time	
																																			
																																			}//closes the else if time start does not equal end		
																																
																															}else{
																															//if the time is not set echo just the date	
																															
																																
																															}//closes the else if time is not set	
																											}//closes else if  incident date start does not equal end
																								
																							}//closes the else if secondary date not set
																				
																			}//closes else if neither checkbox is active	
																			
																			echo '<td>'.$general_location.'</td>';
																			echo '<td>'.$disposition.'</td>';
																			echo '</tr>';
																		}
																		/* Restore original Post Data */
																		wp_reset_postdata();
																	} else {
																		// no posts found
																	}
															?>
										</tbody>
					</table>																		
		</main><!-- #main -->
	</div><!-- #primary -->
</div>	
	
</div>
<?php get_footer(); ?>
