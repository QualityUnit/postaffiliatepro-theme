<?php // @codingStandardsIgnoreLine
	require_once get_template_directory() . '/lib/includes/tag-colors.php';
	set_source( 'research', 'filter', 'js' );
	set_source( 'research', 'common/splide', 'css' );
	set_source( 'research', 'custom_lightbox', 'js' );
	set_source( 'research', 'layouts/ArchiveColumns', 'css' );
	set_source( 'research', 'components/CategoryHeaderNew', 'css' );
	set_source( 'research', 'components/ResearchFilter', 'css' );


	$uploads        = wp_get_upload_dir()['basedir'];
	$all_categories = get_categories( array( 'taxonomy' => 'ms_research_categories' ) );

foreach ( $all_categories as $key => $category ) {
	$category_colors[ $category->term_id ] = $tag_colors[ $key ];
}

$category_icon = '<svg viewBox="0 0 36 36" xmlns="http://www.w3.org/2000/svg"><path d="M7.383 8.25a4.758 4.758 0 0 0-4.758 4.758v15.609a4.758 4.758 0 0 0 4.758 4.758h15.609a4.758 4.758 0 0 0 4.758-4.758V13.008a4.758 4.758 0 0 0-4.758-4.758H7.383zm0 1.5h15.609a3.258 3.258 0 0 1 3.258 3.258v15.609a3.258 3.258 0 0 1-3.258 3.258H7.383a3.258 3.258 0 0 1-3.258-3.258V13.008A3.258 3.258 0 0 1 7.383 9.75z"/><path d="M9.785 8.984L9.75 7.308a3.198 3.198 0 0 1 3.189-3.183h15.184a3.764 3.764 0 0 1 3.752 3.752v15.184a3.197 3.197 0 0 1-3.189 3.189H27a.75.75 0 0 0 0 1.5h1.69a4.7 4.7 0 0 0 4.685-4.685V7.873a5.258 5.258 0 0 0-1.542-3.706 5.258 5.258 0 0 0-3.706-1.542H12.935A4.7 4.7 0 0 0 8.25 7.31l.035 1.706a.75.75 0 0 0 1.5-.032z"/></svg>';
?>

