<?php
use QualityUnit\Trial_Signup;

function ms_signup_network_form( $atts ) {

	// include resources
	set_custom_source( 'shortcodes/Signup' );
	set_custom_source( 'filterMenu', 'js' );
	Trial_Signup::include_crm();

	$atts = shortcode_atts(
		array(
			'title'    => __( 'Start Free Trial', 'ms' ),
			'label1'   => __( '30 days free trial', 'ms' ),
			'tooltip1' => __( 'Free trial for 30 days with a company email', 'ms' ),
			'label2'   => __( 'No Credit Card required', 'ms' ),
			'button'   => __( 'Create account for FREE', 'ms' ),
		),
		$atts,
	);

	ob_start();
	?>

	<style type="text/css">
		.Signup__form input{width:100%}.Signup__form__item{position: relative}.Signup__form__icon{fill: #bec2c9;position: absolute;z-index: 3;top: 50%;-webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);transform: translateY(-50%);left: 1.3125em;width: 1.375em;}
	</style>

	<div class="Signup__form">
		<h3 class="Signup__form__title"><?= esc_html( $atts['title'] ); ?></h3>

		<div class="Signup__form__labels">
			<div class="Signup__form__labels__label limited">
				<?php _e( 'Limited pricing offer', 'ms' ); ?>
				<div class="Tooltip">
					<div class="fontello-info">
						<div class="Tooltip__text Tooltip__text--left"><?php _e( 'This offer is temporary, but the discount isn’t. Get up to 40% off for life.', 'ms' ); ?></div>
					</div>
				</div>
			</div>
			<span class="Signup__form__labels__label">
				<?= esc_html( $atts['label1'] ); ?>&nbsp;
				<span class="Signup__form__labels__label__tooltip">
					<span class="fontello-info "></span>
					<span class="Signup__form__labels__label__tooltip__text Tooltip"><?= esc_html( $atts['tooltip1'] ); ?></span>
				</span>
			</span>
			<span class="Signup__form__labels__label hidden"><?= esc_html( $atts['label2'] ); ?>&nbsp;</span>
		</div>

		<form data-form-type="signup-trial-form" data-id="signup" data-plan-type="Trial" data-pap-network>
			<input data-id="grecaptcha" name="grecaptcha" type="hidden" value="" autocomplete="off">
			<input data-id="ga_client_id" name="ga_client_id" type="hidden" value="" autocomplete="off">

			<div data-id="nameFieldmain" class="Signup__form__item">
				<div class="InputWrapper">
					<svg class="Signup__form__icon user" viewBox="0 0 18 20" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M18 19v-2a4.999 4.999 0 0 0-5-5H5a4.999 4.999 0 0 0-5 5v2a1 1 0 0 0 2 0v-2c0-.796.317-1.558.879-2.121h.001A2.996 2.996 0 0 1 5 14h8c.796 0 1.558.317 2.121.879v.001c.563.562.879 1.325.879 2.12v2a1 1 0 0 0 2 0zm-9-9c2.763 0 5-2.237 5-5 0-2.762-2.237-5-5-5S4 2.238 4 5c0 2.763 2.238 5 5 5zm0-2a3 3 0 1 1 0-6 3 3 0 1 1 0 6z"/></svg>
					<input type="text" data-type="text" name="fullname" placeholder="<?php _e( 'Full name', 'ms' ); ?>" value="" required="required" autocomplete="off" maxlength="100">
				</div>
				<div class="ErrorMessage"></div>
			</div>

			<div data-id="mailFieldmain" class="Signup__form__item">
				<div class="InputWrapper">
					<svg class="Signup__form__icon mail" viewBox="0 0 22 18" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M3 0C1.35 0 0 1.35 0 3v12c0 1.65 1.35 3 3 3h16c1.65 0 3-1.35 3-3V3c0-1.65-1.35-3-3-3H3zm0 2h16c.55 0 1 .45 1 1v12c0 .55-.45 1-1 1H3c-.55 0-1-.45-1-1V3c0-.55.45-1 1-1z"/><path d="M20.427 2.181 11 8.779 1.573 2.181A.998.998 0 1 0 .427 3.819l10 7a.999.999 0 0 0 1.146 0l10-7a.998.998 0 1 0-1.146-1.638z"/></svg>
					<input type="email" name="email" placeholder="<?php _e( 'Enter your e-mail', 'ms' ); ?>" value="" required="required" autocomplete="off" maxlength="255">
				</div>
				<div class="ErrorMessage"></div>
			</div>

			<div data-id="domainFieldmain" class="Signup__form__item">
				<div class="InputWrapper">
					<svg class="Signup__form__icon company" viewBox="0 0 22 20" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" fill-rule="evenodd" clip-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2"><path d="M19 4H3a3 3 0 0 0-3 3v10a3 3 0 0 0 3 3h16c1.658 0 3-1.342 3-3V7a3 3 0 0 0-3-3zm0 2a1 1 0 0 1 1 1v10a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h16z"/><path d="M16 19V3c0-.795-.315-1.56-.879-2.121A2.992 2.992 0 0 0 13 0H9c-.795 0-1.56.315-2.121.879A2.992 2.992 0 0 0 6 3v16a1 1 0 0 0 2 0V3c0-.264.104-.519.291-.705l.004-.004A.995.995 0 0 1 9 2h4c.264 0 .519.104.705.291l.004.004A.995.995 0 0 1 14 3v16a1 1 0 0 0 2 0z"/></svg>
					<input type="text" data-type="text" name="subdomain" placeholder="<?php _e( 'Company name', 'ms' ); ?>" value="" required="required"  autocomplete="off" maxlength="30">
					<div class="Signup__form__item__domain"><?php _e( '.postaffiliatepro.com', 'ms' ); ?></div>
				</div>
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

			<?php Trial_Signup::grecaptcha_parts(); ?>

			<div data-id="signUpError" class="hidden"></div>

			<div data-id="submitFieldmain" class="Signup__form__submit">
				<button type="submit" data-id="createButtonmain" class="Button Button--full createTrialButton">
					<div class="WorkingPanel" style="display: none;">
						<img class="gear-wheels" src="<?php echo esc_url( get_template_directory_uri() . '/assets/images/gear-wheels.gif' ); ?>" alt="gear wheels">
					</div>
					<span><?php _e( 'Create account for FREE', 'ms' ); ?></span>
				</button>
			</div>
		</form>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'signupform-network', 'ms_signup_network_form' );
