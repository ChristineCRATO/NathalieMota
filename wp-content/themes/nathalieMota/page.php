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

        // Hero Template Integration //
        get_template_part('templates/hero');

        // Photo Block Accueil Integration //
        get_template_part('templates/photo_block_accueil');

    }

    ?>
</main>

<?php get_footer(); ?>
