<?php
/**
 * Plugin Name: Post grid and filter ultimate
 * Plugin URI: https://www.wponlinesupport.com/plugins/
 * Description: Easy to add and display post grid on your website with or without categoryies filter. Also work with Gutenberg shortcode block. 
 * Author: WP OnlineSupport
 * Author URI: https://www.wponlinesupport.com
 * Text Domain: post-grid-and-filter-ultimate
 * Domain Path: /languages/
 * Version: 1.4
 *
 * @package WordPress
 * @author WP OnlineSupport
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

/**
 * Basic plugin definitions
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
if( ! defined( 'PGAFU_VERSION' ) ) {
	define( 'PGAFU_VERSION', '1.4' ); // Version of plugin
}
if( ! defined( 'PGAFU_DIR' ) ) {
	define( 'PGAFU_DIR', dirname( __FILE__ ) ); // Plugin dir
}
if( ! defined( 'PGAFU_URL' ) ) {
	define( 'PGAFU_URL', plugin_dir_url( __FILE__ ) ); // Plugin url
}
if( ! defined( 'PGAFU_PLUGIN_BASENAME' ) ) {
    define( 'PGAFU_PLUGIN_BASENAME', plugin_basename( __FILE__ ) ); // Plugin base name
}
if( ! defined( 'PGAFU_POST_TYPE' ) ) {
	define( 'PGAFU_POST_TYPE', 'post' ); // Plugin post type name
}
if( ! defined( 'PGAFU_CAT' ) ) {
	define( 'PGAFU_CAT', 'category' ); // Plugin taxonomy name
}
if( ! defined( 'PGAFU_PLUGIN_LINK' ) ) {
    define( 'PGAFU_PLUGIN_LINK', 'https://www.wponlinesupport.com/wp-plugin/post-grid-filter-ultimate/?utm_source=WP&utm_medium=Post-Grid-and-Filter&utm_campaign=Features-PRO' ); // Plugin link
}

/**
 * Load Text Domain
 * This gets the plugin ready for translation
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_load_textdomain() {
	global $wp_version;

    // Set filter for plugin's languages directory
    $pgafupro_lang_dir = dirname( plugin_basename( __FILE__ ) ) . '/languages/';
    $pgafupro_lang_dir = apply_filters( 'pgafu_languages_directory', $pgafupro_lang_dir );

    // Traditional WordPress plugin locale filter.
    $get_locale = get_locale();

    if ( $wp_version >= 4.7 ) {
        $get_locale = get_user_locale();
    }

    // Traditional WordPress plugin locale filter
    $locale = apply_filters( 'plugin_locale',  $get_locale, 'post-grid-and-filter-ultimate' );
    $mofile = sprintf( '%1$s-%2$s.mo', 'post-grid-and-filter-ultimate', $locale );

    // Setup paths to current locale file
    $mofile_global  = WP_LANG_DIR . '/plugins/' . basename( PGAFU_DIR ) . '/' . $mofile;

    if ( file_exists( $mofile_global ) ) { // Look in global /wp-content/languages/plugin-name folder
        load_textdomain( 'post-grid-and-filter-ultimate', $mofile_global );
    } else { // Load the default language files
        load_plugin_textdomain( 'post-grid-and-filter-ultimate', false, $pgafupro_lang_dir );
    }

}
// Plugin Loaded Action 
add_action('plugins_loaded', 'pgafu_load_textdomain');

/**
 * Activation Hook
 * 
 * Register plugin activation hook.
 * 
 * @package Post grid and filter ultimate
 * @since 1.0
 */
register_activation_hook( __FILE__, 'pgafu_install' );

/**
 * Deactivation Hook
 * 
 * Register plugin deactivation hook.
 * 
 * @package Post grid and filter ultimate
 * @since 1.0
 */
register_deactivation_hook( __FILE__, 'pgafu_uninstall');

/**
 * Plugin Setup (On Activation)
 * 
 * Does the initial setup,
 * set default values for the plugin options.
 * 
 * @package Post grid and filter ultimate
 * @since 1.0
 */
