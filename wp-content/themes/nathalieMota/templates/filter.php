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

<div id="filter" class="filter">

    <!-- Filter by Category -->
    <div id="categorieFilter" class="dropdown">
        <button class="btnDrop">Catégories</button>
        <ul class="listDrop">

        <!-- Populate Categories Dynamically -->
         <?php 
         $categories = get_terms('categorie');
         foreach($categories as $categorie) {
            echo '<li data-value="'. esc_attr($categorie->slug).'">'. esc_html($categorie->name).'</li>';
         }
         ?>
        </ul>
    </div>

     <!-- Filter by Format -->
    <div id="formatFilter" class="dropdown">
        <button class="btnDrop">Formats</button>
        <ul class="listDrop">
    
        
        <!-- Populate Formats Dynamically -->
         <?php
         $formats = get_terms('format');
         foreach($formats as $format) {
            echo '<li data-value="'. esc_attr__($format->slug).'">'. esc_html($format->name).'</li>';
         }
         ?>
        </ul>
    </div>

    <!-- Sort by... -->
    <div id="sortFilter" class="dropdown">
        <button class="btnDrop">Trier par</button>
        <ul class="listDrop">
            <li data-value="recent">Les Plus Récentes</li>
            <li data-value="oldest">Les Plus Anciennes</li>
        </ul>
    </div>
</div>

