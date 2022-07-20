<?php
	namespace QualityUnit\Extras;

/**
	* Add <body> classes
	*/

function body_class( $classes ) {
	// Add page slug if it doesn't exist
	if ( is_single() || is_page() && ! is_front_page() ) {
		if ( ! in_array( basename( get_permalink() ), $classes, true ) ) {
			$classes[] = basename( get_permalink() );
		}
	}

	return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );

/**
 * get inline svg image
 */

function get_svg_image( $name ) {
	return file_get_contents( esc_url( get_template_directory_uri() . '/assets/images/' . $name . '.svg' ) );
}
