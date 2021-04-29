<div class="vitrines-posts">

    <?php

    $vitrines = array(
        'post_type' => 'profil-vitrines',
        'posts_per_page' => -1,
        'order_by' => 'date',
        'order' => 'desc'
    );

    $vitrine_id = get_the_ID();
    $vitrines_terms = wp_get_post_terms( $vitrine_id, ['category', 'post_tag'] );

    $query = new WP_Query($vitrines);

    if($query->have_posts()) :
        while($query->have_posts()) : $query->the_post();?>

            <div class="vit">
                <div class="medias">
                    <a href="#"><i class="far fa-star fa-2x"></i></a>
                    <?php the_post_thumbnail('medium'); ?>
                    <i class="fab fa-instagram fa-2x"></i>
                </div>
                
                <div class="below">
                    <?php the_title('<h2 class="title">', '</h2>'); ?>
                    <?php the_content(); ?>
                    <button><a href="#">Catégorie</a></button>
                </div>
            </div>

        <?php endwhile;
    endif;
    wp_reset_postdata();
    ?>

</div>
