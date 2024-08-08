<?php
//----------------------------------------------------------------------------//
//                                  THEME SUPPORT                             //
//----------------------------------------------------------------------------//

// Add Support Images
add_theme_support( 'post-thumbnails' );

    // Automatically Add the Site Title in the Site Header
    function theme_slug_setup() {
add_theme_support( 'title-tag');
    }
add_action('after_setup_theme', 'theme_slug_setup');

//-----------------------------------------------------------------------------//
//                                  Register Menu                              //
//-----------------------------------------------------------------------------//
    
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

//----------------------------------------------------------------------------//
//                                  Enqueue Styles and Scripts                //
//----------------------------------------------------------------------------//

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
        wp_enqueue_script('lightbox', get_theme_file_uri(). '/assets/js/lightbox.js', array('jquery'), null, true);
    }
// Add Function to load Styles & Scripts
add_action('wp_enqueue_scripts', 'theme_mota_styles_scripts');

//----------------------------------------------------------------------------------//
//                                  Load More Photos                                //
//----------------------------------------------------------------------------------//

    //... Add Script "load-more" + "localize" AJAX Parameters
    function load_more_script() {
            wp_enqueue_script('load-more', get_theme_file_uri(). '/assets/js/load-more.js', array('jquery'), null, true);

            //... Using wp_localize to Pass Parameters to the Script
            wp_localize_script('load-more', 'myUrlAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
add_action('wp_enqueue_scripts', 'load_more_script');

//... Registers AJAX Functions for Logged in and Offline Users
add_action('wp_ajax_load_more_photos', 'load_more_photos');
add_action('wp_ajax_nopriv_load_more_photos', 'load_more_photos');

    //... Create Function "load_more_photos"
    function load_more_photos() {

        //... Retrieves Relative page Number from Post Data
        //$page = $_POST['page']; Retiré

        // Check Parameters sent by AJAX
        $offset = isset($_POST['offset']) ? intval($_POST['offset']) : 0;
        $limit = isset($_POST['limit']) ? intval($_POST['limit']) : 8;
        $categorie = isset($_POST['categorie']) ? sanitize_text_field($_POST['categorie']) : '';
        $format = isset($_POST['format']) ? sanitize_text_field($_POST['format']) : '';

        //... Query Arguments for Photo Retrieval
        $args_photo = array(
            'post_type'     => 'photo',         //... Publication Type
            'posts_per_page' => $limit,               //... Number Photos Page
            'orderby'       => 'date',          //... Random Sort
            'order'         => 'DESC',          //... Ascending Order 
            'offset'        => $offset, //... Get Offset from AJAX Request
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

//--------------------------------------------------------------------------------//
//                                  Filter Photos                                 //
//--------------------------------------------------------------------------------//

    //... Add Script "Filter" + "localize" AJAX Parameters
    function filter_script() {
        wp_enqueue_script('filter', get_theme_file_uri(). '/assets/js/filter.js', array('jquery'), null, true);
        
        //... Using wp_localize to Pass Parameters to the Script
        wp_localize_script('filter', 'myUrlAjax', array('ajaxurl' => admin_url('admin-ajax.php')));
    }
add_action('wp_enqueue_scripts', 'filter_script');
//... Register Ajax Functions for Logged in and Offline Users
add_action('wp_ajax_filter_photo', 'filter_photo');
add_action('wp_ajax_nopriv_filter_photo', 'filter_photo');

    //... Create Function "Filter Photo"
    function filter_photo() {
        //... Collects the Filters and Cleans them
        $filter = $_POST['filter'];
            //... Add Debug Message
            error_log('Filter Value : '. print_r($filter, true));
        //... Building the Jquery with Filters
        $args = array(
            'post_type' => 'photo',
            'post_per_page' => -1,
            'orderby' => 'date',
            'order' => 'DESC',
            'tax_query' => array(
                'relation' => 'AND',
            )
        );

        //... Add Filters to Tax Query if Defined
        //... Categorie
        if(!empty($filter['categorie'])) {
            $args['tax_query'][] = array(
                'taxonomy' => 'categorie',
                'field' => 'slug',
                'terms' => $filter['categorie'],
            );
        }
        //... Format
        if(!empty($filter['format'])) {
            $args['tax_query'] [] = array(
                'taxonomy' => 'format',
                'field' => 'slug',
                'terms' => $filter['format'],
            );
        }
        //... Année
        if(!empty($filter['annee'])) {
            $args['tax_query'] [] = array(
                'taxonomy' => 'annee',
                'field' => 'slug',
                'terms' => $filter['annee'],
            );
        }

        //...  New Instance
        $query = new WP_Query($args);

        if($query->have_posts()) {
            while($query->have_posts()) {
                $query->the_post();

                get_template_part('templates/photo_block', null);
            }
            wp_reset_postdata();
        } else {
            echo '<p class="selectFiltre">Aucune Photo ne correspond à la Recherche !</p>';
        }
        die();
    }
