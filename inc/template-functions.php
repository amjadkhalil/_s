<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package newname_
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function newname_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! isnewname_ingular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_activenewname_idebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'newname_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function newname_pingback_header() {
	if ( isnewname_ingular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'newname_pingback_header' );
