<?php
add_filter( 'simple_register_metaboxes', 'add_academy_postype_metaboxes' );
function add_academy_postype_metaboxes( $settings ) {
	$settings[] = array(
		'id'         => 'mb_academy',
		'capability' => 'edit_posts',
		'name'       => 'Academy',
		'post_type'  => array( 'ms_academy' ),
		'priority'   => 'core',
		'fields'     => array(
			array(
				'id'          => 'mb_academy_sidebar_title',
				'label'       => 'Short Title',
				'description' => '',
				'type'        => 'text',
			),
			array(
				'id'          => 'mb_academy_resources',
				'label'       => 'Resources',
				'description' => '',
				'type'        => 'editor',
			),
			array(
				'id'          => 'mb_academy_pillar',
				'label'       => 'Activate as Pillar page',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
		),
	);

	return $settings;
}

add_filter( 'simple_register_taxonomy_settings', 'add_academy_taxonomy_metaboxes' );
function add_academy_taxonomy_metaboxes( $settings ) {

	$settings[] = array(
		'id'       => 'mb_academy_category',
		'taxonomy' => array( 'ms_academy_categories' ),
		'fields'   => array(
			array(
				'id'      => 'category_color',
				'label'   => 'Category color',
				'type'    => 'select',
				'options' => array(
					'blue'   => 'Blue',
					'green'  => 'Green',
					'red'    => 'Red',
					'violet' => 'Violet',
					'yellow' => 'Yellow',
					'pink'   => 'Pink',
					'lime'   => 'Lime',
				),
			),
		),
	);

	return $settings;
}
