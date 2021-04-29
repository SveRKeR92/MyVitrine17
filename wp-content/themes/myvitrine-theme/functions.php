<?php
/**
 * MyVitrine Theme functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package MyVitrine_Theme
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.0.0' );
}

if ( ! function_exists( 'myvitrine_theme_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function myvitrine_theme_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on MyVitrine Theme, use a find and replace
		 * to change 'myvitrine-theme' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'myvitrine-theme', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus(
			array(
				'menu-1' => esc_html__( 'Primary', 'myvitrine-theme' ),
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Set up the WordPress core custom background feature.
		add_theme_support(
			'custom-background',
			apply_filters(
				'myvitrine_theme_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'myvitrine_theme_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function myvitrine_theme_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'myvitrine_theme_content_width', 640 );
}
add_action( 'after_setup_theme', 'myvitrine_theme_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function myvitrine_theme_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'myvitrine-theme' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'myvitrine-theme' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
}
add_action( 'widgets_init', 'myvitrine_theme_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function myvitrine_theme_scripts() {
	wp_enqueue_style( 'myvitrine-theme-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_enqueue_style( 'style', get_stylesheet_uri() );
	wp_style_add_data( 'myvitrine-theme-style', 'rtl', 'replace' );
	//  wp_enqueue_script('myvitrine-theme-navigation', 'burger.js', false);
	wp_enqueue_script('myvitrine-theme-navigation', get_stylesheet_directory_uri() . '/js/burger.js');

	wp_enqueue_script( 'myvitrine-theme-navigation', get_template_directory_uri() . '/js/navigation.js', array(), _S_VERSION, true );
	wp_enqueue_script( 'myvitrine-theme-filter', get_template_directory_uri() . '/js/filter.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'myvitrine_theme_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

require get_template_directory() . '/inc/custom-functions.php';

/**
* Customize the Favorites Listing HTML
*/
/*add_filter( 'favorites/list/listing/html', 'custom_favorites_listing_html', 10, 4 );
function custom_favorites_listing_html($html, $markup_template, $post_id, $list_options)
{
	ob_start();
	$data = get_post($post_id);
	var_dump($data->post_category);
	$age = get_post_meta( get_the_ID(), 'age', true);
	$ville = get_post_meta( get_the_ID(), 'ville', true);
?>
<div id = "post-<?php the_ID(); ?>" class = blocFavori>
	<img src="<?php echo get_the_post_thumbnail_url($post_id); ?>" alt="">
	<a href="<?php echo 'http://localhost/MyVitrine17/profil-vitrines/' ?>"> <?php echo $data->post_title; ?></a>
	<p><?php echo $data->post_content; ?></p>
	<?php if(!empty($age)) {
		?> <p><?=$age?></p>
		<?php } ?>
	
	<p></p>
	<!-- <button class = simplefavorite-button active preset ></button> -->
</div>
<?php
	return ob_get_clean();
}*/

add_filter( 'favorites/list/listing/html', 'custom_favorites_listing_html', 10, 4 );
function custom_favorites_listing_html($html, $markup_template, $post_id, $list_options)
{
	ob_start();

	$vitrines = array(
		'post_type' => 'profil-vitrines',
		'post_per_page' => -1,
		'order_by' => 'date',
		'order' => 'ASC'
	);

	$query = new WP_Query($vitrines);

	$age = get_post_meta( get_the_ID(), 'age', true);
	$ville = get_post_meta( get_the_ID(), 'ville', true);
?>

<div class="all-fav">

 <?php if($query->have_posts()) :
		while($query->have_posts()) : $query->the_post(); ?>

		<div id="post-<?php the_ID(); ?>" class="blocFavori">
			<?php the_post_thumbnail('medium'); ?>
			<a href="#"><?= the_title(); ?></a>
			<p><?= the_content(); ?></p>
			<?php if(!empty($age) || !empty($ville)) : ?>
				<p><?= $age ?></p>
				<p><?= $ville ?></p>
			<?php endif; ?>
		</div>
		<?php endwhile;
	endif; ?>

</div>

<?php
	return ob_get_clean();
}