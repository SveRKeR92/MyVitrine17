<?php

function my_vitrine_custom_style()
{
    wp_enqueue_style('dashicons');
    wp_enqueue_style('my_vitrine_poppins', 'https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
}

add_action('wp_enqueue_scripts', 'my_vitrine_custom_style');

function update_user_infos()
{
    $user = wp_get_current_user();
    $infos = get_user_meta($user->ID);
    // var_dump($_POST["inputs"]);
    echo "<br>";
    foreach($_POST["inputs"] as $input){
        var_dump($input);
        if($input["name"] == 'instagram'){
            $input["value"] = 'https://www.instagram.com/' . $input["value"];
            echo $input["value"];
        }
        if(isset($infos[$input["name"]]) && $infos[$input["value"]] != ""){
            update_user_meta($user->ID, $input["name"], $input["value"]);
        }else{
            add_user_meta($user->ID, $input["name"], $input["value"]);
        }
    }
    if(!isset($infos["profile_created"])){
        add_user_meta($user->ID, 'profile_created', 1);
    }
}

add_action('wp_ajax_update_user_infos', 'update_user_infos');

function js_enqueue_scripts()
{
    wp_enqueue_script("ajax_script", get_stylesheet_directory_uri() . "/js/ajax.js", array('jquery'));
    //the_ajax_script will use to print admin-ajaxurl in custom ajax.js
    wp_localize_script('ajax_script', 'the_ajax_script', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action("wp_enqueue_scripts", "js_enqueue_scripts");
