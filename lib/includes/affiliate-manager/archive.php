<?php // @codingStandardsIgnoreLine
set_custom_source( 'components/Filter', 'css' );
set_custom_source( 'components/FormPopup', 'css' );
set_custom_source( 'pages/AffiliateManager', 'css' );
set_custom_source( 'filter', 'js' );

$managers         = get_categories( array( 'taxonomy' => 'ms_directory_affiliate_manager' ) );
$managers_indexed = array();
foreach ( $managers as $manager ) {
	$managers_indexed[ $manager->name[0] ][] = (object) array(
		'id'   => $manager->term_id,
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

<div class="AffiliateManagerDirectory" itemscope itemtype="https://schema.org/DefinedTermSet">
	<div class="AffiliateManagerDirectory__header">
		<div class="wrapper">
			<?php if ( is_tax( 'ms_directory_affiliate_manager' ) ) { ?>
				<h1 class="AffiliateManagerDirectory__header--title" itemprop="name"><?= $maintitle; // @codingStandardsIgnoreLine ?></h1>
				<h3 class="AffiliateManagerDirectory__header--subtitle" itemprop="description"><?= esc_html( wp_strip_all_tags( get_the_archive_description() ) ); ?></h3>
			<?php } else { ?>
				<h1 class="AffiliateManagerDirectory__header--title" itemprop="name"><?php _e( 'Affiliate Manager <span class="highlight highlight-splash3">Directory</span>', 'ms' ); ?></h1>
				<h3 class="AffiliateManagerDirectory__header--subtitle" itemprop="description" ><?php _e( 'A comprehensive directory of affiliate manager contacts', 'ms' ); ?></h3>
			<?php } ?>

			<button class="Button Button--full" type="button" data-target="joinAffDirManagers"><span data-target="joinAffDirManagers"><?php _e( 'I want to be in this list', 'ms' ); ?></span></button>

			<div class="Filter">
				<div class="Filter__wrapper">
					<div class="searchField" data-searchfield>
						<img class="searchField__icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-search_new_v2.svg" alt="<?php _e( 'Search', 'ms' ); ?>" />
						<input type="search" class="search" placeholder="<?php _e( 'Search affiliate manager', 'ms' ); ?>" maxlength="50">
					</div>
	
					<ul class="IndexMenu ml-m-tablet">
						<?php
						foreach ( $managers_indexed as $index_letter => $aff_managers ) {
							?>
							<li class="IndexMenu__item"><a class="IndexMenu__item--link" href="#<?= esc_html( $index_letter ); ?>"><?= esc_html( $index_letter ); ?></a></li>
							<?php 
						}
						?>
					</ul>
				</div>
			</div>
		</div>
	</div>

	<div class="wrapper" data-list>
		<?php foreach ( $managers_indexed as $index => $aff_managers ) { ?>
			<div id="<?= esc_attr( $index ); ?>" class="mt-xxxl" data-sublist>
				<div class="highlight h2" data-sublist-title><?= esc_html( $index ); ?></div>
				<ul class="grid grid-col-3 grid-gap-m">
					<?php
					foreach ( $aff_managers as $aff_manager ) {
						$aff_image = wp_get_attachment_image( get_term_meta( $aff_manager->id, 'picture', true ), 'person_thumbnail', false, array( 'class' => 'AffiliateManager__image' ) );

						if ( ! isset( $aff_image ) || '' === $aff_image ) {
							$aff_image = get_avatar( get_term_meta( $aff_manager->id, 'email', true ), $size = '145', 'mystery', $aff_manager->name, array( 'class' => 'AffiliateManager__image' ) );
						}
						?>
						<li class="AffiliateManagerDirectory__manager--wrapper" data-listitem itemscope itemtype="https://schema.org/DefinedTerm">
							<a class="AffiliateManagerDirectory__manager" href="../<?= esc_attr( $aff_manager->slug ); ?>" title="<?= esc_attr( $aff_manager->name ); ?>" itemprop="url" data-listitem-title>
							<div class="AffiliateManagerDirectory__manager--image">
								<?= $aff_image // @codingStandardsIgnoreLine ?>
							</div>
							<span itemprop="name"><?= esc_html( wp_trim_words( $aff_manager->name, 3, '...' ) ); ?></span>
							</a>
						</li>
						<?php
					}
					?>
				</ul>
			</div>
		<?php } ?>
	</div>
</div>

<div class="lightbox lightbox__wrapper lightbox__wrapper--light hidden FormPopup" data-targetId="joinAffDirManagers">
	<div class="Form Box--shadow">
		<button class="Form__close" data-close="joinAffDirManagers" type="button">
			<img class="Form__close--image" src="<?= esc_url( get_template_directory_uri() . '/assets/images/icon-close.svg' ); ?>" alt="close" />
		</button>
		<div class="Form__title h2">
			<span class="highlight highlight-splash3"><?php _e( 'Join to this list', 'ms' ); ?></span>
		</div>
		<p class="Form__subtitle"><?php _e( 'We have to ask you some questions before we can add you to our affiliate directory. Leave us your details, and we’ll contact you as soon as possible.', 'ms' ); ?></p>

		<script type="text/javascript"> (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document, 'https://support.qualityunit.com/scripts/track.js', function(e){ LiveAgent.createForm('85yawl7m', e); }); </script>
	</div>
</div>