function pgafu_install() {

    // IMP need to flush rules for custom registered post type
    flush_rewrite_rules();

    // Deactivate free version
    if( is_plugin_active('post-grid-and-filter-with-popup-ultimate-pro/post-grid-and-filter-ultimate-pro.php') ){
        add_action('update_option_active_plugins', 'pgafu_deactivate_pro_version');
    }
}

/**
 * Plugin Setup (On Deactivation)
 * 
 * Delete  plugin options.
 * 
 * @package Post grid and filter ultimate
 * @since 1.0
 */
function pgafupuninstall() {

    // IMP need to flush rules for custom registered post type
    flush_rewrite_rules();
}

/**
 * Deactivate free plugin
 * 
 * @package Post grid and filter ultimate
 * @since 1.0
 */
function pgafu_deactivate_pro_version() {
    deactivate_plugins('post-grid-and-filter-with-popup-ultimate-pro/post-grid-and-filter-ultimate-pro.php', true);
}

/**
 * Function to display admin notice of activated plugin.
 * 
 * @package Post grid and filter ultimate 
 * @since 1.0
 */
function pgafu_admin_notice() {

    global $pagenow;

    $dir                = WP_PLUGIN_DIR . '/post-grid-and-filter-with-popup-ultimate-pro/post-grid-and-filter-ultimate-pro.php';
    $notice_link        = add_query_arg( array('message' => 'pgafu-plugin-notice'), admin_url('plugins.php') );
    $notice_transient   = get_transient( 'pgafu_install_notice' );

    // If free plugin exist
    if( $notice_transient == false && file_exists($dir) && $pagenow == 'plugins.php' && current_user_can( 'install_plugins' ) ) {
        echo '<div class="updated notice" style="position:relative;">
                <p>
                    <strong>'.sprintf( __('Thank you for activating %s', 'post-grid-and-filter-ultimate'), 'Post Grid and Filter Ultimate').'</strong>.<br/>
                    '.sprintf( __('It looks like you had PRO version %s of this plugin activated. To avoid conflicts the extra version has been deactivated and we recommend you delete it.', 'post-grid-and-filter-ultimate'), '<strong>(<em>Post Grid and Filter with Popup Pro</em>)</strong>' ).'
                </p>
                <a href="'.esc_url( $notice_link ).'" class="notice-dismiss" style="text-decoration:none;"></a>
            </div>';
    }
}

// Action to display notice
add_action( 'admin_notices', 'pgafu_admin_notice');

// Functions file
require_once( PGAFU_DIR . '/includes/pgafu-functions.php' );

// Script Class
require_once( PGAFU_DIR . '/includes/class-pgafu-script.php' );

// Shortcode File
require_once( PGAFU_DIR . '/includes/shortcode/pgafu-post-grid.php' );
require_once( PGAFU_DIR . '/includes/shortcode/pgafu-postgrid-filter.php' );

// Admin Class File
require_once( PGAFU_DIR . '/includes/admin/class-pgafu-admin.php' );

// Gutenberg Block Initializer
if ( function_exists( 'register_block_type' ) ) {
    require_once( PGAFU_DIR . '/includes/admin/supports/gutenberg-block.php' );
}

/* Recommended Plugins Starts */
if ( is_admin() ) {
    require_once( PGAFU_DIR . '/wpos-plugins/wpos-recommendation.php' );

    wpos_espbw_init_module( array(
                            'prefix'    => 'pgafu',
                            'menu'      => 'pgafu-about',
                            'position'  => 1,
                        ));
}
/* Recommended Plugins Ends */

/* Plugin Analytics Data */
function wpos_analytics_anl67_load() {

    require_once dirname( __FILE__ ) . '/wpos-analytics/wpos-analytics.php';

    $wpos_analytics =  wpos_anylc_init_module( array(
                            'id'            => 67,
                            'file'          => plugin_basename( __FILE__ ),
                            'name'          => 'Post grid and filter ultimate',
                            'slug'          => 'post-grid-and-filter-ultimate',
                            'type'          => 'plugin',
                            'menu'          => 'pgafu-about',
                            'text_domain'   => 'post-grid-and-filter-ultimate',
                        ));

    return $wpos_analytics;
}

// Init Analytics
wpos_analytics_anl67_load();
/* Plugin Analytics Data Ends */