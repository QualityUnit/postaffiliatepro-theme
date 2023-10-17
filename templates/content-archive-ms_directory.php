<?php // @codingStandardsIgnoreLine
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

$glossaryposts = get_posts(
	array(
		'post_type'   => 'ms_directory',
		'post_status' => 'publish',
		'numberposts' => -1,
		'order'       => 'ASC',
		'orderby'     => 'title',
	)
);

$index = array();
foreach ( $glossaryposts as $glossarypost ) {
	$posttitle = $glossarypost->post_title;
	$first_character = substr( $posttitle, 0, 1 );

	if ( ( ctype_upper( $first_character ) || ctype_digit( $first_character ) ) && ! in_array( $first_character, $index ) ) {
		$index[] = $first_character;
	}
}


?>
<div id="archive" class="Archive" itemscope itemtype="https://schema.org/DefinedTermSet">
	<?php get_template_part( 'lib/custom-blocks/compact-header', null, $page_header_args ); ?>
	<div class="Archive__filter">
		<div class="wrapper">
			<div class="Archive__filter__item">
				<ul>
					<?php foreach ( $index as $index_item ) { ?>
						<li class="Index__top--item"><a href="#item-<?= esc_attr( $index_item ); ?>" title="<?= esc_attr( $index_item ); ?>"><?= esc_html( $index_item ); ?></a></li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>

	<div class="wrapper Archive__container Archive__container--glossary">
		<div class="Archive__container__content list">
			<?php
			foreach ( $index as $index_item ) {
				?>
				<div id="item-<?= esc_attr( $index_item ); ?>" class="Archive__container__content__item">
					<h2 class="Archive__container__content__item__title"><?= esc_html( $index_item ); ?></h2>
					<div class="Archive__container__content__item__content">
						<ul>
							<?php

							foreach ( $glossaryposts as $glossarypost ) {
								$postid          = $glossarypost->ID;
								$posttitle       = $glossarypost->post_title;
								$first_character = substr( $posttitle, 0, 1 );

								if ( $first_character === $index_item ) {
									?>
									<li itemscope="" itemtype="https://schema.org/DefinedTerm"><a href="<?= esc_url( get_permalink( $postid ) ); ?>" itemprop="url"><span itemprop="name" data-search><?= esc_html( $posttitle ); ?></span></a></li>
									<?php
								}
							}
							?>
						</ul>
					</div>
				</div>
			<?php } ?>

		</div>
	</div>
</div>