<div id="category" class="Category">
	<div class="CategoryHeader__new">
		<div class="wrapper__wide flex has-background">
				<div class="col">
					<div class="tag">
						<p class="tag-inn"><svg viewBox="0 0 15 15" xmlns="http://www.w3.org/2000/svg"><path d="m4.982 4.598-3.135.482c-1.005.154-1.415 1.381-.704 2.109l2.306 2.362-.54 3.312c-.168 1.03.925 1.8 1.838 1.295l2.753-1.522 2.753 1.522c.913.505 2.006-.265 1.838-1.295l-.54-3.312 2.306-2.362c.711-.728.301-1.955-.704-2.109l-3.135-.482-1.386-2.953c-.45-.958-1.814-.958-2.264.001v-.001zm2.518-1.833 1.216 2.591c.177.377.53.641.942.704l2.786.429-2.054 2.104c-.277.284-.403.683-.34 1.074l.478 2.929-2.423-1.34c-.376-.208-.834-.208-1.21 0l-2.423 1.34.478-2.929c.063-.391-.062-.79-.34-1.074l-2.054-2.104 2.786-.429c.412-.063.765-.327.942-.704z" fill="#050505"/></svg><?php _e( 'Infographics', 'research' ); ?></p>
					</div>
					<h1 class="CategoryHeader__new--title"><span class="highlight"><?php _e( 'Affiliate', 'research' ); ?></span>&nbsp;<?php _e( 'marketing research', 'research' ); ?></h1>
					<h3 class="CategoryHeader__new--subtitle"><?php _e( 'Take a look at some of the most interesting affiliate marketing statistics and information', 'research' ); ?></h3>
				</div>
				<div class="col col-image">
					<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/affiliate_marketing_research.png" alt="<?php _e( 'Affiliate marketing research', 'research' ); ?>" />
				</div>
		</div>
	</div>

	<div class="wrapper Category__container">

		<div class="Research__filter--title h3"><?php _e( 'Select category', 'ms' ); ?>:</div>
		<div class="Research__filter" id="filter">
				<label class="Research__filter--item primary">
					<input class="filter-item" type="radio" value="" name="category" checked />
					<div class="Research__filter--item__inn">
						<div class="Research__filter--item__icon"><?= $category_icon;  // @codingStandardsIgnoreLine ?></div>
						<span><?php _e( 'All', 'ms' ); ?></span>
					</div>
				</label>
				<?php
				$categories = array_unique( get_categories( array( 'taxonomy' => 'ms_research_categories' ) ), SORT_REGULAR );
				foreach ( $categories as $category ) {

					$category_id       = $category->term_id;
					$category_icon_url = preg_match( '/uploads.+?\.svg/', htmlentities( $category->description ), $has_icon );
					if ( isset( $has_icon[0] ) ) {
						$category_icon_uploaded = $uploads . str_replace( 'uploads', '', $has_icon[0] );
					}
					?>
					<label class="Research__filter--item <?= esc_attr( $category_colors[ $category_id ] ); ?>">
						<input class="filter-item" type="radio" value="<?php echo esc_attr( $category->slug ); ?>" name="category"
								<?php
								if ( current( $category ) === $category->slug ) {
									echo 'checked';
								}
								?>
						>
						<div class="Research__filter--item__inn">
							<div class="Research__filter--item__icon">
								<?php
								if ( isset( $category_icon_uploaded ) ) {
									include_once $category_icon_uploaded;
								}
								if ( ! isset( $has_icon[0] ) ) {
									echo $category_icon; // @codingStandardsIgnoreLine
								}
								?>
							</div>
							<span><?= esc_html( $category->name ); ?></span>
						</div>
					</label>
				<?php } ?>
		</div>

		<div class="Category__content">
			<h5 class="Category__content__description"><?php _e( 'List of infographics', 'research' ); ?>&nbsp;&nbsp;&nbsp;<span id="filter-show">(<span id="countPosts"><?php echo esc_html( wp_count_posts( 'ms_features' )->publish ); ?></span>)</span></h5>
			<ul class="Archive__columns list">
				<?php
				while ( have_posts() ) :
					the_post();
					?>

					<?php
					$category      = '';
					$category_tags = '';

					$categories   = get_the_terms( 0, 'ms_research_categories' );
					$current_lang = apply_filters( 'wpml_current_language', null );
					do_action( 'wpml_switch_language', 'en' );
					$categories_en = get_the_terms( 0, 'ms_research_categories' );
					if ( ! empty( $categories_en ) ) {
						$category_en = array_shift( $categories_en )->slug;
					}
					do_action( 'wpml_switch_language', $current_lang );
					if ( ! empty( $categories ) ) {
						foreach ( $categories as $category_item ) {
							$category_item  = array_shift( $categories );
							$category      .= $category_item->slug;
							$category_id    = $category_item->term_id;
							$category_tags .= '
							<span class="CategoryTag CategoryTag__star ' . $category_colors[ $category_id ] . '">' . $category_item->name . '</span>';
							$category      .= ' ';
						}
					}
					$category = substr( $category, 0, -1 );

					?>

					<li class="Box--article Box--article__padded col col-2 <?= esc_attr( $category ); ?> <?= esc_attr( $category_en ); ?>" data-category="<?= esc_attr( $category ); ?>">
						<a href="<?= esc_url( get_the_post_thumbnail_url() ); ?>" data-lightbox="gallery">
							<div class="Box--article__image--center block text-align-center">
								<?php
								if ( has_post_thumbnail() ) {
									the_post_thumbnail( 'blog_post_thumbnail' );
								}
								?>
							</div>
							<div class="CategoryTags"><?= $category_tags; // @codingStandardsIgnoreLine ?></div>
							<h3 class="Box--article__title"><?php the_title(); ?></h3>
							<p class="Box--article__excerpt">
								<?= esc_html( wp_trim_words( get_the_excerpt(), 30 ) ); ?>
							</p>
						</a>
					</li>

					<?php
					$category = '';
					?>

				<?php endwhile; ?>
			</ul>
		</div>
	</div>
</div>
