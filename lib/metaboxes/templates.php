<?php
add_filter( 'simple_register_metaboxes', 'add_template_postype_metaboxes' );
function add_template_postype_metaboxes( $settings ) {
	$settings[] = array(
		'id'         => 'mb_templates',
		'capability' => 'edit_posts',
		'name'       => 'Templates',
		'post_type'  => array( 'ms_templates' ),
		'priority'   => 'core',
		'fields'     => array(
			array(
				'id'          => 'mb_templates_resources',
				'label'       => 'Resources',
				'description' => '',
				'type'        => 'editor',
			),
			array(
				'id'          => 'mb_templates_pillar',
				'label'       => 'Activate as Pillar page',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
			array(
				'id'          => 'mb_templates_help-desk-software',
				'label'       => 'Technologies - Help Desk Software',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
			array(
				'id'          => 'mb_templates_ticketing-software',
				'label'       => 'Technologies - Ticketing Software',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
			array(
				'id'          => 'mb_templates_live-chat-software',
				'label'       => 'Technologies - Live Chat Software',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
			array(
				'id'          => 'mb_templates_call-center-software',
				'label'       => 'Technologies - Call Center Software',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
			array(
				'id'          => 'mb_templates_social-media',
				'label'       => 'Technologies - Social Media Support',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
			array(
				'id'          => 'mb_templates_customer-portal-software',
				'label'       => 'Technologies - Customer Portal Software',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
			array(
				'id'          => 'mb_templates_knowledge-base',
				'label'       => 'Technologies - Knowledge Base Software',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
			array(
				'id'          => 'mb_templates_affiliate-program',
				'label'       => 'Technologies - Affiliate Software',
				'description' => '',
				'type'        => 'checkbox',
				'default'     => 'off',
			),
		),
	);

	return $settings;
}


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
