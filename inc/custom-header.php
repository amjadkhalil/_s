<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
	<?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package newname_
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses newname_headernewname_tyle()
 */
function newname_custom_headernewname_etup() {
	add_themenewname_upport( 'custom-header', apply_filters( 'newname_custom_header_args', array(
		'default-image'          => '',
		'default-text-color'     => '000000',
		'width'                  => 1000,
		'height'                 => 250,
		'flex-height'            => true,
		'wp-head-callback'       => 'newname_headernewname_tyle',
	) ) );
}
add_action( 'afternewname_etup_theme', 'newname_custom_headernewname_etup' );

if ( ! function_exists( 'newname_headernewname_tyle' ) ) :
	/**
	 * Styles the header image and text displayed on the blog.
	 *
	 * @see newname_custom_headernewname_etup().
	 */
	function newname_headernewname_tyle() {
		$header_text_color = get_header_textcolor();

		/*
		 * If no custom options for text are set, let's bail.
		 * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: add_themenewname_upport( 'custom-header' ).
		 */
		if ( get_themenewname_upport( 'custom-header', 'default-text-color' ) === $header_text_color ) {
			return;
		}

		// If we get this far, we have custom styles. Let's do this.
		?>
		<style type="text/css">
		<?php
		// Has the text been hidden?
		if ( ! display_header_text() ) :
			?>
			.site-title,
			.site-description {
				position: absolute;
				clip: rect(1px, 1px, 1px, 1px);
			}
		<?php
		// If the user has set a custom color for the text use that.
		else :
			?>
			.site-title a,
			.site-description {
				color: #<?php echo esc_attr( $header_text_color ); ?>;
			}
		<?php endif; ?>
		</style>
		<?php
	}
endif;
