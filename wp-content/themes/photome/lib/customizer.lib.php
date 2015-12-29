<?php
/**
* Custom Sanitize Functions
**/
function tg_sanitize_checkbox( $input ) {
	if(is_bool($input))
	{
		return $input;
	}
	else
	{
		return false;
	}

}

function tg_sanitize_slider( $input ) {	if(is_numeric($input))
	{
		return $input;
	}
	else
	{
		return 0;

	}
}

function tg_sanitize_html( $input ) {
    return wp_kses_post( force_balance_tags( $input ) );
}

/*** Configuration to disable default Wordpress customizer tabs
**/

add_action( 'customize_register', 'tg_customize_register' );
function tg_customize_register( $wp_customize ) {
	$wp_customize->remove_section( 'colors' );
	$wp_customize->remove_section( 'background_image' );
}

/**
 * Configuration sample for the Kirki Customizer
 */
function kirki_demo_configuration_sample() {

    /**
     * If you need to include Kirki in your theme,
     * then you may want to consider adding the translations here
     * using your textdomain.
     * 
     * If you're using Kirki as a plugin then you can remove these.
     */

    $strings = array(
        'background-color' => __( 'Background Color', THEMEDOMAIN ),
        'background-image' => __( 'Background Image', THEMEDOMAIN ),
        'no-repeat' => __( 'No Repeat', THEMEDOMAIN ),
        'repeat-all' => __( 'Repeat All', THEMEDOMAIN ),
        'repeat-x' => __( 'Repeat Horizontally', THEMEDOMAIN ),
        'repeat-y' => __( 'Repeat Vertically', THEMEDOMAIN ),
        'inherit' => __( 'Inherit', THEMEDOMAIN ),
        'background-repeat' => __( 'Background Repeat', THEMEDOMAIN ),
        'cover' => __( 'Cover', THEMEDOMAIN ),
        'contain' => __( 'Contain', THEMEDOMAIN ),
        'background-size' => __( 'Background Size', THEMEDOMAIN ),
        'fixed' => __( 'Fixed', THEMEDOMAIN ),
        'scroll' => __( 'Scroll', THEMEDOMAIN ),
        'background-attachment' => __( 'Background Attachment', THEMEDOMAIN ),
        'left-top' => __( 'Left Top', THEMEDOMAIN ),
        'left-center' => __( 'Left Center', THEMEDOMAIN ),
        'left-bottom' => __( 'Left Bottom', THEMEDOMAIN ),
        'right-top' => __( 'Right Top', THEMEDOMAIN ),
        'right-center' => __( 'Right Center', THEMEDOMAIN ),
        'right-bottom' => __( 'Right Bottom', THEMEDOMAIN ),
        'center-top' => __( 'Center Top', THEMEDOMAIN ),
        'center-center' => __( 'Center Center', THEMEDOMAIN ),
        'center-bottom' => __( 'Center Bottom', THEMEDOMAIN ),
        'background-position' => __( 'Background Position', THEMEDOMAIN ),
        'background-opacity' => __( 'Background Opacity', THEMEDOMAIN ),
        'ON' => __( 'ON', THEMEDOMAIN ),
        'OFF' => __( 'OFF', THEMEDOMAIN ),
        'all' => __( 'All', THEMEDOMAIN ),
        'cyrillic' => __( 'Cyrillic', THEMEDOMAIN ),
        'cyrillic-ext' => __( 'Cyrillic Extended', THEMEDOMAIN ),
        'devanagari' => __( 'Devanagari', THEMEDOMAIN ),
        'greek' => __( 'Greek', THEMEDOMAIN ),
        'greek-ext' => __( 'Greek Extended', THEMEDOMAIN ),
        'khmer' => __( 'Khmer', THEMEDOMAIN ),
        'latin' => __( 'Latin', THEMEDOMAIN ),
        'latin-ext' => __( 'Latin Extended', THEMEDOMAIN ),
        'vietnamese' => __( 'Vietnamese', THEMEDOMAIN ),
        'serif' => _x( 'Serif', 'font style', THEMEDOMAIN ),
        'sans-serif' => _x( 'Sans Serif', 'font style', THEMEDOMAIN ),
        'monospace' => _x( 'Monospace', 'font style', THEMEDOMAIN ),
    );

    $args = array(
        'textdomain'   => THEMEDOMAIN,
    );

    return $args;

}
add_filter( 'kirki/config', 'kirki_demo_configuration_sample' );

/**
 * Create the customizer panels and sections
 */
