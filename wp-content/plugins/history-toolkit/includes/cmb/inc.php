<?php
/**
 * Include and setup custom metaboxes and fields. (make sure you copy this file to outside the CMB directory)
 *
 * Be sure to replace all instances of 'yourprefix_' with your project's prefix.
 * http://nacin.com/2010/05/11/in-wordpress-prefix-everything/
 *
 * @category YourThemeOrPlugin
 * @package  Metaboxes
 * @license  http://www.opensource.org/licenses/gpl-license.php GPL v2.0 (or later)
 * @link     https://github.com/WebDevStudios/CMB2
 */

if( ! function_exists("history_get_sidebars") ) {

	function history_get_sidebars() {

		global $wp_registered_sidebars;

		$sidebar_options = array();

		foreach ( $wp_registered_sidebars as $sidebar ) {
			$sidebar_options[$sidebar['id']] = $sidebar['name'];
		}
		return $sidebar_options;
	}
}

add_action( 'cmb2_init', 'register_history_metabox' );
/**
 * Hook in and add a demo metabox. Can only happen on the 'cmb2_init' hook.
 */
function register_history_metabox() {

	// Start with an underscore to hide fields from custom fields list
	$prefix = 'history_cf_';

	/* ## Page/Post Options ---------------------- */

	/* - Page Description */
	$cmb_page = new_cmb2_box( array(
		'id'            => $prefix . 'metabox_page',
		'title'         => __( 'Page Options', "history-toolkit" ),
		'object_types'  => array( 'page', 'post', 'history_portfolio', 'product' ), // Post type
		'context'       => 'normal',
		'priority'      => 'high',
		'show_names'    => true, // Show field names on the left
	) );

	$cmb_page->add_field( array(
		'name'             => 'Content Area Padding',
		'desc'             => 'If your content section need to have just after header area without space, please select an option Off',
		'id'               => $prefix . 'content_padding',
		'type'             => 'select',
		'default'          => 'on',
		'options'          => array(
			'on' => __( 'On', "history-toolkit" ),
			'off'   => __( 'Off', "history-toolkit" ),
		),
	) );
	
	$cmb_page->add_field( array(
		'name'             => 'Page Layout',
		'desc'             => 'Select an option',
		'id'               => $prefix . 'page_owlayout',
		'type'             => 'radio',
		'default'          => 'fixed',
		'options'          => array(
			//'default' =>  '<img title="Default" src="'. HISTORY_LIB .'/images/none.png" />',
			'fixed' =>  '<img title="Fixed" src="'. HISTORY_LIB .'/images/boxed.png" />',
			'fluid' =>  '<img title="Fluid" src="'. HISTORY_LIB .'/images/full.png" />'
		),
	) );

	$cmb_page->add_field( array(
		'name'             => 'Sidebar Position',
		'desc'             => 'Select an option',
		'id'               => $prefix . 'sidebar_owlayout',
		'type'             => 'radio',
		'default'          => 'right_sidebar',
		'options'          => array(
			//'default' =>  '<img src="'. HISTORY_LIB .'/images/none.png" />',
			'right_sidebar' =>  '<img src="'. HISTORY_LIB .'/images/right_side.png" />',
			'left_sidebar' =>  '<img src="'. HISTORY_LIB .'/images/left_side.png" />',
			'no_sidebar' =>  '<img src="'. HISTORY_LIB .'/images/no_side.png" />',
		),
	) );

	$cmb_page->add_field( array(
		'name'             => 'Widget Area',
		'desc'             => 'Select an option',
		'id'               => $prefix . 'widget_area',
		'type'             => 'select',
		'default'          => 'sidebar-1',
		'options'          => history_get_sidebars(),
	) );

	$cmb_page->add_field( array(
		'name'             => 'Page Header',
		'desc'             => 'Select an option',
		'id'               => $prefix . 'page_title',
		'type'             => 'select',
		'default'          => 'enable',
		'options'          => array(
			'enable' => __( 'Enable', "history-toolkit" ),
			'disable'   => __( 'Disable', "history-toolkit" ),
		),
	) );

	$cmb_page->add_field( array(
		'name' => __( 'Header Image', "history-toolkit" ),
		'desc' => __( 'Upload an image or enter a URL.', "history-toolkit" ),
		'id'   => $prefix . 'page_header_img',
		'type' => 'file',
	) );

	$cmb_page->add_field( array(
		'name' => __( 'Sub Title', "history-toolkit" ),
		'id'   => $prefix . 'page_subtitle',
		'type' => 'text',
	) );

	$cmb_page->add_field( array(
		'name' => __( 'Sub Title', "history-toolkit" ),
		'id'   => $prefix . 'page_subtitle',
		'type' => 'text',
	) );

	$prefix_cmb = "cmb_";

	/* ## Post Options ---------------------- */
	require_once( $prefix_cmb . "post.php");

	/* ## Gallery Options ---------------------- */
	require_once( $prefix_cmb . "gallery.php");

	/* ## Gallery Options ---------------------- */
	require_once( $prefix_cmb . "events.php");
}
?>