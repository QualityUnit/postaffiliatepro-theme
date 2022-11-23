<?php
function ms_alternatives() {
	ob_start();
	?>

	<div class="WordCloud__container">
		<a href="<?php _e( '/affiliatewp-alternative/', 'ms' ); ?>">
			<?php _e( 'Affiliatewp', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/cake-alternative/', 'ms' ); ?>">
			<?php _e( 'Cake', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/tune-alternative/', 'ms' ); ?>">
			<?php _e( 'Tune', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/idevaffiliate-alternative/', 'ms' ); ?>">
			<?php _e( 'Idevaffiliate', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/jam-alternative/', 'ms' ); ?>">
			<?php _e( 'Jam', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/leaddyno-alternative/', 'ms' ); ?>">
			<?php _e( 'Leaddyno', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/osiaffiliate-alternative/', 'ms' ); ?>">
			<?php _e( 'Osiaffiliate', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/refersion-alternative/', 'ms' ); ?>">
			<?php _e( 'Refersion', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/scaleo-alternative/', 'ms' ); ?>">
			<?php _e( 'Scaleo', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/voluum-alternative/', 'ms' ); ?>">
			<?php _e( 'Voluum', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/affise-alternative/', 'ms' ); ?>">
			<?php _e( 'Affise', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/afftrack-alternative/', 'ms' ); ?>">
			<?php _e( 'Afftrack', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/allaffiliatepro-alternative/', 'ms' ); ?>">
			<?php _e( 'Allaffiliatepro', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/clickinc-alternative/', 'ms' ); ?>">
			<?php _e( 'Clickinc', 'ms' ); ?>
		</a>
		<a href="<?php _e( '/firstpromoter-alternative/', 'ms' ); ?>">
			<?php _e( 'Firstpromoter', 'ms' ); ?>
		</a>
	</div>

	<?php
	set_custom_source( 'shortcodes/WordCloud' );
	return ob_get_clean();
}
add_shortcode( 'alternatives', 'ms_alternatives' );
