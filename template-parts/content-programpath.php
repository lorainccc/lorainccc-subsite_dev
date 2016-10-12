<?php

$programargs = array(
    'post_type' => 'lc_program_paths',
				'post_status' => 'publish',
  );
  $programpaths = new WP_Query($programargs);
					if ( $programpaths->have_posts() ) :
        while ( $programpaths->have_posts() ) : $programpaths->the_post();
    ?>

        <section class="row gateway-links">
											<div class="small-12 medium-3 large-3 columns">
														<?php the_post_thumbnail(); ?>		
											</div>
											<div class="small-12 medium-9 large-9 columns gtwymenu-content">
													<?php the_title('<h2>','</h2>' );?>
													<?php the_content('<p>','</p>'); ?>
									</div>
								</section>

    <?php
        endwhile;
					endif;
 wp_reset_query();

?>