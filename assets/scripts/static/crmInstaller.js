/* global _paq, Piwik, gtag, PostAffTracker, analytics, twq */
/* global quCrmData, getCookie, setCookie */

class CrmInstaller {
	constructor( installationElement ) {
		this.installationStarted = false;
		this.signupData = null;
		this.localized = quCrmData.localization;
		this.apiBase = quCrmData.apiBase;
		this.nonce = quCrmData.nonce;

		this.productDomain = 'postaffiliatepro.com';
		this.authTokenName = 'authToken';

		this.progress = 0;
		this.progressDots = '';

		this.fields = {
			main: installationElement,
		};

		this.trackers = {
			googleScript: "<img height='1' width='1' src='//www.googleadservices.com/pagead/conversion/942942148/imp.gif?label=xi5gCO_vxm0QxM_QwQM&amp;guid=ON&amp;script=0' />",
			capterraScript: '<img src="https://ct.capterra.com/capterra_tracker.gif?vid=2104150&vkey=c406f6f680b73b33c564d84edb87bde3" />',
		};
		this.pap = {
			account: 'default1',
			action: 'PAPtrial',
			campaign: '1',
		};
		this.pkvid = '';

		this.init();
	}

	init = () => {
		try {
			const signupResponse = getCookie( 'trial_signup_response' );
			this.signupData = JSON.parse( decodeURIComponent( signupResponse ) );
		} catch ( error ) {
			// eslint-disable-next-line no-console
			console.error( error );
		}

		if ( ! this.signupData ) {
			window.location.href = quCrmData.trialUrl;
			return;
		}

		this.fields.progressBar = this.fields.main.querySelector( '.progress-bar' );
		this.fields.loaderLabel = this.fields.main.querySelector( '.loader-label' );
		this.fields.progressHeart = this.fields.main.querySelector( '.progressHeart' );
		this.fields.progressPercentage = this.fields.main.querySelector( '.progressHeart span.percentage' );

		this.handleBuildingTitles();
		this.handleInstallation();
	};

	handleInstallation = async () => {
		const response = await this.checkInstallationProgress();

		if ( response.success ) {
			const data = response.data;

			if (
				data.account_status === undefined ||
				data.progress === undefined
			) {
				this.setProgress( 0 );
				this.setProgressText( this.localized.textFailedRetrieve );

				setTimeout( () => {
					this.handleInstallation();
				}, 1500 );

				return;
			}

			if ( ! this.installationStarted ) {
				this.handleStartupActions();
				this.installationStarted = true;
			}

			if ( data.account_status === 'I' ) {
				this.setProgress( data.progress );

				setTimeout( () => {
					this.handleInstallation();
				}, 1500 );

				return;
			}

			if ( data.account_status === 'A' ) {
				this.setProgress( 100 );
				this.handleFinishActions();

				// remove cookie after installation, installation process is available even the user refresh page or come back
				setCookie( 'trial_signup_response', '', -1 );

				if ( data.login_token ) {
					this.createGoToAppForm( data );
				}

				return;
			}
		}

		if ( ! response.success ) {
			this.setProgressText( response.message );
		}
	};

	checkInstallationProgress = async () => {
		try {
			const response = await fetch( this.apiBase + `subscriptions/${ this.signupData.id }/install_progress`, {
				method: 'GET',
				headers: {
					'Content-Type': 'application/json',
					accept: 'application/json',
					'X-WP-Nonce': this.nonce,
				},
			} );

			const result = await response.json();

			if ( response.ok ) {
				return {
					success: true,
					data: result,
				};
			}

			if ( result.message ) {
				return {
					success: false,
					message: result.message,
				};
			}
		} catch ( error ) {
			// eslint-disable-next-line no-console
			console.error( error );
			return {
				success: false,
				message: error.message,
			};
		}
	};

	setProgress = ( progress ) => {
		const roundedProgress = Math.round( progress );
		// If the new progress is greater than the current progress, update it.
		if ( this.progress <= roundedProgress ) {
			this.progress = roundedProgress;

			// Update the visual display of the progress bar.
			this.fields.progressBar.style.width = `${ this.progress }%`;
			this.fields.progressPercentage.textContent = `${ this.progress }%`;

			const path = this.fields.progressHeart.querySelector( 'path#heart-1' );
			if ( path ) {
				// eslint-disable-next-line no-mixed-operators
				path.style.strokeDashoffset = 269.663 - this.progress * ( 269.663 / 100 );
			}
		}

		if ( this.progress <= 32 ) {
			this.setProgressText( this.localized.textProgressInstalling );
		} else if ( this.progress <= 52 ) {
			this.setProgressText( this.localized.textProgressLaunching );
		} else if ( this.progress <= 99 ) {
			this.setProgressText( this.localized.textProgressRedirecting );
		} else if ( this.progress === 100 ) {
			this.setProgressText( this.localized.textProgressFinalizing );
		}
	};

