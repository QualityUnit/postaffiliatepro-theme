<?php

add_action(
	'init',
	function () {
		$labels  = array(
			'name'                       => _x( 'Affiliate Managers', 'Taxonomy General Name', 'ms' ),
			'singular_name'              => _x( 'Affiliate Manager', 'Taxonomy Singular Name', 'ms' ),
			'menu_name'                  => __( 'Affiliate Managers', 'ms' ),
			'all_items'                  => __( 'All Items', 'ms' ),
			'parent_item'                => __( 'Parent Item', 'ms' ),
			'parent_item_colon'          => __( 'Parent Item:', 'ms' ),
			'new_item_name'              => __( 'New Item Name', 'ms' ),
			'add_new_item'               => __( 'Add New Item', 'ms' ),
			'edit_item'                  => __( 'Edit Item', 'ms' ),
			'update_item'                => __( 'Update Item', 'ms' ),
			'view_item'                  => __( 'View Item', 'ms' ),
			'separate_items_with_commas' => __( 'Separate items with commas', 'ms' ),
			'add_or_remove_items'        => __( 'Add or remove items', 'ms' ),
			'choose_from_most_used'      => __( 'Choose from the most used', 'ms' ),
			'popular_items'              => __( 'Popular Items', 'ms' ),
			'search_items'               => __( 'Search Items', 'ms' ),
			'not_found'                  => __( 'Not Found', 'ms' ),
			'no_terms'                   => __( 'No items', 'ms' ),
			'items_list'                 => __( 'Items list', 'ms' ),
			'items_list_navigation'      => __( 'Items list navigation', 'ms' ),
		);
		$rewrite = array(
			'slug'         => 'affiliate-manager',
			'with_front'   => true,
			'hierarchical' => true,
		);
		$args    = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'show_in_rest'      => true,
			'rewrite'           => $rewrite,
		);
		register_taxonomy( 'ms_directory_affiliate_manager', array( 'ms_directory' ), $args );
	},
	0
);
