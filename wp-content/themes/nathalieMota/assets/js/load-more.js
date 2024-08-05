console.log("Load More JS is Open !");

// Select ID "load more" Button
const btnLoadMore = document.getElementById('btn-more');

// Define Variables 
let offset = 0;
const category = '';
const format = '';

// EvenListener "load more" button click
btnLoadMore.addEventListener('click', function(event) {
    event.preventDefault(); // Prevent Default Behavior Link
            console.log('Modal "Load More" is Open');
            
    // Use "load more" Content
    $.ajax({
        url: myUrlAjax.ajaxurl, // Use Localized Variable
        type: 'POST',
        data: {
            offset: offset,
            action: "load_more_photos",
            category: category,
            format: format,
        },
            beforeSend: function () {
                // Message for Loading in Progress
                btnLoadMore.textContent = 'Chargement en cours...';
            },
            success: function (data) {
                if (data === "no_posts") {
                    btnLoadMore.textContent = 'Aucune Photo Disponible';
                } else if (data) {
                    offset += 1; // Increment Offset
                    $('#btn-more').before($(data));
                    btnLoadMore.textContent = 'Charger Plus';
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Log Detailed Error Info for Debug Purposes
                console.error('Error During AJAX Request:', textStatus, errorThrown);

                // Update Button Text to Inform the User
                btnLoadMore.textContent = 'Error Loading Content';
            },
    });
})
