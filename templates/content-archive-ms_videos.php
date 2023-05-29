<?php // @codingStandardsIgnoreLine
set_source( 'videos', 'pages/Category', 'css' );
set_source( 'videos', 'pages/CategoryImages', 'css' );
set_source( 'videos', 'filter', 'js' );
?>

<div id="category" class="Category">
	<div class="Box Category__header Category__header--features">
		<div class="wrapper">
			<div class="Category__header--center">
				<?php if ( is_tax( 'ms_videos_categories' ) ) { ?>
					<h1 class="Category__header__title"><?php single_cat_title(); ?></h1>
					<div class="Category__header__subtitle"><p><?php the_archive_description(); ?></p></div>
				<?php } else { ?>
					<h1 class="Category__header__title"><?php _e( 'Videos', 'ms' ); ?></h1>
				<?php } ?>

				<div class="Category__header__search searchField" data-searchfield>
					<img class="searchField__icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-search_new_v2.svg" alt="<?php _e( 'Search', 'ms' ); ?>" />
					<input type="search" class="search search--academy" placeholder="<?php _e( 'Search', 'ms' ); ?>" maxlength="50">
				</div>
			</div>
		</div>
	</div>

	<div class="wrapper Category__container">
		<div class="Category__sidebar urlslab-skip-keywords">
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
						<span><?php _e( 'Any', 'ms' ); ?></span>
					</label>
					<?php
					$categories = array_unique( get_categories( array( 'taxonomy' => 'ms_videos_categories' ) ), SORT_REGULAR );
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
							<span><?= esc_html( $category->name ); ?></span>
						</label>
					<?php } ?>
				</div>
			</div>

		</div>

		<div class="Category__content">
			<div class="Category__content__description"><?php _e( 'List of videos', 'ms' ); ?> <span id="filter-show">(<span id="countPosts"><?php echo esc_html( wp_count_posts( 'ms_videos' )->publish ); ?></span>)</span></div>
			<ul class="Category__content__items list" data-list>
				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<?php
					$category    = '';

					$categories   = get_the_terms( 0, 'ms_videos_categories' );
					$current_lang = apply_filters( 'wpml_current_language', null );
					do_action( 'wpml_switch_language', 'en' );
					$categories_en = get_the_terms( 0, 'ms_videos_categories' );
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

					?>

					<li class="Box--main Category__item Category__item--videos <?= esc_attr( $category ); ?>" data-listitem data-category="<?= esc_attr( $category ); ?>" data-href="<?php the_permalink(); ?>">
						<a href="<?php the_permalink(); ?>" class="Box--main__image Category__item__thumbnail" title="<?php the_title(); ?>">
							<img src="https://i.ytimg.com/vi/<?php echo esc_attr( get_post_meta( get_the_ID(), 'mb_videos_mb_videos_video_id', true ) ); ?>/hqdefault.jpg" alt="<?php _e( 'Videos', 'ms' ); ?>">
						</a>
						<h3 class="Box--main__title Category__item__title item-title"  data-listitem-title><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
						<div class="Box--main__excerpt Category__item__excerpt item-excerpt"  data-listitem-excerpt>
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
								<?= esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?>
							</a>
						</div>
					</li>

					<?php
					$category    = '';
					?>

				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>
