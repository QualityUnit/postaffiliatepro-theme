const $categoryTagsMore = document.querySelectorAll( '.CategoryTags__more' );

if ( $categoryTagsMore.length > 0 ) {
	$categoryTagsMore.forEach( ( more ) => {
		more.addEventListener( 'click', ( event ) => {
			event.stopPropagation();
			const thisMore = event.target;
			const catTags = thisMore.closest( '.CategoryTags' );
			const content = catTags.parentElement;
			const moreText = thisMore.innerText;
			const hideText = thisMore.dataset.text;

			thisMore.innerText = hideText;
			thisMore.dataset.text = moreText;

			if ( ! catTags.classList.contains( 'active' ) ) {
				content.style.cssText = `height: ${
					content.getBoundingClientRect().height
				}px; overflow: hidden;`;
				thisMore.classList.add( 'active' );
			}

			if ( catTags.classList.contains( 'active' ) ) {
				content.style.cssText = null;
				thisMore.classList.remove( 'active' );
				catTags.classList.add( 'is-hiding' );
				catTags.addEventListener( 'transitionend', () => {
					catTags.classList.remove( 'is-hiding' );
				} );
			}

			catTags.classList.toggle( 'active' );
		} );
	} );
}
