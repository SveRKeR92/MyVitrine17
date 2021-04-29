<?php
/**
 * Plugin generic functions file
 *
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Function to get limit word of post
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
		array_pop($words);
	return implode(' ', $words);
}

/**
 * Function to unique number value
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_get_unique() {
	static $unique = 0;
	$unique++;

	// For Elementor & Beaver Builder
	if( ( defined('ELEMENTOR_PLUGIN_BASE') && isset( $_POST['action'] ) && $_POST['action'] == 'elementor_ajax' )
	|| ( class_exists('FLBuilderModel') && ! empty( $_POST['fl_builder_data']['action'] ) )
	|| ( function_exists('vc_is_inline') && vc_is_inline() ) ) {
		$unique = current_time('timestamp') . '-' . rand();
	}

	return $unique;
}

/**
 * Sanitize Multiple HTML class
 * 
 * @package Blog Designer - Post and Widget
 * @since 1.0.0
 */
function pgafu_get_sanitize_html_classes($classes, $sep = " ") {
    $return = "";

    if( !is_array($classes) ) {
        $classes = explode($sep, $classes);
    }

    if( !empty($classes) ) {
        foreach($classes as $class){
            $return .= sanitize_html_class($class) . " ";
        }
        $return = trim( $return );
    }

    return $return;
}

/**
 * Function to get post excerpt
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_get_post_excerpt( $post_id = null, $content = '', $word_length = '55', $more = '...' ) {

	$has_excerpt 	= false;
	$word_length 	= !empty($word_length) ? $word_length : '55';

	// If post id is passed
	if( !empty($post_id) ) {
		if (has_excerpt($post_id)) {

			$has_excerpt 	= true;
			$content 		= get_the_excerpt();

		} else {
			$content = !empty($content) ? $content : get_the_content();
		}
	}

	if( !empty($content) && (!$has_excerpt) ) {
		$content = strip_shortcodes( $content ); // Strip shortcodes
		$content = wp_trim_words( $content, $word_length, $more );
	}

	return $content;
}

/**
 * Function to get post featured image
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_get_post_featured_image( $post_id = '', $size = 'full', $default_img = false ) {

    $size   = !empty($size) ? $size : 'full';
    $image  = wp_get_attachment_image_src( get_post_thumbnail_id( $post_id ), $size );

    if( !empty($image) ) {
        $image = isset($image[0]) ? $image[0] : '';
    }    
    return $image;
}

/**
 * Pagination function for grid
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_pagination($args = array()){

	$big = 999999999; // need an unlikely integer

	$paging = apply_filters('pgafu_post_paging_args', array(
					'base' 		=> str_replace( $big, '%#%', esc_url( get_pagenum_link( $big ) ) ),
					'format' 	=> '?paged=%#%',
					'current' 	=> max( 1, $args['paged'] ),
					'total'		=> $args['total'],
					'prev_next'	=> true,
					'prev_text'	=> __('« Previous', 'post-grid-and-filter-ultimate'),
					'next_text'	=> __('Next »', 'post-grid-and-filter-ultimate'),
				));

	echo paginate_links($paging);
}

/**
 * Function to get 'pgaf_post_grid' shortcode design
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_post_grid_designs() {
	$design_arr = array(
		'design-1'	=> __('Design 1', 'post-grid-and-filter-ultimate'),
		'design-2'	=> __('Design 2', 'post-grid-and-filter-ultimate'),		
		);	
	return apply_filters('pgafu_post_grid_designs', $design_arr );
}

/**
 * Function to get post external link or permalink
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_get_post_link( $post_id = '' ) {

	$post_link = '';

	if( !empty($post_id) ) {
		$post_link = get_permalink( $post_id );	
	}
	return $post_link;
}

/**
 * Function to get 'pgaf_post_filter' shortcode design
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_post_grid_filter_designs() {
	$design_arr = array(
		'design-1'	=> __('Design 1', 'post-grid-and-filter-ultimate'),
		'design-2'	=> __('Design 2', 'post-grid-and-filter-ultimate'),		
		);	
	return apply_filters('pgafu_post_grid_filter_designs', $design_arr );
}