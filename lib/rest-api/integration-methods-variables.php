<?php
function integration_methods_variables( $html ) {

	if ( 'ms_integrations' === get_post_type() ) {
		$html = preg_replace_callback(
			'/{\$(CreateSaleUrl|ExtraDataJs|ExtraDataUrl)}/',
			function () {
					return '';
			},
			$html
		);

		$html = preg_replace_callback(
			'/{\$CreateSaleJs}/',
			function () {
					return 'var sale = PostAffTracker.createSale();';
			},
			$html
		);
		
		$html = preg_replace_callback(
			'/{\$AccountConcatPhp}/',
			function () {
					return '&apos;Account_ID&apos;';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$AccountId}/',
			function () {
					return 'Account_ID';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$BaseUrl}/',
			function () {
					return 'URL_TO_PostAffiliatePro';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$HttpProtocol}/',
			function () {
					return 'https://';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$ImageTrackScript}/',
			function () {
					return 'sale.php?';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$NotifySaleScript}/',
			function () {
					return 'notifysale.php';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$PluginsUrl}/',
			function () {
					return 'URL_TO_PostAffiliatePro/plugins/';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$ScriptsUrl}/',
			function () {
					return 'URL_TO_PostAffiliatePro/scripts/';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$SetAccountApi}/',
			function () {
					return '$saleTracker-&gt;setAccountId(&apos;Account_ID&apos;);';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$SetAccountJs}/',
			function () {
					return 'PostAffTracker.setAccountId(&apos;Account_ID&apos;);';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$PapAbbr}/',
			function () {
					return 'PAP';
			},
			$html
		);
		$html = preg_replace_callback(
			'/{\$PapFullname}/',
			function () {
					return 'Post Affiliate Pro';
			},
			$html
		);

		$html = preg_replace_callback(
			'/{\$TrackingScript}/',
			function () {
					return '&lt;script id=&quot;pap_x2s6df8d&quot; src=&quot;https://URL_TO_PostAffiliatePro/scripts/trackjs.js&quot; type=&quot;text/javascript&quot;&gt;&lt;/script&gt;';
			},
			$html
		);
	}
	return $html;
}
add_filter( 'the_content', 'integration_methods_variables', 10 );
