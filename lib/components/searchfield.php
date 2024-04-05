<?php 
function searchfield( $placeholder = 'Search...' ) {
	ob_start();
	?>
<div class="searchfield inputField has-svg">
  <svg viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
	<path d="M9.167 16.583A7.417 7.417 0 1 0 9.166 1.75a7.417 7.417 0 0 0 .001 14.833Zm0-1.5a5.917 5.917 0 1 1 0-11.833 5.917 5.917 0 0 1 0 11.833Z" />
	<path d="m18.03 16.97-3.625-3.625a.75.75 0 0 0-1.061 1.06l3.625 3.625a.75.75 0 0 0 1.061-1.06Z" />
  </svg>
  <input
	  class="searchfield-input input input__text"
	  type="search"
	  value=""
	  placeholder="<?= esc_attr( $placeholder ); ?>"
	/>
</div>
	<?php
	return ob_get_clean();
}
?>
