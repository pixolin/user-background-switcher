<?php
/*
* Enqueue JavaScript
*/

add_action( 'wp_enqueue_scripts', 'bgs_enqueue_js' );

if ( ! function_exists( 'bgs_enqueue_js' ) ) {
	function bgs_enqueue_js( $plugin_version ) {
		//automatically fetch version number
		$file_data = get_file_data( __FILE__, array( 'version' => 'Version' ) );
		//use minified JavaScript, if not in DEBUG mode
		$maybe_min = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';

		wp_register_script(
			$handle = 'bgsbodyclass',
			$src = plugins_url( '../js/bgs-bodyclass'.$maybe_min.'.js' , __FILE__ ),
			$deps = array( 'jquery' ),
			$ver = $file_data['version'],
			$in_footer = true
		);
		wp_enqueue_script( 'bgsbodyclass' );
	}
}

/**
 * Enqueue Stylesheet
 */

add_action( 'wp_enqueue_scripts', 'bgs_enqueue_style' );

function bgs_enqueue_style() {
	wp_enqueue_style(
		$handle = 'bgswitcher',
		$src = admin_url( 'admin-ajax.php' ).'?action=dynamic_css'
	);
}

/**
 * Dynamically load stylesheet
 */
add_action( 'wp_ajax_dynamic_css', 'dynamic_css' );
add_action( 'wp_ajax_nopriv_dynamic_css', 'dynamic_css' );

function dynamic_css() {
	require( plugin_dir_path( __FILE__ ) . '../css/dynamic.css.php' );
	exit;
}
