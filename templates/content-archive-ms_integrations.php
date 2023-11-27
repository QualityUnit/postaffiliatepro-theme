<?php // @codingStandardsIgnoreLine
set_source( 'integrations', 'pages/Category', 'css' );
set_source( 'integrations', 'filter', 'js' );
$integrations_categories        = array_unique( get_categories( array( 'taxonomy' => 'ms_integrations_categories' ) ), SORT_REGULAR );
$integrations_types              = array_unique( get_categories( array( 'taxonomy' => 'ms_integrations_types' ) ), SORT_REGULAR );
$page_header_title = __( 'Integrations', 'ms' );
$page_header_text  = __( 'Enhance your workflow and add new functionalities to Post Affiliate Pro with our selection of plugins and integrations', 'ms' );
if ( is_tax( 'ms_integrations_categories' ) ) :
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
$filter_items_types = array(
	array(
		'checked' => true,
		'value'   => '',
		'title'   => __( 'Any', 'ms' ),
	),
);

foreach ( $integrations_types as $integrations_type ) :
	$filter_items_types[] = array(
		'value' => $integrations_type->slug,
		'title' => $integrations_type->name,
	);
endforeach;

foreach ( $integrations_categories as $integrations_category ) :
	$filter_items_categories[] = array(
		'value' => $integrations_category->slug,
		'title' => $integrations_category->name,
	);
endforeach;
$filter_items     = array(
	array(
		'type'  => 'radio',
		'name'  => 'category',
		'title' => __( 'Category', 'ms' ),
		'items' => $filter_items_categories,
	),
	array(
		'type'  => 'radio',
		'name'  => 'type',
		'title' => __( 'Type', 'ms' ),
		'items' => $filter_items_types,
	),
);
$page_header_args = array(
	'type'   => 'lvl-1',
	'image'  => array(
		'src' => get_template_directory_uri() . '/assets/images/compact-header-integrations.png?ver=' . THEME_VERSION,
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
					?>

					<?php
					$integrations_category_slugs = array();
					$integrations_type_slugs     = array();

					$categories = get_the_terms( 0, 'ms_integrations_categories' );
					$types = get_the_terms( 0, 'ms_integrations_types' );

					if ( ! empty( $categories ) ) {
						foreach ( $categories as $category_item ) {
							$integrations_category_slugs[] = $category_item->slug;
						}
					}

					if ( ! empty( $types ) ) {
						foreach ( $types as $type_item ) {
							$integrations_type_slugs[] = $type_item->slug;
						}
					}

					$integrations_category = implode( ' ', $integrations_category_slugs );
					$integrations_type = implode( ' ', $integrations_type_slugs );
					?>

					<li class="Category__item
					<?php
					if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_pillar', true ) === 'on' ) {
						echo 'pillar'; }
					?>
					" data-type="<?= esc_attr( $integrations_type ); ?>" data-category="<?= esc_attr( $integrations_category ); ?>" data-href="<?php the_permalink(); ?>">
						<a href="<?php the_permalink(); ?>" class="Category__item__thumbnail">
							<?php if ( has_post_thumbnail() ) { ?>
								<?php the_post_thumbnail( 'archive_thumbnail' ); ?>
							<?php } ?>
						</a>
						<?php
						if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_pillar', true ) === 'on' ) {
							?>
						<div class="Category__item__wrap">
							<?php
						}
						?>
							<h3 class="Category__item__title item-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
							<div class="Category__item__excerpt item-excerpt">
								<a href="<?php the_permalink(); ?>">
									<?= esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?>
									<?php if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_pillar', true ) === 'on' ) { ?>
										<span><?php _e( 'Read More', 'ms' ); ?></span>
									<?php } ?>
								</a>
							</div>
							<?php
							if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_pillar', true ) === 'on' ) {
								?>
						</div>
								<?php
							}
							?>
					</li>

					<?php
					$collections = '';
					$data_type   = '';
					$category    = '';
					?>

				<?php endwhile; ?>
			</ul>
		</div>
	</div>

</div>
