<?php
function history_gallery( $atts ) {

	extract( shortcode_atts( array( 'sc_title' => '', 'sc_subtitle' => '', 'posts_display' => '' ), $atts ) );
	
	$ow_post_type = 'history_gallery';
	$ow_post_tax = 'history_gallery_tax';
	
	$tax_args = array(
		'hide_empty' => false
	);
	
	$args = array(
		'post_type' => $ow_post_type,
		'posts_per_page' => $posts_display,
		'order' => 'ASC',
	);

	$qry = new WP_Query( $args );
	
	if( '' === $posts_display ) :
		$posts_display = 6;		
	endif;

	ob_start();
	?>
	<!-- Portfolio Section -->
	<div class="container-fluid portfolio-section">
		<!-- Container -->
		<div class="container">
			<div class="row">
				<?php
					$css = "";
					if( $sc_title != "" && $sc_subtitle != "" ) {
						$css = " col-md-7";
					}
					else {
						$css = " col-md-12";
					}
					
					if( $sc_title != "" ||  $sc_subtitle != "" ) {
						?>
						<div class="col-md-5">
							<!-- Section Header -->
							<div class="section-header">
								<div class="section-title-border">
									<?php if( $sc_title != "" ) { ?><span><?php echo esc_attr( $sc_title ); ?></span><?php } ?>
									<?php if( $sc_subtitle != "" ) { ?><h2><?php echo esc_attr( $sc_subtitle ); ?></h2><?php } ?>
								</div>
							</div><!-- Section Header /- -->
						</div>
						<?php
					}
				?>
				<div class="portfolio-categories<?php echo esc_attr( $css ); ?>">
					<ul id="filters">
						<li><a data-filter="*" class="active" href="#"><?php esc_html_e('ALL',"history-toolkit"); ?></a></li>
						<?php
							$terms = get_terms( $ow_post_tax, $tax_args );
							if ( count( $terms > 0 ) && is_array( $terms ) ) {
								foreach ( $terms as $term ) {
									$termname = strtolower($term->name);
									$unexpected_str = array(" ","&","amp;",",",".","/");
									$termname = str_replace( $unexpected_str, '-', $termname);
									?>
									<li><a href="#" data-filter=".<?php echo esc_attr( $termname ); ?>"><?php echo esc_attr ( $term->name ); ?></a></li>						
									<?php
								}
							}
						?>
					</ul>
				</div>
			</div>
		</div><!-- Container /- -->
		<div class="portfolio-list">
			<?php
				$countcnt = 1;
				while ( $qry->have_posts() ) : $qry->the_post();
					
					if($countcnt == 1 || $countcnt == 6 ) {
						$addclass = " col-md-6 col-sm-6";
					}
					else {
						$addclass = " col-md-3 col-sm-3";
					}
					
					$terms = get_the_terms( get_the_ID(), $ow_post_tax );
					$termsname = array();
					$terms_dashed = array();
					if ( count( $terms > 0 ) && is_array( $terms ) ) {
						foreach ( $terms as $term ) {
							$termsname[] = strtolower( $term->name );
							$unexpected_str = array(" ","&","amp;",",",".","/");
							$terms_dashed[] = str_replace( $unexpected_str, '-', strtolower( $term->name ) );
							}
						$taxonomies = implode(" ", $terms_dashed );
						$taxonomies_plus = implode(" + ", $termsname );
					}
					?>
					<div class="portfolio-box<?php echo esc_attr($addclass); ?> no-padding <?php echo esc_attr($taxonomies); ?>">
						<a href="<?php echo esc_url(wp_get_attachment_url( get_post_thumbnail_id( get_the_ID() ) ) ); ?>">
							<?php the_post_thumbnail( "full" ); ?>
							<div class="portfolio-content">
								<i class="icon icon-Search"></i>
								<?php 
									the_title('<h3>','</h3>');
									$sibtitle = "";
									$subtitle = get_post_meta( get_the_ID(),"history_cf_sub_title", true );
									if($subtitle !="") { 
										?>
										<span><?php echo esc_attr($subtitle); ?></span>
										<?php
									}
								?>
							</div>
						</a>
					</div>
					<?php
					$countcnt++;
				endwhile;
				
				// Reset Post Data
				wp_reset_postdata();
			?>
		</div>
	</div><!-- Portfolio Section /- -->
	<?php
	return ob_get_clean();
}
add_shortcode('history_gallery', 'history_gallery');

if( function_exists('vc_map') ) {

	vc_map( array(
		'base' => 'history_gallery',
		'name' => __( 'Gallery', "history-toolkit" ),
		'class' => '',
		"category" => esc_html__("HISTORY", "history-toolkit"),
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', "history-toolkit" ),
				'param_name' => 'sc_title',
				"holder" => "div",
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Sub Title', "history-toolkit" ),
				'param_name' => 'sc_subtitle',
			),
			array(
				"type" => "textfield",
				"class" => "",
				"heading" => esc_html("Post Per Page Display", "history-toolkit"),
				"param_name" => "posts_display",
				"holder" => "div",
			),
		),
	) );
}
?>