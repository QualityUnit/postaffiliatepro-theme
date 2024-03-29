<?php

function ms_languages( $atts ) {
	$regions = array(
		'europe'  => __( 'Europe', 'ms' ),
		'asia'    => __( 'Asia', 'ms' ),
		'mideast' => __( 'Middle East', 'ms' ),
		'america' => __( 'America', 'ms' ),
	);

	$atts = shortcode_atts(
		array(
			'europe_from'  => '0',
			'europe_to'    => '8',
			'asia_from'    => '0',
			'asia_to'      => '0',
			'mideast_from' => '0',
			'mideast_to'   => '0',
			'america_from' => '8',
			'america_to'   => '10',
		),
		$atts,
		'languages'
	);

		$lang_codes = array();
		$lang_flags = array();
		$lang_urls = array();
		$lang_names = array();
		$lang_active = array();

		$flags = get_template_directory_uri() . '/assets/images/flags.svg?ver=' . THEME_VERSION . '#';
		$languages = icl_get_languages();
	foreach ( $languages as $lang ) {
		$lang_codes[]  = $lang['language_code'];
		$lang_flags[]  = strtolower( preg_replace( '/.+?_/', '', $lang['default_locale'] ) );
		$lang_urls[]   = $lang['url'];
		$lang_names[]  = $lang['native_name'];
		$lang_active[] = $lang['active'];
	}

		ob_start();
	?>
		<div class="Header__flags--main">
			<ul>
				<?php
				foreach ( $languages as $lang ) {
					if ( $lang['active'] ) {
						$lang_flag = strtolower( preg_replace( '/.+?_/', '', $lang['default_locale'] ) );
						echo '<li class="Header__flags--item Header__flags--item-active Header__flags--item-' . esc_html( $lang['language_code'] ) . '" lang="' . esc_attr( $lang['language_code'] ) . '"><span id="languageSwitcher-toggle" class="Header__flags--item-toggle"><h3>' . esc_html( 'Languages' ) . '</h3><svg class="Header__flags--item-flag" aria-label="' . esc_attr( $lang['language_code'] ) . '"><use xlink:href="' . esc_url( $flags ) . 'flag-' . esc_html( $lang_flag ) . '"></use></svg></span>';
					}
				}
				?>

				<div class="Header__flags--mainmenu">
					<?php
					foreach ( $regions as $region => $name ) {
						if ( ! empty( $atts[ $region . '_from' ] ) || ! empty( $atts[ $region . '_to' ] ) ) {
							?>
							<input class="input--region hidden" name="regions" type="radio" id="<?= esc_attr( $region ); ?>" />
							<label class="Header__flags--region-switcher" for="<?= esc_attr( $region ); ?>"><?= esc_html( $name ); ?></label>
							<?php
						}
					}
					?>
					<div class="Header__flags--regions">
						<?php
						foreach ( $regions as $region => $name ) {
							if ( ! empty( $atts[ $region . '_from' ] ) || ! empty( $atts[ $region . '_to' ] ) ) {
								?>
								<div class="Header__flags--region Header__flags--region-<?= esc_html( $region ); ?>">
									<div class="Header__flags--region-title h4"><?= esc_html( $name ); ?></div>
									<?php
									create_language_menu( $region, $atts, $lang_urls, $lang_flags, $lang_codes, $lang_names, $lang_active );
									?>
								</div>
								<?php
							}
						}
						?>
					</div>
				</div>
				</li>
			</ul>
		</div>
		<?php
		return ob_get_clean();
}
add_shortcode( 'languages', 'ms_languages' );
