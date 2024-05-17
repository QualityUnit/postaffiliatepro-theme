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
			'label1'   => __( '14 or 30 days free trial', 'ms' ),
			'tooltip1' => __( 'Free trial for 14 days with a free email, or 30 days with a company email', 'ms' ),
			'label2'   => __( 'No Credit Card required', 'ms' ),
			'button'   => __( 'Create account for FREE', 'ms' ),
		),
		$atts,
	);

	$regions = Trial_Signup::$regions;

	ob_start();
	?>
	
	<style type="text/css">
		.Signup__form input{width:100%}.Signup__form__item{position: relative}.Signup__form__icon{fill: #bec2c9;position: absolute;z-index: 3;top: 50%;-webkit-transform: translateY(-50%);-ms-transform: translateY(-50%);transform: translateY(-50%);left: 1.3125em;width: 1.375em;}
	</style>
	
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

		<form data-form-type="signup-trial-form" data-id="signup" data-plan-type="Trial" data-pap-network>
			<input data-id="grecaptcha" name="grecaptcha" type="hidden" value="" autocomplete="off">
			<input data-id="ga_client_id" name="ga_client_id" type="hidden" value="" autocomplete="off">
			<!-- <input data-id="plan" type="hidden" value="Trial" autocomplete="off">
			<input data-id="variation" type="hidden" value="3513230f" autocomplete="off"> -->

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

			<div data-id="regionFieldmain" class="Signup__form__item has-svg">
				<div class="InputWrapper">
					<div class="FilterMenu isSingleSelect">
						<svg width="23" height="23" xmlns="http://www.w3.org/2000/svg" xml:space="preserve" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2"><path d="M19.632 3.368A11.5 11.5 0 1 0 23 11.5a11.425 11.425 0 0 0-3.368-8.132zm1.691 7.31h-3.235a17.9 17.9 0 0 0-.781-4.568 12.689 12.689 0 0 0 1.7-1 9.815 9.815 0 0 1 2.316 5.569zm-9-8.87a5.457 5.457 0 0 1 2.471 2.539q.225.406.422.845a11.648 11.648 0 0 1-2.892.563zm3.254.717a9.881 9.881 0 0 1 2.238 1.411 11.028 11.028 0 0 1-1.087.628 11.4 11.4 0 0 0-1.152-2.038zM8.209 4.347a5.457 5.457 0 0 1 2.471-2.539v3.948a11.648 11.648 0 0 1-2.892-.563q.195-.438.42-.845zm-1.935.216a11.034 11.034 0 0 1-1.087-.628 9.881 9.881 0 0 1 2.238-1.411 11.4 11.4 0 0 0-1.152 2.04zM10.679 7.4v3.276H6.556a16.256 16.256 0 0 1 .657-3.944 13.286 13.286 0 0 0 3.466.668zm0 4.919V15.6a13.29 13.29 0 0 0-3.465.668 16.255 16.255 0 0 1-.657-3.944zm0 4.922v3.948a5.457 5.457 0 0 1-2.471-2.539q-.225-.406-.422-.845a11.645 11.645 0 0 1 2.893-.561zm-3.254 3.231a9.879 9.879 0 0 1-2.238-1.411 11.036 11.036 0 0 1 1.087-.628 11.4 11.4 0 0 0 1.15 2.041zm7.368-1.822a5.457 5.457 0 0 1-2.471 2.539v-3.945a11.646 11.646 0 0 1 2.892.563q-.197.438-.422.845zm1.935-.216a11.035 11.035 0 0 1 1.087.628 9.879 9.879 0 0 1-2.238 1.411 11.4 11.4 0 0 0 1.15-2.037zM12.321 15.6v-3.279h4.122a16.254 16.254 0 0 1-.657 3.944 13.287 13.287 0 0 0-3.465-.665zm0-4.919V7.4a13.287 13.287 0 0 0 3.465-.668 16.254 16.254 0 0 1 .657 3.944zM4 5.115a12.7 12.7 0 0 0 1.7 1 17.9 17.9 0 0 0-.781 4.568H1.677A9.815 9.815 0 0 1 4 5.115zm-2.32 7.207h3.235a17.9 17.9 0 0 0 .781 4.568 12.692 12.692 0 0 0-1.7 1 9.814 9.814 0 0 1-2.319-5.569zM19 17.885a12.7 12.7 0 0 0-1.7-1 17.9 17.9 0 0 0 .781-4.568h3.235A9.814 9.814 0 0 1 19 17.885z"/></svg>
						<div class="FilterMenu__title flex flex-align-center">
							<span><?php _e( 'Choose your region (datacenter location)', 'ms' ); ?></span>
						</div>
						<div class="FilterMenu__items">
							<div class="FilterMenu__items--inn">
								<?php foreach ( $regions as $region_code => $region_name ) { ?>
									<div class="checkbox FilterMenu__item">
										<input 
											class="filter-item" 
											type="radio" 
											name="region" 
											id="<?php echo esc_attr( "signup_region_{$region_code}" ); ?>" 
											value="<?php echo esc_attr( $region_code ); ?>" 
											data-title="<?php echo esc_attr( $region_name ); ?>" 
										/>
										<label for="<?php echo esc_attr( "signup_region_{$region_code}" ); ?>" >
											<span><?php echo esc_html( $region_name ); ?></span>
										</label>
									</div>
								<?php } ?>
							</div>
						</div>
					</div>
				</div>
				<div class="ErrorMessage"></div>
				<div class="DescriptionText"><?php echo esc_html( __( 'Data centre changes are not possible after account creation.', 'ms' ) ); ?></div>
			</div>

			<div data-id="promoFieldmain" class="Signup__form__item">
				<input type="checkbox" name="Promo" id="sendOffersSignup" data-id="sendOffers">
				<label for="sendOffersSignup"><p><?php _e( 'Send me product updates and other promotional offers.', 'ms' ); ?></p></label>
			</div>

			<?php Trial_Signup::grecaptcha_parts(); ?>

			<div data-id="signUpError" class="hidden"></div>

			<div data-id="submitFieldmain" class="Signup__form__submit">
				<button type="submit" data-id="createButtonmain" class="Button Button--full createTrialButton" onclick="ga('send', 'event', 'SignUp', 'Trial', 'Trial Signup');">
					<span><?php _e( 'Create account for FREE', 'ms' ); ?></span>
				</button>

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
		</form>
	</div>

	<?php 
	/*
	// @codingStandardsIgnoreStart ?>
	<?php
		add_action( 'wp_footer', function() {
	?>
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
	<?php
	global $crm_ver_app;
	if ( ! isset( $crm_ver_app ) ) {
				$crm_ver_app = gmdate( 'ymdGis', filemtime( get_template_directory() . '/assets/scripts/static/crm.js' ) );
					?>
	<script id="jquery-js" data-src="<?= esc_url( includes_url() . 'js/jquery/jquery' . wpenv() . '.js?ver=' . THEME_VERSION); ?>"></script>
	<script id="jquery-cookie-js" data-src="<?= esc_url(  get_template_directory_uri() . '/assets/scripts/static/jquery.cookie.js?ver=' . THEME_VERSION); ?>"></script>
	<script id="jquery-alphanum-js" data-src="<?= esc_url(  get_template_directory_uri() . '/assets/scripts/static/jquery.alphanum.js?ver=' . THEME_VERSION); ?>"></script>
	<script data-src="<?= esc_url( get_template_directory_uri() ) . '/assets/scripts/static/crm.js?ver=' . $crm_ver_app ?>"></script>
					<?php } }, 999 ); ?>
	<?php // @codingStandardsIgnoreEnd 
	
	
	*/ 
	?>

	<?php
	


	return ob_get_clean();
}
add_shortcode( 'signupform-network', 'ms_signup_network_form' );
