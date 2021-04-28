<?php

function my_vitrine_custom_style() {
    wp_enqueue_style( 'dashicons' );
    wp_enqueue_style('my_vitrine_poppins','https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
}

add_action( 'wp_enqueue_scripts', 'my_vitrine_custom_style' );

function update_user_infos(){
	if(empty($_POST) || !isset($_POST)) {
		echo "post vide";
	} else {
	    try{
		  $user = wp_get_current_user();
		  echo $user->display_name;
  
	    }catch(Exception $e){
		  echo 'Erreur : ', $e->getMessage(), '\n';
	    }
	}
  }
  
  add_action( 'wp_ajax_update_user_infos', 'update_user_infos' );

  function js_enqueue_scripts() {
    wp_enqueue_script ("ajax_script", get_stylesheet_directory_uri() . "/js/ajax.js", array('jquery')); 
    //the_ajax_script will use to print admin-ajaxurl in custom ajax.js
    wp_localize_script('ajax_script', 'the_ajax_script', array('ajaxurl' =>admin_url('admin-ajax.php')));
} 
add_action("wp_enqueue_scripts", "js_enqueue_scripts");