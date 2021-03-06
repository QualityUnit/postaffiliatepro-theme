<?php

function ms_extrafaq( $atts ) {
	$atts = shortcode_atts(
		array(
			'schema'      => 'yes',
			'headline'    => '',
			'subheadline' => '',
			'question-1'  => '',
			'answer-1'    => '',
			'question-2'  => '',
			'answer-2'    => '',
			'question-3'  => '',
			'answer-3'    => '',
			'question-4'  => '',
			'answer-4'    => '',
			'question-5'  => '',
			'answer-5'    => '',
			'question-6'  => '',
			'answer-6'    => '',
			'question-7'  => '',
			'answer-7'    => '',
			'question-8'  => '',
			'answer-8'    => '',
			'question-9'  => '',
			'answer-9'    => '',
			'question-10' => '',
			'answer-10'   => '',
		),
		$atts,
		'extrafaq'
	);

	ob_start();
	?>

	<div class="Faq Post__m__negative" itemscope itemtype="https://schema.org/FAQPage">
		<h2>
		<?php 
			$headline = esc_html( $atts['headline'] );
			$words    = explode( ' ', $headline );
			$counter  = 0;
		foreach ( $words as $word ) {
			if ( 0 === $counter ) {
				echo '<span class="highlight highlight-splash3">' . esc_html( $words[0] ) . '</span>';
			} else {
				echo ' ';
				echo esc_html( $word );
			}
			$counter++;
		}
		echo '</h2>';
		if ( $atts['subheadline'] ) {
			?>
			<div class="subhead--wrapper">
				<p class="subhead"><?= esc_html( $atts['subheadline'] ); ?></p>
			</div>
			<?php
		}
		for ( $i = 1; $i <= 10; ++$i ) {
			if ( $atts[ 'question-' . $i ] && $atts[ 'answer-' . $i ] ) {
				?>
				<div class="Faq__item" itemscope itemprop="mainEntity" itemtype="https://schema.org/Question">
					<h3 itemprop="name"><?= esc_html( $atts[ 'question-' . $i ] ); ?></h3>
					<div class="Faq__outer-wrapper" itemscope itemprop="acceptedAnswer" itemtype="https://schema.org/Answer">
						<div class="Faq__inner-wrapper" itemprop="text">
							<p><?= esc_html( $atts[ 'answer-' . $i ] ); ?></p>
						</div>
					</div>
				</div>
				<?php
			}
		}
		?>
	</div>

	<?php
	return ob_get_clean();
}
add_shortcode( 'extrafaq', 'ms_extrafaq' );
