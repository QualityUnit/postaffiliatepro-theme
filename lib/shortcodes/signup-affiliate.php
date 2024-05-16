<?php

function ms_signup_affiliate_form( $atts ) {

	$atts = shortcode_atts(
		array(
			'form_heading'    => __( 'Sign Up Form', 'ms' ),
			'form_description'    => __( 'Sign up to our affiliate program today and enter the family of 9600+ affiliates from all around the world with the same goal.', 'ms' ),
			'label_username'    => __( 'Username (Email)', 'ms' ),
			'label_first_name'   => __( 'First Name', 'ms' ),
			'label_last_name'   => __( 'Last Name', 'ms' ),
			'label_city'   => __( 'City', 'ms' ),
			'label_street'   => __( 'Street', 'ms' ),
			'label_state'   => __( 'State', 'ms' ),
			'label_zipcode'   => __( 'Zipcode', 'ms' ),
			'label_country'   => __( 'Country', 'ms' ),
			'label_company_name'   => __( 'Company name', 'ms' ),
			'label_web_url'   => __( 'Web url', 'ms' ),
			'label_phone'   => __( 'Phone', 'ms' ),
			'label_paypal'   => __( 'PayPal Email', 'ms' ),
			'label_paypal_tooltip_text'   => __( 'The email address that is associated with your PayPal account.', 'ms' ),
			'label_terms'   => __( 'I agree to the terms & conditions', 'ms' ),
			'label_terms_link'   => __( '/affiliate-program-terms-conditions/', 'ms' ),
			'label_button'   => __( 'Signup', 'ms' ),
		),
		$atts,
	);

	$countries =
		array(
			'AF' => 'Afghanistan',
			'AX' => 'Aland Islands',
			'AL' => 'Albania',
			'DZ' => 'Algeria',
			'AS' => 'American Samoa',
			'AD' => 'Andorra',
			'AO' => 'Angola',
			'AI' => 'Anguilla',
			'AQ' => 'Antarctica',
			'AG' => 'Antigua and Barbuda',
			'AR' => 'Argentina',
			'AM' => 'Armenia',
			'AW' => 'Aruba',
			'AU' => 'Australia',
			'AT' => 'Austria',
			'AZ' => 'Azerbaijan',
			'BS' => 'Bahamas',
			'BH' => 'Bahrain',
			'BD' => 'Bangladesh',
			'BB' => 'Barbados',
			'BY' => 'Belarus',
			'BE' => 'Belgium',
			'BZ' => 'Belize',
			'BJ' => 'Benin',
			'BM' => 'Bermuda',
			'BT' => 'Bhutan',
			'BO' => 'Bolivia',
			'BA' => 'Bosnia and Herzegovina',
			'BW' => 'Botswana',
			'BV' => 'Bouvet Island',
			'BR' => 'Brazil',
			'IO' => 'British Indian Ocean Territory',
			'BN' => 'Brunei Darussalam',
			'BG' => 'Bulgaria',
			'BF' => 'Burkina Faso',
			'BI' => 'Burundi',
			'KH' => 'Cambodia',
			'CM' => 'Cameroon',
			'CA' => 'Canada',
			'CV' => 'Cape Verde',
			'KY' => 'Cayman Islands',
			'CF' => 'Central African Republic',
			'TD' => 'Chad',
			'CL' => 'Chile',
			'CN' => 'China',
			'CX' => 'Christmas Island',
			'CC' => 'Cocos (Keeling) Islands',
			'CO' => 'Colombia',
			'KM' => 'Comoros',
			'CG' => 'Congo',
			'CD' => 'Congo, The Democratic Republic of the',
			'CK' => 'Cook Islands',
			'CR' => 'Costa Rica',
			'CI' => "Cote D'Ivoire",
			'HR' => 'Croatia',
			'CU' => 'Cuba',
			'CY' => 'Cyprus',
			'CZ' => 'Czech Republic',
			'DK' => 'Denmark',
			'DJ' => 'Djibouti',
			'DM' => 'Dominica',
			'DO' => 'Dominican Republic',
			'EC' => 'Ecuador',
			'EG' => 'Egypt',
			'SV' => 'El Salvador',
			'GQ' => 'Equatorial Guinea',
			'ER' => 'Eritrea',
			'EE' => 'Estonia',
			'ET' => 'Ethiopia',
			'FK' => 'Falkland Islands (Malvinas)',
			'FO' => 'Faroe Islands',
			'FJ' => 'Fiji',
			'FI' => 'Finland',
			'FR' => 'France',
			'FX' => 'France, Metropolitan',
			'GF' => 'French Guiana',
			'PF' => 'French Polynesia',
			'TF' => 'French Southern Territories',
			'GA' => 'Gabon',
			'GM' => 'Gambia',
			'GE' => 'Georgia',
			'DE' => 'Germany',
			'GH' => 'Ghana',
			'GI' => 'Gibraltar',
			'GR' => 'Greece',
			'GL' => 'Greenland',
			'GD' => 'Grenada',
			'GP' => 'Guadeloupe',
			'GU' => 'Guam',
			'GT' => 'Guatemala',
			'GG' => 'Guernsey',
			'GN' => 'Guinea',
			'GW' => 'Guinea-Bissau',
			'GY' => 'Guyana',
			'HT' => 'Haiti',
			'HM' => 'Heard Island and McDonald Islands',
			'VA' => 'Holy See (Vatican City State)',
			'HN' => 'Honduras',
			'HK' => 'Hong Kong',
			'HU' => 'Hungary',
			'IS' => 'Iceland',
			'IN' => 'India',
			'ID' => 'Indonesia',
			'IR' => 'Iran, Islamic Republic of',
			'IQ' => 'Iraq',
			'IE' => 'Ireland',
			'IM' => 'Isle of Man',
			'IL' => 'Israel',
			'IT' => 'Italy',
			'JM' => 'Jamaica',
			'JP' => 'Japan',
			'JE' => 'Jersey',
			'JO' => 'Jordan',
			'KZ' => 'Kazakstan',
			'KE' => 'Kenya',
			'KI' => 'Kiribati',
			'KP' => "Korea, Democratic People's Republic of",
			'KR' => 'Korea, Republic of',
			'KW' => 'Kuwait',
			'KG' => 'Kyrgyzstan',
			'LA' => "Lao People's Democratic Republic",
			'LV' => 'Latvia',
			'LB' => 'Lebanon',
			'LS' => 'Lesotho',
			'LR' => 'Liberia',
			'LY' => 'Libyan Arab Jamahiriya',
			'LI' => 'Liechtenstein',
			'LT' => 'Lithuania',
			'LU' => 'Luxembourg',
			'MO' => 'Macau',
			'MK' => 'Macedonia',
			'MG' => 'Madagascar',
			'MW' => 'Malawi',
			'MY' => 'Malaysia',
			'MV' => 'Maldives',
			'ML' => 'Mali',
			'MT' => 'Malta',
			'MH' => 'Marshall Islands',
			'MQ' => 'Martinique',
			'MR' => 'Mauritania',
			'MU' => 'Mauritius',
			'YT' => 'Mayotte',
			'MX' => 'Mexico',
			'FM' => 'Micronesia, Federated States of',
			'MD' => 'Moldova, Republic of',
			'MC' => 'Monaco',
			'MN' => 'Mongolia',
			'ME' => 'Montenegro',
			'MS' => 'Montserrat',
			'MA' => 'Morocco',
			'MZ' => 'Mozambique',
			'MM' => 'Myanmar',
			'NA' => 'Namibia',
			'NR' => 'Nauru',
			'NP' => 'Nepal',
			'NL' => 'Netherlands',
			'AN' => 'Netherlands Antilles',
			'NC' => 'New Caledonia',
			'NZ' => 'New Zealand',
			'NI' => 'Nicaragua',
			'NE' => 'Niger',
			'NG' => 'Nigeria',
			'NU' => 'Niue',
			'NF' => 'Norfolk Island',
			'MP' => 'Northern Mariana Islands',
			'NO' => 'Norway',
			'OM' => 'Oman',
			'O1' => 'Other',
			'PK' => 'Pakistan',
			'PW' => 'Palau',
			'PS' => 'Palestinian Territory',
			'PA' => 'Panama',
			'PG' => 'Papua New Guinea',
			'PY' => 'Paraguay',
			'PE' => 'Peru',
			'PH' => 'Philippines',
			'PN' => 'Pitcairn Islands',
			'PL' => 'Poland',
			'PT' => 'Portugal',
			'PR' => 'Puerto Rico',
			'QA' => 'Qatar',
			'RE' => 'Reunion',
			'RO' => 'Romania',
			'RU' => 'Russian Federation',
			'RW' => 'Rwanda',
			'SH' => 'Saint Helena',
			'KN' => 'Saint Kitts and Nevis',
			'LC' => 'Saint Lucia',
			'PM' => 'Saint Pierre and Miquelon',
			'VC' => 'Saint Vincent and the Grenadines',
			'WS' => 'Samoa',
			'SM' => 'San Marino',
			'ST' => 'Sao Tome and Principe',
			'A2' => 'Satellite Provider',
			'SA' => 'Saudi Arabia',
			'SN' => 'Senegal',
			'RS' => 'Serbia',
			'SC' => 'Seychelles',
			'SL' => 'Sierra Leone',
			'SG' => 'Singapore',
			'SK' => 'Slovakia',
			'SI' => 'Slovenia',
			'SB' => 'Solomon Islands',
			'SO' => 'Somalia',
			'ZA' => 'South Africa',
			'GS' => 'South Georgia and the South Sandwich Islands',
			'ES' => 'Spain',
			'LK' => 'SriLanka',
			'SD' => 'Sudan',
			'SR' => 'Suriname',
			'SJ' => 'Svalbardand Jan Mayen',
			'SZ' => 'Swaziland',
			'SE' => 'Sweden',
			'CH' => 'Switzerland',
			'SY' => 'Syrian Arab Republic',
			'TW' => 'Taiwan',
			'TJ' => 'Tajikistan',
			'TZ' => 'Tanzania, United Republic of',
			'TH' => 'Thailand',
			'TL' => 'Timor-Leste',
			'TG' => 'Togo',
			'TK' => 'Tokelau',
			'TO' => 'Tonga',
			'TT' => 'Trinidad and Tobago',
			'TN' => 'Tunisia',
			'TR' => 'Turkey',
			'TM' => 'Turkmenistan',
			'TC' => 'Turks and Caicos Islands',
			'TV' => 'Tuvalu',
			'UG' => 'Uganda',
			'UA' => 'Ukraine',
			'AE' => 'United Arab Emirates',
			'GB' => 'United Kingdom',
			'US' => 'United States',
			'UM' => 'United States Minor Outlying Islands',
			'UY' => 'Uruguay',
			'UZ' => 'Uzbekistan',
			'VU' => 'Vanuatu',
			'VE' => 'Venezuela',
			'VN' => 'Vietnam',
			'VG' => 'Virgin Islands, British',
			'VI' => 'Virgin Islands, U.S.',
			'WF' => 'Wallis and Futuna',
			'EH' => 'Western Sahara',
			'YE' => 'Yemen',
			'ZM' => 'Zambia',
			'ZW' => 'Zimbabwe',
		);

	?>

	<div class="AffiliateSignup hidden">
		<div class="AffiliateSignup__wrpaper">
			<h2><?= esc_html( $atts['form_heading'] ); ?></h2>

			<p><?= esc_html( $atts['form_description'] ); ?></p>

			<button type="button" id="closeAffSign" class="closeForm icn-close"></button>

			<form class="CustomHtmlSignupForm" action="https://pap.qualityunit.com/affiliates/signup.php" method="post" _lpchecked="1">

				<label class="icn-mail">
					<input type="email" name="username" placeholder="<?= esc_attr( $atts['label_username'] ); ?>">
					<span><?= esc_html( $atts['label_username'] ); ?></span>
				</label>

				<div class="flex">
					<label class="icn-user-alt">
						<input type="text" name="firstname" required placeholder="<?= esc_attr( $atts['label_first_name'] ); ?>">
						<span><?= esc_html( $atts['label_first_name'] ); ?></span>
					</label>

					<label class="icn-user-alt">
						<input type="text" name="lastname" required placeholder="<?= esc_attr( $atts['label_last_name'] ); ?>">
						<span><?= esc_html( $atts['label_last_name'] ); ?></span>
					</label>
				</div>

				<label class="icn-city">
					<input type="text" name="data2" required placeholder="<?= esc_attr( $atts['label_city'] ); ?>" >
					<span><?= esc_html( $atts['label_city'] ); ?></span>
				</label>

				<label class="icn-location-pin">
					<input type="text" name="data1" required placeholder="<?= esc_attr( $atts['label_street'] ); ?>" >
					<span><?= esc_html( $atts['label_street'] ); ?></span>
				</label>

				<div class="flex">
					<label class="icn-state">
						<input type="text" name="data4" placeholder="<?= esc_attr( $atts['label_state'] ); ?>" >
						<span><?= esc_html( $atts['label_state'] ); ?></span>
					</label>

					<label class="icn-zip">
						<input type="text" name="data5" required placeholder="<?= esc_attr( $atts['label_zipcode'] ); ?>" >
						<span><?= esc_html( $atts['label_zipcode'] ); ?></span>
					</label>
				</div>

				<div class="country-select isSingleSelect">
					<div class="country-select__title required">
						<svg class="Signup__form__icon country" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path d="M10 0C4.48 0 0 4.48 0 10s4.48 10 10 10 10-4.48 10-10S15.52 0 10 0zM9 17.93c-3.95-.49-7-3.85-7-7.93 0-.62.08-1.21.21-1.79L7 13v1c0 1.1.9 2 2 2v1.93zm6.9-2.54c-.26-.81-1-1.39-1.9-1.39h-1v-3c0-.55-.45-1-1-1H6V8h2c.55 0 1-.45 1-1V5h2c1.1 0 2-.9 2-2v-.41c2.93 1.19 5 4.06 5 7.41 0 2.08-.8 3.97-2.1 5.39z" /></svg>
						<span><?= esc_html( $atts['label_country'] ); ?></span>
					</div>
					<div id="country" class="country-select__items hidden">
						<div class="checkbox country-select__items--inn">
							<?php
							foreach ( $countries as $code => $name ) {
								?>
								<div class="country-select__item"><input type="radio" name="data10" id="country_<?= esc_attr( $code ); ?>" value="<?= esc_attr( $code ); ?>" data-title="<?= esc_attr( $name ); ?>" placeholder=""><label for="<?= 'country_' . esc_attr( $code ); ?>"><span><?= esc_html( $name ); ?></span></label></div>
							<?php } ?>
						</div>
					</div>
				</div>

				<label class="icn-buildings">
					<input type="text" name="data3" required placeholder="<?= esc_attr( $atts['label_company_name'] ); ?>">
					<span><?= esc_html( $atts['label_company_name'] ); ?></span>
				</label>

				<label class="icn-globe">
					<input type="text" name="data6" required placeholder="<?= esc_attr( $atts['label_web_url'] ); ?>">
					<span><?= esc_html( $atts['label_web_url'] ); ?></span>
				</label>

				<label class="icn-phone-solid">
					<input type="tel" name="data7" placeholder="<?= esc_attr( $atts['label_phone'] ); ?>">
					<span><?= esc_html( $atts['label_phone'] ); ?></span>
				</label>

				<label class="paypal icn-paypal">
					<input type="text" name="PPEMAIL" required placeholder="<?= esc_attr( $atts['label_paypal'] ); ?>" >
					<span><?= esc_html( $atts['label_paypal'] ); ?></span>
					<div class="Signup__form__item__info Tooltip ma-left">
						<div class="Signup__form__item__info__icon ComparePlans__info-icon fontello-info">
							<div class="Tooltip__text Tooltip__text--left">
								<?= esc_html( $atts['label_paypal_tooltip_text'] ); ?>
							</div>
						</div>
					</div>
				</label>
				<div class="checkbox agreeWithTerms">
					<input type="checkbox" id="agreeWithTerms" name="agreeWithTerms" required>
					<label for="agreeWithTerms">
						<p><?php _e( 'I agree to the', 'ms' ); ?> <a title="<?php _e( 'terms & conditions', 'ms' ); ?>" href="<?= esc_url( $atts['label_terms_link'] ); ?>" target="_blank"><?php _e( 'terms & conditions', 'ms' ); ?></a></p>
					</label>
				</div>

				<button type="submit" class="Button Button--full"><span><?= esc_html( $atts['label_button'] ); ?></span></button>

				<input type="hidden" name="errorUrl" value="/affiliate-program/">
				<input type="hidden" name="successUrl" value="https://pap.qualityunit.com/affiliates/login.php#login">
				<input type="hidden" name="visitorId" id="visitorId" value="npK6dLpgRHZF6IDI6aFDawzc1C8dqMvE" >
			</form>

		</div>

	</div>

	<script>
		const affSignIn = document.querySelectorAll( '[data-aff_signin]' );

		function showHideForm( show ) {
			if ( show ) {
				document.querySelector( 'body' ).classList.add( 'overlay' );
				document.querySelector( '.AffiliateSignup' ).classList.remove( 'hidden' );
				return;
			}
			document.querySelector( '.AffiliateSignup' ).classList.add( 'hidden' );
			document.querySelector( 'body' ).classList.remove( 'overlay' );
		}

		affSignIn.forEach( ( btn ) => {
			btn.addEventListener( 'click', () => {
				showHideForm( true );
			} );
		} );

		document.querySelector( '#closeAffSign' ).addEventListener( 'click', () => {
			showHideForm();
			event.target.removeEventListener( 'keyup', showHideForm );
		} );

		window.addEventListener( 'keyup', () => {
			if ( event.key === 'Escape' ) {
				showHideForm();
				window.removeEventListener( 'keyup', showHideForm );
			}
		} );



		const countrySelectTitleText = document.querySelector('.country-select__title span');
		const countrySelectTitle = document.querySelector('.country-select__title');
		const countrySelectItems = document.querySelector('.country-select__items');
		const countrySelectItem = document.querySelectorAll('.country-select__item');
		const countrySelectItemsList = document.querySelectorAll('.country-select__items--inn');

		countrySelectTitle.addEventListener('click', function() {
			countrySelectItems.classList.toggle('hidden');
		});

		countrySelectItem.forEach(function(input) {
			input.addEventListener('click', function() {
				countrySelectTitleText.innerText = this.innerText;
				countrySelectTitleText.classList.add('selected');
				countrySelectItems.classList.add('hidden');
			});
		});

		// Close the form when clicking outside of it
		document.addEventListener('click', function(event) {
			if (!event.target.closest('.CustomHtmlSignupForm')) {
				countrySelectItems.classList.add('hidden');
			}
		});

		// Close the form when pressing the Escape key
		document.addEventListener('keydown', function(event) {
			if (event.key === 'Escape') {
				countrySelectItems.classList.add('hidden');
			}
		});

	</script>
	<?php
	ob_start();

	?>
	<?php

	set_source( false, 'shortcodes/AffiliateSignup' );
	return ob_get_clean();
}
add_shortcode( 'signup_affiliate', 'ms_signup_affiliate_form' );
