<?php

add_filter( 'simple_register_metaboxes', 'add_company_overview_metaboxes' );

function add_company_overview_metaboxes( $metaboxes ) {
	$metaboxes[] = array(
		'id'        => 'mb_directory_company_overview',
		'name'      => 'Company - Overview',
		'post_type' => array( 'ms_directory' ),
		'priority'  => 'high',
		'fields'    => array(
			array(
				'id'    => 'company_name',
				'label' => 'Company name',
				'type'  => 'text',
			),
			array(
				'id'    => 'company_description',
				'label' => 'Description of the company',
				'type'  => 'editor',
			),
			array(
				'id'    => 'company_url',
				'label' => 'URL of the company',
				'type'  => 'text',
			),
		),
	);

	return $metaboxes;
}


add_filter( 'simple_register_metaboxes', 'add_affiliate_program_overview_metaboxes' );

function add_affiliate_program_overview_metaboxes( $metaboxes ) {
	$metaboxes[] = array(
		'id'        => 'mb_directory_affiliate_program_overview',
		'name'      => 'Affiliate Program - Overview',
		'post_type' => array( 'ms_directory' ),
		'priority'  => 'core',
		'fields'    => array(
			array(
				'id'    => 'program_name',
				'label' => 'Name of your affiliate program',
				'type'  => 'text',
			),
			array(
				'id'    => 'program_url',
				'label' => 'URL to affiliate program',
				'type'  => 'text',
			),
			array(
				'id'    => 'program_url_nofollow',
				'label' => 'Follow URL',
				'type'  => 'checkbox',
			),
			array(
				'id'      => 'industry',
				'label'   => 'Industry',
				'type'    => 'radio',
				'options' => array(
					'administration'             => 'Administration, Business Support and Waste Management Services',
					'agriculture'                => 'Agriculture, Forestry, Fishing and Hunting',
					'finance_insurance'          => 'Finance and Insurance',
					'real_estate'                => 'Real Estate and Rental and Leasing',
					'transportation_warehousing' => 'Transportation and Warehousing',
					'retail'                     => 'Retail Trade',
					'professional_scientific'    => 'Professional, Scientific and Technical Services',
					'healthcare'                 => 'Healthcare and Social Assistance',
					'wholesale'                  => 'Wholesale Trade',
					'accommodation_food'         => 'Accommodation and Food Services',
					'utilities'                  => 'Utilities',
					'manufacturing'              => 'Manufacturing',
					'educational_services'       => 'Educational Services',
					'arts_entertainment'         => 'Arts, Entertainment and Recreation',
					'media_marketing'            => 'Media and Marketing',
					'software'                   => 'Software',
					'other'                      => 'Other',
				),
			),
			array(
				'id'      => 'product_type',
				'label'   => 'Product type',
				'type'    => 'checklist',
				'options' => array(
					'digital_products'  => 'Digital products',
					'digital_services'  => 'Digital services',
					'physical_products' => 'Physical products',
					'physical_services' => 'Physical services',
					'other'             => 'Other',
				),
			),
			array(
				'id'      => 'type_program',
				'label'   => 'Type of affiliate program',
				'type'    => 'checklist',
				'options' => array(
					'cps'   => 'CPS - Cost Per Sales',
					'cpa'   => 'CPA - Cost Per Acquisition',
					'cpl'   => 'CPL - Cost Per Lead',
					'cpc'   => 'CPC - Cost Per Click',
					'cpm'   => 'CPM - Cost Per Mile',
					'other' => 'Other',
				),
			),
			array(
				'id'      => 'affiliate_software',
				'label'   => 'Which affiliate software do you use to manage your affiliate program?',
				'type'    => 'radio',
				'options' => array(
					'pap'           => 'Post Affiliate Pro',
					'affice'        => 'Affice',
					'affiliatewp'   => 'AffiliateWP',
					'afftrack'      => 'Afftrack',
					'avangate'      => 'Avangate',
					'awin'          => 'Awin',
					'cake'          => 'CAKE',
					'cjaffiliate'   => 'CJ Affiliate',
					'clickbank'     => 'Clickbank',
					'clickinc'      => 'Clickinc',
					'clickmeter'    => 'Clickmeter',
					'everflow'      => 'Everflow',
					'firstpromoter' => 'Firstpromoter',
					'growthhero'    => 'Growthhero',
					'hitpath'       => 'HitPath',
					'idevaffiliate' => 'iDevAffiliate',
					'jrox'          => 'JROX',
					'leaddyno'      => 'LeadDyno',
					'linktrust'     => 'Linktrust',
					'offer18'       => 'Offer18',
					'osiaffiliate'  => 'OSI affiliate',
					'rekuten'       => 'Rakuten Advertising',
					'redtrack'      => 'RedTrack',
					'refersion'     => 'Refersion',
					'scaleo'        => 'Scaleo',
					'shareasale'    => 'ShareASale',
					'tapaffiliate'  => 'Tapaffiliate',
					'tune'          => 'Tune',
					'trackiers'     => 'Trackiers',
					'voluum'        => 'Voluum',
					'na'            => 'N/A',
					'other'         => 'Other',
				),
			),
			array(
				'id'    => 'affiliate_software_url',
				'label' => 'Custom Affiliate Software URL',
				'type'  => 'text',
			),
		),
	);

	return $metaboxes;
}


