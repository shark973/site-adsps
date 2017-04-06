<?php
Redux::setSection( $opt_name, array(
	'title'  => __( 'Shortcodes', "history" ),
	'id'    => 'shortcode_options',
	'icon'  => 'el el-credit-card',
	'subsection' => false,
	'fields'     => array(
		/* Fields */
		/* array(
			'id'=>'info_header_top',
			'type' => 'info',
			'title' => 'Header Top Infomation',
		), */
		/* Fields /- */
	)
) );
/* Welcome Carousel  */
Redux::setSection( $opt_name, array(
	'title'  => __( 'Welcome Carousel', "history"),
	'id'         => 'welcome',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_welcome',
			'type'     => 'ow_repeater', 
			'title'    => __('Welcome', "history" ),
			'image'    => true,
			'description'    => true,
			'url'    => true,
			'textOne'    => false,
			'placeholder'    => array(
				'title'    => __('Button Text', "history" ),
				'url'    => __('Button URL', "history" ),
			),
		),
		/* Fields /- */
	)
));


/*  Clients  */
Redux::setSection( $opt_name, array(
	'title'  => __( 'Clients', "history"),
	'id'         => 'clients',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_clients',
			'type'     => 'ow_repeater', 
			'title'    => __('Our Clients', "history" ),
			'image'    => true,
			'description'    => false,
			'url'    => true,
			'textOne'    => false,
			'placeholder'    => array(
				'url'    => __('clients URL', "history" ),
			),
		),
		/* Fields /- */
	)
));

/*  Testimonials  */
Redux::setSection( $opt_name, array(
	'title'  => __( 'Testimonials', "history"),
	'id'         => 'testimonials',
	'subsection' => true,
	'fields'     => array(
		/* Fields */
		array(
			'id'       => 'opt_testimonials',
			'type'     => 'ow_repeater', 
			'title'    => __('Testimonials', "history" ),
			'image'    => true,
			'description'    => true,
			'url'    => true,
			'textOne'    => true,
			'placeholder'    => array(
				'textOne'    => __('Testimonials Designation', "history" ),
				'url'    => __('Testimonials URL', "history" ),
			),
		),
		/* Fields /- */
	)
));

?>