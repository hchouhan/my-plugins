<?php
/**
 * Plugin Name: My Plugins by Themeist
 * Plugin URI: https://themeist.com
 * Description: Plugin CPT for plugin developers to display their plugins on their own website
 * Version: 0.1.1
 * Author: Harish Chouhan
 * Author URI: https://themeist.com
 */

class Themeist_Plugins {

	/**
	 * Sets up the plugin.
	 */
	function __construct() {

		add_action( 'plugins_loaded', array( &$this, 'constants' ), 1 );
		add_action( 'plugins_loaded', array( &$this, 'includes' ), 2 );
		add_action( 'plugins_loaded', array( &$this, 'admin' ), 3 );
	}

	/**
	 * Defines constants for the plugin.
	 */
	function constants() {
		define( 'THEMIST_PLUGIN_DIR', trailingslashit( plugin_dir_path( __FILE__ ) ) );
	}

	/**
	 * Loads files needed across the site.
	 */
	function includes() {

		/* Load includes. */
		require_once( THEMIST_PLUGIN_DIR . 'includes.php' );

		/* Load taxonomies. */
		require_once( THEMIST_PLUGIN_DIR . 'taxonomies.php' );

		/* Load post types. */
		require_once( THEMIST_PLUGIN_DIR . 'post-types.php' );
		// require_once( THEMIST_PLUGIN_DIR . 'post-types-2.php' );
	}

	/**
	 * Loads admin files.
	 */
	function admin() {

		if ( is_admin() ) {

			/* Load main admin file. */
			require_once( THEMIST_PLUGIN_DIR . 'admin.php' );

			/* Load meta boxes. */
			require_once( THEMIST_PLUGIN_DIR . 'meta-boxes.php' );
		}
	}

}

new Themeist_Plugins();

?>