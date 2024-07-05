<?php
/**
 * 
 * @package WordPress
 * @subpackage Nathalie Mota "Footer"
 * @since Twenty Twenty-One 1.0
 * @author GitPixel
 * 
 */
?>
    <!-- Using wp_nav_menu function to display WP menu -->
    <footer id="menuFooter">
                    <?php wp_nav_menu(
                        array(
                        'theme_location' => 'menuFooter',
                        'container' => 'false',
                        ));
                    ?>
        <p class="copyright">Tous Droits Réservés</p>
    </footer>

    <!-- Launch Contact Modal -->
    <?php get_template('/templates/modal'); ?>

    <?php wp_footer(); ?>
    </body>
</html>