	createGoToAppForm = ( data ) => {
		const headerTitles = this.fields.main.querySelectorAll( '.BuildingHeader' );

		if ( data.login_token ) {
			const redirectFormString =
			`<form method='POST' action='${ data.login_url }' data-id="trialform">
				<input type='hidden' name='action' value='login'>
				<input type='hidden' name='${ this.authTokenName }' value='${ data.login_token }'>
				<input type='hidden' name='l' value='${ this.signupData.language }'>
				<input type='submit' name='goto' value='${ this.localized.textGoToApp }' class='FinalButton' style='display: none;'>
				<a href='${ data.login_url }' data-id='gotoapp' class='FinalButton'>${ this.localized.textGoToApp }</a>
			</form>`;

			this.fields.main.querySelectorAll( '[data-id="redirectButtonPanel"]' ).forEach( ( elm ) => {
				elm.insertAdjacentHTML( 'beforeend', redirectFormString );
				elm.style.display = 'block';

				const redirectForm = elm.querySelector( 'form[data-id="trialform"]' );
				const goToButton = redirectForm.querySelector( '[data-id=gotoapp]' );

				if ( headerTitles.length ) {
					headerTitles.forEach( ( headerElm ) => {
						headerElm.textContent = this.signupData.isPapNetwork ? this.localized.textDoneAppTitleNetwork : this.localized.textDoneAppTitle;
					} );
					this.fields.main.classList.add( 'ApplicationReady' );
				}

				goToButton.addEventListener( 'click', ( e ) => {
					e.preventDefault();
					setTimeout( () => {
						const btn = e.target;
						const href = btn.href;
						let param = href.replace(
							`${ data.login_url }`,
							''
						);
						param = param.replace( '?', '' );

						if ( this.pkvid === '' ) {
							const url = `${ data.login_url }?${ param }`;
							redirectForm.setAttribute( 'action', url );
						} else if ( param === '' ) {
							const url = `${ data.login_url }${ this.pkvid }`;
							redirectForm.setAttribute( 'action', url );
						} else if ( this.pkvid === '' && param === '' ) {
							const url = `${ data.login_url }`;
							redirectForm.setAttribute( 'action', url );
						} else {
							const url = `${ data.login_url }${ this.pkvid }&${ param }`;
							redirectForm.setAttribute( 'action', url );
						}

						redirectForm.submit();
					}, 100 );
				} );
			} );

			return;
		}

		if ( headerTitles.length ) {
			const headerTexts = this.fields.main.querySelectorAll( '.BuildingText' );
			headerTitles.forEach( ( headerElm ) => {
				headerElm.textContent = this.signupData.isPapNetwork ? this.localized.textDoneAppTitleNetwork : this.localized.textDoneAppTitle;
			} );
			headerTexts.forEach( ( headerElm ) => {
				headerElm.textContent = this.signupData.isPapNetwork ? this.localized.textDoneAppTextNetwork : this.localized.textDoneAppText;
			} );

			this.fields.main.classList.add( 'ApplicationReady', 'ApplicationReady--spam' );
		}
	};

	setProgressText = ( text ) => {
		if ( this.progressDots.length > 2 ) {
			this.progressDots = '.';
		} else {
			this.progressDots += '.';
		}

		if ( this.progress === 100 ) {
			this.progressDots = '...';
		}

		if ( this.progress === 0 ) {
			this.progressDots = '';
		}

		this.fields.loaderLabel.textContent = `${ text }${ this.progressDots }`;
	};

	handleStartupActions = () => {
		this.handlePapAction();
		this.handleTrackersAction();
		this.handlePaqAction();

		if ( this.signupData.plan_type && typeof gtag !== 'undefined' ) {
			try {
				// gtag( 'event', this.signupData.plan_type, {
				// 	event_category: 'PAP SignUp',
				// } )
				gtag( 'set', 'user_data', { email: this.signupData.customer_email } );
				gtag( 'event', 'Trial_sign_up', { send_to: 'G-DLV457J560' } );
			} catch ( e ) {
				// eslint-disable-next-line no-console
				console.warn( 'Tracking script failed:', 'gtag' );
			}
		}

		try {
			window.uetq = window.uetq || [];
			window.uetq.push( 'event', 'SignUp', {
				event_category: 'Click',
				event_label: 'SignUp',
				event_value: '1',
			} );
		} catch ( e ) {
			// eslint-disable-next-line no-console
			console.warn( 'Tracking script failed:', 'uetq' );
		}
	};

