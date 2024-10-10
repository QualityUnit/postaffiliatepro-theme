<?php // @codingStandardsIgnoreLine
set_source( 'directory', 'pages/Directory', 'css' );
set_custom_source( 'shortcodes/CTA', 'css' );
set_custom_source( 'common/splide', 'css' );
set_custom_source( 'components/AffiliateManagerCard', 'css' );
set_custom_source( 'splide', 'js' );
set_custom_source( 'sidebar_toc', 'js' );

$screenshot = do_shortcode( "[urlslab-screenshot alt='" . esc_attr( get_post_meta( get_the_ID(), 'company_name', true ) ) . " Homepage' url='" . esc_url( get_post_meta( get_the_ID(), 'company_url', true ) ) . "' ]" );

$software_id = get_post_meta( get_the_ID(), 'affiliate_software', true );
$software    = null;

$page_header_logo = array(
	'src' => get_template_directory_uri() . '/assets/images/icon-custom-post_type.svg',
	'alt' => __( 'Directory', 'ms' ),
);
if ( has_post_thumbnail() ) {
	$page_header_logo['src'] = get_the_post_thumbnail_url( 'logo_thumbnail' );
}

$page_header_args = array(
	'image' => array(
		'src' => get_template_directory_uri() . '/assets/images/compact-header-directory.png?ver=' . THEME_VERSION,
		'alt' => get_the_title(),
	),
	'logo'  => $page_header_logo,
	'title' => get_the_title(),
	'text'  => do_shortcode( '[urlslab-generator id="4" input="{{page_url}}"]' ),
);

