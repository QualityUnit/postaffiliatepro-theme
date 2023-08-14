<?php // @codingStandardsIgnoreLine
$current_lang    = apply_filters( 'wpml_current_language', null );
$header_category = get_en_category( 'ms_integrations', $post->ID );
do_action( 'wpml_switch_language', $current_lang );
?>

<div class="Post" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="PostAffiliatePro"></span>

	<div class="Post__header integrations <?= esc_attr( $header_category ); ?>">
		<div class="wrapper__wide"></div>
	</div>

	<div class="wrapper__wide Post__container">
		<div class="Post__sidebar">
			<?php if ( ! empty( get_the_taxonomies()['ms_integrations_categories'] ) ) { ?>
				<div class="Post__sidebar__categories">
					<h4 class="Post__sidebar__title"><?php _e( 'Categories', 'ms' ); ?></h4>
					<ul class="CategoryTags">
						<?php
						$current_id = apply_filters( 'wpml_object_id', $post->ID, 'ms_integrations' );
						$categories = get_the_terms( $current_id, 'ms_integrations_categories' );

						if ( $categories ) {
							foreach ( $categories as $category ) {
								$category_id    = $category->term_id;
								$category_name  = $category->name;
								$category_color = get_term_meta( $category_id, 'category_color', true );
								?>
								<li class="CategoryTag <?= esc_attr( $category_color ); ?>">
									<a href="../#<?= esc_attr( $category->slug ); ?>" title="<?= esc_attr( $category_name ); ?>"><?= esc_html( $category_name ); ?></a>
								</li>
								<?php
							}
						}
						?>
					</ul>
				</div>
			<?php } ?>

			<div class="Post__sidebar__available">
				<h4 class="Post__sidebar__title"><?php _e( 'Available in', 'ms' ); ?></h4>
				<ul>
					<?php
					if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_plan', true ) ) {
						foreach ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_plan', true ) as $item ) {
							if ( 'ticket' === $item ) {
								echo "<li class='" . esc_attr( $item ) . "'>" . esc_html( get_option( 'ms_theme_ms_general_ticket' ) ) . '</li>';
							}
							if ( 'ticket-chat' === $item ) {
								echo "<li class='" . esc_attr( $item ) . "'>" . esc_html( get_option( 'ms_theme_ms_general_ticket_chat' ) ) . '</li>';
							}
							if ( 'all-inclusive' === $item ) {
								echo "<li class='" . esc_attr( $item ) . "'>" . esc_html( get_option( 'ms_theme_ms_general_all_inclusive' ) ) . '</li>';
							}
							if ( 'extensions' === $item ) {
								echo "<li class='" . esc_attr( $item ) . "'>" . esc_html( get_option( 'ms_theme_ms_general_extensions' ) ) . '</li>';
							}
							if ( 'self-hosted' === $item ) {
								echo "<li class='" . esc_attr( $item ) . "'>" . esc_html_e( 'Self-Hosted', 'ms' ) . '</li>';
							}
						}
					}
					?>
				</ul>
			</div>

			<div class="Post__sidebar__partner">
				<h4 class="Post__sidebar__title"><?php _e( 'Partner', 'ms' ); ?></h4>
				<ul>
					<?php if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_partner_learn_more', true ) ) { ?>
						<li>
							<a href="<?= esc_url( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_partner_learn_more', true ) ) ?>" onclick="_paq.push(['trackEvent', 'Activity', 'Integration', 'Integration <?php the_title(); ?> - Button - Partner - Learn More'])" target="_blank" rel="nofollow">
								<?php _e( 'Learn More', 'ms' ); ?>
							</a>
						</li>
					<?php } ?>
					<?php if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_partner_privacy_policy', true ) ) { ?>
						<li>
							<a href="<?= esc_url( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_partner_privacy_policy', true ) ) ?>" onclick="_paq.push(['trackEvent', 'Activity', 'Integration', 'Integration <?php the_title(); ?> - Button - Partner - Privacy Policy'])" target="_blank" rel="nofollow">
								<?php the_title(); ?> <?php _e( 'Privacy Policy', 'ms' ); ?>
							</a>
						</li>
					<?php } ?>
				</ul>
			</div>

			<?php if ( sidebar_toc() !== false ) { ?>
				<div class="SidebarTOC-wrapper">
					<div class="SidebarTOC Post__SidebarTOC">
						<strong class="SidebarTOC__title"><?php _e( 'Contents', 'ms' ); ?></strong>
						<div class="SidebarTOC__slider slider splide">
							<div class="splide__track">
								<ul class="SidebarTOC__content splide__list">
									<?= wp_kses_post( sidebar_toc() ); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="Signup__sidebar-wrapper">
			<?= do_shortcode( '[signup-sidebar]' ); ?>
		</div>

		<div class="Post__content">
			<div class="Post__logo">
				<?php the_post_thumbnail( 'logo_thumbnail' ); ?>
			</div>

			<div class="Post__content__breadcrumbs">
				<ul>
					<li><a href="<?php _e( '/integration-methods/', 'ms' ); ?>"><?php _e( 'Integrations', 'ms' ); ?></a></li>
					<li><?php the_title(); ?></li>
				</ul>
			</div>

			<h1 itemprop="name"><?php the_title(); ?></h1>

			<div class="Content" itemprop="articleBody">
				<?php the_content(); ?>

				<?php echo do_shortcode( '[urlslab-faq]' ); ?>

				<div class="Post__buttons">
					<a href="<?php _e( '/integration-methods/', 'ms' ); ?>" class="Button Button--outline Button--back"  onclick="_paq.push(['trackEvent', 'Activity', 'Integrations', 'Back to Integrations'])"><span><?php _e( 'Back to Integrations', 'ms' ); ?></span></a>

					<a href="<?php _e( '/trial/', 'ms' ); ?>" class="Button Button--full" onclick="_paq.push(['trackEvent', 'Activity', 'Glossary', 'Sign Up Trial'])">
						<span><?php _e( 'Create account for FREE', 'ms' ); ?></span>
					</a>
				</div>

				<div class="Post__content__resources">
					<div class="Post__sidebar__title h4"><?php _e( 'Related Articles', 'ms' ); ?></div>

					<div class="SimilarSources">
						<?php echo do_shortcode( '[urlslab-related-resources related-count="4" show-image="true" show-summary="true"]' ); ?>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
