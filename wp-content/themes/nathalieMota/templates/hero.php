<?php
/**
 * Template Name: Hero
 * 
 * @package WordPress
 * @subpackage Nathalie Mota "Hero"
 * @since Nathtalie MOTA 1.0.0
 * @author GitPixel
 * 
 */
?>
<div class="photoHero">
    <h1>Photographe Event</h1>

    <?php 
    // Query to Retrieve a Random IMG in Post Type //
    $photoHero_args = array(
        'post_type' => 'photo',
        'post_per_page' => 1,
        'orderby' => 'rand',
    );
    
    // Init Request //
    $photoHero_query = new WP_Query($photoHero_args);

        // Find Out if There are IMG or Not //
        if ($photoHero_query->have_posts()) {
            // Random Photo Loop //
            while ($photoHero_query->have_posts()) {
                $photoHero_query->the_post();

                // Show Full Photo //
                echo get_the_post_thumbnail(get_the_ID(), 'full');
            }
            // Data Reset Published after Loop //
            wp_reset_postdata();
        }
    ?>
</div>