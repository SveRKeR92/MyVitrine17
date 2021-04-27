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

if(is_user_logged_in()){
      $post = get_post(151);
      the_content();
}else{
      echo "<span class='error'> Veuillez vous connecter pour accéder à cette page</span>";
}
?>








<?php 
get_footer();