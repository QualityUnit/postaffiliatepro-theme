<?php
	namespace QualityUnit\Extras;

/**
	* Add <body> classes
	*/

function body_class( $classes ) {
	// Add page slug if it doesn't exist
	if ( is_single() || is_page() && ! is_front_page() ) {
		if ( ! in_array( basename( get_permalink() ), $classes, true ) ) {
			$permalink = apply_filters( 'wpml_permalink', get_the_permalink(), 'en', true );
			$classes[] = basename( get_permalink() );
			$classes[] = basename( $permalink );
		}
	}

	return $classes;
}
add_filter( 'body_class', __NAMESPACE__ . '\\body_class' );
