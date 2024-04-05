<?php // @codingStandardsIgnoreLine
require_once get_template_directory() . '/lib/components/searchfield.php';
set_custom_source( 'layouts/Archive' );
set_custom_source( 'layouts/Index' );
set_custom_source( 'indexFilter', 'js' );

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
	<div class="Index Archive__filter">
		<div class="wrapper flex-tablet flex-align-center">
			<?= searchfield( __( 'Search glossary', 'urlslab' ) ); // @codingStandardsIgnoreLine ?> 
				<ul class="Index__top">
					<?php $categories = get_categories( array( 'taxonomy' => 'ms_glossary_categories' ) ); ?>
					<?php foreach ( $categories as $category ) { ?>
						<li class="Index__top--item"><a href="#<?= esc_attr( $category->slug ); ?>" title="<?= esc_attr( $category->name ); ?>"><?= esc_html( $category->name ); ?></a></li>
					<?php } ?>
				</ul>
		</div>
	</div>

	<div class="wrapper Index__list">
			<?php $categories = get_categories( array( 'taxonomy' => 'ms_glossary_categories' ) ); ?>
			<?php foreach ( $categories as $category ) { ?>
				<div id="<?= esc_attr( $category->slug ); ?>" class="Index__list--group" data-searchGroup>
					<h2 class="Index__list--groupTitle"><?= esc_html( $category->name ); ?></h2>
					<ul>
						<?php
						$query_glossary_posts = new WP_Query(
							array(
								'ms_glossary_categories' => $category->slug,
								// @codingStandardsIgnoreLine
								'posts_per_page' => 500,
								'orderby'                => 'title',
								'order'                  => 'ASC',
							)
						);
						while ( $query_glossary_posts->have_posts() ) :
							$query_glossary_posts->the_post();
							?>
							<li itemscope itemtype="https://schema.org/DefinedTerm"  data-search><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url" ><span class="item-title" itemprop="name"><?php the_title(); ?></span></a></li>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
				</div>
			<?php } ?>
	</div>
</div>
