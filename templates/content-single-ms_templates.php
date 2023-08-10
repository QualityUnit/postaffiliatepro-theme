<?php // @codingStandardsIgnoreLine
set_source( 'single-post', 'common/splide', 'css' );
set_source( 'single-post', 'splide', 'js' );
set_source( 'single-post', 'sidebar_toc', 'js' );
set_source( 'single-post', 'custom_lightbox', 'js' );
$posttitle          = get_the_title();
$posttitle_filtered = str_replace( '^', '', $posttitle );
$current_lang       = apply_filters( 'wpml_current_language', null );
$header_category    = get_en_category( 'ms_templates', $post->ID );
do_action( 'wpml_switch_language', $current_lang );
?>
<div class="Post" itemscope itemtype="http://schema.org/Guide">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="PostAffiliatePro"></span>

	<div class="Post__header Post__header__narrow academy <?= esc_attr( $header_category ); ?>">
		<div class="wrapper__wide">
			<div class="Post__header Post__header__narrow__image">
				<?php
				if ( has_post_thumbnail() ) {
					the_post_thumbnail();
				}
				if ( ! has_post_thumbnail() ) {
					?>
					<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/category_item_image.jpg" alt="<?php the_title(); ?>" />
				<?php } ?>
			</div>
			<div class="Post__header__narrow__text">
				<div class="Post__content__breadcrumbs Post__header__narrow__breadcrumbs">
					<ul>
						<li><a href="<?php _e( '/templates/', 'ms' ); ?>"><?php _e( 'Templates', 'ms' ); ?></a></li>
						<li><?= esc_html( $posttitle_filtered ); ?></li>
					</ul>
				</div>
				<h1 class="Post__header__narrow__title">
					<?php
					$pagetitle = explode( '^', get_the_title() );
					if ( isset( $pagetitle[1] ) ) {
						?>
						<?php echo esc_html( $pagetitle[0] ) . ' '; ?>
						<span class="highlight"><?php echo esc_html( $pagetitle[1] ); ?></span>
						<?php echo esc_html( ' ' . $pagetitle[2] ); ?>
						<?php
					} else {
						echo esc_html( $posttitle_filtered );
					}
					?>
				</h1>
			</div>
		</div>
	</div>


	<div class="wrapper__wide Post__container">
		<div class="Post__sidebar">
			<div class="Post__sidebar__categories">
				<h4 class="Post__sidebar__title"><?php _e( 'Categories', 'ms' ); ?></h4>
				<ul class="CategoryTags">
					<?php
					$current_id = apply_filters( 'wpml_object_id', $post->ID, 'ms_templates' );
					$categories = get_the_terms( $current_id, 'ms_templates_categories' );

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
			<div class="Content" itemprop="text">
				<?php the_content(); ?>
				<?php echo do_shortcode( '[urlslab-faq]' ); ?>

				<div class="Post__buttons">
					<a href="<?php _e( '/templates/', 'ms' ); ?>" class="Button Button--outline Button--back"  onclick="_paq.push(['trackEvent', 'Activity', 'Templates', 'Back to Templates'])"><span><?php _e( 'Back to Templates', 'ms' ); ?></span></a>

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
