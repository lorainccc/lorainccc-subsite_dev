<?php
/**
 * The template for displaying archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package LCCC Framework
 */

get_header(); ?>
<div class="row page-content">

<div class="small-12 medium-12 large-12 columns breadcrumb-container">
   <?php get_template_part( 'template-parts/content', 'breadcrumb' ); ?> All Events
</div>

	<div class="small-12 medium-12 large-12 columns nopadding">		
	<div id="primary" class="content-area">
		<main id="main" class="site-main mylccc-event-archive" role="main">
            <div class="small-12 medium-12 large-12 columns">
				<header class="page-header">
				<h1 class="page-title"> LCCC Events</h1>
			</header><!-- .page-header -->
			<?php
			$eventlistargs=array(
			'post_type' => 'page',
					'post_status' => 'publish',
				'name' => 'events-list',
			);
			$eventsdescrip = new WP_Query($eventlistargs);
					if ( $eventsdescrip->have_posts() ){
							while ( $eventsdescrip->have_posts() ) : $eventsdescrip->the_post();
													
								the_content('<p>','</p>');
						?>
						     <div class="column row event-list-row">
            <hr>
            </div> 							
						<?php
							endwhile;
					}else{
						

					}
			?>
      
		</div>
             <div class="small-12 medium-12 large-12 columns archive-events-container">
                <?php 
		$paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
                 $eventargs=array(
                    'post_type' => 'lccc_events',
		    'posts_per_page' => 5,
		    'order'=> 'ASC',
    		    'orderby'=> 'meta_value',
		    'paged' => $paged,
    		    'meta_key' => 'event_start_date',
                );
					$wp_query = new WP_Query($eventargs);
					if ( $wp_query->have_posts() ) :
						while ( $wp_query->have_posts() ) : $wp_query->the_post();
	$starteventdate = event_meta_box_get_meta('event_start_date');
		$starteventtime = event_meta_box_get_meta('event_start_time');  
		$endeventdate = event_meta_box_get_meta('event_end_date');
		$endtime = event_meta_box_get_meta('event_end_time');
		$starttimevar=strtotime($starteventtime);
		$starttime=	date("g:i a",$starttimevar);
		$starteventtimehours = date("G",$starttimevar);
		$starteventtimeminutes = date("i",$starttimevar);
		$startdate=strtotime($starteventdate);
		$eventstartdate=date("Y-m-d",$startdate);
		$eventstartmonth=date("M",$startdate);
        $eventstartmonthfull=date("F",$startdate);
		$eventstartday =date("j",$startdate);
        $eventstartyear =date("Y",$startdate);
		$endeventtimevar=strtotime($endtime);
		$endeventtime = date("h:i a",$endeventtimevar);
		$endeventtimehours = date("G",$endeventtimevar);
		$endeventtimeminutes = date("i",$endeventtimevar);
		$enddate=strtotime($endeventdate);
		$endeventdate = date("Y-m-d",$enddate);
		$location = event_meta_box_get_meta('event_meta_box_event_location');  
        	$cost = event_meta_box_get_meta('event_meta_box_ticket_price_s_');	
		$key_1_value = get_post_meta( get_the_ID(), 'event_start_date', true );
			?>
<div id="post-<?php the_ID(); ?>" class="small-12 medium-12 large-12 columns nopadding">
	<?php	if ( has_post_thumbnail() ) { ?>
			<div class="small-12 medium-3 large-3 columns nopadding">
						<?php the_post_thumbnail();?>
			</div>
			<div class="small-12 medium-9 large-9 columns nopadding">
                        <header class="entry-header">
        <a href="<?php the_permalink();?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
			<div class="taxonomies">
				<?php echo get_the_term_list( $post->ID, 'event_categories','', ' , ' , ''); ?>
			</div>
			<p><?php echo 'Date: '.$eventstartmonthfull.' '.$eventstartday.' , '.$eventstartyear; ?></p>
        		<p><?php echo 'Time: '.$starttime; ?></p>
          		<p><?php echo 'Location: '.$location; ?></p>
										<?php if($cost != ''){ ?>															
        		<p><?php echo 'Cost: '.$cost; ?></p>
											<?php } ?>														
        		<p>&nbsp;</p>
			</header>
			<div class="small-12 medium-12 large-12 columns nopadding">
				<div class="entry-content">
					<?php the_excerpt();?>
					<a class="button" href="<?php the_permalink();?>">More Information</a>
				</div><!-- .entry-content -->
			</div>
			</div>
	<?php }else{ ?>
	<div class="small-12 medium-12 large-12 columns nopadding mylccc-event">
   <header class="entry-header">
        <a href="<?php the_permalink();?>"><?php the_title( '<h1 class="entry-title">', '</h1>' ); ?></a>
			<div class="taxonomies">
				<?php echo get_the_term_list( $post->ID, 'event_categories','', ' , ' , ''); ?>
			</div>
			<p><?php echo 'Date: '.$eventstartmonthfull.' '.$eventstartday.' , '.$eventstartyear; ?></p>
        		<p><?php echo 'Time: '.$starttime; ?></p>
          		<p><?php echo 'Location: '.$location; ?></p>
        			<?php if($cost != ''){ ?>															
        		<p><?php echo 'Cost: '.$cost; ?></p>
											<?php } ?>				
        		<p>&nbsp;</p>
			</header>
			<div class="small-12 medium-12 large-12 columns nopadding">
				<div class="entry-content">
					<?php the_excerpt();?>
					<a class="button" href="<?php the_permalink();?>">More Information</a>
				</div><!-- .entry-content -->
			</div>
			</div>
	<?php } ?>
	
	
	
</div>

			 <div class="column row event-list-row">
            			<hr>
            		  </div> 
			 <?php
			endwhile;
?> 	
<div id="pagination" class="clearfix">
  <div style="float:left;padding-top:2rem;"><?php previous_posts_link( 'Previous Events' ); ?></div>
  <div style="float:right;padding-top:2rem;"><?php next_posts_link( 'More Events', $wp_query->max_num_pages ); ?></div>
</div>
<?php
		      wp_reset_postdata();
                    endif;
                 ?>
            </div>

		</main><!-- #main -->
	</div><!-- #primary -->
</div>	

</div>
<?php get_footer(); ?>

