<?php
/**
 * Script Class
 *
 * Handles the script and style functionality of plugin
 *
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

class Pgafu_Script {

	function __construct() {

		// Action to add script at admin side
		add_action( 'admin_enqueue_scripts', array($this, 'pgafu_admin_script') );

		// Action to add style at front side
		add_action( 'wp_enqueue_scripts', array($this, 'pgafu_plugin_style') );

		// Action to add script at front side
		add_action( 'wp_enqueue_scripts', array($this, 'pgafu_plugin_script') );
	}

	/**
	 * Function to register admin scripts and styles
	 * 
	 * @package Post grid and filter with popup
	 * @since 1.3
	 */
	function pgafu_register_admin_assets() {

		/* Styles */
		// Registring admin css
		wp_register_style( 'pgafu-admin-style', PGAFU_URL.'assets/css/pgafu-admin.css', array(), PGAFU_VERSION );

		/* Scripts */
		// Registring admin script
		wp_register_script( 'pgafu-admin-script', PGAFU_URL.'assets/js/pgafu-admin.js', array('jquery'), PGAFU_VERSION, true );
	}

	/**
	 * Function to add script at admin side
	 * 
	 * @package Post grid and filter ultimate
	 * @since 1.3
	 */
	function pgafu_admin_script( $hook ) {

		$this->pgafu_register_admin_assets();

		// Enqueue admin script 
		if( $hook == 'toplevel_page_pgafu-about' ) {
			wp_enqueue_script( 'pgafu-admin-script' );
		}
	}

	/**
	 * Function to add script at front side
	 * 
	 * @package Post grid and filter ultimate
	 * @since 1.0.0
	 */
	function pgafu_plugin_style(){

		// Registring and enqueing public css
		wp_register_style( 'pgafu-public-style', PGAFU_URL.'assets/css/pgafu-public.css', array(), PGAFU_VERSION );
		wp_enqueue_style( 'pgafu-public-style');
	}

	/**
	 * Function to add script at front side
	 * 
	 * @package Post grid and filter ultimate
	 * @since 1.0.0
	 */
	function pgafu_plugin_script() {

		global $post;

		// Registring isotope js
		if( ! wp_script_is( 'wpos-isotope-js', 'registered' ) ) {
			wp_register_script( 'wpos-isotope-js', PGAFU_URL.'assets/js/isotope.pkgd.min.js', array('jquery', 'imagesloaded'), PGAFU_VERSION, true );
		}

		// Register Elementor script
		wp_register_script( 'pgafu-elementor-js', PGAFU_URL.'assets/js/elementor/pgafu-elementor.js', array('jquery'), PGAFU_VERSION, true );

		// Registring public js
		wp_register_script( 'pgafu-public-js', PGAFU_URL.'assets/js/pgafu-public.js', array('jquery'), PGAFU_VERSION, true );
	
		// Enqueue Script for Elementor Preview
		if ( defined('ELEMENTOR_PLUGIN_BASE') && isset( $_GET['elementor-preview'] ) && $post->ID == (int) $_GET['elementor-preview'] ) {

			wp_enqueue_script( 'wpos-isotope-js' );
			wp_enqueue_script( 'pgafu-public-js' );
			wp_enqueue_script( 'pgafu-elementor-js' );
		}

		// Enqueue Style & Script for Beaver Builder
		if ( class_exists( 'FLBuilderModel' ) && FLBuilderModel::is_builder_active() ) {

			$this->pgafu_register_admin_assets();

			wp_enqueue_script( 'pgafu-admin-script' );
			wp_enqueue_script( 'wpos-isotope-js' );
			wp_enqueue_script( 'pgafu-public-js' );
		}

		// Enqueue Admin Style & Script for Divi Page Builder
		if( function_exists( 'et_core_is_fb_enabled' ) && isset( $_GET['et_fb'] ) && $_GET['et_fb'] == 1 ) {
			$this->pgafu_register_admin_assets();

			wp_enqueue_style( 'pgafu-admin-style');
		}

		// Enqueue Admin Style for Fusion Page Builder
		if( class_exists( 'FusionBuilder' ) && (( isset( $_GET['builder'] ) && $_GET['builder'] == 'true' ) ) ) {
			$this->pgafu_register_admin_assets();

			wp_enqueue_style( 'pgafu-admin-style');
		}

	}
}

$pgafu_script = new Pgafu_Script();