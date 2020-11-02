<?php
get_header();
  echo '<div id="content" class="background background-main">';
    echo '<div class="l-wrap l-main--content simple-grid-con space-between">';
      echo '<div class="main simple-grid-item-main">';
        get_template_part( 'template/page/ydelse', 'loop' );
        simpleTheme_go_back();
      echo '</div>';
      ?>

    <aside class="aside-right simple-grid-item-aside<?php simpleTheme_aside_class(); ?> order-3">

<?php

// Kilde
// https://wordpress.stackexchange.com/questions/75112/query-related-posts-in-a-custom-post-type-by-a-custom-taxonomy

//Get array of terms
$terms = get_the_terms( $post->ID , 'aktivitet-type', 'string' );
//Pluck out the IDs to get an array of IDS
if ( ! empty( $terms )) {
$term_ids = wp_list_pluck( $terms,'term_id' );


//Query posts with tax_query. Choose in 'IN' if want to query posts with any of the terms
//Chose 'AND' if you want to query for posts with all terms
  $second_query = new WP_Query( array(
      'post_type' => 'aktivitet',
      'tax_query' => array(
                    array(
                        'taxonomy' => 'aktivitet-type',
                        'field' => 'id',
                        'terms' => $term_ids,
                        'operator'=> 'IN' //Or 'AND' or 'NOT IN'
                     )),

      'posts_per_page' => 3,
      'ignore_sticky_posts' => 1,
      'orderby' => 'rand',
      'post__not_in'=>array( $post->ID )
   ) );

} else {

  $second_query = new WP_Query( array(
      'post_type' => 'aktivitet',
      'posts_per_page' => 3,
      'ignore_sticky_posts' => 1,
      'orderby' => 'rand',
      'post__not_in'=>array( $post->ID )
   ) );

}

//Loop through posts and display...
    if( $second_query->have_posts() ) {
      echo '<div class="simple-archive flex-con">';
      while ( $second_query->have_posts() ) : $second_query->the_post();
        echo '<div class=" flex-item ydelse ydelse-related">';
          echo '<a href="' . get_the_permalink() . '" class="image-zoom">';
            if ( has_post_thumbnail() ) {
              echo '<div class="box-img">';
              the_post_thumbnail( 'small' );
              echo '</div>';
            }
            if ( get_field('box_overskrift') ) {
              echo '<h4 class="post-loop-title">' . get_field('box_overskrift') . '</h4>';
            } else {
              the_title( '<h4 class="post-loop-title">', '</h4>');
            }
          echo '</a>';
        the_excerpt();
        echo '<div class="more-link-con"><a href="' . get_permalink() . '" class="more-link">' . __( 'Læs mere', 'simpletheme' ) . '</a></div>';
      echo '</div>';

      endwhile; wp_reset_query();
      echo '</div>';
   }

      dynamic_sidebar( 'sidebar-aside-right-single' );
    echo '</aside>';

    echo '</div>';
  echo '</div>';
get_footer();