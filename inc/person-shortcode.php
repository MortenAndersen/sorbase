<?php

// Grid


add_shortcode('personer', 'simpleTheme_personer');
function simpleTheme_personer($atts) {
  global $post;
  ob_start();

  // define attributes and their defaults
    extract(shortcode_atts(array('grid' => 'g3', 'cat' =>'' ), $atts));


if (!empty($cat)) {

 $loop = new WP_Query( array(
  'post_type' => 'person',
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'posts_per_page' => -1,
  'category__in' => array($cat)
  )
);

} else {
   $loop = new WP_Query( array(
  'post_type' => 'person',
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'posts_per_page' => -1,
    )
);

}


 if ( $loop->have_posts() ) {
 	echo '<div class="personer-shortcode flex-con ' . $grid . '">';
 while ( $loop->have_posts() ) : $loop->the_post();
 	echo '<div id="post-id-' .get_the_ID(). '" class="flex-item">';
 		if ( has_post_thumbnail() ) {
        echo '<div class="shortcode-person-img">';
        the_post_thumbnail( 'simpletheme-content-image' );
        echo '</div>';
      }
    the_title('<h4>', '</h4>');
 		simpleTheme_acf_person();
 	 echo '</div>';
 endwhile; wp_reset_query();
 echo '</div>';
 }

    $myvariable = ob_get_clean();
        return $myvariable;
}

/* ____________________________________________________________________ */


add_shortcode('person', 'simpleTheme_person');
function simpleTheme_person($atts) {
  global $post;
  ob_start();

  // define attributes and their defaults
    extract(shortcode_atts(array('grid' => 'g1', 'navn' =>'noname', 'float' => 'left' ), $atts));



   $loop = new WP_Query( array(
  'post_type' => 'person',
  'orderby' => 'menu_order',
  'order' => 'ASC',
  'posts_per_page' => -1,
  'title' => $navn,
    )
);




 if ( $loop->have_posts() ) {
  echo '<div class="personer-shortcode person ' . $float . '">';
 while ( $loop->have_posts() ) : $loop->the_post();
  echo '<div id="post-id-' .get_the_ID(). '" class="flex-item">';
    if ( has_post_thumbnail() ) {
        echo '<div class="shortcode-person-img">';
        the_post_thumbnail( 'simpletheme-content-image' );
        echo '</div>';
      }
    the_title('<h4>', '</h4>');
    simpleTheme_acf_person();
   echo '</div>';
 endwhile; wp_reset_query();
 echo '</div>';
 }

    $myvariable = ob_get_clean();
        return $myvariable;
}

/* ____________________________________________________________________ */
