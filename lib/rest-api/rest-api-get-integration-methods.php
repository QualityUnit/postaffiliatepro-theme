<?php
	
	
/* Gets output of integration methods on URL
	http://www.postaffiliatepro.com/wp-json/wp/v2/integration_methods
*/

function get_integration_methods() {
	global $sitepress;
	$args = array(
		'post_type'   => 'ms_integrations',
		'post_status' => 'publish',
		'nopaging'    => true, // @codingStandardsIgnoreLine
		'orderby'     => 'title',
		'order'       => 'ASC',
	);

	$origlang    = 'en';
	$query       = new WP_Query( $args );
	$posts       = $query->get_posts();
	$currentlang = apply_filters( 'wpml_current_language', null );

	$sitepress->switch_lang( $origlang );
	$origposts = $query->get_posts();
	
	$output = array();
 
	foreach ( $origposts as $origpost ) {

		// Get Post ID in target lang
		$translated_id = apply_filters( 'wpml_object_id', $origpost->ID, 'ms_integrations', false, $currentlang );

		// If ID of translated post does not exists, get original EN post
		if ( $translated_id === null ) {  // @codingStandardsIgnoreLine
			$output[] = array(
				'id'            => $origpost->ID,
				'integrationid' => $origpost->post_name,
				'name'          => $origpost->post_title,
				'image'         => wp_get_attachment_image_src( get_post_thumbnail_id( $origpost->ID ), 'archive_thumbnail' )[0],
			);
		} else {
			// Iterating in posts of query in requested language
			foreach ( $posts as $post ) {
				// If ID of post in requested lang is same as one got from above, print translated post data
				if ( $post->ID === $translated_id ) {
					$output[] = array(
						'id'            => $post->ID,
						'integrationid' => $post->post_name,
						'name'          => $post->post_title,
						'image'         => wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'archive_thumbnail' )[0],
					);

				}
			}
		}
	}
	wp_send_json( $output );
}

function register_integrations_endpoints() {
	register_rest_route(
		'wp/v2',
		'/integration_methods',
		array(
			'methods'             => 'GET',
			'callback'            => 'get_integration_methods',
			'permission_callback' => '__return_true',
		),
	);
}

add_action( 'rest_api_init', 'register_integrations_endpoints' );

/* Get single Integration method post by slug */

function get_single_integration( $slug ) {
	$args = array(
		'name'        => $slug['slug'],
		'post_type'   => 'ms_integrations',
		'post_status' => 'publish',
	);
	
	$post = get_posts( $args );

	$data['integrationid'] = $post[0]->post_name;
	$data['name']          = $post[0]->post_title;
	$data['image']         = wp_get_attachment_image_src( get_post_thumbnail_id( $post[0]->ID ), 'archive_thumbnail' )[0];

	// Filters out all comments from content
	$content = preg_replace_callback(
		'/\<!--.+--\>/',
		function ( $m ) {
			return '';
		},
		$post[0]->post_content
	);

	// Removes all classes
	$content = preg_replace_callback(
		'/class=".+?"/',
		function ( $m ) {
			return '';
		},
		$content
	);

	// Changes all h2 id to h3
	$content = preg_replace_callback(
		'/\<h2.+id=\".+\>(.+)\<\/h2\>/',
		function ( $m ) {
			return '<h3>' . $m[1] . '</h3>';
		},
		$content
	);

	// Change all img with plain src to &lt &gt for code integration
	$content = preg_replace_callback(
		'/\<img(.+? src=\".+?)\>/',
		function ( $m ) {
			return '&lt;img' . $m[1] . '&gt;';
		},
		$content
	);

	$data['text_before'] = $content;
	wp_send_json( $data );
}

function register_integration_post() {
	register_rest_route(
		'wp/v2',
		'integration_methods/(?P<slug>[a-zA-Z0-9-]+)',
		array(
			'methods'             => 'GET',
			'callback'            => 'get_single_integration',
			'permission_callback' => '__return_true',
		)
	);
}

add_action( 'rest_api_init', 'register_integration_post' );
