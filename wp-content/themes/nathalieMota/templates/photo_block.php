<?php 
/**
 * Template Name: photo_block
 * 
 * @package WordPress
 * @subpackage Nathalie Mota "photo_block"
 * @since Nathtalie MOTA 1.0.0
 * @author GitPixel
 * 
 */
?>
<!-- Photo Block for Home Page and for "You may also like" Section -->
<?php 
// Retrieve Photo ID
$photo = get_the_post_thumbnail_url(null, 'large');
// Retrieve Photo Title
$title = get_the_title();
// Retrieve Post Url
$url_post = get_permalink();
// Retrieve Photo Ref
$reference = get_field('reference');
// Retrieve Photo Category
$categories = get_the_terms(get_the_ID(), 'categorie');
$categorie = !empty($categories) ? $categories[0]->name : '';

?>

<!-- Photo Block Display -->
<div class="photo_block">
    <!-- Display Photo with URL + ALT Attribute -->
     <img src="<?php echo esc_url($photo); ?>" alt="<?php the_title_attribute(); ?>">

     <div class="overlay">
        <!-- Display Photo Title -->
         <h2 class="title_overlay"><?php echo esc_html($title); ?></h2>

         <?php if (!empty($categorie)) : ?>
            <!-- Display Category if Exist -->
             <h3 class="categorie_overlay"><?php echo esc_html($categorie); ?></h3>
        <?php endif; ?>

        <!-- Add Icon to See Photo in Detail -->
         <div class="icon_eye">
            <a href="<?php echo esc_url($url_post); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/Icon_eye.svg" alt="Voir la photo">
            </a>
         </div>

        <!-- Add Fullscreen Icon with Date Attributes -->
         <div class="icon_fullscreen" data-full="<?php echo esc_attr($photo); ?>" data-category="<?php echo esc_attr($categorie); ?>" data-reference="<?php echo esc_attr($reference); ?>">
            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/Icon_fullscreen.svg" alt="icône fullscreen">
         </div>
     </div>
</div>
