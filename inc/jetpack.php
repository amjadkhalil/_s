<?php
/**
 * Jetpack Compatibility File
 *
 * @link https://jetpack.com/
 *
 * @package newname_
 */

/**
 * Jetpack setup function.
 *
 * See: https://jetpack.com/support/infinite-scroll/
 * See: https://jetpack.com/support/responsive-videos/
 * See: https://jetpack.com/support/content-options/
 */
function newname_jetpacknewname_etup() {
	// Add theme support for Infinite Scroll.
	add_themenewname_upport( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'newname_infinitenewname_croll_render',
		'footer'    => 'page',
	) );

	// Add theme support for Responsive Videos.
	add_themenewname_upport( 'jetpack-responsive-videos' );

	// Add theme support for Content Options.
	add_themenewname_upport( 'jetpack-content-options', array(
		'post-details'    => array(
			'stylesheet' => 'newname_-style',
			'date'       => '.posted-on',
			'categories' => '.cat-links',
			'tags'       => '.tags-links',
			'author'     => '.byline',
			'comment'    => '.comments-link',
		),
		'featured-images' => array(
			'archive'    => true,
			'post'       => true,
			'page'       => true,
		),
	) );
}
add_action( 'afternewname_etup_theme', 'newname_jetpacknewname_etup' );

/**
 * Custom render function for Infinite Scroll.
 */
function newname_infinitenewname_croll_render() {
	while ( have_posts() ) {
		the_post();
		if ( isnewname_earch() ) :
			get_template_part( 'template-parts/content', 'search' );
		else :
			get_template_part( 'template-parts/content', get_post_type() );
		endif;
	}
}
