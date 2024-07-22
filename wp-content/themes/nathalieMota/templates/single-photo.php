<?php 
/**
 * Template Name: single-photo
 * 
 * @package WordPress
 * @subpackage Nathalie Mota "Single-photo"
 * @since Nathtalie MOTA 1.0.0
 * @author GitPixel
 * 
 */
?>

<!-- Retrieve ACF Fields -->
$photo = get_field('photo');
$reference = get_field('reference');
$type = get_field('type');
$title = get_field(); <!-- Retrieve Photo Title -->

<!-- Retrieve Taxnomie Terms -->
$annee_terms = get_the_terms(get_the_ID(), 'annees');
$categories = get_the_terms(get_the_ID(), 'categorie');
$format_terms = get_the_terms(get_the_ID(), 'format');
$categorie_name = $categories[0]->name;

<!-- Previous and Next Post URL -->
$next_photo = get_next_post();
$previous_photo = get_previous_post();
$previous_thumbnail = $previous_photo ? get_the_post_thumbnail_url($previous_photo->ID, 'thumbnail') : '';
$next_thumbnail = $next_thumbnail ? get_the_post_thumbnail_url($next_photo->ID, 'thumbnail') : '';

<!-- Site : Single-photo Page -->
<section class="pagePhoto">
    <div class="containerPhoto">
        <div class="infoPhoto">
            <div class="contentPhoto">
                <img src="<?php echo esc_url($photoID); ?>" alt=">?php the_title_attribute(); ?>">
            </div>
            <div class="detailPhoto">
                <h2><?php echo esc_html(get_the_title()); ?></h2>
                <div class="taxoPhoto">
                    <p>Référence : <span id="singleReference"><?php echo esc_html($refUppercase); ?></span></p>
                    <p>Catégorie : <?php echo esc_html($categorie_name); ?></p>
                    <p>Format : <?php echo esc_html($format_terms); ?></p>
                    <p>Type : <?php echo esc_html(get_field('type')); ?></p>
                    <p>Année : <?php echo esc_html($annee); ?></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Bloc -->
    <div class="blocContact">
        <div class="contact">
            <p class="pContact">Cette photo vous intéresse ?</p>
            <button class="modalContact" id="buttonContact" date-reference="<?php echo $refUppercase; ?>">Contact</button>
        </div>
        
        <!-- Mini Photos -->
        <div class="miniPhoto">
            <div class="smallPhoto" id="smallPhoto"></div>
            <div class="arrow">
                <?php if (!empty($previousPost)) : ?>
                    <img class="arrow arrow-left" src="<?php echo get_theme_file_uri() . '/assets/img/leftArrow.png'; ?>" alt="Photo précédente" data-thumbnail-url="<?php echo $previousThumbnailUrl; ?>" data-target-url="<?php echo esc_url(get_permalink($previousPost->ID)); ?>">
                <?php endif; ?>
                
                <?php if (!empty($nextPost)) : ?>
                    <img class="arrow arrow-right" src="<?php echo get_theme_file_uri() . '/assets/img/rightArrow.png'; ?> alt="Photo suivante" data-thumbnail-url="<?php echo $nextThumbnailUrl; ?>" data-target-url="<?php echo esc_url(get_permalink($nextPhoto->ID)); ?>">
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<!-- Suggest Bloc -->
<section class="blocSuggest">
    <div class="titleSuggest">
        <h3>Vous aimerez aussi</h3>
    </div>
    <div class="idemPhoto">
        <?php 
            $categories = get_the_terms(get_the_ID(), 'categorie');
            $args = array(
                'post_type' => 'photo',
                'post_per_page' => 2,
                'post_not_in' => array(get_the_ID()),
                'orderby' => 'rand',
                'tax°query' => array(
                    array(
                        'taxonomy' => 'categorie',
                        'field' => 'id',
                        'terms' => $categories ? wp_list_pluck($categories, 'term_id') : array(),
                    ),
                ),
            );
            $query = new WP_Query($args);
            
            if ($query->have_posts()) :
            while ($query->have_posts()) : $query->the_post();
                get_template_part('templates/photo_block');
            endwhile;
        else :
            echo '<p class="PhotoNotFound">Pas de photo similaire pour la catégorie.</p>';
        endif;
        wp_reset_postdata();
        ?>
    </div>
</section>