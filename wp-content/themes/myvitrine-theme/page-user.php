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

$user = wp_get_current_user();
var_dump($user);

echo admin_url('admin_ajax.php');
?>

<h1><?= $user->display_name ?></h1>



<?php

get_footer();