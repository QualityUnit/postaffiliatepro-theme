<?php

function ms_copy( $atts, $content = null ) {
	$atts = shortcode_atts(
		array(
			'button' => 'yes',
		),
		$atts,
		'copy'
	);

	ob_start();

	$cleared_text = $content;
	$cleared_text = str_replace( '</p>', "\r\n", $cleared_text );
	$cleared_text = wp_strip_all_tags( $cleared_text );
	?>

	<div class="Copy">
		<textarea readonly><?= esc_textarea( $cleared_text ); ?></textarea>

		<?php if ( 'yes' === $atts['button'] ) { ?>
			<button class="Button Button--outline Button--copy"><span><?php _e( 'Copy to clipboard', 'ms' ); ?></span></button>
		<?php } ?>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'copy', 'ms_copy' );
