<?php

// Add JQuery Library
function librairie_jquery() {
    wp_enqueue_script('jquery.js', 'https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js', array('jquery'), '3.7.1', true);
}
add_action('wp_enqueue_scripts', 'librairie_jquery');

// Useful Styles and Scripts for Theme
function theme_mota_styles_scripts() {
    // Load Main Style and Use "Time" to avoid Caching
    wp_enqueue_style('nathalieMota-style', get_stylesheet_directory_uri(). '/assets/sass/style.css', array(), time());
    // Loads all Scripts to make the Site Work
    wp_enqueue_script('header', get_theme_file_uri(). '/assets/js/header.js', array('jquery'), null, true);
    wp_enqueue_script('mini-photo', get_theme_file_uri(). '/assets/js/mini-photo.js', array('jquery'), null, true);
    wp_enqueue_script('modal', get_theme_file_uri(). '/assets/js/modal.js', array('jquery'), null, true);
    wp_enqueue_script('load-more', get_theme_file_uri(). '/assets/js/load-more.js', array('jquery'), null, true);
}

// Add Support Images
add_theme_support( 'post-thumbnails' );

// Automatically Add the Site Title in the Site Header
function theme_slug_setup() {
add_theme_support( 'title-tag');
}
// Add Function to load Styles & Scripts
add_action('wp_enqueue_scripts', 'theme_mota_styles_scripts');
add_action('after_setup_theme', 'theme_slug_setup');

// Add Function Save Custom Menus in the Theme
function registerMenus () {
    register_nav_menus(
        array(
            'menuHeader' => 'Menu Header', // Save Menu Header
            'menuFooter' => 'Menu Footer', // Save Menu Footer
        )
    );
}
// Add Menu Registration to Theme Initialization
add_action('init', 'registerMenus');

// Load More Photos
//... Registers AJAX Functions for Logged in and Offline Users
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');
//... Create Function "load_more_photos"
function load_more_photos() {
    //... Retrieves Relative page Number from Post Data
    $page = $_POST['page'];
    //... Query Arguments for Photo Retrieval
    $args_photo = array(
        'post_type'     => 'photo',         //... Publication Type
        'post_per_page' => 8,               //... Number Photos Page
        'orderby'       => 'date',          //... Random Sort
        'order'         => 'DESC',          //... Ascending Order 
        'offset'        => $_POST['offset'] //... Get Offset from AJAX Request
    );
    //... Execute WP_Query with Photo Arguments
    $photo_block_accueil = new WP_Query($args_photo);
    //... Search for Photos in Query
    if ($photo_block_accueil->have_posts()) :
        //... Search Loop Photos
        while($photo_block_accueil->have_posts()) :
            $photo_block_accueil->the_post();
            //... Integration Template or Photos should be Displayed
            get_template_part('templates/photo_block', get_post_format());
        endwhile;

        //... Init Post Data
        wp_reset_postdata();
    else :
        //... No Photo Found
        echo 'Aucune Photo Trouvée.';
    endif;
        //... End Function
        die();
}
