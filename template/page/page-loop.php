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