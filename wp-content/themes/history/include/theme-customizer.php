<?php
new theme_customizer();

class theme_customizer {

    public function __construct() {
        //add_action ('admin_menu', array(&$this, 'customizer_admin'));
        add_action( 'customize_register', array(&$this, 'customize_manager_demo' ));
    }

    /**
     * Customizer manager demo
     * @param  WP_Customizer_Manager $wp_manager
     * @return void
     */
    public function customize_manager_demo( $wp_manager ) {

        $this->demo_section( $wp_manager );
    }

    /**
     * A section to show how you use the default customizer controls in WordPress
     *
     * @param  Obj $wp_manager - WP Manager
     *
     * @return Void
     */
    private function demo_section( $wp_manager ) {

		/* ## Styling ******************************************************** */

		/* Styling :: Section */
        $wp_manager->add_section( 'styling_section', array(
            'title'          => 'History :: Styling Settings',
            'priority'       => 201,
        ) );

		/* Custom CSS */
        $wp_manager->add_setting( 'txtarea_customcss', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( 'txtarea_customcss', array(
            'label'   => 'Custom CSS',
            'section' => 'styling_section',
            'type'    => 'textarea',
            'priority' => 1
        ) );

        /* Site Loader */
        $wp_manager->add_setting( 'select_loader_option', array(
            'default'        => "show",
        ) );

		$loader_opt = array(
			"show" => "Show",
			"hide" => "Hide",
		);

        $wp_manager->add_control( 'select_loader_option', array(
            'label'   => 'Site Loader',
            'section' => 'styling_section',
            'type'    => 'select',
            'choices' => $loader_opt,
            'priority' => 2
        ) );

		/* ## Header ******************************************************** */

		/* Header :: Section */
        $wp_manager->add_section( 'header_section', array(
            'title'          => 'History :: Header Settings',
            'priority'       => 202,
        ) );
		$logo_opt = array(
			"custom_txt" => "Custom Text",
			"site_title" => "Site Title",
			"img_logo" => "Image Logo",
		);

		/* Select Logo */
		$wp_manager->add_setting( 'select_logo', array(
            'default'        => "img_logo",
        ) );
		$wp_manager->add_control( 'select_logo', array(
            'label'   => 'Logo Styling',
            'section' => 'header_section',
            'type'    => 'select',
            'choices' => $logo_opt,
            'priority' => 1
        ) );

		/* Logo Image */
		$wp_manager->add_setting( 'img_sitelogo', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'img_sitelogo', array(
            'label'   => 'Logo Image',
            'section' => 'header_section',
            'settings'   => 'img_sitelogo',
            'priority' => 2
        ) ) );

		/* Logo Text 1 */
		$wp_manager->add_setting( 'txt_custom_logo', array(
            'default'        => 'history',
        ) );

         $wp_manager->add_control( 'txt_custom_logo', array(
            'label'   => 'Logo Text',
            'section' => 'header_section',
            'type'    => 'text',
            'priority' => 3
        ) );

		/* ## Footer ******************************************************** */

		/* Footer :: Section */
        $wp_manager->add_section( 'footer_section', array(
            'title'          => 'History :: Footer Settings',
            'priority'       => 203,
        ) );
		
		/* Copyright Text */
        $wp_manager->add_setting( 'ftr_text', array(
            'default'        => "THE HISTORY",
        ) );

        $wp_manager->add_control( 'ftr_text', array(
            'label'   => 'Site Title',
            'section' => 'footer_section',
            'type'    => 'text',
            'priority' => 1
        ) );
		
		/* Copyright Text */
        $wp_manager->add_setting( 'txtarea_copyright', array(
            'default'        => "&copy; 2016 History - All Rights Reserved",
        ) );

        $wp_manager->add_control( 'txtarea_copyright', array(
            'label'   => 'Copyright Text',
            'section' => 'footer_section',
            'type'    => 'textarea',
            'priority' => 1
        ) );

		/* ## 404 Page ******************************************************** */
        $wp_manager->add_section( '404_page', array(
            'title'          => 'History :: 404 Page',
            'priority'       => 202,
        ) );

		$wp_manager->add_setting( '404_img', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, '404_img', array(
            'label'   => '404 Page Background Image',
            'section' => '404_page',
            'settings'   => '404_img',
            'priority' => 2
        ) ) );
		
		$wp_manager->add_setting( 'errorimg', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( new WP_Customize_Image_Control( $wp_manager, 'errorimg', array(
            'label'   => '404 Image',
            'section' => '404_page',
            'settings'   => 'errorimg',
            'priority' => 2
        ) ) );
    }
}
?>