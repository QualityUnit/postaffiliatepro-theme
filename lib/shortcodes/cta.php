<?php

function ms_cta( $atts ) {
	$atts = shortcode_atts(
		array(
			'title'  => 'Give Post Affilite Pro a chance',
			'text'   => 'Start using Post Affiliate Pro today with our 14-days trial',
			'button' => 'Create account for FREE',
			'link'   => '/trial',
		),
		$atts,
		'cta'
	);

	ob_start();
	?>

	<div class="CTA__wrapper">
		<div class="CTA__content">
			<div class="CTA__title"><?= wp_kses_post( $atts['title'] ); ?></div>
			<div class="CTA__text"><?= wp_kses_post( $atts['text'] ); ?></div>
			<a href="<?= esc_url( $atts['link'] ); ?>" class="CTA__button Button">
				<span><?= esc_html( $atts['button'] ); ?></span>
			</a>
		</div>
		<img class="CTA__image" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/cta_img.png" alt="<?= wp_kses_post( $atts['title'] ); ?>" />
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'cta', 'ms_cta' );
