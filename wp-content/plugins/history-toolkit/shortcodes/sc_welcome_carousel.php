<?php
function history_welcome_carousel( $atts ) {

	extract( shortcode_atts( array( 'sc_title' => '', 'sc_subtitle' => '' ), $atts ) );

	ob_start();
	?>	
	<!-- Welcome Section -->
	<div id="welcome-section" class="container-fluid welcome-section">
		<!-- Container -->
		<div class="container">
			<?php 
				if( $sc_title != ""  || $sc_subtitle != "" ) {
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
				if( history_options("opt_welcome") != "" ) {
					?>
					<!-- Row -->
					<div class="row">
						<div id="welcome-carousel" class="carousel slide" data-ride="carousel">
							<!-- Wrapper for slides -->
							<div class="carousel-inner" role="listbox">
								<?php
									$cntcount = 1;
									foreach( history_options("opt_welcome") as $single_item ) {
										?>
										<div class="item<?php if( $cntcount == 1 ) { echo " active"; } else { echo ""; } ?>">
											<div class="col-md-6 col-sm-6 content-block">
												<?php echo wpautop( $single_item["description"] ); ?>
												<?php if($single_item['url'] !="") { ?><a href="<?php echo esc_attr($single_item['url'] ); ?>" title="Read More"><?php echo esc_attr($single_item['title'] )?></a><?php } ?>
											</div>
											<div class="col-md-6 col-sm-6 img-block">
												<i><?php echo wp_get_attachment_image( $single_item["attachment_id"], 'history_470_600' ); ?></i>
											</div>
										</div>
										<?php
										$cntcount++;
									}
								?>
							</div>
							<!-- Controls -->
							<div class="wc-controls">
								<a class="left carousel-control" href="#welcome-carousel" role="button" data-slide="prev">
									<span></span>
								</a>
								<a class="right carousel-control" href="#welcome-carousel" role="button" data-slide="next">
									<span></span>
								</a>
							</div>
						</div>
					</div><!-- Row /- -->
					<?php
				}
			?>
		</div><!-- Container /- -->
	</div><!-- Welcome Section /- -->
	<?php
	return ob_get_clean();
}
add_shortcode('history_welcome_carousel', 'history_welcome_carousel');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_welcome_carousel',
		'name' => __( 'Welcome Carousel', "history-toolkit" ),
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
				'type' => 'textfield',
				'heading' => __( 'Sub Title', "history-toolkit" ),
				'param_name' => 'sc_subtitle',
			),
		),
	) );
}
?>