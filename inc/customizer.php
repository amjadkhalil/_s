<?php
/**
 * newname_ Theme Customizer
 *
 * @package newname_
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function newname_customize_register( $wp_customize ) {
	$wp_customize->getnewname_etting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->getnewname_etting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->getnewname_etting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'newname_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'newname_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'newname_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function newname_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function newname_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function newname_customize_preview_js() {
	wp_enqueuenewname_cript( 'newname_-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'newname_customize_preview_js' );
