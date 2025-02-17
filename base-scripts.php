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

	const mobile = window.matchMedia('(max-width: 768px)');

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

		consentGranted();
		grafana();
		postAffiliate();
	} )

	if ( trialButton !== null ) {
		trialButton.addEventListener( "click", () => {
			setCookie( 'cookieLaw', 'yes', 14 )
			document.querySelector( '.Kolaciky' ).classList.add( 'hide' )

			consentGranted();
			grafana();
			postAffiliate();
		});
	}
</script>

<!-- Google Tag Manager - No Cookies -->
<script>
	function loadGoogle() {
		const body  = document.body;
		const gtag1 = document.createElement('script');
		gtag1.async = true;
		gtag1.src = "https://www.googletagmanager.com/gtag/js?id=G-DLV457J560";

		body.insertAdjacentElement('beforeend', gtag1);
	}

	if ( ! mobile.matches ) {
		loadGoogle()
	}

	if ( mobile.matches && getCookieFrontend( "cookieLaw" ) ) {
		loadGoogle()
	}
</script>


<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

	// Default cookie permission for the rest of the world
	gtag('consent', 'default', {
		'ad_storage': 'granted',
		'ad_user_data': 'granted',
		'ad_personalization': 'granted',
		'analytics_storage': 'granted',
		'functionality_storage': 'granted',
	});

	// Override settings: Block cookies for EU countries
	gtag('consent', 'default', {
		'ad_storage': 'denied',
		'ad_user_data': 'denied',
		'ad_personalization': 'denied',
		'analytics_storage': 'denied',
		'functionality_storage': 'denied',
		'region': ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE', 'IS', 'LI', 'NO']
	})

  gtag('config', 'G-DLV457J560', {
		'allow_enhanced_conversions': true,
		'linker': {
			'domains': [
				'postaffiliatepro.com',
				'postaffiliatepro.fr',
				'postaffiliatepro.de',
				'postaffiliatepro.hu',
				'postaffiliatepro.com.br',
				'postaffiliatepro.es',
				'postaffiliatepro.nl',
				'postaffiliatepro.it',
				'postaffiliatepro.pl',
				'postaffiliatepro.sk',
				'support.liveagent.com',
				'ladesk.com'
			]
		}
	});

	// After consent is granted, all cookies and tracking are enabled
	function consentGranted() {
		gtag('consent', 'update', {
			'ad_storage': 'granted',  // Advertising cookies (Google Ads)
			'ad_user_data': 'granted', // Data for Google Ads
			'ad_personalization': 'granted', // Personalized ads
			'analytics_storage': 'granted', // Google Analytics cookies
			'functionality_storage': 'granted', // Functional cookies
		})
	}
</script>


<!-- Post Affiliate Pro -->
<script type="text/javascript">
	function postAffiliate() {
		(function(d,t) {
			var script = d.createElement(t); script.id= 'pap_x2s6df8d'; script.async = true;
			script.src = '//pap.qualityunit.com/scripts/m3j58hy8fd';
			script.onload = script.onreadystatechange = function() {
				var rs = this.readyState; if (rs && (rs != 'complete') && (rs != 'loaded')) return;
				PostAffTracker.setAccountId('default1');
				if ( !getCookieFrontend( "cookieLaw" ) ) {
					try {
						PostAffTracker.disableTrackingMethod('C');
						PostAffTracker.track();
					} catch (e) {}
				}
				if ( getCookieFrontend( "cookieLaw" ) ) {
					try {
						PostAffTracker.enableTrackingMethods();
						PostAffTracker.track();
					} catch (e) {}
				}
			}
			var placeholder = document.getElementById('papPlaceholder');
			placeholder.parentNode.insertBefore(script, placeholder);
		})(document, 'script');
	}

	if ( ! mobile.matches ) {
		postAffiliate()
	}

	if ( mobile.matches && getCookieFrontend( "cookieLaw" ) ) {
		postAffiliate()
	}
</script>

<!-- Grafana -->
<script>
	function grafana(cookie = true) {
		var _paq = window._paq || [];
		window._paq = _paq;

		if (cookie === false) {
			_paq.push(["disableCookies"]);
		}

		// _paq.push(['enableLinkTracking']);
		_paq.push(['trackPageView']);
		_paq.push(['enableCrossDomainLinking']);
		(function() {
			_paq.push(['setSiteId', 'PAP-web']);
			var d=document, g=d.createElement('script'), s=d.getElementsByTagName('script')[0];
			g.type='text/javascript'; g.async=true; g.defer=true; g.src='//analytics.qualityunit.com/i.js'; s.parentNode.insertBefore(g,s);
		})();
	}

	if ( ! mobile.matches ) {
		if ( getCookieFrontend( "cookieLaw" ) ) {
			grafana()
		} else {
			grafana(false)
		}
	}

	if ( mobile.matches && getCookieFrontend( "cookieLaw" ) ) {
		grafana()
	}
