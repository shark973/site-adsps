<?php
// Start with an underscore to hide fields from custom fields list
$prefix = 'history_cf_';

/* Post : Gallery */
$cmb_post_gallery = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_post_gallery',
	'title'         => __( 'Gallery Post Options', "history-toolkit" ),
	'object_types'  => array( 'post' ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );

$cmb_post_gallery->add_field( array(
	'name' => __( 'Post Gallery', 'cmb2' ),
	'id'   => $prefix . 'post_gallery',
	'type' => 'file_list',
) );

/* Post : Video */
$cmb_post_video = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_post_video',
	'title'         => __( 'Video Post Options', "history-toolkit" ),
	'object_types'  => array( 'post' ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );

$cmb_post_video->add_field( array(
	'name'             => 'Choose Video Source',
	'desc'             => 'Select an option',
	'id'               => $prefix . 'post_video_source',
	'type'             => 'select',
	'default'          => 'video_link',
	'options'          => array(
		'video_link' => __( 'Video Link', "history-toolkit" ),
		'video_embed_code'   => __( 'Video Embed Code', "history-toolkit" ),
		'video_upload_local'   => __( 'Upload Local File', "history-toolkit" ),
	),
) );

$cmb_post_video->add_field( array(
	'name'             => 'Video URL',
	'id'               => $prefix . 'post_video_link',
	'desc' => 'Enter a youtube, twitter, or instagram URL. Supports services listed at <a href="http://codex.wordpress.org/Embeds">http://codex.wordpress.org/Embeds</a>.',
	'type' => 'oembed',
	/* 'attributes' => array(
		'required' => true, // Will be required only if visible.
		'data-conditional-id' => $prefix . 'post_video_source',
		'data-conditional-value' => 'video_link',
	) */
) );

$cmb_post_video->add_field( array(
	'name'             => 'Video embed code',
	'id'               => $prefix . 'post_video_embed',
	'desc'               => 'Paste video embed code',
	'type'             => 'textarea_code',
	/* 'attributes' => array(
		'required' => true, // Will be required only if visible.
		'data-conditional-id' => $prefix . 'post_video_source',
		'data-conditional-value' => 'video_embed_code',
	) */
) );

$cmb_post_video->add_field( array(
	'name'             => 'Upload Local File',
	'id'               => $prefix . 'post_video_local',
	'desc'               => 'Support .mp4 file format only',
	'type'             => 'file',
	/* 'attributes' => array(
		'required' => true, // Will be required only if visible.
		'data-conditional-id' => $prefix . 'post_video_source',
		'data-conditional-value' => 'video_upload_local',
	) */
) );

/* Post : Gallery */
$cmb_post_gallery = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_post_gallery',
	'title'         => __( 'Gallery Post Options', "history-toolkit" ),
	'object_types'  => array( 'post' ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );

$cmb_post_gallery->add_field( array(
	'name' => __( 'Post Gallery', 'cmb2' ),
	'id'   => $prefix . 'post_gallery',
	'type' => 'file_list',
) );

/* Post : Audio */
$cmb_post_audio = new_cmb2_box( array(
	'id'            => $prefix . 'metabox_post_audio',
	'title'         => __( 'Audio Post Options', "history-toolkit" ),
	'object_types'  => array( 'post' ), // Post type
	'context'       => 'normal',
	'priority'      => 'high',
	'show_names'    => true, // Show field names on the left
) );

$cmb_post_audio->add_field( array(
	'name'             => 'Choose Audio Source',
	'desc'             => 'Select an option',
	'id'               => $prefix . 'post_audio_source',
	'type'             => 'select',
	'default'          => 'soundcloud_link',
	'options'          => array(
		'soundcloud_link' => __( 'Soundcloud Link', "history-toolkit" ),
		'audio_upload_local'   => __( 'Upload Local File', "history-toolkit" ),
	),
) );

$cmb_post_audio->add_field( array(
	'name'             => 'Soundcloud URL',
	'id'               => $prefix . 'post_soundcloud_url',
	'type'             => 'textarea_code',
	/* 'attributes' => array(
		'required' => true, // Will be required only if visible.
		'data-conditional-id' => $prefix . 'post_audio_source',
		'data-conditional-value' => 'soundcloud_link',
	) */
) );

$cmb_post_audio->add_field( array(
	'name'             => 'Upload Local File',
	'id'               => $prefix . 'post_audio_local',
	'desc'               => 'Support .mp3 file format only',
	'type'             => 'file',
	/* 'attributes' => array(
		'required' => true, // Will be required only if visible.
		'data-conditional-id' => $prefix . 'post_audio_source',
		'data-conditional-value' => 'audio_upload_local',
	) */
) );
?>