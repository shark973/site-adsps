<?php
function history_contactmap( $atts, $content = null ) {

	extract( shortcode_atts(
		array(
			'vc_map_lati' => '',
			'vc_map_longi' => '',
			'vc_address' => '',
			'vc_marker' => '',	
		), $atts )
	);

	ob_start();
	
	if($vc_map_lati != "" && $vc_map_longi != "") {
		?>
		<!-- Map -->
		<div class="container-fluid no-padding map-section">
			<div id="map-canvas-contact" class="map-canvas" data-lat="<?php echo esc_html( $vc_map_lati ); ?>" data-lng="<?php echo esc_html( $vc_map_longi ); ?>" data-string="<?php echo esc_attr( $vc_address ); ?>" data-marker="<?php if($vc_marker !=''){ echo esc_url(wp_get_attachment_url($vc_marker,"")); } else { echo esc_url( HISTORY_LIB ).'images/marker.png'; }?>" data-zoom="12"></div>
		</div><!-- Map /- -->
		<?php
	}
	return ob_get_clean();
}
add_shortcode('history_contactmap', 'history_contactmap');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_contactmap',
		'name' => __( 'Contact Map', "history-toolkit" ),
		'class' => '',
		"category" => esc_html__("HISTORY", "history-toolkit"),
		'params' => array(
		
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html("Latitude:", "history-toolkit"),
				"param_name" => "vc_map_lati",
				"description" => esc_html("e.g :51.507351", "history-toolkit"),
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html("Longitude:", "history-toolkit"),
				"param_name" => "vc_map_longi",
				"description" => esc_html("e.g :-0.127758", "history-toolkit"),
			),
			array(
				"type" => "attach_image",
				"class" => "",
				"heading" => esc_html("Marker Image:", "history-toolkit"),
				"param_name" => "vc_marker",
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html("Marker Address:", "history-toolkit"),
				"param_name" => "vc_address",
				"description" => esc_html("London", "history-toolkit"),
			),
		),
	) );
}
?>