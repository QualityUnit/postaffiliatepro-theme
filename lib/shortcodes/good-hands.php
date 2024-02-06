<?php
// Removing old shortcode block
function remove_old_goodhands( $content ) {
	if ( ! $content ) {
		return $content;
	}

	$dom = new DOMDocument();
	libxml_use_internal_errors( true );
	$dom->loadHTML( mb_convert_encoding( $content, 'HTML-ENTITIES', 'UTF-8' ) );
	libxml_clear_errors();
	$xpath       = new DOMXPath( $dom );
	$block_class = 'Reviews';
	$blocks      = get_nodes( $xpath, $block_class );


	foreach ( $blocks as $block ) {
		$block->parentNode->removeChild($block);
	}

	$dom->removeChild( $dom->doctype );
	$content = $dom->saveHtml();
	$content = str_replace( '<html><body>', '', $content );
	$content = str_replace( '</body></html>', '', $content );
	return $content;
}
add_filter( 'the_content', 'remove_old_goodhands', 9999 );


function ms_good_hands( $atts ) {
	return;
}

function ms_good_hands_redesign( $atts ) {
	$atts = shortcode_atts(
		array(
			'clients' => 0,
		),
		$atts,
		'good-hands-redesign'
	);

	ob_start();
	?>

	<section class="GoodHands">
		<div class="wrapper">
			<div class="GoodHands__text">
				<h3><?php _e( 'You will be<br/>in Good Hands!', 'ms' ); ?></h3>
				<p><?php _e( 'Join our community of happy clients and provide excellent customer support with Post Affiliate Pro.', 'ms' ); ?></p>

				<div class="Buttons">
					<a href="<?php _e( '/trial/', 'ms' ); ?>" class="Button Button--full">
						<span><?php _e( 'Start 14-days free trial', 'ms' ); ?></span>
					</a>
					<a href="<?php _e( '/demo/', 'ms' ); ?>" onclick="ga( 'send', 'event', 'Demo bar Button', 'start', 'Schedule a demo' )" class="Button Button--outline">
						<span><?php _e( 'Schedule a demo', 'ms' ); ?></span>
					</a>
				</div>
	
				<ul class="GoodHands__logos flex">
					<li class="GoodHands__logo">
						<a href="<?php _e( '/awards/', 'ms' ); ?>" title="Capterra">
							<img src="<?= esc_url( get_template_directory_uri() . '/assets/images/logo-capterra.svg?ver=' . THEME_VERSION ); ?>" alt="Capterra">
						</a>
						<div class="GoodHands__stars">
							<?php
								$logos = 1;
							while ( $logos <= 5 ) {
								?>
									<svg class="GoodHands__star"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#star-solid' ); ?>"></use></svg>
								<?php
								$logos++;
							}
							?>
						</div>
					</li>
					<li class="GoodHands__logo">
						<a href="<?php _e( '/awards/', 'ms' ); ?>" title="G2 Crowd">
							<img src="<?= esc_url( get_template_directory_uri() . '/assets/images/logo_g2.svg?ver=' . THEME_VERSION ); ?>" alt="G2 Crowd">
						</a>
						<div class="GoodHands__stars">
							<?php
								$logos = 1;
							while ( $logos <= 5 ) {
								?>
									<svg class="GoodHands__star"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#star-solid' ); ?>"></use></svg>
								<?php
								$logos++;
							}
							?>
						</div>
					</li>
					<li class="GoodHands__logo">
						<a href="<?php _e( '/awards/', 'ms' ); ?>" title="GetApp">
							<img src="<?= esc_url( get_template_directory_uri() . '/assets/images/logo_getapp.svg?ver=' . THEME_VERSION ); ?>" alt="GetApp">
						</a>
						<div class="GoodHands__stars">
							<?php
								$logos = 1;
							while ( $logos <= 5 ) {
								?>
									<svg class="GoodHands__star"><use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#star-solid' ); ?>"></use></svg>
								<?php
								$logos++;
							}
							?>
						</div>
					</li>
				</ul>
			</div>

			<div class="GoodHands__image">
				<img src="<?= esc_url( get_template_directory_uri() . '/assets/images/goodhands_image.png?ver=' . THEME_VERSION ); ?>" alt="<?php _e( 'Book a consult', 'ms' ); ?>" />
			</div>
		</div>
	</section>

	<?php
	return ob_get_clean();
}
add_shortcode( 'good-hands', 'ms_good_hands' );
add_shortcode( 'good-hands-redesign', 'ms_good_hands_redesign' );
