<?php get_header(); ?>
<div id="content" class="background background-main">
    <div class="l-wrap l-main--content">
        <div class="main">
        	<?php get_template_part( 'template/page/page', 'loop' ); ?>
        	<?php simpleTheme_download(); ?>
        </div>
    </div>
</div>

<div id="content" class="background background-front1">
    <div class="l-wrap l-main--content">
        <div class="main">
        	<h2>Område 1</h2>
        </div>
    </div>
</div>

<div id="content" class="background background-front2">
    <div class="l-wrap l-main--content">
        <div class="main">
        	<h2>Område 2</h2>
        </div>
    </div>
</div>

<div id="content" class="background background-front3">
    <div class="l-wrap l-main--content">
        <div class="main">
        	<h2>Område 3</h2>
        </div>
    </div>
</div>

<?php get_footer(); ?>