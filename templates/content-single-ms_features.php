<?php // @codingStandardsIgnoreLine
set_custom_source( 'common/splide', 'css' );

$current_lang    = apply_filters( 'wpml_current_language', null );
$header_category = get_en_category( 'ms_features', $post->ID );
do_action( 'wpml_switch_language', $current_lang );
$page_header_logo = array(
	'src' => get_template_directory_uri() . '/assets/images/icon-custom-post_type.svg' . THEME_VERSION,
	'alt' => __( 'Feature', 'ms' ),
);
if ( has_post_thumbnail() ) {
	$page_header_logo['src'] = get_the_post_thumbnail_url( $post, 'logo_thumbnail' );
}
$page_header_image = 'features-category_' . $header_category . '.jpg';
$page_header_args  = array(
	'image' => array(
		'src' => get_template_directory_uri() . '/assets/images/' . $page_header_image . '?ver=' . THEME_VERSION,
		'alt' => get_the_title(),
	),
	'logo'  => $page_header_logo,
	'title' => get_the_title(),
	'text'  => do_shortcode( '[urlslab-generator id="4"]' ),
	'toc'   => true,
);
$current_id        = apply_filters( 'wpml_object_id', $post->ID, 'ms_features' );
$categories        = get_the_terms( $current_id, 'ms_features_categories' );
$categories_url    = get_post_type_archive_link( 'ms_features' );
if ( $categories && $categories_url ) {
	$new_tags = array(
		'title' => __( 'Categories', 'ms' ),
	);
	foreach ( $categories as $category ) {
		$new_tags['list'][] = array(
			'href'  => $categories_url . '#' . $category->slug,
			'title' => $category->name,
		);
	}
	if ( isset( $new_tags['list'] ) ) {
		$page_header_args['tags'][] = $new_tags;
	}
}


$features_post_id = get_the_ID();

$pap_pricing_url    = __( '/pricing/', 'ms' );
$pap_features_url    = __( '/features/', 'ms' );

$tag_configurations = array(
	array(
		'meta_key' => 'mb_features_mb_features_plan',
		'title' => __( 'Available in', 'ms' ),
		'url' => $pap_pricing_url,
		'versions' => array(
			'pro' => __( 'Post Affiliate Pro', 'ms' ),
			'ultimate' => __( 'Post Affiliate Pro Ultimate', 'ms' ),
			'network' => __( 'Post Affiliate Network', 'ms' ),
		),
	),
	array(
		'meta_key' => 'mb_features_mb_features_size',
		'title' => __( 'Suitable for', 'ms' ),
		'url' => $pap_features_url,
		'versions' => array(
			'individuals' => __( 'Individuals', 'ms' ),
			'start-ups' => __( 'Start-ups', 'ms' ),
			'smbs' => __( 'SMBs', 'ms' ),
			'enterprise' => __( 'Enterprise', 'ms' ),
		),
	),
	array(
		'meta_key' => 'mb_features_mb_features_collections',
		'title' => __( 'Collections', 'ms' ),
		'url' => $pap_features_url,
		'versions' => array(
			'featured' => __( 'Featured', 'ms' ),
			'popular' => __( 'Popular', 'ms' ),
			'new' => __( 'New', 'ms' ),
		),
	),
);

foreach ( $tag_configurations as $config ) {
	$features = get_post_meta( $features_post_id, $config['meta_key'], true );

	if ( $features ) {
		$new_tags = array(
			'title' => $config['title'],
			'list' => get_tags_from_features( $features, $config['url'], $config['versions'] ),  // Předání hodnoty 'url' z $tag_configurations
		);

		if ( ! empty( $new_tags['list'] ) ) {
			$page_header_args['tags'][] = $new_tags;
		}
	}
}

function get_tags_from_features( $features, $url, $versions ) {
	$tags = array();

	foreach ( $features as $item ) {
		if ( isset( $versions[ $item ] ) ) {
			$tags[] = array(
				'href' => $url,  // Použití hodnoty $url jako 'href'
				'title' => $versions[ $item ],
			);
		}
	}

	return $tags;
}

?>

<div class="Post Post--sidebar-right" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="LiveAgent"></span>

	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>

	<div class="wrapper Post__container">
		<div class="Post__sidebar flowhunt-skip">
			<div class="Signup__sidebar-wrapper">
				<?= do_shortcode( '[signup-sidebar js-sticky="true"]' ); ?>
			</div>
		</div>
		<div class="Post__content">
			<div class="Content" itemprop="articleBody">
				<?php the_content(); ?>

				<?php echo do_shortcode( '[urlslab-faq]' ); ?>

				<div class="Post__content__resources">
					<div class="Post__sidebar__title h4"><?php _e( 'Related Articles', 'ms' ); ?></div>

					<div class="SimilarSources flowhunt-skip">
						<?php echo do_shortcode( '[urlslab-related-resources related-count="4" show-image="true" show-summary="true"]' ); ?>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
