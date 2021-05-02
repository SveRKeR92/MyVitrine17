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
        if($input["name"] == 'instagram' && $input["value"] != ""){
            $input["value"] = 'https://www.instagram.com/' . $input["value"];
            echo $input["value"];
        }
        if(isset($infos[$input["name"]]) && $input["value"] != ""){
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
add_action('wp_ajax_nopriv_update_user_infos', 'update_user_infos');

function js_enqueue_scripts()
{
    wp_enqueue_script("ajax_script", get_stylesheet_directory_uri() . "/js/ajax.js", array('jquery'));
    //the_ajax_script will use to print admin-ajaxurl in custom ajax.js
    wp_localize_script('ajax_script', 'the_ajax_script', array('ajaxurl' => admin_url('admin-ajax.php')));
}

add_action("wp_enqueue_scripts", "js_enqueue_scripts");



add_action( 'wp_ajax_add_product', 'add_product' );
add_action('wp_ajax_nopriv_add_product', 'add_product');

function add_product(){
    var_dump($_POST["inputs"]);
    $new_post = array(
        'ID' => '',
        'post_type' => 'produits',
        'post_status' =>  'publish',
        'post_title' => $_POST["inputs"][1]["value"],
        'post_content' => $_POST["inputs"][4]["value"],
    );

    $post_id = wp_insert_post($new_post);
    $post = get_post($post_id);

    $field_marque = "marque_du_produit";
    $value_marque = $_POST["inputs"][0]["value"];
    update_field( $field_marque, $value_marque, $post_id );  

    $field_nom = "nom_du_produit";
    $value_nom = $_POST["inputs"][1]["value"];
    update_field( $field_nom, $value_nom, $post_id );  

    $field_image = "lien_image";
    $value_image = $_POST["inputs"][2]["value"];
    update_field( $field_image, $value_image, $post_id );  

    $field_category = "categorie_produit";
    $value_category = $_POST["inputs"][3]["value"];
    update_field( $field_category, $value_category, $post_id );  

    $field_description = "description_du_produit";
    $value_description = $_POST["inputs"][4]["value"];
    update_field( $field_description, $value_description, $post_id );  

    $field_user = "id_utilisateur";
    $value_user = $_POST["inputs"][5]["value"];
    update_field( $field_user, $value_user, $post_id );  

    echo "<br>";
    echo "<br>";
    echo "<br>";

    var_dump($new_post);
}