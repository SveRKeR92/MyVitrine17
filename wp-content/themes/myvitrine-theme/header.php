<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package MyVitrine_Theme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>
<?php  $pageName = get_post_field('post_name', get_post()); ?>
<body <?php body_class($pageName); ?>>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'myvitrine-theme' ); ?></a>

	<header id="masthead" class="site-header">
		<!-- <div class="site-branding">
			<?php
			the_custom_logo();
			if ( is_front_page() && is_home() ) :
				?>
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php
			else :
				?>
				<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></p>
				<?php
			endif;
			$myvitrine_theme_description = get_bloginfo( 'description', 'display' );
			if ( $myvitrine_theme_description || is_customize_preview() ) :
				?>
				<p class="site-description"><?php echo $myvitrine_theme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></p>
			<?php endif; ?>
		</div>.site-branding -->

		<nav id="site-navigation" class="main-navigation">
		<section id="headerMyVitrine">
        <section class="allHead">
            <div class="logoHead"><a href="../../home.php"><img src="<?php echo get_bloginfo('template_url') ?>/images/NEW_LOGO_6.png" alt=""></a>
</div>
<div class="openMenu"><i class="fa fa-bars"></i></div>
            <div class="rightFoot">
                <div class="linksHead">
                    <a href="concept">Le concept</a>
                    <a href="vitrines">Les vitrines</a>
                    <a href="faq">FAQ</a>
                    <a href="contact">Contact</a>

                </div>
				<div class="closeMenu"><i class="fas fa-times"></i></div>
                <div class="buttonsHead">
                    <button class = "inscription"> <a href="inscription">Inscription</a></button>
                    <button class = "connexion"><a href="login">Connexion</a></button>
                </div>
            </div>

        </section>
		</section>
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Primary Menu', 'myvitrine-theme' ); ?></button>
			<?php
			// wp_nav_menu(
			// 	array(
			// 		'theme_location' => 'menu-1',
			// 		'menu_id'        => 'primary-menu',
			// 		'menu_class' => 'navClass',
			// 	)
			// );
			?>


		</nav><!-- #site-navigation -->

	</header><!-- #masthead -->


<script type="text/javascript">
const rightFoot = document.querySelector('.rightFoot');
const closeMenu = document.querySelector('.closeMenu');
const openMenu = document.querySelector('.openMenu');

console.log("bonjour");


openMenu.addEventListener('click', show);
closeMenu.addEventListener('click', close);

function show() {
    rightFoot.style.display = 'flex';
    rightFoot.style.top = '0';
}

function close() {
    rightFoot.style.top = '-100%';
}</script>
