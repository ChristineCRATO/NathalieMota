<?php
/**
 * Template Name: Modal
 * 
 * @package WordPress
 * @subpackage Nathalie Mota "Modal"
 * @since Nathtalie MOTA 1.0.0
 * @author GitPixel
 * 
 */
?>

<!-- CONTACT MODAL -->
 
<div id="modal" class="modalOverlay hidden">
    <div class="contactModal"> 
        <!-- Insert Modal Elements -->
        <div class="containerTitleModal">
            <div class="titleModal1"></div>
        </div>
        <!-- Insert Modal Form -->
        <div class="labelModal">

        <!-- Display Ref Modal -->
        <!--<p id="ref-display"></p>-->
        <!-- Hidden Input Photo Reference -->
            <input type="hidden" id="ref-photo-display" value="" readonly>
                <?php
                echo do_shortcode('[contact-form-7 id="bf0a549" title="Contact Modal"]');
                ?>
        </div>
    </div>
</div>
