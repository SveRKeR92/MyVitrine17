<div class="vitrines-posts">

    <?php

    $vitrines = array(
        'post_type' => 'profil-vitrines',
        'posts_per_page' => -1,
        'order_by' => 'date',
        'order' => 'desc',
        'age' => 23
    );

    $query = new WP_Query($vitrines);

    if($query->have_posts()) :
        while($query->have_posts()) : $query->the_post();?>

            <div id="post-<?php the_ID(); ?>" class="vit">
                <div class="medias">
                    <a href="#"><i class="far fa-star fa-2x"></i></a>
                    <?php the_post_thumbnail('medium'); ?>
                    <i class="fa fa-instagram fa-2x"></i>
                </div>

                <?php

                    $age = get_post_meta( get_the_ID(), 'age', true);
                    $ville = get_post_meta( get_the_ID(), 'ville', true);

                    $vitrines_terms = get_the_terms( $post->ID, 'category_produits');
                ?>
                
                <div class="below">
                    <?php the_title('<h2 class="title">', '</h2>'); ?>
                    <?php the_content(); ?>
                    <button><a href=""><?= $vitrines_terms[0]->name; ?></a></button>
                </div>
            </div>

        <?php endwhile;
    endif;
    wp_reset_postdata();
    ?>

</div>
