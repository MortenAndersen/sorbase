<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	simpleTheme_the_post_thumbnail();
	the_title( '<h1>', '</h1>');

	if ( ! empty( get_the_term_list( $post->ID, 'ydelse-type') )) {
		echo '<div class="type-liste">';
		 echo get_the_term_list( $post->ID, 'ydelse-type', '', ', ', '' );
		echo '</div>';
	}

	the_content();
 endwhile;

// Check rows exists.
if( have_rows('accordion') ):
	echo '<div class="accordion">';
    // Loop through rows.
    while( have_rows('accordion') ) : the_row();
	        // Load sub field value.
	        $overskrift = get_sub_field('acc_overskrift');
	        $body = get_sub_field('acc_body');
	        // Do something...
	        echo '<h3>' . $overskrift . '</h3>';
	        echo '<div>';
	        	echo $body;
    			echo '</div>';
    // End loop.
    endwhile;
    echo '</div>';
endif;


echo '</article>';
endif;