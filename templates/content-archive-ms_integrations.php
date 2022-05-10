<?php // @codingStandardsIgnoreLine
set_source( 'integrations', 'pages/Category', 'css' );
set_source( 'integrations', 'filter', 'js' );
?>

<div id="category" class="Category">
	<div class="Box Category__header">
		<div class="wrapper">
			<?php if ( is_tax( 'ms_integrations_categories' ) ) { ?>
				<h1 class="Category__header__title"><?php single_cat_title(); ?></h1>
			<?php } else { ?>
				<h1 class="Category__header__title"><?php _e( 'Integrations', 'ms' ); ?></h1>
			<?php } ?>
			<div class="Category__sidebar__item--search searchField">
				<svg xmlns="http://www.w3.org/2000/svg" width="19" height="19"><path d="M13.594 11.962h-.856l-.304-.285A7.067 7.067 0 0 0 6.945 0 7.075 7.075 0 0 0 .001 6.927a7.067 7.067 0 0 0 1.88 4.94 7.078 7.078 0 0 0 9.794.567l.285.304v.856L17.383 19 19 17.387l-5.406-5.425zm-6.504 0a4.892 4.892 0 0 1-2.712-.82 4.885 4.885 0 0 1-1.797-2.189 4.869 4.869 0 0 1 1.057-5.314 4.882 4.882 0 0 1 7.508.739c.536.802.822 1.745.821 2.71a4.86 4.86 0 0 1-1.427 3.448 4.864 4.864 0 0 1-3.45 1.427z"/></svg>
				<input type="search" class="search search--integrations" placeholder="<?php _e( 'Search', 'ms' ); ?>" maxlength="20">
			</div>
		</div>
	</div>

	<div class="wrapper Category__container">
		<div class="Category__sidebar">

			<input class="Category__sidebar__showfilter" type="checkbox" id="showfilter">
			<label class="Button Button--outline Category__sidebar__showfilter--label" for="showfilter" data-hidden="<?php _e( 'Hide filters', 'ms' ); ?>">
				<img class="Category__sidebar__showfilter--icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-filter.svg" alt="<?php _e( 'Filters', 'ms' ); ?>">
				<span><?php _e( 'Filters', 'ms' ); ?></span>
			</label>

			<div class="Category__sidebar__items">
				<div class="Category__sidebar__item">
					<h4 class="Category__sidebar__item__title"><?php _e( 'Type', 'ms' ); ?></h4>

					<?php
					$data_type = array(
						''             => 'Any',
						'general'      => 'General',
						'opensource'   => 'Open-source',
						'subscription' => 'Subscription',
						'plugin'       => 'Plugin',
						'extension'    => 'Extension',
						'cms'          => 'CMS',
					);

					foreach ( $data_type as $key => $value ) {
						?>
						<label>
							<input class="filter-item" type="radio" value="<?php echo esc_attr( $key ); ?>" name="type"
									<?php
									if ( current( $data_type ) === $value ) {
										echo 'checked';
									}
									?>
							>
							<span onclick="_paq.push(['trackEvent', 'Activity', 'Integrations', 'Filter - Type - <?php echo esc_html( $value ); ?>'])"><?php echo esc_html( $value ); ?></span>
						</label>
					<?php } ?>
				</div>

				<div class="Category__sidebar__item">
					<h4 class="Category__sidebar__item__title"><?php _e( 'Category', 'ms' ); ?></h4>
					<?php
					$categories = array_unique( get_categories( array( 'taxonomy' => 'ms_integrations_categories' ) ), SORT_REGULAR );
					?>
					<label>
						<input class="filter-item" type="radio" value="" name="category" checked />
						<span onclick="_paq.push(['trackEvent', 'Activity', 'Integration Methods', 'Filter - Category - Any'])"><?php _e( 'Any', 'ms' ); ?></span>
					</label>
					<?php
					foreach ( $categories as $category ) {
						if ( $category->slug !== 'all' ) { // @codingStandardsIgnoreLine
							?>
							<label>
								<input class="filter-item" type="radio" value="<?php echo esc_attr( $category->slug ); ?>" name="category"
										<?php
										if ( current( $category ) === $category->slug ) {
											echo 'checked';
										}
										?>
								>
								<span onclick="_paq.push(['trackEvent', 'Activity', 'Integrations', 'Filter - Category - <?php echo esc_html( $category->name ); ?>'])"><?php echo esc_html( $category->name ); ?></span>
							</label>
							<?php
						}
					}
					?>
				</div>
			</div>

		</div>
		<div class="Category__content">
			<div class="Category__content__description"><?php _e( 'List of integrations', 'ms' ); ?> <div>(<span id="countPosts"><?php echo esc_html( wp_count_posts( 'ms_integrations' )->publish ); ?></span>)</div></div>
			<ul class="Category__content__items list">
				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<?php
					$collections = '';
					$data_type   = '';
					$category    = '';

					$data_types = get_the_terms( 0, 'ms_integrations_types' );
					if ( ! empty( $data_types ) ) {
						foreach ( $data_types as $data_type_item ) {
							$data_type_item = array_shift( $data_types );
							$data_type     .= $data_type_item->slug;
							$data_type     .= ' ';
						}
					}
					$data_type = substr( $data_type, 0, -1 );

					if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_collections', true ) ) {
						foreach ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_collections', true ) as $item ) {
							$collections .= $item . ' ';
						}

						$collections = substr( $collections, 0, -1 );
					}

					$categories   = get_the_terms( 0, 'ms_integrations_categories' );
					$current_lang = apply_filters( 'wpml_current_language', null );
					do_action( 'wpml_switch_language', 'en' );
					$categories_en = get_the_terms( 0, 'ms_integrations_categories' );
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

					<li class="Box--main Category__content__items__item
					<?php
					if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_pillar', true ) === 'on' ) {
						echo 'pillar'; }
					?>
					" data-collections="<?= esc_attr( $collections ); ?>" data-type="<?= esc_attr( $data_type ); ?>" data-category="<?= esc_attr( $category ); ?>" data-href="<?php the_permalink(); ?>" onclick="_paq.push(['trackEvent', 'Activity', 'Integrations', 'Go to <?php the_title(); ?> integration'])">
						<?php if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_pillar', true ) === 'on' ) { ?>
						<a href="<?php the_permalink(); ?>" class="Box--main__image Category__content__items__item__thumbnail">
							<span class="Category__content__items__item__thumbnail__image"></span>
							<?php } elseif ( has_post_thumbnail() ) { ?>
							<a href="<?php the_permalink(); ?>" class="Box--main__logo Category__content__items__item__thumbnail">
								<?php the_post_thumbnail( 'archive_thumbnail' ); ?>
								<?php } else { ?>
								<a href="<?php the_permalink(); ?>" class="Box--main__image Category__content__items__item__thumbnail">
									<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-custom-post_type.svg" alt="<?php _e( 'Integrations', 'ms' ); ?>">
									<?php } ?>
								</a>
								<?php
								if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_pillar', true ) === 'on' ) {
									?>
								<div class="Category__content__item__item__wrap">
									<?php
								}
								?>
									<h3 class="Box--main__title Category__content__items__item__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
									<div class="Box--main__excerpt Category__content__items__item__excerpt">
										<a href="<?php the_permalink(); ?>">
											<?= esc_html( wp_trim_words( get_the_excerpt(), 16 ) ); ?>
											<?php if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_pillar', true ) === 'on' ) { ?>
												<span><?php _e( 'Read More', 'ms' ); ?></span>
											<?php } ?>
										</a>
									</div>
									<?php
									if ( get_post_meta( get_the_ID(), 'mb_integrations_mb_integrations_pillar', true ) === 'on' ) {
										?>
								</div>
										<?php
									}
									?>
					</li>

					<?php
					$collections = '';
					$data_type   = '';
					$category    = '';
					?>

				<?php endwhile; ?>
			</ul>

			<ul class="pagination"></ul>
		</div>
	</div>

</div>
