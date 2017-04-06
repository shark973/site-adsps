<?php

if( !function_exists('history_sc_setup') ) {
	
	function history_sc_setup() {

		add_image_size( 'history_470_600', 470, 600, true ); // Welcome Carousel
		add_image_size( 'history_395_395', 395, 395, true ); // Event Layout 3
		add_image_size( 'history_85_70', 85, 70, true ); // Widget
		add_image_size( 'history_82_82', 82, 82, true ); // Widget
		add_image_size( 'history_95_95', 95, 95, true ); // Testimonials
		add_image_size( 'history_458_373', 458, 373, true ); // Events Layout 2
		add_image_size( 'history_570_350', 570, 350, true ); //Blog Layout 1
	}
	add_action( 'after_setup_theme', 'history_sc_setup' );
} 


if( function_exists('vc_map') ) {

	vc_add_param("vc_row", array(
		"type" => "dropdown",
		"group" => "Page Layout",
		"class" => "",
		"heading" => "Type",
		"param_name" => "type",
		'value' => array(
			__( 'Default', "history-toolkit" ) => 'default-layout',
			__( 'Fixed', "history-toolkit" ) => 'container',
		),
	));

	/* Include all individual shortcodes. */
	$prefix_sc = "sc_";

	require_once( $prefix_sc . "welcome_carousel.php" );
	require_once( $prefix_sc . "about_us.php" );
	require_once( $prefix_sc . "testimonials.php" );
	require_once( $prefix_sc . "clients.php" );
	require_once( $prefix_sc . "events.php" );
	require_once( $prefix_sc . "blog.php" );
	require_once( $prefix_sc . "gallery.php" );
	require_once( $prefix_sc . "content_block.php" );
	require_once( $prefix_sc . "video.php" );
	require_once( $prefix_sc . "contact_form.php" );
	require_once( $prefix_sc . "contact_map.php" );
}