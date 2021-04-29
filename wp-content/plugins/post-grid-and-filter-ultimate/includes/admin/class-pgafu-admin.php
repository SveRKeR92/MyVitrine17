<?php
/**
 * Admin Class
 *
 * Handles the Admin side functionality of plugin
 *
 * @package Post grid and filter ultimate
 * @since 1.0
 */

if ( !defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}


class PGAFU_Admin {

	function __construct() {
		// Action to register admin menu
		add_action( 'admin_menu', array($this, 'pgafu_register_menu'), 12 );

		// Admin Init Processes
		add_action( 'admin_init', array($this, 'pgafu_admin_init_process') );

		// Filter to add row action in category table
		add_filter( PGAFU_CAT.'_row_actions', array($this, 'pgafu_add_tax_row_data'), 10, 2 );

		// Filter to add plugin links
		add_filter( 'plugin_row_meta', array( $this, 'pgafu_plugin_row_meta' ), 10, 2 );
	}

	
	/**
	 * Function to register admin menus
	 * 
	 * @package Post grid and filter ultimate
	 * @since 1.0.4
	 */
	function pgafu_register_menu() {

		// How It Work Page
		add_menu_page( __('Post Grid And Filter', 'post-grid-and-filter-ultimate'), __('Post Grid And Filter', 'post-grid-and-filter-ultimate'), 'manage_options', 'pgafu-about',  array($this, 'pgafu_designs_page'), 'dashicons-sticky', 6 );

		// Register plugin premium page
		add_submenu_page( 'pgafu-about', __('Upgrade to PRO - Post grid and filter', 'post-grid-and-filter-ultimate'), '<span style="color:#2ECC71">'.__('Upgrade to PRO', 'post-grid-and-filter-ultimate').'</span>', 'manage_options', 'pgafu-premium', array($this, 'pgafu_premium_page') );
	}

	/**
	 * Getting Started Page Html
	 * 
	 * @package Post grid and filter ultimate
	 * @since 1.0
	 */
	function pgafu_designs_page() {
		include_once( PGAFU_DIR . '/includes/admin/pgafu-how-it-work.php' );
	}

	/**
	 * Premium Page Html
	 * 
	 * @package Post grid and filter ultimate
	 * @since 1.0
	 */
	function pgafu_premium_page() {
		include_once( PGAFU_DIR . '/includes/admin/settings/premium.php' );
	}

	/**
	 * Admin prior processes
	 * 
	 * @package Post grid and filter ultimate
	 * @since 1.1
	 */
	function pgafu_admin_init_process() {

		// If plugin notice is dismissed
		if( isset($_GET['message']) && $_GET['message'] == 'pgafu-plugin-notice' ) {
			set_transient( 'pgafu_install_notice', true, 604800 );
		}
	}

	/**
	 * Function to add category row action
	 * 
	 * @package Post grid and filter ultimate
	 * @since 1.1
	 */
	function pgafu_add_tax_row_data( $actions, $tag ) {
		return array_merge( array( 'wpos_id' => "ID: {$tag->term_id}" ), $actions );
	}

	/**
	 * Function to unique number value
	 * 
	 * @package Post grid and filter ultimate
	 * @since 1.0.0
	 */
	function pgafu_plugin_row_meta( $links, $file ) {

		if ( $file == PGAFU_PLUGIN_BASENAME ) {

			$row_meta = array(
				'docs'    => '<a href="' . esc_url('https://docs.wponlinesupport.com/post-grid-and-filter-ultimate/?utm_source=post_grid_filter&utm_medium=plugin_list&utm_campaign=plugin_quick_link') . '" title="' . esc_attr( __( 'View Documentation', 'post-grid-and-filter-ultimate' ) ) . '" target="_blank">' . __( 'Docs', 'post-grid-and-filter-ultimate' ) . '</a>',
				'support' => '<a href="' . esc_url('https://www.wponlinesupport.com/wordpress-support/?utm_source=post_grid_filter&utm_medium=plugin_list&utm_campaign=plugin_quick_link') . '" title="' . esc_attr( __( 'Premium Support - For any Customization', 'post-grid-and-filter-ultimate' ) ) . '" target="_blank">' . __( 'Premium Support', 'post-grid-and-filter-ultimate' ) . '</a>',
			);
			return array_merge( $links, $row_meta );
		}
		return (array) $links;
	}

}

$pgafu_admin = new PGAFU_Admin();