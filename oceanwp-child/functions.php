<?php
/**
 * Child theme functions
 *
 * When using a child theme (see http://codex.wordpress.org/Theme_Development
 * and http://codex.wordpress.org/Child_Themes), you can override certain
 * functions (those wrapped in a function_exists() call) by defining them first
 * in your child theme's functions.php file. The child theme's functions.php
 * file is included before the parent theme's file, so the child theme
 * functions would be used.
 *
 * Text Domain: oceanwp
 * @link http://codex.wordpress.org/Plugin_API
 *
 */

/**
 * Load the parent style.css file
 *
 * @link http://codex.wordpress.org/Child_Themes
 */
function oceanwp_child_enqueue_parent_style() {
	// Dynamically get version number of the parent stylesheet (lets browsers re-cache your stylesheet when you update your theme)
	$theme   = wp_get_theme( 'OceanWP' );
	$version = $theme->get( 'Version' );
	// Load the stylesheet
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css', array( 'oceanwp-style' ), $version );
}

function oceanwp_child_enqueue_custom_script() {
	// Load javascript for slideshow
	wp_enqueue_script('slider_js', get_stylesheet_directory_uri() . '/slideshow.js', array(), '1.0', true);
}

function get_slider_HTML() {
	$sliderHTML = file_get_contents("/app/public/wp-content/themes/oceanwp-child/index.html");
	return $sliderHTML;
}
add_shortcode('slider', 'get_slider_HTML');

add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_parent_style' );
add_action( 'wp_enqueue_scripts', 'oceanwp_child_enqueue_custom_script' );