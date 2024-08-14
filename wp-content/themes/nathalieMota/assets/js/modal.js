console.log("Modal JS is Open !");

// Listen DOM before Script Execution
document.addEventListener('DOMContentLoaded', (event) => {
    console.log("dom is ok");
    // Modal Contact
    const btnModal = document.getElementById('menu-item-46'); // Contact Button Menu Nav
    const btnSingle = document.getElementById('contact-modal'); // Contact Button Single-Photo
    const modal = document.getElementById('modal'); // Modal Elements
    const contactModal = document.querySelector('.contactModal'); // Modal CSS
    const refPhoto = document.getElementById('ref-photo'); // Element for Ref
    //const refDisplay = document.getElementById('ref-display'); // Display Ref

            btnModal.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent Default Behavior Link
            modal.classList.remove('hidden');
            modal.classList.add('visible'); // Show Modal
            console.log('Modal is Open');
            });

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
            modal.classList.add('hidden');
            modal.classList.remove('visible'); // Hide Modal
            console.log('Modal is Closed');
                }
            });

            document.querySelector('.contactModal').addEventListener('click', function(event) {
                event.stopPropagation(); // Prevent Modal from Close when Click inside Modal
            });

            btnSingle.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent Default Behavior Link
                const reference = this.getAttribute('data-reference'); // Get the Ref from Data Attr
                modal.classList.remove('hidden'); // Show Modal
                modal.classList.add('visible');

                    if (refPhoto) {
                        refPhoto.value = reference; // Set the Ref in the Modal
                        console.log('reference field:', refPhoto);
                        console.log('reference set in form:', refPhoto.value);
                    } else {
                        console.log('reference field not found');
                    }

                    const refDisplay = document.getElementById('ref-photo-display');
                    if (refDisplay) {
                        refDisplay.value = reference;
                        console.log('reference display:', refDisplay.value);
                    }
                console.log('Modal Single is Open with Reference:', reference);
            });
    
    function modalOpen(ref = null) {
        console.log('ref');
        
        if (modal.classList.contains('visible')) {
            modal.classList.remove('visible');
            console.log('Modal is Open');
        } else {
            if (ref !== null) {
                document.querySelector('input[name = "ref-photo"]') . value = ref
            }
        
            modal.classList.add('visible');
            console.log('Modal is Close');
        }
    }
});