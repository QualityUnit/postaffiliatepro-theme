const dropdown = document.querySelector( '.dropdown' );
const selected = document.querySelector( '.selected' );
const menu = document.querySelector( '.Archive__header__dropdown--menu' );
const items = document.querySelectorAll( '.Archive__header__dropdown--menu--item' );

dropdown.addEventListener( 'click', () => {
	menu.classList.toggle( 'menu-open' );
} );
items.forEach( ( item ) => {
	item.addEventListener( 'click', () => {
		selected.innerText = item.innerText;
		menu.classList.toggle( 'menu-open' );
		items.forEach( ( option ) => {
			option.classList.remove( 'active' );
		} );
		item.classList.add( 'active' );
	} );
} );