	handleFinishActions = () => {
		if ( typeof _paq !== 'undefined' ) {
			try {
				_paq.push( [
					'trackEvent',
					'Trial',
					'created',
					`${ this.signupData.subdomain }.${ this.productDomain }`,
				] );
			} catch ( e ) {
				// eslint-disable-next-line no-console
				console.warn( 'Tracking script failed:', '_paq', 'trackEvent' );
			}

			if ( typeof Piwik === 'undefined' ) {
				this.pkvid = '';
			} else {
				try {
					this.pkvid = `?pk_vid=${ Piwik.getTracker().getVisitorId() }`;
				} catch ( e ) {
					// eslint-disable-next-line no-console
					console.warn( 'Tracking script failed:', 'Piwik' );
				}
			}
		}

		if ( typeof analytics !== 'undefined' ) {
			try {
				analytics.identify( null, { email: this.signupData.customer_email } );
				analytics.track( 'formSubmitted' );
			} catch ( e ) {
			// eslint-disable-next-line no-console
				console.warn( 'Tracking script failed:', 'analytics' );
			}
		}

		if ( typeof twq !== 'undefined' ) {
			try {
				twq( 'event', 'tw-odjc8-odje5', {} );
			} catch ( e ) {
				// eslint-disable-next-line no-console
				console.warn( 'Tracking script failed:', 'twq' );
			}
		}
	};

	handleBuildingTitles = () => {
		const headerTitles = this.fields.main.querySelectorAll( '.BuildingHeader' );
		const headerTexts = this.fields.main.querySelectorAll( '.BuildingText' );

		headerTitles.forEach( ( headerElm ) => {
			const text = headerElm.innerHTML;
			headerElm.innerHTML = text.replace( '%PRODUCT_VERSION%', this.signupData.isPapNetwork ? 'Network' : 'Pro' );
		} );

		headerTexts.forEach( ( headerElm ) => {
			const text = headerElm.innerHTML;
			headerElm.innerHTML = text.replace( '%PRODUCT_VERSION%', this.signupData.isPapNetwork ? 'Network' : 'Pro' );
		} );

		this.fields.main.querySelector( '.BuildingApp' ).classList.remove( 'invisible' );
	};

	handleTrackersAction = () => {
		Object.values( this.trackers ).forEach( ( tracker ) => {
			this.fields.main.insertAdjacentHTML( 'beforeend', tracker );
		} );
		if ( typeof fbq !== 'undefined' ) {
			this.fields.main.insertAdjacentHTML(
				'beforeend',
				`<script>try{ fbq('track', 'StartTrial' ); } catch ( e ) { console.warn( 'Tracking script failed:', 'fbq' ); }</script>`
			);
		}
	};

	handlePapAction = () => {
		if ( typeof PostAffTracker !== 'undefined' ) {
			try {
				PostAffTracker.setAccountId( this.pap.account );
				const sale = PostAffTracker.createAction( this.pap.action );
				sale.setTotalCost( '1' );
				sale.setOrderID( this.signupData.id );
				sale.setProductID( '' );
				sale.setData1( this.signupData.customer_email );
				sale.setData3( 'api_qu_signup' );
				sale.setData4( this.signupData.subdomain );
				sale.setCampaignID( this.pap.campaign );
				PostAffTracker.register();
			} catch ( e ) {
				// eslint-disable-next-line no-console
				console.warn( 'Tracking script failed:', 'PostAffTracker' );
			}
		}
	};

	handlePaqAction = () => {
		if ( typeof _paq !== 'undefined' ) {
			try {
				_paq.push( [ 'setObjectId', this.signupData.account_id ] );
				_paq.push( [
					'setCustomData',
					'cd1',
					btoa( encodeURIComponent( this.signupData.customer_name ) ),
				] );
				_paq.push( [
					'setCustomData',
					'cd2',
					btoa( encodeURIComponent( this.signupData.customer_email ) ),
				] );
				_paq.push( [
					'trackEvent',
					'Trial',
					'install',
					`${ this.signupData.subdomain }.${ this.productDomain }`,
				] );
			} catch ( e ) {
				// eslint-disable-next-line no-console
				console.warn( 'Tracking script failed:', '_paq' );
			}
		}
	};
}

( () => {
	// init installation progress on thank-you page
	const installWrapper = document.querySelector( '#loader[data-id=signup-trial-installation]' );
	if ( installWrapper ) {
		new CrmInstaller( installWrapper );
	}
} )();
