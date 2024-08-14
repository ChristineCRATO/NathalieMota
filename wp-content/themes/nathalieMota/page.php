<?php get_header();?>

<main>

    <?php

    if (have_posts()) :
        while (have_posts()) : the_post();
            // the_title('<h1>', '</h1>'); "Delete Page Title"
            the_content();
        endwhile;
    endif;

    // Templates Integration
    if (is_front_page()) {

        // Integration Hero Template //
        get_template_part('templates/hero');

        // Integration Filter Template //
        get_template_part('templates/filter');

        // Integration Photo Block Accueil Template //
        get_template_part('templates/photo_block_accueil');

        // Integration "Load More" Button Template //
        get_template_part('templates/load-more');
    }

    ?>
</main>

<?php get_footer(); ?>
