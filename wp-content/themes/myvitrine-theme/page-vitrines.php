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
				<h2>Lorem ipsum dolor sit amet.</h2>
				<h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam elementum.</h3>
			</div>

			<div class="head-search">
				<h3>Que recherchez vous ?</h3>
				<form action="#">
					<div>
						<label for="ambassadeur">Nom de l'ambassadrice:</label>
						<input type="text" id="ambassadeur" placeholder="Entrez le nom...">
					</div>

					<div>
						<label for="categories">Catégorie produit:</label>
						<select name="categories" id="categories">
							<option value="">Catégorie de produits</option>
							<option value="face">Soins visages</option>
							<option value="hair">Soins cheveux</option>
							<option value="body">Soins corps</option>
							<option value="hygiène">Hygiène</option>
							<option value="make-up">Maquillage</option>
							<option value="food">Complément alimentaire</option>
							<option value="ecology">Zéro déchet</option>
							<option value="jewels">Bijoux</option>
							<option value="yoga">Yoga</option>
							<option value="home">Bien-être maison</option>
							<option value="deco">Décoration</option>
							<option value="other">Autre produit</option>
						</select>
					</div>

					<div>
						<label for="city">Ville:</label>
						<input type="text" id="city" placeholder="Entrez une ville">
					</div>

					<div>
						<label for="age">Age:</label>
						<input type="text" id="age" placeholder="Entrez un âge">
					</div>

					<button type="submit">Valider</button>
				</form>
			</div>
	</section>

	</main><!-- #main -->
