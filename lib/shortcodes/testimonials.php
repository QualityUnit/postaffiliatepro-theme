<?php

function ms_testimonials( $atts ) {
	$atts = shortcode_atts(
		array(
			'posts'       => '6',
			'posts_from'  => '',
			'alternative' => 'false',
		),
		$atts,
		'testimonials'
	);
	ob_start();
	?>

		<ul class="Testimonials__list">
		<?php
		$query_testimonials_posts = new WP_Query(
			array(
				'post_type'      => 'ms_testimonials',
				'posts_per_page' => $atts['posts'],
				'offset'         => $atts['posts_from'],
			)
		);

		while ( $query_testimonials_posts->have_posts() ) :
			$query_testimonials_posts->the_post();
			$person = get_post_meta( get_the_ID(), 'mb_testimonials_mb_testimonials_name', true );
			?>
			<li <?php post_class( 'Testimonials__item' . ( 'false' !== $atts['alternative'] ? ' Testimonials__item--alternative' : '' ) ); ?>>
				<div class="Testimonials__item__top">
					<div class="Testimonials__item__person">
						<h3 class="highlight Testimonials__item__name"><?= '<span class="firstWord">' . esc_html( strstr( $person, ' ', true ) ) . '</span>' . esc_html( strstr( $person, ' ' ) ) ?></h3>
						<p class="Testimonials__item__position"><?= esc_html( get_post_meta( get_the_ID(), 'mb_testimonials_mb_testimonials_position', true ) ) ?></p>
					</div>
					<div class="Testimonials__item__thumbnail">
						<?= wp_get_attachment_image( get_post_meta( get_the_ID(), 'mb_testimonials_mb_testimonials_photo', true ), 'person_thumbnail' ) ?>
					</div>
				</div>
				<div class="Testimonials__item__content">
					<?php the_content(); ?>
				</div>
				<div class="Testimonials__item__expander" data-on="–" data-off="+">+</div>
			</li>

			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</ul>

	<?php
	set_custom_source( 'testimonials_blocks', 'js' );
	return ob_get_clean();
}
add_shortcode( 'testimonials', 'ms_testimonials' );
