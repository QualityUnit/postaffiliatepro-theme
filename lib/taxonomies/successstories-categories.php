<?php

add_action(
	'init',
	function () {
		$labels = array(
			'name'          => _x( 'Success Stories Categories', 'Taxonomy General Name', 'ms' ),
			'singular_name' => _x( 'Success Stories Category', 'Taxonomy Singular Name', 'ms' ),
			'menu_name'     => __( 'Categories', 'ms' ),
		);
		$args   = array(
			'labels'            => $labels,
			'hierarchical'      => true,
			'public'            => true,
			'show_ui'           => true,
			'show_admin_column' => true,
			'show_in_nav_menus' => true,
			'show_tagcloud'     => false,
			'show_in_rest'      => true,
		);
		register_taxonomy( 'ms_success-stories_categories', array( 'ms_success-stories' ), $args );
	},
	0
);
