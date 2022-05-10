<?php

function ms_sucess_stories( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts'      => '3',
			'posts_from' => '',
		),
		$atts,
		'successstories'
	);
	ob_start();
	?>

<div class="Archive__container Archive__container--boxes Archive__container--success-stories">
	<ul class="Archive__container__content list">
		<?php
		$query_success_stories_posts = new WP_Query(
			array(
				'post_type'      => 'ms_success-stories',
				'posts_per_page' => $atts['posts'],
				'offset'         => $atts['posts_from'],
			)
		);

		while ( $query_success_stories_posts->have_posts() ) :
			$query_success_stories_posts->the_post();
			?>

		<li <?php post_class( 'Blog__container__content__item Box--shadow Box--article' ); ?>>
			<a class="Box--article__inn" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
				<div class="Box--article__image">
					<?= wp_get_attachment_image( get_post_meta( get_the_ID(), 'mb_success-stories_mb_success-stories_logo', true ), 'box_archive_thumbnail' ) ?>

					<?php 
					if ( ! get_post_meta( get_the_ID(), 'mb_success-stories_mb_success-stories_logo', true ) ) {
						the_post_thumbnail( 'blog_post_thumbnail', array( 'alt' => get_the_title() ) );
					}
					?>
				</div>
				<div class="Box--article__text">
					<h3 class="Box--article__title">
						<?php the_title(); ?>
					</h3>
					<p class="Box--article__excerpt"><?= esc_html( wp_trim_words( get_the_excerpt(), 25 ) ); ?></p>
					<p class="Box--article__more">
						<?php _e( 'Learn more' ); ?>
						<svg class="Box--article__more-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 19 19">
							<g>
								<path d="M16.662 8.404H0v2.192h16.662V8.404z" />
								<path d="M17.484 7.903 7.976 17.41l1.55 1.55 9.508-9.507-1.55-1.55z" />
								<path d="m9.558-.003-1.55 1.55 9.508 9.508 1.55-1.55L9.558-.003z" />
							</g>
						</svg>
					</p>
				</div>
			</a>
		</li>

		<?php endwhile; ?>
		<?php wp_reset_postdata(); ?>
	</ul>
</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'successstories', 'ms_sucess_stories' );
