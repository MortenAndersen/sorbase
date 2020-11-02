<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
<?php
	simpleTheme_the_post_thumbnail();
	the_title( '<h1>', '</h1>');

if ( is_single() && 'ydelse' == get_post_type() ) {
	if ( ! empty( get_the_term_list( $post->ID, 'ydelse-type') )) {
		echo '<div class="type-liste">';
		 echo get_the_term_list( $post->ID, 'ydelse-type', '', ', ', '' );
		echo '</div>';
	}

}

if ( is_single() && 'aktivitet' == get_post_type() ) {
	if ( ! empty( get_the_term_list( $post->ID, 'aktivitet-type') )) {
		echo '<div class="type-liste">';
		 echo get_the_term_list( $post->ID, 'aktivitet-type', '', ', ', '' );
		echo '</div>';
	}

}

	the_content();
 endwhile;

// Check rows exists.
if( have_rows('accordion') ):
	echo '<div class="accordion">';
    // Loop through rows.
	$i = 1;
    while( have_rows('accordion') ) : the_row();
	        // Load sub field value.
	        $overskrift = get_sub_field('acc_overskrift');
	        $body = get_sub_field('acc_body');
	        // Do something...
	        echo '<h3 id="id-' . $i . '">' . $overskrift . '</h3>';
	        echo '<div>';
	        	echo $body;
    			echo '</div>';
    // End loop.
    $i++;
    endwhile;
    echo '</div>';
endif;


echo '</article>';
endif;