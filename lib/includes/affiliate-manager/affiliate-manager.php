<?php
set_source( 'directory', 'pages/Category', 'css' );
set_source( 'directory', 'pages/Directory', 'css' );
set_source( 'directory', 'components/AffiliateManagerCard', 'css' );
set_source( 'directory', 'pages/AffiliateManager', 'css' );

$aff_id = get_queried_object_id();
if ( get_term_meta( $aff_id, 'aff_name', true ) ) {
	$aff_name = get_term_meta( $aff_id, 'aff_name', true );
} else {
	$aff_name = get_term_meta( $aff_id, 'name', true ); // fallback for previous field
}
$bio_hide = get_term_meta( $aff_id, 'bio_hide', true );

// getting a picture or an avatar
$aff_image_id = get_term_meta( $aff_id, 'picture', true );
$aff_image = wp_get_attachment_image_src( $aff_image_id, 'person_thumbnail' );
$aff_image_url = $aff_image ? $aff_image[0] : '';

if ( ! $aff_image_url ) {
	$aff_email = get_term_meta( $aff_id, 'email', true );
	$aff_image_url = get_avatar_url(
		$aff_email,
		array(
			'size' => 145,
			'default' => 'mp',
		)
	);
}

$email     = get_term_meta( $aff_id, 'email', true );
$phone     = get_term_meta( $aff_id, 'phone', true );
$linkedin  = get_term_meta( $aff_id, 'linkedin', true );
$countries = get_term_meta( $aff_id, 'countries', true );
if ( 'N/A' === $countries ) {
	$countries = __( 'Worldwide', 'ms' );
}

$revenue = get_term_meta( $aff_id, 'salary_range', true );
if ( 'usd10' === $revenue ) {
	$revenue = __( '$10 000 - $20 000', 'ms' );
}
if ( 'usd20' === $revenue ) {
	$revenue = __( '$20 000 - $40 000', 'ms' );
}
if ( 'usd40' === $revenue ) {
	$revenue = __( '$40 000 - $60 000', 'ms' );
}
if ( 'usd60' === $revenue ) {
	$revenue = __( '$60 000 - $80 000', 'ms' );
}
if ( 'usd80' === $revenue ) {
	$revenue = __( '$80 000 - $100 000', 'ms' );
}
if ( 'usd100' === $revenue ) {
	$revenue = __( '$100 000 +', 'ms' );
}

$manager_industries = get_term_meta( $aff_id, 'industry_focus', true );

function manager_industry( $manager_industry ) {
	if ( $manager_industry ) {
		if ( 'other' === $manager_industry ) {
			$manager_industry = __( 'Other', 'ms' );  }
		if ( 'administration' === $manager_industry ) {
			$manager_industry = __( 'Administration, Business Support and Waste Management Services', 'ms' );  }
		if ( 'agriculture' === $manager_industry ) {
			$manager_industry = __( 'Agriculture, Forestry, Fishing and Hunting', 'ms' );  }
		if ( 'finance_insurance' === $manager_industry ) {
			$manager_industry = __( 'Finance and Insurance', 'ms' );  }
		if ( 'real_estate' === $manager_industry ) {
			$manager_industry = __( 'Real Estate and Rental and Leasing', 'ms' );  }
		if ( 'transportation_warehousing' === $manager_industry ) {
			$manager_industry = __( 'Transportation and Warehousing', 'ms' );  }
		if ( 'retail' === $manager_industry ) {
			$manager_industry = __( 'Retail Trade', 'ms' );  }
		if ( 'professional_scientific' === $manager_industry ) {
			$manager_industry = __( 'Professional, Scientific and Technical Services', 'ms' );  }
		if ( 'healthcare' === $manager_industry ) {
			$manager_industry = __( 'Healthcare and Social Assistance', 'ms' );  }
		if ( 'wholesale' === $manager_industry ) {
			$manager_industry = __( 'Wholesale Trade', 'ms' );  }
		if ( 'accommodation_food' === $manager_industry ) {
			$manager_industry = __( 'Accommodation and Food Services', 'ms' );  }
		if ( 'utilities' === $manager_industry ) {
			$manager_industry = __( 'Utilities', 'ms' );  }
		if ( 'manufacturing' === $manager_industry ) {
			$manager_industry = __( 'Manufacturing', 'ms' );  }
		if ( 'educational_services' === $manager_industry ) {
			$manager_industry = __( 'Educational Services', 'ms' );  }
		if ( 'arts_entertainment' === $manager_industry ) {
			$manager_industry = __( 'Arts, Entertainment and Recreation', 'ms' );  }
		if ( 'media_marketing' === $manager_industry ) {
			$manager_industry = __( 'Media and Marketing', 'ms' );  }
		if ( 'software' === $manager_industry ) {
			$manager_industry = __( 'Software', 'ms' );
		}

		return $manager_industry;
	}
}

