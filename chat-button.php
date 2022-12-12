<script type="text/javascript">
		function createButton() {
			function getParameterByName( name ) {
				name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");

				const regex = new RegExp("[\\?&]" + name + "=([^&#]*)");
				const results = regex.exec(location.search);

				return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
			}

			const source = getParameterByName('utm_source');
			const brandingLinks = ['branding', 'chat', 'contactform', 'knowledge_base', 'textlink'];
			let timeout = 250;

			if ( brandingLinks.includes( source ) ) {
				timeout = 30000;
			}

			if ( window.innerWidth < 768 ) {
				timeout = 5000;
			}

			setTimeout( function() {
				(function(d, src, c) { s=d.createElement('script');s.id='la_x2s6df8d';s.async=true;s.src=src;s.onload=s.onreadystatechange=function(){var rs=this.readyState;if(rs&&(rs!='complete')&&(rs!='loaded')){return;}c(this);};document.querySelector('#chatBtn').appendChild(s);})(document,
						'//support.qualityunit.com/scripts/track.js',
						function(e){
							<?php if ( ICL_LANGUAGE_CODE === 'de' ) { ?>
							LiveAgent.createButton('ed2c5c36', e);
							<?php } elseif ( ICL_LANGUAGE_CODE === 'fr' ) { ?>
							LiveAgent.createButton('ed2c5c36', e);
							<?php } elseif ( ICL_LANGUAGE_CODE === 'es' ) { ?>
							LiveAgent.createButton('ed2c5c36', e);
							<?php } elseif ( ICL_LANGUAGE_CODE === 'pt-br' ) { ?>
							LiveAgent.createButton('ed2c5c36', e);
							<?php } elseif ( ICL_LANGUAGE_CODE === 'hu' ) { ?>
							LiveAgent.createButton('ed2c5c36', e);
							<?php } elseif ( ICL_LANGUAGE_CODE === 'nl' ) { ?>
							LiveAgent.createButton('ed2c5c36', e);
							<?php } elseif ( ICL_LANGUAGE_CODE === 'pl' ) { ?>
							LiveAgent.createButton('ed2c5c36', e);
							<?php } elseif ( ICL_LANGUAGE_CODE === 'it' ) { ?>
							LiveAgent.createButton('ed2c5c36', e);
							<?php } else { ?>
							LiveAgent.createButton('ed2c5c36', e);
							<?php } ?>
						});
			}, timeout );
		}
		if ( getCookieFrontend( "cookieLaw" ) ) {
			createButton()
		}
	</script>
