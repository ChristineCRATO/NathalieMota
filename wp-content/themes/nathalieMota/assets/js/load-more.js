console.log("Load More JS is Open !");

// Select ID "load more" Button
const btnLoadMore = document.getElementById('load-more');

// Define Variables 
const offset = 0;
const category = '';
const format = '';

// EvenListener "load more" button click
btnLoadMore.addEventListener('click', () => {
    
    // Use "load more" Content
    $.ajax({
        url: myUrlAjax.ajaxurl,
        type: 'POST',
        data: {
            offset: offset,
            action: "load_more_photos",
            category: category,
            format: format,
        },
            beforeSend: function () {
                // Message for Loading in Progress
                btnLoadMore.text('Chargement en cours...');
            },
            success: function (data) {
                if (data === "no_posts") {
                    btnLoadMore.text('Aucune Photo Disponible');
                } else if (data) {
                    btnLoadMore.data('page', btn.data('page') +1);
                    $('#btnCharge+').before($(data));
                    btn.text('Charger Plus');
                }
            },
            error: function (jqXHR, textStatus, errorThrown) {
                // Log Detailed Error Info for Debug Purposes
                console.error('Error During AJAX Request:', textStatus, errorThrown);

                // Update Button Text to Inform the User
                btnLoadMore.text('Error Loading Content');
            },
    });
})
