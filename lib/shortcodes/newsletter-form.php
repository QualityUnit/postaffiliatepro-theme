<?php

function ms_newsletter_form() {
	ob_start();
	?>

	<div class="Newsletter__form">
		<form action="https://qualityunit.us3.list-manage.com/subscribe/post?u=18d6ab6093f8e6cdbbd783635&amp;id=d980471481" method="post" name="mc-embedded-subscribe-form" target="_blank">
			<svg>
				<use xlink:href="<?= esc_url( get_template_directory_uri() . '/assets/images/icons.svg?ver=' . THEME_VERSION . '#mail' ) ?>"></use>
			</svg>
			<input type="email" value="" placeholder="<?php _e( 'Type your e-mail for updates', 'ms' ); ?>" name="EMAIL" class="Input" maxlength="100" required>

			<div style="position: absolute; left: -5000px;" aria-hidden="true">
				<input type="text" name="b_18d6ab6093f8e6cdbbd783635_d980471481" tabindex="-1" value="">
			</div>

			<button type="submit" name="subscribe" class="Button Button--full" onclick="_paq.push(['trackEvent', 'Activity', 'Newsletter Footer', 'Signup'])">
				<span><?php _e( 'Subscribe', 'ms' ); ?></span>
			</button>
		</form>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'newsletterform', 'ms_newsletter_form' );
