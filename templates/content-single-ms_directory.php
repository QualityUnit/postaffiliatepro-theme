<?php // @codingStandardsIgnoreLine
set_source( 'directory', 'pages/Directory', 'css' );
set_custom_source( 'common/splide', 'css' );
set_custom_source( 'components/AffiliateManagerCard', 'css' );
set_custom_source( 'splide', 'js' );
set_custom_source( 'sidebar_toc', 'js' );
?>
<div class="Post">
	<div class="Post__header directory">
		<div class="wrapper__wide"></div>
	</div>

	<div class="wrapper__wide Post__container">
		<div class="Post__sidebar">
			<div class="Post__sidebar__buttons">
				<?php if ( get_post_meta( get_the_ID(), 'program_url', true ) ) { ?>
					<a href="<?= esc_url( get_post_meta( get_the_ID(), 'program_url', true ) ) ?>?utm_medium=referral&utm_source=postaffiliatepro&utm_campaign=directory" title="Sign up to <?= esc_attr( get_post_meta( get_the_ID(), 'company_name', true ) ) ?> affiliate program" class="Button Button--full" target="_blank" rel="nofollow">
						<span><?php _e( 'Affiliate Program', 'ms' ); ?></span>
					</a>
				<?php } ?>

				<?php if ( get_post_meta( get_the_ID(), 'company_url', true ) ) { ?>
					<a href="<?= esc_url( get_post_meta( get_the_ID(), 'company_url', true ) ) ?>?utm_medium=referral&utm_source=postaffiliatepro&utm_campaign=directory" title="Show <?= esc_attr( get_post_meta( get_the_ID(), 'company_name', true ) ) ?> website" class="Button Button--outline" target="_blank" rel="nofollow">
						<span><?php _e( 'Company Website', 'ms' ); ?></span>
					</a>
				<?php } ?>
			</div>

			<?php
			/*
			$affiliate_software     = get_post_meta( get_the_ID(), 'affiliate_software', true );
			$affiliate_software_url = get_post_meta( get_the_ID(), 'affiliate_software_url', true );
			if ( 'na' !== $affiliate_software ) {
				?>
			<div class="Post__sidebar__categories">
				<h4 class="Post__sidebar__title"><?php _e( 'Affiliate Software', 'ms' ); ?></h4>
				<div class="CategoryTags">

					<?php if ( 'other' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/', 'ms' ) ); ?>"><?php _e( 'Other', 'ms' ); ?></a></li>
					<?php } if ( 'pap' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/affiliate-program-software/', 'ms' ) ); ?>"><?php _e( 'Post Affiliate Pro', 'ms' ); ?></a></li>
					<?php } if ( 'affice' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/affice-alternative', 'ms' ) ); ?>"><?php _e( 'Affice', 'ms' ); ?></a></li>
					<?php } if ( 'affiliatewp' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/affiliatewp-alternative', 'ms' ) ); ?>"><?php _e( 'AffiliateWP', 'ms' ); ?></a></li>
					<?php } if ( 'afftrack' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/afftrack-alternative', 'ms' ) ); ?>"><?php _e( 'Afftrack', 'ms' ); ?></a></li>
					<?php } if ( 'avangate' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/avangate-alternative', 'ms' ) ); ?>"><?php _e( 'Avangate', 'ms' ); ?></a></li>
					<?php } if ( 'awin' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/awin-alternative', 'ms' ) ); ?>"><?php _e( 'Awin', 'ms' ); ?></a></li>
					<?php } if ( 'cake' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/cake-alternative', 'ms' ) ); ?>"><?php _e( 'CAKE', 'ms' ); ?></a></li>
					<?php } if ( 'cjaffiliate' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/cjaffiliate-alternative', 'ms' ) ); ?>"><?php _e( 'CJ Affiliate', 'ms' ); ?></a></li>
					<?php } if ( 'clickbank' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/clickbank-alternative', 'ms' ) ); ?>"><?php _e( 'Clickbank', 'ms' ); ?></a></li>
					<?php } if ( 'clickinc' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/clickinc-alternative', 'ms' ) ); ?>"><?php _e( 'Clickinc', 'ms' ); ?></a></li>
					<?php } if ( 'clickmeter' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/clickmeter-alternative', 'ms' ) ); ?>"><?php _e( 'Clickmeter', 'ms' ); ?></a></li>
					<?php } if ( 'everflow' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/everflow-alternative', 'ms' ) ); ?>"><?php _e( 'Everflow', 'ms' ); ?></a></li>
					<?php } if ( 'firstpromoter' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/firstpromoter-alternative', 'ms' ) ); ?>"><?php _e( 'Firstpromoter', 'ms' ); ?></a></li>
					<?php } if ( 'growthhero' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/growthhero-alternative', 'ms' ) ); ?>"><?php _e( 'Growthhero', 'ms' ); ?></a></li>
					<?php } if ( 'hitpath' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/hitpath-alternative', 'ms' ) ); ?>"><?php _e( 'HitPath', 'ms' ); ?></a></li>
					<?php } if ( 'idevaffiliate' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/idevaffiliate-alternative', 'ms' ) ); ?>"><?php _e( 'iDevAffiliate', 'ms' ); ?></a></li>
					<?php } if ( 'jrox' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/jrox-alternative', 'ms' ) ); ?>"><?php _e( 'JROX', 'ms' ); ?></a></li>
					<?php } if ( 'leaddyno' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/leaddyno-alternative', 'ms' ) ); ?>"><?php _e( 'LeadDyno', 'ms' ); ?></a></li>
					<?php } if ( 'linktrust' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/linktrust-alternative', 'ms' ) ); ?>"><?php _e( 'Linktrust', 'ms' ); ?></a></li>
					<?php } if ( 'offer18' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/offer18-alternative', 'ms' ) ); ?>"><?php _e( 'Offer18', 'ms' ); ?></a></li>
					<?php } if ( 'osiaffiliate' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/osiaffiliate-alternative', 'ms' ) ); ?>"><?php _e( 'OSI affiliate', 'ms' ); ?></a></li>
					<?php } if ( 'rekuten' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/rekuten-alternative', 'ms' ) ); ?>"><?php _e( 'Rakuten Advertising', 'ms' ); ?></a></li>
					<?php } if ( 'redtrack' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/redtrack-alternative', 'ms' ) ); ?>"><?php _e( 'RedTrack', 'ms' ); ?></a></li>
					<?php } if ( 'refersion' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/refersion-alternative', 'ms' ) ); ?>"><?php _e( 'Refersion', 'ms' ); ?></a></li>
					<?php } if ( 'scaleo' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/scaleo-alternative', 'ms' ) ); ?>"><?php _e( 'Scaleo', 'ms' ); ?></a></li>
					<?php } if ( 'shareasale' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/shareasale-alternative', 'ms' ) ); ?>"><?php _e( 'ShareASale', 'ms' ); ?></a></li>
					<?php } if ( 'tapaffiliate' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/tapaffiliate-alternative', 'ms' ) ); ?>"><?php _e( 'Tapaffiliate', 'ms' ); ?></a></li>
					<?php } if ( 'tune' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/tune-alternative', 'ms' ) ); ?>"><?php _e( 'Tune', 'ms' ); ?></a></li>
					<?php } if ( 'trackiers' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/trackiers-alternative', 'ms' ) ); ?>"><?php _e( 'Trackiers', 'ms' ); ?></a></li>
					<?php } if ( 'voluum' === $affiliate_software ) { ?>
						<li class="CategoryTag"><a href="<?php echo esc_url( strlen( $affiliate_software_url ) > 3 ? $affiliate_software_url : __( '/voluum-alternative', 'ms' ) ); ?>"><?php _e( 'Voluum', 'ms' ); ?></a></li>
					<?php } ?>
				</div>
			</div>
			<?php } ?> */
			?>

			<div class="SidebarTOC-wrapper">
				<div class="SidebarTOC Post__SidebarTOC">
					<strong class="SidebarTOC__title"><?php _e( 'Contents', 'ms' ); ?></strong>
					<ul class="SidebarTOC__content">
						<li class="SidebarTOC__item"><a href="#ap-overview"><?php _e( 'Affiliate Program Overview', 'ms' ); ?></a></li>
						<li class="SidebarTOC__item"><a href="#ap-campaigns"><?php _e( 'Affiliate Program Campaigns', 'ms' ); ?></a></li>
						<li class="SidebarTOC__item"><a href="#ap-payouts"><?php _e( 'Affiliate Program Commissions & Payouts', 'ms' ); ?></a></li>
						<li class="SidebarTOC__item"><a href="#affiliate-manager"><?php _e( 'Affiliate Manager', 'ms' ); ?></a></li>
					</ul>
				</div>
			</div>
		</div>

		<div class="Signup__sidebar-wrapper">
			<?= do_shortcode( '[signup-sidebar]' ); ?>
		</div>

		<div class="Post__content">
			<div class="Post__logo">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( 'logo_thumbnail' ); ?>
				<?php } else { ?>
					<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-custom-post_type.svg" alt="<?php _e( 'Affiliate Program Directory', 'ms' ); ?>">
				<?php } ?>
			</div>

			<div class="Post__content__breadcrumbs">
				<ul>
					<li><a href="<?php _e( '/affiliate-program-directory/', 'ms' ); ?>"><?php _e( 'Affiliate Program Directory', 'ms' ); ?></a></li>
					<li><?php the_title(); ?></li>
				</ul>
			</div>

			<h1><?php the_title(); ?></h1>

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
						if ( 'other' === $type_program ) {
							$type_program = __( 'Other', 'ms' ); }
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


				$declaration = __( 'Welcome to the ${company_name} affiliate program overview. We have compiled all of the information you need to know before joining the <a href="${program_url}" title="Login to ${company_name} affiliate program" target="_blank" rel="nofollow">${company_name} affiliate program</a>. ${company_description} Thus, if you\'re interested in earning extra income from the ${industry}, check out their ${type_program} affiliate program below.', 'ms' );
				$declaration = str_replace( '${company_name}', get_post_meta( get_the_ID(), 'company_name', true ), $declaration );
				$declaration = str_replace( '${company_description}', get_post_meta( get_the_ID(), 'company_description', true ), $declaration );
				$declaration = str_replace( '${program_url}', get_post_meta( get_the_ID(), 'program_url', true ), $declaration );
				$declaration = str_replace( '${type_program}', preg_replace( '/(\w{3}) (-|–|—|-).+/', '$1', $type_program ), $declaration );
				$declaration = str_replace( '${industry}', strtolower( $industry ), $declaration );
				?>

				<p><?= $declaration; // @codingStandardsIgnoreLine ?></p>

				<div class="Directory__blocks">

					<h2 id="ap-overview" class="Directory__blocks__title"><span><?= esc_html( get_post_meta( get_the_ID(), 'company_name', true ) ) ?> <?php _e( 'Affiliate Program Overview', 'ms' ); ?></span></h2>
					<p><?php _e( 'Find out more about the general industry, product type, and affiliate program type.', 'ms' ); ?></p>

					<div class="Directory__blocks__items">
						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/industry.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Industry', 'ms' ); ?></h3>

							<p><?= esc_html( $industry ); ?></p>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/product_type.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Product Type', 'ms' ); ?></h3>

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

					</div>

					<h2 id="ap-campaigns" class="Directory__blocks__title"><span><?= esc_html( get_post_meta( get_the_ID(), 'company_name', true ) ) ?> <?php _e( 'Affiliate Program Campaigns', 'ms' ); ?></span></h2>
					<p><?php _e( "Get to know the affiliate program campaign's key specifics, restrictions, and rules.", 'ms' ); ?></p>

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
							<h3><?php _e( 'Affiliate Cookie duration', 'ms' ); ?></h3>

							<p><?= esc_html( get_post_meta( get_the_ID(), 'cookie_duration', true ) ); ?></p>
						</div>
						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/traffic_sources.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Accepted Traffic source', 'ms' ); ?></h3>

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

							<p><?= esc_html( get_post_meta( get_the_ID(), 'countries', true ) ) ?></p>
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
							<h3><?php _e( 'Religious or Political content', 'ms' ); ?></h3>

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

					<h2 id="ap-payouts" class="Directory__blocks__title"><span><?= esc_html( get_post_meta( get_the_ID(), 'company_name', true ) ) ?> <?php _e( 'Commissions & Payouts', 'ms' ); ?></span></h2>
					<p><?php _e( 'Explore the earning potential with commission structure and payout information.', 'ms' ); ?></p>

					<div class="Directory__blocks__items">
						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/tiers.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Multi level marketing', 'ms' ); ?></h3>

							<?php
							$tiers = get_post_meta( get_the_ID(), 'tiers', true );

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
							<h3><a href="<?php _e( '/features/mass-payments/', 'ms' ); ?>"  title="<?php _e( 'What are payout methods?', 'ms' ); ?>"><?php _e( 'Payout methods', 'ms' ); ?></a></h3>

							<?php
							$payout_methods = get_post_meta( get_the_ID(), 'payout_methods', true );

							if ( $payout_methods ) {
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
							?>
						</div>

						<div class="Directory__blocks__items__item">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate-program-directory/minimum_payout.svg" alt="<?php the_title(); ?>">
							<h3><?php _e( 'Minimum payout', 'ms' ); ?></h3>

							<p><?= esc_html( get_post_meta( get_the_ID(), 'minimum_payout', true ) ); ?></p>
						</div>
					</div>

					<h2 id="affiliate-manager" class="Directory__blocks__title"><span><?= esc_html( get_post_meta( get_the_ID(), 'company_name', true ) ) ?> <?php _e( 'Affiliate Manager', 'ms' ); ?></span></h2>

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
								$name        = get_term_meta( $taxonomy_id, 'name', true );
								if ( ! strlen( $name ) >= 2 ) {
									$name = get_term( $taxonomy_id )->name;
								}
								$picture = wp_get_attachment_image( get_term_meta( $taxonomy_id, 'picture', true ), 'person_thumbnail', false, array( 'class' => 'AffiliateManager__image' ) );
								if ( ! isset( $picture ) || '' === $picture ) {
									$picture = '<img class="AffiliateManager__image" src="' . esc_url( get_template_directory_uri() ) . '/assets/images/affiliate_manager_avatar.svg" alt="' . $name . '" />';
								}
								$email              = get_term_meta( $taxonomy_id, 'email', true );
								$phone              = get_term_meta( $taxonomy_id, 'phone', true );
								$linkedin           = get_term_meta( $taxonomy_id, 'linkedin', true );
								$manager_industries = get_term_meta( $taxonomy_id, 'industry_focus', true );
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
								$url_title = $name . ' ' . __( 'affiliate manager of', 'ms' ) . get_post_meta( get_the_ID(), 'company_name', true ) . ' ' . __( 'affiliate program', 'ms' );
								?>
								<div class="AffiliateManagerCard <?= ( strval( $primary_manager ) === strval( $taxonomy_id ) ? 'primary' : null ); ?>">
									<div class="AffiliateManagerCard__image--wrapper">
										<?php ! isset( $url ) ? $picture : null; // @codingStandardsIgnoreLine ?>
										<?php
										if ( isset( $url ) ) {
											?>
											<a href="<?= esc_url( add_query_arg( array( 'directory_name' => get_the_title(), 'directory_url' => get_the_permalink() ), $url ) ); // @codingStandardsIgnoreLine ?>" class="AffiliateManagerCard__image--showProfile" title="<?= esc_html( $url_title ); ?>">
									<?= $picture; // @codingStandardsIgnoreLine ?>
									<span><?php _e( 'Show profile', 'ms' ); ?></span>
								</a>
										<?php } ?>
									</div>
									<div class="AffiliateManagerCard__content">
										<h3 class="AffiliateManagerCard__name">
											<a href="<?= esc_url( add_query_arg( array( 'directory_name' => get_the_title(), 'directory_url' => get_the_permalink() ), $url ) ); // @codingStandardsIgnoreLine ?>" title="<?= esc_html( $url_title ); ?>">
								<?= esc_html( $name ); ?>
+									</a>
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
													<a href="mailto:<?= esc_html( $email ); ?>" title="<?= esc_html( $url_title . ' ' . __( 'by email', 'ms' ) ); ?>"><?php _e( 'Mail', 'ms' ); ?></a>
												</li>
												<?php
											}
											?>
											<?php
											if ( isset( $phone ) && 'N/A' !== $phone && strlen( $phone ) > 9 ) {
												?>
												<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--phone fontello-icon-e806">
													<a href="tel:<?= esc_html( $phone ); ?>" title="<?= esc_html( $url_title . ' ' . __( 'by phone', 'ms' ) ); ?>"><?= esc_html( $phone ); ?></a>
												</li>
												<?php
											}
											?>
											<?php
											if ( isset( $linkedin ) && 'N/A' !== $linkedin && strlen( $linkedin ) > 5 ) {
												?>
												<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--linkedin fontello-linkedin-brands">
													<a href="<?= esc_url( $linkedin ); ?>" title="<?= esc_html( $url_title . ' ' . __( 'by LinkedIn', 'ms' ) ); ?>"><?php _e( 'LinkedIn', 'ms' ); ?></a>
												</li>
												<?php
											}
											?>
										</ul>
									</div>
								</div>
								<?php
							}
							?>
						</div>
						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
