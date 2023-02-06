<?php // @codingStandardsIgnoreLine ?>
<div id="archive" class="Archive" itemscope itemtype="https://schema.org/DefinedTermSet">
	<div class="wrapper Archive__header Archive__header--glossary">
		<?php if ( is_tax( 'ms_glossary_categories' ) ) { ?>
			<h1 class="Archive__header__title" itemprop="name"><?php single_cat_title(); ?></h1>
			<div class="Archive__header__subtitle"><p itemprop="description" ><?php the_archive_description(); ?></p></div>
		<?php } else { ?>
			<h1 class="Archive__header__title" itemprop="name"><?php _e( 'Affiliate Marketing Glossary', 'ms' ); ?></h1>
			<p class="Archive__header__subtitle" itemprop="description" ><?php _e( 'Understanding terminology can be difficult when getting started. We have put together this glossary list to help you with new words that might come while working with your affiliate software.', 'ms' ); ?></p>
		<?php } ?>
	</div>

	<div class="Box Box--gray Archive__filter">
		<div class="wrapper">
			<div class="Archive__filter__item">
				<ul>
					<?php $categories = get_categories( array( 'taxonomy' => 'ms_glossary_categories' ) ); ?>
					<?php foreach ( $categories as $category ) { ?>
						<li><a href="#<?= esc_attr( $category->slug ); ?>" title="<?= esc_attr( $category->name ); ?>"><?= esc_html( $category->name ); ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="wrapper Archive__container Archive__container--glossary">
		<div class="Archive__container__content list">
			<?php $categories = get_categories( array( 'taxonomy' => 'ms_glossary_categories' ) ); ?>
			<?php foreach ( $categories as $category ) { ?>
				<div id="<?= esc_attr( $category->slug ); ?>" class="Archive__container__content__item">
					<h2 class="Archive__container__content__item__title"><?= esc_html( $category->name ); ?></h2>
					<div class="Archive__container__content__item__content">
						<ul>
							<?php
							$query_glossary_posts = new WP_Query(
								array(
									'ms_glossary_categories' => $category->slug,
										// @codingStandardsIgnoreLine
											'posts_per_page' => 500,
									'orderby' => 'title',
									'order'   => 'ASC',
								)
							);
							while ( $query_glossary_posts->have_posts() ) :
								$query_glossary_posts->the_post();
								?>
								<li itemscope itemtype="https://schema.org/DefinedTerm"><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url"><span itemprop="name"><?php the_title(); ?></span></a></li>
							<?php endwhile; ?>
							<?php wp_reset_postdata(); ?>
						</ul>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
