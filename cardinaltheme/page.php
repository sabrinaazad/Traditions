<?php

get_header();

// Check value exists.
if (have_rows('modules')) :
    // Loop through rows.
    while (have_rows('modules')) : the_row();
        
        // Case: anchors layout.
        if (get_row_layout() == 'anchors') :
            get_template_part('modules/anchors');
        endif;
        
        // Case: bloom layout.
         if (get_row_layout() == 'bloom') :
            get_template_part('modules/bloom');
        endif;

        // Case: bloom-small layout.
        if (get_row_layout() == 'bloom_small') :
            get_template_part('modules/bloom-small');
        endif;
        
        // Case: banner-cta layout.
        if (get_row_layout() == 'banner_cta') :
            get_template_part('modules/banner-cta');
        endif;  
        
        // Case: contact-form layout.
        if (get_row_layout() == 'contact_form') :
            get_template_part('modules/contact-form');
        endif;   

        // Case: credentials layout.
        if (get_row_layout() == 'credentials') :
            get_template_part('modules/credentials');
        endif;

        // Case: faqs layout.
        if (get_row_layout() == 'faqs') :
            get_template_part('modules/faqs');
        endif; 

        // Case: featured-blogs layout.
        if (get_row_layout() == 'featured_blogs') :
            get_template_part('modules/featured-blogs');
        endif;

        // Case: featured-services layout.
        if (get_row_layout() == 'featured_services') :
            get_template_part('modules/featured-services');
        endif; 

        // Case: featured-side-by-side layout.
        if (get_row_layout() == 'featured_side_by_side') :
            get_template_part('modules/featured-side-by-side');
        endif; 

        // Case: hero layout.
        if (get_row_layout() == 'hero') :
            get_template_part('modules/hero');
        endif;

        // Case: hero-banner layout.
        if (get_row_layout() == 'hero_banner') :
            get_template_part('modules/hero-banner');
        endif;

        // Case: hero-locations layout.
        if (get_row_layout() == 'hero_location') :
            get_template_part('modules/hero-location');
        endif;

        // Case: levels layout.
        if (get_row_layout() == 'levels') :
            get_template_part('modules/levels');
        endif;

        // Case: list layout.
        if (get_row_layout() == 'list') :
            get_template_part('modules/list');
        endif;

        // Case: map layout.
        if (get_row_layout() == 'map') :
            get_template_part('modules/map');
        endif;     

        // Case: panels layout.
        if (get_row_layout() == 'panels') :
            get_template_part('modules/panels');
        endif;     

        // Case: programs layout.
        if (get_row_layout() == 'programs') :
            get_template_part('modules/programs');
        endif; 

        // Case: services layout.
        if (get_row_layout() == 'services') :
            get_template_part('modules/services');
        endif;  

        // Case: side-by-side layout.
        if (get_row_layout() == 'side_by_side') :
            get_template_part('modules/side-by-side');
        endif;      

        // Case: statistics layout.
         if (get_row_layout() == 'statistics') :
            get_template_part('modules/statistics');
        endif;  

        // Case: team-members layout.
        if (get_row_layout() == 'team_members') :
            get_template_part('modules/team-members');
        endif;

        // Case: testimonials-side-by-side layout.
        if (get_row_layout() == 'testimonials_side_by_side') :
            get_template_part('modules/testimonials-side-by-side');
        endif;    

        // Case: text-editor layout.
        if (get_row_layout() == 'text_editor') :
            get_template_part('modules/text-editor');
        endif;

        // Case: tiles layout.
        if (get_row_layout() == 'tiles') :
            get_template_part('modules/tiles');
        endif;

    // End loop.
    endwhile;
// No value.
else :
// Do something...
endif;

get_footer();
