<?php

/**
 * Setup variables
 */
define( 'THEME_VERSION', '1.15.65' );

/**
	* Includes
	*/

	$theme_includes = array(
		'functions/detectmobilebrowser.php',             // Detects mobile
		'lib/assets.php',             // Scripts and stylesheets
		'lib/extras.php',             // Custom functions
		'lib/setup.php',              // Theme setup
		'lib/wrapper.php',            // Theme wrapper class
		'lib/cleaner/assets.php',     // Clean assets
		'lib/cleaner/comments.php',   // Disable comments
		'lib/cleaner/emojis.php',     // Disable emojis
		'lib/cleaner/oembed.php',     // Disable oembed
		'lib/cleaner/wordpress.php',  // Clean WordPress things
		'lib/cleaner/wpml.php',       // Clean WPML things
		'lib/cleaner/yoast.php',      // Clean Yoast things
		'lib/trial-signup/class-trial-signup.php', // Trial signup php submission
		'functions/widgets.php',      // Import Widgets/Plugins
		'functions/main.php', // Other includes
		'functions/rest-api.php', // Rest API mods
		'functions/post-query-mods.php', // Post Query mods
		'functions/redirects.php', // Taxonomies Redirects
		'functions/content-filters-functions.php', // Content filters functions
		'functions/elementor-content-filters.php', // Content filters for elementor
		'functions/content-filters.php', // Content filters
		'functions/content-filters-learn-more.php', // Content filters for Block--learnMore
		'functions/components-import.php', // Importing CSS by class
		'functions/sideribbon-arrow.php', // Adds SVG with bookmark like ending
		'functions/import-functions.php', // Partials JS and SCSS import functions
		'functions/sidebar-toc.php', // TOC sidebar in features, integrations, blogs etc.
		'functions/compact-header.php', // compact header TOC
		'functions/post-types.php', // Import Custom Post Types
		'functions/taxonomies.php', // Import Custom Taxonomies
		'functions/metaboxes.php', // Import Metaboxes
		'functions/shortcodes.php', // Import ShortCodes
		'functions/header-banners.php', // Import ShortCodes
		'functions/create-language-menu.php', // Function for generate languages
		'functions/dynamic-award-badges.php', // Function to place award badges dynamically
		'functions/urlslab-related-posts.php', // Related posts
	);

	foreach ( $theme_includes as $file ) {
		$filepath = locate_template( $file );

		if ( ! $filepath ) {
			trigger_error( sprintf( esc_html( __( 'Error locating %s for inclusion', 'urlslab' ) ), esc_url( $file ) ), E_USER_ERROR );
		}

		require_once $filepath;
	}
	unset( $file, $filepath );


	/**
* TEMP: Fix for Visual/Text toggle removes paragraph tags on translations and shows on one line
	*/

	add_filter(
		'tiny_mce_before_init',
		function ( $config ) {
			if ( defined( 'ELEMENTOR_VERSION' ) && did_action( 'admin_init' ) && get_current_screen()->id === 'wpml_page_tm/menu/translations-queue' ) {
				$config['wpautop'] = false;
			}

			return $config;
		}
	);
