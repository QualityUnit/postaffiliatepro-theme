<?php
	$icons = get_template_directory_uri() . '/assets/images/contact/';
	require_once get_template_directory() . '/chat-button.php';
?>

<div class="ContactUs__form hidden" data-targetId="contactUsForm">
	<button class="ContactUs__menu--close" data-close-target="contactUsForm" type="button">
		<svg class="icon-close"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?' . THEME_VERSION . '#close' ); ?>"></use></svg>
	</button>
	<script type="text/javascript">
		<?php
		$form_id = 'v5kyj497';
		if ( ICL_LANGUAGE_CODE === 'de' ) {
			$form_id = 'hzf0ixe0';
		}
		if ( ICL_LANGUAGE_CODE === 'es' ) {
			$form_id = '77b02acd';
		}
		if ( ICL_LANGUAGE_CODE === 'pt-br' ) {
			$form_id = 'm7h7vl7x';
		}
		?>
		function showContactForm() {
			(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.id='la_x2s6df8d';s.defer=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document, 'https://support.qualityunit.com/scripts/track.js', function(e){ LiveAgent.createForm('<?= esc_attr( $form_id ); ?>', e); });
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

		<div class="ContactUs__status">
			<p><?php _e( 'We are available for you 24/7.', 'contactus' ); ?><br />
			<?php _e( 'Feel free to contact us.', 'contactus' ); ?>
			</p>
			<ul class="ContactUs__status--info" id="contactUsStatus">
				<li class="ContactUs__status ok" data-status="ok"><?php _e( 'Servers online', 'contactus' ); ?></li>
				<li class="ContactUs__status outage" data-status="outage">
					<svg class="icon icon-danger">
						<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg#danger' ); ?>"></use>
					</svg>
					<div class="message">
						<?php _e( 'We are currently experiencing problems.', 'contactus' ); ?>
						<strong><?php _e( 'More details', 'contactus' ); ?></strong>
					</div>
				</li>
				<li class="ContactUs__status degradation" data-status="degradation"><?php _e( 'Servers busy', 'contactus' ); ?></li>
				<li class="ContactUs__status unavailable" data-status="unavailable"><?php _e( 'Status unavailable', 'contactus' ); ?></li>
			</ul>
		</div>

		<ul class="ContactUs__menu">
			<?php
			if ( is_page() ) {
				global $post;
				$phone      = '+421 2 33 456 826';
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
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>phone.svg" alt="<?php _e( 'LiveAgent Phone', 'ms' ); ?>" />
				</a>
			</li>
					<?php
				}
			}
			?>
			<li class="ContactUs__menu--item">
				<div class="ContactUs__menu--link fakeChatButton no-icon hidden">
					<span class="fakeChatButton__text"><?php _e( 'Contact form', 'ms' ); ?></span>
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>form.svg" alt="<?php _e( "LiveAgent's Form", 'ms' ); ?>" />
					<span class="fakeChatButton__msg"><?php _e( 'Please accept our cookies before sending contact form.', 'ms' ); ?></span>
				</div>
				<span class="ContactUs__menu--link ContactUs__menu--link__form red" data-target="contactUsForm" data-close-target="contactUsMenu">
					<?php _e( 'Contact form', 'ms' ); ?>
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>form.svg" alt="<?php _e( "LiveAgent's Form", 'ms' ); ?>" />
				</span>
			</li>
			<li class="ContactUs__menu--item">
				<button onclick="contactUsMessenger()" class="ContactUs__menu--link violet" data-close-target="contactUsMenu" rel="nofollow noopener">
					Messenger
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>messenger.svg" alt="<?php _e( "LiveAgent's Messenger", 'ms' ); ?>" />
				</button>
			</li>
			<li class="ContactUs__menu--item">
				<button onclick="contactUsWhatsApp(this)" data-message="<?= esc_attr( __( 'Hi! I am contacting you from ', 'ms' ) . get_permalink() . __( ' and I am contacting you about...', 'ms' ) ); ?>" class="ContactUs__menu--link green" data-close-target="contactUsMenu"  rel="nofollow noopener">
					Whatsapp
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>whatsapp.svg" alt="<?php _e( "LiveAgent's WhatsApp", 'ms' ); ?>" />
				</button>
			</li>
			<li class="ContactUs__menu--item">
				<div class="ContactUs__menu--link fakeChatButton hidden">
					<span class="fakeChatButton__text"><?php _e( 'Live Chat', 'ms' ); ?></span>
					<div class="ContactUs__icon fakeChatButton__icon"></div>
					<span class="fakeChatButton__msg"><?php _e( 'Please accept our cookies before we start a chat.', 'ms' ); ?></span>
				</div>
				<span class="ContactUs__menu--link chat blue" id="chatBtn" data-close-target="contactUsMenu">
					<?php _e( 'Chat with an agent', 'ms' ); ?>
				</span>
			</li>
			<li class="ContactUs__menu--item chatbot">
				<div class="ContactUs__menu--link fakeChatButton hidden">
					<span class="fakeChatButton__text"><?php _e( 'Chat with a bot', 'ms' ); ?></span>
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>chatbot.svg" />
					<span class="fakeChatButton__msg"><?php _e( 'Please accept our cookies before we start a chat.', 'ms' ); ?></span>
				</div>
				<button class="ContactUs__menu--link blue" id="chatBot" data-close-target="contactUsMenu"  rel="nofollow noopener external">
					<?php _e( 'Chat with a bot', 'ms' ); ?>
					<img class="ContactUs__icon" src="<?= esc_url( $icons ); ?>chatbot.svg" />
				</button>
			</li>
		</ul>
	</nav>
