<?php // @codingStandardsIgnoreLine
set_source( 'academy', 'pages/Category', 'css' );
set_source( 'academy', 'filter', 'js' );

$main_page = get_posts(
	array(
		'name'      => 'affiliate-marketing-academy',
		'post_type' => 'ms_academy',
	)
);

if ( ! empty( $main_page ) ) {
	$main_page_id  = $main_page[0]->ID;
	$translated_id = apply_filters( 'wpml_object_id', $main_page_id, 'ms_reviews' );

	$skipped_post = $translated_id; // skip the post with this ID

	$mainpost     = get_post( $translated_id );
	$post_title   = $mainpost->post_title;
	$post_content = $mainpost->post_content;
}


$categories        = array_unique( get_categories( array( 'taxonomy' => 'ms_academy_categories' ) ), SORT_REGULAR );
$page_header_title = __( 'Affiliate marketing academy', 'ms' );
$page_header_text  = __( 'Welcome to the Affiliate Marketing Academy, your ultimate guide to mastering the art of affiliate marketing. With insightful articles that span from foundational concepts to advanced strategies, this academy serves as a crucial resource for merchants, marketers, and advertisers at any stage of their affiliate marketing journey.', 'ms' );



if ( is_tax( 'ms_academy_categories' ) ) :
	$page_header_title = single_term_title( '', false );
	$page_header_text  = term_description();
endif;

$filter_items_categories = array(
	array(
		'checked' => true,
		'value'   => '',
		'title'   => __( 'Any', 'ms' ),
	),
);
foreach ( $categories as $category ) :
	$filter_items_categories[] = array(
		'value' => $category->slug,
		'title' => $category->name,
	);
endforeach;
$filter_items     = array(
	array(
		'type'  => 'radio',
		'name'  => 'category',
		'title' => __( 'Category', 'ms' ),
		'items' => $filter_items_categories,
	),
);
$page_header_args = array(
	'type'   => 'lvl-1',
	'image'  => array(
		'src' => get_template_directory_uri() . '/assets/images/compact-header-academy.png?ver=' . THEME_VERSION,
		'alt' => $page_header_title,
	),
	'title'  => $page_header_title,
	'text'   => $page_header_text,
	'search' => array(
		'type' => 'academy',
	),
	'filter' => $filter_items,
);
?>
<div id="category" class="Category">
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<div class="wrapper Category__container">
		<div class="Category__content">
			<ul class="Category__content__items list">
				<?php
				while ( have_posts() ) :
					the_post();

					if ( get_the_ID() == $skipped_post ) {
						continue;
					}

					?>

					<?php
					$category = '';

					$categories = get_the_terms( 0, 'ms_academy_categories' );
					if ( ! empty( $categories ) ) {
						foreach ( $categories as $category_item ) {
							$category_item = array_shift( $categories );
							$category     .= $category_item->slug;
							$category     .= ' ';
						}
					}
					$category = substr( $category, 0, -1 );

					$pillar_check = get_post_meta( get_the_ID(), 'mb_academy_mb_academy_pillar', true ) === 'on';
					$pillar_class = $pillar_check ? 'pillar' : '';

					?>

					<li class="Category__item <?= esc_attr( $pillar_class ); ?>" data-category="<?= esc_attr( $category ); ?>" data-href="<?php the_permalink(); ?>">
						<a href="<?php the_permalink(); ?>" class="Category__item__thumbnail">
							<?php if ( has_post_thumbnail() ) : ?>
								<?php the_post_thumbnail( 'blog_post_thumbnail' ); ?>
							<?php else : ?>
								<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-book.svg" alt="<?php _e( 'Academy', 'ms' ); ?>">
							<?php endif; ?>
						</a>
						<?php if ( $pillar_check ) : ?>
						<div class="Category__item__wrap">
							<?php endif; ?>
							<h3 class="Category__item__title item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="Category__item__excerpt item-excerpt">
								<a href="<?php the_permalink(); ?>">
									<?= esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?>
									<?php if ( $pillar_check ) : ?>
										<span><?php _e( 'Read More', 'ms' ); ?></span>
									<?php endif; ?>
								</a>
							</div>
							<?php if ( $pillar_check ) : ?>
						</div>
					<?php endif; ?>
					</li>


					<?php
					$category = '';
					?>

				<?php endwhile; ?>
			</ul>
		</div>
	</div>

	<?php
	if ( ! empty( $main_page ) ) {
		?>
	<div class="wrapper mt-xxl academy__how">
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

