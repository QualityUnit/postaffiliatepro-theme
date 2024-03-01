<?php

function ms_fullscreenlogos( $atts ) {
	$atts = shortcode_atts(
		array(
			'logos' => '8',
		),
		$atts,
		'fullscreenlogos'
	);
	ob_start();
	?>

<div class="FullScreen__main__container__logos">
	<?php
		$logos = array(
			'logo-airhelp.svg',
			'logo-eset.svg',
			'logo-instabank.svg',
			'logo-protonvpn.svg',
			'logo-sumup.svg',
			'logo-ticketeal.svg',
			'logo-timedoctor.svg',
			'logo-visma.svg',
		);

		for ( $logo = 0; $logo < $atts['logos']; $logo++ ) {
			?>
			<div class="FullScreen__main__container__logos__item">
					<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/logos/<?= esc_html( $logos[ $logo ] ); ?>"
						alt="<?= esc_attr( $logos[ $logo ] ); ?>">
			</div>
	<?php	} ?>
</div>

	<?php
		return ob_get_clean();
}
add_shortcode( 'fullscreenlogos', 'ms_fullscreenlogos' );
