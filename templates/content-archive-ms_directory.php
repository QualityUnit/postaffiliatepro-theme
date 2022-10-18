<?php // @codingStandardsIgnoreLine

set_custom_source( 'dropdown', 'js' );
set_custom_source( 'filter', 'js' );
set_custom_source( 'modal', 'js' );
set_custom_source( 'components/Modal', 'css' );

?>

<div id="archive" class="Archive" itemscope itemtype="https://schema.org/DefinedTermSet">
	<div class="modal" id="modal">
	</div>
	<?php $categories = get_categories( array( 'taxonomy' => 'ms_directory_categories' ) ); ?>
	<div class="wrapper Archive__header Archive__header--directory">
		<?php if ( is_tax( 'ms_directory_categories' ) ) { ?>
			<h1 class="Archive__header__title--directory" itemprop="name"><?php single_cat_title(); ?></h1>
			<div class="Archive__header__subtitle--directory"><p itemprop="description"><?php the_archive_description(); ?></p></div>
		<?php } else { ?>
		<h1 class="Archive__header__title--directory" itemprop="name"><?php _e( 'Affiliate Program', 'ms' ); ?> <span class=" highlight highlight-splash2"><?php _e( 'Directory', 'ms' );?></span></h1>
		<p class="Archive__header__subtitle--directory" itemprop="description"><?php _e( "A directory of companies and affiliate programs", 'ms' ); ?></p>
			<?php } ?>
		<a data-modal-open="#modal" class="Archive__header__button Button Button--full">
			<?php _e( 'I want to be in list', 'ms' ); ?>
		</a>
		<div class="Archive__header__filter">
			<div class="searchField">
				<img class="searchField__icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-search_new_v2.svg" alt="<?php _e( 'Search', 'ms' ); ?>" />
				<input type="search" class="search" placeholder="<?php _e( 'Search affiliate program', 'ms' ); ?>" maxlength="20">
			</div>
			<div class="Archive__header__dropdown">
				<button class="dropdown">
					<span class="selected"><?php _e( 'Category', 'ms' ); ?></span>
					<img class="dropdown-arrow" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-arrow.svg" alt="<?php _e( 'dropdown arrow', 'ms' ); ?>">
				</button>
				<ul class="Archive__header__dropdown--menu">
					<li class="Archive__header__dropdown--menu--item">
						<input type="radio" checked>
						<span><?= esc_html( 'Category', 'ms' ); ?></span>
					</li>
					<?php foreach ( $categories as $category ) { ?>
						<li class="Archive__header__dropdown--menu--item">
							<input type="radio">
							<span><?= esc_html( $category->slug ); ?></span>
						</li>
					<?php } ?>
				</ul>
			</div>
		</div>
	</div>
	<div class="wrapper Archive__directory">
		<ul class="Archive__directory__container">
			<?php foreach ( $categories as $category ) {
				$query_glossary_posts = new WP_Query(
					array(
						'ms_directory_categories' => $category->slug,
						'posts_per_page' => 500,
						'orderby'        => 'title',
						'order'          => 'ASC',
					)
				);
				while ( $query_glossary_posts->have_posts() ) :
					$query_glossary_posts->the_post();
					?>
					<?php
					if ( get_post_meta( get_the_ID(), 'mb_directory_mb_directory_company-name', true ) ) {
						$post_title = get_post_meta( get_the_ID(), 'mb_directory_mb_directory_company-name', true );
					} else {
						$post_title = get_the_title();
					}
					$post_description = get_post_meta( get_the_ID(), 'company_description', true );
					?>
					<li class="Archive__directory__container__item" itemscope itemtype="https://schema.org/DefinedTerm">
						<img class="Archive__directory__container__item--screenshot domain-placeholder" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/domain_placeholder.svg" alt="<?php _e( 'domain screenshot', 'ms' ); ?>">
						<h5 class="Archive__directory__container__item--title" itemprop="name"><?php echo esc_html( $post_title ); ?></h5>
						<span class="Archive__directory__container__item--description"><?php echo esc_html( $post_description ); ?></span>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php } ?>
		</ul>
		<div class="Archive__directory__sidebar">
			<div class="Archive__directory__sidebar__container">
				<h3 class="Archive__directory__sidebar__container--title"><?php _e( "Would you like to be ", 'ms' ); ?><span class="highlight highlight-splash"><?php _e( "included?", 'ms' ); ?></span></h3>
				<p class="Archive__directory__sidebar__container--text"><?php _e( "Contact us and we’ll add your company and affiliate program to our comprehensive directory.", 'ms' ); ?></p>
				<button data-modal-open="#modal" class="Button Button--full"><?php _e( "Join to the list", 'ms' ); ?></button>
			</div>
			<div class="Archive__directory__sidebar__categories">
				<h5><?php _e( "Affiliate program categories", 'ms' ); ?></h5>
				<?php foreach ( $categories as $category ) { ?>
					<span><?= esc_html( $category->name ); ?></span>
			<?php } ?>
			</div>
		</div>
	</div>
</div>
<div id="overlay"></div>