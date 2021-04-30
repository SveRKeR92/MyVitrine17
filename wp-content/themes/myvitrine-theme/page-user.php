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
$infos = get_user_meta($user->ID);
// echo $infos["nickname"][0];

// if(isset($infos["nickname"])){
//       echo "La valeur existe";
// }else {
//       echo "La valeur n'existe pas";
// }

$post = get_post();
var_dump($post);
echo "<br>";
echo "<br>";
echo "<br>";
$produtcs = get_the_terms($post->ID, 'All produits');
var_dump($produtcs);
?>

<h1><?= $user->display_name ?></h1>

<?php 
if(!isset($infos["profile_created"])){
?>

<div class="init" id="step1">
      <h2>Etape 1 : Créer mon profil d'ambassadeur</h2>
      <button class="add" id="profile_add"><i class="fas fa-plus fa-2x"></i></button>
</div>

<!-- First Modal Form -->

<?php
} else{
?>

<div class="profile-container">
<div class="flex">
            <div>
                  <div class="flex">
                        <div>
                              <img src="<?= $infos["profile_picture_url"][0] ?>" alt="image de profil">
                        </div>
                        <div>
                              <p class="heading"><?= $infos["first_name"][0] != "" ? $infos["first_name"][0] : "Prénom manquant" ?>  <?= $infos["last_name"][0] != "" ? $infos["last_name"][0] : "Nom manquant"?></p>
                              <p class="detail"><?= $infos["birth_date"][0] != "" ? $infos["birth_date"][0] : "Age manquant" ?></p>
                              <p class="detail"><?= $infos["city"][0] != "" ? $infos["city"][0] : "Ville manquante" ?></p>
                              <a href="<?= $infos["instagram"][0] ?>" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                        </div>
                  </div>
                  <div class="categories"><?= $infos["product_category"][0] != "" ? $infos["product_category"][0] : "Vous n'avez pas défini de catégorie" ?></div>
            </div>
            <div>
                  <span class="nproducts">Nombre de produits recommandés</span>
                  <p class="desc"><?= $infos["description"][0] != "" ? $infos["description"][0] : "Vous n'avez pas de description" ?></p>        
            </div>
      </div>
      <button id="edit"><i class="fas fa-edit fa-2x"></i></button>
</div>

<?php
}
?>

<div id="modal1" class="modal">
      <div class="modal-content">
            <span class="close" id="close1">&times;</span>
            <h3>Informations Vitrine</h3>
            <form id="form">
                  <input type="text" name="last_name" placeholder="Nom">
                  <input type="text" name="first_name" placeholder="Prénom">
                  <input type="text" name="profile_picture_url" placeholder="Image de profil (lien)">
                  <input type="number" name="birth_date" placeholder="Age">
                  <input type="text" name="city" placeholder="Ville">
                  <input type="text" name="instagram" placeholder="Instagram">
                  <input type="text" name="product_category" placeholder="Catégorie de produits">
                  <textarea name="description" rows="5" placeholder="Description..."></textarea>
                  <button id="click">Ajouter un profil</button>
            </form>
      </div>
</div>



<script>
      jQuery('#click').click(function(e){
            e.preventDefault();
            jQuery.ajax({
                  url: the_ajax_script.ajaxurl,
                  type: 'POST',
                  data: {
                        'action' : 'update_user_infos',
                        'inputs' : jQuery("#form").serializeArray()
                  },
                  success:function(){
                        location.reload()
                  },
                  error:function(){
                        alert("error");
                  }
            })
      });

      jQuery('#step1').click(function(e){
            e.preventDefault();
            jQuery('#modal1').css('display', 'block');
      });

      jQuery('#close1').click(function(){
            jQuery('#modal1').css('display', 'none');
      });

      jQuery('#edit').click(function(e){
            e.preventDefault();
            jQuery('#modal1').css('display', 'block');
      });

</script>

<?php

get_footer();