<?php
// Start with an underscore to hide fields from custom fields list
$prefix = 'history_cf_';

/* Post : Gallery */
$cmb_gallery = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_gallery',
	'title'         => __( 'Gallery', "history-toolkit" ),
	'object_types'  => array( 'history_gallery' ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );
$cmb_gallery->add_field( array(
	'name' => __( 'Sub Title', "history-toolkit" ),
	'id'   => $prefix . 'sub_title',
	'type' => 'text',
) );
?>