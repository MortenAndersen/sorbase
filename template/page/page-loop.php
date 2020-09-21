<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php simpleTheme_the_post_thumbnail(); ?>
<?php  if ( !is_singular( 'person' ) ) {
	the_title( '<h1>', '</h1>');
}



if ( is_single() && !is_singular( 'person' ) ) {
	simpleTheme_date();
	simleTheme_cat_tag();
}

the_content();



if( get_field('intra_body') ):
 	 if (!is_user_logged_in()) {
    wp_login_form();
}
 if (is_user_logged_in()) {
 	echo '<div class="intranet">';
     the_field('intra_body');



     /**
 * Field Structure:
 *
 * - parent_repeater (Repeater) - inta_filer_con
 *   - parent_title (Text) - intra_overskrift
 *   - child_repeater (Repeater) - intra_filer_sub
 *     - child_title (Text) - intra_file_subsub
 */
if( have_rows('inta_filer_con') ):
    while( have_rows('inta_filer_con') ) : the_row();

        // Get parent value.
        $parent_title = get_sub_field('intra_overskrift');
        echo '<p>' . $parent_title . '</p>';
        // Loop over sub repeater rows.
        if( have_rows('intra_filer_sub') ):
        	echo '<ul class="filer">';
            while( have_rows('intra_filer_sub') ) : the_row();
                // Get sub value.
                $child_title = get_sub_field('intra_file_subsub');
                echo '<li><a href="' . $child_title['url'] . '" target="_blank">' . $child_title['title'] . '</a></li>';

            endwhile;
            echo '</ul>';
        endif;
    endwhile;
endif;



  echo '</div>';
   }
endif;


simpleTheme_acf_gallery();

simpleTheme_go_back();

if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

 endwhile;

echo '</article>';
endif;