<?php
/**
 * 'pgaf_post_grid' Shortcode
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

/**
 * Function to handle the 'pgaf_post_grid' shortcode
 * 
 * @package Post grid and filter ultimate
 * @since 1.0.0
 */
function pgafu_post_grid_shortcode( $atts, $content ) {

	// SiteOrigin Page Builder Gutenberg Block Tweak - Do not Display Preview
	if( isset( $_POST['action'] ) && ( $_POST['action'] == 'so_panels_layout_block_preview' || $_POST['action'] == 'so_panels_builder_content_json' ) ) {
		return '[pgaf_post_grid]';
	}

	// Divi Frontend Builder - Do not Display Preview
	if( function_exists( 'et_core_is_fb_enabled' ) && isset( $_POST['is_fb_preview'] ) && isset( $_POST['shortcode'] ) ) {
		return '<div class="pgafu-builder-shrt-prev">
					<div class="pgafu-builder-shrt-title"><span>'.esc_html__('Post Grid - Shortcode', 'post-grid-and-filter-ultimate').'</span></div>
					pgaf_post_grid
				</div>';
	}

	// Fusion Builder Live Editor - Do not Display Preview
	if( class_exists( 'FusionBuilder' ) && (( isset( $_GET['builder'] ) && $_GET['builder'] == 'true' ) || ( isset( $_POST['action'] ) && $_POST['action'] == 'get_shortcode_render' )) ) {
		return '<div class="pgafu-builder-shrt-prev">
					<div class="pgafu-builder-shrt-title"><span>'.esc_html__('Post Grid - Shortcode', 'post-grid-and-filter-ultimate').'</span></div>
					pgaf_post_grid
				</div>';
	}

	// Shortcode Parameters
	extract(shortcode_atts(array(
		'limit' 				=> 15,
		'cat_id' 				=> '',
		'include_cat_child'		=> 'true',
		'order'					=> 'DESC',
		'orderby'				=> 'date',
		'grid' 					=> 3,
		'image_fit' 			=> 'true',
		'media_size' 			=> 'large',
		'show_date' 			=> 'true',
		'show_category_name' 	=> 'true',
		'show_author' 			=> 'true',
		'image_height' 			=> '',
		'design'				=> 'design-1',
		'content_words_limit' 	=> 20,
		'show_read_more'        => 'true',
		'content_tail'			=> '...',
		'pagination' 			=> 'true',
		'pagination_type'		=> 'numeric',
		'show_comments'			=> 'true',
		'show_content' 			=> 'true',
		'extra_class'			=> '',
		'className'				=> '',
		'align'					=> '',
	), $atts, 'pgaf_post_grid'));

	$shortcode_designs	= pgafu_post_grid_designs();
	$content_tail 		= html_entity_decode( $content_tail );
	$design 			= array_key_exists( trim($design)  , $shortcode_designs ) ? $design : 'design-1';
	$order 				= ( strtolower( $order ) == 'asc' ) 	? 'ASC' 						: 'DESC';
	$limit				= ! empty( $limit ) 					? $limit 						: 15;
	$orderby			= ! empty( $orderby ) 					? $orderby 						: 'date';
	$gridcol			= ! empty( $grid ) 						? $grid 						: 1;
	$cat_id				= ! empty( $cat_id )					? explode(',',$cat_id) 			: '';
	$words_limit 		= ! empty( $content_words_limit ) 		? $content_words_limit          : 20;
	$media_size 		= ! empty( $media_size )				? $media_size 	                : 'large'; //thumbnail, medium, large, full
	$image_height 		= ! empty( $image_height )           	? $image_height                 : '';
	$height_css 		= ( $image_height )						? 'height:'.$image_height.'px;' : '';
	$include_cat_child	= ( $include_cat_child == 'false' ) 	? false 						: true;
	$show_read_more  	= ( $show_read_more == 'false' )    	? false 						: true;
	$showAuthor 		= ( $show_author == 'true' )			? 'true'						: 'false';
	$showDate 			= ( $show_date == 'true' ) 				? 'true'						: 'false';
	$showCategory 		= ( $show_category_name == 'true' )		? 'true' 						: 'false';
	$pagination 		= ( $pagination == 'false' )			? 'false'						: 'true';
	$pagination_type 	= ( $pagination_type == 'prev-next' )	? 'prev-next' 					: 'numeric';
	$image_fit			= ( $image_fit == 'false' )				? 0                             : 1;
	$show_comments 		= ( $show_comments == 'true' ) 			? 'true'						: 'false';
	$showContent 		= ( $show_content == 'true' ) 			? 'true' 						: 'false';
	$align				= ! empty( $align )						? 'align'.$align				: '';
	$extra_class		= $extra_class .' '. $align .' '. $className;
	$extra_class		= pgafu_get_sanitize_html_classes( $extra_class );

	// Shortcode file
	$post_design_file_path 	= PGAFU_DIR . '/templates/grid/' . $design . '.php';
	$design_file 			= (file_exists($post_design_file_path)) ? $post_design_file_path : '';

	// Taking some globals
	global $post, $paged;
	$count 				= 0; 
	$image_fit_class	= ($image_fit) 	? 'pgafu-image-fit' : '';

	// Pagination parameter
	if(is_home() || is_front_page()) {
		$paged = get_query_var('page');
	} else {
		$paged = get_query_var('paged');
	}

	// WP Query Parameters
	$query_args = array(
			'post_type' 			=> PGAFU_POST_TYPE,
			'post_status' 			=> array( 'publish' ),
			'posts_per_page'		=> $limit,
			'order'          		=> $order,
			'orderby'        		=> $orderby,
			'ignore_sticky_posts'	=> true,
			'paged'         		=> $paged,
		);

	// Category Parameter
	if( !empty($cat_id) ) {
		$query_args['tax_query'] = array( 
										array(
											'taxonomy' 			=> PGAFU_CAT, 
											'field' 			=> 'term_id',
											'terms' 			=> $cat_id,
											'include_children'	=> $include_cat_child,
										));
	} 

	// WP Query
	$post_query = new WP_Query($query_args);
	$post_count = $post_query->post_count;

	ob_start();

	// If post is there
	if ( $post_query->have_posts() ) { ?>
		<div class="pgafu-post-grid-main <?php echo 'pgafu-'.$design.' '.$image_fit_class; ?> pgafu-grid-<?php echo $gridcol; ?> pgafu-clearfix <?php echo $extra_class; ?>">
			<?php
			while ( $post_query->have_posts() ) : $post_query->the_post();
				$count++;
				$cat_links 				= array();
				$css_class 				= '';
				$post_featured_image 	= pgafu_get_post_featured_image( $post->ID, $media_size, true );
				$post_link 		        = pgafu_get_post_link( $post->ID );
				$terms 					= get_the_terms( $post->ID, PGAFU_CAT );
				$comments 				= get_comments_number( $post->ID );
				$reply					= ($comments <= 1)  ? 'Reply' : 'Replies';

				if($terms) {
					foreach ( $terms as $term ) {
						$term_link = get_term_link( $term );
						$cat_links[] = '<a href="' . esc_url( $term_link ) . '">'.$term->name.'</a>';
					}
				}
				$cate_name = join( " ", $cat_links );

				if ( ( is_numeric( $grid ) && ( $grid > 0 ) && ( 0 == ($count - 1) % $grid ) ) || 1 == $count ) { $css_class .= ' pgafu-first'; }
				if ( ( is_numeric( $grid ) && ( $grid > 0 ) && ( 0 == $count % $grid ) ) || $post_count == $count ) { $css_class .= ' pgafu-last'; }

				// Include shortcode html file
				if( $design_file ) {
					include( $design_file );
				}

			endwhile; ?>

			<?php if($pagination == "true") { ?>
			<div class="pgafu-post-pagination pgafu-clearfix">
				<?php if($pagination_type == "numeric") {
					echo pgafu_pagination( array( 'paged' => $paged , 'total' => $post_query->max_num_pages ) );
				} else { ?>
					<div class="button-post-p"><?php next_posts_link( ' Next >>', $post_query->max_num_pages ); ?></div>
					<div class="button-post-n"><?php previous_posts_link( '<< Previous' ); ?></div>
				<?php } ?>
			</div>
		<?php } ?>

		</div>

		<?php
	} // end of have_post()

	wp_reset_postdata(); // Reset WP Query

    $content .= ob_get_clean();
    return $content;
}
add_shortcode('pgaf_post_grid', 'pgafu_post_grid_shortcode');