<?php

   //LCCC Custom Breadcrumb Display Code
  if (function_exists('lccc_breadcrumb')){
    if (is_home() || is_front_page()) {
     echo lccc_breadcrumb() . get_bloginfo('name') ;
    } elseif ( is_category() ) {
     // Display Category Name
    	echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > " . single_cat_title() ;
    }elseif ( is_archive() ) {
     // Archive Page
     if(is_tax( 'report_year' ) || is_tax( 'report_month' )){
     // Daily Crim Log Archive Page
     echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > " . "<a href='" . get_bloginfo('url') . "/daily-crime-log/' title='Return to Daily Crime Log'>Daily Crime Log</a> > " . single_cat_title( '', false ) ;
     } else {	
      // Other Archive Page
     echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > " . single_cat_title( '', false ) ;
     }
    } elseif ( is_tax() ) {
     // Taxonomy 
        echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > " . single_cat_title( '', false ) ;
    }elseif ( is_page() && $post->post_parent != 0 ) {
     // Page is a Subpage
     echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > " . "<a href='" . get_permalink( $post->post_parent ) ."' title='Return to " . get_the_title( $post->post_parent ) . "'>" . get_the_title( $post->post_parent ) . "</a>" . " > " . get_the_title() ;
    }elseif ( is_page() && $post->post_parent > 0 ) {
 echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > ";
     }elseif ( is_single() ) {
     // Single Post (most likely lccc_event)
     if(get_the_term_list( $post->ID, 'event_categories','', ' , ' , '') != ''){
     echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > " . get_the_term_list( $post->ID, 'event_categories','', ' , ' , '') . " > " . get_the_title()  ;
						
					// Single Post - Success Story Posts
					}elseif($post->post_type == 'lc_success_story'){
						echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > <a href='"  . get_bloginfo('url') . "/lc_success_story/'>Success Stories</a> > " . get_the_title() ;
						
					// Single Post Blog posts	
					} else {
     echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > " . "<a href='" . get_bloginfo('url') . "/blog/'> Blog </a> > " . get_the_title() ;
     }
    }else {
     // Single Page
    	echo lccc_breadcrumb() . "<a href='" . get_bloginfo('url') . "' title='Return to " . get_bloginfo('name') . " home'>" . get_bloginfo('name') . "</a> > " . get_the_title() ;
    };
   };

/*	echo "<br/><br/><pre>";
	var_dump($post);
	echo "</pre>";

	echo get_permalink($post->ID);*/
  ?>