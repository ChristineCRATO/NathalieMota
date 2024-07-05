<?php
/**
 * 
 * @package WordPress
 * @subpackage Nathalie Mota "Header"
 * @since Twenty Twenty-One 1.0
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
        <header class="menuLogo">
            <a href="<?php echo home_url( '/' ); ?>">
                <img src="<?php echo get_template_directory_uri(); ?>/assets/img/Logo.png" alt="logo du site">
            </a>
            
            <!-- Bloc Menu -->
            <div class="menuBloc">
                <span class="line"></span>
                <span class="line"></span>
                <span class="line"></span>
            </div>
            <!-- Using wp_nav_menu function to display WP menu -->
            <div class="menuNav">
                <nav>
                    <?php wp_nav_menu(
                        array(
                        'theme_location' => 'menuHeader',
                        'container' => 'false',
                        ));
                    ?>
                </nav>
            </div>
        </header>

        <?php wp_body_open(); ?>
    