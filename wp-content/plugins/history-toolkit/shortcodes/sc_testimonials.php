<?php
function history_testimonials( $atts ) {

	extract( shortcode_atts( array( ), $atts ) );

	ob_start();
	?>	
	<!-- Testimonial Section -->
	<div class="testimonial-section container-fluid">
		<!-- Container -->
		<div class="container">
			<div class="col-md-8">
				<div class="testimonial-slider">
					<div class="mis-stage">	
						<?php
							if( history_options("opt_testimonials") != "" ) {
								?>
								<ol class="mis-slider">
									<?php
										$cntcount = 1;
										foreach( history_options("opt_testimonials") as $single_item ) {
											?>
											<li id="mis_slide-<?php echo esc_attr($cntcount); ?>" class="mis-slide" data-slide="<?php echo esc_attr($cntcount); ?>">
												<?php
												if($single_item['url'] !="") {
													?>
													<a href="<?php echo esc_attr($single_item['url'] ); ?>" class="mis-container">
														<?php echo wp_get_attachment_image( $single_item["attachment_id"], 'history_95_95' );  ?>
													</a>
													<?php
												}
												else {
													echo wp_get_attachment_image( $single_item["attachment_id"], 'history_95_95' );
												}
												?>
											</li>
											<?php
										$cntcount++;
										}
									?>
								</ol>
								<div class="mis-content-block">
									<?php
										$cntcount = 1;
										foreach( history_options("opt_testimonials") as $single_item ) {
											?>
											<div id="mis_slide_content-<?php echo esc_attr($cntcount); ?>">
												<?php echo wpautop( $single_item["description"] ); ?>
												<i class="icon icon-MessageRight"></i>
												<?php if($single_item["title"] !="") { ?><h3><?php echo esc_attr($single_item["title"] ); ?></h3><?php } ?>
												<?php if($single_item["textOne"] !="") { ?><span><?php echo esc_attr($single_item["textOne"] ); ?></span><?php } ?>
											</div>
											<?php
											$cntcount++;
										}
									?>
								</div>
								<?php
							}
						?>
					</div>
				</div>
			</div>
		</div><!-- Container /-  -->
	</div><!-- Testimonial Section /- -->
	<?php
	return ob_get_clean();
}
add_shortcode('history_testimonials', 'history_testimonials');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_testimonials',
		'name' => __( 'Testimonials', "history-toolkit" ),
		'class' => '',
		"category" => esc_html__("HISTORY", "history-toolkit"),
		'params' => array(
			array(
				'type' => 'label',
				'heading' => __( 'No need of settings here.', "history-toolkit" ),
				'param_name' => 'label',
			),
		),
	) );
}
?>