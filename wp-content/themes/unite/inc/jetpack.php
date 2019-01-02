<?php
/**
 * Jetpack Compatibility File
 *
 * @package unite
 */

/**
 * Add theme support for Infinite Scroll.
 */
function unite_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'type' => 'click', 
		'container' => 'main',
		'footer'    => 'page',
	) );
}
add_action( 'after_setup_theme', 'unite_jetpack_setup' );
