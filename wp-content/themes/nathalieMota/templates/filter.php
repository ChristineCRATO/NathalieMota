<?php
/**
 * Template Name: Filter
 * 
 * @package WordPress
 * @subpackage Nathalie Mota "Filter"
 * @since Nathtalie MOTA 1.0.0
 * @author GitPixel
 * 
 */
?>

<!-- FILTER -->

<div class="filter">

    <!-- Filter by Category -->
    <select id="categorieFilter">
        <option value="" selected disabled>Catégories</option>

        <!-- Populate Categories Dynamically -->
         <?php 
         $categories = get_terms('categorie');
         foreach($categories as $categorie) {
            echo '<option value="'. $categorie->slug .'">'. $categorie->name .'</option>';
         }
         ?>
    </select>

     <!-- Filter by Format -->
    <select id="formatFilter">
        <option value="" selected disabled>Formats</option>

        <!-- Populate Formats Dynamically -->
         <?php
         $formats = get_terms('format');
         foreach($formats as $format) {
            echo '<option value="'. $format->slug .'">'. $format->name .'</option>';
         }
         ?>
    </select>

    <!-- Sort by... -->
    <select id="sortFilter">
        <option disabled selected>Trier par</option>
        <option value="recent">Les Plus Récentes</option>
        <option value="oldest">Les Plus Anciennes</option>
    </select>
</div>

<!-- Container Display Photos -->
<section id="photoFilter" class="initialBlock">
    <!-- Here Photos Display -->
</section>
