<?php if ( has_nav_menu( 'main-menu' ) ) : ?>
<?php
	$main_nav = array(
		'theme_location' => 'main-menu',
		'container' =>  false,
	);
?>
<div id="navbar" class="menu-con background-2 menu-right">
<div class="l-wrap l-menu--content">
<nav aria-labelledby="hovedmenu-label" class="all-menu js-nav-toggle width-menu">
	<span class="screen-reader-text" id="hovedmenu-label">Hovedmenu</span>
<?php wp_nav_menu( $main_nav ); ?>
<?php if ( is_active_sidebar( 'sidebar-infobar' ) || is_active_sidebar( 'sidebar-mobilemenu-widget' )  ) { ?>
<div class="mobile-shop-menu ipad-and-below">
<?php dynamic_sidebar( 'sidebar-mobilemenu-shop-widget' ); ?>
</div>
<div class="mobile-info ipad-and-below">
<?php get_template_part( 'searchform-mobile' ); ?>
<?php dynamic_sidebar( 'sidebar-mobilemenu-widget' ); ?>
</div>


<?php } ?>
</nav>
</div>
</div>
<?php endif; ?>