<?php
//  header_banners(
//      'pricing',
//      array(
//          array(
//              'title'    => __( 'Help Desk of the Future', 'ms' ),
//              'subtitle' => __( 'Turn Support into Superpower with LiveAgent!', 'ms' ),
//              'class'    => 'LiveAgent',
//              'image'    => 'AnnouncementBar-LiveAgent.png',
//              'bg'       => 'AnnouncementBar-LiveAgent_bg.jpg',
//              'url'      => __( 'https://www.liveagent.com/', 'ms' ),
//          ),
//           array(
//            'title'    => __( 'Unleash the Website Wizard', 'ms' ),
//            'subtitle' => __( 'Experience the power of the URLsLab plugin!', 'ms' ),
//            'class'    => 'URLslab',
//            'image'    => 'AnnouncementBar-Urlslab.png',
//            'bg'       => 'AnnouncementBar-Urlslab_bg.jpg',
//            'url'      => __( 'https://www.urlslab.com/', 'ms' ),
//           ),
//      )
//  )
?>
<header class="Header flowhunt-skip urlslab-skip-keywords">
	<div class="wrapper">
		<div class="Header__logo urlslab-skip-lazy">
			<a href="<?= esc_url( home_url( '/', 'relative' ) ); ?>" title="PostAffiliatePro affiliate software">
				<picture>
					<source srcset="<?= esc_url( get_template_directory_uri() ) . '/assets/images/pap-logo-only-icon.svg'; ?>" media="(max-width: 415px)">
					<img src="<?= esc_url( get_template_directory_uri() ) . '/assets/images/pap-logo.svg'; ?>" alt="<?php bloginfo( 'name' ); ?>">
				</picture>
			</a>
		</div>

		<div class="Header__items">
			<div class="Header__mobile__hamburger">
				<span class="line"></span>
				<span class="line"></span>
				<span class="line"></span>
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
				<div class="Header__flags__mobile">
					<?php
					if ( is_active_sidebar( 'header_flags_mobile' ) ) :
						dynamic_sidebar( 'header_flags_mobile' );
					endif;
					?>
				</div>
				<div class="Header__navigation__buttons__mobile">
					<a href="<?= esc_url( $post_slug ); ?><?php _e( '/trial/', 'ms' ); ?>" class="Button Button--full">
						<span><?php _e( 'Free Trial', 'ms' ); ?></span>
					</a>
					<a href="<?php _e( '/login/', 'ms' ); ?>" class="Button Button--login">
						<span><?php _e( 'Login', 'ms' ); ?></span>
						<span class="tooltip"><?php _e( 'PostAffiliatePro Login', 'ms' ); ?></span>
					</a>
				</div>
			</div>

			<div class="Header__navigation__buttons">
				<a href="<?php _e( '/demo/', 'ms' ); ?>"
					 class="Button Button--full">
					<span><?php _e( 'Consult an Expert', 'ms' ); ?></span>
				</a>
				<a href="<?= esc_url( $post_slug ); ?><?php _e( '/trial/', 'ms' ); ?>" class="Button Button--outline">
					<span><?php _e( 'Free Trial', 'ms' ); ?></span>
				</a>
				<a href="<?php _e( '/login/', 'ms' ); ?>" class="Button Button--login">
					<span><?php _e( 'Login', 'ms' ); ?></span>
					<span class="tooltip"><?php _e( 'PostAffiliatePro Login', 'ms' ); ?></span>
				</a>
			</div>

			<!-- URLSLAB-SKIP-REPLACE-START -->
			<div class="Header__flags urlslab-skip-all">
				<?php
				if ( is_active_sidebar( 'header_flags' ) ) :
					dynamic_sidebar( 'header_flags' );
				endif;
				?>
			</div>
			<!-- URLSLAB-SKIP-REPLACE-END -->
		</div>

	</div>
</header>
