<?php get_header(); ?>
<div id="content" class="background background-main">
  <div class="l-wrap l-main--content simple-grid-con space-between">
    <div class="main simple-grid-item-main">
      <?php get_template_part( 'template/page/page', 'loop' ); ?>
    </div>

    <aside class="aside-right simple-grid-item-aside order-1">
      <div class="event-data">
        <h4>Dato:</h4>
        <?php simpleEvent_showdate(); ?>
        <div class="event-label"><?php the_field('event_label'); ?></div>
        <div class="event-kort-tekst"><?php the_field('event_kort_beskrivelse'); ?></div>
      </div>
      <?php get_template_part( 'template/page/aside', 'right' ); ?>
    </aside>

  </div>
</div>
<?php get_footer(); ?>