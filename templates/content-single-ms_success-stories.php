<?php // @codingStandardsIgnoreLine ?>
<?php
set_custom_source( 'common/splide', 'css' );
?>

<div class="Article Article--blog Article__success-story" itemscope itemtype="http://schema.org/Article">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="PostAffiliatePro"></span>

	<div class="Article__header urlslab-skip-lazy">
		<picture>
			<source media="(min-width: 768px)" srcset="<?= esc_url( the_post_thumbnail_url() ); ?>">
			<source srcset="<?= esc_url( wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'mb_success-stories_mb_success-stories_logo', true ), 'box_archive_thumbnail' ) ); ?>">
			<?php the_post_thumbnail(); ?>
		</picture>
	</div>

	<div class="wrapper Article__container">
		<div class="Article__content">
			<div class="Content">
				<h1 class="Article__content__title" itemprop="name"><?php the_title(); ?></h1>

				<div itemprop="articleBody">
					<?php the_content(); ?>
				</div>

				<div class="Article__content__back">
					<a href="<?php _e( '/testimonials/', 'ms' ); ?>" class="Button Button--outline">
						<span><?php _e( 'Back', 'ms' ); ?></span>
					</a>
				</div>
			</div>
		</div>

		<div class="Article__sidebar">
			<div class="Article__sidebar__category stories">
				<h4><?php _e( 'More Stories', 'ms' ); ?></h4>
				<ul class="Article__sidebar__menu">
					<?php
					$query_success_stories_posts = new WP_Query(
						array(
							'post_type'      => 'ms_success-stories',
							'posts_per_page' => 100,
							'orderby'        => 'title',
							'order'          => 'ASC',
						)
					);
					while ( $query_success_stories_posts->have_posts() ) :
						$query_success_stories_posts->the_post();
						?>
						<li class="Article__sidebar__item">
							<a class="Article__sidebar__item-url" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<div class="Article__sidebar__item-image urlslab-skip-lazy">
									<?= wp_get_attachment_image( get_post_meta( get_the_ID(), 'mb_success-stories_mb_success-stories_logo', true ), 'person_thumbnail' ); ?>

									<?php
									if ( ! get_post_meta( get_the_ID(), 'mb_success-stories_mb_success-stories_logo', true ) ) {
										the_post_thumbnail( 'person_thumbnail' );
									}
									?>
								</div>
								<div class="Article__sidebar__item-text">
									<strong><?php the_title(); ?></strong>
									<span class="Article__sidebar__item-learnmore">
										<?php _e( 'Learn more' ); ?>
										<svg class="Article__sidebar__item-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
											<g>
												<path d="M16.662 8.404H0v2.192h16.662V8.404z" />
												<path d="M17.484 7.903 7.976 17.41l1.55 1.55 9.508-9.507-1.55-1.55z" />
												<path d="m9.558-.003-1.55 1.55 9.508 9.508 1.55-1.55L9.558-.003z" />
											</g>
										</svg>
									</span>
								</div>
							</a>
						</li>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</ul>
			</div>
		</div>
	</div>
</div>
