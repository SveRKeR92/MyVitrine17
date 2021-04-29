<form method="GET">
	<div class="form-main">

		<div>
			<h2>Ambassadrice</h2>
		</div>

		<div>
			<label for="ambassadeur">Nom de l'ambassadrice:</label>
			<input type="text" id="ambassadeur" placeholder="Entrez le nom...">
		</div>

        <?php

        $vitrines_terms = get_terms([
            'taxonomy' => 'category_produits',
            'hide_empty' => false
        ]); ?>

        <div>
			<label for="categories">Catégorie produit:</label>
			<select name="categories" id="categories">
                <option value="">Choisir une catégorie</option>
                <?php foreach($vitrines_terms as $term) : ?>
                    <option value="<?= $term->slug; ?>"><?= $term->name; ?></option>
                <?php endforeach; ?>
            </select>
		</div>

	</div>

	<!-- <div class="form-main">

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
    </div>     -->

	<button type="submit">Valider</button>
</form>