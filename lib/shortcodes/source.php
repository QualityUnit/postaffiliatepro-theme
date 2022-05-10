<?php

function ms_source( $atts, $content = null ) {
	ob_start();
	$content = $content;
	?>

	<div class="Post__m__negative Article__source flex">
		<div class="Article__source__image">
			<svg class="Article__source__icon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 982.3 982.3" xml:space="preserve"><path d="M982.3 130.74c0-34.5-29-61.8-63.5-59.899C713.6 82.24 603 148.44 545.9 203.24a59.996 59.996 0 0 0-18.301 43.101v635.1c0 24.8 28.4 38.899 48.2 23.899 63.8-48.699 171.7-98.5 349.601-107.3 31.899-1.6 56.899-28 56.899-59.899V130.74h.001zM56.8 798.04c177.9 8.8 285.8 58.5 349.601 107.3 19.699 15.101 48.199 1 48.199-23.899v-635.1c0-16.301-6.6-31.9-18.3-43.101-57.1-54.8-167.7-121-372.8-132.399C29 68.841 0 96.141 0 130.74v607.5c0 31.8 25 58.3 56.8 59.8z"/></svg>
		</div>
		<div class="Article__source__content">
			<h4 class="Article__source__content__title"><?php _e( 'Knowledge base resources', 'ms' ); ?></h4>
			<p class="Article__source__content__description"><?= $content; // @codingStandardsIgnoreLine ?></p>
		</div>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'source', 'ms_source' );
