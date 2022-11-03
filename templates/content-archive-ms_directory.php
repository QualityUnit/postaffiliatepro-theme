<?php // @codingStandardsIgnoreLine

set_custom_source( 'dropdown', 'js' );
set_custom_source( 'filter', 'js' );
set_custom_source( 'modal', 'js' );
set_custom_source( 'components/Modal', 'css' );

?>

<div id="archive" class="Archive" itemscope itemtype="https://schema.org/DefinedTermSet">
	<div class="modal" id="modal">
		<h3 class="modal--heading highlight highlight-splash2"><?php _e( 'Join to this list', 'ms' ); ?></h3>
		<img class="modal--close" data-modal-close="#modal" src="<?= esc_url( get_template_directory_uri() . '/assets/images/icon-close.svg' ); ?>" alt="close" />
		<p class="modal--text"><?php _e( 'We have to ask you some questions before we can add you to our affiliate directory. Leave us your details, and we’ll contact you as soon as possible.', 'ms' ); ?></p>
		<script type="text/javascript"> (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document, 'https://support.qualityunit.com/scripts/track.js', function(e){ LiveAgent.createForm('iem5p5kz', e); }); </script>
	</div>
	<?php $categories = get_categories( array( 'taxonomy' => 'ms_directory_categories' ) ); ?>
	<div class="wrapper Archive__header Archive__header--directory">
		<?php if ( is_tax( 'ms_directory_categories' ) ) { ?>
			<h1 class="Archive__header__title--directory" itemprop="name"><?php single_cat_title(); ?></h1>
			<div class="Archive__header__subtitle--directory"><p itemprop="description"><?php the_archive_description(); ?></p></div>
		<?php } else { ?>
		<h1 class="Archive__header__title--directory" itemprop="name"><?php _e( 'Affiliate Program', 'ms' ); ?> <span class=" highlight highlight-splash2"><?php _e( 'Directory', 'ms' ); ?></span></h1>
		<p class="Archive__header__subtitle--directory" itemprop="description"><?php _e( 'A directory of companies and affiliate programs', 'ms' ); ?></p>
			<?php } ?>
		<a data-modal-open="#modal" class="Archive__header__button Button Button--full">
			<?php _e( 'I want to be in list', 'ms' ); ?>
		</a>
		<div class="Archive__header__filter">
			<div class="searchField" data-searchfield>
				<img class="searchField__icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-search_new_v2.svg" alt="<?php _e( 'Search', 'ms' ); ?>" />
				<input type="search" class="search" placeholder="<?php _e( 'Search affiliate program', 'ms' ); ?>" maxlength="20">
			</div>
			<div class="Archive__header__dropdown">
				<button class="dropdown">
					<span class="selected"><?php _e( 'Category', 'ms' ); ?></span>
					<img class="dropdown-arrow" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-arrow.svg" alt="<?php _e( 'dropdown arrow', 'ms' ); ?>">
				</button>
				<div class="Archive__header__dropdown--menu">
					<label class="Archive__header__dropdown--menu--item">
						<input data-filteritem type="radio" value name="category" checked>
						<span><?= esc_html( 'Any', 'ms' ); ?></span>
					</label>
					<?php foreach ( $categories as $category ) { ?>
						<label class="Archive__header__dropdown--menu--item">
							<input data-filteritem type="radio" value="<?= esc_attr( $category->slug ); ?>" name="category">
							<span><?= esc_html( $category->slug ); ?></span>
						</label>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper Archive__directory">
		<ul class="Archive__directory__container" data-list>
			<?php
			foreach ( $categories as $category ) {
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
					$screenshot = do_shortcode( "[urlslab-screenshot alt='" . esc_attr( get_post_meta( get_the_ID(), 'company_name', true ) ) . " Homepage' default-image='' url='" . esc_url( get_post_meta( get_the_ID(), 'company_url', true ) ) . "' ]" );
					?>
					<li class="Archive__directory__container__item" data-listitem data-category="<?= esc_attr( $category->slug ); ?>" itemscope itemtype="https://schema.org/DefinedTerm">
					<?php
					if ( preg_match( '/\<img/', $screenshot ) ) {
						echo $screenshot; // @codingStandardsIgnoreLine
					} 
					if ( ! preg_match( '/\<img/', $screenshot ) ) {
						?>
						<div class="urlslab-screenshot-container">
							<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/domain_placeholder.svg" alt="<?php _e( 'domain screenshot', 'ms' ); ?>">
						</div>
						<?php
					}
					?>
						<h5 class="Archive__directory__container__item--title" data-listitem-title itemprop="name"><?= esc_html( $post_title ); ?></h5>
						<div class="Archive__directory__container__item--description" data-listitem-excerpt><?= esc_html( substr( $post_description, 0, 64 ) . '…' ); ?></div>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php } ?>
		</ul>
		<div class="Archive__directory__sidebar">
			<div class="Archive__directory__sidebar__container">
				<h3 class="Archive__directory__sidebar__container--title"><?php _e( 'Would you like to be ', 'ms' ); ?><span class="highlight highlight-splash"><?php _e( 'included?', 'ms' ); ?></span></h3>
				<p class="Archive__directory__sidebar__container--text"><?php _e( 'Contact us and we’ll add your company and affiliate program to our comprehensive directory.', 'ms' ); ?></p>
				<button data-modal-open="#modal" class="Button Button--full"><?php _e( 'Join to the list', 'ms' ); ?></button>
			</div>
			<div class="Archive__directory__sidebar__categories">
				<h5><?php _e( 'Affiliate program categories', 'ms' ); ?></h5>
				<div class="Archive__directory__sidebar__categories--menu">
					<?php foreach ( $categories as $category ) { ?>
						<label>
							<input class="filter-item" data-filteritem type="radio" value="<?= esc_attr( $category->slug ); ?>" name="category">
							<span data-sidebarfilteritem><?= esc_html( $category->name ); ?></span>
							<span class="Archive__directory__sidebar__categories--count"> (<?= esc_html( $category->count ); ?>)</span>
						</label>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</div>
<div id="overlay"></div>