$software = get_term_meta( $aff_id, 'affiliate_software', true );

function software( $softwareitem_id ) {
	$softwareitem_name = null;

	if ( isset( $softwareitem_id ) ) {
		if ( 'pap' === $softwareitem_id ) {
			$softwareitem_name = __( 'Post Affiliate Pro', 'ms' );
		}
		if ( 'affice' === $softwareitem_id ) {
			$softwareitem_name = __( 'Affice', 'ms' );
		}
		if ( 'affiliatewp' === $softwareitem_id ) {
			$softwareitem_name = __( 'AffiliateWP', 'ms' );
		}
		if ( 'afftrack' === $softwareitem_id ) {
			$softwareitem_name = __( 'Afftrack', 'ms' );
		}
		if ( 'avangate' === $softwareitem_id ) {
			$softwareitem_name = __( 'Avangate', 'ms' );
		}
		if ( 'awin' === $softwareitem_id ) {
			$softwareitem_name = __( 'Awin', 'ms' );
		}
		if ( 'cake' === $softwareitem_id ) {
			$softwareitem_name = __( 'CAKE', 'ms' );
		}
		if ( 'cjaffiliate' === $softwareitem_id ) {
			$softwareitem_name = __( 'CJ Affiliate', 'ms' );
		}
		if ( 'clickbank' === $softwareitem_id ) {
			$softwareitem_name = __( 'Clickbank', 'ms' );
		}
		if ( 'clickinc' === $softwareitem_id ) {
			$softwareitem_name = __( 'Clickinc', 'ms' );
		}
		if ( 'clickmeter' === $softwareitem_id ) {
			$softwareitem_name = __( 'Clickmeter', 'ms' );
		}
		if ( 'everflow' === $softwareitem_id ) {
			$softwareitem_name = __( 'Everflow', 'ms' );
		}
		if ( 'firstpromoter' === $softwareitem_id ) {
			$softwareitem_name = __( 'Firstpromoter', 'ms' );
		}
		if ( 'growthhero' === $softwareitem_id ) {
			$softwareitem_name = __( 'Growthhero', 'ms' );
		}
		if ( 'hitpath' === $softwareitem_id ) {
			$softwareitem_name = __( 'HitPath', 'ms' );
		}
		if ( 'idevaffiliate' === $softwareitem_id ) {
			$softwareitem_name = __( 'iDevAffiliate', 'ms' );
		}
		if ( 'jrox' === $softwareitem_id ) {
			$softwareitem_name = __( 'JROX', 'ms' );
		}
		if ( 'leaddyno' === $softwareitem_id ) {
			$softwareitem_name = __( 'LeadDyno', 'ms' );
		}
		if ( 'linktrust' === $softwareitem_id ) {
			$softwareitem_name = __( 'Linktrust', 'ms' );
		}
		if ( 'offer18' === $softwareitem_id ) {
			$softwareitem_name = __( 'Offer18', 'ms' );
		}
		if ( 'osiaffiliate' === $softwareitem_id ) {
			$softwareitem_name = __( 'OSI affiliate', 'ms' );
		}
		if ( 'rekuten' === $softwareitem_id ) {
			$softwareitem_name = __( 'Rakuten Advertising', 'ms' );
		}
		if ( 'redtrack' === $softwareitem_id ) {
			$softwareitem_name = __( 'RedTrack', 'ms' );
		}
		if ( 'refersion' === $softwareitem_id ) {
			$softwareitem_name = __( 'Refersion', 'ms' );
		}
		if ( 'scaleo' === $softwareitem_id ) {
			$softwareitem_name = __( 'Scaleo', 'ms' );
		}
		if ( 'shareasale' === $softwareitem_id ) {
			$softwareitem_name = __( 'ShareASale', 'ms' );
		}
		if ( 'tapaffiliate' === $softwareitem_id ) {
			$softwareitem_name = __( 'Tapaffiliate', 'ms' );
		}
		if ( 'tune' === $softwareitem_id ) {
			$softwareitem_name = __( 'Tune', 'ms' );
		}
		if ( 'trackiers' === $softwareitem_id ) {
			$softwareitem_name = __( 'Trackiers', 'ms' );
		}
		if ( 'voluum' === $softwareitem_id ) {
			$softwareitem_name = __( 'Voluum', 'ms' );
		}

		return (object) array(
			'name' => $softwareitem_name,
			'id'   => $softwareitem_id,
		);
	}
}

