<?php // @codingStandardsIgnoreLine
$page_header_title = __( 'Affiliate Marketing Glossary', 'ms' );
$page_header_text  = __( 'If you are just starting out with affiliate software or affiliate marketing, you might struggle with all the new terminology. We have compiled a complete list of affiliate marketing terms.', 'ms' );
if ( is_tax( 'ms_glossary_categories' ) ) :
	$page_header_title = single_term_title( '', false );
	$page_header_text  = term_description();
endif;
$page_header_args = array(
	'type'  => 'lvl-1',
	'image' => array(
		'src' => get_template_directory_uri() . '/assets/images/compact-header-glossary.png?ver=' . THEME_VERSION,
		'alt' => $page_header_title,
	),
	'title' => $page_header_title,
	'text'  => $page_header_text,
);
?>
<div id="archive" class="Archive" itemscope itemtype="https://schema.org/DefinedTermSet">
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>
	<div class="Archive__filter">
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
									'orderby'        => 'title',
									'order'          => 'ASC',
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
