<script>

	const getCookieFrontend = ( name ) => {
		const nameEq = `${name}=`
		const ca = document.cookie.split( ";" )
		for ( let i = 0; i < ca.length; i += 1 ) {
			let c = ca[ i ]
			while ( c.charAt( 0 ) === " " ) {
				c = c.substring( 1, c.length )
			}
			if ( c.indexOf( nameEq ) === 0 ) {
				return c.substring( nameEq.length, c.length )
			}
		}
		return null
	}

	const acceptButton = document.querySelector( ".Kolaciky__button--yes" )
	const trialButton = document.querySelector( "button[data-id=createButtonmain]" )

	acceptButton.addEventListener( "click", () => {
		const demobarNow = document.querySelector( '#demobar' )

		if( demobarNow ) {
			demobarNow.classList.add( 'visible' )

			setTimeout( () => {
				demobarNow.classList.add( 'show' )
			}, 5000 )
		}

		gtmWithCookie()
		if ( typeof createButton == 'function' ) {
			createButton()
		}
	} )

	if ( trialButton !== null ) {
		trialButton.addEventListener( "click", () => {
			setCookie( 'cookieLaw', 'yes', 14 )
			document.querySelector( '.Kolaciky' ).classList.add( 'hide' )

			gtmWithCookie();
		});
	}
</script>

<!-- Google Tag Manager - No Cookies -->
<script>
	(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
			new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
		j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
		'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
	})(window,document,'script','dataLayer','GTM-W4JBQR9');
</script>

<!-- Google Tag Manager - Accepted Cookies -->
<script>
	function gtmWithCookie() {
		(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
				new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
			j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
			'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-52T6R8B');
	}
	if ( getCookieFrontend( "cookieLaw" ) ) {
		gtmWithCookie()
	}
</script>

<!-- LiveAgent - Chat Button -->

<script>
	function loadChatBot({ chatbotId, chatbotUserId, btnTarget }) {
		const chatBotButton = document.querySelector(btnTarget);
		chatBotButton.classList.remove('hidden');

		(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
		'https://www.urlslab.com/public/w/v1/urlslab-chat-widget.js',
		function(e){
			const chatbotManager = UrlslabChatbot.initChatbot({
				showChatButton: false, // important to not show chat button on page load
				chatbotId: chatbotId,
				chatbotUserId: chatbotUserId,
				welcomeMessage: 'Hi, I\'m PostAffiliatePro Bot. How can I help you?',
				inputPlaceholder: 'Ask me any question...',
				suggestedUserMessages: [],
				urlSuffix: '?utm_medium=chatbot&utm_source=urlslab',
				maxWindowWidth: '500px',
			});
			chatBotButton.addEventListener('click', () => {
				chatbotManager.openChat();
			});
		});
	}
</script>

<script type="text/javascript" id="fh-chatbot-script">
	function loadChatBot( { chatbotId, workspaceId, btnTarget } ) {
		const chatBotButton = document.querySelector( btnTarget );
		try {
			chatBotButton.classList.remove('hidden');
		} catch (error) {
		}

		(function(d, src, c) { var t=d.scripts[d.scripts.length - 1],s=d.createElement('script');s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};t.parentElement.insertBefore(s,t.nextSibling);})(document,
			'https://app.flowhunt.io/fh-chat-widget.js?v=1.0.19',
			function(e){
				const chatbotManager = FHChatbot.initChatbot({
					showChatButton: false, // important to not show chat button on page load
					chatbotId: chatbotId,
					workspaceId: workspaceId,
					welcomeMessage: 'Hi, I\'m LiveAgent support Bot. How can I help you?',
					inputPlaceholder: 'Ask me any  ...',
					suggestedUserMessages: [],
					urlSuffix: '?utm_medium=chatbot&utm_source=flowhunt',
					maxWindowWidth: '500px',
				});
				chatBotButton.addEventListener('click', () => {
					chatbotManager.openChat();
				});
			});
	}
</script>
<?php
if (
		! is_page( array( 'request-demo', 'demo', 'call', 'trial', 'thank-you', 'appsumo-signup', 'free-account', 'andrej', 'johngordon', 'michaela', 'tom', 'typing-test', 'tipptest', 'prueba-de-tipeo', 'test-de-saisie', 'test-di-digitazione', 'teste-de-digitacao', 'typetest', 'gepelesi-teszt', 'test-pisania', 'test-na-umenie-nabirat-tekst', 'dazi-ceshi' ) )
		&& ! is_post_type_archive( array( 'ms_glossary', 'ms_templates', 'ms_academy', 'ms_directory' ) )
		&& ! is_single( array( 'facebook', 'twitter', 'viber', 'instagram' ) )
		&& ! is_singular( array( 'ms_glossary', 'ms_templates', 'ms_academy', 'ms_directory', 'ms_about', 'post' ) )
		&& ! is_category( array( 'blog', 'news', 'reviews', 'growth', 'support', 'live-chat', 'help-desk-software' ) )
		&& ! is_search()
) {
	require_once get_template_directory() . '/contactus-box.php';
} elseif (
		! is_page( array( 'request-demo', 'demo', 'trial', 'thank-you', 'free-account' ) )
	) {
	?>
	<button class="ContactUs__chatBotOnly hidden" id="chatBotOnly" rel="nofollow noopener external">
		<img class="ContactUs__icon" src="<?= esc_url( get_template_directory_uri() . '/assets/images/contact/chatbot.svg' ); ?>" />
	</button>

	<script type="text/javascript" id="fh-chatbot-script">
		const chatBtnOptions = {	chatbotId: 'ee7cb389-4f00-441f-a287-07a43f72f1e3',
			workspaceId: '4d1adbc8-edfa-48c1-b93a-a8096d28f5e7',
			btnTarget: '#chatBotOnly'}
		acceptButton.addEventListener( "click", () => {
			loadChatBot(chatBtnOptions);
		});

		if ( getCookieFrontend( "cookieLaw" ) ) {
			loadChatBot(chatBtnOptions);
		}
	</script>
	<?php
}

?>
