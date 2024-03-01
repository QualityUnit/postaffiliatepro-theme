<?php
function ms_appicons() {
	ob_start();
	?>

	<div class="appdownload flex" style="margin-top: 1em">
		<a class="Button--app" href="https://apps.apple.com/us/app/post-affiliate-pro/id1100644457#?platform=iphone" target="_blank">
			<img width="165" height="55" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/app-store-badge.svg?v2" alt="Download on the App Store">
		</a>
		<a class="Button--app" href="https://play.google.com/store/apps/details?id=com.qualityunit.android.postaffiliatepro" target="_blank">
			<img  width="186" height="55" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/google-play-badge.svg?v2" alt="Get it on Google Play">
		</a>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'appicons', 'ms_appicons' );
