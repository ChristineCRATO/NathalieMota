console.log("Modal JS is Open !");

// Listen DOM before Script Execution
document.addEventListener('DOMContentLoaded', (event) => {
    console.log("dom is ok");
    // Modal Contact
    const btnModal = document.getElementById('menu-item-46');
    const modal = document.getElementById('modal');
    const contactModal = document.querySelector('.contactModal');
        
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
    
    function modalOpen(ref = null) {
        console.log(ref);
        
        if (modal.classList.contains('hidden')) {
            modal.classList.remove('hidden');
            console.log('Modal is Open');
        } else {
            if (ref !== null) {
                const inputRef = document.querySelector('input[name = "your-ref"]');
                if (inputRef) {
                    inputRef.value = ref;
                }
            }
            modal.classList.add('hidden');
            console.log('Modal is Close');
        }
    }
});