<?php
/**
 * Template Name: Faculty Staff Directory Template
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
		<?php 
		
			$facdir_vars = array(
				'post_type' => 'faculty_staff_dir',
				'posts_per_page' => 20,
			);

			$facdir_query = new WP_Query( $facdir_vars );
		
				while ( $facdir_query->have_posts() ) : $facdir_query->the_post();

				var_dump($facdir_query);

				$post_id = $facdir_query->ID;

				$title = get_post_meta( $post_id, 'lc_fac_staff_dir_position_title_field', true);
				$office_loc = get_post_meta( $post_id, 'lc_fac_staff_dir_office_location_field', true);
				$phone_ext = get_post_meta( $post_id, 'lc_fac_staff_dir_phone_field', true);
				$email_addr = get_post_meta( $post_id, 'lc_fac_staff_dir_email_field', true);
				$sched_appt = get_post_meta( $post_id, 'lc_fac_staff_dir_advisor_schedule_field', true);
				
				?>
				
				<article id="post-<?php the_ID(); ?>" <?php post_class( 'fac-dir' ); ?>>
					<div class="entry-content facdir">
						<?php if( has_post_thumbnail() ){
								the_post_thumbnail();
						} ?>
						<footer class="facdir-footer">
								<?php the_title( '<span class="facdir-entry-title">', '</span>' ); ?>
								<span class="facdir-addtl-info">
									<p><?php 
										echo $title . '<br/>';
										if(strlen($phone_ext) == 4){
											echo '<a href="tel:440366' . $phone_ext .'">(440) 366-' . $phone_ext . '</a>';
										}else{
											echo $phone_ext;
										}
										echo ' | '. $office_loc; ?><br/>
									<?php echo '<a href="mailto:' . $email_addr . '">' . $email_addr . '</a>'; 
										if ($sched_appt != ''){
											echo '<br/>';
											echo '<a href="' . $sched_appt . '" target="_blank">Schedule an appointment</a>';
										}
									?>
									</p>
								</span>
						</footer>
					</div><!-- .entry-content -->
				
					<?php if ( get_edit_post_link() ) : ?>
				
							<?php
								edit_post_link(
									sprintf(
										/* translators: %s: Name of current post */
										esc_html__( 'Edit %s', 'lorainccc' ),
										the_title( '<span class="screen-reader-text">"', '"</span>', false )
									),
									'<span class="edit-link">',
									'</span>'
								);
							?>
					<?php endif; ?>
				</article><!-- #post-## -->
				<?php

				 //get_template_part( 'template-parts/content', 'facdirectoryphoto' );

				 endwhile; // end of the loop. 
				 
			wp_reset_query();
		?>

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