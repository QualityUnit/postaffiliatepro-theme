<?php

add_action(
	'init',
	function () {
		$labels  = array(
			'name'           => _x( 'Glossary', 'Post Type General Name', 'ms' ),
			'singular_name'  => _x( 'Glossary', 'Post Type Singular Name', 'ms' ),
			'menu_name'      => __( 'Glossary', 'ms' ),
			'name_admin_bar' => __( 'Glossary', 'ms' ),
		);
		$rewrite = array(
			'slug'       => 'affiliate-marketing-glossary',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => false,
		);
		$args    = array(
			'label'               => __( 'Glossary', 'ms' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'editor', 'excerpt', 'thumbnail', 'revisions', 'author' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 32,
			'menu_icon'           => 'dashicons-book',
			'show_in_admin_bar'   => true,
			'show_in_nav_menus'   => true,
			'can_export'          => true,
			'has_archive'         => true,
			'exclude_from_search' => false,
			'publicly_queryable'  => true,
			'rewrite'             => $rewrite,
			'capability_type'     => 'post',
			'show_in_rest'        => true,
		);
		register_post_type( 'ms_glossary', $args );
	},
	0
);
