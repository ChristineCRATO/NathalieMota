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

            btnModal.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent Default Behavior Link
            modal.classList.remove('hidden');
            console.log('Modal is Open');
            });

            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
            modal.classList.add('hidden');
            console.log('Modal is Closed');
                }
            });

            contactModal.addEventListener('click', function(event) {
                event.stopPropagation(); // Prevent Modal from Close when Click inside Modal
            });

            btnSingle.addEventListener('click', function(event) {
                event.preventDefault(); // Prevent Default Behavior Link
            modal.classList.remove('hidden');
            console.log('Modal Single is Open');
            })
    
    function modalOpen(ref = null) {
        console.log('ref');
        
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            console.log('Modal is Open');
        } else {
            if (ref !== null) {
                if (refPhoto) {
                    refPhoto.value = ref;
                }
            }
            modal.classList.add('hidden');
            console.log('Modal is Close');
        }
    }
});