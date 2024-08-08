console.log("LightBox JS is Open !");

// Method to avoid Conflicts with Libraries that use the $ Symbol
jQuery(document).ready(function($) {
    // DOM Element Selection

    const $lightbox = $('#lightbox');
    const $imgLightbox = $('.imgLightbox');
    const $categorieLightbox = $('.categorieLightbox');
    const $referenceLightbox = $('.referenceLightbox');
    let currentIndex = 0; // Index of the Currently Displayed Img

    // Update Lightbox Content Based on IMG Index
    function updateLightbox(index) {
        const $image = $('.icon_fullscreen').eq(index);
        console.log('selected img :', $image);

        // // Retrieving Data Associated with the IMG (in Capital Letters)
        const categorieTxt = $image.data('categorie') ? $image.data('categorie').toUpperCase() : "";
        const referenceTxt = $image.data('reference') ? $image.data('reference').toUpperCase() : "";

        // Update Lightbox Items with new Data
        $imgLightbox.attr('src', $image.data('full'));
        $categorieLightbox.text(categorieTxt);
        $referenceLightbox.text(referenceTxt);
        currentIndex = index;
    }

    // Function to Open the Lightbox with a Particular IMG
    function openLightbox(index) {
        console.log('Open My Lightbox');
        console.log('Open Lightbox Index: ', index);
        updateLightbox(index);
        $lightbox.show();
    }

    // Function to Close the Lightbox
    function closeLightbox() {
        console.log('Close My Lightbox');
        $lightbox.hide();
    }

    // Attach Events to IMG
    function attachEventIMG() {
        // Event Delegation for IMG with Icon-Fullscreen Class
        $('.icon_fullscreen').off('click').on('click', imgClickHand);
    }

    // Handler for Clicking on an IMG
    const imgClickHand = (event) => {
        // Retrieves Index IMG Click
        const index = $('.icon_fullscreen').index($(event.currentTarget));
        openLightbox(index);
    };

    // Attaching Events IMG on Initial Load
    attachEventIMG();

    // Event Handler for Close Button Click
    $('.closeLightbox').on('click', closeLightbox);

    // Event Handler Previous Button Click
    $('.previousLightbox').on('click', () => {
        const $images = $('.icon_fullscreen');
        currentIndex = currentIndex > 0 ? currentIndex - 1 : $images.length - 1;
        updateLightbox(currentIndex);
    });
    // Event Handler Next Button Click
    $('.nextLightbox').on('click', () => {
        const $images = $('.icon_fullscreen');
        currentIndex = currentIndex < $images.length - 1 ? currentIndex + 1 : 0;
        updateLightbox(currentIndex);
    });

    // Reattach Event Handlers After Dynamically Loading Content
    $(document).on('ajaxComplete', attachEventIMG);
});