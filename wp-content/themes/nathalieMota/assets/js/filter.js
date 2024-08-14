console.log("Filter Photo JS is Open !");

jQuery(document).ready(function($) {
    console.log('test script loaded');
    
        // Triggers Filtering when Filter Changes //
        $('#categorieFilter, #formatFilter, #sortFilter').change(function() {
            // Retrieve the Values ​​for the Filters //
            var categorie = $('#categorieFilter').val() || '';
            var format = $('#formatFilter').val() || '';
            var sort = $('#sortFilter').val() || '';

            // AJAX Request Filter Photos //
            $.ajax({
                url: myUrlAjax.ajaxurl,
                type: 'POST',
                data: {
                    action: 'filter_photo',
                    categorie: categorie,
                    format: format,
                    sort: sort
                },
                beforeSend: function() {
                    console.log('sending data...');
                },
                success: function(response) {
                    console.log("ajax response:", response);
                    // Replace HTML Content #photoFilter with new Filter Photo
                    $('#photoFilter').html(response);
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error', error);
                }
            });
        });
    });