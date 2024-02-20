<?php

/**
  * Redirect Integrations Categories
  */
function integration_category_redirect() {
	if ( is_tax( 'ms_integrations_categories' ) ) {
		wp_safe_redirect( '/integration-methods/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'integration_category_redirect' );


/**
  * Redirect Integrations Types
  */
function integration_types_redirect() {
	if ( is_tax( 'ms_integrations_types' ) ) {
		wp_safe_redirect( '/integration-methods/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'integration_types_redirect' );


/**
  * Redirect Features Categories
  */
function features_category_redirect() {
	if ( is_tax( 'ms_features_categories' ) ) {
		wp_safe_redirect( '/features/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'features_category_redirect' );


/**
  * Redirect Academy Categories
  */
function academy_category_redirect() {
	if ( is_tax( 'ms_academy_categories' ) ) {
		wp_safe_redirect( '/academy/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'academy_category_redirect' );


/**
  * Redirect Glossary Categories
  */
function glossary_category_redirect() {
	if ( is_tax( 'ms_glossary_categories' ) ) {
		wp_safe_redirect( '/affiliate-marketing-glossary/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'glossary_category_redirect' );


/**
  * Redirect Directory Categories
  */
function directory_category_redirect() {
	if ( is_tax( 'ms_directory_categories' ) ) {
		wp_safe_redirect( '/affiliate-program-directory/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'directory_category_redirect' );


/**
  * Redirect About us Categories
  */
function about_category_redirect() {
	if ( is_tax( 'ms_about_categories' ) ) {
		wp_safe_redirect( '/about/about-postaffiliatepro', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'about_category_redirect' );


/**
  * Redirect Learning Center Categories
  */
function learningcenter_category_redirect() {
	if ( is_tax( 'ms_learning-center_categories' ) ) {
		wp_safe_redirect( '/learning-center/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'learningcenter_category_redirect' );


/**
  * Redirect Awards Years
  */
function awards_years_redirect() {
	if ( is_tax( 'ms_awards_years' ) ) {
		wp_safe_redirect( '/awards/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'awards_years_redirect' );


/**
  * Redirect Research Categories
  */
function research_category_redirect() {
	if ( is_tax( 'ms_research_categories' ) ) {
		wp_safe_redirect( '/research/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'research_category_redirect' );


/**
 * Redirect Videos Categories
 */
function videos_category_redirect() {
	if ( is_tax( 'ms_videos_categories' ) ) {
		wp_safe_redirect( '/videos/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'videos_category_redirect' );

/**
	* Alternatives
	*/

function alternatives_category_redirect() {
	if ( is_tax( 'ms_alternatives_categories' ) ) {
		wp_safe_redirect( '/alternatives/', 301 );
		exit;
	}
}
add_action( 'template_redirect', 'alternatives_category_redirect' );
