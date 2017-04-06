<?php
function history_video( $atts ) {

	extract( shortcode_atts( array( 'sc_title' => '', 'sc_desc' => '', 'sc_video' => '', 'sc_img' => '', 'sc_video_img' => '' ), $atts ) );

	ob_start();
	?>
	<!-- Intro Video -->
	<div class="intro-video container-fluid no-padding">
		<div class="section-padding"></div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<?php echo wp_get_attachment_image( $sc_img, "full" ); ?>
		</div>
		<div class="col-md-6 col-sm-6 col-xs-6">
			<div class="video-section">
				<?php echo wp_get_attachment_image( $sc_video_img, "full" ); ?>
				<div class="video-section-content">
					<?php if( $sc_title != "" ) { ?><h3><?php echo esc_attr( $sc_title ); ?></h3><?php } ?>
					<a href="<?php echo esc_url( $sc_video ); ?>" class="popup-vimeo"><i class="fa fa-play"></i></a>
					<?php echo wpautop( $sc_desc ); ?>
				</div>
			</div>
		</div>
	</div><!-- Intro Video /- -->
	<?php
	return ob_get_clean();
}
add_shortcode('history_video', 'history_video');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_video',
		'name' => __( 'Video', "history-toolkit" ),
		'class' => '',
		"category" => esc_html__("HISTORY", "history-toolkit"),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', "history-toolkit" ),
				'param_name' => 'sc_title',
				'holder' => 'div',
			),
			array(
				'type' => 'textarea',
				'heading' => __( 'Description', "history-toolkit" ),
				'param_name' => 'sc_desc',
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Left Image', "history-toolkit" ),
				'param_name' => 'sc_img',
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Video Image', "history-toolkit" ),
				'param_name' => 'sc_video_img',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Video URL', "history-toolkit" ),
				'param_name' => 'sc_video',
			),
		),
	) );
}
?>