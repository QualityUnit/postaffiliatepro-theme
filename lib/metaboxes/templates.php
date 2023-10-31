<?php
$metabox = array(
	'id'         => 'mb_templates',
	'capability' => 'edit_posts',
	'name'       => 'Templates',
	'post_type'  => array( 'ms_templates' ),
	'priority'   => 'high',
	'args'     => array(
		array(
			'id'          => 'mb_templates_pillar',
			'label'       => 'Activate as Pillar page',
			'description' => '',
			'type'        => 'checkbox',
			'default'     => 'off',
		),
	),
);

new trueMetaBox( $metabox );



add_filter( 'simple_register_taxonomy_settings', 'add_templates_taxonomy_metaboxes' );
function add_templates_taxonomy_metaboxes( $settings ) {

	$settings[] = array(
		'id'       => 'mb_templates_category',
		'taxonomy' => array( 'ms_templates_categories' ),
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
