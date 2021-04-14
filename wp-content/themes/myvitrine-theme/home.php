<?php

/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package MyVitrine_Theme
 */

get_header();
?>

<main id="primary" class="site-main">

      <div class="head-home">
            <div class="w-35">
                  <h1 class="brown">My Vitrine</h1>
                  <p class="lightgreen f-24">Des sélections de produits faites par des gens comme toi, pour toi…</p>
                  <p class="f-18">Cosmétiques - Soins - Maquillage - Accessoires zéro déchet - Bijoux - Yoga - Accessoires déco</p>
                  <div class="button-container">
                        <a href="#" class="button lightgreen-bcg">Découvrir</a>
                  </div>
            </div>
            <div class="w-65">
                  <img src="<?php echo get_bloginfo('template_url') ?>/images/Home1.png" />
            </div>
      </div>

      <section mission class="lightgreen-bcg">
            <p class="f-36 centered">
                  Notre mission <br> "Permettre à chacun d'améliorer ses modes de consommations grâce aux recommandations et conseils des autres"
            </p>
      </section>

      <section chiffres>
            <h2 class="brown f-36">My Vitrine en chiffres</h2>
            <div class="chiffres-container">
                  <div>
                        <img src="<?php echo get_bloginfo('template_url') ?>/images/selfie1.png" alt="influenceuses">
                        <p class="brown">Plus de 150 ambassadrices inspirantes</p>
                  </div>
                  <div>
                        <img src="<?php echo get_bloginfo('template_url') ?>/images/makeup1.png" alt="produits">
                        <p class="brown">Plus de 800 produits recommandés</p>
                  </div>
                  <div>
                        <img src="<?php echo get_bloginfo('template_url') ?>/images/data1.png" alt="marques">
                        <p class="brown">Plus de 100 marques engagées</p>
                  </div>
            </div>
      </section>

      <section creer>
            <div class="creer-container">
                  <div class="w-45">
                        <img src="<?php echo get_bloginfo('template_url') ?>/images/Home2.png" alt="Créer">
                  </div>
                  <div class="w-55 text-container">
                        <p class="lightgreen f-24">Crée ta propre Vitrine et deviens ambassadeur de tes marques préferées</p>
                        <p class="f-18">Mets à profit tes expériences et ton expertise au service des autres !</p>
                        <div class="button-container">
                              <a href="#" class="button lightgreen-bcg">Créer ma vitrine !</a>
                        </div>
                  </div>
            </div>
      </section>

      <section tendances>
            <h2 class="f-64 lightgreen">Nos vitrines du mois</h2>

            <div class="vignets-container">
                  <div class="vignet">
                        <div class="infos">
                              <p>Age</p>
                              <div>
                                    <img src="<?php echo get_bloginfo('template_url') ?>/images/profile.png" alt="Image de Profil">
                              </div>
                              <p>Ville</p>
                        </div>
                        <p class="name">Prénom Nom</p>
                        <span>Catégories principales</span>
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae in sunt similique dolorem architecto, quo laborum odit, vitae voluptates explicabo rerum quasi dolores quis mollitia nulla quaerat excepturi? Iure, minima!</p>
                  </div>

                  <div class="vignet">
                        <div class="infos">
                              <p>Age</p>
                              <div>
                                    <img src="<?php echo get_bloginfo('template_url') ?>/images/profile.png" alt="Image de Profil">
                              </div>
                              <p>Ville</p>
                        </div>
                        <p class="name">Prénom Nom</p>
                        <span>Catégories principales</span>
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae in sunt similique dolorem architecto, quo laborum odit, vitae voluptates explicabo rerum quasi dolores quis mollitia nulla quaerat excepturi? Iure, minima!</p>
                  </div>

                  <div class="vignet">
                        <div class="infos">
                              <p>Age</p>
                              <div>
                                    <img src="<?php echo get_bloginfo('template_url') ?>/images/profile.png" alt="Image de Profil">
                              </div>
                              <p>Ville</p>
                        </div>
                        <p class="name">Prénom Nom</p>
                        <span>Catégories principales</span>
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae in sunt similique dolorem architecto, quo laborum odit, vitae voluptates explicabo rerum quasi dolores quis mollitia nulla quaerat excepturi? Iure, minima!</p>
                  </div>

                  <div class="vignet">
                        <div class="infos">
                              <p>Age</p>
                              <div>
                                    <img src="<?php echo get_bloginfo('template_url') ?>/images/profile.png" alt="Image de Profil">
                              </div>
                              <p>Ville</p>
                        </div>
                        <p class="name">Prénom Nom</p>
                        <span>Catégories principales</span>
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae in sunt similique dolorem architecto, quo laborum odit, vitae voluptates explicabo rerum quasi dolores quis mollitia nulla quaerat excepturi? Iure, minima!</p>
                  </div>

                  <div class="vignet">
                        <div class="infos">
                              <p>Age</p>
                              <div>
                                    <img src="<?php echo get_bloginfo('template_url') ?>/images/profile.png" alt="Image de Profil">
                              </div>
                              <p>Ville</p>
                        </div>
                        <p class="name">Prénom Nom</p>
                        <span>Catégories principales</span>
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae in sunt similique dolorem architecto, quo laborum odit, vitae voluptates explicabo rerum quasi dolores quis mollitia nulla quaerat excepturi? Iure, minima!</p>
                  </div>

                  <div class="vignet">
                        <div class="infos">
                              <p>Age</p>
                              <div>
                                    <img src="<?php echo get_bloginfo('template_url') ?>/images/profile.png" alt="Image de Profil">
                              </div>
                              <p>Ville</p>
                        </div>
                        <p class="name">Prénom Nom</p>
                        <span>Catégories principales</span>
                        <p class="desc">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestiae in sunt similique dolorem architecto, quo laborum odit, vitae voluptates explicabo rerum quasi dolores quis mollitia nulla quaerat excepturi? Iure, minima!</p>
                  </div>
            </div>
      </section>

      <footer class="lightgreen-bcg">
            <h2 class="f-64 brown" style="text-align: center;">
                  FOOTER
            </h2>
      </footer>

</main><!-- #main -->

<?php
// get_sidebar();
// get_footer();
