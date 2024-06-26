<?php
// Blog page
set_source( 'single-post', 'pages/blog', 'css' );

// Archive type pages
$archive_type = array( 'archive', 'awards', 'testimonials', 'customers' );

foreach ( $archive_type as $specific_page ) {
	set_source( $specific_page, 'pages/Archive', 'css' );
}

// Post type page
set_source( 'post', 'pages/post', 'css' );

// Article (success stories)
set_source( 'single-ms_success-stories', 'pages/SuccessStoriesArticle', 'css' );

// Pricing page
set_source( 'pricing', 'pages/pricing', 'css' );
set_source( 'pricing', 'pricing', 'js' );
