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
	const trialButton = document.querySelector( "#createButtonmain" )

	const mobile = window.matchMedia('(max-width: 768px)');

	acceptButton.addEventListener( "click", () => {
		const demobarNow = document.querySelector( '#demobar' );

		if( demobarNow ) {
			demobarNow.classList.add( 'visible' );

			setTimeout( () => {
				demobarNow.classList.add( 'show' );
			}, 5000 );
		}

		consentGranted();
		grafana();
		gtm();
		buttonWrap();
		if ( typeof createButton == 'function' ) {
			createButton();
		}
		twitterTracking();
		postAffiliate();
	} )

	if ( trialButton !== null ) {
		trialButton.addEventListener( "click", () => {
			setCookie( 'cookieLaw', 'yes', 14 );
			document.querySelector( '.Kolaciky' ).classList.add( 'hide' );

			consentGranted();
			grafana();
			gtm();
			twitterTracking();
			postAffiliate();
		});
	}
</script>

<script>
	function loadGoogle() {
		const body  = document.body;
		const gtag1 = document.createElement('script');
		const gtag2 = document.createElement('script');
		gtag1.async = true;
		gtag2.async = true;
		gtag1.src = "https://www.googletagmanager.com/gtag/js?id=AW-942942148";
		gtag2.src = "https://www.googletagmanager.com/gtag/js?id=G-DLV457J560";

		body.insertAdjacentElement('beforeend', gtag1);
		body.insertAdjacentElement('beforeend', gtag2);
	}

	if ( ! mobile.matches ) {
		loadGoogle()
	}

	if ( mobile.matches && getCookieFrontend( "cookieLaw" ) ) {
		loadGoogle()
	}
</script>

<script>
	window.dataLayer = window.dataLayer || []
	function gtag() { dataLayer.push(arguments) }
	gtag('js', new Date())

	gtag('consent', 'default', {
		'ad_storage': 'granted',
		'analytics_storage': 'granted'
	})

	gtag('consent', 'default', {
		'ad_storage': 'denied',
		'analytics_storage': 'denied',
		'region': ['AT', 'BE', 'BG', 'HR', 'CY', 'CZ', 'DK', 'EE', 'FI', 'FR', 'DE', 'GR', 'HU', 'IE', 'IT', 'LV', 'LT', 'LU', 'MT', 'NL', 'PL', 'PT', 'RO', 'SK', 'SI', 'ES', 'SE', 'IS', 'LI', 'NO']
	})

	gtag('set', 'linker', {
		'accept_incoming': true,
		'domains': [
			'postaffiliatepro.com',
			'postaffiliatepro.nl',
			'postaffiliatepro.fr',
			'postaffiliatepro.de',
			'postaffiliatepro.hu',
			'postaffiliatepro.it',
			'postaffiliatepro.pl',
			'postaffiliatepro.com.br',
			'postaffiliatepro.sk',
			'postaffiliatepro.es',
			'support.qualityunit.com'
		]
	});

	function consentGranted() {
		gtag('consent', 'update', {
			'ad_storage': 'granted',
			'analytics_storage': 'granted'
		})
	}
</script>

<script>
	function grafana(cookie = true) {
		var _paq = window._paq || [];
		window._paq = _paq;

		if (cookie === false) {
			_paq.push(["disableCookies"]);
		}

		_paq.push(['enableLinkTracking']);
		_paq.push(['trackPageView']);
		_paq.push(['enableCrossDomainLinking']);
		window.onerror = function (msg, url, lineNo, columnNo, error) {
			var stackT = "";
			if (typeof(error) != 'undefined' && typeof(error.stack) != 'undefined') {
				stackT = error.stack.replace(/\n/g, ' ').substring(0, 1000);
			}
			_paq.push(['trackEvent', 'error', 'js', msg + "::" + url + "::" + lineNo + "::" + stackT, navigator.userAgent]);
		};
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

<!-- Google Tag Manager - Accepted Cookies -->
<script>
	function gtm() {
		(function (w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
					new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
				j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
				'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
		})(window,document,'script','dataLayer','GTM-52T6R8B');
	}
	if ( getCookieFrontend( "cookieLaw" ) ) {
		gtm()
	}
</script>

<script type="text/javascript">
	function buttonWrap() {
		setTimeout( function() {
			if ( document.querySelector( ".circleChatButtonWrap" ) != null ) {
				document.querySelectorAll( ".circleChatButtonWrap" ).forEach( ( e ) => {
					e.addEventListener( "click", () => {
						_paq.push( [ "trackEvent", "Activity", "Chat Button", "Click to Chat Button" ] )
						ga( "send", "event", "Chat Button", "start", "Click to Chat Button" )

					} )
				} )
			}
		}, 1500 )
	}
	if ( getCookieFrontend( "cookieLaw" ) ) {
		buttonWrap()
	}
</script>

<!-- LiveAgent - Chat Button -->
<?php
if (
		! is_page( array( 'request-demo', 'demo', 'call', 'trial', 'appsumo-signup', 'free-account', 'andrej', 'johngordon', 'michaela', 'tom', 'typing-test', 'tipptest', 'prueba-de-tipeo', 'test-de-saisie', 'test-di-digitazione', 'teste-de-digitacao', 'typetest', 'gepelesi-teszt', 'test-pisania', 'test-na-umenie-nabirat-tekst', 'dazi-ceshi' ) )
		&& ! is_post_type_archive( array( 'ms_glossary', 'ms_templates', 'ms_academy', 'ms_directory' ) )
		&& ! is_single( array( 'facebook', 'twitter', 'viber', 'instagram' ) )
		&& ! is_singular( array( 'ms_glossary', 'ms_templates', 'ms_academy', 'ms_directory', 'ms_about', 'post' ) )
		&& ! is_category( array( 'blog', 'news', 'reviews', 'growth', 'support', 'live-chat', 'help-desk-software' ) )
		&& ! is_search()
) {
	require_once get_template_directory() . '/contactus-box.php';
} ?>

<!-- Twitter Ads Tracking -->
<script>
	function twitterTracking() {
		!function(e,t,n,s,u,a){e.twq||(s=e.twq=function(){s.exe?s.exe.apply(s,arguments):s.queue.push(arguments);
		},s.version='1.1',s.queue=[],u=t.createElement(n),u.async=!0,u.src='https://static.ads-twitter.com/uwt.js',
			a=t.getElementsByTagName(n)[0],a.parentNode.insertBefore(u,a))}(window,document,'script');
		twq('config','odjc8');
	}
	if ( getCookieFrontend( "cookieLaw" ) ) {
		twitterTracking()
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

<?php
if ( WP_ENV != 'production' ) {
	?>
	<script type="module" defer>
		// import { onCLS, onFCP, onFID, onINP, onLCP, onTTFB } from 'https://unpkg.com/web-vitals@3.1.1/dist/web-vitals.js?module';
		//
		// function sendToGoogleAnalytics( { name, delta, id } ) {
		// 	gtag('event', name, {
		// 		event_category: 'Web Vitals',
		// 		event_label: id,
		// 		value: Math.round( name === 'CLS' ? delta * 1000 : delta ),
		// 		non_interaction: true,
		// 	});
		// }
		//
		// onCLS( sendToGoogleAnalytics );
		// onFCP( sendToGoogleAnalytics );
		// onFID( sendToGoogleAnalytics );
		// onINP( sendToGoogleAnalytics );
		// onLCP( sendToGoogleAnalytics );
		// onTTFB( sendToGoogleAnalytics );
	</script>
	<?php
}
?>
