<?php
function history_contactform( $atts ) {

	extract( shortcode_atts(
		array(
		
			'id' => '',
			'address' => '',
			'sc_phone' => '',
			'sc_phoneone' => '',
			'sc_mail' => '',
			'sc_mailone' => '',
			'formtitle' => '',
			'formsubtitle' => '',
			
		), $atts )
	);

	ob_start();
	?>
	<div class="section-padding"></div>
	<!-- Contact Section -->
	<div class="container-fluid no-padding contact-section">
		<!-- Container -->
		<div class="container">
			<div class="contact-info">
				<?php 
					if($address !="") {
						?>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<i><img src="<?php echo esc_url( HISTORY_LIB ); ?>images/contact-info1.png" alt="Contact Info" /></i>
							<h3><?php esc_html_e('Our Location',"history-toolkit"); ?></h3>
							<p><?php echo esc_attr($address); ?></p>
						</div>
						<?php
					}
					if($sc_phone !="" || $sc_phoneone !="" ) {
						?>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<i><img src="<?php echo esc_url( HISTORY_LIB ); ?>images/contact-info2.png" alt="Contact Info" /></i>
							<h3><?php esc_html_e('Contact Us',"history-toolkit"); ?></h3>
							<?php if($sc_phone != "") { ?><p><a href="tel:<?php echo esc_html(str_replace(' ', '-', $sc_phone)); ?>"><?php esc_html_e('Mobile: ',"history-toolkit"); ?><?php echo esc_html($sc_phone); ?></a></p><?php } ?>
							<?php if($sc_phoneone != "") { ?><p><a href="tel:<?php echo esc_html(str_replace(' ', '-', $sc_phoneone)); ?>"><?php esc_html_e('Toll Free : ',"history-toolkit"); ?><?php echo esc_html($sc_phoneone); ?></a></p><?php } ?>
						</div>
						<?php
					}
					if($sc_mail !="" || $sc_mailone !="" ) {
						?>
						<div class="col-md-4 col-sm-4 col-xs-12">
							<i><img src="<?php echo esc_url( HISTORY_LIB ); ?>images/contact-info3.png" alt="Contact Info" /></i>
							<h3><?php esc_html_e('Write some words',"history-toolkit"); ?></h3>
							<?php if($sc_mail != "") { ?><p><a href="mailto:<?php echo esc_html(str_replace(' ', '-', $sc_mail)); ?>"><?php echo esc_html($sc_mail); ?></a></p><?php } ?>
							<?php if($sc_mailone != "") { ?><p><a href="mailto:<?php echo esc_html(str_replace(' ', '-', $sc_mailone)); ?>"><?php echo esc_html($sc_mailone); ?></a></p><?php } ?>
						</div>
						<?php
					}
				?>
			</div>
			<div class="contact-form">
				<?php if($formtitle !="") { ?><h3><?php echo esc_attr($formtitle); ?></h3><?php } ?>
				<?php if($formsubtitle !="") { ?><p><?php echo esc_attr($formsubtitle); ?></p> <?php } ?>
				<?php echo do_shortcode('[contact-form-7 id="'.esc_attr( $id ).'"]'); ?>
			</div>
		</div>
	</div><!-- Contact Form Section Over -->
	<div class="padding-100"></div>
	<?php
	return ob_get_clean();
}
add_shortcode('history_contactform', 'history_contactform');

if( function_exists('vc_map') ) {
	
	/**
	 * Add Shortcode To Visual Composer
	*/
	$history_cf7 = get_posts( 'post_type="wpcf7_contact_form"&numberposts=-1' );

	$history_contactforms = array();
	
	if ( $history_cf7 ) {
		foreach ( $history_cf7 as $cform ) {
			$history_contactforms[ $cform->post_title ] = $cform->ID;
		}
	} else {
		$history_contactforms[ __( 'No contact forms found', 'history-toolkit' ) ] = 0;
	}
	
	vc_map( array(
		'base' => 'history_contactform',
		'name' => __( 'Contact Form', "history-toolkit" ),
		'class' => '',
		"category" => esc_html__("HISTORY", "history-toolkit"),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Contact Address', "history-toolkit" ),
				'param_name' => 'address',
			),
			
			array(
				'type' => 'textfield',
				'heading' => __( 'Contact Phone 1', "history-toolkit" ),
				'param_name' => 'sc_phone',
			),
			
			array(
				'type' => 'textfield',
				'heading' => __( 'Contact Phone 2', "history-toolkit" ),
				'param_name' => 'sc_phoneone',
			),
			
			array(
				'type' => 'textfield',
				'heading' => __( 'Contact Mail 1', "history-toolkit" ),
				'param_name' => 'sc_mail',
			),
			
			array(
				'type' => 'textfield',
				'heading' => __( 'Contact Mail 2', "history-toolkit" ),
				'param_name' => 'sc_mailone',
			),
			
			array(
				'type' => 'textfield',
				'heading' => __( 'Contact Form Title', "history-toolkit" ),
				'param_name' => 'formtitle',
			),
			
			array(
				'type' => 'textfield',
				'heading' => __( 'Contact Form Sub Title', "history-toolkit" ),
				'param_name' => 'formsubtitle',
			),
			
			array(
				'type' => 'dropdown',
				'heading' => __( 'Select contact form', 'history-toolkit' ),
				'param_name' => 'id',
				'value' => $history_contactforms,
				'save_always' => true,
				'description' => __( 'Choose previously created contact form from the drop down list.', 'history-toolkit' ),
			),
				
		),
	) );
}
?>