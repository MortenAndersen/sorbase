<?php get_header(); ?>
<div id="content" class="background background-main">
    <div class="l-wrap l-main--content">
        <div class="main">
        	<?php get_template_part( 'template/page/page', 'loop' ); ?>

        	<form id="tilmeld" action="<?php echo site_url('wp-login.php?action=register', 'login_post') ?>" method="post">
        		<p>
        		<label for="user_login">Brugernavn</label>
						<input type="text" name="user_login" placeholder="Brugernavn" value="" id="user_login" class="input" />
					</p>
					<p>
						<label for="user_email">E-mailadresse</label>
						<input type="text" name="user_email" placeholder="Email" value="" id="user_email" class="input" />
					</p>
					<p>
						<?php do_action('register_form'); ?>
						<input type="submit" value="Opret dig som bruger" id="register" />
					</p>
					</form>

        	<?php simpleTheme_download(); ?>
        </div>
    </div>
</div>
<?php get_footer(); ?>