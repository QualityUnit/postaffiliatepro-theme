<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, shrink-to-fit=no">

<!--	<link rel="preconnect" href="https://fonts.googleapis.com">-->
<!--	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>-->

	<link rel="apple-touch-icon" sizes="180x180" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/favicon/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/favicon/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/favicon/favicon-16x16.png">
	<link rel="mask-icon" href="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/favicon/safari-pinned-tab.svg" color="#118af7">
	<meta name="apple-mobile-web-app-title" content="<?php bloginfo( 'name' ); ?>">
	<meta name="application-name" content="<?php bloginfo( 'name' ); ?>">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="theme-color" content="#ffffff">

	<!-- URLSLAB-SKIP-REPLACE-START -->
	
	<?php 
	function add_inline_styles() {
		ob_start();
		$css  = file_get_contents( get_template_directory() . '/assets/dist/common/common' . isrtl() . wpenv() . '.css' );
		$css .= file_get_contents( get_template_directory() . '/assets/dist/layouts/Header' . isrtl() . wpenv() . '.css' );
		if ( is_page_template( 'elementor.php' ) || is_page_template( 'front-page.php' ) || is_page_template( 'page.php' ) || is_page_template( 'template-academy-header.php' ) || is_page_template( 'template-blog-header.php' ) ) {
			$css .= file_get_contents( get_template_directory() . '/assets/dist/components/HeroHeadlineHome' . isrtl() . wpenv() . '.css' );
		}
		ob_get_clean();

		// return the stored style
		if ( '' != $css ) {
			echo '<style id="inline-css" type="text/css">' . $css . '</style>'; // @codingStandardsIgnoreLine
		}
	};

	add_inline_styles();
	wp_head();
	get_template_part( 'lib/pagesources' );
	?>
	<!-- URLSLAB-SKIP-REPLACE-END -->
</head>
