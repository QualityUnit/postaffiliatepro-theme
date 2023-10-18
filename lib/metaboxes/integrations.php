<?php

$metabox = array(
	'id'         => 'mb_integrations',
	'capability' => 'edit_posts',
	'name'       => 'Integrations',
	'post_type'  => array( 'ms_integrations' ),
	'priority'   => 'high',
	'args'       => array(
		array(
			'id'          => 'mb_integrations_native_integration_url',
			'label'       => 'Native Integration URL',
			'description' => '',
			'type'        => 'text',
		),
		array(
			'id'          => 'mb_integrations_external_integration_url',
			'label'       => 'External Integration URL',
			'description' => '',
			'type'        => 'text',
		),
		array(
			'id'          => 'mb_integrations_zapier_integration_url',
			'label'       => 'Zapier Integration URL',
			'description' => '',
			'type'        => 'text',
		),
		array(
			'id'          => 'mb_integrations_partner_learn_more',
			'label'       => 'Partner - Learn More',
			'description' => '',
			'type'        => 'text',
		),
		array(
			'id'          => 'mb_integrations_partner_privacy_policy',
			'label'       => 'Partner - Privacy Policy',
			'description' => '',
			'type'        => 'text',
		),
		array(
			'id'          => 'mb_integrations_resources',
			'label'       => 'Resources',
			'description' => '',
			'type'        => 'editor',
		),
		array(
			'id'          => 'mb_integrations_pillar',
			'label'       => 'Activate as Pillar page',
			'description' => '',
			'type'        => 'checkbox',
			'default'     => 'off',
		),
	),
);

new trueMetaBox( $metabox );
