<?php

add_action(
	'init',
	function () {
		$labels = array(
			'name'          => _x( 'Integrations Types', 'Taxonomy General Name', 'ms' ),
			'singular_name' => _x( 'Integrations Type', 'Taxonomy Singular Name', 'ms' ),
			'menu_name'     => __( 'Types', 'ms' ),
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
		register_taxonomy( 'ms_integrations_types', array( 'ms_integrations' ), $args );
	},
	0
);
