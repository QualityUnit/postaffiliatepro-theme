<?php // @codingStandardsIgnoreLine
set_custom_source( 'components/Filter', 'css' );
set_custom_source( 'components/FormPopup', 'css' );
set_custom_source( 'filter', 'js' );
set_custom_source( 'filterMenu', 'js' );

$categories = get_categories( array( 'taxonomy' => 'ms_directory_categories' ) );
?>

<div id="archive" class="Archive" itemscope itemtype="https://schema.org/DefinedTermSet">
	<div class="wrapper Archive__header Archive__header--directory">
		<?php if ( is_tax( 'ms_directory_categories' ) ) { ?>
			<h1 class="Archive__header__title--directory" itemprop="name"><?php single_cat_title(); ?></h1>
			<div class="Archive__header__subtitle--directory"><p itemprop="description"><?php the_archive_description(); ?></p></div>
		<?php } else { ?>
		<h1 class="Archive__header__title--directory" itemprop="name"><?php _e( 'Affiliate Program', 'ms' ); ?> <span class=" highlight highlight-splash2"><?php _e( 'Directory', 'ms' ); ?></span></h1>
		<p class="Archive__header__subtitle--directory" itemprop="description"><?php _e( 'A directory of companies and affiliate programs', 'ms' ); ?></p>
			<?php } ?>

		<button class="Button Button--full mb-xxxl" type="button" data-target="joinAffDirectory"><span data-target="joinAffDirectory"><?php _e( 'I want to be in the list', 'ms' ); ?></span></button>

		<div data-stickyFrom>
			<div class="Filter">
				<div class="Filter__wrapper">
					<div class="searchField" data-searchfield>
						<img class="searchField__icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-search_new_v2.svg" alt="<?php _e( 'Search', 'ms' ); ?>" />
						<input type="search" class="search" placeholder="<?php _e( 'Search affiliate program', 'ms' ); ?>" maxlength="50">
					</div>

					<?php
					if ( isset( $categories ) && count( $categories ) > 0 ) {
						?>

					<div class="FilterMenu">
						<div class="FilterMenu__title flex flex-align-center">
						<?php _e( 'Category', 'ms' ); ?>
						</div>
						<div class="FilterMenu__items">
							<div class="FilterMenu__items--inn">
								<div class="checkbox FilterMenu__item">
									<input class="filter-item checked" data-filteritem type="radio" id="cat-all" value="" name="category" checked />
									<label for="cat-all">
										<span><?php _e( 'Any', 'ms' ); ?></span>
									</label>
								</div>
								<?php
								foreach ( $categories as $category ) {
									?>

										<div class="checkbox FilterMenu__item">
											<input class="filter-item" data-filteritem type="radio" id="<?php echo esc_attr( $category->slug ); ?>" value="<?php echo esc_attr( $category->slug ); ?>" name="category" />

											<label for="<?php echo esc_attr( $category->slug ); ?>" >
												<span><?= esc_html( $category->name ); ?></span>
											</label>
										</div>
									<?php } ?>
							</div>
						</div>
					</div>

						<?php
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper Archive__directory">
		<ul class="Archive__directory--container" data-list>
			<?php
			foreach ( $categories as $category ) {
				$query_glossary_posts = new WP_Query(
					array(
						'ms_directory_categories' => $category->slug,
						'orderby'                 => 'title',
						'order'                   => 'ASC',
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
					$screenshot       = do_shortcode( "[urlslab-screenshot screenshot-type='carousel-thumbnail' alt='" . esc_attr( get_post_meta( get_the_ID(), 'company_name', true ) ) . " Homepage' default-image='' url='" . esc_url( get_post_meta( get_the_ID(), 'company_url', true ) ) . "' ]" );
					?>
					<li class="Archive__directory--item" data-listitem data-category="<?= esc_attr( $category->slug ); ?>" itemscope itemtype="https://schema.org/DefinedTerm">
						<a class="Archive__directory--item__url" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( $post_title ); ?> <?php _e( 'customer support contacts', 'ms' ); ?>" itemprop="url">
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
								<h5 class="Archive__directory--item__title" data-listitem-title itemprop="name"><?= esc_html( $post_title ); ?></h5>
								<div class="Archive__directory--item__description" data-listitem-excerpt><?= esc_html( substr( $post_description, 0, 64 ) . '…' ); ?></div>
						</a>
					</li>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
			<?php } ?>
		</ul>
		<div class="Archive__directory--sidebar">
			<div class="Archive__directory--sidebar__container">
				<h3 class="Archive__directory--sidebar__title"><?php _e( 'Would you like to be ', 'ms' ); ?><span class="highlight highlight-splash"><?php _e( 'included?', 'ms' ); ?></span></h3>
				<p class="Archive__directory--sidebar__text"><?php _e( 'Contact us and we’ll add your company and affiliate program to our comprehensive directory.', 'ms' ); ?></p>
				<button data-target="joinAffDirectory" class="Button Button--full"><?php _e( 'Join to the list', 'ms' ); ?></button>
			</div>
			<div class="Archive__directory--sidebar__categories" data-stickyFrom="190">
				<div class="Archive__directory--sidebar__categories--inn">
					<h5><?php _e( 'Affiliate program categories', 'ms' ); ?></h5>
					<ul class="Archive__directory--sidebar__menu">
						<li class="Archive__directory--sidebar__menuItem">
							<label>
								<input class="filter-item checked" data-filteritem type="radio" id="cat-all" value="" name="category" checked />
								<span class="Archive__directory--sidebar__label"><?php _e( 'Any', 'ms' ); ?></span>
							</label>
						<?php foreach ( $categories as $category ) { ?>
							<li class="Archive__directory--sidebar__menuItem">
								<label>
									<input class="filter-item" data-filteritem type="radio" value="<?= esc_attr( $category->slug ); ?>" name="category">
									<span class="Archive__directory--sidebar__label">
										<?= esc_html( $category->name ); ?>
										<span class="Archive__directory--sidebar__count"> (<?= esc_html( $category->count ); ?>)</span>
									</span>
								</label>
							</li>
						<?php } ?>
					</ul>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="lightbox lightbox__wrapper lightbox__wrapper--light hidden FormPopup" data-targetId="joinAffDirectory">
	<div class="Form Box--shadow">
		<button class="Form__close" data-close="joinAffDirectory" type="button">
			<img class="Form__close--image" src="<?= esc_url( get_template_directory_uri() . '/assets/images/icon-close.svg' ); ?>" alt="close" />
		</button>
		<div class="Form__title h2">
			<span class="highlight highlight-splash3"><?php _e( 'Join to this list', 'ms' ); ?></span>
		</div>
		<p class="Form__subtitle"><?php _e( 'We have to ask you some questions before we can add you to our affiliate directory. Leave us your details, and we’ll contact you as soon as possible.', 'ms' ); ?></p>

		<script type="text/javascript"> (function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document, 'https://support.qualityunit.com/scripts/track.js', function(e){ LiveAgent.createForm('iem5p5kz', e); }); </script>
	</div>
</div>