</script>

<!-- LiveAgent - Chat Button -->
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
					welcomeMessage: '<?= esc_html( __( 'Hi, I\'m LiveAgent support Bot. How can I help you?' ) ); ?>',
					inputPlaceholder: '<?= esc_html( __( 'Ask me anything...' ) ); ?>',
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
	! is_page( array( 'pricing', 'request-demo', 'demo', 'call', 'trial', 'thank-you', 'appsumo-signup', 'free-account', 'andrej', 'johngordon', 'michaela', 'tom', 'typing-test', 'tipptest', 'prueba-de-tipeo', 'test-de-saisie', 'test-di-digitazione', 'teste-de-digitacao', 'typetest', 'gepelesi-teszt', 'test-pisania', 'test-na-umenie-nabirat-tekst', 'dazi-ceshi' ) )
	&& ! is_post_type_archive( array( 'ms_glossary', 'ms_templates', 'ms_academy', 'ms_directory' ) )
	&& ! is_single( array( 'facebook', 'twitter', 'viber', 'instagram' ) )
	&& ! is_singular( array( 'ms_glossary', 'ms_templates', 'ms_academy', 'ms_directory', 'ms_about', 'post' ) )
	&& ! is_category( array( 'blog', 'news', 'reviews', 'growth', 'support', 'live-chat', 'help-desk-software' ) )
	&& ! is_search()
) {
	require_once get_template_directory() . '/contactus-box.php';
} elseif ( is_page( 'pricing' ) ) {
	?>
	<!-- Start of LiveAgent integration script: Chat button: PAP - Pricing -->
	<script type="text/javascript">
		(function(d, src, c) {
			var t = d.scripts[d.scripts.length - 1], s = d.createElement('script');
			s.id = 'la_x2s6df8d';
			s.defer = true;
			s.src = src;
			s.onload = s.onreadystatechange = function() {
				var rs = this.readyState;
				if (rs && rs !== 'complete' && rs !== 'loaded') return;
				c(this);
			};
			t.parentElement.insertBefore(s, t.nextSibling);
		})(document, 'https://support.ladesk.com/scripts/track.js',
			function(e) { LiveAgent.createButton('l33ptq36', e); });
	</script>
	<!-- End of LiveAgent integration script -->
	<?php
} elseif ( ! is_page( array( 'request-demo', 'demo', 'trial', 'thank-you', 'free-account' ) ) ) {
	?>
	<!-- Start of LiveAgent integration script: Chat button: PAP - Website multiwidget - chatbot -->
	<script type="text/javascript">
		(function(d, src, c) {
			var t = d.scripts[d.scripts.length - 1], s = d.createElement('script');
			s.id = 'la_x2s6df8d';
			s.defer = true;
			s.src = src;
			s.onload = s.onreadystatechange = function() {
				var rs = this.readyState;
				if (rs && rs !== 'complete' && rs !== 'loaded') return;
				c(this);
			};
			t.parentElement.insertBefore(s, t.nextSibling);
		})(document, 'https://support.ladesk.com/scripts/track.js',
			function(e) { LiveAgent.createButton('l82h9psn', e); });
	</script>
	<!-- End of LiveAgent integration script -->
	<?php
}
?>

<?php if ( is_page( 'trial' ) ) { ?>
	<!--Start of  Post Affiliate Pro integration script: CrozDesk Conversion Tracking-->
	<script type='text/javascript'>
		(function() {
			var cdx = document.createElement("script");  cdx.type = "text/javascript";  cdx.async = true;
			cdx.src = "https://trk.crozdesk.com/JJ2ye4YXFVAt3ozNznyx";
			var s = document.getElementsByTagName("script")[0];  s.parentNode.insertBefore(cdx,s);
		})();
	</script>
	<!--End of  Post Affiliate Pro integration script-->
<?php } ?>


<script>
	(function(w,d,s,l,i){
		// Create script loading promise
		const loadScript = new Promise((resolve) => {
			w[l] = w[l] || [];
			var f = d.getElementsByTagName(s)[0],
				j = d.createElement(s);
			j.async = true;
			j.src = i;
			// Add onload handler to resolve the promise
			j.onload = resolve;
			f.parentNode.insertBefore(j,f);
		});

		// Initialize FHTrck immediately after script loads
		loadScript.then(() => {
			if (window.FHTrck) {
				FHTrck.init({
					workspace_id: 'a9fb50ed-062e-45a2-8219-7ff3462c4483',
					customer_id: 1795092665,
					cookiesEnabled: getCookieFrontend("cookieLaw") ? true : false,
					appendSessionToLinks: true,
				});
			}
		}).catch(error => {
			console.warn('Failed to initialize FHTrck:', error);
		});
	})(window,document,'script','FHTrck','https://app.flowhunt.io/fh_trk.min.js');
</script>
