<?php // @codingStandardsIgnoreLine
set_source( 'about', 'pages/Directory', 'css' );
set_source( 'about', 'pages/About', 'css' );
$header_category = get_the_terms( $post->ID, 'ms_about_categories' );
if ( ! empty( $header_category ) ) {
	$header_category = array_shift( $header_category );
	$header_category = $header_category->slug;
}
?>

<div class="Post about" itemscope itemtype="http://schema.org/AboutPage">
	<meta itemprop="url" content="<?= esc_url( get_permalink() ); ?>">
	<span itemprop="publisher" itemscope itemtype="http://schema.org/Organization"><meta itemprop="name" content="LiveAgent"></span>

	<div class="Post__header about">
		<div class="wrapper__wide"></div>
	</div>

	<div class="wrapper__wide Post__container">
		<div class="Post__sidebar">
		</div>

		<div class="Post__content">
			<div class="Post__logo Post__logo--about">
				<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/icon_about-us.svg" alt="<?php _e( 'About us', 'ms' ); ?>">
			</div>
			<h1 itemprop="name" class="Post__main-title"><?php the_title(); ?></h1>

			<div class="Content" itemprop="text" >
				<?php the_content(); ?>
			</div>
		</div>
	</div>
</div>