if ( 'pap' === $software_id ) {
	$software = 'Post Affiliate Pro';
}
if ( 'affice' === $software_id ) {
	$software = 'Affice';
}
if ( 'affiliatewp' === $software_id ) {
	$software = 'AffiliateWP';
}
if ( 'afftrack' === $software_id ) {
	$software = 'Afftrack';
}
if ( 'avangate' === $software_id ) {
	$software = 'Avangate';
}
if ( 'awin' === $software_id ) {
	$software = 'Awin';
}
if ( 'cake' === $software_id ) {
	$software = 'CAKE';
}
if ( 'cjaffiliate' === $software_id ) {
	$software = 'CJ Affiliate';
}
if ( 'clickbank' === $software_id ) {
	$software = 'Clickbank';
}
if ( 'clickinc' === $software_id ) {
	$software = 'Clickinc';
}
if ( 'clickmeter' === $software_id ) {
	$software = 'Clickmeter';
}
if ( 'everflow' === $software_id ) {
	$software = 'Everflow';
}
if ( 'firstpromoter' === $software_id ) {
	$software = 'Firstpromoter';
}
if ( 'growthhero' === $software_id ) {
	$software = 'Growthhero';
}
if ( 'hitpath' === $software_id ) {
	$software = 'HitPath';
}
if ( 'idevaffiliate' === $software_id ) {
	$software = 'iDevAffiliate';
}
if ( 'jrox' === $software_id ) {
	$software = 'JROX';
}
if ( 'leaddyno' === $software_id ) {
	$software = 'LeadDyno';
}
if ( 'linktrust' === $software_id ) {
	$software = 'Linktrust';
}
if ( 'offer18' === $software_id ) {
	$software = 'Offer18';
}
if ( 'osiaffiliate' === $software_id ) {
	$software = 'OSI affiliate';
}
if ( 'rekuten' === $software_id ) {
	$software = 'Rakuten Advertising';
}
if ( 'redtrack' === $software_id ) {
	$software = 'RedTrack';
}
if ( 'refersion' === $software_id ) {
	$software = 'Refersion';
}
if ( 'scaleo' === $software_id ) {
	$software = 'Scaleo';
}
if ( 'shareasale' === $software_id ) {
	$software = 'ShareASale';
}
if ( 'tapaffiliate' === $software_id ) {
	$software = 'Tapaffiliate';
}
if ( 'tune' === $software_id ) {
	$software = 'Tune';
}
if ( 'trackiers' === $software_id ) {
	$software = 'Trackiers';
}
if ( 'voluum' === $software_id ) {
	$software = 'Voluum';
}

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
?>
<div class="Post Post--sidebar-right">
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<div class="Post__container wrapper">

		<div class="Signup__sidebar-wrapper">
			<?= do_shortcode( '[signup-sidebar title="Try our affiliate" free="software"]' ); ?>
		</div>

		<div class="Post__content">

			<div class="Content">
				<?php
				$industry = get_post_meta( get_the_ID(), 'industry', true );
				if ( 'other' === $industry ) {
					$industry = __( 'Other', 'ms' ); }
				if ( 'administration' === $industry ) {
					$industry = __( 'Administration, Business Support and Waste Management Services', 'ms' ); }
				if ( 'agriculture' === $industry ) {
					$industry = __( 'Agriculture, Forestry, Fishing and Hunting', 'ms' ); }
				if ( 'finance_insurance' === $industry ) {
					$industry = __( 'Finance and Insurance', 'ms' ); }
				if ( 'real_estate' === $industry ) {
					$industry = __( 'Real Estate and Rental and Leasing', 'ms' ); }
				if ( 'transportation_warehousing' === $industry ) {
					$industry = __( 'Transportation and Warehousing', 'ms' ); }
				if ( 'retail' === $industry ) {
					$industry = __( 'Retail Trade', 'ms' ); }
				if ( 'professional_scientific' === $industry ) {
					$industry = __( 'Professional, Scientific and Technical Services', 'ms' ); }
				if ( 'healthcare' === $industry ) {
					$industry = __( 'Healthcare and Social Assistance', 'ms' ); }
				if ( 'wholesale' === $industry ) {
					$industry = __( 'Wholesale Trade', 'ms' ); }
				if ( 'accommodation_food' === $industry ) {
					$industry = __( 'Accommodation and Food Services', 'ms' ); }
				if ( 'utilities' === $industry ) {
					$industry = __( 'Utilities', 'ms' ); }
				if ( 'manufacturing' === $industry ) {
					$industry = __( 'Manufacturing', 'ms' ); }
				if ( 'educational_services' === $industry ) {
					$industry = __( 'Educational Services', 'ms' ); }
				if ( 'arts_entertainment' === $industry ) {
					$industry = __( 'Arts, Entertainment and Recreation', 'ms' ); }
				if ( 'media_marketing' === $industry ) {
					$industry = __( 'Media and Marketing', 'ms' ); }
				if ( 'software' === $industry ) {
					$industry = __( 'Software', 'ms' ); }

				$type_programs = get_post_meta( get_the_ID(), 'type_program', true );
				$type_program  = '';

				if ( $type_programs ) {
					foreach ( $type_programs as $type_program ) {
						if ( 'cps' === $type_program ) {
							$type_program = __( 'CPS - Cost Per Sales', 'ms' ); }
						if ( 'cpa' === $type_program ) {
							$type_program = __( 'CPA - Cost Per Acquisition', 'ms' ); }
						if ( 'cpl' === $type_program ) {
							$type_program = __( 'CPL - Cost Per Lead', 'ms' ); }
						if ( 'cpc' === $type_program ) {
							$type_program = __( 'CPC - Cost Per Click', 'ms' ); }
						if ( 'cpm' === $type_program ) {
							$type_program = __( 'CPM - Cost Per Mile', 'ms' ); }
					}
				}

				$declaration = __( 'Welcome to the ${company_name} affiliate program overview. We have compiled all of the information you need to know before joining the <a href="${program_url}" title="Login to ${company_name} affiliate program" target="_blank" ${nofollow}>${company_name} affiliate program</a>.', 'ms' );
				$declaration = str_replace( '${company_name}', get_post_meta( get_the_ID(), 'company_name', true ), $declaration );
				$declaration = str_replace( '${program_url}', get_post_meta( get_the_ID(), 'program_url', true ), $declaration );
				if ( get_post_meta( get_the_ID(), 'nofollow', true ) !== 'yes' && ! str_contains( get_post_meta( get_the_ID(), 'program_url', true ), 'postaffiliatepro' ) ) {
					$declaration = str_replace( '${nofollow}', 'rel="nofollow"', $declaration );
				}
				$declaration = str_replace( '${nofollow}', '', $declaration );
				?>

				<p><?= $declaration; // @codingStandardsIgnoreLine ?></p>

				<?php
				if ( preg_match( '/\<img/', $screenshot ) ) {
					?>
				<a class="Directory__screenshot urlslab-skip-lazy" href="<?= esc_url( get_post_meta( get_the_ID(), 'company_url', true ) ); ?>" target="_blank" title="<?= esc_attr( __( 'Go to', 'ms' ) . ' ' . get_post_meta( get_the_ID(), 'company_url', true ) ); ?>"
					<?php if ( get_post_meta( get_the_ID(), 'nofollow', true ) !== 'yes' ) { ?>
						rel="nofollow"
					<?php } ?>
				>
					<div class="Directory__screenshot--url">
					<?= esc_html( __( 'Go to', 'ms' ) . ' ' . get_post_meta( get_the_ID(), 'company_url', true ) ); ?>
					</div>
					<img src="<?= esc_url( get_template_directory_uri() . '/assets/images/browser_window.svg' ); ?>" />
				<?= $screenshot; // @codingStandardsIgnoreLine ?>
				</a>
					<?php
				}
				?>

				<div class="Directory__blocks">

					<h2 id="ap-overview" class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?= esc_html( get_post_meta( get_the_ID(), 'company_name', true ) ); ?> <?php _e( 'Affiliate program overview', 'ms' ); ?></span></h2>
					<?php
					$overview = __( '${company_description} Thus, if you\'re interested in earning extra income from the ${industry}, check out their ${type_program} affiliate program below.', 'ms' );

					$overview = str_replace( '${company_description}', get_post_meta( get_the_ID(), 'company_description', true ), $overview );

					if ( 'other' !== $type_program ) {
						$overview = str_replace( '${type_program}', preg_replace( '/(\w{3}) (-|–|—|-).+/', '$1', $type_program ), $overview );
					}

					$overview = str_replace( '${type_program}', '', $overview );

					$overview = str_replace( '${industry}', strtolower( $industry ), $overview );
					?>
					<p><?= esc_html( $overview ); ?></p>

					<div class="Directory__blocks__items">
						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/industry.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Industry', 'ms' ); ?></h3>

							<p><?= esc_html( $industry ); ?></p>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/product_type.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Product type', 'ms' ); ?></h3>

							<?php
							$product_types = get_post_meta( get_the_ID(), 'product_type', true );

							if ( $product_types ) {
								foreach ( $product_types as $product_type ) {
									?>
									<p>
										<?php if ( 'other' === $product_type ) { ?>
											<?php _e( 'Other', 'ms' ); ?>
										<?php } if ( 'digital_products' === $product_type ) { ?>
											<?php _e( 'Digital products', 'ms' ); ?>
										<?php } if ( 'digital_services' === $product_type ) { ?>
											<?php _e( 'Digital services', 'ms' ); ?>
										<?php } if ( 'physical_products' === $product_type ) { ?>
											<?php _e( 'Physical products', 'ms' ); ?>
										<?php } if ( 'physical_services' === $product_type ) { ?>
											<?php _e( 'Physical services', 'ms' ); ?>
										<?php } ?>
									</p>
									<?php
								}
							}
							?>
						</div>

						<?php
						if ( 'other' !== $type_program ) {
							?>
						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/affiliate_program.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Type of affiliate program', 'ms' ); ?></h3>

							<?php
							if ( $type_programs ) {
								?>
								<p><?= esc_html( $type_program ); ?></p>
								<?php
							}
							?>
						</div>
						<?php } ?>

					</div>

					<h2 id="ap-campaigns" class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?= esc_html( get_post_meta( get_the_ID(), 'company_name', true ) ); ?> <?php _e( 'Affiliate program campaigns', 'ms' ); ?></span></h2>
					<?php
					$campaign_text = __( 'Every affiliate program has its own campaign rules, and each one is important to consider when deciding whether the ${company_name} affiliate program is the right choice for you to promote. The first step is to check accepted countries for the ${company_name} affiliate program since each company has different market preferences. The second information to look for is the traffic source ${company_name} accepts, which explains what platforms you can use to promote your business. The next step is to check ${company_name}\'s cookie duration, displaying how long a cookie lasts from the last click. Last but not least, make sure you look into ${company_name}\'s policy on explicit, religious, and political content.', 'ms' );
					$campaign_text = str_replace( '${company_name}', get_post_meta( get_the_ID(), 'company_name', true ), $campaign_text );
					?>

					<p><?= esc_html( $campaign_text ); ?></p>

					<div class="Directory__blocks__items">
						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/promotional_materials.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Promotional materials', 'ms' ); ?></h3>

							<?php
							$promotional_types = get_post_meta( get_the_ID(), 'promotional_types', true );

							if ( $promotional_types ) {
								foreach ( $promotional_types as $promotional_type ) {
									?>

									<?php if ( 'na' === $promotional_type ) { ?>
										<p><?php _e( 'N/A', 'ms' ); ?></p>
									<?php } if ( 'other' === $promotional_type ) { ?>
										<p><?php _e( 'Other', 'ms' ); ?></p>
									<?php } if ( 'influencer' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/promotional-materials/', 'ms' ); ?>" title="<?php _e( 'Influencer', 'ms' ); ?>"><?php _e( 'Influencer', 'ms' ); ?></a></p>
									<?php } if ( 'banner' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/banner-rotator/', 'ms' ); ?>" title="<?php _e( 'Banner rotator', 'ms' ); ?>"><?php _e( 'Banner rotator', 'ms' ); ?></a></p>
									<?php } if ( 'coupons' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/discount-coupons/', 'ms' ); ?>" title="<?php _e( 'Discount coupons', 'ms' ); ?>"><?php _e( 'Discount coupons', 'ms' ); ?></a></p>
									<?php } if ( 'flash' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/flash-banners/', 'ms' ); ?>" title="<?php _e( 'Flash banners', 'ms' ); ?>"><?php _e( 'Flash banners', 'ms' ); ?></a></p>
									<?php } if ( 'html' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/html-banners/', 'ms' ); ?>" title="<?php _e( 'HTML banners', 'ms' ); ?>"><?php _e( 'HTML banners', 'ms' ); ?></a></p>
									<?php } if ( 'image' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/image-banners/', 'ms' ); ?>" title="<?php _e( 'Image banners', 'ms' ); ?>"><?php _e( 'Image banners', 'ms' ); ?></a></p>
									<?php } if ( 'lightbox' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/lightbox-banners/', 'ms' ); ?>" title="<?php _e( 'Lightbox banners', 'ms' ); ?>"><?php _e( 'Lightbox banners', 'ms' ); ?></a></p>
									<?php } if ( 'peel' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/peel-banners/', 'ms' ); ?>" title="<?php _e( 'Peel banners', 'ms' ); ?>"><?php _e( 'Peel banners', 'ms' ); ?></a></p>
									<?php } if ( 'rebrand_pdf' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/rebrand-pdf/', 'ms' ); ?>" title="<?php _e( 'Rebrand PDF', 'ms' ); ?>"><?php _e( 'Rebrand PDF', 'ms' ); ?></a></p>
									<?php } if ( 'simple_pdf' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/promotional-materials/', 'ms' ); ?>" title="<?php _e( 'Simple PDF banners', 'ms' ); ?>"><?php _e( 'Simple PDF banners', 'ms' ); ?></a></p>
									<?php } if ( 'smartlinks' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/smartlinks/', 'ms' ); ?>" title="<?php _e( 'SmartLinks', 'ms' ); ?>"><?php _e( 'SmartLinks', 'ms' ); ?></a></p>
									<?php } if ( 'site_replication' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/site-replication/', 'ms' ); ?>" title="<?php _e( 'Site replication', 'ms' ); ?>"><?php _e( 'Site replication', 'ms' ); ?></a></p>
									<?php } if ( 'text_link' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/text-link-banners/', 'ms' ); ?>" title="<?php _e( 'Text link banners', 'ms' ); ?>"><?php _e( 'Text link banners', 'ms' ); ?></a></p>
									<?php } if ( 'zip' === $promotional_type ) { ?>
										<p><a href="<?php _e( '/features/zip-banners/', 'ms' ); ?>" title="<?php _e( 'ZIP banners', 'ms' ); ?>"><?php _e( 'ZIP banners', 'ms' ); ?></a></p>
									<?php } ?>

									<?php
								}
							}
							?>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/cookie_duration.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Affiliate cookie duration', 'ms' ); ?></h3>

							<p><?= esc_html( get_post_meta( get_the_ID(), 'cookie_duration', true ) ); ?></p>
						</div>
						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/traffic_sources.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Accepted traffic source', 'ms' ); ?></h3>

							<?php
							$traffic_sources = get_post_meta( get_the_ID(), 'traffic_source', true );

							if ( $traffic_sources ) {
								foreach ( $traffic_sources as $traffic_source ) {
									?>

									<?php if ( 'na' === $traffic_source ) { ?>
										<p><?php _e( 'N/A', 'ms' ); ?></p>
									<?php } if ( 'other' === $traffic_source ) { ?>
										<p><?php _e( 'Other', 'ms' ); ?></p>
									<?php } if ( 'ppc' === $traffic_source ) { ?>
										<p><?php _e( 'PPC', 'ms' ); ?></p>
									<?php } if ( 'link' === $traffic_source ) { ?>
										<p><?php _e( 'Link and banner advertisements', 'ms' ); ?></p>
									<?php } if ( 'social' === $traffic_source ) { ?>
										<p><?php _e( 'Social media advertisements', 'ms' ); ?></p>
									<?php } ?>

									<?php
								}
							}
							?>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/countries.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Accepted countries', 'ms' ); ?></h3>

							<p><?= esc_html( get_post_meta( get_the_ID(), 'countries', true ) ); ?></p>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/explicit_content.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Explicit content', 'ms' ); ?></h3>

							<?php $explicit_content = get_post_meta( get_the_ID(), 'explicit_content', true ); ?>

							<?php if ( 'na' === $explicit_content ) { ?>
								<p><?php _e( 'N/A', 'ms' ); ?></p>
							<?php } if ( 'yes' === $explicit_content ) { ?>
								<p><?php _e( 'Yes', 'ms' ); ?></p>
							<?php } if ( 'no' === $explicit_content ) { ?>
								<p><?php _e( 'No', 'ms' ); ?></p>
							<?php } ?>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/religious_or_political_content.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Religious or political content', 'ms' ); ?></h3>

							<?php $political = get_post_meta( get_the_ID(), 'political', true ); ?>

							<?php if ( 'na' === $political ) { ?>
								<p><?php _e( 'N/A', 'ms' ); ?></p>
							<?php } if ( 'yes' === $political ) { ?>
								<p><?php _e( 'Yes', 'ms' ); ?></p>
							<?php } if ( 'no' === $political ) { ?>
								<p><?php _e( 'No', 'ms' ); ?></p>
							<?php } ?>
						</div>
					</div>

					<h2 id="ap-payouts" class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?= esc_html( get_post_meta( get_the_ID(), 'company_name', true ) ); ?> <?php _e( 'Commissions & payouts', 'ms' ); ?></span></h2>

					<p>
						<?php _e( 'Payouts are one of the most important factors to consider when choosing an affiliate program.', 'ms' ); ?>
						<?php
						$tiers = get_post_meta( get_the_ID(), 'tiers', true );
						if ( $tiers ) {
							foreach ( $tiers as $tier ) {
								if ( 'multitier' === $tier ) {
									$multitier_text = __( 'The ${company_name} affiliate program offers multi-tier commissions, which means affiliates can earn commissions on both sales they generate as well as sales generated by referrals. ', 'ms' );
									$multitier_text = str_replace( '${company_name}', get_post_meta( get_the_ID(), 'company_name', true ), $multitier_text );
									?>
									<?= esc_html( $multitier_text ); ?>
									<?php
								} if ( 'singletier' === $tier ) {
									$singletier_text = __( 'The ${company_name} affiliate program offers single-tier commissions, which means the affiliates earn commissions only on sales they generate.', 'ms' );
									$singletier_text = str_replace( '${company_name}', get_post_meta( get_the_ID(), 'company_name', true ), $singletier_text );
									?>
									<?= esc_html( $singletier_text ); ?>
									<?php
								}
							}
						}

						$payout_value_text = __( 'Moreover, the affiliate program offers a fixed commission structure, with a minimum payout of ${payout_value}.', 'ms' );
						$payout_value      = get_post_meta( get_the_ID(), 'minimum_payout', true );
						$payout_value_text = str_replace( '${payout_value}', $payout_value, $payout_value_text );
						?>
						<?= esc_html( $payout_value_text ); ?>

						<?php
						$payouts_text = __( 'If you want to know more details about ${company_name} payouts, such as what payout methods they accept, please check out the specific information below or follow up with ${company_name} Affiliates contact.', 'ms' );
						$payouts_text = str_replace( '${company_name}', get_post_meta( get_the_ID(), 'company_name', true ), $payouts_text );
						?>
						<?= esc_html( $payouts_text ); ?>
					</p>

					<div class="Directory__blocks__items">
						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/tiers.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Multi level marketing', 'ms' ); ?></h3>

							<?php

							if ( $tiers ) {
								foreach ( $tiers as $tier ) {
									?>

									<?php if ( 'na' === $tier ) { ?>
										<p><?php _e( 'N/A', 'ms' ); ?></p>
									<?php } if ( 'other' === $tier ) { ?>
										<p><?php _e( 'Other', 'ms' ); ?></p>
									<?php } if ( 'multitier' === $tier ) { ?>
										<p><a href="<?php _e( '/features/multi-tier-commissions-multi-level-marketing/', 'ms' ); ?>" title="<?php _e( 'What is Multi-tier affiliate marketing?', 'ms' ); ?>"><?php _e( 'Multi-tier', 'ms' ); ?></a></p>
									<?php } if ( 'singletier' === $tier ) { ?>
										<p><a href="<?php _e( '/features/multi-tier-commissions-multi-level-marketing/', 'ms' ); ?>" title="<?php _e( 'What is Singletier affiliate marketing?', 'ms' ); ?>"><?php _e( 'Single-tier', 'ms' ); ?></a></p>
									<?php } ?>

									<?php
								}
							}
							?>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/commission_rate.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Commission rate', 'ms' ); ?></h3>

							<p><?= esc_html( get_post_meta( get_the_ID(), 'commission_rate', true ) ); ?></p>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/commission_structure.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Commission structure', 'ms' ); ?></h3>

							<?php
							$commission_structures = get_post_meta( get_the_ID(), 'commission_structure', true );

							if ( $commission_structures ) {
								foreach ( $commission_structures as $commission_structure ) {
									?>

									<?php if ( 'na' === $commission_structure ) { ?>
										<p><?php _e( 'N/A', 'ms' ); ?></p>
									<?php } if ( 'other' === $commission_structure ) { ?>
										<p><?php _e( 'Other', 'ms' ); ?></p>
									<?php } if ( 'fixed' === $commission_structure ) { ?>
										<p><?php _e( 'Fixed commission', 'ms' ); ?></p>
									<?php } if ( 'percentage' === $commission_structure ) { ?>
										<p><?php _e( 'Percentage commission', 'ms' ); ?></p>

										<?php
									}
								}
								?>
							<?php } ?>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/payout_frequency.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Payout frequency', 'ms' ); ?></h3>

							<?php
							$payout_frequencies = get_post_meta( get_the_ID(), 'payout_frequency', true );

							if ( $payout_frequencies ) {
								foreach ( $payout_frequencies as $payout_frequency ) {
									?>

									<?php if ( 'na' === $payout_frequency ) { ?>
										<p><?php _e( 'N/A', 'ms' ); ?></p>
									<?php } if ( 'other' === $payout_frequency ) { ?>
										<p><?php _e( 'Other', 'ms' ); ?></p>
									<?php } if ( 'each_sale' === $payout_frequency ) { ?>
										<p><?php _e( 'After each sale', 'ms' ); ?></p>
									<?php } if ( 'daily' === $payout_frequency ) { ?>
										<p><?php _e( 'Daily', 'ms' ); ?></p>
									<?php } if ( 'weekly' === $payout_frequency ) { ?>
										<p><?php _e( 'Weekly', 'ms' ); ?></p>
									<?php } if ( 'monthly' === $payout_frequency ) { ?>
										<p><?php _e( 'Monthly', 'ms' ); ?></p>
									<?php } ?>

									<?php
								}
							}
							?>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/payment_methods.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Payout methods', 'ms' ); ?></h3>

							<?php
							$payout_methods = get_post_meta( get_the_ID(), 'payout_methods', true );

							if ( is_array( $payout_methods ) && count( $payout_methods ) >= 1 ) {
								foreach ( $payout_methods as $payout_method ) {
									?>

									<?php if ( 'na' === $payout_method ) { ?>
										<p><?php _e( 'N/A', 'ms' ); ?></p>
									<?php } if ( 'other' === $payout_method ) { ?>
										<p><?php _e( 'Other', 'ms' ); ?></p>
									<?php } if ( 'ach' === $payout_method ) { ?>
										<p><?php _e( 'ACH', 'ms' ); ?></p>
									<?php } if ( 'amazonpay' === $payout_method ) { ?>
										<p><?php _e( 'AmazonPay', 'ms' ); ?></p>
									<?php } if ( 'applepay' === $payout_method ) { ?>
										<p><?php _e( 'Apple Pay', 'ms' ); ?></p>
									<?php } if ( 'bank_transfer' === $payout_method ) { ?>
										<p><?php _e( 'Bank transfers', 'ms' ); ?></p>
									<?php } if ( 'paypal' === $payout_method ) { ?>
										<p><?php _e( 'Paypal', 'ms' ); ?></p>
									<?php } if ( 'checks' === $payout_method ) { ?>
										<p><?php _e( 'Checks', 'ms' ); ?></p>
									<?php } if ( 'digital_currencies' === $payout_method ) { ?>
										<p><?php _e( 'Digital currencies', 'ms' ); ?></p>
									<?php } if ( 'direct_debit' === $payout_method ) { ?>
										<p><?php _e( 'Direct debit payments', 'ms' ); ?></p>
									<?php } if ( 'ebay' === $payout_method ) { ?>
										<p><?php _e( 'eBay Managed Payments', 'ms' ); ?></p>
									<?php } if ( 'gift_cards' === $payout_method ) { ?>
										<p><?php _e( 'Gift cards', 'ms' ); ?></p>
									<?php } if ( 'googlepay' === $payout_method ) { ?>
										<p><?php _e( 'Google Pay', 'ms' ); ?></p>
									<?php } if ( 'prepaid_cards' === $payout_method ) { ?>
										<p><?php _e( 'Prepaid cards', 'ms' ); ?></p>
									<?php } if ( 'skrill' === $payout_method ) { ?>
										<p><?php _e( 'Skrill', 'ms' ); ?></p>
									<?php } if ( 'qiwi' === $payout_method ) { ?>
										<p><?php _e( 'Qiwi', 'ms' ); ?></p>
									<?php } if ( 'wire_transfer' === $payout_method ) { ?>
										<p><?php _e( 'Wire transfer', 'ms' ); ?></p>
									<?php } ?>

									<?php
								}
							}

							if ( is_array( $payout_methods ) && 1 === count( $payout_methods ) && 'other' === $payout_methods[0] ) {
								?>
								<p><?php _e( 'N/A', 'ms' ); ?></p>
								<?php
							}
							?>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/minimum_payout.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Minimum payout', 'ms' ); ?></h3>

							<p><?= esc_html( get_post_meta( get_the_ID(), 'minimum_payout', true ) ); ?></p>
						</div>
					</div>

					<?php
						$aff_software = __( 'The ${company_name} affiliate program uses the ${affiliate_software} affiliate software to manage its portfolio in the ${countries}.', 'ms' );
					if ( get_post_meta( get_the_ID(), 'countries', true ) === 'Worldwide' ) {
						$aff_software = __( 'The ${company_name} affiliate program uses the ${affiliate_software} affiliate software to manage its portfolio ${countries}.', 'ms' );
					}
						$aff_software = str_replace( '${company_name}', get_post_meta( get_the_ID(), 'company_name', true ), $aff_software );

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

						$aff_software = str_replace( '${affiliate_software}', software_url( $software_id, $software ), $aff_software );
						$aff_software = str_replace( '${countries}', get_post_meta( get_the_ID(), 'countries', true ), $aff_software );


					if ( isset( $software ) ) {

						?>
							<h2 id="ap-software" class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?= esc_html( get_post_meta( get_the_ID(), 'company_name', true ) ); ?> <?php _e( 'Affiliate Software', 'ms' ); ?></span></h2>

							<p><?= $aff_software; // @codingStandardsIgnoreLine ?></p>

							<div class="Directory__blocks__items">
								<div class="Directory__blocks__items__item">
									<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/affiliate_program.svg" alt="<?php the_title(); ?>">
									<h3><?php _e( 'Affiliate software', 'ms' ); ?></h3>
									<p>
									<?= software_url($software_id, $software); // @codingStandardsIgnoreLine ?>
								</p>

								</div>
							</div>
						<?php
					}
					?>

					<h2 id="affiliate-manager" class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?= esc_html( get_post_meta( get_the_ID(), 'company_name', true ) ); ?> <?php _e( 'Affiliate manager', 'ms' ); ?></span></h2>

					<?php
					// Saves to post data directory name and url for Affiliate manager breadcrumb
					?>

					<?php
					$managers        = get_the_terms( $post->ID, 'ms_directory_affiliate_manager' );
					$primary_manager = get_post_meta( $post->ID, '_yoast_wpseo_primary_ms_directory_affiliate_manager', true );
					if ( $managers ) {
						?>
						<div class="AffiliateManagers">
							<?php
							foreach ( $managers as $manager ) {
								$taxonomy_id = $manager->term_id;
								$url         = get_term_link( $taxonomy_id );
								$name        = get_term_meta( $taxonomy_id, 'aff_name', true );
								if ( ! strlen( $name ) >= 2 ) {
									$name = get_term( $taxonomy_id )->name;
								}
								$picture = wp_get_attachment_image( get_term_meta( $taxonomy_id, 'picture', true ), 'person_thumbnail', false, array( 'class' => 'AffiliateManager__image' ) );
								if ( ! isset( $picture ) || '' === $picture ) {
									$picture = get_avatar( get_term_meta( $taxonomy_id, 'email', true ), $size = '188', $default = 'mp', $name, array( 'class' => 'AffiliateManager__image' ) );
								}
								$email              = get_term_meta( $taxonomy_id, 'email', true );
								$phone              = get_term_meta( $taxonomy_id, 'phone', true );
								$linkedin           = get_term_meta( $taxonomy_id, 'linkedin', true );
								$manager_industries = get_term_meta( $taxonomy_id, 'industry_focus', true );
								$url_title          = $name . ' ' . __( 'affiliate manager of', 'ms' ) . ' ' . get_post_meta( get_the_ID(), 'company_name', true ) . ' ' . __( 'affiliate program', 'ms' );
								?>
								<div class="AffiliateManagerCard <?= ( strval( $primary_manager ) === strval( $taxonomy_id ) ? 'primary' : null ); ?>">
									<div class="AffiliateManagerCard__image--wrapper">
										<?php ! isset( $url ) ? $picture : null; // @codingStandardsIgnoreLine ?>
										<?php
										if ( isset( $url ) ) {
											?>
												<a href="<?= esc_url( $url ); // @codingStandardsIgnoreLine ?>" class="AffiliateManagerCard__image" title="<?= esc_html( $url_title ); ?>">
												<?= $picture; // @codingStandardsIgnoreLine ?>
											</a>
										<?php } ?>
									</div>
									<div class="AffiliateManagerCard__content">
										<h3 class="AffiliateManagerCard__name">
											<a href="<?= esc_url( $url ); // @codingStandardsIgnoreLine ?>" title="<?= esc_html( $url_title ); ?>">
								<?= esc_html( $name ); ?>
									</a>
										</h3>

										<div class="AffiliateManagerCard__industries">
											<?php
											if ( is_array( $manager_industries ) ) {
												foreach ( $manager_industries as $manager_industry ) {
													?>
													<strong class="AffiliateManagerCard__industry"><?= esc_html( manager_industry( $manager_industry ) ); ?></strong>
													<?php
												}
											}
											?>
										</div>
										<ul class="AffiliateManagerCard__contacts">
											<?php
											if ( isset( $email ) && 'N/A' !== $email && strlen( $email ) > 5 ) {
												?>
												<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--email fontello-mail">
													<a href="mailto:<?= esc_html( $email ); ?>" title="<?= esc_attr( $url_title . ' ' . __( 'by email', 'ms' ) ); ?>"><?php _e( 'Mail', 'ms' ); ?></a>
												</li>
												<?php
											}
											?>
											<?php
											if ( isset( $phone ) && 'N/A' !== $phone && strlen( $phone ) > 9 ) {
												?>
												<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--phone fontello-icon-e806">
													<a href="tel:<?= esc_html( $phone ); ?>" title="<?= esc_attr( $url_title . ' ' . __( 'by phone', 'ms' ) ); ?>"><?= esc_html( $phone ); ?></a>
												</li>
												<?php
											}
											?>
											<?php
											if ( isset( $linkedin ) && 'N/A' !== $linkedin && strlen( $linkedin ) > 5 ) {
												?>
												<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--linkedin fontello-linkedin-brands">
													<a href="<?= esc_url( $linkedin ); ?>" title="<?= esc_attr( $url_title . ' ' . __( 'by LinkedIn', 'ms' ) ); ?>"><?php _e( 'LinkedIn', 'ms' ); ?></a>
												</li>
												<?php
											}
											?>
										</ul>
									</div>

									<?php
									if ( isset( $url ) ) {
										?>
										<div class="AffiliateManagerCard__showProfile">
											<a href="<?= esc_url( $url ); ?>" class="learn-more" title="<?= esc_attr( $url_title ); ?>">
												<?php _e( 'Show profile', 'ms' ); ?>
												<svg>
													<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?' . THEME_VERSION . '#arrow-right' ); ?>"></use>
												</svg>
											</a>
										</div>
										<?php
									}
									?>


								</div>
								<?php
							}
							?>
						</div>
						<?php
					}
					?>

					<div class="Gutenberg__content__wrapper">
						<?php the_content(); ?>
						<?php echo do_shortcode( '[urlslab-faq]' ); ?>
					</div>

					<div class="CTA__wrapper flowhunt-skip">
						<div class="CTA__content">
							<div class="CTA__title"><?php _e( 'Build your own affiliate program', 'ms' ); ?></div>
							<div class="CTA__text"><?php _e( 'Start building an affiliate program today by signing up for our free 14-day trial.', 'ms' ) . get_post_meta( get_the_ID(), 'company_name', true ); ?></div>
							<a href="<?php _e( '/trial', 'ms' ); ?>" class="CTA__button Button">
								<span><?php _e( 'Start 1-Month trial for FREE', 'ms' ); ?></span>
							</a>
						</div>
						<img class="CTA__image" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/cta_img_new.png" alt="<?php _e( 'Build your own affiliate program', 'ms' ); ?>" />
					</div>

					<?php urlslab_display_related_resources(); ?>
				</div>
			</div>
		</div>
	</div>
</div>
