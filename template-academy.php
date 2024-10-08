<?php
/**
 * Template Name: Page Like Academy Post
 */
set_custom_source( 'components/SidebarTOC', 'css' );
set_custom_source( 'pages/post', 'css' );
set_custom_source( 'common/splide', 'css' );
set_custom_source( 'splide', 'js' );
set_custom_source( 'sidebar_toc', 'js' );
set_custom_source( 'custom_lightbox', 'js' );
?>

<div class="Post" itemscope itemtype="http://schema.org/Article">
	<div class="Box Post__header">
		<div class="wrapper"></div>
	</div>

	<div class="wrapper Post__container">
		<div class="Post__sidebar flowhunt-skip">
			<div class="Post__sidebar__logo">
				<?php if ( has_post_thumbnail() ) { ?>
					<?php the_post_thumbnail( 'logo_thumbnail' ); ?>
				<?php } else { ?>
					<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-book.svg" alt="<?php _e( 'Academy', 'ms' ); ?>">
				<?php } ?>
			</div>

			<div class="Post__sidebar__buttons">
				<a href="<?php _e( '/trial/', 'ms' ); ?>" class="Button Button--full">
					<span><?php _e( 'Try It Now', 'ms' ); ?></span>
				</a>
			</div>

			<?php if ( sidebar_toc() !== false ) { ?>
				<div class="SidebarTOC-wrapper">
					<div class="SidebarTOC Post__SidebarTOC">
						<strong class="SidebarTOC__title"><?php _e( 'Contents', 'ms' ); ?></strong>
						<div class="SidebarTOC__slider slider splide">
							<div class="splide__track">
								<ul class="SidebarTOC__content splide__list">
									<?= wp_kses_post( sidebar_toc() ); ?>
								</ul>
							</div>
						</div>
					</div>
				</div>
			<?php } ?>
		</div>

		<div class="Post__content">
			<div class="Post__content__breadcrumbs">
				<ul>
					<li><a href="<?php _e( '/', 'ms' ); ?>"><?php _e( 'Home', 'ms' ); ?></a></li>
					<li><?php the_title(); ?></li>
				</ul>
			</div>

			<h1 itemprop="name"><?php the_title(); ?></h1>

			<div class="Content" itemprop="articleBody">
				<?php the_content(); ?>

				<div class="Post__buttons">
					<a href="<?php _e( '/trial/', 'ms' ); ?>" class="Button Button--full">
						<span><?php _e( 'Try It Now', 'ms' ); ?></span>
					</a>
				</div>

				<?php urlslab_display_related_resources(); ?>
			</div>
		</div>
	</div>
</div>