function tg_add_panels_and_sections( $wp_customize ) {

	/**
     * Add panels
     */
    $wp_customize->add_panel( 'general', array(
        'priority'    => 35,
        'title'       => __( 'General', THEMEDOMAIN ),
    ) ); 
    
    $wp_customize->add_panel( 'menu', array(
        'priority'    => 35,
        'title'       => __( 'Menu', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'header', array(
        'priority'    => 39,
        'title'       => __( 'Header', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'sidebar', array(
        'priority'    => 43,
        'title'       => __( 'Sidebar', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'footer', array(
        'priority'    => 44,
        'title'       => __( 'Footer', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'gallery', array(
        'priority'    => 45,
        'title'       => __( 'Gallery', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'portfolio', array(
        'priority'    => 46,
        'title'       => __( 'Portfolio', THEMEDOMAIN ),
    ) );
    
    $wp_customize->add_panel( 'blog', array(
        'priority'    => 47,
        'title'       => __( 'Blog', THEMEDOMAIN ),
    ) );
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		$wp_customize->add_panel( 'shop', array(
	        'priority'    => 48,
	        'title'       => __( 'Shop', THEMEDOMAIN ),
	    ) );
	}

    /**
     * Add sections
     */
	$wp_customize->add_section( 'logo_favicon', array(
        'title'       => __( 'Logo & Favicon', THEMEDOMAIN ),
        'priority'    => 34,

    ) );
    
    $wp_customize->add_section( 'general_image', array(
        'title'       => __( 'Image', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 46,

    ) );
    
    $wp_customize->add_section( 'general_typography', array(
        'title'       => __( 'Typography', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 47,

    ) );
    
    $wp_customize->add_section( 'general_color', array(
        'title'       => __( 'Background & Colors', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 48,

    ) );
    
    $wp_customize->add_section( 'general_input', array(
        'title'       => __( 'Input and Button Elements', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 49,

    ) );
    
    $wp_customize->add_section( 'general_sharing', array(
        'title'       => __( 'Sharing', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 50,

    ) );
    
    $wp_customize->add_section( 'general_mobile', array(
        'title'       => __( 'Mobile', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 50,

    ) );
    
    $wp_customize->add_section( 'general_frame', array(
        'title'       => __( 'Frame', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 51,

    ) );
    
    $wp_customize->add_section( 'general_boxed', array(
        'title'       => __( 'Boxed Layout', THEMEDOMAIN ),
        'panel'		  => 'general',
        'priority'    => 52,

    ) );

    $wp_customize->add_section( 'menu_general', array(
        'title'       => __( 'General', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 36,

    ) );
    
    $wp_customize->add_section( 'menu_typography', array(
        'title'       => __( 'Typography', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 36,

    ) );
    
    $wp_customize->add_section( 'menu_color', array(
        'title'       => __( 'Colors', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 37,

    ) );
    
    $wp_customize->add_section( 'menu_background', array(
        'title'       => __( 'Background', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_submenu', array(
        'title'       => __( 'Sub Menu', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_megamenu', array(
        'title'       => __( 'Mega Menu', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_topbar', array(
        'title'       => __( 'Top Bar', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 38,

    ) );
    
    $wp_customize->add_section( 'menu_contact', array(
        'title'       => __( 'Contact Info', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 39,

    ) );
    
    $wp_customize->add_section( 'menu_sidemenu', array(
        'title'       => __( 'Side Menu', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 39,

    ) );
    
    $wp_customize->add_section( 'menu_search', array(
        'title'       => __( 'Side Menu Search', THEMEDOMAIN ),
        'panel'		  => 'menu',
        'priority'    => 40,

    ) );
    
    $wp_customize->add_section( 'header_background', array(
        'title'       => __( 'Background', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 40,

    ) );
    
    $wp_customize->add_section( 'header_title', array(
        'title'       => __( 'Page Title', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_title_bg', array(
        'title'       => __( 'Page Title With Background Image', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_builder_title', array(
        'title'       => __( 'Content Builder Header', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 41,

    ) );
    
    $wp_customize->add_section( 'header_tagline', array(
        'title'       => __( 'Page Tagline & Sub Title', THEMEDOMAIN ),
        'panel'		  => 'header',
        'priority'    => 42,

    ) );
    
    $wp_customize->add_section( 'sidebar_typography', array(
        'title'       => __( 'Typography', THEMEDOMAIN ),
        'panel'		  => 'sidebar',
        'priority'    => 43,

    ) );
    
    $wp_customize->add_section( 'sidebar_color', array(
        'title'       => __( 'Colors', THEMEDOMAIN ),
        'panel'		  => 'sidebar',
        'priority'    => 44,

    ) );
    
    $wp_customize->add_section( 'footer_general', array(
        'title'       => __( 'General', THEMEDOMAIN ),
        'panel'		  => 'footer',
        'priority'    => 45,

    ) );
    
    $wp_customize->add_section( 'footer_color', array(
        'title'       => __( 'Colors', THEMEDOMAIN ),
        'panel'		  => 'footer',
        'priority'    => 46,

    ) );
    
    $wp_customize->add_section( 'footer_copyright', array(
        'title'       => __( 'Copyright', THEMEDOMAIN ),
        'panel'		  => 'footer',
        'priority'    => 47,

    ) );
    
    $wp_customize->add_section( 'gallery_sorting', array(
        'title'       => __( 'Images Sorting', THEMEDOMAIN ),
        'panel'		  => 'gallery',
        'priority'    => 48,

    ) );
    
    $wp_customize->add_section( 'gallery_lightbox', array(
        'title'       => __( 'Lightbox', THEMEDOMAIN ),
        'panel'		  => 'gallery',
        'priority'    => 49,

    ) );
    
    $wp_customize->add_section( 'gallery_archive', array(
        'title'       => __( 'Archive', THEMEDOMAIN ),
        'panel'		  => 'gallery',
        'priority'    => 49,

    ) );
    
    $wp_customize->add_section( 'gallery_fullscreen', array(
        'title'       => __( 'Fullscreen', THEMEDOMAIN ),
        'panel'		  => 'gallery',
        'priority'    => 49,

    ) );
    
    $wp_customize->add_section( 'gallery_kenburns', array(
        'title'       => __( 'Kenburns', THEMEDOMAIN ),
        'panel'		  => 'gallery',
        'priority'    => 50,

    ) );
    
    $wp_customize->add_section( 'gallery_flow', array(
        'title'       => __( 'Flow', THEMEDOMAIN ),
        'panel'		  => 'gallery',
        'priority'    => 51,

    ) );
    
    $wp_customize->add_section( 'portfolio_filterable', array(
        'title'       => __( 'Filterable', THEMEDOMAIN ),
        'panel'		  => 'portfolio',
        'priority'    => 50,

    ) );
    
    $wp_customize->add_section( 'portfolio_page', array(
        'title'       => __( 'Page Options', THEMEDOMAIN ),
        'panel'		  => 'portfolio',
        'priority'    => 51,

    ) );
    
    $wp_customize->add_section( 'portfolio_single', array(
        'title'       => __( 'Single Portfolio Page', THEMEDOMAIN ),
        'panel'		  => 'portfolio',
        'priority'    => 52,

    ) );
    
    $wp_customize->add_section( 'blog_general', array(
        'title'       => __( 'General', THEMEDOMAIN ),
        'panel'		  => 'blog',
        'priority'    => 53,

    ) );
    
    $wp_customize->add_section( 'blog_slider', array(
        'title'       => __( 'Slider', THEMEDOMAIN ),
        'panel'		  => 'blog',
        'priority'    => 54,

    ) );
    
    $wp_customize->add_section( 'blog_single', array(
        'title'       => __( 'Single Post', THEMEDOMAIN ),
        'panel'		  => 'blog',
        'priority'    => 55,

    ) );
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		$wp_customize->add_section( 'shop_layout', array(
	        'title'       => __( 'Layout', THEMEDOMAIN ),
	        'panel'		  => 'shop',
	        'priority'    => 55,
	
	    ) );
	    
	    $wp_customize->add_section( 'shop_single', array(
	        'title'       => __( 'Single Product', THEMEDOMAIN ),
	        'panel'		  => 'shop',
	        'priority'    => 56,
	
	    ) );
	}

}
add_action( 'customize_register', 'tg_add_panels_and_sections' );

/**
 * Register and setting to header section
 */
function tg_header_setting( $wp_customize ) {

	//Register Logo Tab Settings
	$wp_customize->add_setting( 'tg_favicon', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );
	
    $wp_customize->add_setting( 'tg_retina_logo', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );
    
    $wp_customize->add_setting( 'tg_retina_transparent_logo', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    //End Logo Tab Settings
    
    //Register General Tab Settings
    $wp_customize->add_setting( 'tg_enable_right_click', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_enable_dragging', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_body_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_body_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
	$wp_customize->add_setting( 'tg_header_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_header_font_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h1_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h2_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h3_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h4_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h5_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_h6_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_content_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_hover_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_h1_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_hr_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_input_focus_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_button_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_button_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    //End General Tab Settings
    

    //Register Menu Tab Settings
    $wp_customize->add_setting( 'tg_main_menu', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_fixed_menu', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_hover_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_active_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_hover_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_hover_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_submenu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_megamenu_header_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_megamenu_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_topbar_social_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_contact_hours', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_contact_number', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_instant', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_input_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_menu_search_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_sidemenu_font_hover_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    //End Menu Tab Settings
    
    //Register Header Tab Settings
	$wp_customize->add_setting( 'tg_page_header_bg_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_page_header_padding_top', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_header_padding_bottom', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_weight', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_font_spacing', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_page_title_bg_height', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_header_builder_font_size', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_header_builder_font_transform', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    //End Header Tab Settings
    
    //Register Copyright Tab Settings
    
    $wp_customize->add_setting( 'tg_footer_sidebar', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
	
	$wp_customize->add_setting( 'tg_footer_social_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
	$wp_customize->add_setting( 'tg_footer_font_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_hover_link_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_border_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_social_color', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'sanitize_hex_color',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_text', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_html',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_right_area', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_footer_copyright_totop', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    //End Copyright Tab Settings
    
    
    //Begin Gallery Tab Settings
    $wp_customize->add_setting( 'tg_gallery_sort', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_lightbox_enable_caption', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_gallery_hover_slide', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_full_autoplay', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_full_slideshow_timer', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_full_slideshow_trans', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_full_slideshow_trans_speed', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_full_image_caption', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_full_nocover', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_full_arrow', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_kenburns_timer', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_kenburns_zoom', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_kenburns_trans', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    //End Gallery Tab Settings
    
    
    //Begin Portfolio Tab Settings
    $wp_customize->add_setting( 'tg_portfolio_filterable', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_filterable_link', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_filterable_sort', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_items', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_portfolio_next_prev', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    //End Portfolio Tab Settings
    
    
    //Begin Blog Tab Settings
    $wp_customize->add_setting( 'tg_blog_display_full', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_archive_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_category_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_tag_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_slider', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_slider_layout', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_slider_cat', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'esc_html',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_slider_items', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_slider',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_header_bg', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_feat_content', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_tags', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_author', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    
    $wp_customize->add_setting( 'tg_blog_display_related', array(
        'type'           => 'theme_mod',
        'capability'     => 'edit_theme_options',
        'sanitize_callback' => 'tg_sanitize_checkbox',
    ) );
    //End Blog Tab Settings
    
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		//Begin Shop Tab Settings
		$wp_customize->add_setting( 'tg_shop_layout', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'esc_html',
	    ) );
	    
	    $wp_customize->add_setting( 'tg_shop_items', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'tg_sanitize_slider',
	    ) );
	    
	    $wp_customize->add_setting( 'tg_shop_price_font_color', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_hex_color',
	    ) );
	    
	    $wp_customize->add_setting( 'tg_shop_related_products', array(
	        'type'           => 'theme_mod',
	        'capability'     => 'edit_theme_options',
			'sanitize_callback' => 'tg_sanitize_checkbox',
	    ) );
		//End Shop Tab Settings
	}
    
    
    //Add Live preview
    if ( $wp_customize->is_preview() && ! is_admin() ) {
	    add_action( 'wp_footer', 'tg_customize_preview', 21);
	}
}
add_action( 'customize_register', 'tg_header_setting' );

/**
 * Create the setting
 */
function tg_custom_setting( $controls ) {

	//Default control choices
	$tg_text_transform = array(
	    'none' => 'None',
	    'capitalize' => 'Capitalize',
	    'uppercase' => 'Uppercase',
	    'lowercase' => 'Lowercase',
	);
	
	$tg_text_alignment = array(
	    'left' => 'Left',
	    'center' => 'Center',
	    'right' => 'Right',
	);
	
	$tg_copyright_content = array(
	    'social' => 'Social Icons',
	    'menu' => 'Footer Menu',
	);
	
	$tg_copyright_column = array(
	    '' => 'Hide Footer Sidebar',
	    1 => '1 Column',
	    2 => '2 Column',
	    3 => '3 Column',
	    4 => '4 Column',
	);
	
	$tg_gallery_sort = array(
		'drag' => 'By Drag&drop',
		'post_date' => 'By Newest',
		'post_date_old' => 'By Oldest',
		'rand' => 'By Random',
		'title' => 'By Title',
	);
	
	$tg_portfolio_filterable_sort = array(
		'name' => 'By Name',
		'slug' => 'By Slug',
		'id' => 'By ID',
		'count' => 'By Number of Portfolio',
	);
	
	$tg_shop_layout = array(
		'fullwidth' => 'Fullwidth',
		'sidebar' => 'With Sidebar',
	);
	
	$tg_slideshow_trans = array(
	    1 => 'Fade',
	    2 => 'Slide Top',
	    3 => 'Slide Right',
	    4 => 'Slide Bottom',
	    5 => 'Slide Left',
	    6 => 'Carousel Right',
	    7 => 'Carousel Left',
	);
	
	$tg_menu_layout = array(
	    'centermenu' => 'Center Align',
	    'leftmenu' => 'Left Align',
	);
	
	$tg_blog_layout = array(
		'blog_r' => 'Right Sidebar',
		'blog_l' => 'Left Sidebar',
		'blog_f' => 'Fullwidth',
		'blog_g' => 'Grid',
		'blog_gs' => 'Grid Right Sidebar',
		'blog_gls' => 'Grid Left Sidebar',
	);
	
	$tg_slider_layout = array(
		'slider' => 'Fullwidth',
		'3cols-slider' => '3 Columns',
	);
	
	//Get all categories
	$categories_arr = get_categories();
	$tg_categories_select = array();
	$tg_categories_select[''] = '';
	
	foreach ($categories_arr as $cat) {
		$tg_categories_select[$cat->cat_ID] = $cat->cat_name;
	}
	
	//Register Logo Tab Settings
	$controls[] = array(
        'type'     => 'image',
        'setting'  => 'tg_favicon',
        'label'    => __( 'Favicon', THEMEDOMAIN ),
        'description' => __('A favicon is a 16x16 pixel icon that represents your site; paste the URL to a .ico image that you want to use as the image', THEMEDOMAIN ),
        'section'  => 'logo_favicon',
	    'default'  => '',
	    'priority' => 1,
    );
	
	$controls[] = array(
        'type'     => 'image',
        'setting'  => 'tg_retina_logo',
        'label'    => __( 'Retina Logo', THEMEDOMAIN ),
        'description' => __('Retina Ready Image logo. It should be 2x size of normal logo. For example 200x60px logo will displays at 100x30px', THEMEDOMAIN ),
        'section'  => 'logo_favicon',
	    'default'  => get_template_directory_uri().'/images/logo@2x.png',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'image',
        'setting'  => 'tg_retina_transparent_logo',
        'label'    => __( 'Retina Transparent Logo', THEMEDOMAIN ),
        'description' => __('Retina Ready Image logo for menu transparent page. It should be 2x size of normal logo. For example 200x60px logo will displays at 100x30px. Recommend logo color is white or bright color', THEMEDOMAIN ),
        'section'  => 'logo_favicon',
	    'default'  => get_template_directory_uri().'/images/logo@2x_white.png',
	    'priority' => 3,
    );
    //End Logo Tab Settings
    
    //Register General Tab Settings
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_enable_right_click',
        'label'    => __( 'Enable Right Click Protection', THEMEDOMAIN ),
        'description' => __('Check this to disable right click.', THEMEDOMAIN ),
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_enable_dragging',
        'label'    => __( 'Enable Image Dragging Protection', THEMEDOMAIN ),
        'description' => __('Check this to disable dragging on all images.', THEMEDOMAIN ),
        'section'  => 'general_image',
        'default'  => '',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_body_font',
        'label'    => __( 'Main Content Font Family', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 'Lato',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => 'body, input[type=text], input[type=email], input[type=url], input[type=password], textarea',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_body_font_size',
        'label'    => __( 'Main Content Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 16,
        'choices' => array( 'min' => 11, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'body',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_header_font',
        'label'    => __( 'H1, H2, H3, H4, H5, H6 Font Family', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 'Oswald',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7, input[type=submit], input[type=button], a.button, .button, .post_quote_title, label, .portfolio_filter_dropdown, .woocommerce ul.products li.product .button, .woocommerce ul.products li.product a.add_to_cart_button.loading, .woocommerce-page ul.products li.product a.add_to_cart_button.loading, .woocommerce ul.products li.product a.add_to_cart_button:hover, .woocommerce-page ul.products li.product a.add_to_cart_button:hover, .woocommerce #page_content_wrapper a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page  #page_content_wrapper a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce-page input.button:active, .woocommerce #page_content_wrapper a.button, .woocommerce-page #page_content_wrapper a.button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button:hover, strong[itemprop="author"], #page_content_wrapper .posts.blog li a, .page_content_wrapper .posts.blog li a',
	            'property' => 'font-family',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_header_font_weight',
        'label'    => __( 'H1, H2, H3, H4, H5, H6 Font Weight', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 300,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, h6, h7',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h1_size',
        'label'    => __( 'H1 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 34,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h1',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h2_size',
        'label'    => __( 'H2 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 30,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h2',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h3_size',
        'label'    => __( 'H3 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 26,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h3',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h4_size',
        'label'    => __( 'H4 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 22,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h4',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h5_size',
        'label'    => __( 'H5 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 18,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h5',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_h6_size',
        'label'    => __( 'H6 Font Size', THEMEDOMAIN ),
        'section'  => 'general_typography',
        'default'  => 16,
        'choices' => array( 'min' => 13, 'max' => 60, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h6',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_content_bg_color',
        'label'    => __( 'Main Content Background Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'body, #wrapper, #page_content_wrapper.fixed, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle span, h2.widgettitle span, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, #body_loading_screen, h3#reply-title span',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_font_color',
        'label'    => __( 'Page Content Font Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => 'body, .pagination a, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, .post_info a',
	            'property' => 'color',
	        ),
	        array(
	            'element'  => '::selection',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_link_color',
        'label'    => __( 'Page Content Link Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => 'a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_hover_link_color',
        'label'    => __( 'Page Content Hover Link Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#999999',
        'output' => array(
	        array(
	            'element'  => 'a:hover, a:active, .post_info_comment a i',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_h1_font_color',
        'label'    => __( 'H1, H2, H3, H4, H5, H6 Font Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => 'h1, h2, h3, h4, h5, pre, code, tt, blockquote, .post_header h5 a, .post_header h3 a, .post_header.grid h6 a, .post_header.fullwidth h4 a, .post_header h5 a, blockquote, .site_loading_logo_item i',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 14,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_hr_color',
        'label'    => __( 'Horizontal Line Color', THEMEDOMAIN ),
        'section'  => 'general_color',
        'default'  => '#e1e1e1',
        'output' => array(
	        array(
	            'element'  => '#social_share_wrapper, hr, #social_share_wrapper, .post.type-post, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .comment .right, .widget_tag_cloud div a, .meta-tags a, .tag_cloud a, #footer, #post_more_wrapper, .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, #page_content_wrapper .inner .sidebar_content, #page_caption, #page_content_wrapper .inner .sidebar_content.left_sidebar, .ajax_close, .ajax_next, .ajax_prev, .portfolio_next, .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_next, .separated, .blog_next_prev_wrapper, #post_more_wrapper h5, #ajax_portfolio_wrapper.hidding, #ajax_portfolio_wrapper.visible, .tabs.vertical .ui-tabs-panel, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce-page div.product .woocommerce-tabs .panel, .woocommerce #content div.product .woocommerce-tabs .panel, .woocommerce-page #content div.product .woocommerce-tabs .panel, .woocommerce table.shop_table, .woocommerce-page table.shop_table, table tr td, .woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, .woocommerce .cart-collaterals .shipping_calculator, .woocommerce-page .cart-collaterals .shipping_calculator, .woocommerce .cart-collaterals .cart_totals tr td, .woocommerce .cart-collaterals .cart_totals tr th, .woocommerce-page .cart-collaterals .cart_totals tr td, .woocommerce-page .cart-collaterals .cart_totals tr th, table tr th, .woocommerce #payment, .woocommerce-page #payment, .woocommerce #payment ul.payment_methods li, .woocommerce-page #payment ul.payment_methods li, .woocommerce #payment div.form-row, .woocommerce-page #payment div.form-row, .ui-tabs li:first-child, .ui-tabs .ui-tabs-nav li, .ui-tabs.vertical .ui-tabs-nav li, .ui-tabs.vertical.right .ui-tabs-nav li.ui-state-active, .ui-tabs.vertical .ui-tabs-nav li:last-child, #page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .pricing_wrapper, .pricing_wrapper li, .ui-accordion .ui-accordion-header, .ui-accordion .ui-accordion-content, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle:before, h2.widgettitle:before, #autocomplete, .page_tagline, .ppb_blog_minimal .one_third_bg, .portfolio_desc.wide',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 15,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_input_bg_color',
        'label'    => __( 'Input and Textarea Background Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], textarea',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_input_font_color',
        'label'    => __( 'Input and Textarea Font Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#000',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], textarea',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 17,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_input_border_color',
        'label'    => __( 'Input and Textarea Border Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#e1e1e1',
        'output' => array(
	        array(
	            'element'  => 'input[type=text], input[type=password], input[type=email], input[type=url], textarea',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_input_focus_color',
        'label'    => __( 'Input and Textarea Focus State Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => 'input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=url]:focus, textarea:focus',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 19,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_button_font',
        'label'    => __( 'Button Font Family', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => 'Oswald',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 19,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_button_bg_color',
        'label'    => __( 'Button Background Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#888888',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce .footer_bar .button, .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
	            'property' => 'background-color',
	        ),
	        array(
	            'element'  => '.pagination span, .pagination a:hover',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 20,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_button_font_color',
        'label'    => __( 'Button Font Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination a:hover, .woocommerce .footer_bar .button , .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 21,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_button_border_color',
        'label'    => __( 'Button Border Color', THEMEDOMAIN ),
        'section'  => 'general_input',
        'default'  => '#888888',
        'output' => array(
	        array(
	            'element'  => 'input[type=submit], input[type=button], a.button, .button, .pagination a:hover, .woocommerce .footer_bar .button , .woocommerce .footer_bar .button:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 22,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_mobile_responsive',
        'label'    => __( 'Enable Responsive Layout', THEMEDOMAIN ),
        'description' => __('Check this to enable responsive layout for tablet and mobile devices.', THEMEDOMAIN ),
        'section'  => 'general_mobile',
        'default'  => 1,
	    'priority' => 25,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_frame',
        'label'    => __( 'Enable Frame', THEMEDOMAIN ),
        'description' => __('Check this to enable frame for site layout', THEMEDOMAIN ),
        'section'  => 'general_frame',
        'default'  => 0,
	    'priority' => 26,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_frame_color',
        'label'    => __( 'Frame Color', THEMEDOMAIN ),
        'section'  => 'general_frame',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '.frame_top, .frame_bottom, .frame_left, .frame_right',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 27,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_boxed',
        'label'    => __( 'Enable Boxed Layout', THEMEDOMAIN ),
        'description' => __('Check this to enable boxed layout for site layout', THEMEDOMAIN ),
        'section'  => 'general_boxed',
        'default'  => 0,
	    'priority' => 28,
    );
    //End General Tab Settings

	//Register Menu Tab Settings
	
	$controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_main_menu',
        'label'    => __( 'Enable Main Menu', THEMEDOMAIN ),
        'description' => __('Enable this to display main menu.', THEMEDOMAIN ),
        'section'  => 'menu_general',
        'default'  => 1,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_menu_layout',
        'label'    => __( 'Menu Layout', THEMEDOMAIN ),
        'section'  => 'menu_general',
        'default'  => 'Lato',
        'choices'  => $tg_menu_layout,
	    'priority' => 1,
    );
	
	$controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_fixed_menu',
        'label'    => __( 'Enable Sticky Menu', THEMEDOMAIN ),
        'description' => __('Enable this to display main menu fixed when scrolling.', THEMEDOMAIN ),
        'section'  => 'menu_general',
        'default'  => '',
	    'priority' => 1,
    );
	
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_menu_font',
        'label'    => __( 'Menu Font Family', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 'Lato',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'font-family',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_menu_font_size',
        'label'    => __( 'Menu Font Size', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 12,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_menu_weight',
        'label'    => __( 'Menu Font Weight', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 600,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_menu_font_spacing',
        'label'    => __( 'Menu Font Spacing', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_menu_transform',
        'label'    => __( 'Menu Font Text Transform', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_font_color',
        'label'    => __( 'Menu Font Color', THEMEDOMAIN ),
        'section'  => 'menu_color',
        'default'  => '#666666',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_hover_font_color',
        'label'    => __( 'Menu Hover State Font Color', THEMEDOMAIN ),
        'section'  => 'menu_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li a.hover, #menu_wrapper .nav ul li a:hover, #menu_wrapper div .nav li a.hover, #menu_wrapper div .nav li a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_active_font_color',
        'label'    => __( 'Menu Active State Font Color', THEMEDOMAIN ),
        'section'  => 'menu_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a, #menu_wrapper div .nav li ul li.current-menu-item a, #menu_wrapper div .nav li.current-menu-parent  ul li.current-menu-item a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_border_color',
        'label'    => __( 'Menu Border Color', THEMEDOMAIN ),
        'section'  => 'menu_color',
        'default'  => '#e1e1e1',
        'output' => array(
	        array(
	            'element'  => '.top_bar',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'background',
        'setting'  => 'tg_menu_bg',
        'label'    => __( 'Menu Background', THEMEDOMAIN ),
        'section'  => 'menu_background',
	    'default'     => array(
	        'color'    => 'rgba(256,256,256,0.95)',
	        'image'    => '',
	        'repeat'   => 'no-repeat',
	        'size'     => 'cover',
	        'attach'   => 'fixed',
	        'position' => 'left-top',
	        'opacity'  => 100
	    ),
	    'output' => '.top_bar',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_submenu_font_size',
        'label'    => __( 'SubMenu Font Size', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => 11,
        'choices' => array( 'min' => 10, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_submenu_weight',
        'label'    => __( 'SubMenu Font Weight', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => 600,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_submenu_font_spacing',
        'label'    => __( 'SubMenu Font Spacing', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_submenu_transform',
        'label'    => __( 'Menu Font Text Transform', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_font_color',
        'label'    => __( 'Sub Menu Font Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#888888',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_hover_font_color',
        'label'    => __( 'Sub Menu Hover State Font Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#444444',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 14,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_hover_bg_color',
        'label'    => __( 'Sub Menu Hover State Background Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#f9f9f9',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 15,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_bg_color',
        'label'    => __( 'Sub Menu Background Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 16,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_border_color',
        'label'    => __( 'Sub Menu Border Color', THEMEDOMAIN ),
        'section'  => 'menu_submenu',
        'default'  => '#e1e1e1',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 17,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_megamenu_header_color',
        'label'    => __( 'Mega Menu Header Font Color', THEMEDOMAIN ),
        'section'  => 'menu_megamenu',
        'default'  => '#444444',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li > a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_megamenu_border_color',
        'label'    => __( 'Mega Menu Border Color', THEMEDOMAIN ),
        'section'  => 'menu_megamenu',
        'default'  => '#eeeeee',
        'output' => array(
	        array(
	            'element'  => '#menu_wrapper div .nav li.megamenu ul li',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 20,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_topbar',
        'label'    => __( 'Display Top Bar', THEMEDOMAIN ),
        'description' => __('Enable this option to display top bar above main menu', THEMEDOMAIN ),
        'section'  => 'menu_topbar',
        'default'  => 0,
	    'priority' => 21,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_topbar_bg_color',
        'label'    => __( 'Top Bar Background Color', THEMEDOMAIN ),
        'section'  => 'menu_topbar',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.above_top_bar',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 22,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_topbar_font_color',
        'label'    => __( 'Top Bar Menu Font Color', THEMEDOMAIN ),
        'section'  => 'menu_topbar',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#top_menu li a, .top_contact_info, .top_contact_info i, .top_contact_info a, .top_contact_info a:hover, .top_contact_info a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 23,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'tg_menu_contact_hours',
        'label'    => __( 'Contact Hours (Optional)', THEMEDOMAIN ),
        'description' => __('Enter your company contact hours.', THEMEDOMAIN ),
        'section'  => 'menu_contact',
        'default'  => 'Mon-Fri 09.00 - 17.00',
        'transport' 	 => 'postMessage',
	    'priority' => 26,
    );
    
    $controls[] = array(
        'type'     => 'text',
        'setting'  => 'tg_menu_contact_number',
        'label'    => __( 'Contact Phone Number (Optional)', THEMEDOMAIN ),
        'description' => __('Enter your company contact phone number.', THEMEDOMAIN ),
        'section'  => 'menu_contact',
        'default'  => '1.800.456.6743',
        'transport' => 'postMessage',
	    'priority' => 27,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_topbar_social_link',
        'label'    => __( 'Open Top Bar Social Icons link in new window', THEMEDOMAIN ),
        'description' => __('Check this to open top bar social icons link in new window', THEMEDOMAIN ),
        'section'  => 'menu_contact',
        'default'  => 1,
	    'priority' => 28,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_menu_search',
        'label'    => __( 'Enable Search', THEMEDOMAIN ),
        'description' => __('Select to display search form in header of side menu', THEMEDOMAIN ),
        'section'  => 'menu_search',
        'default'  => 1,
	    'priority' => 28,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_menu_search_instant',
        'label'    => __( 'Enable Instant Search', THEMEDOMAIN ),
        'description' => __('Select to display search result instantly while typing', THEMEDOMAIN ),
        'section'  => 'menu_search',
        'default'  => 1,
	    'priority' => 29,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_search_input_color',
        'label'    => __( 'Search Input Background Color', THEMEDOMAIN ),
        'section'  => 'menu_search',
        'default'  => '#ebebeb',
        'output' => array(
	        array(
	            'element'  => '.mobile_menu_wrapper #searchform',
	            'property' => 'background',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 30,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_menu_search_font_color',
        'label'    => __( 'Search Input Font Color', THEMEDOMAIN ),
        'section'  => 'menu_search',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.mobile_menu_wrapper #searchform input[type=text], .mobile_menu_wrapper #searchform button i',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 31,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_sidemenu',
        'label'    => __( 'Enable Side Menu on Desktop', THEMEDOMAIN ),
        'description' => 'Check this option to enable side menu on desktop',
        'section'  => 'menu_sidemenu',
        'default'  => 1,
	    'priority' => 31,
    );
    
    $controls[] = array(
        'type'     => 'background',
        'setting'  => 'tg_sidemenu_bg',
        'label'    => __( 'Side Menu Background', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
	    'default'     => array(
	        'color'    => '#ffffff',
	        'image'    => '',
	        'repeat'   => 'no-repeat',
	        'size'     => 'cover',
	        'attach'   => 'fixed',
	        'position' => 'left-top',
	        'opacity'  => 100
	    ),
	    'output' => '.mobile_menu_wrapper',
	    'priority' => 32,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_sidemenu_font',
        'label'    => __( 'Side Menu Font Family', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => 'Lato',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'font-family',
	        ),
	    ),
		'transport' => 'postMessage',
	    'priority' => 40,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidemenu_font_size',
        'label'    => __( 'Side Menu Font Size', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => 13,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 41,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_sidemenu_font_transform',
        'label'    => __( 'Side Menu Font Text Transform', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 42,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidemenu_font_spacing',
        'label'    => __( 'Side Menu Font Spacing', THEMEDOMAIN ),
        'section'  => 'menu_typography',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 42,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidemenu_font_color',
        'label'    => __( 'Side Menu Font Color', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => '#666666',
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a, #sub_menu li a, .mobile_menu_wrapper .sidebar_wrapper a, .mobile_menu_wrapper .sidebar_wrapper, #close_mobile_menu i',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 43,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_submenu_hover_font_color',
        'label'    => __( 'Side Menu Hover State Font Color', THEMEDOMAIN ),
        'section'  => 'menu_sidemenu',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '.mobile_main_nav li a:hover, .mobile_main_nav li a:active, #sub_menu li a:hover, #sub_menu li a:active, .mobile_menu_wrapper .sidebar_wrapper h2.widgettitle',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 44,
    );
    //End Menu Tab Settings
    
    //Register Header Tab Settings
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_page_title_img_blur',
        'label'    => __( 'Add Blur Effect When Scroll', THEMEDOMAIN ),
        'description' => __('Enable this option to add blur effect to header background image when scrolling pass it', THEMEDOMAIN ),
        'section'  => 'header_background',
        'default'  => '1',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_page_header_bg_color',
        'label'    => __( 'Page Header Background Color', THEMEDOMAIN ),
        'section'  => 'header_background',
        'default'  => '#ffffff',
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'background-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 18,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_header_padding_top',
        'label'    => __( 'Page Header Padding Top', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 80,
        'choices' => array( 'min' => 0, 'max' => 200, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'padding-top',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_header_padding_bottom',
        'label'    => __( 'Page Header Padding Bottom', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 80,
        'choices' => array( 'min' => 0, 'max' => 200, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption',
	            'property' => 'padding-bottom',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_title_font_size',
        'label'    => __( 'Page Title Font Size', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 48,
        'choices' => array( 'min' => 12, 'max' => 100, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_title_font_weight',
        'label'    => __( 'Page Title Font Weight', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 300,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title, .post_caption h1',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_page_title_transform',
        'label'    => __( 'Page Title Text Transform', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title, .post_caption h1',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_title_font_spacing',
        'label'    => __( 'Page Title Font Spacing', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => 1,
        'choices' => array( 'min' => -2, 'max' => 5, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title, .post_caption h1',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_page_title_font_color',
        'label'    => __( 'Page Title Font Color', THEMEDOMAIN ),
        'section'  => 'header_title',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_caption h1, .ppb_title, .post_caption h1',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_title_bg_height',
        'label'    => __( 'Page Title Background Image Height (in %)', THEMEDOMAIN ),
        'section'  => 'header_title_bg',
        'default'  => 70,
        'choices' => array( 'min' => 10, 'max' => 100, 'step' => 5 ),
        'output' => array(
	        array(
	            'element'  => '#page_caption.hasbg',
	            'property' => 'height',
	            'units'    => 'vh',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_header_builder_font_size',
        'label'    => __( ' Content Builder Header Font Size', THEMEDOMAIN ),
        'section'  => 'header_builder_title',
        'default'  => 42,
        'choices' => array( 'min' => 12, 'max' => 100, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => 'h2.ppb_title',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_header_builder_font_transform',
        'label'    => __( 'Content Builder Header Text Transform', THEMEDOMAIN ),
        'section'  => 'header_builder_title',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => 'h2.ppb_title',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_page_tagline_font_color',
        'label'    => __( 'Page Tagline Font Color', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => '#999999',
        'output' => array(
	        array(
	            'element'  => '.page_tagline, .ppb_subtitle, .post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_tagline_font_size',
        'label'    => __( 'Page Title Font Size', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => 13,
        'choices' => array( 'min' => 10, 'max' => 30, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.page_tagline, .post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_tagline_font_weight',
        'label'    => __( 'Page Tagline Font Weight', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => 400,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '.page_tagline',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_page_tagline_font_spacing',
        'label'    => __( 'Page Tagline Font Spacing', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 4, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '.post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_page_tagline_transform',
        'label'    => __( 'Page Tagline Text Transform', THEMEDOMAIN ),
        'section'  => 'header_tagline',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '.post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    //End Header Tab Settings
    
    //Register Sidebar Tab Settings
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_sidebar_title_font',
        'label'    => __( 'Widget Title Font Family', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 'Oswald',
        'choices'  => Kirki_Fonts::get_font_choices(),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'font-family',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidebar_title_font_size',
        'label'    => __( 'Widget Title Font Size', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 13,
        'choices' => array( 'min' => 11, 'max' => 40, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'font-size',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidebar_title_font_weight',
        'label'    => __( 'Widget Title Font Weight', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 400,
        'choices' => array( 'min' => 100, 'max' => 900, 'step' => 100 ),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'font-weight',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_sidebar_title_font_spacing',
        'label'    => __( 'Widget Title Font Spacing', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 2,
        'choices' => array( 'min' => -2, 'max' => 4, 'step' => 1 ),
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'letter-spacing',
	            'units'    => 'px',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_sidebar_title_transform',
        'label'    => __( 'Widget Title Text Transform', THEMEDOMAIN ),
        'section'  => 'sidebar_typography',
        'default'  => 'uppercase',
        'choices'  => $tg_text_transform,
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'text-transform',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidebar_font_color',
        'label'    => __( 'Sidebar Font Color', THEMEDOMAIN ),
        'section'  => 'sidebar_color',
        'default'  => '#444444',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .page_content_wrapper .inner .sidebar_wrapper .sidebar .content',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidebar_link_color',
        'label'    => __( 'Sidebar Link Color', THEMEDOMAIN ),
        'section'  => 'sidebar_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a, .page_content_wrapper .inner .sidebar_wrapper a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidebar_hover_link_color',
        'label'    => __( 'Sidebar Hover Link Color', THEMEDOMAIN ),
        'section'  => 'sidebar_color',
        'default'  => '#999999',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .inner .sidebar_wrapper a:hover, #page_content_wrapper .inner .sidebar_wrapper a:active, .page_content_wrapper .inner .sidebar_wrapper a:hover, .page_content_wrapper .inner .sidebar_wrapper a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_sidebar_title_color',
        'label'    => __( 'Sidebar Widget Title Font Color', THEMEDOMAIN ),
        'section'  => 'sidebar_color',
        'default'  => '#222222',
        'output' => array(
	        array(
	            'element'  => '#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 9,
    );
    //End Sidebar Tab Settings
    
    //Register Footer Tab Settings
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_footer_sidebar',
        'label'    => __( 'Footer Sidebar Columns', THEMEDOMAIN ),
        'section'  => 'footer_general',
        'default'  => 4,
        'choices'  => $tg_copyright_column,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_footer_social_link',
        'label'    => __( 'Open Footer Social Icons link in new window', THEMEDOMAIN ),
        'description' => __('Check this to open footer social icons link in new window', THEMEDOMAIN ),
        'section'  => 'footer_general',
        'default'  => 1,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'background',
        'setting'  => 'tg_footer_bg',
        'label'    => __( 'Footer Background', THEMEDOMAIN ),
        'section'  => 'footer_color',
	    'default'     => array(
	        'color'    => '#ffffff',
	        'image'    => '',
	        'repeat'   => 'no-repeat',
	        'size'     => 'cover',
	        'attach'   => 'fixed',
	        'position' => 'center-center',
	        'opacity'  => 100
	    ),
	    'output' => '.footer_bar',
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_font_color',
        'label'    => __( 'Footer Font Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => '#footer, #copyright',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_link_color',
        'label'    => __( 'Footer Link Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => '#copyright a, #copyright a:active, #footer a, #footer a:active',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_hover_link_color',
        'label'    => __( 'Footer Hover Link Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => '#copyright a:hover, #footer a:hover, .social_wrapper ul li a:hover',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 12,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_border_color',
        'label'    => __( 'Footer Border Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#e1e1e1',
        'output' => array(
	        array(
	            'element'  => '.footer_bar_wrapper, .footer_bar',
	            'property' => 'border-color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'color',
        'setting'  => 'tg_footer_social_color',
        'label'    => __( 'Footer Social Icon Color', THEMEDOMAIN ),
        'section'  => 'footer_color',
        'default'  => '#000000',
        'output' => array(
	        array(
	            'element'  => '.footer_bar_wrapper .social_wrapper ul li a',
	            'property' => 'color',
	        ),
	    ),
	    'transport' 	 => 'postMessage',
	    'priority' => 13,
    );
    
    $controls[] = array(
        'type'     => 'textarea',
        'setting'  => 'tg_footer_copyright_text',
        'label'    => __( 'Copyright Text', THEMEDOMAIN ),
        'description' => __('Enter your copyright text.', THEMEDOMAIN ),
        'section'  => 'footer_copyright',
        'default'  => '© Copyright PhotoMe Theme Demo - Theme by ThemeGoods',
        'transport' 	 => 'postMessage',
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_footer_copyright_right_area',
        'label'    => __( 'Copyright Right Area Content', THEMEDOMAIN ),
        'section'  => 'footer_copyright',
        'default'  => 'social',
        'choices'  => $tg_copyright_content,
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_footer_copyright_totop',
        'label'    => __( 'Go To Top Button', THEMEDOMAIN ),
        'description' => 'Check this option to enable go to top button at the bottom of page when scrolling',
        'section'  => 'footer_copyright',
        'default'  => 1,
	    'priority' => 7,
    );
    //End Footer Tab Settings
    
    
    //Begin Gallery Tab Settings
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_gallery_sort',
        'label'    => __( 'Gallery Images Sorting', THEMEDOMAIN ),
        'section'  => 'gallery_sorting',
        'default'  => 'drag',
        'choices'  => $tg_gallery_sort,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_lightbox_enable_caption',
        'label'    => __( 'Display image caption in lightbox', THEMEDOMAIN ),
        'description' => __('Check if you want to display image caption under the image in lightbox mode', THEMEDOMAIN ),
        'section'  => 'gallery_lightbox',
        'default'  => 1,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_gallery_hover_slide',
        'label'    => __( 'Enable slideshow on hover effect', THEMEDOMAIN ),
        'description' => __('Check this option to enable slideshow effect when move mouse over gallery thumbnail', THEMEDOMAIN ),
        'section'  => 'gallery_archive',
        'default'  => 1,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_full_autoplay',
        'label'    => __( 'Enable autoplay slideshow', THEMEDOMAIN ),
        'description' => __('Check this option to let fullscreen slideshow starts playing automatically', THEMEDOMAIN ),
        'section'  => 'gallery_fullscreen',
        'default'  => 1,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_full_slideshow_timer',
        'label'    => __( 'Slideshow Timer', THEMEDOMAIN ),
        'description' => __('Select number of seconds for Full Screen Slideshow timer', THEMEDOMAIN ),
        'section'  => 'gallery_fullscreen',
        'default'  => 9,
        'choices' => array( 'min' => 1, 'max' => 20, 'step' => 1 ),
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_full_slideshow_trans',
        'label'    => __( 'Slideshow Transition Effect', THEMEDOMAIN ),
        'description' => __('Select transition type for contents in Full Screen slideshow', THEMEDOMAIN ),
        'section'  => 'gallery_fullscreen',
        'default'  => 1,
        'choices'  => $tg_slideshow_trans,
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_full_slideshow_trans_speed',
        'label'    => __( 'Slideshow Transition Timer', THEMEDOMAIN ),
        'description' => __('Select number of milliseconds for transition between each image', THEMEDOMAIN ),
        'section'  => 'gallery_fullscreen',
        'default'  => 800,
        'choices' => array( 'min' => 100, 'max' => 10000, 'step' => 100 ),
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_full_image_caption',
        'label'    => __( 'Display slideshow image caption', THEMEDOMAIN ),
        'description' => __('Check this option if you want to display fullscreen slideshow image caption', THEMEDOMAIN ),
        'section'  => 'gallery_fullscreen',
        'default'  => 1,
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_full_nocover',
        'label'    => __( 'Display image proportion size', THEMEDOMAIN ),
        'description' => __('Check this option if you want to display slide image proportion size without covering screen', THEMEDOMAIN ),
        'section'  => 'gallery_fullscreen',
        'default'  => 0,
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_full_arrow',
        'label'    => __( 'Display slideshow arrows', THEMEDOMAIN ),
        'description' => __('Check this option if you want to display slide navigation arrow', THEMEDOMAIN ),
        'section'  => 'gallery_fullscreen',
        'default'  => 0,
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_kenburns_timer',
        'label'    => __( 'Kenburns Slideshow timer', THEMEDOMAIN ),
        'description' => __('Select number of seconds for Kenburns Slideshow timer', THEMEDOMAIN ),
        'section'  => 'gallery_kenburns',
        'default'  => 7,
        'choices' => array( 'min' => 1, 'max' => 20, 'step' => 1 ),
	    'priority' => 8,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_kenburns_zoom',
        'label'    => __( 'Kenburns Zoom Level', THEMEDOMAIN ),
        'description' => __('Select zoom level for Kenburns slideshow', THEMEDOMAIN ),
        'section'  => 'gallery_kenburns',
        'default'  => 2,
        'choices' => array( 'min' => 1, 'max' => 10, 'step' => 1 ),
	    'priority' => 9,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_kenburns_trans',
        'label'    => __( 'Kenburns Transition Timer', THEMEDOMAIN ),
        'description' => __('Select number of seconds for transition between each image', THEMEDOMAIN ),
        'section'  => 'gallery_kenburns',
        'default'  => 1000,
        'choices' => array( 'min' => 100, 'max' => 1000, 'step' => 100),
	    'priority' => 10,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_flow_enable_reflection',
        'label'    => __( 'Display Image Reflection', THEMEDOMAIN ),
        'description' => __('Check this option if you want to display mirror reflection effect in flow gallery', THEMEDOMAIN ),
        'section'  => 'gallery_flow',
        'default'  => 1,
	    'priority' => 11,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_flow_enable_lightbox',
        'label'    => __( 'Link flow gallery image to lightbox', THEMEDOMAIN ),
        'description' => __('Check this option if you want to link flow gallery to full size image in lightbox mode', THEMEDOMAIN ),
        'section'  => 'gallery_flow',
        'default'  => 1,
	    'priority' => 12,
    );
    
    //End Gallery Tab Settings
    
    
    //Begin Portfolio Tab Settings
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_portfolio_filterable',
        'label'    => __( 'Enable Portfolio Filterable Feature', THEMEDOMAIN ),
        'description' => __('Check this option to enable filterable feature in portfolio pages', THEMEDOMAIN ),
        'section'  => 'portfolio_filterable',
        'default'  => 1,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_portfolio_filterable_link',
        'label'    => __( 'Link Portfolio Filterable', THEMEDOMAIN ),
        'description' => __('Check this option to enable linking filterable to its page.', THEMEDOMAIN ),
        'section'  => 'portfolio_filterable',
        'default'  => 0,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_portfolio_filterable_sort',
        'label'    => __( 'Portfolio Filterable Options Sorting', THEMEDOMAIN ),
        'section'  => 'portfolio_filterable',
        'default'  => 'name',
        'choices'  => $tg_portfolio_filterable_sort,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_portfolio_items',
        'label'    => __( 'Portfolio Page Show At Most', THEMEDOMAIN ),
        'description' => __('Select number of portfolio items you want to display per page', THEMEDOMAIN ),
        'section'  => 'portfolio_page',
        'default'  => 24,
        'choices' => array( 'min' => 1, 'max' => 50, 'step' => 1 ),
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_portfolio_next_prev',
        'label'    => __( 'Display Next and Previous Portfolios', THEMEDOMAIN ),
        'description' => __('Check this option to display next and previous portfolios in single portfolio page', THEMEDOMAIN ),
        'section'  => 'portfolio_single',
        'default'  => 1,
	    'priority' => 6,
    );
    //End Portfolio Tab Settings
    
    
    //Begin Blog Tab Settings
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_display_full',
        'label'    => __( 'Display Full Blog Post Content', THEMEDOMAIN ),
        'description' => __('Check this option to display post full content in blog page (excerpt blog grid layout)', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 0,
	    'priority' => 1,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_archive_layout',
        'label'    => __( 'Archive Page Layout', THEMEDOMAIN ),
        'description' => __('Select page layout for displaying archive page', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_category_layout',
        'label'    => __( 'Category Page Layout', THEMEDOMAIN ),
        'description' => __('Select page layout for displaying category page', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 2,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_tag_layout',
        'label'    => __( 'Tag Page Layout', THEMEDOMAIN ),
        'description' => __('Select page layout for displaying tag page', THEMEDOMAIN ),
        'section'  => 'blog_general',
        'default'  => 'blog_r',
        'choices'  => $tg_blog_layout,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_slider',
        'label'    => __( 'Display Slider', THEMEDOMAIN ),
        'description' => __('Check this option to display slider in blog pages', THEMEDOMAIN ),
        'section'  => 'blog_slider',
        'default'  => 0,
	    'priority' => 3,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_slider_layout',
        'label'    => __( 'Slider Layout', THEMEDOMAIN ),
        'description' => __('Select layout for slider posts', THEMEDOMAIN ),
        'section'  => 'blog_slider',
        'default'  => '3cols-slider',
        'choices'  => $tg_slider_layout,
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'select',
        'setting'  => 'tg_blog_slider_cat',
        'label'    => __( 'Slider Post Category', THEMEDOMAIN ),
        'description' => __('Select post category filter for slider posts', THEMEDOMAIN ),
        'section'  => 'blog_slider',
        'default'  => '',
        'choices'  => $tg_categories_select,
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'slider',
        'setting'  => 'tg_blog_slider_items',
        'label'    => __( 'Slider Post Items', THEMEDOMAIN ),
        'section'  => 'blog_slider',
        'default'  => 5,
        'choices' => array( 'min' => 1, 'max' => 30, 'step' => 1 ),
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_header_bg',
        'label'    => __( 'Display Post Header', THEMEDOMAIN ),
        'description' => __('Check this to display featured image as post header background', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 4,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_feat_content',
        'label'    => __( 'Display Post Featured Content', THEMEDOMAIN ),
        'description' => __('Check this to display featured content (image or gallery) in single post page', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 0,
	    'priority' => 5,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_display_tags',
        'label'    => __( 'Display Post Tags', THEMEDOMAIN ),
        'description' => __('Check this option to display post tags on single post page', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 0,
	    'priority' => 6,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_display_author',
        'label'    => __( 'Display About Author', THEMEDOMAIN ),
        'description' => __('Check this option to display about author on single post page', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 7,
    );
    
    $controls[] = array(
        'type'     => 'checkbox',
        'setting'  => 'tg_blog_display_related',
        'label'    => __( 'Display Related Posts', THEMEDOMAIN ),
        'description' => __('Check this option to display related posts on single post page', THEMEDOMAIN ),
        'section'  => 'blog_single',
        'default'  => 1,
	    'priority' => 8,
    );
    //End Blog Tab Settings
    
    //Check if Woocommerce is installed	
	if(class_exists('Woocommerce'))
	{
		//Begin Shop Tab Settings
		$controls[] = array(
	        'type'     => 'select',
	        'setting'  => 'tg_shop_layout',
	        'label'    => __( 'Shop Main Page Layout', THEMEDOMAIN ),
	        'description' => __('Select page layout for displaying shop\'s products page', THEMEDOMAIN ),
	        'section'  => 'shop_layout',
	        'default'  => 'fullwidth',
	        'choices'  => $tg_shop_layout,
		    'priority' => 1,
	    );
	    
	    $controls[] = array(
	        'type'     => 'slider',
	        'setting'  => 'tg_shop_items',
	        'label'    => __( 'Products Page Show At Most', THEMEDOMAIN ),
	        'description' => __('Select number of product items you want to display per page', THEMEDOMAIN ),
	        'section'  => 'shop_layout',
	        'default'  => 16,
	        'choices' => array( 'min' => 1, 'max' => 100, 'step' => 1 ),
		    'priority' => 2,
	    );
	    
	    $controls[] = array(
	        'type'     => 'color',
	        'setting'  => 'tg_shop_price_font_color',
	        'label'    => __( 'Product Price Font Color', THEMEDOMAIN ),
	        'section'  => 'shop_single',
	        'default'  => '#222',
	        'output' => array(
		        array(
		            'element'  => '.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, p.price ins span.amount, p.price span.amount, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price',
		            'property' => 'color',
		        ),
		    ),
		    'transport' 	 => 'postMessage',
		    'priority' => 2,
	    );
	    
	    $controls[] = array(
	        'type'     => 'checkbox',
	        'setting'  => 'tg_shop_related_products',
	        'label'    => __( 'Display Related Products', THEMEDOMAIN ),
	        'description' => __('Check this option to display related products on single product page', THEMEDOMAIN ),
	        'section'  => 'shop_single',
	        'default'  => 1,
		    'priority' => 3,
	    );
		//End Shop Tab Settings
	}

    return $controls;
}
add_filter( 'kirki/controls', 'tg_custom_setting' );


function tg_customize_preview()
{
?>
    <script type="text/javascript">
        ( function( $ ) {
        	//Register Logo Tab Settings
        	wp.customize('tg_retina_logo',function( value ) {
                value.bind(function(to) {
                    jQuery('#custom_logo img').attr('src', to );
                });
            });
        	//End Logo Tab Settings
        
			//Register General Tab Settings
            wp.customize('tg_body_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('body, input[type=text], input[type=email], input[type=url], input[type=password], textarea').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_body_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('body').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_header_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('h1, h2, h3, h4, h5, h6, h7, input[type=submit], input[type=button], a.button, .button, blockquote, .post_quote_title, label, .portfolio_filter_dropdown, .woocommerce ul.products li.product .button, .woocommerce ul.products li.product a.add_to_cart_button.loading, .woocommerce-page ul.products li.product a.add_to_cart_button.loading, .woocommerce ul.products li.product a.add_to_cart_button:hover, .woocommerce-page ul.products li.product a.add_to_cart_button:hover, .woocommerce #page_content_wrapper a.button, .woocommerce button.button, .woocommerce input.button, .woocommerce #respond input#submit, .woocommerce #content input.button, .woocommerce-page  #page_content_wrapper a.button, .woocommerce-page button.button, .woocommerce-page input.button, .woocommerce-page #respond input#submit, .woocommerce-page #content input.button, .woocommerce-page button.button:hover, .woocommerce-page input.button:hover, .woocommerce-page input.button:active, .woocommerce #page_content_wrapper a.button, .woocommerce-page #page_content_wrapper a.button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button, .woocommerce.columns-4 ul.products li.product a.add_to_cart_button:hover, strong[itemprop="author"]').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_header_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('h1, h2, h3, h4, h5, h6, h7').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_h1_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h1').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h2_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h2').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h3_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h3').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h4_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h4').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h5_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h5').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_h6_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h6').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_content_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('body, #wrapper, #page_content_wrapper.fixed, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle span, h2.widgettitle span, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, #body_loading_screen, h3#reply-title span').css('background-color', to );
                });
            });
            
            wp.customize('tg_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('body, .pagination a, #gallery_lightbox h2, .slider_wrapper .gallery_image_caption h2, .post_info a').css('color', to );
                    jQuery('::selection').css('background-color', to );
                });
            });
            
            wp.customize('tg_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('a').css('color', to );
                });
            });
            
            wp.customize('tg_hover_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('a:hover, a:active, .post_info_comment a i').css('color', to );
                });
            });
            
            wp.customize('tg_h1_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('h1, h2, h3, h4, h5, pre, code, tt, blockquote, .post_header h5 a, .post_header h3 a, .post_header.grid h6 a, .post_header.fullwidth h4 a, .post_header h5 a, blockquote, .site_loading_logo_item i').css('color', to );
                });
            });
            
            wp.customize('tg_hr_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#social_share_wrapper, hr, #social_share_wrapper, .post.type-post, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle, .comment .right, .widget_tag_cloud div a, .meta-tags a, .tag_cloud a, #footer, #post_more_wrapper, .woocommerce ul.products li.product, .woocommerce-page ul.products li.product, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, #page_content_wrapper .inner .sidebar_content, #page_caption, #page_content_wrapper .inner .sidebar_content.left_sidebar, .ajax_close, .ajax_next, .ajax_prev, .portfolio_next, .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_prev, .portfolio_next_prev_wrapper.video .portfolio_next, .separated, .blog_next_prev_wrapper, #post_more_wrapper h5, #ajax_portfolio_wrapper.hidding, #ajax_portfolio_wrapper.visible, .tabs.vertical .ui-tabs-panel, .woocommerce div.product .woocommerce-tabs ul.tabs li, .woocommerce #content div.product .woocommerce-tabs ul.tabs li, .woocommerce-page div.product .woocommerce-tabs ul.tabs li, .woocommerce-page #content div.product .woocommerce-tabs ul.tabs li, .woocommerce div.product .woocommerce-tabs .panel, .woocommerce-page div.product .woocommerce-tabs .panel, .woocommerce #content div.product .woocommerce-tabs .panel, .woocommerce-page #content div.product .woocommerce-tabs .panel, .woocommerce table.shop_table, .woocommerce-page table.shop_table, table tr td, .woocommerce .cart-collaterals .cart_totals, .woocommerce-page .cart-collaterals .cart_totals, .woocommerce .cart-collaterals .shipping_calculator, .woocommerce-page .cart-collaterals .shipping_calculator, .woocommerce .cart-collaterals .cart_totals tr td, .woocommerce .cart-collaterals .cart_totals tr th, .woocommerce-page .cart-collaterals .cart_totals tr td, .woocommerce-page .cart-collaterals .cart_totals tr th, table tr th, .woocommerce #payment, .woocommerce-page #payment, .woocommerce #payment ul.payment_methods li, .woocommerce-page #payment ul.payment_methods li, .woocommerce #payment div.form-row, .woocommerce-page #payment div.form-row, .ui-tabs li:first-child, .ui-tabs .ui-tabs-nav li, .ui-tabs.vertical .ui-tabs-nav li, .ui-tabs.vertical.right .ui-tabs-nav li.ui-state-active, .ui-tabs.vertical .ui-tabs-nav li:last-child, #page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .page_content_wrapper .inner .sidebar_wrapper ul.sidebar_widget li.widget_nav_menu ul.menu li.current-menu-item a, .pricing_wrapper, .pricing_wrapper li, , .ui-accordion .ui-accordion-header, .ui-accordion .ui-accordion-content, #page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle:before, h2.widgettitle:before, #autocomplete, .ppb_blog_minimal .one_third_bg, .portfolio_desc.wide').css('border-color', to );
                });
            });
            
            wp.customize('tg_input_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text], input[type=password], input[type=email], input[type=url], textarea').css('background-color', to );
                });
            });
            
            wp.customize('tg_input_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text], input[type=password], input[type=email], input[type=url], textarea').css('color', to );
                });
            });
            
            wp.customize('tg_input_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text], input[type=password], input[type=email], input[type=url], textarea').css('border-color', to );
                });
            });
            
            wp.customize('tg_input_focus_color',function( value ) {
                value.bind(function(to) {
                    jQuery('input[type=text]:focus, input[type=password]:focus, input[type=email]:focus, input[type=url]:focus, textarea:focus').css('border-color', to );
                });
            });
            
            wp.customize('tg_button_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('input[type=submit], input[type=button], a.button, .button, .woocommerce .page_slider a.button, a.button.fullwidth, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_button_bg_color',function( value ) {
                value.bind(function(to) {
                	jQuery('input[type=submit], input[type=button], a.button, .button, .pagination span, .pagination a:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt').css('background-color', to );
                    jQuery('.pagination span, .pagination a:hover').css('border-color', to );
                });
            });
            
            wp.customize('tg_button_font_color',function( value ) {
                value.bind(function(to) {
                	jQuery('input[type=submit], input[type=button], a.button, .button, .pagination a:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt').css('color', to );
                });
            });
            
            wp.customize('tg_button_border_color',function( value ) {
                value.bind(function(to) {
                	jQuery('input[type=submit], input[type=button], a.button, .button, .pagination a:hover, .woocommerce-page div.product form.cart .button, .woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt').css('border-color', to );
                });
            });
            //End General Tab Settings
        
        	//Register Menu Tab Settings
        	wp.customize('tg_menu_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_menu_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_menu_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_menu_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_menu_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_menu_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a, #menu_wrapper div .nav li > a').css('color', to );
                });
            });
            
            wp.customize('tg_menu_hover_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li a.hover, #menu_wrapper .nav ul li a:hover, #menu_wrapper div .nav li a.hover, #menu_wrapper div .nav li a:hover').css('color', to );
                });
            });
            
            wp.customize('tg_menu_active_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper div .nav > li.current-menu-item > a, #menu_wrapper div .nav > li.current-menu-parent > a, #menu_wrapper div .nav > li.current-menu-ancestor > a, #menu_wrapper div .nav li ul li.current-menu-item a, #menu_wrapper div .nav li.current-menu-parent  ul li.current-menu-item a').css('color', to );
                });
            });
            
            wp.customize('tg_menu_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.top_bar').css('borderColor', to );
                });
            });
            
            wp.customize('tg_submenu_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_submenu_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_submenu_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_submenu_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_submenu_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a, #menu_wrapper div .nav li ul li a, #menu_wrapper div .nav li.current-menu-parent ul li a').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_hover_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_hover_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul li a:hover, #menu_wrapper div .nav li ul li a:hover, #menu_wrapper div .nav li.current-menu-parent ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:hover, #menu_wrapper div .nav li.megamenu ul li ul li a:hover, #menu_wrapper .nav ul li.megamenu ul li ul li a:active, #menu_wrapper div .nav li.megamenu ul li ul li a:active').css('background', to );
                });
            });
            
            wp.customize('tg_submenu_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul').css('background', to );
                });
            });
            
            wp.customize('tg_submenu_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper .nav ul li ul, #menu_wrapper div .nav li ul').css('borderColor', to );
                });
            });
            
            wp.customize('tg_megamenu_header_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper div .nav li.megamenu ul li > a, #menu_wrapper div .nav li.megamenu ul li > a:hover, #menu_wrapper div .nav li.megamenu ul li > a:active').css('color', to );
                });
            });
            
            wp.customize('tg_megamenu_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#menu_wrapper div .nav li.megamenu ul li').css('borderColor', to );
                });
            });
            
            wp.customize('tg_topbar_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.above_top_bar').css('background', to );
                });
            });
            
            wp.customize('tg_topbar_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_menu li a, .top_contact_info, .top_contact_info i, .top_contact_info a, .top_contact_info a:hover, .top_contact_info a:active').css('color', to );
                });
            });
            
            wp.customize('tg_menu_contact_hours',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_contact_hours').html('<i class="fa fa-clock-o"></i>'+to);
                });
            });
            
            wp.customize('tg_menu_contact_number',function( value ) {
                value.bind(function(to) {
                    jQuery('#top_contact_number').html('<i class="fa fa-phone"></i>'+to);
                });
            });
            
            wp.customize('tg_menu_search_input_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_menu_wrapper #searchform').css('background', to );
                });
            });
            
            wp.customize('tg_menu_search_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_menu_wrapper #searchform input[type=text], .mobile_menu_wrapper #searchform button i, #close_mobile_menu i').css('color', to );
                });
            });
            
            wp.customize('tg_sidemenu_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_sidemenu_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_sidemenu_font_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a, #sub_menu li a').css('textTransform', to );
                });
            });
            
            wp.customize('tg_sidemenu_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a, #sub_menu li a, .mobile_menu_wrapper .sidebar_wrapper a, #close_mobile_menu').css('color', to );
                });
            });
            
            wp.customize('tg_submenu_hover_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.mobile_main_nav li a:hover, .mobile_main_nav li a:active, #sub_menu li a:active, .mobile_menu_wrapper .sidebar_wrapper h2.widgettitle').css('color', to );
                });
            });
            //End Menu Tab Settings
            
            
            //Register Header Tab Settings 
        	wp.customize('tg_page_header_bg_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption, .page_caption_bg_content, .overlay_gallery_content').css('background-color', to );
                    jQuery('.page_caption_bg_border, .overlay_gallery_border').css('border-color', to );
                });
            });
            
            wp.customize('tg_page_header_padding_top',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption').css('paddingTop', to+'px' );
                });
            });
            
            wp.customize('tg_page_header_padding_bottom',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption').css('paddingBottom', to+'px' );
                });
            });
            
            wp.customize('tg_page_title_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('color', to );
                });
            });
            
            wp.customize('tg_page_title_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_page_title_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_page_title_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption h1, .ppb_title, .post_caption h1').css('textTransform', to );
                });
            });
            
            wp.customize('tg_page_title_bg_height',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_caption.hasbg').css('height', to+'vh' );
                });
            });
            
            wp.customize('tg_header_builder_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('h2.ppb_title').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_header_builder_font_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('h2.ppb_title').css('textTransform', to );
                });
            });
            
            wp.customize('tg_page_tagline_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company').css('color', to );
                });
            });
            
            wp.customize('tg_page_tagline_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('.post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_page_tagline_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('.post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_page_tagline_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('.post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company').css('textTransform', to );
                });
            });
            
            wp.customize('tg_page_tagline_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('.post_header .post_detail, .recent_post_detail, .post_detail, .thumb_content span, .portfolio_desc .portfolio_excerpt, .testimonial_customer_position, .testimonial_customer_company').css('letterSpacing', to+'px' );
                });
            });
        	//End Logo Header Settings
        	
        	//Register Sidebar Tab Settings
            wp.customize('tg_sidebar_title_font',function( value ) {
                value.bind(function(to) {
                	var ppGGFont = 'http://fonts.googleapis.com/css?family='+to;
                	if(jQuery('#google_fonts_'+to).length==0)
                	{
			    		jQuery('head').append('<link rel="stylesheet" id="google_fonts_'+to+'" href="'+ppGGFont+'" type="text/css" media="all">');
			    	}
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontFamily', to );
                });
            });
            
            wp.customize('tg_sidebar_title_font_size',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontSize', to+'px' );
                });
            });
            
            wp.customize('tg_sidebar_title_font_weight',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('fontWeight', to );
                });
            });
            
            wp.customize('tg_sidebar_title_transform',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('textTransform', to );
                });
            });
            
            wp.customize('tg_sidebar_title_font_spacing',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('letterSpacing', to+'px' );
                });
            });
            
            wp.customize('tg_sidebar_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .inner .sidebar_wrapper .sidebar .content, .page_content_wrapper .inner .sidebar_wrapper .sidebar .content').css('color', to );
                });
            });
            
            wp.customize('tg_sidebar_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .inner .sidebar_wrapper a, .page_content_wrapper .inner .sidebar_wrapper a').css('color', to );
                });
            });
            
            wp.customize('tg_sidebar_hover_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .inner .sidebar_wrapper a:hover, #page_content_wrapper .inner .sidebar_wrapper a:active, .page_content_wrapper .inner .sidebar_wrapper a:hover, .page_content_wrapper .inner .sidebar_wrapper a:active').css('color', to );
                });
            });
            
            wp.customize('tg_sidebar_title_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#page_content_wrapper .sidebar .content .sidebar_widget li h2.widgettitle, h2.widgettitle, h5.widgettitle').css('color', to );
                });
            });
            //End Sidebar Tab Settings
            
            //Register Footer Tab Settings
            
            wp.customize('tg_footer_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#footer, #copyright').css('color', to );
                });
            });
            
            wp.customize('tg_footer_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#copyright a, #copyright a:active, #footer a, #footer a:active').css('color', to );
                });
            });
            
            wp.customize('tg_footer_hover_link_color',function( value ) {
                value.bind(function(to) {
                    jQuery('#copyright a:hover, #footer a:hover, .social_wrapper ul li a:hover').css('color', to );
                });
            });
            
            wp.customize('tg_footer_border_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.footer_bar_wrapper, .footer_bar').css('borderColor', to );
                });
            });
            
            wp.customize('tg_footer_social_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.footer_bar_wrapper .social_wrapper ul li a').css('color', to );
                });
            });
            
            wp.customize('tg_footer_copyright_text',function( value ) {
                value.bind(function(to) {
                    jQuery('#copyright').html( to );
                });
            });
            //End Footer Tab Settings
            
            
            //Register Shop Tab Settings
             wp.customize('tg_shop_price_font_color',function( value ) {
                value.bind(function(to) {
                    jQuery('.woocommerce ul.products li.product .price ins, .woocommerce-page ul.products li.product .price ins, .woocommerce ul.products li.product .price, .woocommerce-page ul.products li.product .price, p.price ins span.amount, p.price span.amount, .woocommerce #content div.product p.price, .woocommerce #content div.product span.price, .woocommerce div.product p.price, .woocommerce div.product span.price, .woocommerce-page #content div.product p.price, .woocommerce-page #content div.product span.price, .woocommerce-page div.product p.price, .woocommerce-page div.product span.price').css( 'color', to );
                });
            });
            //End Shop Tab Settings
        } )( jQuery )
    </script>
<?php	
}