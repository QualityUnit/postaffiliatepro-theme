<?php

/**
	* Styles
*/

add_action(
	'wp_enqueue_scripts',
	function () {
		wp_dequeue_style( 'wp-block-library' );
		wp_dequeue_style( 'elementor-custom' );

		if ( ! is_page_template( 'elementor.php' ) ) {
			wp_enqueue_style( 'compact-header', get_template_directory_uri() . '/assets/dist/components/compactHeader' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
			wp_enqueue_style( 'compact-header-filter', get_template_directory_uri() . '/assets/dist/components/Filter' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}

		if ( is_singular( 'post' ) ) {
			wp_enqueue_style( 'blog-layout', get_template_directory_uri() . '/assets/dist/pages/blog' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}

		if ( is_page_template( 'elementor.php' ) || is_page_template( 'front-page.php' ) || is_page_template( 'page.php' ) || is_page_template( 'template-academy-header.php' ) || is_page_template( 'template-blog-header.php' ) ) {
			wp_enqueue_style( 'elementor-layout', get_template_directory_uri() . '/assets/dist/Elementor' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}

		if ( is_archive( 'affiliate-manager.php' ) ) {
			wp_enqueue_style( 'post', get_template_directory_uri() . '/assets/dist/pages/post' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}

		if ( ! is_page_template( 'elementor.php' ) ) {
			wp_enqueue_style( 'app', get_template_directory_uri() . '/assets/dist/app' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
			wp_enqueue_style( 'wp_block-library', includes_url() . 'css/dist/block-library/style' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}

		if ( is_page_template( 'elementor.php' ) || is_page_template( 'front-page.php' ) || is_page_template( 'page.php' ) || is_page_template( 'template-academy-header.php' ) || is_page_template( 'template-blog-header.php' ) ) {
			wp_enqueue_style( 'elementor-layout', get_template_directory_uri() . '/assets/dist/Elementor' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
		}

		if ( is_page_template( 'template-blog-header.php' ) || is_page_template( 'template-academy-header.php' ) ) {
			wp_enqueue_style( 'elementor-custom', get_template_directory_uri() . '/assets/dist/common/elementor-custom' . isrtl() . wpenv() . '.css', false, THEME_VERSION );

			if ( is_page_template( 'template-blog-header.php' ) ) {
				wp_enqueue_style( 'post', get_template_directory_uri() . '/assets/dist/pages/post' . isrtl() . wpenv() . '.css', false, THEME_VERSION );
			}
		}
	},
	100
);


/**
 * Scripts
 */

add_action(
	'wp_footer',
	function () {
		wp_enqueue_script( 'popper_js', get_template_directory_uri() . '/assets/dist/popper' . wpenv() . '.js', array( 'wp-i18n' ), THEME_VERSION, true );
		wp_enqueue_script( 'app_js', get_template_directory_uri() . '/assets/dist/app' . wpenv() . '.js', array( 'wp-i18n' ), THEME_VERSION, true );
	}
);
