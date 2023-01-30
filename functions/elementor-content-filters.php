<?php

// Home Headline adding of Award badges

function add_awards_to_header( $content ) {
	if ( ! $content ) {
		return $content;
	}

	$dom = new DOMDocument();
	libxml_use_internal_errors( true );
	$dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) );
	libxml_clear_errors();
	$xpath       = new DOMXPath( $dom );
	$hero_header = $xpath->query( ".//*[contains(@class, 'heroHeadline--bg')]" );
	$awards      = $dom->createDocumentFragment();
	$awards->appendXML( '<div class="AwardsHeroHeader"><img class="AwardsHeroHeader__text" src="' . get_template_directory_uri() . '/assets/images/heroHeadline_award_badges_text.svg" alt="Awards" />[awards_small posts=3]</div>' );

	// @codingStandardsIgnoreStart
	foreach ( $hero_header as $header ) {
    $header->appendChild( $awards );
	}
	// @codingStandardsIgnoreEnd

	$dom->removeChild( $dom->doctype );
	$content = $dom->saveHtml();
	$content = str_replace( '<html><body>', '', $content );
	$content = str_replace( '</body></html>', '', $content );
	return $content;
}

add_filter( 'the_content', 'add_awards_to_header' );
