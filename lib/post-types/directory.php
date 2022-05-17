<?php

add_action(
	'init',
	function () {
		$labels  = array(
			'name'                  => _x( 'Directories', 'Post Type General Name', 'ms' ),
			'singular_name'         => _x( 'Directory', 'Post Type Singular Name', 'ms' ),
			'menu_name'             => __( 'Directories', 'ms' ),
			'name_admin_bar'        => __( 'Directory', 'ms' ),
			'archives'              => __( 'Item Archives', 'ms' ),
			'attributes'            => __( 'Item Attributes', 'ms' ),
			'parent_item_colon'     => __( 'Parent Item:', 'ms' ),
			'all_items'             => __( 'All Items', 'ms' ),
			'add_new_item'          => __( 'Add New Item', 'ms' ),
			'add_new'               => __( 'Add New', 'ms' ),
			'new_item'              => __( 'New Item', 'ms' ),
			'edit_item'             => __( 'Edit Item', 'ms' ),
			'update_item'           => __( 'Update Item', 'ms' ),
			'view_item'             => __( 'View Item', 'ms' ),
			'view_items'            => __( 'View Items', 'ms' ),
			'search_items'          => __( 'Search Item', 'ms' ),
			'not_found'             => __( 'Not found', 'ms' ),
			'not_found_in_trash'    => __( 'Not found in Trash', 'ms' ),
			'featured_image'        => __( 'Featured Image', 'ms' ),
			'set_featured_image'    => __( 'Set featured image', 'ms' ),
			'remove_featured_image' => __( 'Remove featured image', 'ms' ),
			'use_featured_image'    => __( 'Use as featured image', 'ms' ),
			'insert_into_item'      => __( 'Insert into item', 'ms' ),
			'uploaded_to_this_item' => __( 'Uploaded to this item', 'ms' ),
			'items_list'            => __( 'Items list', 'ms' ),
			'items_list_navigation' => __( 'Items list navigation', 'ms' ),
			'filter_items_list'     => __( 'Filter items list', 'ms' ),
		);
		$rewrite = array(
			'slug'       => 'affiliate-program-directory',
			'with_front' => true,
			'pages'      => true,
			'feeds'      => false,
		);
		$args    = array(
			'label'               => __( 'Directory', 'ms' ),
			'labels'              => $labels,
			'supports'            => array( 'title', 'thumbnail' ),
			'hierarchical'        => true,
			'public'              => true,
			'show_ui'             => true,
			'show_in_menu'        => true,
			'menu_position'       => 42,
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
		register_post_type( 'ms_directory', $args );
	},
	0
);
