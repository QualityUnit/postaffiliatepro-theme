<?php

function ms_slidertestimonials_reference() {
	ob_start();
	?>

	<div class="SliderTestimonials__slider--reference">
		<section class="slider splide">
			<div class="splide__track">
				<ul class="splide__list">
				<?php
				$query_slider_testimonials_posts = new WP_Query(
					array(
						'post_type'      => 'ms_testimonials',
						'posts_per_page' => 12,
					)
				);

				if ( $query_slider_testimonials_posts->have_posts() ) :
					while ( $query_slider_testimonials_posts->have_posts() ) :
						$query_slider_testimonials_posts->the_post();
						?>

					<li class="splide__slide">
						<div class="slide__inn">
							<div class="SliderTestimonials__slider__top">
								<div class="SliderTestimonials__slider__header__photo">
									<img data-splide-lazy="<?= esc_url( wp_get_attachment_image_url( get_post_meta( get_the_ID(), 'mb_testimonials_mb_testimonials_photo', true ), 'person_thumbnail' ) ) ?>" alt="<?= esc_attr( get_post_meta( get_the_ID(), 'mb_testimonials_mb_testimonials_name', true ) ) ?>" />
								</div>
								<strong class="SliderTestimonials__slider__name"><?= esc_html( get_post_meta( get_the_ID(), 'mb_testimonials_mb_testimonials_name', true ) ) ?></strong>
								<p class="SliderTestimonials__slider__company"><?= esc_html( get_post_meta( get_the_ID(), 'mb_testimonials_mb_testimonials_position', true ) ) ?></p>
							</div>
							<div class="SliderTestimonials__slider__content">
								<span><?= esc_html( get_the_excerpt() ); ?></span>
							</div>
						</div>
					</li>

				<?php endwhile; ?>
				<?php endif; ?>
				<?php wp_reset_postdata(); ?>
				</ul>
			</div>
		</section>
	</div>

	<?php
	set_custom_source( 'common/splide' );
	set_custom_source( 'splide', 'js' );
	set_custom_source( 'slider', 'js' );

	return ob_get_clean();
}
add_shortcode( 'slidertestimonials_reference', 'ms_slidertestimonials_reference' );
