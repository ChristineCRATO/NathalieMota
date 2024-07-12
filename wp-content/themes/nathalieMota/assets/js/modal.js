console.log("Modal JS is Open !");

// Listen DOM before Script Execution
document.addEventListener('DOMContentLoaded', (event) => {
    console.log("dom is ok");
    // Modal Contact
    const buttonModal = document.getElementById('menu-item-46');
    const overlayModal = document.querySelector('.modalOverlay');
    const contactModal = document.querySelector('.contactModal');

    // Vérifier si les éléments existent
    if (!buttonModal) {
        console.error("Element with ID 'menu-item-46' not found.");
        return;
    }

    if (!modalOverlay) {
        console.error("Element with class 'modalOverlay' not found.");
        return;
    }

    if (!contactModal) {
        console.error("Element with class 'contactModal' not found.");
        return;
    }

    console.log("Elements found:", { buttonModal, modalOverlay, contactModal });


    // Open Modal by Click Contact 
    buttonModal.addEventListener('click', function(event) {
            event.preventDefault(); // Prevents Default Behavior Link
            overlayModal.classList.remove('hidden');
            console.log('modal open');
        });
        // Close Modal by Click Outside
        contactModal.addEventListener('click', function(event) {
            if (event.target === overlayModal) {
            overlayModal.classList.add('hidden');
            console.log('modal close');
            }
        });
});