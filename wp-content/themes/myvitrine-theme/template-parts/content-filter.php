<form action="#" method="POST" id="filter">

    <h2>Ambassadrice</h2>

    <?php

    if($vitrines_terms = get_terms(array(
        'taxonomy' => 'category_produits',
        'orderby' => 'name'
    ))) :

        echo '<select name="categoryfilter"><option value="">Select category...</option>';
        foreach ( $vitrines_terms as $vitrines_term ) :
            echo '<option value="' . $vitrines_term->term_id . '">' . $vitrines_term->name . '</option>'; // ID of the category as an option value
        endforeach;
        echo '</select>';

    endif; ?>

    <label>
		<input type="radio" name="date" value="ASC" /> Date: Ascending
	</label>

	<label>
		<input type="radio" name="date" value="DESC" selected="selected" /> Date: Descending
	</label>

    <br>
    <button>Apply</button>
    <input type="hidden" name="action" id="myfilter">

</form>

<div id="response"></div>