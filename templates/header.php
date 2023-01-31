<header class="Header urlslab-skip-keywords">
	<div class="wrapper">
		<div class="Header__logo urlslab-skip-lazy">
			<a href="<?= esc_url( home_url( '/', 'relative' ) ); ?>" title="PostAffiliatePro affiliate software" onclick="_paq.push(['trackEvent', 'Activity', 'Header', 'Logo'])">
				<img src="<?= esc_url( get_template_directory_uri() ); ?>/assets/images/pap-logo.svg" alt="<?php bloginfo( 'name' ); ?>">
			</a>
		</div>

		<div class="Header__items">
			<div class="Header__mobileNavigation">
				<i class="fontello-bars-solid"></i>
			</div>

			<div class="Header__navigation">
				<?php
				if ( has_nav_menu( 'header_navigation' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'header_navigation',
							'menu_class'     => 'nav',
						)
					);
				endif;
				?>
				<?php
				if ( has_nav_menu( 'header_navigation_mobile' ) ) :
					wp_nav_menu(
						array(
							'theme_location' => 'header_navigation_mobile',
							'menu_class'     => 'nav',
						)
					);
				endif;
				$post_slug = '';
				if ( $post ) {
					$post;
					$post_slug = $post->post_name;
					$post_slug = ( $post_slug === 'network' ? '/network' : '' ); // @codingStandardsIgnoreLine
				}
				?>

				<div class="Header__navigation__buttons">
					<a href="<?= esc_url( $post_slug ); ?><?php _e( '/call/', 'ms' ); ?>"
					   class="Button Button--outline" onclick="_paq.push(['trackEvent', 'Activity', 'Header', 'Book a consult'])">
						<span><?php _e( 'Book a consult', 'ms' ); ?></span>
					</a>
					<a href="<?= esc_url( $post_slug ); ?><?php _e( '/trial/', 'ms' ); ?>" class="Button Button--full" onclick="_paq.push(['trackEvent', 'Activity', 'Header', 'Free Trial'])">
						<span><?php _e( 'Free Trial', 'ms' ); ?></span>
					</a>
				</div>

				<a href="<?php _e( '/login/', 'ms' ); ?>" class="Button Button--login" onclick="_paq.push(['trackEvent', 'Activity', 'Header', 'Login'])">
					<span><?php _e( 'Login', 'ms' ); ?></span>
					<span class="tooltip"><?php _e( 'PostAffiliatePro Login', 'ms' ); ?></span>
				</a>
			</div>

			<div class="Header__flags">
				<?php
				if ( is_active_sidebar( 'header_flags' ) ) :
					dynamic_sidebar( 'header_flags' );
				endif;
				?>
			</div>
		</div>

	</div>
</header>
