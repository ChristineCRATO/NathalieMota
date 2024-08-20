<?php
/**
 * Template Name: LightBox
 * 
 * @package WordPress
 * @subpackage Nathalie Mota "LightBox"
 * @since Nathtalie MOTA 1.0.0
 * @author GitPixel
 * 
 */
?>

<!-- LIGHTBOX -->
<!-- Block Lightbox -->
<!-- Main Block of the LightBox -->
<div id="lightbox">
    <!-- Lightbox Content -->
    <div class="contLightbox">

        <!-- Cross to Close the Lightbox -->
        <img class="closeLightbox" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/cross.png'; ?>" alt="Croix de Fermeture de la Lightbox">
        
        <!-- Navigation to previous Photo -->
        <span><img class="previousLightbox" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/previous.png'; ?>" alt="Fléche Précédente"></span>
        
            <!-- Show to Display the Photo -->
            <div class="blockImgLightbox">
                <!-- Photo -->
                <img class="imgLightbox" src="" alt="">
            </div>

            <!-- Texts Container -->
            <div class="textLightbox">
                <!-- Show Photo Categorie -->
                <span class="categorieLightbox"></span>
                <!-- Show Photo Reference -->
                <span class="referenceLightbox"></span>
            </div>
            
        <!-- Navigation to Next Photo -->
        <span><img class="nextLightbox" src="<?php echo get_stylesheet_directory_uri() . '/assets/img/next.png'; ?>" alt="Flèche Suivante"></span>
    </div>
</div>