<?php
get_header();
  echo '<div id="content" class="background background-main">';
    echo '<div class="l-wrap l-main--content">';
      echo '<div class="main">';
        get_template_part( 'template/page/page', 'loop' );
				wp_reset_postdata(); // skal nok IKKE bruges!!!
      echo '</div>';
    echo '</div>';
  echo '</div>';
  ydelser_type();
get_footer();