add_filter( 'simple_register_metaboxes', 'add_affiliate_program_campaigns_metaboxes' );

function add_affiliate_program_campaigns_metaboxes( $metaboxes ) {
	$metaboxes[] = array(
		'id'        => 'mb_directory_affiliate_program_campaigns',
		'name'      => 'Affiliate Program - Campaigns',
		'post_type' => array( 'ms_directory' ),
		'priority'  => 'core',
		'fields'    => array(
			array(
				'id'      => 'promotional_types',
				'label'   => 'Promotional materials',
				'type'    => 'checklist',
				'options' => array(
					'influencer'       => 'Influencer',
					'banner'           => 'Banner rotator',
					'coupons'          => 'Discount coupons',
					'flash'            => 'Flash banners',
					'html'             => 'HTML banners',
					'image'            => 'Image banners',
					'lightbox'         => 'Lightbox banners',
					'peel'             => 'Peel banners',
					'rebrand_pdf'      => 'Rebrand PDF',
					'simple_pdf'       => 'Simple PDF banners',
					'smartlinks'       => 'SmartLinks',
					'site_replication' => 'Site replication',
					'text_link'        => 'Text link banners',
					'zip'              => 'ZIP banners',
					'na'               => 'N/A',
					'other'            => 'Other',
				),
			),
			array(
				'id'    => 'cookie_duration',
				'label' => 'Cookie duration',
				'type'  => 'text',
			),
			array(
				'id'      => 'traffic_source',
				'label'   => 'Accepted Traffic source',
				'type'    => 'checklist',
				'options' => array(
					'ppc'    => 'PPC',
					'link'   => 'Link and banner advertisements',
					'social' => 'Social media advertisements',
					'na'     => 'N/A',
					'other'  => 'Other',
				),
			),
			array(
				'id'    => 'countries',
				'label' => 'Accepted countries',
				'type'  => 'textarea',
			),
			array(
				'id'      => 'explicit_content',
				'label'   => 'Explicit content',
				'type'    => 'radio',
				'options' => array(
					'yes' => 'Yes',
					'no'  => 'No',
					'na'  => 'N/A',
				),
			),
			array(
				'id'      => 'political',
				'label'   => 'Religious or Political content',
				'type'    => 'radio',
				'options' => array(
					'yes' => 'Yes',
					'no'  => 'No',
					'na'  => 'N/A',
				),
			),
		),
	);

	return $metaboxes;
}


add_filter( 'simple_register_metaboxes', 'add_affiliate_program_payouts_metaboxes' );

function add_affiliate_program_payouts_metaboxes( $metaboxes ) {
	$metaboxes[] = array(
		'id'        => 'mb_directory_affiliate_program_payouts',
		'name'      => 'Affiliate Program - Payouts',
		'post_type' => array( 'ms_directory' ),
		'priority'  => 'core',
		'fields'    => array(
			array(
				'id'      => 'tiers',
				'label'   => 'Do you have any tiers of commissions in your affiliate program?',
				'type'    => 'checklist',
				'options' => array(
					'multitier'  => 'Multi-tier',
					'singletier' => 'Single-tier',
					'na'         => 'N/A',
					'other'      => 'Other',
				),
			),
			array(
				'id'    => 'commission_rate',
				'label' => 'Commission rate',
				'type'  => 'text',
			),
			array(
				'id'      => 'commission_structure',
				'label'   => 'Commission structure',
				'type'    => 'checklist',
				'options' => array(
					'fixed'      => 'Fixed commission',
					'percentage' => 'Percentage commission',
					'na'         => 'N/A',
					'other'      => 'Other',
				),
			),
			array(
				'id'      => 'payout_frequency',
				'label'   => 'Payout frequency',
				'type'    => 'checklist',
				'options' => array(
					'each_sale' => 'After each sale',
					'daily'     => 'Daily',
					'weekly'    => 'Weekly',
					'monthly'   => 'Monthly',
					'na'        => 'N/A',
					'other'     => 'Other',
				),
			),
			array(
				'id'      => 'payout_methods',
				'label'   => 'Payout methods',
				'type'    => 'checklist',
				'options' => array(
					'ach'                => 'ACH',
					'amazonpay'          => 'AmazonPay',
					'applepay'           => 'Apple Pay',
					'bank_transfer'      => 'Bank transfers',
					'paypal'             => 'Paypal',
					'checks'             => 'Checks',
					'digital_currencies' => 'Digital currencies',
					'direct_debit'       => 'Direct debit payments',
					'ebay'               => 'eBay Managed Payments',
					'gift_cards'         => 'Gift cards',
					'googlepay'          => 'Google Pay',
					'prepaid_cards'      => 'Prepaid cards',
					'skrill'             => 'Skrill',
					'qiwi'               => 'Qiwi',
					'wire_transfer'      => 'Wire transfer',
					'na'                 => 'N/A',
					'other'              => 'Other',
				),
			),
			array(
				'id'    => 'minimum_payout',
				'label' => 'Minimum payout for affiliates',
				'type'  => 'text',
			),
		),
	);

	return $metaboxes;
}
