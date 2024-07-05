<!-- CONTACT MODAL -->
<div id="modal" class="overlayModal">
    <div class="contactModal">
            
        <!-- Insert Modal Elements -->
        <div class="titleModal">
            <img class="contactImg" src="<?php echo get_theme_file_uri("/assets/img/Contact.png") . ''; ?>">
        </div>
            
        <!-- Insert Modal Form -->
        <div class="labelModal">
                <?php
                echo do_shortcode('[contact-form-7 id="bf0a549" title="Contact Modal"]');
                ?>
        </div>
    </div>
</div>

