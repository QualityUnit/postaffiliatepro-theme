<?php

function ms_login() {
	ob_start();
	?>

	<div class="Login">
		<div id="signup">
			<div id="domainFieldmain" class="Signup__form__item">
				defer data-src class="Signup__form__icon company" viewBox="0 0 22 20" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M19 4H3a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h16c1.658 0 3-1.342 3-3V7a3 3 0 0 0-3-3zm0 2a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h16z"/><path d="M16 19V3c0-.795-.315-1.56-.879-2.121A2.992 2.992 0 0 0 13 0H9c-.795 0-1.56.315-2.121.879A2.992 2.992 0 0 0 6 3v16a1 1 0 0 0 2 0V3c0-.264.104-.519.291-.705l.004-.004A.995.995 0 0 1 9 2h4c.264 0 .519.104.705.291l.004.004A.995.995 0 0 1 14 3v16a1 1 0 0 0 2 0z"/></svg>
				<input type="url" name="Domain" placeholder="<?php _e( 'Company/organization name', 'ms' ); ?>" value="" required="required"  autocomplete="off" maxlength="30">
				<div class="Signup__form__item__domain"><?php _e( '.postaffiliatepro.com', 'ms' ); ?></div>
				<div class="ErrorMessage"></div>
			</div>

			<div class="Signup__form__submit">
				<div id="createButtonmain" class="Button Button--full" onclick="_paq.push(['trackEvent', 'Activity', 'Login', 'Login'])">
					<span><?php _e( 'Login', 'ms' ); ?></span>
				</div>
			</div>
		</div>
	</div>

	<div class="Login__overlay"></div>

	<div class="Login__popup">
		<span class="Login__popup__close"></span>
		<h3><?php _e( 'Hoops!', 'ms' ); ?></h3>
		<p><?php _e( "Looks like we couldn't find your Post Affiliate Pro account. No worries, we can help you.", 'ms' ); ?></p>

		<a href="<?php _e( '/trial/', 'ms' ); ?>" class="Button Button--full" onclick="_paq.push(['trackEvent', 'Activity', 'Login', 'Create new account'])">
			<span><?php _e( 'Create new account', 'ms' ); ?></span>
		</a>
	</div>

	<?php // @codingStandardsIgnoreStart ?>
	<script defer src="https://www.google.com/recaptcha/api.js?render=6LddyswZAAAAAJrOnNWj_jKRHEs_O_I312KKoMDJ"></script>
	<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/jquery.alphanum.js' ?>"></script>
	<?php if ( ICL_LANGUAGE_CODE === 'en' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_en.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'de' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_de.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'es' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_es.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'fr' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_fr.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'pt-br' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_br.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'sk' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_sk.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'hu' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_hu.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'nl' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_nl.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'pl' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_pl.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'it' ) { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_it.js' ?>"></script>
	<?php } else { ?>
		<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login_en.js' ?>"></script>
	<?php } ?>
	<?php $login_ver_app = gmdate( 'ymdGis', filemtime( get_template_directory() . '/assets/scripts/static/login.js' ) ); ?>
	<script defer src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/login.js?ver=' . $login_ver_app ?>"></script>
	<?php // @codingStandardsIgnoreEnd ?>

	<?php
	set_custom_source( 'components/Signup' );
	return ob_get_clean();
}
add_shortcode( 'login', 'ms_login' );
