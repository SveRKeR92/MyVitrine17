<div class="vitrines-posts">

    <?php

    $vitrines = array(
        'post_type' => 'profil-vitrines',
        'posts_per_page' => -1,
        'order_by' => 'date',
        'order' => 'desc'
    );

    $query = new WP_Query($vitrines);

    if($query->have_posts()) :
        while($query->have_posts()) : $query->the_post();?>

            <div class="vit">
                <div class="medias">
                    <a href="#"><i class="far fa-star"></i></a>
                    <?php the_post_thumbnail('medium'); ?>
                    <i class="fab fa-instagram"></i>
                </div>
                <?php the_title('<h2 class="title">', '</h2>'); ?>
            </div>

        <?php endwhile;
    endif;
    wp_reset_postdata();
    ?>

</div>
