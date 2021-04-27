<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MyVitrine_Theme
 */

?>

<footer>
        <section id="titleFoot"><a href="#">MY VITRINE</a></section>
        <section id="contentFoot">
            <section id="AllLinksFoot">
                <section id="linksFoot">
                    <a href="">CONTACT</a>
                    <a href="">FAQ</a>
                    <a href="">LES VITRINES</a>
                </section>
                <section id="linksFoot">
                    <a href="">LE CONCEPT</a>
                    <a href="">CGU</a>
                    <a href="">PROFIL</a>
                </section>
            </section>
            <section id="networksFoot">
                <a href="#"><img src="<?php echo get_bloginfo('template_url') ?>/images/facebook.png" alt=""></a>
                <a href="#"><img src="<?php echo get_bloginfo('template_url') ?>/images/insta.png" alt=""></a>
                <a href="#"><img src="<?php echo get_bloginfo('template_url') ?>/images/linkedin.png" alt=""></a>
            </section>
        </section>
    </footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>

</html>

