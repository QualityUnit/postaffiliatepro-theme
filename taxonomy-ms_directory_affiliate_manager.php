<?php // @codingStandardsIgnoreLine

if ( 'index' === get_queried_object()->slug ) {
	require_once 'lib/includes/affiliate-manager/archive.php';
}
if ( 'index' !== get_queried_object()->slug ) {
	require_once 'lib/includes/affiliate-manager/affiliate-manager.php';
	require_once 'lib/includes/affiliate-manager/affiliate-manager-layout.php';
	?>

	<?php
}
