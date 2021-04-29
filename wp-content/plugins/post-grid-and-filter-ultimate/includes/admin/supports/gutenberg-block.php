<?php
/**
 * Blocks Initializer
 * 
 * @package Post grid and filter ultimate
 * @since 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

function pgafu_register_guten_block() {

	// Block Editor Script
	wp_register_script( 'pgafu-block-js', PGAFU_URL.'assets/js/blocks.build.js', array( 'wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor', 'wp-components' ), PGAFU_VERSION, true );
	wp_localize_script( 'pgafu-block-js', 'Pgafu_Block', array(
																'pro_demo_link'		=> 'https://demo.wponlinesupport.com/prodemo/post-grid-and-filter-with-popup-pro-demo/',
																'free_demo_link'	=> 'https://demo.wponlinesupport.com/post-grid-and-filter-ultimate-demo/',
																'pro_link' 			=> PGAFU_PLUGIN_LINK,
															));

	// Register block and explicit attributes for grid
	register_block_type( 'pgafu/pgaf-post-grid', array(
		'attributes' => array(
			'design' => array(
							'type'		=> 'string',
							'default'	=> 'design-1',
						),
			'grid' => array(
							'type'		=> 'number',
							'default'	=> 3,
						),
			'show_author' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_date' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_category_name' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_comments' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_content' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'content_words_limit' => array(
							'type'		=> 'number',
							'default'	=> 20,
						),
			'content_tail' => array(
							'type'		=> 'string',
							'default'	=> '...',
						),
			'show_read_more' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'media_size' => array(
							'type'		=> 'string',
							'default'	=> 'large',
						),
			'image_fit' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'image_height' => array(
							'type'		=> 'number',
							'default'	=> '',
						),
			'limit' => array(
							'type'		=> 'number',
							'default'	=> 15,
						),
			'orderby' => array(
							'type'		=> 'string',
							'default'	=> 'date',
						),
			'order' => array(
							'type'		=> 'string',
							'default'	=> 'desc',
						),
			'cat_id' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'include_cat_child' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'pagination' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'pagination_type' => array(
							'type'		=> 'string',
							'default'	=> 'numeric',
						),
			'align' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'className' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
		),
		'render_callback' => 'pgafu_post_grid_shortcode',
	));

	//Register block, and explicitly define the attributes for slider
	register_block_type( 'pgafu/pgaf-post-filter', array(
		'attributes' => array(
			'design' => array(
							'type'		=> 'string',
							'default'	=> 'design-1',
						),
			'grid' => array(
							'type'		=> 'number',
							'default'	=> 3,
						),
			'show_author' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_category_name' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_date' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_comments' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'show_content' => array(
							'type'		=> 'boolean',
							'default'	=> true,
						),
			'content_words_limit' => array(
							'type'		=> 'number',
							'default'	=> 20,
						),
			'content_tail' => array(
							'type'		=> 'string',
							'default'	=> '...',
						),
			'show_read_more' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'media_size' => array(
							'type'		=> 'string',
							'default'	=> 'large',
						),
			'image_fit' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'image_height' => array(
							'type'		=> 'number',
							'default'	=> '',
						),
			'all_filter_text' => array(
							'type'		=> 'string',
							'default'	=> 'All',
						),
			'orderby' => array(
							'type'		=> 'string',
							'default'	=> 'date',
						),
			'order' => array(
							'type'		=> 'string',
							'default'	=> 'desc',
						),
			'cat_limit' => array(
							'type'		=> 'number',
							'default'	=> 0,
						),
			'cat_orderby' => array(
							'type'		=> 'string',
							'default'	=> 'name',
						),
			'cat_order' => array(
							'type'		=> 'string',
							'default'	=> 'asc',
						),
			'cat_id' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'include_cat_child' => array(
							'type'		=> 'string',
							'default'	=> 'true',
						),
			'exclude_cat' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'align' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
			'className' => array(
							'type'		=> 'string',
							'default'	=> '',
						),
		),
		'render_callback' => 'pgafu_postgrid_filter_shortcode',
	));

	if ( function_exists( 'wp_set_script_translations' ) ) {
		wp_set_script_translations( 'pgafu-block-js', 'post-grid-and-filter-ultimate', PGAFU_DIR . '/languages' );
	}

}
add_action( 'init', 'pgafu_register_guten_block' );

/**
 * Enqueue Gutenberg block assets for both frontend + backend.
 *
 * @package Post grid and filter ultimate
 * @since 1.0
 */
function pgafu_block_assets() {	
}
add_action( 'enqueue_block_assets', 'pgafu_block_assets' );

/**
 * Enqueue Gutenberg block assets for backend editor.
 *
 * @uses {wp-blocks} for block type registration & related functions.
 * @uses {wp-element} for WP Element abstraction — structure of blocks.
 * @uses {wp-i18n} to internationalize the block's text.
 * @uses {wp-editor} for WP editor styles.
 * 
 * @package Post grid and filter ultimate
 * @since 1.0
 */
function pgafu_editor_assets() {

	// Block Editor CSS
	if( ! wp_style_is( 'wpos-free-guten-block-css', 'registered' ) ) {
		wp_register_style( 'wpos-free-guten-block-css', PGAFU_URL.'assets/css/blocks.editor.build.css', array( 'wp-edit-blocks' ), PGAFU_VERSION );
	}

	// Block Editor Script
	wp_enqueue_style( 'wpos-free-guten-block-css' );
	wp_enqueue_script( 'pgafu-block-js' );

}
add_action( 'enqueue_block_editor_assets', 'pgafu_editor_assets' );

/**
 * Adds an extra category to the block inserter
 *
 * @package Post grid and filter ultimate
 * @since 1.0
 */
function pgafu_add_block_category( $categories ) {

	$guten_cats = wp_list_pluck( $categories, 'slug' );

	if( ! in_array( 'wpos_guten_block', $guten_cats ) ) {
		$categories[] = array(
							'slug'	=> 'wpos_guten_block',
							'title'	=> __('WPOS Blocks', 'post-grid-and-filter-ultimate'),
							'icon'	=> null,
						);
	}

	return $categories;
}
add_filter( 'block_categories', 'pgafu_add_block_category' );