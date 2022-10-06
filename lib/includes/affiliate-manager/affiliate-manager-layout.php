<div id="category" class="Category AffiliateManager">
	<div class="AffiliateManager__header">
		<div class="wrapper__wide">
			<div class="AffiliateManager__image--wrapper">
				<?= $aff_image // @codingStandardsIgnoreLine ?>
			</div>
			<div class="AffiliateManager__header--content">
				<strong class="AffiliateManager__manager"><?php _e( 'Affiliate manager', 'ms' ); ?></strong>
				<h1 class="Post__header--title"><?php single_cat_title(); ?></h1>

				<ul class="AffiliateManagerCard__contacts">
					<?php
					if ( isset( $email ) && 'N/A' !== $email && strlen( $email ) > 5 ) {
						?>
						<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--email fontello-mail">
							<a href="mailto:<?= esc_html( $email ); ?>"><?php _e( 'Mail', 'ms' ); ?></a>
						</li>
						<?php
					}
					?>
					<?php
					if ( isset( $phone ) && 'N/A' !== $phone && strlen( $phone ) > 9 ) {
						?>
						<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--phone fontello-icon-e806">
							<a href="tel:<?= esc_html( $phone ); ?>"><?= esc_html( $phone ); ?></a>
						</li>
						<?php
					}
					?>
					<?php
					if ( isset( $linkedin ) && 'N/A' !== $linkedin && strlen( $linkedin ) > 5 ) {
						?>
						<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--linkedin fontello-linkedin-brands">
							<a href="<?= esc_url( $linkedin ); ?>"><?php _e( 'LinkedIn', 'ms' ); ?></a>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		</div>
	</div>

	<div class="wrapper__wide Post__container">
		<div class="Post__sidebar">
			<div class="Post__sidebar__buttons">
				<a href="<?= esc_url( isset( $_REQUEST['directory_url'] ) ? $_REQUEST['directory_url'] : __( '/affiliate-program-directory/', 'ms' ) ); // @codingStandardsIgnoreLine ?>" class="Button Button--outline"><?php _e( 'Back', 'ms' ); ?></a>
			</div>
			<?php
			if ( is_array( $manager_industries ) ) {
				?>
				<div class="Post__sidebar__categories">
					<h4 class="Post__sidebar__title"><?php _e( 'Industry focus', 'ms' ); ?></h4>
					<ul class="CategoryTags">
						<?php
						foreach ( $manager_industries as $manager_industry ) {
							?>
							<li class="CategoryTag">
								<?= esc_html( strlen( manager_industry( $manager_industry ) ) > 30 ? wp_trim_words( manager_industry( $manager_industry ), 2 ) : manager_industry( $manager_industry ) ); ?>
								<div class="Tooltip Tooltip--centerTop">
									<?= esc_html( manager_industry( $manager_industry ) ); ?>
								</div>
							</li>
						<?php } ?>
					</ul>
				</div>
			<?php } ?>
		</div>

		<div class="Signup__sidebar-wrapper">
			<?= do_shortcode( '[signup-sidebar]' ); ?>
		</div>
		<div class="Post__content">
			<div class="Post__content__breadcrumbs">
				<ul>
					<li><a href="<?php _e( '/affiliate-program-directory/', 'ms' ); ?>"><?php _e( 'Directory', 'ms' ); ?></a></li>
					<?php
					if ( isset( $_REQUEST['directory_url'] ) ) { // @codingStandardsIgnoreLine
						?>
						<li><a href="<?= esc_url( $_REQUEST['directory_url'] ); ?>"><?= esc_html( $_REQUEST['directory_name'] ); // @codingStandardsIgnoreLine ?></a></li>
					<?php } ?>
					<li><?php single_cat_title(); ?></li>
				</ul>
			</div>
			<div class="Directory__blocks">
				<h2 class="Directory__blocks__title"><span><?php _e( 'Affiliate manager\'s bio', 'ms' ); ?></span></h2>
					<p><?= $aff_desc; // @codingStandardsIgnoreLine ?></p>

				<h2 class="Directory__blocks__title"><span><?php _e( 'Geographical focus', 'ms' ); ?></span></h2>
				<p><?= esc_html( $countries ); ?></p>

				<?php
				if ( is_array( $software ) ) {
					$software_exists = false;
					foreach ( $software as $softwareitem_id ) {
						if ( isset( software( $softwareitem_id )->name ) ) {
							$software_exists = true;
						}
					}
					if ( $software_exists ) {
						?>
					<h2 class="Directory__blocks__title"><span><?php _e( 'Experience with the following affiliate software', 'ms' ); ?></span></h2>
					<p class="commaList">
						<?php
						foreach ( $software as $softwareitem_id ) {
							if ( software( $softwareitem_id )->name ) {
								?>
							<span><?= software_url( ( software( $softwareitem_id )->id ), software( $softwareitem_id )->name ); // @codingStandardsIgnoreLine ?></span>
								<?php 
							} 
						} 
						?>
					</p>
						<?php
					} 
				}
				?>

				<?php if ( 'na' !== $revenue && $revenue ) { ?>
					<h2 class="Directory__blocks__title"><span><?php _e( 'Income from affiliate programs', 'ms' ); ?></span></h2>
					<p><?= esc_html( $revenue ); ?></p>
				<?php } ?>
				<?php
				if ( is_array( $communication ) ) {
					?>
					<h2 class="Directory__blocks__title"><span><?php _e( 'Channels of communication', 'ms' ); ?></span></h2>
					<p class="commaList">
						<?php
						foreach ( $communication as $comm ) {
							?>
							<span><?= esc_html( comm( $comm ) ); ?></span>
						<?php } ?>
					</p>
				<?php } ?>

				<h2 class="Directory__blocks__title"><span><?= esc_html( __( 'Affiliate programs managed by', 'ms' ) . ' ' . $aff_name ); ?></span></h2>
				<ul class="Boxes__fullWidth">
					<?php
					while ( have_posts() ) :
						the_post();
						?>
						<li class="Box--fullWidth" data-href="<?php the_permalink(); ?>">
							<a class="Box--fullWidth__inn" href="<?php the_permalink(); ?>">
								<h3 class="Box--fullWidth__title"><?php the_title(); ?></h3>
								<img class="Box--fullWidth__arrow" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/arrow-right.svg" alt="<?php the_title(); ?>">
							</a>
						</li>
					<?php endwhile; ?>
				</ul>
			</div>
		</div>
	</div>

</div>
