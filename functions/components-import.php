<?php

/**
 * IconTabs block CSS and JS importer
 */

function icontabs_sources( $content ) {
	$icontabs_block = preg_match( '/\<section.+class=".+IconTabs.+/', $content );

	if ( $icontabs_block || is_user_logged_in() ) {
		wp_enqueue_style( 'icontabs', get_template_directory_uri() . '/assets/dist/components/IconTabs' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		wp_enqueue_script( 'icontabs', get_template_directory_uri() . '/assets/dist/IconTabs' . wpenv() . '.js', false, THEME_VERSION, true );
	}
		return $content;
}

add_filter( 'the_content', 'icontabs_sources' );
add_action( 'admin_enqueue_scripts', 'icontabs_sources' );


function components_imports( $content ) {
	$blocks = array(
		'Announcement__bar'             => 'components/AnnouncementBar',
		'AffiliateDuo'                  => 'components/AffiliateDuo',
		'AlternativeTable'              => 'components/AlternativeTable',
		'SoftphoneTable'                => 'components/SoftphoneTable',
		'BlockButtons'                  => 'components/BlockButtons',
		'BlockPoints'                   => 'components/BlockPoints',
		'BlockChannels'                 => 'components/BlockChannels',
		'BlockCoupon'                   => 'components/BlockCoupon',
		'BlockPricing'                  => 'components/BlockPricing',
		'BlockPricingNew'               => 'components/BlockPricingNew',
		'BlockResources'                => 'components/BlockResources',
		'BlockTrial'                    => 'components/BlockTrial',
		'Boxes--image'                  => 'components/BoxesImage',
		'Boxes--stars'                  => 'components/BoxesStars',
		'Block--overflow'               => 'components/BlockOverflow',
		'Block--video'                  => 'components/BlockVideo',
		'HeroBanner'                    => 'components/HeroBanner',
		'HeroBig'                       => 'components/HeroBig',
		'elementor-tabs'                => 'components/HorizontalTabs',
		'HorizontalTabs'                => 'components/HorizontalTabs',
		'MerchantAffiliate'             => 'components/MerchantAffiliate',
		'RequestDemo'                   => 'layouts/tests/RequestDemo',
		'ScheduleDemo'                  => 'layouts/tests/ScheduleDemo',
		'urlslab-block-tableofcontents' => 'components/UrlslabTOC',
	);

	if ( ! $content ) {
		return $content;
	}

	$dom = new DOMDocument();
	libxml_use_internal_errors( true );
	$dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) );
	libxml_clear_errors();
	$xpath = new DOMXPath( $dom );
	
	foreach ( $blocks as $class => $csspath ) {
		$id           = strtolower( $class );
		$found_blocks = $xpath->query( './/*[contains(@class, "' . $class . '")]' );
		
		if ( isset( $found_blocks[0] ) || is_user_logged_in() ) {
			wp_enqueue_style( $id, get_template_directory_uri() . '/assets/dist/' . $csspath . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}
	}

	$dom->removeChild( $dom->doctype );
	$content = $dom->saveHtml();
	$content = str_replace( '<html><body>', '', $content );
	$content = str_replace( '</body></html>', '', $content );
	return $content;
}

add_filter( 'the_content', 'components_imports' );
add_action( 'admin_enqueue_scripts', 'components_imports' );
