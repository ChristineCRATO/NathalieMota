<?php
/**
 * 
 * @package WordPress
 * @subpackage Nathalie Mota "Header"
 * @since Nathalie MOTA 1.0
 * @author GitPixel
 * 
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo('charset'); ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"/>
        <title>Nathalie Mota</title>

        <?php wp_head(); ?>
    </head>

    <body <?php body_class(); ?>>
        <header id="menuHeader" class="menuHeader">
                <div class="menuLogo">
                    <a href="<?php echo home_url( '/accueil' ); ?>">
                    <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Logo.png" alt="logo du site">
                    </a>
                </div>
            <!-- Bloc Menu SD Responsive -->
            <div class="menuBlock">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <!-- Using wp_nav_menu function to display WP menu -->
                <nav id="menuNav" class="menuNav">
                    <?php wp_nav_menu(
                        array(
                        'theme_location' => 'menuHeader',
                        'menu_class' => 'menuHeader', // Custom Menu
                        ));
                    ?>
                </nav>
        </header>

        <?php wp_body_open(); ?>
    