</div>

<script id="urlslab-chatbot-script">
	const options= {btnTarget: '#chatBot', chatbotId: 'bd88d24e-1c7d-4dac-87b3-83ae34223f5b',
		chatbotUserId: 'b3JnLnBhYzRqLm9pZGMucHJvZmlsZS5PaWRjUHJvZmlsZToxMDUxMjgzNjQ3MzQxODgyMDI2NzVAQEBiZDg4ZDI0ZS0xYzdkLTRkYWMtODdiMy04M2FlMzQyMjNmNWI='};
	acceptButton.addEventListener( "click", () => {
		loadChatBot(options);
	});

	if ( getCookieFrontend( "cookieLaw" ) ) {
		loadChatBot(options);
	}
</script>

<script>
	const contactUsBtn = document.querySelector('.ContactUs__button');
	const statusUrl = 'https://status.postaffiliatepro.com/';

	contactUsBtn.addEventListener('click', async () => {
			const menu = document.querySelector('.ContactUs__menu--wrap');
			const statusInfo = document.querySelector('#contactUsStatus');

			if ( menu?.classList.contains('hidden') ) {
				const serviceStatus = await quStatusWidget.getStatus().then( ( result ) => {
					return displayStatusIndicator( result );
				});
				if ( serviceStatus === 'outage' ) {
					const statusInfoLink = statusInfo.querySelector(`[data-status^=${serviceStatus}]`);
					statusInfoLink.style.display = 'flex';
					statusInfoLink.addEventListener( 'click', () => window.open( statusUrl, '_blank' ) );
				}
			}
	})

	const quStatusWidget = {
		statusJsonUrl: `${statusUrl}/status.json`,
		async fetchJson() {
			try {
				const data = await fetch(this.statusJsonUrl);
				return await data.json();
			} catch (error) {
				console.log(error);
			}
		},
		async getStatus() {
			const status = await this.fetchJson();
			return status;
		}
	};


	function displayStatusIndicator(serviceStatus) {
		let statusClass = 'outage';
		if ( !serviceStatus ) {
			return 'unavailable';
		}
		if (serviceStatus?.outages?.length > 0) {
			statusClass = 'outage';
		} 
		if (serviceStatus?.degradations?.length > 0) {
			statusClass = 'degradation';
		}
		return statusClass;
	}


	function contactUsWhatsApp( element ) {
		const message = element.getAttribute( 'data-message' );
		const number = '15084695208';
		const whatsappLink = 'https://wa.me/' + number + '?text=' + encodeURIComponent( message );

		window.open( whatsappLink, '_blank' );
	}
	function contactUsMessenger() {
		const facebookLink = 'https://m.me/LiveAgent/';
		window.open( facebookLink, '_blank' );
	}
</script>
