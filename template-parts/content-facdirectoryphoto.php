<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

//Get custom fields
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
