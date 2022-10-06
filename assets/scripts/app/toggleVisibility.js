const activators = document.querySelectorAll( '[data-target]' );
const targets = document.querySelectorAll( '[data-targetId]' );
const targetClosers = document.querySelectorAll( '[data-close]' );

// let isPaused = false;

if ( activators.length > 0 ) {
	activators.forEach( ( elem ) => {
		const activator = elem;

		const hideVisible = () => {
			targets.forEach( ( targetElement ) => {
				targetElement.classList.remove( 'visible' );
				targetElement.classList.add( 'hidden' );
			} );
		};

		activator.addEventListener( 'click', ( event ) => {
			event.stopPropagation();
			const thisActivator = event.target;
			const thisTarget = document.querySelectorAll(
				`[data-targetId="${ thisActivator.dataset.target }"]`
			);

			hideVisible();
			// isPaused = true;

			thisTarget.forEach( ( target ) => {
				target.classList.remove( 'hidden' );
				thisActivator.classList.add( 'active' );
				setTimeout( () => {
					target.classList.add( 'visible' );
				}, 0 );
			} );
		} );
	} );
}

if ( targetClosers.length ) {
	const hideTargets = ( targetsToHide ) => {
		targetsToHide.forEach( ( targetElement ) => {
			targetElement.classList.remove( 'visible' );
			targetElement.classList.add( 'hidden' );
		} );
	};

	targetClosers.forEach( ( closer ) => {
		const targetId = closer.dataset.close;
		const targetsToHide = document.querySelectorAll( `[data-targetId="${ targetId }"]` );

		closer.addEventListener( 'click', () => {
			hideTargets( targetsToHide );
		} );
		closer.removeEventListener( 'click', hideTargets );
	} );
}
