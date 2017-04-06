<?php
/* CPT : Events */
if ( ! function_exists('history_cpt_events') ) {

	add_action( 'init', 'history_cpt_events', 0 );

	function history_cpt_events() {

		$labels = array(
			'name' =>  __('Events', "history-toolkit" ),
			'singular_name' => __('Events', "history-toolkit" ),
			'add_new' => __('Add New', "history-toolkit" ),
			'add_new_item' => __('Add New Events', "history-toolkit" ),
			'edit_item' => __('Edit Events', "history-toolkit" ),
			'new_item' => __('New Events', "history-toolkit" ),
			'all_items' => __('All Events', "history-toolkit" ),
			'view_item' => __('View Events', "history-toolkit" ),
			'search_items' => __('Search Events', "history-toolkit" ),
			'not_found' =>  __('No Events found', "history-toolkit" ),
			'not_found_in_trash' => __('No Events found in Trash', "history-toolkit" ),
			'parent_item_colon' => '',
			'menu_name' => __('Events', "history-toolkit")
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'supports' => array( 'title', 'editor', 'thumbnail', ),
			'rewrite'  => array( 'slug' => 'events-item' ),
			'has_archive' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false,
			'menu_position' => 106,
			'menu_icon' => 'dashicons-images-alt2',
		);
		register_post_type( 'history_events', $args );
	}
}
?>