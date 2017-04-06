<?php
// Start with an underscore to hide fields from custom fields list
$prefix = 'history_cf_';

/* Post : Events */
$cmb_events = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_events',
	'title'         => __( 'Events', "history-toolkit" ),
	'object_types'  => array( 'history_events' ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );
$cmb_events->add_field( array(
	'name' => __( 'Event Time', "history-toolkit" ),
	'id'   => $prefix . 'event_time',
	'type' => 'text',
) );
$cmb_events->add_field( array(
	'name' => __( 'Event Location', "history-toolkit" ),
	'id'   => $prefix . 'event_location',
	'type' => 'text',
) );

$cmb_events->add_field( array(
	'name' => __( 'Map Latitude ', "history-toolkit" ),
	'id'   => $prefix . 'event_maplat',
	'type' => 'text',
	'desc' => 'Example:51.507351',
) );

$cmb_events->add_field( array(
	'name' => __( 'Map Longitude', "history-toolkit" ),
	'id'   => $prefix . 'event_maplng',
	'type' => 'text',
	'desc' => 'Example:-0.127758',
) );
$cmb_events->add_field( array(
	'name' => __( 'Map Address', "history-toolkit" ),
	'id'   => $prefix . 'event_mapadd',
	'type' => 'text',
	'desc' => 'Example:London',
) );
?>