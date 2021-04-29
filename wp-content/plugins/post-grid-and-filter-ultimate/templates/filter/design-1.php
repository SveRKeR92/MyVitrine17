<?php
/**
 * Template for Post grid and filter ultimate Loop - Design-1
 *
* @package Post grid and filter ultimate
 * @version 1.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

global $post; ?>

<div class="pgafu-post-grid">
	<div class="pgafu-post-grid-content <?php if ( !has_post_thumbnail() ) { echo 'no-thumb-image'; } ?>">
		<?php if ( has_post_thumbnail() ) { ?>
			<div class="pgafu-post-image-bg" style="<?php echo $height_css; ?>">
				<a href="<?php echo $post_link; ?>">
					<img src="<?php echo $post_featured_image; ?>" alt="<?php the_title(); ?>" />
				</a>
			</div>
		<?php } ?>
		<h2 class="pgafu-post-title">
			<a href="<?php echo $post_link; ?>"><?php the_title(); ?></a>
		</h2>

		<?php if($showCategory == "true" && $cate_name !='') { ?>
		<div class="pgafu-post-categories"><?php echo $cate_name; ?></div>
		<?php }
		if($showDate == "true" || $showAuthor == 'true' || $show_comments =="true") { ?>
			<div class="pgafu-post-date">
				<?php if($showAuthor == 'true') { ?>
					<span class="pgafu-user-img"><img src="<?php echo PGAFU_URL; ?>assets/images/user.svg" alt=""> <?php the_author(); ?></span>
				<?php } ?>
				<?php echo ($showAuthor == 'true' && $showDate == 'true') ? '&nbsp;' : '' ?>
				<?php if($showDate == "true") { ?>
					<span class="pgafu-time"> <img src="<?php echo PGAFU_URL; ?>assets/images/calendar.svg" alt=""> <?php echo get_the_date(); ?> </span>
				<?php } ?>
				<?php echo ($showAuthor == 'true' && $showDate == 'true' && $show_comments == 'true') ? '&nbsp;' : '' ?>
				<?php if(!empty($comments) && $show_comments == 'true') { ?>
					<span class="pgafu-post-comments">
						<img src="<?php echo PGAFU_URL; ?>assets/images/comment-bubble.svg" alt="" />
						<a href="<?php the_permalink(); ?>#comments"><?php echo $comments.' '.$reply;  ?></a>
					</span>
				<?php } ?>
			</div>
		<?php } 
		if($showContent == "true") { ?>
			<div class="pgafu-post-content">
				<div class="pgafu-post-short-content"><?php echo pgafu_get_post_excerpt( $post->ID, get_the_content(), $words_limit, $content_tail ); ?></div>
				<?php if($show_read_more == 'true') { ?>
					<a href="<?php echo $post_link; ?>" class="readmorebtn"><?php _e( 'Read More', 'post-grid-and-filter-ultimate' ); ?></a>
				<?php } ?>
			</div>
		<?php } ?>
	</div>
</div>