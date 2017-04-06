<?php
/* CPT : Gallery */
if ( ! function_exists('history_cpt_gallery') ) {

	add_action( 'init', 'history_cpt_gallery', 0 );

	function history_cpt_gallery() {

		$labels = array(
			'name' =>  __('Gallery', "history-toolkit" ),
			'singular_name' => __('Gallery', "history-toolkit" ),
			'add_new' => __('Add New', "history-toolkit" ),
			'add_new_item' => __('Add New Gallery', "history-toolkit" ),
			'edit_item' => __('Edit Gallery', "history-toolkit" ),
			'new_item' => __('New Gallery', "history-toolkit" ),
			'all_items' => __('All Gallery', "history-toolkit" ),
			'view_item' => __('View Gallery', "history-toolkit" ),
			'search_items' => __('Search Gallery', "history-toolkit" ),
			'not_found' =>  __('No Gallery found', "history-toolkit" ),
			'not_found_in_trash' => __('No Gallery found in Trash', "history-toolkit" ),
			'parent_item_colon' => '',
			'menu_name' => __('Gallery', "history-toolkit")
		);

		$args = array(
			'labels' => $labels,
			'public' => true,
			'publicly_queryable' => true,
			'show_ui' => true, 
			'show_in_menu' => true, 
			'query_var' => true,
			'supports' => array( 'title', 'thumbnail', ),
			'rewrite'  => array( 'slug' => 'gallery-item' ),
			'has_archive' => false, 
			'capability_type' => 'post', 
			'hierarchical' => false,
			'menu_position' => 106,
			'menu_icon' => 'dashicons-images-alt2',
		);
		register_post_type( 'history_gallery', $args );
	}
}

// Register Custom Taxonomy
add_action( 'init', 'history_tax_gallery', 1 );
function history_tax_gallery() {

	$labels = array(
		'name'                       => _x( 'Gallery Categories', 'Taxonomy General Name', 'history-toolkit' ),
		'singular_name'              => _x( 'Gallery Categories', 'Taxonomy Singular Name', 'history-toolkit' ),
		'menu_name'                  => esc_html( 'Gallery Category', 'history-toolkit' ),
		'all_items'                  => esc_html( 'All Items', 'history-toolkit' ),
		'parent_item'                => esc_html( 'Parent Item', 'history-toolkit' ),
		'parent_item_colon'          => esc_html( 'Parent Item:', 'history-toolkit' ),
		'new_item_name'              => esc_html( 'New Item Name', 'history-toolkit' ),
		'add_new_item'               => esc_html( 'Add New Item', 'history-toolkit' ),
		'edit_item'                  => esc_html( 'Edit Item', 'history-toolkit' ),
		'update_item'                => esc_html( 'Update Item', 'history-toolkit' ),
		'view_item'                  => esc_html( 'View Item', 'history-toolkit' ),
		'separate_items_with_commas' => esc_html( 'Separate items with commas', 'history-toolkit' ),
		'add_or_remove_items'        => esc_html( 'Add or remove items', 'history-toolkit' ),
		'choose_from_most_used'      => esc_html( 'Choose from the most used', 'history-toolkit' ),
		'popular_items'              => esc_html( 'Popular Items', 'history-toolkit' ),
		'search_items'               => esc_html( 'Search Items', 'history-toolkit' ),
		'not_found'                  => esc_html( 'Not Found', 'history-toolkit' ),
		'items_list'                 => esc_html( 'Items list', 'history-toolkit' ),
		'items_list_navigation'      => esc_html( 'Items list navigation', 'history-toolkit' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
	);
	register_taxonomy( 'history_gallery_tax', array( 'history_gallery' ), $args );
}
?>