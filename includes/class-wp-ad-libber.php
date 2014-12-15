<?php

/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the dashboard.
 *
 * @link       http://example.com
 * @since      1.0.0
 *
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, dashboard-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since      1.0.0
 * @package    Plugin_Name
 * @subpackage Plugin_Name/includes
 * @author     Your Name <email@example.com>
 */
class WP_Ad_Libber {

	/**
	 * The unique identifier of for WP Ad Libber.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $plugin_name    The string used to uniquely identify this plugin.
	 */
	protected $plugin_name;

	/**
	 * The current version of the plugin.
	 *
	 * @since    1.0.0
	 * @access   protected
	 * @var      string    $version    The current version of the plugin.
	 */
	protected $version;

	/**
	 * @since    1.0.0
	 */
	public function __construct() {

		$this->plugin_name = 'wp-ad-libber';
		$this->version = '1.0.0';
	}


	/**
	 * Register the shortcode
	 *
	 * @since    1.0.0
	 * @access   private
	 */
	public function run() {

		add_shortcode('wp_ad_libber', array( $this, 'get_ad_lib'));

	}


	/**
	 * The Meat of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The result of the ad lib substitution
	 */
	public function get_ad_lib($atts, $content) {

	    $shortcode_atts = shortcode_atts( array(
			'id' => false,
			'alternatives' => array(),
	    ), $atts );

		if(empty( $shortcode_atts[ 'alternatives' ] )) {
			return '';
		} else {
			$possibilities = explode(',', $shortcode_atts[ 'alternatives' ]);
		}

		$possibilities[] = $content; //Add the content of the shortcode to the list, if there is content.

		$random_choice_index = array_rand ( $possibilities, 1 );
		$random_choice = $possibilities[$random_choice_index];

		if($shortcode_atts[ 'id' ]) {
			$ad_lib = apply_filters( 'wp_ad_libber_id_' . $shortcode_atts[ 'id' ], $random_choice);
		} else {
			$ad_lib = $random_choice;
		}

		return $ad_lib;
	}

	/**
	 * The name of the plugin used to uniquely identify it within the context of
	 * WordPress and to define internationalization functionality.
	 *
	 * @since     1.0.0
	 * @return    string    The name of the plugin.
	 */
	public function get_plugin_name() {
		return $this->plugin_name;
	}

	/**
	 * Retrieve the version number of the plugin.
	 *
	 * @since     1.0.0
	 * @return    string    The version number of the plugin.
	 */
	public function get_version() {
		return $this->version;
	}

}
