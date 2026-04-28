<?php
/**
	* Define Theme Version
 */
define( 'DOCTORHUB_THEME_VERSION', '1.4' );	
	
function doctorhub_css() {
	$parent_style = 'medazin-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'doctorhub-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('doctorhub-color-default',get_stylesheet_directory_uri() .'/assets/css/color/default.css');
	wp_dequeue_style('medazin-default');
	
	wp_enqueue_script('doctorhub-custom',get_stylesheet_directory_uri().'/assets/js/custom.js',array('jquery'),false,true);
	// wp_dequeue_style('medazin-media-query');
	wp_dequeue_style('medazin-fonts');
}
add_action( 'wp_enqueue_scripts', 'doctorhub_css',999);

/**
 * Implement the Custom Header feature.
 */
require_once get_stylesheet_directory() . '/inc/custom-header.php';

/**
 * Called all the Customize file.
 */
 require( get_stylesheet_directory() . '/inc/customize/doctorhub-premium.php');
/**
 * Import Options From Parent Theme
 *
 */
function doctorhub_parent_theme_options() {
	$medazin_mods = get_option( 'theme_mods_doctorhub' );
	if ( ! empty( $medazin_mods ) ) {
		foreach ( $medazin_mods as $medazin_mod_k => $medazin_mod_v ) {
			set_theme_mod( $medazin_mod_k, $medazin_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'doctorhub_parent_theme_options' );