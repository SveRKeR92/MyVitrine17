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

?>

<h1><?= $user->display_name ?></h1>

<?php
if (!isset($infos["profile_created"])) {
?>

      <div class="init" id="step1">
            <h2>Etape 1 : Créer mon profil d'ambassadeur</h2>
            <button class="add" id="profile_add"><i class="fas fa-plus fa-2x"></i></button>
      </div>

      <!-- First Modal Form -->

<?php
} else {
?>

      <div class="profile-container">
            <div>
                  <div class="contenu_profil">
                        <div class="info_profil">
                              <div class="photo_profil">
                                    <img src="<?= $infos["profile_picture_url"][0] ?>" alt="image de profil">
                              </div>
                              <div class="contact_profil">
                                    <p class="heading"><?= $infos["first_name"][0] != "" ? $infos["first_name"][0] : "Prénom manquant" ?> <?= $infos["last_name"][0] != "" ? $infos["last_name"][0] : "Nom manquant" ?></p>
                                    <p class="detail"><?= $infos["birth_date"][0] != "" ? $infos["birth_date"][0] : "Age manquant" ?></p>
                                    <p class="detail"><?= $infos["city"][0] != "" ? $infos["city"][0] : "Ville manquante" ?></p>
                                    <a href="<?= $infos["instagram"][0] ?>" target="_blank"><i class="fab fa-instagram fa-2x"></i></a>
                                    <div class="categories"><?= $infos["product_category"][0] != "" ? $infos["product_category"][0] : "Vous n'avez pas défini de catégorie" ?></div>
                              </div>
                        </div>


                        <div class="info_produit_profil">
                              <span class="nproducts">Nombre de produits recommandés</span>
                              <p class="desc"><?= $infos["description"][0] != "" ? $infos["description"][0] : "Vous n'avez pas de description" ?></p>
                        </div>
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
                  <input type="text" name="instagram" placeholder="Nom d'utilisateur Instagram">
                  <input type="text" name="product_category" placeholder="Catégorie de produits">
                  <textarea name="description" rows="5" placeholder="Description..."></textarea>
                  <button id="click">Soumettre</button>
            </form>
      </div>
</div>

<div id="modal2" class="modal">
      <div class="modal-content">
            <span class="close" id="close2">&times;</span>
            <h3>Ajouter un produit</h3>
            <form id="product_form">
                  <input type="text" placeholder="Marque du produit" name="marque">
                  <input type="text" placeholder="Nom du produit" name="title">
                  <input type="text" placeholder="Image du produit (lien)" name="image_link">
                  <input type="text" placeholder="Catégorie du produit" name="category">
                  <textarea rows="5" placeholder="Description..." name="content"></textarea>
                  <input type="number" name="user_id" value="<?= $user->ID ?>" style="display: none;">
                  <button id="click_product">Ajouter</button>
            </form>
      </div>
</div>

<div class="products_container">

      <?php

      $args = array(
            'post_type' => 'produits',
      );

      $the_query = new WP_Query($args);
      if ($the_query->have_posts()) :
            while ($the_query->have_posts()) :
                  $the_query->the_post();
                  $id_user = get_field('id_utilisateur');
                  if ($id_user == $user->ID) :
                        // var_dump($the_query);
      ?>
                        <div class="product_vignet">
                              <div>
                                    <img src="<?= the_field('lien_image') ?>" alt="Image produit">
                              </div>

                              <h3><?= the_title(); ?></h3>
                              <p class="marque"><?= the_field('marque_du_produit'); ?></p>
                              <p class="product_description"><?= the_field('description_du_produit'); ?></p>
                              <div class="category">
                                    <span><?= the_field('categorie_produit'); ?></span>
                              </div>
                        </div>
      <?php
                  endif;
            endwhile;
            wp_reset_postdata();
      else :
      endif;
      ?>

      <div class="add_product" id="step2">
            <div>
                  <h2>Ajouter un produit</h2>
                  <button class="add" id="profile_add"><i class="fas fa-plus fa-2x"></i></button>
            </div>
      </div>

</div>

<script>
      jQuery('#click').click(function(e) {
            e.preventDefault();
            jQuery.ajax({
                  url: the_ajax_script.ajaxurl,
                  type: 'POST',
                  data: {
                        'action': 'update_user_infos',
                        'inputs': jQuery("#form").serializeArray()
                  },
                  success: function() {
                        location.reload()
                  },
                  error: function() {
                        alert("error");
                  }
            });
      });

      jQuery('#step1').click(function(e) {
            e.preventDefault();
            jQuery('#modal1').css('display', 'block');
      });

      jQuery('#close1').click(function() {
            jQuery('#modal1').css('display', 'none');
      });

      jQuery('#edit').click(function(e) {
            e.preventDefault();
            jQuery('#modal1').css('display', 'block');
      });

      jQuery('#step2').click(function(e) {
            e.preventDefault();
            jQuery('#modal2').css('display', 'block');
      });

      jQuery('#close2').click(function() {
            jQuery('#modal2').css('display', 'none');
      });


      jQuery('#click_product').click(function(e) {
            e.preventDefault();
            jQuery.ajax({
                  url: the_ajax_script.ajaxurl,
                  type: 'POST',
                  data: {
                        'action': 'add_product',
                        'inputs': jQuery("#product_form").serializeArray()
                  },
                  success: function() {
                        location.reload();
                  },
                  error: function() {
                        alert("error");
                  }
            });
      });
</script>


<?php
get_footer();
