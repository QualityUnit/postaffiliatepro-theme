<?php // @codingStandardsIgnoreLine
$current_lang    = apply_filters( 'wpml_current_language', null );
$header_category = get_en_category( 'ms_videos', $post->ID );
do_action( 'wpml_switch_language', $current_lang );
?>


<div class="Post" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="PostAffiliatePro"></span>

	<div class="Post__header features <?= esc_attr( $header_category ); ?>">
		<div class="wrapper__wide"></div>
	</div>

	<div class="wrapper__wide Post__container">
		<div class="Post__sidebar">
			<div class="Post__sidebar__categories">
				<h4 class="Post__sidebar__title"><?php _e( 'Categories', 'ms' ); ?></h4>
				<ul class="CategoryTags">
					<?php
					$current_id = apply_filters( 'wpml_object_id', $post->ID, 'ms_videos' );
					$categories = get_the_terms( $current_id, 'ms_videos_categories' );

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
			<div class="Post__logo Post__logo--features">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( 'logo_thumbnail' ); ?>
				<?php } else { ?>
					<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-custom-post_type.svg" alt="<?php _e( 'Integration', 'ms' ); ?>">
				<?php } ?>
			</div>
			<div class="Post__content__breadcrumbs">
				<ul>
					<li><a href="<?php _e( '/features/', 'ms' ); ?>"><?php _e( 'Features', 'ms' ); ?></a></li>
					<li><?php the_title(); ?></li>
				</ul>
			</div>

			<h1 itemprop="name"><?php the_title(); ?></h1>

			<div class="Content" itemprop="articleBody">
				<iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo esc_attr( get_post_meta( get_the_ID(), 'mb_videos_mb_videos_video_id', true ) ); ?>" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>

				<?= do_shortcode( '[urlslab-generator id="' . get_post_meta( get_the_ID(), 'mb_videos_mb_videos_shortcode_id', true ) . '" videoid="' . get_post_meta( get_the_ID(), 'mb_videos_mb_videos_video_id', true ) . '"]' ); ?>

				<?php the_content(); ?>

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
