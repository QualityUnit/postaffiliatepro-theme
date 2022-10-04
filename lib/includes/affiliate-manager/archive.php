<?php // @codingStandardsIgnoreLine
set_custom_source( 'pages/Archive', 'css' );

$managers         = get_categories( array( 'taxonomy' => 'ms_directory_affiliate_manager' ) );
$managers_indexed = array();
foreach ( $managers as $manager ) {
	$managers_indexed[ $manager->name[0] ][] = (object) array(
		'slug' => $manager->slug,
		'name' => $manager->name,
	);
}

$archive_id = get_queried_object_id();
if ( get_term_meta( $archive_id, 'aff_name', true ) ) {
	$maintitle = get_term_meta( $archive_id, 'aff_name', true );
}

$maintitle = preg_replace( '/\^(.+?)\^/', '<span class="highlight highlight-splash3">$1</span>', $maintitle );
?>

<div id="archive" class="Archive" itemscope itemtype="https://schema.org/DefinedTermSet">
	<div class="wrapper Archive__header Archive__header--glossary">
		<?php if ( is_tax( 'ms_directory_affiliate_manager' ) ) { ?>
			<h1 class="Archive__header__title" itemprop="name"><?= $maintitle; // @codingStandardsIgnoreLine ?></h1>
			<div class="Archive__header__subtitle"><p itemprop="description" ><?php the_archive_description(); ?></p></div>
		<?php } else { ?>
			<h1 class="Archive__header__title" itemprop="name"><?php _e( 'Affiliate Software Glossary', 'ms' ); ?></h1>
			<p class="Archive__header__subtitle" itemprop="description" ><?php _e( 'Understanding terminology can be difficult when getting started. We have put together this glossary list to help you with new words that might come while working with your affiliate software.', 'ms' ); ?></p>
		<?php } ?>
	</div>

	<div class="Box Box--gray Archive__filter">
		<div class="wrapper">
			<div class="Archive__filter__item">
				<ul>
					<?php
					foreach ( $managers_indexed as $index_letter => $aff_managers ) {
						?>
						<li><a href="#<?= esc_html( $index_letter ); ?>"><?= esc_html( $index_letter ); ?></a></li>
						<?php 
					}
					?>
				</ul>
			</div>
		</div>
	</div>

	<div class="wrapper Archive__container Archive__container--glossary">
		<div class="Archive__container__content list">
			<?php foreach ( $managers_indexed as $index => $aff_managers ) { ?>
				<div id="<?= esc_attr( $index ); ?>" class="Archive__container__content__item">
					<h2 class="Archive__container__content__item__title"><?= esc_html( $index ); ?></h2>
					<div class="Archive__container__content__item__content">
						<ul>
							<?php
							foreach ( $aff_managers as $aff_manager ) {
								?>
								<li itemscope itemtype="https://schema.org/DefinedTerm"><a href="../<?= esc_attr( $aff_manager->slug ); ?>" title="<?= esc_attr( $aff_manager->name ); ?>" itemprop="url"><span itemprop="name"><?= esc_html( $aff_manager->name ); ?></span></a></li>
								<?php
							}
							?>
						</ul>
					</div>
				</div>
			<?php } ?>
		</div>
	</div>
</div>
