<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MyVitrine_Theme
 */

get_header();
?>

	<main id="primary" class="site-main">

		<section class="header-vitrines">
			<div class="titles">
				<h1>My Vitrine</h1>
				<h2>Une solution pour tous </h2>
				<h3>Ce produit est-il vraiment bien, est-il efficace ? </h3>
			</div>

			<div class="head-search">
				<h3>Que recherchez vous ?</h3>

				<?php get_template_part('template-parts/content', 'filter'); ?>

			</div>
	</section>

	<section class="vitrines-advised">
		<h2 class="advised">Les vitrines recommandées</h2>

		<?php
			while( have_posts() ) :
				the_post();

				get_template_part('template-parts/content', get_post_type() );

			endwhile; ?>
	</section>

	<section class="all-vitrines">
		<h1 class="all-vitrines-title">Toutes les vitrines</h1>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'vitrines' );

			endwhile; // End of the loop.
			?>

	</section>

	</main><!-- #main -->

	<?php get_footer();
