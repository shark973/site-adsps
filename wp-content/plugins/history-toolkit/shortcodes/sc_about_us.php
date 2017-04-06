<?php
function history_about_us( $atts ) {

	extract( shortcode_atts( array( 'sc_title' => '', 'sc_subtitle' => '', 'sc_desc' => '', 'sc_img' => '', 'sc_btntxt' => '', 'sc_btnurl' => '', 'sc_layout' => 'one' ), $atts ) );

	ob_start();

	if( $sc_layout == "one" ) {
		?>
		<!-- Onview Section -->
		<div class="container-fluid onview-section">
			<!-- Container -->
			<div class="container">
				<div class="col-md-5 col-sm-5 col-xs-12 img-block">
					<?php echo wp_get_attachment_image( $sc_img, "full" ); ?>
				</div>
				<div class="col-md-7 col-sm-7 col-xs-12 onview-content">
					<?php 
						if( $sc_title != "" ||  $sc_subtitle != "" ) { 
							?>
							<!-- Section Header -->
							<div class="section-header">
								<div class="section-title-border">
									<?php if( $sc_title != "" ) { ?><span><?php echo esc_attr( $sc_title ); ?></span><?php } ?>
									<?php if( $sc_subtitle != "" ) { ?><h2><?php echo esc_attr( $sc_subtitle ); ?></h2><?php } ?>
								</div>
							</div><!-- Section Header /- -->
							<?php
						}
					?>
					<?php echo wpautop( $sc_desc ); ?>
					<ul>
						<?php
						$result = "";
						$cnt = 1;
						if ( isset( $atts['plan_feature'] ) ) {
							foreach( vc_param_group_parse_atts( $atts['plan_feature'] ) as $key => $value ) {
								
								if( !empty( $value['feature_name'] ) ) {
									$result .="<li class='col-md-4 col-sm-6 col-xs-6'>".$value['feature_name']."</li>";
								}
								else {
									$result = "";
								}
								$cnt++;
							}
							echo html_entity_decode ($result);
						}
						?>
					</ul>
				</div>
			</div><!-- Container /- -->
		</div><!-- Onview Section /- -->
		<?php
	}
	elseif( $sc_layout == "two" ) {
		?>
		<!-- Onview Section -->
		<div class="container-fluid no-padding onview-section2">
			<?php 
				if( $sc_title != "" || $sc_subtitle != "" ) { 
				?>
				<div class="col-md-5 onview-left">
					<!-- Section Header -->
					<div class="section-header2">
						<i><img src="<?php echo esc_url( HISTORY_LIB ); ?>images/section-header2-2.png" alt="Section Header" /></i>
						<?php if( $sc_title != "" ) { ?><span><?php echo esc_attr( $sc_title ); ?></span><?php } ?>
						<?php if( $sc_subtitle != "" ) { ?><h2><?php echo esc_attr( $sc_subtitle ); ?></h2><?php } ?>
					</div><!-- Section Header /- -->
					<?php echo wpautop( $sc_desc ); ?>
					<?php if( $sc_btntxt != "" ) { ?><a href="<?php echo esc_url( $sc_btnurl ); ?>" title="<?php echo esc_attr( $sc_btntxt ); ?>"><?php echo esc_attr( $sc_btntxt ); ?></a><?php } ?>
				</div>
				<?php
				}
			?>
			<div class="col-md-7 onview-right"<?php if( $sc_img != "" ) { ?> style="background-image: url(<?php echo wp_get_attachment_url( $sc_img ); ?>);"<?php } ?>>
				<?php
				if ( isset( $atts['plan_feature'] ) ) {
					?>
					<div class="onview-content">
						<ul>
							<?php
							$result = "";
							$cnt = 1;
							foreach( vc_param_group_parse_atts( $atts['plan_feature'] ) as $key => $value ) {
								
								if( !empty( $value['feature_name'] ) ) {
									$result .="<li class='col-md-4 col-sm-6 col-xs-6'>".$value['feature_name']."</li>";
								}
								else {
									$result = "";
								}
								$cnt++;
							}
							echo ($result);
							?>
						</ul>
					</div>
					<?php
				}
				?>
			</div>
		</div><!-- Onview Section /- -->
		<?php
	}
	return ob_get_clean();
}
add_shortcode('history_about_us', 'history_about_us');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_about_us',
		'name' => __( 'About Us', "history-toolkit" ),
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
				),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', "history-toolkit" ),
				'param_name' => 'sc_title',
				'holder' => 'div',
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Sub Title', "history-toolkit" ),
				'param_name' => 'sc_subtitle',
			),
			array(
				'type' => 'textarea',
				'heading' => __( 'Description', "history-toolkit" ),
				'param_name' => 'sc_desc',
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
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Button URL', "history-toolkit" ),
				'param_name' => 'sc_btnurl',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'two' ) ),
			),
			
			// params group
			array(
				'type' => 'param_group',
				'value' => '',
				'param_name' => 'plan_feature',
				// Note params is mapped inside param-group:
				'params' => array(
					array(
						'type' => 'textfield',
						'value' => '',
						'heading' => 'Feature Name',
						'param_name' => 'feature_name',
						"dependency" => Array('element' => "sc_layout", 'value' => array( 'one','two' ) ),
					)
				)
			),
		),
	) );
}
?>