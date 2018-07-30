<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Nibble_Core
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function nibble_core_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'nibble_core_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function nibble_core_pingback_header() {
	if ( is_singular() && pings_open() ) {
		echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
	}
}
add_action( 'wp_head', 'nibble_core_pingback_header' );

function fb_the_password_form() {
    global $post;

    $label = 'pwbox-'.(empty($post->ID) ? rand() : $post->ID);
    $output = '<form action="' . esc_attr( get_option('siteurl') ) . '/wp-login.php?action=postpass" method="post">
    <div class="form-group"><p>' . esc_html__("This content is password protected. To view it please enter your password below:", 'nibble-core') . '</p>
    <p><label for="' . $label . '">' . __("Password", 'nibble-core') . ' <input class="form-control" name="post_password" id="' . $label . '" type="password" size="20" /></label> <input class="btn btn-outline-success" type="submit" name="Submit" value="' . esc_attr__("Unlock Content") . '" /></p>
    </div></form>';

    return $output;
}
add_filter('the_password_form', 'fb_the_password_form');
