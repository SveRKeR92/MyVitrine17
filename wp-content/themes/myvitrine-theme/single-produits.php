<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package MyVitrine_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<?php
		while ( have_posts() ) :
			the_post();
			$data = get_post($post_id);
	
	$age = get_post_meta( get_the_ID(), 'age', true);
	$ville = get_post_meta( get_the_ID(), 'ville', true);
			?>
<div id = "post-<?php the_ID(); ?>" class = profilAmbassadeur>
	<div class="profilAmbassadeur1">
		<div class = profilAmbassadeur1-1>
			<img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" alt="">
		</div>

		<div class = profilAmbassadeur1-2>
			<h2> <?php echo $data->post_title; ?></h2>
			<?php if(!empty($age)) {
			?> <h3><?=$age?> ans</h3>
			<?php } ?>
		</div>
	</div>
	<div class = profilAmbassadeur2>
		<p><?php echo $data->post_content; ?></p>
	</div>
	
	
		<?php	get_template_part( 'template-parts/content', get_post_type() );

		
			 
			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;
			
		endwhile; // End of the loop.
		?>
	<?php echo do_shortcode('[favorite_button]'); ?>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();
