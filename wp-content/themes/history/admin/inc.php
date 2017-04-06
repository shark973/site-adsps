<?php

/* TGM Plugin Activation Notice */
require get_template_directory() .'/admin/tgm/tgm.php';

if ( class_exists( 'ReduxFramework' ) ) {

	/* Theme Options */
	require get_template_directory() .'/admin/theme-options/theme-options.php';
}

if ( !function_exists('history_admin_enqueue') ) :

	function history_admin_enqueue() {

		wp_enqueue_media();

		wp_enqueue_script( 'history-admin-functions', get_template_directory_uri() . '/admin/js/functions.js', array( 'jquery' ),  null, true );
		wp_enqueue_style( 'history-admin-css', get_template_directory_uri() . '/admin/css/style.css', false, '1.0.0' );
	}
	add_action( 'admin_enqueue_scripts', 'history_admin_enqueue' );
endif;