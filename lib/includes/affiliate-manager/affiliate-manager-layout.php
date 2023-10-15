<?php
	set_custom_source( 'components/SidebarTOC', 'css' );
	set_custom_source( 'components/SignupSidebar', 'css' );


$page_header_args = array(
	'avatar' => array(
		'src' => $aff_image_url,
		'alt'   => single_cat_title( '', false ),
	),
	'title' => single_cat_title( '', false ),
	'manager_industries' => $manager_industries,
	'text'  => do_shortcode( '[urlslab-generator id="4"]' ),
	'affiliate_manager' => __( 'Affiliate manager', 'ms' ),
	'contacts_info' => array(
		'phone'             => $phone,
		'email'             => $email,
		'linkedin'      => $linkedin,
	),
);


?>

<div class="Post Post--sidebar-right">
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<div class="Post__container wrapper">

		<div class="Signup__sidebar-wrapper">
			<?= do_shortcode( '[signup-sidebar]' ); ?>
		</div>
		<div class="Post__content">
			<div class="Post__importantNote">
				<svg class="icon icon-info-solid"><use xlink:href="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icons.svg#info-solid"></use></svg>
				<p><?php _e( 'Post Affiliate Pro offers a comprehensive list of affiliate contacts. We are not connected to any of the companies listed here. Feel free to contact us if you want us to update any information.', 'ms' ); ?></p>
			</div>

			<div class="Directory__blocks">
				<h2 class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?php _e( 'Affiliate manager\'s bio', 'ms' ); ?></span></h2>
					<p><?= $aff_desc; // @codingStandardsIgnoreLine ?></p>

				<h2 class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?php _e( 'Geographical focus', 'ms' ); ?></span></h2>
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
					<h2 class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?php _e( 'Experience with the following affiliate software', 'ms' ); ?></span></h2>
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
					<h2 class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?php _e( 'Income from affiliate programs', 'ms' ); ?></span></h2>
					<p><?= esc_html( $revenue ); ?></p>
				<?php } ?>
				<?php
				if ( is_array( $communication ) ) {
					?>
					<h2 class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?php _e( 'Channels of communication', 'ms' ); ?></span></h2>
					<p class="commaList">
						<?php
						foreach ( $communication as $comm ) {
							?>
							<span><?= esc_html( comm( $comm ) ); ?></span>
						<?php } ?>
					</p>
				<?php } ?>

				<h2 class="Directory__blocks__title"><span class="Directory__blocks__title__inner"><?= esc_html( __( 'Affiliate programs managed by', 'ms' ) . ' ' . $aff_name ); ?></span></h2>
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
