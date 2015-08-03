<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package tndistillersguild
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function tndistillersguild_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'tndistillersguild_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function tndistillersguild_jetpack_setup
add_action( 'after_setup_theme', 'tndistillersguild_jetpack_setup' );

/**
 * Custom render function for Infinite Scroll.
 */
function tndistillersguild_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function tndistillersguild_infinite_scroll_render
