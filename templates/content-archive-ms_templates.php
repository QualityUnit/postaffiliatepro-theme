<?php // @codingStandardsIgnoreLine
set_source( 'templates', 'pages/Category', 'css' );
set_source( 'templates', 'filter', 'js' );
?>

<div id="category" class="Category Templates">
	<div class="Box Category__header Category__header--templates">
		<div class="wrapper">
			<div class="Category__header--center">
				<h1 class="Category__header__title"><?php _e( 'Affiliate Marketing Email Templates', 'ms' ); ?></h1>
				<p class="Category__header__subtitle"><?php _e( 'Find the right email template for any occasion', 'ms' ); ?></p>
				<div class="Category__header__search searchField" data-searchfield>
					<img class="searchField__icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-search_new_v2.svg" alt="<?php _e( 'Search', 'ms' ); ?>" />
					<input type="search" class="search search--templates" placeholder="<?php _e( 'Search', 'ms' ); ?>" maxlength="20">
				</div>
			</div>
		</div>
	</div>

	<div class="wrapper Category__container">
		<div class="Category__sidebar urlslab-skip-keywords" id="notFloating">
			<input class="Category__sidebar__showfilter" type="checkbox" id="showfilter">
			<label class="Button Button--outline Category__sidebar__showfilter--label" for="showfilter" data-hidden="<?php _e( 'Hide filters', 'ms' ); ?>">
				<img class="Category__sidebar__showfilter--icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-filter.svg" alt="<?php _e( 'Filters', 'ms' ); ?>">
				<span><?php _e( 'Filters', 'ms' ); ?></span>
			</label>

			<div class="Category__sidebar__items" id="filter">
				<div class="Category__sidebar__item">
					<div class="Category__sidebar__item__title h4"><?php _e( 'Category', 'ms' ); ?></div>
					<label>
						<input class="filter-item" data-filteritem type="radio" value="" name="category" checked />
						<span onclick="_paq.push(['trackEvent', 'Activity', 'Templates', 'Filter - Category - Any'])"><?php _e( 'Any', 'ms' ); ?></span>
					</label>
					<?php
					$categories = array_unique( get_categories( array( 'taxonomy' => 'ms_templates_categories' ) ), SORT_REGULAR );
					?>
					<?php
					foreach ( $categories as $category ) {
						if ( $category->slug !== 'all' && $category->slug !== 'drupal' && $category->slug !== 'joomla' && $category->slug !== 'WordPress' ) { // @codingStandardsIgnoreLine
							?>
							<label>
								<input class="filter-item" data-filteritem type="radio" value="<?php echo esc_attr( $category->slug ); ?>" name="category"
										<?php
										if ( current( $category ) === $category->slug ) {
											echo 'checked';
										}
										?>
								>
								<span onclick="_paq.push(['trackEvent', 'Activity', 'Templates', 'Filter - Category - <?php echo esc_html( $category->name ); ?>'])"><?php echo esc_html( ucfirst( $category->name ) ); ?></span>
							</label>
							<?php
						}
					}
					?>
				</div>
			</div>
		</div>

		<div class="Category__content">
			<div class="Category__content__description"><?php _e( 'List of templates', 'ms' ); ?> <span id="filter-show">(<span id="countPosts"><?php echo esc_html( wp_count_posts( 'ms_templates' )->publish ); ?></span>)</span></div>
			<ul class="Category__content__items list" data-list>
				<?php
				while ( have_posts() ) :
					the_post();

					$postname = str_replace( '^', '', get_the_title() );

					$category = '';

					$categories   = get_the_terms( 0, 'ms_templates_categories' );
					$current_lang = apply_filters( 'wpml_current_language', null );
					do_action( 'wpml_switch_language', 'en' );
					$categories_en = get_the_terms( 0, 'ms_templates_categories' );
					if ( ! empty( $categories_en ) ) {
						$category_en = array_shift( $categories_en )->slug;
					}
					do_action( 'wpml_switch_language', $current_lang );
					if ( ! empty( $categories ) ) {
						foreach ( $categories as $category_item ) {
							$category_item = array_shift( $categories );
							$category     .= $category_item->slug;
							$category     .= ' ';
						}
					}

					$category = substr( $category, 0, -1 );

					$longcategories = null;
					if ( strlen( $category ) > 20 ) {
						$longcategories = 'long';
					}
					?>

					<li class="Category__item Category__item--blogLike <?= esc_attr( $category ); ?> <?= esc_attr( $category_en ); ?>" data-category="<?= esc_attr( $category ); ?>" data-listitem data-href="<?php the_permalink(); ?>" onclick="_paq.push(['trackEvent', 'Activity', 'Templates', 'Go to <?= esc_html( $postname ); ?> article'])">
						<a href="<?php the_permalink(); ?>" class="Category__item--blogLike__thumbnail">
						<span class="postLabel">
							<svg viewBox="0 0 16 26"><path d="M7.779 3.052C9.978 1.018 12.897 0 15.892 0v26c-2.995 0-5.914-1.018-8.113-3.052C4.547 19.96.233 15.502.233 13c0-2.502 4.314-6.96 7.546-9.948Z"/></svg>
							<?= esc_html( strtolower( __( 'E-mail Templates', 'ms' ) ) ); ?>
						</span>
							<?php
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}
							if ( ! has_post_thumbnail() ) {
								?>
								<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/category_item_image.jpg" alt="<?php the_title(); ?>" />
							<?php } ?>
						</a>
						<div class="Category__item--blogLike__content">
							<div class="CategoryTags flex">
								<?php
								$categories = get_the_terms( 0, 'ms_templates_categories' );
								if ( ! empty( $categories ) ) {
									$counter = 0;
									foreach ( $categories as $c ) {
										++$counter;
										$category_id    = $c->term_id;
										$category_name  = $c->name;
										$category_color = get_term_meta( $category_id, 'category_color', true );
										?>
										<span class="CategoryTag <?= esc_attr( $category_color ); ?>"><?= esc_html( $category_name ); ?></span>
										<?php
										if ( 1 === $counter && isset( $longcategories ) ) {
											?>
											<span class="CategoryTags__more" data-text="<?php _e( 'Hide', 'ms' ); ?>">
											<?= esc_html( str_word_count( $category ) - 1 . ' ' . __( 'more', 'ms' ) ); ?>
									</span>
											<div class="CategoryTags__break"></div>
											<?php
										}
									}
								}
								?>
							</div>
							<h3 class="Category__item__title item-title" data-listitem-title><a href="<?php the_permalink(); ?>"><?= esc_html( $postname ); ?></a></h3>
							<a href="<?php the_permalink(); ?>" class="Category__item__excerpt item-excerpt" data-listitem-excerpt>
								<p>
									<?= esc_html( wp_trim_words( get_the_excerpt(), 12 ) ); ?>
									<span class="learn-more">
										<?php _e( 'Learn more', 'ms' ); ?>
										<svg width="15" height="13" xmlns="http://www.w3.org/2000/svg">
											<path d="M8.514 0 7.37 1.146l4.525 4.542H0v1.625h11.895L7.37 11.854 8.514 13 15 6.5 8.514 0Z" />
											</svg>
									</span>
								</p>
							</a>
						</div>
					</li>

					<?php
					$category = '';
					?>

				<?php endwhile; ?>
			</ul>
		</div>
	</div>

</div>
