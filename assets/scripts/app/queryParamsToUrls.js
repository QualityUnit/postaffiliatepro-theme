// adds all query params from incoming URL to urls on page

( () => {
	const currentHostname = window.location.hostname;

	// If the hostname contains 'admin', exit the script
	if ( currentHostname.includes( 'admin' ) ) {
		return;
	}

	const queryParams = new URL( window.location ).searchParams;
	const blacklist = [ 'p' ];
	const allUrls = document.querySelectorAll( 'a[href]' );

	allUrls.forEach( ( url ) => {
		const currentHref = url.getAttribute( 'href' );

		// Skip links that are empty or placeholders
		if ( currentHref === '#' || currentHref === '#0' || currentHref === '' ) {
			return;
		}

		const currentUrl = new URL( url.href );

		// Add query parameters to the URL if not blacklisted
		queryParams.forEach( ( value, key ) => {
			if ( ! blacklist.includes( key ) ) {
				currentUrl.searchParams.set( key, value );
			}
		} );

		// Update the URL if the hostname contains 'postaffiliate'
		if ( currentUrl.hostname.includes( 'postaffiliate' ) ) {
			url.href = currentUrl.toString();
		}
	} );
} )();
