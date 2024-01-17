<?php
//todo: vymazat zakomentovane includovanie 'sidebar_toc'
//todo: vymazat 'Post__header__small' v php a css
//todo: filter toggle ikona
//todo: content-archive-ms_reviews.php ... zobrazovat $whatis_post?

// Note: CSS was moved to assets.php because of CLS Web Vital

?>
<?php set_custom_source( 'filterMenu', 'js' ); ?>
<?php set_custom_source( 'sortingMenu', 'js' ); ?>
<?php set_custom_source( 'compactHeader', 'js' ); ?>
<?php if ( isset( $args ) ) { ?>
	<?php
	$header_type = 'lvl-2';
	if ( ! empty( $args['type'] ) ) {
		$header_type = $args['type'];
	}
	if ( ! empty( $args['filter'] ) ) {
		$filer_items = $args['filter'];
	}
	if ( ! empty( $args['sort'] ) ) {
		$filer_sort = $args['sort'];
	}
	$search_class = '';
	if ( ! empty( $args['search'] ) ) {
		$filer_search = $args['search'];
		if ( ! empty( $filer_search['type'] ) ) {
			$search_type = $filer_search['type'];
			$search_class = ' search--' . $search_type;
		}
	}
	if ( ! empty( $args['count'] ) ) {
		$filer_count = $args['count'];
	}
	if ( ! empty( $args['menu'] ) ) {
		$menu_header = $args['menu'];
	}
	if ( ! empty( $args['research_nav'] ) ) {
		$research_nav = $args['research_nav'];
	}
	if ( ! empty( $args['checklist'] ) ) {
		$checklist = $args['checklist'];
	}
	?>

	<div class="compact-header__placeholder">
		<div class="compact-header compact-header--<?= sanitize_html_class( $header_type ); ?> urlslab-skip-lazy">
			<div class="compact-header__wrapper wrapper">
				<?php
				// Variables
				$breadcrumb       = $args['breadcrumb'] ?? null;
				$affiliate_manager = $args['affiliate_manager'] ?? null;
				$post_title            = $args['title'] ?? null;
				$update_label      = $args['update']['label'] ?? null;
				$text             = $args['text'] ?? null;
				$date             = $args['date'] ?? null;
				$buttons          = $args['buttons'] ?? array();
				$tags             = $args['tags'] ?? array();
				$contacts_info       = $args['contacts_info'] ?? array();
				$manager_industries = ! empty( $args['manager_industries'] ) ? $args['manager_industries'] : array();
				$toc_items         = $args['toc']['items'] ?? null;
				$image_src         = $args['image']['src'] ?? null;
				$image_alt          = $args['image']['alt'] ?? null;
				$avatar_src        = $args['avatar']['src'] ?? null;
				$avatar_alt        = $args['avatar']['alt'] ?? null;
				$logo_src          = $args['logo']['src'] ?? null;
				$logo_alt          = $args['logo']['alt'] ?? null;

				?>
				<div class="compact-header__left">
					<!-- Breadcrumb -->
					<?php
					if ( $breadcrumb ) {
						site_breadcrumb( $breadcrumb );
					} else {
						site_breadcrumb();
					}
					?>

					<!-- Affiliate industry tags -->
					<?php
					if ( is_tax( 'ms_directory_affiliate_manager' ) ) {
						?>
						<div class="compact-header__industry__tags">
						<ul class="CategoryTags">
							<?php
							foreach ( $manager_industries as $manager_industry ) {
								?>
								<li class="CategoryTag">
									<?= esc_html( strlen( manager_industry( $manager_industry ) ) > 30 ? wp_trim_words( manager_industry( $manager_industry ), 2 ) : manager_industry( $manager_industry ) ); ?>
									<div class="Tooltip Tooltip--centerTop">

										<?= esc_html( manager_industry( $manager_industry ) ); ?>
									</div>
								</li>
							<?php } ?>
						</ul>
						<?php if ( $affiliate_manager ) : ?>
							<strong class="AffiliateManager__manager"><?= esc_html( $affiliate_manager ); ?></strong>
						<?php endif; ?>
					</div>
					<?php } ?>

					<!-- Title -->
					<?php if ( $post_title ) : ?>
					<h1 itemprop="name" class="compact-header__title"><?= esc_html( $post_title ); ?></h1>
					<?php endif; ?>

					<?php if ( $contacts_info ) : ?>
					<ul class="AffiliateManagerCard__contacts">
						<?php
						$email = $contacts_info['email'];
						$linkedin = $contacts_info['linkedin'];
						$phone_number = $contacts_info['phone'];

						if ( isset( $email ) && 'N/A' !== $email && strlen( $email ) > 5 ) {
							?>
							<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--email fontello-mail">
								<a href="mailto:<?= esc_html( $email ); ?>"><?php _e( 'Mail', 'ms' ); ?></a>
							</li>
							<?php
						}
						?>
						<?php
						if ( isset( $phone_number ) && 'N/A' !== $phone_number && strlen( $phone_number ) > 9 ) {
							?>
							<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--phone fontello-icon-e806">
								<a href="tel:<?= esc_html( $phone_number ); ?>"><?= esc_html( $phone_number ); ?></a>
							</li>
							<?php
						}
						?>
						<?php
						if ( isset( $linkedin ) && 'N/A' !== $linkedin && strlen( $linkedin ) > 5 ) {
							?>
							<li class="AffiliateManagerCard__contact AffiliateManagerCard__contact--linkedin fontello-linkedin-brands">
								<a href="<?= esc_url( $linkedin ); ?>"><?php _e( 'LinkedIn', 'ms' ); ?></a>
							</li>
							<?php
						}
						?>
					</ul>
					<?php endif; ?>

					<!-- Update -->
					<?php if ( $update_label ) : ?>
					<div class="compact-header__update">
						<time class="Reviews__update" itemprop="dateModified" content="<?= esc_attr( get_the_modified_time( 'F j, Y' ) ); ?>">
							<?= esc_html( $update_label . ' ' . get_the_modified_time( 'F j, Y' ) ); ?>
						</time>
					</div>
					<?php endif; ?>

					<!-- Text -->
					<?php if ( $text ) : ?>
					<div class="compact-header__text"><?= wp_kses_post( $text ); ?></div>
					<?php endif; ?>

					<!-- Date -->
					<?php
					if ( $date ) :
						$date_machine = get_the_time( 'Y-m-d' );
						$date_human = get_the_time( 'F j, Y' );
						$date_modified = get_the_modified_time( 'F j, Y' );
						$time_modified = get_the_modified_time( 'g:i a' );
						?>
					<div class="compact-header__date">
			<span itemprop="datePublished" content="<?= esc_attr( $date_machine ); ?>">
						<?= esc_html( $date_human ); ?>
			</span>
						<span>
						<?= esc_html( __( 'Last modified on', 'ms' ) . ' ' . $date_modified . ' ' . __( 'at', 'ms' ) . ' ' . $time_modified ); ?>
			</span>
					</div>
					<?php endif; ?>

					<!-- Buttons -->
					<?php if ( ! empty( $buttons ) ) : ?>
					<div class="compact-header__buttons">
						<div class="compact-header__buttons-items">
							<?php foreach ( $buttons as $button ) : ?>
								<?php
								$button_title = $button['title'] ?? null;
								$button_href = $button['href'] ?? '#';
								$button_classes = 'Button Button--outline';
								if ( isset( $button['target'] ) && '_blank' === $button['target'] ) {
									$button_classes .= ' Button--outline-gray';
								}
								?>
								<div class="compact-header__buttons-item">
									<a href="<?= esc_url( $button_href ); ?>"
										 class="<?= esc_attr( $button_classes ); ?>"
										 title="<?= esc_attr( $button_title ); ?>"
										 target="<?= esc_attr( $button['target'] ?? '_self' ); ?>"
										 rel="<?= esc_attr( $button['rel'] ?? '' ); ?>"
										 onclick="<?= esc_attr( $button['onclick'] ?? '' ); ?>">
										<span><?= esc_html( $button_title ); ?></span>
									</a>
								</div>
							<?php endforeach; ?>
						</div>
					</div>
					<?php endif; ?>

					<!-- Tags -->
					<?php if ( ! empty( $tags ) ) : ?>
					<div class="compact-header__tags">
						<?php foreach ( $tags as $item ) : ?>
				<div class="compact-header__tags-item">
							<?php if ( isset( $item['title'] ) ) : ?>
						<div class="compact-header__tags-title"><?= esc_html( $item['title'] ); ?>:</div>
					<?php endif; ?>
							<?php if ( isset( $item['list'] ) ) : ?>
						<ul class="compact-header__tags-list">
								<?php foreach ( $item['list'] as $tag_item ) : ?>
								<li>
									<a href="<?= esc_url( $tag_item['href'] ?? '#' ); ?>"
									   title="<?= esc_attr( $tag_item['title'] ?? '' ); ?>"
									   target="<?= esc_attr( $tag_item['                                       target'] ?? '_self' ); ?>"
																			 rel="<?= esc_attr( $tag_item['rel'] ?? '' ); ?>"
																			 onclick="<?= esc_attr( $tag_item['onclick'] ?? '' ); ?>">
																			<svg class="icon-tag-solid">
																				<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#tag-solid' ); ?>"></use>
																			</svg>
																			<?= esc_html( $tag_item['title'] ); ?>
																		</a>
																</li>
														<?php endforeach; ?>
												</ul>
										<?php endif; ?>
								</div>
						<?php endforeach; ?>
					</div>
					<?php endif; ?>

				</div>

				<div class="compact-header__right">

					<!-- TOC -->
					<?php if ( $toc_items ) : ?>
						<?= wp_kses_post( compact_header_toc( null, $toc_items ) ); ?>
					<?php else : ?>
						<?= wp_kses_post( compact_header_toc() ); ?>
					<?php endif; ?>

					<!-- Affiliate manger avatar -->
					<?php if ( $avatar_src ) : ?>
					<div class="compact-header__affiliate__manager__avatar">
						<img src="<?= esc_url( $avatar_src ); ?>" alt="<?= esc_attr( $avatar_alt ); ?>" class="compact-header__img">
					</div>
					<?php endif; ?>

					<!-- Image and Logo -->
					<?php if ( $image_src ) : ?>
						<div class="compact-header__image">
							<img src="<?= esc_url( $image_src ); ?>" alt="<?= esc_attr( $image_alt ); ?>" class="compact-header__img" fetchpriority="high">
							<?php if ( $logo_src ) : ?>
								<div class="compact-header__logo">
									<img src="<?= esc_url( $logo_src ); ?>"
											 alt="<?= esc_attr( $logo_alt ); ?>"
											 class="compact-header__logo-img" fetchpriority="high">
								</div>
							<?php endif; ?>
						</div>
					<?php endif; ?>

				</div>


				<?php if ( isset( $filer_search ) || isset( $filer_items ) || isset( $filer_sort ) || isset( $filer_count ) || isset( $menu_header ) || isset( $research_nav ) || isset( $checklist ) ) { ?>
					<div class="compact-header__bottom">
						<?php if ( isset( $filer_search ) || isset( $filer_items ) || isset( $filer_sort ) || isset( $filer_count ) ) { ?>
							<div class="compact-header__filters-toggle">
								<a class="Button Button--outline js-compact-header__toggle">
									<?= esc_html( __( 'Filters', 'ms' ) ); ?>
									<svg class="searchField__reset-icon icon-gear">
										<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#gear' ) ?>"></use>
									</svg>
								</a>
							</div>
							<div class="compact-header__filters js-compact-header__close urlslab-skip-keywords">
								<a class="compact-header__filters-close js-compact-header__close">
									<svg class="icon-close">
										<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#close' ) ?>"></use>
									</svg>
								</a>
								<?php
								$filter_fields_count = 0;
								if ( isset( $filer_search ) || isset( $filer_sort ) ) {
									$filter_fields_count++;
								}
								if ( isset( $filer_items ) ) {
									$filter_fields_count = $filter_fields_count + count( $filer_items );
								}
								?>
								<div class=" compact-header__filters-wrap
								<?php
								if ( isset( $filer_count ) ) {
									?>
									 compact-header__filters-wrap--count<?php } ?>">
									<span class="compact-header__filters-collapse js-compact-header__close"></span>
									<div class="compact-header__filters-inn
									<?php
									if ( $filter_fields_count < 3 ) {
										?>
										compact-header__filters-inn-sm<?php } ?>">
										<?php if ( isset( $filer_search ) ) { ?>
											<div class="compact-header__search">
												<div class="searchField">
													<svg class="searchField__icon icon-search">
														<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#search' ) ?>"></use>
													</svg>
													<input type="search" class="search<?= esc_attr( $search_class ); ?>" placeholder="<?php _e( 'Search', 'ms' ); ?>" maxlength="50">
													<span class="search-reset">
											<svg class="search-reset__icon icon-close">
												<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#close' ) ?>"></use>
											</svg>
										</span>
												</div>
											</div>
										<?php } ?>
										<?php if ( isset( $filer_sort ) ) { ?>
											<?php
											if ( ! empty( $filer_sort['items'] ) ) {
												$sort_items = $filer_sort['items'];
											}
											?>
											<?php if ( isset( $sort_items ) ) { ?>
												<div class="FilterMenu__wrapper SortingMenu__wrapper flex-tablet flex-align-center">
												<?php if ( isset( $filer_sort['label'] ) ) { ?>
													<div class="FilterMenu__desc SortingMenu__desc"><?= esc_html( $filer_sort['label'] ); ?></div>
												<?php } ?>
												<div class="FilterMenu SortingMenu" data-sort="relatedReviews">
													<div class="FilterMenu__title SortingMenu__title flex flex-align-center" data-title>
														<?= esc_html( $sort_items[0]['title'] ); ?>
													</div>
													<div class="FilterMenu__items SortingMenu__items" data-items>
														<div class="FilterMenu__items--inn SortingMenu__items--inn">
															<?php
															$counter = 0;
															foreach ( $sort_items as $item ) {
																++$counter;
																?>
																<div class="sorting FilterMenu__item SortingMenu__item">
																	<input class="sorting-item" type="radio" id="<?= esc_attr( $item['value'] ); ?>" value="<?= esc_attr( $item['value'] ); ?>" name="relatedReviews" data-sortBy="<?= esc_attr( $item['title'] ); ?>" <?= esc_attr( 1 === $counter ? 'checked' : '' ); ?> />
																	<label for="<?= esc_attr( $item['value'] ); ?>">
																		<span
																			<?php if ( isset( $item['onclick'] ) ) { ?>
																				onclick="<?= esc_attr( $item['onclick'] ); ?>"
																			<?php } ?>
																		><?= esc_html( $item['title'] ); ?></span>
																	</label>
																</div>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
											<?php } ?>
										<?php } ?>

										<?php if ( isset( $filer_items ) ) { ?>
											<?php foreach ( $filer_items as $filer_item ) { ?>
												<?php
												if ( ! empty( $filer_item['type'] ) ) {
													$filer_type = $filer_item['type'];
												}
												if ( ! empty( $filer_item['items'] ) ) {
													$filer_list = $filer_item['items'];
												}
												if ( ! empty( $filer_item['name'] ) ) {
													$filer_name = $filer_item['name'];
												}
												?>
												<?php if ( isset( $filer_list ) && isset( $filer_type ) ) { ?>
													<?php
													if ( ! empty( $filer_item['active'] ) ) {
														$filer_active = $filer_item['active'];
													} else {
														$filer_active = $filer_list[0]['title'];
													}
													?>
													<div class="compact-header__filter">
														<?php if ( ! empty( $filer_item['title'] ) ) { ?>
															<div class="compact-header__filter-label">
																<?= esc_html( $filer_item['title'] ); ?>
															</div>
														<?php } ?>
														<div class="FilterMenu">
															<div class="FilterMenu__title">
																<?= esc_html( $filer_active ); ?>
															</div>
															<div class="FilterMenu__items">
																<div class="FilterMenu__items--inn">
																	<?php if ( 'radio' == $filer_type && isset( $filer_name ) ) { ?>
																		<?php foreach ( $filer_list as $filer_list_item ) { ?>
																			<?php
																			$item_checked = false;
																			$item_value = '';
																			if ( ! empty( $filer_list_item['checked'] ) ) {
																				$item_checked = $filer_list_item['checked'];
																			}
																			if ( ! empty( $filer_list_item['value'] ) ) {
																				$item_value = $filer_list_item['value'];
																			}
																			if ( ! empty( $filer_list_item['title'] ) ) {
																				$item_title = $filer_list_item['title'];
																			}
																			if ( ! empty( $filer_list_item['onclick'] ) ) {
																				$item_onclick = $filer_list_item['onclick'];
																			}
																			if ( '' == $item_value ) {
																				$item_id = $filer_name . '-any';
																			} else {
																				$item_id = $filer_name . '-' . $item_value;
																			}
																			?>
																			<div class="checkbox FilterMenu__item">
																				<input
																					class="filter-item"
																					type="radio"
																					id="<?= esc_attr( $item_id ); ?>"
																					value="<?= esc_attr( $item_value ); ?>"
																					name="<?= esc_attr( $filer_name ); ?>"
																					<?php if ( isset( $item_title ) ) { ?>
																						title="<?= esc_attr( $item_title ); ?>"
																					<?php } ?>
																					<?php if ( $item_checked ) { ?>
																						checked
																					<?php } ?>
																				>
																				<label for="<?= esc_attr( $item_id ); ?>">
																					<span
																						class="FilterMenu__item-title"
																						<?php if ( isset( $item_onclick ) ) { ?>
																							onclick="<?= esc_attr( $item_onclick ); ?>"
																						<?php } ?>
																					>
																						<?php if ( isset( $item_title ) ) { ?>
																							<?= esc_html( $item_title ); ?>
																						<?php } ?>
																					</span>
																				</label>
																			</div>
																		<?php } ?>
																	<?php } ?>
																	<?php if ( 'link' == $filer_type && isset( $filer_name ) ) { ?>
																		<?php foreach ( $filer_list as $filer_list_item ) { ?>
																			<?php if ( isset( $filer_list_item['href'] ) && isset( $filer_list_item['title'] ) && isset( $filer_list_item['active'] ) ) { ?>
																				<a href="<?= esc_url( $filer_list_item['href'] ); ?>" class="checkbox FilterMenu__item
																				<?php if ( $filer_list_item['active'] ) { ?>
																					active
																				<?php } ?>
																				" active>
																					<span class="checkbox-label FilterMenu__item-title"><?= esc_html( $filer_list_item['title'] ); ?></span>
																				</a>
																			<?php } ?>
																		<?php } ?>
																	<?php } ?>
																</div>
															</div>
														</div>
													</div>
												<?php } ?>
											<?php } ?>
										<?php } ?>
									</div>
									<?php if ( isset( $filer_count ) ) { ?>
										<div class="compact-header__count">
											<span id="countPosts">
												<?php if ( isset( $filer_count['value'] ) ) { ?>
													<?= esc_html( $filer_count['value'] ); ?>
												<?php } ?>
											</span>
											<?php if ( isset( $filer_count['title'] ) ) { ?>
												<?= esc_html( $filer_count['title'] ); ?>
											<?php } ?>
										</div>
									<?php } ?>
								</div>
							</div>
							<div class="compact-header__filters-apply">
								<a class="Button Button--full js-compact-header__apply">
									<span><?= esc_html( __( 'Apply', 'ms' ) ); ?></span>
								</a>
							</div>
						<?php } elseif ( isset( $menu_header ) ) { ?>
							<div class="compact-header__menu">
								<?php if ( isset( $menu_header['title'] ) ) { ?>
									<div class="compact-header__menu-title"><?= esc_html( $menu_header['title'] ); ?></div>
								<?php } ?>
								<?php if ( isset( $menu_header['items'] ) ) { ?>
									<div class="compact-header__menu-items">
										<ul>
											<?php foreach ( $menu_header['items'] as $menu_item ) { ?>
												<li
													<?php if ( isset( $menu_item['active'] ) ) { ?>
														<?php if ( $menu_item['active'] ) { ?>
															class="active"
														<?php } ?>
													<?php } ?>
												>
													<?php if ( isset( $menu_item['href'] ) ) { ?>
													<a href="<?= esc_url( $menu_item['href'] ); ?>">
														<?php } ?>
														<?php if ( isset( $menu_item['title'] ) ) { ?>
															<?= esc_html( $menu_item['title'] ); ?>
														<?php } ?>
														<?php if ( isset( $menu_item['href'] ) ) { ?>
													</a>
												<?php } ?>
												</li>
											<?php } ?>
										</ul>
									</div>
								<?php } ?>
							</div>
						<?php } elseif ( isset( $research_nav ) ) { ?>
							<div class="compact-header__research">
								<nav class="Research--navigation">
									<div class="Research--navigation__title"><?php _e( 'Navigation', 'ms' ); ?></div>
									<div class="Research--navigation__posts">

										<div class="Research--navigation__selected" data-id="<?php echo esc_attr( get_the_ID() ); ?>"> <?php echo esc_html( str_replace( '^', '', get_the_title() ) ); ?> </div>

										<div class="Research--navigation__menu hidden">
											<ul class="Research--navigation__menu__inn">
												<?php $categories = array_unique( get_categories( array( 'taxonomy' => 'ms_research_categories' ) ), SORT_REGULAR ); ?>
												<?php
												$counter = 0;
												foreach ( $categories as $category ) {
													$query_research_posts = new WP_Query(
														array(
															'ms_research_categories' => $category->slug,
																													// @codingStandardsIgnoreLine
																													'posts_per_page' => 500,
															'orderby' => 'menu_order',
															'order'   => 'ASC',
														)
													);

													while ( $query_research_posts->have_posts() ) :
														$query_research_posts->the_post();
														++$counter;
														$color = $counter;
																											if ( $counter % 9 == 0 ) { // @codingStandardsIgnoreLine
															$color = 9;
														}
														if ( $counter % 9 > 0 ) {
															$color = $counter % 9;
														}
														?>
														<li data-id="<?php echo esc_attr( get_the_ID() ); ?>" data-color="<?php echo esc_attr( $color ); ?>" class="Research--navigation__post Research--color-<?php echo esc_html( $color ); ?>">
															<a class="Research--navigation__post__title" href="<?php the_permalink(); ?>">
														<span class="Research--navigation__counter">
														<?php
														echo esc_html( $counter < 10 ? ( '0' . $counter ) : $counter );
														?>
													</span>
																<?php echo esc_html( str_replace( '^', '', get_the_title() ) ); ?>
															</a>
														</li>
													<?php endwhile; ?>
													<?php wp_reset_postdata(); ?>
												<?php } ?>
											</ul>
										</div>
									</div>
								</nav>
							</div>
						<?php } elseif ( isset( $checklist ) ) { ?>
							<div class="compact-header__checklist">
								<div class="Checklists__toc__main" data-target="ChecklistTOC">
									<?php if ( checklists_toc() !== false ) { ?>
										<div class="Checklists__toc__label"><?php _e( 'Contents', 'ms' ); ?></div>
										<div class="Checklists__toc__block js-toc">
											<div class="Checklists__toc__title js-toc__title"><?= esc_html( checklists_toc()->title ); ?></div>
											<span class="Checklists__toc__activator"></span>
											<div class="Checklists__toc__wrapper hidden" data-targetId="ChecklistTOC">
												<div class="Checklists__toc__inn">
													<ul class="Checklists__toc js-toc__items">
														<?= wp_kses_post( checklists_toc()->toc ); ?>
													</ul>
												</div>
											</div>
										</div>
									<?php } ?>
								</div>
								<div class="compact-header__checklist-progress CircleProgressBar">
									<div class="CircleProgressBar__middle" id="circleProgressMiddle"></div>
									<div class="CircleProgressBar__spinner" id="circleProgressSpinner"></div>
								</div>
								<?php if ( checklists_toc() !== false ) { ?>
									<div class="compact-header__checklist-counter" id="checklistsCounter" data-checked="0" data-total="<?= esc_attr( checklists_toc()->count ); ?>">
										<?= esc_html( checklists_toc()->count ); ?>
									</div>
									<div class="compact-header__checklist-collapse">
										<span class="qu-Checklist__expander qu-Checklist__expander--collapse" data-action="closeAll">
											<svg width="24" height="24" xmlns="http://www.w3.org/2000/svg"><path d="M7.41 18.59 8.83 20 12 16.83 15.17 20l1.41-1.41L12 14l-4.59 4.59Zm9.18-13.18L15.17 4 12 7.17 8.83 4 7.41 5.41 12 10l4.59-4.59Z" fill="#050505"/></svg>
											<span class="desktop--only"><?php _e( 'Collapse All', 'ms' ); ?></span>
										</span>
										<span class="qu-Checklist__expander qu-Checklist__expander--expand inactive" data-action="openAll">
											<svg viewBox="0 0 24 24" width="24" height="24" xmlns="http://www.w3.org/2000/svg"><path d="M7.41 18.59 8.83 20 12 16.83 15.17 20l1.41-1.41L12 14l-4.59 4.59Z" style="fill:#050505" transform="translate(0 -10)"/><path d="M16.59 5.41 15.17 4 12 7.17 8.83 4 7.41 5.41 12 10l4.59-4.59Z" style="fill:#050505" transform="translate(0 10)"/></svg>
											<span class="desktop--only"><?php _e( 'Expand All', 'ms' ); ?></span>
										</span>
									</div>
								<?php } ?>
							</div>
						<?php } ?>
					</div>
				<?php } ?>
			</div>
		</div>
		</div>
<?php } ?>
