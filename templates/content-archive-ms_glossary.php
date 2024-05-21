<?php // @codingStandardsIgnoreLine
require_once get_template_directory() . '/lib/components/searchfield.php';
set_custom_source( 'layouts/Archive' );
set_source( false, 'layouts/Index' );
set_custom_source( 'indexFilter', 'js' );

$main_page = get_posts(
	array(
		'name'      => 'affiliate-marketing-glossary',
		'post_type' => 'ms_glossary',
	)
);

if ( ! empty( $main_page ) ) {
	$main_page_id  = $main_page[0]->ID;
	$translated_id = apply_filters( 'wpml_object_id', $main_page_id, 'ms_reviews' );

	$mainpost     = get_post( $translated_id );
	$post_title   = $mainpost->post_title;
	$post_content = $mainpost->post_content;
}


$page_header_title = __( 'Affiliate marketing glossary', 'ms' );
$page_header_text  = __( 'Welcome to our comprehensive Affiliate Marketing Glossary, your essential guide to mastering the language of affiliate marketing. Spanning from the fundamental to the advanced, these popular affiliate marketing terms serve as an invaluable resource for understanding the mechanisms and strategies within the affiliate marketing industry.', 'ms' );
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
						<li class="Index__top--item" style="display: inline-block"><a href="#<?= esc_attr( $category->slug ); ?>" title="<?= esc_attr( $category->name ); ?>"><?= esc_html( $category->name ); ?></a></li>
					<?php } ?>
				</ul>
		</div>
	</div>

	<div class="wrapper Index__list">
			<?php $categories = get_categories( array( 'taxonomy' => 'ms_glossary_categories' ) ); ?>
			<?php foreach ( $categories as $category ) { ?>
				<div id="<?= esc_attr( $category->slug ); ?>" class="Index__list--group flex-tablet" data-searchGroup>
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
							<li itemscope itemtype="https://schema.org/DefinedTerm" style="display: inline-block" data-search><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>" itemprop="url" ><span class="item-title" itemprop="name"><?php the_title(); ?></span></a></li>
						<?php endwhile; ?>
						<?php wp_reset_postdata(); ?>
					</ul>
				</div>
			<?php } ?>
	</div>

	<?php
	if ( ! empty( $main_page ) ) {
		?>
		<div class="wrapper mt-xxl glossary__how">
			<?= do_shortcode( '[split-title title="' . $post_title . '"]' ); ?>
			<div class="Content">
				<?php
				$content = apply_filters( 'the_content', $post_content );
				echo $content // @codingStandardsIgnoreLine;
				?>
			</div>
		</div>
		<?php
	}
	?>


</div>
