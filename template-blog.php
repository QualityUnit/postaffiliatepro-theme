<?php
/**
 * Template Name: Page Like Blog Post
 */
set_custom_source( 'components/SidebarTOC', 'css' );
set_custom_source( 'pages/blog', 'css' );
set_custom_source( 'common/splide', 'css' );
set_custom_source( 'splide', 'js' );
set_custom_source( 'sidebar_toc', 'js' );
set_custom_source( 'custom_lightbox', 'js' );
?>

<div class="BlogPost" itemscope itemtype="http://schema.org/Article">

	<div class="BlogPost__header">
		<div class="BlogPost__thumbnail">
			<?php the_post_thumbnail( 'blog_post_thumbnail' ); ?>
		</div>
		<div class="BlogPost__intro">
			<h1 class="BlogPost__title" itemprop="name"><?php the_title(); ?></h1>

			<div class="BlogPost__author" temprop="author" itemscope itemtype="http://schema.org/Person">
				<div class="BlogPost__author__avatar">
					<meta itemprop="image" content="<?= esc_url( get_avatar_url( get_the_author_meta( 'ID' ), 220, 'gravatar_default', get_the_author() ) ); ?>"></meta>
					<?= get_avatar( get_the_author_meta( 'ID' ), 40, 'gravatar_default', get_the_author() ); ?>
				</div>

				<p class="BlogPost__author__name" itemprop="name"><?php the_author(); ?></p>
				<p class="BlogPost__author__position"><?php _e( 'Last modified on', 'ms' ); ?>
					<span itemprop="datePublished" content="<?= esc_attr( get_the_time( 'Y-m-d' ) ); ?>"><?php the_modified_time( 'F j, Y' ); ?> <?php _e( 'at', 'ms' ); ?> </span> <?php the_modified_time( 'g:i a' ); ?></p>
			</div>
		</div>
	</div>

	<?php if ( sidebar_toc() !== false ) { ?>
		<div class="SidebarTOC-wrapper">
			<div class="SidebarTOC">
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

	<div class="BlogPost__share-sidebar-wrapper">
		<div id="share-sidebar" class="BlogPost__share-sidebar">
			<strong class="BlogPost__share-sidebar__title"><?php _e( 'Share this article', 'ms' ); ?></strong>

			<ul class="BlogPost__share-sidebar__items">
				<li class="BlogPost__share-sidebar__item">
					<a itemprop="sameAs" href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" target="_blank" title="<?php _e( 'Share on', 'ms' ); ?> <?php _e( 'Facebook', 'ms' ); ?>">
						<i class="fontello-facebook-f-brands"></i>
					</a>
				</li>
				<li class="BlogPost__share-sidebar__item">
					<a itemprop="sameAs" href="https://twitter.com/share?url=<?php the_permalink(); ?>" target="_blank" title="<?php _e( 'Share on', 'ms' ); ?> <?php _e( 'Twitter', 'ms' ); ?>">
						<i class="fontello-twitter-brands"></i>
					</a>
				</li>
				<li class="BlogPost__share-sidebar__item">
					<a itemprop="sameAs" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>" target="_blank" title="<?php _e( 'Share on', 'ms' ); ?> <?php _e( 'LinkedIn', 'ms' ); ?>">
						<i class="fontello-linkedin-in-brands"></i>
					</a>
				</li>
			</ul>

			<div class="BlogPost__share-sidebar__trial">
				<div class="BlogPost__share-sidebar__trial__main">
					<strong class="BlogPost__share-sidebar__title"><?php _e( 'Try Post Affiliate Pro for free', 'ms' ); ?></strong>
					<img class="BlogPost__share-sidebar__trial__icon" src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon-star_funny.svg" alt="Try Post Affiliate Pro for free">
				</div>
				<a href="<?php _e( '/trial/', 'ms' ); ?>" class="Button Button--full">
					<span><?php _e( 'Get Started', 'ms' ); ?></span>
				</a>
			</div>
		</div>

	</div>
	<div class="BlogPost__content Content" itemprop="articleBody">
		<?php the_content(); ?>

		<div class="Post__content__resources">
			<div class="Post__sidebar__title h4"><?php _e( 'Related Articles', 'ms' ); ?></div>

			<div class="SimilarSources">
				<?php echo do_shortcode( '[urlslab-related-resources related-count="4" show-image="true" show-summary="true"]' ); ?>
			</div>
		</div>
	</div>
</div>
