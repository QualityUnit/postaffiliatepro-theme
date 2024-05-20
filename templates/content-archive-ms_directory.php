<?php // @codingStandardsIgnoreLine
require_once get_template_directory() . '/lib/components/searchfield.php';
set_custom_source( 'layouts/Archive' );
set_source( false, 'layouts/Index' );
set_custom_source( 'indexFilter', 'js' );

$main_page = get_posts(
	array(
		'name'      => 'affiliate-program-directory',
		'post_type' => 'ms_directory',
	)
);

if ( ! empty( $main_page ) ) {
	$main_page_id  = $main_page[0]->ID;
	$translated_id = apply_filters( 'wpml_object_id', $main_page_id, 'ms_reviews' );

	$mainpost     = get_post( $translated_id );
	$post_title   = $mainpost->post_title;
	$post_content = $mainpost->post_content;
}

$page_header_title = __( 'Affiliate Program Directory', 'ms' );
$page_header_text  = __( 'A directory of companies and affiliate programs', 'ms' );
if ( is_tax( 'ms_directory_categories' ) ) :
	$page_header_title = single_term_title( '', false );
	$page_header_text  = term_description();
endif;
$page_header_args = array(
	'type'  => 'lvl-1',
	'image' => array(
		'src' => get_template_directory_uri() . '/assets/images/compact-header-directory.png?ver=' . THEME_VERSION,
		'alt' => $page_header_title,
	),
	'title' => $page_header_title,
	'text'  => $page_header_text,
);

$directoryposts = get_posts(
	array(
		'post_type'        => 'ms_directory',
		'post_status'      => 'publish',
		'numberposts'      => -1,
		'order'            => 'ASC',
		'orderby'          => 'title',
		'suppress_filters' => false,
		'wpml_language'    => ICL_LANGUAGE_CODE,
	)
);

$index = array();
foreach ( $directoryposts as $directorypost ) {
	$posttitle       = $directorypost->post_title;
	$first_character = substr( $posttitle, 0, 1 );

	if ( ( ctype_upper( $first_character ) || ctype_digit( $first_character ) ) && ! in_array( $first_character, $index ) ) {
		$index[] = $first_character;
	}
}


?>
<div id="archive" class="Archive" itemscope itemtype="https://schema.org/DefinedTermSet">
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>
	<div class="Index Archive__filter">
		<div class="wrapper flex-tablet flex-align-center">
			<?= searchfield( __( 'Search glossary', 'urlslab' ) ); // @codingStandardsIgnoreLine ?>
				<ul class="Index__top">
					<?php foreach ( $index as $index_item ) { ?>
						<li class="Index__top--item" style="display: inline-block"><a href="#item-<?= esc_attr( $index_item ); ?>" title="<?= esc_attr( $index_item ); ?>"><?= esc_html( $index_item ); ?></a></li>
					<?php } ?>
				</ul>
		</div>
	</div>

	<div class="wrapper Index__list">
			<?php
			foreach ( $index as $index_item ) {
				?>
				<div id="item-<?= esc_attr( $index_item ); ?>"  class="Index__list--group flex-tablet" data-searchGroup>
					<h2 class="Index__list--groupTitle"><?= esc_html( $index_item ); ?></h2>
					<ul>
						<?php

						foreach ( $directoryposts as $directorypost ) {
							$postid          = $directorypost->ID;
							$posttitle       = $directorypost->post_title;
							$first_character = substr( $posttitle, 0, 1 );

							if ( $first_character === $index_item ) {
								?>
								<li class="Index__list--item" style="display: inline-block" itemscope="" itemtype="https://schema.org/DefinedTerm" data-search><a href="<?= esc_url( get_permalink( $postid ) ); ?>" itemprop="url"><span class="item-title" itemprop="name" ><?= esc_html( $posttitle ); ?></span></a></li>
								<?php
							}
						}
						?>
					</ul>
				</div>
			<?php } ?>
	</div>

	<?php
	if ( ! empty( $main_page ) ) {
		?>
		<div class="wrapper mt-xxl directory__how">
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
