console.log("Modal JS is Open !");

// Listen DOM before Script Execution
document.addEventListener('DOMContentLoaded', function() {

    // Modal Contact Variables
    var clicModal = document.querySelector('')

// Display Modal when Click Contact
clicModal.addEventListener('click', function(event) {
    event.preventDefault(); // Prevents Default Behavior
    modalBloc.classList.add("active"); // Make Modal Visible with "Active Function"
})
// Closes Modal when Click Outside of it
function closeClicOut(event) {

}
})