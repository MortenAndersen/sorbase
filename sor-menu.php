<nav class="sor-footer-menu widget footer-widget">
	<h5 class="widget-title">Menu</h5>
	<ul class="menu">
		<li><a href="https://www.soroptimistinternational.org/" target="_blank">SI</a></li>
		<li><a href="http://www.soroptimisteurope.org/" target="_blank">SI Europa</a></li>
		<li><a href="https://www.soroptimist-danmark.dk/">SI Danmark</a></li>
		<li><a href="https://www.soroptimist-danmark.dk/danske-klubber/">Danske klubber</a></li>
	</ul>
</nav>

<nav class="sor-footer-menu widget footer-widget">
	<h5 class="widget-title">Bruger</h5>
	<ul class="menu">
		<?php if (!is_user_logged_in()) { ?>
			<li class="login_link"><a href="<?php echo esc_url( wp_login_url( get_permalink() ) ); ?>" alt="Login på siden">Login på siden</a></li>
			<li class="opret_link"><a href="<?php echo esc_url( wp_registration_url() ); ?>">Opret dig som bruger</a></li>
		<?php } ?>
		<?php if (is_user_logged_in()) { ?>
			<li class="logud_link"><a href="<?php echo wp_logout_url( get_permalink() ); ?>">Log ud af siden</a></li>
		<?php } ?>
	</ul>
</nav>
