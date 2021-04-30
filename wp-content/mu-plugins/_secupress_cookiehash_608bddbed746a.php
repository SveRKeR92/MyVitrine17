<?php
/**
 * Plugin Name: SecuPress COOKIEHASH
 * Description: Change the default COOKIEHASH constant value to prevent easy guessing.
 * Version: 2.0
 * License: GPLv2
 * License URI: http://www.gnu.org/licenses/gpl-2.0.html
 *
 * Copyright 2012-2021 SecuPress
 */

defined( 'ABSPATH' ) or die( 'Something went wrong.' );

define( 'SECUPRESS_COOKIEHASH_MODULE_ACTIVE', true );

if ( ! get_site_option( 'secupress_active_submodule_wp-config-constant-cookiehash' ) || defined( 'COOKIEHASH' ) ) {
	return;
}

define( 'COOKIEHASH', md5( __FILE__ . 'pRnc114fem0Dt#F4Q3EzE2W)XtmD(U08#RX&s%lzI8@W6gy9YO!d447SgJzWlb%z' ) );
