<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package lorainccc
 */

//Get custom fields
$post_id = get_the_ID();

$last_name = get_post_meta( $post_id, 'lc_fac_staff_dir_lastname_field', true);
$first_name = get_post_meta( $post_id, 'lc_fac_staff_dir_firstname_field', true);
$dept_name = get_post_meta( $post_id, 'lc_fac_staff_dir_department_name_field', true);
$title = get_post_meta( $post_id, 'lc_fac_staff_dir_position_title_field', true);
$office_loc = get_post_meta( $post_id, 'lc_fac_staff_dir_office_location_field', true);
$phone_ext = get_post_meta( $post_id, 'lc_fac_staff_dir_phone_field', true);
$email_addr = get_post_meta( $post_id, 'lc_fac_staff_dir_email_field', true);
$sched_appt = get_post_meta( $post_id, 'lc_fac_staff_dir_advisor_schedule_field', true);

      switch ($dept_name) {
       case "allied-health":
        $dept_name = 'allied-health-and-nursing-division';
        break;

       case "arts-and-humanities":
        $dept_name = 'arts-and-humanities-division';
        break;

       case "ebit":
        $dept_name = 'engineering-business-and-information-technologies-division';
        break;

       case "purchasing":
        $dept_name = 'purchasing-facility-planning-office';
        break;

       case "psi-jcpr":
        $dept_name = 'public-services-institute-and-joint-center-for-policy-research';
        break;

       case "science-and-math":
        $dept_name = 'science-and-mathematics-division';
        break;

       case "social-sciences":
        $dept_name = 'social-sciences-and-human-services-division';
        break;

       case "spitze-center":
        $dept_name = 'spitzerr-conference-center';
        break;

       case "stocker-center":
        $dept_name = 'stocker-humanities-and-fine-arts-center';
        break;

       case "usotdn":
        $dept_name = 'uso-talent-development-network-resource-center';
        break;
      }
						$dept_name = ucwords(str_replace('-', ' ', $dept_name));
						$dept_name = str_replace('And', 'and', $dept_name);
						$dept_name = str_replace('For', 'for', $dept_name);
						$dept_name = str_replace('Elearning', 'eLearning', $dept_name);
						$dept_name = str_replace('Weld ed', 'Weld-Ed', $dept_name);
?>


	<li class="facdir-list-sm facdir-content"><?php echo $last_name; ?></li>
	<li class="facdir-list-sm facdir-content"><?php echo $first_name; ?></li>
	<li class="facdir-list-lg facdir-content"><?php echo $dept_name; ?></li>
	<li class="facdir-list-sm facdir-content"><?php echo $office_loc; ?></li>		
	<li class="facdir-list-lg facdir-content"><?php 
 					if(strlen($phone_ext) == 4){
							echo '<a href="tel:(440) 366-' . $phone_ext .'">(440) 366-' . $phone_ext . '</a>';
						}else{
							echo $phone_ext;
						}
			?>			
	</li>
<li class="facdir-list-lg facdir-content"><?php echo '<a href="mailto:' . $email_addr . '">' . $email_addr . '</a>';?></li>

<!-- #post-## -->
