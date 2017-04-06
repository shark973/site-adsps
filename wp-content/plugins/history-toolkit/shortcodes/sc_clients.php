<?php
function history_clients( $atts ) {

	extract( shortcode_atts( array( 'sc_title' => '', 'sc_layout' => 'one' ), $atts ) );

	ob_start();

	if( $sc_layout == "one" ) {
		if( history_options("opt_clients") != "" ) {
			?>		
			<!-- Client Section -->
			<div class="container-fluid client-section no-padding">
				<div class="client-carousel">
					<?php
						$cntcount = 1;
						foreach( history_options("opt_clients") as $single_item ) {
							if($single_item['url'] !="") {
								?>
								<div class="item<?php if($cntcount % 2 == 0){ echo " item-bg";} ?>">
									<a href="<?php echo esc_attr($single_item['url'] ); ?>"><?php echo wp_get_attachment_image( $single_item["attachment_id"], 'full' ); ?></a>
								</div>
								<?php
							}
							else {
								echo wp_get_attachment_image( $single_item["attachment_id"], 'full' ); 
							}
							$cntcount++;
						}
					?>
				</div>
			</div><!-- Client Section /- -->
			<?php
		}
	}
	elseif( $sc_layout == "two" ){
		if( history_options("opt_clients") != "" ) {
			?>
			<!-- Client Section -->
			<div class="container-fluid no-padding client-section client-section2">
				<div class="container">
					<div class="client-carousel">
						<?php
							$cntcount = 1;
							foreach( history_options("opt_clients") as $single_item ) {
								if($single_item['url'] !="") {
									?>
									<div class="item<?php if($cntcount % 2 == 0){ echo " item-bg";} ?>">
										<a href="<?php echo esc_attr($single_item['url'] ); ?>"><?php echo wp_get_attachment_image( $single_item["attachment_id"], 'full' ); ?></a>
									</div>
									<?php
								}
								else {
									echo wp_get_attachment_image( $single_item["attachment_id"], 'full' ); 
								}
								$cntcount++;
							}
						?>
					</div>
				</div>
			</div><!-- Client Section /- -->
			<div class="section-padding"></div>
			<?php
		}
	}

	return ob_get_clean();
}
add_shortcode('history_clients', 'history_clients');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_clients',
		'name' => __( 'Clients', "history-toolkit" ),
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
		),
	) );
}
?>