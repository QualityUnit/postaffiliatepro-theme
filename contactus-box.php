<?php
	$icons     = get_template_directory_uri() . '/assets/images/contact/';
	require_once get_template_directory() . '/chat-button.php';
?>

<div class="ContactUs__form hidden" data-targetId="contactUsForm">
	<button class="ContactUs__menu--close" data-close-target="contactUsForm" type="button">
		<svg class="icon-close"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?' . THEME_VERSION . '#close' ); ?>"></use></svg>
	</button>
	<script type="text/javascript">
		function showContactForm() {
			(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.defer=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document, 'https://support.qualityunit.com/scripts/track.js', function(e){ LiveAgent.createForm('99c3idgr', e); });
		}

		if ( getCookieFrontend( "cookieLaw" ) ) {
			showContactForm()
		}
	</script>
</div>

<div class="ContactUs">
	<button class="ContactUs__button" data-target="contactUsMenu" type="button">
		<span><?php _e( 'Contact Us', 'ms' ); ?></span>
		<div class="ContactUs__button--icon__wrap">
			<svg class="ContactUs__button--icon" viewBox="0 0 55 55" xmlns="http://www.w3.org/2000/svg" xml:space="preserve"><path d="M382.375 2.09h-303.8c-20.1-.2-39.5 7.7-53.8 22-7 7.1-12.6 15.4-16.4 24.7-3.8 9.2-5.7 19.1-5.6 29.1v303.9c0 41.2 33.9 75 75 75h304c20.1.2 39.5-7.7 53.8-22 14.3-14.2 22.2-33.7 22-53.8V77.09c0-41.1-34-75-75.2-75Zm-247.7 259.2-1.5 47-24.3-7.6v-45.5l-15.2-4.5 30.3-36.4 25.8 50-15.1-3Zm81.8-36.4-13.6 107.6-30.3-12.1 7.6-103.1-19.7-6.1 42.4-44 34.9 63.7-21.3-6Zm121.3-48.5-45.5 189.5-42.4-16.7 39.4-181.9-31.8-9.1 71.2-65.2 37.9 89.4-28.8-6Z" transform="translate(-.335 -.252) scale(.12093)"/></svg>
		</div>
	</button>

	<nav class="ContactUs__menu--wrap hidden" data-targetId="contactUsMenu" data-hide-delay="500">
		<button class="ContactUs__menu--close" data-close-target="contactUsMenu" type="button">
			<svg class="icon-close"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?' . THEME_VERSION . '#close' ); ?>"></use></svg>
		</button>

		<ul class="ContactUs__menu">
			<?php
			if ( is_page() ) {
				global $post;
				$phone = '+421 2 33 456 826';
				$current_id = apply_filters( 'wpml_object_id', $post->ID, 'page', false, 'en' );

				if ( $current_id ) {
					$en_slug = get_post_field( 'post_name', get_post( $current_id ) );
				}
				if ( ICL_LANGUAGE_CODE === 'en' || ICL_LANGUAGE_CODE === 'zh-hans' || ICL_LANGUAGE_CODE === 'ar' || ICL_LANGUAGE_CODE === 'ja' || ICL_LANGUAGE_CODE === 'tl' || ICL_LANGUAGE_CODE === 'vi' ) {
					$phone = '+18 886 596 550';
				}
				if ( ICL_LANGUAGE_CODE === 'es' || ICL_LANGUAGE_CODE === 'pt-br' ) {
					$phone = '+34 886 000 035';
				}
				if ( 'pricing' === $en_slug ) {
					?>
			<li class="ContactUs__menu--item">
				<a href="tel:<?= esc_attr( preg_replace( '/(\s|-)/', '', $phone ) ); ?>" class="ContactUs__menu--link green" data-close-target="contactUsMenu">
					<?= esc_html( $phone ); ?>
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>phone.svg" />
				</a>
			</li>
					<?php
				}
			}
			?>
			<li class="ContactUs__menu--item">
				<div class="ContactUs__menu--link fakeChatButton no-icon hidden">
					<span class="fakeChatButton__text"><?php _e( 'Contact form', 'ms' ); ?></span>
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>form.svg" />
					<span class="fakeChatButton__msg"><?php _e( 'Please accept our cookies before sending contact form.', 'ms' ); ?></span>
				</div>
				<span class="ContactUs__menu--link ContactUs__menu--link__form red" data-target="contactUsForm" data-close-target="contactUsMenu">
					<?php _e( 'Contact form', 'ms' ); ?>
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>form.svg" />
				</span>
			</li>
			<li class="ContactUs__menu--item">
				<a href="https://m.me/PostAffiliatePro" class="ContactUs__menu--link violet" data-close-target="contactUsMenu">
					Messenger
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>messenger.svg" />
				</a>
			</li>
			<li class="ContactUs__menu--item">
				<a href="https://wa.me/19785916509?text=Hi! I am contacting you from <?php the_permalink(); ?>, can you help me?"  class="ContactUs__menu--link green" data-close-target="contactUsMenu">
					Whatsapp
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>whatsapp.svg" />
				</a>
			</li>
			<li class="ContactUs__menu--item">
				<div class="ContactUs__menu--link fakeChatButton hidden">
					<span class="fakeChatButton__text"><?php _e( 'Live Chat', 'ms' ); ?></span>
					<div class="ContactUs__icon fakeChatButton__icon"></div>
					<span class="fakeChatButton__msg"><?php _e( 'Please accept our cookies before we start a chat.', 'ms' ); ?></span>
				</div>
				<span class="ContactUs__menu--link chat blue" id="chatBtn" data-close-target="contactUsMenu">
					<?php _e( 'Chat', 'ms' ); ?>
				</span>
			</li>
		</ul>
	</nav>
</div>