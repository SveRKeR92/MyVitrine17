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
?>

	<main id="primary" class="site-main">

		<section class="header-vitrines">
			<div class="titles">
				<h1>My Vitrine</h1>
				<h2>Une solution pour tous </h2>
				<h3>Ce produit est-il vraiment bien, est-il efficace ? </h3>
			</div>

			<div class="head-search">
				<h3>Que recherchez vous ?</h3>
				<form action="#">
					<div class="form-main">

						<div>
							<h2>Ambassadrice</h2>
						</div>

						<div>
							<label for="ambassadeur">Nom de l'ambassadrice:</label>
							<input type="text" id="ambassadeur" placeholder="Entrez le nom...">
						</div>

						<div>
							<label for="city">Ville:</label>
							<input type="text" id="city" placeholder="Entrez une ville">
						</div>

						<div>
							<label for="age">Age:</label>
							<input type="text" id="age" placeholder="Entrez un âge">
						</div>
					</div>

					<div class="form-main">

						<div>
							<h2>Produit</h2>
						</div>

						<div>
							<label for="categories">Catégorie produit:</label>
							<select name="categories" id="categories">
								<option value="">Catégorie de produits</option>
								<option value="health">Cosmétiques et soins</option>
								<option value="accessoires">Accessoires</option>
							</select>
						</div>

						<div>
							<label for="soins">Type de soins</label>
							<select name="soins" id="soins">
								<option value="" selected>Choisir le type de soins</option>
								<option value="face">Visage</option>
								<option value="body">Corps</option>
								<option value="hair">Cheveux</option>
								<option value="hygiene">Hygiène</option>
								<option value="make-up">Maquillage</option>
								<option value="food">Complément alimentaire</option>
							</select>
						</div>

						<div>
							<label for="accessoire">Type d'accessoires</label>
							<select name="accessoire" id="accessoire">
								<option value="" selected>Choisir le type d'accessoires</option>
								<option value="teint">Teint</option>
								<option value="eyes">Yeux</option>
								<option value="Lips">Lèvres</option>
								<option value="nails">Ongles</option>
								<option value="make-up-accessoires">Accessoires maquillage</option>
							</select>
						</div>


				</form>
			</div>
            <button class="valide-btn" type="submit">Valider</button>
	</section>

	<section class="vitrines-advised">
		<h2 class="advised">Les vitrines recommandées</h2>

		<?php
			while( have_posts() ) :
				the_post();

				get_template_part('template-parts/content', 'none');

			endwhile; ?>
	</section>

	<section class="all-vitrines">
		<h1 class="all-vitrines-title">Toutes les vitrines</h1>

			<?php
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', 'vitrines' );

			endwhile; // End of the loop.
			?>

	</section>

	</main><!-- #main -->

	<?php get_footer();
