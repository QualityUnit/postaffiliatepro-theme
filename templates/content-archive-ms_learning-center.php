<?php // @codingStandardsIgnoreLine
set_source( 'learning-center', 'pages/Category', 'css' );
?>
<div class="LearningCenter">
	<div class="Box Category__header LearningCenter__header">
		<div class="wrapper">
			<div class="LearningCenter__header--inn Category__header--inn">
				<h1 class="Category__header__title"><?php _e( 'Learning center', 'ms' ); ?></h1>
			</div>
		</div>
	</div>

	<div class="LearningCenter__container wrapper">
		<ul>
			<?php
			if ( have_posts() ) :
				while ( have_posts() ) :
					the_post();
					?>
					<li <?php post_class( 'Box--main Box--main-wide' ); ?>>
						<a class="Box--main__inn" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
							<div class="Box--main__image"></div>
							<div class="Box--main__text">
								<h3 class="Box--main__title">
									<?php the_title(); ?>
								</h3>
								<p class="Box--main__excerpt"><?= esc_html( wp_trim_words( get_the_excerpt(), 20 ) ); ?></p>
							</div>
							<svg class="Box--main__more-arrow" xmlns="http://www.w3.org/2000/svg" viewport="0 0 48 48" fill="none"><path d="M30 10l-2.82 2.82L36.34 22H4v4h32.34l-9.18 9.18L30 38l14-14-14-14z"/></svg>
						</a>
					</li>
					<?php
				endwhile;
			endif;
			?>
		</ul>
	</div>
	<div class="Block elementor-element">
		<?= do_shortcode( '[fullscreenlogos logos=6]' ); ?>
	</div>
</div>