function software_url( $software_id, $software ) {

	$path = $software_id . '-alternative';
	if ( 'pap' !== $software_id && get_page_by_path( $path ) ) { // @codingStandardsIgnoreLine
			return '<a href="' . __( '/alternatives', 'ms' ) . '/' . $software_id . '">' .
			$software . '</a>';
	}
	if ( 'pap' === $software_id || ! get_page_by_path( $path ) ) { // @codingStandardsIgnoreLine
			return '<a href="/">' . $software . '</a>';
	}
}

$communication = get_term_meta( $aff_id, 'communication', true );
function comm( $comm ) {
	if ( $comm ) {
		if ( 'email' === $comm ) {
			$comm = __( 'Email', 'ms' );
		}
		if ( 'livechat' === $comm ) {
			$comm = __( 'Live chat', 'ms' );
		}
		if ( 'form' === $comm ) {
			$comm = __( 'Contact form', 'ms' );
		}
		if ( 'voip' === $comm ) {
			$comm = __( 'VoIP', 'ms' );
		}
		if ( 'phone' === $comm ) {
			$comm = __( 'Phone calls', 'ms' );
		}
		if ( 'social' === $comm ) {
			$comm = __( 'Social media', 'ms' );
		}
		if ( 'other' === $comm ) {
			$comm = __( 'Other', 'ms' );
		}
		return $comm;
	}
}

function show_industries( $manager_industries ) {
	if ( is_array( $manager_industries ) ) {
		foreach ( $manager_industries as $id => $manager_industry ) {
			$industries = manager_industry( $manager_industry );

			if ( $id > 0 ) {
				$industries .= ', ' . manager_industry( $manager_industry );
			}
			return $industries;
		}
	}
	return __( 'various industries', 'ms' );
}

function show_software( $software ) {
	if ( is_array( $software ) ) {
		$sw_items = '';
		foreach ( $software as $sw_id => $software_item ) {
			if ( software( $software_item )->name ) {
				$sw_items .= ( $sw_id > 0 ? ', ' : '' ) . software_url( ( software( $software_item )->id ), software( $software_item )->name );
			}
		}
		return $sw_items;
	}

	if ( ! is_array( $software ) ) {
		return __( 'various affiliate software', 'ms' );
	}
}

function show_communication( $communication, $software ) {
	if ( is_array( $communication ) ) {
		$comm_items       = '';
		$comm_items_count = count( $communication ) - 1;
		foreach ( $communication as $id => $comm_item ) {
			$comm_items .= ( ( 0 !== $id && $comm_items_count !== $id ) ? ', ' : ( $comm_items_count === $id ? ( ' ' . __( 'and', 'ms' ) . ' ' ) : '' ) ) . comm( $comm_item );
		}
		return strtolower( $comm_items );
	}

	if ( ! is_array( $software ) ) {
		return __( 'various affiliate software', 'ms' );
	}
}

$aff_desc = __( '${aff_name} is an affiliate manager with expertise in the ${manager_industry}. ${aff_program} manager ${aff_name} primarily focuses his affiliate efforts in the ${aff_countries}. ${aff_name} uses ${aff_software} for tracking, reporting, and automating affiliate operations on a daily basis. To contact ${aff_name}, feel free to reach out via email, phone, or contact form for a prompt answer.', 'ms' );

if ( 'Worldwide' === $countries ) {
	$aff_desc = __( '${aff_name} is an affiliate manager with expertise in the ${manager_industry}. ${aff_program} manager ${aff_name} primarily focuses his affiliate efforts ${aff_countries}. ${aff_name} uses ${aff_software} for tracking, reporting, and automating affiliate operations on a daily basis. To contact ${aff_name}, feel free to reach out via ${aff_communication} for a prompt answer.', 'ms' );
}

$aff_desc = str_replace( '${aff_name}', $aff_name, $aff_desc );

$aff_desc = str_replace( '${manager_industry}', show_industries( $manager_industries ), $aff_desc );
$aff_desc = str_replace( '${aff_program}', get_the_title(), $aff_desc );
$aff_desc = str_replace( '${aff_software}', show_software( $software ), $aff_desc );
$aff_desc = str_replace( '${aff_countries}', $countries, $aff_desc );
$aff_desc = str_replace( '${aff_communication}', show_communication( $communication, $software ), $aff_desc );
