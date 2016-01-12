<?php
/**
 * Plugin Name: WooCommerce 360° Image
 * Plugin URI: http://www.woothemes.com/products/woocommerce-360-image/
 * Description: Add a 360° Image Rotation Display to a WooCommerce Product
 * Version: 1.1.0
 * Author: Bryce Adams
 * Author URI: http://bryce.se/
 * License: GPL-2.0+
 * Domain: woocommerce-360-image
 *
 * (c) Bryce Adams
 *
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

// Required Functions (Woo Updater)
if ( ! function_exists( 'woothemes_queue_update' ) ) {
	require_once( 'woo-includes/woo-functions.php' );
}

// Plugin updates
woothemes_queue_update( plugin_basename( __FILE__ ), '24eb2cfa3738a66bf3b2587876668cd2', '512186' );

/**
 * Check if WooCommerce is active
 **/
if ( in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ) {

	// Brace Yourself
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wc360.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wc360-display.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wc360-settings.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wc360-meta.php' );
	require_once( plugin_dir_path( __FILE__ ) . 'includes/class-wc360-shortcode.php' );

	// Start the Engines
	register_activation_hook( __FILE__, array( 'WC_360_Image', 'activate' ) );

	// Vroom.. Vroom..
	add_action( 'plugins_loaded', array( 'WC_360_Image', 'get_instance' ) );
	add_action( 'plugins_loaded', array( 'WC_360_Image_Settings', 'get_instance' ) );
	add_action( 'plugins_loaded', array( 'WC_360_Image_Meta', 'get_instance' ) );
	add_action( 'wp', array( 'WC_360_Image_Display', 'get_instance' ) );
	add_action( 'wp', array( 'WC_360_Image_Shortcode', 'get_instance' ) );

} else {

	add_action( 'admin_notices', 'wc360_woocoommerce_deactivated' );

}


/**
* WooCommerce Deactivated Notice
**/
if ( ! function_exists( 'wc360_woocoommerce_deactivated' ) ) {

	function wc360_woocoommerce_deactivated() {

		echo '<div class="error"><p>' . sprintf( __( 'WooCommerce 360 Image requires %s to be installed and active.', 'woocommerce-360-image' ), '<a href="http://www.woothemes.com/woocommerce/" target="_blank">WooCommerce</a>' ) . '</p></div>';

	}

}
