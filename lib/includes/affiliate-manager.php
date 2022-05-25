<?php
set_source( 'directory', 'pages/Category', 'css' );
set_source( 'directory', 'pages/Directory', 'css' );
set_source( 'directory', 'components/AffiliateManagerCard', 'css' );
set_source( 'directory', 'pages/AffiliateManager', 'css' );
set_source( 'directory', 'pages/post', 'css' );
$aff_id    = get_queried_object_id();
$aff_name  = get_term_meta( $aff_id, 'name', true );
$aff_image = wp_get_attachment_image( get_term_meta( $aff_id, 'picture', true ), 'person_thumbnail', false, array( 'class' => 'AffiliateManager__image' ) );
if ( ! isset( $aff_image ) || '' === $aff_image ) {
	$aff_image = get_avatar( get_term_meta( $aff_id, 'email', true ), $size = '145', $default = "' . esc_url( get_template_directory_uri() ) . '/assets/images/affiliate_manager_avatar.svg'", '', array( 'class' => 'AffiliateManager__image' ) );
}
$aff_desc  = get_term( $aff_id )->description;
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

function software( $softwareitem ) {
	if ( isset( $softwareitem ) ) {
		if ( 'pap' === $softwareitem ) {
			$softwareitem = __( 'Post Affiliate Pro', 'ms' );
		}
		if ( 'affice' === $softwareitem ) {
			$softwareitem = __( 'Affice', 'ms' );
		}
		if ( 'affiliatewp' === $softwareitem ) {
			$softwareitem = __( 'AffiliateWP', 'ms' );
		}
		if ( 'afftrack' === $softwareitem ) {
			$softwareitem = __( 'Afftrack', 'ms' );
		}
		if ( 'avangate' === $softwareitem ) {
			$softwareitem = __( 'Avangate', 'ms' );
		}
		if ( 'awin' === $softwareitem ) {
			$softwareitem = __( 'Awin', 'ms' );
		}
		if ( 'cake' === $softwareitem ) {
			$softwareitem = __( 'CAKE', 'ms' );
		}
		if ( 'cjaffiliate' === $softwareitem ) {
			$softwareitem = __( 'CJ Affiliate', 'ms' );
		}
		if ( 'clickbank' === $softwareitem ) {
			$softwareitem = __( 'Clickbank', 'ms' );
		}
		if ( 'clickinc' === $softwareitem ) {
			$softwareitem = __( 'Clickinc', 'ms' );
		}
		if ( 'clickmeter' === $softwareitem ) {
			$softwareitem = __( 'Clickmeter', 'ms' );
		}
		if ( 'everflow' === $softwareitem ) {
			$softwareitem = __( 'Everflow', 'ms' );
		}
		if ( 'firstpromoter' === $softwareitem ) {
			$softwareitem = __( 'Firstpromoter', 'ms' );
		}
		if ( 'growthhero' === $softwareitem ) {
			$softwareitem = __( 'Growthhero', 'ms' );
		}
		if ( 'hitpath' === $softwareitem ) {
			$softwareitem = __( 'HitPath', 'ms' );
		}
		if ( 'idevaffiliate' === $softwareitem ) {
			$softwareitem = __( 'iDevAffiliate', 'ms' );
		}
		if ( 'jrox' === $softwareitem ) {
			$softwareitem = __( 'JROX', 'ms' );
		}
		if ( 'leaddyno' === $softwareitem ) {
			$softwareitem = __( 'LeadDyno', 'ms' );
		}
		if ( 'linktrust' === $softwareitem ) {
			$softwareitem = __( 'Linktrust', 'ms' );
		}
		if ( 'offer18' === $softwareitem ) {
			$softwareitem = __( 'Offer18', 'ms' );
		}
		if ( 'osiaffiliate' === $softwareitem ) {
			$softwareitem = __( 'OSI affiliate', 'ms' );
		}
		if ( 'rekuten' === $softwareitem ) {
			$softwareitem = __( 'Rakuten Advertising', 'ms' );
		}
		if ( 'redtrack' === $softwareitem ) {
			$softwareitem = __( 'RedTrack', 'ms' );
		}
		if ( 'refersion' === $softwareitem ) {
			$softwareitem = __( 'Refersion', 'ms' );
		}
		if ( 'scaleo' === $softwareitem ) {
			$softwareitem = __( 'Scaleo', 'ms' );
		}
		if ( 'shareasale' === $softwareitem ) {
			$softwareitem = __( 'ShareASale', 'ms' );
		}
		if ( 'tapaffiliate' === $softwareitem ) {
			$softwareitem = __( 'Tapaffiliate', 'ms' );
		}
		if ( 'tune' === $softwareitem ) {
			$softwareitem = __( 'Tune', 'ms' );
		}
		if ( 'trackiers' === $softwareitem ) {
			$softwareitem = __( 'Trackiers', 'ms' );
		}
		if ( 'voluum' === $softwareitem ) {
			$softwareitem = __( 'Voluum', 'ms' );
		}
		if ( 'other' === $softwareitem ) {
			$softwareitem = __( 'Other', 'ms' );
		}

		return $softwareitem;
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
