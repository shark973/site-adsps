<?php
function history_events( $atts ) {

	extract( shortcode_atts( array( 'sc_title' => '', 'sc_subtitle' => '', 'sc_layout' => 'one', 'sc_posts' => '','btnurl' => '', ), $atts ) );

	$ow_post_type = 'history_events';

	if( '' === $sc_posts ) :
		$sc_posts = 4;		
	endif;

	$qry = new WP_Query( array(
		'post_type' => $ow_post_type,
		'posts_per_page' => $sc_posts,
		'order' => 'ASC',
	) );

	ob_start();

	if( $sc_layout == "one" ) {
		?>		
		<!-- Upcoming Events -->
		<div class="container-fluid upcoming-event">
			<div class="section-padding"></div>
			<!-- Container -->
			<div class="container">
				<!-- Section Header -->
				<div class="section-header">
					<div class="section-title-border">
						<?php if( $sc_title != "" ) { ?><span><?php echo esc_attr( $sc_title ); ?></span><?php } ?>
						<?php if( $sc_subtitle != "" ) { ?><h2><?php echo esc_attr( $sc_subtitle ); ?></h2><?php } ?>
					</div>
				</div><!-- Section Header /- -->
				<div class="col-md-8 col-sm-12 col-xs-12 no-padding">
					<?php
						while ( $qry->have_posts() ) : $qry->the_post();
							?>
							<!-- Event Block -->
							<div class="col-md-12 col-sm-12 col-xs-12 no-padding event-block">
								<div class="col-md-12 col-sm-12 col-xs-12 event-content">
									<div class="post-date">
										<span><?php echo get_the_date( 'd', get_the_ID() ); ?></span>
										<span><?php echo get_the_date( 'M', get_the_ID() ); ?></span>
									</div>
									<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
									<h4>
										<span><i class="fa fa-map-marker"></i><?php echo get_post_meta( get_the_ID(), "history_cf_event_location", true ); ?></span>
										<a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php echo get_post_meta( get_the_ID(), "history_cf_event_time", true ); ?></a>
									</h4>
									<p><?php echo wp_html_excerpt( strip_shortcodes( get_the_content() ), 200, ' [...]' ); ?></p>
								</div>
							</div><!-- Event Block /- -->
							<?php
						endwhile;
						
					// Reset Post Data
					wp_reset_postdata();
					
					?>
					<?php 
						if($btnurl) { 
							?>
							<a href="<?php echo esc_url($btnurl); ?>" title="<?php esc_html_e('VIEW ALL EVENTS',"history-toolkit"); ?>">
								<?php esc_html_e('VIEW ALL EVENTS',"history-toolkit"); ?>
							</a>
							<?php 
						} 
					?>
				</div>
			</div><!-- Container /- -->
			
			<div class="section-padding"></div>
		</div><!-- Upcoming Events /- -->
		<?php
	}
	elseif( $sc_layout == "two" ) {
		?>
		<!-- Upcoming Events -->
		<div class="container-fluid no-padding upcoming-event2">
			<div class="container">
				<div class="col-md-10 col-sm-12 col-xs-12 pull-right">
					<!-- Section Header -->
					<div class="section-header2">
						<i><img src="<?php echo esc_url( HISTORY_LIB ); ?>images/section-header2-1.png" alt="Section Header" /></i>
						<?php if( $sc_title != "" ) { ?><span><?php echo esc_attr( $sc_title ); ?></span><?php } ?>
						<?php if( $sc_subtitle != "" ) { ?><h2><?php echo esc_attr( $sc_subtitle ); ?></h2><?php } ?>
					</div><!-- Section Header /- -->
					<?php
						while ( $qry->have_posts() ) : $qry->the_post();
							?>
							<!-- Event Block -->
							<div class="col-md-12 col-sm-12 col-xs-12 no-padding event-block">
								<div class="col-md-6 col-sm-12 col-xs-12 event-cover">
									<a href="<?php the_permalink(); ?>">
										<?php the_post_thumbnail('history_458_373'); ?>
									</a>
								</div>
								<div class="col-md-6 col-sm-12 col-xs-12 event-content">
									<div class="post-date">
										<span><?php echo get_the_date( 'd', get_the_ID() ); ?></span>
										<span><?php echo get_the_date( 'M', get_the_ID() ); ?></span>
									</div>
									<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
									<h4>
										<span><i class="fa fa-map-marker"></i><?php echo get_post_meta( get_the_ID(), "history_cf_event_location", true ); ?></span>
										<a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php echo get_post_meta( get_the_ID(), "history_cf_event_time", true ); ?></a>
									</h4>
									<p><?php echo wp_html_excerpt( strip_shortcodes( get_the_content() ), 200, ' [...]' ); ?></p>
									<a href="<?php the_permalink(); ?>" title="<?php esc_html_e('VIEW MORE',"history-toolkit"); ?>">
										<?php esc_html_e('VIEW MORE',"history-toolkit"); ?>
									</a>	
								</div>
							</div><!-- Event Block /- -->
							<?php
						endwhile;
						
						// Reset Post Data
						wp_reset_postdata();
					?>
				</div>
			</div>
		</div><!-- Upcoming Events /- -->
		<?php
	}
	elseif( $sc_layout == "three" ) {

		if ( $qry->have_posts() ) {
			?>	
			<div class="events-listing">

				<?php
				while ( $qry->have_posts() ) : $qry->the_post();
					?>
					<!-- Event Block -->
					<div class="col-md-12 col-sm-12 col-xs-12 no-padding event-block">
						<div class="col-md-6 col-sm-12 col-xs-12 event-cover">
							<a href="<?php the_permalink(); ?>"><?php the_post_thumbnail("history_395_395"); ?></a>
						</div>
						<div class="col-md-6 col-sm-12 col-xs-12 event-content">
							<div class="post-date">
								<span><?php echo get_the_date( 'd', get_the_ID() ); ?></span>
								<span><?php echo get_the_date( 'M', get_the_ID() ); ?></span>
							</div>
							<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<h4><span><i class="fa fa-map-marker"></i><?php echo get_post_meta( get_the_ID(), "history_cf_event_location", true ); ?></span> <a href="<?php the_permalink(); ?>"><i class="fa fa-clock-o"></i><?php echo get_post_meta( get_the_ID(), "history_cf_event_time", true ); ?></a></h4>
							<p><?php echo wp_html_excerpt( strip_shortcodes( get_the_content() ), 200, ' [...]' ); ?></p>
							<!--a href="event-single.php" title="Book Now">Book Now</a-->
						</div>
					</div><!-- Event Block /- -->
					<?php
				endwhile;

				// Reset Post Data
				wp_reset_postdata();
				?>

			</div>
			<?php
		}
	}
	return ob_get_clean();
}
add_shortcode('history_events', 'history_events');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_events',
		'name' => __( 'Events', "history-toolkit" ),
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
				'holder' => 'div',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'one', 'two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Button Url', "history-toolkit" ),
				'param_name' => 'btnurl',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'one', 'two') ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Sub Title', "history-toolkit" ),
				'param_name' => 'sc_subtitle',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'one', 'two' ) ),
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'No of Events', "history-toolkit" ),
				'param_name' => 'sc_posts',
				"dependency" => Array('element' => "sc_layout", 'value' => array( 'one', 'two' ) ),
			),
		),
	) );
}
?>