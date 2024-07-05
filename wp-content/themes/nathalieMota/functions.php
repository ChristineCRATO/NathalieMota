<?php
// Useful Styles and Scripts for Theme
function theme_mota_styles_scripts() {
    // Load Main Style and Use "Time" to avoid Caching
    wp_enqueue_style('nathalieMota-style', get_stylesheet_directory_uri(). '/assets/sass/style.css', array(), time());
    // Loads all Scripts to make the Site Work
    wp_enqueue_script('header', get_theme_file_uri(). '/assets/js/header.js', array(), true);
    wp_enqueue_script('modal', get_theme_file_uri(). '/assets/js/modal.js', array(), true);
}
// Add Support Images
add_theme_support( 'post-thumbnails' );

// Add Function to load Styles & Scripts
add_action('wp_enqueue_scripts', 'theme_mota_styles_scripts');

// Add Function Save Custom Menus in the Theme
function registerMenu () {
    register_nav_menu('menuFooter', __('Menu Footer', 'nathalieMota')); // Save Menu Footer
    register_nav_menu('menuHeader', __('Menu Header', 'nathalieMota')); // Save Menu Header
}

// Add Menu Registration to Theme Initialization
add_action('after_setup_theme', 'registerMenu');

// Automatically Add the Site Title in the Site Header
add_theme_support( 'title-tag');