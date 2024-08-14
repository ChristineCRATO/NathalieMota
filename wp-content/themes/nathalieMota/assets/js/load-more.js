console.log("Load More JS is Open !");

// Select ID "load more" Button
const btnLoadMore = document.getElementById('btn-more');

// Define Variables 
let offset = parseInt(btnLoadMore.getAttribute('data-offset'), 10) || 0;
const limit = 8; // Number to IMG to Load Each Time
const categorie = '';
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
            action: "load_more_photos",
            offset: offset,
            limit: limit,
            category: categorie,
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
                    console.log('loaded data:', data);
                    offset += limit; // Increment Offset
                    $('#btn-more').before($(data));
                    btnLoadMore.textContent = 'Charger Plus';
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Log Detailed Error Info for Debug Purposes
                console.error('Error During AJAX Request:', textStatus, errorThrown);
                console.log('error');
                // Update Button Text to Inform the User
                btnLoadMore.textContent = 'Error Loading Content';
            },
    });
})
