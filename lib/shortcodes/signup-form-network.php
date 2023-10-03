<?php

function ms_signup_network_form($atts) {

	$atts = shortcode_atts(
		array(
			'title' => __( 'Start Free Trial', 'ms' ),
			'label1' => __( '7 or 30 days free trial', 'ms' ),
			'tooltip1' => __( 'Free trial for 7 days with a free email, or 30 days with a company email', 'ms' ),
			'label2' => __( 'No Credit Card required', 'ms' ),
			'button' => __( 'Create account for FREE', 'ms' ),
		),
		$atts,
	);

	ob_start();
	?>

	<div class="Signup__form">
		<h3 class="Signup__form__title"><?= esc_html( $atts['title'] ); ?></h3>

		<div class="Signup__form__labels">
			<span class="Signup__form__labels__label">
				<?= esc_html( $atts['label1'] ); ?>&nbsp;
				<span class="Signup__form__labels__label__tooltip">
					<span class="fontello-info "></span>
					<span class="Signup__form__labels__label__tooltip__text Tooltip"><?= esc_html( $atts['tooltip1'] ); ?></span>
				</span>
			</span>
			<span class="Signup__form__labels__label"><?= esc_html( $atts['label2'] ); ?>&nbsp;</span>
		</div>

		<div data-id="signup">
			<input data-id="plan" type="hidden" value="Trial" autocomplete="off">
			<input data-id="variation" type="hidden" value="3513230f" autocomplete="off">

			<div data-id="nameFieldmain" class="Signup__form__item">
				<svg class="Signup__form__icon user" viewBox="0 0 18 20" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M18 19v-2a4.999 4.999 0 0 0-5-5H5a4.999 4.999 0 0 0-5 5v2a1 1 0 0 0 2 0v-2c0-.796.317-1.558.879-2.121h.001A2.996 2.996 0 0 1 5 14h8c.796 0 1.558.317 2.121.879v.001c.563.562.879 1.325.879 2.12v2a1 1 0 0 0 2 0zm-9-9c2.763 0 5-2.237 5-5 0-2.762-2.237-5-5-5S4 2.238 4 5c0 2.763 2.238 5 5 5zm0-2a3 3 0 1 1 0-6 3 3 0 1 1 0 6z"/></svg>
				<input type="text" name="Full Name" placeholder="<?php _e( 'Full name', 'ms' ); ?>" value="" required="required" autocomplete="off" maxlength="100">
				<div class="ErrorMessage"></div>
			</div>

			<div data-id="mailFieldmain" class="Signup__form__item">
				<svg class="Signup__form__icon mail" viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M3 0C1.35 0 0 1.35 0 3v12c0 1.65 1.35 3 3 3h16c1.65 0 3-1.35 3-3V3c0-1.65-1.35-3-3-3H3zm0 2h16c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1H3c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1z"/><path d="M20.427 2.181 11 8.779 1.573 2.181A.998.998 0 1 0 .427 3.819l10 7a.999.999 0 0 0 1.146 0l10-7a.998.998 0 1 0-1.146-1.638z"/></svg>
				<input type="email" name="Email" placeholder="<?php _e( 'Enter your e-mail', 'ms' ); ?>" value="" required="required" autocomplete="off" maxlength="255">
				<div class="ErrorMessage"></div>
			</div>

			<div data-id="domainFieldmain" class="Signup__form__item">
				<svg class="Signup__form__icon company" viewBox="0 0 22 20" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M19 4H3a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h16c1.658 0 3-1.342 3-3V7a3 3 0 0 0-3-3zm0 2a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h16z"/><path d="M16 19V3c0-.795-.315-1.56-.879-2.121A2.992 2.992 0 0 0 13 0H9c-.795 0-1.56.315-2.121.879A2.992 2.992 0 0 0 6 3v16a1 1 0 0 0 2 0V3c0-.264.104-.519.291-.705l.004-.004A.995.995 0 0 1 9 2h4c.264 0 .519.104.705.291l.004.004A.995.995 0 0 1 14 3v16a1 1 0 0 0 2 0z"/></svg>
				<input type="url" name="Domain" placeholder="<?php _e( 'Company name', 'ms' ); ?>" required="required"  autocomplete="off" maxlength="30">
				<div class="Signup__form__item__domain"><?php _e( '.postaffiliatepro.com', 'ms' ); ?></div>
				<div class="ErrorMessage"></div>

				<div class="Signup__form__item__info">
					<div class="Signup__form__item__info__icon fontello-info">
						<span class="Tooltip Tooltip--left"><?php _e( 'Choose a name for your Post Affiliate Network subdomain. Most people use their company or team name.', 'ms' ); ?></span>
					</div>
				</div>
			</div>

			<div data-id="promoFieldmain" class="Signup__form__item">
				<input type="checkbox" name="Promo" id="sendOffersSignup" data-id="sendOffers">
				<label for="sendOffersSignup"><p><?php _e( 'Send me product updates and other promotional offers.', 'ms' ); ?></p></label>
			</div>

			<div data-id="signUpError"></div>

			<div class="Signup__form__submit">
				<div data-id="createButtonmain" class="Button Button--full" onclick="_paq.push(['trackEvent', 'Activity', 'Signup Form', 'Signup']); ga('send', 'event', 'SignUp', 'Trial', 'Trial Signup');">
					<span><?php _e( 'Create account for FREE', 'ms' ); ?></span>
				</div>

				<div class="WorkingPanel" style="display: none;">
					<div class="animation">
						<div class="one spin-one"></div>
						<div class="two spin-two"></div>
						<div class="three spin-one"></div>
					</div>
					<p><?php _e( 'Passing data through the machine...', 'ms' ); ?></p>
				</div>
				<div class="Signup__form__terms">
					<p><?php _e( 'By signing up, I accept', 'ms' ); ?> <a title="<?php _e( 'T&amp;C', 'ms' ); ?>" href="<?php _e( '/terms-of-service/', 'ms' ); ?>"><?php _e( 'T&amp;C', 'ms' ); ?></a> <?php _e( 'and', 'ms' ); ?> <a title="<?php _e( 'Privacy Policy', 'ms' ); ?>" href="<?php _e( '/privacy-policy/', 'ms' ); ?>"><?php _e( 'Privacy Policy', 'ms' ); ?></a><?php _e( '.', 'ms' ); ?></p>
				</div>
			</div>
		</div>
	</div>

	<?php // @codingStandardsIgnoreStart ?>
	<script data-src="https://www.google.com/recaptcha/api.js?render=6LddyswZAAAAAJrOnNWj_jKRHEs_O_I312KKoMDJ"></script>
	<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/source.js' ?>"></script>
	<?php if ( ICL_LANGUAGE_CODE === 'en' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_en.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'de' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_de.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'es' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_es.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'fr' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_fr.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'pt-br' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_br.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'sk' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_sk.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'hu' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_hu.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'nl' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_nl.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'pl' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_pl.js' ?>"></script>
	<?php } elseif ( ICL_LANGUAGE_CODE === 'it' ) { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_it.js' ?>"></script>
	<?php } else { ?>
		<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm_network_en.js' ?>"></script>
	<?php } ?>
	<?php $crm_ver_app = gmdate( 'ymdGis', filemtime( get_template_directory() . '/assets/scripts/static/crm.js' ) ); ?>
	<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm.js?ver=' . $crm_ver_app ?>"></script>
	<?php // @codingStandardsIgnoreEnd ?>

	<?php
	wp_enqueue_script( 'jquerycookie', get_template_directory_uri() . '/assets/scripts/static/jquery.cookie.js', array( 'jquery' ), THEME_VERSION, true );
	wp_enqueue_script( 'jqueryalphanum', get_template_directory_uri() . '/assets/scripts/static/jquery.alphanum.js', array( 'jquery' ), THEME_VERSION, true );
	set_custom_source( 'shortcodes/Signup' );
	return ob_get_clean();
}
add_shortcode( 'signupform-network', 'ms_signup_network_form' );
