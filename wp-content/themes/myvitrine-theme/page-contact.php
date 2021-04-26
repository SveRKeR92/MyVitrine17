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

		<section class="contact-header">
        <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

			// If comments are open or we have at least one comment, load up the comment template.
			if ( comments_open() || get_comments_number() ) :
				comments_template();
			endif;

		endwhile; // End of the loop.
		?>
        </section>

        <section class="social-medias">

            <div class="mail">
                <h2>Par mail</h2>
                <img src="<?php echo get_bloginfo('template_url') ?>/images/mail.png" alt="mail">
                <a href="#">team@myvitrine.fr</a>
            </div>

            <div class="medias">
                <h2>Sur nos réseaux</h2>
                <div>
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/insta.png" alt="Instagram">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/facebook.png" alt="Facebook">
                    <img src="<?php echo get_bloginfo('template_url') ?>/images/linkedin.png" alt="LinkedIn">
                </div>
                <h2>MyVitrine</h2>
            </div>

        </section>

	</main><!-- #main -->

<?php
get_footer();