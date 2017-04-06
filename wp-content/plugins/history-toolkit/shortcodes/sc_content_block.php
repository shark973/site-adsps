<?php
function history_content_block( $atts ) {

	extract( shortcode_atts( array( 'sc_title' => '', 'sc_subtitle' => '', 'sc_desc' => '', 'sc_contact_txt' => '', 'sc_contact_no' => '', 'sc_img' => '', 'sc_btntxt' => '', 'sc_btnurl' => '', 'sc_layout' => 'one' ), $atts ) );

	ob_start();

	if( $sc_layout == "one" ) {
		?>			
		<!-- Call To Action -->
		<div class="container-fluid cta-section">
			<!-- Container -->
			<div class="container">
				<h3><?php echo wp_get_attachment_image( $sc_img, "full" ); ?><?php if( $sc_title != "" ) { ?><span><?php echo esc_attr( $sc_title ); ?></span><?php } ?></h3>
				<?php if( $sc_btntxt != "" ) { ?><a href="<?php echo esc_url( $sc_btnurl ); ?>" title="<?php echo esc_attr( $sc_btntxt ); ?>"><?php echo esc_attr( $sc_btntxt ); ?></a><?php } ?>
			</div>
			<!-- Container /- -->
		</div><!-- Call To Action /- -->
		<?php
	}
	elseif( $sc_layout == "two" ) {
		?>
		<!-- Welcome Section -->
		<div class="container-fluid no-padding welcome-section2">
			<!-- Container -->
			<div class="container">
				<!-- Row -->
				<div class="row">			
					<div class="col-md-6 col-sm-6 img-block">
						<i><?php echo wp_get_attachment_image( $sc_img, "full" ); ?></i>
					</div>
					<div class="col-md-6 col-sm-6 content-block">
						<!-- Section Header -->
						<div class="section-header2">
							<i><img src="<?php echo esc_url( HISTORY_LIB ); ?>images/section-header2-1.png" alt="Section Header" /></i>
							<?php if( $sc_title != "" ) { ?><span><?php echo esc_attr( $sc_title ); ?></span><?php } ?>
							<?php if( $sc_subtitle != "" ) { ?><h2><?php echo esc_attr( $sc_subtitle ); ?></h2><?php } ?>
						</div><!-- Section Header /- -->
						<?php echo wpautop( $sc_desc ); ?>
						<?php if( $sc_btntxt != "" ) { ?><a href="<?php echo esc_url( $sc_btnurl ); ?>" title="<?php echo esc_attr( $sc_btntxt ); ?>"><?php echo esc_attr( $sc_btntxt ); ?></a><?php } ?>
					</div>
				</div><!-- Row /- -->
			</div><!-- Container /- -->
		</div><!-- Welcome Section /- -->
		<?php
	}
	elseif( $sc_layout == "three" ) {
		?>
		<!-- Call Out -->
		<div class="call-out container-fluid no-padding">
			<!-- Container -->
			<div class="container">
				<div class="col-md-7 col-sm-7 col-xs-7 call-out-content">
					<?php if( $sc_title != "" ) { ?><h3><?php echo esc_attr( $sc_title ); ?></h3><?php } ?>
					<?php if( $sc_subtitle != "" ) { ?><h5><?php echo esc_attr( $sc_subtitle ); ?></h5><?php } ?>
					<p><?php echo esc_attr( $sc_contact_txt ); ?> <a href="tel:<?php echo esc_attr( $sc_contact_no ); ?>" title="<?php echo esc_attr( $sc_contact_no ); ?>"><?php echo esc_attr( $sc_contact_no ); ?></a></p>
					<?php if( $sc_btntxt != "" ) { ?><a class="callout-info" href="<?php echo esc_url( $sc_btnurl ); ?>" title="<?php echo esc_attr( $sc_btntxt ); ?>"><?php echo esc_attr( $sc_btntxt ); ?></a><?php } ?>
				</div>
				<div class="col-md-5 col-sm-5 col-xs-5 call-out-img">
					<i><?php echo wp_get_attachment_image( $sc_img, "full" ); ?></i>
				</div>
			</div><!-- Container /- -->
		</div><!-- Call Out -->
		<?php
	}
	return ob_get_clean();
}
add_shortcode('history_content_block', 'history_content_block');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_content_block',
		'name' => __( 'Content Block', "history-toolkit" ),
		'class' => '',
		"category" => esc_html__("HISTORY", "history-toolkit"),
		'params' => array(
			array(
				'type' => 'dropdown',
				'heading' => __( 'Select a Layout', "history-toolkit" ),
				'param_name' => 'sc_layout',
				'value' => array(
					__( 'Layout 1', "history-toolkit" ) => 'one',
					__( 'Layout 2', "history-toolkit" ) => 'two',
					__( 'Layout 3', "history-toolkit" ) => 'three',
				),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', "history-toolkit" ),
				'param_name' => 'sc_title',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Sub Title', "history-toolkit" ),
				'param_name' => 'sc_subtitle',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'two', 'three' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Contact Text', "history-toolkit" ),
				'param_name' => 'sc_contact_txt',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'three' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Contact No', "history-toolkit" ),
				'param_name' => 'sc_contact_no',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'three' ) ),
			),
			array(
				'type' => 'textarea',
				'heading' => __( 'Description', "history-toolkit" ),
				'param_name' => 'sc_desc',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'two' ) ),
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image', "history-toolkit" ),
				'param_name' => 'sc_img',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Button Text', "history-toolkit" ),
				'param_name' => 'sc_btntxt',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Button URL', "history-toolkit" ),
				'param_name' => 'sc_btnurl',
			),
		),
	) );
}
?>