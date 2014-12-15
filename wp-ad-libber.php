<?php

/**
 * WP Ad Libber
 *
 * @link              http://www.bryanpurcell.com
 * @since             1.0.0
 * @package           WP_Ad_Libber
 *
 * @wordpress-plugin
 * Plugin Name:       WP Ad Libber
 * Plugin URI:        http://example.com/plugin-name-uri/
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress dashboard.
 * Version:           1.0.0
 * Author:            Bryan Purcell
 * Author URI:        http://www.bryanpurcell.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * The core plugin class that is used to define internationalization,
 * dashboard-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wp-ad-libber.php';

/**
 * Run the Ad Libber Code!
 *
 * @since    1.0.0
 */
function run_wp_ad_libber() {

	$plugin = new WP_Ad_Libber();
	$plugin->run();

}
run_wp_ad_libber();


/**
 * The Template Tag. This includes all the functionality of the shortcode, but makes it easy to use it in your templates!
 *
 * @since    1.0.0
 */

function get_wp_ad_libber() {
	$plugin = new WP_Ad_Libber();
	$plugin->get_ad_lib($args);
}

/**
 * The echo version of the get_wp_ad_libber tag
 *
 * @since    1.0.0
 */

function the_wp_ad_libber( $args ) {
	echo get_wp_ad_lib( $args );
}

