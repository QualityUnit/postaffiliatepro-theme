<?php // @codingStandardsIgnoreLine
set_source( 'academy', 'pages/Category', 'css' );
set_source( 'academy', 'filter', 'js' );
?>
<div id="category" class="Category Academy">
	<div class="Box Category__header Category__header--academy">
		<div class="wrapper">
			<h1 class="Category__header__title"><?php _e( 'Affiliate Marketing Academy', 'ms' ); ?></h1>
			<p class="Category__header__subtitle"><?php _e( 'Become an affiliate marketing expert', 'ms' ); ?></p>
			<div class="Category__header__search searchField" data-searchfield>
				<img class="searchField__icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-search_new_v2.svg" alt="<?php _e( 'Search', 'ms' ); ?>" />
				<input type="search" class="search search--academy" placeholder="<?php _e( 'Search', 'ms' ); ?>" maxlength="20">
			</div>
		</div>
	</div>

	<div class="wrapper Category__container">
		<div class="Category__sidebar" id="notFloating">
			<input class="Category__sidebar__showfilter" type="checkbox" id="showfilter">
			<label class="Button Button--outline Category__sidebar__showfilter--label" for="showfilter" data-hidden="<?php _e( 'Hide filters', 'ms' ); ?>">
				<img class="Category__sidebar__showfilter--icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-filter.svg" alt="<?php _e( 'Filters', 'ms' ); ?>">
				<span><?php _e( 'Filters', 'ms' ); ?></span>
			</label>

			<div class="Category__sidebar__items" id="filter">
				<div class="Category__sidebar__item Category__sidebar__item--uniq">
					<div class="Category__sidebar__item__title h4"><?php _e( 'Category', 'ms' ); ?></div>

					<label>
						<input class="filter-item" data-filteritem type="radio" value="" name="category" checked />
						<span onclick="_paq.push(['trackEvent', 'Activity', 'Academy', 'Filter - Category - Any'])"><?php _e( 'Any', 'ms' ); ?></span>
					</label>
					<?php
					$categories = array_unique( get_categories( array( 'taxonomy' => 'ms_academy_categories' ) ), SORT_REGULAR );
					foreach ( $categories as $category ) {
						?>
						<label>
							<input class="filter-item" data-filteritem type="radio" value="<?php echo esc_attr( $category->slug ); ?>" name="category"
									<?php
									if ( current( $category ) === $category->slug ) {
										echo 'checked';
									}
									?>
							>
							<span onclick="_paq.push(['trackEvent', 'Activity', 'Academy', 'Filter - Category - <?= esc_html( $category->name ); ?>'])"><?= esc_html( $category->name ); ?></span>
						</label>
					<?php } ?>
				</div>

			</div>

		</div>

		<div class="Category__content">
			<div class="Category__content__description"><?php _e( 'List of articles', 'ms' ); ?> <span id="filter-show">(<span id="countPosts"><?php echo esc_html( wp_count_posts( 'ms_academy' )->publish ); ?></span>)</span></div>
			<ul class="Category__content__items list" data-list>
				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<?php
					$postname     = str_replace( '^', '', get_the_title() );
					$post_content = get_the_content();
					$headers      = wp_kses(
						$post_content,
						array(
							'h2' => array(),
						)
					);
					$h2_pattern   = '/\<h2\>(.*)\<\/h2\>/i';

					//Variable to hold results
					$header_matches = array();

					//Search content for pattern to get headers
					preg_match_all( $h2_pattern, $headers, $header_matches );

					// Calculating reading time of the post
					$read_time = ceil( strlen( wp_strip_all_tags( $post_content ) ) * 0.035 / 60 ); // About 0,035 seconds per char;

					// Checking for video in the post
					$has_video = preg_match( '/(youtube\.com|youtu\.be|\.mp4|\.mpeg4)/i', htmlspecialchars( get_the_content() ) );

					$category = '';

					$categories = get_the_terms( 0, 'ms_academy_categories' );

					$current_lang = apply_filters( 'wpml_current_language', null );
					do_action( 'wpml_switch_language', 'en' );
					$categories_en = get_the_terms( 0, 'ms_academy_categories' );
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
					<li class="Category__item Category__item--blogLike <?= esc_attr( $category ); ?> <?= esc_attr( $category_en ); ?>" data-listitem data-category="<?= esc_attr( $category ); ?>" data-href="<?php the_permalink(); ?>" onclick="_paq.push(['trackEvent', 'Activity', 'Academy', 'Go to <?= esc_html( $postname ); ?> article'])">
						<a href="<?php the_permalink(); ?>" class="Category__item--blogLike__thumbnail">
						<span class="postLabel postLabel__time">
							<svg viewBox="0 0 16 26"><path d="M7.779 3.052C9.978 1.018 12.897 0 15.892 0v26c-2.995 0-5.914-1.018-8.113-3.052C4.547 19.96.233 15.502.233 13c0-2.502 4.314-6.96 7.546-9.948Z"/></svg>
							<?= esc_html( $read_time . ' ' . strtolower( __( 'm reading', 'Academy' ) ) ); ?>
						</span>
							<?php if ( $has_video ) { ?>
								<span class="postLabel postLabel__video">
							<svg viewBox="0 0 16 26"><path d="M7.779 3.052C9.978 1.018 12.897 0 15.892 0v26c-2.995 0-5.914-1.018-8.113-3.052C4.547 19.96.233 15.502.233 13c0-2.502 4.314-6.96 7.546-9.948Z"/></svg>
								<?= esc_html( __( 'video', 'ms' ) ); ?>
						</span>
								<?php
							}
							if ( has_post_thumbnail() ) {
								the_post_thumbnail();
							}
							if ( ! has_post_thumbnail() ) {
								?>
								<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/category_item_image.jpg" alt="<?php the_title(); ?>" />
							<?php } ?>
						</a>
						<div class="Category__item--blogLike__content">
							<div class="CategoryTags flex <?= esc_attr( $longcategories ); ?>">
								<?php
								$categories = get_the_terms( 0, 'ms_academy_categories' );
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
							<h3 class="Category__item__title" data-listitem-title><a href="<?php the_permalink(); ?>"><?= esc_html( $postname ); ?></a></h3>
							<a href="<?php the_permalink(); ?>" class="Category__item__excerpt" data-listitem-excerpt>
								<p>
									<?php if ( count( $header_matches ) > 1 ) { ?>
									<strong>In this course you will learn:</strong>
								<ul class="checklist">
									<li><?= esc_html( $header_matches[1][0] ); ?></li>
									<li><?= esc_html( $header_matches[1][1] ); ?></li>
								</ul>
										<?php
									}
									if ( count( $header_matches ) < 1 ) {
										esc_html( wp_trim_words( get_the_excerpt(), 12 ) );
									}
									?>
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
