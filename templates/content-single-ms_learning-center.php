<?php // @codingStandardsIgnoreLine
$header_category = get_the_terms( $post->ID, 'ms_learning-center_categories' );
if ( ! empty( $header_category ) ) {
	$header_category = array_shift( $header_category );
	$header_category = $header_category->slug;
}
?>

<div class="LearningCenter Post" itemscope itemtype="http://schema.org/TechArticle">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="PostAffiliatePro"></span>

	<div class="Post__header Category__header LearningCenter__header">
		<div class="wrapper__wide"></div>
	</div>
	<div class="wrapper__wide Post__container">
		<div class="Post__sidebar">
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

		<div class="Signup__sidebar-wrapper">
			<?= do_shortcode( '[signup-sidebar]' ); ?>
		</div>

		<div class="Post__content">
			<div class="Post__content__breadcrumbs">
				<ul>
					<li><a href="<?php _e( '/academy/', 'ms' ); ?>"><?php _e( 'Academy', 'ms' ); ?></a></li>
					<li><?php the_title(); ?></li>
				</ul>
			</div>

			<h1 itemprop="name"><?php the_title(); ?></h1>

			<div class="Content" itemprop="articleBody">
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>
